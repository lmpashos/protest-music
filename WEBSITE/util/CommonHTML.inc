<?php
/*
 * Copyright (C) 2014 University of Pittsburgh
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once('Constants.inc');
require_once('StaticFunctions.inc');

class CommonHTML {
  
  public static function get_navigation_menu($current_page = 'index') {
    
    if(array_key_exists($current_page, Constants::$PAGES)) {
      $html = '';
      $html .= '<div class="menu">' . "\n";
     
      foreach(Constants::$PAGES as $key => $value) {
        
        if($key !== $current_page) {
          $html .=  (StaticFunctions::indent(3, 4) . '<div class="menu_button">' . "\n");
          $html .=  StaticFunctions::indent(4, 4) . '<a href="' . Constants::$PAGES_TO_HREF[$key] . '" id="' . $key. '">' . ucfirst($key) . "</a>\n";
          $html .=  StaticFunctions::indent(4, 4) . '<div class="menu_panel" id="' . $key . '_panel">' . "\n";
          foreach($value as $subpage) {
            $html .=  StaticFunctions::indent(5, 4) . '<li><a href="' . Constants::$PAGES_TO_HREF[$key . '_' . $subpage] . '">' . Constants::$PAGE_KEY_TO_PAGE_STRING[$subpage] . "</a></li>\n";
          }
          $html .= StaticFunctions::indent(4, 4) . "</div>\n";
          $html .= StaticFunctions::indent(3, 4) . "</div>\n";
        } else {
          $html .= (StaticFunctions::indent(3, 4) . '<div class="menu_button">' . "\n");
          $html .= (StaticFunctions::indent(4, 4) . '<a id="' . $key . '" class="current">' . ucfirst($key) . "</a>\n");
          $html .= (StaticFunctions::indent(4, 4) . '<div class="menu_panel" id="' . $key . '_panel">' . "\n");
          foreach($value as $subpage) {
            $html .= (StaticFunctions::indent(5, 4) . '<li><a href="' . Constants::$PAGES_TO_HREF[$key . '_' . $subpage] . '">' . Constants::$PAGE_KEY_TO_PAGE_STRING[$subpage] . "</a></li>\n");
          }
          $html .= (StaticFunctions::indent(4, 4) . "</div>\n");
          $html .= (StaticFunctions::indent(3, 4) . "</div>\n");
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