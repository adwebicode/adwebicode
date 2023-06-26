<?php
class Ohio_Elementor_Video_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_video';
    }

    public function get_title()
    {
        return __( 'Video', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-video';
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
            'module_layout',
            [
                'label' => __( 'Video layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'default' => [
                        'title' => __( 'Default', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/video/images/wpb_params_076.svg',
                    ],
                    'with_preview' => [
                        'title' => __( 'With Preview', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/video/images/wpb_params_075.svg',
                    ]
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'button_layout',
            [
                'label' => __( 'Video button layout', 'ohio-extra' ),
                'type' => 'ohio-image-choose',
                'options' => [
                    'filled' => [
                        'title' => __( 'Filled', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/video/images/wpb_params_073.svg',
                    ],
                    'outline' => [
                        'title' => __( 'Outline', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/video/images/wpb_params_074.svg',
                    ],
                    'blurred' => [
                        'title' => __( 'Blurred', 'ohio-extra' ),
                        'icon' => OHIO_EXTRA_DIR_URL . '/shortcodes/video/images/wpb_params_074.svg',
                    ]
                ],
                'default' => 'filled',
            ]
        );

        $this->add_control(
            'block_alignment',
            [
                'label' => __( 'Video button position', 'ohio-extra' ),
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
            'preview_image',
            [
                'label' => __( 'Preview image', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'module_layout' => 'with_preview',
                ],
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
                    '{{WRAPPER}} .video-button.-with-preview .preview-image' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'module_layout' => 'with_preview',
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
                    '{{WRAPPER}} .video-button.-with-shadow:not(.-with-preview) .icon-button' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .video-button.-with-shadow.-with-preview .preview-image' => 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, {{SIZE}}{{UNIT}});'
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
                'default' => '',
                'condition' => [
                    'module_layout' => 'with_preview',
                ],
            ]
        );

        $this->add_control(
            'button_size',
            [
                'label' => __( 'Video button size', 'ohio-extra' ),
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
            'title',
            [
                'label' => __( 'Video title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'default' =>__( 'Play Video', 'ohio-extra' ),
                'placeholder' => __( 'Enter video title.', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'video_type',
            [
                'label' => __( 'Video type', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'youtube' => __( 'YouTube', 'ohio-extra' ),
                    'vimeo' => __( 'Vimeo', 'ohio-extra' ),
                    'custom' => __( 'Custom (self-hosted)', 'ohio-extra' )
                ],
                'default' => 'youtube',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __( 'Video URL', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '',
                'description' => __( '<b>YouTube:</b><br>https://www.youtube.com/embed/t67_zAg5vvI<br><b>Vimeo:</b><br>https://player.vimeo.com/video/356065748', 'ohio-extra' ),
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'start_option',
            [
                'label' => __( 'Video start (s)', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '',
                'description' => __( 'Used to automatically begin playback at a specific point in time (e.g. 25s)', 'ohio-extra' ),
                'condition' => [
                    'video_type' => ['youtube', 'vimeo'],
                ],
            ]
        );

        $this->add_control(
            'autoplay_option',
            [
                'label' => __( 'Autoplay mode', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'description' => __( 'Autoplay works with muted mode only and may be blocked in some environments, such as IOS, Chrome 66+, and Safari 11+. In these cases, we’ll revert to standard playback requiring viewers to initiate playback.', 'ohio-extra' ),
                'default' => '',
                'condition' => [
                    'video_type' => ['youtube', 'vimeo'],
                ],
            ]
        );

        $this->add_control(
            'muted_option',
            [
                'label' => __( 'Muted mode', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'description' => __( 'Set video to mute on load.', 'ohio-extra' ),
                'default' => '',
                'condition' => [
                    'video_type' => ['youtube', 'vimeo'],
                ],
            ]
        );

        $this->add_control(
            'limit_related_videos_option',
            [
                'label' => __( 'Show related videos from the same channel', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'description' => __( 'Related videos will come from the same channel.', 'ohio-extra' ),
                'default' => '',
                'condition' => [
                    'video_type' => ['youtube'],
                ],
            ]
        );

        $this->add_control(
            'controls_option',
            [
                'label' => __( 'Show controls', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'description' => __( 'When disabling this parameter, the play/pause button will be hidden. To start playback for your viewers, you\'ll need to either enable autoplay mode.', 'ohio-extra' ),
                'default' => 'yes',
                'condition' => [
                    'video_type' => ['youtube', 'vimeo'],
                ],
            ]
        );

        $this->add_control(
            'title_option',
            [
                'label' => __( 'Show title', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'video_type' => ['vimeo'],
                ],
            ]
        );

        $this->add_control(
            'byline_option',
            [
                'label' => __( 'Show author', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'video_type' => ['vimeo'],
                ],
            ]
        );

        $this->add_control(
            'use_call_to_action',
            [
                'label' => __( 'Button animation', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();


        //Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Button', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-button-caption' => 'color: {{VALUE}}',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .video-button-caption',
            ]
        );

        $this->start_controls_tabs( 'tab_colors_style', ['separator' => 'before'] );

        $this->start_controls_tab(
            'tab_colors_normal',
            [
                'label' => __( 'Normal', 'ohio-extra' ),
            ]
        );

        $this->add_control(
            'button_color',
            [
                'label' => __( 'Button color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-button:not(.-outlined) .icon-button' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .video-button.-outlined .icon-button' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-button .icon' => 'color: {{VALUE}}',
                ],
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
            'button_color_hover',
            [
                'label' => __( 'Button color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-button:not(.-outlined) .icon-button:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .video-button.-outlined .icon-button:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'icon_color_hover',
            [
                'label' => __( 'Icon color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-button:hover .icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Video data
        $video_params = '';
        $video_attrs = '';

        if ( !empty( $settings['controls_option'] ) ) {
            $video_params .= 'controls=1';
        } else {
            $video_params .= 'controls=0';
        }
        if ( $settings['video_type'] == 'vimeo') {
            if ( $settings['autoplay_option'] ) {
                $video_params .= '&muted=1&autoplay=1';
            } else {
                if ( !empty( $settings['muted_option'] ) ) {
                    $video_params .= '&muted=1';
                } else {
                    $video_params .= '&muted=0';
                }
            }
            if ( !empty( $settings['controls_option'] ) ) {
                $video_params .= '&controls=1';
            } else {
                $video_params .= '&controls=0';
            }
            if ( !empty( $settings['title_option'] ) ) {
                $video_params .= '&title=1';
            } else {
                $video_params .= '&title=0';
            }
            if ( !empty( $settings['byline_option'] ) ) {
                $video_params .= '&byline=1';
            } else {
                $video_params .= '&byline=0';
            }
            if ( isset( $settings['start_option'] ) ) {
                $video_params .= '&#t=' . (int) $settings['start_option'] . 's';
            }
        }
        if ( $settings['video_type'] == 'youtube' ) {
            if ( isset( $settings['start_option'] ) ) {
                $video_params .= '&start=' . (int) $settings['start_option'];
            }
            if ( $settings['autoplay_option'] ) {
                $video_params .= '&mute=1&autoplay=1';
            } else {
                if ( !empty( $settings['muted_option'] ) ) {
                    $video_params .= '&mute=1';
                } else {
                    $video_params .= '&mute=0';
                }
            }
            if( !empty( $settings['limit_related_videos_option'] ) ) {
                $video_params .= '&rel=0';
            }
        }
        if ( $settings['link'] ) {
            $video_attrs .= ' data-video=' . esc_attr( $settings['link'] ) . '?' . esc_attr( $video_params );
        }
        if ( $settings['video_type'] == 'custom' ) {
            $video_attrs .= ' data-video-type=custom';
        }

        // Wrapper classes
        switch ( $settings['button_layout'] ) {
            case 'outline':
                $this->addWrapperClass( '-outlined' );
                break;
            case 'blurred':
                $this->addWrapperClass( '-blurred' );
                break;
        }

        switch ( $settings['block_alignment'] ) {
            case 'left':
                $this->addWrapperClass( '-left-flex' );
                break;
            case 'center':
                $this->addWrapperClass( '-center-flex' );
                break;
            case 'right':
                $this->addWrapperClass( '-right-flex' );
                break;
        }

        $settings['size_classes'] = '';
        switch ( $settings['button_size'] ) {
            case 'small':
                $settings['size_classes'] = '-small';
                break;
            case 'large':
                $settings['size_classes'] = '-large';
                break;
        }

        if ( $settings['use_call_to_action'] ){
            $this->addWrapperClass( '-animation' );
        }

        if ( $settings['drop_shadow'] ) {
            $this->addWrapperClass( '-with-shadow' );
        }

        if ( $settings['module_layout'] == 'with_preview' ){
            $this->addWrapperClass( '-with-preview' );
        }

        if ( $settings['tilt_effect'] ) {
            $tilt_attrs = 'data-tilt=true data-tilt-perspective=6000';
        }

        include( plugin_dir_path( __FILE__ ) . 'video-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Video_Widget() );
