<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );

$css_class .= ' cols_' . $cols;
$css_class .= ' ' . $style;

wp_enqueue_script( 'isotope' );
wp_enqueue_script( 'imagesloaded' );

$all_works = new WP_Query( array(
	'post_type'      => 'stm_works',
	'posts_per_page' => - 1
) );

$categories = get_terms( 'stm_works_category' );

$works_id = uniqid( 'stm_works_' );

if ( ! $img_size ) {
	$img_size = 'consulting-image-255x182-croped';
}

?>
<?php if( $all_works->have_posts() ): ?>
	<div id="<?php echo esc_attr( $works_id ); ?>" class="stm_works_wr<?php echo esc_attr( $css_class ); ?>">
		<?php if( $style == 'grid_with_filter' && $categories ): ?>
			<ul class="works_filter">
				<li class="active"><a href="#all"><?php esc_html_e( 'All', 'consulting' ); ?></a></li>
				<?php foreach( $categories as $cat ): ?>
					<li><a href="#<?php echo esc_attr( $cat->slug ); ?>"><?php echo esc_attr( $cat->name ); ?></a></li>
				<?php endforeach; ?>
			</ul>
			<div class="stm_works">
				<?php while( $all_works->have_posts() ): $all_works->the_post(); ?>
					<?php
					$work_class = '';
					$term_list  = wp_get_post_terms( get_the_ID(), 'stm_works_category' );
					if ( $term_list ) {
						foreach ( $term_list as $term ) {
							$work_class .= ' ' . $term->slug;
						}
					}
					?>
					<div class="item all<?php echo esc_attr( $work_class ); ?>">
						<div class="image">
							<?php
							if ( get_post_thumbnail_id() > 0 ) {
								$post_thumbnail = wpb_getImageBySize( array(
									'attach_id' => get_post_thumbnail_id(),
									'thumb_size' => $img_size,
								) );
							} else {
								$post_thumbnail = array();
								$post_thumbnail['thumbnail'] = '<img src="' . vc_asset_url( 'vc/no_image.png' ) . '" />';
								$post_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );
							}
							if ( strlen( get_the_title() ) > 71 ) {
								$title = substr( get_the_title(), 0, 71 ) . "...";
							} else {
								$title = get_the_title();
							}
							?>
							<a href="<?php the_permalink(); ?>"><?php echo $post_thumbnail['thumbnail']; ?></a>
						</div>
						<div class="info">
							<?php if( $term_list ): ?>
								<div class="category"><a href="#<?php echo esc_attr( $term_list[0]->slug ); ?>"><span><?php echo esc_html( $term_list[0]->name ); ?></span> <i class="fa fa-chevron-right"></i></a></div>
							<?php endif; ?>
							<div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		<?php else: ?>
			<div class="stm_works">
				<?php while( $all_works->have_posts() ): $all_works->the_post(); ?>
					<?php $term_list  = wp_get_post_terms( get_the_ID(), 'stm_works_category' ); ?>
					<div class="item">
						<div class="item_wr">
							<?php
							if ( get_post_thumbnail_id() > 0 ) {
								$post_thumbnail = wpb_getImageBySize( array(
									'attach_id' => get_post_thumbnail_id(),
									'thumb_size' => $img_size,
								) );
							} else {
								$post_thumbnail = array();
								$post_thumbnail['thumbnail'] = '<img src="' . vc_asset_url( 'vc/no_image.png' ) . '" />';
								$post_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );
							}
							echo $post_thumbnail['thumbnail'];
                                                        $title = get_the_title();
//							if ( strlen( get_the_title() ) > 50 ) {
//								$title = substr( get_the_title(), 0, 50 ) . "...";
//							} else {
//								$title = get_the_title();
//							}
							?>
							<div class="title"><?php echo esc_html( $title ); ?></div>
							<?php if( $term_list ): ?>
								<div class="category"><?php echo esc_html( $term_list[0]->name ); ?></div>
							<?php endif; ?>
							<a class="link" href="<?php the_permalink(); ?>"></a>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		<?php endif; ?>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				var $container = $("#<?php echo esc_js( $works_id ); ?> .stm_works");
				$container.isotope({
					itemSelector: '.item',
					transitionDuration: '0.7s'
				});
				$container.imagesLoaded().progress(function () {
					$container.isotope('layout');
				});
				$('#<?php echo esc_js( $works_id ); ?> .works_filter a').on('click', function () {
					$(this).closest('ul').find('li.active').removeClass('active');
					$(this).parent().addClass('active');
					var sort = $(this).attr('href');
					sort = sort.substring(1);
					$container.isotope({
						filter: '.' + sort
					});
					return false;
				});
				$('#<?php echo esc_js( $works_id ); ?> .item .category a').on('click', function () {
					var sort = $(this).attr('href');
					sort = sort.substring(1);
					$('#<?php echo esc_js( $works_id ); ?> .works_filter li.active').removeClass('active');
					$('#<?php echo esc_js( $works_id ); ?> .works_filter li a[href="#' + sort + '"]').closest('li').addClass('active');
					$container.isotope({
						filter: '.' + sort
					});
					return false;
				});
			});
		</script>
	</div>
<?php endif; ?>