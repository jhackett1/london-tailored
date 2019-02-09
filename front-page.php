<?php get_header(); ?>
<div class="home-content">
	
  <!-- Hero -->
  <section class="ltx-hero">
    <aside class="ltx-hero__text">
      <h2 class="ltx-hero__headline"><?php echo get_theme_mod('smallwins_homepage_cta_headline') ?></h2>	
      <p class="ltx-hero__subheadline"><?php echo get_theme_mod('smallwins_homepage_cta_subheadline') ?></p>
      <?php if( get_theme_mod('smallwins_homepage_cta_link1') !== '' && get_theme_mod('smallwins_homepage_cta_link1_url') !== ''){ ?>
        <a href="<?php echo get_theme_mod('smallwins_homepage_cta_link1_url')?>" class="ltx-button ltx-hero__button"><?php echo get_theme_mod('smallwins_homepage_cta_link1') ?></a>
      <?php }?>
    </aside>
    <aside class="ltx-hero__video">
      <div class="ltx-hero__video-inner">
          <iframe src="<?php echo get_theme_mod('smallwins_homepage_video_url'); ?>" frameborder="0" title="London with your own Expert Guide" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
      </div>
    </aside>
  </section>

  <!-- Offering -->
  <section class="ltx-offering">
    <div class="container ltx-offering__inner">

      <aside class="ltx-offering__card" data-aos="fade-up" data-aos-delay="100" data-aos-once="true">
        <img class="ltx-offering__image" alt="<?php echo get_theme_mod('smallwins_homepage_sell1_headline')?>"src="<?php echo get_theme_mod('smallwins_homepage_sell1_image')?>"/>
        <div class="ltx-offering__card-inner">
          <h3 class="ltx-offering__headline"><?php echo get_theme_mod('smallwins_homepage_sell1_headline')?></h3>
          <p class="ltx-offering__description"><?php echo get_theme_mod('smallwins_homepage_sell1_description')?></p>
          <?php if( get_theme_mod('smallwins_homepage_sell1_link') !== '' ){ ?>
            <a class="ltx-button ltx-offering__button" href="<?php echo get_theme_mod('smallwins_homepage_sell1_link_url'); ?>"><?php echo get_theme_mod('smallwins_homepage_sell1_link'); ?></a>
          <?php }?>
        </div>
      </aside>

      <aside class="ltx-offering__card" data-aos="fade-up" data-aos-delay="250" data-aos-once="true">
      <img class="ltx-offering__image" alt="<?php echo get_theme_mod('smallwins_homepage_sell2_headline')?>" src="<?php echo get_theme_mod('smallwins_homepage_sell2_image')?>"/>
        <div class="ltx-offering__card-inner">
          <h3 class="ltx-offering__headline"><?php echo get_theme_mod('smallwins_homepage_sell2_headline')?></h3>
          <p class="ltx-offering__description"><?php echo get_theme_mod('smallwins_homepage_sell2_description')?></p>
          <?php if( get_theme_mod('smallwins_homepage_sell2_link') !== '' ){ ?>
            <a class="ltx-button ltx-offering__button" href="<?php echo get_theme_mod('smallwins_homepage_sell2_link_url'); ?>"><?php echo get_theme_mod('smallwins_homepage_sell2_link'); ?></a>
          <?php }?>
        </div>
      </aside>

    </div>
  </section>

  <!-- Accolades -->
  <section class="ltx-accolades">
    <div class="container ltx-accolades__inner">

      <div class="ltx-accolades__crests">
        <img class="ltx-accolades__crest" src="<?php echo get_template_directory_uri() ?>/assets/crest1.jpg"/>
        <img class="ltx-accolades__crest" src="<?php echo get_template_directory_uri() ?>/assets/crest2.jpg"/>
      </div>
            
      <div class="ltx-accolades__text">
        <h3 class="ltx-accolades__headline"><?php echo get_theme_mod('smallwins_homepage_sell3_headline')?></h3>
        <span class="ltx-accolades__stars">★★★★★</span>
        <p class="ltx-accolades__subheadling"><?php echo get_theme_mod('smallwins_homepage_sell3_description')?></p>
      </div>

    </div>
  </section>

  <!-- Tours -->
  <section class="ltx-tours">
    <div class="container ltx-tours__inner">
      <h3 class="ltx-tours__headline"><?php echo get_theme_mod('smallwins_homepage_tours_heading'); ?></h3>

      <?php
      $the_query = new WP_Query(array(
        'posts_per_page'=>'3',
        'post_type'=>'tours'
      ));
      // Output here
      if ($the_query->have_posts()): ?>
      <ul class="ltx-tours__list">
        <?php while($the_query->have_posts()): $the_query->the_post(); ?>
        <li class="ltx-tours__item" data-aos="fade-up" data-aos-delay="150" data-aos-once="true">
          <a class="ltx-tours__link" href="<?php the_permalink(); ?>">
            <img class="ltx-tours__image" src="<?php echo get_the_post_thumbnail_url($post->ID, 'large'); ?>" alt="<?php the_title(); ?>"/>
            <div class="ltx-tours__item-inner">
              <h2 class="ltx-tours__title"><?php the_title(); ?></h2>
              <span class="ltx-tours__price"><?php echo get_post_meta( $post->ID, 'price' )[0] ?></span>
            </div>
          </a>
        </li>
        <?php endwhile; ?>
      </ul>
      <?php // Finish loop
      wp_reset_postdata();
      endif;
      ?>

      <a class="ltx-button ltx-tours__button ltx-button--outline" href="/tours">All tours</a>
    </div>
  </section>

  <!-- Everything else -->
  <section class="home-insta">
    <div class="container">
      <?php the_content(); ?>
    </div>
  </section>

</div>

<?php get_template_part('cta'); ?>
<?php get_footer(); ?>