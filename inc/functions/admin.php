<?php
/*-----------------------------------------------*/
/*  Admin Appearance: Remove FrontEnd Admin bar
/*-----------------------------------------------*/
add_filter('show_admin_bar', '__return_false');  

/*-----------------------------------------------*/
/*  Admin Appearance: Remove Color Picker
/*-----------------------------------------------*/
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
remove_action( 'additional_capabilities_display', 'additional_capabilities_display' );

/*-----------------------------------------------*/
/*  Admin Appearance: Remove via css where no hooks exist
/*-----------------------------------------------*/
function toptree_admin_hides() {
 echo '<style type="text/css">
         .user-comment-shortcuts-wrap,
         .show-admin-bar,
         .user-rich-editing-wrap,
         .user-description-wrap,.user-url-wrap{display:none}
       </style>';
}

add_action('admin_head', 'toptree_admin_hides');

/*-----------------------------------------------*/
/*  Remove Admin Bar stuffs
/*-----------------------------------------------*/
function toptree_admin_bar_remove() {
  global $wp_admin_bar;

  $wp_admin_bar->remove_menu('wp-logo');
  $wp_admin_bar->remove_menu('about');
  $wp_admin_bar->remove_menu('wporg');
  $wp_admin_bar->remove_menu('documentation');
  $wp_admin_bar->remove_menu('support-forums');
  $wp_admin_bar->remove_menu('feedback');
  $wp_admin_bar->remove_menu('view-site');
  $wp_admin_bar->remove_menu('updates');
  $wp_admin_bar->remove_menu('comments');
  $wp_admin_bar->remove_menu('new-content');
}

add_action('wp_before_admin_bar_render', 'toptree_admin_bar_remove', 0);

/*-----------------------------------------------*/
/* Post Filters: Add to Query for post filter
/*-----------------------------------------------*/
function toptree_admin_posts_filter(&$query) {
  if ( is_admin() AND 'edit.php' === $GLOBALS['pagenow'] AND isset( $_GET['p_format'] ) AND '-1' != $_GET['p_format']) {
    $query->query_vars['tax_query'] = array( 
      array(
        'taxonomy' => 'post_format',
        'field'    => 'ID',
        'terms'    => array( 
          $_GET['p_format'] 
        )
      ) 
    );
  }
}

add_filter( 'parse_query', 'toptree_admin_posts_filter' );

/*-----------------------------------------------*/
/* Post Filters: Add Taxonomies to Post Filter
/*-----------------------------------------------*/
function toptree_restrict_manage_posts_format() {
  wp_dropdown_categories( 
    array(
      'taxonomy'         => 'post_format',
      'hide_empty'       => 0,
      'name'             => 'p_format',
      'show_option_none' => 'Select Post Format'
    ) 
  );
}

add_action( 'restrict_manage_posts', 'toptree_restrict_manage_posts_format' );

/*-----------------------------------------------*/
/* Post Filters: Add Taxonomies to Post Filter
/*-----------------------------------------------*/
function toptree_add_taxonomy_filters() {
  global $typenow;
 
  $taxonomies = array('post-functions');
 
  foreach ($taxonomies as $tax_slug) {
    $tax_obj = get_taxonomy($tax_slug);
    $tax_name = $tax_obj->labels->name;
    $terms = get_terms($tax_slug);
    
    if(count($terms) > 0) {
      echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
      echo "<option value=''>Show All $tax_name</option>";
      
      foreach ($terms as $term) { 
        echo '<option value='. $term->slug, isset($_GET[$tax_slug]) == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 
      }
      echo "</select>";
    }
  }
}

add_action( 'restrict_manage_posts', 'toptree_add_taxonomy_filters' );
?>
