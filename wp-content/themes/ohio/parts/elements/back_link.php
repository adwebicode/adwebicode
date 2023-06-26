<?php
/**
 * Ohio WordPress Theme
 *
 * Back link template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get theme options
$previous_btn_text = OhioOptions::get( 'page_header_previous_button_text', esc_html__( 'Back', 'ohio' ), null, true );

?>

<a href="<?php echo wp_get_referer(); ?>" class="back-link -unlink vc_hidden-md vc_hidden-sm vc_hidden-xs">
    <button class="icon-button" aria-controls="site-navigation" aria-expanded="false">
	    <i class="icon">
	    	<svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"></path></svg>
	    	<svg class="minimal" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 7.58579 0.335786 7.25 0.75 7.25H17.25C17.6642 7.25 18 7.58579 18 8C18 8.41421 17.6642 8.75 17.25 8.75H0.75C0.335786 8.75 0 8.41421 0 8Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 0.71967C10.2626 0.426777 10.7374 0.426777 11.0303 0.71967L17.7803 7.46967C18.0732 7.76256 18.0732 8.23744 17.7803 8.53033L11.0303 15.2803C10.7374 15.5732 10.2626 15.5732 9.96967 15.2803C9.67678 14.9874 9.67678 14.5126 9.96967 14.2197L16.1893 8L9.96967 1.78033C9.67678 1.48744 9.67678 1.01256 9.96967 0.71967Z"></path></svg>
	    </i>
	</button>
    <span class="caption">
        <?php echo esc_html( $previous_btn_text); ?>
    </span>
</a>