<?php

if ( function_exists( 'vc_set_default_editor_post_types' ) ) {
	vc_set_default_editor_post_types( array(
		'page',
		'post',
		'stm_vc_sidebar',
		'stm_careers',
		'stm_service',
		'stm_staff',
		'stm_works',
	) );
}

add_action( 'vc_before_init', 'consulting_vc_set_as_theme' );

if( ! function_exists( 'consulting_vc_set_as_theme' ) ) {
	function consulting_vc_set_as_theme() {
		vc_set_as_theme( true );
	}
}

if ( is_admin() ) {
	if ( ! function_exists( 'consulting_vc_remove_teaser_metabox' ) ) {
		function consulting_vc_remove_teaser_metabox() {
			$post_types = get_post_types( '', 'names' );
			foreach ( $post_types as $post_type ) {
				remove_meta_box( 'vc_teaser', $post_type, 'side' );
			}
		}

		add_action( 'do_meta_boxes', 'consulting_vc_remove_teaser_metabox' );
	}
}

if ( function_exists( 'vc_add_shortcode_param' ) ) {
	vc_add_shortcode_param( 'stm_animator', 'consulting_animator_param' );
}

if( ! function_exists( 'consulting_animator_param' ) ){
	function consulting_animator_param( $settings, $value ) {
		global $wp_filesystem;

		if ( empty( $wp_filesystem ) ) {
			require_once ABSPATH . '/wp-admin/includes/file.php';
			WP_Filesystem();
		}
		$param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
		$type       = isset( $settings['type'] ) ? $settings['type'] : '';
		$class      = isset( $settings['class'] ) ? $settings['class'] : '';
		$animations = json_decode( $wp_filesystem->get_contents( get_template_directory() . '/assets/js/animate-config.json' ), true );
		if ( $animations ) {
			$output = '<select name="' . esc_attr( $param_name ) . '" class="wpb_vc_param_value ' . esc_attr( $param_name . ' ' . $type . ' ' . $class ) . '">';
			foreach ( $animations as $key => $val ) {
				if ( is_array( $val ) ) {
					$labels = str_replace( '_', ' ', $key );
					$output .= '<optgroup label="' . ucwords( esc_attr( $labels ) ) . '">';
					foreach ( $val as $label => $style ) {
						$label = str_replace( '_', ' ', $label );
						if ( $label == $value ) {
							$output .= '<option selected value="' . esc_attr( $label ) . '">' . esc_html( $label ) . '</option>';
						} else {
							$output .= '<option value="' . esc_attr( $label ) . '">' . esc_html( $label ) . '</option>';
						}
					}
				} else {
					if ( $key == $value ) {
						$output .= "<option selected value=" . esc_attr( $key ) . ">" . esc_html( $key ) . "</option>";
					} else {
						$output .= "<option value=" . esc_attr( $key ) . ">" . esc_html( $key ) . "</option>";
					}
				}
			}

			$output .= '</select>';
		}

		return $output;
	}
}

if ( ! function_exists( 'consulting_vc_google_fonts' ) ) {
	function consulting_vc_google_fonts( $fonts ) {
		$fonts[] = (object) array(
				'font_family' => 'Poppins',
				'font_styles' => '300,regular,500,600,700',
				'font_types'  => '300 light:300:normal,400 regular:400:normal,500 medium:500:normal,600 semi-bold:600:normal,700 bold:700:normal'
		);
		return $fonts;
	}
}

add_filter( 'vc_google_fonts_get_fonts_filter', 'consulting_vc_google_fonts', 10, 1 );

add_action( 'admin_init', 'consulting_update_existing_shortcodes' );

if ( ! function_exists( 'consulting_update_existing_shortcodes' ) ) {
	function consulting_update_existing_shortcodes() {

		if ( function_exists( 'vc_add_params' ) ) {

			vc_add_params( 'vc_gallery', array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Gallery type', 'consulting' ),
					'param_name' => 'type',
					'value'      => array(
						__( 'Image grid', 'consulting' )     => 'image_grid',
						__( 'Slick slider', 'consulting' )   => 'slick_slider',
						__( 'Slick slider 2', 'consulting' ) => 'slick_slider_2'
					)
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Thumbnail size', 'consulting' ),
					'param_name' => 'thumbnail_size',
					'dependency' => array(
						'element' => 'type',
						'value'   => array( 'slick_slider_2' )
					),
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			) );

			vc_add_params( 'vc_column_inner', array(
				array(
					'type'        => 'column_offset',
					'heading'     => esc_html__( 'Responsiveness', 'consulting' ),
					'param_name'  => 'offset',
					'group'       => esc_html__( 'Width & Responsiveness', 'consulting' ),
					'description' => esc_html__( 'Adjust column for different screen sizes. Control width, offset and visibility settings.', 'consulting' )
				)
			) );

			vc_add_params( 'vc_separator', array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Type', 'consulting' ),
					'param_name' => 'type',
					'value'      => array(
						esc_html__( 'Type 1', 'consulting' ) => 'type_1',
						esc_html__( 'Type 2', 'consulting' ) => 'type_2'
					)
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				),
			) );

			vc_add_params( 'vc_video', array(
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Video Width', 'consulting' ),
					'param_name' => 'size'
				),
				array(
					'type'       => 'attach_image',
					'heading'    => esc_html__( 'Preview Image', 'consulting' ),
					'param_name' => 'image'
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Image Size', 'consulting' ),
					'param_name'  => 'img_size',
					'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "projects_gallery" size.', 'consulting' )
				),
			) );

			vc_add_params( 'vc_wp_pages', array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			) );

			vc_add_params( 'vc_custom_heading', array(
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'consulting' ),
					'param_name' => 'icon',
					'value'      => '',
					'weight'     => 1
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Icon Size (px)', 'consulting' ),
					'param_name' => 'icon_size',
					'value'      => '',
					'weight'     => 1
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Subtitle', 'consulting' ),
					'param_name' => 'subtitle',
					'weight'     => 1
				),
			) );

			vc_add_params( 'vc_basic_grid', array(
				array(
					'type'             => 'dropdown',
					'heading'          => esc_html__( 'Gap', 'consulting' ),
					'param_name'       => 'gap',
					'value'            => array(
						esc_html__( '0px', 'consulting' )  => '0',
						esc_html__( '1px', 'consulting' )  => '1',
						esc_html__( '2px', 'consulting' )  => '2',
						esc_html__( '3px', 'consulting' )  => '3',
						esc_html__( '4px', 'consulting' )  => '4',
						esc_html__( '5px', 'consulting' )  => '5',
						esc_html__( '10px', 'consulting' ) => '10',
						esc_html__( '15px', 'consulting' ) => '15',
						esc_html__( '20px', 'consulting' ) => '20',
						esc_html__( '25px', 'consulting' ) => '25',
						esc_html__( '30px', 'consulting' ) => '30',
						esc_html__( '35px', 'consulting' ) => '35',
						esc_html__( '40px', 'consulting' ) => '40',
						esc_html__( '45px', 'consulting' ) => '45',
						esc_html__( '50px', 'consulting' ) => '50',
						esc_html__( '55px', 'consulting' ) => '55',
						esc_html__( '60px', 'consulting' ) => '60',
					),
					'std'              => '30',
					'description'      => esc_html__( 'Select gap between grid elements.', 'consulting' ),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				)
			) );

			vc_add_params( 'vc_btn', array(
				array(
					'type'               => 'dropdown',
					'heading'            => esc_html__( 'Color', 'consulting' ),
					'param_name'         => 'color',
					'description'        => esc_html__( 'Select button color.', 'consulting' ),
					'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
					'value'              => array(
						                        esc_html__( 'Theme Style 1', 'consulting' )     => 'theme_style_1',
						                        esc_html__( 'Theme Style 2', 'consulting' )     => 'theme_style_2',
						                        esc_html__( 'Theme Style 3', 'consulting' )     => 'theme_style_3',
						                        esc_html__( 'Theme Style 4', 'consulting' )     => 'theme_style_4',
						                        esc_html__( 'Classic Grey', 'consulting' )      => 'default',
						                        esc_html__( 'Classic Blue', 'consulting' )      => 'primary',
						                        esc_html__( 'Classic Turquoise', 'consulting' ) => 'info',
						                        esc_html__( 'Classic Green', 'consulting' )     => 'success',
						                        esc_html__( 'Classic Orange', 'consulting' )    => 'warning',
						                        esc_html__( 'Classic Red', 'consulting' )       => 'danger',
						                        esc_html__( 'Classic Black', 'consulting' )     => 'inverse',
					                        ) + getVcShared( 'colors-dashed' ),
					'std'                => 'grey',
					'dependency'         => array(
						'element'            => 'style',
						'value_not_equal_to' => array( 'custom', 'outline-custom' ),
					),
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Sub Title', 'consulting' ),
					'param_name' => 'sub_title',
					'weight'     => 1
				),
			) );

		}

	}
}

if ( function_exists( 'vc_map' ) ) {
	add_action( 'init', 'consulting_vc_elements' );
}

if ( ! function_exists( 'consulting_vc_elements' ) ) {
	function consulting_vc_elements() {

		$project_categories_array = get_terms( 'project_category' );
		$project_categories       = array(
			esc_html__( 'All', 'consulting' ) => 'all'
		);
		if ( $project_categories_array && ! is_wp_error( $project_categories_array ) ) {
			foreach ( $project_categories_array as $cat ) {
				$project_categories[ $cat->name ] = $cat->slug;
			}
		}

		$testimonial_categories_array = get_terms( 'stm_testimonials_category' );
		$testimonial_categories       = array(
			esc_html__( 'All', 'consulting' ) => 'all'
		);
		if ( $testimonial_categories_array && ! is_wp_error( $testimonial_categories_array ) ) {
			foreach ( $testimonial_categories_array as $cat ) {
				$testimonial_categories[ $cat->name ] = $cat->slug;
			}
		}

		vc_map( array(
			'name'                    => esc_html__( 'Company History', 'consulting' ),
			'base'                    => 'stm_company_history',
			'as_parent'               => array( 'only' => 'stm_company_history_item' ),
			'show_settings_on_create' => false,
			'category'                => esc_html__( 'STM', 'consulting' ),
			'params'                  => array(
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Title', 'consulting' ),
					'param_name' => 'title'
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			),
			'js_view'                 => 'VcColumnView'
		) );

		vc_map( array(
			'name'     => esc_html__( 'Item', 'consulting' ),
			'base'     => 'stm_company_history_item',
			'as_child' => array( 'only' => 'stm_company_history' ),
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Year', 'consulting' ),
					'param_name' => 'year'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Title', 'consulting' ),
					'param_name' => 'title'
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__( 'Description', 'consulting' ),
					'param_name' => 'description'
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Our Partner', 'consulting' ),
			'base'     => 'stm_partner',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'consulting' ),
					'param_name' => 'style',
					'value'      => array(
						esc_html__( 'Style 1', 'consulting' ) => 'style_1',
						esc_html__( 'Style 2', 'consulting' ) => 'style_2'
					),
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Title', 'consulting' ),
					'param_name' => 'title'
				),
				array(
					'type'       => 'attach_image',
					'heading'    => esc_html__( 'Logo', 'consulting' ),
					'param_name' => 'logo'
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__( 'Position', 'consulting' ),
					'param_name' => 'position',
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'style_2' )
					)
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Image Size', 'consulting' ),
					'param_name'  => 'img_size',
					'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "default" size.', 'consulting' )
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__( 'Description', 'consulting' ),
					'param_name' => 'description'
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__( 'Link', 'consulting' ),
					'param_name' => 'link'
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Contacts', 'consulting' ),
			'base'     => 'stm_contacts_widget',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'textfield',
					'holder'     => 'div',
					'heading'    => esc_html__( 'Title', 'consulting' ),
					'param_name' => 'title'
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__( 'Address', 'consulting' ),
					'param_name' => 'address'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Phone', 'consulting' ),
					'param_name' => 'phone'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Email', 'consulting' ),
					'param_name' => 'email'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Facebook', 'consulting' ),
					'param_name' => 'facebook'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Twitter', 'consulting' ),
					'param_name' => 'twitter'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Linkedin', 'consulting' ),
					'param_name' => 'linkedin'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Google+', 'consulting' ),
					'param_name' => 'google_plus'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Youtube', 'consulting' ),
					'param_name' => 'youtube'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Skype', 'consulting' ),
					'param_name' => 'skype'
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Extra class name', 'consulting' ),
					'param_name'  => 'class',
					'value'       => '',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'consulting' )
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Info Box', 'consulting' ),
			'base'     => 'stm_info_box',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'textfield',
					'holder'     => 'div',
					'heading'    => esc_html__( 'Title', 'consulting' ),
					'param_name' => 'title'
				),
				array(
					'type'       => 'attach_image',
					'heading'    => esc_html__( 'Image', 'consulting' ),
					'param_name' => 'image'
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__( 'Align Center', 'consulting' ),
					'param_name' => 'align_center',
					'value'      => array(
						esc_html__( 'Yes', 'consulting' ) => 'yes'
					),
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'consulting' ),
					'param_name' => 'style',
					'value'      => array(
						esc_html__( 'Style 1', 'consulting' ) => 'style_1',
						esc_html__( 'Style 2', 'consulting' ) => 'style_2',
						esc_html__( 'Style 3', 'consulting' ) => 'style_3'
					),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Title Icon', 'consulting' ),
					'param_name' => 'title_icon',
					'value'      => '',
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'style_3' )
					)
				),
				array(
					'type'       => 'textarea_html',
					'heading'    => esc_html__( 'Text', 'consulting' ),
					'param_name' => 'content'
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__( 'Link', 'consulting' ),
					'param_name' => 'link'
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Link Icon', 'consulting' ),
					'param_name' => 'icon',
					'value'      => ''
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Icon Box', 'consulting' ),
			'base'     => 'stm_icon_box',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'textarea',
					'holder'     => 'div',
					'heading'    => esc_html__( 'Title', 'consulting' ),
					'param_name' => 'title'
				),
				array(
					'type'       => 'checkbox',
					'heading'    => '',
					'param_name' => 'hide_title_line',
					'value'      => array(
						esc_html__( 'Hide Title Line', 'consulting' ) => 'hide_title_line'
					)
				),
				array(
					'type'       => 'checkbox',
					'heading'    => '',
					'param_name' => 'enable_hexagon',
					'value'      => array(
						esc_html__( 'Enable Hexagon', 'consulting' ) => 'enable'
					)
				),
				array(
					'type'       => 'checkbox',
					'heading'    => '',
					'param_name' => 'enable_hexagon_animation',
					'value'      => array(
						esc_html__( 'Enable Hexagon Hover Animation', 'consulting' ) => 'enable'
					)
				),
				array(
					'type'       => 'checkbox',
					'heading'    => '',
					'param_name' => 'v_align_middle',
					'value'      => array(
						esc_html__( 'Enable Middle Align', 'consulting' ) => 'enable'
					)
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'consulting' ),
					'param_name' => 'icon',
					'value'      => ''
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'consulting' ),
					'param_name' => 'style',
					'value'      => array(
						esc_html__( 'Icon Top', 'consulting' )              => 'icon_top',
						esc_html__( 'Icon Left', 'consulting' )             => 'icon_left',
						esc_html__( 'Icon Left Transparent', 'consulting' ) => 'icon_left_transparent'
					)
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Icon Size', 'consulting' ),
					'param_name'  => 'icon_size',
					'value'       => '65',
					'description' => esc_html__( 'Enter icon size in px', 'consulting' )
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Icon Height', 'consulting' ),
					'param_name'  => 'icon_height',
					'value'       => '65',
					'description' => esc_html__( 'Enter icon height in px', 'consulting' ),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'icon_top' )
					)
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Icon Width', 'consulting' ),
					'param_name'  => 'icon_width',
					'value'       => '50',
					'description' => esc_html__( 'Enter icon width in px', 'consulting' ),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'icon_left', 'icon_left_transparent' )
					)
				),
				array(
					'type'       => 'textarea_html',
					'heading'    => esc_html__( 'Text', 'consulting' ),
					'param_name' => 'content'
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Stats Counter', 'consulting' ),
			'base'     => 'stm_stats_counter',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'textfield',
					'holder'     => 'div',
					'heading'    => esc_html__( 'Title', 'consulting' ),
					'param_name' => 'title'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Counter Value', 'consulting' ),
					'param_name' => 'counter_value',
					'value'      => '1000'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Counter Value Prefix', 'consulting' ),
					'param_name' => 'counter_value_pre',
					'value'      => ''
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Counter Value Suffix', 'consulting' ),
					'param_name' => 'counter_value_suf',
					'value'      => ''
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Duration', 'consulting' ),
					'param_name' => 'duration',
					'value'      => '2.5'
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Testimonials', 'consulting' ),
			'base'     => 'stm_testimonials',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Count', 'consulting' ),
					'param_name' => 'count',
					'value'      => 1
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Testimonials Per Row', 'consulting' ),
					'param_name' => 'per_row',
					'value'      => array(
						1 => 1,
						2 => 2,
						3 => 3,
					)
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'consulting' ),
					'param_name' => 'style',
					'value'      => array(
						esc_html__( 'Style 1', 'consulting' ) => 'style_1',
						esc_html__( 'Style 2', 'consulting' ) => 'style_2'
					)
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Category', 'consulting' ),
					'param_name' => 'category',
					'value'      => $testimonial_categories
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Testimonials Carousel', 'consulting' ),
			'base'     => 'stm_testimonials_carousel',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Category', 'consulting' ),
					'param_name' => 'category',
					'value'      => $testimonial_categories
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Count', 'consulting' ),
					'param_name' => 'count',
					'value'      => 2
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Testimonials Per Row', 'consulting' ),
					'param_name' => 'per_row',
					'value'      => array(
						1 => 1,
						2 => 2,
						3 => 3,
					)
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__( 'Disable Carousel', 'consulting' ),
					'param_name' => 'disable_carousel',
					'value'      => array(
						esc_html__( 'Yes', 'consulting' ) => 'yes'
					)
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__( 'Link', 'consulting' ),
					'param_name' => 'link'
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Contact', 'consulting' ),
			'base'     => 'stm_contact',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Name', 'consulting' ),
					'param_name' => 'name'
				),
				array(
					'type'       => 'attach_image',
					'heading'    => esc_html__( 'Image', 'consulting' ),
					'param_name' => 'image'
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Image Size', 'consulting' ),
					'param_name'  => 'image_size',
					'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "default" size.', 'consulting' )
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Job', 'consulting' ),
					'param_name' => 'job'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Email', 'consulting' ),
					'param_name' => 'email'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Skype', 'consulting' ),
					'param_name' => 'skype'
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

		$stm_sidebars_array = get_posts( array( 'post_type' => 'stm_vc_sidebar', 'posts_per_page' => - 1 ) );
		$stm_sidebars       = array( esc_html__( 'Select', 'consulting' ) => 0 );
		if ( $stm_sidebars_array ) {
			foreach ( $stm_sidebars_array as $val ) {
				$stm_sidebars[ get_the_title( $val ) ] = $val->ID;
			}
		}

		vc_map( array(
			'name'     => esc_html__( 'STM Sidebar', 'consulting' ),
			'base'     => 'stm_sidebar',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Code', 'consulting' ),
					'param_name' => 'sidebar',
					'value'      => $stm_sidebars
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

		vc_map( array(
			"name"      => esc_html__( 'Animation Block', 'consulting' ),
			"base"      => 'stm_animation_block',
			"class"     => 'animation_block',
			"as_parent" => array( 'except' => 'stm_animation_block' ),
			"category"  => esc_html__( 'STM', 'consulting' ),
			"params"    => array(
				array(
					"type"       => "stm_animator",
					"class"      => "",
					"heading"    => esc_html__( "Animation", 'consulting' ),
					"param_name" => "animation",
					"value"      => ""
				),
				array(
					"type"        => "textfield",
					"heading"     => esc_html__( "Animation Duration (s)", 'consulting' ),
					"param_name"  => "animation_duration",
					"value"       => 3,
					"description" => esc_html__( "How long the animation effect should last. Decides the speed of effect.", 'consulting' ),
				),
				array(
					"type"        => "textfield",
					"heading"     => esc_html__( "Animation Delay (s)", 'consulting' ),
					"param_name"  => "animation_delay",
					"value"       => 0,
					"description" => esc_html__( "Delays the animation effect for seconds you enter above.", 'consulting' ),
				),
				array(
					"type"        => "textfield",
					"heading"     => esc_html__( "Viewport Position (%)", 'consulting' ),
					"param_name"  => "viewport_position",
					"value"       => "90",
					"description" => esc_html__( "The area of screen from top where animation effects will start working.", 'consulting' ),
				)
			),
			"js_view"   => 'VcColumnView'
		) );

		vc_map( array(
			'name'     => esc_html__( 'Image Carousel', 'consulting' ),
			'base'     => 'stm_image_carousel',
			'icon'     => 'stm_image_carousel',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'attach_images',
					'heading'    => esc_html__( 'Images', 'consulting' ),
					'param_name' => 'images'
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__( 'Enable Opacity', 'consulting' ),
					'param_name' => 'grayscale',
					'value'      => array(
						esc_html__( 'Yes', 'consulting' ) => 'yes'
					)
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__( 'Link', 'consulting' ),
					'param_name' => 'link'
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Image size', 'consulting' ),
					'param_name'  => 'img_size',
					'value'       => 'thumbnail',
					'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use default size.', 'consulting' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Extra class name', 'consulting' ),
					'param_name'  => 'el_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'consulting' )
				),
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Slider autoplay', 'consulting' ),
					'param_name'  => 'autoplay',
					'description' => esc_html__( 'Enable autoplay mode.', 'consulting' ),
					'value'       => array(
						esc_html__( 'Yes', 'consulting' ) => 'yes'
					),
					'group'       => esc_html__( 'Carousel', 'consulting' )
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Autoplay Timeout', 'consulting' ),
					'param_name'  => 'timeout',
					'value'       => '5000',
					'description' => esc_html__( 'Autoplay interval timeout (in ms).', 'consulting' ),
					'dependency'  => array(
						'element' => 'autoplay',
						'value'   => array( 'yes' ),
					),
					'group'       => esc_html__( 'Carousel', 'consulting' ),
				),
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Slider loop', 'consulting' ),
					'param_name'  => 'loop',
					'description' => esc_html__( 'Enable slider loop mode.', 'consulting' ),
					'value'       => array(
						esc_html__( 'Yes', 'consulting' ) => 'yes'
					),
					'group'       => esc_html__( 'Carousel', 'consulting' ),
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Smart Speed', 'consulting' ),
					'param_name' => 'smart_speed',
					'value'      => '250',
					'group'      => esc_html__( 'Carousel', 'consulting' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Items', 'consulting' ),
					'param_name'  => 'items',
					'value'       => '6',
					'description' => esc_html__( 'The number of items you want to see on the screen.', 'consulting' ),
					'group'       => esc_html__( 'Carousel', 'consulting' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Items (Small Desktop)', 'consulting' ),
					'param_name'  => 'items_small_desktop',
					'value'       => '5',
					'description' => esc_html__( 'Number of items the carousel will display. Default: at <980px - 3 items.', 'consulting' ),
					'group'       => esc_html__( 'Carousel', 'consulting' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Items (Tablet)', 'consulting' ),
					'param_name'  => 'items_tablet',
					'value'       => '4',
					'description' => esc_html__( 'Number of items the carousel will display. Default: at <768px - 2 items.', 'consulting' ),
					'group'       => esc_html__( 'Carousel', 'consulting' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Items (Mobile)', 'consulting' ),
					'param_name'  => 'items_mobile',
					'value'       => '1',
					'description' => esc_html__( 'Number of items the carousel will display. Default: at <479px - 1 item.', 'consulting' ),
					'group'       => esc_html__( 'Carousel', 'consulting' ),
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'News', 'consulting' ),
			'base'     => 'stm_news',
			'icon'     => 'stm_news',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'loop',
					'heading'    => esc_html__( 'Query', 'consulting' ),
					'param_name' => 'loop',
					'value'      => 'size:4|post_type:post',
					'settings'   => array(
						'size' => array( 'hidden' => false, 'value' => 4 )
					),
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Posts Per Row', 'consulting' ),
					'param_name' => 'posts_per_row',
					'value'      => array(
						1 => 1,
						2 => 2,
						3 => 3,
						4 => 4
					),
					'std'        => 4
				),
				array(
					'type'       => 'checkbox',
					'param_name' => 'disable_preview_image',
					'value'      => array(
						esc_html__( 'Disable Preview Image', 'consulting' ) => 'disable'
					)
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Image Size', 'consulting' ),
					'param_name'  => 'img_size',
					'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use default size.', 'consulting' )
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

		vc_map( array(
			'name'                    => esc_html__( 'Google Map', 'consulting' ),
			'base'                    => 'stm_gmap',
			'icon'                    => 'stm_gmap',
			'as_parent'               => array( 'only' => 'stm_gmap_address' ),
			'show_settings_on_create' => true,
			'js_view'                 => 'VcColumnView',
			'category'                => esc_html__( 'STM', 'consulting' ),
			'params'                  => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Map Height', 'consulting' ),
					'param_name'  => 'map_height',
					'value'       => '733px',
					'description' => esc_html__( 'Enter map height in px', 'consulting' )
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Map Zoom', 'consulting' ),
					'param_name' => 'map_zoom',
					'value'      => 18
				),
				array(
					'type'       => 'attach_image',
					'heading'    => esc_html__( 'Marker Image', 'consulting' ),
					'param_name' => 'marker'
				),
				array(
					'type'       => 'checkbox',
					'param_name' => 'disable_mouse_whell',
					'value'      => array(
						esc_html__( 'Disable map zoom on mouse wheel scroll', 'consulting' ) => 'disable'
					)
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Extra class name', 'consulting' ),
					'param_name'  => 'el_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'consulting' )
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Address', 'consulting' ),
			'base'     => 'stm_gmap_address',
			'icon'     => 'stm_gmap_address',
			'as_child' => array( 'only' => 'stm_gmap' ),
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Title', 'consulting' ),
					'admin_label' => true,
					'param_name'  => 'title'
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__( 'Address', 'consulting' ),
					'param_name' => 'address'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Phone', 'consulting' ),
					'param_name' => 'phone'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Email', 'consulting' ),
					'param_name' => 'email'
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Latitude', 'consulting' ),
					'param_name'  => 'lat',
					'description' => wp_kses( __( '<a href="http://www.latlong.net/convert-address-to-lat-long.html">Here is a tool</a> where you can find Latitude & Longitude of your location', 'consulting' ), array( 'a' => array( 'href' => array() ) ) )
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Longitude', 'consulting' ),
					'param_name'  => 'lng',
					'description' => wp_kses( __( '<a href="http://www.latlong.net/convert-address-to-lat-long.html">Here is a tool</a> where you can find Latitude & Longitude of your location', 'consulting' ), array( 'a' => array( 'href' => array() ) ) )
				),
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Vacancies', 'consulting' ),
			'base'     => 'stm_vacancies',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css'
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Staff List', 'consulting' ),
			'base'     => 'stm_staff_list',
			'icon'     => 'stm_staff_list',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'consulting' ),
					'param_name' => 'style',
					'value'      => array(
						esc_html__( 'List', 'consulting' ) => 'list',
						esc_html__( 'Grid', 'consulting' ) => 'grid'
					)
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Staff Per Row', 'consulting' ),
					'param_name' => 'per_row',
					'value'      => array(
						2 => 2,
						3 => 3,
					),
					'dependency' => array(
						'element' => 'style',
						'value'   => array( 'grid' )
					)
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Count', 'consulting' ),
					'param_name' => 'count',
					'value'      => 6
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Details', 'consulting' ),
			'base'     => 'stm_post_details',
			'category' => esc_html__( 'STM Post Partials', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css'
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Bottom Info', 'consulting' ),
			'base'     => 'stm_post_bottom',
			'category' => esc_html__( 'STM Post Partials', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css'
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'About Author', 'consulting' ),
			'base'     => 'stm_post_about_author',
			'category' => esc_html__( 'STM Post Partials', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Comments', 'consulting' ),
			'base'     => 'stm_post_comments',
			'category' => esc_html__( 'STM Post Partials', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Services', 'consulting' ),
			'base'     => 'stm_services',
			'icon'     => 'stm_services',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Number Posts', 'consulting' ),
					'param_name' => 'posts_per_page',
					'value'      => 12
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Posts Per Row', 'consulting' ),
					'param_name' => 'posts_per_row',
					'value'      => array(
						4 => 4,
						3 => 3,
						2 => 2,
						1 => 1
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Image size', 'consulting' ),
					'param_name'  => 'img_size',
					'value'       => '',
					'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use default size.', 'consulting' ),
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Charts', 'consulting' ),
			'base'     => 'stm_charts',
			'icon'     => 'stm_charts',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Design', 'consulting' ),
					'param_name' => 'design',
					'value'      => array(
						esc_html__( 'Line', 'consulting' )   => 'line',
						esc_html__( 'Bar', 'consulting' )    => 'bar',
						esc_html__( 'Circle', 'consulting' ) => 'circle',
						esc_html__( 'Pie', 'consulting' )    => 'pie',
					),
				),
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__( 'Show legend?', 'consulting' ),
					'param_name'  => 'legend',
					'description' => esc_html__( 'If checked, chart will have legend.', 'consulting' ),
					'value'       => array( esc_html__( 'Yes', 'consulting' ) => 'yes' ),
					'std'         => 'yes',
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Legend Position', 'consulting' ),
					'param_name' => 'legend_position',
					'value'      => array(
						esc_html__( 'Bottom', 'consulting' ) => 'bottom',
						esc_html__( 'Right', 'consulting' )  => 'right',
					),
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Width (px)', 'consulting' ),
					'param_name' => 'width',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Height (px)', 'consulting' ),
					'param_name' => 'height',
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__( 'X-axis values', 'consulting' ),
					'param_name' => 'x_values',
					'value'      => 'JAN; FEB; MAR; APR; MAY; JUN; JUL; AUG',
					'dependency' => array(
						'element' => 'design',
						'value'   => array( 'line', 'bar' )
					),
				),
				array(
					'type'       => 'param_group',
					'heading'    => esc_html__( 'Values', 'consulting' ),
					'param_name' => 'values',
					'dependency' => array(
						'element' => 'design',
						'value'   => array( 'line', 'bar' )
					),
					'value'      => urlencode( json_encode( array(
						array(
							'title' => esc_html__( 'One', 'consulting' ),
							'y_values' => '10; 15; 20; 25; 27; 25; 23; 25',
							'color' => '#fe6c61',
						),
						array(
							'title' => esc_html__( 'Two', 'consulting' ),
							'y_values' => '25; 18; 16; 17; 20; 25; 30; 35',
							'color' => '#5472d2'
						)
					) ) ),
					'params'     => array(
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Title', 'consulting' ),
							'param_name'  => 'title',
							'description' => esc_html__( 'Enter title for chart dataset.', 'consulting' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Y-axis values', 'consulting' ),
							'param_name' => 'y_values'
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__( 'Color', 'consulting' ),
							'param_name' => 'color'
						)
					),
					'callbacks'  => array(
						'after_add' => 'vcChartParamAfterAddCallback',
					),
				),
				array(
					'type'       => 'param_group',
					'heading'    => esc_html__( 'Values', 'consulting' ),
					'param_name' => 'values_circle',
					'dependency' => array(
						'element' => 'design',
						'value'   => array( 'circle', 'pie' )
					),
					'value'      => urlencode( json_encode( array(
						array(
							'title' => esc_html__( 'One', 'consulting' ),
							'value' => '40',
							'color' => '#fe6c61',
						),
						array(
							'title' => esc_html__( 'Two', 'consulting' ),
							'value' => '30',
							'color' => '#5472d2'
						),
						array(
							'title' => esc_html__( 'Three', 'consulting' ),
							'value' => '40',
							'color' => '#8d6dc4'
						)
					) ) ),
					'params'     => array(
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__( 'Title', 'consulting' ),
							'param_name'  => 'title',
							'description' => esc_html__( 'Enter title for chart dataset.', 'consulting' ),
							'admin_label' => true,
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Value', 'consulting' ),
							'param_name' => 'value'
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__( 'Color', 'consulting' ),
							'param_name' => 'color'
						)
					),
					'callbacks'  => array(
						'after_add' => 'vcChartParamAfterAddCallback',
					),
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'About Vacancy', 'consulting' ),
			'base'     => 'stm_about_vacancy',
			'category' => esc_html__( 'STM Vacancy Partials', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Vacancy Bottom', 'consulting' ),
			'base'     => 'stm_vacancy_bottom',
			'category' => esc_html__( 'STM Vacancy Partials', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css'
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Staff Bottom', 'consulting' ),
			'base'     => 'stm_staff_bottom',
			'category' => esc_html__( 'STM Staff Partials', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css'
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Our Works', 'consulting' ),
			'base'     => 'stm_works',
			'category' => esc_html__( 'STM', 'consulting' ),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Style', 'consulting' ),
					'param_name' => 'style',
					'value'      => array(
						esc_html__( 'Grid', 'consulting' )             => 'grid',
						esc_html__( 'Grid with filter', 'consulting' ) => 'grid_with_filter'
					)
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Cols', 'consulting' ),
					'param_name' => 'cols',
					'value'      => array(
						4 => 4,
						3 => 3,
						2 => 2,
						1 => 1,
					)
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Image size', 'consulting' ),
					'param_name'  => 'img_size',
					'value'       => '',
					'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use default size.', 'consulting' ),
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'consulting' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'consulting' )
				)
			)
		) );

	}
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Stm_Company_History extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Stm_Animation_Block extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_Stm_Gmap extends WPBakeryShortCodesContainer {
	}
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Stm_Company_History_Item extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Partner extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Contacts_Widget extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Info_Box extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Icon_Box extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Posts extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Stats_Counter extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Testimonials extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Contact extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Sidebar extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Testimonials_Carousel extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Image_Carousel extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_News extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Gmap_Address extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Vacancies extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Staff_List extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Post_Details extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Post_Bottom extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Post_About_Author extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Post_Comments extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Services extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Charts extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_About_Vacancy extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Vacancy_Bottom extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Staff_Bottom extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Works extends WPBakeryShortCode {
	}
}

add_filter( 'vc_iconpicker-type-fontawesome', 'consulting_vc_icons' );

if ( ! function_exists( 'consulting_vc_icons' ) ) {
	function consulting_vc_icons( $fonts ) {

		$custom_fonts = get_option( 'stm_fonts' );
		foreach ( $custom_fonts as $font => $info ) {
			$icon_set   = array();
			$icons      = array();
			$upload_dir = wp_upload_dir();
			$path       = trailingslashit( $upload_dir['basedir'] );
			$file       = $path . $info['include'] . '/' . $info['config'];
			include( $file );
			if ( ! empty( $icons ) ) {
				$icon_set = array_merge( $icon_set, $icons );
			}
			if ( ! empty( $icon_set ) ) {
				foreach ( $icon_set as $icons ) {
					foreach ( $icons as $icon ) {
						$fonts['Theme Icons'][] = array(
							$font . '-' . $icon['class'] => $icon['class']
						);
					}
				}
			}
		}

		return $fonts;
	}
}