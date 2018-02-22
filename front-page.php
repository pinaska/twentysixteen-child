<?php
/**
*The custom template for the one-page style front page. Kicks in automatically.
 */

 get_header(); ?>

 <div id="primary" class="page-template-nosidebar-page page-template-fullwidth-page">
 	<main id="main" class="site-main page-template-fullwidth-page" role="main">
 		<?php
 		// Start the loop.
 		while ( have_posts() ) : the_post();

 			// Include the page content template.
 			get_template_part( 'template-parts/content', 'page' );

 			// If comments are open or we have at least one comment, load up the comment template.
 			if ( comments_open() || get_comments_number() ) {
 				comments_template();
 			}

 			// End of the loop.
 		endwhile;
 		?>

    <?php
    // posts loop. I am checking if this can display 5 posts with clickable thumbnail
    $the_query = new WP_Query( 'posts_per_page=5' ); ?>

    <?php while ($the_query -> have_posts()) : $the_query -> the_post();?>
      <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium')?></a>
    <?php
    endwhile;
    wp_reset_postdata();
    ?>
    <?php get_sidebar( 'content-bottom' ); ?>

 	</main><!-- .site-main -->
 </div><!-- .content-area -->

 <?php get_footer(); ?>
