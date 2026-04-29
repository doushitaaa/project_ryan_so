<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\Component\Auth;
use App\Model\Entity\Customer;
use App\Model\Entity\Items;
use App\Model\Table\ItemsTable;
use Cake\Core\Configure;
use Cake\Http\Client;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 * @property \App\Model\Table\CustomersTable $Items
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
{
    public function loadCustomer()
    {
        // setup http client
        $http = new Client();

        // get access token to access apis
        $accessToken = Auth::authorise();

        $url = 'https://api.myob.com/accountright/' . Configure::read('secrets.company_file_id') . '/Contact/Customer';

        // loop through everything until we run out of customers (there is no next page)
        $output = [];

        do {
            $customers = $http->get(
                $url,
                [],
                [
                    'headers' => [
                        'x-myobapi-key' => Configure::read('secrets.client_id'),
                        'x-myobapi-version' => 'v2',
                        'Accept-Encoding' => 'gzip,deflate',
                        'Authorization' => 'Bearer ' . $accessToken,
                    ],
                ]
            );
            $json = $customers->getJson();

            $output = array_merge($output, $json['Items']);

            $url = $json['NextPageLink'];
        } while ($json['NextPageLink'] != null);

        // create customer object and save it to DB
        $response = [];
        foreach ($output as $name) :
            $customer = new Customer();
            $customer->uid = $name["UID"];
            $customer->company_name = $name["CompanyName"] ?? "null";
            $customer->display_id = $name["DisplayID"];
            $address = $name["Addresses"][0];
            $customer->address = $address["Street"] . " " . $address["City"] . " " . $address["State"] . " " . $address["PostCode"];
            $customer->uri = $name["URI"];
            $this->Customers->save($customer);
        endforeach;

        // return nothing for now
        $this->set(compact('response'));
        $this->redirect('/');
        $this->Flash->success(__('All customers have been updated'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $customers = $this->paginate($this->Customers);

        $this->set(compact('customers'));
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('customer'));
    }

    /**
     * search method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function search()
    {
        //get the search key from searchbar
        $key = $this->request->getQuery('key');
        $query = $this->Customers->find('all');
        //find if company name contains search key in db
        if ($key) {
            $query->where(['company_name LIKE' => '%' . $key . '%']);
        }

        $this->paginate = [
            'limit' => 10, // Set the number of records per page as per your requirement
            'order' => ['company_name' => 'asc'], // Set the desired order of records
        ];
        //return searched result
        $customers = $this->paginate($query);
        $this->set(compact('customers'));
    }
    //Bring companyId,name and address to order page
    public function customerorder() {
        $companyId = $this->request->getQuery('companyId');
        $this->set(compact('companyId'));
        $companyName = $this->request->getQuery('companyName');
        $this->set(compact('companyName'));
        $companyAddress = $this->request->getQuery('companyAddress');
        $this->set(compact('companyAddress'));
    }

    public function getitem()
    {
        $this->Items = new ItemsTable();

        $itemData = $this->Items->find('all')->toArray(); // Fetch data and convert to an array

        // Set the response type to JSON
        $this->response = $this->response->withType('application/json');

        // Set the JSON response body
        $this->response = $this->response->withStringBody(json_encode($itemData));

        // Return the response
        return $this->response;
    }

    public function saveCompany()
    {
        $companyName = $this->request->getQuery('selected_company');
        return $this->redirect(['action' => 'customerorder', 'companyName' => $companyName]);
    }

    public function createOrderInMyob()
    {
        // setup http client
        $http = new Client();

        // get access token to access apis
        $accessToken = Auth::authorise();

        $url = 'https://arl2.api.myob.com/accountright/' . Configure::read('secrets.company_file_id') . '/Sale/Order/Item';

        // get info to send to MYOB and send it
        $toSendToMyob = $this->request->getData();

        $response = $http->post(
            $url,
            json_encode($toSendToMyob),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'x-myobapi-key' => Configure::read('secrets.client_id'),
                    'x-myobapi-version' => 'v2',
                    'Accept-Encoding' => 'gzip,deflate, br',
                    'Authorization' => 'Bearer ' . $accessToken,
                ],
                'type' => 'json'
            ]
        );

        $response = $response->getStatusCode();

        // redirect and flash
        if ($response == "201") {
            $this->redirect(['controller' => 'Customers', 'action' => 'index']);
            $this->Flash->success(__('Order has been created'));
        } else {
            $this->redirect(['controller' => 'Customers', 'action' => 'customerorder']);
            $this->Flash->error(__('Unable to create order, please try again in a moment error: ' . $response));
        }
    }



}
