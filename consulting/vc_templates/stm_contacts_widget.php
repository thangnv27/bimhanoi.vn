<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );

$css_class .= ' ' . $class;

?>


<div class="stm_contacts_widget<?php echo esc_attr( $css_class ); ?>">
	<?php if( $title ): ?>
		<h4 class="no_stripe"><?php echo esc_attr( $title ); ?></h4>
	<?php endif; ?>
	<ul>
		<?php if( $address ): ?>
			<li>
				<div class="icon"><i class="fa fa-map-marker"></i></div>
				<div class="text"><?php echo wp_kses( $address, array( 'br' => array() ) ); ?></div>
			</li>
		<?php endif; ?>
		<?php if( $phone ): ?>
			<li>
				<div class="icon"><i class="fa fa-phone"></i></div>
				<div class="text"><?php echo esc_attr( $phone ); ?></div>
			</li>
		<?php endif; ?>
		<?php if( $email ): ?>
			<li>
				<div class="icon"><i class="fa fa-envelope"></i></div>
				<div class="text"><a href="mailto:<?php echo antispambot( $email ); ?>"><?php echo antispambot( $email ); ?></a></div>
			</li>
		<?php endif; ?>
	</ul>
	<?php if( $facebook || $twitter || $linkedin || $google_plus || $skype || $youtube ): ?>
		<ul class="socials">
				<?php if( $facebook ): ?>
					<li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank" class="social-facebook"><i class="fa fa-facebook"></i></a></li>
				<?php endif; ?>
				<?php if( $twitter ): ?>
					<li><a href="<?php echo esc_url( $twitter ); ?>" target="_blank" class="social-twitter"><i class="fa fa-twitter"></i></a></li>
				<?php endif; ?>
				<?php if( $linkedin ): ?>
					<li><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" class="social-linkedin"><i class="fa fa-linkedin"></i></a></li>
				<?php endif; ?>
				<?php if( $google_plus ): ?>
					<li><a href="<?php echo esc_url( $google_plus ); ?>" target="_blank" class="social-google-plus"><i class="fa fa-google-plus"></i></a></li>
				<?php endif; ?>
				<?php if( $youtube ): ?>
					<li><a href="<?php echo esc_url( $youtube ); ?>" target="_blank" class="social-youtube"><i class="fa fa-youtube"></i></a></li>
				<?php endif; ?>
				<?php if( $skype ): ?>
					<li><a href="skype:<?php echo esc_attr( $skype ); ?>" class="social-skype"><i class="fa fa-skype"></i></a></li>
				<?php endif; ?>
		</ul>
	<?php endif; ?>
</div>