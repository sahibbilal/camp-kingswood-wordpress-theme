<?php
extract( $scroll_hook_section );
if ( !empty( $scroll_hook_section_format ) ) : ?>
    <?php if ( !empty( $scroll_hook_heading ) ) {
        $section_id = ' id="' . sanitize_title( $scroll_hook_heading ) . '"';
    } else {
        $section_id = '';
    } ?>

    <section class="shs-section shs-<?php echo $scroll_hook_section_format; ?>"<?php echo $section_id; ?>>
        <div class="shs-content">
            <?php if ( !empty( $content ) ) : ?>
                <?php echo $content; ?>
            <?php endif; ?>

            <?php if ( !empty( $button ) ) : ?>
                <?php echo acf_link_to_button( $button, array( 'classes' => 'c-btn c-btn-tertiary' ) ); ?>
            <?php endif; ?>

            <div class="shs-decoration"></div>
        </div>

        <?php if ( !empty( $image_1 ) ) : ?>
            <figure class="shs-image-1"><?php echo wp_get_attachment_image( $image_1, 'shs-large' ); ?></figure>
        <?php endif; ?>

        <?php if ( !empty( $image_2 ) ) : ?>
            <figure class="shs-image-2"><?php echo wp_get_attachment_image( $image_2, 'shs-small' ); ?></figure>

            <div class="shs-image-2-bg"><div class="shs-image-2-bg-inner"></div></div>
        <?php endif; ?>
        
        <div class="section-texture section-texture--bottom">
            <?php echo get_texture('sepia-1'); ?>
            <?php echo get_texture('sepia-2'); ?>
            <?php echo get_texture('sepia-3'); ?>
        </div>
    </section>
<?php endif; ?>