<?php
$content = get_sub_field('ba_content');
$logo = get_sub_field('logo');
$section_id = ContentBlock::get_section_id();
?>

<?php if (!empty($content)) : ?>
    <section class="block-about" <?php echo $section_id; ?>>
        <div class="container">
            <div class="block-about__content-wrapper">
                <?php if ( $logo ) : ?>
                    <figure class="block-about__logo-wrapper"><?php echo wp_get_attachment_image( $logo, 'large', '', array( 'class' => 'block-about__logo' ) ); ?></figure>
                <?php endif; ?>
                
                <?php echo $content; ?>
            </div>
        </div>
        
        <div class="section-texture section-texture--bottom block-about__texture">
            <?php echo get_texture('white-3'); ?>
        </div>
    </section>
    
<?php endif; ?>