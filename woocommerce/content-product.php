<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// // Store column count for displaying the grid
// if ( empty( $woocommerce_loop['columns'] ) ) {
// 	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
// }

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// // Extra post classes
// $classes = array();
// if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
// 	$classes[] = 'first';
// }
// if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
// 	$classes[] = 'last';
// }
?>
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
<?php wp_reset_query(); ?>
