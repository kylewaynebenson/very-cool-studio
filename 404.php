<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package verycoolstudio
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title text-center">Well, this is not very cool.</h1>
					<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/very-cool-studio/img/four-oh-four.svg">
					<p class="text-center">If you think a page should be here, <a href="mailto:hello@verycoolstudio.com">email me</a>.</p>
				</header><!-- .page-header -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #white-box -->
<?php
get_footer();
