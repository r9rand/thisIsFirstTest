<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Followings Model
 *
 * @property \App\Model\Table\FollowersTable|\Cake\ORM\Association\BelongsTo $Followers
 *
 * @method \App\Model\Entity\Following get($primaryKey, $options = [])
 * @method \App\Model\Entity\Following newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Following[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Following|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Following patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Following[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Following findOrCreate($search, callable $callback = null, $options = [])
 */
class FollowingsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        // parent::initialize($config);

        $this->setTable('followings');
        // $this->setDisplayField('id');
        // $this->setPrimaryKey('id');


        /* 自己結合 --> Followings hasMany Subfollowings(bodyでつながるfollowingsTable) */
        // $this->hasMany('SubFollowings', [
        //   'className' => 'Followings',
        //   'foreignKey' => 'tag_body',
        //   'joinType' => 'LEFT'
        // ]);
        // $this->belongsToMany('Followings', [
        //   'className' => 'Followings',
        //   // 'foreignKey' => 'tag_body',
        //   'joinType' => 'LEFT'
        // ]);


        // $this->hasMany('SubFollowings', ['className' => 'Followings'])
        //      ->setForeignKey('tag_body');
        //
        // $this->belongsToMany('Followings', ['className' => 'SubFollowings'])
        //      ->setForeignKey('tag_body');



        /* 検索で済む話だったような
        $this->hasOne('Tags', [
          'foreignKey' => 'body'
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
        // $validator
            // ->integer('id')
            // ->allowEmpty('id', 'create');

        $validator
            ->scalar('tag_body')
            ->maxLength('tag_body', 255)
            ->requirePresence('tag_body', 'create')
            ->notEmpty('tag_body');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        // $rules->add($rules->existsIn(['follower_id'], 'Followers'));

        return $rules;
    }
}
