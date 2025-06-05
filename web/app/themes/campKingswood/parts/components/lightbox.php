<?php
$part_path = isset($part_path) ? $part_path : null;
$part_args = isset($part_args) ? $part_args : [];
$name = isset($name) ? $name : null;

$lightbox_data = '';

if (!empty($name)) {
    $lightbox_data = "data-lightbox-name='$name'";
}
?>

<div class="lightbox" <?php echo $lightbox_data; ?>>
    <button class="lightbox__close-btn" aria-label="<?php _e( 'Close Lightbox', 'campKingswood' ); ?>"></button>
    <?php get_theme_part($part_path, $part_args); ?>
</div>