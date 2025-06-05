<?php
/**
 * Custom theme utilities
 *
 * @package WordPress
 * @subpackage campKingswood
 * @since campKingswood 1.0
 */

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99 );
add_filter( 'the_content', 'shortcode_unautop', 100 );

function remove_empty_tags_around_shortcodes_acf_wysiwyg( $value ) {
  $tags = array(
      '<p>[' => '[',
      ']</p>' => ']',
      ']<br>' => ']',
      ']<br />' => ']'
  );

  $content = apply_filters('the_content',$value);
  $content = strtr($content, $tags);
  return $content;
}

add_filter('acf_the_content', 'remove_empty_tags_around_shortcodes_acf_wysiwyg', 10, 1);

// Shortcodes Break Grid
function break_grid($state = 'close') {
    if ($state === 'close') {
        echo '</div></div></div>';
    } else {
        echo '<div class="container"><div class="row"><div class="' . ContentBlock::get_block_size_class() . '">';
    }
}

/**
 * Echoes theme images path
 *
 * @return void
 */
function the_images_url() {
	echo get_template_directory_uri() . '/images/';
}

/**
 * Returns theme images path
 *
 * @return string Images path
 */
function get_the_images_url() {
	return get_template_directory_uri() . '/images/';
}

/**
 * Returns current post number. Must be used inside the loop
 *
 * @return Int | bool Post number or false if number is not found
 */
function get_post_num() {
	$query = new WP_Query(array(
		'post_type' => get_post_type(),
		'order' => 'ASC',
		'posts_per_page' => -1
	));
	$posts = $query->posts;

	foreach($posts as $index => $post) {
		if($post->ID === get_the_ID()) {
			return $index + 1;
		}
	}

	return false;
}

/**
 * Returns first post ID. Must be used inside the loop
 *
 * @return Int | bool Post ID or false if it's not found
 */
function get_first_post_id() {
	$query = new WP_Query(array(
		'post_type' => get_post_type(),
		'posts_per_page' => 1,
		'order' => 'ASC',
		'order_by' => 'menu_order'
	));
	$posts = $query->posts;
	if($posts) {
		return $posts[0]->ID;
	}
	return false;
}

/**
 * Returns last post ID. Must be used inside the loop
 *
 * @return Int | bool Post ID or false if it's not found
 */
function get_last_post_id() {
	$query = new WP_Query(array(
		'post_type' => get_post_type(),
		'posts_per_page' => -1,
		'order' => 'ASC',
		'order_by' => 'menu_order'
	));
	$posts = $query->posts;
	if($posts) {
		return $posts[count($posts) - 1]->ID;
	}
	return false;
}

/**
 * Returns all posts by Post Type
 * @param string $post_type
 * @return object List of posts
 */
function get_custom_posts($post_type = '') {
	$args = array(
		'post_type' => $post_type,
		'posts_per_page' => -1,
		'order' => 'ASC',
		'order_by' => 'menu_order'
	);

	$query = new WP_Query($args);

	return $query;
}

/**
 * Returns phone number without unnecessary characters
 *
 * @param string $number Number to clear
 * @return string Cleared number
 */
function clear_phone_number($number) {
	$chars = array('(', ')', '-', '+', ' ');
	return str_replace($chars, '', $number);
}

/**
 * Cuts string to given number of characters
 *
 * @param int $charlength Number of characters
 * @param string $string
 * @return string Reduced string
 */
function custom_excerpt_length($charlength, $string) {

	if ( mb_strlen( $string ) > $charlength ) {
		$subex = mb_substr( $string, 0, $charlength );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );

		if ( $excut < 0 ) {
			$string = mb_substr( $subex, 0, $excut );
		} else {
			$string = $subex;
		}
		return $string . ' (...)';
	} else {
		return $string;
	}
}

function get_back_url_by_ref() {
	if(!isset($_SERVER['HTTP_REFERER'])) return home_url('/');

	if(strpos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']) !== false) {
		return $_SERVER['HTTP_REFERER'];
	}
	else {
		return home_url('/');
	}
}

/**
 * Get theme setting from the theme settings.json file
 * @param  string Setting to grab from the file
 * @return mixed
 */
function get_theme_setting( $setting ) {
	global $theme_settings_file;

	if ( empty( $theme_settings_file ) ) {
		$theme_settings_file = file_get_contents( get_stylesheet_directory() . '/settings.json' );
		$theme_settings_file = json_decode( preg_replace( '/\/\*(?s).*?\*\//', '', $theme_settings_file ) );
	}


	if ( property_exists( $theme_settings_file, $setting ) ) {
		return $theme_settings_file->{ $setting };
	}

	return false;
}

function rem_calc( $value ) {
    return intval ( $value ) / 16 . 'rem';
}


function is_url_200($url) {
	$headers = get_headers($url, 1);

	if (strpos($headers[0],'200') === false) {
		return false;
	} else {
		return true;
	}
}

function acf_link_to_button( $link, $args = array() ) {
    extract(shortcode_atts(array(
        'classes'  => '',
        'opening_tag_only' => false,
        'element' => null,
        'atts' => '',
        'icon' => null,
        'no_text' => false
    ), $args));

    if ( empty($link['target']) ) {
        $link['target'] = '_self';
    }

    if ($link['target'] === '_blank') {
        $atts .= ' rel="noopener"';
    }

    if ( $opening_tag_only == false ) {
        if ( !empty( $link['title'] ) ) {
            $atts .= ' aria-label="' . strip_tags( $link['title'] ) . '"';
        } else if ( !empty( $icon ) ) {
            $atts .= ' aria-label="' . sprintf( __( '%s icon', 'campKingswood' ), $icon ) . '"';
        }
    }

    if ( !empty( $element ) ) {
        if ( $element == 'button' ) {
            $atts .= ' type="button"';
        }

        $output = '<' . $element . $atts . ' class="' . $classes . '">';
    } else {
        $output = '<a href="' .  esc_url($link['url']) . '" class="' . $classes . '" target="' . $link['target'] . '"' . $atts . '>';
    }

    if ( $opening_tag_only == true ) {
        return $output;
    }

    if ( $no_text == false ) {
        $output .= $link['title'];
    }

    if ( !empty( $icon ) ) {
        $output .= '<i class="' . $icon . '"></i>';
    }

    if ( !empty( $element ) ) {
        $output .= '</' . $element . '>';
    } else {
        $output .= '</a>';
    }

    return $output;
}

function acf_button_repeater_to_button_group( $buttons, $background_color = 'dark-blue', $include_group = true ) {
    if ( !empty( $buttons ) ) :
        ob_start(); ?>
            <?php if ( $include_group == true ) : ?>
                <div class="c-btn-group">
            <?php endif; ?>
                    <?php foreach ( $buttons as $key => $button ) : ?>
                        <div class="c-btn-wrapper text-center">
                            <?php if ( !empty( $button['link'] ) ) {
                                $button_classes = 'c-btn';

                                if ( !empty( $button['button_color'] ) ) {
                                    if ( $button['button_color'] == 'white' ) {
                                        $button_classes .= ' c-btn-color-alt';
                                    } else {
                                        $button_classes .= ' c-btn-' . $button['button_color'];
                                    }
                                } else {
                                    switch ( $key ) {
                                        case 0:
                                            break;
                                        case 1:
                                            $button_classes .= ' c-btn-secondary';
                                            break;
                                        case 2:
                                            $button_classes .= ' c-btn-tertiary';
                                            break;
                                    }

                                    if ( $background_color == 'dark-blue' ) {
                                        $button_classes .= ' c-btn-color-alt';
                                    }
                                }

                                echo acf_link_to_button( $button['link'], array( 'classes' => $button_classes ) );
                            } ?>
                        </div>
                    <?php endforeach; ?>   
            <?php if ( $include_group == true ) : ?>
                </div>     
            <?php endif; ?>
        <?php $content = ob_get_contents();
        ob_end_clean();
    endif;

    return $content;
}

function image_alignment_styles( $css_class, $vertical, $horizontal, $vertical_mobile, $horizontal_mobile ) {
    $output = '';

    if ( !empty( $vertical ) && !empty( $horizontal ) ) {
        $output .= '<style>' . $css_class . '{object-position: ' . $horizontal .'% ' . $vertical . '%;}</style>';
    }

    if ( !empty( $vertical_mobile ) && !empty( $horizontal_mobile ) ) {
        $output .= '<style>@media only screen and (max-width: 767px) {' . $css_class . '{object-position: ' . $horizontal_mobile .'% ' . $vertical_mobile . '%;}}</style>';
    }

    return $output;
}