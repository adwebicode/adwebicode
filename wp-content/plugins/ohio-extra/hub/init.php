<?php

add_action( 'admin_menu', 'register_ohio_hub_page' );
function register_ohio_hub_page() {
    add_menu_page(
        'Ohio Theme',
        'Ohio Theme', // side menu title
        'edit_others_posts',
        'ohio_hub',
        false,
        get_template_directory_uri() . '/inc/tgmpa/theme_settings.png', // icon
        2 // order
    );
}

add_filter( 'option_page_capability_ohio_hub', 'ohio_hub_capability' );
function ohio_hub_capability( $capability ) {
    return 'edit_others_posts';
}

/**
 * Subpages
 */

// Dashboard
add_action( 'admin_menu', 'register_ohio_hub_subpage_dashboard' );
function register_ohio_hub_subpage_dashboard() {
    add_submenu_page( 'ohio_hub', 'Help page', 'Dashboard ', 'edit_others_posts', 'ohio_hub', 'ohio_hub_dashboard_page' );
}
function ohio_hub_dashboard_page() {
    include 'pages/dashboard-page.php';
}

// Settings
add_action( 'admin_menu', 'register_ohio_hub_subpage_settings' );
function register_ohio_hub_subpage_settings() {
    add_submenu_page( 'ohio_hub', 'Help page', 'Theme Settings', 'edit_others_posts', 'ohio_hub_settings', 'ohio_hub_settings_page' ); 
}
function ohio_hub_settings_page() {
    include 'pages/settings-page.php';
}

// AJAX license registration and removing
add_action( 'wp_ajax_ohio_save_license_code', 'ohio_save_license_code' );
function ohio_save_license_code() {
    $data = str_replace('\"', '"', $_POST['license'] );
    $data = json_decode($data);

    if (!$data) return false;

    if ( !empty( $data->code ) && !empty( $data->sold_at ) && !empty( $data->supported_until ) ) {
        add_option( 'ohio_license_code', $data->code );
        add_option( 'ohio_license_sold_at', $data->sold_at );

        $timestamp = (new \DateTime( $data->supported_until ))->getTimestamp();
        add_option( 'ohio_license_support_until', $timestamp );

        if ( !empty( $data->type ) ) {
            add_option( 'ohio_license_type', $data->type );
        }
    }

    wp_die();
}

add_action( 'wp_ajax_ohio_remove_license_code', 'ohio_remove_license_code' );
function ohio_remove_license_code() {
    $response = wp_remote_post( 'https://demo.clbthemes.com/v1/deregister', [
        'timeout' => 15,
        'redirection' => 15,
        'httpversion' => '1.0',
        'blocking' => true,
        'headers' => [
            'X-COLABRIO-REFERER' => 'https://' . $_SERVER['HTTP_HOST']
        ],
        'cookies' => [],
        'body' => [
            'code' => get_option( 'ohio_license_code', '' )
        ],
    ] );

    if ( !is_wp_error( $response ) && $response['body'] == 'OK' ) {
        delete_option( 'ohio_license_code' );
        delete_option( 'ohio_license_sold_at' );
        delete_option( 'ohio_license_support_until' );
        delete_option( 'ohio_license_type' );
    } else {
        // error_log(json_encode($response['body']));
    }

    wp_die();
}

add_action( 'wp_ajax_ohio_check_last_version', 'ohio_check_last_version' );
function ohio_check_last_version() {
    $ohio_theme = wp_get_theme( get_template() );
    $current = $ohio_theme->get( 'Version' ) ? $ohio_theme->get( 'Version' ) : '3.0.0';
    $response = wp_remote_get( 'https://demo.clbthemes.com/v1/version/ohio' );
    $actual = wp_remote_retrieve_body( $response );

    echo json_encode([
        'current' => $current,
        'actual' => $actual
    ]);

    update_option( 'ohio_last_available_version', $actual );

    wp_die();
}

/* Sync other languages */
add_action( 'wp_ajax_ohio_sync_settings_with_main_lang', 'ohio_sync_settings_with_main_lang' );
function ohio_sync_settings_with_main_lang() {
    $current_lang = $_POST['current_lang'];
    if ( ! $current_lang) wp_die();

    function ohio_mock_acf_post_id($post_id) {
        return 'options';
    }

    add_filter('acf/validate_post_id', 'ohio_mock_acf_post_id');
    $options = get_field_objects('options');

    $values = [];
    foreach ( $options as $field ) {
        $values[$field['name']] = get_field( $field['name'], 'options', false );
    }

    remove_filter('acf/validate_post_id', 'ohio_mock_acf_post_id');
    foreach ($values as $key => $value) {
        update_field( $key, $value, 'options_' . $current_lang );
    }

    wp_die('OK');
}

// License message
add_action( 'admin_notices', 'ohio_hub_license_notice' );
function ohio_hub_license_notice() {
    if ( ! get_option( 'ohio_license_code', '' ) ): ?>
    <div class="notice o-notice activation warning">
        <div class="holder">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16"><path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/><path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/></svg> 
            <div>
                <strong><?php _e( 'License activation is required.', 'ohio-extra' ); ?></strong> <?php _e( 'Activate your license to be able to use all the built-in features.', 'ohio-extra' ); ?>
            </div>
        </div>
        <div class="holder">
            <a class="btn" href="admin.php?page=ohio_hub"><?php _e( 'Connect & Activate', 'ohio-extra' ); ?></a>&nbsp;&nbsp;<?php _e( 'or', 'ohio-extra' ); ?>&nbsp;&nbsp;<a class="btn btn-flat" target="_blank" href="https://1.envato.market/5Q25j"><?php _e( 'Buy License', 'ohio-extra' ); ?></a>
        </div>
    </div>
    <?php endif;
}

add_action( 'admin_notices', 'ohio_hub_save_settings_notice');
function ohio_hub_save_settings_notice() {
    ?>
    <div class="notice o-notice o-notice-settings success notice-success is-dismissible">
        <?php _e( 'Theme Settings have been successfully updated.', 'ohio-extra' ); ?>
    </div>
    <div class="notice o-notice o-notice-settings error notice-error is-dismissible">
        <?php _e( 'Something went wrong.', 'ohio-extra' ); ?>
    </div>
    <?php
}

function ohio_export_theme_settings() {
    global $wpdb;

    $options = $wpdb->get_results( 'SELECT option_name, option_value FROM ' . $wpdb->options .' WHERE option_name LIKE "%options_global%" AND option_name NOT LIKE "%_google_maps_api_key"' );

    echo json_encode( $options );
    wp_die();
}

add_action( 'wp_ajax_ohio_export_theme_settings', 'ohio_export_theme_settings' );

function ohio_import_theme_settings() {
    global $wpdb;

    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $settings = json_decode( file_get_contents($_FILES['settings']['tmp_name']) );
    if ( ! empty( $settings ) ) {
        $options_table = $wpdb->prefix . 'options';
        foreach ($settings as $key => $value) {
            if ( ! empty($value->option_name) && ! empty ($value->option_value)) {
                $exists = $wpdb->get_var( $wpdb->prepare('SELECT COUNT(*) FROM ' . $options_table . ' WHERE option_name = %s', $value->option_name ) );
                if ( $exists ) {
                    $wpdb->update( $options_table, ['option_value' => $value->option_value], ['option_name' => $value->option_name], ['%s'] );
                } else {
                    $wpdb->insert( $options_table, ['option_value' => $value->option_value, 'option_name' => $value->option_name, 'autoload' => 'no'], ['%s', '%s', '%s'] );
                }
            }
        }
    }

    wp_die();
}

add_action( 'wp_ajax_ohio_import_theme_settings', 'ohio_import_theme_settings' );

function ohio_reset_theme_settings() {
    global $wpdb;

    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $options_table = $wpdb->prefix . 'options';
    $wpdb->query('DELETE FROM ' . $options_table . ' WHERE option_name LIKE "%options_global%"');

    wp_die();
}

add_action( 'wp_ajax_ohio_reset_theme_settings', 'ohio_reset_theme_settings');

include 'ohio-options-pages-class.php';
