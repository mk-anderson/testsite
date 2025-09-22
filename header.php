<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
<!-- テスト用：後で削除 -->
<!--<script type="module" src="http://localhost:5173/@vite/client"></script>-->
<!--<script type="module" src="http://localhost:5173/assets/js/main.js"></script>-->
</head>
<body <?php body_class(); ?>>
<header class="l-header">
  <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
</header>
