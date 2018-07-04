<?php 
/* Enable Custom Menus */

add_theme_support( 'menus' );

register_nav_menus(
    array(
        'main-nav' => __( 'Main Nav', 'scratch' ),   // main nav in header
        'footer-nav' => __( 'Footer Nav', 'scratch' )   // main nav in header
    )
);

function scratch_main_nav() {
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => false, // remove nav container
		'container_class' => '', // class of container (should you choose to use it)
		'menu' => __( 'Main Nav', 'scratch' ), // nav name
		'menu_class' => 'main-nav', // adding custom nav class
		'theme_location' => 'main-nav', // where it's located in the theme
		'before' => '', // before the menu
		'after' => '', // after the menu
		'link_before' => '', // before each link
		'link_after' => '', // after each link
		'depth' => 0    // fallback function
	));
} /* end scratch main nav */

function scratch_footer_nav() {
  // display the wp3 menu if available
  wp_nav_menu(array(
    'container' => false, // remove nav container
    'container_class' => '', // class of container (should you choose to use it)
    'menu' => __( 'Footer Nav', 'scratch' ), // nav name
    'menu_class' => 'footer-nav', // adding custom nav class
    'theme_location' => 'footer-nav', // where it's located in the theme
    'before' => '', // before the menu
    'after' => '', // after the menu
    'link_before' => '', // before each link
    'link_after' => '', // after each link
    'depth' => 0    // fallback function
  ));
} /* end scratch main nav */
 ?>