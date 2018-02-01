<?php
$toptree_order_options = get_option('toptree_order_options');
$toptree_order_objects = isset($toptree_order_options['objects']) ? $toptree_order_options['objects'] : array();
$toptree_order_tags = isset($toptree_order_options['tags']) ? $toptree_order_options['tags'] : array();
?>

<div class="wrap">
    <?php screen_icon('plugins'); ?>
    <h2>Custom Post Order Settings</h2>
    <?php if (isset($_GET['msg'])) : ?>
        <div id="message" class="updated below-h2">
            <?php if ($_GET['msg'] == 'update') : ?>
                <p><?php _e('Settings Updated.','toptree_order'); ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <form method="post">

        <?php if (function_exists('wp_nonce_field')) wp_nonce_field('nonce_toptree_order'); ?>

        <div id="toptree_order_select_objects">

            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row"><?php _e('Check to Sort Post Types', 'toptree_order') ?></th> 
                        <td>
                            <label><input type="checkbox" id="toptree_order_allcheck_objects"> <?php _e('Check All', 'toptree_order') ?></label><br>
                            <?php
                            $post_types = get_post_types(array(
                                'show_ui' => true,
                                'show_in_menu' => true,
                                    ), 'objects');

                            foreach ($post_types as $post_type) {
                                if ($post_type->name == 'attachment')
                                    continue;
                                ?>
                                <label><input type="checkbox" name="objects[]" value="<?php echo $post_type->name; ?>" <?php
                                    if (isset($toptree_order_objects) && is_array($toptree_order_objects)) {
                                        if (in_array($post_type->name, $toptree_order_objects)) {
                                            echo 'checked="checked"';
                                        }
                                    }
                                    ?>>&nbsp;<?php echo $post_type->label; ?></label><br>
                                    <?php
                                }
                                ?>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>


        <div id="toptree_order_select_tags">
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row"><?php _e('Check to Sort Taxonomies', 'toptree_order') ?></th> 
                        <td>
                            <label><input type="checkbox" id="toptree_order_allcheck_tags"> <?php _e('Check All', 'toptree_order') ?></label><br>
                            <?php
                            $taxonomies = get_taxonomies(array(
                                'show_ui' => true,
                                    ), 'objects');

                            foreach ($taxonomies as $taxonomy) {
                                if ($taxonomy->name == 'post_format')
                                    continue;
                                ?>
                                <label><input type="checkbox" name="tags[]" value="<?php echo $taxonomy->name; ?>" <?php
                                    if (isset($toptree_order_tags) && is_array($toptree_order_tags)) {
                                        if (in_array($taxonomy->name, $toptree_order_tags)) {
                                            echo 'checked="checked"';
                                        }
                                    }
                                    ?>>&nbsp;<?php echo $taxonomy->label ?></label><br>
                                    <?php
                                }
                                ?>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div> 
        <p class="submit">
            <input type="submit" class="button-primary" name="toptree_order_submit" value="<?php _e('Update', 'toptree_order'); ?>">
        </p>

    </form>
</div>

<script>
    (function ($) {

        $("#toptree_order_allcheck_objects").on('click', function () {
            var items = $("#toptree_order_select_objects input");
            if ($(this).is(':checked'))
                $(items).prop('checked', true);
            else
                $(items).prop('checked', false);
        });

        $("#toptree_order_allcheck_tags").on('click', function () {
            var items = $("#toptree_order_select_tags input");
            if ($(this).is(':checked'))
                $(items).prop('checked', true);
            else
                $(items).prop('checked', false);
        });

    })(jQuery)
</script>