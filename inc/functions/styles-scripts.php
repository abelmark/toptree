<?php
/*-------------------------------------------*/
/*	toptree_scripts_and_styles()
/*	@description: managing and loading of scripts and styles 
/*	@params: wp_register_script ('js-handle', $src, $deps, $ver, $in_footer);
/*-------------------------------------------*/
function toptree_scripts_and_styles() {
	if ( !is_admin() ) {
		//Register Styles
		wp_register_style( 'toptree_fonts', get_template_directory_uri() . '/dist/css/fonts.min.css', false );
		wp_register_style( 'toptree_styles', get_template_directory_uri() . '/dist/css/app.css', false );
		
		//Scripts for footer
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_template_directory_uri() . '/dist/js/jquery.min.js', '', false, true );
		wp_register_script( 'toptree_js', get_template_directory_uri() . '/dist/js/toptree.min.js', array( 'jquery' ), false, true );
		
		//Enqueue Order
		wp_enqueue_style( 'toptree_fonts' );
		wp_enqueue_style( 'toptree_styles' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'toptree_js' );
	}
}

add_action( 'wp_enqueue_scripts', 'toptree_scripts_and_styles' );

/*-------------------------------------------*/
/*	Asych Loader
/*	@description: adds asynch to app.min.js
/*-------------------------------------------*/
function toptree_async_js($tag, $handle) {
  if ( 'toptree_js' !== $handle ) return $tag;
  if ( 'jquery' !== $handle ) return str_replace( ' src', ' async="async" src', $tag );
}

add_filter('script_loader_tag', 'toptree_async_js', 10, 2);

/*-------------------------------------------*/
/*	Admin and Login Styles
/*	@description: loads styles for custom admin theme and login page
/*	@see: inc/admin/
/*-------------------------------------------*/
function toptree_admin_theme_styles() {
  wp_enqueue_style( 'admin', get_template_directory_uri() . '/inc/admin-theme/admin.css', false );
}

add_action('admin_enqueue_scripts', 'toptree_admin_theme_styles');
add_action('login_enqueue_scripts', 'toptree_admin_theme_styles');

/*-------------------------------------------*/
/*	CF7: toptree_cf7_dequeue() 
/*	@description: removes CF7 scripts and styles for all but the contact page
/*-------------------------------------------*/
function toptree_cf7_dequeue() {
	if ( !is_page( array( 'contact' ) ) ) {
		wp_dequeue_script( 'contact-form-7' );
		wp_dequeue_style( 'contact-form-7' );
	}
}

add_action( 'wp_enqueue_scripts', 'toptree_cf7_dequeue', 99 ); 
?>
