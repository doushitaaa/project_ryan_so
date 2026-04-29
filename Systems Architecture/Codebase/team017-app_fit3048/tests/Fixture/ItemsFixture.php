<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ItemsFixture
 */
class ItemsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'uid' => 'b5311cc0-5bd8-4de5-9836-892a0bb91a9b',
                'number' => 'Lorem ip',
                'name' => 'Lorem ipsum dolor sit amet',
                'barcode' => 'Lorem ipsum d',
                'bale_qty' => 1,
                'price' => 1.5,
                'qty_available' => 1,
                'weight' => 1.5,
                'bin_loc' => 'Lorem',
                'photo_uri' => 'Lorem ipsum dolor sit amet',
                'uri' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
