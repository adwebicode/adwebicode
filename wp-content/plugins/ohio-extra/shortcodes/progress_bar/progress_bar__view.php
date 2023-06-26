<?php

/**
* WPBakery Page Builder Ohio Progress Bar shortcode view
*/

?>
<div class="ohio-widget progress<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
	<div class="progress-heading">
		<?php if ( !empty( $name ) ) : ?>
			<h6 class="label"><?php echo $name; ?></h6>
		<?php endif; ?>
		<?php if ( !$percent_in_tooltip ) : ?>
			<span class="progress-percent">
	            <span class="percent">0</span>%
	        </span>
		<?php endif; ?>
	</div>
	<div class="progress-holder<?php echo esc_attr( $inner_classes ); ?>">
        <div class="progress-bar" role="progressbar">
        	<?php if ( $percent_in_tooltip ) : ?>
				<span class="progress-percent tooltip">
	                <span class="percent">0</span>%
	            </span>
			<?php endif; ?>
        </div>
    </div>
</div>