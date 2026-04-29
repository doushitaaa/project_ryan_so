<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TmpFixture
 */
class TmpFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tmp';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
            ],
        ];
        parent::init();
    }
}
