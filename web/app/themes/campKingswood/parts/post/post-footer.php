<?php
/**
 * Footer section for posts
 *
 * @package WordPress
 * @subpackage campKingswood
 * @since campKingswood  1.0
 */

$section_prefix = 'post-footer';
?>

<section class="<?php echo $section_prefix; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 offset-lg-2 <?php echo $section_prefix; ?>__tag-col">
                <?php if ( has_tag() ) : ?>
                    <div class="<?php echo $section_prefix; ?>__tag-heading"><?php _e( 'Tags', 'campKingswood' ); ?></div>
                    <?php the_tags( '', ' ', '' ); ?>
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-6 col-lg-4 <?php echo $section_prefix; ?>__a2a-col">
                <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) : ?>
                    <?php ADDTOANY_SHARE_SAVE_KIT(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>