<?php
// CUSTOMISER SETTINGS

function smallwins_customiser($wp_customize){

  // SOCIAL SHARING
  // Section
  $wp_customize->add_section('smallwins_sharing', array(
    'title' => __('Social Sharing', 'Small Wins'),
    'priority' => 30
  ));
  // Settings
  $wp_customize->add_setting('smallwins_default_social_share_image', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_twitter_account', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_instagram_account', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_facebook_page', array(
    'transport' => 'refresh',
  ));
	
	// $wp_customize->add_setting('ltt-cta', array(
  //   'transport' => 'refresh',
  // ));
	
  // Controls
  $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'smallwins_default_social_share_image', array(
    'label' => __('Default social share image'),
    'settings' => 'smallwins_default_social_share_image',
    'section' => 'smallwins_sharing',
    'description' => "If someone shares an page that does not have a featured image, this one will be used instead."
  )));
  $wp_customize->add_control(
    'smallwins_twitter_account',
    array(
        'label' => 'Twitter username (without @ symbol)',
        'section' => 'smallwins_sharing',
        'type' => 'text',
    )
  );
  $wp_customize->add_control(
    'smallwins_instagram_account',
    array(
        'label' => 'Instagram username',
        'section' => 'smallwins_sharing',
        'type' => 'text',
    )
  );
  $wp_customize->add_control(
    'smallwins_facebook_page',
    array(
        'label' => 'Facebook page URL',
        'section' => 'smallwins_sharing',
        'type' => 'text'
    )
  );

  // WEB FONTS
  // Section
  $wp_customize->add_section('smallwins_fonts', array(
    'title' => __('Web Fonts', 'Small Wins'),
    'priority' => 30,
    // 'description' => "Provide a link to and the names of web fonts you would like to use."
  ));
  // Settings
  $wp_customize->add_setting('smallwins_web_fonts_link', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_heading_font', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_paragraph_font', array(
    'transport' => 'refresh',
  ));
  // Controls
  $wp_customize->add_control(
    'smallwins_web_fonts_link',
    array(
        'label' => 'Web fonts HTML link tag',
        'section' => 'smallwins_fonts',
        'type' => 'text',
        'description' => "Provide the embeddable <link/> tag for the web fonts you would like to use."
    )
  );
  $wp_customize->add_control(
    'smallwins_heading_font',
    array(
        'label' => 'Heading font',
        'section' => 'smallwins_fonts',
        'type' => 'text',
    )
  );
  $wp_customize->add_control(
    'smallwins_paragraph_font',
    array(
        'label' => 'Paragraph font',
        'section' => 'smallwins_fonts',
        'type' => 'text',
    )
  );

  // CTA BAR
  // Section
  $wp_customize->add_section('smallwins_cta', array(
    'title' => __('Call To Action Bar', 'Small Wins'),
    'priority' => 30,
    // 'description' => "Provide a link to and the names of web fonts you would like to use."
  ));
  // Setting
  $wp_customize->add_setting('smallwins_cta_headline', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_cta_subheadline', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_cta_link', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_cta_link_url', array(
    'transport' => 'refresh',
  ));
  // Controls
  // $wp_customize->add_control(
  //   'ltt-cta',
  //   array(
  //       'label' => 'Header button link',
  //       'section' => 'smallwins_cta',
  //       'type' => 'textarea',
  //       'description' => "Where should the 'book now' button in the header link to?"
  //   )
  // );
  $wp_customize->add_control(
    'smallwins_cta_headline',
    array(
        'label' => 'Headline',
        'section' => 'smallwins_cta',
        'type' => 'text'
    )
  );
  $wp_customize->add_control(
    'smallwins_cta_subheadline',
    array(
        'label' => 'Subheadline',
        'section' => 'smallwins_cta',
        'type' => 'text'
    )
  );
  $wp_customize->add_control(
    'smallwins_cta_link',
    array(
        'label' => 'Link text',
        'section' => 'smallwins_cta',
        'type' => 'text'
    )
  );
  $wp_customize->add_control(
    'smallwins_cta_link_url',
    array(
        'label' => 'Link URL',
        'section' => 'smallwins_cta',
        'type' => 'text'
    )
  );


  $wp_customize->add_panel( 'smallwins_homepage', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Home Page', 'Small Wins'),
    'description'    => __('Customise the homepage'),
  ) );

  // HOMEPAGE
  // Section
  $wp_customize->add_section('smallwins_homepage_hero', array(
    'title' => __('Hero Section', 'Small Wins'),
    'priority' => 10,
    'panel' => 'smallwins_homepage'
  ));
  $wp_customize->add_section('smallwins_homepage_sell1', array(
    'title' => __('Sell 1', 'Small Wins'),
    'priority' => 21,
    'panel' => 'smallwins_homepage'
  ));
  $wp_customize->add_section('smallwins_homepage_sell2', array(
    'title' => __('Sell 2', 'Small Wins'),
    'priority' => 22,
    'panel' => 'smallwins_homepage'
  ));
  $wp_customize->add_section('smallwins_homepage_sell3', array(
    'title' => __('Accolades Section', 'Small Wins'),
    'priority' => 23,
    'panel' => 'smallwins_homepage'
  ));
  // $wp_customize->add_section('smallwins_homepage_cta', array(
  //   'title' => __('H', 'Small Wins'),
  //   'priority' => 11,
  //   'panel' => 'smallwins_homepage'
  // ));
  $wp_customize->add_section('smallwins_homepage_tours', array(
    'title' => __('Popular Tours Section', 'Small Wins'),
    'priority' => 30,
    'panel' => 'smallwins_homepage'
  ));
  $wp_customize->add_section('smallwins_homepage_photos', array(
    'title' => __('Photos Section', 'Small Wins'),
    'priority' => 40,
    'panel' => 'smallwins_homepage'
  ));

  // Settings
  $wp_customize->add_setting('smallwins_homepage_video_url', array(
    'transport' => 'refresh',
  ));
  // $wp_customize->add_setting('smallwins_homepage_tours_description', array(
  //   'transport' => 'refresh',
  // ));
  $wp_customize->add_setting('smallwins_homepage_tours_heading', array(
    'transport' => 'refresh',
  ));
  // $wp_customize->add_setting('smallwins_homepage_tours_subheading', array(
  //   'transport' => 'refresh',
  // ));
  $wp_customize->add_setting('smallwins_homepage_sell1_headline', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_homepage_sell1_image', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_homepage_sell1_description', array(
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('smallwins_homepage_sell2_headline', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_homepage_sell2_image', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_homepage_sell2_description', array(
    'transport' => 'refresh',
  ));

  $wp_customize->add_setting('smallwins_homepage_sell3_headline', array(
    'transport' => 'refresh',
  ));
  // $wp_customize->add_setting('smallwins_homepage_sell3_image', array(
  //   'transport' => 'refresh',
  // ));
  $wp_customize->add_setting('smallwins_homepage_sell3_description', array(
    'transport' => 'refresh',
  ));

  // $wp_customize->add_setting('smallwins_homepage_cta_image', array(
  //   'transport' => 'refresh',
  // ));
  $wp_customize->add_setting('smallwins_homepage_cta_headline', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_homepage_cta_subheadline', array(
    'transport' => 'refresh',
  ));
  // $wp_customize->add_setting('smallwins_homepage_cta_link1', array(
  //   'transport' => 'refresh',
  // ));
  // $wp_customize->add_setting('smallwins_homepage_cta_link2', array(
  //   'transport' => 'refresh',
  // ));
  // $wp_customize->add_setting('smallwins_homepage_cta_link1_url', array(
  //   'transport' => 'refresh',
  // ));
  // $wp_customize->add_setting('smallwins_homepage_cta_link2_url', array(
  //   'transport' => 'refresh',
  // ));

  $wp_customize->add_setting('smallwins_homepage_sell1_link', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_homepage_sell1_link_url', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_homepage_sell2_link', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_homepage_sell2_link_url', array(
    'transport' => 'refresh',
  ));
  // $wp_customize->add_setting('smallwins_homepage_sell3_link', array(
  //   'transport' => 'refresh',
  // ));
  // $wp_customize->add_setting('smallwins_homepage_sell3_link_url', array(
  //   'transport' => 'refresh',
  // ));
  $wp_customize->add_setting('smallwins_homepage_instagram', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_homepage_instagram_heading', array(
    'transport' => 'refresh',
  ));



  // Controls
  $wp_customize->add_control(
    'smallwins_homepage_instagram_heading',
    array(
        'label' => 'Heading',
        'section' => 'smallwins_homepage_photos',
        'type' => 'text'
    )
  );	 
  $wp_customize->add_control(
    'smallwins_homepage_instagram',
    array(
        'label' => 'Content or shortcode',
        'section' => 'smallwins_homepage_photos',
        'type' => 'text'
    )
  );
  $wp_customize->add_control(
    'smallwins_homepage_tours_heading',
    array(
        'label' => 'Headline',
        'section' => 'smallwins_homepage_tours',
        'type' => 'text'
    )
  );
  // $wp_customize->add_control(
  //   'smallwins_homepage_tours_subheading',
  //   array(
  //       'label' => 'Subheadline',
  //       'section' => 'smallwins_homepage_tours',
  //       'type' => 'text'
  //   )
  // );
  // $wp_customize->add_control(
  //   'smallwins_homepage_tours_description',
  //   array(
  //       'label' => 'Description',
  //       'section' => 'smallwins_homepage_tours',
  //       'type' => 'textarea'
  //   )
  // );

  // $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'smallwins_homepage_cta_image', array(
  //   'label' => __('Image'),
  //   'settings' => 'smallwins_homepage_cta_image',
  //   'section' => 'smallwins_homepage_cta'
  // )));
  $wp_customize->add_control(
    'smallwins_homepage_cta_headline',
    array(
        'label' => 'Headline text',
        'section' => 'smallwins_homepage_hero',
        'type' => 'text'
    )
  );
  $wp_customize->add_control(
    'smallwins_homepage_cta_subheadline',
    array(
        'label' => 'Subheadline text',
        'section' => 'smallwins_homepage_hero',
        'type' => 'text'
    )
  );
  // $wp_customize->add_control(
  //   'smallwins_homepage_cta_link1_url',
  //   array(
  //       'label' => 'Button 1 URL',
  //       'section' => 'smallwins_homepage_cta',
  //       'type' => 'text'
  //   )
  // );
  // $wp_customize->add_control(
  //   'smallwins_homepage_cta_link1',
  //   array(
  //       'label' => 'Button 1 text',
  //       'section' => 'smallwins_homepage_cta',
  //       'type' => 'text'
  //   )
  // );
  // $wp_customize->add_control(
  //   'smallwins_homepage_cta_link2_url',
  //   array(
  //       'label' => 'Button 2 URL',
  //       'section' => 'smallwins_homepage_cta',
  //       'type' => 'text'
  //   )
  // );
  // $wp_customize->add_control(
  //   'smallwins_homepage_cta_link2',
  //   array(
  //       'label' => 'Button 2 text',
  //       'section' => 'smallwins_homepage_cta',
  //       'type' => 'text'
  //   )
  // );

  $wp_customize->add_control(
    'smallwins_homepage_video_url',
    array(
        'label' => 'Video URL',
        'section' => 'smallwins_homepage_hero',
        'type' => 'text',
        'description' => "Provide the link to a video (Youtube, Vimeo etc) to embed on the homepage."
    )
  );
  $wp_customize->add_control(
    'smallwins_homepage_sell1_headline',
    array(
        'label' => 'Headline',
        'section' => 'smallwins_homepage_sell1',
        'type' => 'text'
    )
  );
  $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'smallwins_homepage_sell1_image', array(
    'label' => __('Image'),
    'settings' => 'smallwins_homepage_sell1_image',
    'section' => 'smallwins_homepage_sell1'
  )));
  $wp_customize->add_control(
    'smallwins_homepage_sell1_description',
    array(
        'label' => 'Description',
        'section' => 'smallwins_homepage_sell1',
        'type' => 'textarea'
    )
  );
  $wp_customize->add_control(
    'smallwins_homepage_sell2_headline',
    array(
        'label' => 'Headline',
        'section' => 'smallwins_homepage_sell2',
        'type' => 'text'
    )
  );
  $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'smallwins_homepage_sell2_image', array(
    'label' => __('Image'),
    'settings' => 'smallwins_homepage_sell2_image',
    'section' => 'smallwins_homepage_sell2'
  )));
  $wp_customize->add_control(
    'smallwins_homepage_sell2_description',
    array(
        'label' => 'Description',
        'section' => 'smallwins_homepage_sell2',
        'type' => 'textarea'
    )
  );
  $wp_customize->add_control(
    'smallwins_homepage_sell3_headline',
    array(
        'label' => 'Headline',
        'section' => 'smallwins_homepage_sell3',
        'type' => 'text'
    )
  );
  // $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'smallwins_homepage_sell3_image', array(
  //   'label' => __('Image'),
  //   'settings' => 'smallwins_homepage_sell3_image',
  //   'section' => 'smallwins_homepage_sell3'
  // )));
  $wp_customize->add_control(
    'smallwins_homepage_sell3_description',
    array(
        'label' => 'Description',
        'section' => 'smallwins_homepage_sell3',
        'type' => 'textarea'
    )
  );
  $wp_customize->add_control(
    'smallwins_homepage_sell1_link',
    array(
        'label' => 'Link text',
        'section' => 'smallwins_homepage_sell1',
        'type' => 'text'
    )
  );
  $wp_customize->add_control(
    'smallwins_homepage_sell1_link_url',
    array(
        'label' => 'Link URL',
        'section' => 'smallwins_homepage_sell1',
        'type' => 'text'
    )
  );
  $wp_customize->add_control(
    'smallwins_homepage_sell2_link',
    array(
        'label' => 'Link text',
        'section' => 'smallwins_homepage_sell2',
        'type' => 'text'
    )
  );
  $wp_customize->add_control(
    'smallwins_homepage_sell2_link_url',
    array(
        'label' => 'Link URL',
        'section' => 'smallwins_homepage_sell2',
        'type' => 'text'
    )
  );
  // $wp_customize->add_control(
  //   'smallwins_homepage_sell3_link',
  //   array(
  //       'label' => 'Link text',
  //       'section' => 'smallwins_homepage_sell3',
  //       'type' => 'text'
  //   )
  // );
  // $wp_customize->add_control(
  //   'smallwins_homepage_sell3_link_url',
  //   array(
  //       'label' => 'Link URL',
  //       'section' => 'smallwins_homepage_sell3',
  //       'type' => 'text'
  //   )
  // );

};
add_action('customize_register', 'smallwins_customiser');
