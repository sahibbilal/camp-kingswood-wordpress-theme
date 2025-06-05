<?php
/**
 * Automatically generate estimated read time for blog posts
 * 
 */

namespace BaseTheme\ReadTime;

function calculate_read_time( $post_id ) {
    $page_blocks = get_field( 'page_blocks', $post_id );

    $content = '';
    
    if ( !empty( $_POST['content'] ) ) {
        $content .= $_POST['content'];
    }

    if ( $page_blocks ) {
        foreach( $page_blocks as $page_block ) {
            if ( !empty( $page_block ) && is_array( $page_block ) ) {
                foreach ( $page_block as $field ) {
                    if ( !empty( $field ) && !is_array( $field ) && strpos( $field, '<p>' ) !== false ) {
                        $content .= $field;
                    }
                }
            }
        }
    }

    $words_per_minute = 225;
    $word_count = str_word_count( strip_tags( do_shortcode($content) ) );
    $minutes = ceil( $word_count / $words_per_minute );

    update_post_meta( $post_id, 'estimated_read_time', $minutes );
}
add_action( 'save_post', 'BaseTheme\ReadTime\calculate_read_time' );
