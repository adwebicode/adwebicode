<?php

/**
* Visual Composer Ohio Circle Progress Bar shortcode view
*/

?>
<div class="ohio-widget circle-progress<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
    <div class="circle">
        <svg class="progress" width="110" height="110" viewBox="0 0 110 110">
            <defs>
                <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#dc2828"></stop>
                    <stop offset="100%" stop-color="#7544dd"></stop>
                </linearGradient>
            </defs>
            <circle class="progress-meter" cx="55" cy="55" r="49" stroke-width="8"></circle>
            <circle class="progress-value" cx="55" cy="55" r="49" stroke="url(#gradient)" stroke-width="8"></circle>
        </svg>

        <?php if ( $with_icon == true ): ?>
        	<div class="icon-group">
	            <?php if ( $icon_as_icon ): ?>
					<i class="<?php echo esc_attr( $icon_as_icon ); ?>"></i>
				<?php elseif ( $icon_as_image ): ?>
					<img <?php echo $icon_image_atts ?> />
				<?php endif;?>
			</div>
        <?php else: ?>

            <h4 class="range">
	            <span class="range-value">00</span>%
	        </h4>
        <?php endif; ?>

    </div>
    <div class="progress-content">

    	<?php if ( $with_icon == true ): ?>
            <h4 class="range title">
	            <span class="range-value">00</span>%
	        </h4>
        <?php endif; ?>

        <?php if ( $title ): ?>
			<h6 class="title">
				<?php echo $title; ?>
			</h6>
		<?php endif; ?>

    </div>
</div>