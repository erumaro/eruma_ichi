<?php

add_action( 'init', 'register_cpt_portfolio' );

function register_cpt_portfolio() {
    $labels = array(
    'name' => _x( 'Portfolio', 'portfolio' ),
    'singular_name' => _x( 'Portfolio', 'portfolio' ),
    'add_new' => _x( 'Add New', 'portfolio' ),
    'add_new_item' => _x( 'Add New Portfolio', 'portfolio' ),
    'edit_item' => _x( 'Edit Portfolio', 'portfolio' ),
    'new_item' => _x( 'New Portfolio', 'portfolio' ),
    'view_item' => _x( 'View Portfolio', 'portfolio' ),
    'search_items' => _x( 'Search Portfolio', 'portfolio' ),
    'not_found' => _x( 'No portfolio found', 'portfolio' ),
    'not_found_in_trash' => _x( 'No portfolio found in Trash', 'portfolio' ),
    'parent_item_colon' => _x( 'Parent Portfolio:', 'portfolio' ),
    'menu_name' => _x( 'Portfolio', 'portfolio' ),
    );
    $args = array(
    'labels' => $labels,
    'hierarchical' => false,
    'description' => 'Skapar min portfolio.',
    'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
    'taxonomies' => array( 'filter' ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
    );
register_post_type( 'portfolio', $args );
} 

// function: portfolio_filter BEGIN
function portfolio_filter()
{
	// Register the Taxonomy
	register_taxonomy(__( "filter" ), 
	
	// Assign the taxonomy to be part of the portfolio post type
	array(__( "portfolio" )), 
	
	// Apply the settings for the taxonomy
	array(
		"hierarchical" => true, 
		"label" => __( "Filter" ), 
		"singular_label" => __( "Filter" ), 
		"rewrite" => array(
				'slug' => 'filter', 
				'hierarchical' => true
				)
		)
	); 
} // function: portfolio_filter END


add_action( 'init', 'portfolio_filter', 0 );



?>