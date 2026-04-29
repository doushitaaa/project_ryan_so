<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TmpTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TmpTable Test Case
 */
class TmpTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TmpTable
     */
    protected $Tmp;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Tmp',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tmp') ? [] : ['className' => TmpTable::class];
        $this->Tmp = $this->getTableLocator()->get('Tmp', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tmp);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TmpTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
