<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <title><?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
    ?></title>
 
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php //wp_head(); ?>
    
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'hbd-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'hbd-theme' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <style>
    @media only screen and (max-width:64.063em) {
      .site-logo a img {
        content:url(<?php echo esc_url(get_theme_mod('themeslug_logosmall'))?>);
        width: 100%;
      }
      .site-logo {
      max-width: 415px;
      }
    }
    </style>
</head>
<body>
<div id="wrapper" class="hfeed">
  <div id="contentwrapper">
    <?php if (is_front_page() || is_home()) {pw_show_gallery_image_urls();} ?>
    <!-- #galleryfront -->
    <?php if ( get_theme_mod( 'themeslug_random' ) ) : ?>
    <div id="rand-contain">
      <div id="rand-float">
        <li><a href='<?php echo esc_url( get_theme_mod( 'themeslug_random' ) ); ?>' title='Are you ready for magic?' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'themeslug_random' ) ); ?>' alt='Nothing to see here'></a></li>
      </div>
    </div>
    <?php endif; ?>
    <!-- #rand-contain -->
    <div id="header">
        <div id="masthead">
            <div id="access">
              <!--<div class="skip-link"><a href="#content" title="<?php _e( 'Skip to content', 'hbd-theme' ) ?>"><?php _e( 'Skip to content', 'hbd-theme' ) ?></a></div>-->
              <?php #wp_page_menu( 'sort_column=menu_order' ); ?>
              <div id="head-align">
              
              <!-- Customisation -->
              <?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
              <div class='site-logo'>
                  <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' style='@media only screen and (max-width:64.063em) {color: #333;}'></a>
              </div>
              
              <?php else : ?>
                  <hgroup>
                      <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
                      <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
                  </hgroup>
              <?php endif; ?>
              
              <?php if ( get_theme_mod( 'themeslug_emerg' ) ) : ?>
              <div class='site-emerg'>
                  <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'themeslug_emerg' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' style='@media only screen and (max-width:64.063em) {color: #333;}'></a>
              </div>
              <?php endif; ?>
              
              <div id='subtitle'>
                <h2 class='site-tagline'>
                <?php echo get_theme_mod('themeslug_emerg_text'); ?>
                </h2>
                <span class='site-description'>
                <?php bloginfo( 'description' ); ?>
                </span>
              </div>
              
              
              
              <?php if ( get_theme_mod( 'themeslug_header_divide' ) ) : ?>
              <div class='site-divide'>
                  <a><img src='<?php echo esc_url( get_theme_mod( 'themeslug_header_divide' ) ); ?>'></a>
              </div><!-- divide -->
              <?php else : ?>
              <?php endif ?>    
              
              </div><!-- #head-align -->
              
            </div><!-- #access -->
        </div><!-- #masthead -->
    </div><!-- #header -->
 
    