<?php

add_action( 'genesis_meta', 'innov8tive_home_genesis_meta' );
/**
 * Add widget support for home page. If no widgets active, display the default loop.
 *
 */
function innov8tive_home_genesis_meta() {

	if ( is_active_sidebar( 'home-top' ) || is_active_sidebar( 'home-left' ) || is_active_sidebar( 'home-right' ) || is_active_sidebar( 'home-bottom' ) ) {
	
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_loop', 'innov8tive_home_loop_helper' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );
		add_filter( 'body_class', 'innov8tive_add_body_class' );
		
	}
}

function innov8tive_add_body_class( $classes ) {
   		$classes[] = 'innov8tive';
  		return $classes;
}

function innov8tive_home_loop_helper() {

	if ( is_active_sidebar( 'home-top' ) || is_active_sidebar( 'home-left' ) || is_active_sidebar( 'home-right' ) ) {
	
		echo '<div id="home">';

			genesis_widget_area( 'home-top', array( 'before' => '<div class="wiget-area home-top">' ) );

			genesis_widget_area( 'home-left', array( 'before' => '<div class="wiget-area home-left">' ) );

			genesis_widget_area( 'home-right', array( 'before' => '<div class="wiget-area home-right">' ) );
		
		echo '</div><!-- end #home -->';
		
	}
	
	if ( is_active_sidebar( 'home-bottom' ) ) {

	
		echo '<div id="home-bottom">';
		
			genesis_widget_area( 'home-bottom', array( 'before' => '<div class="wiget-area home-bottom">' ) );


		
		echo '</div><!-- end #home-bottom -->';
		
		echo '<a href="/blog/" class="more_recepies button">Click here to find more great recipes!</a>';	

	}

}

genesis();