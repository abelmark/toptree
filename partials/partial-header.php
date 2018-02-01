<?php
/**
 * @author    Mark Abel and Thomas Vaeth
 * @package   top-tree/partials/partial-header
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<body id="top" <?php body_class(); ?>>

<header class="header">
  <div>
    <i class="fa fa-lg fa-bars"></i>
  </div>
  <a href="<?php echo home_url(); ?>">
    <figure class="header__img">
      <img src="<?php toptree_img(); ?>/top-tree-logo.png" alt="Top Tree Logo"/>
    </figure>
  </a>
  <div></div>
</header>

<?php get_template_part( 'partials/partial', 'menu' ); ?>
