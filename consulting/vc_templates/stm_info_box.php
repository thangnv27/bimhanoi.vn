<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
$link = vc_build_link( $link );

if( $align_center ){
	$css_class .= ' align_center';
}

if( $style ){
	$css_class .= ' ' . $style;
}

$image_size = 'consulting-image-350x204-croped';

if( $style == 'style_3' ){
	$image_size = 'consulting-image-350x250-croped';
}

?>

<div class="info_box<?php echo esc_attr( $css_class ); ?>">
<?php if( $image && $thumbnail = wp_get_attachment_image( $image, $image_size ) ){ ?>
	<div class="info_box_image"><?php echo $thumbnail; ?></div>
<?php } ?>
<?php if( $style == 'style_3' ): ?>
	<div class="info_box_text">
<?php endif; ?>
<?php if ( $title ) { ?>
	<div class="title">
		<?php if( $style == 'style_3' ): ?>
			<div class="icon">
				<i class="<?php echo esc_attr( $title_icon ); ?>"></i>
			</div>
		<?php endif; ?>
		<?php if( $style == 'style_3' ): ?>
			<h6 class="no_stripe"><?php echo esc_html( $title ); ?></h6>
		<?php else: ?>
			<h4 class="no_stripe"><?php echo esc_html( $title ); ?></h4>
		<?php endif; ?>
	</div>
<?php } ?>
<?php echo wpb_js_remove_wpautop( $content, true ); ?>
<?php
	if ( $link['url'] ) {
		if ( ! $link['title'] ) {
			$link['title'] = esc_html__( 'Read More', 'consulting' );
		}
		if ( ! $link['target'] ) {
			$link['target'] = '_self';
		}
		if( $icon ){
			$link['title'] = '<span>' . esc_html( $link['title'] ) . '</span>' . '<i class=" ' . esc_attr( $icon ) . ' stm_icon"></i>';
		}
		echo ' <a class="read_more" target="' . esc_attr( $link['target'] ) . '" href="' . esc_url( $link['url'] ) . '">' . $link['title'] . '</a>';
	}
?>
<?php if( $style == 'style_3' ): ?>
	</div>
<?php endif; ?>
</div>