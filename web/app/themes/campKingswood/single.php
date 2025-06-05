<?php
/**
 * The single post page template.
 *
 * @package    WordPress
 * @subpackage campKingswood
 * @since      campKingswood 1.0
 */

get_header();
the_post();

?>
    <main class="page-content">
        <?php
        get_theme_part('post/post-hero');
        ContentBlock::display_theme_blocks();
        get_theme_part('post/post-footer');

        if ( is_singular('post') ) {
            $post_categories = wp_get_post_categories( get_the_ID(), array( 'fields' => 'ids' ) );

            if ( !empty( $post_categories ) ) {
                $args = array(
                    'post_type'   => 'post',
                    'post_status'   => array( 'publish' ),
                    'posts_per_page' => 3,
                    'category__in' => $post_categories,
                    'fields' => 'ids',
                    'post__not_in' => array( get_the_ID() ),
                );

                $posts = get_posts( $args );

                if ( !empty( $posts ) ) {
                    get_theme_part(
                        'page/block-related-posts',
                        array(
                            'section_title' => __( 'Related Posts', 'campKingswood' ),
                            'all_posts_link' => array(
                                'title' => __( 'All Posts', 'campKingswood' ),
                                'url' => get_permalink( get_option( 'page_for_posts' ) ),
                                'target' => '_self'
                            ),
                            'custom_posts' => $posts
                        )
                    );
                }
            }
        }
        ?>
    </main>

<?php
get_footer();
