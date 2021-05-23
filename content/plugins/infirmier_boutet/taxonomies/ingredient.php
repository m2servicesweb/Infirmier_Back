<?php

/**
 * Registers the `ingredient` taxonomy,
 * for use with 'soin'.
 */
function ingredient_init() {
	register_taxonomy( 'ingredient', array( 'soin' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'manage_ingredients',
			'edit_terms'    => 'manage_ingredients',
			'delete_terms'  => 'manage_ingredients',
			'assign_terms'  => 'edit_soins',
		),
		'labels'            => array(
			'name'                       => __( 'Ingrédients', 'infirmier_boutet' ),
			'singular_name'              => _x( 'Ingrédients', 'taxonomy general name', 'infirmier_boutet' ),
			'search_items'               => __( 'Search Ingrédients', 'infirmier_boutet' ),
			'popular_items'              => __( 'Popular Ingrédients', 'infirmier_boutet' ),
			'all_items'                  => __( 'All Ingrédients', 'infirmier_boutet' ),
			'parent_item'                => __( 'Parent Ingrédients', 'infirmier_boutet' ),
			'parent_item_colon'          => __( 'Parent Ingrédients:', 'infirmier_boutet' ),
			'edit_item'                  => __( 'Edit Ingrédients', 'infirmier_boutet' ),
			'update_item'                => __( 'Update Ingrédients', 'infirmier_boutet' ),
			'view_item'                  => __( 'View Ingrédients', 'infirmier_boutet' ),
			'add_new_item'               => __( 'Add New Ingrédients', 'infirmier_boutet' ),
			'new_item_name'              => __( 'New Ingrédients', 'infirmier_boutet' ),
			'separate_items_with_commas' => __( 'Separate Ingrédients with commas', 'infirmier_boutet' ),
			'add_or_remove_items'        => __( 'Add or remove Ingrédients', 'infirmier_boutet' ),
			'choose_from_most_used'      => __( 'Choose from the most used Ingrédients', 'infirmier_boutet' ),
			'not_found'                  => __( 'No Ingrédients found.', 'infirmier_boutet' ),
			'no_terms'                   => __( 'No Ingrédients', 'infirmier_boutet' ),
			'menu_name'                  => __( 'Ingrédients', 'infirmier_boutet' ),
			'items_list_navigation'      => __( 'Ingrédients list navigation', 'infirmier_boutet' ),
			'items_list'                 => __( 'Ingrédients list', 'infirmier_boutet' ),
			'most_used'                  => _x( 'Most Used', 'ingredient', 'infirmier_boutet' ),
			'back_to_items'              => __( '&larr; Back to Ingrédients', 'infirmier_boutet' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'soin-ingredients',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'ingredient_init' );

/**
 * Sets the post updated messages for the `ingredient` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `ingredient` taxonomy.
 */
function ingredient_updated_messages( $messages ) {

	$messages['ingredient'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Ingrédients added.', 'infirmier_boutet' ),
		2 => __( 'Ingrédients deleted.', 'infirmier_boutet' ),
		3 => __( 'Ingrédients updated.', 'infirmier_boutet' ),
		4 => __( 'Ingrédients not added.', 'infirmier_boutet' ),
		5 => __( 'Ingrédients not updated.', 'infirmier_boutet' ),
		6 => __( 'Ingrédients deleted.', 'infirmier_boutet' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'ingredient_updated_messages' );
