<?php
$section_prefix = 'main-footer';
$f_title_2 = get_field('f_title_2', 'options');
$f_title_3 = get_field('f_title_3', 'options');
$f_description = get_field('f_description', 'options');
$f_form_shortcode = get_field('f_form_shortcode', 'options');

?>
<div class="<?php echo $section_prefix; ?>__top">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 <?php echo $section_prefix; ?>__col-1">
                <?php if ( have_rows('f_text_blocks_1', 'options') ) : ?>
                    <?php while( have_rows('f_text_blocks_1', 'options') ) : the_row(); ?>
                        <?php
                        $title = get_sub_field( 'title' );
                        $text = get_sub_field( 'text' );
                        ?>

                        <?php if (!empty($title)) : ?>
                            <h2 class="<?php echo $section_prefix; ?>__heading"><?php echo $title; ?></h2>
                        <?php endif; ?>

                        <?php if (!empty($text)) : ?>
                            <?php echo $text; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-5 <?php echo $section_prefix; ?>__col-2">
                <?php if (!empty($f_title_2)) : ?>
                    <h2 class="<?php echo $section_prefix; ?>__heading"><?php echo $f_title_2; ?></h2>
                <?php endif; ?>
                
                <?php if ( has_nav_menu('footer') ) {
                    wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false ) );
                } ?>

                <div class="<?php echo $section_prefix; ?>__social-icons">
                    <?php if (have_rows('f_social_icons', 'options')) : ?>

                        <?php while (have_rows('f_social_icons', 'options')) : the_row();
                            $icon = get_sub_field('icon');
                            $link = get_sub_field('link');
                            
                            if ( !empty( $link ) && !empty( $icon ) ) {
                                echo acf_link_to_button( $link, array( 'classes' => $section_prefix . '__social-icon', 'icon' => $icon ) );
                            }
                        endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-12 col-sm-6 mx-auto col-md-4 <?php echo $section_prefix; ?>__col-3">
                <?php if (!empty($f_title_3)) : ?>
                    <h2 class="<?php echo $section_prefix; ?>__heading"><?php echo $f_title_3; ?></h2>
                <?php endif; ?>
                <?php if (!empty($f_form_shortcode)) : ?>
                    <div class="<?php echo $section_prefix; ?>__newsletter">
                        <?php echo do_shortcode($f_form_shortcode); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>