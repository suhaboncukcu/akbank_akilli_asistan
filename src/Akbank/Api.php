<?php
namespace App\Akbank;

use Cake\Core\Configure;
use Cake\Http\Client;

use Cake\Log\Log;

/**
* 
*/
class Api 
{

	private $username = '';
	private $password = '';
	private $customerUsername = '';
	private $customerPassword = '';
	private $root = '';

	public function __construct()
	{
		$this->username = Configure::read('akbank.username');
		$this->password = Configure::read('akbank.password');

		$this->customerUsername = Configure::read('akbank.customer.username');
		$this->customerPassword = Configure::read('akbank.customer.password');

		$this->root = Configure::read('akbank.api.root');

		Log::debug($this->username);
	}

	/**
	 * Gets the account actions.
	 *
	 * @return     Client  The account actions.
	 */
	public function getAccountActions()
	{

		$http = new Client();
		$response = $http->get($this->root . '/accountactions?accountno=4545', [], [
		  'auth' => ['username' => $this->username, 'password' => $this->password]
		]);

		return $response;
	}

	/**
	 * Gets the account balance.
	 *
	 * @return     Client  The account balance.
	 */
	public function getAccountBalance()
	{
		$http = new Client();
		$response = $http->get($this->root . '/accountbalance?customerid=3434', [], [
			'auth' => ['username' => $this->username, 'password' => $this->password]
		]);

		return $response;
	}

	/**
	 * Gets the credit card movements.
	 *
	 * @return     Client  The credit card movements.
	 */
	public function getCreditCardMovements()
	{
		$http = new Client();
		$response = $http->get($this->root . '/creditCardMovements?cardNo=2222', [], [
			'auth' => ['username' => $this->username, 'password' => $this->password]
		]);

		return $response;
	}

	/**
	 * Gets the credit debt display.
	 *
	 * @return     Client  The credit debt display.
	 */
	public function getCreditDebtDisplay()
	{
		$http = new Client();
		$response = $http->get($this->root . '/creditdebtdisplay?customerid=123456', [], [
			'auth' => ['username' => $this->username, 'password' => $this->password]
		]);

		return $response;
	}

	/**
	 * Creates a credit application.
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	public function createCreditApplication()
	{

		$requestLoad = [
			"phoneNumber" => "05555555555",
			"identityNumber" => "99999999999",
			"name" => "test",
			"surname" => "test"
		];


		$http = new Client();
		$response = $http->post($this->root . '/creditApplication', json_encode($requestLoad, TRUE), [
			'auth' => ['username' => $this->username, 'password' => $this->password],
			'type' => 'json',
			['headers' => ['Content-Type' => 'application/json']]
		]);

		return $response;
	}
}