<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="signup form">
  <?= $this->Flash->render('auth') ?>
  <?= $this->Form->create() ?>
  <fieldset>
    <legend><?= __('初めての方は登録してください') ?></legend>
    <?= $this->Form->control('username') ?>
    <?= $this->Form->control('email') ?>
    <?= $this->Form->control('password') ?>
    <?php // $this->Form->control('role') ?>
  </fieldset>
  <?= $this->Form->button(__('Signup')); ?>
  <?= $this->Form->end() ?>
</div>
