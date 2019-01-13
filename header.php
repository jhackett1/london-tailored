<!DOCTYPE html>
 <html <?php language_attributes(); ?>>
 	<head>
 		<meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title('-', true, 'right'); ?></title>
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
    <?php echo get_theme_mod( 'smallwins_web_fonts_link' ); ?>

    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php get_template_part('social-meta'); ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class( 'frontend' ); ?>>
    <header class="site-header">
      <div class="container">
        <?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
        <nav class="main-menu">
          <?php wp_nav_menu(array( 'theme_location' => 'header' )); ?>
          <?php if (get_theme_mod( 'smallwins_facebook_page' )) { ?><a class="social-icon" href="<?php echo get_theme_mod( 'smallwins_facebook_page' ); ?>"><i class="fab fa-facebook"></i></a><?php } ?>
          <?php if (get_theme_mod( 'smallwins_instagram_account' )) { ?><a class="social-icon" href="<?php echo get_theme_mod( 'smallwins_instagram_account' ); ?>"><i class="fab fa-instagram"></i></a><?php } ?>
          <?php if (get_theme_mod( 'smallwins_twitter_account' )) { ?><a class="social-icon" href="<?php echo get_theme_mod( 'smallwins_twitter_account' ); ?>"><i class="fab fa-twitter"></i></a><?php } ?>
        
			<?php if (get_theme_mod( 'ltt-cta' )) { ?><a class="button button--global" href="<?php echo get_theme_mod( 'ltt-cta' ); ?>">Book now</a><?php } ?>
        
			
		  </nav>
      </div>
    </header>
