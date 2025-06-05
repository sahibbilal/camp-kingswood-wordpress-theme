<?php
/**
 * Block with content slider
 *
 * @package WordPress
 * @subpackage campKingswood
 * @since campKingswood 1.0
 */

$gallery = '';
$gallery_id = get_sub_field('gallery');
$short_height = get_sub_field( 'short_height' );
$section_classes = '';

if ( $short_height ) {
    $section_classes = ' short-height';
}

if(!empty($gallery_id)){
    $gallery = get_field('gallery_slides', $gallery_id);
}

if (!empty($gallery)):
?>
    <section class="block-gallery-slider<?php echo $section_classes; ?>">
        <div class="container-fluid">
        <?php ContentBlock::the_block_title(); ?>
            <div class="row justify-content-center">
                <div class="col-12 px-0">
                    <div class="bc-gallery__slider">
                        <?php
                        foreach($gallery as $slide):
                            $slide_img = wp_get_attachment_image($slide['image'], 'slider-image-full');
                            $slide_caption = $slide['caption'];
                            
                            if (!empty($slide_img)): ?>
                                <div class="bc-gallery__single-slide">
                                    <figure class="bc-gallery__image"><?php
                                        echo $slide_img;
                                        if (!empty($slide_caption)):
                                        ?><figcaption class="bc-gallery__caption"><?php
                                            echo $slide_caption;
                                        ?></figcaption><?php
                                        endif;
                                    ?></figure>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
