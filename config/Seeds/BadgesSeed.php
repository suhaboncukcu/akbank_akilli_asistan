<?php
use Migrations\AbstractSeed;

/**
 * Badges seed.
 */
class BadgesSeed extends AbstractSeed
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
                'name' => 'Briefcase',
                'css_class' => '',
                'img' => 'briefcase.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => 'Lorem ipsum dolor sit amet',
            ],
            [
                'id' => '2',
                'name' => 'bubbles',
                'css_class' => 'is-half-opaque',
                'img' => 'bubbles.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => NULL,
            ],
            [
                'id' => '3',
                'name' => 'clock',
                'css_class' => 'is-half-opaque',
                'img' => 'clock.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => NULL,
            ],
            [
                'id' => '4',
                'name' => 'diamond',
                'css_class' => 'is-half-opaque',
                'img' => 'diamond.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => NULL,
            ],
            [
                'id' => '5',
                'name' => 'graph',
                'css_class' => 'is-half-opaque',
                'img' => 'graph.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => NULL,
            ],
            [
                'id' => '6',
                'name' => 'imac',
                'css_class' => '',
                'img' => 'imac.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => 'İnternette ilk tasaruffunu yaptın, tebrikler!',
            ],
            [
                'id' => '7',
                'name' => 'joypad',
                'css_class' => '',
                'img' => 'joypad.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => NULL,
            ],
            [
                'id' => '8',
                'name' => 'keyboards',
                'css_class' => 'is-half-opaque',
                'img' => 'keyboards.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => NULL,
            ],
            [
                'id' => '9',
                'name' => 'man',
                'css_class' => '',
                'img' => 'man.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => NULL,
            ],
            [
                'id' => '10',
                'name' => 'map-',
                'css_class' => '',
                'img' => 'map-.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => NULL,
            ],
            [
                'id' => '11',
                'name' => 'open-box',
                'css_class' => 'is-half-opaque',
                'img' => 'open-box.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => NULL,
            ],
            [
                'id' => '12',
                'name' => 'package',
                'css_class' => '',
                'img' => 'package.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => NULL,
            ],
            [
                'id' => '13',
                'name' => 'settings',
                'css_class' => '',
                'img' => 'settings.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => NULL,
            ],
            [
                'id' => '14',
                'name' => 'speakers',
                'css_class' => 'is-half-opaque',
                'img' => 'speakers.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => NULL,
            ],
            [
                'id' => '15',
                'name' => 'siftah',
                'css_class' => '',
                'img' => 'target.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => 'İlk tasarufunu yaptın, tebrikler!',
            ],
            [
                'id' => '16',
                'name' => 'wine',
                'css_class' => '',
                'img' => 'wine.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => NULL,
            ],
            [
                'id' => '17',
                'name' => 'wooman',
                'css_class' => '',
                'img' => 'wooman.png',
                'created' => '2017-01-01 01:01:01',
                'modified' => '2017-01-01 01:01:01',
                'user_id' => '1',
                'description' => NULL,
            ],
        ];

        $table = $this->table('badges');
        $table->insert($data)->save();
    }
}
