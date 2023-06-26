<?php

/**
* WPBakery Page Builder Ohio Compare shortcode view
*/

?>
<div class="ohio-widget compare-wrapper<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
    <div class="compare compare-container" data-compare="true"
		<?php if ( $use_label == false ) { echo ' data-compare-without-overlay="true"'; } ?> 
		<?php if ( $label_before ) { echo ' data-compare-before-label="' . $label_before . '"'; } ?> 
		<?php if ( $label_after ) { echo ' data-compare-after-label="' . $label_after . '"'; } ?> 
		<?php if ( $position ) { echo ' data-compare-position="' . $position . '"'; } ?> 
		<?php if ( $orientation ) { echo ' data-compare-orientation="' . $orientation . '"'; } ?>>
		<img <?php echo $first_image_atts; ?> />
		<img <?php echo $second_image_atts; ?> />
    </div>
</div>