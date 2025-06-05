<?php
$image_1_id = get_sub_field('bci_image_1');
$image_2_id = get_sub_field('bci_image_2');
$image_3_id = get_sub_field('bci_image_3');

$image_1 = f_img($image_1_id, 'composition-img-one');
$image_2 = f_img($image_2_id, 'composition-img-two');
$image_3 = f_img($image_3_id, 'composition-img-three');

$content = get_sub_field('bci_content');

$section_id = ContentBlock::get_section_id();
?>


<section class="block-content-image-composition" <?php $section_id; ?>>

    <div class="section-texture section-texture--top">
        <?php echo get_texture('sepia-1'); ?>
        <?php echo get_texture('sepia-2'); ?>
        <?php echo get_texture('sepia-3'); ?>
    </div>

    <div class="container">
        <div class="block-content-image-composition__row">
            <div class="block-content-image-composition__col block-content-image-composition__col--images">
                <div class="block-content-image-composition__images-wrapper">
                    <?php if (!empty($image_1)) : ?>
                        <div class="block-content-image-composition__img block-content-image-composition__img--1">
                            <?php echo $image_1; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($image_2)) : ?>
                        <div class="block-content-image-composition__img block-content-image-composition__img--2">
                            <?php echo $image_2; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($image_3)) : ?>
                        <div class="block-content-image-composition__img block-content-image-composition__img--3">
                            <?php echo $image_3; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="block-content-image-composition__col block-content-image-composition__col--content">
                <?php if (!empty($content)) : ?>
                    <div class="block-content-image-composition__content-wrapper">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
                <?php get_theme_part('page/block-content-image-composition/slider') ?>
            </div>
        </div>
    </div>
</section>