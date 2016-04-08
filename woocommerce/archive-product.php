<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		// do_action( 'woocommerce_before_main_content' );
	?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<!-- <h1 class="page-title"><?php woocommerce_page_title(); ?></h1> -->

		<?php endif; ?>

		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			// do_action( 'woocommerce_archive_description' );
		?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				// do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<div id="custom-type" class="yellow-page">
	<div class="very-cool-flag">
		<img src="<?php bloginfo('template_directory'); ?>/img/very-cool-flag.svg"/>
	</div>
	<h2 class="h2" id="custom">Very Cool Custom Type</h2>
	<p class="intro-text">Typefaces are a big part (like 55%) of having a unique and relevant brand. Even though there are thousands of them, there are really only a few good ones and most of those get overused. So let Very Cool make you a totally custom one already! They're so fun to make and you'll totally love it. A custom commission could be a completely new design or a modification of one here on the site. Other services include lettering, typeface consulting, screen optimizations and type education.</p>
	<section class="box">
		<header>
			<h3>Qualtrics</h3>
			<h5>9 FONTS</h5>
			<h5 class="year">2016</h5>
		</header>
			<img src="<?php bloginfo('template_directory'); ?>/img/type-sample-qualtrics-grotesque.png"/>
		<footer>
			<ul class="list-inline">
				<li><a class="squiggle" href="<?php echo esc_url( home_url( '/' ) ); ?>qualtrics-grotesque">Read More</a></li>
				<li><a class="squiggle" href="http://www.Qualtrics.com/">Qualtrics.com</a></li>
			</ul>
		</footer>
	</section>
	<section class="box">
		<header>
			<h3>jDawgs</h3>
			<h5>3 FONTS</h5>
			<h5 class="year">2015</h5>
		</header>
			<img src="<?php bloginfo('template_directory'); ?>/img/type-sample-beef-sans.png"/>
		<footer>
			<ul class="list-inline">
				<li><a class="squiggle" href="<a href="<?php echo esc_url( home_url( '/' ) ); ?>jdawgs">See it in use</a></li>
			</ul>
		</footer>
	</section>
	<section class="box">
		<header>
			<h3>Bluehost</h3>
			<h5>9 FONTS</h5>
			<h5 class="year">2014</h5>
		</header>
			<img src="<?php bloginfo('template_directory'); ?>/img/type-sample-bluehost-sans.png"/>
		<footer>
			<ul class="list-inline">
				<li><a class="squiggle" href="<?php echo esc_url( home_url( '/' ) ); ?>bluehost-sans">Read More</a></li>
			</ul>
		</footer>
	</section>
</div>

<?php get_footer( 'shop' ); ?>
