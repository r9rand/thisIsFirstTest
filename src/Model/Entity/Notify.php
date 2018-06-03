<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notify Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $to_user_id
 * @property int $lv_report_id
 * @property int $lv_comment_id
 * @property int $lv_tag_id
 * @property int $comment_report_id
 * @property int $tag_report_id
 * @property int $hv_tag_id
 * @property \Cake\I18n\FrozenTime $created
 * @property bool $is_readed
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ToUser $to_user
 * @property \App\Model\Entity\LvReport $lv_report
 * @property \App\Model\Entity\LvComment $lv_comment
 * @property \App\Model\Entity\LvTag $lv_tag
 * @property \App\Model\Entity\CommentReport $comment_report
 * @property \App\Model\Entity\TagReport $tag_report
 * @property \App\Model\Entity\HvTag $hv_tag
 */
class Notify extends Entity
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
      'reactor_id' => true,
        'to_user_id' => true,
        'lv_report_id' => true,
        'lv_comment_id' => true,
        'lv_tag_id' => true,
        'comment_report_id' => true,
        'tag_report_id' => true,
        'hv_tag_id' => true,
        'created' => true,
        'is_readed' => true,
        'user' => true,
        'to_user' => true,
        'lv_report' => true,
        'lv_comment' => true,
        'lv_tag' => true,
        'comment_report' => true,
        'tag_report' => true,
        'hv_tag' => true,
        'cell_tag_id' => false /* true, false どっちにしてもnullのままやでええ */

    ];
}
