<?php
/**
 * Template Name: Studio
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package verycoolstudio
 */

get_header(); ?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			</main><!--  .site-main -->
		</div><!--  #primary -->
	</div><!--  #content -->
</div><!--  #white-box -->
<div class="white-page">
	<img class="kyle-photo" src="<?php bloginfo('template_directory'); ?>/img/best-selfie-available-of-kyle.png"/>
	<img class="kyle-gif" src="<?php bloginfo('template_directory'); ?>/img/kyle-gif.gif"/>
	<div class="bio">
		<h1>Very Cool is the Studio of Kyle Wayne Benson.</h1>
		<p>Kyle began his career in 2008 as a web developer for some e-commerce dudes. Since that time, he has worked for increasingly less shady clients.</p>
		<p>In 2015 Cooper Union gave him a Type Design certificate. Kyle formed Very Cool Studio in 2016, an entire year after buying the domain.</p>
		<p>He has designed several kinds of fonts and kinds of cards—Christmas, playing, you name it. His best tweet has 57 “faves”, which is 5-10 times Kyle’s average number of “faves” per tweet.</p>
	</div>
</div>

<div class="gray-page">
	<h2>Projects</h2>
	<ul class="list-box">
		<li><a href="http://skl.sh/1CuoDpS">Skillshare: Designing a Display Face</a><span class="year">2015</span></li>
		<li><a href="http://www.oremisverycool.com/">Orem is Very Cool</a><span class="year">2016</span></li>
		<li><a href="http://passionately.kyleandclaire.com">The Passionately Project</a><span class="year">2013-2014</span></li>
		<li><a href="http://www.bensonsclass.com/">Mr. Benson's Class</a><span class="year">2012</span></li>
		<!-- Good job checking <li><a href="http://www.cupmunicate.com/">Cupmunicate</a><span class="year">2012</span></li> -->
	</ul>
	<h2>Interviews</h2>
	<ul class="list-box">
		<li><a href="http://www.thebalance.cc/home/2014/21-kyle-claire-benson">The Balance Podcast</a><span class="year">2016</span></li>
		<li><a href="http://oneminutewith.com/kyle-wayne-benson">One Minute With</a><span class="year">2014</span></li>
	</ul>
</div>


<?php
get_footer();
