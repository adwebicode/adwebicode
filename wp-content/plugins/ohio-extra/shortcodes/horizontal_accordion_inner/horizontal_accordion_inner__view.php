<?php

/**
* WPBakery Page Builder Ohio Accordion Inner shortcode view
*/

?>
<div class="horizontal-accordion-item<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>">
	<div class="accordion-body">
		<?php echo do_shortcode( $content_html ); ?>
	</div>
</div>