<?php
namespace App\Controller;

use App\Controller\AppController;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

use BotMan\BotMan\Cache\RedisCache;
use App\Conversations\SettingConversation;

/**
 */
class ChatController extends AppController
{
	public function mock()
	{
		$this->loadComponent('Akbank');
		$this->Akbank->mockAllApis();

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