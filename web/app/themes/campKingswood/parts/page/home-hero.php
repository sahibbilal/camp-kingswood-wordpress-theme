<?php
$preheading = get_field('hh_preheading');
$title = get_field('hh_title');
$video = get_field('hh_video');
$video_url = get_field('hh_video', false, false);
$hero_buttons = get_field( 'hh_buttons' );
$background_image_id = get_post_thumbnail_id();

$loop_video = get_field('hh_hero_video');
$loop_video_url = get_field('hh_hero_video', false, false);

$bg_img = f_img($background_image_id);

?>

<section class="hero-home">
    <div class="hero-home__inner">
        <?php if (!empty($preheading)) : ?>
            <p class="hero-home__preheading overline">
                <?php echo $preheading; ?>
            </p>
        <?php endif; ?>

        <?php if (!empty($title)) : ?>
            <h1 class="hero-home__title"> <?php echo $title; ?> </h1>
        <?php endif; ?>

        <?php if ( !empty($video) || !empty( $hero_buttons ) ) : ?>
            <div class="hero-home__button-wrapper c-btn-group">
                <?php if ( !empty($video) ) : ?>
                    <div class="c-btn-wrapper text-center">
                        <button class="hero-home__play" data-lightbox="home-hero-lightbox">
                            <?php echo get_svg('play'); ?>
                            <span><?php _e('Watch Video'); ?></span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if ( !empty( $hero_buttons ) ) {
                    echo acf_button_repeater_to_button_group( $hero_buttons, 'video', false );
                } ?>
            </div>
        <?php endif; ?>
    </div>

    <button class="hero-home__scroll-text">
        <?php echo get_svg('scroll-down'); ?>
        <span class="visually-hidden">
            <?php _e('Scroll Down', 'campKingswood'); ?>
        </span>
    </button>

    <?php if (!empty($loop_video)) : ?>
        <div class="hero-home__video-bg">
            <?php get_theme_part('components/video-bg', [
                'video_background_url'      => $loop_video_url,
                'video_background'          => $loop_video,
                'bg_placeholder'            => $background_image_id,
            ]) ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($bg_img)) : ?>
        <div class="hero-home__bg-img">
            <?php echo $bg_img; ?>
        </div>
    <?php endif; ?>

    <?php
    get_theme_part('components/lightbox', [
        'name'      => 'home-hero-lightbox',
        'part_path' => 'page/home-hero-lightbox',
        'part_args' => ['video_url' => $video_url, 'video' => $video]
    ]);
    ?>

    <div class="section-texture section-texture--bottom home-torn-strips">
        <?php echo get_texture('sepia-1'); ?>
        <?php echo get_texture('sepia-2'); ?>
        <?php echo get_texture('sepia-3'); ?>
    </div>
</section>
