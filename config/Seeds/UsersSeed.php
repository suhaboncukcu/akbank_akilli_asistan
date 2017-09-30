<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'name' => 'akbank',
                'surname' => 'demo',
                'email' => 'user1@akbank.com',
                'password' => '111111',
                'created' => '2017-09-30 00:00:00',
                'modified' => '2017-09-30 00:00:00',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
