<?php
class Ohio_Elementor_Icon_Box_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_icon_box';
    }

    public function get_title()
    {
        return __( 'Icon Box', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-icon-box';
    }

    public function get_categories()
    {
        return [ 100 ];
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
            'icon_box_layout',
            [
                'label' => __( 'Icon box layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'top_icon' => [
                        'title' => __( 'Top Icon', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_012.svg',
                    ],
                    'left_icon' => [
                        'title' => __( 'Left Icon', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_015.svg',
                    ]
                ],
                'default' => 'top_icon',
            ]
        );

        $this->add_control(
            'icon_box_full_layout',
            [
                'label' => __( 'Icon box type', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'none' => [
                        'title' => __( 'Inline Icon', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_015.svg',
                    ],
                    'full' => [
                        'title' => __( 'Floating Icon', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_016.svg',
                    ]
                ],
                'default' => 'none'
            ]
        );

        $this->add_control(
            'icon_box_alignment',
            [
                'label' => __( 'Icon box alignment', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_013.svg',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_012.svg',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_014.svg',
                    ]
                ],
                'default' => 'center',
                'condition' => [
                    'icon_box_layout' => 'top_icon',
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Hello there!',
                'label_block' => true
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'label_block' => true,
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
            'icon_layout',
            [
                'label' => __( 'Icon variations', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_017.svg',
                    ],
                    'border' => [
                        'title' => __( 'Outlined', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_018.svg',
                    ],
                    'fill' => [
                        'title' => __( 'Contained', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/icon_box/images/wpb_params_020.svg',
                    ]
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __( 'Icon type', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'icon' => 'Font icon',
                    'image' => 'Custom image',
                ],
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => __( 'Preview image', 'ohio-extra' ),
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
                    '{{WRAPPER}} .icon-group .icon' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'link_section',
            [
                'label' => __( 'Link', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'use_link',
            [
                'label' => __( 'Use link?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'button_title',
            [
                'label' => __( 'Link title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Read more', 'ohio-extra' ),
                'label_block' => true,
                'condition' => [
                    'use_link' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __( 'Button URL', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'ohio-extra' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'condition' => [
                    'use_link' => 'yes',
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
                'label' => __( 'Title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-heading' => 'color: {{VALUE}};'
                ] 
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .icon-box-heading',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Description color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-content p' => 'color: {{VALUE}};'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Description typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .icon-box-content p',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_styles_section',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-group' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'icon_back_color',
            [
                'label' => __( 'Icon background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .-contained' => 'background-color: {{VALUE}};'
                ],
                'condition' => [
                    'icon_layout' => 'fill',
                ]
            ]
        );

        $this->add_control(
            'icon_border_color',
            [
                'label' => __( 'Icon border color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .-outlined' => 'border-color: {{VALUE}};'
                ],
                'condition' => [
                    'icon_layout' => 'border',
                ]
            ]
        );

        $this->end_controls_section();
  
        $this->addButtonStyleSection();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['icon_box_alignment'] ) {
            case 'left':
                $this->addWrapperClass( '-left -left-flex' );
                break;
            case 'center':
                $this->addWrapperClass( '-center -center-flex' );
                break;
            case 'right':
                $this->addWrapperClass( '-right -right-flex' );
                break;
        }

        switch ( $settings['icon_box_full_layout'] ) {
            case 'full':
                $this->addWrapperClass( '-floating-icon' );
                break;
        }

        if ( $settings['icon_box_full_layout'] != 'full' ) { 

            switch ( $settings['icon_box_layout'] ) {
                case 'left_icon':
                    $this->addWrapperClass( '-left-icon' );
                    break;
            }
        }

        $settings['icon_classes'] = '';
        switch ( $settings['icon_layout'] ) {
            case 'border':
                $settings['icon_classes'] = '-outlined';
                break;
            case 'fill':
                $settings['icon_classes'] = '-contained';
                break;
        }

        include( plugin_dir_path( __FILE__ ) . 'icon-box-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Icon_Box_Widget() );
