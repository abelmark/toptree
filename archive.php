<?php
/**
 * @author    Mark Abel and Thomas Vaeth
 * @package   top-tree/archive
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();
?>

<!-- Main --> 
<main role="main">

<!-- Card -->
<div class="card">

<!-- Posts -->
<?php if ( have_posts() ): ?>
  <div class="card__container--triple">
    <?php while ( have_posts() ) : the_post();
      get_template_part( 'partials/content/content', 'post' );
    endwhile; ?>
  </div>
<?php endif; ?>

</div>

</main>

<!-- Pagination -->
<?php get_template_part( 'partials/posts', 'pagination' );?>

<!-- Footer --> 
<?php get_footer(); ?>
