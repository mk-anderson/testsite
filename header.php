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
  <div>
    <h2>濱田屋グループ&emsp;HAMADAYA&nbsp;GROUP</h2>
    <ul> 
      <li>
        <a href="<?php echo home_url(); ?>">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/img-hama_logo.png" alt="Hamadayashoten" class="">
      </a></li>
      <li>
        <a href="<?php echo home_url(); ?>">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/img-hmx_logo.png" alt="Hamax" class="">
      </a>
      </li>
    </ul>
  </div>
  <div>
    <ul>
      <li>日本語<a href="#"></a></li>
      <li>|</li>
      <li>English<a href="#"></a></li>
    </ul>
    <nav>
      <ul>
        <li>
          <?php wp_nav_menu(['theme_location' => 'gmenu']); ?>
        </li>
      </ul>
    </nav>
  </div>
</header>
