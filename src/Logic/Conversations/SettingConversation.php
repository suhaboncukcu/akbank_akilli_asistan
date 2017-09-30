<?php

namespace App\Logic\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer as IncomingAnswer;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;

/**
* 
*/
class SettingConversation extends Conversation
{
	
	public function askForCategories()
	{
		if(!$categoriesQuestion = $this->getCategoriesQuestion()) {
			$this->say(json_encode(['message' => 'Teşekkürler Süha, bütün cevaplarını elimde görünüyor. Uygulamayı kullanmaya devam edebilirsin. ']));
			return true;
		}

		$this->ask(json_encode($categoriesQuestion, TRUE), function(IncomingAnswer $answer) {

            $choosenCategory = $answer->getText();

            $UserSavingAmount = TableRegistry::get('UserSavingAmounts');
            $userSavingAmounts = $UserSavingAmount->find('all')
            										->where(['category' => $choosenCategory])
            										->where(function ($exp, $q) {
														return $exp->isNull('amount');
													})
            										->all();

            

            if(count($userSavingAmounts) > 0) {
            	$this->askSavingAmount($choosenCategory);
            } else {
            	$this->say(json_encode(['message' => 'Böyle bir kategori bulamadım Süha. Tekrar denemek ister misin?']));
            	$this->askForCategories();
            }

        });
	}

	public function askSavingAmount($choosenCategory)
	{
		$categoryAnswer = $this->getCategoryAnswer($choosenCategory);


		$this->ask(json_encode($categoryAnswer), function(IncomingAnswer $answer) use ($choosenCategory) {

            $amountAnswer = $answer->getText();

            $this->saveAmountToCategory($choosenCategory, $amountAnswer);

        });

	}

	public function saveAmountToCategory($choosenCategory, $amountAnswer)
	{
		if($amountAnswer == 'more') {
			$this->askSpecificSavingAmout($choosenCategory);
		} else {
			$UserSavingAmount = TableRegistry::get('UserSavingAmounts');
			
			$userSavingAmount = $UserSavingAmount->find('all')->where([
				'category' => $choosenCategory
			])->first();

			$UserSavingAmount->patchEntity($userSavingAmount, [
				'amount' => $amountAnswer
			]);

			$UserSavingAmount->save($userSavingAmount);
			
			$this->continueConversation();
		}
	}

	public function askSpecificSavingAmout($choosenCategory)
	{
		$question = [
			'message' => 'Pekala Süha, kaç TL harcamak istiyorsun? (Ör 130, 130TL demektir.)'
		];

		$this->ask(json_encode($question), function(IncomingAnswer $answer) use ($choosenCategory) {
			
			$this->saveAmountToCategory($choosenCategory, $answer->getText());

			$this->continueConversation();
		});
	}

	public function continueConversation()
	{
		$UserSavingAmount = TableRegistry::get('UserSavingAmounts');
		$categories = $UserSavingAmount->find('all')->select([
													    'name' => 'visible_name',
													    'key' => 'category'
													])->where(function ($exp, $q) {
														return $exp->isNull('amount');
													})->all();
		if (count($categories) > 0) {
			// $this->say(json_encode(['message' => 'Teşekkürler Süha, cevabını kaydettim lütfen devam et.']));
			$this->askForCategories();
		} else {
			$this->say(json_encode(['message' => 'Teşekkürler Süha, bütün cevaplarını kaydettim. Şimdi uygulamayı kapatıp akıllı hayata başlayabilirsin!']));
			return true;
		}

		
	}

	public function stopConversation(Message $message)
	{
		if ($message->getMessage() == 'bitir') {
			return true;
		}

		return false;
	}

	private function getCategoryAnswer($choosenCategory)
	{
		$UserSavingAmount = TableRegistry::get('UserSavingAmounts');
		$question = $UserSavingAmount->find('all')->where(['category' => $choosenCategory])->first();
		Log::debug($question);


		$buttons = [
			['name' => '100 TL' , 'key' => '100'],
			['name' => '200 TL' , 'key' => '200'],
			['name' => '300 TL' , 'key' => '300'],
			['name' => '500 TL' , 'key' => '500'],
			['name' => '1000 TL' , 'key' => '1000'],
			['name' => 'Daha fazla' , 'key' => 'more']
		];

		return [
			'message' => $question->last_month_question,
			'buttons' => $buttons
		];
	}

	private function getCategoriesQuestion()
	{
		
		//  Mock API for now since api doesn't respond with proper results. 
		
		$UserSavingAmount = TableRegistry::get('UserSavingAmounts');

		$categories = $UserSavingAmount->find('all')->select([
													    'name' => 'visible_name',
													    'key' => 'category'
													])->where(function ($exp, $q) {
														return $exp->isNull('amount');
													})->all();

		$buttons = $categories->toArray();

		if(count($buttons) > 0) {
			return [
				'message' => 'Aşağıdaki kategoriler için ne kadar harcamayı düşünüyorsun?',
				'buttons' => $buttons
			]; 	
		}

		return false;
		
	}

	public function run()
	{
		$this->askForCategories();
	}
}