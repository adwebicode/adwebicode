<?php

$show_cursor = OhioOptions::get_global( 'page_custom_cursor', false );
?>

<?php if ( $show_cursor ) : ?>
    <div class="circle-cursor circle-cursor-outer"></div>
    <div class="circle-cursor circle-cursor-inner">
        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.06055 0H20.0605V18H17.0605V5.12155L2.12132 20.0608L0 17.9395L14.9395 3H2.06055V0Z"/>
        </svg>
    </div>
<?php endif; ?>
