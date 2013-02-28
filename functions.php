<?php
/**
 * @package WordPress
 * @subpackage JTTEOTN Theme
 */

// Action hook to do all the major theme setup stuff
add_action( 'after_setup_theme', 'journey_theme_setup' );

function load_upcoming()
{
	
}

function journey_theme_setup()
{
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

		// This theme supports post formats.
	add_theme_support( 'post-formats', array( 'aside', 'chat', 'audio', 'image', 'quote', 'gallery', 'video', 'link' ) );

		// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'jtteotn-theme' ),
		'footer' => __( 'Footer Menu', 'jtteotn-theme' )
	) );

}