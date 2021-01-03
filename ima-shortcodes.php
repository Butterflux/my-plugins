<?php

/**
 * Plugin Name: ima Shortcodes
 * Plugin URI: https://ima.co.uk
 * Description: list pages shortcodes [child-pages], [sibling-pages]
 * Version: 0.1
 * Text Domain: i2-shortcodes
 * Author: Jon Raynes
 * Author URI: https://ima.co.uk
 */


function childpages_shortcode_callback() {
	
	global $post;
	$result = '';

	
	$pages = wp_list_pages(
		array(
			'sort_column' => 'menu_order',
			'child_of' => $post->ID,
			'title_li' => '',
			'echo' => 0,
			'depth' => 1
		)
	);

	if ( $pages ) {
			$result = '<ul class="ima-pagelist ima-pagelist-children">' . $pages . '</ul>';
	}

	return $result;
}

function siblingpages_shortcode_callback() {
	
	global $post;
	$result = '';
	
	$pages = wp_list_pages(
		array(
			'sort_column' => 'menu_order',
			'child_of' => $post->post_parent,
			'title_li' => '',
			'echo' => 0,
			'depth' => 1
		)
	);

	if ( $pages ) {
			$result = '<ul class="ima-pagelist ima-pagelist-siblings">' . $pages . '</ul>';
	}

	return $result;
}
add_shortcode( 'child-pages', 'childpages_shortcode_callback' );
add_shortcode( 'sibling-pages', 'siblingpages_shortcode_callback' );

add_shortcode( 'ima-childpages', 'childpages_shortcode_callback' );
add_shortcode( 'ima-siblingpages', 'siblingpages_shortcode_callback' );