<?php
/**
 * Block for CTA
 *
 * @package WordPress
 * @subpackage campKingswood
 * @since campKingswood 1.0
 */
$section_prefix = 'block-related-posts';

if ( !isset( $section_title ) ) {
    $section_title = get_sub_field( 'section_title' );
}

if ( !isset( $related_posts_block_format ) ) {
    $related_posts_block_format = get_sub_field( 'related_posts_block_format' );

    if ( empty( $related_posts_block_format ) ) {
        $related_posts_block_format = 'default';
    }
}

if ( !isset( $pre_heading ) ) {
    $pre_heading = get_sub_field( 'pre_heading' );
}

if ( !isset( $all_posts_link ) ) {
    $all_posts_link = get_sub_field( 'all_posts_link' );
}

if ( isset( $custom_posts ) ) {
    $related_posts = array();

    foreach ( $custom_posts as $custom_post ) {
        $related_posts[]['post'] = $custom_post;
    }
} else {
    $related_posts = get_sub_field( 'related_posts' );
}

if ( empty( $related_posts ) ) {
    if ( $related_posts_block_format == 'featured' ) {
        $posts_per_page = '4';
    } else {
        $posts_per_page = '3';
    }

    $args = array(
        'post_type'   => 'post',
        'post_status'   => array( 'publish' ),
        'posts_per_page' => $posts_per_page,
        'fields' => 'ids',
    );

    $custom_posts = get_posts( $args );
    $related_posts = array();

    if ( !empty( $custom_posts ) ) {
        foreach ( $custom_posts as $custom_post ) {
            $related_posts[]['post'] = $custom_post;
        }
    }
}

if ( $related_posts_block_format == 'featured' ) {
    $image_size = 'hero-side';
    $button_classes = '';
} else {
    $image_size = 'thumbnail-content-image';
    $button_classes = ' c-btn-color-alt';
}
?>
<?php if ( !empty( $related_posts ) ) : ?>
    <section class="<?php echo $section_prefix; ?> format-<?php echo $related_posts_block_format; ?>">
        <div class="container">
            <div class="row">
                <?php if ( $section_title ) : ?>
                    <?php if ( $pre_heading ) : ?>
                        <div class="col-12"><div class="overline"><?php echo $pre_heading; ?></div></div>
                    <?php endif; ?>

                    <div class="col-12 <?php echo $section_prefix; ?>__heading-col">
                        <h2 class="<?php echo $section_prefix; ?>__heading"><?php echo $section_title; ?></h2>
                        
                        <?php if ( $all_posts_link ) : ?>
                            <?php echo acf_link_to_button( $all_posts_link, array( 'classes' => $section_prefix . '__all-posts-link c-btn c-btn-tertiary' . $button_classes ) ); ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
                <?php foreach( $related_posts as $key => $related_post ) : ?>
                    <?php if ( empty( $related_post['post'] ) ) {
                        continue;
                    }
                    $permalink = get_the_permalink( $related_post['post'] );
                    $read_time = get_post_meta( $related_post['post'], 'estimated_read_time', true );
                    ?>
                    
                    <div class="col-12 col-md-4 <?php echo $section_prefix; ?>__post-col col-number-<?php echo $key; ?>">
                        <article class="eight29-post eight29-post-card h-100">
                            <?php if ( $related_posts_block_format == 'default' || $key ==0 ) : ?>
                                <a href="<?php echo $permalink; ?>" class="eight29-featured-image">
                                    <figure>
                                        <?php echo get_the_post_thumbnail( $related_post['post'], $image_size ); ?>
                                    </figure>
                                </a>
                            <?php endif; ?>

                            <div class="eight29-post-body">
                                <?php if ( $related_posts_block_format == 'default' ) : ?>
                                    <div class="eight29-post-categories">
                                        <?php echo get_the_category_list( '', '', $related_post['post'] ); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ( $read_time && $related_posts_block_format == 'featured' ) : ?>
                                    <div class="eight29-post-readtime"><?php printf( __( '%s min read', 'campKingswood' ), $read_time ); ?></div>
                                <?php endif; ?>
                                
                                <h4 class="eight29-post-title">
                                    <a href="<?php echo $permalink; ?>"><?php echo get_the_title( $related_post['post'] ); ?></a>
                                </h4>
                                
                                <div class="eight29-post-detail">
                                    <?php if ( $read_time && $related_posts_block_format == 'default' ) : ?>
                                        <div class="eight29-post-readtime"><?php printf( __( '%s min read', 'campKingswood' ), $read_time ); ?></div>
                                    <?php endif; ?>

                                    
                                    <?php if ( $related_posts_block_format == 'featured' ) : ?>
                                        <a href="<?php echo $permalink; ?>" class="c-btn c-btn-tertiary"><?php _e( 'Read More', 'campKingswood' ); ?></a>

                                        <?php if ( $key == 0 ) : ?>
                                            <div class="border-element"></div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>