<?php
/**
 * The plugin page view - the "settings" page of the plugin.
 *
 * @package ocdi
 */

namespace OCDI;

?>

<div class="clb-hub clb-importer clb-page">
	<div class="clb-hub-intro">
		<div class="clb-hub-container">
			<div class="details">
				<i class="details-icon"></i>
				<h1><?php _e( 'Demo Importer', 'ohio-importer' ); ?></h1>
			</div>
			<div class="mode-switcher">
				<a href="admin.php?page=ohio_hub" class="btn btn-outline"><?php _e( 'Dashboard', 'ohio-importer' ); ?></a>
				<a href="admin.php?page=ohio_hub_settings" class="btn btn-outline"><?php _e( 'Theme Settings', 'ohio-importer' ); ?></a>
				<a href="admin.php?page=pt-one-click-demo-import" class="btn btn-flat"><?php _e( 'Demo Import', 'ohio-importer' ); ?></a>
			</div>
		</div>
	</div>
	<div class="wrap">
		<div class="clb-hub-container clb-page-container">


			<!-- WP notices here -->
            <div class="wp-header-end"></div>
			
			<div id="tabs" class="clb-nav">
				<ul class="clb-nav-inner">
					<li><a href="#tabs-1" class="selected"><?php _e( 'Demo Import', 'ohio-importer' ); ?></a></li>
					<li><a href="#tabs-2"><?php _e( 'System Status', 'ohio-importer' ); ?></a></li>
				</ul>

				<!-- Demo intro container -->
				<div class="tab-item" id="tabs-1">

					<h2 class="clb-headline"><?php _e( 'Getting Started', 'ohio-importer' ); ?></h2>

					<!-- Group 3cl -->
					<div class="clb-group clb-group">
						<div class="clb-group-headline">
							<h3><?php _e( 'About', 'ohio-importer' ); ?></h3>
							<a href="https://docs.clbthemes.com/ohio/getting-started/#setting_up" target="_blank" class="btn btn-flat"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"></path></svg><?php _e( 'View Docs', 'ohio-importer' ); ?></a>
						</div>
						<div class="clb-group-details">
							<?php _e( 'When you import the demo data, the following things will happen:', 'ohio-importer' ); ?>
						</div>
						<div class="clb-group-content">
							<?php _e( 'Demo content with posts, custom post types, pages, categories, tags, media files, local page settings and', 'ohio-importer' ); ?>&nbsp;<a target="_blank" href="./admin.php?page=ohio_hub_settings"><?php _e( 'Theme Settings', 'ohio-importer' ); ?></a>&nbsp;<?php _e( 'will get imported.', 'ohio-importer' ); ?><br> <b><?php _e( 'No existing data (e.g. posts, pages, categories, tags, media files etc.) will be replaced or modified.', 'ohio-importer' ); ?></b>
						</div>
					</div>

					<div class="o-notice warning">
						<div class="holder">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16"><path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/><path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/></svg> 
							<div>
								<strong><?php _e( 'Heads up!', 'ohio-importer' ); ?></strong>
								<a target="_blank" href="./admin.php?page=ohio_hub_settings"><?php _e( 'Theme Settings', 'ohio-importer' ); ?></a> <?php _e( 'override with each import.', 'ohio-importer' ); ?>
								<?php _e( 'Toggle', 'ohio-importer' ); ?> <b><?php _e( 'Theme Settings', 'ohio-importer' ); ?></b> <?php _e( 'checkbox in the popup to import without global options.', 'ohio-importer' ); ?>
							</div>
						</div>
					</div>
				</div>

				<!-- System status container -->
				<div class="tab-item" id="tabs-2" style="display: none;">
					<h2 class="clb-headline"><?php _e( 'System Status', 'ohio-importer' ); ?></h2>

					<!-- Group 3cl -->
					<div class="clb-group">
						<div class="clb-group-headline">
							<h3><?php _e( 'Server Environment', 'ohio-importer' ); ?></h3>
							<a href="https://docs.clbthemes.com/ohio/#requirements" target="_blank" class="btn btn-flat"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg><?php _e( 'Requirements', 'ohio-importer' ); ?></a>
						</div>
						<table class="clb-group-details clb-group-table table-col-3">
							<tbody>
								<tr>
									<td><?php _e( 'Directive', 'ohio-importer' ); ?></td>
									<td><?php _e( 'Actual Value', 'ohio-importer' ); ?></td>
									<td><?php _e( 'Required Value', 'ohio-importer' ); ?></td>
								</tr>
							</tbody>
						</table>
						<table class="clb-group-content clb-group-table table-col-3">
							<tbody>
								<tr>
									<td><?php _e( 'PHP Version:', 'ohio-importer' ); ?></td>
									<td>
										<?php
											if ( explode( ',', phpversion() )[0] >= 7 ) {
												echo phpversion();
											} else {
												echo '<mark class="no">' . phpversion() . '</mark>';
											}
										?>
									</td>
									<td>7.4.0</td>
								</tr>
								<tr>
									<td><?php _e( 'PHP Memory Limit', 'ohio-importer' ); ?> <span><?php _e( '(memory_limit):', 'ohio-importer' ); ?></span></td>
									<td>
										<?php
											if ( intval( ini_get( 'memory_limit' ) ) >= 256 ) {
												echo ini_get( 'memory_limit' );
											} else {
												echo '<mark class="no">' . ini_get( 'memory_limit' ) . '</mark>';
											}
										?>
									</td>
									<td>256M</td>
								</tr>
								<tr>
									<td><?php _e( 'PHP Time Limit', 'ohio-importer' ); ?> <span><?php _e( '(max_execution_time):', 'ohio-importer' ); ?></span></td>
									<td>
										<?php
											if ( ini_get( 'max_execution_time' ) >= 120 ) {
												echo ini_get( 'max_execution_time' );
											} else {
												echo '<mark class="no">' . ini_get( 'max_execution_time' ) . '</mark>';
												echo '<span class="error">&nbsp;';
												echo _e( '- Please adjust this value in order to meet the theme requirements.', 'ohio-importer' );
												echo '</span';
											}
										?>
									</td>
									<td>120</td>
								</tr>
								<tr>
									<td><?php _e( 'WP Max Upload Size', 'ohio-importer' ); ?> <span><?php _e( '(upload_max_filesize):', 'ohio-importer' ); ?></span></td>
									<td>
										<?php
											if ( intval( ini_get( 'upload_max_filesize' ) ) >= 16 ) {
												echo ini_get( 'upload_max_filesize' );
											} else {
												echo '<mark class="no">' . ini_get( 'upload_max_filesize' ) . '</mark>';
											}
										?>
									</td>
									<td>16M</td>
								</tr>
								<tr>
									<td><?php _e( 'File Upload Permission', 'ohio-importer' ); ?> <span><?php _e( '(file_uploads):', 'ohio-importer' ); ?></span></td>
									<td>
										<?php
											$file_uploads = is_numeric( ini_get( 'file_uploads' ) ) ? ( ini_get( 'file_uploads' ) ? 'On' : 'Off' ) : ini_get( 'file_uploads' );
											if ( $file_uploads == 'On' ) {
												echo _e( 'Available', 'ohio-importer' );
											} else {
												echo '<mark class="no">';
												echo _e( 'Disabled', 'ohio-importer' );
												echo '</mark';
											}
										?>
									</td>
									<td><?php _e( 'Available', 'ohio-importer' ); ?></td>
								</tr>
							</tbody>
						</table>
						<div class="clb-group-footer">
							<?php _e( 'Contact your hosting provider and ask them to increase the limits to a minimum of the following.', 'ohio-importer' ); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="clb-demo-holder">

				<?php
				// Display warrning if PHP safe mode is enabled, since we wont be able to change the max_execution_time.
				if ( ini_get( 'safe_mode' ) ) {
					printf(
						esc_html__( '%sWarning: your server is using %sPHP safe mode%s. This means that you might experience server timeout errors.%s', 'ohio-importer' ),
						'<div class="notice  notice-warning  is-dismissible"><p>',
						'<strong>',
						'</strong>',
						'</p></div>'
					);
				}

				// Start output buffer for displaying the plugin intro text.
				ob_start();
				?>

				<?php
				$plugin_intro_text = ob_get_clean();

				// Display the plugin intro text (can be replaced with custom text through the filter below).
				echo wp_kses_post( apply_filters( 'pt-ocdi/plugin_intro_text', $plugin_intro_text ) );
				?>


				<?php if ( empty( $this->import_files ) ) : ?>

					<div class="notice  notice-info  is-dismissible">
						<p><?php _e( 'There are no predefined import files available in this theme. Please upload the import files manually!', 'ohio-importer' ); ?></p>
					</div>

					<div class="ocdi__file-upload-container">
						<h2><?php _e( 'Manual demo files upload', 'ohio-importer' ); ?></h2>

						<div class="ocdi__file-upload">
							<h3><label for="content-file-upload"><?php _e( 'Choose a XML file for content import:', 'ohio-importer' ); ?></label></h3>
							<input id="ocdi__content-file-upload" type="file" name="content-file-upload">
						</div>

						<div class="ocdi__file-upload">
							<h3><label for="widget-file-upload"><?php _e( 'Choose a WIE or JSON file for widget import:', 'ohio-importer' ); ?></label> <span><?php _e( '(*optional)', 'ohio-importer' ); ?></span></h3>
							<input id="ocdi__widget-file-upload" type="file" name="widget-file-upload">
						</div>

						<div class="ocdi__file-upload">
							<h3><label for="customizer-file-upload"><?php _e( 'Choose a DAT file for customizer import:', 'ohio-importer' ); ?></label> <span><?php _e( '(*optional)', 'ohio-importer' ); ?></span></h3>
							<input id="ocdi__customizer-file-upload" type="file" name="customizer-file-upload">
						</div>

						<?php if ( class_exists( 'ReduxFramework' ) ) : ?>
						<div class="ocdi__file-upload">
							<h3><label for="redux-file-upload"><?php _e( 'Choose a JSON file for Redux import:', 'ohio-importer' ); ?></label> <span><?php _e( '(*optional)', 'ohio-importer' ); ?></span></h3>
							<input id="ocdi__redux-file-upload" type="file" name="redux-file-upload">
							<div>
								<label for="redux-option-name" class="ocdi__redux-option-name-label"><?php _e( 'Enter the Redux option name:', 'ohio-importer' ); ?></label>
								<input id="ocdi__redux-option-name" type="text" name="redux-option-name">
							</div>
						</div>
						<?php endif; ?>
					</div>

					<p class="ocdi__button-container">
						<button class="ocdi__button  button  button-hero  button-primary js-ocdi-import-data"><?php _e( 'Demo Import', 'ohio-importer' ); ?></button>
					</p>

				<?php elseif ( 1 === count( $this->import_files ) ) : ?>

					<div class="ocdi__demo-import-notice js-ocdi-demo-import-notice"><?php
						if ( is_array( $this->import_files ) && ! empty( $this->import_files[0]['import_notice'] ) ) {
							echo wp_kses_post( $this->import_files[0]['import_notice'] );
						}
					?></div>

					<p class="ocdi__button-container">
						<button class="ocdi__button  button  button-hero  button-primary js-ocdi-import-data"><?php _e( 'Demo Import', 'ohio-importer' ); ?></button>
					</p>

				<?php else : ?>

					<h2 class="clb-headline js-headline-templates"><?php _e( 'Templates', 'ohio-importer' ); ?></h2>

					<div class="ocdi__gl js-ocdi-gl">
					<?php
						// Prepare navigation data.
						$categories = Helpers::get_all_demo_import_categories( $this->import_files );
					?>
						<?php if ( ! empty( $categories ) ) : ?>

							<div class="clb-nav ocdi__gl-header js-ocdi-gl-header">
								<ul class="clb-nav-inner ocdi__gl-navigation">
									<li class="selected active"><a href="#all" class="ocdi__gl-navigation-link js-ocdi-nav-link"><?php _e( 'All', 'ohio-importer' ); ?></a></li>
									<?php foreach ( $categories as $key => $name ) : ?>
										<li><a href="#<?php echo esc_attr( $key ); ?>" class="ocdi__gl-navigation-link js-ocdi-nav-link"><?php echo esc_html( $name ); ?></a></li>
									<?php endforeach; ?>
								</ul>
								<div clas="clb-nav-search">
									<input type="search" class="ocdi__gl-search-input js-ocdi-gl-search" name="ocdi-gl-search" value="" placeholder="<?php _e( 'Search demos...', 'ohio-importer' ); ?>">
								</div>
							</div>

						<?php endif; ?>

						<div class="clb-group-demo ocdi__gl-item-container wp-clearfix js-ocdi-gl-item-container">

							<?php foreach ( $this->import_files as $index => $import_file ) : ?>
								<?php
									// Prepare import item display data.
									$img_src = isset( $import_file['import_preview_image_url'] ) ? $import_file['import_preview_image_url'] : '';
									// Default to the theme screenshot, if a custom preview image is not defined.
									if ( empty( $img_src ) ) {
										$theme = wp_get_theme();
										$img_src = $theme->get_screenshot();
									}
								?>
								<div class="clb-group-demo-item ocdi__gl-item js-ocdi-gl-item ocdi-card" data-categories="<?php echo esc_attr( Helpers::get_demo_import_item_categories( $import_file ) ); ?>" data-name="<?php echo esc_attr( strtolower( $import_file['import_file_name'] ) ); ?>">
									<div class="ocdi__gl-item-image-container">
										<?php if ( ! empty( $img_src ) ) : ?>
											<img class="ocdi__gl-item-image" src="<?php echo esc_url( $img_src ) ?>">
										<?php else : ?>
											<div class="ocdi__gl-item-image  ocdi__gl-item-image--no-image"><?php _e( 'No preview image.', 'ohio-importer' ); ?></div>
										<?php endif; ?>
									</div>
									<div class="clb-group-demo-item-footer ocdi__gl-item-footer">
										<h4 class="ocdi__gl-item-title"><?php echo $import_file['import_file_name']; ?></h4>

										<?php
											switch ( $import_file['import_file_name'] ) {
												case __( 'Portfolio Projects', 'ohio-importer' ):
													$local_preview = 'edit.php?post_type=ohio_portfolio';
													break;
												case __( 'All Pages', 'ohio-importer' ):
													$local_preview = 'edit.php?post_type=page';
													break;
												case __( 'Products', 'ohio-importer' ):
													$local_preview = 'edit.php?post_type=product';
													break;
												case __( 'Forms - Contact Form 7', 'ohio-importer' ):
													$local_preview = 'admin.php?page=wpcf7';
													break;
												default:
													$local_preview = 'edit.php?post_type=page';
													break;
											}
										?>
										<a
											href="<?php echo esc_url( $local_preview ); ?>"
											class="ocdi__gl-item-button btn btn-flat ocdi__local_link"
											target="_blank" style="margin-left:auto; margin-right:8px; display:none;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-circle" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.854 10.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707l-4.096 4.096z"/></svg><?php _e( 'Open', 'ohio-importer' ); ?></a>

										<?php if ( !empty( $import_file['preview_url'] ) ) : ?>
											<a
												href="<?php echo esc_url( $import_file['preview_url'] ); ?>"
												class="ocdi__gl-item-button btn btn-flat"
												target="_blank" style="margin-left:auto; margin-right:8px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-circle" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.854 10.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707l-4.096 4.096z"/></svg><?php _e( 'Open', 'ohio-importer' ); ?></a>
										<?php endif; ?>

										<?php
											if ( !empty( $import_file['import_elementor_file_url'] ) ) {
												$_import_type = 'both';
											} else {
												$_import_type = 'wpbakery';
											}
										?>
										<button
											class="ocdi__gl-item-button btn js-ocdi-gl-import-data" 
											value="<?php echo esc_attr( $index ); ?>"
											data-import-type="<?php echo $_import_type; ?>">
											<?php _e( 'Import', 'ohio-importer' ); ?>
										</button>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>

					<div id="js-ocdi-modal-content"></div>

				<?php endif; ?>

				<div class="ocdi__ajax-loader js-ocdi-ajax-loader">
					<div class="progress-line"></div>
					<h3><?php _e( 'Downloading the demo content', 'ohio-importer' ); ?></h3>
					<?php _e( 'This process may take a while on some hosts, so please be patient.', 'ohio-importer' ); ?>
				</div>
				<div class="ocdi__response js-ocdi-ajax-response"></div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<div class="clb-page-footer">
		<div class="clb-page-container">
			<div class="copyright">
				Copyright © <?php echo date("Y"); ?>, Ohio Version <?php
						$ohio_theme = wp_get_theme();
						echo $ohio_theme->get( 'Version' ) ? $ohio_theme->get( 'Version' ) : '2.0.0';
					?> by <a target="_blank" href="https://themeforest.net/user/colabrio">Colabrio</a>.
			</div>
			<div class="social-networks">
				<a target="_blank" href="https://docs.clbthemes.com/ohio/">Documentation</a>&nbsp;|&nbsp;<a target="_blank" href="https://colabrio.ticksy.com/">Help Center</a>&nbsp;|&nbsp;Follow Us -&nbsp;<a target="_blank" href="https://www.facebook.com/"><span class="dashicons dashicons-facebook"></span> Facebook</a>
			</div>
		</div>
	</div>
</div>

<?php if ( is_admin() ): ?>
<script>
	window.has_license_code = '<?php echo !empty( get_option( 'ohio_license_code', '' ) ) ? 'yep' : ''; ?>';
</script>
<?php endif; ?>