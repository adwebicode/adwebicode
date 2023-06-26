<?php
class Ohio_Elementor_Clients_Logo_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_clients_logo';
    }

    public function get_title()
    {
        return __( 'Clients Logo', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-clients-logo';
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
            'block_alignment',
            [
                'label' => __( 'Clients logo position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'ohio-extra' ),
                        'icon' => 'fab fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'ohio-extra' ),
                        'icon' => 'fab fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'ohio-extra' ),
                        'icon' => 'fab fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'clients_logo_image',
            [
                'label' => __( 'Clients logo image', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'clients_logo_width',
            [
                'label' => __( 'Image width', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', 'vw' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 130,
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo img' => 'width: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Details', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'label_block' => true,
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

        // Styles

        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Details color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .logo-details' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Details typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .logo-details',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        switch ( $settings['block_alignment'] ) {
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

        include( plugin_dir_path( __FILE__ ) . 'clients-logo-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Clients_Logo_Widget() );
