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
  const IMG_DIR = 'images/';

  const SONG_LIST_FILENAME = 'data/songs/master_song_list.xml';
  const SONG_XML_TO_LYRIC_HTML_XSL = 'data/songs/song_xml_to_lyric_html.xsl';
  
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
    'home' => 'index.php',
    'about' => 'about.php',
    'about_vision' => 'about.php#vision',
    'about_method' => 'about.php#method',
    'about_eras' => 'about.php#eras',
    'about_analysis' => 'about.php#analysis',
    'about_us' => 'about.php#us',
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
    'resources' => 'resources.php',
    'resources_xml' => 'resources.php#xml_data',
    'resources_schema' => 'resources.php#schemas',
    'resources_xslt' => 'resources.php#xslt'
  );

  static $PAGES = array(
    'home' => array(), 
    'about' => array(
      'vision',
      'method', 
      'eras',
      'analysis',
      'us',
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
      'subsection2'
    ),
    'resources' => array(
      'xml',
      'schema',
      'xslt'
    )   
  );
  
  static $PAGE_KEY_TO_PAGE_STRING = array(
      Constants::ERA_MODERN => 'Modern',
      Constants::ERA_VIETNAM => 'Vietnam',
      Constants::ERA_GREAT_DEPRESSION => 'The&nbsp;Great&nbsp;Depression',
      'xml' => 'XML&nbsp;Data',
      'schema' => 'Schemas',
      'xslt' => 'XSLT',
      'subsection1' => 'Subsection 1', 
      'subsection2' => 'Subsection 2',
      'vision' => 'Vision',
      'method' => 'Method',
      'eras' => 'Eras',
      'us' => 'Us',
      'analysis' => 'Analysis',
  );
}

?>