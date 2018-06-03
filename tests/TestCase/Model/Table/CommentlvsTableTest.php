<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommentlvsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommentlvsTable Test Case
 */
class CommentlvsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CommentlvsTable
     */
    public $Commentlvs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.commentlvs',
        'app.users',
        'app.comments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Commentlvs') ? [] : ['className' => CommentlvsTable::class];
        $this->Commentlvs = TableRegistry::get('Commentlvs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Commentlvs);

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
