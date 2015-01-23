<?php get_header(); ?>
<div id="container">
<?php
/*
 * Template Name: Archives Page
 * Description: An archive query within blank page.
 */
 ?>
	<div id="content" role="main">
		<?php the_post(); ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	<div>
	<ul>
    <?php
      $args = array( 'posts_per_page' => 5, 'offset'=> 1, 'category' => 1 );
      $myposts = get_posts( $args );
      foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
    <li>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </li>
    <?php endforeach; 
    wp_reset_postdata();?>
   </ul>
		</div><!-- List Posts -->
		<?php get_search_form(); ?>
		
		<h2>Archives by Month:</h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
		
		<h2>Archives by Subject:</h2>
		<ul>
			 <?php wp_list_categories(); ?>
		</ul>
      
	</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>