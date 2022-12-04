<?php
const _ROOT_DIR = "/vitkovice-wp-theme";
const _ROOT_URL = "/vitkovice";

// Category names
const _NEWS        = "news";
const _INSTRUCTORS = "instructors";

// Main content post prefixes
const _POST_ABOUT_US    = "_POST_ABOUT_US_";
const _POST_KIDS_PARK   = "_POST_KIDS_PARK_";
const _POST_INSTRUCTORS = "_POST_INSTRUCTORS_";
const _POST_PRICING     = "_POST_PRICING_";

// i18n
const _LANG_SHORTCUTS = [
	"en_US" => "EN",
	"cs_CZ" => "CZ"
];
const _MAPY_API_LANG_CODES = [
    "en_US" => "en",
    "cs_CZ" => "cs"
];

function vitkovice_resources() {
	wp_enqueue_style( "bootstrap.min", get_stylesheet_directory_uri() . "/css/bootstrap/bootstrap.min.css" );
	wp_enqueue_style( "bootstrap-icons", get_stylesheet_directory_uri() . "/font/bootstrap-icons.css" );
	wp_enqueue_style( "fonts", get_stylesheet_directory_uri() . "/css/app/fonts.css" );
	wp_enqueue_style( "style", get_stylesheet_uri() );
}

function remove_parent_styles() {
	wp_dequeue_style( "twenty-twenty-one-style" );
	wp_deregister_style( "twenty-twenty-one-style" );
}

function vitkivice_post_excerpt_length( $length ) {
	return $length + 20;
}

function get_id_by_slug( $page_slug ) {
	$page = get_page_by_path( $page_slug );

	return $page ? $page->ID : null;
}

function get_category_id_by_slug( $categorySlug ) {
	$category = get_category_by_slug( $categorySlug );

	return $category ? $category->term_id : null;
}

function get_post_by_name( $post_name ) {
    $post_ids = get_posts(array(
        "name"          => $post_name,
        "post_type"     => "post",
        "numberposts"   => 1,
        "fields"        => "ids"
    ));

    return get_post( array_shift( $post_ids ) );
}

function redefine_locale( $locale ) {
	session_start();
	if ( isset( $_GET["lang"] ) ) {
		$locale           = $_GET["lang"];
		$_SESSION["lang"] = $locale;
	} elseif ( isset( $_SESSION["lang"] ) ) {
		$locale = $_SESSION["lang"];
	}

	return $locale;
}

add_filter( "locale", "redefine_locale", 10 );
load_theme_textdomain( "vitkovice-wp-theme", get_stylesheet_directory() . "/lang" );
load_child_theme_textdomain( "vitkovice-wp-theme", get_stylesheet_directory() . "/lang" );
add_filter( "excerpt_length", "vitkivice_post_excerpt_length", 999 );
add_action( "wp_enqueue_scripts", "remove_parent_styles", 20 );
add_action( "wp_enqueue_scripts", "vitkovice_resources" );
add_theme_support( "post-thumbnails" );
?>