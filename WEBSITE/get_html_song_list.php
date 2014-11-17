<?php
require_once('util/Constants.inc');
require_once('util/StaticFunctions.inc');

$era = Constants::ERA_NONE;
$is_protest = false;

if(isset($_GET['era'])) {
  $era = $_GET['era'];
}

if(isset($_GET['is_protest'])) {
  $is_protest = StaticFunctions::string_to_bool($_GET['is_protest']);
}

if(file_exists(Constants::SONG_LIST_FILENAME)) {
  $xml = simplexml_load_file(Constants::SONG_LIST_FILENAME);
  $html = '';

  switch($era) {    
    case Constants::ERA_GREAT_DEPRESSION:
    case Constants::ERA_VIETNAM:
    case Constants::ERA_MODERN:
      $result = $xml->xpath('//song[@era="' . $era . '" and @is_protest="' . var_export($is_protest, true) . '"]');
      
      $html = StaticFunctions::indent(1, 4) . '<h5 class="listTitle">List of Protest Songs</h5>' . "\n";
      $html .= StaticFunctions::indent(1, 4) . '<h6 class="listSubTitle">' . Constants::$ERA_TO_ERA_STRING[$era] . '</h6>' . "\n";
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
      
      $html = StaticFunctions::indent(1, 4) . '<h5 class="listTitle">List of Protest Songs</h5>' . "\n";
      $html .= StaticFunctions::indent(1, 4) . '<h6 class="listSubTitle">' . Constants::$ERA_TO_ERA_STRING[Constants::ERA_GREAT_DEPRESSION] . '</h6>' . "\n";
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
      
      $html .= StaticFunctions::indent(1, 4) . '<h6 class="listSubTitle">' . Constants::$ERA_TO_ERA_STRING[Constants::ERA_VIETNAM] . '</h6>' . "\n";
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
      
      $html .= StaticFunctions::indent(1, 4) . '<h6 class="listSubTitle">' . Constants::$ERA_TO_ERA_STRING[Constants::ERA_MODERN] . '</h6>' . "\n";
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
    
  echo $html;
  
} else {
  $html = StaticFunctions::indent(1, 4) . '<h6 class="listSubTitle">Error Parsing XML Document</h6>' . "\n";
}

