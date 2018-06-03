<?php $this->assign('title', 'ぱいーん'); ?>
<?php /* ログイン機能実装後削除する */ $user_id = 9; ?>
<pre><?php //print_r($report->toArray()) ?></pre>
<?//= h($report->body) ?>
<pre><?php // print_r($lved_report_ids) ?></pre>
<pre><?php // print_r($lved_comment_ids) ?></pre>
<pre><?php // print_r($lved_tag_ids) ?></pre>
<pre><?php // print_r($hved_tag_ids) ?></pre>

<div class="report-box">
  <!-- タグにリンクと色付けをする -->
  <div class="message-box">
    <?= h($report->body)?>
  </div>
  <!-- 何枚か貼れる -->
  <div class="image-box">post-image</div>
  <div class="report-lv-box">
    <input  class="add-lv-report_id" type="hidden" name="" value="<?= $report->id ?>">
    <input  class="add-lv-user_id"   type="hidden" name="" value="<?= $report->user_id ?>">
    <button class="add-lv-btn report-lv-icon <?phpif(in_array($report->id, $lved_report_ids)) { echo 'pushed-btn'; } ?>">[☆]</button>
    <span class="report-lv-counter"><?= count($report->reportlvs)  ?></span>
  </div>
  <div class="report-comment-box">
    <!-- ページのコメント欄 /view/commentにとぶ -->
    <span class="report-comment-btn report-comment-icon">[コメント!!]</span>
    <span class="report-comment-counter"><?= count($report->comments)  ?></span>
  </div>
  <div class="tags-box">
    <?php foreach ($report->tags as $tag) : ?>
      <span class="tag-box">
        <!-- タグボディにリンクを張る（/search/tag） -->
        <span class="tag-body"><?= h($tag->body) ?></span>
        <!-- <span class="tag-lv-box">
          <input  class="add-lv-tag_id" type="hidden" name="" value="<?= $tag->id ?>">
          <input  class="add-lv-user_id"   type="hidden" name="" value="<?= $tag->user_id ?>">
          <button class="add-lv-btn tag-lv-icon <?php if(in_array($report->id, $lved_report_ids)) { echo 'pushed-btn'; } ?>">[☆]</button>
          <span class="tag-lv-counter"><?= count($tag->taglvs)  ?></span>
        </span> -->
        <!--  -->
        <span class="tag-lv-box">
          <input  class="add-lv-tag_id" type="hidden" name="" value="<?= $tag->id ?>">
          <input  class="add-lv-user_id"   type="hidden" name="" value="<?= $tag->user_id ?>">
          <span class="btn bg-primary add-lv-btn tag-lv-icon <?php if(in_array($report->id, $lved_report_ids)) { echo 'pushed-btn'; } ?>">
            [☆]<span class="tag-lv-counter"><?= count($tag->taglvs) ?></span>
          </span>
        </span>
        <!--  -->
        <!-- <span class="tag-hv-box">
          <input  class="add-hv-tag_id" type="hidden" name="" value="<?= $tag->id ?>">
          <input  class="add-hv-user_id"   type="hidden" name="" value="<?= $tag->user_id ?>">
          <button class="add-hv-btn tag-hv-icon <?php if(in_array($report->id, $hved_report_ids)) { echo 'pushed-btn'; } ?>">[f*ck]</button>
          <span class="tag-hv-counter"><?= count($tag->taghvs)  ?></span>
        </span> -->
        <span class="tag-hv-box">
          <input  class="add-hv-tag_id" type="hidden" name="" value="<?= $tag->id ?>">
          <input  class="add-hv-user_id"   type="hidden" name="" value="<?= $tag->user_id ?>">
          <span class="btn bg-primary add-hv-btn tag-hv-icon <?php if(in_array($report->id, $hved_report_ids)) { echo 'pushed-btn'; } ?>">
            [f*ck]<span class="tag-hv-counter"><?= count($tag->taghvs) ?></span>
          </span>
        </span>
      </span>
    <?php endforeach; ?>
    <!-- タグをもっと見るボタン↓ -->
    <div class="more-tag-show-btn"></div>
  </div>
  <div class="add-tag-box">タグをAjaxで送信する
    <div   class="add-tag-icon"></div>
    <input class="add-tag-body"     type="text"   name="tag-body"     value="" />
    <input class="add-tag-user_id"   type="hidden" name="tag-user_id"   value="<?= $user_id ?>">
    <input class="add-tag-report_id" type="hidden" name="tag-report_id" value="<?= $report->id ?>">
    <button class="add-tag-button" type="button" name="button" >送信</button>
  </div>
  <div class="comments-box">
    <?php foreach ($report->comments as $comment) : ?>
      <div class="comment-box">
        <div class="comment-username"><?= h($comment->user->username) ?></div>
        <div class="comment-userimg"><?= h($comment->user->plofile) ?></div>
        <div class="comment-body"><?= h($comment->body) ?></div>
        <div class="comment-lv-box">
          <input  class="add-lv-comment_id" type="hidden" name="" value="<?= $comment->id ?>">
          <input  class="add-lv-user_id"   type="hidden" name="" value="<?= $comment->user_id ?>">
          <button class="add-lv-btn comment-lv-icon <?php if(in_array($report->id, $lved_report_ids)) { echo 'pushed-btn'; } ?>">[☆]</button>
          <span class="comment-lv-counter"><?= count($comment->commentlvs)  ?></span>
        </div>
      </div>
    <?php endforeach; ?>
    <div class="add-comment-box">コメントをAjaxで送信する
      <div   class="add-comment-icon"></div>
      <input class="add-comment-body"     type="text"   name="comment-body" />
      <input class="add-comment-user_id"   type="hidden" name="comment-user_id"   value="<?= $user_id ?>">
      <input class="add-comment-report_id" type="hidden" name="comment-report_id" value="<?= $report->id ?>">
      <button class="add-comment-btn">comment</button>
    </div>
  </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    var user_id = '<?= $user_id; ?>';
</script>
<?= $this->Html->script('add_commentlv'); ?>
<?= $this->Html->script('add_reportlv'); ?>
<?= $this->Html->script('add_comment'); ?>
<?= $this->Html->script('add_tag'); ?>
<?= $this->Html->script('add_taglv'); ?>
<?= $this->Html->script('add_taghv'); ?>
