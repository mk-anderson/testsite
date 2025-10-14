<?php get_header(); ?>
<main class="p-main">
  <h1 class="u-text-color1 u-text-fntfam1"><?php the_title(); ?></h1>
  <p><?php bloginfo('name'); ?></p>
  <p><?php bloginfo('description'); ?></p>
  <?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
</main>
<?php get_footer(); ?>