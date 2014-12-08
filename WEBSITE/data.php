<?php 
require_once('util/CommonHTML.inc');
require_once('util/Data.inc');

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

$current_page = 'data';

$era = Constants::ERA_NONE;

if(isset($_GET['era'])) {
  $era = $_GET['era'];
  if(!($era === Constants::ERA_GREAT_DEPRESSION || $era === Constants::ERA_VIETNAM || $era === Constants::ERA_MODERN)) {
    $era = Constants::ERA_NONE;
  }
}

?>

<!DOCTYPE html> 
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo ucfirst($current_page); ?></title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/data.css" rel="stylesheet" type="text/css" />
    <script src="js/main.js" type="text/javascript">/**/</script>
    <script src="js/data.js" type="text/javascript">/**/</script>
</head>
<body>
    <div class="wrapper">
        <?php echo CommonHTML::get_navigation_menu($current_page); ?>
        <h1><?php echo ucfirst($current_page); ?></h1>
        <div class="content">
            <div id="left">
                <ul class="absolute">
                   <li><a class="toc_title" href="#xml_data">XML Files</a>
                        <ul>
                            <li><a href="#link_xml_great_depression">The Great Depression</a></li>
                            <li><a href="#link_xml_vietnam">Vietnam</a></li>
                            <li><a href="#link_xml_modern">Modern</a></li>
                        </ul>
                    </li>
                    <li><a class="toc_title" href="#schemas">Schema Files</a></li>
                    <li><a class="toc_title" href="#xslt">XSLT Files</a></li>
				</ul>  
            </div>
            <div id="center">
                <?php echo Data::get_html_from_xml_song_list(); ?>
            </div>
        </div> 
    </div>
    <div class="footer">
        <?php echo CommonHTML::get_creative_commons_license(); ?>
    </div>
    <form>
        <input type="hidden" value="<?php echo $current_page; ?>" id="current_page_name" />
        <input type="hidden" value="<?php echo $era; ?>" id="music_era" />
    </form>
</body>
</html>
