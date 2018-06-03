<?php

namespace App\View\Cell;

use Cake\ORM\TableRegistry;
// use App\Controller\AppController;
use Cake\View\Cell;

class NotifyCell extends Cell {

  public function display($user_id) {

    // $this->loadComponent('Auth');
    // $user_id = $this->Auth->user('id');

    // $this->loadModel('Notifies');
    $notifies = TableRegistry::get('Notifies');
    $notifies = $notifies->find()
                         ->where([
                          'user_id IS NOT' => $user_id,
                          'to_user_id' => $user_id,
                          'is_readed' => 0
                         ])
                         ->contain('Users')
                         ->all();
    $this->set(compact('notifies'));
    $countNotifies = count($notifies);
    $this->set(compact('countNotifies'));
    $this->set(compact('user_id'));
    // $this->set('unread_count', $unread->count());
    // ->contain([
    //    'Reports' => ['Reportlvs', 'Comments', 'Tags'],
    //    'Tags' => ['Taglvs', 'Taghvs'],
    //    'Comments' => ['Commentlvs'] //,
    //    // 'Users'
    // ])

  }

  public function lv_report($report_id) {
    $report = TableRegistry::get('Reports')->get($report_id);
    $this->set(compact('report'));
  }

public function tag_report($report_id /* , $tag_id */) {
    $report = TableRegistry::get('Reports')->get($report_id);
    $this->set(compact('report'));

    /* NotifiesにTag_idをつくったら */
    // $tags = TableRegistry::get('Tags');
    // $tag = $tags->find()
    //             ->where([
    //               'cell_tag_id' => $tag_id
    //             ])
    //             ->all();
    // $this->set(compact('tag'));
  }

public function comment_report($report_id /* , $comment_id */) {
    $report = TableRegistry::get('Reports')
      ->get($report_id, [
        'contain' => ['Reportlvs']
      ]);
    $this->set(compact('report'));

    /* NotifiesにTag_idをつくったら */
    // $tags = TableRegistry::get('Tags');
    // $tag = $tags->find()
    //             ->where([
    //               'cell_tag_id' => $tag_id
    //             ])
    //             ->all();
    // $this->set(compact('tag'));
  }

  public function lv_comment($comment_id) {
    $comment = TableRegistry::get('Comments')->get($comment_id);
    $this->set(compact('comment'));
  }

  public function lv_tag($tag_id) {
    $this->set(compact('tag_id'));
  }

  public function hv_tag($tag_id) {
    $this->set(compact('tag_id'));
  }

}

 ?>
