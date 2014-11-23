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
            	<p>When discussing music, songs can typically be classified into most genres according to things like instrumentals, vocals, or other musical elements. 
                However, deciding that a song is a “protest song” doesn’t go through this same process. Protest music can be folk, rock, rap, or any number of different types of music. If that’s the case, then how do we actually identify what protest music is?
                Our research project focused on identifying distinguishable linguistic features of American protest music and its lyrics. 
                We know that in these songs, all types of genres can work as protest songs. This motivated us to turn towards the lyrics. We wished to answer the following question: 
                can an American protest song be identified by linguistic elements found in the lyrics?</p> 
                <p>We approached this question by analyzing three time periods in America:</p>
            <ul>
            <li>The 1930’s (during the Great Depression)</li>
            <li>The 1950’s and 60’s (during the Vietnam War)</li>
            <li>The contemporary era, which we defined as post-1975</li>
            </ul>
            <p>We compared lyrics to non-protest lyrics from the same time periods. We tagged the lyrics syntactically, labeling noun phrases, verb phrases, and adverbs, 
                and noted when a phrase is negated in certain instances. 
                We looked at the various phrases to see if there were distinct differences in syntax between the protest songs from one time period versus the non-protest songs from that same period. 
                We used statistical analysis to determine if these differences were, in fact, significant. With this, we hope to show that 
                although protest music may not be identifiable by a single musical style, 
                it can still be identified by properties found in the lyrics. </p>

            <p>To gain further understanding of what each protest song is referring to in our project, please read about the different eras in America below:</p> 
            
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
