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
				<li><span class="post-meta-key">Char set</span> <?php echo get_post_meta($post->ID, 'Char Set', true); echo get_post_meta($post->ID, 'Char set', true); ?></li>
				<li><span class="post-meta-key">Released</span> <?php echo get_post_meta($post->ID, 'Released', true); ?></li>
				<li><span class="post-meta-key">Fonts</span> <?php echo get_post_meta($post->ID, 'Fonts', true); ?></li>
			<?php $my_post_meta = get_post_meta($post->ID, 'Widths', true); ?>
			    <?php if ( ! empty ( $my_post_meta ) ) { ?>
			        <li><span class="post-meta-key">Widths</span> <?php echo get_post_meta($post->ID, 'Widths', true); ?></li>
			    <?php } ?>
			</ul>
			
	</header><!-- .entry-header -->
	<div class="post-content">
		<div class="post-description">
			<?php the_content(); ?>
		</div>
			<div class="type-tester"> 
			<?php
				// This section lets you set the default typetester font if there is one
				$tags = get_the_terms( $post->ID, 'product_tag' );
				foreach ( $tags as $tag ) {
				    $typetesterdefault = $tag->slug;
				}
				if (empty($typetesterdefault)){
					$typetesterdefault = "Regular";
				}
			?>
		<span contenteditable="true" id="type-tester-editable" class="fontselect fontsize fontweight de 64 textfield <?php echo $post->post_name;?> <?php echo $typetesterdefault; ?>">Try <?php the_title(); ?></span> 
		<div class="type-tester-title">
			<h4 class="entry-title"><?php the_title(); ?></h4>
			<h5><?php echo get_the_excerpt(); ?></h5>
			<h4 class="price h4"><?php global $product; echo $product->get_price_html(); ?>
			<meta itemprop="price" content="<?php echo esc_attr( $product->get_price() ); ?>" />
			<meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" /></h4>
		</div>
		<!-- Selector for if I want to be able to change font family in the future -->
		<?php /*<select class="" data-native-menu="false" id="font-family-select" name="typeface"> 
			<option value="<?php echo $post->post_name;?>"><?php the_title(); ?></option> 
		</select> */ ?> 
		  <div class="type-tester-header">
			<input id="font-size-slider" type="range" min="10" max="160" value="48">
			<div class="select">
				<span class="arr"></span>
				<select class="" data-native-menu="false" id="font-weight-select" name="weight">
				<?php
					function multi_sort(&$array, $criteria, $defaults=array()){
					    $cache = array();
					    // prepare the criteria by sorting them from longest to shortest
					    // maintaining the original key (index)
					    foreach($criteria as &$c){
						uasort($c, function($a,$b){
						    return  strlen($b) - strlen($a);
						});
					    }
					    // define a function for returning the index matching the given str
					    // given: 'one' and ['zero', 'one', 'two'] returns 1
					    $findIndex = function($str, $values){
						foreach($values as $index=>$value){
						    if( stripos($str, $value) !== FALSE ){
							return $index;
						    }
						}
						return NULL;
					    };
					    // define a function to calculate a weighted value based on the criteria
					    // returns a value similar to: 2000-0000-3300 (one segment for each criteria)
					    $calculateValue = function($str) use ($criteria, $findIndex, $defaults, $cache){
						if( !isset($cache[$str]) ){
						    $parts = array();
						    foreach($criteria as $i=>$c){
							$parts[$i] = $findIndex($str, $c);
							if( $parts[$i] === NULL ){
							    $parts[$i] = (isset($defaults[$i]) ? $defaults[$i] : 1000);
							}
							$parts[$i] = str_pad($parts[$i], 4, '0');
						    }
						    $cache[$str] = implode($parts, '-');
						}
						return $cache[$str];
					    };
					    // define our compare function
					    $compare = function($a, $b) use ($calculateValue){
						$av = $calculateValue($a);
						$bv = $calculateValue($b);
						return $av > $bv;
					    };
					    // sort the array`
					    usort($array, $compare);
					}
					// create our sort criteria.
					$sort_criteria = array(
					    array("Wide", "", "SemiCondensed", "Condensed", "ExtraCondensed", "SL", "ST", "Style"),
					    array("Black", "ExtraBold", "UltraBold", "Bold", "SemiBold", "Medium", "Regular", "Light", "ExtraLight", "Thin"),
					    array(" ", "Italic"),
					);

					$title = get_the_title();
					$title = str_replace(" ", "", $title);
					global $post;
						$post_slug=$post->post_name;

					// This section pulls all the webfont names from the directory, then sorts them
					$directory = './wp-content/themes/very-cool-studio/type/';
					$directory .= $post_slug.'/';
					$path = $directory;
					$path .= '*.woff';
					$files = array_diff(glob($path), array('.', '..'));
					$newfiles = str_replace($directory.$title, "", $files);
					$newfiles = str_replace(".woff", "", $newfiles);
					$fontlist = str_replace("-", " ", $newfiles);
					// sort our array; default for criteria 1 is 1 (i.e. Standard)
					multi_sort($fontlist, $sort_criteria, array(1));
					// This section prints out the select for the type tester
					$html = '';
					foreach ($fontlist as &$value) {
						$valueslug = trim(strtolower($value));
						$value = trim($value);
						if ($value == $typetesterdefault | strtolower($value) == strtolower($typetesterdefault)) {
						    $html .= "<option value='{$valueslug}' selected>";
						    $html .= "{$value}</option> ";
						} else {
						    $html .= "<option value='{$valueslug}'>";
						    $html .= "{$value}</option> ";
						}
					}
					echo $html;
				?>
				</select>
			</div>
			<div id="font-feature-controls">
			      <form id="font-feature-input-form">
				    <h3>Kerning</h3>
				    <div class="group">
					  <label class="type-tester-checkbox"><input id="kern" type="checkbox" checked />Enabled (kern)</label>
				    </div>
				    <h3>Ligatures</h3>
				    <div class="group">
					  <label class="type-tester-checkbox"><input id="liga" type="checkbox" checked />Common (liga)</label>
					  <label class="type-tester-checkbox"><input id="dlig" type="checkbox">Discretionary (dlig)</label>
					  <label class="type-tester-checkbox"><input id="hlig" type="checkbox">Historical (hlig)</label>
					  <label class="type-tester-checkbox"><input id="clig" type="checkbox">Contextual (clig)</label>
				    </div>
				    <h3>Letter Case</h3>
				    <div class="group">
				    <label><input name="smcp" checked="checked" type="radio">Off</label>
					  <label class="type-tester-checkbox"><input id="smcp" name="smcp" type="radio">Small Caps (smcp)</label>
					  <label class="type-tester-checkbox"><input id="c2sc" name="smcp" type="radio">Small Caps from Caps (c2sc)</label>
				    </div>
				    <h3>Number Case</h3>
				    <div class="group">
				    <label><input name="numsty" checked="checked" type="radio">Default</label>
					  <label class="type-tester-checkbox"><input id="lnum" name="numsty" type="radio">Lining (lnum)</label>
					  <label class="type-tester-checkbox"><input id="onum" name="numsty" type="radio">Old-Style (onum)</label>
				    </div>
				    <h3>Number Spacing</h3>
				    <div class="group">
				    <label><input name="numspc" checked="checked" type="radio">Default</label>
					  <label class="type-tester-checkbox"><input id="pnum" name="numspc" type="radio">Proportional (pnum)</label>
					  <label class="type-tester-checkbox"><input id="tnum" name="numspc" type="radio">Tabular (tnum)</label>
				    </div>
				    <h3>Fractions</h3>
				    <div class="group">
				    <label><input name="frac" checked="checked" type="radio">Off</label>
					  <label class="type-tester-checkbox"><input id="frac" name="frac" type="radio">Normal (frac)</label>
					  <label class="type-tester-checkbox"><input id="afrc" name="frac" type="radio">Alternate (afrc)</label>
				    </div>
				    <h3>Numeric Extras</h3>
				    <div class="group">
					  <label class="type-tester-checkbox"><input id="zero" type="checkbox">Slashed Zero (zero)</label>
					  <label class="type-tester-checkbox"><input id="nalt" type="checkbox">Alt. Annotation (nalt)</label>
				    </div>
				    <h3>Character Alternatives</h3>
				    <div class="group">
					  <label class="type-tester-checkbox"><input id="swsh" type="checkbox">Swash (swsh)</label>
					  <label class="type-tester-checkbox"><input id="calt" type="checkbox">Contextual (calt)</label>
					  <label class="type-tester-checkbox"><input id="hist" type="checkbox">Historical (hist)</label>
				    </div>
				    <h3>Alternative Stylistic Sets</h3>
				    <div class="group">
					  <label class="type-tester-checkbox"><input id="ss01" type="checkbox">Set 1 (ss01)</label>
					  <label class="type-tester-checkbox"><input id="ss02" type="checkbox">Set 2 (ss02)</label>
					  <label class="type-tester-checkbox"><input id="ss03" type="checkbox">Set 3 (ss03)</label>
					  <label class="type-tester-checkbox"><input id="ss04" type="checkbox">Set 4 (ss04)</label>
					  <label class="type-tester-checkbox"><input id="ss05" type="checkbox">Set 5 (ss05)</label>
				    </div>

				    <label id="reset"><input type="reset" value="Defaults" /></label>

			      </form>
			</div> <!-- /feature controls -->
			<div class="type-tester-footer">
				 <?php if($product->price){ ?><a href="#pricing" type="submit" class="button chamfered-button chamfered-button-gray">See Pricing</a><?php } else { }; ?>
				<h5 class="type-tester-notice">Type tester doesn't always demonstrate full<br> scope or function of typeface.</h5>
			</div>
		   </div>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />
	</div>
	<footer class="entry-footer">
		<?php
				verycool_entry_footer();
				the_post_navigation();

		if ( 'post' === get_post_type() ) : ?>
		<?php
		endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

</div><!-- #product-<?php the_ID(); ?> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<?php do_action( 'woocommerce_after_single_product' ); ?>
<div class="clear"></div>
<?php if (!$product->get_gallery_attachment_ids()){ ?>
	<br/>
<?php }else{ ?>
<div class="radio-tabs">
	<input class="state" type="radio" title="Specimen" name="houses-state" id="specimen" checked />
	<input class="state" type="radio" title="Gallery" name="houses-state" id="gallery" />
	<!-- <input class="state" type="radio" title="Process" name="houses-state" id="process" /> -->

	<div class="tabs">
		<label for="specimen" id="specimen-tab" class="tab">Specimen</label>
		<label for="gallery" id="gallery-tab" class="tab">Gallery</label>
		<!-- <label for="process" id="process-tab" class="tab">Process</label> -->
	</div>
	<div class="panels">
		<div id="specimen-panel" class="panel active">
			<?php
			  global $product;
			 $attachment_ids = $product->get_gallery_attachment_ids();

			foreach( $attachment_ids as $attachment_id ) 
			{
			  $image_link = wp_get_attachment_url( $attachment_id );
			  echo "<img class='gallery-images' src=" . $image_link . " />";
			}
			?>
		</div>
		<div id="gallery-panel" class="panel">
			<?php
			$adjectives = array("embattled ", "feisty ", "gregarious ", "meaningless ", "pathetic ", "gassy ",  "long-winded ", "defeated ", "grumpy ", "ticklish ", "overwhelmed ", "tacky ", "miffed ", "dangerous ", "decent ", "careful ", "flustered ", "noble ", "tasteful ", "doubting ", "unnecessary ", "surly ", "spaceage ", "shameless ", "zealous ",);
			$description = array("brown ", "yellow ", "five-year-old ", "never-to-be-forgotten " ,"red ", "orange ", "kindhearted ", "(yet durable) ", "bristling ", "crosseyed ", "pigeontoed ", "bumbling ", "flimsy ", "prickly ", "musty ", "lumpy ", "snarly ", "fuzzy ", "quiet ",);
			$nouns = array("turtle ", "horse ", "dog ", "(good) dog ", "pig ", "zebra ", "hedgehog ", "rabbit ", "gorilla ", "fox ", "coyote ", "goat ", "lion ", "house cat ", "hamster ", "pigeon ", "parrot ");
			$verbs = array("jumped ", "farted ", "doted ", "tiptoed ", "sank into euphoria ", "quibbled ", "littered ", "fumed ", "burped ", "played ping pong ", "hit a wiffle ball ", "wailed ", "bobbed for apples ", "picked her nose ", "did the frug ", "sniffed ", "collapsed ", "slurped a Coke ", "barfed ", "lurched " );
			$prepositions = array("over ", "behind the back of ", "after ", "beside ", "thanks to ", "in the face of ");
			$articles = array("the ", "that ", "my ", "your ", "their ", "our ");
			$sentencestart = array("I’ll have you know ", "all because ", "This, after ", "And ", "As ");
			$rand_adjectives = array_rand($adjectives, 4);
			$rand_description = array_rand($description, 4);
			$rand_nouns = array_rand($nouns, 4);
			$rand_verbs = array_rand($verbs, 3);
			$rand_prepositions = array_rand($prepositions, 3);
			$rand_articles = array_rand($articles, 4);
			$rand_sentencestart = array_rand($sentencestart, 2);
			foreach ($fontlist as &$value) {
				$value = trim($value);
				$eachfont = "";
				$typehtml = ucwords($articles[$rand_articles[0]] . $adjectives[$rand_adjectives[0]] . $description[$rand_description[0]] . $nouns[$rand_nouns[0]] . $verbs[$rand_verbs[0]] . $prepositions[$rand_prepositions[0]] . $articles[$rand_articles[1]] . $description[$rand_description[1]] . trim($nouns[$rand_nouns[1]]) . ". " . $sentencestart[$rand_sentencestart[0]] . $articles[$rand_articles[2]] . $adjectives[$rand_adjectives[2]] . $nouns[$rand_nouns[2]] . $verbs[$rand_verbs[2]] . $prepositions[$rand_prepositions[1]] . $articles[$rand_articles[3]] . $adjectives[$rand_adjectives[3]] . trim($nouns[$rand_nouns[3]]) . "! ");
				$valueslug = strtolower($value);
				$value = str_replace("Italic"," Italic",$value);
				$eachfont .= "<h5>{$value}</h5><div contenteditable='true' class='fontselect {$post->post_name} {$valueslug}'>";
				$eachfont .= $typehtml;
				$eachfont .= "</div>";
				print $eachfont;
			}
			?>
		</div>
<!-- 		<div id="process-panel" class="panel">
			<p>Hello I am a dog</p>
		</div> -->
	</div>
</div><!-- Radio tabs -->
<?php } ?>
</div>
</div>
</div>
<?php if($product->price){ ?>
	<div id="pricing" class="yellow-page product-footer">
		<h1 class="footer-title"><?php the_title(); ?></h1>
		<h4 class="price h4"><?php global $product; echo $product->get_price_html(); ?>
		<meta itemprop="price" content="<?php echo esc_attr( $product->get_price() ); ?>" />
		<meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" /></h4>
		<?php if ( $product->is_type( 'variable' ) ) {?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>terms" class="squiggle squiggle-black">View License</a>
			<section class="box">
				<?php echo do_shortcode("[vartable]"); ?>
			</section>
			<?php } else {?>
			<form class="cart" method="post" enctype='multipart/form-data'>
			 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />
			 	<button type="submit" class="button chamfered-button"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
			 	 	<a href="<?php echo esc_url( home_url( '/' ) ); ?>terms" class="squiggle squiggle-black">View License</a>
			</form>
			<?php } ?>
	</div>
<?php } else {?>

<?php } ?>
