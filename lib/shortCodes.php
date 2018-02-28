<?php

function BCH_ADD_LISTING( $atts ) {
	$atts = shortcode_atts( array(
		'foo' => 'no foo',
		'baz' => 'default baz'
	), $atts, 'bartag' );
    ob_start();
    include_once BCH_PLUGIN_PATH . "templates/addListing.php";
	return ob_get_clean();
}
add_shortcode( 'BCH_ADD_LISTING', 'BCH_ADD_LISTING' );