<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\validation\Validator;

class ReportsTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');

    // 通知
    $this->hasMany('Notifies', [
      'foreignKey' => [
        'lv_report_id', // 外部キーがこのようにみっつあることはあっていいんですか？
        'comment_report_id',
        'tag_report_id'
      ]
    ]);

    // 反応
    $this->hasMany('Reportlvs', [
      'foreignKey' => 'report_id'
    ]);

    $this->hasMany('Comments', [
      'foreignKey' => 'report_id'
    ]);

    $this->hasMany('Tags', [
      'foreignKey' => 'report_id'
    ]);
  }

  public function validationDefault(Validator $validator)
  {
    $validator
        ->allowEmpty('img_ext')
        ->add('img_ext', ['list' => [
            'rule' => ['inList', ['jpg', 'png', 'gif']],
            'message' => 'jpg, png, gif のみアップロード可能です.',
        ]]);

    $validator
        ->integer('img_size')
        ->allowEmpty('img_size')
        ->add('img_size', 'comparison', [
            'rule' => ['comparison', '<', 10485760],
            'message' => 'ファイルサイズが超過しています(MaxSize:10M)',
        ]);
        
    return $validator;
  }

}
