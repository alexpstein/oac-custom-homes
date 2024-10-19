<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OAC
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<!-- Browser update script -->
	<script> 
		var $buoop = {required:{e:-4,f:-3,o:-3,s:-1,c:-3},insecure:true,api:2024.10 }; 
		function $buo_f(){ 
		var e = document.createElement("script"); 
		e.src = "//browser-update.org/update.min.js"; 
		document.body.appendChild(e);
		};
		try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
		catch(e){window.attachEvent("onload", $buo_f)}
	</script>
	<!-- End browser update script -->
</head>

<body <?php body_class(); ?>>
<script>
	(function(doc, classToAdd){
		doc.className = (doc.className).replace("no-js", classToAdd);
	})(document.documentElement, "js");
</script>
<noscript><div class="no-js-alert"><p><?php _e( 'Please enable JavaScript in your browser to use this site.', '_themename' ); ?></p></div></noscript>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'oac' ); ?></a>

	<header id="masthead" class="site-header<?php if ( is_admin_bar_showing() ) { echo ' site-header--admin-bar'; }; ?>">
		<div class="container-xl">
			<div class="row">
				<div class="col-8 col-lg-4">
					<div class="site-branding">
						<?php
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
						
						if ( is_front_page() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo $logo[0]; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" class="logo logo--navbar"></a></h1>
						<?php
						else : 
						$logo_alt = sprintf( __( 'Go to %s home page', '_themename' ), get_bloginfo( 'name' ) );	
						?>
							<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo $logo[0]; ?>" alt="<?php echo $logo_alt; ?>" class="logo logo--navbar"></a></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-4 col-lg-8">
					<div id="site-navigation" class="main-navigation">
						<nav class="main-navigation__featured" aria-label="<?php _e( 'Featured Links', '_themename' ); ?>">
							<ul id="featured-menu" class="main-navigation__feat-menu menu">
								<?php
								wp_nav_menu(
									array(
										'container' => '',
										'items_wrap' => '%3$s',
										'theme_location' => 'menu-2',
										'walker' => new Nav_Walker_Nav_Menu()
									)
								);
								?>
							</ul>
						</nav>

						<button class="menu-toggle" aria-controls="main-menu-dialog" aria-expanded="false">
							<span></span>
							<span></span>
							<span class="menu-toggle__text d-lg-none"><?php esc_html_e( 'Menu', '_themename' ); ?></span>
							<span class="menu-toggle__text d-none d-lg-block"><?php esc_html_e( 'More', '_themename' ); ?></span>
						</button>

						<div class="main-navigation__container" id="main-menu-dialog" role="dialog" aria-label="<?php _e( 'Main Navigation', '_themename' ); ?>">
							<div class="main-navigation__controls">
								<img src="<?php echo $logo[0]; ?>" alt="<?php echo get_bloginfo( 'name'); ?>" class="main-navigation__logo logo">
								<button id="mobile-nav-close" class="main-navigation__close">
									<span aria-hidden="true"><?php esc_html_e( '&times;', '_themename' ); ?></span>
									<span class="screen-reader-text"><?php esc_html_e( 'Close', '_themename' ); ?></span>
								</button>
							</div>
							
							<nav class="main-navigation__nav" aria-label="<?php _e( 'Main', '_themename' ); ?>">
								<ul id="primary-menu" class="main-navigation__menu menu">
									<?php
									wp_nav_menu(
										array(
											'container' => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'menu-1',
											'walker' => new Nav_Walker_Nav_Menu()
										)
									);
									?>
								</ul>
							</nav>
							<?php _themename_socials( 'header', 'Main navigation social media links' ); ?>
						</div><!-- .main-navigation__container -->
					</div><!-- #site-navigation -->
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
