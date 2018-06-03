<?php

?>
<?php var_dump($kon) ?>
<pre>
  <?php print_r($data) ?>
</pre>
<pre>
  <?php print_r($user) ?>
</pre>


<div class="userprofile-edit form">
  <?= $this->Form->create($user, array(
    'type' => 'file' )) ?>
  <fieldset>
    <legend><?= __('ユーザー情報の変更') ?></legend>
    <?= $this->Form->control('username') ?>
    <?= $this->Form->control('email') ?>
    <?= $this->Form->control('password') ?>
    <?= $this->Form->control('profile_text') ?>
    <?= $this->Form->file('img') ?>
  </fieldset>
  <?= $this->Form->button(__('編集完了')); ?>
  <?= $this->Form->end() ?>
</div>
