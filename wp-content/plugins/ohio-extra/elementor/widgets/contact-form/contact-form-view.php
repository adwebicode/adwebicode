<div class="ohio-widget contact-form <?php echo $this->getWrapperClasses(); ?>">
	<?php if ( !empty( $settings['form'] ) && $settings['form'] != '0' && get_post_type( $settings['form'] ) == 'wpcf7_contact_form' ): ?>

		<?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $settings['form'] ) . '" title=""]' ); ?>
		<div class="hidden" data-button-contact="true">
			<button class="button <?php echo esc_attr( $this->getButtonClasses() ); ?>" data-button-loading="true"></button>
        </div>

	<?php else: ?>

        <div class="clb-blank-note">
            <i class="icon -large">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.25 7c0 .69-.56 1.25-1.25 1.25s-1.25-.56-1.25-1.25.56-1.25 1.25-1.25 1.25.56 1.25 1.25zm10.75 5c0 6.627-5.373 12-12 12s-12-5.373-12-12 5.373-12 12-12 12 5.373 12 12zm-2 0c0-5.514-4.486-10-10-10s-10 4.486-10 10 4.486 10 10 10 10-4.486 10-10zm-13-2v2h2v6h2v-8h-4z"/></svg>
            </i>
            <div class="clb-blank-note-inner">
            	<a target="_blank" class="-highlighted" href="<?php echo get_edit_post_link() . '&action=elementor'; ?>"><?php echo esc_html('Choose a Contact 7 form', 'ohio-extra' ); ?></a>
				<?php echo esc_html('in the Elementor editor mode to be displayed here.', 'ohio-extra' ); ?>
    		</div>
        </div>
        
	<?php endif; ?>
</div>