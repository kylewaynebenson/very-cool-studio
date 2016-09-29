<?php
/**
 * Show error messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/error.php.
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

if ( ! $messages ){
	return;
}

?>
<ul class="woocommerce-error" id="error">
	<?php foreach ( $messages as $message ) : ?>
		<li><?php echo wp_kses_post( $message ); ?><a id="wc-close" class="button wc-close chamfered-button chamfered-button-white">K THX</a></li>
	<?php endforeach; ?>
</ul>
<style>
	#error {
		display: block;
	}
	article.product {
		transition: 1s; 
	}
	#error.fade {
		display: none;
	}
</style>
<script type="text/javascript">
	var error = document.getElementById('error');

	document.getElementById('wc-close').onclick = function(){
	    error.classList.toggle('fade');
	}
</script>
