<?php $notifyCount = count($notifies); ?>
<?php $alert = '通知が' . h($countNotifies) . '件来ています'; ?>

<button type="button" class="btn btn-primary">
  Notifications<span class="badge badge-light"><?= h($countNotifies) ?></span>
</button>

<?= $this->html->link($alert, ['controller'=>'Users', 'action'=>'alerts']); ?>
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
