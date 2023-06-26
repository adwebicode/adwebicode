<?php
class Ohio_Elementor_Message_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_message';
    }

    public function get_title()
    {
        return __( 'Message', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-message';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'general_section',
            [
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'message_position',
            [
                'label' => __( 'Message position', 'ohio-extra' ),
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
            'message_type',
            [
                'label' => __( 'Message type', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => __( 'Default', 'ohio-extra' ),
                    'warning' => __( 'Warning', 'ohio-extra' ),
                    'primary' => __( 'Primary', 'ohio-extra' ),
                    'success' => __( 'Success', 'ohio-extra' ),
                    'danger' => __( 'Danger', 'ohio-extra' )
                ],
                'default' => 'default',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'size',
            [
                'label' => __( 'Message size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => __( 'Default', 'ohio-extra' ),
                    'small' => __( 'Small', 'ohio-extra' ),
                    'large' => __( 'Large', 'ohio-extra' )
                ],
                'default' => 'default',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __( 'Message text', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' => __( 'Something important here.', 'ohio-extra' ),
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
                    '{{WRAPPER}} .alert' => 'border-radius: {{SIZE}}{{UNIT}};'
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
                    '{{WRAPPER}} .-with-shadow' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});'
                ],
            ]
        );

        $this->add_control(
            'full_width',
            [
                'label' => __( 'Full width layout', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'without_close_button',
            [
                'label' => __( 'Show close button?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'wrap_text',
            [
                'label' => __( 'Wrap text?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
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
                    'use_icon' => 'yes',
                ],
                'separator' => 'before'
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
                    'unit' => 'em',
                    'size' => 1.5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'use_icon' => 'yes',
                    'icon_type' => 'icon',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => __( 'Link button', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'use_link',
            [
                'label' => __( 'Add link', 'ohio-extra' ),
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
                'default' => 'Read more',
                'label_block' => true,
                'condition' => [
                    'use_link' => 'yes',
                ],
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
                'condition' => [
                    'use_link' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Styles
        $this->start_controls_section(
            'basic_styles_section',
            [
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __( 'Text color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .alert' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'label' => __( 'Text typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .alert',
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Link color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .alert a' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'use_link' => 'yes'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __( 'Link typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .alert a',
                'condition' => [
                    'use_link' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => __( 'Background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .alert' => 'background-color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['message_type'] ) {
            case 'primary':
                $this->addWrapperClass( '-primary' );
                break;
            case 'success':
                $this->addWrapperClass( '-success' );
                break;
            case 'warning':
                $this->addWrapperClass( '-warning' );
                break;
            case 'danger':
                $this->addWrapperClass( '-danger' );
                break;
        }

        switch ( $settings['size'] ) {
            case 'small':
                $this->addWrapperClass( '-small' );
                break;
            case 'large':
                $this->addWrapperClass( '-large' );
                break;
        }

        $align_classes = '';
        switch ( $settings['message_position'] ) {
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

        if ( !$settings['wrap_text'] ) {
            $this->addWrapperClass( '-nowrap-t' );
        }

        include( plugin_dir_path( __FILE__ ) . 'message-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Message_Widget() );
