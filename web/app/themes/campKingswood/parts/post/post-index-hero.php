<?php
/**
 * Main Hero section for post index
 *
 * @package WordPress
 * @subpackage campKingswood
 * @since campKingswood  1.0
 */

$section_prefix = 'post-index-hero';
$post_index_id = get_option( 'page_for_posts' );
$page_hero_heading = get_field( 'page_hero_heading', $post_index_id );
$page_hero_text = get_field( 'page_hero_text', $post_index_id );

if ( !$page_hero_heading ) {
    $page_hero_heading = get_the_title( $post_index_id );
}
?>

<section class="<?php echo $section_prefix; ?>">
    <div class="container">
        <div class="row <?php echo $section_prefix; ?>__row">
            <?php if ( !empty( $page_hero_heading ) ) : ?>
                <div class="col-12 col-md-6 <?php echo $section_prefix; ?>__heading-col">
                    <h1 class="<?php echo $section_prefix; ?>__heading<?php echo $heading_classes; ?>"><?php echo $page_hero_heading; ?></h1>
                </div>
            <?php endif; ?>

            <?php if ( !empty( $page_hero_text ) ) : ?>
                <div class="col-12 col-md-6 <?php echo $section_prefix; ?>__text-col">
                    <?php echo $page_hero_text; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="section-texture section-texture--bottom home-torn-strips">
        <?php echo get_texture('sepia-1'); ?>
        <?php echo get_texture('sepia-2'); ?>
        <?php echo get_texture('sepia-3'); ?>
    </div>
</section>