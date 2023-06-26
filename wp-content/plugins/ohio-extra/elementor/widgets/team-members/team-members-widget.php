<?php
class Ohio_Elementor_Team_Members_Widget extends Ohio_Elementor_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        parent::__construct( $data, $args );

        wp_register_script( 'ohio-elementor-team-members-widget', plugin_dir_url( __FILE__ ) . 'handler.js', [ 'jquery', 'elementor-frontend' ], '1.0.0', true );
    }

    public function get_name()
    {
        return 'ohio_team_members';
    }

    public function get_title()
    {
        return __( 'Team Members Group', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-team-members';
    }

    public function get_categories()
    {
        return [ 100 ];
    }

    public function get_script_depends() {
        return [ 'ohio-elementor-team-members-widget' ];
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
            'members',
            [
                'label' => __( 'Members', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $this->getMembersControls(),
                'default' => [],
                'title_field' => '{{member_name}}',
                'prevent_empty' => false,
            ]
        );

        $this->end_controls_section();

        //Styles
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'General', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'member_name_color',
            [
                'label' => __( 'Member name color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'member_name_typography',
                'label' => __( 'Member name typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_control(
            'member_position_color',
            [
                'label' => __( 'Member position color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .author-details' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'member_position_typography',
                'label' => __( 'Member position typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .author-details',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'About color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item-holder p' => 'color: {{VALUE}};',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'About typography', 'ohio-extra' ),
                'selector' => '{{WRAPPER}} .item-holder p, {{WRAPPER}} .overlay-details > p',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'other_section',
            [
                'label' => __( 'Other', 'ohio-extra' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'wrapper_color',
            [
                'label' => __( 'Card background color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-group .item-holder' => 'background-color: {{VALUE}}',
                ]
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
            'socials_color',
            [
                'label' => __( 'Social links color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-networks a' => 'color: {{VALUE}};',
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
            'socials_hover_color',
            [
                'label' => __( 'Social links color', 'ohio-extra' ),
                'type' =>  \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-networks a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function getSocialNetworksControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_link', [
                'label' => '',
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => 'https://example.com',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_network',
            [
                'label' => '',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'facebook',
                'options' => $this->getSocialNetworksOptionsList(),
                'label_block' => true,
            ]
        );
        
        return $repeater->get_controls();
    }

    protected function getMembersControls()
    {
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'team_member_image',
            [
                'label' => __( 'Member photo', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'member_name',
            [
                'label' => __( 'Member name', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'John Doe', 'ohio-extra' ),
            ]
        );

        $repeater->add_control(
            'member_position',
            [
                'label' => __( 'Member position', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Product manager', 'ohio-extra' )
            ]
        );

        $repeater->add_control(
            'member_description',
            [
                'label' => __( 'Member about', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 2,
                'description' => __( 'Brief description of team member\'s skills and achievements.', 'ohio-extra' ),
            ]
        );

        $repeater->add_control(
            'social_artstation',
            [
                'label' => __( 'ArtStation link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_behance',
            [
                'label' => __( 'Behance link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_deviantart',
            [
                'label' => __( 'DeviantArt link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_digg',
            [
                'label' => __( 'Digg link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_discord',
            [
                'label' => __( 'Discord link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_dribbble',
            [
                'label' => __( 'Dribbble link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_facebook',
            [
                'label' => __( 'Facebook link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_flickr',
            [
                'label' => __( 'Flickr link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_github',
            [
                'label' => __( 'GitHub link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_houzz',
            [
                'label' => __( 'Houzz link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_instagram',
            [
                'label' => __( 'Instagram link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_kaggle',
            [
                'label' => __( 'Kaggle link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_linkedin',
            [
                'label' => __( 'LinkedIn link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_medium',
            [
                'label' => __( 'Medium link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_mixer',
            [
                'label' => __( 'Mixer link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_pinterest',
            [
                'label' => __( 'Pinterest link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_producthunt',
            [
                'label' => __( 'Product Hunt link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_quora',
            [
                'label' => __( 'Quora link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_reddit',
            [
                'label' => __( 'Reddit link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_snapchat',
            [
                'label' => __( 'Snapchat link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_soundcloud',
            [
                'label' => __( 'SoundCloud link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_spotify',
            [
                'label' => __( 'Spotify link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_teamspeak',
            [
                'label' => __( 'TeamSpeak link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_telegram',
            [
                'label' => __( 'Telegram link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_tiktok',
            [
                'label' => __( 'TikTok link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_tripadvisor',
            [
                'label' => __( 'Tripadvisor link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_tumblr',
            [
                'label' => __( 'Tumblr link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_twitch',
            [
                'label' => __( 'Twitch link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_twitter',
            [
                'label' => __( 'Twitter link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_vimeo',
            [
                'label' => __( 'Vimeo link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_vine',
            [
                'label' => __( 'Vine link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_whatsapp',
            [
                'label' => __( 'WhatsApp link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_xing',
            [
                'label' => __( 'Xing link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_youtube',
            [
                'label' => __( 'YouTube link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        $repeater->add_control(
            'social_fivehundred',
            [
                'label' => __( '500px link', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => false,
            ]
        );

        return $repeater->get_controls();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        include( plugin_dir_path( __FILE__ ) . 'team-members-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Team_Members_Widget() );
