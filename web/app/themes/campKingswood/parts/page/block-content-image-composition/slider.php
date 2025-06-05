<?php
$numrows = count(get_sub_field('bci_slider'));
if (have_rows('bci_slider')) :
?>
    <div class="activities-slider">
        
        <div class="activities-slider__nav"></div>
        <div class="activities-slider__slider-wrapper">
            <?php while (have_rows('bci_slider')) : the_row(); ?>
                <?php get_theme_part('page/block-content-image-composition/single-slide') ?>
            <?php endwhile; ?>
        </div>
        <div class="activities-slider__progress">
            <div class="activities-slider__progress-track">
                <div style="width:<?php echo 100/$numrows; ?>%;" class="activities-slider__progress-indicator "></div>
            </div>
            <div class="activities-slider__progress-info">
                <span class="activities-slider__active-slide-number overline">1</span>
                <span class="activities-slider__total-slides-number overline">
                    <?php echo $numrows; ?>
                </span>
            </div>
        </div>
    </div>
<?php endif;
