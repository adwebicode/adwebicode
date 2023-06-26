<?php
class Ohio_Elementor_Recent_Posts_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/libs/aos.min.js', [ 'jquery' ], false, true );
        wp_register_script( 'ohio-elementor-recent-posts-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_script_depends() {
        return [ 'aos', 'ohio-elementor-recent-posts-widget' ];
    }

    public function get_name()
    {
        return 'ohio_recent_posts';
    }

    public function get_title()
    {
        return __( 'Blog Posts', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-recent-posts';
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
            'block_type_layout',
            [
                'label' => __( 'Blog layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'blog_grid_1' => [
                        'title' => __( 'Clasic Grid', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_posts/images/acf__image_portfolio_01.svg',
                    ],
                    'blog_grid_2' => [
                        'title' => __( 'Minimal Grid', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_posts/images/acf__image_portfolio_02.svg',
                    ],
                    'blog_grid_3' => [
                        'title' => __( 'Split Grid', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_posts/images/acf__image_portfolio_39.svg',
                    ],
                    'blog_grid_4' => [
                        'title' => __( 'Inner Details', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_posts/images/acf__image_portfolio_40.svg',
                    ],
                    'blog_grid_5' => [
                        'title' => __( 'Small Thumbnail', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_posts/images/acf__image_portfolio_41.svg',
                    ],
                    'blog_grid_6' => [
                        'title' => __( 'Simple Grid', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/recent_posts/images/acf__image_portfolio_44.svg',
                    ],
                ],
                'additional_class' => '-wide-label',
                'default' => 'blog_grid_1',
            ]
        );

        // Blog categories
        $param_options = [];
        $blog_categories = get_terms( array(
            'taxonomy' => 'category',
            'hide_empty' => false,
        ) );
        foreach ($blog_categories as $key => $category) {
            $param_options[$category->slug] = $category->name;
        }

        $this->add_control(
            'post_category',
            [
                'label' => __( 'Blog categories', 'ohio-extra' ),
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
            'blog_images_size',
            [
                'label' => __( 'Thumbnail size', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'inherit',
                'options' => [
                    'inherit'  => __( 'Inherit from Theme Settings', 'ohio-extra' ),
                    'thumbnail' => __( 'Thumbnail', 'ohio-extra' ),
                    'medium' => __( 'Small', 'ohio-extra' ),
                    'medium_large' => __( 'Medium', 'ohio-extra' ),
                    'large' => __( 'Large', 'ohio-extra' ),
                    'ohio_full' => __( 'Original', 'ohio-extra' ),
                ],
                'label_block' => true,
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
                    '{{WRAPPER}} .blog-item:not(.-contained) .image-holder' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .blog-item.-contained' => 'border-radius: {{SIZE}}{{UNIT}};'
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
                    'block_type_layout' => [ 'blog_grid_1', 'blog_grid_2', 'blog_grid_3', 'blog_grid_4', 'blog_grid_5' ]
                ]
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
                    '{{WRAPPER}} .-with-shadow:not(.-contained) .image-holder' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .-with-shadow.-contained' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});'
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
            'use_boxed_layout',
            [
                'label' => __( 'Contained layout', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'description' => __( 'Add side gaps for blog cards.', 'ohio-extra' ),
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'block_type_layout' => [ 'blog_grid_1', 'blog_grid_3', 'blog_grid_5', 'blog_grid_6' ]
                ]
            ]
        );

        $this->add_control(
            'show_short_description',
            [
                'label' => __( 'Excerpt visibility', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'show_read_more',
            [
                'label' => __( '"Read more" visibility', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
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

        $this->add_control(
            'masonry_grid',
            [
                'label' => __( 'Masonry grid', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => ''
            ]
        );

        $this->add_control(
            'items_in_block',
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
            'grid_spacing_css',
            [
                'label' => __( 'Grid gap', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '20px',
                'placeholder' => __( 'Use CSS unit value.', 'ohio-extra' ),
                'label_block' => true,
                'selectors' => [
                    '{{WRAPPER}} .grid-item:not(.-nospace)' => 'padding: {{SIZE}};',
                    '{{WRAPPER}} .blog-posts' => 'margin-top: -{{SIZE}}; margin-bottom: -{{SIZE}};'
                ],
                'condition' => [
                    'block_type_layout' => [ 'blog_grid_1', 'blog_grid_2', 'blog_grid_3', 'blog_grid_4', 'blog_grid_5' ]
                ]
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
            ]
        );

        $this->add_control(
            'animation_effect',
            [
                'label' => __( 'Animation effect', 'ohio-extra' ),
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
                    'animation_type' => [ 'sync', 'async' ]
                ]
            ]
        );

        $this->add_control(
            'items_per_row_options',
            [
                'label' => __( 'Blog items per row', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'block_type_layout' => [ 'blog_grid_1', 'blog_grid_2', 'blog_grid_3', 'blog_grid_4', 'blog_grid_5' ]
                ]
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
                    'block_type_layout' => [ 'blog_grid_1', 'blog_grid_2', 'blog_grid_3', 'blog_grid_4', 'blog_grid_5' ]
                ]
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
                    'block_type_layout' => [ 'blog_grid_1', 'blog_grid_2', 'blog_grid_3', 'blog_grid_4', 'blog_grid_5' ]
                ]
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
                    'block_type_layout' => [ 'blog_grid_1', 'blog_grid_2', 'blog_grid_3', 'blog_grid_4', 'blog_grid_5' ]
                ]
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

        $this->add_control(
            'use_pagination',
            [
                'label' => __( 'Use pagination', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => ''
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

        $this->end_controls_section();

        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-item .title' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'header_typography',
                'label' => __( 'Title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .blog-item .title',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Excerpt color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .card-details > p' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Excerpt typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .blog-item .card-details > p',
            ]
        );

        $this->add_control(
            'category_color',
            [
                'label' => __( 'Categories color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .category-holder' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'category_typography',
                'label' => __( 'Categories typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .blog-item .category-holder',
            ]
        );

        $this->add_control(
            'card_background_color',
            [
                'label' => __( 'Contained background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .blog-item.-contained .card-details' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .blog-item.-layout4 .image-holder' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->add_control(
            'overlay_color',
            [
                'label' => __( 'Overlay color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .blog-item.-img-overlay .image-holder::after' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .blog-item.-img-overlay .overlay' => 'background: {{VALUE}}'
                ],
                'condition' => [
                    'card_effect' => [ 'overlay' ]
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'additional_style_section',
            [
                'label' => __( 'Additional', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'date_color',
            [
                'label' => __( 'Published date color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .date' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'label' => __( 'Published date typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .blog-item .date',
            ]
        );

        $this->add_control(
            'reading_time_color',
            [
                'label' => __( 'Reading time color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .post-meta-estimate' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'reading_time_typography',
                'label' => __( 'Reading time typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .blog-item .post-meta-estimate',
            ]
        );

        $this->add_control(
            'author_color',
            [
                'label' => __( 'Author color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .meta-holder' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'author_typography',
                'label' => __( 'Author typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .blog-item .meta-holder',
            ]
        );

        $this->add_control(
            'read_more_color',
            [
                'label' => __( 'Read More color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .blog-item .button' => 'color: {{VALUE}}'
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'read_more_typography',
                'label' => __( 'Read More typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .blog-item .button',
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
        global $post;

        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( !empty( $settings['masonry_grid'] ) ) {
            $this->addWrapperClass( 'ohio-masonry' );
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

        // Data
        $posts_data = $this->getPostsData( $settings['post_category'], intval( $settings['items_in_block']['size'] ) );
        $pagination_page = OhioHelper::get_current_pagenum();

        include( plugin_dir_path( __FILE__ ) . 'recent-posts-view.php' );
    }

    protected function getPostsData( $categories = [], $posts_count = 12 )
    {
        $_tax_query = [];

        if ( count( $categories ) > 0 ) {
            $_tax_query = [[
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $categories
            ]];
        }

        return get_posts( [
            'posts_per_page' => $posts_count,
            'offset' => 0,
            'post_type' => 'post',
            'tax_query' => $_tax_query,
            'post_status' => 'publish',
            'suppress_filters' => false
        ] );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Recent_Posts_Widget() );
