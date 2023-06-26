<?php

/**
* WPBakery Page Builder Ohio Vertical Slider Page shortcode view
*/

?>
<div class="<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr($slider_attrs); ?>>
	<div class="clb-slider-item-inner">
		<?php echo do_shortcode( $content ); ?>
	</div>
</div>