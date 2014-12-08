<?php 
require_once('util/CommonHTML.inc');

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

$current_page = 'home';

?>
<!DOCTYPE html> 
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Protest Music</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/index.css" rel="stylesheet" type="text/css" />
    <script src="js/main.js" type="text/javascript">/**/</script>
    <script src="js/index.js" type="text/javascript">/**/</script>
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
                    <a href="images/guthrie.jpg" title="Woody Guthrie, Source: http://upload.wikimedia.org/wikipedia/commons/e/e0/Woody_Guthrie_NYWTS.jpg"><img src="images/guthrie.jpg" alt="Woody Guthrie" /></a>
                    <a href="images/dylan.jpg" title="Bob Dylan and Joan Baez, Source: http://upload.wikimedia.org/wikipedia/commons/3/33/Joan_Baez_Bob_Dylan.jpg"><img src="images/dylan.jpg" alt="Bob Dylan" /></a>
                    <a href="images/nwa.jpg" title="NWA, Source: http://cdn.respect-mag.com/wp-content/uploads/2014/10/nwa.jpg?ac55ec"><img src="images/nwa.jpg" alt="N.W.A." /></a>
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
