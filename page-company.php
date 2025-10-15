<?php get_header(); ?>
<main class="p-main">
  <h1 class="u-text-color1 u-text-fntfam1">
    <?php the_title(); ?>
    <picture>
				<source class="p-pagetitle" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/img-pagehead_back.jpg" media="(min-width: 376px)" alt="ページタイトル背景">
		</picture>
  </h1>
  <p><?php bloginfo('name'); ?></p>
  <p><?php bloginfo('description'); ?></p>
  <?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
</main>
<?php get_footer(); ?>