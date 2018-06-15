<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
$args      = array(
	'post_type'      => 'stm_testimonials',
	'posts_per_page' => $count
);
if ( $per_row ) {
	$css_class .= ' cols_' . $per_row;
}
if ( $style ) {
	$css_class .= ' ' . $style;
}
if ( $category != 'all' ) {
	$args['testimonial_category'] = $category;
}
$testimonials = new WP_Query( $args );
?>

<?php if ( $testimonials->have_posts() ): ?>
	<div class="stm_testimonials<?php echo esc_attr( $css_class ); ?>">
		<?php while ( $testimonials->have_posts() ): $testimonials->the_post(); ?>
			<div class="item">
				<div class="testimonial"><?php the_excerpt(); ?></div>
				<div class="testimonial-info clearfix">
					<div class="testimonial-image"><?php the_post_thumbnail( 'consulting-image-50x50-croped' ); ?></div>
					<div class="testimonial-text">
						<div class="name"><?php the_title(); ?></div>
						<div class="company">
							<?php
							echo esc_html( get_post_meta( get_the_ID(), 'testimonial_position', true ) );
							if( $company = get_post_meta( get_the_ID(), 'testimonial_company', true ) ){
								echo ', ' . esc_html( $company );
							}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
<?php endif; ?>