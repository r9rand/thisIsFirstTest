<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Following Entity
 *
 * @property int $id
 * @property int $follower_id
 * @property string $tag_body
 *
 * @property \App\Model\Entity\Follower $follower
 */
class Following extends Entity
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
        'follower_id' => true,
        'tag_body' => true,
        // 'follower' => true
    ];
}
