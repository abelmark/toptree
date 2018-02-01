<?php
/**
 *  @author    Mark Abel and Thomas Vaeth
 *  @package   toptree/partials/partial-cta
 *  @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$cta_header = get_field('cta_header');
$cta_text = get_field('cta_text');
$cta_page_link = get_field('cta_page_link', false, false);
?>

<section class="cta">
  <div class="cta__container js-wow fade-in">
    <h2 class="cta__header">Do you like what you see?</h2>
    <p>You can advertise with us.</p>
    <?php if ( $cta_page_link ) : ?>
      <a class="cta__link" href="<?php the_field('cta_page_link'); ?>">Learn More</a>
    <?php endif; ?>
  </div>
</section>
