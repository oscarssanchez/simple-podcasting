<?php
/**
 * Transcript Endpoint
 *
 * @package tenup_podcasting\endpoints
 */

namespace tenup_podcasting;

/**
 * Adds and endpoint for transcript displaying
 *
 */
function add_transcript_endpoint() {
	add_rewrite_endpoint( 'transcript', EP_PERMALINK );
}

add_action( 'init', __NAMESPACE__ . '\add_transcript_endpoint' );

/**
 * Returns the template for transcript display
 *
 * @param $template
 * @return mixed
 *
 */
function transcript_template( $template ) {

	if ( get_query_var( 'transcript', false ) !== false ) {
		echo 'test';
	}

	//Fall back to original template
	return $template;

}

add_action( 'template_include', __NAMESPACE__ . '\transcript_template' );
