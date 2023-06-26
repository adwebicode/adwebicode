<?php

/**
* WPBakery Page Builder Ohio Text shortcode view
*/

?>
<div class="ohio-text-sc<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
	<?php echo do_shortcode( $content_html ); ?>
</div>