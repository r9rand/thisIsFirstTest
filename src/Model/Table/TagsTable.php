<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TagsTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');

    // 通知
    $this->hasMany('Notifies', [
      'foreignKey' => [
        'lv_tag_id',
        'hv_tag_id'
      ]
    ]);

    // 反応
    $this->hasMany('Taglvs');
    $this->hasMany('Taghvs');
    /* ちがくない？
    $this->hasMany('Taglvs', [
      'foreignKey' => 'report_id'
    ]);
    $this->hasMany('Taghvs', [
      'foreignKey' => 'report_id'
    ]);
    */


    // 検索
    $this->belongsTo('Reports', [
      'foreignKey' => 'report_id'
    ]);

  }
}
