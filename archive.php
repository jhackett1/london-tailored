<?php get_header(); ?>

<div class="site-body">
  <main class="site-content archive">
    <h1 class="archive-title"><?php the_archive_title(); ?></h1>

    <?php
    // Start loop
    if (have_posts()): ?>
      <ul class="post-grid">
      <?php while(have_posts()): the_post(); ?>
        <li class="post-grid-item">
          <span class="post-date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
          <a href="<?php the_permalink(); ?>">
            <h2 class="post-title"><?php the_title(); ?></h2>
              <div class="image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'large');?>)"></div>
          </a>
        </li>
      <?php endwhile; ?>
      </ul>
    <?php
    // Finish loop
    endif; ?>

    <ul class="pagination">
      <li class="previous"><?php echo get_next_posts_link('Older posts'); ?></li>
      <li class="next"><?php echo get_previous_posts_link('Newer posts'); ?></li>
    </ul>

  </main>
</div>

<?php get_footer(); ?>
