<?php
namespace App\Controller;

use App\Controller\AppController;
// use Cake\Event\Event; // ← 追加 //
use Cake\ORM\TableRegistry;

class ReportsController extends AppController {

  ////////////////////////
  public $components = array(
      'ImgProcess' => array(),
  );
  ////////////////////////

  public function initialize() {
    $this->viewBuilder()->autoLayout(true);
    $this->viewBuilder()->layout('reports_layout');

    $connection = \Cake\Datasource\ConnectionManager::get('default'); // DB接続を取得
    $connection->logQueries(true); // SQL Queryのログ出力を有効化
  }

  public function beforeFilter() {
    parent::initialize();
    // parent::beforeFilter($event);
  }

  public function index() {

    $reports = $this->Reports->find('all',[
      'contain' => [
        'Reportlvs',
        'Comments',
        'Tags'
    ]]);
    $this->set(compact('reports'));
  }

  public function timeline($user_id = null) {
    // 後々の記述削除対象
    $this->loadComponent('Auth');
    $user_id = $this->Auth->user('id');
    $this->set(compact('user_id'));

    $followings = TableRegistry::get('Followings');
    $followingTags = $followings
      ->find()
      ->select('tag_body')
      ->where(['follower_id' => $user_id])
      ->enableHydration(false)
      ->toArray();
    for ($i=0; $i < count($followingTags); $i++) {
      // $tags_array[] = '"' . $followingTags[$i]["tag_body"] . '"';
      $tags_array[] = $followingTags[$i]["tag_body"];
    }

    $tags      = TableRegistry::get('Tags');
    $reportIds = $tags
      ->find()
      ->select('report_id')
      ->where(['body IN' => $tags_array])
      ->enableHydration(false)
      ->toArray();
    for ($i=0; $i < count($reportIds); $i++) {
      $ids_array[] = $reportIds[$i]['report_id'];
    }

    // $reports = $this->Reports
    //   ->find('all', ['contain' => ['Reportlvs', 'Comments', 'Tags']])
    //   ->where(['id IN' => $ids_array])
    //   ->all();
    // $this->set(compact('reports'));
    $reports = $this->Reports->find()
                             ->where(['id IN' => $ids_array])
                             ->order(['Reports.id' => 'DESC'])
                             ->limit(100)
                             // ->offset()
                             ->contain([
                               'Reportlvs',
                               'Tags' => ['Taglvs', 'Taghvs'],
                               'Comments' => ['Commentlvs', 'Users']
                             ])
                             ->all();
    $this->set(compact('reports'));
  }

  public function moreTimeline() {

    $this->viewBuilder()->layout('loaded_timeline');

    $limit   = 2;
    $page    = $this->request->getQuery('page');
    $offset  = ($page - 1) * $limit + $limit;
    $user_id = $this->request->getQuery('user_id');

    $followings = TableRegistry::get('Followings');
    $followingTags = $followings
    ->find()
    ->select('tag_body')
    ->where(['follower_id' => $user_id])
    ->enableHydration(false)
    ->toArray();
    for ($i=0; $i < count($followingTags); $i++) {
      // $tags_array[] = '"' . $followingTags[$i]["tag_body"] . '"';
      $tags_array[] = $followingTags[$i]["tag_body"];
    }

    $tags      = TableRegistry::get('Tags');
    $reportIds = $tags
    ->find()
    ->select('report_id')
    ->where(['body IN' => $tags_array])
    ->enableHydration(false)
    ->toArray();
    for ($i=0; $i < count($reportIds); $i++) {
      $ids_array[] = $reportIds[$i]['report_id'];
    }

    $reports = $this->Reports->find()
    ->where(['id IN' => $ids_array])
    ->order(['Reports.id' => 'DESC'])
    ->limit(2)
    ->offset($offset)
    ->contain([
      'Reportlvs',
      'Tags' => ['Taglvs', 'Taghvs'],
      'Comments' => ['Commentlvs', 'Users']
    ])
    ->all();
    $this->set(compact('reports'));
    $this->render('more_timeline');

  }

public function search(/* $tag_body = null */) {
    $tag_body  = $this->request->query['tag'];
    $tags      = TableRegistry::get('Tags');
    $reportIds = $tags->find()
                      ->select('report_id')
                      ->where(['body' => $tag_body])
                      ->enableHydration(false)
                      ->toArray();
    for ($i=0; $i < count($reportIds); $i++) {
      $ids_array[] = $reportIds[$i]['report_id'];
    }
    $reports = $this->Reports->find()
                             ->where(['id IN' => $ids_array])
                             ->contain([
                               'Reportlvs',
                               'Tags' => ['Taglvs', 'Taghvs'],
                               'Comments' => ['Commentlvs', 'Users']
                             ])
                             ->all();
    $this->set(compact('reports'));
    // 後々の記述削除対象
    $this->loadComponent('Auth');
    $user_id = $this->Auth->user('id');
    $this->set(compact('user_id'));
    $this->set(compact('tag_body'));

    $this->loadModel('Followings');
    $followerIds = $this->Followings->find()
                                    ->select('follower_id')
                                    ->where(['tag_body' => $tag_body])
                                    ->enableHydration(false)
                                    ->toArray();
    for ($i=0; $i < count($followerIds); $i++) {
      $followers[] = $followerIds[$i]['follower_id'];
    }
    $this->set(compact('followers'));
  }

  public function view($id = null) {
    $report = $this->Reports->find()
                            ->where(['id' => $id])
                            ->contain([
                              'Reportlvs',
                              'Tags' => ['Taglvs', 'Taghvs'],
                              // 'Comments' => ['Commentlvs']
                              'Comments' => ['Commentlvs', 'Users']
                              // コメントをした人についての情報を表示する為,
                              // comment belongsto user (1 vs Many)
                            ])
                            ->first();
    $this->set(compact('report'));

    // 後々の記述削除対象
    $this->loadComponent('Auth');
    $user_id = $this->Auth->user('id');
    $this->set(compact('user_id'));

    $this->loadModel('Reportlvs');
    $lved_report_ids  = $this->Reportlvs->find()
                                        ->where(['user_id' => $user_id])
                                        ->extract('report_id')
                                        ->toArray();
    $this->loadModel('Commentlvs');
    $lved_comment_ids  = $this->Commentlvs->find()
                                          ->where(['user_id' => $user_id])
                                          ->extract('comment_id')
                                          ->toArray();
    $this->loadModel('Taglvs');
    $lved_tag_ids  = $this->Taglvs->find()
                                  ->where(['user_id' => $user_id])
                                  ->extract('tag_id')
                                  ->toArray();
    $this->loadModel('Taghvs');
    $hved_tag_ids  = $this->Taghvs->find()
                                  ->where(['user_id' => $user_id])
                                  ->extract('tag_id')
                                  ->toArray();
    $this->set(compact('lved_report_ids'));
    $this->set(compact('lved_comment_ids'));
    $this->set(compact('lved_tag_ids'));
    $this->set(compact('hved_tag_ids'));
  }

  public function upload() {

    // 後々の記述削除対象/////////////
    $this->loadComponent('Auth');
    $user_id = $this->Auth->user('id');
    $this->set(compact('user_id'));
    // 後々の記述削除対象/////////////

    $report = $this->Reports->newEntity();
    if ($this->request->is('post')) {
      //追加（validation適用のため、requestに色々詰める処理）--------------
      if (!empty($this->request->data['img']['name'])) {
        $this->ImgProcess->save($this->request);
      }
      //------------------------------------------------------------
      $this->request->data['user_id'] = $user_id;
      $report = $this->Reports->patchEntity($report, $this->request->data);
      $this->set(compact('report'));

      if ($this->Reports->save($report)) {
        //追加(ローカルに保存＆サムネイル生成)-------------------------
        if(!empty($this->request->data['img']['name'])) {
          $this->ImgProcess->generate(
            $this->request->data['img']['tmp_name'], $report);
        }
        //-------------------------------------------------------
        $this->Flash->success(__('投稿されました.'));
      } else {
        //validation errorの表示準備--------------------------------------------
        if($report->errors()['img_ext'])
            $this->Flash->error(__($report->errors()['img_ext']['list']));
        if($report->errors()['img_size'])
            $this->Flash->error(__($report->errors()['img_size']['comparison']));
        //--------------------------------------------------------------------
        $this->Flash->error(__('投稿できませんでした. 再度お試し下さい.'));
        // return $this->redirect($this->referer());
      }
      // return $this->redirect(['action'=>'timeline', $user_id]);
    }
     // $this->set(compact('report'));
  }

  public function addTag() {
    // $this->autoRender = false;
    $this->viewBuilder()->autoLayout(false);

    if ($this->request->is('ajax')) {
      $this->loadModel('Tags');
      $tag = $this->Tags->newEntity($this->request->data);
      if($this->Tags->save($tag)){
        $tag_id = $tag->id;
      }
      $this->set(compact('tag'));

      /* Add Notify */
      // $this->loadModel('Notifies');
      // $notify     = $this->Notifies->newEntity($this->request->data);
      $notifies   = TableRegistry::get('Notifies');
      $notify     = $notifies->newEntity($this->request->data);
      $notify->cell_tag_id = $tag_id;
      if($notifies->save($notify)){
        $this->set(compact('notify'));
      }
      // $this->Notifies->save($notify->cell_tag_id);

    }
  }

  public function addComment() {
    // $this->autoRender = false;
    $this->viewBuilder()->autoLayout(false);

    if ($this->request->is('ajax')) {
      $this->loadModel('Comments');
      $comment = $this->Comments->newEntity($this->request->data);
      $this->Comments->save($comment);
      $this->set(compact('comment'));

      $this->loadModel('Notifies');
      $notify = $this->Notifies->newEntity($this->request->data);
      $this->Notifies->save($notify);
      // $this->set(compact('notify'));

    }
  }

  public function addReportlv() {
    // $this->autoRender = false;
    $this->viewBuilder()->autoLayout(false);

    if ($this->request->is('ajax')) {
      $this->loadModel('Reportlvs');
      $reportlv = $this->Reportlvs->newEntity($this->request->data);
      $this->Reportlvs->save($reportlv);

      $this->loadModel('Notifies');
      $notify = $this->Notifies->newEntity($this->request->data);
      $this->Notifies->save($notify);
    }
  }

  public function addCommentlv() {
    // $this->autoRender = false;
    $this->viewBuilder()->autoLayout(false);

    if ($this->request->is('ajax')) {
      $this->loadModel('Commentlvs');
      $commentlv = $this->Commentlvs->newEntity($this->request->data);
      $this->Commentlvs->save($commentlv);

      $this->loadModel('Notifies');
      $notify = $this->Notifies->newEntity($this->request->data);
      $this->Notifies->save($notify);

    }
  }

  public function addTaglv() {
    // $this->autoRender = false;
    $this->viewBuilder()->autoLayout(false);

    if ($this->request->is('ajax')) {
      $this->loadModel('Taglvs');
      $taglv = $this->Taglvs->newEntity($this->request->data);
      $this->Taglvs->save($taglv);

      $this->loadModel('Notifies');
      $notify = $this->Notifies->newEntity($this->request->data);
      $this->Notifies->save($notify);

    }
  }

  public function addTaghv() {
    // $this->autoRender = false;
    $this->viewBuilder()->autoLayout(false);

    if ($this->request->is('ajax')) {
      $this->loadModel('Taghvs');
      $taghv = $this->Taghvs->newEntity($this->request->data);
      $this->Taghvs->save($taghv);

      $this->loadModel('Notifies');
      $notify = $this->Notifies->newEntity($this->request->data);
      $this->Notifies->save($notify);

    }
  }

}


 ?>
