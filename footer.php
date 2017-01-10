 
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
				<div class="clear"></div>
				<div class="contact-form">
					<?php

	// if the submit button is clicked, send the email
	if ( isset( $_POST['submitted'] ) ) {
		$human = $_POST['message_human'];
		if($human == 2){
			// sanitize form values
			$email   = sanitize_email( $_POST["message_email"] );
			$subject = "Message from $email";
			$message = esc_textarea( $_POST["message_text"] );

			// get the blog administrator's email address
			$to = get_option( 'admin_email' );
			$headers = "From: $email" . "\r\n";

			// If email has been process for sending, display a success message
			if ( wp_mail( $to, $subject, $message, $headers ) ) {
				echo '<div>';
				echo '<p>Thanks for contacting me, if you picked pizza expect a response soon!</p>';
				echo '</div>';
				echo '<style> .footer-contact-form { display: none;}</style>';

			} else {
				echo '<div class="error">';
				echo 'An unexpected error occurred';
				echo '</div>';
			}
		} else {
			echo '<div class="error">';
			echo 'You got the math problem wrong you person! Please try again, or just email me at <a href="mailto:hello@verycoolstudio.com">hello@verycoolstudio.com</a>.';
			echo '</div>';
		}
	}
?>
				  <form action="<?php esc_url( $_SERVER['REQUEST_URI'] ) ?>" method="post" class="footer-contact-form">
				    <div class="input-label-group">
				    	<input class="input" type="text" name="message_email" required>
				    	<label for="message_email">Email</label>
				    </div>
				    <div class="input-label-group input-label-group-human">
				    	<input class="input human" type="text" name="message_human">
				    	<label for="message_human" class="hidden">Human?</label>
				    	<span class="math">+ 3 = 5</span>
				    </div>
				    <div class="input-label-group input-label-group-pizza">
				    	<input id="pizza" class="input input-radio pizza" type="radio" name="foodz" value="pizza"/><i class="icon icon-pizza" for="pizza"></i>
				    	<input id="burger" class="input input-radio burger" type="radio" name="foodz" value="burger"/><i class="icon icon-burger" for="burger"></i>
				    </div>
				    <div class="input-label-group">
				    	<textarea class="input" type="text" name="message_text" required><?php echo esc_textarea($_POST['message_text']); ?></textarea>
				    	<label for="message_text">Message</label>
				    </div>
				    <p><input type="submit" name="submitted" value="send"></p>
				  </form>
				</div><!-- .contact-form -->
			</div><!-- .footer-contact -->
			<div class="footer-available">
				<img src="<?php bloginfo('template_directory'); ?>/img/now-available.svg"/>
				<h3 class="h3">VERY COOL is the studio of KYLE WAYNE BENSON. Look, here he is:</h3>
				<ul class="list-inline">
					<li><a class="squiggle" href="http://www.dribbble.com/kylewaynebenson">Dribbble</a></li>
					<li><a class="squiggle" href="http://www.instagram.com/verycoolstudio">Instagram</a></li>
					<li><a class="squiggle" href="http://www.twitter.com/verycoolstudio">Twitter</a></li>
				</ul>
			</div>

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
