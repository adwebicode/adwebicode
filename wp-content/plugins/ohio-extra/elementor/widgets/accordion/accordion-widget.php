<?php
class Ohio_Elementor_Accordion_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-accordion-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_accordion';
    }

    public function get_title()
    {
        return __( 'Accordion', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-accordion';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-accordion-widget' ];
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
                'label' => __( 'Accordion layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/accordion/images/wpb_params_021.svg',
                    ],
                    'outlined' => [
                        'title' => __( 'Outlined', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/accordion/images/wpb_params_022.svg',
                    ],
                    'outline' => [
                        'title' => __( 'Text', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/accordion/images/wpb_params_022.svg',
                    ]
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Tabs border radius', 'ohio-extra' ),
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
                    '{{WRAPPER}} .accordion:not(.-outlined):not(.-text) .accordion-item .accordion-button' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'block_layout' => 'default',
                ],
            ]
        );

        $this->add_control( 
            'tabs',
            [
                'label' => __( 'Tabs', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->getTabsControls(),
                'default' => [],
                'title_field' => '{{list_title}}',
                'prevent_empty' => false,
            ]
        );

        $this->end_controls_section();

        //Styles
        $this->start_controls_section(
            'tabs_section',
            [
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tabs_text_color',
            [
                'label' => __( 'Tabs title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-header' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tabs_typography',
                'label' => __( 'Tabs title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .accordion-header',
            ]
        );

        $this->add_control(
            'editor_content_color',
            [
                'label' => __( 'Tabs content color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .accordion-body' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'editor_content_typography',
                'label' => __( 'Tabs content typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .accordion-body',
            ]
        );

        $this->add_control(
            'tabs_background_color',
            [
                'label' => __( 'Tabs background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'block_layout' => 'default',
                ],
                'selectors' => [
                    '{{WRAPPER}} :not(.-outlined):not(.-text) .accordion-item .accordion-button' => 'background-color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'ui_icon_color',
            [
                'label' => __( 'Tabs icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-button .icon' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'tabs_border_color',
            [
                'label' => __( 'Tabs border color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'block_layout' => 'outlined',
                ],
                'selectors' => [
                    '{{WRAPPER}} .accordion-item .accordion-button' => 'border-top: 1px solid {{VALUE}};border-bottom: 1px solid {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function getTabsControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'is_active',
            [
                'label' => __( 'Is active?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $repeater->start_controls_tabs( 'tab_colors_style' );

        $repeater->start_controls_tab(
            'tab_tabs_content',
            [
                'label' => __( 'Content', 'ohio-extra' ),
            ]
        );

        $repeater->add_control(
            'list_title',
            [
                'label' => __( 'Title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Tab', 'ohio-extra' ),
                'placeholder' => __( 'Title text', 'ohio-extra' ),
                'label_block' => true,
                'separator' => 'before'
            ]
        );

        $repeater->add_control(
            'list_content_type',
            [
                'label' => __( 'Content type', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'editor' => __( 'Editor text', 'ohio-extra' ),
                    'template' => __( 'Template', 'ohio-extra' ),
                ],
                'label_block' => 'true',
                'default' => 'editor',
            ]
        );

        $repeater->add_control(
            'list_content_editor',
            [
                'label' => __( 'Editor', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Content text', 'ohio-extra' ),
                'condition' => [
                    'list_content_type' => 'editor',
                ],
            ]
        );

        // Available templates
        $templates = \Elementor\Plugin::$instance->templates_manager->get_source( 'local' )->get_items();
        $options = [ '0' => '— ' . esc_html__( 'Select', 'ohio-extra' ) . ' —' ];
        $types = [];

        foreach ( $templates as $template ) {
            $options[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
            $types[ $template['template_id'] ] = $template['type'];
        }
        
        $repeater->add_control(
            'list_content_template',
            array(
                'label'       => esc_html__( 'Choose Template', 'ohio-extra' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => '0',
                'options'     => $options,
                'types'       => $types,
                'label_block' => 'true',
                'condition'   => [
                    'list_content_type' => 'template',
                ]
            )
        );
        
        $repeater->add_control(
            'use_icon',
            [
                'label' => __( 'Add icon?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'separator' => 'before'
            ]
        );

        $repeater->add_control(
            'icon_icon',
            [
                'label' => __( 'Icon', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
                'condition' => [
                    'use_icon' => 'yes'
                ],
            ]
        );
        
        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            'tab_tabs_styles',
            [
                'label' => __( 'Styles', 'ohio-extra' ),
            ]
        );

        $repeater->add_control(
            'text_color',
            [
                'label' => __( 'Tab title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .accordion-header' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'label' => __( 'Tab title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .accordion-header'
            ]
        );

        $repeater->add_control(
            'content_color',
            [
                'label' => __( 'Tab content color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .accordion-body' => 'color: {{VALUE}};'
                ],
                'separator' => 'before',
            ]
        );

        $repeater->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __( 'Tab content typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .accordion-body'
            ]
        );

        $repeater->add_control(
            'tab_color',
            [
                'label' => __( 'Tab background/border color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .accordion-button' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} {{CURRENT_ITEM}} .accordion-button' => 'background-color: {{VALUE}};'
                ],
            ]
        );

        $repeater->add_control(
            'icon_color',
            [
                'label' => __( 'Icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .icon-button .icon' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $repeater->add_control(
            'custom_class',
            [
                'label' => __( 'Custom CSS class', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::TEXT,
                'separator' => 'before'
            ]
        );

        $repeater->end_controls_tab();

        $repeater->end_controls_tabs();
        
        return $repeater->get_controls();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( $settings['block_layout'] == 'outlined' ) {
            $this->addWrapperClass( '-outlined' );
        }
        if ( $settings['block_layout'] == 'outline' ) {
            $this->addWrapperClass( '-text' );
        }

        include( plugin_dir_path( __FILE__ ) . 'accordion-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Accordion_Widget() );
