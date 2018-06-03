<?php $notifyCount = count($notifies); ?>
<?= $this->html->link($comment->body, ['controller'=>'Reports', 'action'=>'view', $comment->report_id]); ?>
<span class="card-text"><?= $comment->body ?></span>
<?php foreach ($notifies as $notify) : ?>
<?php
  // if(isset($notify->lv_report_id)) {
  //   echo 'Nullではない';
  // } else {
  //   echo 'Null';
  // }
?>
<pre><?php // print_r($notify->toArray()) ?></pre>
<?php endforeach; ?>
