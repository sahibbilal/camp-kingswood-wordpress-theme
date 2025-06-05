<nav id="shs-navigation-wrapper">
    <ul id="shs-navigation">
        <?php foreach( $scroll_hook_section_navigation as $key => $nav ) : ?>
            <?php if ( $key == 0 ) {
                $link_classes = ' active';
            } else {
                $link_classes = '';
            } ?>
            <?php if ( !empty( $nav['heading'] ) && !empty( $nav['target'] ) ) : ?>
                <li class="shs-nav-item"><a href="<?php echo $nav['target']; ?>" class="shs-nav-link<?php echo $link_classes; ?>"><?php echo $nav['heading']; ?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</nav>