<?php
/**
 * @author    Mark Abel and Thomas Vaeth
 * @package   top-tree/page
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();
?>

<!-- Main --> 
<main role="main">

<!-- Mast --> 
<section class="mast mast--page">
  <header class="mast__header">
    <h1><?php the_title(); ?></h1>
  </header>
</section>

<!-- Section -->
<section class="section pad">
 <div class="grid">
  <div class="grid__col g-8 centered">
  <?php 
   while (have_posts()) : the_post();
    the_content();
   endwhile; // End content loop ?>
  </div>
 </div>
</section>
</main>

<!-- Footer --> 
<?php get_footer(); ?>
