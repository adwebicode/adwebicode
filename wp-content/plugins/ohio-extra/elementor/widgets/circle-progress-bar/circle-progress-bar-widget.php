<?php
class Ohio_Elementor_Circle_Progress_Bar_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-circle-progress-bar-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_circle_progress_bar';
    }

    public function get_title()
    {
        return __( 'Circle Progress', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-circle-progress-bar';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-circle-progress-bar-widget' ];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'block_type_layout',
            [
                'label' => __( 'Progress bar layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/circle_progress_bar/images/wpb_params_046.svg',
                    ],
                    'floating' => [
                        'title' => __( 'Floating', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/circle_progress_bar/images/wpb_params_047.svg',
                    ],
                ],
                'default' => 'default',
            ]
        );
        $this->add_control(
            'alignment',
            [
                'label' => __( 'Progress bar position', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/heading/images/wpb_params_035.svg',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/heading/images/wpb_params_036.svg',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/heading/images/wpb_params_037.svg',
                    ],
                ],
                'default' => 'left',
            ]
        );

        $this->add_control(
            'label',
            [
                'label' => __( 'Label', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' =>__( 'Some Feature', 'ohio-extra' ),
                'placeholder' => __( 'Enter block title.', 'ohio-extra' ),
            ]
        );
        $this->add_control(
            'progress_value',
            [
                'label' => __( 'Percentage value', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 75,
                ],
            ]
        );

        $this->add_control(
            'thickness',
            [
                'label' => __( 'Progress bar thickness', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'thin' => __( 'Thin', 'ohio-extra' ),
                    'default' => __( 'Default', 'ohio-extra' ),
                    'thick' => __( 'Thick', 'ohio-extra' ),
                ],
            ]
        );

        $this->add_control(
            'use_icon',
            [
                'label' => __( 'Add icon?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => ''
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_section',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'use_icon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __( 'Icon Type', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'icon' => __( 'Icon', 'ohio-extra' ),
                    'image' => __( 'Custom image', 'ohio-extra' ),
                ],
                'default' => 'icon',
                'condition' => [
                    'use_icon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => __( 'Custom Icon Image', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'icon_type' => 'image',
                ],
            ]
        );

        $this->add_control(
			'icon_icon',
			[
				'label' => __( 'Icon', 'ohio-extra' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
                ],
                'condition' => [
                    'icon_type' => 'icon',
                ],
			]
		);

        $this->add_control(
            'icon_size',
            [
                'label' => __( 'Icon size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', 'vw' ],
                'condition' => [
                    'icon_type' => 'icon',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'rem',
                    'size' => 2,
                ],
                'selectors' => [
                    '{{WRAPPER}} .circle i' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_style_section',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'use_icon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .circle i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'use_icon' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'chart_style_section',
            [
                'label' => __( 'Chart', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'chart_color',
            [
                'label' => __( 'Chart track color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .circle .progress-value' => 'stroke: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'label_style_section',
            [
                'label' => __( 'Label', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'label_color',
            [
                'label' => __( 'Label color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'label_typography',
                'label' => __( 'Label typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'percentage_style_section',
            [
                'label' => __( 'Percentage', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'percentage_color',
            [
                'label' => __( 'Percentage value color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .circle .range' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'percentage_typography',
                'label' => __( 'Percentage value typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .circle .range',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['block_type_layout'] ) {
            case 'floating':
                $this->addWrapperClass( '-floating' );
                break;
        }

        switch ( $settings['alignment'] ) {
            case 'left':
                $this->addWrapperClass( '-left' );
                break;
            case 'center':
                $this->addWrapperClass( '-center' );
                break;
            case 'right':
                $this->addWrapperClass( '-right' );
                break;
        }

        switch ( $settings['thickness'] ) {
            case 'thin':
                $this->addWrapperClass( '-thin' );
                break;
            case 'thick':
                $this->addWrapperClass( '-bold' );
                break;
        }
        
        include( plugin_dir_path( __FILE__ ) . 'circle-progress-bar-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Circle_Progress_Bar_Widget() );
