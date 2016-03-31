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
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );


				endwhile; // End of the loop.
				?>
			</main><!--  .site-main -->
		</div><!--  #primary -->
	</div><!--  #content -->
</div><!--  #white-box -->

<div class="gray-page">
	<h2>Projects</h2>
	<ul class="list-box">
		<li><a href="http://www.oremisverycool.com/">Orem is Very Cool</a><span class="year">2016</span></li>
		<li><a href="http://www.verycoolstudio.com/passion/">The Passionately Project</a><span class="year">2013-2014</span></li>
		<li><a href="http://www.cupmunicate.com/">Cupmunicate</a><span class="year">2012</span></li>
		<li><a href="http://www.bensonsclass.com/">Mr. Benson's Class</a><span class="year">2012</span></li>
	</ul>
	<h2>Interviews</h2>
	<ul class="list-box">
		<li><a href="http://www.thebalance.cc/home/2014/21-kyle-claire-benson">The Balance Podcast</a><span class="year">2016</span></li>
		<li><a href="http://oneminutewith.com/kyle-wayne-benson">One Minute With</a><span class="year">2014</span></li>
	</ul>
</div>


<?php
get_footer();
