<?php

/**
* WPBakery Page Builder Ohio Contact Form shortcode view
*/

?>
<div class="ohio-widget contact-form<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
	<?php if ( !empty( $form_id ) ): ?>

		<?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $form_id ) . '" title=""]' ); ?>
		<div class="hidden" data-button-contact="true">
			<button class="button <?php echo $button_css['classes']; ?>" data-button-loading="true"></button>
        </div>

	<?php else: ?>

        <div class="clb-blank-note">
            <i class="icon -large">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.25 7c0 .69-.56 1.25-1.25 1.25s-1.25-.56-1.25-1.25.56-1.25 1.25-1.25 1.25.56 1.25 1.25zm10.75 5c0 6.627-5.373 12-12 12s-12-5.373-12-12 5.373-12 12-12 12 5.373 12 12zm-2 0c0-5.514-4.486-10-10-10s-10 4.486-10 10 4.486 10 10 10 10-4.486 10-10zm-13-2v2h2v6h2v-8h-4z"/></svg>
            </i>
            <div class="clb-blank-note-inner">
            	<?php echo esc_html('Check the', 'ohio-extra' ); ?>
				<b><?php echo esc_html('Contact Form 7 shortcode', 'ohio-extra' ); ?></b>
				<?php echo esc_html('on the current page and choose a valid form to be displayed here.', 'ohio-extra' ); ?>
            </div>
        </div>
        
	<?php endif; ?>
</div>