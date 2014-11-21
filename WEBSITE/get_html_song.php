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
    
    if(file_exists($song_filename)) {
      
      //For the metadata, it is easiest just to step through the Meta part of the document itself
      $meta_xml = simplexml_load_file($song_filename)->metadata;
      
      //Wrap the entire Item in a div for song
      $html .= ('<div class="song">' . "\n");
      $html .= ('<h2>' . $meta_xml->title . '</h2>' . "\n");
      if(count($meta_xml->composer) == 0) {
        $html .= '<h3>None</h3>' . "\n";
      } elseif (count($meta_xml->composer) == 0) {
        $html .= ('<h3>' . $meta_xml->composer[0] . '</h3>' . "\n");
      } else {
        $html .= '<h3>';
        for($i = 0; $i < count($meta_xml->composer); ++$i) {
          $html .= $meta_xml->composer[$i];
          if($i + 1 < count($meta_xml->composer)) {
            $html .= ', ';
          }
        }
        $html .= ('</h3>' . "\n");
      }
      
      $html .= ('<h3>' . $meta_xml->album . '</h3>' . "\n");
      $html .= ('<h3>' . $meta_xml->year . '</h3>' . "\n");

      if(count($meta_xml->genre) == 0) {
        $html .= '<h3>None</h3>' . "\n";
      } elseif (count($meta_xml->genre) == 0) {
        $html .= ('<h3>' . $meta_xml->genre[0] . '</h3>' . "\n");
      } else {
        $html .= '<h3>';
        for($i = 0; $i < count($meta_xml->genre); ++$i) {
          $html .= $meta_xml->genre[$i];
          if($i + 1 < count($meta_xml->genre)) {
            $html .= ', ';
          }
        }
        $html .= ('</h3>' . "\n");
      }

      if(count($meta_xml->notablePerformer) == 0) {
        $html .= '<h3>None</h3>' . "\n";
      } elseif (count($meta_xml->notablePerformer) == 0) {
        $html .= ('<h3>' . $meta_xml->notablePerformer[0] . '</h3>' . "\n");
      } else {
        $html .= '<h3>';
        for($i = 0; $i < count($meta_xml->notablePerformer); ++$i) {
          $html .= $meta_xml->notablePerformer[$i];
          if($i + 1 < count($meta_xml->notablePerformer)) {
            $html .= ', ';
          }
        }
        $html .= ('</h3>' . "\n");
      }
 
      $html .= ('<hr />' . "\n");
      $html .= ('<br />' . "\n");
      $html .= ('<h2>Lyrics</h2>' . "\n");
      
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

