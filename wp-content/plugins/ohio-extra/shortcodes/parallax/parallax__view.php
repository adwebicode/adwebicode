<?php

/**
* WPBakery Page Builder Ohio Parallax shortcode view
*/

?>
<div class="ohio-widget parallax<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
	<div class="parallax-bg"></div>
	<div class="parallax-content">
		<?php echo do_shortcode( $content ); ?>
	</div>
</div>