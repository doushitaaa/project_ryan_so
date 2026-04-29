<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CustomersFixture
 */
class CustomersFixture extends TestFixture
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
                'uid' => '39bdaab4-249c-4b7b-b27a-f7c2be49f0f3',
                'company_name' => 'Lorem ipsum dolor sit amet',
                'display_id' => 'Lorem ip',
                'address' => 'Lorem ipsum dolor sit amet',
                'uri' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
