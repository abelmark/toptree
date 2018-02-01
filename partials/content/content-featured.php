<?php
/**
 *  @author    Mark Abel and Thomas Vaeth
 *  @package   toptree/partials/content/content-featured
 *  @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$category = get_the_category();
?>

<article class="horizontal-card js-wow fade-in-up">
  <div class="horizontal-card__container">
    <a class="horizontal-card__link" href="<?php the_permalink(); ?>">
      <div class="horizontal-card__img">
        <div class="absolute-bg" style="background-image: url('<?php toptree_ft_img('full'); ?>');"></div>
      </div>
      <div class="horizontal-card__content-container">
        <div class="horizontal-card__content">
          <span class="horizontal-card__category"><?php echo $category[0]->cat_name; ?></span>
          <h2 class="horizontal-card__title"><?php the_title(); ?></h2>
          <p class="horizontal-card__text"><?php echo toptree_excerpt(200); ?></p>
          <time class="horizontal-card__date"><?php the_time('M d, Y'); ?></time>
        </div>
      </div>
    </a>
  </div>
</article>
