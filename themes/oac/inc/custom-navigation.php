<?php

/**
 * Custom Walker
 */

class Nav_Walker_Nav_Menu extends Walker_Nav_Menu {

	static $count = 0;
	private $i = 1;

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );

        if ( $depth < 2 ) :
            $classes = array( 'sub-menu', 'sub-menu--expand' );
        else : 
            $classes = array( 'sub-menu', 'sub-menu--expanded' );
        endif;

		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        
        $output .= "{$n}{$indent}<ul $class_names>{$n}";
	}

     function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        if ( 0 == $depth ) self::$count=0;

        if ( ! empty( $post->ID ) ) {
            $object_id = get_post_meta( $item->menu_item_parent, '_menu_item_object_id', true );
            $parent = get_post( $object_id )->post_title;
        }

        // Main list elem
        $output .= $indent . '<li' . $id . $class_names .'>';

        // Get any additional anchor link classes from ACF
        $link_classes = get_field( 'link_classes', $item->ID );

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ! empty( $link_classes )     ? ' class="'  . esc_attr( $link_classes     ) .'"' : '';
        if ( 'menu-1' == $args->theme_location && 0 != $depth ) {
        	$attributes .= ' tabindex="-1" ';
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        // Add sub-menu toggle buttons
        if ( 'menu-1' == $args->theme_location || 'menu-2' == $args->theme_location ) {
            $submenus = 0 == $depth || 1 == $depth || 2 == $depth ? get_posts( array( 'post_type' => 'nav_menu_item', 'numberposts' => 1, 'meta_query' => array( array( 'key' => '_menu_item_menu_item_parent', 'value' => $item->ID, 'fields' => 'ids' ) ) ) ) : false;
            if ( ! empty($submenus) ) {
                if ( 0 == $depth ) {
                    $item_output .= '<button class="sub-menu-toggle sub-menu-toggle-top" aria-expanded="false" aria-label="Toggle ' . apply_filters( 'the_title', $item->title, $item->ID ) . ' Sub-Menu">&#43;</button>';
                } else if ( $depth > 0 && $depth < 2 ) {
                    $item_output .= '<button class="sub-menu-toggle" aria-expanded="false" tabindex="-1" aria-label="Toggle ' . apply_filters( 'the_title', $item->title, $item->ID ) . ' Sub-Menu">&#43;</button>';
                }
            }
        }
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

        self::$count++;
        $this->i++;
    }
}

/**
 * Add top level menu item class
 */

function add_top_level_li_class($classes, $item, $args) {
		if (0 == $item->menu_item_parent) {
			$classes[] = 'top-level-menu-item';
		} 
		return $classes;
	}
	
add_filter('nav_menu_css_class', 'add_top_level_li_class', 1, 3);