<?php

/**
* WPBakery Page Builder Ohio Countdown shortcode view
*/

?>
<div class="ohio-widget countdown<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
	<div class="countdown-item">
		<div class="number title titles-typo">0</div>
		<?php if ( $layout != 'text' ) : ?>
			<div class="number-label"><?php esc_html_e( 'Months', 'ohio-extra' ); ?></div>
		<?php endif; ?>
	</div>
	<div class="countdown-item">
		<div class="number title titles-typo">0</div>
		<?php if ( $layout != 'text' ) : ?>
			<div class="number-label"><?php esc_html_e( 'Days', 'ohio-extra' ); ?></div>
		<?php endif; ?>
	</div>
	<div class="countdown-item">
		<div class="number title titles-typo">0</div>
		<?php if ( $layout != 'text' ) : ?>
			<div class="number-label"><?php esc_html_e( 'Hours', 'ohio-extra' ); ?></div>
		<?php endif; ?>
	</div>
	<div class="countdown-item">
		<div class="number title titles-typo">0</div>
		<?php if ( $layout != 'text' ) : ?>
			<div class="number-label"><?php esc_html_e( 'Minutes', 'ohio-extra' ); ?></div>
		<?php endif; ?>
	</div>
	<div class="countdown-item">
		<div class="number title titles-typo">0</div>
		<?php if ( $layout != 'text' ) : ?>
			<div class="number-label"><?php esc_html_e( 'Seconds', 'ohio-extra' ); ?></div>
		<?php endif; ?>
	</div>
</div>