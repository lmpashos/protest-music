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
require_once('FileUtilities.inc');
require_once('StaticFunctions.inc');

class Resources {
    
  public static function get_html_from_xml_song_list() {

    $html = '';
    if(file_exists(Constants::SONG_LIST_FILENAME)) {
      $xml = simplexml_load_file(Constants::SONG_LIST_FILENAME);
       
      $html .= (StaticFunctions::indent(1, 4) . '<div class="tab">' . "\n");     
      $html .= (StaticFunctions::indent(1, 4) . '<h1 class="tabHeader" id="xml_data">XML Data</h1>' . "\n"); 
      
      //First do the great depression//&#708; &#10549;
      $html .= (StaticFunctions::indent(1, 4) . '<h2 id="link_xml_great_depression"><span id="depression_arrow">&rarr;</span>&nbsp;'. Constants::$PAGE_KEY_TO_PAGE_STRING[Constants::ERA_GREAT_DEPRESSION] . '</h2>' . "\n");
      $html .= (StaticFunctions::indent(1, 4) . '<div id="xml_great_depression" class="sub_section">' . "\n");
     
      
      //Get the Protest songs of the Great Depression
      $path = Constants::DATA_DIR . 'songs/' . Constants::ERA_GREAT_DEPRESSION . '/protest/';
      $result = $xml->xpath('//song[@era="' . Constants::ERA_GREAT_DEPRESSION . '" and @is_protest="true"]');
      if(count($result) > 0) {
        $html .= (StaticFunctions::indent(2, 4) . '<div class="song_list_protest">' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '<h3>Protest:</h3>' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '<ul id="xml_' . Constants::ERA_GREAT_DEPRESSION . '_protest">' . "\n");
        
        foreach($result as $song) {
          $html .= (StaticFunctions::indent(3, 4) . '<li>');
          $html .= ('<a href="' . $path . '/' . $song->lyric_filename . '" target="_blank">');
          $html .= ($song->lyric_filename . '</a>');
          $html .= ('</li>' . "\n");
        }
        
        $html .= (StaticFunctions::indent(2, 4) . '</ul>' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '</div>' . "\n");
      }
      
      //Non-Protest Great Depression Songs
      $path = Constants::DATA_DIR . 'songs/' . Constants::ERA_GREAT_DEPRESSION . '/non_protest/';
      $result = $xml->xpath('//song[@era="' . Constants::ERA_GREAT_DEPRESSION . '" and @is_protest="false"]');
      if(count($result) > 0) {
        $html .= (StaticFunctions::indent(2, 4) . '<div class="song_list_non_protest">' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '<h3>Non-Protest:</h3>' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '<ul id="xml_' . Constants::ERA_GREAT_DEPRESSION . '_non_protest">' . "\n");
      
        foreach($result as $song) {
          $html .= (StaticFunctions::indent(3, 4) . '<li>');
          $html .= ('<a href="' . $path . '/' . $song->lyric_filename . '" target="_blank">');
          $html .= ($song->lyric_filename . '</a>');
          $html .= ('</li>' . "\n");
        }
      
        $html .= (StaticFunctions::indent(2, 4) . '</ul>' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '</div>' . "\n");
      }
      $html .= (StaticFunctions::indent(1, 4) . '</div>' . "\n");
      

      //Next, do the Vietnam War era      
      $html .= (StaticFunctions::indent(1, 4) . '<h2 id="link_xml_vietnam"><span id="vietnam_arrow">&rarr;</span>&nbsp;'. Constants::$PAGE_KEY_TO_PAGE_STRING[Constants::ERA_VIETNAM] . '</h2>' . "\n");
      $html .= (StaticFunctions::indent(1, 4) . '<div id="xml_vietnam" class="sub_section">' . "\n");
      
      //Get the Protest songs of the Vietnam War era
      $path = Constants::DATA_DIR . 'songs/' . Constants::ERA_VIETNAM . '/protest/';
      $result = $xml->xpath('//song[@era="' . Constants::ERA_VIETNAM . '" and @is_protest="true"]');
      if(count($result) > 0) {
        $html .= (StaticFunctions::indent(2, 4) . '<div class="song_list_protest">' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '<h3>Protest:</h3>' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '<ul id="xml_' . Constants::ERA_VIETNAM . '_protest">' . "\n");
      
        foreach($result as $song) {
          $html .= (StaticFunctions::indent(3, 4) . '<li>');
          $html .= ('<a href="' . $path . '/' . $song->lyric_filename . '" target="_blank">');
          $html .= ($song->lyric_filename . '</a>');
          $html .= ('</li>' . "\n");
        }
      
        $html .= (StaticFunctions::indent(2, 4) . '</ul>' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '</div>' . "\n");
      }
      
      //Non-Protest Vietnam Era Songs
      $path = Constants::DATA_DIR . 'songs/' . Constants::ERA_VIETNAM . '/non_protest/';
      $result = $xml->xpath('//song[@era="' . Constants::ERA_VIETNAM . '" and @is_protest="false"]');
      if(count($result) > 0) {
        $html .= (StaticFunctions::indent(2, 4) . '<div class="song_list_non_protest">' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '<h3>Non-Protest:</h3>' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '<ul id="xml_' . Constants::ERA_VIETNAM . '_non_protest">' . "\n");
      
        foreach($result as $song) {
          $html .= (StaticFunctions::indent(3, 4) . '<li>');
          $html .= ('<a href="' . $path . '/' . $song->lyric_filename . '" target="_blank">');
          $html .= ($song->lyric_filename . '</a>');
          $html .= ('</li>' . "\n");
        }
      
        $html .= (StaticFunctions::indent(2, 4) . '</ul>' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '</div>' . "\n");
      }
      $html .= (StaticFunctions::indent(1, 4) . '</div>' . "\n");
      
      //Last, do the Post-Vietnam War era
      $html .= (StaticFunctions::indent(1, 4) . '<h2 id="link_xml_modern"><span id="modern_arrow">&rarr;</span>&nbsp;' . Constants::$PAGE_KEY_TO_PAGE_STRING[Constants::ERA_MODERN] . '</h2>' . "\n");
      $html .= (StaticFunctions::indent(1, 4) . '<div id="xml_modern" class="sub_section">' . "\n");
      
      //Get the Protest songs of the Post-Vietnam War era
      $path = Constants::DATA_DIR . 'songs/' . Constants::ERA_MODERN . '/protest/';
      $result = $xml->xpath('//song[@era="' . Constants::ERA_MODERN . '" and @is_protest="true"]');
      if(count($result) > 0) {
        $html .= (StaticFunctions::indent(2, 4) . '<div class="song_list_protest">' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '<h3>Protest:</h3>' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '<ul id="xml_' . Constants::ERA_MODERN . '_protest">' . "\n");
      
        foreach($result as $song) {
          $html .= (StaticFunctions::indent(3, 4) . '<li>');
          $html .= ('<a href="' . $path . '/' . $song->lyric_filename . '" target="_blank">');
          $html .= ($song->lyric_filename . '</a>');
          $html .= ('</li>' . "\n");
        }
      
        $html .= (StaticFunctions::indent(2, 4) . '</ul>' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '</div>' . "\n");
      }
      
      //Non-Protest Post-Vietnam Era Songs
      $path = Constants::DATA_DIR . 'songs/' . Constants::ERA_MODERN . '/non_protest/';
      $result = $xml->xpath('//song[@era="' . Constants::ERA_MODERN . '" and @is_protest="false"]');
      if(count($result) > 0) {
        $html .= (StaticFunctions::indent(2, 4) . '<div class="song_list_non_protest">' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '<h3>Non-Protest:</h3>' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '<ul id="xml_' . Constants::ERA_MODERN . '_non_protest">' . "\n");
      
        foreach($result as $song) {
          $html .= (StaticFunctions::indent(3, 4) . '<li>');
          $html .= ('<a href="' . $path . '/' . $song->lyric_filename . '" target="_blank">');
          $html .= ($song->lyric_filename . '</a>');
          $html .= ('</li>' . "\n");
        }
      
        $html .= (StaticFunctions::indent(2, 4) . '</ul>' . "\n");
        $html .= (StaticFunctions::indent(2, 4) . '</div>' . "\n");
      }   
      $html .= (StaticFunctions::indent(1, 4) . '</div>' . "\n");
      $html .= (StaticFunctions::indent(1, 4) . '</div>' . "\n");
      
      //Now get all of the Schema Data
      $html .= (StaticFunctions::indent(1, 4) . '<div class="tab">' . "\n");
      $html .= (StaticFunctions::indent(2, 4) . '<h1 class="tabHeader" id="schemas">Schemas</h1>' . "\n");
      
      $path = 'data/schemas/song/';
      $filename = 'song_schema_1.1.rnc';
      $html .= (StaticFunctions::indent(2, 4) . '<h3>Song Schema:</h3>' . "\n");
      $html .= (StaticFunctions::indent(2, 4) . '<ul>' . "\n");
      $html .= (StaticFunctions::indent(3, 4) . '<li>');
      
      $html .= ('<a href="' . $path . '/' . $filename . '" target="_blank">');
      $html .= ($filename . '</a>');
      $html .= ('</li>' . "\n");
      
      $html .= (StaticFunctions::indent(2, 4) . '</ul>' . "\n");

      $path = 'data/schemas/song_list/';
      $filename = 'song_list_schema_1.1.rnc';
      $html .= (StaticFunctions::indent(2, 4) . '<h3>Song List Schema:</h3>' . "\n");
      $html .= (StaticFunctions::indent(2, 4) . '<ul>' . "\n");
      $html .= (StaticFunctions::indent(3, 4) . '<li>');
      
      $html .= ('<a href="' . $path . '/' . $filename . '" target="_blank">');
      $html .= ($filename . '</a>');
      $html .= ('</li>' . "\n");
      
      $html .= (StaticFunctions::indent(2, 4) . '</ul>' . "\n");
      $html .= (StaticFunctions::indent(1, 4) . '</div>' . "\n");
      
      //Now get all of the XSLT Data
      $html .= (StaticFunctions::indent(1, 4) . '<div class="tab">' . "\n");
      $html .= (StaticFunctions::indent(2, 4) . '<h1 class="tabHeader" id="xslt">XSLT</h1>' . "\n");
      $html .= (StaticFunctions::indent(2, 4) . '<ul>' . "\n");
      $path = Constants::DATA_DIR . 'songs/';
      $xslFiles = FileUtilities::get_files_in_dir($path, '*.xsl', 0); 
      foreach($xslFiles as $xslFile) {
        $html .= (StaticFunctions::indent(3, 4) . '<li>');
        $html .= (StaticFunctions::indent(3, 4) . '<a href="' . $path . '/' . $xslFile . '" target="_blank">');
        $html .= ($xslFile . '</a>');
        $html .= ('</li>' . "\n");
      }
      
      $html .= (StaticFunctions::indent(2, 4) . '</ul>' . "\n");
      $html .= (StaticFunctions::indent(1, 4) . '</div>' . "\n");
      
      //Now get all of the XQuery Data
      $html .= (StaticFunctions::indent(1, 4) . '<div class="tab">' . "\n");
      $html .= (StaticFunctions::indent(2, 4) . '<h1 class="tabHeader" id="xquery">XQuery</h1>' . "\n");
      $html .= (StaticFunctions::indent(2, 4) . '<h3>Queries:</h3>' . "\n");
      $html .= (StaticFunctions::indent(2, 4) . '<ul>' . "\n");
      $path = Constants::DATA_DIR . 'xquery/queries/';
      $xqlFiles = FileUtilities::get_files_in_dir($path, '*.xql', 0);
      foreach($xqlFiles as $xqlFile) {
        $html .= (StaticFunctions::indent(3, 4) . '<li>');
        $html .= (StaticFunctions::indent(3, 4) . '<a href="' . $path . '/' . $xqlFile . '" target="_blank">');
        $html .= ($xqlFile . '</a>');
        $html .= ('</li>' . "\n");
      }
      
      $html .= (StaticFunctions::indent(2, 4) . '</ul>' . "\n");
      
      //Get the XML Output from the queries
      $html .= (StaticFunctions::indent(2, 4) . '<h3>Output:</h3>' . "\n");
      $html .= (StaticFunctions::indent(2, 4) . '<ul>' . "\n");
      $path = Constants::DATA_DIR . 'xquery/output/';
      $xmlFiles = FileUtilities::get_files_in_dir($path, '*.xml', 0);
      foreach($xmlFiles as $xmlFile) {
        $html .= (StaticFunctions::indent(3, 4) . '<li>');
        $html .= (StaticFunctions::indent(3, 4) . '<a href="' . $path . '/' . $xmlFile . '" target="_blank">');
        $html .= ($xmlFile . '</a>');
        $html .= ('</li>' . "\n");
      }
      
      $html .= (StaticFunctions::indent(2, 4) . '</ul>' . "\n");
      $html .= (StaticFunctions::indent(1, 4) . '</div>' . "\n");
      
      //Last, Direct users to our github site for anything else they might want to see
      $html .= (StaticFunctions::indent(1, 4) . '<div class="tab">' . "\n");
      $html .= (StaticFunctions::indent(2, 4) . '<h1 class="tabHeader" id="github">GitHub</h1>' . "\n");
      $html .= (StaticFunctions::indent(2, 4) . '<h3>&nbsp;');
      $html .= ('<a href="https://github.com/lmpashos/protest-music" target="_blank"><img style="vertical-align: middle;" src="images/GitHub-Mark-32px.png" /></a>');
      $html .= (' For all other resources, please check out our site on <a href="https://github.com/lmpashos/protest-music" target="_blank">GitHub</a></h3>' . "\n");
      $html .= (StaticFunctions::indent(2, 4) . '<h5>'  . "\n");
      $html .= (StaticFunctions::indent(1, 4) . '</div>' . "\n");
    
    } else {
      $html = (StaticFunctions::indent(1, 4) . '<h6 class="listSubTitle">Error Parsing XML Document</h6>' . "\n");
    }
    echo $html;
  }
  
}
?>