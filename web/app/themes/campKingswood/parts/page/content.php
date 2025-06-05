<?php
/**
 * Content part for default page
 *
 * @package WordPress
 * @subpackage campKingswood
 * @since campKingswood  1.0
 */

$use_content_field = get_sub_field('use_default_content');
$block_size = ContentBlock::get_block_size_class();

$main_block_class = 'block-content';
$spacing_class = ContentBlock::get_block_spacing_class();
if(!empty($spacing_class))
    $main_block_class .= ' '.$spacing_class;

?><section class="<?php echo $main_block_class; ?>">
    <div class="container">
        <div class="row">
            <div class="<?php echo $block_size; ?>"><?php
                if($use_content_field){
                    the_content();
                } else {
                    the_sub_field('content');
                    if (get_sub_field('gravity_form_shortcode')) {
                        $gravity_form_shortcode = get_sub_field('gravity_form_shortcode');
                        if (!empty($gravity_form_shortcode)) {
                            echo do_shortcode($gravity_form_shortcode);
                        }
                    }
                }
            ?></div>
        </div>
    </div>
</section><?php
