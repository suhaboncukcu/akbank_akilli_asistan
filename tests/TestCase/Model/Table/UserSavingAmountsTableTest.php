<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserSavingAmountsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserSavingAmountsTable Test Case
 */
class UserSavingAmountsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserSavingAmountsTable
     */
    public $UserSavingAmounts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_saving_amounts',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserSavingAmounts') ? [] : ['className' => UserSavingAmountsTable::class];
        $this->UserSavingAmounts = TableRegistry::get('UserSavingAmounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserSavingAmounts);

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
