<?php
$this->assign('title', '聖地');
 ?>

<div class="tag-status-bar">
  <div class="tag-status">
    <span class="tag-status-body"><?= h($tag_body) ?></span>
    <span class="tag-status-counter"><?= count($reports) ?>Reports</span>
  </div>

  <?php if (in_array($user_id, $followers)): ?>
  <button class="btn btn-primary unfollow-btn" type="button" name="button">フォローをやめる</button>
  <?php else: ?>
  <button class="btn btn-primary follow-btn" type="button" name="button">フォローする</button>
  <?php endif; ?>
</div>
<div class="timeline-wrapper" id="">
  <!-- ↓　　ここをクリックすると /view に飛ぶ -->
  <?php foreach($reports as $report) : ?>
    <div class="report-box">
      <!-- タグにリンクと色付けをする -->

      <div class="message-box">
        <?= $this->Html->link($report->body, ['action'=>'view', $report['id']]);  ?>
        <?= h($report->body) ?>
      </div>
      <!-- 何枚か貼れる -->
      <div class="image-box">
        post-image
      </div>
      <div class="report-lv-box">
        <input  class="add-lv-report_id" type="hidden" name="" value="<?= $report->id ?>">
        <input  class="add-lv-user_id"   type="hidden" name="" value="<?= $report->user_id ?>">
        <button class="btn btn-info btn-sm add-lv-btn report-lv-icon <?php if(in_array($report->id, $lved_report_ids)) { echo 'pushed-btn'; } ?>">
          [☆]
          <span class="report-lv-counter"><?= count($report->reportlvs) ?></span>
        </button>
      </div>
      <div class="report-comment-box">
        <!-- ページのコメント欄 /view/commentにとぶ -->
        <button class="btn btn-primary btn-sm report-comment-btn report-comment-icon">
          [コメント!!]
          <span class="report-comment-counter"><?= count($report->comments)  ?></span>
        </button>
      </div>
      <div class="tags-box">
        <?php foreach ($report->tags as $tag) : ?>
          <span class="btn btn-outline-primary tag-box">
            <!-- タグボディにリンクを張る（/search/tag） -->
            <span class="tag-body"><?= $this->Html->link(h($tag->body), ['action'=>'search']) ?></span>
            <span class="tag-lv-box">
              <input  class="add-lv-tag_id" type="hidden" name="" value="<?= $tag->id ?>">
              <input  class="add-lv-user_id"   type="hidden" name="" value="<?= $tag->user_id ?>">
              <button class="btn btn-info btn-sm add-lv-btn tag-lv-icon <?php if(in_array($report->id, $lved_report_ids)) { echo 'pushed-btn'; } ?>">
                [☆]  <span class="tag-lv-counter"><?= count($tag->taglvs) ?></span>
              </button></span>
              <span class="tag-hv-box">
                <input  class="add-hv-tag_id" type="hidden" name="" value="<?= $tag->id ?>">
                <input  class="add-hv-user_id"   type="hidden" name="" value="<?= $tag->user_id ?>">
                <button class="btn btn-warning btn-sm add-hv-btn tag-hv-icon <?php if(in_array($report->id, $hved_report_ids)) { echo 'pushed-btn'; } ?>">
                  [f*ck]  <span class="tag-hv-counter"><?= count($tag->taghvs) ?></span>
                </button></span>
              </span>
            <?php endforeach; ?>
            <!-- タグをもっと見るボタン↓ -->
            <div class="btn btn-outline-secondary btn-sm more-tag-show-btn">Ajaxでタグをもっと読む</div>
          </div>
          <div class="add-tag-box">タグをAjaxで送信する
            <div   class="add-tag-icon"></div>
            <input class="add-tag-body"     type="text"   name="tag-body"     value="" />
            <input class="add-tag-user_id"   type="hidden" name="tag-user_id"   value="<?= $user_id ?>">
            <input class="add-tag-report_id" type="hidden" name="tag-report_id" value="<?= $report->id ?>">
            <button class="btn btn-primary btn-sm add-tag-button" type="button" name="button" >送信</button>
          </div>
          <div class="comments-box">
            <?php foreach ($report->comments as $comment) : ?>
              <div class="card bg-light mb-3 card-body comment-box">
                <div class="comment-username"><?= h($comment->user->username) ?></div>
                <div class="comment-userimg"><?= h($comment->user->plofile) ?></div>
                <div class="card-text comment-body"><?= h($comment->body) ?></div>
                <span class="comment-lv-box">
                  <input  class="add-lv-comment_id" type="hidden" name="" value="<?= $comment->id ?>">
                  <input  class="add-lv-user_id"   type="hidden" name="" value="<?= $comment->user_id ?>">
                  <button class="btn btn-info btn-sm add-lv-btn comment-lv-icon <?php if(in_array($report->id, $lved_report_ids)) { echo 'pushed-btn'; } ?>">
                    [☆]  <span class="comment-lv-counter"><?= count($comment->commentlvs) ?></span>
                  </button>
                </span>
              </div>
            <?php endforeach; ?>
            <div class="add-comment-box">コメントをAjaxで送信する
              <div   class="add-comment-icon"></div>
              <input class="add-comment-body"     type="text"   name="comment-body" />
              <input class="add-comment-user_id"   type="hidden" name="comment-user_id"   value="<?= $user_id ?>">
              <input class="add-comment-report_id" type="hidden" name="comment-report_id" value="<?= $report->id ?>">
              <button class="btn btn-primary btn-sm add-comment-btn">comment</button>
            </div>
          </div>
        </div>
  <?php endforeach; ?>
</div>

<ul id="hoge">
    <li>トマト</li>
    <li>キャベツ</li>
    <li>もやし</li>
</ul>
<button type="button" id="more_list">もっと見る</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(function() {

  $('#more_list').click(function(){
    // $.ajax(
    //   type : "POST",
    //   url: "",
    //   dataType : "text"
    // ).done(function(data, textStatus, jqXHR){
    //   $("#hoge").append(data);
    // });
    $.get("<?= $this->Url->build(['controller' => 'Reports', 'action' => 'moreTimeline']); ?>",
    function(rs) {
      $(rs).appendTo('#hoge');
    });
  });

});
</script>
