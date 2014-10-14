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
    'data' => 'data.php',
    'data_subsection1' => 'data.php#subsection1',
    'data_subsection2' => 'data.php#subsection2',
    'data_subsection3' => 'data.php#subsection3',
    'data_subsection4' => 'data.php#subsection4',
    'data_subsection5' => 'data.php#subsection5',
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
    'data' => array(
      'subsection1', 
      'subsection2',
      'subsection3',
      'subsection4',
      'subsection5'
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
}

?>