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
    
    if(isset($song[0]->image_filename) && trim($song[0]->image_filename) !== '') {
      $image_filename = Constants::IMG_DIR . trim($song[0]->image_filename);
    }
    
    if(isset($song[0]->image_src) && trim($song[0]->image_src) !== '') {
      $image_src = trim($song[0]->image_src);
    }
  
    if(isset($song[0]->youtube_link) && trim($song[0]->youtube_link) !== '') {
      $youtube_link = trim($song[0]->youtube_link);
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
      
      if($is_protest) {
        $html .= ('<span id="heading_song_title_left">' . $meta_xml->title . '</span><br />' . "\n");
      } else {
        $html .= ('<span id="heading_song_title_right">' . $meta_xml->title . '</span><br />' . "\n");
      }
      
      
      $html .= ('</p>' . "\n");           
      $html .= ('</div>' . "\n");
      
      $html .= ('<hr />' . "\n");
      
 
      $html .= ('<div class="song">' . "\n");
      if(isset($youtube_link)) {
        $html .= ('<div class="youtube_video"><iframe class="youtube_video" width="300" height="169" src="' . $youtube_link . '" frameborder="0" allowfullscreen></iframe></div>' . "\n");
      }
      $html .= ('<p><span class="song_title">Lyrics</span></p>' . "\n");
      
      // Load the XML source
      $xml = new DOMDocument;
      $xml->load($song_filename);
      $xslLyric = new DOMDocument;
      $xslLyric->load(Constants::SONG_XML_TO_LYRIC_HTML_XSL);
      
      // Configure the transformer
      $proc = new XSLTProcessor;
      $proc->importStyleSheet($xslLyric); // attach the xsl rules
      
      //Add the stylesheet transformation
      $html .= $proc->transformToXML($xml);
            
      //End the Song div
      $html .= ('</div>' . "\n");
    
    } else {
      $html = StaticFunctions::indent(1, 4) . '<h6 class="error">Couldn\'t find XML Document, ' . $song_filename . '</h6>' . "\n";
    }
  } 
}
echo $html;

?>

