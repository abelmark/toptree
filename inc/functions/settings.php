<?php
/*-----------------------------------------------*/
/* Set Permalinks
/*-----------------------------------------------*/
function toptree_set_permalinks() {
  global $wp_rewrite;
  $wp_rewrite->set_permalink_structure( '/blog/%year%/%monthnum%/%postname%/' );
}
add_action( 'init', 'toptree_set_permalinks' );

/*-----------------------------------------------*/
/* Defualt Images - Thumb
/*-----------------------------------------------*/
update_option( 'thumbnail_size_w', 600 );
update_option( 'thumbnail_size_h', 720 );
update_option( 'thumbnail_crop', 1 );

/*-----------------------------------------------*/
/* Masthead Image Size - For Mastheads
/*-----------------------------------------------*/
add_image_size( 'mast-image', 1600, 1000);

/*-----------------------------------------------*/
/* Add custom images to Admin
/*-----------------------------------------------*/
function toptree_custom_sizes($sizes) {
 $addsizes = array(
  "masthead-image" => __( "Masthead Images")
 );

 $newsizes = array_merge($sizes, $addsizes);
 return $newsizes;
}

add_filter( 'image_size_names_choose', 'toptree_custom_sizes' );

/*----------------------------------------------*/
/* toptree_remove_width_attribute
/* 
/* Images: Remove auto HxW
/*----------------------------------------------*/
function toptree_remove_width_attribute( $html ) {
 $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
 return $html;
}

add_filter( 'post_thumbnail_html', 'toptree_remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'toptree_remove_width_attribute', 10 );

/*-----------------------------------------------*/
/* toptree_default_img_settings
/*  
/* Default Image Settings
/* Some defaults for the image uploader
/*-----------------------------------------------*/
function toptree_default_img_settings() {
 // no alignment
 update_option('image_default_align', 'none' );
 // don't auto link
 update_option('image_default_link_type', 'none' );
 //insert at full width
 update_option('image_default_size', 'full-size' );

}
add_action('after_setup_theme', 'toptree_default_img_settings');

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
?>
