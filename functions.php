<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
?>
<?php
/* tutaj mialo byc zalinkowane do stylu lander page (one page), ktory mial sie pojawiac tylko kiedy byla front-page uruchomiona. Nie dziala
** function lander-scripts(){
  if (is_front_page() ){
    wp_enqueue_style('lander-styles', get_template_directory_uri() . '/lander-styles.css');
  }
}
add_action('wp_enqueue_scripts' , 'lander_scripts');
?>
*/
