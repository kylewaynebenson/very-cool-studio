<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package verycoolstudio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-header">
		<h1 class="huge-h1">
			<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
		</h1>
            </div>
            <div class="entry-footer">
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
            </div>
</article><!-- #post-## -->
