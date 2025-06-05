<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage campKingswood
 * @since campKingswood 1.0
 */

get_header(); the_post();
?>
<main class="page-content"><?php
    get_theme_part('page/home-hero');
    ContentBlock::display_theme_blocks();
?></main>
<?php
get_footer();

