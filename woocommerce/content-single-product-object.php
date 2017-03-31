<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php 
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		<ul class="post-meta">
			<li><span class="post-meta-key">Dim</span> <?php echo get_post_meta($post->ID, 'Dim', true); echo get_post_meta($post->ID, 'Dimensions', true); ?></li>
			<?php $my_post_meta = get_post_meta($post->ID, 'Quantity', true); ?>
			    <?php if ( ! empty ( $my_post_meta ) ) { ?>
			        <li><span class="post-meta-key">Quantity</span> <?php echo get_post_meta($post->ID, 'Quantity', true); ?></li>
			    <?php } ?>
			<?php $my_post_meta = get_post_meta($post->ID, 'Iron On', true); ?>
			    <?php if ( ! empty ( $my_post_meta ) ) { ?>
			        <li><span class="post-meta-key">Iron On</span> <?php echo get_post_meta($post->ID, 'Iron On', true); ?></li>
			    <?php } ?>
			<li><span class="post-meta-key">Summary</span> <?php echo get_post_meta($post->ID, 'Summary', true); ?></li>
		</ul>
		<div class="summary-cart">
			<?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
		</div>
	</header><!-- .entry-header -->
	<div class="post-content">
		<?php the_content(); ?>
		<div class="specimen-gallery">
	 </div>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />
	</div>
	<footer class="entry-footer">
		<?php
				verycool_entry_footer();
				the_post_navigation();

		if ( 'post' === get_post_type() ) : ?>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
<div class="clear"></div>
</div>
</div>
</div>
<div class="yellow-page">
	<h1 class="footer-title <?php echo $post->post_name;?>"><?php the_title(); ?></h1>
	<h4 class="price h4"><?php global $product; echo $product->get_price_html(); ?>
	<meta itemprop="price" content="<?php echo esc_attr( $product->get_price() ); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" /></h4>
	<form class="cart" method="post" enctype='multipart/form-data'>
	 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />
	 	<button type="submit" class="button chamfered-button"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
	</form>
</div>
<?php wp_enqueue_style( 'webfonts' ); ?>
