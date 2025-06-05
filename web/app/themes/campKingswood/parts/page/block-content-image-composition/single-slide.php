<?php
$icon_id = get_sub_field('icon');
$title = get_sub_field('title');

$icon = get_svg($icon_id, 'full-size');
?>


<div class="activities-slider__single-slide">
    <div class="activities-slider__inner">
        <div class="activities-slider__header">
            <?php if (!empty($icon)) : ?>
                <div class="activities-slider__icon">
                    <?php echo $icon; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($title)) : ?>
                <h3 class="overline activities-slider__title">
                    <?php echo $title; ?>
                </h3>
            <?php endif; ?>
        </div>
        <div class="activities-slider__list">
            <?php if (have_rows('activities')) : ?>
                <?php while (have_rows('activities')) : the_row();
                    $text = get_sub_field('text')
                ?>
                    <?php if (!empty($text)) : ?>
                        <p class="body-2 activities-slider__list-item">
                            <?php echo $text; ?>
                        </p>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>