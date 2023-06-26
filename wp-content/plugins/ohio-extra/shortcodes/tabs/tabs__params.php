<?php

/**
* WPBakery Page Builder Ohio Tabs shortcode params
*/

vc_lean_map( 'ohio_tabs', 'ohio_tabs_sc_map' );

function ohio_tabs_sc_map() {
	return array(
		'name' => __( 'Tabs', 'ohio-extra' ),
		'description' => __( 'Tabs module', 'ohio-extra' ),
		'base' => 'ohio_tabs',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/tabs_icon.svg',
		'is_container' => true,
		'show_settings_on_create' => true,
		'as_parent' => array(
			'only' => 'ohio_tabs_inner',
		),
		'js_view' => 'VcOhioBackendTtaTabsView',
		'custom_markup' => '
			<div class="vc_tta-container" data-vc-action="collapse">
				<div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
					<div class="vc_tta-tabs-container">'
						. '<ul class="vc_tta-tabs-list">'
						. '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="vc_tta_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
						. '</ul>
					</div>
					<div class="vc_tta-panels vc_clearfix {{container-class}}">
					{{ content }}
					</div>
				</div>
			</div>
		',
		'default_content' => '
			[ohio_tabs_inner title="' . sprintf( '%s %d', __( 'Tab', 'ohio-extra' ), 1 ) . '"][/ohio_tabs_inner]
			[ohio_tabs_inner title="' . sprintf( '%s %d', __( 'Tab', 'ohio-extra' ), 2 ) . '"][/ohio_tabs_inner]
		',
		'admin_enqueue_js' => array(
			vc_asset_url( 'lib/vc_tabs/vc-tabs.min.js' ),
		),
		'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Tabs layout', 'ohio-extra' ),
				'param_name' => 'tabs_type',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_058.svg',
						'key' => 'default',
						'title' => __( 'Default', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_059.svg',
						'key' => 'filled',
						'title' => __( 'Contained', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_059.svg',
						'key' => 'button',
						'title' => __( 'Button', 'ohio-extra' ),
					)
				),
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Tabs direction', 'ohio-extra' ),
				'param_name' => 'tabs_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_059.svg',
						'key' => 'ontop',
						'title' => __( 'Horizontal', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_060.svg',
						'key' => 'onleft',
						'title' => __( 'Vertical', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Content alignment', 'ohio-extra' ),
				'param_name' => 'tabs_alignment',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_035.svg',
						'key' => 'left',
						'title' => __( 'Left', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_036.svg',
						'key' => 'center',
						'title' => __( 'Center', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_037.svg',
						'key' => 'right',
						'title' => __( 'Right', 'ohio-extra' ),
					)
				),
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Tabs border radius', 'ohio-extra' ),
				'param_name' => 'border_radius',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '5',
				'dependency' => array(
					'element' => 'tabs_type',
					'value' => array(
						'button'
					)
				)
			),

			// Styles.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Tabs title typography', 'ohio-extra' ),
				'param_name' => 'tabs_title_typo'
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Active tab title typography', 'ohio-extra' ),
				'param_name' => 'tabs_active_title_typo'
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Tabs content typography', 'ohio-extra' ),
				'param_name' => 'tabs_content_typo',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Active tab underline color', 'ohio-extra' ),
				'param_name' => 'tabs_line_color'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Tabs background color', 'ohio-extra' ),
				'param_name' => 'tab_color',
				'dependency' => array(
					'element' => 'tabs_type',
					'value' => array(
						'filled',
						'button'
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Active tab background color', 'ohio-extra' ),
				'param_name' => 'tab_active_color',
				'dependency' => array(
					'element' => 'tabs_type',
					'value' => array(
						'filled',
						'button'
					)
				)
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
	class WPBakeryShortCode_Ohio_Tabs extends WPBakeryShortCode {
		static $filter_added = false;
		protected $controls_css_settings = 'out-tc vc_controls-content-widget';
		protected $controls_list = array( 'edit', 'clone', 'delete' );

		public function __construct( $settings ) {
			parent::__construct( $settings );
			if ( ! self::$filter_added ) {
				$this->addFilter( 'vc_inline_template_content', 'setCustomTabId' );
				self::$filter_added = true;
			}
		}

		public function getTabTemplate() {
			return '<div class="wpb_template">' . do_shortcode( '[vc_tab title="Tab" tab_id=""][/vc_tab]' ) . '</div>';
		}

		public function setCustomTabId( $content ) {
			return preg_replace( '/tab\_id\=\"([^\"]+)\"/', 'tab_id="$1-' . time() . '"', $content );
		}
	}
}
