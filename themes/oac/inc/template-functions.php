<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package OAC
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function oac_body_classes( $classes ) {
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
add_filter( 'body_class', 'oac_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function oac_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'oac_pingback_header' );

/**
 * Get full path of images to fix file_get_contents on ACF content
 */
function _themename_full_path( $url ) {
	return realpath( str_replace( get_bloginfo('url'), '.', $url ) );
}

/**
 * Clean special characters from strings
 * Not for seo-friendly text, but useful for generating JS-friendly IDs and classes
 */
function _themename_clean_string( $string ) {
	// remove all non alphanumeric characters except spaces
	$string_clean = preg_replace( '/[^a-zA-Z0-9\s]/', '', strtolower( $string ) );

	// replace one or multiple spaces into single dash (-)
	$string_clean = preg_replace( '!\s+!', '-', $string_clean );

	return $string_clean;
}

/**
 * Generate random string
 */
function _themename_random_string( $length ) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$characters_length = strlen($characters);
	$random_string = '';
	
	for ( $i = 0; $i < $length; $i++ ) {
		$random_string .= $characters[rand(0, $characters_length - 1)];
	}

	return $random_string;
}

/**
 * Remove front of URL
 */
function _themename_remove_http( $url ) {
	// Remove "https://" or "http://" from the beginning of the URL if it exists
    $result = preg_replace( "/^https?:\/\//i", "", $url );
    return $result;
}