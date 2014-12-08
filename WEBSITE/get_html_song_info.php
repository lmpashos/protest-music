<?php
require_once('util/Constants.inc');
require_once('util/StaticFunctions.inc');

$song_filename = '';
$is_protest = false;
$html = NULL;

if(isset($_GET['song_filename'])) {
  $song_filename = $_GET['song_filename'];
  //Remove the .xml if it was sent in (we don't want ".xml.xml")
  $song_filename = str_replace('.xml', '', $song_filename);
  //Add it so that it is standard 
  $song_filename .= '.xml';
}

if(file_exists(Constants::SONG_LIST_FILENAME)) {
  $song_list_xml = simplexml_load_file(Constants::SONG_LIST_FILENAME);
  $song = $song_list_xml->xpath('//song[lyric_filename="' . $song_filename . '"]');
  
  if($song) {
    $is_protest = StaticFunctions::string_to_bool($song[0]->attributes()->is_protest);
    $era = $song[0]->attributes()->era;

    //Get the path to the actual song file
    if($is_protest) {
      $song_filename = Constants::DATA_DIR . 'songs/' . $era . '/protest/' . $song_filename;
    } else {
      $song_filename = Constants::DATA_DIR . 'songs/' . $era . '/non_protest/' . $song_filename;
    }
    
    //Get any additional Song info from the Song List
    $image_filename = NULL;
    $image_src = NULL;
    $youtube_link = NULL;
    $lyric_source = NULL;
    
    if(isset($song[0]->image_filename) && trim($song[0]->image_filename) !== '') {
      $image_filename = Constants::IMG_DIR . trim($song[0]->image_filename);
    }
    
    if(isset($song[0]->image_src) && trim($song[0]->image_src) !== '') {
      $image_src = trim($song[0]->image_src);
    }
    
    if(isset($song[0]->youtube_link) && trim($song[0]->youtube_link) !== '') {
      $youtube_link = trim($song[0]->youtube_link);
    }    
    
    if(isset($song[0]->lyric_source) && trim($song[0]->lyric_source) !== '') {
      $lyric_source = trim($song[0]->lyric_source);
    }
    
    if(file_exists($song_filename)) {
      
      //For the metadata, it is easiest just to step through the Meta part of the document itself
      $meta_xml = simplexml_load_file($song_filename)->metadata;
      
      $html .= ('<div class="metadata_head">' . "\n");
      $html .= ('<p class="song_metadata" style="text-align: left;">' . "\n");
      
      if(isset($image_filename)) {
        $html .= ('<img src="' . $image_filename . '" alt="' . $image_filename);
        if(isset($image_src)) {
          $html .= ('" title="' . $image_src . '" />' . "\n");
        } else {
          $html .= ('" />' . "\n");
        }                  
      }
      
      $html .= ('<span class="song_title_label">Title:</span> <span class="song_title">' . $meta_xml->title . '</span><br />' . "\n");
      if(count($meta_xml->composer) == 0) {
        $html .= '<span class="song_info_label">Composer:</span> <span class="song_info">None</span><br />' . "\n";
      } elseif(count($meta_xml->composer) == 1) {
        $html .= ('<span class="song_info_label">Composer:</span> <span class="song_info">' . $meta_xml->composer[0] . '</span><br />' . "\n");
      } else {
        $html .= '<span class="song_info_label">Composers:</span> <span class="song_info">';
        for($i = 0; $i < count($meta_xml->composer); ++$i) {
          $html .= $meta_xml->composer[$i];
          if($i + 1 < count($meta_xml->composer)) {
            $html .= ', ';
          }
        }
        $html .= ('</span><br />' . "\n");
      }
      
      $html .= ('<span class="song_info_label">Album:</span> <span class="song_info">' . $meta_xml->album . '</span><br />' . "\n");
      $html .= ('<span class="song_info_label">Year:</span> <span class="song_info">' . $meta_xml->year . '</span><br />' . "\n");

      if(count($meta_xml->genre) == 0) {
        $html .= '<span class="song_info_label">Genre:</span> <span class="song_info">None</span><br />' . "\n";
      } elseif(count($meta_xml->genre) == 1) {
        $html .= ('<span class="song_info_label">Genre:</span> <span class="song_info">' . $meta_xml->genre[0] . '</span><br />' . "\n");
      } else {
        $html .= '<span class="song_info_label">Genres:</span> <span class="song_info">';
        for($i = 0; $i < count($meta_xml->genre); ++$i) {
          $html .= $meta_xml->genre[$i];
          if($i + 1 < count($meta_xml->genre)) {
            $html .= ', ';
          }
        }
        $html .= ('</span><br />' . "\n");
      }

      if(count($meta_xml->notablePerformer) == 0) {
        $html .= '<span class="song_info_label">Performer:</span> <span class="song_info">None</span><br />' . "\n";
      } elseif(count($meta_xml->notablePerformer) == 1) {
        $html .= ('<span class="song_info_label">Performer:</span> <span class="song_info">' . $meta_xml->notablePerformer[0] . '</span><br />' . "\n");
      } else {
        $html .= '<span class="song_info_label">Performers:</span> <span class="song_info">';
        for($i = 0; $i < count($meta_xml->notablePerformer); ++$i) {
          $html .= $meta_xml->notablePerformer[$i];
          if($i + 1 < count($meta_xml->notablePerformer)) {
            $html .= ', ';
          }
        }
        $html .= ('</span><br />' . "\n");
      }
    
      if(isset($lyric_source)) {
        $html .= ('<span class="song_info"><a class="lyric_link" target="_blank" href="' . $lyric_source . '">' . $lyric_source . '</a></span><br />' . "\n");
      }

      $html .= ('</p>' . "\n");           
      $html .= ('</div>' . "\n");
      
      $html .= ('<hr />' . "\n");
      
 
      $html .= ('<div class="song">' . "\n");
         
      //Get the SVG
      $patterns = array();
      $patterns[0] = '/xml/';
      $patterns[1] = '/protest\//';
      $replacements = array();
      $replacements[2] = 'svg';
      $replacements[1] = 'protest/svg/';
      $song_filename = preg_replace($patterns, $replacements, $song_filename);
      $svg = file_get_contents($song_filename);
      
      if($svg === false) {
        $html .= '<div>No SVG found</div>';
      } else {
        $html .= $svg; //('<div class="svg_panel">' . $svg . '</div>');
      }
      
      //End the Song div
      $html .= ('</div>' . "\n");
    
    } else {
      $html = StaticFunctions::indent(1, 4) . '<h6 class="error">Couldn\'t find XML Document, ' . $song_filename . '</h6>' . "\n";
    }
  } 
}
echo $html;

?>

