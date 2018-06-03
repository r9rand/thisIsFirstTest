<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaglvsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaglvsTable Test Case
 */
class TaglvsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TaglvsTable
     */
    public $Taglvs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.taglvs',
        'app.users',
        'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Taglvs') ? [] : ['className' => TaglvsTable::class];
        $this->Taglvs = TableRegistry::get('Taglvs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Taglvs);

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
