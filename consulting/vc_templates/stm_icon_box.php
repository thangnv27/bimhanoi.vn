<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );

if ( $v_align_middle ) {
	$css_class .= ' middle';
}

if ( $enable_hexagon ) {
	$css_class .= ' hexagon';
	if( $enable_hexagon_animation ){
		$css_class .= ' hexanog_animation';
	}
}

?>
<?php if( $style == 'icon_left' ){ ?>
	<div class="icon_box<?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $style ); ?> clearfix">
		<?php if( $icon ){ ?>
			<div class="icon" style="width: <?php echo esc_attr( $icon_width ); ?>px;"><i style="font-size: <?php echo esc_attr( $icon_size ); ?>px;" class="<?php echo esc_attr( $icon ); ?>"></i></div>
		<?php } ?>
		<div class="icon_text">
			<?php if ( $title ) { ?>
				<h5<?php echo ( $hide_title_line ) ? ' class="no_stripe"' : ''; ?>><?php echo wp_kses( $title, array( 'br' => array() ) ); ?></h5>
			<?php } ?>
			<?php echo wpb_js_remove_wpautop( $content, true ); ?>
		</div>
	</div>
<?php }elseif( $style == 'icon_left_transparent' ){ ?>
	<div class="icon_box<?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $style ); ?> clearfix">
		<?php if( $icon ){ ?>
			<div class="icon" style="width: <?php echo esc_attr( $icon_width ); ?>px;"><i style="font-size: <?php echo esc_attr( $icon_size ); ?>px;" class="<?php echo esc_attr( $icon ); ?>"></i></div>
		<?php } ?>
		<?php if ( $title ) { ?>
			<h5<?php echo ( $hide_title_line ) ? ' class="no_stripe"' : ''; ?>><?php echo wp_kses( $title, array( 'br' => array() ) ); ?></h5>
		<?php } ?>
		<div class="icon_text">
			<?php echo wpb_js_remove_wpautop( $content, true ); ?>
		</div>
	</div>
<?php }else{ ?>
	<div class="icon_box<?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $style ); ?> clearfix">
		<?php if( $icon ){ ?>
			<div class="icon" style="height: <?php echo esc_attr( $icon_height ); ?>px;"><i style="font-size: <?php echo esc_attr( $icon_size ); ?>px;" class="<?php echo esc_attr( $icon ); ?>"></i></div>
		<?php } ?>
		<div class="icon_text">
			<?php if ( $title ) { ?>
				<h4<?php echo ( $hide_title_line ) ? ' class="no_stripe"' : ''; ?>><?php echo wp_kses( $title, array( 'br' => array() ) ); ?></h4>
			<?php } ?>
			<?php echo wpb_js_remove_wpautop( $content, true ); ?>
		</div>
	</div>
<?php } ?>