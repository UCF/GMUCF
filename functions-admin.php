<?php

if ( is_admin() ) {
	add_action( 'admin_menu', 'create_theme_options_page' );
	add_action( 'admin_init', 'init_theme_options' );
}


/**
 * Called on admin init, initialize admin theme here.
 *
 * @return void
 * @author Jared Lang
 **/
function init_theme_options() {
	register_setting( THEME_OPTIONS_GROUP, THEME_OPTIONS_NAME, 'theme_options_sanitize' );
}


/**
 * Registers the theme options page with wordpress' admin.
 *
 * @return void
 * @author Jared Lang
 **/
function create_theme_options_page() {
	add_menu_page(
		__( THEME_OPTIONS_PAGE_TITLE ),
		__( THEME_OPTIONS_PAGE_TITLE ),
		'edit_theme_options',
		'theme-options',
		'theme_options_page'
	);
}


/**
 * Outputs the theme options page html
 *
 * @return void
 * @author Jared Lang
 **/
function theme_options_page() {
	include( THEME_INCLUDES_DIR . '/theme-options.php' );
}


/**
 * Stub, processing on theme options input
 *
 * @return void
 * @author Jared Lang
 **/
function theme_options_sanitize( $input ) {
	return $input;
}
