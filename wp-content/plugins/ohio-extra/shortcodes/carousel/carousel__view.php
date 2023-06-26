<?php

/**
* WPBakery Page Builder Ohio Carousel shortcode view
*/

?>
<div class="slider-holder">
	<div class="ohio-widget slider ohio-slider<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" data-ohio-slider='<?php echo $slider_json; ?>' <?php echo esc_attr( $animation_attrs ); ?>>
		<?php echo do_shortcode( $content ); ?>
	</div>

	<?php if ($preloader) :?>
		<svg class="spinner sk-preloader" viewBox="0 0 50 50"><circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="4"></circle></svg>
	<?php endif; ?>
</div>