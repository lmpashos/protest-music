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
					<p class="fix">
                        <table>
                        <tr><th>Coefficients:</th></tr>
                        <tr><th></th><th>Estimate</th> <th>Std. Error</th> <th>t value</th> <th>Pr(>|t|)</th></tr> 
                        <tr><td>(Intercept)</td>  <td>0.4491487</td>  <td>0.1367016</td>   <td>3.286</td>  <td>0.00181</td> <td>**</td></tr>
                        <tr><td>verbPhrases</td> <td>-0.0056992</td>  <td>0.0086451</td>  <td>-0.659</td>  <td>0.51260</td></tr>  
                        <tr><td>withAdverb</td>  <td>-0.0084959</td>  <td>0.0142434</td>  <td>-0.596</td>  <td>0.55339</td></tr>
                        <tr><td>negatedVerb</td>  <td>0.0269887</td>  <td>0.0253750</td>   <td>1.064</td>  <td>0.29233</td></tr>  
                        <tr><td>nounPhrases</td>  <td>0.0007283</td>  <td>0.0046875</td>   <td>0.155</td>  <td>0.87711</td></tr>  
                        <tr><td>withAdj</td>      <td>0.0263241</td>  <td>0.0135641</td>   <td>1.941</td>  <td>0.05762</td> <td>.</td></tr>
                        <tr><td>negatedNoun</td>  <td>0.0143886</td>  <td>0.0435283</td>   <td>0.331</td>  <td>0.74228</td></tr>  
                        <tr><td>---</td></tr>
                        <tr><td>Signif. codes:</td>  <td>0 ‘***’</td> <td>0.001 ‘**’</td> <td>0.01 ‘*’</td> <td>0.05 ‘.’</td> <td>0.1 ‘ ’ 1</td></tr>
                        </table>             
                    </p>
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
