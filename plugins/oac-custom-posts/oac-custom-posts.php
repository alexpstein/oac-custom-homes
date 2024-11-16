<?php
/*
Plugin Name: Custom Post Types
Plugin URI:  https://www.alexpstein.com
Description: Custom post types for OAC Custom Homes
Version:     1.0.0
Author:      Alex Stein
Author URI:  https://www.alexpstein.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * Create Floor Plans post type
 */

add_action( 'init', 'create_plans_posttype' );

function create_plans_posttype() {
  register_post_type( 'oac_plans',
    array(
      'labels' => array(
        'name' => __( 'Floor Plans', 'oac' ),
        'singular_name' => __( 'Floor Plan', 'oac' )
      ),
      'supports' => array( 'title', 'revisions' ),
      'description' => __( 'OAC Floor Plans', 'oac' ),
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => true,
      'has_archive' => false
    )
  );
}
