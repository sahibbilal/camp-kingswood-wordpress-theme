<?php
/**
 * Main Hero section for posts
 *
 * @package WordPress
 * @subpackage campKingswood
 * @since campKingswood  1.0
 */

$section_prefix = 'post-hero';
$read_time = get_post_meta( get_the_ID(), 'estimated_read_time', true );
?>

<section class="<?php echo $section_prefix; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 back-link-wrapper">
                <a class="back-link" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php _e( 'Blog', 'campKingswood' ); ?></a>
            </div>

            <div class="col-12 <?php echo $section_prefix; ?>__top-meta">
                <?php the_category(); ?>

                <?php if ( $read_time ) : ?>
                    <div class="<?php echo $section_prefix; ?>__read-time"><?php printf( __( '%s min read', 'campKingswood' ), $read_time ); ?></div>
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <h1 class="<?php echo $section_prefix; ?>__heading"><?php the_title(); ?></h1>

                <div class="<?php echo $section_prefix; ?>__meta">
                    <span class="<?php echo $section_prefix; ?>__author"><?php printf( __( 'By %s', 'campKingswood' ), esc_html( get_the_author() ) ); ?></span>

                    <span class="<?php echo $section_prefix; ?>__date"><?php the_date(); ?></span>
                </div>
            </div>
        </div>
    </div>

    <?php echo get_the_post_thumbnail( null, 'post-hero', array( 'class' => $section_prefix . '__featured-image' ) ); ?>
</section>