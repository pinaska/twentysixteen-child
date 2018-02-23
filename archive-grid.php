<?php
//This template I have copied and tred to use to dipslay category posts in a grid format - it did not work. I think, I will need to delete this file, but leave it for now. TBC.


<div class="gridBox">
  <h2 class="grid-header"><?php _e('Gallery Page', 'rys'); ?></h2>
  <div class="boxes-container">
    <?php
      $args = array(
        'post_type' 		=> 'post', 		// replace "post" if you want to display different post-type
        'category_name'		=> 'gallery',	// category slug
        'posts_per_page'	=> -1			//  show all posts
      );

      // The Query
      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {

        $c = 1; 	// counter
        $bpr = 4; 	// number of column in each row

        while ( $the_query->have_posts() ) : $the_query->the_post();
          ?>
            <div class="grid-boxes <?php echo (($c != $bpr) ? 'margin_right' : ''); ?>">
              <div class="grid-thumbnail">
                <?php if ( has_post_thumbnail()) { ?>
                  <div class="alignleft">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail(); ?>
                    </a>
                  </div>
                <?php } else { ?>
                  <img src="<?php bloginfo('template_directory'); ?>/images/no-thumbnail.jpg" alt="No Thumbnail" />
                <?php } ?>
              </div>
              <p class="grid-title">
                <a href="<?php the_permalink() ?>" title="<?php printf(__('Permanent Link to %s','rys'), get_the_title()) ?>" rel="bookmark"><?php the_title(); ?></a>
              </p>
            </div>
          <?php

          // we add a condition here to see if counter is equal to the number of column.
          if( $c == $bpr ) {
            echo '<div class="clear"></div>';
            $c = 0; 	// back the counter to 0 if the condition above is true.
          }
          $c++; 			// increment counter of 1 until it hits the limit of column of every row.

        endwhile;
      } else {

        // no posts found
        _e( '<h2>Oops!</h2>', 'rys' );
        _e( '<p>Sorry, seems there are no post at the moment.</p>', 'rys' );

      }

      /* Restore original Post Data */
      wp_reset_postdata();
    ?>
  </div>
  <div class="clear"></div>
</div>
</div>
