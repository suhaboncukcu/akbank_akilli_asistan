<?php
namespace App\Controller;

use App\Controller\AppController;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

use BotMan\BotMan\Cache\RedisCache;
use App\Logic\Conversations\SettingConversation;
use App\Logic\Pushover\Api;
use App\Logic\Places\Api as PlacesApi;


/**
 */
class ChatController extends AppController
{

	public function reset()
	{
		$this->loadModel('UserSavingAmounts');

		$query = $this->UserSavingAmounts->query();
		$query->update()
	    ->set(['amount' => NULL])
	    ->execute();

	    echo "ok"; 
	    die();
	}

	public function mock()
	{
		$this->loadComponent('Akbank');
		$this->Akbank->mockAllApis();

		$pushoverApi = new Api();
		$respond = $pushoverApi->test();
		dump($respond);


		$placesApi = new PlacesApi();
		$results = $placesApi->test('41.085401', '29.010857');
		dump($results);


		die();
	}

	/**
	 * { function_description }
	 */
	public function test()
	{
		$this->autoRender = false;

		DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

		$config = [];
		
		$botman = BotManFactory::create($config, new RedisCache('127.0.0.1', 6379));

		$botman->fallback(function(BotMan $bot) {
		    $bot->reply('TEST CODE');
		});

		// start listening
		$botman->listen();

		die();
	}

	public function index()
	{

		$this->autoRender = false;

		DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

		$config = [];
		
		$botman = BotManFactory::create($config, new RedisCache('127.0.0.1', 6379));
		

		// give the bot something to listen for.
		$botman->hears('hello', function (BotMan $bot) {
		    $bot->startConversation(new SettingConversation);
		});

		$botman->fallback(function(BotMan $bot) {
		    $bot->reply(json_encode(['message' => 'Üzgünüm, ne dediğini anlayamadım.']));
		});

		// start listening
		$botman->listen();

		die();
	}
}