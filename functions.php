<?php
// THEME FUNCTIONS

// Get other function files
require_once("customiser.php");

// Enqueue scripts and styles
function smallwins_enqueuer(){
  wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css?ver=2.0.0');
  wp_enqueue_style('font-awesome', get_template_directory_uri() . '/font-awesome/css/fontawesome-all.min.css');
  wp_enqueue_script('bundle', get_template_directory_uri() . '/js/bundle.js', false, false, true);
}
add_action('wp_enqueue_scripts', 'smallwins_enqueuer');

// Add support for a site logo and featured images
add_theme_support('custom-logo');
add_theme_support('post-thumbnails');

// Register two menus
register_nav_menus( array(
  'header' => 'Header',
  'footer' => 'Footer'
));

// Register a widgetised area
function smallwins_widgets_init() {
  register_sidebar( array(
      'name'          => __( 'Sidebar', 'smallwins' ),
      'id'            => 'sidebar',
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
      'name'          => __( 'Footer Left', 'smallwins' ),
      'id'            => 'footer_left',
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
      'name'          => __( 'Footer Right', 'smallwins' ),
      'id'            => 'footer_right',
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
  ) );
}
add_action('widgets_init', 'smallwins_widgets_init');

// Remove some unnecessary markup from nav menus
function smallwins_cleaner_nav_markup( $args = '' ) {
    $args['container'] = false;
    return $args;
}
add_filter( 'wp_nav_menu_args', 'smallwins_cleaner_nav_markup' );

// Prettify excerpts
function smallwins_excerpt_length( $length ) {
	return 25;
}
function smallwins_excerpt_more($more) {
  global $post;
	return '...';
}
add_filter( 'excerpt_length', 'smallwins_excerpt_length', 999 );
add_filter('excerpt_more', 'smallwins_excerpt_more');

// Remove unneeded Wordpress widgets and menus for a cleaner client experience
function smallwins_disable_dashboard_widgets() {
    remove_menu_page( 'about.php' );
    remove_meta_box('dashboard_primary', 'dashboard', 'core');// Remove WordPress Events and News
}
add_action('admin_menu', 'smallwins_disable_dashboard_widgets');

add_action( 'wp_before_admin_bar_render', function() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('wp-logo');
}, 7 );

// Do not auto-P images
function smallwins_unautop_images($content){
  return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
}
add_filter('the_content', 'smallwins_unautop_images');


// Autoplay the front page video oembed
function smallwins_autoplay_oembed( $provider, $url, $args ) {
  // Unless we're on the homepage, do nothing
  if(!is_home()) return $provider;
  // Only affect youtube and vimeo embeds
  if (strpos($provider, 'vimeo')!==FALSE) {
      $provider = add_query_arg('autoplay', 1, $provider);
  }
  if (strpos($provider, 'youtube')!==FALSE) {
      $provider = add_query_arg('autoplay', 1, $provider);
  }
  return $provider;
}
add_filter('oembed_fetch_url', 'smallwins_autoplay_oembed', 10, 3);


// Customise the wp_login logo to the site logo
function smallwins_custom_login(){
  ?>
    <style type="text/css">
      .login h1 a{
        background-image: none, url(<?php echo wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'medium' )[0]; ?>);
        background-size: contain;
      }
    </style>
  <?php
};
add_action('login_head', 'smallwins_custom_login');

// Output web font choices from customiser as CSS
function smallwins_custom_fonts_output(){
  ?>
    <style type="text/css">
      h1, h2, h3, h4, h5,
      blockquote p{
        font-family: '<?php echo get_theme_mod( 'smallwins_heading_font' ); ?>', serif;
      }
      p,
      span,
      ul li,
      a.tag-cloud-link,
      footer nav ul li,
      .nf-form-cont,
      .nf-form-cont input,
      .nf-form-cont label,
      button,
      cite,
      .wp-block-image figcaption,
      a.button,
      input[type=submit],
      header.site-header nav ul li,
      a.wp-block-button__link{
        font-family: '<?php echo get_theme_mod( 'smallwins_paragraph_font' ); ?>', sans-serif;
      }
    </style>
  <?php
};
add_action('wp_head', 'smallwins_custom_fonts_output');

add_filter( 'oembed_result', function ( $html, $url, $args ) {
	
// 	If on the homepage, stop
	if(!is_front_page()){
		return $html; 
	};
	
    $doc = new DOMDocument();
    $doc->loadHTML( $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
    $tags = $doc->getElementsByTagName( 'iframe' );

    foreach ( $tags as $tag ) {
        $iframe_src = $tag->attributes->getNamedItem('src')->value;

        if ( false !== strpos( $iframe_src, 'youtube.com' ) ) {
            // https://developers.google.com/youtube/player_parameters
            $url = add_query_arg( array(
                'autohide' => 1,
                'autoplay' => 1,
                'controls' => 2,
                'feature' => null,
                'modestbranding' => 1,
                'playsinline' => 1,
                'rel' => 0,
                'showinfo' => 0,
            ), $iframe_src );
        }

        if ( false !== strpos( $iframe_src, 'vimeo.com' ) ) {
            // https://developer.vimeo.com/player/embedding
            $url = add_query_arg( array(
                'autoplay' => 1,
                'badge' => 0,
                'byline' => 0,
                'portrait' => 0,
                'title' => 0,
            ), $iframe_src );
        }

        $tag->setAttribute( 'src', $url );

        $html = $doc->saveHTML();
    }

    return $html;
}, 10, 3 );

// Nicer category titles on archive pages
add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
});