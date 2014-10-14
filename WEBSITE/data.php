<?php 
require_once('util/CommonHTML.inc');

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

$current_page = 'data';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ucfirst($current_page); ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script>
	document.addEventListener('DOMContentLoaded', function () {
		////////////////////////////
		// menu bar interactivity //
		////////////////////////////
		
		// index
		var index = document.getElementById('index');
		var indexPanel = document.getElementById('index_panel');
		index.addEventListener('mouseover',function(){
			indexPanel.style.display = 'block';
			index.style.background = 'rgba(0,0,0,0.6)';
		});
		indexPanel.addEventListener('mouseover',function(){
			indexPanel.style.display = 'block';
			index.style.background = 'rgba(0,0,0,0.6)';
		});
		index.addEventListener('mouseout',function(){
			indexPanel.style.display = 'none';
			index.style.background = 'rgba(0,0,0,0.2)';
		});
		indexPanel.addEventListener('mouseout',function(){
			indexPanel.style.display = 'none';
			index.style.background = 'rgba(0,0,0,0.2)';
		});
		
		// about
		var about = document.getElementById('about');
		var aboutPanel = document.getElementById('about_panel');
		about.addEventListener('mouseover',function(){
			aboutPanel.style.display = 'block';
			about.style.background = 'rgba(0,0,0,0.6)';
		});
		aboutPanel.addEventListener('mouseover',function(){
			aboutPanel.style.display = 'block';
			about.style.background = 'rgba(0,0,0,0.6)';
		});
		about.addEventListener('mouseout',function(){
			aboutPanel.style.display = 'none';
			about.style.background = 'rgba(0,0,0,0.2)';
		});
		aboutPanel.addEventListener('mouseout',function(){
			aboutPanel.style.display = 'none';
			about.style.background = 'rgba(0,0,0,0.2)';
		});
		
		// data (current)
		var data = document.getElementById('data');
		var dataPanel = document.getElementById('data_panel');
		data.addEventListener('mouseover',function(){
			dataPanel.style.display = 'block';
			data.style.background = 'rgba(0,0,0,0.6)';
		});
		dataPanel.addEventListener('mouseover',function(){
			dataPanel.style.display = 'block';
			current.style.background = 'rgba(0,0,0,0.6)';
		});
		data.addEventListener('mouseout',function(){
			dataPanel.style.display = 'none';
			data.style.background = 'rgba(0,0,0,0.8)';
		});
		dataPanel.addEventListener('mouseout',function(){
			dataPanel.style.display = 'none';
			data.style.background = 'rgba(0,0,0,0.8)';
		});
		
		// conclusions
		var conclusions = document.getElementById('conclusions');
		var conclusionsPanel = document.getElementById('conclusions_panel');
		conclusions.addEventListener('mouseover',function(){
			conclusionsPanel.style.display = 'block';
			conclusions.style.background = 'rgba(0,0,0,0.6)';
		});
		conclusionsPanel.addEventListener('mouseover',function(){
			conclusionsPanel.style.display = 'block';
			conclusions.style.background = 'rgba(0,0,0,0.6)';
		});
		conclusions.addEventListener('mouseout',function(){
			conclusionsPanel.style.display = 'none';
			conclusions.style.background = 'rgba(0,0,0,0.2)';
		});
		conclusionsPanel.addEventListener('mouseout',function(){
			conclusionsPanel.style.display = 'none';
			conclusions.style.background = 'rgba(0,0,0,0.2)';
		});
    });
</script>
</head>

<body>
    <div class="wrapper">
        <?php echo CommonHTML::get_navigation_menu($current_page); ?>
        <h1><?php echo ucfirst($current_page); ?></h1>
        <div class="content">
            <div id="left">
            	<p>This is the left content space</p>
                <p>We can put stuff here</p>
                <p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>The spaces automatically resize based on the longest one</p>
            </div>
            <div id="right">
            	<p>This is the right content space</p>
                <p>We can put stuff here</p>
            </div>
            <div id="center">
            	<p>This is the main content space</p>
                <p>We can put stuff here</p>
            </div>
            <script src="js/column_length.js"></script>
        </div>
        
    </div>
    <div class="footer">
        <?php echo CommonHTML::get_creative_commons_license(); ?>
    </div>
</body>
</html>
