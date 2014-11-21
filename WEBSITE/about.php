<?php 
require_once('util/CommonHTML.inc');

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

$current_page = 'about';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo ucfirst($current_page); ?></title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="js/main.js"></script>
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
            	<p>However, protest music is a category that doesn’t seem to be identified by this same process. 
            	   Protest music can be folk, rock, rap, or any number of different “genres” of music. 
            	   How do we actually identify what protest music is?</p>
            	<p>Our research project focused on identify distinguishable linguistic features of protest music 
            	   and its lyrics. We wished to answer the following question: is there a way to identify protest 
            	   music by way of its lyrics?</p>
            	<p>We approached this question by analyzing three time periods in America: 
            	   <ul>
            	       <li>The 1930’s (during the Great Depression),</li>
            	       <li>The 1950’s and 60’s (during the Vietnam War),</li>
            	       <li>and the contemporary era, which we defined as post-1975.</li>
            	   </ul>
            	   We compared lyrics to non-protest lyrics from the same time periods. We tagged the lyrics syntactically, 
            	   labeling noun phrases, verb phrases, and adverbs, also noting when a phrase is negated in certain instances. 
            	   We looked at the various phrases to see if there were distinctions between protest songs from one time period
            	   versus the non-protest songs from that same period. We used statistical analysis to determine if these 
            	   distinctions were, in fact, significant. With this, we hope to show that protest music may not be identifiable 
            	   simply by a type of musical style, but it still can be if one considers the linguistic elements found in its lyrics.
            	</p>
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
