<?php

/**
 * Registers the `type` taxonomy,
 * for use with 'soin'.
 */
function type_init() {
	register_taxonomy( 'type', array( 'soin' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'manage_types',
			'edit_terms'    => 'manage_types',
			'delete_terms'  => 'manage_types',
			'assign_terms'  => 'edit_soins',
		),
		'labels'            => array(
			'name'                       => __( 'Types', 'infirmier_boutet' ),
			'singular_name'              => _x( 'Types', 'taxonomy general name', 'infirmier_boutet' ),
			'search_items'               => __( 'Search Types', 'infirmier_boutet' ),
			'popular_items'              => __( 'Popular Types', 'infirmier_boutet' ),
			'all_items'                  => __( 'All Types', 'infirmier_boutet' ),
			'parent_item'                => __( 'Parent Types', 'infirmier_boutet' ),
			'parent_item_colon'          => __( 'Parent Types:', 'infirmier_boutet' ),
			'edit_item'                  => __( 'Edit Types', 'infirmier_boutet' ),
			'update_item'                => __( 'Update Types', 'infirmier_boutet' ),
			'view_item'                  => __( 'View Types', 'infirmier_boutet' ),
			'add_new_item'               => __( 'Add New Types', 'infirmier_boutet' ),
			'new_item_name'              => __( 'New Types', 'infirmier_boutet' ),
			'separate_items_with_commas' => __( 'Separate Types with commas', 'infirmier_boutet' ),
			'add_or_remove_items'        => __( 'Add or remove Types', 'infirmier_boutet' ),
			'choose_from_most_used'      => __( 'Choose from the most used Types', 'infirmier_boutet' ),
			'not_found'                  => __( 'No Types found.', 'infirmier_boutet' ),
			'no_terms'                   => __( 'No Types', 'infirmier_boutet' ),
			'menu_name'                  => __( 'Types', 'infirmier_boutet' ),
			'items_list_navigation'      => __( 'Types list navigation', 'infirmier_boutet' ),
			'items_list'                 => __( 'Types list', 'infirmier_boutet' ),
			'most_used'                  => _x( 'Most Used', 'type', 'infirmier_boutet' ),
			'back_to_items'              => __( '&larr; Back to Types', 'infirmier_boutet' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'soin-types',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'type_init' );

/**
 * Sets the post updated messages for the `type` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `type` taxonomy.
 */
function type_updated_messages( $messages ) {

	$messages['type'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Types added.', 'infirmier_boutet' ),
		2 => __( 'Types deleted.', 'infirmier_boutet' ),
		3 => __( 'Types updated.', 'infirmier_boutet' ),
		4 => __( 'Types not added.', 'infirmier_boutet' ),
		5 => __( 'Types not updated.', 'infirmier_boutet' ),
		6 => __( 'Types deleted.', 'infirmier_boutet' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'type_updated_messages' );
