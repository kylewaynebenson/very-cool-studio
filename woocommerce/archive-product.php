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
		<?php if ( is_product_category('type') ) : ?>
			<div class="clear"></div>
			<article class="product product-trail-fonts type-product">
				<div class="trial-fonts-text">
					<h5 id="trial">Free Trial Fonts</h5>
					<p>Here at Very Cool, we know how important it is to handle the merchandise before you buy. That’s why we’re offering you a free trial download of each font with a newsletter subscription. After submitting the form, you’ll receive a subscription confirmation email. After accepting that, you'll receive a final email with a zip folder chock full of (<small>limited-capability</small>) trial fonts. Then you can experiment your heart out with typefaces like Cardinal Grotesque and Maritime Champion! Happy trials!</p>
				</div>
				<form action="//verycoolstudio.us4.list-manage.com/subscribe/post?u=edc2737100be661c0fc9e2c5e&amp;id=1e6678ac80" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="trial-fonts-fields validate" target="_blank" novalidate>
				    <div>
					<p class="form-row form-row validate-required">
						<label for="mce-EMAIL">Email Address </label>
						<input type="email" value="" name="EMAIL" class="input-text required email" id="mce-EMAIL">
					</p>
					<p class="form-row form-row form-row-first">
						<label for="mce-FNAME">First Name </label>
						<input type="text" value="" name="FNAME" class="input-text " id="mce-FNAME">
					</p>
					<p class="form-row form-row form-row-last">
						<label for="mce-LNAME">Last Name </label>
						<input type="text" value="" name="LNAME" class="input-text " id="mce-LNAME">
					</p>
					<p class="form-row terms terms-and-conditions">
						<input type="checkbox" class="input-checkbox" name="terms" id="terms">
						<label for="terms" class="checkbox">I accept the trail <a href="<?php echo esc_url( home_url( '/' ) ); ?>free-trials" target="_blank">terms &amp; conditions</a></label>
						<input type="hidden" name="terms-field" value="1">
					</p>
					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>
				    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_edc2737100be661c0fc9e2c5e_1e6678ac80" tabindex="-1" value=""></div>
				    <p class="clear">
				    	<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button chamfered-button chamfered-button-yellow">
				    </p>
				    </div>
				</form>
				<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
				<script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
				<!--End mc_embed_signup-->
			</article>
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
<?php if ( is_product_category('type') ) : ?>
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
				<li><a class="squiggle" href="<?php echo esc_url( home_url( '/' ) ); ?>jdawgs">See it in use</a></li>
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
<?php elseif ( is_product_category('object') || is_product_category('objects') ) : ?>
<div id="custom-type" class="yellow-page">
	<div class="very-cool-flag">
		<img src="<?php bloginfo('template_directory'); ?>/img/very-cool-shirt.svg"/>
	</div>
	<h2 class="h2" id="custom">Very Cool Objects</h2>
	<p class="intro-text">We know the wish to possess an object is great, and the desire to consume has never made more sense than it does here. We're glad to marry your drive for culture and status to our daughters of products. Feast your eyes on the affordable and exciting offerings above.</p>
</div>
<?php endif; ?>

<?php get_footer( 'shop' ); ?>
