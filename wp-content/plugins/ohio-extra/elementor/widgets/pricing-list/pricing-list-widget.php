<?php
class Ohio_Elementor_Pricing_List_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_pricing_list';
    }

    public function get_title()
    {
        return __( 'Pricing List', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-pricing-list';
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

        // General
        $this->add_control(
            'name',
            [
                'label' => __( 'Headline', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Item position', 'ohio-extra' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'ingredients',
            [
                'label' => __( 'Details', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true
            ]
        );

        $this->add_control(
            'regular_price',
            [
                'label' => __( 'Regular Price', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '25$',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'sale_price',
            [
                'label' => __( 'Sale Price', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'mark',
            [
                'label' => __( '"New" badge', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'separator' => 'before'
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
            'headline_color',
            [
                'label' => __( 'Headline color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'headline_typography',
                'label' => __( 'Headline typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .heading',
            ]
        );

        $this->add_control(
            'indgredients_color',
            [
                'label' => __( 'Details color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-list-details' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ingredients_typography',
                'label' => __( 'Details typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .pricing-list-details',
            ]
        );

        $this->end_controls_section();

        // Styles
        $this->start_controls_section(
            'price_styles_section',
            [
                'label' => __( 'Pricing', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'regular_price_color',
            [
                'label' => __( 'Regular price color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-list-price .regular-price' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'regular_price_typography',
                'label' => __( 'Price typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .pricing-list-price .regular-price'
            ]
        );

        $this->add_control(
            'sale_price_color',
            [
                'label' => __( 'Sale price color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-list-price .title' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sale_price_typography',
                'label' => __( 'Price typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .pricing-list-price .title',
            ]
        );

        $this->add_control(
            'mark_color',
            [
                'label' => __( '"New" badge color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .badge' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mark_typography',
                'label' => __( '"New" badge typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .badge',
            ]
        );

        $this->add_control(
            'mark_background',
            [
                'label' => __( '"New" badge backgroud color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .badge' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( $settings['sale_price'] ) {
            $this->addWrapperClass( '-with-discount' );
        }

        include( plugin_dir_path( __FILE__ ) . 'pricing-list-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Pricing_List_Widget() );
