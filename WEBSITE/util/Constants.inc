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
 
class Constants {
    
  const HTML_INDENT_SIZE = 4;
  const JAVASCRIPT_INDENT_SIZE = 2;
  
  const MAC_OS = 1;
  const WINDOWS_OS = 2;
  const LINUX_OS = 3;
  const OTHER_OS = 4;
  
  const DATA_DIR = 'data/';
  const SONG_LIST_FILENAME = 'data/master_song_list.xml';
  const SONG_XML_TO_LYRIC_HTML_XSL = 'data/song_xml_to_lyric_html.xsl';
  const SONG_XML_TO_META_HTML_XSL = 'data/song_xml_to_meta_html.xsl';
  
  const ERA_NONE = 'none';
  const ERA_MODERN = 'modern';
  const ERA_VIETNAM = 'vietnam';
  const ERA_GREAT_DEPRESSION = 'the_great_depression';
  
  static $ERA_TO_ERA_STRING = array(
      Constants::ERA_MODERN => 'Modern',
      Constants::ERA_VIETNAM => 'Vietnam',
      Constants::ERA_GREAT_DEPRESSION => 'The Great Depression',
      Constants::ERA_NONE => 'All'
  );
  
  static $PAGES_TO_HREF = array(
    'index' => 'index.php',
    'index_subsection1' => 'index.php#subsection1',
    'index_subsection2' => 'index.php#subsection2',
    'index_subsection3' => 'index.php#subsection3',
    'about' => 'about.php',
    'about_subsection1' => 'about.php#subsection1',
    'about_subsection2' => 'about.php#subsection2',
    'about_subsection3' => 'about.php#subsection3',
    'about_subsection4' => 'about.php#subsection4',
    'lyrics' => 'lyrics.php',
    'lyrics_the_great_depression' => 'lyrics.php?era=the_great_depression',
    'lyrics_vietnam' => 'lyrics.php?era=vietnam',
    'lyrics_modern' => 'lyrics.php?era=modern',
    'data' => 'data.php',
    'data_the_great_depression' => 'data.php?era=the_great_depression',
    'data_vietnam' => 'data.php?era=vietnam',
    'data_modern' => 'data.php?era=modern',
    'conclusions' => 'conclusions.php',
    'conclusions_subsection1' => 'conclusions.php#subsection1',
    'conclusions_subsection2' => 'conclusions.php#subsection2',
    'conclusions_subsection3' => 'conclusions.php#subsection3',
    'conclusions_subsection4' => 'conclusions.php#subsection4',
    'conclusions_subsection5' => 'conclusions.php#subsection5',
    'conclusions_subsection6' => 'conclusions.php#subsection6',
  );

  static $PAGES = array(
    'index' => array(
      'subsection1', 
      'subsection2',
      'subsection3'
    ), 
    'about' => array(
      'subsection1', 
      'subsection2',
      'subsection3',
      'subsection4'
    ), 
    'lyrics' => array(
        Constants::ERA_GREAT_DEPRESSION,
        Constants::ERA_VIETNAM,
        Constants::ERA_MODERN
    ),      
    'data' => array(
      Constants::ERA_GREAT_DEPRESSION, 
      Constants::ERA_VIETNAM,
      Constants::ERA_MODERN
    ), 
    'conclusions' => array(
      'subsection1',
      'subsection2',
      'subsection3',
      'subsection4',
      'subsection5',
      'subsection6'
    )
  );
  
  static $PAGE_KEY_TO_PAGE_STRING = array(
      Constants::ERA_MODERN => 'Modern',
      Constants::ERA_VIETNAM => 'Vietnam',
      Constants::ERA_GREAT_DEPRESSION => 'The Great Depression',
      'subsection1' => 'Subsection 1', 
      'subsection2' => 'Subsection 2',
      'subsection3' => 'Subsection 3',
      'subsection4' => 'Subsection 4',
      'subsection5' => 'Subsection 5',
      'subsection6' => 'Subsection 6',
  );
}

?>