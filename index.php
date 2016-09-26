<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package verycoolstudio
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<section id="type-section">
		        <?php
		            $args = array( 'post_type' => 'product', 'product_cat' => 'type', 'stock' => 1, 'posts_per_page' => 4, 'orderby' =>'date','order' => 'DESC' );
		            $loop = new WP_Query( $args );
		            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

				<article <?php post_class( $classes ); ?>>
					<header class="entry-header">	
				                    <a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				                        <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="65px" height="115px" />'; ?>
						</a>
					</header>
					<footer class="entry-footer">
						<a href="<?php the_permalink(); ?>">
							<h4 class="entry-title"><?php the_title(); ?></h4>
							<h5><?php echo get_the_excerpt(); ?></h5>
							<h4 class="price h4"><?php echo $product->get_price_html(); ?></h4>
						</a>
						<?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
					</footer>
				</article>
		        <?php endwhile; ?>
		        <?php wp_reset_query(); ?>
		</section><!-- #type-section -->
		<div class="clear"></div>
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
<div class="clear"></div>
<!--<section>
	<div class="big-yellow-arrow">
		<h1 class="h1 huge-h1">Painted Signs &amp; other Miscelaneous Work</h1>
	</div>
</section>-->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #white-box -->

<?php
get_footer();
