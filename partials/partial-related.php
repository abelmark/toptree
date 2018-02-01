<?php
/**
 *  @author    Mark Abel and Thomas Vaeth
 *  @package   toptree/partials/partial-related
 *  @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
$args = array(
  'category__in' => wp_get_post_categories($post->ID),
  'numberposts' => 4,
  'post__not_in' => array($post->ID),
  'orderby' => 'rand'
);
$posts = get_posts( $args ); 
if ( $posts ) : 
$count = 0; ?>
  <section class="related">
    <h2 class="related__header">Related Posts</h2>

    <?php if ( count($posts) < 3 ) :
      foreach ( $posts as $post ) : setup_postdata( $post );
        get_template_part( 'partials/content/content', 'featured' );
      endforeach; wp_reset_postdata();

    elseif ( count($posts) == 3 ) : ?>
      <div class="related__container">
        <?php foreach ( $posts as $post ) : setup_postdata( $post );
          get_template_part( 'partials/content/content', 'post' );
        endforeach; wp_reset_postdata(); ?>
      </div>
    <?php else : ?>
      <div class="card__container--feature">
        <?php foreach ( $posts as $post ) : setup_postdata( $post );
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
    <?php endif; ?>

  </section>
<?php endif; ?>
