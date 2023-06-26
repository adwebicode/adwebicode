<?php
class Ohio_Elementor_Banner_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_banner';
    }

    public function get_title()
    {
        return __( 'Banner', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-banner';
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
                'label' => __( 'Content', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'block_type_layout',
            [
                'label' => __( 'Banner layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'full' => [
                        'title' => __( 'Card', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/banner/images/wpb_params_001.svg',
                    ],
                    'inner' => [
                        'title' => __( 'Overlay Details', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/banner/images/wpb_params_005.svg',
                    ],
                    'inner_hover' => [
                        'title' => __( 'Hover Details', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/banner/images/wpb_params_006.svg',
                    ],
                ],
                'default' => 'full',
            ]
        );

        $this->add_control(
            'block_type_full_align',
            [
                'label' => __( 'Content alignment', 'ohio-extra' ),
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

        $this->add_control(
            'background_image',
            [
                'label' => __( 'Background', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Image border radius', 'ohio-extra' ),
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
                    '{{WRAPPER}} .card:not(.-contained) .image-holder' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'equal_height',
            [
                'label' => __( 'Equal height', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'description' => __( 'Convert blog images to a square.', 'ohio-extra' ),
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => ''
            ]
        );

        $this->add_control(
            'tilt_effect',
            [
                'label' => __( 'Enable tilt effect', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => ''
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
                    '{{WRAPPER}} .-with-shadow .image-holder' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});'
                ],
            ]
        );

        $this->add_control(
            'card_effect',
            [
                'label' => __( 'Hover effect', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => __( 'None', 'ohio-extra' ),
                    'scale' => __( 'Image Scaling', 'ohio-extra' ),
                    'overlay' => __( 'Image Overlay', 'ohio-extra' ),
                    'greyscale' => __( 'Image Greyscale', 'ohio-extra' ),
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Headline', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Banner headline', 'ohio-extra' ),
                'placeholder' => __( 'Title text', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __( 'Subtitle', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Subtitle text', 'ohio-extra' ),
                'placeholder' => __( 'Subtitle text', 'ohio-extra' ),
            ]
        );
        
        $this->add_control(
            'description',
            [
                'label' => __( 'Description (<small><strong>HTML allowed</strong></small>)', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 3,
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
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __( 'URL', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'ohio-extra' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [
                    'use_link' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Text and Overlay', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Headline color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .overlay-details .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        // .banner.-with-overlay:not(.team-member) .overlay-details .title, .banner.-image-only .overlay-details .title

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Headline typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Subtitle color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subtitle' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __( 'Subtitle typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .subtitle',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Description color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .overlay-details p' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Description typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .overlay-details p',
            ]
        );

        $this->add_control(
            'overlay_color',
            [
                'label' => __( 'Overlay color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner:not(.-with-overlay):not(.-image-only) .overlay-details' => 'background: linear-gradient(rgba(0, 0, 0, 0), {{VALUE}})',
                    '{{WRAPPER}} .banner .overlay-details' => 'background-color: {{VALUE}}'
                ],
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
            case 'inner':
                $this->addWrapperClass( '-with-overlay' );
                break;
            case 'inner_hover':
                $this->addWrapperClass( '-image-only' );
                break;
        }

        switch ( $settings['block_type_full_align'] ) {
            case 'center':
                $this->addWrapperClass( '-center' );
                break;
            case 'right':
                $this->addWrapperClass( '-right' );
                break;
        }

        switch ( $settings['card_effect'] ) {
            case 'scale':
                $this->addWrapperClass( '-img-scale' );
                break;
            case 'overlay':
                $this->addWrapperClass( '-img-overlay' );
                break;
            case 'greyscale':
                $this->addWrapperClass( '-img-greyscale' );
                break;
        }

        if ( $settings['equal_height'] ) {
            $this->addWrapperClass( '-metro' );
        }

        if ( $settings['drop_shadow'] ) {
            $this->addWrapperClass( '-with-shadow' );
        }

        if ( $settings['tilt_effect'] ) {
            $tilt_attrs = 'data-tilt=true data-tilt-perspective=6000';
        }

        include( plugin_dir_path( __FILE__ ) . 'banner-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Banner_Widget() );
