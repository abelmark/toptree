<?php
//
// Flush Rewrites
//
add_action( 'after_switch_theme', 'toptree_flush_rewrite_rules' );

function toptree_flush_rewrite_rules() {
  flush_rewrite_rules();
}

//
// Post Taxonomies
//
require_once('post-taxonomy-post-functions.php');
?>
