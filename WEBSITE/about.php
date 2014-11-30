<?php
require_once ('util/CommonHTML.inc');

ini_set ( 'display_startup_errors', 1 );
ini_set ( 'display_errors', 1 );
error_reporting ( - 1 );

$current_page = 'about';
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
					<li><a href="about.php#vision">Vision</a></li>
					<li><a href="about.php#method">Method</a></li>
					<li><a href="about.php#eras">Eras</a></li>
					<li><a href="about.php#us">Us</a></li>
				</ul>
			</div>


			<div id="center">
				<div class="tab">
					<h1 class="tabHeader" id="vision">The Vision</h1>
					<p id="fix">When discussing music, songs can typically be
						classified into most genres according to things like
						instrumentals, vocals, or other musical elements. However,
						deciding that a song is a protest song does not have to go through
						this same process. Protest music can be folk, rock, rap, or any
						number of different types of music. If that is the case, then how
						do we actually identify what protest music is? Our research
						project focused on identifying distinguishable linguistic features
						of American protest music and its lyrics. We know that in these
						songs, all types of genres can work as protest songs. This
						motivated us to turn towards the lyrics. We wished to answer the
						following question: can an American protest song be identified by
						linguistic elements found in the lyrics?</p>
					<p>We approached this question by analysing three time periods in
						America:</p>
					<ul>
						<li>The Great Depression (1929 - 1939)</li>
						<li>The Vietnam Era (1960 - 1975)</li>
						<li>The Contemporary Era (1975 - Present)</li>
					</ul>
					<p>We compared lyrics to non-protest lyrics from the same time
						periods. We tagged the lyrics syntactically, labelling noun
						phrases, verb phrases, and adverbs, and noted when a phrase is
						negated in certain instances. We looked at the various phrases to
						see if there were distinct differences in syntax between the
						protest songs from one time period versus the non-protest songs
						from that same period. We used statistical analysis to determine
						if these differences were, in fact, significant. With this, we
						hope to show that although protest music may not be identifiable
						by a single musical style, it can still be identified by
						properties found in the lyrics.</p>

					<p>To gain further understanding of what each protest song is
						referring to in our project, please read about the different eras
						in America below:</p>
				</div>

				<div class="tab">
					<h1 class="tabHeader" id="method">The Method</h1>
					<p>At first, a lot of people will try to define protest music in terms of its content: it seems that in a lot of American protest songs, there’s reference to a specific war or current event that upsets the artists at hand. However, using a definition of this sort has two potential errors. First, it can make an argument very circular in nature. Saying that a song has to incorporate war or current events does not leave room for protest music to grow or evolve over time. Any future songs that might still be protest songs, but do not have the appropriate content based off this type of definition, will be improperly disregarded. Another error is that it can allow in too many songs as proper candidates. There is still the option that songs can be created where an artist is upset about a situation at hand but isn’t necessarily protesting anything.</p>

					<p>Our group wanted to turn away from this method of explaining protest music. Therefore, we turned to the syntax of song lyrics, rather than its content. We wanted to see if this could reveal significant differences in how an artist sings when one is protesting versus when one isn’t.</p> 

					<p>To do this, we looked at 10 of the most popular songs from each era that were not considered “protest songs” by outside sources. We also looked at 10 of the most popular songs from each era that have been labeled as “protest” songs by outside sources. We tagged the songs according to a hierarchy that closely resembles rules that one would find in X-Bar Theory, with a few modifications. To start, we did not see reason to tag everything, such as conjunctions. We also decided to not tag every phrase, such as adjectival and adverbial phrases, but instead just tag the adjectives and the adverbs. Linguistic data is extremely tedious and time-consuming, and because of this, we tagged parts we wanted to study within the limited amount of time we had, rather than tag everything. If we had more time to continue with this project, we would continue to mark up each and every phrase and observe more and more components of the lyrics.</p>

					<p>In summary, we decided to study nouns, noun phrases (while also tagging determiners), verbs, verb phrases, adjectives, adverbs, prepositions, and prepositional phrases.</p>

					<p>One issue with this method comes into play when there are noun Phrases that consist of just determiners. Whereas some theories want to make determiners the head of phrases, and thus call them determiner phrases, we decided to go against this theory and keep everything as noun phrases - even the phrases that didn’t have nouns in them. We did this for two reasons. One, we needed equal participation from all team members, and therefore we needed to keep tagging comprehensive for members who did not have a linguistic background. There was a higher chance of error in identifying phrases based off their determiners versus their nouns, since it’s more obvious to identify a noun as a non-linguist. Second, we wanted the project to very comprehensive for users on our site who are also non-linguists. We didn’t want confusion as to what a determiner phrase is or what it meant, but it is more comprehensive to identify a phrase in the lyrics and then see the overarching phrase of which it is a part.</p>

					<p>For each line, we tagged a noun phrase and a verb phrase as the overarching child elements. We then tagged the noun phrases to allow nouns, determiners, adjectives, and adverbs. We tagged verb phrases to allow verb phrases, noun phrases, prepositional phrases, and all of their child elements. This is a result of our modification to X bar theory. Instead of labeling overarching verb phrases as V’, or V-bar, we tagged them as verb phrases on top of verb phrases instead. This still preserves the hierarchy of different verbs in each line, without making it too incomprehensible for non-linguist users and researchers. This same concept applies to our prepositional phrases, labeling each as a phrase rather than incorporating P’, or P-bar, and instead calling them phrases. Prepositional phrases could have prepositional phrases inside them, along with verb phrases, noun phrases, adverbs, adjectives, and all of their child elements.</p>

					<p>Therefore, we also eliminated the use of N’, Adj’, and adv’ based on similar principle. Though we wanted to label the hierarchy of nouns, verbs, phrases, etc. in the lines, we wanted to do it in a way that did not make the data too overwhelmingly complicated.</p>

					<p>We wanted to mark when negation words, such as the word “not” was found within certain phrases. We gave noun phrases and verb phrases the option to be tagged neg=”true,” signaling in the data that a word such as “not” was present.</p>
					
					<p>One final thing to note is that participles were not marked as distinct parts of speech. Instead, the participles were grouped with the verbs with which they were associated and tagged under a single verb element. </p>
				</div>

				<div class="tab">
					<h1 class="tabHeader" id="eras">The Eras</h1>
					<h2>Great Depression</h2>
					<p>The Great Depression occurred from 1929 to 1939. It is noted as
						one of the deepest and longest-lasting economic downturn in the
						history of the Western industrialized world. The Great Depression
						began in the United States after the stock market crash in October
						of 1929. In 1933, during the lowest point in the Great Depression,
						13 to 15 million Americans were unemployed.</p>
					<p>African Americans were the hardest hit group of people during
						The Great Depression. Half of all African Americans were
						unemployed in 1932. In some Northern cities, whites called for
						blacks to be fired from any jobs as long as there were whites out
						of work. Violence towards African Americans became more common
						again during The Great Depression. Lynchings, which had declined
						to 8 in 1932, surged to 28 in 1933.</p>
					<p>During this time, the Great Plains region in America suffered
						from a drought from 1934-1937, which is today known as the Dust
						Bowl. Heavy winds blew the topsoil in places like Oklahoma,
						Kansas, Colorado, New Mexico, and The Texas Panhandle, and created
						dust clouds called black blizzards. Sixty percent of the people
						left the region during this time as a result. This, in part, was
						due to the farmers' desire to constantly expand and have autonomy
						over the land. Artists at the time expressed the need to be in
						harmony with nature, rather than try to dominate and exploit it.</p>
					<p>Finally, the Harlan County War took place from 1931-1932. This
						was a series of coal mining-related skirmishes, executions,
						bombings, and strikes that took place in Harlan County, Kentucky,
						during the 1930s. During The Great Depression, miners were making
						as little as eighty cents per day. The workers went on strike for
						better wages and better working conditions.</p>
					<h2>Vietnam</h2>
					<p>The Vietnam era truly represents a golden age of American
						protest music. Though it is termed in this project as the Vietnam
						era, it really consists of two major events. First is of course,
						the Vietnam War, which lasted for nearly 20 years, from 1955 to
						1975. Second is the Civil Rights Movement. The Civil Rights
						movement has existed in some form throughout much of American
						history, but for this project, we will focus on the events that
						transpired in the 1960s. Thus, in terms of the scope of this
						project, the Vietnam era covers the years from 1960 to 1975. This
						era witnessed the composition of some of the most popular and
						famous protest music in history.</p>
					<p>The turmoil of the era was an incubator for the outburst of
						protest music seen in this era, especially when compared with the
						relatively tranquil 1950s. The dialogue of the protesters in the
						early years of this era was generally mild. Songs like Bob Dylan's
						Blownin' in the Wind projected a profound message of pacifism that
						transcended a mere opposition to the war in Vietnam. As the decade
						progressed, the protesters became more and more tense. Meaningful
						change was either not occurring, or not occurring quickly enough.
						A sense of impatience set in around the country.</p>
					<p>This impatience turned to shock and anger as this era drew into
						its latter years. Popular figures like Martin Luther King Jr. and
						Robert Kennedy were killed by the bullets of assassins. The Civil
						Rights movement had largely descended into violence. The Vietnam
						War had seemingly no end in sight. Protester clashed with police
						in Chicago outside the Democratic National Convention. In addition
						to the thousands of American soldiers killed, the war had
						destroyed a president. The new president, Richard Nixon, promised
						to end the war in Vietnam, although his actions, such as the
						invasion of Cambodia further incited the protesters.</p>
					<p>By the end of the decade, country was at the boiling point. Many
						of the protesters were college students, so many protests took
						place on college campuses. On May 4th, 1970, one of these protests
						took place at Kent State University in Ohio. The Ohio State
						National Guard was summoned onto campus once the protests on
						campus, and eventually fired on the protesters, killing four
						students and wounding nine. The Kent State massacre received a
						plethora of media attention, and photographs of that day were sent
						to newspapers worldwide. This event inspired Neil Young to write
						the song Ohio, which uses an angrier rhetoric than the songs that
						characterized the early era, going as far as accusing Nixon
						himself.</p>
					<p>Protest music characterized the 1960s. Polarizing issues like
						Civil Rights and the Vietnam War made for popular song topics. The
						protest culture of the era centered primarily on the youth. No
						other group of youth in American history has been more politically
						active than the protesters of the 1960s. While their actions have
						been largely discredited in the ensuing years, they gifted upon us
						some of the most influential protest over written.</p>
					<h2>Modern</h2>
					<p>For this project, we defined the Modern Era as any time after
						1975, i.e. the end of the Vietnam War.</p>
					<p>After the loss in Vietnam, veterans from the war were not
						treated with respect when they returned home. Unlike the World War
						II veterans, who were seen as heroes, the Vietnam Veterans were
						baby killers, psychos, drug addicts and war mongers. Veterans were
						extremely mistreated; they were refused service at restaurants,
						and they were cursed at by anti-war Americans. Protesters would
						stand at the gates in airports protesting against the war as
						Vietnam veterans returned home. Bruce Springsteen depicts the
						Vietnam Vet in Born in the USA: He's isolated from the government,
						isolated from his family, to the point where nothing makes sense.</p>

					<p>On November 6th, 1990, the state of Arizona voted down to create
						a holiday for Dr. Martin Luther King, Jr. Two years prior, the
						governor was Evan Mecham, who cancelled Martin Luther King day
						saying, "I guess King did a lot for the colored people, but I
						don't think he deserves a national holiday." In 1991, Public Enemy
						produced By the Time I get to Arizona as a response, and the
						message spread, in part because it was aired on MTV. By 1993,
						Arizona lost its chance to host the Super Bowl. Arizona lost $350
						million in revenue before reinstating MLK day in 1993.</p>

					<p>On February 4th, 1999, Police officers in New York City fired 41
						shots at an unarmed West African immigrant. He had no criminal
						record. The immigrant's name was Amadou Diallo and he was 22 years
						old. Amadou Diallo worked as a street peddler in the city. Bruce
						Springsteen wrote his song American Skin (41 shots) about this
						police shooting. However, in 2013, Springsteen dedicated his song
						to Trayvon Martin. Trayvon Martin was as 17-year old African
						American who was shot by George Zimmerman in 2013 while he was out
						running errands at a convenience store. Both the New York City
						police and George Zimmerman noticed the men in each case late at
						night and declared that they looked suspicious.</p>

					<p>In 2008, musicians were protesting against the war in Iraq,
						which went from 2003 until 2011. The Iraq war was constantly
						justified by Washington as a preventative military action against
						a country that could use weapons of mass destruction (WMDs)
						against the United States. Prior to the attack, no WMDs were found
						in Iraq. Many people opposed this strategy. Former president Bill
						Clinton warned of the consequences of a preventative invasion, as
						such action may lead to unwelcome consequences in the future, at
						one point saying, "I don't care how precise your bombs and your
						weapons are, when you set them off, innocent people will die."
						Many theories went around as to why the United States really
						wanted to invade Iraq. Nelson Mandela, former president of South
						Africa, voiced his opinion of president George W. Bush; he
						believed that, "All [Mr. Bush] wants is Iraqi oil". Many believed
						that the Iraq War was putting Americans through unnecessary
						traumatic experiences in the military - they were risking their
						lives and killing innocent people for perhaps no good reason at
						all. Many compared parts of the Iraq war to the war in Vietnam,
						and many people protested against the war as a result. Between
						January 3rd and April 12th, 2003, 36 million people across the
						globe took part in almost 3,000 protests against war in Iraq, with
						demonstrations on 15 February 2003, being the largest and most
						prolific.</p>

					<p>As a result, protest music during this time expressed this
						viewpoint. In 2012, Tim McIlrath, the lead singer of the band Rise
						Against, sang his song Hero of War outside of the NATO summit in
						Chicago. His song depicted an Iraq War Veteran remembering his
						experiences in the military during this time. His song is meant to
						remind listeners of the perspective of the soldier. The United
						States does not simply send in weapons to shoot targets; Americans
						are getting severely injured and killed while injuring and killing
						other human beings in the name of their country.</p>

					<p>The modern era, like every other era, wanted to change the way
						African Americans were treated. Americans protested against
						multiple issues they had with the United States government. One
						thing to note in this era more so than the others is that
						protesters highlighted not just one event in history, but many -
						pointing out the flaws in our actions across time. This typically
						happens when discussing methods that the United States used in
						order to dominate in wartime.</p>
				</div>

				<div class="tab">
					<h1 class="tabHeader" id="us">Us</h1>
					<p>This research project was completed by David Galloway, Leonidas
						Pashos, and Katie Uihlein. This project was performed at the
						University of Pittsburgh. This project was for a class called
						Computational Methods in the Humanities, taught by Dr. David
						Birnbaum.</p>
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