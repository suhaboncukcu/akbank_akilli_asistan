<?php
use Migrations\AbstractSeed;

/**
 * UserSavingAmounts seed.
 */
class UserSavingAmountsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'user_id' => '1',
                'category' => 'yiyecek',
                'amount' => '300',
                'created' => '2017-09-30 07:09:49',
                'modified' => '2017-09-30 07:15:43',
                'visible_name' => 'Yiyecek',
                'last_month_question' => 'Geçtiğimiz aylarda yiyecek için ortalama 420TL harcamışsın. Bu ay ne kadar harcamayı düşünüyorsun?',
            ],
            [
                'id' => '2',
                'user_id' => '1',
                'category' => 'giyecek',
                'amount' => '300',
                'created' => '2017-09-30 00:00:00',
                'modified' => '2017-09-30 07:16:22',
                'visible_name' => 'Giyecek',
                'last_month_question' => 'Geçtiğimiz aylarda giyecek için ortalama 200TL harcamışsın. Bu ay ne kadar harcamayı düşünüyorsun?',
            ],
            [
                'id' => '3',
                'user_id' => '1',
                'category' => 'teknoloji',
                'amount' => '4599',
                'created' => '2017-09-30 00:00:00',
                'modified' => '2017-09-30 07:17:37',
                'visible_name' => 'Teknoloji',
                'last_month_question' => 'Geçtiğimiz aylarda teknoloji için ortalama 360TL harcamışsın. Bu ay ne kadar harcamayı düşünüyorsun?',
            ],
            [
                'id' => '4',
                'user_id' => '1',
                'category' => 'akaryakit',
                'amount' => '200',
                'created' => '2017-09-30 00:00:00',
                'modified' => '2017-09-30 07:18:13',
                'visible_name' => 'Akaryakıt',
                'last_month_question' => 'Geçtiğimiz aylarda akaryakıt için ortalama 330TL harcamışsın. Bu ay ne kadar harcamayı düşünüyorsun?',
            ],
        ];

        $table = $this->table('user_saving_amounts');
        $table->insert($data)->save();
    }
}
