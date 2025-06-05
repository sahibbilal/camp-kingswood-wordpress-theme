<?php
$title = get_sub_field('cta_title');
$primary_button = get_sub_field('cta_primary_button');
$secondary_button = get_sub_field('cta_secondary_button');
$top_fade_to_white = get_sub_field('top_fade_to_white');
$image_id = get_sub_field('cta_image');
$image = f_img($image_id);
$section_id = ContentBlock::get_section_id();

if ( $top_fade_to_white ) {
    $background_classes = ' fade-to-white';
} else {
    $background_classes = '';
}
?>

<section class="block-home-cta" <?php echo $section_id; ?>>
    <div class="block-home-cta__background<?php echo $background_classes; ?>">
        <?php if (!empty($image)) : ?>
            <?php echo $image; ?>
        <?php endif; ?>
    </div>
    <div class="container">
        <div class="block-home-cta__inner">
            <?php if (!empty($title)) : ?>
                <h2 class="block-home-cta__title"><?php echo $title; ?></h2>
            <?php endif; ?>
            <div class="block-home-cta__button-wrapper">
                <?php if (!empty($primary_button)) : ?>
                    <?php get_theme_part('components/button', ['button' => $primary_button, 'style' => 'secondary', 'class' => 'block-home-cta__button block-home-cta__button--1']); ?>
                <?php endif; ?>
                <?php if (!empty($secondary_button)) : ?>
                    <?php get_theme_part('components/button', ['button' => $secondary_button, 'class' => 'block-home-cta__button block-home-cta__button--2']); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>