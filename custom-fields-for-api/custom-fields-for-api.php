<?php
/*
Plugin Name: Deep Thoughts Functionality
Description: API Modifications for my Deep Thoughts React Native app.
Author: Jeffrey Gould
Version: 1.0
Author URI: http://jrgould.com
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'rest_api_init', 'dt_register_api_hooks' );
function dt_register_api_hooks() {

    // Add the plaintext content to GET requests for individual posts
    register_api_field(
        'page',
        'plaintext',
        array(
            'get_callback'    => 'dt_return_plaintext_content',
        )
    );

}

// Return plaintext content for posts
function dt_return_plaintext_content( $object, $field_name, $request ) {
    return strip_tags( html_entity_decode( $object['content']['rendered'] ) );
}

add_action( 'rest_api_init', 'slug_register_chrisfield' );
function slug_register_chrisfield() {
    register_rest_field( 'page',
        'chrisfield',
        array(
            'get_callback'    => 'slug_get_chrisfield',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

/**
 * Get the value of the "starship" field
 *
 * @param array $object Details of current post.
 * @param string $field_name Name of field.
 * @param WP_REST_Request $request Current request
 *
 * @return mixed
 */
function slug_get_chrisfield( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}
