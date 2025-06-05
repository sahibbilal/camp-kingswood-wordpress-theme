<?php

/**
 * Add custom filters to REST API endpoints
 * 
 */

namespace BaseTheme\RestApi;

function register_read_time_api_field() {
    register_rest_field( 'post', 'readtime',
        array(
            'get_callback' => 'BaseTheme\RestApi\get_read_time_api_field',
            'schema' => null,
        )
    );
}
add_action( 'rest_api_init', 'BaseTheme\RestApi\register_read_time_api_field' );

function get_read_time_api_field( $post ) {
    $read_time = get_post_meta( $post['id'], 'estimated_read_time', true );

    if ( $read_time ) {
        return sprintf( __( '%s min read', 'campKingswood' ), $read_time );
    }

    return;
}
