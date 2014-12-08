<?php 
require_once('util/Constants.inc');
require_once('util/CommonHTML.inc');
require_once('util/SongTOC.inc');

ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

$current_page = 'lyrics';

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
    <link href="css/lyrics.css" rel="stylesheet" type="text/css" />
    <script src="js/main.js" type="text/javascript"></script>
    <script src="js/lyrics.js" type="text/javascript"></script> 
</head>
<body>
    <div class="wrapper">
        <?php echo CommonHTML::get_navigation_menu($current_page); ?>
        <h1><?php echo ucfirst($current_page); ?></h1>
        <div class="content">
            <div id="left">
            	<?php echo SongTOC::get_song_list($era, true, true); ?>
            </div>
            <div id="right">
            	<?php echo SongTOC::get_song_list($era, false, true); ?>
            </div>
            <div id="center">
                <p id="placeholder">Click on a song in either side column to view lyrics.</p>
            	<div id="protest">
                	
                </div>
                <div id="non_protest">
                    
                </div>
            </div>
        </div>
        <div id="left_checkbox_panel">
            <form>
                <input type="checkbox" name="protest_class" value="nounPhrase" />Noun Phrases<br />
            	<input type="checkbox" name="protest_class" value="verbPhrase" />Verb Phrases<br />
            	<input type="checkbox" name="protest_class" value="prepPhrase" />Prepositional Phrases<br />
            	<input type="checkbox" name="protest_class" value="verb" />Verbs<br />
            	<input type="checkbox" name="protest_class" value="noun" />Nouns<br />
            	<input type="checkbox" name="protest_class" value="adjective" />Adjectives<br />
            	<input type="checkbox" name="protest_class" value="adverb" />Adverbs<br />
            	<input type="checkbox" name="protest_class" value="prep" />Prepositions<br />
            	<input type="checkbox" name="protest_class" value="det" />Determiners<br />
            	<div style="text-align: center"><input type="button" id="protest_clear" name="protest_clear" value="Clear" />
            	    <input type="button" id="protest_done" name="protest_done" value="Done" /></div>
            </form>
        </div>
        <div id="right_checkbox_panel">
            <form>
                <input type="checkbox" name="non_protest_class" value="nounPhrase" />Noun Phrases<br />
            	<input type="checkbox" name="non_protest_class" value="verbPhrase" />Verb Phrases<br />
            	<input type="checkbox" name="non_protest_class" value="prepPhrase" />Prepositional Phrases<br />
            	<input type="checkbox" name="non_protest_class" value="verb" />Verbs<br />
            	<input type="checkbox" name="non_protest_class" value="noun" />Nouns<br />
            	<input type="checkbox" name="non_protest_class" value="adjective" />Adjectives<br />
            	<input type="checkbox" name="non_protest_class" value="adverb" />Adverbs<br />
            	<input type="checkbox" name="non_protest_class" value="prep" />Prepositions<br />
            	<input type="checkbox" name="non_protest_class" value="det" />Determiners<br />
            	<div style="text-align: center"><input type="button" id="non_protest_clear" name="non_protest_clear" value="Clear" />
            	    <input type="button" id="non_protest_done" name="non_protest_done" value="Done" /></div>
            </form>
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
