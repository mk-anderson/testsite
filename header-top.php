<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class('is-front'); ?>>

<header class="p-header p-header--top">
  <div class="l-container">
    <h1 class="p-header__logo">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <?php bloginfo('name'); ?>（トップ専用）
      </a>
    </h1>
    <!-- ここにトップページ専用ナビや要素 -->
  </div>
</header>
