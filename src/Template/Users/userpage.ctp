<?php $this->assign('title', 'userpage'); ?>
<?php // var_dump($followingTags); ?>
<pre><?php // print_r($followingTags) ?></pre>


<div class="profile">
  <pre><?php print_r($user) ?></pre>
  <div class="">
    <?= $user->username ?>
  </div>
  <div class="">
    <?= $user->profile_img_name ?>
  </div>
  <div class="">
    <?= $user->profile_text ?>
  </div>
</div>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a href="#tab1" class="nav-link active" data-toggle="tab">タブ1</a>
  </li>
  <li class="nav-item">
    <a href="#tab2" class="nav-link" data-toggle="tab">タブ2</a>
  </li>
  <li class="nav-item">
    <a href="#tab3" class="nav-link" data-toggle="tab">タブ3</a>
  </li>
</ul>

<div class="tab-content">
  <div id="tab1" class="tab-pane active">
    <div class="reports">
      <?php if (isset($reports)): ?>
        <?php foreach ($reports as $report): ?>
          <div class=""><?= $report->body ?></div>
          <div class="">
            <?= count($report->tags) ?>
          </div>
          <div class="">
            <?= count($report->comments) ?>
          </div>
          <div class="">
            <?= count($report->reportlvs) ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
  <div id="tab2" class="tab-pane">
    <div class="tags">
      <?php if (isset($tags)): ?>
        <?php foreach ($tags as $tag): ?>
          <div class=""><?= $tag->body ?></div>
          <div class="">
            <?= count($tag->taglvs) ?>
          </div>
          <div class="">
            <?= count($tag->taghvs) ?>
          </div>
          <div class="">
            <?= 'report is ' . $tag->report->body ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
  <div id="tab3" class="tab-pane">
    <div class="followingTags">
    <?php if (isset($followingTags)): ?>
      <?php foreach ($followingTags as $followingTag): ?>
        <div class=""><?= 'following tag is ' . $followingTag->tag_body ?></div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  </div>
</div>
