<?php get_header(); ?>
<div id="container">
  <div id="backcont">
  <?php if ( get_theme_mod( 'themeslug_contentbackground' ) ) : ?><img id="backgroundimg" src='<?php echo esc_url( get_theme_mod( 'themeslug_contentbackground' ) ); ?>'><?php endif; ?>
  </div><!--#backcont-->
  <div id="main">
  
    <div class="menu-header">
      <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => '' ) ); ?><!--Get the Nav menu-->
    </div><!--#menu-header-->
    
    <div id="content">
    
		<div id="content-left">
      <div id="leftbutton">
      <?php if ( get_theme_mod( 'themeslug_leftbutton' ) ) : ?><a href="<?php echo get_site_url()?>/book/"><img id="contentimg" src='<?php echo esc_url( get_theme_mod( 'themeslug_leftbutton' ) ); ?>'></a><?php endif; ?>
      </div>
		</div>
		
		<div id="content-right">
      <div id="rightbutton">
      <?php if ( get_theme_mod( 'themeslug_rightbutton' ) ) : ?><a href="<?php echo get_site_url()?>/quote/"><img id="contentimg" src='<?php echo esc_url( get_theme_mod( 'themeslug_rightbutton' ) ); ?>'></a><?php endif; ?>
      </div>  
		</div>
		<div id="clear" style="clear:both;"></div>
    </div><!-- #content -->
    
  </div><!--#main-->
  
</div><!-- #container -->
<?php get_footer(); ?>