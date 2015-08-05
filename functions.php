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

// Footer Menu ------------------------------------------------------------------------>
register_nav_menus (array ('secondary'=>__( 'Footer Menu' ),));

// Read More [...] -> Excerpt Replacement --------------------------------------------->
function custom_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

//  Posts_Navigation Newer/Older ------------------------------------------------------>
function posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'codediva' ); ?></h2>
		<div class="nav-links">

			
			<div class="nav-previous"><?php next_posts_link(__( '&#8610; Left posts', 'underscores' ) ); ?></div>
			
			
			<div class="nav-next"><?php previous_posts_link( __( 'Right posts &#8611;', 'underscores' )  ); ?></div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
