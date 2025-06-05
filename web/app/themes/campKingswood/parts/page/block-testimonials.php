<?php
/**
 * Testimonials block
 *
 * @package WordPress
 * @subpackage campKingswood
 * @since campKingswood 1.0
 */

$section_prefix = 'block-testimonials';
$testimonials = get_sub_field( 'testimonials' );
?>

<?php if ( !empty( $testimonials ) ) : ?>
    <section class="<?php echo $section_prefix; ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="<?php echo $section_prefix; ?>__slider">
                        <?php foreach( $testimonials as $testimonial ) : ?>
                            <?php
                            $content = '';
                            $name = '';
                            $title = '';

                            if ( !empty( $testimonial['custom_content'] ) ) {
                                if ( !empty( $testimonial['custom_content'] ) ) {
                                    $content = $testimonial['custom_content'];
                                }

                                if ( !empty( $testimonial['custom_name'] ) ) {
                                    $name = $testimonial['custom_name'];
                                }

                                if ( !empty( $testimonial['custom_title'] ) ) {
                                    $title = $testimonial['custom_title'];
                                }
                            } else if ( !empty( $testimonial['testimonial'] ) ) {
                                $content = get_the_content( null, false, $testimonial['testimonial'] );
                                $name = get_field( 'testimonial_name', $testimonial['testimonial'] );
                                $title = get_field( 'testimonial_title', $testimonial['testimonial'] );
                            } else {
                                continue;
                            }
                            ?>

                            <div class="<?php echo $section_prefix; ?>__slide">
                                <?php if ( !empty( $content ) ) : ?>
                                    <div class="<?php echo $section_prefix; ?>__slide-content"><?php echo $content; ?></div>

                                    <?php if ( !empty( $name ) || !empty( $title ) ) : ?>
                                        <div class="<?php echo $section_prefix; ?>__name-title">
                                            <?php if ( !empty( $name ) ) : ?>
                                                <div class="<?php echo $section_prefix; ?>__name"><?php echo $name; ?></div>
                                            <?php endif; ?>

                                            <?php if ( !empty( $title ) ) : ?>
                                                <div class="<?php echo $section_prefix; ?>__title"><?php echo $title; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>