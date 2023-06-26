<?php
class Ohio_Elementor_Countdown_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'jquery-countdown', get_template_directory_uri() . '/assets/js/libs/jquery.countdown.min.js', [ 'jquery' ], '2.1.0', true );
        wp_register_script( 'ohio-elementor-countdown-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_countdown';
    }

    public function get_title()
    {
        return __( 'Countdown', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-countdown';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'jquery-countdown', 'ohio-elementor-countdown-widget' ];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'title_section',
            [
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // General
        $this->add_control(
            'block_layout',
            [
                'label' => __( 'Countdown layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/countdown/images/wpb_params_031.svg',
                    ],
                    'boxed' => [
                        'title' => __( 'Boxed', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/countdown/images/wpb_params_032.svg',
                    ],
                    'text' => [
                        'title' => __( 'Boxed', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/countdown/images/wpb_params_032.svg',
                    ]
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'countdown_alignment',
            [
                'label' => __( 'Countdown position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'ohio-extra' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'ohio-extra' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'ohio-extra' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'description' => __( 'You can choose where the countdown is aligned to', 'ohio-extra' ),
                'default' => 'center',
                'toggle' => false,
            ]
        );

        $this->add_control(
			'countdown_date',
			[
				'label' => __( 'Countdown date', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
                'default' => '2022-01-01 11:00'
			]
		);

        $this->add_control(
            'use_divider',
            [
                'label' => __( 'Use divider?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Shape border radius', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', 'vw' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .-contained .countdown-item .number' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'block_layout' => 'boxed'
                ]
            ]
        );

        $this->end_controls_section();


        //Styles
        $this->start_controls_section(
            'countdown_section',
            [
                'label' => __( 'Countdown', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

       
        $this->add_control(
            'numbers_color',
            [
                'label' => __( 'Numbers color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .countdown-item .number' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'numbers_typography',
                'label' => __( 'Numbers typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .countdown-item .number',
            ]
        );

        $this->add_control(
            'labels_color',
            [
                'label' => __( 'Labels color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .number-label' => 'color: {{VALUE}};'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'labels_typography',
                'label' => __( 'Labels typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .number-label',
            ]
        );

        $this->add_control(
            'box_color',
            [
                'label' => __( 'Counter background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .-contained .countdown-item .number' => 'background-color: {{VALUE}};'
                ],
                'condition' => [
                    'block_layout' => 'boxed'
                ],
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['block_layout'] ) {
            case 'boxed':
                $this->addWrapperClass( '-contained' );
                break;
            case 'text':
                $this->addWrapperClass( '-text' );
                break;
        }
        
        switch ( $settings['countdown_alignment'] ) {
            case 'left':
                $this->addWrapperClass( '-left-flex' );
                break;
            case 'center':
                $this->addWrapperClass( '-center-flex' );
                break;
            case 'right':
                $this->addWrapperClass( '-right-flex' );
                break;
        }

        if ( $settings['use_divider'] ) {
            $this->addWrapperClass( '-with-divider' );
        }

        // see: https://github.com/hilios/jQuery.countdown/issues/281
        $countdown_time = date( 'D, d M y H:i:s', strtotime( $settings['countdown_date'] ) );

        $countdown_box_uniqid = uniqid( 'ohio-custom-' );

        include( plugin_dir_path( __FILE__ ) . 'countdown-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_countdown_Widget() );
