<?php
 $this->assign('title', 'おなくなりー！');
 ?>

<div class="upload-wrapper" id="">
    <div class="file-upload-box"></div>
    <?= $this->Form->create($report) ?>
    <?= $this->Form->input('body', ['rows'=>'3']) ?>
    <?= $this->Form->button('upload') ?>
    <?= $this->Form->end() ?>
    <div class="message-upload-box"></div>
</div>
