<?php
/**
 * Main Hero section for page
 *
 * @package WordPress
 * @subpackage campKingswood
 * @since campKingswood  1.0
 */

$section_prefix = 'page-hero';
$section_classes = '';
$page_hero_format = get_field('page_hero_format');

if ( !empty( $page_hero_format ) && $page_hero_format != 'none' ) :
    $page_hero_heading = get_field('page_hero_heading');
    $page_hero_text = get_field( 'page_hero_text' );
    $page_hero_image = get_field( 'page_hero_image' );
    $page_hero_buttons = get_field( 'page_hero_buttons' );

    if ( $page_hero_format == 'background' ) {
        $image_size = 'hero';
        $heading_classes = '';
    } else {
        $image_size = 'hero-side';
        $heading_classes = ' underlined-heading text-left white';
    }

    $section_classes .= ' format-' . $page_hero_format;

    if ( !$page_hero_heading ) {
        $page_hero_heading = get_the_title();
    }

    if ( empty( $page_hero_text ) ) {
        $section_classes .= ' no-text';
    }

    if ( $page_hero_image ) {
        $page_hero_image = wp_get_attachment_image( $page_hero_image, $image_size );
    } elseif ( has_post_thumbnail() ) {
        $page_hero_image = get_the_post_thumbnail( null, $image_size );
    }

    if ( !empty( $page_hero_image ) ) {
        $section_classes .= ' has-image';
        $thumbnail_class = 'page-hero__thumbnail';
        $css_class = '.' . $section_prefix . '__thumbnail img';

        echo image_alignment_styles( $css_class, get_field('featured_image_vertical_alignment'), get_field('featured_image_horizontal_alignment'), get_field('featured_image_vertical_alignment_mobile'), get_field('featured_image_horizontal_alignment_mobile') );
    }
    ?>

    <section class="<?php echo $section_prefix; ?><?php echo $section_classes; ?>">
        <div class="container">
            <div class="row">
                <div class="col-12 <?php echo $section_prefix; ?>__content">
                    <?php if ( !empty( $page_hero_heading ) ) : ?>
                        <h1 class="<?php echo $section_prefix; ?>__heading<?php echo $heading_classes; ?>"><?php echo $page_hero_heading; ?></h1>
                    <?php endif; ?>

                    <?php if ( !empty( $page_hero_text ) ) : ?>
                        <div class="<?php echo $section_prefix; ?>__text"><?php echo $page_hero_text; ?></div>
                    <?php endif; ?>

                    <?php if ( !empty( $page_hero_buttons ) ) {
                        echo acf_button_repeater_to_button_group( $page_hero_buttons );
                    } ?>
                </div>

                <?php if ( $page_hero_format == 'side' && !empty( $page_hero_image ) ) : ?>
                    <div class="col-12 <?php echo $section_prefix; ?>__side-image-col">
                        <figure class="<?php echo $section_prefix; ?>__thumbnail"><?php echo $page_hero_image; ?></figure>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if ( $page_hero_format == 'background' && !empty( $page_hero_image ) ) : ?>
            <figure class="<?php echo $section_prefix; ?>__thumbnail"><?php echo $page_hero_image; ?></figure>
        <?php endif; ?>

        <div class="section-texture section-texture--bottom">
            <?php echo get_texture('sepia-1'); ?>
            <?php echo get_texture('sepia-2'); ?>
            <?php echo get_texture('sepia-3'); ?>
        </div>
    </section>
<?php endif; ?>