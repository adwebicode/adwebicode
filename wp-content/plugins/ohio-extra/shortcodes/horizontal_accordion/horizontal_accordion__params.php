<?php

/**
* WPBakery Page Builder Ohio Accordion shortcode params
*/

vc_lean_map( 'ohio_horizontal_accordion', 'ohio_horizontal_accordion_sc_map' );

function ohio_horizontal_accordion_sc_map() {
	return array(
		'name' => __( 'Horizontal Accordion', 'ohio-extra' ),
		'description' => __( 'Collapsible horizontal accordion', 'ohio-extra' ),
		'base' => 'ohio_horizontal_accordion',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/accordion_horizontal_icon.svg',
		'is_container' => true,
		'show_settings_on_create' => false,
		'as_parent' => array(
			'only' => 'ohio_horizontal_accordion_inner',
		),
		'js_view' => 'VcOhioBackendTtaHorizontalAccordionView',
		'custom_markup' => '
			<div class="vc_tta-container" data-vc-action="collapseAll">
				<div class="vc_general vc_tta vc_tta-accordion vc_tta-color-backend-accordion-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-o-shape-group vc_tta-controls-align-left vc_tta-gap-2">
				<div class="vc_tta-panels vc_clearfix {{container-class}}">
					<div class="vc_tta-panel vc_tta-section-append">
						<div class="vc_tta-panel-heading">
							<h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
							<a href="javascript:;" aria-expanded="false" class="vc_tta-backend-add-control">
								<span class="vc_tta-title-text">' . esc_html__( 'Add Section', 'ohio-extra' ) . '</span>
									<i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i>
								</a>
							</h4>
						</div>
					</div>
				</div>
				</div>
			</div>
		',
		'default_content' => '[ohio_horizontal_accordion_inner title="' . sprintf( '%s %d', esc_html__( 'Section', 'ohio-extra' ), 1 ) . '"][/ohio_horizontal_accordion_inner][ohio_horizontal_accordion_inner title="' . sprintf( '%s %d', esc_html__( 'Section', 'ohio-extra' ), 2 ) . '"][/ohio_horizontal_accordion_inner]',
		'params' => array(

			// Styles.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio_extra' ),
				'heading' => __( 'Tabs content typography', 'ohio-extra' ),
				'param_name' => 'horizontal_accordion_tabs_content_typo'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Tabs background', 'ohio-extra' ),
				'param_name' => 'tab_bg_color'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Tabs background (hover state)', 'ohio-extra' ),
				'param_name' => 'tab_hover_bg_color'
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

			// Appear Effect.
			array(
				'type' => 'dropdown',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Appear effect', 'ohio-extra' ),
				'param_name' => 'appearance_effect',
				'value' => array(
					__( 'None', 'ohio-extra' ) => 'none',
					__( 'Fade up', 'ohio-extra' ) => 'fade-up',
					__( 'Fade down', 'ohio-extra' ) => 'fade-down',
					__( 'Fade left', 'ohio-extra' ) => 'fade-left',
					__( 'Fade right', 'ohio-extra' ) => 'fade-right',
					__( 'Flip up', 'ohio-extra' ) => 'flip-up',
					__( 'Flip down', 'ohio-extra' ) => 'flip-down',
					__( 'Zoom in', 'ohio-extra' ) => 'zoom-in',
					__( 'Zoom out', 'ohio-extra' ) => 'zoom-out'
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation duration', 'ohio-extra' ),
				'param_name' => 'appearance_duration',
				'description' => __( 'Duration accept values from 50 to 3000 (ms), with step 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation delay', 'ohio-extra' ),
				'param_name' => 'appearance_delay',
				'description' => __( 'A delay before animation, accepted values are in range from 50 to 3000 (ms), with a step of 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation repeat', 'ohio-extra' ),
				'description' => 'Repeat animation while scrolling page up and down',
				'param_name' => 'appearance_once',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Ohio_Horizontal_Accordion extends WPBakeryShortCode {
		protected $controls_css_settings = 'out-tc vc_controls-content-widget';

		public function __construct( $settings ) {
			parent::__construct( $settings );
		}

		public function contentAdmin( $atts, $content = null ) {
			$width = $custom_markup = '';
			$shortcode_attributes = array( 'width' => '1/1' );
			foreach ( $this->settings['params'] as $param ) {
				if ( 'content' !== $param['param_name'] ) {
					$shortcode_attributes[ $param['param_name'] ] = isset( $param['value'] ) ? $param['value'] : null;
				} elseif ( 'content' === $param['param_name'] && null === $content ) {
					$content = $param['value'];
				}
			}
			extract( shortcode_atts( $shortcode_attributes, $atts ) );

			$elem = $this->getElementHolder( $width );

			$inner = '';
			foreach ( $this->settings['params'] as $param ) {
				$param_value = isset( ${$param['param_name']} ) ? ${$param['param_name']} : '';
				if ( is_array( $param_value ) ) {
					// Get first element from the array
					reset( $param_value );
					$first_key = key( $param_value );
					$param_value = $param_value[ $first_key ];
				}
				$inner .= $this->singleParamHtmlHolder( $param, $param_value );
			}

			$tmp = '';

			if ( isset( $this->settings['custom_markup'] ) && '' !== $this->settings['custom_markup'] ) {
				if ( '' !== $content ) {
					$custom_markup = str_ireplace( '%content%', $tmp . $content, $this->settings['custom_markup'] );
				} elseif ( '' === $content && isset( $this->settings['default_content_in_template'] ) && '' !== $this->settings['default_content_in_template'] ) {
					$custom_markup = str_ireplace( '%content%', $this->settings['default_content_in_template'], $this->settings['custom_markup'] );
				} else {
					$custom_markup = str_ireplace( '%content%', '', $this->settings['custom_markup'] );
				}
				$inner .= do_shortcode( $custom_markup );
			}
			$output = str_ireplace( '%wpb_element_content%', $inner, $elem );

			return $output;
		}
	}
}