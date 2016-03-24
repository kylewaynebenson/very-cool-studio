<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package verycoolstudio
 */

?>
<?php $post_image_id = get_post_thumbnail_id($post_to_use->ID);
		if ($post_image_id) {
			$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
			if ($thumbnail) (string)$thumbnail = $thumbnail[0];
		} ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_post_thumbnail(); ?>
	</header><!-- .entry-header -->
	<footer class="entry-footer">
		<?php
			if ( is_single() ) {
				the_title( '<h4 class="entry-title">', '</h4>' );
			} else {
				the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<?php
		endif; ?>
		<?php verycool_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
