<?php

$defaultPostTypesOptions = array(
	'stm_service'     => array(
		'title'        => get_theme_mod( 'post_type_services_title', esc_html__( 'Service', 'consulting' ) ),
		'plural_title' => get_theme_mod( 'post_type_services_plural', esc_html__( 'Services', 'consulting' ) ),
		'all_items'    => get_theme_mod( 'post_type_services_all_items', esc_html__( 'All Services', 'consulting' ) ),
		'rewrite'      => get_theme_mod( 'post_type_services_rewrite', 'services' ),
		'icon'         => get_theme_mod( 'post_type_services_icon', 'dashicons-clipboard' ),
		'supports'     => array( 'title', 'thumbnail', 'editor', 'excerpt' )
	),
	'stm_careers'     => array(
		'title'        => get_theme_mod( 'post_type_careers_title', esc_html__( 'Vacancy', 'consulting' ) ),
		'plural_title' => get_theme_mod( 'post_type_careers_plural', esc_html__( 'Vacancies', 'consulting' ) ),
		'all_items'    => get_theme_mod( 'post_type_careers_all_items', esc_html__( 'All Vacancies', 'consulting' ) ),
		'rewrite'      => get_theme_mod( 'post_type_careers_rewrite', 'careers_archive' ),
		'icon'         => get_theme_mod( 'post_type_careers_icon', 'dashicons-id' ),
		'supports'     => array( 'title', 'editor' )
	),
	'stm_staff'       => array(
		'title'               => get_theme_mod( 'post_type_staff_title', esc_html__( 'Staff', 'consulting' ) ),
		'plural_title'        => get_theme_mod( 'post_type_staff_plural', esc_html__( 'Staff', 'consulting' ) ),
		'all_items'           => get_theme_mod( 'post_type_staff_all_items', esc_html__( 'All Staff', 'consulting' ) ),
		'rewrite'             => get_theme_mod( 'post_type_staff_rewrite', 'staff' ),
		'icon'                => get_theme_mod( 'post_type_careers_icon', 'dashicons-groups' ),
		'supports'            => array( 'title', 'excerpt', 'editor', 'thumbnail' )
	),
	'stm_works'       => array(
		'title'               => get_theme_mod( 'post_type_works_title', esc_html__( 'Work', 'consulting' ) ),
		'plural_title'        => get_theme_mod( 'post_type_works_plural', esc_html__( 'Works', 'consulting' ) ),
		'all_items'           => get_theme_mod( 'post_type_works_all_items', esc_html__( 'All Works', 'consulting' ) ),
		'rewrite'             => get_theme_mod( 'post_type_works_rewrite', 'works' ),
		'icon'                => get_theme_mod( 'post_type_works_icon', 'dashicons-portfolio' ),
		'supports'            => array( 'title', 'excerpt', 'editor', 'thumbnail' )
	),
	'stm_testimonials' => array(
		'title'               => get_theme_mod( 'post_type_testimonials_title', esc_html__( 'Testimonial', 'consulting' ) ),
		'plural_title'        => get_theme_mod( 'post_type_testimonials_plural', esc_html__( 'Testimonials', 'consulting' ) ),
		'all_items'           => get_theme_mod( 'post_type_testimonials_all_items', esc_html__( 'All Testimonials', 'consulting' ) ),
		'rewrite'             => get_theme_mod( 'post_type_testimonials_rewrite', 'testimonials' ),
		'icon'                => get_theme_mod( 'post_type_services_icon', 'dashicons-testimonial' ),
		'supports'            => array( 'title', 'excerpt', 'thumbnail' ),
		'exclude_from_search' => true,
		'publicly_queryable'  => false
	),
	'stm_vc_sidebar'  => array(
		'title'               => esc_html__( 'VC Sidebar', 'consulting' ),
		'plural_title'        => esc_html__( 'VC Sidebars', 'consulting' ),
		'all_items'           => esc_html__( 'All Sidebars', 'consulting' ),
		'rewrite'             => 'vc_sidebar',
		'icon'                => 'dashicons-schedule',
		'supports'            => array( 'title', 'editor' ),
		'exclude_from_search' => true,
		'publicly_queryable'  => false
	),
);

foreach ( $defaultPostTypesOptions as $post_type => $data ) {
	$args = array();

	if ( ! empty( $data['plural_title'] ) ) {
		$args['pluralTitle'] = $data['plural_title'];
	}
	if ( ! empty( $data['all_items'] ) ) {
		$args['all_items'] = $data['all_items'];
	}
	if ( ! empty( $data['icon'] ) ) {
		$args['menu_icon'] = $data['icon'];
	}
	if ( ! empty( $data['rewrite'] ) ) {
		$args['rewrite'] = array( 'slug' => $data['rewrite'] );
	}
	if ( ! empty( $data['supports'] ) ) {
		$args['supports'] = $data['supports'];
	}
	if ( ! empty( $data['exclude_from_search'] ) ) {
		$args['exclude_from_search'] = $data['exclude_from_search'];
	}
	if ( ! empty( $data['publicly_queryable'] ) ) {
		$args['publicly_queryable'] = $data['publicly_queryable'];
	}
	if ( ! empty( $data['show_in_menu'] ) ) {
		$args['show_in_menu'] = $data['show_in_menu'];
	}
	STM_PostType::registerPostType( $post_type, esc_html( $data['title'] ), $args );
}

STM_PostType::addTaxonomy( 'stm_testimonials_category', esc_html__( 'Categories', 'consulting' ), 'stm_testimonial' );
STM_PostType::addTaxonomy( 'stm_works_category', esc_html__( 'Categories', 'consulting' ), 'stm_works' );

if ( ! function_exists( 'stm_post_types_init' ) ) {
	function stm_post_types_init() {

		STM_PostType::addMetaBox( 'page_setup', esc_html__( 'Page Setup', 'consulting' ), array( 'page', 'post', 'stm_service', 'stm_careers', 'stm_staff', 'stm_works', 'product' ), '', '', '', array(
			'fields' => array(
				'separator_title_box_options' => array(
					'label' => esc_html__( 'Title Box Options', 'consulting' ),
					'type'  => 'separator'
				),
				'disable_title_box'          => array(
					'label' => esc_html__( 'Disable Title Box', 'consulting' ),
					'type'  => 'checkbox'
				),
				'enable_transparent'          => array(
					'label' => esc_html__( 'Enable Transparent', 'consulting' ),
					'type'  => 'checkbox'
				),
				'title_box_title_color'       => array(
					'label' => esc_html__( 'Title Color', 'consulting' ),
					'type'  => 'color_picker'
				),
				'title_box_title_line_color'       => array(
					'label' => esc_html__( 'Title Line Color', 'consulting' ),
					'type'  => 'color_picker'
				),
				'title_box_bg_image'          => array(
					'label' => esc_html__( 'Background Image', 'consulting' ),
					'type'  => 'image'
				),
				'title_box_bg_position'       => array(
					'label' => esc_html__( 'Background Position', 'consulting' ),
					'type'  => 'text'
				),
				'title_box_bg_size'           => array(
					'label' => esc_html__( 'Background Size', 'consulting' ),
					'type'  => 'text'
				),
				'title_box_bg_repeat'         => array(
					'label'   => esc_html__( 'Background Repeat', 'consulting' ),
					'type'    => 'select',
					'options' => array(
						'repeat'    => esc_html__( 'Repeat', 'consulting' ),
						'no-repeat' => esc_html__( 'No Repeat', 'consulting' ),
						'repeat-x'  => esc_html__( 'Repeat-X', 'consulting' ),
						'repeat-y'  => esc_html__( 'Repeat-Y', 'consulting' )
					)
				),
				'disable_title'               => array(
					'label' => esc_html__( 'Disable Title', 'consulting' ),
					'type'  => 'checkbox'
				),
				'disable_breadcrumbs'         => array(
					'label' => esc_html__( 'Disable Breadcrumbs', 'consulting' ),
					'type'  => 'checkbox'
				),
				'enable_header_transparent'   => array(
					'label' => esc_html__( 'Enable Header Transparent', 'consulting' ),
					'type'  => 'checkbox'
				),
			)
		) );

		STM_PostType::addMetaBox( 'testimonials_info', esc_html__( 'Information', 'consulting' ), array( 'stm_testimonials' ), '', '', '', array(
			'fields' => array(
				'testimonial_position' => array(
					'label' => esc_html__( 'Position', 'consulting' ),
					'type'  => 'text'
				),
				'testimonial_company' => array(
					'label' => esc_html__( 'Company', 'consulting' ),
					'type'  => 'text'
				),
			)
		) );

		STM_PostType::addMetaBox( 'careers_information', esc_html__( 'Information', 'consulting' ), array( 'stm_careers' ), '', '', '', array(
			'fields' => array(
				'department'   => array(
					'label' => esc_html__( 'Department', 'consulting' ),
					'type'  => 'text'
				),
				'location'     => array(
					'label' => esc_html__( 'Location', 'consulting' ),
					'type'  => 'text'
				),
				'education'    => array(
					'label' => esc_html__( 'Education', 'consulting' ),
					'type'  => 'text'
				),
				'compensation' => array(
					'label' => esc_html__( 'Compensation', 'consulting' ),
					'type'  => 'text'
				),
				'contact_link' => array(
					'label' => esc_html__( 'Contact Us Link', 'consulting' ),
					'type'  => 'text'
				),
			)
		) );

		STM_PostType::addMetaBox( 'staff_information', esc_html__( 'Information', 'consulting' ), array( 'stm_staff' ), '', '', '', array(
			'fields' => array(
				'department'  => array(
					'label' => esc_html__( 'Department', 'consulting' ),
					'type'  => 'text'
				),
				'address'  => array(
					'label' => esc_html__( 'Address', 'consulting' ),
					'type'  => 'text'
				),
				'phone'       => array(
					'label' => esc_html__( 'Phone', 'consulting' ),
					'type'  => 'text'
				),
				'skype'       => array(
					'label' => esc_html__( 'Skype', 'consulting' ),
					'type'  => 'text'
				),
				'email'       => array(
					'label' => esc_html__( 'Email', 'consulting' ),
					'type'  => 'text'
				),
				'facebook'    => array(
					'label' => esc_html__( 'Facebook', 'consulting' ),
					'type'  => 'text'
				),
				'twitter'     => array(
					'label' => esc_html__( 'Twitter', 'consulting' ),
					'type'  => 'text'
				),
				'google_plus' => array(
					'label' => esc_html__( 'Google+', 'consulting' ),
					'type'  => 'text'
				),
				'linkedin'    => array(
					'label' => esc_html__( 'Linkedin', 'consulting' ),
					'type'  => 'text'
				),
			)
		) );

	}
}

add_action( 'init', 'stm_post_types_init' );