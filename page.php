<?php get_header(); ?>

<div id="container">

  <?php if ( get_theme_mod( 'themeslug_contentbackground' ) ) : ?><img id="backgroundimg" src='<?php echo esc_url( get_theme_mod( 'themeslug_contentbackground' ) ); ?>'><?php endif; ?>
  
  <div id="main">
    
    <div class="menu-header">
      
      <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => '' ) ); ?><!--Get the Nav menu-->
    
    </div><!--#menu-header-->
    
    <div id="content">
      
      <?php the_post(); ?>
      
      <div id="post-<?php the_ID(); ?>" <?php post_class(get_post_meta($post->ID, "class")); ?>>
        
        <h1 class="entry-title"><?php the_title(); ?></h1>
        
        <div class="entry-content">
          
          <?php the_content(); ?>
          
          <?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
          
          <?php /*edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) */?>
        
        </div><!-- .entry-content -->
      
      </div><!-- #post-<?php the_ID(); ?> --> 
      
      </div><!-- #content -->          
    
    </div><!-- #main -->

</div><!-- #container -->

<?php get_footer(); ?>