<?php
add_action( 'rest_api_init', 'slug_register_yoast_seo_meta' );

function slug_register_yoast_seo_meta() {
    register_rest_field( 'post',
        '_yoast_wpseo_title',
        array(
            'get_callback'    => 'get_seo_meta_field',
            'update_callback' => null,
            'schema'          => null,
        )
    );
    register_rest_field( 'post',
        '_yoast_wpseo_metadesc',
        array(
            'get_callback'    => 'get_seo_meta_field',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
function get_seo_meta_field( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}