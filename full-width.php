<?php
/*
*
Template Name: Full-Width
*/
get_header(); ?>
<div id="primary" class="page-template-nosidebar-page page-template-fullwidth-page">
	<main id="main" class="site-main page-template-fullwidth-page" role="main">
<?php
$latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );

if ( $latest_blog_posts->have_posts() ) : while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post();
    // Loop output goes here
endwhile; endif;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->
<?php get_footer(); ?>
