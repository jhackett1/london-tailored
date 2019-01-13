<?php /* Template Name: Blank layout */ ?>
<?php get_header(); ?>

<div class="site-body">
  <main class="site-content single">
    <?php
    // Start loop
    if (have_posts()):
      while(have_posts()): the_post(); ?>

      <article class="post page">
        <div class="post-content"><?php the_content(); ?></div>
      </article>

      <?php endwhile;
    // Finish loop
    endif; ?>
  </main>
</div>

<?php get_template_part('cta'); ?>

<?php get_footer(); ?>
