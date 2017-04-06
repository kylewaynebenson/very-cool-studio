<?php
/**
* Template Name: Articles Archive
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package verycoolstudio
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		    $loop = new WP_Query( array( 'post_type' => 'Articles', 'ignore_sticky_posts' => 1, 'paged' => $paged ) );
		    if ( $loop->have_posts() ) :
		        while ( $loop->have_posts() ) : $loop->the_post(); ?>
		            <article class="post type-post category-article">
		                <?php if ( has_post_thumbnail() ) { ?>
<!-- 		                    <div class="pimage">
		                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		                    </div> -->
		                <?php } ?>
		                <div class="entry-header">
					<h1 class="huge-h1">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
					</h1>
		                </div>
		                <div class="entry-footer">
		                	<h5><?php echo the_date(); ?></h5>
		                	<?php
		                	// this tag thing is not working currently
					if ($posttags) {
					  foreach($posttags as $tag) {
						echo $sep . '<a href="' . get_tag_link($tag->term_id) . '"  class="cat-' . $tag->slug . '" title="View all posts related to'. esc_attr($tag->name) . '">' . $tag->name . '</a>';
						$sep = ' ';
					  }
					}
					?>
		                </div>
		            </article>
		        <?php endwhile;?>
		        <?php if (  $loop->max_num_pages > 1 ) : ?>
		            <div id="nav-below" class="navigation">
		                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Previous', 'domain' ) ); ?></div>
		                <div class="nav-next"><?php previous_posts_link( __( 'Next <span class="meta-nav">&rarr;</span>', 'domain' ) ); ?></div>
		            </div>
		        <?php endif;
		    endif;
		    wp_reset_postdata();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #white-box -->

<?php
get_footer();
