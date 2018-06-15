<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'slick' );
wp_enqueue_style( 'slick' );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );

$args = array(
	'post_type'      => 'stm_testimonials',
	'posts_per_page' => $count
);

$link = vc_build_link( $link );

if ( $category != 'all' ) {
	$args['testimonial_category'] = $category;
}

if( $per_row ){
	$css_class .= ' per_row_' . $per_row;
}

if( $disable_carousel ){
	$css_class .= ' disable_carousel';
}

$testimonials = new WP_Query( $args );
$id           = uniqid( 'partners_carousel_' );
?>
<?php if( $testimonials->have_posts() ): ?>
	<div class="testimonials_carousel<?php echo esc_attr( $css_class ); ?>" id="<?php echo esc_attr( $id ); ?>">
		<?php while( $testimonials->have_posts() ): $testimonials->the_post(); ?>
			<div class="testimonial">
				<?php if( has_post_thumbnail() ): ?>
					<div class="image">
						<?php if ( $link['url'] ): ?>
							<a href="<?php echo esc_url( $link['url'] ); ?>">
								<?php the_post_thumbnail( 'consulting-image-350x250-croped' ); ?>
							</a>
						<?php else: ?>
							<?php the_post_thumbnail( 'consulting-image-350x250-croped' ); ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<div class="info">
					<h4 class="no_stripe">
						<?php if ( $link['url'] ): ?>
							<a href="<?php echo esc_url( $link['url'] ); ?>">
								<?php the_title(); ?>
							</a>
						<?php else: ?>
							<?php the_title(); ?>
						<?php endif; ?>
					</h4>
					<?php if( $position = get_post_meta( get_the_ID(), 'testimonial_position', true ) ): ?>
						<div class="position"><?php echo esc_html( $position ); ?></div>
					<?php endif; ?>
					<?php if( $company = get_post_meta( get_the_ID(), 'testimonial_company', true ) ): ?>
						<div class="company"><?php echo esc_html( $company ); ?></div>
					<?php endif; ?>
					<?php the_excerpt(); ?>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	<?php if( ! $disable_carousel ): ?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				"use strict";
				var <?php echo esc_attr( $id ) ?> = $("#<?php echo esc_attr( $id ) ?>");
				<?php echo esc_attr( $id ) ?>.slick({
					dots: false,
					infinite: true,
					arrows: true,
					autoplaySpeed: 5000,
					autoplay: true,
					slidesToShow: <?php echo esc_js( $per_row ); ?>,
					prevArrow: "<div class=\"slick_prev\"><i class=\"fa fa-chevron-left\"></i></div>",
					nextArrow: "<div class=\"slick_next\"><i class=\"fa fa-chevron-right\"></i></div>",
					cssEase: "cubic-bezier(0.455, 0.030, 0.515, 0.955)",
					responsive: [
						{
							breakpoint: 769,
							settings: {
								slidesToShow: 1
							}
						}
					]
				});
			});
		</script>
	<?php endif; ?>
<?php endif; ?>