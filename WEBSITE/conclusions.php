<?php 
require_once('util/CommonHTML.inc');

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

$current_page = 'conclusions';

?>

<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ucfirst($current_page); ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/about.css" rel="stylesheet" type="text/css" />
<script src="js/main.js" type="text/javascript">/**/</script>
<script src="js/scroll.js" type="text/javascript"></script>
<script src="js/resizeColFix.js" type="text/javascript"></script>
</head>
<body>
    <div class="wrapper">
        <?php echo CommonHTML::get_navigation_menu($current_page); ?>
        <h1><?php echo ucfirst($current_page); ?></h1>
        <div class="content">
            <div id="left">
				<ul class="absolute">
					<li><a href="conclusions.php#subsection1">Subsection 1</a></li>
					<li><a href="conclusions.php#subsection2">Subsection 2</a></li>
				</ul>
			</div>
            
            <div id="center">
            	<div class="tab">
					<h1 class="tabHeader" id="subsection1">Subsection 1</h1>
					<p>Words.</p>
				</div>
                
                <div class="tab">
					<h1 class="tabHeader" id="subsection2">Subsection 2</h1>
					<p>Words.</p>
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
