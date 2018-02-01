<?php
/**
 * @author    Mark Abel and Thomas Vaeth
 * @package   top-tree/partials/modules/header-module
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$header_image = get_sub_field('header_image');
?>

<h2 class="image__header"><?php echo $header_image; ?></h2>
