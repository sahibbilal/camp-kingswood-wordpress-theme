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

            <?php if ( !empty( $grades ) ) : ?>
                <ul class="shs-grade-links">
                    <?php foreach( $grades as $grade ) : ?>
                        <?php if ( !empty( $grade['label'] ) && !empty( $grade['link'] ) ) : ?>
                            <li class="shs-grade-link-wrapper"><h3 class="shs-grade-label"><?php echo $grade['label']; ?></h3><?php echo acf_link_to_button( $grade['link'], array( 'classes' => 'shs-grade-link' ) ); ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if ( !empty( $button ) ) : ?>
                <?php echo acf_link_to_button( $button, array( 'classes' => 'c-btn c-btn-tertiary' ) ); ?>
            <?php endif; ?>

            <div class="shs-decoration"></div>
        </div>

        <?php if ( !empty( $image_1 ) ) : ?>
            <figure class="shs-image-1"><?php echo wp_get_attachment_image( $image_1, 'shs-large' ); ?></figure>
        <?php endif; ?>
        
        <div class="section-texture section-texture--bottom">
            <?php echo get_texture('sepia-1'); ?>
            <?php echo get_texture('sepia-2'); ?>
            <?php echo get_texture('sepia-3'); ?>
        </div>
    </section>
<?php endif; ?>