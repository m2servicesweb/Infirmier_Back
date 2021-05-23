<?php

function register_soin_comment_count_rest_field() {
	register_rest_field(
		'soin',
		'comment_count',
		[
			'get_callback' => 'get_soin_comment_count',
			// 'update_callback' => function( $soin ) { }

		]
	);
}

/**
 * Get soin comment count
 *
 * @param array $soin Soin data
 *
 * @return int Comment count
 */
function get_soin_comment_count( $soin ) {
	$comment_count = get_comments_number( $soin['id'] );

	// return (int) $comment_count;
	return intval( $comment_count );
}

/**
 * Add rest_api_init hook action
 *
 * @link https://developer.wordpress.org/reference/hooks/rest_api_init/
 */
add_action( 'rest_api_init', 'register_soin_comment_count_rest_field' );
