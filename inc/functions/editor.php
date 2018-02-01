<?php
/*-----------------------------------------------*/
/*  toptree_ft_img_help
/*  @description: Applies help text to the featured image uploads
/*-----------------------------------------------*/
function toptree_ft_img_help( $content ) {
  global $post_type;

  return $content .= '<p>Featured Image appears on the About page. Size to 600x720px.</p>';
}
add_filter( 'admin_post_thumbnail_html', 'toptree_ft_img_help');

/*-----------------------------------------------*/
/*  toptree_editor_build_quicktags
/*  @description: Builds a custom toolbar for the Text Editor
/*-----------------------------------------------*/
function toptree_editor_build_quicktags() {
    if (wp_script_is('quicktags')){
?>
 <script type="text/javascript">
  QTags.addButton( 'h3-subheader', 'SubHeader', '<h3>', '</h3>', '3', 'Sub Header', 1 );
  QTags.addButton( 'h5-subheader', 'H5', '<h5>', '</h5>', '5', 'h5', 1 );
  QTags.addButton( 'font-lead', 'Font Lead', '<p class="font-lead">', '</p>', '2', 'Font Lead', 1 );
  QTags.addButton( 'text-center', 'Text Center', '<p class="text-center">', '</p>', '4', 'Sub Header', 2 );
  QTags.addButton( 'hr-sep-center', 'Seperator Centered', '<hr class="sep-center sep--alpha"/>', '', 's', 'Center alined seperator', 201 );
  QTags.addButton( 'hr-sep', 'Seperator', '<hr class="sep sep--alpha"/>', '', 's', 'Horizontal rule line', 202 );
  QTags.addButton( 'figcaption', 'Caption', '<figcaption>', '</figcaption>', 'f', 'Figcaption', 203 );
 </script>
<?php
    }
}

add_action( 'admin_print_footer_scripts', 'toptree_editor_build_quicktags' );

/*-----------------------------------------------*/
/*  toptree_editor_tinymce()
/*  @description: Tiny MCE Editor Customization
/*                Give authors only what they need, to maintain 
/*                styles of the site and prevent retardery
/*-----------------------------------------------*/
function toptree_editor_tinymce( $init ) {
  $init['block_formats'] = "Paragraph=p; Subheader h3=h3; Gray Subheader=h4";
  $init['toolbar1'] = 'formatselect,h3,bold,italic,strikethrough,underline,forecolor,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,spellchecker,pastetext,removeformat,wp_fullscreen';
  $init['toolbar2'] = '';
  return $init;
}

add_filter( 'tiny_mce_before_init', 'toptree_editor_tinymce' );
?>
