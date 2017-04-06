<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package verycoolstudio
 */

?>

<section class="no-results not-found">
		<header class="page-header">
			<h5 class="text-center page-title"><?php esc_html_e( 'Nothing Found', 'verycool' ); ?></h1>
		</header><!-- .page-header -->
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'verycool' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'verycool' ); ?></p>
				<?php
					get_search_form();

			else : ?>

				<section class="error-404 not-found">
					<header class="page-header text-center">
						<h1 class="page-title">Well, this is not very cool.</h1>
						<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/very-cool-studio/img/four-oh-four.svg">
						<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'verycool' ); ?></p>
						<p><?php get_search_form(); ?></p>
					</header><!-- .page-header -->
				</section><!-- .error-404 -->

			<?php endif; ?>
</section><!-- .no-results -->
	</div><!-- content -->
</div><!-- white-page -->
