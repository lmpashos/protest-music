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
    <script src="js/index.js"></script>
    <script src="js/songs.js"></script>
</head>
<body>
    <div class="wrapper">
        <?php echo CommonHTML::get_navigation_menu($current_page); ?>
        <h1><?php echo ucfirst($current_page); ?></h1>
        <div class="content">
            <div id="left">
            	<h5 class="listTitle">List of Protest Songs</h5>
                <h6 class="listSubTitle">Great Depression</h6>
                <ul>
                	<li>Placeholder</li>
                </ul>
                <h6 class="listSubTitle">Vietnam</h6>
                <ul>
                	<li id="blowinInTheWind">Blowin' in the Wind</li>
                    <li id="fortunateSon">Fortunate Son</li>
                    <li id="hammer">If I Had a Hammer</li>
                    <li id="ohio">Ohio</li>
                    <li id="weShallOvercome">We Shall Overcome</li>
                </ul>
				<h6 class="listSubTitle">Modern</h6>
                <ul>
                	<li>Placeholder</li>
                </ul>
            </div>
            <div id="right">
            	<h5 class="listTitle">List of Normal Songs</h5>
                <h6 class="listSubTitle">Great Depression</h6>
                <ul>
                	<li>Placeholder</li>
                </ul>
                <h6 class="listSubTitle">Vietnam</h6>
                <ul>
                	<li id="yourHand">I Want to Hold Your Hand</li>
                    <li id="loco">The Loco-Motion</li>
                    <li id="silence">The Sound of Silence</li>
                    <li id="theTwist">The Twist</li>
                    <li id="theBend">Up Around the Bend</li>
                </ul>
                <h6 class="listSubTitle">Modern</h6>
                <ul>
                	<li>Placeholder</li>
                </ul>
            </div>
            <div id="center">
            	<div id="protest">
                	<div class="song" id="weShallOvercomeSong">
						<h2>We Shall Overcome</h2>
                        <h3>Zilphia HortonGuy CarawnFrank HamiltonPete Seeger</h3>
                        <h3>single</h3>
                        <h3>1948</h3>
                        <h3>folk</h3>
                        <h3>Joan Baez, Pete Seeger, Robert Kennedy, Bruce Springsteen</h3>
                        <hr />
                        <br />
                        <h2>Lyrics</h2>
                        <p>We shall overcome, we shall overcome,<br /></p>
                        <p>The Lord will see us through, The Lord will see us through,<br />The Lord will see us through someday;<br /></p>
                        <p>We're on to victory, we're on to victory,<br />We're on to victory someday;<br />We're on to victory someday.<br /></p>
                        <p>We'll walk hand in hand, we'll walk hand in hand,<br />We'll walk hand in hand someday;<br />We'll walk hand in hand someday.<br /></p>
                        <p>We are not afraid, we are not afraid,<br />We are not afraid today;<br />We are not afraid today.<br /></p>
                        <p>The truth shall make us free, the truth shall make us free,<br />The truth shall make us free someday;<br />The truth shall make us free someday.<br /></p>
                        <p>We shall live in peace, we shall live in peace,<br />We shall live in peace someday;<br />We shall live in peace someday.<br /></p>
                    </div>
                    <div class="song" id="hammerSong">
                    	<h2>If I Had A Hammer</h2>
                        <h3>Pete Seeger</h3>
                        <h3>single</h3>
                        <h3>1949</h3>
                        <h3>folk</h3>
                        <h3>Pete Seeger, Peter Paul and Mary</h3>
                        <hr />
                        <br />
                        <h2>Lyrics</h2>
                        <p>If I had a hammer,<br />I'd hammer in the morning<br />I'd hammer in the evening,<br /></p>
                        <p>I'd hammer out danger,<br />I'd hammer out a warning,<br />I'd hammer out love between my brothers and my sisters,<br /></p>
                        <p>If I had a bell,<br />I'd ring it in the morning,<br />I'd ring it in the evening,<br /></p>
                        <p>I'd ring out danger,<br />I'd ring out a warning,<br />I'd ring out love between my brothers and my sisters,<br /></p>
                        <p>If I had a song,<br />I'd sing it in the morning,<br />I'd sing it in the evening,<br /></p>
                        <p>I'd sing out danger,<br />I'd sing out a warning,<br />I'd sing out love between my brothers and my sisters,<br /></p>
                        <p>Well I got a hammer,<br />And I got a bell,<br />And I got a song to sing,<br /></p>
                        <p>It's the hammer of Justice,<br />It's the bell of Freedom,<br />It's the song about love between my brothers and my sisters,<br />All over this land.<br /></p>
                        <p>It's the hammer of Justice,<br />It's the bell of Freedom,<br />It's the song about love between my brothers and my sisters,<br />All over this land.<br /></p>
                    </div>
                    <div class="song" id="blowinInTheWindSong">
                    	<h2>Blowin' in the Wind</h2>
                        <h3>Bob Dylan </h3>
                        <h3>The Freewheelin' Bob Dylan</h3>
                        <h3>1963</h3>
                        <h3>folk</h3>
                        <h3>Bob Dylan, Peter Paul and Mary</h3>
                        <hr />
                        <br />
                        <h2>Lyrics</h2>
                        <p>How many roads
                           must
                           a
                           man
                           walk
                           down<br />Before
                           you
                           call
                           him
                           a
                           man?<br />Yes, ’n’ how many
                           seas
                           must
                           a
                           white
                           dove
                           sail<br />Before
                           she
                           sleeps
                           in
                           the
                           sand?<br />Yes, ’n’ how many
                           times
                           must
                           the
                           cannonballs
                           fly<br />Before they’re forever banned?<br />The
                           answer, my
                           friend, is
                           blowin’
                           in
                           the
                           wind<br />The
                           answer
                           is
                           blowin’
                           in
                           the
                           wind<br /></p>
                        <p>How many
                           years
                           can
                           a
                           mountain
                           exist<br />Before
                           it’s
                           washed
                           to
                           the
                           sea?<br />Yes, ’n’ how many
                           years
                           can
                           some
                           people
                           exist<br />Before
                           they’re
                           allowed
                           to be free?<br />Yes, ’n’ how many
                           times
                           can
                           a
                           man
                           turn his
                           head<br />Pretending
                           he
                           just
                           doesn’t
                           see?<br />The
                           answer, my
                           friend, is
                           blowin’
                           in
                           the
                           wind<br />The
                           answer
                           is
                           blowin’
                           in
                           the
                           wind<br /></p>
                        <p>How many
                           times
                           must
                           a
                           man
                           look
                           up<br />Before
                           he
                           can
                           see
                           the
                           sky?<br />Yes, ’n’ how many
                           ears
                           must
                           one
                           man
                           have<br />Before
                           he
                           can
                           hear
                           people
                           cry?<br />Yes, ’n’ how many
                           deaths will it take till he knows<br />That too
                           many
                           people
                           have
                           died?<br />The
                           answer, my
                           friend, is
                           blowin’
                           in
                           the
                           wind<br />The
                           answer
                           is
                           blowin’
                           in
                           the
                           wind<br /></p>
                    </div>
                    <div class="song" id="fortunateSonSong">
                    	<h2>Fortunate Son</h2>
      					<h3>John Fogerty</h3>
      					<h3>Willy and the Poor Boys</h3>
      					<h3>1969</h3>
      					<h3>blues rock</h3>
      					<h3>Creedence Clearwater Rivival</h3>
      					<hr />
                        <br />
                        <h2>Lyrics</h2>
      					<p>Some folks are born made to wave the flag<br />Ooh, they're red, white and blue<br />And when the band plays "Hail to the Chief"<br />Oh, they point the cannon at you, Lord<br /></p>
                    	<p>I ain't no Senator's son<br /></p>
                      	<p>Some folks are born silver spoon in hand<br />Lord, don't they help themselves, oh<br />But when the tax men come to the door<br />Lord, the house look a like a rummage sale, yes<br /></p>
                      	<p>I ain't no millionaire's son, no, no<br /></p>
                      	<p>Yeah, some folks inherit star-spangled eyes<br />Ooh, they send you down to war, Lord<br />And when you ask them, "How much should we give?"<br />Oh, they only answer, more, more, more, oh<br /></p>
                      	<p>I ain't no military son<br /></p>
                      	<p>I ain't no fortunate one, no, no, no<br />I ain't no fortunate son, no, no</p>
                     </div>
                     
                     <div class="song" id="ohioSong">
                     	<h2>Ohio</h2>
      					<h3>Neil Young</h3>
      					<h3>single</h3>
      					<h3>1970</h3>
      					<h3>rock</h3>
      					<h3>Neil Young</h3>
      					<hr />
                        <br />
                        <h2>Lyrics</h2>
       					<p>Tin soldiers and Nixon coming,<br />We're finally on our own.<br />This summer I hear the drumming,<br />Four dead in Ohio.<br /></p>
                        <p>Gotta get down to it<br />Soldiers are cutting us down<br />Should have been done long ago.<br />What if you knew her<br />And found her dead on the ground<br />How can you run when you know?<br /></p>
                        <p>Gotta get down to it<br />Soldiers are cutting us down<br />Should have been done long ago.<br />What if you knew her<br />And found her dead on the ground<br />How can you run when you know?<br /></p>
                     </div>
                </div>
                <div id="normal">
                    <div class="song" id="yourHandSong">
                    	<h2>I Want to Hold Your Hand</h2>
                        <h3>John LennonPaul McCartney</h3>
                        <h3>single</h3>
                        <h3>1963</h3>
                        <h3>rock</h3>
                        <h3>The Beatles</h3>
                        <hr />
                        <br />
                        <h2>Lyrics</h2>
                        <p>Oh yeah, I'll tell you something<br />When I'll say that something<br /></p>
                        <p>Oh please, say to me<br />You'll let me be your man<br />And please, say to me<br />You'll let me hold your dand<br />I'll let me hold your hand<br /></p>
                        <p>And when I touch you I feel happy inside<br />It's such a feeling that my love<br />I can't hide<br />I can't hide<br />I can't hide<br /></p>
                        <p>Yeah, you've got that something<br />When I'll say that something<br /></p>
                        <p>And when I touch you I feel happy inside<br />It's such a feeling that my love<br />I can't hide<br />I can't hide<br />I can't hide<br /></p>
                        <p>Yeah, you've got that something<br />When I'll feel that something<br /></p>
                    </div>
                    <div class="song" id="locoSong">
                    	<h2>The Loco-Motion</h2>
                        <h3>Gerry GoffinCarole King </h3>
                        <h3>single</h3>
                        <h3>1962</h3>
                        <h3>Pop</h3>
                        <h3>Little Eva</h3>
                        <hr />
                        <br />
                        <h2>Lyrics</h2>
                        <p>Everybody is doin' a brand new dance, now<br />I know you'll get to like it if you give it a chance now<br /></p>
                        <p>My little baby sister can do it with me<br />It's easier than learning your ABC's<br /></p>
                        <p>You gotta swing your hips, now<br />Come on, baby<br />Jump up, jump back<br />Well, now, I think you've got the knack<br /></p>
                        <p>Now that you can do it, let's make a chain, now<br />A chug-a chug-a motion like a railroad train, now<br /></p>
                        <p>Do it nice and easy, now, don't lose control<br />A little bit of rhythm and a lot of soul<br /></p>
                        <p>Move around the floor in a Loco-motion<br />Do it holding hands if you get the notion<br /></p>
                        <p>There's never been a dance that's so easy to do<br />It even makes you happy when you're feeling blue<br /></p>
                    </div>
                    <div class="song" id="silenceSong">
                        <h2>The Sound of Silence</h2>
                        <h3>Paul Simon</h3>
                        <h3>Sounds of Silence</h3>
                        <h3>1965</h3>
                        <h3>Folk Rock</h3>
                        <h3>Simon &amp; Garfunkel</h3>
                        <hr />
                        <br />
                        <h2>Lyrics</h2>
                        <p>Hello darkness, my old friend,<br />I've come to talk with you again,<br />Because a vision softly creeping,<br />Left its seeds while I was sleeping,<br />And the vision that was planted in my brain<br />Still remains<br />Within the sound of silence.<br /></p>
                        <p>In restless dreams I walked alone<br />Narrow streets of cobblestone,<br />'Neath the halo of a street lamp,<br />I turned my collar to the cold and damp<br />When my eyes were stabbed by the flash of a neon light<br />That split the night<br />And touched the sound of silence.<br /></p>
                      <p>And in the naked light I saw<br />Ten thousand people, maybe more.<br />People talking without speaking,<br />People hearing without listening,<br />People writing songs that voices never share<br />And no one dared<br />Disturb the sound of silence.<br /></p>
                        <p>Fools, said I, You do not know<br />Silence like a cancer grows.<br />Hear my words that I might teach you.<br />Take my arms that I might reach you.<br />But my words like silent raindrops fell<br />And echoed in the wells of silence<br /></p>
                        <p>And the people bowed and prayed<br />To the neon god they made.<br />And the sign flashed out its warning<br />In the words that it was forming.<br />And the sign said, The words of the prophets are written on the subway
                         walls and tenement halls<br />And whispered in the sound of silence.<br /></p>
                    </div>
                    <div class="song" id="theTwistSong">
                        <h2>The Twist</h2>
                        <h3>Hank Ballard</h3>
                        <h3>single</h3>
                        <h3>1959</h3>
                        <h3>rock</h3>
                        <h3>Chubby Checker</h3>
                        <hr />
                       	<br />
                        <h2>Lyrics</h2>
                        <p>Come on, baby, let's do the twist<br />Come on, baby, let's do the twist<br />Take me by my little hand and go like this<br /></p>
                        <p>Yeah, twist, baby, baby Twist<br />ooh yeah, just like this		<br />				Come on, little miss, and do the twist<br /></p>
                        <p>My daddy is sleepin' and mama ain't around<br />Yeah, daddy's just sleepin' and mama ain't around<br />We're gonna twisty, twisty, twisty<br />Till we tear the house down<br /></p>
                        <p>Come on and twist, yeah, baby Twist<br />ooh yeah, just like this<br />Come on, little miss, and do the twist<br /></p>
                        <p>Yeah, you should see my little sis<br />You should see my, my little sis<br />She really knows how to rock<br />She knows how to twist<br /></p>
                        <p>Come on and twist, yeah, baby Twist<br />ooh yeah, just like this<br />Come on, little miss, and do the twist<br /></p>
                        <p>Yeah, rock on now<br />Yeah, twist on now, twist</p>   
                     </div>
                     <div class="song" id="theBendSong">
                     	  <h2>Up Around the Bend</h2>
                          <h3>John Fogerty</h3>
                          <h3>Cosmo Factory</h3>
                          <h3>1970</h3>
                          <h3>Rock</h3>
                          <h3>Creedence Clearwater Revival</h3>
                          <hr />
                          <br />
                          <h2>Lyrics</h2>
                          <p>There's a place up ahead and I'm goin'<br />Just as fast as my feet can fly<br />Come away, come away if you're goin'<br />Leave the sinkin' ship behind<br /></p>
                          <p>Come on the risin' wind<br />We're goin' up around the bend<br /></p>
                          <p>Bring a song and a smile for the banjo<br />Better get while the gettin's good<br />Hitch a ride to the end of the highway<br />Where the neons turn to wood<br /></p>
                          <p>Come on the risin' wind<br />We're goin' up around the bend<br /></p>
                          <p>You can ponder perpetual motion<br />Fix your mind on a crystal day<br />Always time for good conversation<br />There's an ear for what you say<br /></p>
                          <p>Come on the risin' wind<br />We're goin' up around the bend<br /></p>
                          <p>Catch a ride to the end of the highway<br />And we'll meet by the big red tree<br />There's a place up ahead and I'm goin'<br />Come along, come adverb with me<br /></p>
                          <p>Come on the risin' wind<br />We're goin' up around the bend<br /></p>
                     </div>
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
