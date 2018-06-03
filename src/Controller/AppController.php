<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller {

   public function initialize() {

       $this->loadComponent('RequestHandler');
       $this->loadComponent('Flash');

       $this->loadComponent('Auth', [
           'authorize' => ['controller'],
           'authenticate' => [
             'Form' => [
               'fields' => [
                 'username' => 'username',
                 'password' => 'password'
               ]
             ]
           ],
           'loginAction' => [
               'controller' => 'Users',
               'action' => 'login'
           ],
           'unauthorizedRedirect' => [
               'controller' => 'Users',
               'action' => 'login'
           ],
           'loginRedirect' => [
               'controller' => 'Users',
               'action' => 'index'
           ],
           'logoutRedirect' => [
               'controller' => 'Users',
               'action' => 'index',
           ],
       ]);

       $this->Auth->allow(['index']);

   }

   public function isAuthorized(){
           // //ユーザ名格納
           // $this->set('user_id', $user['id']);
           return true;
   }

   // //認証を通さないアクションがある場合のみ
   // public function beforeFilter(Event $event) {
   //   parent::beforeFilter($event);
   //   $this->Auth->allow(['index', 'add']);
   // }

      /*
       * Enable the following components for recommended CakePHP security settings.
       * see https://book.cakephp.org/3.0/en/controllers/components/security.html
       */
      //$this->loadComponent('Security');
      //$this->loadComponent('Csrf');
}
