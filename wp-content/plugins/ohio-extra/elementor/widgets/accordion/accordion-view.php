<div class="ohio-accordion-sс ohio-widget accordion <?php echo $this->getWrapperClasses(); ?>" data-ohio-accordion="true">

    <?php foreach ($settings['tabs'] as $item) : ?>
        <div class="accordion-item elementor-repeater-item-<?php echo $item['_id'];
            if (!empty($item['is_active'])) { echo ' active'; }
            if (!empty($item['custom_class'])) { echo ' ' . $item['custom_class']; }
            ?>">

            <div class="accordion-button">
                <h6 class="accordion-header">

                    <?php if ( !empty($item['use_icon']) && !empty($item['icon_icon']) ) {
                        \Elementor\Icons_Manager::render_icon( $item['icon_icon'], [ 'class' => 'icon' ] );
                    } ?>

                    <?php echo $item['list_title']; ?>

                </h6>
                <button class="icon-button -extra-small">
                    <i class="icon"></i>
                </button>
            </div>
            <div class="accordion-collapse <?php if (!empty($item['is_active'])) echo 'visible'; ?>">
                <div class="accordion-body">
                <?php
                    if ($item['list_content_type'] == 'editor') {
                        echo do_shortcode( $item['list_content_editor'] );
                    } else {
                        if ( !empty($item['list_content_template']) && $item['list_content_template'] != 0 ) {
                            // Template
                            echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $this->getLocalizedTemplate( $item['list_content_template'] ) );
                        } else {
                            // No template message
                            $link = add_query_arg(
                                array(
                                    'post_type'     => 'elementor_library',
                                    'action'        => 'elementor_new_post',
                                    '_wpnonce'      => wp_create_nonce( 'elementor_action_new_post' ),
                                    'template_type' => 'section',
                                ),
                                esc_url( admin_url( '/edit.php' ) )
                            );

                            echo '<div style="text-align:center;">';
                            echo __( 'Template is not defined. Select an existing template or create a', 'ohio-extra' );
                            echo ' <a class="new-template-link elementor-clickable brand-color" target="_blank" href="' . $link . '">' . esc_html__( 'new one', 'ohio-extra' ) . '</a>.';
                            echo '</div>';
                        }
                    }
                ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>