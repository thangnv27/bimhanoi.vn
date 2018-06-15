<?php

$socials = array(
	'facebook'      => esc_html__( 'Facebook', 'consulting' ),
	'twitter'       => esc_html__( 'Twitter', 'consulting' ),
	'instagram'     => esc_html__( 'Instagram', 'consulting' ),
	'google-plus'   => esc_html__( 'Google+', 'consulting' ),
	'vimeo'         => esc_html__( 'Vimeo', 'consulting' ),
	'linkedin'      => esc_html__( 'Linkedin', 'consulting' ),
	'behance'       => esc_html__( 'Behance', 'consulting' ),
	'dribbble'      => esc_html__( 'Dribbble', 'consulting' ),
	'flickr'        => esc_html__( 'Flickr', 'consulting' ),
	'github'        => esc_html__( 'Git', 'consulting' ),
	'pinterest'     => esc_html__( 'Pinterest', 'consulting' ),
	'yahoo'         => esc_html__( 'Yahoo', 'consulting' ),
	'delicious'     => esc_html__( 'Delicious', 'consulting' ),
	'dropbox'       => esc_html__( 'Dropbox', 'consulting' ),
	'reddit'        => esc_html__( 'Reddit', 'consulting' ),
	'soundcloud'    => esc_html__( 'Soundcloud', 'consulting' ),
	'google'        => esc_html__( 'Google', 'consulting' ),
	'skype'         => esc_html__( 'Skype', 'consulting' ),
	'youtube'       => esc_html__( 'Youtube', 'consulting' ),
	'tumblr'        => esc_html__( 'Tumblr', 'consulting' ),
	'whatsapp'      => esc_html__( 'Whatsapp', 'consulting' ),
	'odnoklassniki' => esc_html__( 'Odnoklassniki', 'consulting' ),
	'vk'            => esc_html__( 'Vk', 'consulting' ),
);

STM_Customizer::setPanels( array(
	'site_settings' => array(
		'title'    => esc_html__( 'Site Settings', 'consulting' ),
		'priority' => 10
	),
	'header'        => array(
		'title'    => esc_html__( 'Header', 'consulting' ),
		'priority' => 20
	),
	'footer'        => array(
		'title'    => esc_html__( 'Footer', 'consulting' ),
		'priority' => 50
	),
	'post_types'    => array(
		'title'    => esc_html__( 'Post Types', 'consulting' ),
		'priority' => 60
	),
	'typography'    => array(
		'title'    => esc_html__( 'Typography', 'consulting' ),
		'priority' => 70
	),
) );

STM_Customizer::setSection( 'title_tagline', array(
	'title'    => esc_html__( 'Logo &amp; Title', 'consulting' ),
	'panel'    => 'site_settings',
	'priority' => 10,
	'fields'   => array(
		'title_tag_separator_1' => array(
			'type' => 'stm-separator'
		),
		'logo'                  => array(
			'label' => esc_html__( 'Logo', 'consulting' ),
			'type'  => 'image'
		),
		'dark_logo'                  => array(
			'label' => esc_html__( 'Dark Logo', 'consulting' ),
			'type'  => 'image'
		),
		'logo_width'         => array(
				'label'  => esc_html__( 'Width', 'consulting' ),
				'type'   => 'stm-attr',
				'mode'   => 'width',
				'units'  => 'px',
				'output' => '.top_nav_wr .top_nav .logo a img'
		),
		'logo_height'        => array(
				'label'  => esc_html__( 'Height', 'consulting' ),
				'type'   => 'stm-attr',
				'mode'   => 'height',
				'units'  => 'px',
				'output' => '.top_nav_wr .top_nav .logo a img'
		),
		'logo_margin_top'    => array(
				'label'  => esc_html__( 'Margin Top', 'consulting' ),
				'type'   => 'stm-attr',
				'mode'   => 'margin-top',
				'units'  => 'px !important',
				'output' => '.header_top .logo a'
		),
		'logo_margin_bottom' => array(
				'label'  => esc_html__( 'Margin Bottom', 'consulting' ),
				'type'   => 'stm-attr',
				'mode'   => 'margin-bottom',
				'units'  => 'px',
				'output' => '.top_nav_wr .top_nav .logo a'
		),
		'title_tag_separator_2' => array(
			'type' => 'stm-separator'
		)
	)
) );

STM_Customizer::setSection( 'static_front_page', array(
	'title' => esc_html__( 'Static Front Page', 'consulting' ),
	'panel' => 'site_settings'
) );

STM_Customizer::setSection( 'site_settings', array(
	'title'    => esc_html__( 'Style &amp; Settings', 'consulting' ),
	'panel'    => 'site_settings',
	'fields'   => array(
		'site_skin' => array(
			'label'   => esc_html__( 'Skin', 'consulting' ),
			'type'    => 'stm-select',
			'choices' => array(
				'skin_default'   => esc_html__( 'Default', 'consulting' ),
				'skin_turquoise'     => esc_html__( 'Turquoise', 'consulting' ),
				'skin_dark_denim'     => esc_html__( 'Dark Denim', 'consulting' ),
				'skin_arctic_black'     => esc_html__( 'Arctic &amp; Black', 'consulting' ),
				'skin_custom'    => esc_html__( 'Custom Colors', 'consulting' ),
			)
		),
		'site_skin_base_color' => array(
			'label'   => esc_html__( 'Custom Base Color', 'consulting' ),
			'type'    => 'color',
			'default' => '#002e5b'
		),
		'site_skin_secondary_color' => array(
			'label'   => esc_html__( 'Custom Secondary Color', 'consulting' ),
			'type'    => 'color',
			'default' => '#6c98e1'
		),
		'site_skin_third_color' => array(
			'label'   => esc_html__( 'Custom Third Color', 'consulting' ),
			'type'    => 'color',
			'default' => '#fde428'
		),
		'frontend_customizer' => array(
			'label'   => esc_html__( 'Frontend Customizer', 'consulting' ),
			'type'    => 'stm-checkbox',
			'default' => false
		),
		'site_boxed' => array(
			'label'   => esc_html__( 'Enable Boxed Layout', 'consulting' ),
			'type'    => 'stm-checkbox',
			'default' => false
		),
		'bg_image' => array(
			'label'   => esc_html__( 'Background Image', 'consulting' ),
			'type'    => 'stm-bg',
			'choices' => array(
				'bg_img_1' => 'prev_img_1',
				'bg_img_2' => 'prev_img_2',
				'bg_img_3' => 'prev_img_3',
				'bg_img_4' => 'prev_img_4',
			)
		),
		'custom_bg_image' => array(
			'label' => esc_html__( 'Custom Bg Image', 'consulting' ),
			'type'  => 'image'
		),
	)
) );

$top_bar_fields['top_bar'] = array(
	'label'   => esc_html__( 'Enable Top Bar', 'consulting' ),
	'type'    => 'stm-checkbox',
	'default' => true
);

$top_bar_fields['wpml_switcher'] = array(
	'label'   => esc_html__( 'Enable WPML Switcher', 'consulting' ),
	'type'    => 'stm-checkbox',
	'default' => true
);

$top_bar_fields['top_bar_separator_1'] = array(
	'type' => 'stm-separator'
);

for ( $i = 1; $i <= 10; $i ++ ) {
	$top_bar_fields[ 'top_bar_info_' . $i . '_office' ]     = array(
		'label'       => esc_html__( 'Office ' . $i, 'consulting' ),
		'type'        => 'stm-text',
		'description' => esc_html__( 'for dropdown options', 'consulting' )
	);
	$top_bar_fields[ 'top_bar_info_' . $i . '_address' ]      = array(
		'label' => esc_html__( 'Address', 'consulting' ),
		'type'  => 'stm-text',
	);
	$top_bar_fields[ 'top_bar_info_' . $i . '_address_icon' ] = array(
		'label'   => esc_html__( 'Address Icon', 'consulting' ),
		'type'    => 'stm-icon-picker',
		'default' => 'stm-marker'
	);
	$top_bar_fields[ 'top_bar_info_' . $i . '_hours' ]      = array(
		'label' => esc_html__( 'Working Hours', 'consulting' ),
		'type'  => 'stm-text',
	);
	$top_bar_fields[ 'top_bar_info_' . $i . '_hours_icon' ] = array(
		'label'   => esc_html__( 'Hours Icon', 'consulting' ),
		'type'    => 'stm-icon-picker',
		'default' => 'fa fa-clock-o'
	);
	$top_bar_fields[ 'top_bar_info_' . $i . '_phone' ]      = array(
		'label' => esc_html__( 'Phone number', 'consulting' ),
		'type'  => 'stm-text',
	);
	$top_bar_fields[ 'top_bar_info_' . $i . '_phone_icon' ] = array(
		'label'   => esc_html__( 'Phone Icon', 'consulting' ),
		'type'    => 'stm-icon-picker',
		'default' => 'fa fa-phone'
	);
	$top_bar_fields[ 'top_bar_info_' . $i . '_separator' ]  = array(
		'type' => 'stm-separator'
	);
}

STM_Customizer::setSection( 'top_bar', array(
	'title'  => esc_html__( 'Top Bar', 'consulting' ),
	'panel'  => 'header',
	'fields' => $top_bar_fields
) );

STM_Customizer::setSection( 'header_appearance', array(
	'title'  => esc_html__( 'Header Appearance', 'consulting' ),
	'panel'  => 'header',
	'fields' => array(
		'header_style' => array(
			'label'   => esc_html__( 'Header Style', 'consulting' ),
			'type'    => 'stm-select',
			'default' => 'header_style_1',
			'choices' => array(
				'header_style_1' => esc_html__( 'Style 1', 'consulting' ),
				'header_style_2' => esc_html__( 'Style 2', 'consulting' ),
				'header_style_3' => esc_html__( 'Style 3', 'consulting' ),
				'header_style_4' => esc_html__( 'Style 4', 'consulting' ),
			)
		),
		'sticky_menu'  => array(
			'label'   => esc_html__( 'Sticky Menu', 'consulting' ),
			'type'    => 'stm-checkbox',
			'default' => false
		)
	)
) );

STM_Customizer::setSection( 'header_info', array(
		'title'  => esc_html__( 'Information', 'consulting' ),
		'panel'  => 'header',
		'fields' => array(
				'header_address' => array(
						'label'   => esc_html__( 'Address', 'consulting' ),
						'type'    => 'stm-code',
						'default' => esc_html__( "<strong>1010 Avenue of the Moon</strong>\n<span>New York, NY 10018 US.</span>", 'consulting' )
				),
				'header_address_icon' => array(
						'label'   => esc_html__( 'Address Icon', 'consulting' ),
						'type'    => 'stm-icon-picker',
						'default' => 'fa-map-marker'
				),
				'header_info_separator_1' => array(
						'type' => 'stm-separator'
				),
				'header_working_hours' => array(
						'label'   => esc_html__( 'Working Hours', 'consulting' ),
						'type'    => 'stm-code',
						'default' => esc_html__( "<strong>Mon - Sat 8.00 - 18.00</strong>\n<span>Sunday CLOSED</span>", 'consulting' )
				),
				'header_working_hours_icon' => array(
						'label'   => esc_html__( 'Working Hours Icon', 'consulting' ),
						'type'    => 'stm-icon-picker',
						'default' => 'fa-clock-o'
				),
				'header_info_separator_2' => array(
						'type' => 'stm-separator'
				),
				'header_phone' => array(
						'label'   => esc_html__( 'Phone number', 'consulting' ),
						'type'    => 'stm-code',
						'default' => wp_kses( __( "<strong>212 714 0177</strong>\n<span>Free call</span>", 'consulting' ), array( 'strong' => array(), 'span' => array() ) )
				),
				'header_phone_icon' => array(
						'label'   => esc_html__( 'Phone number Icon', 'consulting' ),
						'type'    => 'stm-icon-picker',
						'default' => 'fa-phone'
				),
		)
) );

STM_Customizer::setSection( 'post_type_service', array(
	'title'  => esc_html__( 'Services', 'consulting' ),
	'panel'  => 'post_types',
	'fields' => array(
		'post_type_services_title'   => array(
			'label'   => esc_html__( 'Title', 'consulting' ),
			'type'    => 'stm-text',
			'default' => esc_html__( 'Service', 'consulting' )
		),
		'post_type_services_plural'  => array(
			'label'   => esc_html__( 'Plural Title', 'consulting' ),
			'type'    => 'stm-text',
			'default' => esc_html__( 'Services', 'consulting' )
		),
		'post_type_services_all_items'  => array(
			'label'   => esc_html__( 'All Items', 'consulting' ),
			'type'    => 'stm-text',
			'default' => esc_html__( 'All Services', 'consulting' )
		),
		'post_type_services_rewrite' => array(
			'label'   => esc_html__( 'Rewrite (URL text)', 'consulting' ),
			'type'    => 'stm-text',
			'default' => 'service'
		),
		'post_type_services_icon'    => array(
			'label'   => esc_html__( 'Icon', 'consulting' ),
			'type'    => 'stm-text',
			'default' => 'dashicons-clipboard'
		),
	)
) );

STM_Customizer::setSection( 'post_type_careers', array(
	'title'  => esc_html__( 'Vacancies', 'consulting' ),
	'panel'  => 'post_types',
	'fields' => array(
		'post_type_careers_title'   => array(
			'label'   => esc_html__( 'Title', 'consulting' ),
			'type'    => 'stm-text',
			'default' => esc_html__( 'Vacancy', 'consulting' )
		),
		'post_type_careers_plural'  => array(
			'label'   => esc_html__( 'Plural Title', 'consulting' ),
			'type'    => 'stm-text',
			'default' => esc_html__( 'Vacancies', 'consulting' )
		),
		'post_type_careers_all_items'  => array(
			'label'   => esc_html__( 'All Items', 'consulting' ),
			'type'    => 'stm-text',
			'default' => esc_html__( 'All Vacancies', 'consulting' )
		),
		'post_type_careers_rewrite' => array(
			'label'   => esc_html__( 'Rewrite (URL text)', 'consulting' ),
			'type'    => 'stm-text',
			'default' => 'careers_archive'
		),
		'post_type_careers_icon'    => array(
			'label'   => esc_html__( 'Icon', 'consulting' ),
			'type'    => 'stm-text',
			'default' => 'dashicons-id'
		),
	)
) );

STM_Customizer::setSection( 'post_type_staff', array(
	'title'  => esc_html__( 'Staff', 'consulting' ),
	'panel'  => 'post_types',
	'fields' => array(
		'post_type_staff_title'   => array(
			'label'   => esc_html__( 'Title', 'consulting' ),
			'type'    => 'stm-text',
			'default' => esc_html__( 'Staff', 'consulting' )
		),
		'post_type_staff_plural'  => array(
			'label'   => esc_html__( 'Plural Title', 'consulting' ),
			'type'    => 'stm-text',
			'default' => esc_html__( 'Staff', 'consulting' )
		),
		'post_type_staff_all_items'  => array(
			'label'   => esc_html__( 'All Items', 'consulting' ),
			'type'    => 'stm-text',
			'default' => esc_html__( 'All Staff', 'consulting' )
		),
		'post_type_staff_rewrite' => array(
			'label'   => esc_html__( 'Rewrite (URL text)', 'consulting' ),
			'type'    => 'stm-text',
			'default' => 'staff'
		),
		'post_type_staff_icon'    => array(
			'label'   => esc_html__( 'Icon', 'consulting' ),
			'type'    => 'stm-text',
			'default' => 'dashicons-groups'
		),
	)
) );

STM_Customizer::setSection( 'post_type_works', array(
	'title'  => esc_html__( 'Works', 'consulting' ),
	'panel'  => 'post_types',
	'fields' => array(
		'post_type_works_title'   => array(
			'label'   => esc_html__( 'Title', 'consulting' ),
			'type'    => 'stm-text',
			'default' => esc_html__( 'Work', 'consulting' )
		),
		'post_type_works_plural'  => array(
			'label'   => esc_html__( 'Plural Title', 'consulting' ),
			'type'    => 'stm-text',
			'default' => esc_html__( 'Works', 'consulting' )
		),
		'post_type_works_all_items'  => array(
			'label'   => esc_html__( 'All Items', 'consulting' ),
			'type'    => 'stm-text',
			'default' => esc_html__( 'All Works', 'consulting' )
		),
		'post_type_works_rewrite' => array(
			'label'   => esc_html__( 'Rewrite (URL text)', 'consulting' ),
			'type'    => 'stm-text',
			'default' => 'works'
		),
		'post_type_works_icon'    => array(
			'label'   => esc_html__( 'Icon', 'consulting' ),
			'type'    => 'stm-text',
			'default' => 'dashicons-portfolio'
		),
	)
) );

STM_Customizer::setSection( 'post_type_testimonial', array(
	'title'  => esc_html__( 'Testimonials', 'consulting' ),
	'panel'  => 'post_types',
	'fields' => array(
		'post_type_testimonials_title'   => array(
			'label'   => esc_html__( 'Title', 'consulting' ),
			'type'    => 'stm-text',
			'default' => esc_html__( 'Testimonial', 'consulting' )
		),
		'post_type_testimonials_plural'  => array(
			'label'   => esc_html__( 'Plural Title', 'consulting' ),
			'type'    => 'stm-text',
			'default' => esc_html__( 'Testimonials', 'consulting' )
		),
		'post_type_testimonials_all_items'  => array(
			'label'   => esc_html__( 'All Items', 'consulting' ),
			'type'    => 'stm-text',
			'default' => esc_html__( 'All Testimonials', 'consulting' )
		),
		'post_type_testimonials_rewrite' => array(
			'label'   => esc_html__( 'Rewrite (URL text)', 'consulting' ),
			'type'    => 'stm-text',
			'default' => 'testimonials'
		),
		'post_type_testimonials_icon'    => array(
			'label'   => esc_html__( 'Icon', 'consulting' ),
			'type'    => 'stm-text',
			'default' => 'dashicons-testimonial'
		),
	)
) );

STM_Customizer::setSection( 'header_socials', array(
		'title'  => esc_html__( 'Socials', 'consulting' ),
		'panel'  => 'header',
		'fields' => array(
				'header_socials' => array(
						'type'    => 'stm-multiple-checkbox',
						'choices' => $socials
				)
		)
) );

STM_Customizer::setSection( 'footer_layout', array(
		'title'  => esc_html__( 'Layout', 'consulting' ),
		'panel'  => 'footer',
		'fields' => array(
				'footer_logo'          => array(
						'label' => esc_html__( 'Logo', 'consulting' ),
						'type'  => 'image'
				),
				'footer_logo_width'    => array(
						'label'  => esc_html__( 'Width', 'consulting' ),
						'type'   => 'stm-attr',
						'mode'   => 'width',
						'units'  => 'px',
						'output' => '#footer .widgets_row .footer_logo a img'
				),
				'footer_logo_height'   => array(
						'label'  => esc_html__( 'Height', 'consulting' ),
						'type'   => 'stm-attr',
						'mode'   => 'height',
						'units'  => 'px',
						'output' => '#footer .widgets_row .footer_logo a img'
				),
				'footer_break_1'       => array(
						'type' => 'stm-separator',
				),
				'footer_sidebar_count' => array(
						'label'   => esc_html__( 'Additional Widget Areas', 'consulting' ),
						'type'    => 'stm-select',
						'default' => 4,
						'choices' => array(
								'disable' => esc_html__( 'Disable', 'consulting' ),
								1 => 1,
								2 => 2,
								3 => 3,
								4 => 4
						)
				),
				'footer_break_2'       => array(
						'type' => 'stm-separator',
				),
				'footer_text'          => array(
						'label'   => esc_html__( 'Footer Text', 'consulting' ),
						'type'    => 'stm-code',
						'default' => esc_html__( 'Fusce interdum ipsum egestas urna amet fringilla, et placerat ex venenatis. Aliquet luctus pharetra. Proin sed fringilla lectusar sit amet tellus in mollis. Proin nec egestas nibh, eget egestas urna. Phasellus sit amet vehicula nunc. In hac habitasse platea dictumst.', 'consulting' )
				),
				'footer_copyright'     => array(
						'label'       => esc_html__( 'Copyright', 'consulting' ),
						'placeholder' => esc_html__( "Copyright &copy; 2012-2015 Consulting Theme by <a href='http://stylemixthemes.com/' target='_blank'>Stylemix Themes</a>. All rights reserved", 'consulting' ),
						'default'     => esc_html__( "Copyright &copy; 2012-2015 Consulting Theme by <a href='http://stylemixthemes.com/' target='_blank'>Stylemix Themes</a>. All rights reserved", 'consulting' ),
						'type'        => 'stm-text'
				),
		)
) );

STM_Customizer::setSection( 'footer_socials', array(
		'title'  => esc_html__( 'Footer Socials', 'consulting' ),
		'panel'  => 'footer',
		'fields' => array(
				'footer_socials' => array(
						'type'    => 'stm-multiple-checkbox',
						'choices' => $socials
				)
		)
) );

STM_Customizer::setSection( 'typography_body', array(
	'title'  => esc_html__( 'Body', 'consulting' ),
	'panel'  => 'typography',
	'fields' => array(
		'body_font_family' => array(
			'label'   => esc_html__( 'Base Font Family', 'consulting' ),
			'type'    => 'stm-font-family',
			'output'  => 'body, body .vc_general.vc_btn3 small, .default_widgets .widget.widget_nav_menu ul li .children li, .default_widgets .widget.widget_categories ul li .children li, .default_widgets .widget.widget_product_categories ul li .children li, .stm_sidebar .widget.widget_nav_menu ul li .children li, .stm_sidebar .widget.widget_categories ul li .children li, .stm_sidebar .widget.widget_product_categories ul li .children li, .shop_widgets .widget.widget_nav_menu ul li .children li, .shop_widgets .widget.widget_categories ul li .children li, .shop_widgets .widget.widget_product_categories ul li .children li',
			'default' => 'Open Sans'
		),
		'secondary_font_family' => array(
			'label'   => esc_html__( 'Secondary Font Family', 'consulting' ),
			'type'    => 'stm-font-family',
			'output'  => 'h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6, .top_nav .top_nav_wrapper > ul,
										.top_nav .icon_text strong, .stm_testimonials .item .testimonial-info .testimonial-text .name,
										.stats_counter .counter_title, .stm_contact .stm_contact_info .stm_contact_job,
										.vacancy_table_wr .vacancy_table thead th, .testimonials_carousel .testimonial .info .position,
										.testimonials_carousel .testimonial .info .company, .stm_gmap_wrapper .gmap_addresses .addresses .item .title,
										.company_history > ul > li .year, .stm_contacts_widget, .stm_works_wr.grid .stm_works .item .item_wr .title,
										.stm_works_wr.grid_with_filter .stm_works .item .info .title, body .vc_general.vc_btn3, .consulting-rev-title,
										.consulting-rev-title-2, .consulting-rev-title-3, .consulting-rev-text,
										body .vc_tta-container .vc_tta.vc_general.vc_tta-tabs.theme_style .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a,
										strong, b, .button, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
										.woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce input.button.alt,
										.request_callback p, ul.comment-list .comment .comment-author, .page-numbers .page-numbers,
										#footer .footer_widgets .widget.widget_recent_entries ul li a, .default_widgets .widget.widget_nav_menu ul li,
										.default_widgets .widget.widget_categories ul li, .default_widgets .widget.widget_product_categories ul li,
										.stm_sidebar .widget.widget_nav_menu ul li, .stm_sidebar .widget.widget_categories ul li,
										.stm_sidebar .widget.widget_product_categories ul li, .shop_widgets .widget.widget_nav_menu ul li,
										.shop_widgets .widget.widget_categories ul li, .shop_widgets .widget.widget_product_categories ul li,
										.default_widgets .widget.widget_recent_entries ul li a, .stm_sidebar .widget.widget_recent_entries ul li a,
										.shop_widgets .widget.widget_recent_entries ul li a, .staff_bottom_wr .staff_bottom .infos .info,
										.woocommerce .widget_price_filter .price_slider_amount .button, .woocommerce ul.product_list_widget li .product-title,
										.woocommerce ul.products li.product .price, .woocommerce a.added_to_cart,
										.woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce div.product form.cart .variations label,
										.woocommerce table.shop_table th, .woocommerce-cart table.cart th.product-name a,
                    .woocommerce-cart table.cart td.product-name a, .woocommerce-cart table.cart th .amount,
                    .woocommerce-cart table.cart td .amount, .stm_services .item .item_wr .content .read_more,
                    .staff_list ul li .staff_info .staff_department, .stm_partner.style_2 .stm_partner_content .position, .wpb_text_column ul li, .comment-body .comment-text ul li',
			'default' => 'Poppins'
		),
		'body_font_weight' => array(
			'label'   => esc_html__( 'Font Weight', 'consulting' ),
			'type'    => 'stm-font-weight',
			'output'  => 'body',
			'default' => 400
		),
		'body_font_size'   => array(
			'label'   => esc_html__( 'Font Size', 'consulting' ),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'body',
			'default' => 14
		)
	)
) );

STM_Customizer::setSection( 'typography_p', array(
	'title'  => esc_html__( 'Paragraph', 'consulting' ),
	'panel'  => 'typography',
	'fields' => array(
		'p_font_weight' => array(
			'label'   => esc_html__( 'Font Weight', 'consulting' ),
			'type'    => 'stm-font-weight',
			'output'  => 'p',
			'default' => 400
		),
		'p_font_size'   => array(
			'label'   => esc_html__( 'Font Size', 'consulting' ),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'p',
			'default' => 14
		),
		'p_line_height'   => array(
			'label'   => esc_html__( 'Line Height', 'consulting' ),
			'type'    => 'stm-attr',
			'mode'    => 'line-height',
			'units'   => 'px',
			'output'  => 'p',
			'default' => 26
		)
	)
) );

STM_Customizer::setSection( 'typography_h1', array(
	'title'  => esc_html__( 'H1', 'consulting' ),
	'panel'  => 'typography',
	'fields' => array(
		'h1_font_weight' => array(
			'label'   => esc_html__( 'Font Weight', 'consulting' ),
			'type'    => 'stm-font-weight',
			'output'  => 'h1, .h1',
			'default' => 700
		),
		'h1_font_size'   => array(
			'label'   => esc_html__( 'Font Size', 'consulting' ),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'h1, .h1',
			'default' => 45
		),
		'h1_line_height'   => array(
			'label'   => esc_html__( 'Line Height', 'consulting' ),
			'type'    => 'stm-attr',
			'mode'    => 'line-height',
			'units'   => 'px',
			'output'  => 'h1, .h1',
			'default' => 60
		)
	)
) );

STM_Customizer::setSection( 'typography_h2', array(
	'title'  => esc_html__( 'H2', 'consulting' ),
	'panel'  => 'typography',
	'fields' => array(
		'h2_font_weight' => array(
			'label'   => esc_html__( 'Font Weight', 'consulting' ),
			'type'    => 'stm-font-weight',
			'output'  => 'h2, .h2',
			'default' => 700
		),
		'h2_font_size'   => array(
			'label'   => esc_html__( 'Font Size', 'consulting' ),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'h2, .h2',
			'default' => 36
		),
		'h2_line_height'   => array(
			'label'   => esc_html__( 'Line Height', 'consulting' ),
			'type'    => 'stm-attr',
			'mode'    => 'line-height',
			'units'   => 'px',
			'output'  => 'h2, .h2',
			'default' => 45
		)
	)
) );

STM_Customizer::setSection( 'typography_h3', array(
	'title'  => esc_html__( 'H3', 'consulting' ),
	'panel'  => 'typography',
	'fields' => array(
		'h3_font_weight' => array(
			'label'   => esc_html__( 'Font Weight', 'consulting' ),
			'type'    => 'stm-font-weight',
			'output'  => 'h3, .h3',
			'default' => 700
		),
		'h3_font_size'   => array(
			'label'   => esc_html__( 'Font Size', 'consulting' ),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'h3, .h3',
			'default' => 28
		),
		'h3_line_height'   => array(
			'label'   => esc_html__( 'Line Height', 'consulting' ),
			'type'    => 'stm-attr',
			'mode'    => 'line-height',
			'units'   => 'px',
			'output'  => 'h3, .h3',
			'default' => 36
		)
	)
) );

STM_Customizer::setSection( 'typography_h4', array(
	'title'  => esc_html__( 'H4', 'consulting' ),
	'panel'  => 'typography',
	'fields' => array(
		'h4_font_weight' => array(
			'label'   => esc_html__( 'Font Weight', 'consulting' ),
			'type'    => 'stm-font-weight',
			'output'  => 'h4, .h4',
			'default' => 700
		),
		'h4_font_size'   => array(
			'label'   => esc_html__( 'Font Size', 'consulting' ),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'h4, .h4',
			'default' => 20
		),
		'h4_line_height'   => array(
			'label'   => esc_html__( 'Line Height', 'consulting' ),
			'type'    => 'stm-attr',
			'mode'    => 'line-height',
			'units'   => 'px',
			'output'  => 'h4, .h4',
			'default' => 28
		)
	)
) );

STM_Customizer::setSection( 'typography_h5', array(
	'title'  => esc_html__( 'H5', 'consulting' ),
	'panel'  => 'typography',
	'fields' => array(
		'h5_font_weight' => array(
			'label'   => esc_html__( 'Font Weight', 'consulting' ),
			'type'    => 'stm-font-weight',
			'output'  => 'h5, .h5',
			'default' => 600
		),
		'h5_font_size'   => array(
			'label'   => esc_html__( 'Font Size', 'consulting' ),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'h5, .h5',
			'default' => 18
		),
		'h5_line_height'   => array(
			'label'   => esc_html__( 'Line Height', 'consulting' ),
			'type'    => 'stm-attr',
			'mode'    => 'line-height',
			'units'   => 'px',
			'output'  => 'h5, .h5',
			'default' => 22
		)
	)
) );

STM_Customizer::setSection( 'typography_h6', array(
	'title'  => esc_html__( 'H6', 'consulting' ),
	'panel'  => 'typography',
	'fields' => array(
		'h6_font_weight' => array(
			'label'   => esc_html__( 'Font Weight', 'consulting' ),
			'type'    => 'stm-font-weight',
			'output'  => 'h6, .h6',
			'default' => 600
		),
		'h6_font_size'   => array(
			'label'   => esc_html__( 'Font Size', 'consulting' ),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'h6, .h6',
			'default' => 16
		),
		'h6_line_height'   => array(
			'label'   => esc_html__( 'Line Height', 'consulting' ),
			'type'    => 'stm-attr',
			'mode'    => 'line-height',
			'units'   => 'px',
			'output'  => 'h6, .h6',
			'default' => 20
		)
	)
) );

STM_Customizer::setSection( 'archive_pages', array(
	'title'    => esc_html__( 'Archive Pages', 'consulting' ),
	'priority' => 40,
	'fields'   => array(
		'blog_layout'       => array(
			'type'    => 'radio',
			'label'   => esc_html__( 'Layout', 'consulting' ),
			'choices' => array(
				'grid' => esc_html__( 'Grid View', 'consulting' ),
				'list' => esc_html__( 'List View', 'consulting' )
			),
			'default' => 'list'
		),
		'blog_break_1'      => array(
			'type' => 'stm-separator',
		),
		'blog_sidebar_type' => array(
			'type'    => 'radio',
			'label'   => esc_html__( 'Sidebar Type', 'consulting' ),
			'choices' => array(
				'wp' => esc_html__( 'Wordpress Sidebars', 'consulting' ),
				'vc' => esc_html__( 'VC Sidebars', 'consulting' )
			),
			'default' => 'wp'
		),
		'blog_break_2'      => array(
			'type' => 'stm-separator',
		),
		'blog_wp_sidebar'   => array(
			'type'      => 'stm-post-type',
			'post_type' => 'sidebar',
			'label'     => esc_html__( 'Wordpress Sidebar', 'consulting' ),
			'default'   => 'consulting-right-sidebar'
		),
		'blog_vc_sidebar'   => array(
			'type'      => 'stm-post-type',
			'post_type' => 'stm_vc_sidebar',
			'label'     => esc_html__( 'VC Sidebar', 'consulting' )
		),
		'blog_break_3'      => array(
			'type' => 'stm-separator',
		),
		'blog_sidebar_position' => array(
			'type'    => 'radio',
			'label'   => esc_html__( 'Sidebar - Position', 'consulting' ),
			'choices' => array(
				'left'  => esc_html__( 'Left', 'consulting' ),
				'right' => esc_html__( 'Right', 'consulting' )
			),
			'default' => 'right'
		),
		'blog_break_4'      => array(
			'type' => 'stm-separator',
		),
	)
) );

STM_Customizer::setSection( 'shop_pages', array(
	'title'    => esc_html__( 'Shop Pages', 'consulting' ),
	'priority' => 40,
	'fields'   => array(
		'shop_sidebar_type' => array(
			'type'    => 'radio',
			'label'   => esc_html__( 'Sidebar Type', 'consulting' ),
			'choices' => array(
				'wp' => esc_html__( 'Wordpress Sidebars', 'consulting' ),
				'vc' => esc_html__( 'VC Sidebars', 'consulting' )
			),
			'default' => 'wp'
		),
		'shop_break_2'      => array(
			'type' => 'stm-separator',
		),
		'shop_wp_sidebar'   => array(
			'type'      => 'stm-post-type',
			'post_type' => 'sidebar',
			'label'     => esc_html__( 'Wordpress Sidebar', 'consulting' ),
			'default'   => 'consulting-shop'
		),
		'shop_vc_sidebar'   => array(
			'type'      => 'stm-post-type',
			'post_type' => 'stm_vc_sidebar',
			'label'     => esc_html__( 'VC Sidebar', 'consulting' )
		),
		'shop_break_3'      => array(
			'type' => 'stm-separator',
		),
		'shop_sidebar_position' => array(
			'type'    => 'radio',
			'label'   => esc_html__( 'Sidebar - Position', 'consulting' ),
			'choices' => array(
				'left'  => esc_html__( 'Left', 'consulting' ),
				'right' => esc_html__( 'Right', 'consulting' )
			),
			'default' => 'right'
		),
		'shop_break_4'      => array(
			'type' => 'stm-separator',
		),
		'shop_products_per_page'     => array(
			'label'       => esc_html__( 'Products Per Page', 'consulting' ),
			'default'     => 9,
			'type'        => 'stm-text'
		),
		'shop_break_5'      => array(
			'type' => 'stm-separator',
		),
	)
) );

STM_Customizer::setSection( 'envato_api_settings', array(
	'title'    => esc_html__( 'One Click update', 'consulting' ),
	'panel'    => 'site_settings',
	'priority' => 250,
	'fields'   => array(
		'envato_username' => array(
			'label' => esc_html__( 'Envato Username', 'consulting' ),
			'type'  => 'text',
			'default' => ''
		),
		'envato_api' => array(
			'label' => esc_html__( 'Envato API Key', 'consulting' ),
			'type'  => 'text',
			'default' => ''
		),
	)
) );

STM_Customizer::setSection( 'socials', array(
		'title'  => esc_html__( 'Socials', 'consulting' ),
		'priority' => 70,
		'fields' => array(
				'socials' => array(
						'type'    => 'stm-socials',
						'choices' => $socials
				)
		)
) );

STM_Customizer::setSection( 'custom_css', array(
	'title'  => esc_html__( 'Custom CSS', 'consulting' ),
	'priority' => 80,
	'fields' => array(
		'custom_css' => array(
			'label'       => '',
			'type'        => 'stm-code',
			'placeholder' => ".classname {\n\tbackground: #000;\n}"
		)
	)
) );