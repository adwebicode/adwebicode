<?php
class Ohio_Elementor_Team_Member_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_team_member';
    }

    public function get_title()
    {
        return __( 'Team Member', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-team-member';
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
            'block_layout',
            [
                'label' => __( 'Team member layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'card_details' => [
                        'title' => __( 'Card Details', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/team_member/images/wpb_params_062.svg',
                    ],
                    'inner_details' => [
                        'title' => __( 'Inner Details', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/team_member/images/wpb_params_063.svg',
                    ]
                ],
                'default' => 'card_details',
            ]
        );

        $this->add_control(
            'alignment',
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
            'team_member_image',
            [
                'label' => __( 'Member photo', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'member_name',
            [
                'label' => __( 'Member name', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'John Doe', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'member_position',
            [
                'label' => __( 'Member position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Product Manager', 'ohio-extra' )
            ]
        );

        $this->add_control(
            'member_description',
            [
                'label' => __( 'Member about', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'description' => __( 'Brief description of team member\'s skills and achievements', 'ohio-extra' ),
                'rows' => 2,
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
                    '{{WRAPPER}} .team-member .image-holder' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'equal_height',
            [
                'label' => __( 'Equal height', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
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
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'team_member_link',
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
            'social_section',
            [
                'label' => __( 'Social Links', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'social_networks',
            [
                'label' => __( 'Social networks', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->getSocialNetworksControls(),
                'default' => [],
                'title_field' => '{{list_link}}',
                'prevent_empty' => false,
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
            'member_name_color',
            [
                'label' => __( 'Member name color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'member_name_typography',
                'label' => __( 'Member name typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_control(
            'member_position_color',
            [
                'label' => __( 'Member position color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .author-details' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'member_position_typography',
                'label' => __( 'Member position typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .author-details',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'About color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .extra-details > p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .overlay-details > p' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'About typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .extra-details > p, {{WRAPPER}} .overlay-details > p',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'other_section',
            [
                'label' => __( 'Other', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'overlay_color',
            [
                'label' => __( 'Overlay color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner:not(.-img-overlay) .overlay-details' => 'background: linear-gradient(rgba(0, 0, 0, 0), {{VALUE}})',
                    '{{WRAPPER}} .banner.-img-overlay .image-holder::after' => 'background: {{VALUE}}',
                ]
            ]
        );

        $this->start_controls_tabs( 'tab_colors_style', ['separator' => 'before'] );

        $this->start_controls_tab(
            'tab_colors_normal',
            [
                'label' => __( 'Normal', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'socials_color',
            [
                'label' => __( 'Social links color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-networks a' => 'color: {{VALUE}};',
                ],
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
            'socials_hover_color',
            [
                'label' => __( 'Social links color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-networks a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function getSocialNetworksControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_link', [
                'label' => '',
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => 'https://example.com',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_network',
            [
                'label' => '',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'facebook',
                'options' => $this->getSocialNetworksOptionsList(),
                'label_block' => true,
            ]
        );
        
        return $repeater->get_controls();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( $settings['block_layout'] == 'inner_details'){
            $this->addWrapperClass( '-with-overlay' );
        }

        switch ( $settings['alignment'] ) {
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

        include( plugin_dir_path( __FILE__ ) . 'team-member-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Team_Member_Widget() );
