<?php $this->assign('title', 'tuuchi'); ?>

<?php

echo $user_id;

foreach($notifies as $notify) { ?>
<p class="card bg-light card-body mb-3">
<?php
if (isset($notify->lv_report_id)) {
  echo h($notify->user->username) . 'さんが' ;
  echo "あなたの投稿にいいねしました";
  $cell = $this->cell('Notify::lv_report', [$notify->lv_report_id]);

} elseif (isset($notify->tag_report_id)) {
  echo h($notify->user->username) . 'さんが' ;
  echo "あなたの投稿にタグをつけました";
  $cell = $this->cell('Notify::tag_report', [$notify->tag_report_id]);

} elseif (isset($notify->comment_report_id)) {
  echo h($notify->user->username) . 'さんが' ;
  echo "あなたの投稿にコメントしました";
  $cell = $this->cell('Notify::comment_report', [$notify->comment_report_id]);

} elseif (isset($notify->lv_comment_id)) {
  echo h($notify->user->username) . 'さんが' ;
  echo "あなたのコメントにいいねしました";
  $cell = $this->cell('Notify::lv_comment', [$notify->lv_comment_id]);

} elseif (isset($notify->lv_tag_id)) {
  echo h($notify->user->username) . 'さんが' ;
  echo "あなたのタグにいいねしました";
  $cell = $this->cell('Notify::lv_tag', [$notify->lv_tag_id]);

} elseif (isset($notify->hv_tag_id)) {
  echo h($notify->user->username) . 'さんが' ;
  echo "あなたのタグによくないねしました";
  $cell = $this->cell('Notify::hv_tag', [$notify->hv_tag_id]);
}

echo $cell->render();

 ?>
</p>

<?php } ?>
