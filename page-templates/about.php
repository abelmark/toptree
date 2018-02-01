<?php
/**
 * Template Name: About
 *
 * @author   Mark Abel and Thomas Vaeth
 * @package  page
 * @version  1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();
?>

<!-- Main-->
<main role="main">

<!-- Mast -->
<?php get_template_part( 'partials/partial', 'mast' ); ?>

<!-- Intro -->
<?php get_template_part( 'partials/partial', 'intro' ); ?>

<?php 
$args = array(
  'post_type' => 'team',
  'posts_per_page' => -1,
  'orderby' => 'date',
  'order' => 'DESC',
);
$posts = get_posts( $args );
if ( $posts ) : ?>
  <!-- Team -->
  <section id="team" class="team">
    <h2 class="team__header">Our Team</h2>
    <div class="team__container">

      <?php foreach ( $posts as $post ) : setup_postdata( $post );
      $team_position = get_field('team_position');
      ?>
        <article class="team__card">
          <a class="team__link" href="<?php the_permalink(); ?>">
            <div class="team__img">
              <div class="absolute-bg js-wow fade-in" style="background-image: url('<?php toptree_ft_img('full'); ?>');"></div>
            </div>
            <div class="team__content">
              <h4 class="team__name"><?php the_title(); ?></h4>
              <p class="team__position"><?php echo $team_position; ?></p>
            </div>
          </a>
        </article>
      <?php endforeach; wp_reset_postdata(); ?>
      
    </div>
  </section>
<?php endif; ?>

<!-- CTA -->
<?php get_template_part( 'partials/partial', 'cta' ); ?>

</main>

<!-- Footer --> 
<?php get_footer(); ?>
