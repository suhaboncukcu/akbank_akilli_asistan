<?php
namespace App\Controller\Component;

use App\Logic\Akbank\Api;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;


/**
 * Akbank component
 */
class AkbankComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function mockAllApis()
    {


    	$akApi = new Api();
		$accountActions = $akApi->getAccountActions();
		$categoriesQuestion = $accountActions->body;

		$accountBalance = $akApi->getAccountBalance();
		$accountBalance = $accountBalance->body;

		$creditCardMovements = $akApi->getCreditCardMovements();
		$creditCardMovements = $creditCardMovements->body;

		$creditCardDebt = $akApi->getCreditDebtDisplay();
		$creditCardDebt = $creditCardDebt->body;

		$creditApplication = $akApi->createCreditApplication();
		$creditApplication = $creditApplication->body;

		dump($categoriesQuestion);
		dump("===================");
		dump($accountBalance);
		dump("===================");
		dump($creditCardMovements);
		dump("===================");
		dump($creditCardDebt);
		dump("===================");
		dump($creditApplication);
		dump("===================");


    }
}
