<?php
/**
 * @author    Mark Abel and Thomas Vaeth
 * @package   top-tree/404
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();
?>

<!-- Main -->
<main role="main">

<!-- Mast -->  
<section class="mast mast--404">
  <div class="mast__bg"></div>
  <header class="mast__header row g-full">
    <h1 class="mast__title js-letters">Oh No!</h1>
    <h1 class="mast__title js-letters">It's The 404!</h1>

    <a href="<?php toptree_page_url('home') ?>" class="btn btn--white">Get Me Outta Here!</a>
  </header>
</section>

</main>

<!-- Footer --> 
<?php get_footer(); ?>
