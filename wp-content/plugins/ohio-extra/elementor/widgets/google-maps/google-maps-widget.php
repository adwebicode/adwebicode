<?php
class Ohio_Elementor_Google_Maps_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        $ohio_api_key = OhioOptions::get_global( 'google_maps_api_key', '' );

        wp_register_script( 'jquery-maps', get_template_directory_uri() . '/assets/js/libs/jquery.google-maps.min.js', array('jquery'), '1.0.0', true );

        wp_register_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=' . urlencode( esc_attr( $ohio_api_key ) ) . '&callback=handleGoogleMaps', false, null, true );

        wp_register_script( 'ohio-elementor-google-maps-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }
  
    public function get_script_depends() {
       return [ 'jquery-maps', 'google-maps', 'ohio-elementor-google-maps-widget' ];
    }

    public function get_name()
    {
        return 'ohio_google_maps';
    }

    public function get_title()
    {
        return __( 'Google Maps', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-google-maps';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'block_type_layout',
            [
                'label' => __( 'Map layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/google_maps/images/wpb_params_inherit.svg',
                    ],
                    'light_dream' => [
                        'title' => __( 'Light Dream', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/google_maps/images/maps/light_dream.png',
                    ],
                    'shades_of_grey' => [
                        'title' => __( 'Dark', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/google_maps/images/maps/shades_of_grey.png',
                    ],
                    'paper' => [
                        'title' => __( 'Paper', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/google_maps/images/maps/paper.png',
                    ],
                    'light_monochrome' => [
                        'title' => __( 'Monochrome', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/google_maps/images/maps/light_monochrome.png',
                    ],
                    'lunar_landscape' => [
                        'title' => __( 'Lunar', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/google_maps/images/maps/lunar_landscape.png',
                    ],
                    'routexl' => [
                        'title' => __( 'Routexl', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/google_maps/images/maps/routexl.png',
                    ],
                    'flat_pale' => [
                        'title' => __( 'Flat Pale', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/google_maps/images/maps/flat_pale.png',
                    ],
                    'flat_design' => [
                        'title' => __( 'Flat Design', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/google_maps/images/maps/flat_design.png',
                    ],
                ],
                'default' => 'default',
                'additional_class' => '-wide-label -wide-equal'
            ]
        );

        $this->add_control(
            'coordinates',
            [
                'label' => __( 'Location coordinates', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => '41.425383, 2.1740062',
                'description' => __( 'Use several locations by placing coordinates in separate rows (e.g. 41.425383, 2.1740062)&nbsp;<a target="_blank" href="https://support.google.com/maps/answer/18539">Google Maps help&nbsp;<i class="far fa-question-circle"></i></a>', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'map_height',
            [
                'label' => __( 'Map height', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'description' => __( 'Set a height or leave empty to make a map responsive.&nbsp;<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use CSS units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'map_zoom',
            [
                'label' => __( 'Map zoom level', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'zoom' ],

                'range' => [
                    'zoom' => [
                        'min' => 1,
                        'max' => 20,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'zoom',
                    'size' => 14,
                ],
                'description' => __( 'Map zoom level (min - 1, max - 20, default - 14)', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'zoom_enabled',
            [
                'label' => __( 'Show zoom control', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'street_view_enabled',
            [
                'label' => __( 'Show street view control', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'map_type_enabled',
            [
                'label' => __( 'Show map type control', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->add_control(
            'fullscreen_enabled',
            [
                'label' => __( 'Show fullscreen control', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $this->end_controls_section();


        //Styles
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'custom_marker_image',
            [
                'label' => __( 'Custom marker', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => []
            ]
        );
       

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $ohio_api_key = OhioOptions::get_global( 'google_maps_api_key', '' );

        // Marker
        $ohio_map_marker = plugin_dir_url( __FILE__ ) . 'images/google-maps-marker.png';
        if ( !empty( $settings['custom_marker_image']['url'] ) ) {
            $ohio_map_marker = $settings['custom_marker_image']['url'];
        }

        // Map height
        if ( !empty( $settings['map_height'] ) ) {
            $this->addInlineStyle( 'map', 'map_height', 'height: {{VALUE}}; min-height: {{VALUE}}; position: relative' );
        }

        include( plugin_dir_path( __FILE__ ) . 'google-maps-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Google_Maps_Widget() );
