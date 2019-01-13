<?php get_header(); ?>
<div class="home-content">
	
	<section class="ltt-hero">
    <div class="container">
		<aside class="ltt-hero__text">
			<h2><?php echo get_theme_mod('smallwins_homepage_cta_headline') ?></h2>			
			<p><?php echo get_theme_mod('smallwins_homepage_cta_subheadline') ?></p>
			<?php if( get_theme_mod('smallwins_homepage_cta_link1') !== '' && get_theme_mod('smallwins_homepage_cta_link1_url') !== ''){ ?>
			  <a href="<?php echo get_theme_mod('smallwins_homepage_cta_link1_url')?>" class="button xl filled"><?php echo get_theme_mod('smallwins_homepage_cta_link1') ?></a>
			<?php }?>
			<?php if( get_theme_mod('smallwins_homepage_cta_link2') !== '' && get_theme_mod('smallwins_homepage_cta_link2_url') !== ''){ ?>
			  <a href="<?php echo get_theme_mod('smallwins_homepage_cta_link2_url')?>" class="button xl"><?php echo get_theme_mod('smallwins_homepage_cta_link2') ?></a>
			<?php }?>
		</aside>
		<aside class="ltt-hero__video">
			<div class="video-container">
		  		<iframe src="<?php echo get_theme_mod('smallwins_homepage_video_url'); ?>" frameborder="0" title="London with your own Expert Guide" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
      		</div>
		</aside>
    </div>
</section>

<!--   <section class="home-hero">
    <h2><?php echo bloginfo('description'); ?></h2>
    <div class="container">
      <div class="video-container">
		  
		  <iframe src="<?php echo get_theme_mod('smallwins_homepage_video_url'); ?>" frameborder="0" title="London with your own Expert Guide" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
		  
      </div>
    </div>
  </section> -->

<!--   <section class="home-bold">
    <div class="container">
      <?php if( get_theme_mod('smallwins_homepage_cta_image') !== ''){ ?>
        <img src="<?php echo get_theme_mod('smallwins_homepage_cta_image') ?>"/>
      <?php } ?>
      <aside>
        <h2><?php echo get_theme_mod('smallwins_homepage_cta_headline') ?></h2>
        <p><?php echo get_theme_mod('smallwins_homepage_cta_subheadline') ?></p>
        <?php if( get_theme_mod('smallwins_homepage_cta_link1') !== '' && get_theme_mod('smallwins_homepage_cta_link1_url') !== ''){ ?>
          <a href="<?php echo get_theme_mod('smallwins_homepage_cta_link1_url')?>" class="button xl"><?php echo get_theme_mod('smallwins_homepage_cta_link1') ?></a>
        <?php }?>
        <?php if( get_theme_mod('smallwins_homepage_cta_link2') !== '' && get_theme_mod('smallwins_homepage_cta_link2_url') !== ''){ ?>
          <a href="<?php echo get_theme_mod('smallwins_homepage_cta_link2_url')?>" class="button xl filled"><?php echo get_theme_mod('smallwins_homepage_cta_link2') ?></a>
        <?php }?>
      </aside>
    </div>
  </section> -->

  <section class="home-sells">
    <div class="container">
      <aside class="home-sell">
        <div class="image" style="background-image: url(<?php echo get_theme_mod('smallwins_homepage_sell1_image')?>"></div>
        <h3><?php echo get_theme_mod('smallwins_homepage_sell1_headline')?></h3>
        <p><?php echo get_theme_mod('smallwins_homepage_sell1_description')?></p>
        <?php if( get_theme_mod('smallwins_homepage_sell1_link') !== '' ){ ?>
          <a class="button xl" href="<?php echo get_theme_mod('smallwins_homepage_sell1_link_url'); ?>"><?php echo get_theme_mod('smallwins_homepage_sell1_link'); ?></a>
        <?php }?>
      </aside>

      <aside class="home-sell">
        <div class="image" style="background-image: url(<?php echo get_theme_mod('smallwins_homepage_sell2_image')?>"></div>
        <h3><?php echo get_theme_mod('smallwins_homepage_sell2_headline')?></h3>
        <p><?php echo get_theme_mod('smallwins_homepage_sell2_description')?></p>
        <?php if( get_theme_mod('smallwins_homepage_sell2_link') !== '' ){ ?>
          <a class="button xl" href="<?php echo get_theme_mod('smallwins_homepage_sell2_link_url'); ?>"><?php echo get_theme_mod('smallwins_homepage_sell2_link'); ?></a>
        <?php }?>
      </aside>

      <aside class="home-sell">
        <div class="image" style="background-image: url(<?php echo get_theme_mod('smallwins_homepage_sell3_image')?>)"></div>
        <h3><?php echo get_theme_mod('smallwins_homepage_sell3_headline')?></h3>
        <p><?php echo get_theme_mod('smallwins_homepage_sell3_description')?></p>
        <?php if( get_theme_mod('smallwins_homepage_sell3_link') !== '' ){ ?>
          <a class="button xl" href="<?php echo get_theme_mod('smallwins_homepage_sell3_link_url'); ?>"><?php echo get_theme_mod('smallwins_homepage_sell3_link'); ?></a>
        <?php }?>
      </aside>
    </div>
  </section>

  <section class="home-tours">
    <div class="container">
      <h3><?php echo get_theme_mod('smallwins_homepage_tours_heading'); ?></h3>
      <?php if( get_theme_mod('smallwins_homepage_tours_subheading') !== '' ){ ?>
        <h4><?php echo get_theme_mod('smallwins_homepage_tours_subheading'); ?></h4>
      <?php }?>
      <?php if( get_theme_mod('smallwins_homepage_tours_description') !== '' ){ ?>
        <p><?php echo get_theme_mod('smallwins_homepage_tours_description'); ?></p>
      <?php }?>
    </div>
    <?php
    $the_query = new WP_Query(array(
    	'posts_per_page'=>'8',
      'post_type'=>'tours'
    ));

    // Output here
    if ($the_query->have_posts()): ?>
    <ul class="tour-grid">
    <?php while($the_query->have_posts()): $the_query->the_post(); ?>

    <li class="tour-grid-item" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'large');?>)">
      <a href="<?php the_permalink(); ?>">
        <h2 class="post-title"><?php the_title(); ?></h2>
		<span class="price"><?php echo get_post_meta( $post->ID, 'price' )[0] ?></span>
      </a>
    </li>

    <?php endwhile; ?>
    </ul>
    <?php // Finish loop
    wp_reset_postdata();
    endif;
    ?>
  </section>

  <section class="home-insta">
    <div class="container">
      <?php the_content(); ?>
    </div>
  </section>

</div>



  <?php get_template_part('cta'); ?>
<?php get_footer(); ?>