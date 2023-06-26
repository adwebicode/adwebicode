<?php
class Ohio_Elementor_Instagram_Widget extends Ohio_Elementor_Widget_Base {

    public function get_name()
    {
        return 'ohio_instagram';
    }

    public function get_title()
    {
        return __( 'Instagram Feed', 'ohio-extra' );
    }

    public function get_icon()
    {
        return 'ohio-icon-sc-instagram';
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
            'important_note',
            [
                'label' => __( 'Usage note', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw' => '<span style="color: #8b9da7; line-height: 1.15; margin-top: 6px; display: inline-block;">' . 
                    __( 'Ensure that <a target="_blank" href="/wp-admin/plugins.php">Instagram Feed</a> plugin is installed. Then <a target="_blank" href="/wp-admin/admin.php?page=sbi-feed-builder">connect and adjust</a> your feed using the plugin\'s settings.', 'ohio-extra' ) . '</span>',
            ]
        );

        $this->add_control(
            'feed_id',
            [
                'label' => __( 'Feed ID number (1 by default)', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '1',
                'description' => __( 'To use several Instagram feeds you need to specify a unique feed ID.', 'ohio-extra' ),
                'label_block' => true
            ]
        );

        $this->add_control(
            'remove_gap',
            [
                'label' => __( 'Remove column gap?', 'ohio-extra' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'ohio-extra' ),
                'label_off' => __( 'No', 'ohio-extra' ),
                'return_value' => 'yes',
                'default' => '',
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
                    '{{WRAPPER}} #sb_instagram:not(.no-margins) .sbi_photo_wrap' => 'border-radius: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'remove_gap' => '',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        // Wrapper classes
        if ( !empty( $settings['remove_gap'] ) ) {
            $this->addWrapperClass( 'no-margins' );
        }

        // $columns_gap = ( !empty( $settings['remove_gap'] ) ) ? 0 : 20;
        $photo_count = ( !empty( $settings['items_in_block'] ) ) ? $settings['items_in_block']['size'] : 6;

        include( plugin_dir_path( __FILE__ ) . 'instagram-view.php' );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new \Ohio_Elementor_Instagram_Widget() );
