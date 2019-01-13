<?php get_header(); ?>

<div class="site-body">
  <main class="site-content">
    <?php
    // Start loop
    if (have_posts()):
      while(have_posts()): the_post(); ?>

      <article class="post">
        <span class="post-date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
        <a href="<?php the_permalink(); ?>">
          <h2 class="post-title"><?php the_title(); ?></h2>
          <?php the_post_thumbnail() ?>
        </a>
        <p class="post-excerpt"><?php the_excerpt(); ?></p>
      </article>

      <?php endwhile;
    // Finish loop
    endif; ?>

    <ul class="pagination">
      <li class="previous"><?php echo get_next_posts_link('Older posts'); ?></li>
      <li class="next"><?php echo get_previous_posts_link('Newer posts'); ?></li>
    </ul>

  </main>
  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
