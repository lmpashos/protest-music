<?php
require_once('Constants.inc');

class CommonHTML {
  
  public static function get_navigation_menu($current_page = 'index') {
    
    if(array_key_exists($current_page, Constants::$PAGES)) {
      $html = '';
      $html .= '<div class="menu">' . "\n";
     
      foreach(Constants::$PAGES as $key => $value) {
        
        if($key !== $current_page) {
          $html .= '<div class="menu_button">' . "\n";
          $html .= '<a href="' . Constants::$PAGES_TO_HREF[$key] . '" id="' . $key. '">' . ucfirst($key) . "</a>\n";
          $html .= '<div class="menu_panel" id="' . $key . '_panel">' . "\n";
          foreach($value as $subpage) {
            $html .= '<li><a href="' . Constants::$PAGES_TO_HREF[$key . '_' . $subpage] . '">' . ucfirst($subpage) . "</a></li>\n";
          }
          $html .= "</div>\n";
          $html .= "</div>\n";
        } else {
          $html .= '<div class="menu_button">' . "\n";
          $html .= '<a id="' . $key . '" class="current">' . ucfirst($key) . "</a>\n";
          $html .= '<div class="menu_panel" id="' . $key . '_panel">' . "\n";
          foreach($value as $subpage) {
            $html .= '<li><a>' . ucfirst($subpage) . '</a></li>';
          }
          $html .= "</div>\n";
          $html .= "</div>\n";
        }
      }
      $html .= "</div>\n";
      
      return $html;
    } else {
      
    }
  }
  
  
  public static function get_creative_commons_license() {
    $html = '';
    $html .= '<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">';
    $html .= '<img alt="Creative Commons License" style="border-width: 0" ';
    $html .= 'src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a>';
    $html .= 'This work is licensed under a <a rel="license" ';
    $html .= 'href="http://creativecommons.org/licenses/by-sa/4.0/">';
    $html .= 'Creative Commons Attribution-ShareAlike 4.0 International License</a>.';
    return $html;
  }
}
?>