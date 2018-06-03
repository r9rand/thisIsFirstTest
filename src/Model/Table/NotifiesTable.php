<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notifies Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ToUsersTable|\Cake\ORM\Association\BelongsTo $ToUsers
 * @property \App\Model\Table\LvCommentsTable|\Cake\ORM\Association\BelongsTo $LvComments
 * @property \App\Model\Table\LvReportsTable|\Cake\ORM\Association\BelongsTo $LvReports
 * @property \App\Model\Table\LvTagsTable|\Cake\ORM\Association\BelongsTo $LvTags
 * @property \App\Model\Table\CommentReportsTable|\Cake\ORM\Association\BelongsTo $CommentReports
 * @property \App\Model\Table\TagReportsTable|\Cake\ORM\Association\BelongsTo $TagReports
 * @property \App\Model\Table\HvTagsTable|\Cake\ORM\Association\BelongsTo $HvTags
 *
 * @method \App\Model\Entity\Notify get($primaryKey, $options = [])
 * @method \App\Model\Entity\Notify newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Notify[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Notify|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Notify patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Notify[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Notify findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NotifiesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('notifies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id', //だよね？？ // ←NotifyCellにてContainさせたら受通知者のユーザIDから取得していたので違うようである。
            'joinType' => 'INNER'
        ]);

        // $this->hasOne('Users', [
        //     'foreignKey' => 'id', //だよね？？
        //     'joinType' => 'INNER'
        // ]);

        // $this->belongsTo('Users', [
        //     'foreignKey' => 'to_user_id', //だよね？？
        //     'joinType' => 'INNER'
        // ]);

        $this->hasOne('Reports', [
          'foreignKey' => 'id'
        ]);
        $this->hasOne('Tags', [
          'foreignKey' => 'id'
        ]);
        $this->hasOne('Comments', [
          'foreignKey' => 'id'
        ]);
        /*
        $this->belongsTo('ToUsers', [
            'foreignKey' => 'to_user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('LvReports', [
            'foreignKey' => 'lv_report_id'
        ]);
        $this->belongsTo('LvComments', [
            'foreignKey' => 'lv_comment_id'
        ]);
        $this->belongsTo('LvTags', [
            'foreignKey' => 'lv_tag_id'
        ]);
        $this->belongsTo('CommentReports', [
            'foreignKey' => 'comment_report_id'
        ]);
        $this->belongsTo('TagReports', [
            'foreignKey' => 'tag_report_id'
        ]);
        $this->belongsTo('HvTags', [
            'foreignKey' => 'hv_tag_id'
        ]);
        */
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */



    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('is_readed')
            ->allowEmpty('is_readed');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */

/* add_tagreport（）のときの挿入のために消した
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['to_user_id'], 'ToUsers'));
        $rules->add($rules->existsIn(['lv_report_id'], 'LvReports'));
        $rules->add($rules->existsIn(['lv_comment_id'], 'LvComments'));
        $rules->add($rules->existsIn(['lv_tag_id'], 'LvTags'));
        $rules->add($rules->existsIn(['comment_report_id'], 'CommentReports'));
        $rules->add($rules->existsIn(['tag_report_id'], 'TagReports'));
        $rules->add($rules->existsIn(['hv_tag_id'], 'HvTags'));

        return $rules;
    }
*/
}
