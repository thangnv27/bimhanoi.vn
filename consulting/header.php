<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
	<div class="content_wrapper">
		<?php if( ! is_404() ): ?>
			<header id="header">
				<?php if ( empty( $_GET['hide_top_bar'] ) ): ?>
					<?php if ( get_theme_mod( 'top_bar', true ) ): ?>
						<div class="top_bar">
							<div class="container">
								<?php
								if ( get_theme_mod( 'wpml_switcher', true ) ) {
									do_action( 'wpml_add_language_selector' );
								}
								$top_bar_info = consulting_get_top_bar_info();
								?>
								<div class="top_bar_info_wr">
									<?php if ( count( $top_bar_info ) > 1 ): ?>
										<div class="top_bar_info_switcher">
											<div class="active">
												<span><?php echo esc_html( $top_bar_info[1]['office'], true ); ?></span>
											</div>
											<ul>
												<?php foreach ( $top_bar_info as $key => $val ): ?>
													<li>
														<a href="#top_bar_info_<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $val['office'], true ); ?></a>
													</li>
												<?php endforeach; ?>
											</ul>
										</div>
									<?php endif; ?>
									<?php if ( $top_bar_info ): ?>
										<?php foreach ( $top_bar_info as $key => $val ): ?>
											<ul class="top_bar_info" id="top_bar_info_<?php echo esc_attr( $key ); ?>"<?php if ( $key == 1 ) { echo ' style="display: block;"'; } ?>>
												<?php if ( ! empty( $val['address'] ) ): ?>
													<li>
														<i class="<?php echo esc_attr( $val['address_icon'] ); ?>"></i>
														<span><?php echo wp_kses_post( $val['address'] ); ?></span>
													</li>
												<?php endif; ?>
												<?php if ( ! empty( $val['hours'] ) ): ?>
													<li>
														<i class="<?php echo esc_attr( $val['hours_icon'] ); ?>"></i>
														<span><?php echo esc_html( $val['hours'], true ); ?></span>
													</li>
												<?php endif; ?>
												<?php if ( !empty( $val['phone'] ) ): ?>
													<li>
														<i class="<?php echo esc_attr( $val['phone_icon'] ); ?>"></i>
														<span><?php echo esc_html( $val['phone'], true ); ?></span>
													</li>
												<?php endif; ?>
											</ul>
										<?php endforeach; ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php endif; ?>
				<?php if( consulting_get_header_style() == '' || consulting_get_header_style() == 'header_style_1' || consulting_get_header_style() == 'header_style_3' || consulting_get_header_style() == 'header_style_4' ): ?>
					<div class="header_top clearfix">
						<div class="container">
							<?php if ( consulting_get_header_style() != 'header_style_4' && $socials = consulting_get_socials() ): ?>
								<div class="header_socials">
									<?php foreach ( $socials as $key => $val ): ?>
										<a target="_blank" href="<?php echo esc_url( $val ); ?>"><i class="fa fa-<?php echo esc_attr( $key ); ?>"></i></a>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<div class="logo">
								<?php if ( consulting_get_header_style() != 'header_style_4' &&  $logo = get_theme_mod( 'logo', get_template_directory_uri() . '/assets/images/tmp/logo_default.svg' ) ): ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $logo ); ?>" style="width: <?php echo esc_attr(get_theme_mod('logo_width')) ?>px; height: <?php echo esc_attr(get_theme_mod('logo_height')) ?>px;" alt="<?php bloginfo( 'name' ); ?>" /></a>
								<?php elseif( consulting_get_header_style() == 'header_style_4' && $logo = get_theme_mod( 'dark_logo', get_template_directory_uri() . '/assets/images/tmp/logo_dark.svg' ) ): ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $logo ); ?>" style="width: <?php echo esc_attr(get_theme_mod('logo_width')) ?>px; height: <?php echo esc_attr(get_theme_mod('logo_height')) ?>px;" alt="<?php bloginfo( 'name' ); ?>" /></a>
								<?php else: ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
								<?php endif; ?>
							</div>
							<?php if( consulting_get_header_style() == 'header_style_4' && $header_phone = get_theme_mod( 'header_phone', wp_kses( __( "<strong>212 714 0177</strong>\n<span>Free call</span>", 'consulting' ), array( 'br' => array(), 'strong' => array(), 'span' => array() ) ) ) ): ?>
								<div class="icon_text big clearfix">
									<div class="icon"><i class="fa <?php echo esc_attr( get_theme_mod( 'header_phone_icon', 'fa-phone' ) ); ?>"></i></div>
									<div class="text"><?php echo wp_kses( nl2br( $header_phone ), array( 'br' => array(), 'strong' => array(), 'span' => array() ) ); ?></div>
								</div>
							<?php endif; ?>
							<?php if( $header_hours = get_theme_mod( 'header_working_hours', wp_kses( __( "<strong>Mon - Sat 8.00 - 18.00</strong>\n<span>Sunday CLOSED</span>", 'consulting' ), array( 'br' => array(), 'strong' => array(), 'span' => array() ) ) ) ): ?>
								<div class="icon_text clearfix">
									<div class="icon"><i class="fa <?php echo esc_attr( get_theme_mod( 'header_working_hours_icon', 'fa-clock-o' ) ); ?>"></i></div>
									<div class="text">
										<?php echo wp_kses( nl2br( $header_hours ), array( 'br' => array(), 'strong' => array(), 'span' => array() ) ); ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if( $header_address = get_theme_mod( 'header_address', wp_kses( __( "<strong>1010 Avenue of the Moon</strong>\n<span>New York, NY 10018 US.</span>", 'consulting' ), array( 'br' => array(), 'strong' => array(), 'span' => array() ) ) ) ): ?>
								<div class="icon_text clearfix">
									<div class="icon"><i class="fa <?php echo esc_attr( get_theme_mod( 'header_address_icon', 'fa-map-marker' ) ); ?>"></i></div>
									<div class="text">
										<?php echo wp_kses( nl2br( $header_address ), array( 'br' => array(), 'strong' => array(), 'span' => array() ) ); ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="top_nav">
						<div class="container">
							<div class="top_nav_wrapper clearfix">
								<?php
								wp_nav_menu( array(
										'theme_location' => 'consulting-primary_menu',
										'container'      => false,
										'depth'          => 3,
										'menu_class'     => 'main_menu_nav'
									)
								);
								?>
								<?php if( consulting_get_header_style() != 'header_style_4' && $header_phone = get_theme_mod( 'header_phone', wp_kses( __( "<strong>212 714 0177</strong>\n<span>Free call</span>", 'consulting' ), array( 'br' => array(), 'strong' => array(), 'span' => array() ) ) ) ): ?>
									<div class="icon_text clearfix">
										<div class="icon"><i class="fa <?php echo esc_attr( get_theme_mod( 'header_phone_icon', 'fa-phone' ) ); ?>"></i></div>
										<div class="text"><?php echo wp_kses( nl2br( $header_phone ), array( 'br' => array(), 'strong' => array(), 'span' => array() ) ); ?></div>
									</div>
								<?php endif; ?>
								<?php if ( consulting_get_header_style() == 'header_style_4' && $socials = consulting_get_socials() ): ?>
									<div class="header_socials">
										<?php foreach ( $socials as $key => $val ): ?>
											<a target="_blank" href="<?php echo esc_url( $val ); ?>"><i class="fa fa-<?php echo esc_attr( $key ); ?>"></i></a>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php elseif( consulting_get_header_style() == 'header_style_2' ): ?>
					<div class="header_top clearfix">
						<div class="container">
							<div class="logo media-left media-middle">
								<?php if ( $logo = get_theme_mod( 'dark_logo', get_template_directory_uri() . '/assets/images/tmp/logo_dark.svg' ) ): ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $logo ); ?>" style="width: <?php echo esc_attr(get_theme_mod('logo_width')) ?>px; height: <?php echo esc_attr(get_theme_mod('logo_height')) ?>px;" alt="<?php bloginfo( 'name' ); ?>" /></a>
								<?php else: ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
								<?php endif; ?>
							</div>
							<div class="top_nav media-body media-middle">
								<?php if ( $socials = consulting_get_socials() ): ?>
									<div class="header_socials">
										<?php foreach ( $socials as $key => $val ): ?>
											<a target="_blank" href="<?php echo esc_url( $val ); ?>"><i class="fa fa-<?php echo esc_attr( $key ); ?>"></i></a>
										<?php endforeach; ?>
										<?php if ( class_exists( 'WooCommerce' ) ): ?>
											<a href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" class="cart_count"><i class="stm-cart-2"></i><span class="count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span></a>
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<div class="top_nav_wrapper clearfix">
									<?php
									wp_nav_menu( array(
											'theme_location' => 'consulting-primary_menu',
											'container'      => false,
											'depth'          => 3,
											'menu_class'     => 'main_menu_nav'
										)
									);
									?>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="mobile_header">
					<div class="logo_wrapper clearfix">
						<div class="logo">
							<?php if ( $logo = get_theme_mod( 'dark_logo', get_template_directory_uri() . '/assets/images/tmp/logo_dark.svg' ) ): ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $logo ); ?>" style="width: <?php echo esc_attr(get_theme_mod('logo_width')) ?>px; height: <?php echo esc_attr(get_theme_mod('logo_height')) ?>px;" alt="<?php bloginfo( 'name' ); ?>" /></a>
							<?php else: ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
							<?php endif; ?>
						</div>
						<div id="menu_toggle">
							<button></button>
						</div>
					</div>
					<div class="header_info">
						<div class="top_nav_mobile">
							<?php
							wp_nav_menu( array(
									'theme_location' => 'consulting-primary_menu',
									'container'      => false,
									'depth'          => 3,
									'menu_class'     => 'main_menu_nav'
								)
							);
							?>
						</div>
						<div class="icon_texts">
							<?php if( $header_phone = get_theme_mod( 'header_phone', wp_kses( __( "<strong>212 714 0177</strong>\n<span>Free call</span>", 'consulting' ), array( 'br' => array(), 'strong' => array(), 'span' => array() ) ) ) ): ?>
								<div class="icon_text clearfix">
									<div class="icon"><i class="fa <?php echo esc_attr( get_theme_mod( 'header_phone_icon', 'fa-phone' ) ); ?>"></i></div>
									<div class="text">
										<?php echo wp_kses( nl2br( $header_phone ), array( 'br' => array(), 'strong' => array(), 'span' => array() ) ); ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if( $header_hours = get_theme_mod( 'header_working_hours', wp_kses( __( "<strong>Mon - Sat 8.00 - 18.00</strong>\n<span>Sunday CLOSED</span>", 'consulting' ), array( 'br' => array(), 'strong' => array(), 'span' => array() ) ) ) ): ?>
								<div class="icon_text clearfix">
									<div class="icon"><i class="fa <?php echo esc_attr( get_theme_mod( 'header_working_hours_icon', 'fa-clock-o' ) ); ?>"></i></div>
									<div class="text">
										<?php echo wp_kses( nl2br( $header_hours ), array( 'br' => array(), 'strong' => array(), 'span' => array() ) ); ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if( $header_address = get_theme_mod( 'header_address', wp_kses( __( "<strong>1010 Avenue of the Moon</strong>\n<span>New York, NY 10018 US.</span>", 'consulting' ), array( 'br' => array(), 'strong' => array(), 'span' => array() ) ) ) ): ?>
								<div class="icon_text clearfix">
									<div class="icon"><i class="fa <?php echo esc_attr( get_theme_mod( 'header_address_icon', 'fa-map-marker' ) ); ?>"></i></div>
									<div class="text">
										<?php echo wp_kses( nl2br( $header_address ), array( 'br' => array(), 'strong' => array(), 'span' => array() ) ); ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</header>
			<div id="main">
				<?php get_template_part( 'partials/title_box' ); ?>
				<div class="container">
		<?php endif; ?>