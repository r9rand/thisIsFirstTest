<?php
 $this->assign('title', 'おなくなりー！');
 ?>

<div class="upload-wrapper" id="">
    <div class="file-upload-box"></div>
    <?//= $this->Form->create($report) ?>
    <?//= $this->Form->input('body', ['rows'=>'3']) ?>
    <?//= $this->Form->file('img') ?> <!-- クライアントサイド -->
    <?//= $this->Form->button('upload') ?>
    <?//= $this->Form->end() ?>
    <div class="message-upload-box"></div>
    <div class="">
      <pre>
        <?php  print_r($this->request->data) ?>
        <?php // print_r($report1) ?>
      </pre>
    </div>
</div>

<div class="">

</div>

<?= $this->Form->create($report, array(
    'url' => array('action' => 'upload'),
    'type' => 'file',                     //add
    )) ?>
<fieldset>
<?= $this->Form->input('body') ?>
<?= $this->Form->file('img') ?>
</fieldset>
<?= $this->Form->button(__('投稿する')) ?>
<?= $this->Form->end() ?>
