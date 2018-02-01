<?php
/**
 *  @author    Mark Abel and Thomas Vaeth
 *  @package   toptree/partials/partial-intro
 *  @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$intro_header = get_field('intro_header');
$intro_text = get_field('intro_text');
?>

<section class="intro">
  <div class="intro__container">
    <h2 class="intro__header"><?php echo $intro_header; ?></h2>
    <p><?php echo $intro_text; ?></p>
  </div>
</section>
