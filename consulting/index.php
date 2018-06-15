<?php consulting_get_header(); ?>
<?php
$sidebar_type = get_theme_mod( 'blog_sidebar_type', 'wp' );
if ( $sidebar_type == 'wp' ) {
	$sidebar_id = get_theme_mod( 'blog_wp_sidebar', 'consulting-right-sidebar' );
} else {
	$sidebar_id = get_theme_mod( 'blog_vc_sidebar' );
}
if ( ! empty( $_GET['sidebar_id'] ) ) {
	$sidebar_id =  $_GET['sidebar_id'];
}
$structure = consulting_get_structure( $sidebar_id, $sidebar_type, get_theme_mod( 'blog_sidebar_position', 'right' ), get_theme_mod( 'blog_layout' ) ); ?>

<?php echo $structure['content_before']; ?>
	<div class="<?php echo esc_attr( $structure['class'] ); ?>">
		<ul>
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();

					if ( consulting_blog_layout() == 'grid' ) {
						get_template_part( 'partials/content', 'loop_grid' );
					}else{
						get_template_part( 'partials/content', 'loop_list' );
					}

				endwhile;
			else:
				get_template_part( 'partials/content', 'none' );
			endif;
			?>
		</ul>
	</div>
<?php
echo paginate_links( array(
	'type'      => 'list',
	'prev_text' => '<i class="fa fa-chevron-left"></i>',
	'next_text' => '<i class="fa fa-chevron-right"></i>',
) );
?>
<?php echo $structure['content_after']; ?>
<?php echo $structure['sidebar_before']; ?>
<?php
if ( $sidebar_id ) {
	if ( $sidebar_type == 'wp' ) {
		$sidebar = true;
	} else {
		$sidebar = get_post( $sidebar_id );
	}
}
if ( isset( $sidebar ) ) {
	if ( $sidebar_type == 'vc' ) { ?>
		<div class="sidebar-area stm_sidebar">
			<style type="text/css" scoped>
				<?php echo get_post_meta( $sidebar_id, '_wpb_shortcodes_custom_css', true ); ?>
			</style>
			<?php echo apply_filters( 'the_content', $sidebar->post_content ); ?>
		</div>
	<?php } else { ?>
		<div class="sidebar-area default_widgets">
			<?php dynamic_sidebar( $sidebar_id ); ?>
		</div>
	<?php }
}
?>
<?php echo $structure['sidebar_after']; ?>

<?php get_footer(); ?>