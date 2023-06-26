<?php

/**
* WPBakery Page Builder Ohio Tabs Inner shortcode view
*/

?>
<div class="tabs-content-item<?php echo esc_attr( $wrapper_classes ); ?>" data-title="<?php echo esc_attr( $title ); ?>" <?php if ( $with_icon && $icon_as_icon ) { echo ' data-icon="' . esc_attr( $icon_as_icon ) . '"'; } ?> id="<?php echo esc_attr( $wrapper_id ); ?>">
	<?php echo do_shortcode( $content_html ); ?>
</div>