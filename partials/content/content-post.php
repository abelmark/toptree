<?php
/**
 *  @author    Mark Abel and Thomas Vaeth
 *  @package   toptree/partials/content/content-post
 *  @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$category = get_the_category();
?>

<article class="vertical-card">
  <div class="vertical-card__container">
    <a class="vertical-card__link" href="<?php the_permalink(); ?>">
      <div class="vertical-card__img">
        <div class="absolute-bg js-wow fade-in" style="background-image: url('<?php toptree_ft_img('full'); ?>');"></div>
      </div>
      <div class="vertical-card__content">
        <span class="vertical-card__category"><?php echo $category[0]->cat_name; ?></span>
        <h3 class="vertical-card__title"><?php the_title(); ?></h3>
        <time class="vertical-card__date"><?php the_time('M d, Y'); ?></time>
      </div>
    </a>
  </div>
</article>