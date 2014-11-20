<?php 
require_once('util/CommonHTML.inc');

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

$current_page = 'index';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Protest Music</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/index.css" rel="stylesheet" type="text/css" />
    <script src="js/main.js"></script>
    <script src="js/index.js"></script>
</head>

<body>
    <div class="wrapper">
        <?php echo CommonHTML::get_navigation_menu($current_page); ?>  
        <h1>Home</h1>
        <div class="content">         
            <div id="center">
                <span id="splash_title">Discovering Protest Music:</span>
                <span id="splash_subtitle">Can We Define It?</span>
                <p>
                	A Digital Humanities Project by Leonidas Pashos, Katie Uihlein, and David Galloway
                </p>
                <div id="images">
                    <img src="images/guthrie.jpg" />
                    <img src="images/dylan.jpg" />
                    <img src="images/nwa.jpg" />
                </div>
                <div id="button">
              		<a href="about.php">Continue to About</a>
                </div>
            </div>
        </div>     
    </div>
    <div class="footer">
        <?php echo CommonHTML::get_creative_commons_license(); ?>
    </div>
    <form>
        <input type="hidden" value="<?php echo $current_page; ?>" id="current_page_name" />
    </form>
</body>
</html>
