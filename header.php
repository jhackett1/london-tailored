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

    <!-- Site header -->
    <header class="ltx-header <?php if(is_front_page()){ echo 'ltx-header--home'; }?>">

      <div class="ltx-header__masthead">
        <div class="container ltx-header__masthead-inner">
          <?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>

          <div class="ltx-header__social">
            <?php if (get_theme_mod( 'smallwins_facebook_page' )) { ?><a target="blank" class="ltx-header__social-icon" href="<?php echo get_theme_mod( 'smallwins_facebook_page' ); ?>"><i class="fab fa-facebook"></i></a><?php } ?>
            <?php if (get_theme_mod( 'smallwins_instagram_account' )) { ?><a target="blank" class="ltx-header__social-icon" href="<?php echo get_theme_mod( 'smallwins_instagram_account' ); ?>"><i class="fab fa-instagram"></i></a><?php } ?>
            <?php if (get_theme_mod( 'smallwins_twitter_account' )) { ?><a target="blank" class="ltx-header__social-icon" href="<?php echo get_theme_mod( 'smallwins_twitter_account' ); ?>"><i class="fab fa-twitter"></i></a><?php } ?>
          </div>
         
        </div>
      </div>

      <nav class="ltx-header__menu container">
        <?php wp_nav_menu(array( 'theme_location' => 'header' )); ?>
      </nav>

    </header>
