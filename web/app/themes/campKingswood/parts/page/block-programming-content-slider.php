<?php
/**
 * Block for programming content slider
 *
 * @package WordPress
 * @subpackage campKingswood
 * @since campKingswood 1.0
 */
$section_prefix = 'block-programming-content-slider';
?>

<section class="<?php echo $section_prefix; ?>">
    <div class="<?php echo $section_prefix; ?>__content-col">
        <div class="section-texture section-texture--top">
            <?php echo get_texture('white-3'); ?>
            <?php echo get_texture('white-3'); ?>
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

        <div class="<?php echo $section_prefix; ?>__content">
            <?php ContentBlock::the_block_title(); ?>
        </div>
    </div>

    <div class="<?php echo $section_prefix; ?>__slider">
        <?php if ( have_rows('slides') ) : ?>
            <?php while( have_rows('slides') ) : the_row(); ?>
                <?php
                $image = get_sub_field( 'image' );
                $pre_heading = get_sub_field( 'pre_heading' );
                $title = get_sub_field( 'title' );
                $link = get_sub_field( 'link' );
                ?>

                    
                <?php if ( $link ) : ?>
                    <?php echo acf_link_to_button( $link, array( 'classes' => $section_prefix . '__slide', 'opening_tag_only' => true ) ); ?>
                <?php else : ?>
                    <div class="<?php echo $section_prefix; ?>__slide">
                <?php endif; ?>
                        <div class="<?php echo $section_prefix; ?>__slide-inner">
                            <?php if ( $image ) : ?>
                                <figure class="<?php echo $section_prefix; ?>__image-wrapper"><?php echo wp_get_attachment_image( $image, 'slider-image-small', '', array( 'class' => $section_prefix . '__image' ) ); ?></figure>
                            <?php endif; ?>
                            
                            <div class="<?php echo $section_prefix; ?>__slide-content">
                                <?php if ( $pre_heading ) : ?>
                                    <div class="overline"><?php echo $pre_heading; ?></div>
                                <?php endif; ?>
                                
                                <?php if ( $title ) : ?>
                                    <h3 class="<?php echo $section_prefix; ?>__slide-title"><?php echo $title; ?></h3>
                                <?php endif; ?>
                            </div>

                            <div class="border-element"></div>
                        </div>
                <?php if ( $link ) : ?>
                    </a>
                <?php else : ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
        
    <div class="section-texture section-texture--bottom">
        <?php
        echo get_texture('dark-blue-1');
        echo get_texture('dark-blue-2');
        echo get_texture('dark-blue-3');
        ?>
    </div>
</section>