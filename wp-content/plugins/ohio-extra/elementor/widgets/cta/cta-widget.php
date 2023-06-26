<?php
class Ohio_Elementor_CTA_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_call_to_action';
    }

    public function get_title()
    {
        return __( 'Call To Action', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-call-to-action';
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
            'title',
            [
                'label' => __( 'Heading', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Are you ready?',
                'label_block' => true
            ]
        );

        $this->add_control(
            'heading_tag',
            [
                'label' => __( 'Heading HTML tag', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h3',
                'options' => [
                    'h1' => 'h1',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __( 'Subtitle', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' =>__( 'Some short block description', 'ohio-extra' ),
                'placeholder' => __( 'Enter short subtitle.', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'subtitle_type_layout',
            [
                'label' => __( 'Subtitle layout', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'top_subtitle',
                'options' => [
                    'without_subtitle' => __( 'Without Subtitle', 'ohio-extra' ),
                    'bottom_subtitle' => __( 'Bottom Subtitle', 'ohio-extra' ),
                    'top_subtitle' => __( 'Top Subtitle', 'ohio-extra' ),
                ],
                'separator' => 'after'
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
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .call-to-action' => 'border-radius: {{SIZE}}{{UNIT}};'
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
                'default' => ''
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
                    '{{WRAPPER}} .call-to-action.-with-shadow' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});'
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => __( 'Button', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_title',
            [
                'label' => __( 'Link title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Read More',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __( 'Link URL', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'ohio-extra' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'icon_position',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'without',
                'options' => [
                    'without' => 'Without icon',
                    'left' => 'Left side',
                    'right' => 'Right side',
                ],
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
                'condition' => [
                    'icon_position!' => 'without'
                ]
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
                    'icon_position!' => 'without'
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
                    'icon_position!' => 'without'
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

        // $this->add_control(
        //     'without_paddings',
        //     [
        //         'label' => __( 'Without side paddings?', 'ohio-extra' ),
        //         'type' => \Elementor\Controls_Manager::SWITCHER,
        //         'label_on' => __( 'Yes', 'ohio-extra' ),
        //         'label_off' => __( 'No', 'ohio-extra' ),
        //         'return_value' => 'yes',
        //         'default' => '',
        //     ]
        // );

        $this->add_control(
            'background_color',
            [
                'label' => __( 'Background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .call-to-action' => 'background-color:{{VALUE}}'
                ],
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading .title' => 'color:{{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .heading .title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Subtitle color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading .subtitle' => 'color:{{VALUE}}'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Subtitle typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .heading .subtitle',
            ]
        );

        $this->end_controls_section();

        $this->addButtonStyleSection( false );
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        switch ( $settings['subtitle_type_layout'] ) {
            case 'top_subtitle':
                $this->addWrapperClass( 'subtitle-top' );
                break;
            case 'bottom_subtitle':
                $this->addWrapperClass( 'subtitle-bottom' );
                break;
        }

        if ( $settings['drop_shadow'] ) {
            $this->addWrapperClass( '-with-shadow' );
        }

        include( plugin_dir_path( __FILE__ ) . 'cta-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_CTA_Widget() );
