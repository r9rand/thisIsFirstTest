<?php
$this->assign('title', 'おほほい');
 ?>

<div class="timeline-wrapper" id="">
  <!-- ↓　　ここをクリックすると /view に飛ぶ -->
  <?php foreach($reports as $report) : ?>
    <div class="post-box">
      <!-- タグにリンクと色付けをする -->
      <div class="message-box">
        <?= $this->Html->link($report->body, ['action'=>'view', $report['id']]);  ?>
      </div>
      <!-- 何枚か貼れる -->
      <div class="image-box">post-image</div>
      <div class="favorite-box">　
        <!-- Ajax -->
        <div class="favorite-btn"></div>
        <div class="favorite-number"></div>　
      </div>　
      <div class="comment-box">
        <!-- ページのコメント欄 /view/commentにとぶ -->
        <div class="comment-btn"></div>
        <div class="comment-number"></div>
      </div>
      <div class="tags-box">
        <div class="tag-box">
          <!-- タグボディにリンクを張る（/search/tag） -->
          <div class="tag-body">
            <?php if (count($report->tags)) : ?>
              <?php foreach ($report->tags as $tag) : ?>
                <li>
                  <?= h($tag->body) ?>
                </li>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <div class="favorite-btn"></div>
          <div class="favorite-number"></div>
        </div>
        <!-- タグをもっと見るボタン↓ -->
        <div class="more-tag-show-btn"></div>
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
