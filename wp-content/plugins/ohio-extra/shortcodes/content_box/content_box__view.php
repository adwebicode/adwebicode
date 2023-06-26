<?php

/**
* WPBakery Page Builder Ohio Accordion shortcode view
*/

?>
<div class="ohio-widget content-box<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
	<?php echo do_shortcode( $content ); ?>
</div>