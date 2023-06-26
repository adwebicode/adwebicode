<?php

/**
* WPBakery Page Builder Ohio Tabs Inner shortcode params
*/

vc_lean_map( 'ohio_tabs_inner', 'ohio_tabs_inner_sc_map' );

function ohio_tabs_inner_sc_map() {
	return array(
		'name' => __( 'Tab', 'ohio-extra' ),
		'description' => __( 'Accordion tab', 'ohio-extra' ),
		'base' => 'ohio_tabs_inner',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'allowed_container_element' => 'vc_row',
		'is_container' => true,
		'show_settings_on_create' => false,
		'as_child' => array(
			'only' => 'ohio_tabs',
		),
		'js_view' => 'VcBackendTtaSectionView',
		'custom_markup' => '
			<div class="vc_tta-panel-heading">
				<h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left"><a href="javascript:;" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-accordion data-vc-container=".wpb_ohio_tabs"><span class="vc_tta-title-text">{{ section_title }}</span><i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a></h4>
			</div>
			<div class="vc_tta-panel-body">
				{{ editor_controls }}
				<div class="{{ container-class }}"></div>
			</div>
		',
		'default_content' => '',
		'params' => array(

			// General.
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Tab title', 'ohio-extra' ),
				'param_name' => 'title',
			),
			array(
				'type' => 'el_id',
				'param_name' => 'tab_id',
				'settings' => array(
					'auto_generate' => true,
				),
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Tab unique ID', 'ohio-extra' ),
				'description' => __( 'Make sure that an ID is unique and valid according to W3C Specification.', 'ohio-extra' ),
			),

			// Icon.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Add icon?', 'ohio-extra' ),
				'param_name' => 'with_icon',
				'value' => array(
					'Yes' => '0'
				)
			),
			array(
				'type' => 'ohio_icon_picker',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Icon', 'ohio-extra' ),
				'param_name' => 'icon_as_icon',
				'settings' => array(),
				'dependency' => array(
					'element' => 'with_icon',
					'value' => array(
						'1'
					)
				),
			),

			// Design Options.
            array(
                'type' => 'css_editor',
                'heading' => __( 'CSS', 'ohio-extra' ),
                'param_name' => 'content_styles',
                'group' => __( 'Design Options', 'ohio-extra' ),
            ),
            array(
                'type' => 'ohio_divider',
                'group' => __( 'Design Options', 'ohio-extra' ),
                'param_name' => 'other_settings_title',
                'value' => __( 'Other', 'ohio-extra' ),
            ),
            array(
                'type' => 'textfield',
                'group' => __( 'Design Options', 'ohio-extra' ),
                'heading' => __( 'Custom CSS class', 'ohio-extra' ),
                'param_name' => 'css_class',
                'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ohio-extra' ),
            ),
		)
	);
}


if ( class_exists( 'VcShortcodeAutoloader' ) ) {
	VcShortcodeAutoloader::getInstance()->includeClass( 'WPBakeryShortCode_VC_Tta_Accordion' );

	class WPBakeryShortCode_Ohio_Tabs_Inner extends WPBakeryShortCode_VC_Tta_Accordion {
		protected $controls_css_settings = 'tc vc_control-container';
		protected $controls_list = array( 'add', 'edit', 'clone', 'delete' );
		protected $backened_editor_prepend_controls = true;
		/**
		 * @var WPBakeryShortCode_VC_Tta_Accordion
		 */
		public static $tta_base_shortcode;
		public static $self_count = 0;
		public static $section_info = array();

		public function getFileName() {
			if ( isset( self::$tta_base_shortcode ) && 'vc_tta_pageable' === self::$tta_base_shortcode->getShortcode() ) {
				return 'vc_tta_pageable_section';
			} else {
				return 'vc_tta_section';
			}
		}

		public function containerContentClass() {
			return 'wpb_column_container vc_container_for_children vc_clearfix';
		}

		public function getElementClasses() {
			$classes = array();
			$classes[] = 'vc_tta-panel';
			$isActive = ! vc_is_page_editable() && $this->getTemplateVariable( 'section-is-active' );

			if ( $isActive ) {
				$classes[] = $this->activeClass;
			}

			/**
			 * @since 4.6.2
			 */
			if ( isset( $this->atts['el_class'] ) ) {
				$classes[] = $this->atts['el_class'];
			}

			return implode( ' ', array_filter( $classes ) );
		}

		/**
		 * @param $atts
		 * @param $content
		 *
		 * @return string
		 */
		public function getParamContent( $atts, $content ) {
			return wpb_js_remove_wpautop( $content );
		}

		/**
		 * @param $atts
		 * @param $content
		 *
		 * @return string|null
		 */
		public function getParamTabId( $atts, $content ) {
			if ( isset( $atts['tab_id'] ) && strlen( $atts['tab_id'] ) > 0 ) {
				return $atts['tab_id'];
			}

			return null;
		}

		/**
		 * @param $atts
		 * @param $content
		 *
		 * @return string|null
		 */
		public function getParamTitle( $atts, $content ) {
			if ( isset( $atts['title'] ) && strlen( $atts['title'] ) > 0 ) {
				return $atts['title'];
			}

			return null;
		}

		/**
		 * @param $atts
		 * @param $content
		 *
		 * @return string|null
		 */
		public function getParamIcon( $atts, $content ) {
			if ( !empty( $atts['add_icon'] ) && 'true' === $atts['add_icon'] ) {
				$iconClass = '';
				if ( isset( $atts[ 'i_icon_' . $atts['i_type'] ] ) ) {
					$iconClass = $atts[ 'i_icon_' . $atts['i_type'] ];
				}
				vc_icon_element_fonts_enqueue( $atts['i_type'] );

				return '<i class="vc_tta-icon ' . esc_attr( $iconClass ) . '"></i>';
			}

			return null;
		}

		/**
		 * @param $atts
		 * @param $content
		 *
		 * @return string|null
		 */
		public function getParamIconLeft( $atts, $content ) {
			if ( 'left' === $atts['i_position'] ) {
				return $this->getParamIcon( $atts, $content );
			}

			return null;
		}

		/**
		 * @param $atts
		 * @param $content
		 *
		 * @return string|null
		 */
		public function getParamIconRight( $atts, $content ) {
			if ( 'right' === $atts['i_position'] ) {
				return $this->getParamIcon( $atts, $content );
			}

			return null;
		}

		/**
		 * Section param active
		 */
		public function getParamSectionIsActive( $atts, $content ) {
			if ( is_object( self::$tta_base_shortcode ) ) {
				if ( isset( self::$tta_base_shortcode->atts['active_section'] ) && strlen( self::$tta_base_shortcode->atts['active_section'] ) > 0 ) {
					$active = (int) self::$tta_base_shortcode->atts['active_section'];
					if ( $active === self::$self_count ) {
						return true;
					}
				}
			}

			return null;
		}

		public function getParamControlIconPosition( $atts, $content ) {
			if ( is_object( self::$tta_base_shortcode ) ) {
				if (
					isset( self::$tta_base_shortcode->atts['c_icon'] ) && strlen( self::$tta_base_shortcode->atts['c_icon'] ) > 0 &&
					isset( self::$tta_base_shortcode->atts['c_position'] ) && strlen( self::$tta_base_shortcode->atts['c_position'] ) > 0
				) {
					$c_position = self::$tta_base_shortcode->atts['c_position'];

					return 'vc_tta-controls-icon-position-' . $c_position;
				}
			}

			return null;
		}

		public function getParamControlIcon( $atts, $content ) {
			if ( is_object( self::$tta_base_shortcode ) ) {
				if ( isset( self::$tta_base_shortcode->atts['c_icon'] ) && strlen( self::$tta_base_shortcode->atts['c_icon'] ) > 0 ) {
					$c_icon = self::$tta_base_shortcode->atts['c_icon'];

					return '<i class="vc_tta-controls-icon vc_tta-controls-icon-' . $c_icon . '"></i>';
				}
			}

			return null;
		}

		public function getParamHeading( $atts, $content ) {
			$isPageEditable = vc_is_page_editable();

			$h4attributes = array();
			$h4classes = array(
				'vc_tta-panel-title',
			);
			if ( $isPageEditable ) {
				$h4attributes[] = 'data-vc-tta-controls-icon-position=""';
			} else {
				$controlIconPosition = $this->getTemplateVariable( 'control-icon-position' );
				if ( $controlIconPosition ) {
					$h4classes[] = $controlIconPosition;
				}
			}
			$h4attributes[] = 'class="' . implode( ' ', $h4classes ) . '"';

			$output = '<h4 ' . implode( ' ', $h4attributes ) . '>'; // close h4

			if ( $isPageEditable ) {
				$output .= '<a href="javascript:;" data-vc-target=""';
				$output .= ' data-vc-tta-controls-icon-wrapper';
				$output .= ' data-vc-use-cache="false"';
			} else {
				$output .= '<a href="#' . esc_attr( $this->getTemplateVariable( 'tab_id' ) ) . '"';
			}

			$output .= ' data-vc-accordion';

			$output .= ' data-vc-container=".vc_tta-container">';
			$output .= $this->getTemplateVariable( 'icon-left' );
			$output .= '<span class="vc_tta-title-text">'
			           . $this->getTemplateVariable( 'title' )
			           . '</span>';
			$output .= $this->getTemplateVariable( 'icon-right' );
			if ( ! $isPageEditable ) {
				$output .= $this->getTemplateVariable( 'control-icon' );
			}

			$output .= '</a>';
			$output .= '</h4>'; // close h4 fix #2229

			return $output;
		}

		/**
		 * Get basic heading
		 *
		 * These are used in Pageable element inside content and are hidden from view
		 *
		 * @param $atts
		 * @param $content
		 *
		 * @return string
		 */
		public function getParamBasicHeading( $atts, $content ) {
			$isPageEditable = vc_is_page_editable();

			if ( $isPageEditable ) {
				$attributes = array(
					'href' => 'javascript:;',
					'data-vc-container' => '.vc_tta-container',
					'data-vc-accordion' => '',
					'data-vc-target' => '',
					'data-vc-tta-controls-icon-wrapper' => '',
					'data-vc-use-cache' => 'false',
				);
			} else {
				$attributes = array(
					'data-vc-container' => '.vc_tta-container',
					'data-vc-accordion' => '',
					'data-vc-target' => esc_attr( '#' . $this->getTemplateVariable( 'tab_id' ) ),
				);
			}

			$output = '
				<span class="vc_tta-panel-title">
					<a ' . vc_convert_atts_to_string( $attributes ) . '></a>
				</span>
			';

			return $output;
		}
		/**
		 * Check is allowed to add another element inside current element.
		 *
		 * @since 4.8
		 *
		 * @return bool
		 */
		public function getAddAllowed() {
			return  vc_user_access()->part( 'shortcodes' )->checkStateAny( true, 'custom', null )->get();
		}
	}
}
