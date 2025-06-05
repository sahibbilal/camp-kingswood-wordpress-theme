<?php
$link = isset($link) ? $link : null;
$class = isset($class) ? $class : null;
$icon = isset($icon) ? $icon : null;

if (!empty($link)) :
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
?>
    <a <?php if (!empty($class)) : ?> class="<?php echo $class; ?>" <?php endif; ?> href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" <?php if ($link_target === "_blank") : ?> rel="nofollow noopener" <?php endif; ?>>
        <span>
            <?php echo esc_html($link_title); ?>
        </span>

        <?php if (!empty($icon)) : ?>
            <span class="link-icon">
                <?php echo $icon; ?>
            </span>
        <?php endif; ?>
    </a>
<?php endif;
