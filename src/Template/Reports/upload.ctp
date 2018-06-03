<?php
 $this->assign('title', 'おなくなりー！');
 ?>

<div class="upload-wrapper" id="">
    <div class="file-upload-box"></div>
    <div class="message-upload-box"></div>
    <div class="">
      <pre>
        <?php  print_r($this->request->data) ?>
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
<?= $this->Form->textarea('body', ['rows' => '10']) ?>
<?= $this->Form->file('img') ?>
</fieldset>
<?= $this->Form->button(__('投稿する')) ?>
<?= $this->Form->end() ?>
