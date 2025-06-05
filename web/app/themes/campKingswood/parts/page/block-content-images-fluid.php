<?php
/**
 * Block fluid with content and image
 *
 * @package WordPress
 * @subpackage campKingswood
 * @since campKingswood 1.0
 */
$section_prefix = 'block-content-images';
$image_block_format = get_sub_field('image_block_format' );
$pre_heading = get_sub_field( 'pre_heading' );
$heading = get_sub_field( 'heading' );
$image = get_sub_field( 'image' );
$content = get_sub_field( 'content' );
$link = get_sub_field( 'link' );
$image_alignment = get_sub_field( 'image_alignment' );
$logo = get_sub_field( 'logo' );
$section_classes = '';

if ( $image_block_format == 'full' || $image_block_format == 'full-shadow' ) {
    $container_classes = 'container-fluid';
    $image_size = 'full-width-block';
} else {
    $container_classes = 'container';
    $image_size = 'hero-side';
}

if ( $logo ) {
    $section_classes .= ' has-logo';
}
?>

<section class="<?php echo $section_prefix; ?> format-<?php echo $image_block_format; ?><?php echo $section_classes; ?> image-<?php echo $image_alignment; ?>">
    <?php if ( $image_block_format == 'full' || $image_block_format == 'full-shadow' || $image_block_format == 'orange-block' ) : ?>
        <div class="section-texture section-texture--top">
            <?php echo get_texture('sepia-3'); ?>
            <?php echo get_texture('sepia-4'); ?>
        </div>

        <?php if ( $image_block_format == 'orange-block' ) : ?>
            <div class="section-decoration"></div>
        <?php endif; ?>
    <?php endif; ?>
    
    <div class="<?php echo $container_classes; ?>">
        <div class="row">
            <div class="col-12 col-md-6 <?php echo $section_prefix; ?>__image-col">
                <?php if ( $image ) : ?>
                    <?php
                    $css_class = '.' . $section_prefix . '__image.section-' . get_row_index();

                    echo image_alignment_styles( $css_class, get_sub_field('image_vertical_alignment'), get_sub_field('image_horizontal_alignment'), get_sub_field('image_vertical_alignment_mobile'), get_sub_field('image_horizontal_alignment_mobile') );
                    ?>

                    <figure class="<?php echo $section_prefix; ?>__image-wrapper"><?php echo wp_get_attachment_image( $image, $image_size, '', array( 'class' => $section_prefix . '__image section-' . get_row_index() ) ); ?></figure>
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-6 <?php echo $section_prefix; ?>__content-col">
                <?php if ( $pre_heading ) : ?>
                    <p class="overline overline-title"><?php echo $pre_heading; ?></p>
                <?php endif; ?>

                <?php if ( $heading ) : ?>
                    <h2 class="<?php echo $section_prefix; ?>__heading underlined-heading"><?php echo $heading; ?></h2>
                <?php endif; ?>

                <?php if ( $content ) : ?>
                    <div class="<?php echo $section_prefix; ?>__content"><?php echo $content; ?></div>
                <?php endif; ?>
                
                <?php if ( $link ) : ?>
                    <?php echo acf_link_to_button( $link, array( 'classes' => $section_prefix . '__button c-btn c-btn-tertiary' ) ); ?>
                <?php endif; ?>

                <?php if ( !empty( $logo ) ) : ?>
                    <figure class="<?php echo $section_prefix; ?>__logo-wrapper"><?php echo wp_get_attachment_image( $logo, 'large' ); ?></figure>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if ( $image_block_format == 'full' || $image_block_format == 'full-shadow' || $image_block_format == 'orange-block' ) : ?>
        <div class="section-texture section-texture--bottom">
            <?php echo get_texture('white-3'); ?>
            <?php echo get_texture('white-3'); ?>
        </div>
    <?php endif; ?>
</section>