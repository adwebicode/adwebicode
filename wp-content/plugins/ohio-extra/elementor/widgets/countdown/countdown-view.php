
<div class="ohio-widget countdown <?php echo $this->getWrapperClasses(); ?>" data-countdown="true" data-date="<?php echo esc_attr( $countdown_time ); ?>">
	<div class="countdown-item">
		<div class="number title titles-typo">0</div>
		<?php if ( in_array( $settings['block_layout'], [ 'default', 'boxed' ] ) ) : ?>
			<div class="number-label"><?php esc_html_e( 'Months', 'ohio-extra' ); ?></div>
		<?php endif; ?>
	</div>
	<div class="countdown-item">
		<div class="number title titles-typo">0</div>
		<?php if ( in_array( $settings['block_layout'], [ 'default', 'boxed' ] ) ) : ?>
			<div class="number-label"><?php esc_html_e( 'Days', 'ohio-extra' ); ?></div>
		<?php endif; ?>
	</div>
	<div class="countdown-item">
		<div class="number title titles-typo">0</div>
		<?php if ( in_array( $settings['block_layout'], [ 'default', 'boxed' ] ) ) : ?>
			<div class="number-label"><?php esc_html_e( 'Hours', 'ohio-extra' ); ?></div>
		<?php endif; ?>
	</div>
	<div class="countdown-item">
		<div class="number title titles-typo">0</div>
		<?php if ( in_array( $settings['block_layout'], [ 'default', 'boxed' ] ) ) : ?>
			<div class="number-label"><?php esc_html_e( 'Minutes', 'ohio-extra' ); ?></div>
		<?php endif; ?>
	</div>
	<div class="countdown-item">
		<div class="number title titles-typo">0</div>
		<?php if ( in_array( $settings['block_layout'], [ 'default', 'boxed' ] ) ) : ?>
			<div class="number-label"><?php esc_html_e( 'Seconds', 'ohio-extra' ); ?></div>
		<?php endif; ?>
	</div>
</div>