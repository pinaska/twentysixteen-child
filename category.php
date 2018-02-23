<?php
/**
*The custom template for the category.php archive page. Kicks in automatically, when category is selected. The desired result: a grid view with clicable images and category decription
 */
 get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main page-template-fullwidth-page" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
        <?php if (is_category('kodowanie')) : ?>
          <p>w tej kategori znajdziesz ogólne posty traktujące o mojej nauce kodowania</p>
        <?php elseif (is_category('osobiste')) : ?>
          <p>Tutaj dzielę się bardziej osobistymi treściami</p>
        <?php else : ?>
          <p>każda inna nieopisana kategoria będzie miała taki opis wyświe</p>
<?php endif; ?>
			</header><!-- .page-header -->

      <?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-category', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>
