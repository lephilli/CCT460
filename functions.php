<?php
/**
 * _s Functions and Definitions
 *
 * @package _s
 */

 // Child Theme ------------------------------------------------------------------------>
function child_entheme_enqueue_scripts ()
	{
		wp_enqueue_style ('parent-css', get_template_directory_uri ().'/style.css'); 
	} 
add_action('wp_enqueue_scripts','child_entheme_enqueue_scripts');

// Sidebar 
function child_widgets_init (){
		register_sidebar(array(
			'name'						=> __('Sidebar','_s'),
			'id'						=> 'the_sidebar',
			'before_widget'				=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'				=> '</aside>',
			'before_title'				=> '<h1 class="widget-title">',
			'after_title'				=> '</h1>',
		));
}
add_action( 'widgets_init', 'child_widgets_init');
