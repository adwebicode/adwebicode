<?php
class Ohio_Elementor_Recent_Projects_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/libs/isotope.pkgd.min.js', [ 'jquery' ], false, true );
        wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/libs/aos.min.js', [ 'jquery' ], false, true );

        wp_register_script( 'ohio-elementor-recent-projects-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_script_depends() {
        return [ 'masonry', 'isotope', 'aos', 'ohio-elementor-recent-projects-widget' ];
    }

    public function get_name()
    {
        return 'ohio_recent_projects';
    }

    public function get_title()
    {
        return __( 'Recent Projects', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-recent-projects';
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
            'card_layout',
            [
                'label' => __( 'Portfolio layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'grid_1' => [
                        'title' => __( 'Classic Grid', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_01.svg',
                    ],
                    'grid_2' => [
                        'title' => __( 'Minimal Grid', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_02.svg',
                    ],
                    'grid_13' => [
                        'title' => __( 'Sticky Grid', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_46.svg',
                    ],
                    'grid_11' => [
                        'title' => __( 'Caption Cursor Grid', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_43.svg',
                    ],
                    'grid_3' => [
                        'title' => __( 'Slider: Horizontal', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_03.svg',
                    ],
                    'grid_4' => [
                        'title' => __( 'Slider: Vertical', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_04.svg',
                    ],
                    'grid_6' => [
                        'title' => __( 'Carousel: Horizontal', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_06.svg',
                    ],
                    'grid_5' => [
                        'title' => __( 'Smooth Scroll: Split Screen', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_05.svg',
                    ],
                    'grid_7' => [
                        'title' => __( 'Smooth Scroll: Fullscreen', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_07.svg',
                    ],
                    'grid_8' => [
                        'title' => __( 'Interactive: Links', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_42.svg',
                    ],
                    'grid_9' => [
                        'title' => __( 'Smooth Scroll: Scattered', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_37.svg',
                    ],
                    'grid_10' => [
                        'title' => __( 'Smooth Scroll: Centered', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_38.svg',
                    ],
                    'grid_12' => [
                        'title' => __( 'Vertical interactive Links', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_projects/images/acf__image_portfolio_45.svg',
                    ]
                ],
                'additional_class' => '-wide-label',
                'default' => 'grid_1',
            ]
        );

        $param_options = [];
        $portfolio_categories = get_terms( array(
            'taxonomy' => 'ohio_portfolio_category',
            'hide_empty' => false,
        ) );
        foreach ($portfolio_categories as $key => $category) {
            if ( !empty( $category->slug ) && isset( $category->name ) ) {
                $param_options[$category->slug] = $category->name;
            }
        }

        $this->add_control(
            'portfolio_category',
            [
                'label' => __( 'Portfolio categories', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $param_options,
                'default' => [],
                'placeholder' => __( 'All categories', 'ohio-extra' ),
                'description' => __( 'Leave empty to choose all categories.', 'ohio-extra' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'portfolio_images_size',
            [
                'label' => __( 'Portfolio thumbnail size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'inherit',
                'options' => [
                    'inherit' => __( 'Inherit from Theme Settings', 'ohio-extra' ),
                    'thumbnail' => __( 'Thumbnail', 'ohio-extra' ),
                    'medium' => __( 'Small', 'ohio-extra' ),
                    'medium_large' => __( 'Medium', 'ohio-extra' ),
                    'large' => __( 'Large', 'ohio-extra' ),
                    'ohio_full' => __( 'Original', 'ohio-extra' ),
                ],
                'label_block' => true
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Thumbnail border radius', 'ohio-extra' ),
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
                    '{{WRAPPER}} .portfolio-item:not(.-contained) .image-holder' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .portfolio-item.-contained:not(.-layout13)' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .portfolio-item.-contained.-layout13 .card-image .image-holder' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .portfolio-item.-contained.-layout13 .card-details' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ],
                ],
            ]
        );
        
        $this->add_control(
            'use_metro_style',
            [
                'label' => __( 'Equal height', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'description' => __( 'Convert blog images to a square.', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ],
                ],
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
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ],
                ],
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
                    '{{WRAPPER}} .-with-shadow:not(.-contained) .image-holder' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .-with-shadow.-contained:not(.-layout13)' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .-with-shadow.-contained.-layout13 .image-holder' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .-with-shadow.-contained.-layout13 .card-details' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});',
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
                    'transition' => __( 'Image Transition', 'ohio-extra' ),
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ],
                ],
            ]
        );

        $this->add_control(
            'card_boxed_layout',
            [
                'label' => __( 'Contained layout', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'description' => __( 'Add side gaps for portfolio cards.', 'ohio-extra' ),
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_13' ],
                ],
            ]
        );

        $this->add_control(
            'card_reversed_layout',
            [
                'label' => __( 'Reversed layout', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout' => 'grid_13',
                ],
            ]
        );

        $this->add_control(
            'slider_direction',
            [
                'label' => __( 'Slider direction', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'horizontal',
                'options' => [
                    'horizontal' => __( 'Horizontal', 'ohio-extra' ),
                    'vertical' => __( 'Vertical', 'ohio-extra' ),
                ],
                'condition' => [
                    'card_layout' => [ 'grid_3', 'grid_4' ]
                ],
            ]
        );

        $this->add_control(
            'slider_direction_mobile',
            [
                'label' => __( 'Slider direction on mobile', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'horizontal',
                'options' => [
                    'horizontal' => __( 'Horizontal', 'ohio-extra' ),
                    'vertical' => __( 'Vertical', 'ohio-extra' ),
                ],
                'condition' => [
                    'card_layout' => [ 'grid_3', 'grid_4' ]
                ],
            ]
        );

        $this->add_control(
            'fullscreen_mode',
            [
                'label' => __( 'Fullscreen mode', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'navigation_visibility',
            [
                'label' => __( 'Navigation visibility', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'bullets_visibility',
            [
                'label' => __( 'Bullets visibility', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'loop_mode',
            [
                'label' => __( 'Loop mode', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'mousewheel_scroll',
            [
                'label' => __( 'Mouse wheel scroll', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'autoplay_mode',
            [
                'label' => __( 'Autoplay mode', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'autoplay_timeout',
            [
                'label' => __( 'Autoplay interval timeout (ms)', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '3000',
                'condition' => [
                    'autoplay_mode' => 'yes',
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'show_video_button',
            [
                'label' => __( 'Video button visibility', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'card_layout!' => [ 'grid_8', 'grid_12' ],
                ],
            ]
        );

        $this->add_control(
            'video_button_style',
            [
                'label' => __( 'Video button style', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __( 'Default', 'ohio-extra' ),
                    'outlined' => __( 'Outlined', 'ohio-extra' ),
                    'blurred' => __( 'Blurred', 'ohio-extra' ),
                ],
                'label_block' => true,
                'condition' => [
                    'show_video_button' => 'yes',
                    'card_layout!' => [ 'grid_8', 'grid_12' ],
                ],
            ]
        );

        $this->add_control(
            'video_button_size',
            [
                'label' => __( 'Video button size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __( 'Default', 'ohio-extra' ),
                    'small' => __( 'Small', 'ohio-extra' ),
                    'large' => __( 'Large', 'ohio-extra' ),
                ],
                'label_block' => true,
                'condition' => [
                    'show_video_button' => 'yes',
                    'card_layout!' => [ 'grid_8', 'grid_12' ],
                ],
            ]
        );

        $this->end_controls_section();

        // Grid
        $this->start_controls_section(
            'grid_section',
            [
                'label' => __( 'Grid', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'projects_in_block',
            [
                'label' => __( 'Grid items in the block', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'description' => __( 'Set a number of grid items output.', 'ohio-extra' ),
                'size_units' => [ 'items' ],
                'range' => [
                    'items' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'items',
                    'size' => 12,
                ],
            ]
        );

        $this->add_control(
            'grid_items_gap',
            [
                'label' => __( 'Grid gap', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '20px',
                'label_block' => true,
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .grid-item:not(.-nospace)' => 'padding: {{SIZE}};',
                    '{{WRAPPER}} .portfolio-grid' => 'margin-top: -{{SIZE}}; margin-bottom: -{{SIZE}};'
                ]
            ]
        );

        $this->add_control(
            'items_per_row_options',
            [
                'label' => __( 'Portfolio items per row', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_6', 'grid_11', 'grid_13' ]
                ],
            ]
        );
        
        $this->add_control(
            'items_per_row_desktop',
            [
                'label' => __( 'Desktop devices', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1'  => __( '1 column', 'ohio-extra' ),
                    '2'  => __( '2 columns', 'ohio-extra' ),
                    '3'  => __( '3 columns', 'ohio-extra' ),
                    '4'  => __( '4 columns', 'ohio-extra' ),
                    '5'  => __( '5 columns', 'ohio-extra' ),
                    '6'  => __( '6 columns', 'ohio-extra' ),
                    '12'  => __( '12 columns', 'ohio-extra' ),
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_6', 'grid_11', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'items_per_row_tablet',
            [
                'label' => __( 'Tablet devices', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1'  => __( '1 column', 'ohio-extra' ),
                    '2'  => __( '2 columns', 'ohio-extra' ),
                    '3'  => __( '3 columns', 'ohio-extra' ),
                    '4'  => __( '4 columns', 'ohio-extra' ),
                    '5'  => __( '5 columns', 'ohio-extra' ),
                    '6'  => __( '6 columns', 'ohio-extra' ),
                    '12'  => __( '12 columns', 'ohio-extra' ),
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_6', 'grid_11', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'items_per_row_mobile',
            [
                'label' => __( 'Mobile devices', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'  => __( '1 column', 'ohio-extra' ),
                    '2'  => __( '2 columns', 'ohio-extra' ),
                    '3'  => __( '3 columns', 'ohio-extra' ),
                    '4'  => __( '4 columns', 'ohio-extra' ),
                    '5'  => __( '5 columns', 'ohio-extra' ),
                    '6'  => __( '6 columns', 'ohio-extra' ),
                    '12'  => __( '12 columns', 'ohio-extra' ),
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_6', 'grid_11', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'animation_type',
            [
                'label' => __( 'Grid animation', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'disable',
                'options' => [
                    'disable'  => __( 'Without animation', 'ohio-extra' ),
                    'sync'  => __( 'Sync animation', 'ohio-extra' ),
                    'async'  => __( 'Async animation', 'ohio-extra' ),
                ],
                'separator' => 'before',
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12' ]
                ],
            ]
        );

        $this->add_control(
            'animation_effect',
            [
                'label' => __( 'Grid animation effect', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'fade-up',
                'options' => [
                    'fade-up'  => __( 'Fade up', 'ohio-extra' ),
                    'fade-down'  => __( 'Fade down', 'ohio-extra' ),
                    'fade-left'  => __( 'Fade left', 'ohio-extra' ),
                    'fade-right'  => __( 'Fade right', 'ohio-extra' ),
                    'flip-up'  => __( 'Flip up', 'ohio-extra' ),
                    'flip-down'  => __( 'Flip down', 'ohio-extra' ),
                    'zoom-in'  => __( 'Zoom in', 'ohio-extra' ),
                    'zoom-out'  => __( 'Zoom out', 'ohio-extra' ),
                ],
                'condition' => [
                    'animation_type' => [ 'sync', 'async' ],
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12' ]
                ]
            ]
        );

        $this->end_controls_section();

        // Filter
        $this->start_controls_section(
            'filter_section',
            [
                'label' => __( 'Filter', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'show_projects_filter',
            [
                'label' => __( 'Filter visibility', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'filter_align',
            [
                'label' => __( 'Filter position', 'ohio-extra' ),
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
                'condition' => [
                    'show_projects_filter' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'show_empty_categories',
            [
                'label' => __( 'Show empty categories in filter', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'use_pagination' => 'yes',
                    'pagination_type' => 'standard'
                ]
            ]
        );

        $this->end_controls_section();

        // Pagination
        $this->start_controls_section(
            'pagination_section',
            [
                'label' => __( 'Pagination', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_8', 'grid_12', 'grid_13' ]
                ],
            ]
        );

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
            'items_per_page',
            [
                'label' => __( 'Grid items per page', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'description' => __( 'Set a number of grid items output per page.', 'ohio-extra' ),
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

        $this->add_control(
            'pagination_type',
            [
                'label' => __( 'Pagination layout', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'standard',
                'options' => [
                    'standard'  => __( 'Standard', 'ohio-extra' ),
                    'lazy_load'  => __( 'Lazy Load', 'ohio-extra' ),
                    'load_more'  => __( 'Load More', 'ohio-extra' ),
                ],
                'label_block' => true,
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
                    'default'  => __( 'Default', 'ohio-extra' ),
                    'outlined'  => __( 'Outlined', 'ohio-extra' ),
                    'flat'  => __( 'Text', 'ohio-extra' ),
                ],
                'label_block' => true,
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
                    'default'  => __( 'Default', 'ohio-extra' ),
                    'small'  => __( 'Small', 'ohio-extra' ),
                    'large'  => __( 'Large', 'ohio-extra' ),
                ],
                'label_block' => true,
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
                    'left'  => __( 'Left', 'ohio-extra' ),
                    'center'  => __( 'Center', 'ohio-extra' ),
                    'right'  => __( 'Right', 'ohio-extra' ),
                ],
                'label_block' => true,
                'condition' => [
                    'use_pagination' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        // Lightbox
        $this->start_controls_section(
            'lightbox_section',
            [
                'label' => __( 'Lightbox', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'lightbox_visibility',
            [
                'label' => __( 'Lightbox visibility', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'description' => 'To find more portfolio lightbox options navigate to global <a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-general-portfolio">Theme Settings</a>',
            ]
        );

        $this->end_controls_section();

        // Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Basic', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item .headline' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .grid-item .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title typography', 'ohio-extra' ),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .portfolio-item .headline, {{WRAPPER}} .grid-item .title',
            ]
        );

        $this->add_control(
            'category_color',
            [
                'label' => __( 'Category color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item .project-content .category-holder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .grid-item .category-holder' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'category_typography',
                'label' => __( 'Category typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .portfolio-item .project-content .category-holder, {{WRAPPER}} .grid-item .category-holder',
            ]
        );

        $this->add_control(
            'date_color',
            [
                'label' => __( 'Date color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item .headline-meta .date' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item .project-content .date' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ]
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'label' => __( 'Date typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .portfolio-item .headline-meta .date, {{WRAPPER}} .portfolio-item .project-content .date',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'short_description_color',
            [
                'label' => __( 'Excerpt color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item .project-details' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11' ]
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'short_description_typography',
                'label' => __( 'Excerpt typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .portfolio-item .project-details',
                'condition' => [
                    'card_layout!' => [ 'grid_1', 'grid_2', 'grid_11' ]
                ],
            ]
        );

        $this->add_control(
            'link_color',
            [
                'label' => __( 'Project link color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item .project-content .button' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .grid-item .show-project-link' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'card_layout!' => [ 'grid_11' ]
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'link_typography',
                'label' => __( 'Project link typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .portfolio-item .project-content .btn-lightbox, {{WRAPPER}} .grid-item .show-project-link',
                'condition' => [
                    'card_layout!' => [ 'grid_11' ]
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => __( 'Background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-onepage-slider' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item.-layout10 .overlay-image::before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item.-contained .card-details' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_7', 'grid_9', 'grid_10', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'overlay_color',
            [
                'label' => __( 'Overlay color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-item.-layout3 .overlay::after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item.-layout4 .overlay::after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item.-layout5 .overlay::after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item.-layout6 .overlay::after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item.-img-overlay .image-holder::after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-item.-img-overlay .overlay' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .grid_7 .portfolio-item-image::before' => 'background: linear-gradient(90deg, rgba(0, 0, 0, 0) 0%, {{VALUE}});',
                    '{{WRAPPER}} .grid_10 .portfolio-item-image::before' => 'background: linear-gradient(270deg, rgba(0, 0, 0, 0) 0%, {{VALUE}});',
                ],
                'condition' => [
                    'card_layout!' => [ 'grid_8', 'grid_9', 'grid_12' ]
                ],
            ]
        );

        $this->add_control(
            'video_button_color',
            [
                'label' => __( 'Video button color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-button:not(.-outlined) .icon-button' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .video-button.-outlined .icon-button' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'card_layout!' => [ 'grid_8', 'grid_12' ]
                ],
            ]
        );

        $this->add_control(
            'lightbox_button_color',
            [
                'label' => __( 'Lightbox icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-lightbox .icon' => 'color: {{VALUE}};'
                ],
                'condition' => [
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_11', 'grid_13' ]
                ],
            ]
        );

        $this->add_control(
            'button_nav_color',
            [
                'label' => __( 'Navigation color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-slider-nav-btn' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'card_layout' => [ 'grid_3', 'grid_4', 'grid_5', 'grid_6', 'grid_7', 'grid_9', 'grid_10' ]
                ],
            ]
        );

        $this->add_control(
            'pagination_btn_color',
            [
                'label' => __( 'Pagination color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .clb-slider-pagination' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'card_layout' => [ 'grid_3', 'grid_4', 'grid_5', 'grid_6', 'grid_7', 'grid_9', 'grid_10' ]
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'filter_styles_section',
            [
                'label' => __( 'Filter', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_projects_filter' => 'yes',
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ]
            ]
        );

        $this->add_control(
            'filter_color',
            [
                'label' => __( 'Filter color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-filter' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .portfolio-filter a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'filter_typography',
                'label' => __( 'Filter typography', 'ohio-extra' ),
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .portfolio-filter, {{WRAPPER}} .portfolio-filter a',
            ]
        );

        $this->add_control(
            'filter_active_color',
            [
                'label' => __( 'Filter active color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-filter a.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'pagination_styles_section',
            [
                'label' => __( 'Pagination', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'use_pagination' => 'yes',
                    'card_layout' => [ 'grid_1', 'grid_2', 'grid_8', 'grid_11', 'grid_12', 'grid_13' ]
                ]
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
                ],
            ]
        );

        $this->add_control(
            'pagination_active_color',
            [
                'label' => __( 'Pagination color (hover state)', 'ohio-extra' ),
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

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( $settings['card_layout'] == 'grid_8' || $settings['card_layout'] == 'grid_12' ) {
            $this->addWrapperClass( 'portfolio-links ' . esc_attr( $settings['card_layout'] ) );
        }
        else {
            $this->addWrapperClass( esc_attr( $settings['card_layout'] ) );
        }

        if ( $settings['fullscreen_mode'] ) {
            $this->addWrapperClass( '-full-vh' );
        }
        if ( $settings['show_projects_filter'] ) {
            $this->addWrapperClass( '-with-sorting' );
        }
        if ( $settings['use_pagination'] ) {
            $this->addWrapperClass( '-with-pagination' );
        }
        if ( $settings['card_reversed_layout'] ) {
            $this->addWrapperClass( '-reversed' );
        }

        $is_slider = false;
        switch ( $settings['card_layout'] ) {
            case 'grid_3':
            case 'grid_4':
            case 'grid_5':
            case 'grid_6':
            case 'grid_7':
            case 'grid_9':
            case 'grid_10':
                $is_slider = true;
                break;
        }

        // Row string value compatibility
        $columns_in_row = $settings['items_per_row_desktop'] . '-' . $settings['items_per_row_tablet'] . '-' . $settings['items_per_row_mobile'];
        $column_class = OhioExtraParser::VC_columns_to_CSS( $columns_in_row );
        $column_double_class = OhioExtraParser::VC_columns_to_CSS( $columns_in_row, true );

        // Pagination
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

        // Project data
        $projects_limit = ( !empty( $settings['projects_in_block'] ) ) ? intval( $settings['projects_in_block']['size'] ) : 12;
        $projects_data = $this->getProjectsData( $settings['portfolio_category'], $projects_limit );
        $pagination_page = OhioHelper::get_current_pagenum();

        $per_page = ( !empty( $settings['items_per_page'] ) ) ? $settings['items_per_page']['size'] : 6;
        $pages_count = ceil( count( $projects_data ) / $per_page );
        $filter_is_paged = ( $pages_count > 1 ) && in_array( $settings['pagination_type'], [ 'simple', 'standard' ] );
        $category_id_allowlist = [];
    
        if (!$settings['show_empty_categories']) {
            $_post_start = $pagination_page * $per_page - $per_page;
            $current_page_projects_ids = wp_list_pluck( array_slice( $projects_data, $_post_start, $per_page), 'ID' );
            $category_id_allowlist = wp_list_pluck( wp_get_object_terms( $current_page_projects_ids, 'ohio_portfolio_category' ), 'term_id');
        }
    

        include( plugin_dir_path( __FILE__ ) . 'recent-projects-view.php' );
    }

    protected function getProjectsData( $categories = [], $projects_count = 12 )
    {
        $_tax_query = [];

        if ( count( $categories ) > 0 ) {
            $_tax_query = [[
                'taxonomy' => 'ohio_portfolio_category',
                'field' => 'slug',
                'terms' => $categories
            ]];
        }

        return get_posts( apply_filters( 'ohio_projects_args_filter', [
            'posts_per_page' => $projects_count,
            'offset' => 0,
            'post_type' => 'ohio_portfolio',
            'tax_query' => $_tax_query,
            'post_status' => 'publish',
            'suppress_filters' => false
        ] ) );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Recent_Projects_Widget() );
