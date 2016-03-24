 
<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package verycoolstudio
 */

?>

	</div><!-- #content -->

	<footer class="footer" role="contentinfo">
		<div class="container">
			<div class="footer-contact">
				<h3 class="contact-title">Contact:</h3>
				<div class="contact-phone">
					<p class="h5">
						<a class="phone no-style" href="tel:8014486140">8014486140</a>
						<a class="email no-style" href="mailto:hello@verycoolstudio.com">hello@verycoolstudio.com</a>
					</p>
				</div>
				<div class="contact-address">
					<p class="h5">195 E 1600 S<br/> Orem, UT 84058</p>
				</div>
				<div class="contact-form">
				  <?php echo $response; ?>
				  <form action="<?php the_permalink(); ?>" method="post">
				    <p><label for="message_email">Email: <br><input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>"></label></p>
				    <p><label for="message_text">Message: <br><textarea type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></label></p>
				    <p><label for="message_human">Human Verification: <span>*</span> <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>
				    <input type="hidden" name="submitted" value="1">
				    <p><input type="submit" value="send"></p>
				  </form>
				</div>
			</div><!-- .footer-contact -->
			<div class="footer-available">
				<img src="<?php bloginfo('template_directory'); ?>/img/now-available.svg"/>
				<h3 class="h3">VERY COOL is the studio of KYLE WAYNE BENSON. Look, here he is:</h3>
				<ul class="list-inline">
					<li><a class="squiggle" href="http://www.dribbble.com/kylewaynebenson">Dribbble</a></li>
					<li><a class="squiggle" href="http://www.instagram.com/kylewaynebenson">Instagram</a></li>
					<li><a class="squiggle" href="http://www.twitter.com/kylewaynebenson">Twitter</a></li>
				</ul>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
