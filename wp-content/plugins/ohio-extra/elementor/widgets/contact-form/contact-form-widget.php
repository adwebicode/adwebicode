<?php
class Ohio_Elementor_Contact_Form_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-contact-form-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_contact_form';
    }

    public function get_title()
    {
        return __( 'Contact Form 7', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-contact-form';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-contact-form-widget' ];
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
            'important_note',
            [
                'label' => '',
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => '<div class="note">' . __( 'Ensure that you have installed and activated the <a target="_blank" href="/wp-admin/plugins.php">Contact Form 7</a> from the recommended plugins.', 'ohio-extra' ) . '</div>',
                'content_classes' => 'your-class',
            ]
        );

        $this->add_control(
            'block_type_layout',
            [
                'label' => __( 'Form layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'flat' => [
                        'title' => __( 'Flat', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/contact_form/images/wpb_params_031.svg',
                    ],
                    'outline' => [
                        'title' => __( 'Outline', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/contact_form/images/wpb_params_030.svg',
                    ],
                ],
                'default' => 'flat',
            ]
        );

        $this->add_control(
            'form_position',
            [
                'label' => __( 'Form alignment', 'ohio-extra' ),
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


        $this->add_contact_form_7_controll();

        $this->add_control(
            'fields_offset',
            [
                'label' => __( 'Form grid gap', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem', 'vw' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} [class*=vc_col]' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .subscribe-form' => 'margin: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .contact-form' => 'margin: -{{SIZE}}{{UNIT}};'
                ],
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'form_style_section',
            [
                'label' => __( 'Form Styles', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'input_placeholder_color',
            [
                'label' => __( 'Text placeholder color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input::-webkit-input-placeholder' => 'color: {{VALUE}}',
                    '{{WRAPPER}} textarea::-webkit-input-placeholder' => 'color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'input_text_color',
            [
                'label' => __( 'Text color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input:not([type="submit"])' => 'color: {{VALUE}}',
                    '{{WRAPPER}} textarea' => 'color: {{VALUE}}',
                    '{{WRAPPER}} select' => 'color: {{VALUE}}'
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'input_text_typography',
                'label' => __( 'Text typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} input:not([type="submit"]), {{WRAPPER}} textarea, {{WRAPPER}} select',
            ]
        );

        $this->add_control(
            'input_background_color',
            [
                'label' => __( 'Text fields background', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input:not([type="submit"])' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} textarea' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} select' => 'background-color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'input_focus_background_color',
            [
                'label' => __( 'Text fields background (active state)', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input:not([type="submit"]):focus' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} textarea:focus' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} select:focus' => 'background-color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'input_border_color',
            [
                'label' => __( 'Text fields border color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input:not([type="submit"])' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .focus' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} textarea' => 'border-color: {{VALUE}}'
                ],
                'condition' => [
                    'block_type_layout' => 'outline',
                ]
            ]
        );

        $this->add_control(
            'input_focus_border_color',
            [
                'label' => __( 'Text fields border color (active state)', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} input:focus' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .focus.active' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} textarea:focus' => 'border-color: {{VALUE}}'
                ],
                'condition' => [
                    'block_type_layout' => 'outline',
                ]
            ]
        );

        $this->end_controls_section();

        $this->addButtonStyleSection( false );
    }

    protected function add_contact_form_7_controll()
    {
        $forms_select = [];
        $forms_items = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
        if ( !empty( $forms_items ) ) {
            foreach ( $forms_items as $form ) {
                $forms_select[ $form->ID ] = $form->post_title;
            }
        }

        $this->add_control(
            'form',
            [
                'label' => 'Contact Form 7',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '0',
                'options' => [ '0' => '- ' . __( 'No contact form selected', 'ohio-extra' ) . ' -' ] + $forms_select,
                'label_block' => true
            ]
        );
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( $settings['block_type_layout'] == 'outline' ) {
            $this->addWrapperClass( '-outlined' );
        }

        switch ( $settings['form_position'] ) {
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

        include( plugin_dir_path( __FILE__ ) . 'contact-form-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Contact_Form_Widget() );
