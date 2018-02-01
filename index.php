<?php
/**
 * @author    Mark Abel and Thomas Vaeth
 * @package   top-tree/index
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<!-- Main --> 
<main role="main">

<!-- Card -->
<div class="card">

  <!-- Promoted -->
  <?php if ( !is_paged() ) :
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 4,
      'orderby' => 'date',
      'order' => 'DESC',
      'post-functions' => 'promoted'
    ); 
    $promoted = get_posts( $args );
    if ( $promoted ) : 
    $count = 0;
    ?>
      <div class="card__container--feature">
        <?php foreach ( $promoted as $post ) : setup_postdata( $post );
        $delay = 250 * $count; 
        $category = get_the_category(); ?>
          
          <article class="feature-card js-wow fade-in" data-wow-delay="<?php echo $delay; ?>ms">
            <div class="feature-card__container">
              <a class="feature-card__link" href="<?php the_permalink(); ?>">
                <div class="feature-card__img">
                  <div class="absolute-bg" style="background-image: url('<?php toptree_ft_img('full'); ?>');"></div>
                </div>
                <div class="feature-card__content">
                  <span class="feature-card__category"><?php echo $category[0]->cat_name; ?></span>
                  <h4 class="feature-card__title"><?php the_title(); ?></h4>
                </div>
              </a>
            </div>
          </article>

        <?php $count++;
        endforeach; wp_reset_postdata(); ?>
      </div>
    <?php endif;
  endif; ?>

  <!-- Featured -->
  <?php if ( !is_paged() ) :
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 2,
      'orderby' => 'date',
      'order' => 'DESC',
      'post-functions' => 'featured'
    ); 
    $featured = get_posts( $args );
    if ( $featured ) :
      foreach ( $featured as $post ) : setup_postdata( $post );
        get_template_part( 'partials/content/content', 'featured' );
      endforeach; wp_reset_postdata();
    endif;
  endif; ?>

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

<!-- Footer --> 
<?php get_footer(); ?>
