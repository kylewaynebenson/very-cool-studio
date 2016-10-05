<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package verycoolstudio
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : 

			the_post();
			get_template_part( 'template-parts/content', get_post_format() );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	</div><!-- content -->
</div><!-- #white-box -->
<div class="return-to-top white-page">
	<a class="button chamfered-button chamfered-button-gray" href="#page" onclick="scrollToTop();return false">Return to Top</a>
	<?php the_post_navigation(); ?>
	<script>
	var timeOut;
		function scrollToTop() {
			if (document.body.scrollTop!=0 || document.documentElement.scrollTop!=0){
				window.scrollBy(0,-100);
				timeOut=setTimeout('scrollToTop()',10);
			}
			else clearTimeout(timeOut);
		}
	</script>
</div>

<?php
get_footer();
