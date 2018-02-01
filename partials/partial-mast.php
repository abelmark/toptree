<?php
/**
 *  @author    Mark Abel and Thomas Vaeth
 *  @package   toptree/partials/partial-products
 *  @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$mast_background = get_field('mast_background');
$mast_header = get_field('mast_header');
$mast_text = get_field('mast_text');
?>

<section class="mast js-parallax">
  <div class="mast__background absolute-bg" style="background-image: url('<?php echo $mast_background['url']; ?>');"></div>
  <div class="mast__container">
    <h1><?php echo $mast_header; ?></h1>
    <?php if ( $mast_text ) : ?>
     <p class="mast__text"><?php echo $mast_text; ?></p>
    <?php endif; ?>
  </div>
</section>
