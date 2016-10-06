<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package verycoolstudio
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Takin a peep at the source? Nice. Observe liberally, I guess. Unless you're here to steal my embedded fonts. Don't steal my embedded fonts please. Here, I get it, you don't want to pay. Use this discount code to motivate you to just be honest and pay for a license: HONESTDECENTCODER-->
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'verycool' ); ?></a>
	<div id="white-page" class="white-page">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding" id="site-branding">
				<?php
				if ( is_front_page() && is_home() ) : ?>
					<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><i class='icon icon-logo'></i></a></span>
				<?php else : ?>
					<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><i class='icon icon-logo'></i></a></span>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<!-- <p class="site-description"><?php /*echo $description; */ ?></p> -->
				<?php
				endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( '', 'verycool' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
			<div class="squiggle-divider-full"></div>
		</header><!-- #masthead -->
		<div id="content" class="site-content">
