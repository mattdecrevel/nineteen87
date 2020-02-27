<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package gotheme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<?php // block robots on google searches for certain pages 
		if( get_field( 'block_search' )) { ?>
		 <meta name=“robots” content=“noindex,nofollow”>
	<?php } ?>
	
	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<!-- Favicons
	================================================== -->
	<link rel="icon" type="image/x-icon" href="/wp-content/themes/gotheme/images/favicons/favicon.ico">
	<link rel="apple-touch-icon-precomposed" href="/wp-content/themes/gotheme/images/favicons/apple-icon.png">
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/wp-content/themes/gotheme/images/favicons/apple-icon-57x57.png">
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="/wp-content/themes/gotheme/images/favicons/apple-icon-60x60.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/wp-content/themes/gotheme/images/favicons/apple-icon-72x72.png">
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/wp-content/themes/gotheme/images/favicons/apple-icon-76x76.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/wp-content/themes/gotheme/images/favicons/apple-icon-114x114.png">
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/wp-content/themes/gotheme/images/favicons/apple-icon-120x120.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/wp-content/themes/gotheme/images/favicons/apple-icon-144x144.png">
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/wp-content/themes/gotheme/images/favicons/apple-icon-152x152.png">
	<link rel="apple-touch-icon-precomposed" sizes="180x180" href="/wp-content/themes/gotheme/images/favicons/apple-icon-180x180.png">
	<link rel="apple-touch-icon-precomposed" href="/wp-content/themes/gotheme/images/favicons/apple-icon-precomposed.png">
	<link rel="icon" type="image/png" href="/wp-content/themes/gotheme/images/favicons/android-icon-36x36.png" sizes=36x36>
	<link rel="icon" type="image/png" href="/wp-content/themes/gotheme/images/favicons/android-icon-48x48.png" sizes=48x48>
	<link rel="icon" type="image/png" href="/wp-content/themes/gotheme/images/favicons/android-icon-72x72.png" sizes=72x72>
	<link rel="icon" type="image/png" href="/wp-content/themes/gotheme/images/favicons/android-icon-96x96.png" sizes=96x96>
	<link rel="icon" type="image/png" href="/wp-content/themes/gotheme/images/favicons/android-icon-144x144.png" sizes=144x144>
	<link rel="icon" type="image/png" href="/wp-content/themes/gotheme/images/favicons/android-icon-192x192.png" sizes=192x192>

	<!-- Google Tag Manager
	================================================== -->
	<?php if ( get_field( 'aaga_gtm_code', 'option' ) ) { ?>
	<?php $gtm_code = get_field( 'aaga_gtm_code', 'option' ); ?>	
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','<?php echo esc_attr( $gtm_code ); ?>');</script>
	<!-- End Google Tag Manager -->
	<?php } ?>
	
	<!-- Google Webmaster Tools
	================================================== -->
	<?php if ( get_field( 'aaga_webmaster_code', 'option' ) ) { ?>
	<?php $gweb_code = get_field( 'aaga_webmaster_code', 'option' ); ?>
	<meta name="google-site-verification" content="<?php echo esc_attr( $gweb_code ); ?>" />
	<?php } ?>
	
	<!-- Fonts
	================================================== -->
	
	<!-- TYPEKIT -->
<!--
	<script>
	  (function(d) {
	    var config = {
	      kitId: 'ria1dfw',
	      scriptTimeout: 3000,
	      async: true
	    },
	    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	  })(document);
	</script>
	
	
	
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="https://use.fontawesome.com/a51a4099f4.js"></script>
-->
		
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr( $gtm_code ); ?>"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->	
	
	<div id="page" class="hfeed site">
		<?php do_action( 'before' ); ?>
		<header id="masthead" class="site-header" role="banner">
	
			<!--! ^#Mobile Header -->
			<div class="mobile-header-wrap hidden-md hidden-lg">
				<div class="mobile-header">
					
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav><!-- #site-navigation -->
					
				</div><!--mobile-header-->
			</div><!--mobile-header-wrap-->
			
			<!--! ^#Desktop Header -->
			<div class="desktop-header-wrap hidden-xs hidden-sm">
				<div class="desktop-header">
					
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav><!-- #site-navigation -->
					
				</div><!--desktop-header-->
			</div><!--desktop-header-wrap-->
			
		</header><!-- #masthead -->
		<div id="content" class="site-content">
