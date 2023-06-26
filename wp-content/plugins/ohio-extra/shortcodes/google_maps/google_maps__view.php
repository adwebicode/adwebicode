<?php

/**
* WPBakery Page Builder Ohio Google Maps shortcode view
*/

?>
<div class="ohio-widget google-maps<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" data-google-map="true" <?php echo esc_attr( $animation_attrs ); ?>>
	
	<?php if ($ohio_api_key == '') : ?>
		<div class="clb-blank-note">
		    <i class="icon -large">
		        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.25 7c0 .69-.56 1.25-1.25 1.25s-1.25-.56-1.25-1.25.56-1.25 1.25-1.25 1.25.56 1.25 1.25zm10.75 5c0 6.627-5.373 12-12 12s-12-5.373-12-12 5.373-12 12-12 12 5.373 12 12zm-2 0c0-5.514-4.486-10-10-10s-10 4.486-10 10 4.486 10 10 10 10-4.486 10-10zm-13-2v2h2v6h2v-8h-4z"></path></svg>
		    </i>
		    <div class="clb-blank-note-inner">
		    	<?php echo esc_html('Please', 'ohio-extra' ); ?> <a class="-highlighted" target="_blank" href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-general-other"><?php echo esc_html('enter your API key'); ?></a> <?php echo esc_html('to enable Google Maps.', 'ohio-extra' ); ?></a>
						<a target="_blank" href="https://docs.clbthemes.com/ohio/tips-tricks/#googlemaps"><b><?php echo esc_html('Read Docs', 'ohio-extra' ); ?></b></a>
		    </div>
		</div>
	<?php endif; ?>

	<div class="google-maps-wrap"></div>
	<div class="hidden" data-google-map-markers="true"><?php echo esc_attr( $marker_locations ); ?></div>
</div>