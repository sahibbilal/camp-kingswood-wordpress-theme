<?php
/**
 * The footer for theme.
 *
 * @package    WordPress
 * @subpackage campKingswood
 * @since      campKingswood 1.0
 */

?>

    <footer class="main-footer"><?php
            get_theme_part( 'footer/footer-top' );
            get_theme_part( 'footer/footer-bottom' );
    ?></footer>
</div> <!-- /#page -->

<div class="visually-hidden">
    <?php echo get_svg('img-mask-responsive', 'full-size', '/images/textures/'); ?>
    <?php echo get_svg('img-mask-responsive-left', 'full-size', '/images/textures/'); ?>
    <?php echo get_svg('img-mask-responsive-right', 'full-size', '/images/textures/'); ?>
</div>

<?php wp_footer(); ?>

</body>
</html>