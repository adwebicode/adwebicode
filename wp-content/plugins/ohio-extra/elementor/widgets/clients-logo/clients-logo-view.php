<div class="ohio-widget logo <?php echo $this->getWrapperClasses(); ?>">

	<?php if ( !empty( $settings['use_link'] ) && !empty( $settings['link']['url'] ) ) : ?>
        <a class="-unlink" <?php echo $this->getLinkAttributesString( $settings['link'] ); ?>>
    <?php endif; ?>

	<img
		src="<?php echo $settings['clients_logo_image']['url']; ?>"
		srcset="<?php echo wp_get_attachment_image_srcset( $settings['clients_logo_image']['id'], 'large' ) ?>"
		sizes="<?php echo wp_get_attachment_image_sizes( $settings['clients_logo_image']['id'], 'large' ) ?>"
		alt="<?php echo esc_attr( get_post_meta( $settings['clients_logo_image']['id'], '_wp_attachment_image_alt', true ) ); ?>">

	<?php if ( !empty( $settings['description'] ) ): ?>
		<div class="logo-details">
			<p><?php echo $settings['description']; ?></p>
		</div>
	<?php endif; ?>

	<?php if ( !empty( $settings['use_link'] ) && !empty( $settings['link']['url'] ) ) : ?>
        </a>
    <?php endif; ?>

</div>