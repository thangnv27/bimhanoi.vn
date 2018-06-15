<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
$css_class .= ' ' . $style;
if ( $style == 'grid' ) {
	$css_class .= ' cols_' . $per_row;
}
$testimonials = new WP_Query( array( 'post_type' => 'stm_staff', 'posts_per_page' => $count ) );

?>

<?php if ( $testimonials->have_posts() ) { ?>
	<div class="staff_list<?php echo esc_attr( $css_class ); ?>">
		<ul>
			<?php while ( $testimonials->have_posts() ): $testimonials->the_post(); ?>
				<li>
					<?php if( has_post_thumbnail() ): ?>
						<div class="staff_image">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'consulting-image-350x250-croped' ); ?>
							</a>
						</div>
					<?php endif; ?>
					<div class="staff_info">
						<h4 class="no_stripe">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h4>
						<?php if( $department = get_post_meta( get_the_ID(), 'department', true ) ): ?>
							<div class="staff_department">
								<?php echo esc_html( $department ); ?>
							</div>
						<?php endif; ?>
						<?php
							if ( $style != 'grid' ) {
								$len = 155;
							}else{
								$len = 95;
							}
						?>
						<?php if( $excerpt = consulting_substr_text( get_the_excerpt(), $len ) ): ?>
							<p><?php echo esc_html( $excerpt ); ?></p>
						<?php endif; ?>
						<?php if ( $style != 'grid' ) : ?>
							<a href="<?php the_permalink(); ?>" class="button bordered size-sm icon_right"><?php esc_html_e( 'view profile', 'consulting' ); ?> <i class="fa fa-chevron-right"></i></a>
						<?php else: ?>
							<a class="read_more" href="<?php the_permalink(); ?>">
								<span><?php esc_html_e( 'view profile', 'consulting' ); ?></span>
								<i class=" fa fa-chevron-right stm_icon"></i>
							</a>
						<?php endif; ?>
					</div>
				</li>
			<?php endwhile;
			wp_reset_postdata(); ?>
		</ul>

	</div>

<?php } ?>