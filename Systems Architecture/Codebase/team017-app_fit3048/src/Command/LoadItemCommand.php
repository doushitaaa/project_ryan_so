<?php
declare(strict_types=1);

namespace App\Command;

use App\Controller\Component\Auth;
use App\Model\Entity\Item;
use Cake\Console\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\Core\Configure;
use Cake\Http\Client;
use Cake\ORM\TableRegistry;

class LoadItemCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io)
    {
        ini_set('memory_limit', '-1');
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
        $itemsTable = $this->fetchTable('Items');

        foreach ($output as $entireItem) :
            // only get active items
            if ($entireItem['IsActive']) :
                $item = $itemsTable->newEntity ($entireItem);
                $item->uid = $entireItem['UID'];
                $item->number = $entireItem['Number'];
                $item->name = $entireItem['Name'];
                if (isset($entireItem['CustomField2'])) {
                    $item->barcode = $entireItem['CustomField2']['Value'];
                } else {
                    $item->barcode = null;
                };

                if ($entireItem['CustomField3'] != null) {
                    $item->bale_qty = intval($entireItem['CustomField3']['Value']);
                } else {
                    $item->bale_qty = 0;
                };

                $item->price = $entireItem['BaseSellingPrice'];

                if ($entireItem['QuantityAvailable'] != null) {
                    $item->qty_available = $entireItem['QuantityAvailable'];
                } else {
                    $item->qty_available = 0 ;
                }

                $item->weight = $entireItem['CustomList3']['Value'] ?? 0;
                $item->bin_loc = $entireItem['CustomField1']['Value'] ?? null;
                $item->photo_uri = $entireItem['PhotoURI'];
                $item->uri = $entireItem['URI'];

                //comment out below line if allow console to print out info for debug
                $itemsTable->save($item);

            endif;
        endforeach;
    }
}
