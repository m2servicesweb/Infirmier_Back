<?php

/**
 * Registers the `soin` post type.
 */
function soin_init() {
	register_post_type( 'soin', array(
		'labels'                => array(
			'name'                  => __( 'Soins', 'infirmier_boutet' ),
			'singular_name'         => __( 'Soins', 'infirmier_boutet' ),
			'all_items'             => __( 'All Soins', 'infirmier_boutet' ),
			'archives'              => __( 'Soins Archives', 'infirmier_boutet' ),
			'attributes'            => __( 'Soins Attributes', 'infirmier_boutet' ),
			'insert_into_item'      => __( 'Insert into Soins', 'infirmier_boutet' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Soins', 'infirmier_boutet' ),
			'featured_image'        => _x( 'Featured Image', 'soin', 'infirmier_boutet' ),
			'set_featured_image'    => _x( 'Set featured image', 'soin', 'infirmier_boutet' ),
			'remove_featured_image' => _x( 'Remove featured image', 'soin', 'infirmier_boutet' ),
			'use_featured_image'    => _x( 'Use as featured image', 'soin', 'infirmier_boutet' ),
			'filter_items_list'     => __( 'Filter Soins list', 'infirmier_boutet' ),
			'items_list_navigation' => __( 'Soins list navigation', 'infirmier_boutet' ),
			'items_list'            => __( 'Soins list', 'infirmier_boutet' ),
			'new_item'              => __( 'New Soins', 'infirmier_boutet' ),
			'add_new'               => __( 'Add New', 'infirmier_boutet' ),
			'add_new_item'          => __( 'Add New Soins', 'infirmier_boutet' ),
			'edit_item'             => __( 'Edit Soins', 'infirmier_boutet' ),
			'view_item'             => __( 'View Soins', 'infirmier_boutet' ),
			'view_items'            => __( 'View Soins', 'infirmier_boutet' ),
			'search_items'          => __( 'Search Soins', 'infirmier_boutet' ),
			'not_found'             => __( 'No Soins found', 'infirmier_boutet' ),
			'not_found_in_trash'    => __( 'No Soins found in trash', 'infirmier_boutet' ),
			'parent_item_colon'     => __( 'Parent Soins:', 'infirmier_boutet' ),
			'menu_name'             => __( 'Soins', 'infirmier_boutet' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt', 'custom-fields', 'comments', 'revisions' ),
		'has_archive'           => false,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-carrot',
		'show_in_rest'          => true,
		'rest_base'             => 'soins',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'capabilities'          => [
			'read'                   => 'read',
			'edit_post'              => 'edit_soin',
			'read_post'              => 'read_soin',
			'delete_post'            => 'delete_soin',
			'edit_posts'             => 'edit_soins',
			'edit_others_posts'      => 'edit_others_soins',
			'delete_posts'           => 'delete_soins',
			'publish_posts'          => 'publish_soins',
			'read_private_posts'     => 'read_private_soins',
			'delete_private_posts'   => 'delete_private_soins',
			'delete_published_posts' => 'delete_published_soins',
			'delete_others_posts'    => 'delete_others_soins',
			'edit_private_posts'     => 'edit_private_soins',
			'edit_published_posts'   => 'edit_published_soins',
			'create_posts'           => 'create_soins'
		],
	) );

    register_meta(
		'post',
		'preparation_time',
		[
			'object_subtype' => 'soin',
			'type'           => 'integer',
			'single'         => true,
			'show_in_rest'   => true
		]
	);

	register_post_meta(
		'soin',
		'cooking_time',
		[
			'type'           => 'integer',
			'single'         => true,
			'show_in_rest'   => true
		]
	);

	register_post_meta(
		'soin',
		'servings',
		[
			'type'           => 'integer',
			'single'         => true,
			'show_in_rest'   => true
		]
	);

	register_post_meta(
		'soin',
		'cost_per_person',
		[
			'type'           => 'integer',
			'single'         => true,
			'show_in_rest'   => true
		]
	);
}
add_action( 'init', 'soin_init' );

/**
 * Sets the post updated messages for the `soin` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `soin` post type.
 */
function soin_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['soin'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Soins updated. <a target="_blank" href="%s">View Soins</a>', 'infirmier_boutet' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'infirmier_boutet' ),
		3  => __( 'Custom field deleted.', 'infirmier_boutet' ),
		4  => __( 'Soins updated.', 'infirmier_boutet' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Soins restored to revision from %s', 'infirmier_boutet' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Soins published. <a href="%s">View Soins</a>', 'infirmier_boutet' ), esc_url( $permalink ) ),
		7  => __( 'Soins saved.', 'infirmier_boutet' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Soins submitted. <a target="_blank" href="%s">Preview Soins</a>', 'infirmier_boutet' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Soins scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Soins</a>', 'infirmier_boutet' ),
		date_i18n( __( 'M j, Y @ G:i', 'infirmier_boutet' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Soins draft updated. <a target="_blank" href="%s">Preview Soins</a>', 'infirmier_boutet' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'soin_updated_messages' );


/**
 * Manually link meta cap
 *
 * @link http://justintadlock.com/archives/2010/07/10/meta-capabilities-for-custom-post-types
 */
function soin_map_meta_cap($caps, $cap, $user_id, $args) {
	/* If editing, deleting, or reading a soin, get the post and post type object. */
	if ( 'edit_soin' === $cap || 'delete_soin' === $cap || 'read_soin' === $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = [];
	}

	/* If editing a movie, assign the required capability. */
	if ( 'edit_soin' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a movie, assign the required capability. */
	elseif ( 'delete_soin' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private movie, assign the required capability. */
	elseif ( 'read_soin' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}

add_filter('map_meta_cap', 'soin_map_meta_cap', 10, 4);
