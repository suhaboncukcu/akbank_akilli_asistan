<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer as IncomingAnswer;

/**
* 
*/
class SettingConversation extends Conversation
{
	
	public function askForCategories()
	{
		$this->ask('Merhaba', function(IncomingAnswer $answer) {

            $this->yesOrNo = $answer->getText();

            $this->say('Aferin len '.$this->yesOrNo);

        });
	}

	public function run()
	{
		$this->askForCategories();
	}
}