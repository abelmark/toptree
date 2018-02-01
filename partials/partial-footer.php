<?php
/**
 * @author    Thomas Vaeth
 * @package   top-tree/partials/partial-footer
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<footer class="footer">
  <ul class="footer__list">
    <li>
      <a href="<?php echo home_url(); ?>">
        <figure class="footer__img">
          <img src="<?php toptree_img(); ?>/top-tree-white.png" alt="Top Tree Logo"/>
        </figure>
      </a>
    </li>
  </ul>
</footer>

<!-- JavaScript --> 
<?php wp_footer(); ?>

</body>
</html>
