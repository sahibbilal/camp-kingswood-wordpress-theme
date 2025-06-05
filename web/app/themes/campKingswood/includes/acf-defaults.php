<?php

/**
 * Theme ACF defaults
 * 
 */

namespace BaseTheme\ACFDefaults;

function menu_item_format( $field ) {
    $field['choices'] = array(
        'default' => 'Default',
        'button' => 'Button',
        'image' => 'Image',
        'image-desktop' => 'Image (desktop only)',
        'hidden' => 'Hidden Section Heading',
    );
    $field['default_value'] = 'default';
    return $field;
}
add_filter( 'acf/load_field/name=menu_item_format', 'BaseTheme\ACFDefaults\menu_item_format' );

function scroll_hook_section_format( $field ) {
    $field['choices'] = array(
        'two_images' => 'Two Images',
        'two_images_alt' => 'Two Images (alt)',
        'three_images' => 'Three Images',
        'grades' => 'Grades',
        'logo' => 'Logo',
    );
    $field['default_value'] = 'two_images';
    return $field;
}
add_filter( 'acf/load_field/name=scroll_hook_section_format', 'BaseTheme\ACFDefaults\scroll_hook_section_format' );

function page_hero_format( $field ) {
    $field['choices'] = array(
        'text' => 'Text',
        'background' => 'Background Image',
        'side' => 'Side Image',
        'none' => 'No banner'
    );
    $field['default_value'] = 'text';

    if ( get_the_ID() != 691 ) {
        unset( $field['choices']['background'] );
    }
    
    return $field;
}
add_filter( 'acf/load_field/name=page_hero_format', 'BaseTheme\ACFDefaults\page_hero_format' );

function image_block_format( $field ) {
    $field['choices'] = array(
        'default' => 'Default',
        'full' => 'Full Width',
        'full-shadow' => 'Full Width (with orange image shadow)',
        'orange-block' => 'Orange block decoration'
    );
    $field['default_value'] = 'default';
    return $field;
}
add_filter( 'acf/load_field/name=image_block_format', 'BaseTheme\ACFDefaults\image_block_format' );

function related_posts_block_format( $field ) {
    $field['choices'] = array(
        'default' => 'Default',
        'featured' => 'Featured Post',
    );
    $field['default_value'] = 'default';
    return $field;
}
add_filter( 'acf/load_field/name=related_posts_block_format', 'BaseTheme\ACFDefaults\related_posts_block_format' );

function heading( $value, $post_id, $field ) {
    return do_shortcode( $value );
}
add_filter( 'acf/format_value/name=heading', 'BaseTheme\ACFDefaults\heading', 10, 3 );

function button_color( $field ) {
    $field['choices'] = array(
        'primary' => 'Primary',
        'white' => 'White',
    );
    $field['default_value'] = 'primary';
    return $field;
}
add_filter( 'acf/load_field/name=button_color', 'BaseTheme\ACFDefaults\button_color' );