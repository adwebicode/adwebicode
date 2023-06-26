<?php
/*
    Breadcrumbs custom styles
    
    Table of contents: (use search)
    # 1. Variables
    # 2. Breadcrumbs typo
*/

# 1. Variables
$breadcrumbs_text_typo = OhioOptions::get( 'page_breadcrumbs_text_typo' );

# 2. Breadcrumbs typo
if ( $breadcrumbs_text_typo ) {
    $breadcrumbs_text_typo_css = OhioHelper::parse_acf_typo_to_css( $breadcrumbs_text_typo );

    if ( $breadcrumbs_text_typo_css ) {
        $_selector = [
            '.breadcrumb',
            '.filter-holder',
            '.filter-holder select'
        ];
        $_css = $breadcrumbs_text_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}