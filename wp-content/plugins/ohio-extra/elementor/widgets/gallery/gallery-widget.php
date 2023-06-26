<?php
class Ohio_Elementor_Gallery_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_enqueue_script( 'masonry' );

        wp_register_script( 'ohio-elementor-gallery-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_script_depends() {
        return [ 'masonry', 'ohio-elementor-gallery-widget' ];
    }

    public function get_name()
    {
        return 'ohio_gallery';
    }

    public function get_title()
    {
        return __( 'Gallery', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-gallery';
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
            'gallery_layout',
            [
                'label' => __( 'Gallery layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'classic' => [
                        'title' => __( 'Classic', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/gallery/images/wpb_params_114.svg',
                    ],
                    'minimal' => [
                        'title' => __( 'Minimal', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/gallery/images/wpb_params_113.svg',
                    ]
                ],
                'default' => 'classic',
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
            'images',
            [
                'label' => __( 'Preview image', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [],
            ]
        );

        $this->add_control(
            'preview_title',
            [
                'label' => __( 'Show title on preview', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
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
            'metro_style',
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
            'grid_section',
            [
                'label' => __( 'Grid', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Grid
        $this->add_control(
            'masonry_grid',
            [
                'label' => __( 'Masonry grid', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'gap_size',
            [
                'label' => __( 'Grid gap', 'ohio-extra' ),
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
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .gallery-item' => 'padding: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .clb-gallery' => 'margin-top: -{{SIZE}}{{UNIT}}; margin-bottom: -{{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_control(
            'items_per_row_options',
            [
                'label' => __( 'Images per row', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'desktop_devices',
            [
                'label' => __( 'Desktop devices', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1' => __( '1 columns', 'ohio-extra' ),
                    '2' => __( '2 columns', 'ohio-extra' ),
                    '3' => __( '3 columns', 'ohio-extra' ),
                    '4' => __( '4 columns', 'ohio-extra' ),
                    '5' => __( '5 columns', 'ohio-extra' ),
                    '12' => __( '12 columns', 'ohio-extra' )
                ],
            ]
        );

        $this->add_control(
            'tablet_devices',
            [
                'label' => __( 'Tablet devices', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1' => __( '1 columns', 'ohio-extra' ),
                    '2' => __( '2 columns', 'ohio-extra' ),
                    '3' => __( '3 columns', 'ohio-extra' ),
                    '4' => __( '4 columns', 'ohio-extra' ),
                    '5' => __( '5 columns', 'ohio-extra' ),
                    '12' => __( '12 columns', 'ohio-extra' )
                ],
            ]
        );

        $this->add_control(
            'mobile_devices',
            [
                'label' => __( 'Mobile devices', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __( '1 columns', 'ohio-extra' ),
                    '2' => __( '2 columns', 'ohio-extra' ),
                    '3' => __( '3 columns', 'ohio-extra' ),
                    '4' => __( '4 columns', 'ohio-extra' ),
                    '5' => __( '5 columns', 'ohio-extra' ),
                    '12' => __( '12 columns', 'ohio-extra' )
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'pagination_section',
            [
                'label' => __( 'Pagination', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Grid
        $this->add_control(
            'use_pagination',
            [
                'label' => __( 'Use pagination', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'pagination_type',
            [
                'label' => __( 'Pagination layout', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'standard',
                'options' => [
                    'standard' => 'Standard',
                    'lazy_scroll' => 'Lazy Load',
                    'lazy_button' => 'Load More',
                ],
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'pagination_style',
            [
                'label' => __( 'Pagination type', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => 'Default',
                    'outlined' => 'Outlined',
                    'flat' => 'Text',
                ],
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'pagination_size',
            [
                'label' => __( 'Pagination size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => 'Default',
                    'small' => 'Small',
                    'large' => 'Large',
                ],
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'pagination_position',
            [
                'label' => __( 'Pagination position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => 'Left',
                    'center' => 'Center',
                    'right' => 'Right',
                ],
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );
        
        $this->add_control(
            'items_per_page',
            [
                'label' => __( 'Number of items per page', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'items' ],
                'range' => [
                    'items' => [
                        'min' => 1,
                        'max' => 25,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'items',
                    'size' => 6,
                ],
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        //Styles
        $this->start_controls_section(
            'general_section',
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
                    '{{WRAPPER}} .gallery-item .title' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .gallery-item .title',
            ]
        );

        $this->add_control(
            'overlay_color',
            [
                'label' => __( 'Title overlay color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-item.-with-overlay .overlay-details' => 'background: linear-gradient(rgba(0, 0, 0, 0), {{VALUE}})',
                    '{{WRAPPER}} .gallery-item.-img-overlay .image-holder::after' => 'background: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        // Lightbox
        $this->start_controls_section(
            'lightbox_styles',
            [
                'label' => __( 'Lightbox', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'popup_title_color',
            [
                'label' => __( 'Title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-gallery-lightbox .title' => 'color: {{VALUE}}'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'popup_title_typography',
                'label' => __( 'Title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .clb-gallery-lightbox .title',
            ]
        );

        $this->add_control(
            'caption_color',
            [
                'label' => __( 'Details color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-gallery-lightbox .caption' => 'color: {{VALUE}}'
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'caption_typography',
                'label' => __( 'Details typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .clb-gallery-lightbox .caption',
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => __( 'Overlay color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-popup' => 'background-color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon buttons color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-gallery-lightbox .icon-button .icon' => 'color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => __( 'Icon buttons background', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-gallery-lightbox .icon-button' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        // Pagination
        $this->start_controls_section(
            'pagination_styles',
            [
                'label' => __( 'Pagination', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'use_pagination' => 'yes'
                ]
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
            'pagination_color',
            [
                'label' => __( 'Pagination color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lazy-load:not(.-outlined):not(.-flat) .button' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .pagination:not(.-outlined):not(.-flat) .page-link:not(.-flat)' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .lazy-load.-outlined .button' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .lazy-load.-flat .button' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .pagination.-outlined .page-link' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .pagination.-flat .page-link' => 'color: {{VALUE}};'
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
            'pagination_active_color',
            [
                'label' => __( 'Pagination color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lazy-load:not(.-outlined):not(.-flat) .button:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .pagination:not(.-outlined):not(.-flat) .page-link:not(.-flat):hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .lazy-load.-outlined .button:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .lazy-load.-flat .button:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .pagination.-outlined .page-link:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .pagination.-flat .page-link:hover' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Classes
        switch ( $settings['alignment'] ) {
            case 'center':
                $this->addWrapperClass( '-center' );
                break;
            case 'right':
                $this->addWrapperClass( '-right' );
                break;
        }

        if ( $settings['tilt_effect'] ) {
            $tilt_attrs = 'data-tilt=true data-tilt-perspective=6000';
        }

        $grid_classes = '';

        $layout_classes = '';
        switch ( $settings['gallery_layout'] ) {
            case 'minimal':
                $layout_classes .= ' -with-overlay';
                break;
        }

        $hover_effect = '';
        switch ( $settings['card_effect'] ) {
            case 'scale':
                $hover_effect .= ' -img-scale';
                break;
            case 'overlay':
                $hover_effect .= ' -img-overlay';
                break;
            case 'greyscale':
                $hover_effect .= ' -img-greyscale';
                break;
        }

        $grid_classes .= $layout_classes;
        $grid_classes .= $hover_effect;

        if ( $settings['metro_style'] ) {
            $grid_classes .= ' -metro';
        }

        if ( $settings['drop_shadow'] ) {
            $grid_classes .= ' -with-shadow';
        }

        $columns_in_row = $settings['desktop_devices'] . '-' . $settings['tablet_devices'] . '-' . $settings['mobile_devices'];
        $column_class = [];
        $column_class[] = OhioExtraParser::VC_columns_to_CSS( $columns_in_row );

        // Pagination
        $pagination_page = OhioHelper::get_current_pagenum();
        $items_per_page = ( !empty( $settings['items_per_page'] ) ) ? $settings['items_per_page']['size'] : 6;
        $pages_count = ceil( count( $settings['images'] ) / $items_per_page );

        $additional_classes = [];
        if ( in_array( $settings['pagination_style'], [ 'outlined', 'flat' ], true ) ) {
            $additional_classes[] = '-' . $settings['pagination_style'];
        }
        if ( in_array( $settings['pagination_size'], [ 'large', 'small' ], true ) ) {
            $additional_classes[] = '-' . $settings['pagination_size'];
        }
        if ( in_array( $settings['pagination_position'], [ 'center', 'right' ], true ) ) {
            $additional_classes[] = '-' . $settings['pagination_position'] . '-flex';
        }

        // Data
        $gallery_json = json_encode( (object)[] );
        $gallery_uniqid = uniqid( 'ohio-gallery-' );

        include( plugin_dir_path( __FILE__ ) . 'gallery-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Gallery_Widget() );
