<?php
/**
 * Template Name: Advertise
 *
 * @author   Mark Abel and Thomas Vaeth
 * @package  page
 * @version  1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

$benefits_header = get_field('benefits_header');
$benefits = 'benefits';
?>

<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/dist/js/countUp.min.js' ?>"></script>

<!-- Main-->
<main role="main">

<!-- Mast -->
<?php get_template_part( 'partials/partial', 'mast' ); ?>

<!-- Intro -->
<?php get_template_part( 'partials/partial', 'intro' ); ?>

<?php if ( have_rows( $benefits ) ) : ?>
<!-- Benefits -->
<section class="benefits">
  <?php if ( $benefits_header ) : ?>
    <h2 class="benefits__header"><?php echo $benefits_header; ?></h2>
  <?php endif; ?>
  <div class="benefits__container">
    <?php $count = 0;
    while ( have_rows ( $benefits ) ) : the_row();
    $benefit_number = get_sub_field('benefit_number');
    $benefit_text = get_sub_field('benefit_text');
    $benefit_image = get_sub_field('benefit_image');
    ?>
      <div>
        <div class="benefits__card js-wow-count fade-in-up">
          <p id="targetNumber-<?php echo $count; ?>" class="benefits__number"></p>
          <span class="benefits__text"><?php echo $benefit_text; ?></span>
          <?php if ($benefit_image) : ?>
            <figure class="benefits_image">
              <img src="<?php echo $benefit_image['url']; ?>" alt="<?php echo $benefit_image['alt']; ?>"/>
            </figure>
          <?php endif; ?>
        </div>
      </div>

      <script type="text/javascript">
        var options = {
          useEasing : true, 
          useGrouping : true, 
          separator : ',', 
          decimal : '.', 
          prefix : '', 
          suffix : '' 
        };
        var demo<?php echo $count; ?> = new CountUp("targetNumber-<?php echo $count; ?>", 0, <?php echo $benefit_number; ?>, 0, 3, options);
      </script>
    <?php $count++;
    endwhile; ?>
  </div>
</section>
<?php endif; ?>

<!-- Contact -->
<section class="form-advertise">
  <h2 class="form-advertise__header">Contact Us</h2>
  <?php echo do_shortcode( '[contact-form-7 id="19" title="Advertise"]' ); ?>
</section>

</main>

<!-- Footer --> 
<?php get_footer(); ?>
