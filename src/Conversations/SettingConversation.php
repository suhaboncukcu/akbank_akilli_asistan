<?php

namespace App\Conversations;

use App\Akbank\Api;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer as IncomingAnswer;

use Cake\Log\Log;

/**
* 
*/
class SettingConversation extends Conversation
{
	
	public function askForCategories()
	{
		$categoriesQuestion = $this->getCategoriesQuestion();

		$this->ask(json_encode($categoriesQuestion), function(IncomingAnswer $answer) {

            $choosenCategory = $answer->getText();

            $this->askSavingAmount($choosenCategory);

        });
	}

	public function askSavingAmount($choosenCategory)
	{
		$categoryAnswer = $this->getCategoryAnswer($choosenCategory);

		$this->ask(json_encode($categoryAnswer), [
	        [
	            'pattern' => '100|200|300|500|1000',
	            'callback' => function () {
	                $this->say(json_encode(['message' => 'Teşekkürler Süha, cevabını kaydettim.']));
	            }
	        ],
	        [
	            'pattern' => 'more',
	            'callback' => function () {
	                $this->askSpecificSavingAmout($choosenCategory);
	            }
	        ]
	    ]);
	}

	public function askSpecificSavingAmout($choosenCategory)
	{
		$question = [
			'message' => 'Pekala Süha, kaç TL harcamak istiyorsun? (Ör 130, 130TL demektir.)'
		];
		$this->ask(json_encode($question), function(IncomingAnswer $answer) {
			$this->say(['message' => 'Teşekkürler Süha, cevabını kaydettim.']);
		});
	}

	public function getCategoryAnswer($choosenCategory)
	{
		$responseMap = [
			'giyecek' => 'Geçtiğimiz aylarda giyecek için ortalama 200TL harcamışsın. Bu ay ne kadar harcamayı düşünüyorsun?',
			'yiyecek' => 'Geçtiğimiz aylarda yiyecek için ortalama 420TL harcamışsın. Bu ay ne kadar harcamayı düşünüyorsun?',
			'teknoloji' => 'Geçtiğimiz aylarda teknoloji için ortalama 360TL harcamışsın. Bu ay ne kadar harcamayı düşünüyorsun?', 
			'akaryakit' => 'Geçtiğimiz aylarda akaryakıt için ortalama 330TL harcamışsın. Bu ay ne kadar harcamayı düşünüyorsun?'
		];

		$buttons = [
			['name' => '100 TL' , 'key' => '100'],
			['name' => '200 TL' , 'key' => '200'],
			['name' => '300 TL' , 'key' => '300'],
			['name' => '500 TL' , 'key' => '500'],
			['name' => '1000 TL' , 'key' => '1000'],
			['name' => 'Daha fazla' , 'key' => 'more']
		];

		return [
			'message' => $responseMap[$choosenCategory],
			'buttons' => $buttons
		];
	}

	private function getCategoriesQuestion()
	{
		// $akApi = new Api();
		// $accountActions = $akApi->getAccountActions();
		// $categoriesQuestion = $accountActions->body;
		
		//  Mock for now since api doesn't respond with proper results. 
		
		return [
			'message' => 'Merhaba Süha, bu ay aşağıdaki kategoriler için ne kadar harcamayı düşünüyorsun?',
			'buttons' => [
				[
					'name' => 'Giyecek',
					'key' => 'giyecek'
				],
				[
					'name' => 'Yiyecek',
					'key' => 'yiyecek'
				],
				[
					'name' => 'Teknoloji',
					'key' => 'teknoloji'
				],
				[
					'name' => 'Akaryakıt',
					'key' => 'akaryakit'
				]
			]
		]; 
	}

	public function run()
	{
		$this->askForCategories();
	}
}