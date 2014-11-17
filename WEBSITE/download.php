<?php

require_once("util/Constants.inc");

// place this code inside a php file and call it f.e. "download.php"
//$path = Constants::FILE_DIR; // change the path to fit your websites document structure
$path = $_POST['path'];
$fullPath = ($path . $_POST['download_file']);

if($fullPath == '' || $fullPath == NULL) {
  $path = $_GET['path'];
  $fullPath = ($path . $_GET['download_file']);
}

if($fd = fopen ($fullPath, "r")) {
  $fsize = filesize($fullPath);
  $path_parts = pathinfo($fullPath);
  $ext = strtolower($path_parts["extension"]);
  switch ($ext) {
    case "pdf":
      header("Content-type: application/pdf"); // add here more headers for diff. extensions
      header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a download
      break;
    case "xml":
        header("Content-type: text/xml");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a download
        break;
    default;
      header("Content-type: application/octet-stream");
      header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
  }
  header("Content-length: $fsize");
  header("Cache-control: private"); //use this to open files directly
  
  while(!feof($fd)) {
    $buffer = fread($fd, 2048);
    echo $buffer;
  }
}
fclose ($fd);
exit;

?>