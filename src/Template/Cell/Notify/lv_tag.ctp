<?php $notifyCount = count($notifies); ?>
<?= $this->html->link('aaaaaaa', ['controller'=>'Users', 'action'=>'alerts']); ?>
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
