<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package WebsiteSetup_Business
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wsubusiness_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'wsubusiness_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function wsubusiness_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'wsubusiness_pingback_header' );

/**
 * Replaces the ellipses with "... Read more" on the_excerpt() function
 */
function wsubusiness_excerpt_readmore($more) {
    return '... <a href="'. get_permalink($post->ID) . '" class="readmore">' . 'Read more' . '</a>';
}
add_filter('excerpt_more', 'wsubusiness_excerpt_readmore');

// Disables Kirki Telemetry Module (stop sending notice)
add_filter( 'kirki_telemetry', '__return_false' );