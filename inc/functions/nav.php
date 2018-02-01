<?php
/*--------------------------------------------------*/
/*  Nav - Add is-current class
/*  Not using Wp's native nav. 
/*  This nav is too crazy for the risk of adding more pages.
/*
/*  @param: 'page-name'
/*  @return: is-current
/*  @example: echo toptree_active_class('page-slug') ?>
/*--------------------------------------------------*/
function toptree_active_class($page_name){
if (is_page( $page_name )) 
  return 'is-current';
}

/*--------------------------------------------------*/
/*  toptree_get_page_link('page name')
/*  gets and echos the page link by page name
/*--------------------------------------------------*/ 
function toptree_page_url($page_name){
  $page_link = esc_url( get_permalink( get_page_by_title( $page_name ) ) );
  echo $page_link;
}
?>
