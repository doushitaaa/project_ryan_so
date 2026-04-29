<?php
declare(strict_types=1);

namespace App\Command;

use App\Controller\Component\Auth;
use App\Model\Entity\Customer;
use Cake\Console\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\Core\Configure;
use Cake\Http\Client;

class LoadCustomerCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io)
    {
        ini_set('memory_limit', '-1');
        //copy loadcustomer() from Customer controller

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

        $customersTable = $this->fetchTable('Customers');

        foreach ($output as $name) :
            $customer = $customersTable->newEntity($name);
            $customer->uid = $name["UID"];
            $customer->company_name = $name["CompanyName"] ?? "null";
            $customer->display_id = $name["DisplayID"];
            $address = $name["Addresses"][0];
            $customer->address = $address["Street"] . " " . $address["City"] . " " . $address["State"] . " " . $address["PostCode"];
            $customer->uri = $name["URI"];
            $customersTable->save($customer);
        endforeach;

        // return nothing

    }
}
