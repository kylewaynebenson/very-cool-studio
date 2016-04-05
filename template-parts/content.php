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
		<?php  if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
			the_meta();
			} else {
				echo '<a href="' . get_the_permalink() . '">';
				the_post_thumbnail('large'); 
				echo '</a>';
		}
			?>
	</header><!-- .entry-header -->
	<div class="post-content">
	<?php
			if ( is_single() ) {
				the_content();
			} else {
			}
			 ?>
	</div>
	<footer class="entry-footer">
		<?php
			if ( is_single() ) {
				echo '<div class="cat-links">';
				$sep = '';
				foreach((get_the_category()) as $cat) {
					echo $sep . '<a href="' . get_category_link($cat->term_id) . '"  class="cat-' . $cat->slug . '" title="View all posts in '. esc_attr($cat->name) . '">' . $cat->cat_name . '</a>';
					$sep = ' ';
				}
				echo '</div>';
				the_post_navigation();
			} else {
				the_title( '<h5 class="sub-label">Project</h5><h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
				echo '<div class="cat-links">';
				$sep = '';
				foreach((get_the_category()) as $cat) {
					echo $sep . '<a href="' . get_category_link($cat->term_id) . '"  class="cat-' . $cat->slug . '" title="View all posts in '. esc_attr($cat->name) . '">' . $cat->cat_name . '</a>';
					$sep = ' ';
				}
				echo '</div>';
				the_excerpt();
			}

		if ( 'post' === get_post_type() ) : ?>
		<?php
		endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
