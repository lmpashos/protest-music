<?php
require_once('Constants.inc');

class CommonHTML {
  
  public static function get_navigation_menu($current_page = 'index') {
    if(array_key_exists($current_page, Constants::$PAGES)) {
      $html = '';
      $html .= '<div id="menu">';
      foreach(Constants::$PAGES as $key => $value) {
        if($key !== $current_page) {
          $html .= '<a class="menu-button" href="' . $key . '.php">' . $value . '</a>';
        } else {
          $html .= '<a class="menu-button menu-button-disabled" href="' . $key . '.php">' . $value . '</a>';
        }
      }
      $html .= '</div>';
      
      return $html;
    } else {
      
    }
  }
  
  
  public static function get_creative_commons_license() {
    $html = '';
    $html .= '<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">';
    $html .= '<img alt="Creative Commons License" style="border-width: 0" ';
    $html .= 'src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a>';
    $html .= '<br />This work is licensed under a <a rel="license" ';
    $html .= 'href="http://creativecommons.org/licenses/by-sa/4.0/">';
    $html .= 'Creative Commons Attribution-ShareAlike 4.0 International License</a>.';
    return $html;
  }
}
?>