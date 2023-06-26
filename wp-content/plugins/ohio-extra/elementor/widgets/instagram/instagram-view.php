<div class="ohio-widget instagram-feed <?php echo $this->getWrapperClasses(); ?>">
    <?php 
        if ( ! \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
            echo do_shortcode( '[instagram-feed feed=' . esc_attr( $settings['feed_id'] ) . ']' );
        } else {
            echo '<div class="clb-blank-note"><i class="icon ion ion-md-information-circle-outline"></i><div class="clb-blank-note-inner">Sorry, an Instagram feed preview isn\'t available in the Elementor Editing mode. Save changes and preview the front-end of the current page.</div></div>';
        } 
    ?>
</div>