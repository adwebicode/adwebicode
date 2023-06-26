<?php
/*
	Blog custom style
	
	Table of contents: (use search)
	# 1. Variables
	# 2. Contained layout background
*/

# 1. Variables
$posts_card_background = OhioOptions::get( 'posts_card_background_color', null, false, true );

# 2. Contained layout background
if ( $posts_card_background ) {
	$_selector = [
		'.blog-item:not(.-layout2).-contained .card-details'
	];
	$_css = 'background-color:' . $posts_card_background . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}