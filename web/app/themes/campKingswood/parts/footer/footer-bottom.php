<?php
$section_prefix = 'main-footer';
$f_copyright_text = get_field('f_copyright_text', 'options');
$f_logos = get_field('f_logos', 'options');
$f_privacy_policy_link = get_field('f_privacy_policy_link', 'options');
?>

<div class="<?php echo $section_prefix; ?>__bottom">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 <?php echo $section_prefix; ?>__copyright-col">
                <?php if (!empty($f_copyright_text)) : ?>
                    <p class="<?php echo $section_prefix; ?>__copyright"><?php echo do_shortcode($f_copyright_text); ?></p>
                <?php endif; ?>

                <?php if ( $f_privacy_policy_link ) : ?>
                    <?php echo acf_link_to_button( $f_privacy_policy_link ); ?>
                <?php endif; ?>

                <a href="https://www.829llc.com/" target="_blank" rel="noopener"><?php _e( 'Website by 829', 'noc' ); ?></a>
            </div>
            
            <div class="col-12 col-sm-6 <?php echo $section_prefix; ?>__accreditation-col">
                <?php if ( !empty( $f_logos ) ) : ?>
                    <?php foreach( $f_logos as $f_logo ) : ?>
                        <?php if ( !empty( $f_logo['link'] ) ) : ?>
                            <?php echo acf_link_to_button( $f_logo['link'], array( 'classes' => $section_prefix . '__accreditation-link', 'opening_tag_only' => true ) ); ?>
                        <?php else : ?>
                            <div class="<?php echo $section_prefix; ?>__accreditation-link">
                        <?php endif; ?>
                            <?php if ( !empty( $f_logo['logo'] ) ) : ?>
                                <?php echo wp_get_attachment_image( $f_logo['logo'], 'thumbnail', '', array( 'class' => $section_prefix . '__accreditation-logo' ) ); ?>
                            <?php endif; ?>
                        <?php if ( !empty( $f_logo['link'] ) ) : ?>
                            </a>
                        <?php else : ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>