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
                'amount' => NULL,
                'created' => '2017-09-30 00:00:00',
                'modified' => '2017-09-30 00:00:00',
                'visible_name' => 'Yiyecek',
            ],
            [
                'id' => '2',
                'user_id' => '1',
                'category' => 'giyecek',
                'amount' => NULL,
                'created' => '2017-09-30 00:00:00',
                'modified' => '2017-09-30 00:00:00',
                'visible_name' => 'Giyecek',
            ],
            [
                'id' => '3',
                'user_id' => '1',
                'category' => 'teknoloji',
                'amount' => NULL,
                'created' => '2017-09-30 00:00:00',
                'modified' => '2017-09-30 00:00:00',
                'visible_name' => 'Teknoloji',
            ],
            [
                'id' => '4',
                'user_id' => '1',
                'category' => 'akaryakit',
                'amount' => NULL,
                'created' => '2017-09-30 00:00:00',
                'modified' => '2017-09-30 00:00:00',
                'visible_name' => 'Akaryakıt',
            ],
        ];

        $table = $this->table('user_saving_amounts');
        $table->insert($data)->save();
    }
}
