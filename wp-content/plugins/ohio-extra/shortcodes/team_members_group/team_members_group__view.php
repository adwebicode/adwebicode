<?php

/**
* WPBakery Page Builder Ohio Team Members Group shortcode view
*/

?>
<ul class="ohio-widget team-group -unlist<?php echo esc_attr( $wrapper_classes ); ?>" data-team-group="true" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
	<?php echo do_shortcode( $content ); ?>
</ul>