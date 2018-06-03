<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FollowingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FollowingsTable Test Case
 */
class FollowingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FollowingsTable
     */
    public $Followings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.followings',
        'app.followers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Followings') ? [] : ['className' => FollowingsTable::class];
        $this->Followings = TableRegistry::get('Followings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Followings);

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
