<?php
/*--------------------------------------------------*/
/*  toptree_body_class
/*  @description: Cleans up body classes, then adds custom
/*                based on page or cpt names
/*--------------------------------------------------*/ 
function toptree_body_class($classes) {
  global $post, $page;

  // Add page name to body class
  if (is_single() || is_page() && !is_front_page()) $classes[] = basename(get_permalink());
  
  if (is_home() || is_singular('post') || is_post_type_archive( 'post' )) $classes[] = 'blog';

  //Example for CPTs
  if (is_singular('work') || is_post_type_archive( 'work' )) $classes[] = 'work';

  // Remove Classes
  $home_id_class = 'page-id-' . get_option('page_on_front');
  $page_id_class = 'page-id-' . get_the_ID();
  $post_id_class = 'postid-' . get_the_ID();
  $page_template_name_class = 'page-template-page-' . basename(get_permalink());
  $page_template_name_php = 'page-template-page-' . basename(get_permalink()) . '-php';

  $remove_classes = array(
    'page-template-default', 
    'page-template', 
    'single-format-standard',
    $home_id_class,
    $page_id_class,
    $post_id_class,
    $page_template_name_class,
    $page_template_name_php
  );

  //Add specific classes
  $classes[] = 'js-fade-in';
  $classes = array_diff($classes, $remove_classes);
  
  return $classes;
}

add_filter('body_class', 'toptree_body_class');

/*-----------------------------------------------*/
/*  toptree_path
/*  @description: An asset path helper that gets template path
/*                and out theme's dist location (dist/)
/*  @example:     <video src="<?php toptree_path(); ?>/videos/vide.mp4">
/*-----------------------------------------------*/
function toptree_path(){
  $template_path = bloginfo('template_directory');
  $path = $template_path . '/dist';
  echo $path;
}

/*-----------------------------------------------*/
/* toptree_title()
/* @description: Outputs a shortened the_title via length arg (by char)
/* @example:     toptree_title(100);
/*-----------------------------------------------*/
function toptree_title($characters, $rep='...') {
  $title = the_title('','',false);
  $shortened_title = toptree_text_limit($title, $characters, $rep);
  echo $shortened_title;
}

/*-----------------------------------------------*/
/* Text Limits - 
/* @description:  Function to limit text length outputs
/*                To be called inside title and excerpt functions
/*-----------------------------------------------*/
function toptree_text_limit($string, $length, $replacer) {
 if(strlen($string) > $length)
 return (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
 return $string;
}

/*-----------------------------------------------*/
/* toptree_excerpt
/* @description:  Outputs a shortened get_the_excerpt via length arg (by char)
/* @example:      toptree_excerpt(100);
/*-----------------------------------------------*/
function toptree_excerpt($characters, $rep='...') {
 $excerpt = get_the_excerpt('','',false);
 $shortened_excerpt = toptree_text_limit($excerpt, $characters, $rep);
 echo $shortened_excerpt;
}

/*-----------------------------------------------*/
/*  toptree_cats_unlinked
/*  
/*  @description:   Get Unlinked category namea, to output as classes
/*                  (for filtering & sorting & modifiers and so on. Or pass in a seperator for other stuff)
/*  @example:       <li class="<? echo toptree_cats_unlinked ?>">
/*-----------------------------------------------*/
function toptree_cats_unlinked($separator = ' ') {
 $categories = (array) get_the_category();
 $thelist = '';
 
 foreach($categories as $category) {    // concate
  $thelist .= $separator . $category->category_nicename;
 }                                                                                                                                                       
echo $thelist;
}

/*-----------------------------------------------*/
/*  toptree_get_cats()
/*  @description: Get a list of the posts cats
/*  @example:     toptree_get_cats()
/*-----------------------------------------------*/
function toptree_get_cats() {
  $args = array(
  'orderby' => 'name',
  'parent' => 0
  );
 $categories = get_categories( $args );
 if ( $categories ) {

  foreach ( $categories as $category ) {
   echo( '<ul><li><a class="post-cats__cat" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li></ul>');
  }
 }
}

/*-----------------------------------------------*/
/*  toptree_tax_unlinked()
/*  @description: ouputs unlinked taxonomies, for use with js filters
/*
/*  @param: $taxonomy = the taxonomy use want to pull from.
/*-----------------------------------------------*/
function toptree_tax_unlinked($taxonomy) {
  $terms = get_terms($taxonomy);
  if ($terms) {
    foreach ( $terms as $term ) {
      echo strtolower ($term->slug) . ' ';
    }
  }
}

/*-----------------------------------------------*/
/*  toptree_tax_list()
/*  @description: echos taxonomy list
/*-----------------------------------------------*/
function toptree_tax_list($taxonomy) {
$terms = get_terms($taxonomy);
 if ($terms) {
    foreach ( $terms as $term ) {
      $list_item = '<li>' . $term->slug . '</li>';
      echo $list_item;
    }
  }
}

/*-----------------------------------------------*/
/*  Get Single Cat from slug
/*
/*  @return $categories (post_name);
/*-----------------------------------------------*/
function toptree_get_cat_slug(){
  global $post;
  $categories = get_the_category($post->ID);
  return $categories[0]->slug;
}


/*-----------------------------------------------*/
/*  toptree_slug: 
/*  
/*  @description: Get category by page slug. Used for passing as var in `get_posts args
/*  @return: $slug (post_name);
/*  @example:
/*   // if is home  
    if ( is_home() ) {
    $slug = null;
  // else if is cat page  
  } else {
    $slug = toptree_slug();
  }  
  $args = array(
    'posts_per_page'   => 5,
    'offset'           => 0,
    'category_name'    => $slug,
    'orderby'          => 'date',
    'order'            => 'DESC'
/*-----------------------------------------------*/
function toptree_slug() {
  global $post;
  $slug = get_post( $post )->post_name;
  return $slug;
}

/*-----------------------------------------------*/
/*  toptree_get_cat_archive()
/*
/*  Builds category archive links by passing in the Cat Name
/*  @param: $cat_name (name of category)
/*  @example: <?php echo toptree_get_cat_archive('Category Name') ?>
/*-----------------------------------------------*/
function toptree_get_cat_archive($cat_name){
  global $post;
    // Get the ID of a given category
    $category_id = get_cat_ID($cat_name);

    // Get the URL of this category
    $category_link = get_category_link( $category_id  );
    $cat_url = '<a href="'. $category_link .'" title="'.$cat_name.'">'.$catn_ame.'</a>';
    return $cat_url;
}

/*-----------------------------------------------*/
/*  toptree_breaks_list ()
/*  @description: Wraps line breaks from as custom fieldin list items
/*  @example: toptree_breaks_list($fieldname)
/*-----------------------------------------------*/
function toptree_breaks_list ( $textarea ){
 $lines = explode("\n", $textarea);
if ( !empty($lines) ) {
  echo '<ul class="list-disc">';
 foreach ( $lines as $line ) {
  echo '<li>'. trim( $line ) .'</li>';
 }
 echo '</ul>';
 }
}

/*-----------------------------------------------*/
/* Wrap mast text line breaks in BEM syntax
/*-----------------------------------------------*/
function toptree_mast_text ( $textarea ){
 $lines = explode("\n", $textarea);
 if ( !empty($lines) ) {
 foreach ( $lines as $line ) {
  echo '<p class="mast__text">'. trim( $line ) .'</p>';
  }
 }
}
?>
