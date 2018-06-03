<!DOCTYPE html>
<html lang="ja">
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <style>

    body {background-color: lightgray;}
    header {background-color: palegreen;}
    main {background-color: lightblue;}
    footer {background-color: hotpink;}

    </style>
</head>
<body>
  <script type="text/javascript">
  var user_id = '<?= $user_id; ?>';
  console.log('user_id is ' + user_id);
  </script>
    <?= $this->element('header_alerts') ?>
    <?= $this->element('footer_alerts') ?>
    <?= $this->fetch('content') ?>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
    <?= $this->Html->css('bootstrap/bootstrap.css') ?>
    <?= $this->Html->script('bootstrap/bootstrap.js') ?>
    <?= $this->Html->script('add_commentlv'); ?>
    <?= $this->Html->script('add_reportlv'); ?>
    <?= $this->Html->script('add_comment'); ?>
    <?= $this->Html->script('add_tag'); ?>
    <?= $this->Html->script('add_taglv'); ?>
    <?= $this->Html->script('add_taghv'); ?>
    <?= $this->Html->script('load_more_timeline'); ?>
    <?= $this->Html->script('follow_tag'); ?>
    <?= $this->Html->script('unfollow_tag'); ?>
    <?= $this->Html->script('dress_tags'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
</body>
</html>
