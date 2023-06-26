<?php
class Ohio_Elementor_Badge_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_badge';
    }

    public function get_title()
    {
        return __( 'Badge', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-badge';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'layout',
            [
                'label' => __( 'Badge layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'fill' => [
                        'title' => __( 'Fill', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_023.svg',
                    ],
                    'outlined' => [
                        'title' => __( 'Outlined', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_024.svg',
                    ],
                ],
                'default' => 'fill',
            ]
        );

        $this->add_control(
            'alignment',
            [
                'label' => __( 'Badge position', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/banner/images/wpb_params_035.svg',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/banner/images/wpb_params_036.svg',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/banner/images/wpb_params_037.svg',
                    ],
                ],
                'default' => 'left',
            ]
        );

        // General
        $this->add_control(
            'title',
            [
                'label' => __( 'Badge title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Badge',
                'label_block' => true
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Badge border radius', 'ohio-extra' ),
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
                    'unit' => 'rem',
                    'size' => 0.35,
                ],
                'selectors' => [
                    '{{WRAPPER}} .badge' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->end_controls_section();

        //Styles
         $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Badge title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .badge' => 'color:{{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Badge title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .badge',
            ]
        );

        $this->add_control(
            'badge_color',
            [
                'label' => __( 'Badge color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .badge:not(.-outlined)' => 'background-color:{{VALUE}}',
                    '{{WRAPPER}} .badge.-outlined' => 'border-color:{{VALUE}}'
                ],
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['layout'] ) {
            case 'outlined':
                $this->addWrapperClass( '-outlined' );
                break;
        }

        $align_classes = '';
        switch ( $settings['alignment'] ) {
            case 'center':
                $align_classes .= '-center';
                break;
            case 'right':
                $align_classes .= '-right';
                break;
        }

        include( plugin_dir_path( __FILE__ ) . 'badge-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Badge_Widget() );
