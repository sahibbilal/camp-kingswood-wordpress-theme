<?php

/**
 * The Header for theme.
 *
 * Displays all of the <head> section and page header
 *
 * @package    WordPress
 * @subpackage campKingswood
 * @since      campKingswood 1.0
 */

get_theme_part('html-head');
$main_logo = get_field('main_logo', 'options');
$show_announcement_bar = get_field('show_announcement_bar', 'options');
?>

<body <?php body_class(); ?>>
    <div id="page">
        <header id="main-header" class="main-header">
            <?php if ( $show_announcement_bar && !isset( $_COOKIE['AnnouncementBarClosed'] ) ) : ?>
                <?php
                $announcement_bar_text = get_field('announcement_bar_text', 'options');
                $announcement_bar_link = get_field('announcement_bar_link', 'options');
                ?>

                <div id="announcement-bar" class="active">
                    <div>
                        <?php if ( $announcement_bar_text ) : ?>
                            <span><?php echo $announcement_bar_text; ?></span>
                        <?php endif; ?>

                        <?php if ( $announcement_bar_link ) : ?>
                            <?php echo acf_link_to_button( $announcement_bar_link, array( 'classes' => 'c-btn c-btn-text' ) ); ?>
                        <?php endif; ?>
                    </div>

                    <button type="button" class="c-btn c-btn-text" id="announcement-bar-close" aria-label="<?php _e( 'Hide announcement', 'campKingswood' ); ?>"><span class="icon icon-close"></span></button>
                </div>
            <?php endif; ?>

            <div class="container main-header__container">
                <div class="main-header__mobile-top">
                    <?php if (!empty($main_logo)) : ?>
                        <a href="<?php echo home_url('/'); ?>" aria-label="<?php _e( 'Camp Kingswood Logo', 'campKingswood' ); ?>" class="main-header__logo"><?php echo f_img($main_logo, 'main-logo'); ?></a>
                    <?php endif; ?>

                    <?php if ( have_rows('mobile_navbar_icon_links', 'options') ) : ?>
                        <div class="main-header__mobile-icons">
                            <?php while( have_rows('mobile_navbar_icon_links', 'options') ) : the_row(); ?>
                                <?php
                                $link = get_sub_field('link' );
                                $icon = get_sub_field('icon' );

                                if ( $link && $icon ) {
                                    echo acf_link_to_button( $link, array( 'icon' => $icon, 'no_text' => true ) );
                                }
                                ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    
                    <button class="btn-hamburger" aria-label="<?php _e( 'Open Menu', 'campKingswood' ); ?>"><span></span><span></span><span></span></button>

                    <button type="button" class="main-header__mobile-back-button"><span><?php _e( 'Back', 'campKingswood' ); ?></span></button>
                </div>
                <nav class="main-header__nav-wrapper">
                    <div class="main-header__sub-nav">
                        <?php if ( has_nav_menu('sub-navigation') ) {
                            wp_nav_menu( array( 'theme_location' => 'sub-navigation', 'container' => false ) );
                        } ?>
                    </div>
                    
                    <div class="main-header__nav">
                        <?php if ( has_nav_menu('primary') ) {
                            wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'walker' => new megaMenuNavWalker ) );
                        } ?>
                    </div>
                </nav>
            </div>
        </header>