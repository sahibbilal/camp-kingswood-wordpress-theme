<?php
/**
 * Block for CTA
 *
 * @package WordPress
 * @subpackage campKingswood
 * @since campKingswood 1.0
 */
$heading = get_sub_field('heading' );
$background_color = get_sub_field('background_color' );
$buttons = get_sub_field('buttons' );
?>
<section class="block-cta bg-<?php echo $background_color; ?>">
    <div class="section-texture section-texture--top">
        <?php echo get_texture('sepia-3'); ?>
        <?php echo get_texture('sepia-4'); ?>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2 block-cta__content">
                <div class="sunset"></div> 

                <?php if ( $heading ) : ?>
                    <h2 class="block-cta__heading"><?php echo $heading; ?></h2>
                <?php endif; ?>

                <?php if ( !empty( $buttons ) ) {
                    echo acf_button_repeater_to_button_group( $buttons, $background_color );
                } ?>
            </div>
        </div>
    </div>
        
    <div class="section-texture section-texture--bottom">
        <?php
        if ( $background_color == 'dark-blue' ) {
            echo get_texture('dark-blue-1');
            echo get_texture('dark-blue-2');
            echo get_texture('dark-blue-3');
        } else {
            echo get_texture('white-3');
        } ?>
    </div>
</section>
