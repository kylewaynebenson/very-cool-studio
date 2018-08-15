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
			<?php if ( is_single('kansas-casual') or is_single('maritime-champion') ) { ?>
			<?php } else if ( is_single('cardinal-grotesque') ) { ?>
				<div class="type-tester-frac type-tester-checkbox">
					<input id="font-frac" type="checkbox" name="frac" value="frac">
					Fractions
					<script>
					/* frac */
					var btnalt = document.querySelector(".type-tester-frac"),
					    typetester = document.querySelector("span.fontselect"),
					    activeClassfrac = "frac",
					    inputfrac = document.querySelector("#font-frac");

					btnalt.addEventListener("click", function(e){
					  e.preventDefault();
					  typetester.classList.toggle(activeClassfrac);
					  inputfrac.classList.toggle('checked');
					});
					</script>
				</div>
				<div class="type-tester-ss01 type-tester-checkbox">
					<input id="font-ss01" type="checkbox" name="ss01" value="ss01">
					ss01
					<script>
					/* ss01 */
					var btnalt = document.querySelector(".type-tester-ss01"),
					    typetester = document.querySelector("span.fontselect"),
					    activeClassss01 = "ss01",
					    inputss01 = document.querySelector("#font-ss01");

					btnalt.addEventListener("click", function(e){
					  e.preventDefault();
					  typetester.classList.toggle(activeClassss01);
					  inputss01.classList.toggle('checked');
					});
					</script>
				</div>
				<div class="type-tester-ss04 type-tester-checkbox">
					<input id="font-ss04" type="checkbox" name="ss04" value="ss04">
					ss04
					<script>
					/* ss04 */
					var btnalt = document.querySelector(".type-tester-ss04"),
					    typetester = document.querySelector("span.fontselect"),
					    activeClassss04 = "ss04",
					    inputss04 = document.querySelector("#font-ss04");

					btnalt.addEventListener("click", function(e){
					  e.preventDefault();
					  typetester.classList.toggle(activeClassss04);
					  inputss04.classList.toggle('checked');
					});
					</script>
				</div>
				<div class="type-tester-ss07 type-tester-checkbox">
					<input id="font-ss07" type="checkbox" name="ss07" value="ss07">
					ss07
					<script>
					/* ss07 */
					var btnalt = document.querySelector(".type-tester-ss07"),
					    typetester = document.querySelector("span.fontselect"),
					    activeClassss07 = "ss07",
					    inputss07 = document.querySelector("#font-ss07");

					btnalt.addEventListener("click", function(e){
					  e.preventDefault();
					  typetester.classList.toggle(activeClassss07);
					  inputss07.classList.toggle('checked');
					});
					</script>
				</div>
			<?php } else { ?>
				<div class="type-tester-ligatures type-tester-checkbox">
					<input id="font-ligatures" type="checkbox" name="ligatures" value="liga">
					Liga
					<script>
					/* ligatures */
					var btn = document.querySelector(".type-tester-ligatures"),
					    typetester = document.querySelector("span.fontselect"),
					    activeClassliga = "liga",
					    inputliga = document.querySelector("#font-ligatures");

					btn.addEventListener("click", function(e){
					  e.preventDefault();
					  typetester.classList.toggle(activeClassliga);
					  inputliga.classList.toggle('checked');
					});
					</script>
				</div>
				<div class="type-tester-alts type-tester-checkbox">
					<input id="font-alts" type="checkbox" name="alts" value="salt">
					Alts
					<script>
					/* alts */
					var btnalt = document.querySelector(".type-tester-alts"),
					    typetester = document.querySelector("span.fontselect"),
					    activeClassalts = "alts",
					    inputalts = document.querySelector("#font-alts");

					btnalt.addEventListener("click", function(e){
					  e.preventDefault();
					  typetester.classList.toggle(activeClassalts);
					  inputalts.classList.toggle('checked');
					});
					</script>
				</div>
			<?php } ?>
			<?php if ( is_single('business-script') ) { ?>
				<div class="type-tester-swsh type-tester-checkbox">
					<input id="font-swsh" type="checkbox" name="swsh" value="swsh">
					Swsh
					<script>
					/* swsh */
					var btnalt = document.querySelector(".type-tester-swsh"),
					    typetester = document.querySelector("span.fontselect"),
					    activeClassswsh = "swsh",
					    inputswsh = document.querySelector("#font-swsh");

					btnalt.addEventListener("click", function(e){
					  e.preventDefault();
					  typetester.classList.toggle(activeClassswsh);
					  inputswsh.classList.toggle('checked');
					});
					</script>
				</div>
			<?php } else if ( is_single('ready-script') or is_single('cardinal-grotesque') ) { ?>
				<div class="type-tester-case type-tester-checkbox">
					<input id="font-case" type="checkbox" name="case" value="case">
					Case
					<script>
					/* case */
					var btnalt = document.querySelector(".type-tester-case"),
					    typetester = document.querySelector("span.fontselect"),
					    activeClasscase = "case",
					    inputcase = document.querySelector("#font-case");

					btnalt.addEventListener("click", function(e){
					  e.preventDefault();
					  typetester.classList.toggle(activeClasscase);
					  inputcase.classList.toggle('checked');
					});
					</script>
				</div>
		<?php } ?>

		</div>
		<div class="type-tester-footer">
			 <?php if($product->price){ ?><a href="#pricing" type="submit" class="button chamfered-button chamfered-button-gray">See Pricing</a><?php } else { }; ?>
			<h5 class="type-tester-notice">Type tester does not demonstrate actual scope or<br> function of typeface thanks to browser limitations.</h5>
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
<script>
$('#font-family-select').data('oldVal', $('#font-family-select').val());
$('#font-family-select').change(function() {
    var $this = $(this);
    var newClass = $this.val();
    var oldClass = $this.data('oldVal');
    $this.data('oldVal', newClass);
    
    $('div.type-tester span.fontselect').removeClass(oldClass).addClass(newClass);
/*==  $('div.type-tester span.ui-btn-text').text($this.find('option:selected').text()); ==*/
   });

$('#font-weight-select').data('oldVal', $('#font-weight-select').val());
$('#font-weight-select').change(function() {
    var $this = $(this);
    var newClass = $this.val();
    var oldClass = $this.data('oldVal');
    $this.data('oldVal', newClass);
    
    $('div.type-tester span.fontweight').removeClass(oldClass).addClass(newClass);
/*==     $('div.type-tester span.ui-btn-text').text($this.find('option:selected').text());==*/
});
/* slider */
$('#font-size-slider').on('change', function () {
    var v = $(this).val();
    $('div.type-tester span.fontselect').css('font-size', v + 'px')
});
/* ligatures */
$('#font-alts').on('change', function () {
    var x = this.checked ? 'ss01' : ' ';
    $('div.type-tester span.fontselect').css('font-feature-settings', x )
});
$('#font-liga').on('change', function () {
    var x = this.checked ? 'liga' : ' ';
    $('div.type-tester span.fontselect').css('font-feature-settings', x )
});
$('#font-case').on('change', function () {
    var x = this.checked ? 'case' : ' ';
    $('div.type-tester span.fontselect').css('font-feature-settings', x )
});
</script>
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
