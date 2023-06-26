<?php

/**
* WPBakery Page Builder Ohio Counter shortcode view
*/

?>
<div class="ohio-widget counter<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>
	data-counter="<?php echo $count_number; ?>">
    <div class="counter-number title titles-typo <?php if ( !empty( $plus_symbol ) ) { echo "-with-increaser"; } ?>">
		<?php if ( $layout == 'number_with_icon'): ?>
            <div class="icon-group<?php echo esc_attr( $icon_classes ); ?>">
				<?php if ( $icon_as_icon ) : ?>
					<i class="icon left-icon <?php echo $icon_as_icon; ?>"></i>
				<?php elseif ( $icon_as_image ) : ?>
					<img class="icon" <?php echo $icon_image_atts; ?>>
				<?php endif; ?>
			</div>
		<?php endif; ?>
        <div class="holder">
            <span><?php echo $count_text_before ?></span>
			<span class="number">0</span>
			<span><?php echo $count_text_after ?></span>
        </div>
    </div>
	<?php if ( $title ): ?>
    	<p class="-unspace"><?php echo $title ?></p>
	<?php endif; ?>
</div>