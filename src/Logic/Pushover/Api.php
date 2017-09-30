<?php
namespace App\Logic\Pushover;

use Cake\Core\Configure;
use Cake\Http\Client;

/**
* 
*/
class Api
{
	private $appToken;
	private $userKey;
	private $root;
	private $device;
	
	function __construct()
	{
		$this->appToken = Configure::read('pushover.APP_TOKEN');
		$this->userKey = Configure::read('pushover.USER_KEY');
		$this->root = Configure::read('pushover.ROOT');
		$this->device = Configure::read('pushover.DEVICE');
	}

	public function test($message = 'Merhaba Dünya!')
	{
		$http = new Client();

		$response = $http->post($this->root . '/messages.json', [
			'token' => $this->appToken,
			'user' => $this->userKey,
			'message' => $message,
			'device' => $this->device,
			'title' => 'TEST BAŞLIĞI TÜRKÇE!',
			'url' => 'http://pieorpi.com',
		]);



		return $response;

	}
}