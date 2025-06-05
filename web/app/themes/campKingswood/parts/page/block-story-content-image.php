<?php
$content = get_sub_field('bsc_content');
$image_id = get_sub_field('bsc_image');

$image = f_img($image_id, 'story-content-img');
$section_id = ContentBlock::get_section_id();

?>

<?php get_theme_part('components/lightbox', [
    'part_path' => 'page/story-lightbox',
    'name'      => 'story-lightbox'
]) ?>

<section class="block-story-content-image" <?php echo $section_id; ?>>

    <div class="section-texture section-texture--top">
        <?php echo get_texture('white-3'); ?>
    </div>
    <div class="container">
        <div class="block-story-content-image__row">
            <div class="block-story-content-image__col block-story-content-image__col--text">
                <?php if (!empty($content)) : ?>
                    <div class="block-story-content-image__content-wrapper">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="block-story-content-image__col block-story-content-image__col--img">
                <div class="block-story-content-image__img-wrapper">
                    <?php if (!empty($image)) : ?>
                        <?php
                        echo $image;
                        echo get_svg('img-mask', 'full-size', '/images/textures/');
                        ?>
                    <?php endif; ?>

                </div>
            </div>

            <?php if (have_rows('bsc_lightbox_buttons')) : ?>
                <div class="block-story-content-image__buttons-wrapper">
                    <?php while (have_rows('bsc_lightbox_buttons')) : the_row();
                        $button_title = get_sub_field('button_title');
                        $row_index = get_row_index() - 1;
                    ?>
                        <button class="story-button lightbox-toggler" data-lightbox="story-lightbox" data-lightbox-slide="<?php echo $row_index; ?>">
                            <div class="story-button__text-wrapper">
                                <?php if (!empty($button_title)) : ?>
                                    <p class="story-button__text h3">
                                        <?php echo $button_title; ?>
                                    </p>
                                <?php endif; ?>
                                <p class="c-btn c-btn-tertiary">
                                    <?php _e('Read bio', 'campKingswood'); ?>
                                </p>
                            </div>
                        </button>

                    <?php endwhile; ?>
                </div>

            <?php endif; ?>
        </div>
    </div>
</section>