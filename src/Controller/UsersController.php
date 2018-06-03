<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event; // ← 追加 //
use Cake\ORM\TableRegistry;
use Cake\ORM\Query;

class UsersController extends AppController {

  ////////////////////////
  public $components = array(
      'IconProcess' => array(),
  );
  ////////////////////////

  public function initialize() {
    $this->viewBuilder()->autoLayout(true);
    $this->viewBuilder()->layout('reports_layout');
  }

  public function beforeFilter(Event $event) {
    parent::initialize($event);
    parent::beforeFilter($event);
    $this->Auth->allow(['index', 'add', 'logout', 'alerts', 'userpage']); /* userpageを入れているのってそもそもログインのことわかってない... */
  }

  public function alerts() {
    $user_id  = $this->Auth->user('id');
    $this->loadModel('Notifies');
    $notifies = $this->Notifies->find()
                         ->where([
                            'user_id IS NOT' => $user_id,
                            'to_user_id' => $user_id,
                            'is_readed' => 0
                          ])
                         ->contain('Users')
                         ->all();
    $this->set(compact('notifies'));
    $this->set(compact('user_id'));

    /* 通知画面に飛ぶと通知の$notifyをすべて既読にする　*/
    $notifies = TableRegistry::get('Notifies');
    // $query = $notifies->query();
    // $query->update()
    //       ->set(['is_readed' => true])
    //       ->where([
    //         'to_user_id' => $user_id,
    //         'is_readed' => 0
    //       ])
    //       ->execute();

    /* 通知画面に飛ぶと通知の$notifyをすべて未読にする　*/
    // $notifies = TableRegistry::get('Notifies');
    // $query = $notifies->query();
    // $query->update()
    //       ->set(['is_readed' => false])
    //       ->where([
    //         'to_user_id' => $user_id,
    //         'is_readed' => 1
    //       ])
    //       ->execute();
    // */
  }

  public function userpage($user_id = 9) {
    $user = $this->Users->get($user_id);
    $this->set(compact('user'));

    $this->loadModel('Reports');
    $reports = $this->Reports->find()
                             ->where(['user_id' => $user_id])
                             ->contain([
                               'Reportlvs',
                               'Comments',
                               'Tags'
                             ])
                             ->all();
    $this->set(compact('reports'));

    $this->loadModel('Tags');
    $tags = $this->Tags->find()
                       ->where(['Tags.user_id' => $user_id])
                       ->contain([
                         'Taglvs',
                         'Taghvs',
                         'Reports'
                       ])
                       ->all();
    $this->set(compact('tags'));

    $this->loadModel('Followings');
    $followingTags = $this->Followings->find()
                                      ->where(['follower_id' => $user_id])
                                      // ->contain([
                                      //   'SubFollowings' /* 意味不 */
                                      // ])
                                      ->all();
    $this->set(compact('followingTags'));

    // $this->loadModel('Followings');
    // $followingTags = $this->Followings->find()
    //                                   ->where(['follower_id' => $user_id])
    //                                   ->contain([
    //                                     'SubFollowings' /* 意味不 */
    //                                   ])
    //                                   ->all();
    //
    // $this->set(compact('followingTags'));

  }

  public function login() {
    if ($this->request->is('post')) {
      $user = $this->Auth->identify();
      if ($user) {
        $this->Auth->setUser($user);
        return $this->redirect(['controller' => 'Reports', 'action' => 'timeline', $this->Auth->user('id')]); // 変数$user_idをtimeline($user_id = null){ } に渡す
      }
      $this->Flash->error(__('ユーザ名もしくはパスワードが間違っています'));
    }
  }

  public function add()  {
      $user = $this->Users->newEntity();
      if ($this->request->is('post')) {
          $user = $this->Users->patchEntity($user, $this->request->getData());
          if ($this->Users->save($user)) {
              $this->Flash->success(__('The user has been saved.'));
              // return $this->redirect(['controller'=>'users', 'action' => 'index']);
              return $this->redirect(['controller' => 'Users', 'action' => 'index']); // return $this->redirect($this->Auth->redirectUrl());
          }
          $this->Flash->error(__('The user could not be saved. Please, try again.'));
      }
      $this->set(compact('user'));
  }

  public function logout() {
    // $this->request->session()->destroy();
    $this->Flash->success('ログアウトしました。');
    return $this->redirect($this->Auth->logout());
  }

  public function followTag() {
    $this->loadModel('Followings');
    $following = $this->Followings->newEntity($this->request->data);
    $this->Followings->save($following);
  }

  public function unfollowTag() {
    $this->request->allowMethod(['post', 'delete']);
    $follower_id = $this->request->data['follower_id'];
    $tag_body    = $this->request->data['tag_body'];
    $this->loadModel('Followings');
    // $this->deleteAll(['follower_id' => $follower_id, 'tag_body' => $tag_body]);
    $following = $this->Followings->find()
                                  ->where([
                                    'follower_id' => $follower_id,
                                    'tag_body' => $tag_body
                                    ])
                                    ->first();
    if ($this->Followings->delete($following)) {
        $this->Flash->success(__('The user has been deleted.'));
    } else {
        $this->Flash->error(__('The user could not be deleted. Please, try again.'));
    }
    $this->set(compact('following'));

  }

  public function edit($id = null) {
      $user = $this->Users->get($id);
      $data = $this->request->data;
      $kon = 'konnnitiha!!';

      if (!empty($this->request->data['img']['name'])) {
        $this->IconProcess->save($this->request);
      } else {
        $this->set(compact('kon'));
      }
      $this->set(compact('data'));



      if ($this->request->is(['patch', 'post', 'put'])) {
        $user = $this->Users->patchEntity($user, $this->request->getData());
        if ($this->Users->save($user)) {
          if(!empty($this->request->data['img']['name'])) {
            $this->IconProcess->generate($this->request->data['img']['tmp_name'], $user);
          }
          $this->Flash->success(__('The user has been saved.'));

          // return $this->redirect(['action' => 'userpage', $user->id]);
        }
        $this->Flash->error(__('The user could not be saved. Please, try again.'));
      }
      $this->set(compact('user'));
  }

  /**
   * Delete method
   *
   * @param string|null $id User id.
   * @return \Cake\Http\Response|null Redirects to index.
   * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
   */

  public function delete($id = null)  {
      $this->request->allowMethod(['post', 'delete']);
      $user = $this->Users->get($id);
      if ($this->Users->delete($user)) {
          $this->Flash->success(__('The user has been deleted.'));
      } else {
          $this->Flash->error(__('The user could not be deleted. Please, try again.'));
      }

      return $this->redirect(['action' => 'index']);
  }
}
