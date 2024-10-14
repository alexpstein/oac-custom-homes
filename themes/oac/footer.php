<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OAC
 */

?>

	<footer id="footer-main" class="footer">
		<div class="container-xl">
			<div class="footer__main">
				<div class="footer__sm-left">
					<div class="footer__nav-wrapper">
						<h2 class="footer__header"><?php _e( 'Site Map', '_themename' ); ?></h2>
						<nav id="footer-nav" class="footer__nav" aria-label="<?php _e( 'Site Map', '_themename' ); ?>">
							<ul class="menu footer__nav-menu">
								<?php
								wp_nav_menu(
									array(
										'container' => '',
										'items_wrap' => '%3$s',
										'theme_location' => 'menu-footer'
									)
								);
								?>
							</ul>
						</nav>
					</div>
					<?php if ( have_rows( 'contact_information', 'option' ) ) : ?>
					<div class="footer__contact">
						<h2 class="footer__header"><?php _e( 'Contact', '_themename' ); ?></h2>
						
						<?php while ( have_rows( 'contact_information', 'option' ) ): the_row();

							// Get sub fields
							$contact_addr = get_sub_field( 'contact_address' );
							$contact_phone = get_sub_field( 'contact_phone_numbers' );
							$contact_email = get_sub_field( 'contact_email' );

							if ( ! empty( $contact_addr ) ) :
						?>
							<div class="footer__contact-addr footer__contact-flex">
								<div class="footer__contact-i" aria-hidden="true">
									<?php echo file_get_contents( get_template_directory_uri() . '/dist/images/icon-address.svg' ); ?>
								</div>
								<div class="footer__contact-text">
									<?php echo wpautop( $contact_addr ); ?>
								</div>
							</div>
						<?php
							endif;
							if ( ! empty ( $contact_phone ) ) :
						?>
							<div class="footer__contact-phone footer__contact-flex">
								<div class="footer__contact-i" aria-hidden="true">
									<?php echo file_get_contents( get_template_directory_uri() . '/dist/images/icon-phone.svg' ); ?>
								</div>
								<div class="footer__contact-text">
									<?php echo wpautop( $contact_phone ); ?>
								</div>
							</div>
						<?php
							endif;
							if ( ! empty ( $contact_email ) ) :
						?>
							<div class="footer__contact-email footer__contact-flex">
								<div class="footer__contact-i" aria-hidden="true">
									<?php echo file_get_contents( get_template_directory_uri() . '/dist/images/icon-email.svg' ); ?>
								</div>
								<div class="footer__contact-text">
									<?php echo wpautop( '<a href="' . esc_url( 'mailto:' . antispambot( $contact_email ) ) . '">' . esc_html( antispambot( $contact_email ) ) . '</a>' ); ?>
								</div>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="footer__social">
					<?php
					_themename_socials( 'footer' );
					if ( ! empty ( get_field( 'footer_logo', 'option' ) ) ) :
						$footer_logo = get_field( 'footer_logo', 'option' );
						$footer_logo_retina = get_field ( 'footer_logo_retina', 'option' );
						$footer_logo_alt = sprintf( __( '%s home page', '_themename' ), get_bloginfo( 'name' ) );
					?>
					<a href="<?php echo get_bloginfo( 'url' ); ?>" class="footer__logo-link">
						<img src="<?php echo $footer_logo['url']; ?>" srcset="<?php echo $footer_logo['url'] . ' 1x, ' . $footer_logo_retina . ' 2x '; ?>" class="footer__logo" alt="<?php echo $footer_logo_alt; ?>">
					</a>
					<?php
					endif;
					?>
				</div>
			</div>
			<div class="footer__copyright">
				<?php echo wpautop( str_replace( '%year%', date('Y'), get_field( 'site_copyright', 'option' ) ) ); ?>
			</div>
		</div>
	</footer><!-- #footer-main -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
