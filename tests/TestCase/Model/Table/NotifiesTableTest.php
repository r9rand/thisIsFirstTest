<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NotifiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NotifiesTable Test Case
 */
class NotifiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NotifiesTable
     */
    public $Notifies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.notifies',
        'app.users',
        'app.to_users',
        'app.lv_reports',
        'app.lv_comments',
        'app.lv_tags',
        'app.comment_reports',
        'app.tag_reports',
        'app.hv_tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Notifies') ? [] : ['className' => NotifiesTable::class];
        $this->Notifies = TableRegistry::get('Notifies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Notifies);

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
