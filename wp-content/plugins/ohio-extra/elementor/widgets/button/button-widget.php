<?php
class Ohio_Elementor_Button_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_button';
    }

    public function get_title()
    {
        return __( 'Button', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-button';
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
            'block_type_layout',
            [
                'label' => __( 'Button layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'fill' => [
                        'title' => __( 'Fill', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_023.svg',
                    ],
                    'outline' => [
                        'title' => __( 'Outlined', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_024.svg',
                    ],
                    'flat' => [
                        'title' => __( 'Flat', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_025.svg',
                    ],
                    'link' => [
                        'title' => __( 'Link', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/button/images/wpb_params_026.svg',
                    ],
                ],
                'default' => 'fill',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Button border radius', 'ohio-extra' ),
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
                    '{{WRAPPER}} .button' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'block_type_layout' => ['fill', 'outline', 'flat'],
                ],
            ]
        );

        $this->add_control(
            'drop_shadow',
            [
                'label' => __( 'Drop shadow?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'block_type_layout' => ['fill', 'outline', 'flat'],
                ],
            ]
        );

        $this->add_control(
            'drop_shadow_intensity',
            [
                'label' => __( 'Shadow intensity', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    // 'size' => '10',
                ],
                'condition' => [
                    'drop_shadow' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .button.-with-shadow:not(.-flat)' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .button.-with-shadow.-flat:hover' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});'
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Click Me', 'ohio-extra' ),
                'placeholder' => __( 'Title text', 'ohio-extra' ),
                'label_block' => true
            ]
        );
        
        $this->add_control(
            'link',
            [
                'label' => __( 'Link URL', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'ohio-extra' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => false,
                ],
            ]
        );

        $this->add_control(
            'button_size',
            [
                'label' => __( 'Button size', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'small' => __( 'Small', 'ohio-extra' ),
                    'default' => __( 'Default', 'ohio-extra' ),
                    'large' => __( 'Large', 'ohio-extra' ),
                ],
                'default' => 'default',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'button_position',
            [
                'label' => __( 'Button position', 'ohio-extra' ),
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
                'default' => 'center',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'full_width',
            [
                'label' => __( 'Set full width?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'button_use_brand_color',
            [
                'label' => __( 'Use brand color?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_section',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'use_icon',
            [
                'label' => __( 'Show icon', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'icon_position',
            [
                'label' => __( 'Icon position', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'left' => __( 'Left', 'ohio-extra' ),
                    'right' => __( 'Right', 'ohio-extra' ),
                ],
                'default' => 'left',
                'condition' => [
                    'use_icon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'swap_text_to_icon',
            [
                'label' => __( 'Swap icon to text on hover', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'description' => __( 'This add "rolling" effect on hover.', 'ohio-extra' ),
                'condition' => [
                    'use_icon' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __( 'Icon type', 'ohio-extra' ),
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
                'label' => __( 'Custom icon image', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'use_icon' => 'yes',
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
                    'use_icon' => 'yes',
                    'icon_type' => 'icon',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( 'tab_colors_style' );

        $this->start_controls_tab(
            'tab_colors_normal',
            [
                'label' => __( 'Normal', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Button text color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .button:not(.-outlined):not(.-text):not(.-flat):not(.-pagination)' => 'color: {{VALUE}}',
                ],
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button background', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button:not(.-outlined):not(.-text):not(.-flat):not(.-primary):not(.page-link):not(:hover)' => 'background-color: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_colors_hover',
            [
                'label' => __( 'Hover', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label' => __( 'Button text color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .button:not(.-outlined):not(.-flat):not(.-text):not(.-primary):not(.-pagination):not(.elementor-button[type=submit]):hover' => 'color: {{VALUE}}',
                ],
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Button background', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button:not(.-outlined):not(.-flat):not(.-text):not(.-primary):not(.-pagination):not(.elementor-button[type=submit]):hover' => 'background-color: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Button text typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}}',
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['block_type_layout'] ) {
            case 'outline':
                $this->addWrapperClass( '-outlined' );
                break;
            case 'flat':
                $this->addWrapperClass( '-flat' );
                break;
            case 'link':
                $this->addWrapperClass( '-text' );
                break;
        }

        switch ( $settings['button_size'] ) {
            case 'small':
                $this->addWrapperClass( '-small' );
                break;
            case 'large':
                $this->addWrapperClass( '-large' );
                break;
        }

        $align_classes = '';
        switch ( $settings['button_position'] ) {
            case 'left':
                $align_classes .= '-left';
                break;
            case 'center':
                $align_classes .= '-center';
                break;
            case 'right':
                $align_classes .= '-right';
                break;
        }

        if ( $settings['full_width'] ) {
            $this->addWrapperClass( '-block' );
        }

        if ( $settings['drop_shadow'] ) {
            $this->addWrapperClass( '-with-shadow' );
        }

        if ( $settings['button_use_brand_color'] ) {
            $this->addWrapperClass( '-primary' );
        }

        if ( $settings['use_icon'] && $settings['swap_text_to_icon'] ) {
            $button_classes[] = 'btn-swap';
        }

        if ( !empty( $settings['button_color'] ) ) {
            $button_classes[] = 'btn-elementor-colored';
        }

        include( plugin_dir_path( __FILE__ ) . 'button-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Button_Widget() );
