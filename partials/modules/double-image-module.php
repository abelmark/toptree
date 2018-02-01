<?php
/**
 * @author    Mark Abel and Thomas Vaeth
 * @package   top-tree/partials/modules/double-image-module
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$left_image = get_sub_field('left_image');
$right_image = get_sub_field('right_image');
?>

<?php if ( is_page(8) ) : ?>
  <div class="image__container--double">
    <figure class="js-wow fade-in-up">
      <img src="<?php echo $left_image['url']; ?>" alt="<?php echo $left_image['alt']; ?>"/>
    </figure>
    <figure class="js-wow fade-in-up" data-wow-delay="250ms">
      <img src="<?php echo $right_image['url']; ?>" alt="<?php echo $right_image['alt']; ?>"/>
    </figure>
  </div>
<?php else : ?>
  <div class="image__container--double">
    <figure class="js-wow fade-in-left">
      <img src="<?php echo $left_image['url']; ?>" alt="<?php echo $left_image['alt']; ?>"/>
    </figure>
    <figure class="js-wow fade-in-right">
      <img src="<?php echo $right_image['url']; ?>" alt="<?php echo $right_image['alt']; ?>"/>
    </figure>
  </div>
<?php endif; ?>
