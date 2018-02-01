<?php
/**
* @author    Mark Abel and Thomas Vaeth
* @package   top-tree/single
* @version   1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

<!-- Main -->
<main role="main">

<!-- Mast -->
<section class="mast-single">
  <div class="mast-single__container">
    <div class="mast-single__title">
      <h1><?php the_title(); ?></h1>
      <p>By <?php the_author_posts_link(); ?> on <?php the_time('M d, Y'); ?></p>
      <ul class="mast-single__social">
        <li><a class="fa fa-2x fa-twitter-square" href="http://twitter.com/intent/tweet?text=<?php the_title(); ?>+<?php the_permalink(); ?>" target="_blank"></a></li>
        <li><a class="fa fa-2x fa-facebook-square" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>/&amp;title=<?php the_title(); ?>" target="_blank"></a></li>
        <li><a class="fa fa-2x fa-envelope" href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>"></a></li>
      </ul>
    </div>
    <div class="mast-single__img">
      <div class="absolute-bg" style="background-image: url('<?php toptree_ft_img('full'); ?>');"></div>
    </div>
  </div>
</section>

<!-- Post -->
<section class="post">
  <article class="post__container">
    <?php the_content(); ?>
  </article>
</section>

<!-- Related -->
<?php get_template_part( 'partials/partial', 'related' ); ?>

</main>

<?php endwhile; ?>

<!-- Footer -->    
<?php get_footer(); ?>
