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
<header class="l-header p-header_col">
  <a href="<?/*php echo esc_url(home_url('/')); */?>"><?/*php bloginfo('name'); */?></a>
  <div class="u-w550">
    <h2 class="u-px10p u-mb0 u-mt5">濱田屋グループ&emsp;HAMADAYA&nbsp;GROUP</h2>
    <ul class="p-header_col u-px10 u-mt0"> 
      <li>
        <a href="<?php echo home_url(); ?>">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/img-hama_logo.png" alt="Hamadayashoten" class="">
      </a></li>
      <li class="u-ml20">
        <a href="<?php echo home_url(); ?>">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/img-hmx_logo.png" alt="Hamax" class="">
      </a>
      </li>
    </ul>
  </div>
  <div>
    <ul class="p-header_col">
      <li>日本語<a href="#"></a></li>
      <li>|</li>
      <li>English<a href="#"></a></li>
    </ul>
    <nav>
      <?php wp_nav_menu(['theme_location' => 'gmenu']); ?>
    </nav>
  </div>
</header>
