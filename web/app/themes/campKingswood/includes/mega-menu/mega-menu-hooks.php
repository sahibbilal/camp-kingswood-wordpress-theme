<?php

/**
 * Hooks for mega menu
 * 
 * Please follow the same format for registering new shortcodes.
 */

namespace BaseTheme\MegaMenu;

function nav_menu_item_title( $title, $item, $args, $depth ) {
    if ( $args->menu->slug == 'sub-navigation' ) {
        $icon = get_field( 'icon', $item );

        if ( $icon ) {
            $title = '<i class="' . $icon . '"></i><span>' . $title . '</span>';
        }
    }

    return $title;
}
add_filter( 'nav_menu_item_title', 'BaseTheme\MegaMenu\nav_menu_item_title', 10, 4 );

function body_class( $classes ) {
    $show_announcement_bar = get_field('show_announcement_bar', 'options');

    if ( $show_announcement_bar && !isset( $_COOKIE['AnnouncementBarClosed'] ) ) {
        $classes[] = 'announcement-bar';
    }

    return $classes;
}
add_filter( 'body_class', 'BaseTheme\MegaMenu\body_class' );