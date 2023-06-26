<?php

/**
* WPBakery Page Builder Ohio Accordion shortcode view
*/

?>
<div class="ohio-accordion-sс ohio-widget accordion <?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?> data-ohio-accordion="true">
	<?php echo do_shortcode( $content ); ?>
</div>
