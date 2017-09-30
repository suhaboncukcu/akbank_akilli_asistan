<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\AkbankComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\AkbankComponent Test Case
 */
class AkbankComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\AkbankComponent
     */
    public $Akbank;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Akbank = new AkbankComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Akbank);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
