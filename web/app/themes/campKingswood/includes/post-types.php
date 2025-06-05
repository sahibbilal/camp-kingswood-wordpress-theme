<?php
/**
 * Register theme post types
 * 
 * Post types should always support revisions.
 * Please follow the same format for registering new post types.
 * 
 * Reference: https://developer.wordpress.org/reference/functions/register_post_type/
 * Dashicons for menu_icon: https://developer.wordpress.org/resource/dashicons/
 */

 namespace BaseTheme\PostTypes;

 /**
  * Get post type labels
  * 
  * @param  string $singular  Singular name for the post type.
  * @param  string $plural    Plural name for the post type.
  * @param  string $menu_name Name the post type will appear as in the admin sidebar.
  * @return array             Lables for registering a post type.     
  */
function get_labels( string $singular, string $plural = '', string $menu_name = '' ) : array {
    if ( empty( $plural ) ) {
        $plural = $singular . 's';
    }

    if ( empty( $menu_name ) ) {
        $menu_name = $plural;
    }

    return [
        'name'                  => _x( $plural, 'Post Type General Name', 'campKingswood' ),
        'singular_name'         => _x( $singular, 'Post Type Singular Name', 'campKingswood' ),
        'menu_name'             => __( $menu_name, 'campKingswood' ),
        'name_admin_bar'        => __( $singular, 'campKingswood' ),
        'archives'              => __( $singular . ' Archives', 'campKingswood' ),
        'attributes'            => __( $singular . ' Attributes', 'campKingswood' ),
        'parent_item_colon'     => __( 'Parent ' . $singular, 'campKingswood' ),
        'all_items'             => __( 'All ' . $plural, 'campKingswood' ),
        'add_new_item'          => __( 'Add New ' . $singular, 'campKingswood' ),
        'add_new'               => __( 'Add New', 'campKingswood' ),
        'new_item'              => __( 'New ' . $singular, 'campKingswood' ),
        'edit_item'             => __( 'Edit ' . $singular, 'campKingswood' ),
        'update_item'           => __( 'Update ' . $singular, 'campKingswood' ),
        'view_item'             => __( 'View ' . $singular, 'campKingswood' ),
        'view_items'            => __( 'View ' . $plural, 'campKingswood' ),
        'search_items'          => __( 'Search ' . $singular, 'campKingswood' ),
        'not_found'             => __( 'Not found', 'campKingswood' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'campKingswood' ),
        'featured_image'        => __( 'Featured Image', 'campKingswood' ),
        'set_featured_image'    => __( 'Set featured image', 'campKingswood' ),
        'remove_featured_image' => __( 'Remove featured image', 'campKingswood' ),
        'use_featured_image'    => __( 'Use as featured image', 'campKingswood' ),
        'insert_into_item'      => __( 'Insert into ' . strtolower( $singular ), 'campKingswood' ),
        'uploaded_to_this_item' => __( 'Uploaded to this ' . strtolower( $singular ), 'campKingswood' ),
        'items_list'            => __( $plural . ' list', 'campKingswood' ),
        'items_list_navigation' => __( $plural . ' list navigation', 'campKingswood' ),
        'filter_items_list'     => __( 'Filter ' . strtolower( $plural ) . ' list', 'campKingswood' ),
    ];
}

// Universal Block.
function universal_block() {
    register_post_type( 'universal_block', [
        'label'           => __( 'Universal Block', 'campKingswood' ),
        'labels'          => get_labels( 'Universal Block' ),
        'supports'        => [ 'title', 'revisions' ],
        'taxonomies'      => [],
        'public'          => true,
        'menu_icon'       => 'dashicons-editor-kitchensink',
        'has_archive'     => false,
    ] );
}
add_action( 'init', 'BaseTheme\PostTypes\universal_block' );

// Gallery.
function gallery() {
    register_post_type ( 'gallery', [
        'label'               => __( 'Gallery', 'campKingswood' ),
        'labels'              => get_labels( 'Gallery', 'Galleries' ),
        'supports'            => [ 'title', 'revisions' ],
        'taxonomies'          => [],
        'public'              => true,
        'menu_icon'           => 'dashicons-format-gallery',
        'has_archive'         => false,
    ] );
}
add_action( 'init', 'BaseTheme\PostTypes\gallery' );

// Gallery.
function testimonial() {
    register_post_type ( 'testimonial', [
        'label'               => __( 'Testimonial', 'campKingswood' ),
        'labels'              => get_labels( 'Testimonial', 'Testimonials' ),
        'supports'            => [ 'title', 'revisions', 'editor' ],
        'taxonomies'          => [],
        'public'              => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'menu_icon'           => 'dashicons-format-quote',
        'has_archive'         => false,
    ] );
}
add_action( 'init', 'BaseTheme\PostTypes\testimonial' );

function add_rewrite_rules( $wp_rewrite ) {
    $new_rules = array(
        'blog/category/(.+)/?$' => 'index.php?post_type=post&taxonomy=category&term=$matches[1]',
        'blog/tag/(.+)/?$' => 'index.php?post_type=post&taxonomy=post_tag&term=$matches[1]',
        'blog/(.+?)/?$' => 'index.php?post_type=post&name='. $wp_rewrite->preg_index(1),
    );

    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_action( 'generate_rewrite_rules', 'BaseTheme\PostTypes\add_rewrite_rules' ); 

function change_blog_links($post_link, $id=0) {
    $post = get_post( $id );

    if( is_object($post) && $post->post_type == 'post' ){
        return home_url( '/blog/'. $post->post_name.'/' );
    }

    return $post_link;
}
add_filter( 'post_link', 'BaseTheme\PostTypes\change_blog_links', 1, 3 );
