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

class SongTOC {
  
  public static function get_song_list($era = Constants::ERA_NONE, $is_protest = false, $include_popup_buttons = false) {
    
    if(!($era === Constants::ERA_GREAT_DEPRESSION || $era === Constants::ERA_VIETNAM || $era === Constants::ERA_MODERN)) {
      $era = Constants::ERA_NONE;
    }
    
    if(file_exists(Constants::SONG_LIST_FILENAME)) {
      $xml = simplexml_load_file(Constants::SONG_LIST_FILENAME);
      $html = '';
    
      switch($era) {
        case Constants::ERA_GREAT_DEPRESSION:
        case Constants::ERA_VIETNAM:
        case Constants::ERA_MODERN:
          $result = $xml->xpath('//song[@era="' . $era . '" and @is_protest="' . var_export($is_protest, true) . '"]');
    
          $html = (StaticFunctions::indent(1, 4) . '<h5 class="list_title">List of ' . ($is_protest ? 'Protest' : 'Non-Protest') . ' Songs</h5>' . "\n");
          $html .= (StaticFunctions::indent(1, 4) . '<h6 class="list_sub_title">' . Constants::$ERA_TO_ERA_STRING[$era] . '</h6>' . "\n");
          if(count($result) > 0) {
            $html .= (StaticFunctions::indent(1, 4) . '<ul>' . "\n");
          }
    
          foreach($result as $song) {
            $html .= (StaticFunctions::indent(2, 4) . '<li id="' . str_replace('.xml', '', $song->lyric_filename) . '">' . $song->title . '</li>' . "\n");
          }
    
          if(count($result) > 0) {
            $html .= (StaticFunctions::indent(1, 4) . '</ul>' . "\n");
          }
          break;
    
        case Constants::ERA_NONE:
          //Just get the whole list broken up by era's
    
          //First get the Great Depression
          $result = $xml->xpath('//song[@era="' . Constants::ERA_GREAT_DEPRESSION . '" and @is_protest="' . var_export($is_protest, true) . '"]');
    
          $html = (StaticFunctions::indent(1, 4) . '<h5 class="list_title">List of ' . ($is_protest ? 'Protest' : 'Non-Protest') . ' Songs</h5>' . "\n");
          $html .= (StaticFunctions::indent(1, 4) . '<h6 class="list_sub_title">' . Constants::$ERA_TO_ERA_STRING[Constants::ERA_GREAT_DEPRESSION] . '</h6>' . "\n");
          if(count($result) > 0) {
            $html .= (StaticFunctions::indent(1, 4) . '<ul>' . "\n");
          }
    
          foreach($result as $song) {
            $html .= (StaticFunctions::indent(2, 4) . '<li id="' . str_replace('.xml', '', $song->lyric_filename) . '">' . $song->title . '</li>' . "\n");
          }
    
          if(count($result) > 0) {
            $html .= (StaticFunctions::indent(1, 4) . '</ul>' . "\n");
          }
    
          //Now get Vietnam songs
          $result = $xml->xpath('//song[@era="' . Constants::ERA_VIETNAM . '" and @is_protest="' . var_export($is_protest, true) . '"]');
    
          $html .= StaticFunctions::indent(1, 4) . '<h6 class="list_sub_title">' . Constants::$ERA_TO_ERA_STRING[Constants::ERA_VIETNAM] . '</h6>' . "\n";
          if(count($result) > 0) {
            $html .= (StaticFunctions::indent(1, 4) . '<ul>' . "\n");
          }
          foreach($result as $song) {
            $html .= (StaticFunctions::indent(2, 4) . '<li id="' . str_replace('.xml', '', $song->lyric_filename) . '">' . $song->title . '</li>' . "\n");
          }
          if(count($result) > 0) {
            $html .= (StaticFunctions::indent(1, 4) . '</ul>' . "\n");
          }
    
          //Last get the Post-Vietnam Songs
          $result = $xml->xpath('//song[@era="' . Constants::ERA_MODERN . '" and @is_protest="' . var_export($is_protest, true) . '"]');
    
          $html .= (StaticFunctions::indent(1, 4) . '<h6 class="list_sub_title">' . Constants::$ERA_TO_ERA_STRING[Constants::ERA_MODERN] . '</h6>' . "\n");
          if(count($result) > 0) {
            $html .= (StaticFunctions::indent(1, 4) . '<ul>' . "\n");
          }
    
          foreach($result as $song) {
            $html .= (StaticFunctions::indent(2, 4) . '<li id="' . str_replace('.xml', '', $song->lyric_filename) . '">' . $song->title . '</li>' . "\n");
          }
    
          if(count($result) > 0) {
            $html .= (StaticFunctions::indent(1, 4) . '</ul>' . "\n");
          }
          break;
      }
      
      //Add the left or right elements to bringup the popups
      if($include_popup_buttons) {
        if($is_protest) {
          $html .= (StaticFunctions::indent(1, 4) . '<br /><div class="posPanel"><a href="#" id="toggle_protest_pos">Toggle Parts of Speech</a></div>' . "\n");
        } else {
          $html .= (StaticFunctions::indent(1, 4) . '<br /><div class="posPanel"><a href="#" id="toggle_non_protest_pos">Toggle Parts of Speech</a></div>' . "\n");
        }
      }
    
      echo $html;
    
    } else {
      $html = (StaticFunctions::indent(1, 4) . '<h6 class="list_sub_title">Error Parsing XML Document</h6>' . "\n");
    }
  }
}
?>