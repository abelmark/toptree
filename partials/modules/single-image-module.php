<?php
/**
 * @author    Mark Abel and Thomas Vaeth
 * @package   top-tree/partials/modules/single-image-module
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$full_image = get_sub_field('full_image');
?>

<div class="image__container--single">
  <figure class="js-wow fade-in-up">
    <img src="<?php echo $full_image['url']; ?>" alt="<?php echo $full_image['alt']; ?>"/>
  </figure>
</div>
