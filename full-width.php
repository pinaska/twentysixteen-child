<?php
/*
*
Template Name: Full-Width
*/
get_header(); ?>
<div id="primary" class="page-template-nosidebar-page page-template-fullwidth-page">
	<main id="main" class="site-main page-template-fullwidth-page" role="main">

<?php
//$latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
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

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->
<?php get_footer(); ?>
