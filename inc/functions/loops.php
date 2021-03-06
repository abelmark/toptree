<?php
/*------------------------------------------------------*/
/*  toptree_get_posts();
/*
/*  Modular Get Posts Function
/*
/*  @params:  $post_cat = ('category-nicename' or null for all posts), 
/*            $num_posts = number of posts to show
/*            $content_type = file name for content, ie; 'posts' = partials/content/content-posts
/*
/*  @return:  $posts
/*  @example: toptree_get_posts('category-name', 7) or toptree_get_posts(null, 7) 
/*-------------------------------------------------------*/
function toptree_get_posts($post_cat, $num_posts, $content_type){
  global $post ; 

  $args = array(
   'posts_per_page'   => $num_posts,
   'offset'           => 0,
   'category_name'    => $post_cat,
  );

  $posts = get_posts( $args );
  // set_transient( 'posts_query', $posts, 12 * 60 * 60 );
  foreach ( $posts as $post ) : setup_postdata( $post );
    //Get template form partials/content/content-category-featured
   get_template_part( 'partials/content/content', $content_type );

  endforeach;
  wp_reset_postdata();

  return $posts;
}

/*------------------------------------------------------*/
/*  toptree_ft_posts()
/*
/*  Get Posts by term under custom taxonomy 'post-functions', 
/*
/*  @param:  $post_term = term under taxonomy 'post-functions'
/*  @param:  $num_posts = number of posts. use -1 for all.
/*  @param:  $content_type = content loop file name (all are prefixed with 'content-'')
/*  @return: $posts
/*  @example: toptree_ft_posts('featured', '10', 'feed')
/*-------------------------------------------------------*/
function toptree_ft_posts($post_term, $num_posts, $content_type){
  global $post ; 

  $args = array(
    'posts_per_page'   => $num_posts,
    'offset'           => 0,
    'tax_query' => array(
      array(
        'taxonomy' => 'post-functions',
        'field' => 'name',
        'terms' => $post_term,
      ),
    )
  );
  $posts = get_posts( $args );
  // set_transient( 'posts_query', $posts, 12 * 60 * 60 );
  foreach ( $posts as $post ) : setup_postdata( $post );
   get_template_part( 'partials/content/content', $content_type );
  endforeach;
  wp_reset_postdata();

  return $posts;
}

/*------------------------------------------------------*/
/*  toptree_cpts()
/*
/*  Get Custom Post Types
/*
/*  @param:  $post_type = name of custom post type
/*  @param:  $num_posts = number of posts. use -1 for all.
/*  @param:  $content_type = content loop file name (all are prefixed with 'content-'')
/*  @return: $posts
/*  @example: toptree_cpt('work', '-1', 'folio')
/*-------------------------------------------------------*/
function toptree_cpt($post_type, $num_posts, $content_type){
  global $post ; 

  $args = array(
    'posts_per_page'   => $num_posts,
    'post_type'        => $post_type,
    'orderby'          => 'date',
    'order'            => 'DESC',
  );
  $counter = 1;
  $posts = get_posts( $args );
  // set_transient( 'posts_query', $posts, 12 * 60 * 60 );
  foreach ( $posts as $post ) : setup_postdata( $post );
   get_template_part( 'partials/content/content', $content_type );
  $counter++; 
  endforeach;
  wp_reset_postdata();

  return $posts;
}

/*------------------------------------------------------*/
/*  EXAMPLE: toptree Category Module
/*  Wraps the 'toptree_get_cat_posts()' funciton with a header and footer via page templates
/* 
/*  @param:   $postcat (category_name slug) string
/*  @example: toptree_cat_module('category-name')
/*-------------------------------------------------------*/
function toptree_cat_module($postcat){
  $cat = get_term_by( 'slug', $postcat, 'category');
  // Get Section Heading
  echo '<h4>'.$cat->name.'</h4>';

  // Get cat posts function
  toptree_get_posts_ft_list($postcat);
  
  // Get Section Footer Link
  if (is_home()) {
    echo '<a class="more__link" href="/blog/'.$postcat.'">See All '.$cat->name.'</a>';
  } else {
  // Get Section Footer Link
    echo '<a class="more__link" href="/blog/category/'.$postcat.'">See All '.$cat->name.'</a>';
  }
}
?>
