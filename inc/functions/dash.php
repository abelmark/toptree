<?php
/*-----------------------------------------------*/
/*  Dash - remove widgets
/*-----------------------------------------------*/
function toptree_disable_default_dashboard_widgets() {
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
}
add_action('admin_head', 'toptree_disable_default_dashboard_widgets');

/*-----------------------------------------------*/
/* Welcome Dash - Add a welcome widget
/*-----------------------------------------------*/
function toptree_add_dashboard_widgets() {
  wp_add_dashboard_widget( 'toptree_logo_widget', 'Top Tree', 'toptree_logo_widget' );
  wp_add_dashboard_widget( 'toptree_site_widget', 'Front End Pages', 'toptree_site_widget' );
  wp_add_dashboard_widget( 'toptree_admin_widget', 'Admin Management', 'toptree_admin_widget' );
}
add_action( 'wp_dashboard_setup', 'toptree_add_dashboard_widgets' );

/*-----------------------------------------------*/
/* Dash Logo Widget
/*-----------------------------------------------*/
function toptree_logo_widget() { ?>
   <article class="widget">

    <footer class="widget__footer box__footer">
      <h1>Welcome to Top Tree.</h1>
      <p>From this admin you can manage most aspects of your site.</p>
    </footer>

   </article>
<?php }

/*-----------------------------------------------*/
/* Dash Site Links Widget
/*-----------------------------------------------*/
function toptree_site_widget() { ?>
   <article class="widget box">
    <div class="widget__content box__content">
      <p><a href="<?php echo home_url(); ?>" target="_blank">Visit Blog →</a></p>
      <p><a href="<?php toptree_page_url( 'about' ); ?>" target="_blank">Visit About →</a></p>
      <p><a href="<?php toptree_page_url( 'advertise' ); ?>" target="_blank">Visit Advertise →</a></p>
    </div>
    <footer class="widget__footer box__footer"></footer>
   </article>
<?php }

/*-----------------------------------------------*/
/* Dash Admin Management Widget
/*-----------------------------------------------*/
function toptree_admin_widget() { ?>
   <article class="widget box">
    <div class="widget__content box__content">
      <p><a class="" href="edit.php">Create a Blog Post</a></p>
      <p><a class="" href="edit.php?post_type=team">Manage Team Members</a></p>
      <p><a class="" href="edit.php?post_type=page">Edit a Page</a></p>
      <p><a class="" href="users.php">Edit a User</a></p>
    </div>
    <footer class="widget__footer box__footer"></footer>
   </article>
<?php }
?>
