<?php
	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'hbd-theme', TEMPLATEPATH . '/languages' );
	
	add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
	add_theme_support( 'menus' );
	add_theme_support('html5', array('search-form'));

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable($locale_file) )
	    require_once($locale_file);

  // Theme Customization
  function tab_scr() {
    if (!is_admin()) {
      wp_enqueue_script('jquery');
      wp_enqueue_script(
        'tab_script',
        get_template_directory_uri() . '/js/tabs.js',
        array('jquery')
      );
    }
  }
  add_action('init','tab_scr');
  
  function themeslug_theme_customizer( $wp_customize ) {
    //Logo Cluster
    $wp_customize->add_section( 'logo_image' , array('title' => __( 'Logo', 'logoslug' ),'priority' => 30,'description' => 'Upload a logo to replace the default site name and description in the header.',) );
    
    $wp_customize->add_setting( 'themeslug_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array('label' => __( 'Logo', 'logoslug' ),'section' => 'logo_image','settings' => 'themeslug_logo',) ) );
    $wp_customize->add_setting( 'themeslug_logosmall' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logosmall', array('label' => __( 'Logo Mobile', 'logoslug' ),'section' => 'logo_image','settings' => 'themeslug_logosmall',) ) );
    
    //24/7
    $wp_customize->add_section( 'emerg_image' , array('title' => __( 'Emergency Section', 'emergslug' ),'priority' => 30,'description' => 'Customise the Emergency Section',) );
    
    $wp_customize->add_setting( 'themeslug_emerg' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_emerg', array('label' => __( 'Emergency Image', 'emergslug' ),'section' => 'emerg_image','settings' => 'themeslug_emerg',) ) );
    $wp_customize->add_setting( 'themeslug_emerg_text' );
    $wp_customize->add_control( 'themeslug_emerg_text', array('label' => __( 'Emergency Text', 'emergslug' ),'section' => 'emerg_image','settings' => 'themeslug_emerg_text',) );
    //Quote or Book
    $wp_customize->add_section( 'button_image' , array('title' => __( 'Content Button Image', 'buttonslug' ),'priority' => 30,'description' => 'Upload images to replace the content buttons in the index page.',) );
    
    $wp_customize->add_setting( 'themeslug_leftbutton' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_leftbutton', array('label' => __( 'Left Button', 'buttonslug' ),'section' => 'button_image','settings' => 'themeslug_leftbutton',) ) );
    $wp_customize->add_setting( 'themeslug_rightbutton' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_rightbutton', array('label' => __( 'Right Button', 'buttonslug' ),'section' => 'button_image','settings' => 'themeslug_rightbutton',) ) );
    //Content Background
    $wp_customize->add_section( 'back_image' , array('title' => __( 'Content Background Image', 'emergslug' ),'priority' => 30,'description' => 'Upload an Image to be placed behind the content.',) );
    
    $wp_customize->add_setting( 'themeslug_contentbackground' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_contentbackground', array('label' => __( 'Content Background', 'conbackslug' ),'section' => 'back_image','settings' => 'themeslug_contentbackground',) ) );
    //Divide Image
    $wp_customize->add_section( 'divide_image' , array('title' => __( 'Header Divider', 'headerslug' ),'priority' => 30,'description' => 'Upload a divider image to separate the header and body.',) );
    
    $wp_customize->add_setting( 'themeslug_header_divide' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_header_divide', array('label' => __( 'Header Divider', 'headerslug' ),'section' => 'divide_image','settings' => 'themeslug_header_divide',) ) );
    
  }
  add_action('customize_register', 'themeslug_theme_customizer');
    
  // End Customization
  
  // Get images from specific gallery 99
  function pw_show_gallery_image_urls() {
  global $mh_loop_count, $mh_slider_done, $ex;
  
  if ( did_action( 'wp_enqueue_scripts' ) == 1 ) {
    $mh_loop_count++;
    if ( $mh_loop_count == 1 and !$mh_slider_done ) {
	// Retrieve the gallery or galleries
 	$gallery = get_post_gallery_images( 68 );

	$image_list = '<div id="galleryfront"><ul id="photo-float">';

	// Loop through each image in each gallery
	$ex = 0;
	foreach( $gallery as $image ) {
		$image_list .= '<li><a href=' . $image . '><img src=' . $image . '></a></li>';
    if (++$ex == 4) break;
    }
	

	$image_list .= '</ul></div>';

	// Append our image list to the content of our post
	$content .= $image_list;
 	echo $content;
 	$mh_slider_done = true;
    }
  }
 }
 

	// Get the page number
	function get_page_number() {
	    if ( get_query_var('paged') ) {
	        print ' | ' . __( 'Page ' , 'hbd-theme') . get_query_var('paged');
	    }
	} // end get_page_number

	// Custom callback to list comments in the hbd-theme style
	function custom_comments($comment, $args, $depth) {
	  $GLOBALS['comment'] = $comment;
	    $GLOBALS['comment_depth'] = $depth;
	  ?>
	    <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
	        <div class="comment-author vcard"><?php commenter_link() ?></div>
	        <div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'hbd-theme'),
	                    get_comment_date(),
	                    get_comment_time(),
	                    '#comment-' . get_comment_ID() );
	                    edit_comment_link(__('Edit', 'hbd-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
	  <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'hbd-theme') ?>
	          <div class="comment-content">
	            <?php comment_text() ?>
	        </div>
	        <?php // echo the comment reply link
	            if($args['type'] == 'all' || get_comment_type() == 'comment') :
	                comment_reply_link(array_merge($args, array(
	                    'reply_text' => __('Reply','hbd-theme'),
	                    'login_text' => __('Log in to reply.','hbd-theme'),
	                    'depth' => $depth,
	                    'before' => '<div class="comment-reply-link">',
	                    'after' => '</div>'
	                )));
	            endif;
	        ?>
	<?php } // end custom_comments
	
	// Custom callback to list pings
	function custom_pings($comment, $args, $depth) {
	       $GLOBALS['comment'] = $comment;
	        ?>
	            <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
	                <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'hbd-theme'),
	                        get_comment_author_link(),
	                        get_comment_date(),
	                        get_comment_time() );
	                        edit_comment_link(__('Edit', 'hbd-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
	    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'hbd-theme') ?>
	            <div class="comment-content">
	                <?php comment_text() ?>
	            </div>
	<?php } // end custom_pings
	
	// Produces an avatar image with the hCard-compliant photo class
	function commenter_link() {
	    $commenter = get_comment_author_link();
	    if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
	        $commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
	    } else {
	        $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
	    }
	    $avatar_email = get_comment_author_email();
	    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
	    echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
	} // end commenter_link
	
	// For category lists on category archives: Returns other categories except the current one (redundant)
	function cats_meow($glue) {
	    $current_cat = single_cat_title( '', false );
	    $separator = "\n";
	    $cats = explode( $separator, get_the_category_list($separator) );
	    foreach ( $cats as $i => $str ) {
	        if ( strstr( $str, ">$current_cat<" ) ) {
	            unset($cats[$i]);
	            break;
	        }
	    }
	    if ( empty($cats) )
	        return false;

	    return trim(join( $glue, $cats ));
	} // end cats_meow
	
	// For tag lists on tag archives: Returns other tags except the current one (redundant)
	function tag_ur_it($glue) {
	    $current_tag = single_tag_title( '', '',  false );
	    $separator = "\n";
	    $tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
	    foreach ( $tags as $i => $str ) {
	        if ( strstr( $str, ">$current_tag<" ) ) {
	            unset($tags[$i]);
	            break;
	        }
	    }
	    if ( empty($tags) )
	        return false;

	    return trim(join( $glue, $tags ));
	} // end tag_ur_it
	
	// Register widgetized areas
	function theme_widgets_init() {
	    // Area 1
	    register_sidebar( array (
	    'name' => 'Primary Widget Area',
	    'id' => 'primary_widget_area',
	    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	    'after_widget' => "</li>",
	    'before_title' => '<h3 class="widget-title">',
	    'after_title' => '</h3>',
	  ) );

	    // Area 2
	    register_sidebar( array (
	    'name' => 'Secondary Widget Area',
	    'id' => 'secondary_widget_area',
	    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	    'after_widget' => "</li>",
	    'before_title' => '<h3 class="widget-title">',
	    'after_title' => '</h3>',
	  ) );
	} // end theme_widgets_init

	add_action( 'init', 'theme_widgets_init' );
	
	$preset_widgets = array (
	    'primary_widget_area'  => array( 'search', 'pages', 'categories', 'archives' ),
	    'secondary_widget_area'  => array( 'links', 'meta' )
	);
	if ( isset( $_GET['activated'] ) ) {
	    update_option( 'sidebars_widgets', $preset_widgets );
	}
	// update_option( 'sidebars_widgets', NULL );
	
	// Check for static widgets in widget-ready areas
	function is_sidebar_active( $index ){
	  global $wp_registered_sidebars;

	  $widgetcolums = wp_get_sidebars_widgets();

	  if ($widgetcolums[$index]) return true;

	    return false;
	} // end is_sidebar_active
?>