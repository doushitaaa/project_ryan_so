<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\Component\Auth;
use App\Model\Entity\Item;
use Cake\Core\Configure;
use Cake\Http\Client;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemsController extends AppController
{
    public function loadItem()
    {
        // setup http client
        $http = new Client();

        // get access token to access apis
        $accessToken = Auth::authorise();

        $url = 'https://api.myob.com/accountright/' . Configure::read('secrets.company_file_id') . '/Inventory/Item';

        // loop through everything until we run out of items (there is no next page)
        $output = [];

        do {
            $items = $http->get(
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
            $json = $items->getJson();
            $output = array_merge($output, $json['Items']);
            $url = $json['NextPageLink'];
        } while ($json['NextPageLink'] != null);

        // loop through json to get all items, create item objects and save to db
        $response = [];
        foreach ($output as $entireItem) :
            // only get active items
            if ($entireItem['IsActive'] == true) :
                $item = new Item();

                $item->uid = $entireItem['UID'];
                $item->number = $entireItem['Number'];
                $item->name = $entireItem['Name'];
                $item->barcode = $entireItem['CustomField2']['Value'] ?? null;
                if ($entireItem['CustomField3'] != null) {
                    $item->bale_qty = intval($entireItem['CustomField3']['Value']) ?? 0;
                }
                $item->price = $entireItem['BaseSellingPrice'];
                if ($entireItem['QuantityAvailable'] != null) {
                    $item->qty_available = $entireItem['QuantityAvailable'] ?? 0;
                }
                $item->weight = $entireItem['CustomList3']['Value'] ?? 0;
                $item->bin_loc = $entireItem['CustomField1']['Value'] ?? null;
                $item->photo_uri = $entireItem['PhotoURI'];
                $item->uri = $entireItem['URI'];
                $this->Items->save($item);
            endif;
        endforeach;

        // return nothing for now
        $this->set(compact('response'));
        $this->redirect('/');
        $this->Flash->success(__('All items have been updated'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $items = $this->paginate($this->Items);

        $this->set(compact('items'));
    }
}
