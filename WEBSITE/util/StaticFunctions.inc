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

class StaticFunctions {
  
  public static function indent($how_many = 0, $indent_size = 0) {
    $retVal = '';
    for($i = 0; $i < $how_many; $i++) {
      for($j = 0; $j < $indent_size; $j++) {
        $retVal .= ' ';
      }
    }
    
    return $retVal;
  }
  
  public static function detect_os($user_agent = '') {
    
    if(preg_match('/Linux/', $user_agent)) {
      return Constants::LINUX_OS;
    } elseif(preg_match('/Win/', $user_agent)) {
       return Constants::WINDOWS_OS;
    } elseif(preg_match('/Mac/', $user_agent)) {
      return Constants::MAC_OS;
    } else {
      return Constants::OTHER_OS;
    }
  }
  
  public static function get_sitebase() {
    return 'http://' . $_SERVER["HTTP_HOST"] . '/protest';
  }

  public static function string_to_bool($string) {
    return (mb_strtoupper(trim( $string)) === mb_strtoupper("true")) ? TRUE : FALSE;
  }
}

?>