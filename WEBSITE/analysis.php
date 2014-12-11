<?php 
require_once('util/CommonHTML.inc');

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

$current_page = 'analysis';

?>

<!DOCTYPE html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ucfirst($current_page); ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/analysis.css" rel="stylesheet" type="text/css" />
<script src="js/main.js" type="text/javascript">/**/</script>
<script src="js/about.js" type="text/javascript">/**/</script>
</head>
<body>
    <div class="wrapper">
        <?php echo CommonHTML::get_navigation_menu($current_page); ?>
        <h1><?php echo ucfirst($current_page); ?></h1>
        <div class="content">
            <div id="left">
				<ul class="absolute">
					<li><a href="analysis.php#subsection1">Subsection 1</a></li>
					<li><a href="analysis.php#subsection2">Subsection 2</a></li>
				</ul>
			</div>
            
            <div id="center">
            	<div class="tab">
					<h1 class="tabHeader" id="subsection1">Subsection 1</h1>
					<p class="fix">
                    PLACEHOLDER          
                    </p>
				</div>
                
                <div class="tab">
					<h1 class="tabHeader" id="subsection2">Subsection 2</h1>
                    <object id="svgLeft" data="images/protest.svg" type="image/svg+xml"></object>
                    <object id="svgRight" data="images/non-protest.svg" type="image/svg+xml"></object>
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
