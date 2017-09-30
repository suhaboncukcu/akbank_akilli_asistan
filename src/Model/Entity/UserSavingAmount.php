<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserSavingAmount Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $category
 * @property float $amount
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $visible_name
 *
 * @property \App\Model\Entity\User $user
 */
class UserSavingAmount extends Entity
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
        'user_id' => true,
        'category' => true,
        'amount' => true,
        'created' => true,
        'modified' => true,
        'visible_name' => true,
        'user' => true
    ];
}
