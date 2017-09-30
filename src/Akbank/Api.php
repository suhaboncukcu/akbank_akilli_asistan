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
}