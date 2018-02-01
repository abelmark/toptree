<?php
/*-----------------------------------------------*
 * ACF Layout Module Loader
 *
 * Logical layout automation for Advanced Custom Fields and the Flexible Content Field.
 * http://www.advancedcustomfields.com/
 * http://www.advancedcustomfields.com/add-ons/flexible-content-field/
 *
 * Useage: ACF_Layout::render(get_row_layout());
/*-----------------------------------------------*/
class ACF_Modules {
  /**
   * Path of where the layout templates are found,
   * relative to the theme template directory.
   */
  const LAYOUT_DIRECTORY = '/partials/modules/';

  /**
   * Get Layout
   *
   * @param  {string} $file
   * @param  {array}  $data
   * @return {string}
   */
  static function get_layout($layout, $data = null)
  {
    
    $full_layout_directory = get_template_directory() . self::LAYOUT_DIRECTORY;
    $layout_file = '{{layout}}.php';
    $find = array('{{layout}}', '_');
    $replace = array($layout, '-');

    /* Find a file that matchs this_format */
    $new_layout_file = str_replace($find[0], $replace[0], $layout_file);

    if (file_exists($full_layout_directory . $new_layout_file))
    {
      include($full_layout_directory . $new_layout_file);
      return true;
    }
    else
    {
      /* Find a file that matchs this-format */
      $new_layout_file = str_replace($find, $replace, $layout_file);

      if (file_exists($full_layout_directory . $new_layout_file))
      {
        include($full_layout_directory . $new_layout_file);
        return true;
      }
    }

    /**
     * If no files can be matched,
     * and WP DEBUG is true: show a warning.
     */
    if (WP_DEBUG)
    {
      echo "<pre>ACF_Modules: No layout template found for $layout.</pre>";
    }
    
    return false;
  }

  /**
   * Render
   *
   * @param  {string} $layout
   * @return {string}
   */
  static function render($layout, $data = null)
  {
    return self::get_layout($layout, $data);
  }
}
?>
