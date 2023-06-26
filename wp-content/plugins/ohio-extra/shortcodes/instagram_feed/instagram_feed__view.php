<?php

/**
* WPBakery Page Builder Ohio Instagram Feed shortcode view
*/

?>
<div class="ohio-widget instagram-feed<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
	<?php echo do_shortcode( '[instagram-feed feed=' . esc_attr( $feed_id ) . ']' ); ?>
</div>