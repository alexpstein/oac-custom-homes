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
        'singular_name' => __( 'Floor Plan', 'oac' ),
        'add_new' => __( 'Add Floor Plan', 'oac' ),
        'add_new_item' => __( 'Add Floor Plan', 'oac' ),
        'new_item' => __( 'New Floor Plan', 'oac' ),
        'edit_item' => __( 'Edit Floor Plan', 'oac' ),
        'view_item' => __( 'View Floor Plan', 'oac' ),
        'all_items' => __( 'All Floor Plans', 'oac' )
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

/**
 * Create Team Members post type
 */

add_action( 'init', 'create_team_posttype' );

function create_team_posttype() {
  register_post_type( 'oac_team',
    array(
      'labels' => array(
        'name' => __( 'Team Members', 'oac' ),
        'singular_name' => __( 'Team Member', 'oac' ),
        'add_new' => __( 'Add Team Member', 'oac' ),
        'add_new_item' => __( 'Add Team Member', 'oac' ),
        'new_item' => __( 'New Team Member', 'oac' ),
        'edit_item' => __( 'Edit Team Member', 'oac' ),
        'view_item' => __( 'View Team Member', 'oac' ),
        'all_items' => __( 'All Team Members', 'oac' )
      ),
      'supports' => array( 'title', 'editor' ),
      'description' => __( 'OAC Team Members', 'oac' ),
      'public' => true,
      'publicly_queryable' => false,
      'exclude_from_search' => true,
      'has_archive' => false
    )
  );
}