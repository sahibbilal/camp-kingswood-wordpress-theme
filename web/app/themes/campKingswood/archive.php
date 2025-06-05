<?php
/**
 * Template for categories/tag taxonomy indexes.
 *
 * @package    WordPress
 * @subpackage campKingswood
 * @since      campKingswood 1.0
 */

get_header();

$tax_conditions = is_tax() || is_category();
$heading_text = get_blog_heading();
$post_type = get_post_type();
$taxonomy = $tax_conditions ? get_queried_object()->taxonomy : NULL;
$term_id = $tax_conditions ? get_queried_object()->term_id : NULL;
?>

<main class="page-content">
    <?php get_theme_part('post/post-archive-hero'); ?>
    
    <section class="content container post-container">
        <div class="row">
            <div class="col-12">
                <?php 
                if (class_exists('eight29_filters') && !is_search()) {
                    //Update the conditional and attributes as needed
                    //Full list of attributes here: https://bitbucket.org/829studios/829-blog-category-filters-react/src/master/
                    echo do_shortcode('[eight29_filters 
                    post_type="'.$post_type.'" 
                    display_sidebar="false" 
                    display_search="false" 
                    display_author="false" 
                    posts_per_page="12" 
                    taxonomy="'.$taxonomy.'"
                    term_id="'.$term_id.'"
                    ]');
                }
                ?>
            </div>
        </div>
    </section>

    <?php ContentBlock::display_theme_blocks( 'page_blocks' , 'blog-options' ); ?>
</main>

<?php
get_footer();
