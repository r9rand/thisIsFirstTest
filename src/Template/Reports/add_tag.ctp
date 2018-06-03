<span class="tag-box">
  <span class="tag-body"><?= h($tag->body) ?></span>
  <button class="tag-lv-btn tag-lv-icon new-added-tag">[☆]</button>
  <span class="tag-lv-counter"></span>
  <button class="tag-hv-btn tag-hv-icon">[f*ck]</button>
  <span class="tag-hv-counter"></span>
  <?= '　' ?>
</span>
<pre><?php print_r( $notify->toArray() ) ?></pre>
<pre><?php var_dump($notify) ?></pre>
