<?php
$content = get_sub_field('cf_content');
$form_shortcode = get_sub_field('cf_form');

$section_id = ContentBlock::get_section_id();
?>

<section class="block-contact" <?php echo $section_id; ?>>
    <div class="section-texture section-texture--top">
        <?php echo get_texture('sepia-3'); ?>
        <?php echo get_texture('sepia-4'); ?>
    </div>

    <div class="container">
        <div class="block-contact__row">
            <div class="block-contact__col">
                <?php if (!empty($content)) : ?>
                    <div class="block-contact__content-wrapper">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="block-contact__col">
                <?php if (!empty($form_shortcode)) : ?>
                    <div class="block-contact__form-wrapper">
                        <?php echo do_shortcode($form_shortcode); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>