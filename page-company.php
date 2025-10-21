<?php get_header(); ?>
<main class="p-main">
  <h1 class="u-text-color2 u-text-fntfam1 u-posi-re">
    <p class="u-posi-ab p-pagetitle_txt"><?php the_title(); ?></p>
    <picture class="u-posi-ab u-mtn120">
				<source class="#" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/img-pagehead_back.jpg" media="(min-width: 376px)" alt="ページタイトル背景">
        <img class="p-pagetitle" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/img-pagehead_back.jpg" alt="ページタイトル背景">
		</picture>
  </h1>
  <p><?php bloginfo('name'); ?></p>
  <p><?php bloginfo('description'); ?></p>
  <?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
</main>
<?php get_footer(); ?>