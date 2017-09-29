<?php
namespace App\Controller;

use App\Controller\AppController;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

/**
 */
class ChatController extends AppController
{
	public function index()
	{
		$this->autoRender = false;

		DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

		$config = [
		   
		];

		// create an instance
		$botman = BotManFactory::create($config);

		// give the bot something to listen for.
		$botman->hears('hello', function (BotMan $bot) {
		    $bot->reply('Hello yourself.');
		});

		$botman->fallback(function(BotMan $bot) {
		    $bot->reply('Sorry, I did not understand these commands.');
		});

		// start listening
		$botman->listen();

		die();
	}
}