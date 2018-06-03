<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaghvsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaghvsTable Test Case
 */
class TaghvsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TaghvsTable
     */
    public $Taghvs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.taghvs',
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
        $config = TableRegistry::exists('Taghvs') ? [] : ['className' => TaghvsTable::class];
        $this->Taghvs = TableRegistry::get('Taghvs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Taghvs);

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
