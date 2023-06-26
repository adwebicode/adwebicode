<?php

/**
* WPBakery Page Builder Ohio Accordion Inner shortcode view
*/

?>
<div class="accordion-item<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>">
	<div class="accordion-button">
        <h6 class="accordion-header">
        	<?php if ( $with_icon && $icon_as_icon) : ?>
				<i class="icon <?php echo $icon_as_icon; ?>"></i>
			<?php endif; ?>
        	<?php echo $heading; ?>
    	</h6>
        <button class="icon-button -extra-small">
            <i class="icon"></i>
        </button>
    </div>
    <div class="accordion-collapse">
        <div class="accordion-body">
            <?php echo do_shortcode( $content_html ); ?>
        </div>
    </div>
</div>
