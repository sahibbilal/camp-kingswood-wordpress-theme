<?php
/**
 * Block for images content links
 *
 * @package WordPress
 * @subpackage campKingswood
 * @since campKingswood 1.0
 */
    $main_sect_class[] = 'block-content-links';
    if ( get_row_layout() === 'block_text_links')
        $main_sect_class[] = 'block-content-links-text';

    $link_icon_name = 'content-link-arrow.svg';
    $icon_path = get_template_directory() . '/images/icons/' .  $link_icon_name;
    $icon = file_get_contents($icon_path);
?>
<section class="<?php echo implode(' ', $main_sect_class); ?>">
    <div class="container">
        <?php ContentBlock::the_block_title(); ?>

        <div class="row">
            <?php while(have_rows('content_links')): the_row();
                $title = get_sub_field('title');
                $link = get_sub_field('link');
                $size = get_sub_field('size');
                $class = '';
                $image_size = '';

                if ( $size == 'half' ) {
                    $class = 'col-12 col-sm-6';
                    $image_size = 'hero-side';
                } elseif ( $size == 'two-thirds' ) {
                    $class = 'col-12 col-sm-8 mx-auto';
                    $image_size = 'content-large-image';
                } elseif ( $size == 'third' ) {
                    $class = 'col-12 col-sm-4';
                    $image_size = 'thumbnail-content-image';
                } else {
                    $class = 'col-12 col-sm-3';
                    $image_size = 'menu-image';
                }

                $img = wp_get_attachment_image( get_sub_field('image'), $image_size );

                if (!empty($img)) {
                    $class .= ' has-image';
                }
                ?>
                <div class="<?php echo $class; ?> content-link__single">
                    <?php if ( $link ) : ?>
                        <?php echo acf_link_to_button($link, array( 'classes' => 'image-link has-link', 'opening_tag_only' => true ) ); ?>
                    <?php else : ?>
                        <div class="image-link">
                    <?php endif; ?>

                        <?php if (!empty($img)): ?>
                            <figure class="image-wrapper"><?php echo $img; ?></figure>
                        <?php endif; ?>

                        <span class="border-element"></span>

                        <?php if (!empty($link['title'])): ?>
                            <h4 class="title-wrapper"><?php echo $link['title']; ?></h4>
                        <?php endif; ?>
                
                    <?php if ( $link ) : ?>
                        </a>
                    <?php else : ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
