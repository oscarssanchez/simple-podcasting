<?php
/**
 * Transcript Endpoint
 *
 * @package tenup_podcasting
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
	if ( ! empty( get_post_meta( get_the_ID(), 'podcast_transcript', true ) ) || ( has_blocks() && has_block( 'podcasting/podcast-transcript' ) ) ) {
		if ( get_query_var( 'transcript', false ) !== false ) {
			$transcript_template = locate_template( array( 'template-transcript.php' ) );
			if ( '' !== $transcript_template ) {
				return $transcript_template;
			}

			$transcript_template = PODCASTING_PATH . 'templates/template-transcript.php';
			if ( file_exists( $transcript_template ) ) {
				return $transcript_template;
			}
		}
	}
	//Fall back to default if there is no transcript
	return $template;
}

add_action( 'template_include', __NAMESPACE__ . '\transcript_template' );
