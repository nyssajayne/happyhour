<?php
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_styles' );

/**
 * Register style sheet.
 */
function register_styles() {
	wp_register_style( 'style', get_stylesheet_directory_uri() . '/style.css' );
	wp_register_style( 'main', get_stylesheet_directory_uri() . '/main.css' );
	wp_register_style( 'lato', 'https://fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,700italic,700' );
	wp_register_style( 'smoothscroll', get_stylesheet_directory_uri() . '/smoothDivScroll.css' );

	wp_enqueue_style( 'style' );
	wp_enqueue_style( 'main' );
	wp_enqueue_style( 'lato' );
	wp_enqueue_style( 'smoothscroll' );
}

add_action( 'wp_enqueue_scripts', 'register_scripts' );

function register_scripts() {
	wp_register_script( 'scripts', get_stylesheet_directory_uri() . '/js/scripts.js' );
	wp_register_script( 'masonry', 'https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js' );
	wp_register_script( 'jquery-ui', get_stylesheet_directory_uri() . '/js/jquery-ui-1.10.3.custom.min.js' );
	wp_register_script( 'mousewheel', get_stylesheet_directory_uri() . '/js/jquery.mousewheel.min.js' );
	wp_register_script( 'smoothscroll', get_stylesheet_directory_uri() . '/js/jquery.smoothdivscroll-1.3-min.js' );
	wp_register_script( 'kinetic', get_stylesheet_directory_uri() . '/js/jquery.kinetic.min.js' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'jquery-ui' );
	wp_enqueue_script( 'mousewheel' );
	wp_enqueue_script( 'kinetic' );
	wp_enqueue_script( 'smoothscroll' );
	wp_enqueue_script( 'scripts' );
}

add_action( 'after_setup_theme', 'register_menu' );

function register_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
}

function print_menu($menu_type) {
	$defaults = array(
		'theme_location'  => 'primary',
		'menu'            => '',
		'container'       => 'nav',
		'container_class' => 'nav-desktop ',
		'container_id'    => '',
		//'menu_class'      => 'vertical-text',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
	);

	$defaults_mob = array(
		'theme_location'  => 'primary',
		'menu'            => '',
		'container'       => 'nav',
		'container_class' => 'nav-mob',
		'container_id'    => '',
		'menu_class'      => 'vertical-text',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s"><li id="nav-menu-mob">Menu</li>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
	);

	if($menu_type == 'mobile') {
		wp_nav_menu( $defaults_mob );
	} else {
		wp_nav_menu( $defaults );
	}
}