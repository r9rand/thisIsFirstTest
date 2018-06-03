<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReportlvsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReportlvsTable Test Case
 */
class ReportlvsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReportlvsTable
     */
    public $Reportlvs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reportlvs',
        'app.users',
        'app.reports'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Reportlvs') ? [] : ['className' => ReportlvsTable::class];
        $this->Reportlvs = TableRegistry::get('Reportlvs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reportlvs);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
