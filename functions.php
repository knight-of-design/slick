<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// Customize Excerpt
// Replaces the excerpt "more" text by a link
function change_excerpt_more($more) {
  global $post;
	return ' <a class="moretag" href="'. get_permalink($post->ID) . '">Read the full article</a>';
}
add_filter('excerpt_more', 'change_excerpt_more');

// Add a Sidebar
function slick_sidebar_init() {
  register_sidebar(
    array(
      'name'=>__( 'Sidebar', 'slick' ),
      'id'=>'the_sidebar',
      'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
      'after_widget'=>'</aside>','before_title'=>'<h1 class="widget-title">',
      'after_title'=>'</h1>',
      )
    );
}

add_action( 'widgets_init', 'slick_sidebar_init' );
function cd_posts_navigation() {
  // Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'codediva' ); ?></h2>
		<div class="nav-links">
			<div class="nav-previous"><?php next_posts_link(__( '&larr; Old posts', 'slick' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'New posts &rarr;', 'slick' )  ); ?></div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

function register_footer_menu() {
  register_nav_menu('slick-footer-menu',__( 'Slick Footer Menu' ));
}
add_action( 'init', 'register_footer_menu' );


function custom_gravatar ($avatar_defaults) {
    $myavatar = get_template_directory_uri() . '/img/gravatar.png';
    $avatar_defaults[$myavatar] = __( 'Custom Gravatar', 'slick' );
    return $avatar_defaults;
}

add_filter( 'avatar_defaults', 'custom_gravatar' );
