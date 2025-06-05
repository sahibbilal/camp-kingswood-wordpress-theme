<?php
/**
 * Functions
 * ---------------------------------------------------------------------------------------
 *
 * This file defines all functions that are intended to be used by developers,
 * and therefore are not hidden behind a class for simplicity.
 *
 * @package WordPress
 */

/**
 * Recursively include all files from specified directory (and it's subdirectories).
 *
 * @param string $dir       Directory to include all files from.
 * @param int    $max_depth Maximum depth allowed.
 * @param int    $depth     Number of levels below specified directory current recursive call is on.
 */
function recursive_include( $dir, $max_depth = 5, $depth = 0 ) {
	if ( $depth > $max_depth ) {
		return;
	}

	$scan = glob( $dir . DIRECTORY_SEPARATOR . '*' );
	foreach ( $scan as $path ) {
		if ( preg_match( '/\.php$/', $path ) ) {
			include_once $path;
		} elseif ( is_dir( $path ) ) {
			recursive_include( $path, $max_depth, $depth + 1 );
		}
	}
}

/**
 * Generate the heading for the archive pages based on which type of archive is being displayed.
 *
 * @return string|null Heading, or null if the type of archive is not recognized.
 */
function get_blog_heading() {
	if ( is_archive() ) {
		if ( is_day() ) {
			return __( 'Daily Archives:', 'campKingswood' ) . get_the_date();
		} elseif ( is_month() ) {
			return __( 'Monthly Archives:', 'campKingswood' ) . get_the_date( _x( 'F Y', 'monthly archives date format', 'campKingswood' ) );
		} elseif ( is_year() ) {
			return __( 'Yearly Archives:', 'campKingswood' ) . get_the_date( _x( 'Y', 'yearly archives date format', 'campKingswood' ) );
		} elseif ( is_category() ) {
            return __( 'Category:', 'campKingswood' ) . ' ' . single_cat_title( '', false );
        } elseif ( is_author() ) {
            $author_data = get_query_var( 'author_name' ) ? get_user_by( 'slug', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) );

            return __( 'Author:', 'campKingswood' ) . ' ' . $author_data->display_name;
        } elseif ( is_tag() ) {
            return __( 'Tag:', 'campKingswood' ) . ' ' . single_tag_title( '', false );
        } else {
            return __( 'Blog Archives', 'campKingswood' );
        }
	} elseif ( is_search() ) {
		return __( 'Search:', 'campKingswood' ) . ' ' . get_search_query();
	}

	return null;
}

//Sample data for filter plugin (this should be formatted as an associative array)
//Read here for instructions: https://bitbucket.org/829studios/829-blog-category-filters-react/src/master/

// $eight29_filter_data = [
// 	"post" => [
// 		"category" => [
// 			"label" => "Categories", 
// 			"type" => "button-group" 
// 		]
// 	],
// 	"post_b" => [
// 		"tax_b1" => [
// 			"label" => "Tax 1", 
// 			"type" => "select" 
// 		],
// 		"tax_b2" => [
// 			"label" => "Tax 2", 
// 			"type" => "select" 
// 		]
// 	],
// 	"post_c" => [
// 		"tax_c1" => [
// 			"label" => "Tax 1", 
// 			"type" => "checkbox" 
// 		]
// 	],
// 	"post_d" => [
// 		"tax_d1" => [
// 			"label" => "Tax 1", 
// 			"type" => "multi-select" 
// 		],
// 		"tax_d2" => [
// 			"label" => "Tax 2", 
// 			"type" => "multi-select" 
// 		]
// 	]
// ]; 

//Pass data to filter plugin here

// if (class_exists('eight29_filters')) {
// 	$eight29_filters->set_post_data($eight29_filter_data);
// }