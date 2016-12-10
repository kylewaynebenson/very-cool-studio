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
						<svg class="svg-logo" id="SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412.8 51.3">
							<title>Very Cool Logo</title>
							<polygon class="logo-black logo-very" points="20.34 49.77 0 2.28 21.95 2.28 38.17 42.26 35.99 49.77 20.34 49.77" />
							<path class="logo-yellow logo-very" d="M55,11.9c0,7.2-4.3,11.6-11.6,11.6s-11.6-4.4-11.6-11.6S36.2,0.3,43.4,0.3C51.4,0.3,55,5.4,55,11.9"/>
							<path id="actor_1" opacity="1" fill-opacity="1" class="logo-red logo-very" d="M55,11.9c0,7.2-4.3,11.6-11.6,11.6s-11.6-4.4-11.6-11.6S36.2,0.3,43.4,0.3C51.4,0.3,55,5.4,55,11.9"/>
							<rect class="logo-black logo-very" x="58.64" y="2.28" width="17.21" height="47.49"/>
							<path class="logo-black logo-very" d="M96.2,22.8c-10.5,0-15.3-6.3-15.4-20.3H99v20.3H96.2z"/>
							<path class="logo-yellow logo-very" d="M80.8,50c0.1-14.1,4.9-20.3,15.4-20.3H99V50H80.8z"/>
							<path id="actor_2" opacity="1" fill-opacity="1" class="logo-red logo-very" d="M80.8,50c0.1-14.1,4.9-20.3,15.4-20.3H99V50H80.8z"/>
							<rect class="logo-black logo-very" x="105.46" y="2.28" width="16.84" height="47.49"/>
							<path class="logo-yellow logo-very" d="M133.5,24h-6.2V2.3h6.2c9.1,0,14.4,3,14.3,11.9C147.7,21.7,142.5,24,133.5,24"/>
							<path id="actor_3" opacity="1" fill-opacity="1" class="logo-red logo-very" d="M133.5,24h-6.2V2.3h6.2c9.1,0,14.4,3,14.3,11.9C147.7,21.7,142.5,24,133.5,24"/>
							<path class="logo-black logo-very" d="M145.4,50.4c-11.5,0-17.6-6-17.6-17.3v-4.7h6.3c5.6,0,9.5,1.2,12,3.8s3.8,6.6,3.7,12.2l-0.1,6L145.4,50.4L145.4,50.4z"/>
							<path class="logo-black logo-very" d="M183.4,49.8l-0.1-17.2H183l0.2-0.5L168.7,2.3h-20.5l18.4,36v11.5H183.4z"/>
							<path class="logo-yellow logo-very" d="M201.9,11.2c0,7-4.2,11.2-11.2,11.2s-11.2-4.2-11.2-11.2S183.7,0,190.7,0S201.9,4.2,201.9,11.2"/>
							<path class="logo-red logo-peace" d="M200.5,23.2L200.5,23.2c1.2,4,1.7,8,1.7,12.5c0,2-0.4,4-1.3,5.9c-0.9,1.8-2,3.5-3.5,4.9c-3,3-6.9,4.7-10.6,4.7
								c-3.6,0-6.4-1-8.3-3c-1.6-1.7-2.5-4-2.8-6.9c0.1-1.1,0.3-2.1,0.5-3c-1.1-0.5-2-1.5-2.7-2.8l-4.5-7.3l3.2-4.3
								c0.8-0.5,1.5-0.8,2.2-0.8h0.1l-0.8-1.3l4.5-4.7l1.5-0.6l-2.2-5c-1.1-1.9-1.2-3.5-0.1-5.6l5-4.4c0.8-0.7,1.7-1.1,2.8-1.1
								c2,0,3.4,1.3,3.9,3.2l1.6,6.9l0.7-6.8l5.8-3.8l1.1,0.4c4,1.5,5.4,4.8,4.4,9.7L200.5,23.2z M178,32.5c0.5,0.7,1.3,1.1,2.5,1.1
								c0.9,0,1.7-0.2,2.3-0.6c-2-0.7-3.6-2.3-4.4-4.2l-0.1,0.1l-2.4-3.9l0.1,0.4h-0.5c-0.9,0-1.7,0.5-1.8,0.9l-0.1,0.2L178,32.5z
								 M178.5,20.8l3,4.4l1.5-1.5h0.1l-1.7-3.9c-0.1-0.1-0.3-0.1-0.5-0.1c-0.5,0-1,0.1-1.4,0.5L178.5,20.8z M180.6,6l7.1,16.6l2.3-0.5
								l-5.6-15.5c-0.3-0.7-0.9-1.1-1.7-1.1c-0.5,0-1.2,0.1-1.8,0.5L180.6,6z M199,41c0.2-1.7-0.1-3.4-0.7-5c-0.6-1.5-1.6-3.1-3-4.7
								l-4.8-5.8l-7.1,2.4l0.1,0.2c0.7,1.9,3.9,2.6,7.1,1.2l0.5,0.9c-2.1,3.9-1.9,6.9,0.5,8.5c0.5,0.3,1.2,0.5,2,0.5c1,0,2-0.3,2.6-0.7
								l0.7,1.3c-1.7,3-4,4.6-6.5,4.6c-1.5,0-2.9-0.7-4-1.8s-1.7-2.9-1.7-4.7c0-0.9,0.2-1.8,0.5-2.6l-2,2c-0.7,0.5-1.4,0.9-2.2,1.3
								c0.1,2.8,0.8,4.8,2.2,6.2c1.5,1.5,3.9,2.4,7.1,2.4c2.3,0,4.6-0.9,6.4-2.6C197.7,43.3,198.4,42.2,199,41z M196.2,4.6l-2.2,17l1.9,2.5
								l2.2-13.4c0.5-3.3,0.1-4.4-1.1-5.6V5L196.2,4.6z"/>
							<path id="actor_4" opacity="1" fill-opacity="1" class="logo-red logo-very" d="M201.9,11.2c0,7-4.2,11.2-11.2,11.2s-11.2-4.2-11.2-11.2S183.7,0,190.7,0S201.9,4.2,201.9,11.2"/>
							<path class="logo-black" d="M237.2,51.3h1.3V2h-1.3c-13.3,0-19.9,8.2-19.7,24.9l0,0C217.7,43.3,224.1,51.3,237.2,51.3"/>
							<path class="logo-yellow" d="M265.9,12.3c0,7.2-4.4,11.6-11.6,11.6s-11.6-4.3-11.6-11.6s4.4-11.6,11.6-11.6S265.9,5.1,265.9,12.3"/>
							<path id="actor_5" opacity="1" fill-opacity="1" class="logo-red" d="M265.9,12.3c0,7.2-4.4,11.6-11.6,11.6s-11.6-4.3-11.6-11.6s4.4-11.6,11.6-11.6S265.9,5.1,265.9,12.3"/>
							<path class="logo-black" d="M243.2,50.3V44c0-10.9,4.2-15.7,13.7-15.7h0.4l5.2,0.1v4.3c0,8-2.6,17.5-15.3,17.5L243.2,50.3L243.2,50.3z"/>
							<path class="logo-black" d="M288,51.3h1.3V2H288c-13.3,0-19.9,8.2-19.7,24.9l0,0C268.5,43.2,274.9,51.3,288,51.3"/>
							<path class="logo-yellow" d="M296.1,2h-1.3v49.4h1.3c13.3,0,19.9-8.5,19.7-25.2C315.6,9.8,309.2,2,296.1,2"/>
							<path id="actor_6" opacity="1" fill-opacity="1" class="logo-red" d="M296.1,2h-1.3v49.4h1.3c13.3,0,19.9-8.5,19.7-25.2C315.6,9.8,309.2,2,296.1,2" />
							<path class="logo-black" d="M340.4,51.3h1.3V2h-1.3c-13.3,0-19.9,8.2-19.7,24.9l0,0C320.9,43.2,327.3,51.3,340.4,51.3" />
							<path class="logo-yellow" d="M348.5,2h-1.3v49.4h1.3c13.3,0,19.9-8.5,19.7-25.2C368,9.8,361.6,2,348.5,2"/>
							<path id="actor_7" opacity="1" fill-opacity="1" class="logo-red" d="M348.5,2h-1.3v49.4h1.3c13.3,0,19.9-8.5,19.7-25.2C368,9.8,361.6,2,348.5,2" />
							<rect class="logo-black" x="373.6" y="2.8" width="16.9" height="47.8" />
							<path class="logo-yellow" d="M394.9,50.3c0.1-14.8,6.3-23.6,16.5-23.6h1.3v23.6H394.9z"/>
							<path id="actor_8" opacity="1" fill-opacity="1" class="logo-red" d="M394.9,50.3c0.1-14.8,6.3-23.6,16.5-23.6h1.3v23.6H394.9z" />
							<!-- Christmas Edition -->
							<!--<script type="text/ecmascript"><![CDATA[(function(){var actors={};actors.actor_1={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_1"),type:"square",opacity:1};actors.actor_2={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_2"),type:"square",opacity:1};actors.actor_3={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_3"),type:"square",opacity:1};actors.actor_4={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_4"),type:"square",opacity:1};actors.actor_5={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_5"),type:"square",opacity:1};actors.actor_6={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_6"),type:"square",opacity:1};actors.actor_7={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_7"),type:"square",opacity:1};actors.actor_8={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_8"),type:"square",opacity:1};var tricks={};tricks.trick_1=(function(t,i){i=(function(n){return 1==n?1:1-Math.pow(2,-10*n)})(i)%1,i=0>i?1+i:i;var _=t.node;0.6>=i?_.setAttribute("opacity",i*(t.opacity/0.6)):i>=0.9?_.setAttribute("opacity",t.opacity-(i-0.9)*(t.opacity/(1-0.9))):_.setAttribute("opacity",t.opacity)});var scenarios={};scenarios.scenario_1={actors: ["actor_1","actor_2","actor_3","actor_4","actor_5","actor_6","actor_7","actor_8"],tricks: [{trick: "trick_1",start:0,end:1}],startAfter:0,duration:1200,actorDelay:400,repeat:0,repeatDelay:0};var _reqAnimFrame=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.oRequestAnimationFrame,fnTick=function(t){var r,a,i,e,n,o,s,c,m,f,d,k,w;for(c in actors)actors[c]._tMatrix=[1,0,0,1,0,0];for(s in scenarios)for(o=scenarios[s],m=t-o.startAfter,r=0,a=o.actors.length;a>r;r++){if(i=actors[o.actors[r]],i&&i.node&&i._tMatrix)for(f=0,m>=0&&(d=o.duration+o.repeatDelay,o.repeat>0&&m>d*o.repeat&&(f=1),f+=m%d/o.duration),e=0,n=o.tricks.length;n>e;e++)k=o.tricks[e],w=(f-k.start)*(1/(k.end-k.start)),tricks[k.trick]&&tricks[k.trick](i,Math.max(0,Math.min(1,w)));m-=o.actorDelay}for(c in actors)i=actors[c],i&&i.node&&i._tMatrix&&i.node.setAttribute("transform","translate(-6.9 -3.74)");_reqAnimFrame(fnTick)};_reqAnimFrame(fnTick);})()]]></script>-->
							<script type="text/ecmascript"><![CDATA[(function(){var actors={};actors.actor_1={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_1"),type:"square",opacity:1};actors.actor_2={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_2"),type:"square",opacity:1};actors.actor_3={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_3"),type:"square",opacity:1};actors.actor_4={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_4"),type:"square",opacity:1};actors.actor_5={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_5"),type:"square",opacity:1};actors.actor_6={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_6"),type:"square",opacity:1};actors.actor_7={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_7"),type:"square",opacity:1};actors.actor_8={node:document.getElementById("SVG-Circus-2fbebd4f-3289-1ff7-b576-77a6c417d914").getElementById("actor_8"),type:"square",opacity:1};var tricks={};tricks.trick_1=(function(t,i){i=(function(n){return 1==n?1:1-Math.pow(2,-10*n)})(i)%1,i=0>i?1+i:i;var _=t.node;0.6>=i?_.setAttribute("opacity",i*(t.opacity/0.6)):i>=0.9?_.setAttribute("opacity",t.opacity-(i-0.9)*(t.opacity/(1-0.9))):_.setAttribute("opacity",t.opacity)});var scenarios={};scenarios.scenario_1={actors: ["actor_1","actor_2","actor_3","actor_4","actor_5","actor_6","actor_7","actor_8"],tricks: [{trick: "trick_1",start:0,end:1}],startAfter:0,duration:2000,actorDelay:100,repeat:0,repeatDelay:0};var _reqAnimFrame=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.oRequestAnimationFrame,fnTick=function(t){var r,a,i,e,n,o,s,c,m,f,d,k,w;for(c in actors)actors[c]._tMatrix=[1,0,0,1,0,0];for(s in scenarios)for(o=scenarios[s],m=t-o.startAfter,r=0,a=o.actors.length;a>r;r++){if(i=actors[o.actors[r]],i&&i.node&&i._tMatrix)for(f=0,m>=0&&(d=o.duration+o.repeatDelay,o.repeat>0&&m>d*o.repeat&&(f=1),f+=m%d/o.duration),e=0,n=o.tricks.length;n>e;e++)k=o.tricks[e],w=(f-k.start)*(1/(k.end-k.start)),tricks[k.trick]&&tricks[k.trick](i,Math.max(0,Math.min(1,w)));m-=o.actorDelay}for(c in actors)i=actors[c],i&&i.node&&i._tMatrix&&i.node;_reqAnimFrame(fnTick)};_reqAnimFrame(fnTick);})()]]></script>
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
