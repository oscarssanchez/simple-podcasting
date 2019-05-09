/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const {
	registerBlockType,
} = wp.blocks;

/**
 * Register example block
 */

registerBlockType(
	'podcasting/podcast-transcript',
	{
		title: __( 'Podcast Transcript1', 'simple-podcasting' ),
		category: 'common',
		icon: 'wordpress-alt',
		supports: { html: false },
		keywords: [ __( 'Transcript', 'simple-podcasting' ) ],
		edit: () => <p>{  __( 'show in the editor') } </p>,
		save: () => <p>{  __( 'show in the frontend') } </p>,
	}
);