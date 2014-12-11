<?php
require_once ('util/CommonHTML.inc');

ini_set ( 'display_startup_errors', 1 );
ini_set ( 'display_errors', 1 );
error_reporting ( - 1 );

$current_page = 'analysis';

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ucfirst($current_page); ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/about.css" rel="stylesheet" type="text/css" />
<script src="js/main.js" type="text/javascript">/**/</script>
<script src="js/about.js" type="text/javascript">/**/</script>
<script src="js/scroll.js" type="text/javascript">/**/</script>
</head>
<body>
	<div class="wrapper">
        <?php echo CommonHTML::get_navigation_menu($current_page); ?>
        <h1><?php echo ucfirst($current_page); ?></h1>
		<div class="content">
			<div id="left">
				<ul class="absolute">
					<li><a href="analysis.php#top">Top</a></li>
					<li><a href="analysis.php#graph_analysis">Graph Analysis</a></li>
					<li><a href="analysis.php#graphs">Graphs</a></li>
					<li><a href="analysis.php#probit_analysis">Probit Analysis</a></li>
					<li><a href="analysis.php#conclusions">Conclusions</a></li>
				</ul>
			</div>

			<div id="center">
				<div class="tab">
					<h1 class="tabHeader" id="graph_analysis">Graph Analysis</h1>
					<p class="fix">We started our project with invtuitive notions on
						what syntactical differences may arise between protest and
						non-protest songs. We had a perception that protest music tends to
						be darker in nature, since the songs typically depict ill feelings
						towards something going on in the world. We thought two major
						phenomena would appear as a result of this: One, we thought the
						dark nature of protest music would be represented in the lyrics by
						frequent usage of negation, as the artist depicts all that is
						wrong and lacking in the current state. Two, we thought protest
						songs would use very dramatic methods to depict these unsettling
						situations that the artists are in. We believed that this would be
						reflected in frequent uses of adjectives to describe the nouns and
						adverbs to describe the verbs.</p>
					<p>Thus, we wanted to compare the frequency of adjectives in noun
						phrases and the frequency of adverbs in verb phrases between
						protest lyrics and non-protest lyrics. We used XQuery to pull this
						data our from our XML files, providing us percentages of verb
						phrases that include an adverb, noun phrases that include an
						adjective, verb phrases that are negated, and noun phrases that
						are negated. We used XSLT to create an SVG that provides a visual
						representation of the percentages that were pulled in XQuery.</p>
					<p>We created an SVG that reported the total percentages of all the
						phrases that exhibited these characteristics in the protest songs,
						and we created another SVG that reported the total percentages of
						all the phrases that exhibited these characteristics in the
						non-protest songs.</p>
					<p>After this, we wanted to create 60 SVGs, one for each song, that
						reported the percentages of phrases with these traits in that song
						alone. Because of the large number of desired SVGs, we created a
						Java program that could automatically parce the XQuery output and,
						by using XSLT, create the 60 SVGs. This made the process
						exponentially more efficient.
					
					
					<p>In order to see the individual SVGs for each song, click on the
						data page. This page provides a way for users to compare the
						percentages found in a specific protest song and compare them to
						percentages found in a specific non-protest song.</p>


				</div>

				<div class="tab">
					<h1 class="tabHeader" id="graphs">Graphs</h1>
					<object id="svgLeft" data="images/protest.svg" type="image/svg+xml"></object>
					<object id="svgRight" data="images/non-protest.svg"
						type="image/svg+xml"></object>
				</div>

				<div class="tab">
					<h1 class="tabHeader" id="probit_analysis">Probit Analysis</h1>
					<p class="fix">PLACEHOLDER</p>
					<p>David, put words here></p>
				</div>

				<div class="tab">
					<h1 class="tabHeader" id="conclusions">Conclusions</h1>
					<p class="fix">Unfortunately, our results returned no significant
						difference in syntax between American protest songs and
						non-protest songs.</p>
					<p>However, there are a few different reasons as to why this
						happened. To start, our analyses were conducted on a very small
						sample size. If we had more time to expand on this project, we
						would need to take the time to tag a lot more songs.</p>
					<p>Another possible reason why our results showed no difference is
						that we might have focused on the wrong parts of speech and their
						relationships in our study. As noted in our methodology, we did
						not incorporate all components of syntax in our tagging, so we can
						focus on the ones we were interested in. There is a chance that
						once we tag all possible phrases and compared different types of
						relationships, distinctions would appear.</p>
					<p>Finally, there is a possibility that there was human error in
						tagging that involved ambiguity. For instance, we had a feeling
						that protest songs, where the lyrics tend to be very negative in
						response to something the artist doesn't like, would incorporate
						more instances of negation words in their phrases. This may or may
						not have been the case. However, we restricted our tagging to
						specific words such as "not" or "aint." If we were to go back into
						our data and incorporate morphology into the mix, instead of just
						focusing on the syntax, we could mark up words that were negated
						but by the use of prefixes or suffixes. One example is the word
						"impossible," which is defined as "not possible." The word is
						"possible," but with the prefix "im-" attached to it. If these
						types of words were included in our data analyses, it might turn
						out that these lyrics do tend to discuss how things are "not"
						within the context of their music, rather than what they are, or
						what they wish they were. This could even expand more into words
						that, within their definition, are words that mean "not (something
						else)."</p>
				</div>

			</div>
		</div>
	</div>
	<div class="footer">
        <?php echo CommonHTML::get_creative_commons_license(); ?>       
    </div>
	<form>
		<input type="hidden" value="<?php echo $current_page; ?>"
			id="current_page_name" />
	</form>
</body>
</html>
