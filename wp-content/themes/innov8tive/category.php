<?php

// Remove Post Info
remove_action( 'genesis_before_post_content', 'genesis_post_info' );

// Remove Post Meta
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );

// Remove Default Post Content (the text)
remove_action( 'genesis_post_content', 'genesis_do_post_content' );

// Move title to after the post image
remove_action( 'genesis_post_title', 'genesis_do_post_title' );
add_action( 'genesis_after_post_content', 'genesis_do_post_title' );

add_filter( 'post_class', 'innov8tive_post_class' );
/**
 * Add some extra body classes to the posts.
 *
 * Change the $columns value to alter how many columns fit into the space.
 *
 * @author Gary Jones
 *
 * @global integer $loop_counter
 * @param array $classes
 */
function innov8tive_post_class( $classes ) {
    global $loop_counter;
 
    // Alter this number to change the number of columns - used to add class names
    $columns = 3;
 
    if ( 0 == $loop_counter % $columns )
    	$classes[] = 'first-post';
    	
    return $classes;
}

// All set up, now kickstart Genesis
genesis();