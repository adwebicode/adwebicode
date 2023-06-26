<?php 
	$have_wpml = function_exists( 'icl_get_languages' );
	$wpml_show_in_header = OhioOptions::get_global( 'wpml_show_in_header', true );
?>

<?php
if ( $have_wpml && $wpml_show_in_header) {
	$languages = icl_get_languages('skip_missing=1');
	if ( !empty( $languages)) : ?>
		<select class="lang-dropdown -small">
			<?php
			$languages = icl_get_languages();
			foreach( $languages as $language ) {
				$class = ( $language['active'] ) ? ' class="active" selected="selected"' : '';

				printf( '<option%s value="%s"><img src="%s" alt="%s">%s</option>', $class, $language['url'],
				$language['country_flag_url'], $language['code'], $language['native_name'] );
			}
			?>
		</select>
	<?php endif; ?>
<?php } ?>