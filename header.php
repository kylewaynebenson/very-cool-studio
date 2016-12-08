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
				<span class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<!-- <i class='icon icon-logo'></i> -->
						<svg class="svg-logo" id="SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 409.79 51.32">
							<title>Very Cool Logo</title>
							<polygon class="logo-black logo-very" points="20.34 49.77 0 2.28 21.95 2.28 38.17 42.26 35.99 49.77 20.34 49.77" />
							<path class="logo-yellow logo-very" d="M61.91,15.6c0,7.21-4.35,11.56-11.56,11.56S38.79,22.81,38.79,15.6,43.14,4,50.35,4c8,0,11.56,5.18,11.56,11.56" transform="translate(-6.9 -3.74)"/>
							<path id="actor_1" opacity="1" fill-opacity="1" class="logo-red logo-very" d="M61.91,15.6c0,7.21-4.35,11.56-11.56,11.56S38.79,22.81,38.79,15.6,43.14,4,50.35,4c8,0,11.56,5.18,11.56,11.56" transform="translate(-6.9 -3.74)"/>
							<rect class="logo-black logo-very" x="58.64" y="2.28" width="17.21" height="47.49"/>
							<path class="logo-black logo-very" d="M103.1,26.5c-10.5,0-15.26-6.28-15.37-20.34H105.9V26.5h-2.8Z" transform="translate(-6.9 -3.74)"/>
							<path class="logo-yellow logo-very" d="M87.73,53.72c0.11-14.06,4.86-20.34,15.37-20.34h2.8V53.72H87.73Z" transform="translate(-6.9 -3.74)"/>
							<path id="actor_2" opacity="1" fill-opacity="1" class="logo-red logo-very" d="M87.73,53.72c0.11-14.06,4.86-20.34,15.37-20.34h2.8V53.72H87.73Z" transform="translate(-6.9 -3.74)"/>
							<rect class="logo-black logo-very" x="105.46" y="2.28" width="16.84" height="47.49"/>
							<path class="logo-yellow logo-very" d="M140.44,27.73H134.2V6h6.23c9.1,0,14.41,3,14.28,11.9-0.13,7.57-5.28,9.82-14.28,9.82" transform="translate(-6.9 -3.74)"/>
							<path id="actor_3" opacity="1" fill-opacity="1" class="logo-red logo-very" d="M140.44,27.73H134.2V6h6.23c9.1,0,14.41,3,14.28,11.9-0.13,7.57-5.28,9.82-14.28,9.82" transform="translate(-6.9 -3.74)"/>
							<path class="logo-black logo-very" d="M152.25,54.12c-11.48,0-17.55-6-17.55-17.29V32.11H141c5.55,0,9.48,1.25,12,3.83s3.76,6.59,3.68,12.24l-0.1,5.95h-4.32Z" transform="translate(-6.9 -3.74)"/>
							<path class="logo-black logo-very" d="M190.28,53.51l-0.1-17.25h-0.25l0.2-.49L175.6,6H155.12L173.52,42V53.51h16.76Z" transform="translate(-6.9 -3.74)"/>
							<path class="logo-yellow logo-very" d="M208.75,14.92c0,7-4.2,11.18-11.18,11.18s-11.18-4.21-11.18-11.18,4.2-11.18,11.18-11.18,11.18,4.21,11.18,11.18" transform="translate(-6.9 -3.74)"/>
							<path class="logo-red logo-peace" d="M200.5,23.2L200.5,23.2c1.2,4,1.7,8,1.7,12.5c0,2-0.4,4-1.3,5.9c-0.9,1.8-2,3.5-3.5,4.9c-3,3-6.9,4.7-10.6,4.7
									c-3.6,0-6.4-1-8.3-3c-1.6-1.7-2.5-4-2.8-6.9c0.1-1.1,0.3-2.1,0.5-3c-1.1-0.5-2-1.5-2.7-2.8l-4.5-7.3l3.2-4.3
									c0.8-0.5,1.5-0.8,2.2-0.8h0.1l-0.8-1.3l4.5-4.7l1.5-0.6l-2.2-5c-1.1-1.9-1.2-3.5-0.1-5.6l5-4.4c0.8-0.7,1.7-1.1,2.8-1.1
									c2,0,3.4,1.3,3.9,3.2l1.6,6.9l0.7-6.8l5.8-3.8l1.1,0.4c4,1.5,5.4,4.8,4.4,9.7L200.5,23.2z M178,32.5c0.5,0.7,1.3,1.1,2.5,1.1
									c0.9,0,1.7-0.2,2.3-0.6c-2-0.7-3.6-2.3-4.4-4.2l-0.1,0.1l-2.4-3.9l0.1,0.4h-0.5c-0.9,0-1.7,0.5-1.8,0.9l-0.1,0.2L178,32.5z
									 M178.5,20.8l3,4.4l1.5-1.5h0.1l-1.7-3.9c-0.1-0.1-0.3-0.1-0.5-0.1c-0.5,0-1,0.1-1.4,0.5L178.5,20.8z M180.6,6l7.1,16.6l2.3-0.5
									l-5.6-15.5c-0.3-0.7-0.9-1.1-1.7-1.1c-0.5,0-1.2,0.1-1.8,0.5L180.6,6z M199,41c0.2-1.7-0.1-3.4-0.7-5c-0.6-1.5-1.6-3.1-3-4.7
									l-4.8-5.8l-7.1,2.4l0.1,0.2c0.7,1.9,3.9,2.6,7.1,1.2l0.5,0.9c-2.1,3.9-1.9,6.9,0.5,8.5c0.5,0.3,1.2,0.5,2,0.5c1,0,2-0.3,2.6-0.7
									l0.7,1.3c-1.7,3-4,4.6-6.5,4.6c-1.5,0-2.9-0.7-4-1.8c-1.1-1.1-1.7-2.9-1.7-4.7c0-0.9,0.2-1.8,0.5-2.6l-2,2c-0.7,0.5-1.4,0.9-2.2,1.3
									c0.1,2.8,0.8,4.8,2.2,6.2c1.5,1.5,3.9,2.4,7.1,2.4c2.3,0,4.6-0.9,6.4-2.6C197.7,43.3,198.4,42.2,199,41z M196.2,4.6L194,21.6
									l1.9,2.5l2.2-13.4c0.5-3.3,0.1-4.4-1.1-5.6V5L196.2,4.6z"/>
							<path id="actor_4" opacity="1" fill-opacity="1" class="logo-red logo-very" d="M208.75,14.92c0,7-4.2,11.18-11.18,11.18s-11.18-4.21-11.18-11.18,4.2-11.18,11.18-11.18,11.18,4.21,11.18,11.18" transform="translate(-6.9 -3.74)"/>
							<path class="logo-black" d="M244.1,55.06h1.3V5.7h-1.3c-13.3,0-19.86,8.21-19.68,24.88h0C224.6,47,231,55.06,244.1,55.06" transform="translate(-6.9 -3.74)"/>
							<path class="logo-yellow" d="M271.81,16c0,7.18-4.39,11.57-11.57,11.57S248.67,23.23,248.67,16s4.39-11.57,11.57-11.57S271.81,8.86,271.81,16" transform="translate(-6.9 -3.74)"/>
							<path id="actor_5" opacity="1" fill-opacity="1" class="logo-red" d="M271.81,16c0,7.18-4.39,11.57-11.57,11.57S248.67,23.23,248.67,16s4.39-11.57,11.57-11.57S271.81,8.86,271.81,16" transform="translate(-6.9 -3.74)"/>
							<path class="logo-black" d="M249.12,54V47.78c0-10.86,4.24-15.71,13.74-15.71h0.44l5.22,0.1v4.32c0,8-2.65,17.55-15.27,17.55h-4.13Z" transform="translate(-6.9 -3.74)"/>
							<path class="logo-black" d="M293.94,55.06h1.3V5.7h-1.3c-13.3,0-19.86,8.21-19.68,24.88h0c0.18,16.39,6.55,24.47,19.68,24.47" transform="translate(-6.9 -3.74)"/>
							<path class="logo-yellow" d="M301,5.7h-1.3V55.06H301c13.3,0,19.86-8.51,19.68-25.18C320.49,13.49,314.12,5.7,301,5.7" transform="translate(-6.9 -3.74)"/>
							<path id="actor_6" opacity="1" fill-opacity="1" class="logo-red" d="M301,5.7h-1.3V55.06H301c13.3,0,19.86-8.51,19.68-25.18C320.49,13.49,314.12,5.7,301,5.7" transform="translate(-6.9 -3.74)"/>
							<path class="logo-black" d="M345.31,55.06h1.3V5.7h-1.3c-13.3,0-19.86,8.21-19.68,24.88h0c0.18,16.39,6.55,24.47,19.68,24.47" transform="translate(-6.9 -3.74)"/>
							<path class="logo-yellow" d="M352.36,5.7h-1.3V55.06h1.3c13.3,0,19.86-8.51,19.68-25.18C371.86,13.49,365.49,5.7,352.36,5.7" transform="translate(-6.9 -3.74)"/>
							<path id="actor_7" opacity="1" fill-opacity="1" class="logo-red" d="M352.36,5.7h-1.3V55.06h1.3c13.3,0,19.86-8.51,19.68-25.18C371.86,13.49,365.49,5.7,352.36,5.7" transform="translate(-6.9 -3.74)"/>
							<rect class="logo-black" x="370.6" y="2.75" width="16.92" height="47.79"/>
							<path class="logo-yellow" d="M398.82,54.07c0.14-14.79,6.3-23.6,16.55-23.6h1.32v23.6H398.82Z" transform="translate(-6.9 -3.74)"/>
							<path id="actor_8" opacity="1" fill-opacity="1" class="logo-red" d="M398.82,54.07c0.14-14.79,6.3-23.6,16.55-23.6h1.32v23.6H398.82Z" transform="translate(-6.9 -3.74)"/>
							<!-- Christmas Edition -->
							<!--<script type="text/ecmascript"><![CDATA[(function(){var actors={};actors.actor_1={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_1"),type:"square",opacity:1};actors.actor_2={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_2"),type:"square",opacity:1};actors.actor_3={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_3"),type:"square",opacity:1};actors.actor_4={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_4"),type:"square",opacity:1};actors.actor_5={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_5"),type:"square",opacity:1};actors.actor_6={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_6"),type:"square",opacity:1};actors.actor_7={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_7"),type:"square",opacity:1};actors.actor_8={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_8"),type:"square",opacity:1};var tricks={};tricks.trick_1=(function(t,i){i=(function(n){return 1==n?1:1-Math.pow(2,-10*n)})(i)%1,i=0>i?1+i:i;var _=t.node;0.6>=i?_.setAttribute("opacity",i*(t.opacity/0.6)):i>=0.9?_.setAttribute("opacity",t.opacity-(i-0.9)*(t.opacity/(1-0.9))):_.setAttribute("opacity",t.opacity)});var scenarios={};scenarios.scenario_1={actors: ["actor_1","actor_2","actor_3","actor_4","actor_5","actor_6","actor_7","actor_8"],tricks: [{trick: "trick_1",start:0,end:1}],startAfter:0,duration:1200,actorDelay:400,repeat:0,repeatDelay:0};var _reqAnimFrame=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.oRequestAnimationFrame,fnTick=function(t){var r,a,i,e,n,o,s,c,m,f,d,k,w;for(c in actors)actors[c]._tMatrix=[1,0,0,1,0,0];for(s in scenarios)for(o=scenarios[s],m=t-o.startAfter,r=0,a=o.actors.length;a>r;r++){if(i=actors[o.actors[r]],i&&i.node&&i._tMatrix)for(f=0,m>=0&&(d=o.duration+o.repeatDelay,o.repeat>0&&m>d*o.repeat&&(f=1),f+=m%d/o.duration),e=0,n=o.tricks.length;n>e;e++)k=o.tricks[e],w=(f-k.start)*(1/(k.end-k.start)),tricks[k.trick]&&tricks[k.trick](i,Math.max(0,Math.min(1,w)));m-=o.actorDelay}for(c in actors)i=actors[c],i&&i.node&&i._tMatrix&&i.node.setAttribute("transform","translate(-6.9 -3.74)");_reqAnimFrame(fnTick)};_reqAnimFrame(fnTick);})()]]></script>-->
							<script type="text/ecmascript"><![CDATA[(function(){var actors={};actors.actor_1={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_1"),type:"square",opacity:1};actors.actor_2={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_2"),type:"square",opacity:1};actors.actor_3={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_3"),type:"square",opacity:1};actors.actor_4={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_4"),type:"square",opacity:1};actors.actor_5={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_5"),type:"square",opacity:1};actors.actor_6={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_6"),type:"square",opacity:1};actors.actor_7={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_7"),type:"square",opacity:1};actors.actor_8={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_8"),type:"square",opacity:1};var tricks={};tricks.trick_1=(function(t,i){i=(function(n){return 1==n?1:1-Math.pow(2,-10*n)})(i)%1,i=0>i?1+i:i;var _=t.node;0.6>=i?_.setAttribute("opacity",i*(t.opacity/0.6)):i>=0.9?_.setAttribute("opacity",t.opacity-(i-0.9)*(t.opacity/(1-0.9))):_.setAttribute("opacity",t.opacity)});var scenarios={};scenarios.scenario_1={actors: ["actor_1","actor_2","actor_3","actor_4","actor_5","actor_6","actor_7","actor_8"],tricks: [{trick: "trick_1",start:0,end:1}],startAfter:0,duration:2000,actorDelay:100,repeat:0,repeatDelay:0};var _reqAnimFrame=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.oRequestAnimationFrame,fnTick=function(t){var r,a,i,e,n,o,s,c,m,f,d,k,w;for(c in actors)actors[c]._tMatrix=[1,0,0,1,0,0];for(s in scenarios)for(o=scenarios[s],m=t-o.startAfter,r=0,a=o.actors.length;a>r;r++){if(i=actors[o.actors[r]],i&&i.node&&i._tMatrix)for(f=0,m>=0&&(d=o.duration+o.repeatDelay,o.repeat>0&&m>d*o.repeat&&(f=1),f+=m%d/o.duration),e=0,n=o.tricks.length;n>e;e++)k=o.tricks[e],w=(f-k.start)*(1/(k.end-k.start)),tricks[k.trick]&&tricks[k.trick](i,Math.max(0,Math.min(1,w)));m-=o.actorDelay}for(c in actors)i=actors[c],i&&i.node&&i._tMatrix&&i.node.setAttribute("transform","translate(-6.9 -3.74)");_reqAnimFrame(fnTick)};_reqAnimFrame(fnTick);})()]]></script>
						</svg>
					</a>
				</span>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( '', 'verycool' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
			<div class="squiggle-divider-full"></div>
		</header><!-- #masthead -->
		<div id="content" class="site-content">
