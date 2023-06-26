<!-- Footer -->
<div class="clb-page-footer">
    <div class="clb-page-container">
        <div class="copyright">
            <?php _e( 'Copyright ©', 'ohio-extra' ); ?> <?php echo date("Y"); ?>, <?php _e( 'Ohio Version', 'ohio-extra' ); ?> <?php
                    $ohio_theme = wp_get_theme( get_template() );
                    $ohio_version = $ohio_theme->get( 'Version' ) ? $ohio_theme->get( 'Version' ) : '3.0.0';
                    echo $ohio_version;
                ?> <?php _e( 'by', 'ohio-extra' ); ?> <a target="_blank" href="https://themeforest.net/user/colabrio"><?php _e( 'Colabrio', 'ohio-extra' ); ?></a>.
        </div>
        <div class="social-networks">
            <a target="_blank" href="https://docs.clbthemes.com/ohio/"><?php _e( 'Documentation', 'ohio-extra' ); ?></a>&nbsp;|&nbsp;<a target="_blank" href="https://colabrio.ticksy.com/"><?php _e( 'Help Center', 'ohio-extra' ); ?></a>&nbsp;|&nbsp;<?php _e( 'Follow Us', 'ohio-extra' ); ?> -&nbsp;<a target="_blank" href="https://www.facebook.com/"><span class="dashicons dashicons-facebook"></span> <?php _e( 'Facebook', 'ohio-extra' ); ?></a>
        </div>  
    </div>
</div>
