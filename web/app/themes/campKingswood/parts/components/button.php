<?php
$button    = !isset($button) ? '' : $button;
if ($button) :

    $style     = !isset($style) ? 'primary' : $style;
    $class     = !isset($class) ? '' : $class;
    $color     = !isset($color) ? 'normal' : $color;
    $button_class     = 'c-btn c-btn-' . $style . ' c-btn-color-' . $color . ' ' . $class;
    $is_span = isset($is_span) ? $is_span : false;
?>
    <<?php echo $is_span ? 'span' : 'a'; ?> <?php echo $is_span ? '' : 'href="' . $button['url'] . '"'; ?> class="<?= $button_class; ?>" target="<?= $button['target']; ?>"><span class="c-btn-text"><?= $button['title']; ?></span></<?php echo $is_span ? 'span' : 'a'; ?>>

<?php endif; ?>