<?php
/*
	Typography custom styles

	Table of contents: (use search)
	# 1. Variables
	# 2. Styles
	# 3. View
*/

# 1. Variables

$title_typo = false;
$title_responsive_h1_size = false;
$title_responsive_h2_size = false;
$title_responsive_h3_size = false;
$title_responsive_h4_size = false;
$title_responsive_h5_size = false;
$title_responsive_h6_size = false;
$subtitle_typo = false;
$subtitle_responsive_sizes = false;
$text_typo = false;
$text_responsive_sizes = false;
$post_title_typo = false;
$post_text_typo = false;
$subcribe_popup_title_typo = false;
$subcribe_popup_description_typo = false;
$subscribe_background_color = false;


# 2. Paragraph typography

OhioOptions::get( 'page_typography_settings' ); // trigger select chain
$typography_settings_select_type = OhioOptions::get_last_select_type();

$text_typo = OhioOptions::get_global( 'page_text_typo' );

# 2.1. Paragraph responsive typography

$_text_font_sizes_raw = OhioOptions::get_global( 'page_paragraphs_font_sizes' );
$text_responsive_sizes = OhioHelper::parse_responsive_font_sizes( $_text_font_sizes_raw );

# 2.2. Post text typography

if ( OhioSettings::page_is( 'single' ) ) {
	if ( in_array( $typography_settings_select_type, array( 'local', 'post' ) ) ) {
		$post_text_typo = OhioOptions::get_by_type( 'page_text_typo', $typography_settings_select_type );
	}
}

# 3. Headings typography

$title_typo = OhioOptions::get_global( 'page_headings_typo' );

$title_typo_h1 = OhioOptions::get_global( 'page_headings_typo_h1' );

$title_typo_h2 = OhioOptions::get_global( 'page_headings_typo_h2' );

$title_typo_h3 = OhioOptions::get_global( 'page_headings_typo_h3' );

$title_typo_h4 = OhioOptions::get_global( 'page_headings_typo_h4' );

$title_typo_h5 = OhioOptions::get_global( 'page_headings_typo_h5' );

$title_typo_h6 = OhioOptions::get_global( 'page_headings_typo_h6' );

# 3.1 Heading H1 responsive typography

$title_responsive_h1_sizes = OhioHelper::parse_responsive_font_sizes( OhioOptions::get_global( 'page_titles_h1_font_sizes' ) );

# 3.2 Heading H2 responsive typography

$title_responsive_h2_sizes = OhioHelper::parse_responsive_font_sizes( OhioOptions::get_global( 'page_titles_h2_font_sizes' ) );

# 3.3 Heading H3 responsive typography

$title_responsive_h3_sizes = OhioHelper::parse_responsive_font_sizes( OhioOptions::get_global( 'page_titles_h3_font_sizes' ) );

# 3.4 Heading H4 responsive typography

$title_responsive_h4_sizes = OhioHelper::parse_responsive_font_sizes( OhioOptions::get_global( 'page_titles_h4_font_sizes' ) );

# 3.5 Heading H5 responsive typography

$title_responsive_h5_sizes = OhioHelper::parse_responsive_font_sizes( OhioOptions::get_global( 'page_titles_h5_font_sizes' ) );

# 3.6 Heading H6 responsive typography

$title_responsive_h6_sizes = OhioHelper::parse_responsive_font_sizes( OhioOptions::get_global( 'page_titles_h6_font_sizes' ) );

# 3.7. Post title typography

if ( OhioSettings::page_is( 'single' ) ) {
	if ( in_array( $typography_settings_select_type, array( 'local', 'post' ) )  ) {
		$post_title_typo = OhioOptions::get_by_type( 'page_header_title_typo', $typography_settings_select_type );
	}
}

# 4. Subtitle typography

$subtitle_typo = OhioOptions::get_global( 'page_subtitles_typo' );

# 4.1. Subtitle responsive typography

$_subtitle_font_sizes_raw = OhioOptions::get_global( 'page_subtitles_font_sizes' );
$subtitle_responsive_sizes = OhioHelper::parse_responsive_font_sizes( $_subtitle_font_sizes_raw );

# 5. View

// Global settings
/* Texts */

$_selector = [
	'body'
];
$_responsive_selector = $_selector;
$_css = OhioHelper::parse_acf_typo_to_css( $text_typo );
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

$_selector = [
	// 'input',
	// 'select',
	// 'textarea',
	// '.accordion-box .buttons h5.title',
	// '.woocommerce div.product accordion-box.outline h5'
];

$_responsive_selector = array_merge( $_responsive_selector, $_selector );
$_css = OhioHelper::parse_acf_typo_to_css( $title_typo, ['rule' => 'exclude', 'fields' => ['font-size', 'color']] );
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

if ( $text_responsive_sizes ) {
	$_responsive_selectors = implode( ',', $_responsive_selector );
	$_responsive_css = OhioHelper::get_all_responsive_font_css( $text_responsive_sizes, $_responsive_selectors );
	OhioBuffer::append_to_dynamic_css_buffer( $_responsive_css );
}

/* Headings */
$_selector = [
	'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
	'.box-count',
	'.titles-typo',
	'.hamburger-nav .menu',
	'.btn, .button:not(.-reset-color), a.button:not(.-reset-color), input[type="submit"], a.btn-link',
	'.widget_shopping_cart_content .mini-cart-description .mini-cart-item-title > a',
	'.woo-c_product_name > a:not(.woo-c_product_category)',
	'.socialbar.inline a',
	'.vc_row .vc-bg-side-text',
	'.counter-box-count'
];

$_responsive_selector = $_selector;
$_css = OhioHelper::parse_acf_typo_to_css( $title_typo );
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

$_selector = [
	'h1',
];

$_responsive_selector = $_selector;
$_css = OhioHelper::parse_acf_typo_to_css( $title_typo_h1 );
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

$_selector = [
	'h2',
];

$_responsive_selector = $_selector;
$_css = OhioHelper::parse_acf_typo_to_css( $title_typo_h2 );
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

$_selector = [
	'h3',
];

$_responsive_selector = $_selector;
$_css = OhioHelper::parse_acf_typo_to_css( $title_typo_h3 );
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

$_selector = [
	'h4',
];

$_responsive_selector = $_selector;
$_css = OhioHelper::parse_acf_typo_to_css( $title_typo_h4 );
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

$_selector = [
	'h5',
];

$_responsive_selector = $_selector;
$_css = OhioHelper::parse_acf_typo_to_css( $title_typo_h5 );
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

$_selector = [
	'h6',
];

$_responsive_selector = $_selector;
$_css = OhioHelper::parse_acf_typo_to_css( $title_typo_h6 );
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

$_selector = [
	'.countdown-box .box-time .box-count',
	'.chart-box-pie-content'
];
$_responsive_selector = array_merge( $_responsive_selector, $_selector );
$_css = OhioHelper::parse_acf_typo_to_css( $title_typo, ['rule' => 'exclude', 'fields' => ['line-height']] );
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

$_selector = [
	'.countdown-box .box-time .box-count',
	'.chart-box-pie-content'
];

$_responsive_selector = array_merge( $_responsive_selector, $_selector );
$_css = OhioHelper::parse_acf_typo_to_css( $title_typo, ['rule' => 'exclude', 'fields' => ['line-height']] );
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

$_css = OhioHelper::parse_acf_typo_to_css( $title_typo, ['rule' => 'include', 'fields' => ['font-family']] );
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

$_selector = [
	'.portfolio-item h4',
	'.portfolio-item h4.title',
	'.portfolio-item h4 a'
];

$_css = OhioHelper::parse_acf_typo_to_css( $title_typo, array( 'rule' => 'exclude', 'fields' => array( 'font-size', 'line-height' ) ) );
if ( $_css ) {
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

$_selector = '.blog-item h3.title';
$_css = OhioHelper::parse_acf_typo_to_css( $title_typo, ['rule' => 'exclude', 'fields' => ['font-size', 'line-height']] );
if ( $_css ) {
	$_css .= 'line-height:initial;';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

	OhioBuffer::pack_dynamic_css_to_buffer( '.blog-item h3.title a', 'font-size:initial;' );
}

// Responsive headings
if ( $title_responsive_h1_sizes ) {
	$_responsive_css = OhioHelper::get_all_responsive_font_css( $title_responsive_h1_sizes, 'h1' );
	OhioBuffer::append_to_dynamic_css_buffer( $_responsive_css );
}
if ( $title_responsive_h2_sizes ) {
	$_responsive_css = OhioHelper::get_all_responsive_font_css( $title_responsive_h2_sizes, 'h2' );
	OhioBuffer::append_to_dynamic_css_buffer( $_responsive_css );
}
if ( $title_responsive_h3_sizes ) {
	$_responsive_css = OhioHelper::get_all_responsive_font_css( $title_responsive_h3_sizes, 'h3' );
	OhioBuffer::append_to_dynamic_css_buffer( $_responsive_css );
}
if ( $title_responsive_h4_sizes ) {
	$_responsive_css = OhioHelper::get_all_responsive_font_css( $title_responsive_h4_sizes, 'h4' );
	OhioBuffer::append_to_dynamic_css_buffer( $_responsive_css );
}
if ( $title_responsive_h5_sizes ) {
	$_responsive_css = OhioHelper::get_all_responsive_font_css( $title_responsive_h5_sizes, 'h5' );
	OhioBuffer::append_to_dynamic_css_buffer( $_responsive_css );
}
if ( $title_responsive_h6_sizes ) {
	$_responsive_css = OhioHelper::get_all_responsive_font_css( $title_responsive_h6_sizes, 'h6' );
	OhioBuffer::append_to_dynamic_css_buffer( $_responsive_css );
}

/* Subheadings */
$_selector = [
	'p.subtitle',
	'.subtitle-font',
	'.heading .subtitle'
];

$_responsive_selector = $_selector;
$_css = OhioHelper::parse_acf_typo_to_css( $subtitle_typo );

if ( $_css ) {
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

$_css = OhioHelper::parse_acf_typo_to_css( $subtitle_typo, ['rule' => 'exclude', 'fields' => ['font-size', 'line-height']] );
OhioBuffer::pack_dynamic_css_to_buffer( [], $_css );

$_selector = [
	'.portfolio-item .subtitle-font',
	'.woocommerce ul.products li.product .subtitle-font.category',
	'.woocommerce ul.products li.product .subtitle-font.category > a'
];
$_css = OhioHelper::parse_acf_typo_to_css( $subtitle_typo, array( 'rule' => 'exclude', 'fields' => array( 'font-size', 'line-height' ) ) );
if ( $_css ) {
	$_css .= 'font-size:inherit;';
	$_css .= 'line-height:inherit;';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

$_selector = [
	'.contact-form.classic input::-webkit-input-placeholder',
	'.contact-form.classic textarea::-webkit-input-placeholder',
	'input.classic::-webkit-input-placeholder',
	'input.classic::-moz-placeholder'
];

$_responsive_selector = array_merge( $_responsive_selector, $_selector );
$_css = OhioHelper::parse_acf_typo_to_css( $subtitle_typo );
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

	// Moz placehoder
$_selector = [
	'.contact-form.classic input::-moz-placeholder',
	'.contact-form.classic textarea::-moz-placeholder'
];
$_css = OhioHelper::parse_acf_typo_to_css( $subtitle_typo );
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

	// MS placeholder
$_selector = [
	'input.classic:-ms-input-placeholder',
	'.contact-form.classic input:-ms-input-placeholder',
	'.contact-form.classic textarea:-ms-input-placeholder'
];

$_css = OhioHelper::parse_acf_typo_to_css( $subtitle_typo );
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

if ( $subtitle_responsive_sizes ) {
	$_responsive_selectors = implode( ',', $_responsive_selector );
	$_responsive_css = OhioHelper::get_all_responsive_font_css( $subtitle_responsive_sizes, $_responsive_selectors );
	OhioBuffer::append_to_dynamic_css_buffer( $_responsive_css );
}

// Post text
if ( OhioHelper::parse_acf_typo_to_css( $post_text_typo ) ) {
	$_selector = '.page-headline .subtitle';
	$_css = OhioHelper::parse_acf_typo_to_css( $post_text_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

// Post headings
if ( OhioHelper::parse_acf_typo_to_css( $post_title_typo ) ) {
	$_selector = [
		'#main .post .entry-content h1.page-title',
		'#main .post .entry-content h2.page-title',
		'#main .post .entry-content h3.page-title',
		'#main .post .entry-content h4.page-title',
		'#main .post .entry-content h5.page-title'
	];
	$_css = OhioHelper::parse_acf_typo_to_css( $post_title_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

// posts title typo
if ( OhioOptions::get_global( 'posts_title_typo' ) ) {
    $posts_title_typo_css = OhioHelper::parse_acf_typo_to_css( OhioOptions::get_global( 'posts_title_typo' ) );

	if ( $posts_title_typo_css ) {
		$_selector = '.blog-item .title a';
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $posts_title_typo_css );
    }
}

// posts content typo
if ( OhioOptions::get_global( 'posts_content_typo' ) ) {
    $posts_content_typo_css = OhioHelper::parse_acf_typo_to_css( OhioOptions::get_global( 'posts_content_typo' ) );
    if ( $posts_content_typo_css ) {
		$_selector = '.blog-item p';
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $posts_content_typo_css );
    }
}

// posts read more button typo
if ( OhioOptions::get_global( 'posts_readmore_typo' ) ) {
    $posts_readmore_typo_css = OhioHelper::parse_acf_typo_to_css( OhioOptions::get_global( 'posts_readmore_typo' ) );

	if ( $posts_readmore_typo_css ) {
		$_selector = '.blog-item .button';
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $posts_readmore_typo_css );
    }
}

// posts category typo
if ( OhioOptions::get_global( 'posts_category_typo' ) ) {
    $posts_category_typo_css = OhioHelper::parse_acf_typo_to_css( OhioOptions::get_global( 'posts_category_typo' ) );

	if ( $posts_category_typo_css ) {
		$_selector = '.blog-item .category-holder';
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $posts_category_typo_css );
    }
}

// posts author typo
if ( OhioOptions::get_global( 'posts_author_typo' ) ) {
    $posts_author_typo_css = OhioHelper::parse_acf_typo_to_css( OhioOptions::get_global( 'posts_author_typo' ) );

	if ( $posts_author_typo_css ) {
		$_selector = '.blog-item .meta-holder';
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $posts_author_typo_css );
    }
}

// posts date typo
if ( OhioOptions::get_global( 'posts_date_typo' ) ) {
    $posts_date_typo_css = OhioHelper::parse_acf_typo_to_css( OhioOptions::get_global( 'posts_date_typo' ) );

	if ( $posts_date_typo_css ) {
		$_selector = '.blog-item .date';
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $posts_date_typo_css );
    }
}

// reading time typo
if ( $reading_time_typo = OhioOptions::get_global( 'posts_reading_time_typo' ) ) {
	$reading_time_css = OhioHelper::parse_acf_typo_to_css( $reading_time_typo );
	if ( $reading_time_css ) {
		$_selector = '.blog-item .post-meta-estimate';
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $reading_time_css );
	}
}

// Social Networks Typo

if ( $social_networks_typo = OhioOptions::get( 'page_social_networks_typo' ) ) {
	$social_networks_css = OhioHelper::parse_acf_typo_to_css( $social_networks_typo );
	if ( $social_networks_css ) {
		$_selector = '.social-bar .titles-typo';
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $social_networks_css );	
	}
}

# 8. Project Page Typography

## 8.1 Categories

if ( $project_category_typo = OhioOptions::get( 'project_category_typography' ) ) {
	$project_category_css = OhioHelper::parse_acf_typo_to_css( $project_category_typo );
	if ( $project_category_css ) {
		$_selector = '.project .category-holder .category';
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $project_category_css );
	}
}

## 8.2 Date

if ( $project_date_typo = OhioOptions::get( 'project_date_typography' ) ) {
	$project_date_css = OhioHelper::parse_acf_typo_to_css( $project_date_typo );
	if ( $project_date_css ) {
		$_selector = '.project span.date';
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $project_date_css );
	}
}

## 8.3 Headline

if ( $project_title_typo = OhioOptions::get( 'project_title_typography' ) ) {
	$project_title_css = OhioHelper::parse_acf_typo_to_css( $project_title_typo );
	if ( $project_title_css ) {
		$_selector = '.project[class*="-layout"] .headline';
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $project_title_css );
	}
}

## 8.4 Description

if ( $project_description_typo = OhioOptions::get( 'project_description_typography' ) ) {
	$project_description_css = OhioHelper::parse_acf_typo_to_css( $project_description_typo );
	if ( $project_description_css ) {
		$_selector = '.project .project-details';
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $project_description_css );
	}
}

## 8.5 Meta

if ( $project_details_typo = OhioOptions::get( 'project_details_typography' ) ) {
	$project_details_css = OhioHelper::parse_acf_typo_to_css( $project_details_typo );
	if ( $project_details_css ) {
		$_selector = [
			'.project .options-group',
			'.project .options-group .title'
		];
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $project_details_css );
	}
}

## 8.6 CTA Button

if ( $project_link_typo = OhioOptions::get( 'project_link_typography' ) ) {
	$project_link_css = OhioHelper::parse_acf_typo_to_css( $project_link_typo );
	if ( $project_link_css ) {
		$_selector = '.project[class*="-layout"] .project-content .button:not(:hover)';
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $project_link_css );
	}
}

if ( $project_task_typo = OhioOptions::get( 'project_task_typography' ) ) {
	$project_task_css = OhioHelper::parse_acf_typo_to_css( $project_task_typo );
	if ( $project_task_css ) {
		$_selector = [
			'.project-page .project-task',
			'.project-page .project-task h6'
		];
		OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $project_task_css );
	}
}