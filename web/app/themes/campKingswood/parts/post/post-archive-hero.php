<?php
/**
 * Main Hero section for post categories/tags
 *
 * @package WordPress
 * @subpackage campKingswood
 * @since campKingswood  1.0
 */

$section_prefix = 'post-archive-hero';
$pre_heading = '';
$title = '';

if ( !empty( get_queried_object()->taxonomy ) ) {
    $taxonomy = get_taxonomy( get_queried_object()->taxonomy );

    if ( !empty( $taxonomy->labels->singular_name ) ) {
        $pre_heading = $taxonomy->labels->singular_name;

        if ( $pre_heading == 'Tag' ) {
            $pre_heading = __( 'Tagged as', 'campKingswood' );
        }
    }

    $title = single_term_title( '', false );
} else if ( is_author() ) {
    $pre_heading = __( 'Written by', 'campKingswood' );
    $title  = get_the_author();
} else {
    $title = get_the_archive_title();
}
?>

<section class="<?php echo $section_prefix; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 back-link-wrapper">
                <a class="back-link" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php _e( 'Blog', 'campKingswood' ); ?></a>
            </div>

            <div class="col-12">
                <?php if ( $pre_heading ) : ?>
                    <div class="<?php echo $section_prefix; ?>__pre-heading"><?php echo $pre_heading; ?></div>
                <?php endif; ?>
                
                <h1 class="<?php echo $section_prefix; ?>__heading"><?php echo $title; ?></h1>
            </div>
        </div>
    </div>
</section>