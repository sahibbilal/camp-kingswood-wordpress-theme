<?php
$content = get_sub_field('bcl_content');
$image_id = get_sub_field('bcl_image');
$image = f_img($image_id, 'content-large-image');
$section_id = ContentBlock::get_section_id();
?>

<section class="block-content-large-image" <?php echo $section_id; ?>>


    <div class="block-content-large-image__content-col">
        <div class="section-texture section-texture--top">
            <?php echo get_texture('white-3'); ?>
        </div>
        <div class="section-texture section-texture--bottom">
            <?php echo get_texture('white-3'); ?>
            <?php echo get_texture('white-3'); ?>
        </div>
        <div class="section-texture section-texture--right">
            <?php echo get_texture('white-vertical'); ?>
            <?php echo get_texture('white-vertical'); ?>
        </div>

        <?php if (!empty($content)) : ?>
            <div class="block-content-large-image__content-wrapper">
                <?php echo $content; ?>
            </div>
        <?php endif; ?>


        <?php if (have_rows('bcl_grades')) : ?>
            <div class="block-content-large-image__grades">
                <div class="block-content-large-image__grade-col">
                    <?php while (have_rows('bcl_grades')) : the_row();
                        $label = get_sub_field('label');
                        $title = get_sub_field('title');
                        $row_index = get_row_index();

                        if ($row_index == 4) {
                    ?>
                            <!-- Close wrapper before 4th item -->
                </div>
                <div class="block-content-large-image__grade-col block-content-large-image__grade-col--2">
                <?php } ?>

                <div class="block-content-large-image__single-grade">
                    <?php if (!empty($label)) : ?>
                        <p class="overline block-content-large-image__grade-label">
                            <?php echo $label; ?>
                        </p>
                    <?php endif; ?>

                    <?php if (!empty($title)) : ?>
                        <p class="block-content-large-image__grade-title h4">
                            <?php echo $title; ?>
                        </p>
                    <?php endif; ?>
                </div>

            <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($image)) : ?>
        <div class="block-content-large-image__image-col">
            <div class="block-content-large-image__img-wrapper">
                <?php echo $image; ?>
                <div class="visually-hidden">
                    <?php echo get_svg('img-mask-2', 'full-size', '/images/textures/'); ?>
                </div>
                <div class="block-content-large-image__stamp">
                    <?php echo get_svg('stamp', 'full-size', '/images/images/'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>