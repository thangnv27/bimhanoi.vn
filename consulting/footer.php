<?php if( ! is_404() ): ?>
	</div> <!--.container-->
	</div> <!--#main-->
	</div> <!--.content_wrapper-->
	<footer id="footer">
		<?php if( get_theme_mod( 'footer_sidebar_count', 4 ) != 'disable' ): ?>
			<div class="widgets_row">
				<div class="container">
					<div class="footer_widgets">
						<div class="row">
							<?php
							$footer_sidebar_count = intval( get_theme_mod( 'footer_sidebar_count', 4 ) );
							$col = 12 / $footer_sidebar_count;
							for ( $count = 1; $count <= $footer_sidebar_count; $count ++ ): ?>
								<div class="col-lg-<?php echo esc_attr( $col ); ?> col-md-<?php echo esc_attr( $col ); ?> col-sm-6 col-xs-12">
									<?php if( $count == 1 ): ?>
										<?php if( $footer_logo = get_theme_mod( 'footer_logo', get_template_directory_uri() . '/assets/images/tmp/logo_default.svg' ) ): ?>
											<div class="footer_logo">
												<a href="<?php echo esc_url( home_url( '/' ) ) ?>">
													<img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
												</a>
											</div>
										<?php endif; ?>
										<?php if( $footer_text = get_theme_mod( 'footer_text', esc_html__( 'Fusce interdum ipsum egestas urna amet fringilla, et placerat ex venenatis. Aliquet luctus pharetra. Proin sed fringilla lectusar sit amet tellus in mollis. Proin nec egestas nibh, eget egestas urna. Phasellus sit amet vehicula nunc. In hac habitasse platea dictumst. ', 'consulting' ) ) ): ?>
											<div class="footer_text">
												<p><?php echo esc_html( $footer_text ); ?></p>
											</div>
										<?php endif; ?>
									<?php endif; ?>
									<?php dynamic_sidebar( 'consulting-footer-' . $count ); ?>
								</div>
							<?php endfor; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="copyright_row<?php echo (get_theme_mod( 'footer_sidebar_count', 4 ) == 'disable') ? ' widgets_disabled' : ''; ?>">
			<div class="container">
				<div class="copyright_row_wr">
					<?php if ( $socials = consulting_get_socials( 'footer_socials' ) ): ?>
						<div class="socials">
							<ul>
								<?php foreach( $socials as $key => $val ): ?>
									<li>
										<a href="<?php echo esc_url( $val ); ?>" target="_blank" class="social-<?php echo esc_attr( $key ); ?>">
											<i class="fa fa-<?php echo esc_attr( $key ); ?>"></i>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>
					<?php if( $copyright = get_theme_mod( 'footer_copyright', wp_kses( __( "Copyright &copy; 2012-2015 Consulting Theme by <a href='http://stylemixthemes.com/' target='_blank'>Stylemix Themes</a>. All rights reserved", 'consulting' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ) ) ): ?>
						<div class="copyright">
							<?php echo wp_kses( $copyright, array( 'a' => array( 'href' => array(), 'target' => array() ) ) ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</footer>
	</div> <!--#wrapper-->
<?php endif; ?>
<?php
if ( get_theme_mod( 'frontend_customizer' ) ) {
	get_template_part( 'partials/frontend_customizer' );
}
?>
<?php wp_footer(); ?>
</body>
</html>