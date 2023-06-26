<?php

/**
* WPBakery Page Builder Ohio Vertical Fullscreen Slider shortcode view
*/

?>
<div class="ohio-widget slider autoheight -slider-fs<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" data-fullscreen-slider="true" data-options='<?php echo $onepage_json; ?>'>
	<?php echo do_shortcode( $content ); ?>
</div>
<div class="clb-scroll-top clb-slider-scroll-top vc_hidden-md vc_hidden-sm vc_hidden-xs">
    <div class="clb-scroll-top-bar">
        <div class="scroll-track"></div>
    </div>
    <div class="clb-scroll-top-holder font-titles">
        <?php esc_html_e( 'Scroll', 'ohio-extra' ); ?>
    </div>
</div>