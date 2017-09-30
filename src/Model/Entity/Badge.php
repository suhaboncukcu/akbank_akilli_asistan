<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Badge Entity
 *
 * @property int $id
 * @property string $name
 * @property string $css_class
 * @property string $img
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 * @property string $description
 *
 * @property \App\Model\Entity\User $user
 */
class Badge extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'css_class' => true,
        'img' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'description' => true,
        'user' => true
    ];


    /**
     * Gets the image.
     *
     * @param      string  $img    The image
     *
     * @return     string   The image.
     */
    public function _getImg($img)
    {
        return '/img/' . $img;
    }
}
