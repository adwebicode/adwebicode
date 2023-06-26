<?php
    $ohio_settings_slugs = [
        'General' => 'theme-general',
        'Typography' => 'theme-general-typography',
        'Menu' => 'theme-general-menu',
        'Header' => 'theme-general-header',
        'Page' => 'theme-general-pages',
        'Footer' => 'theme-general-footer',
        'Blog' => 'theme-general-blog',
        'Post' => 'theme-general-post',
        'Portfolio' => 'theme-general-portfolio',
        'Shop' => 'theme-general-woocommerce',
        'Product' => 'theme-general-product',
        'Custom CSS' => 'theme-general-custom',
        'Other' => 'theme-general-other',
        'Backup' => 'theme-general-backup'
    ];

	function ohio_show_sync_langs_options_button() {
		if ( ! function_exists( 'icl_get_languages' ) ) return;
		if ( empty( $_GET['lang'] ) ) return;

		$langs = icl_get_languages('skip_missing=0&orderby=KEY&order=DIR&link_empty_to=str');
		$default_lang = get_option( 'icl_sitepress_settings' )['default_language'];

		if ( in_array( ICL_LANGUAGE_CODE, [$default_lang, 'all'] ) ) return;

		?>
        <div id="sync-languages-action" lang-code="<?php echo esc_attr(ICL_LANGUAGE_CODE); ?>" class="button-publish-holder" style="margin-right:16px">
            <button class="button button-publish button-primary" style="background:transparent;color:#3D84FC">
				<?php echo __( 'Copy main language settings to', 'ohio-extra' ) . ' ' . $langs[ICL_LANGUAGE_CODE]['translated_name']; ?>
            </button>
        </div>
		<?php
	}
?>

<div class="clb-hub clb-page">
    <div class="clb-hub-intro">
        <div class="clb-hub-container">
            <div class="details">
                <i class="details-icon"></i>
                <h1><?php _e( 'Theme Settings', 'ohio-extra' ); ?></h1>
            </div>
            <div class="mode-switcher-holder">
                <?php ohio_show_sync_langs_options_button(); ?>
                <div class="mode-switcher">
                    <a href="admin.php?page=ohio_hub" class="btn btn-outline"><?php _e( 'Dashboard', 'ohio-extra' ); ?></a>
                    <a href="admin.php?page=ohio_hub_settings" class="btn btn-flat"><?php _e( 'Theme Settings', 'ohio-extra' ); ?></a>
                </div>
                <div id="fake-publishing-action" class="button-publish-holder">
                    <button class="btn button-publish">
                        <?php _e( 'Update', 'ohio-extra' ); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>

<?php
    $options_slug = !empty( $_GET['options_page'] ) ? $_GET['options_page'] : 'theme-general';

    if ( !function_exists( 'acf_get_options_page' ) ) {
        include 'parts/settings/acf-disabled-alert.php';
        return;
    }

    $page = acf_get_options_page( $options_slug );
    $post_id = acf_get_valid_post_id( $page['post_id'] );
?>
    <div class="wrap">
        <div class="clb-hub-container clb-page-container">


            <!-- WP notices here -->
            <div class="wp-header-end"></div>
            
            <div class="clb-nav">
                <ul class="clb-nav-inner">
                    <?php foreach( $ohio_settings_slugs as $slug_key => $slug ): ?>
                    <li>
                        <a <?php if ( $options_slug == $slug ) { echo 'class="selected"'; } ?> 
                            href="admin.php?page=ohio_hub_settings&options_page=<?php echo $slug; ?>">
                            <?php echo $slug_key; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="clb-hub-container clb-page-container">
            <div class="acf-settings-wrap">
                <form id="post" method="post" name="post">
                    <?php 
                        acf_form_data( [
                            'screen' => 'options',
                            'post_id' => $post_id,
                        ] );

                        wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false );
                        wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false );
                    ?>

                    <div id="poststuff" class="poststuff">
                        <div id="post-body" class="metabox-holder columns-1">
                            <div id="postbox-container-1" class="postbox-container" style="display: none;">
                                <div id="major-publishing-actions">
                                    <div id="publishing-action">
                                        <span class="spinner"></span>
                                        <input type="submit" accesskey="p" value="Update" class="button button-primary button-large" id="publish" name="publish">
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div id="postbox-container-2" class="postbox-container">
                                <style>
                                    .inside {
                                        visibility: hidden;
                                        opacity: 0;
                                    }
                                </style>
                                <?php do_meta_boxes( 'acf_options_page', 'normal', null ); ?>
                            </div>
                        </div>
                        <br class="clear">
                    </div>
                </form>
            </div>

            <?php if ( $options_slug === $ohio_settings_slugs['Backup'] ) : ?>
                <div class="backup-group">
                    <div class="clb-group clb-group-backup">
                        <div class="clb-group-headline">
                            <h3><?php _e( 'Export Settings', 'ohio-extra' ); ?></h3>
                        </div>
                        <div class="clb-group-details">
                            <?php _e( 'Export and save the JSON file with your current Theme Settings. In that case, you will be able to import and restore Theme Settings later if needed.', 'ohio-extra' ); ?>
                        </div>
                        <div class="clb-group-content">
                            <div class="settings-backup">
                                <a id="export_theme_settings" href="#" class="btn btn-flat"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16"><path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z"/><path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/></svg> <?php _e( 'Export Settings', 'ohio-extra' ); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="clb-group clb-group-backup">
                        <div class="clb-group-headline">
                            <h3><?php _e( 'Import Settings', 'ohio-extra' ); ?></h3>
                        </div>
                        <div class="clb-group-details">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16"><path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"></path><path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"></path></svg>
                            <strong><?php _e( 'Warning!', 'ohio-extra' ); ?></strong> <?php _e( 'The import process will override all your existing Theme Settings, please proceed with caution.', 'ohio-extra' ); ?>
                        </div>
                        <div class="clb-group-content">
                            <div class="settings-backup">
                                <form id="import_theme_settings">
                                    <input id="settings_import_file" hidden accept=".json" name="settings" type="file" />
                                    <a id="settings_import_file_trigger" class="btn btn-flat"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16"><path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/><path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/></svg><?php _e( 'Import Settings', 'ohio-extra' ); ?></a>
                                    <button id="settings_import_submit" type="submit"  style="display: none;" class="btn btn-flat"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16"><path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/><path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/></svg><?php _e( 'Import', 'ohio-extra' ); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="clb-group clb-group-backup">
                        <div class="clb-group-headline">
                            <h3><?php _e( 'Reset Settings', 'ohio-extra' ); ?></h3>
                        </div>
                        <div class="clb-group-details">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16"><path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"></path><path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"></path></svg>
                            <strong><?php _e( 'Warning!', 'ohio-extra' ); ?></strong> <?php _e( 'This will override all your existing Theme Settings, please proceed with caution.', 'ohio-extra' ); ?>
                        </div>
                        <div class="clb-group-content">
                            <div class="settings-backup">
                                <a id="reset_theme_settings" href="#" class="btn btn-outline"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg> <?php _e( 'Reset Settings to Defaults', 'ohio-extra' ); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php include 'parts/footer.php'; ?>
</div>