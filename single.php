<?php get_header(); ?>

<div class="site-body">
  <main class="site-content single">
    <?php
    // Start loop
    if (have_posts()):
      while(have_posts()): the_post(); ?>

      <article class="post post-single">
        <span class="post-date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
        <h1 class="post-title"><?php the_title(); ?></h1>
        <?php if( has_category() ){ ?><span class="post-categories">In <?php the_category(', '); ?></span><?php }; ?>
        <?php the_post_thumbnail() ?>
        <div class="post-content"><?php the_content(); ?></div>
        <?php if( has_tag() ){ ?><span class="post-tags">Tagged <?php the_tags('', ', '); ?></span><?php }; ?>
      </article>
	  
	  <?php if(get_post_custom( get_the_ID() )['show_tm_profile'][0] == show){

		$the_query = new WP_Query(array(
			'post_type'=>'team_members',
			'posts_per_page'=>1,
			'p'=>get_post_custom( get_the_ID() )['selected_tm_profile'][0]
		));

		// Output here
		if ($the_query->have_posts()): ?>
		<section id="tm_profile_box">
		  <?php while($the_query->have_posts()): $the_query->the_post(); ?>
			  <aside class="image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'large');?>)"></aside>
			  <aside class="text">
				<h4><?php the_title(); ?></h4>
				<?php the_content(); ?>
			  </aside>
		  <?php endwhile; ?>
		</section>
		<?php // Finish loop
		wp_reset_postdata();
		endif;
	
		} ?>
      <?php endwhile;
    // Finish loop
    endif; ?>
  </main>
  <?php get_sidebar(); ?>
</div>

<?php get_template_part('cta'); ?>

<?php get_footer(); ?>
