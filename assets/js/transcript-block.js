/**
 * Internal block libraries
 */
const { __ }				= wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText }	    = wp.editor;

/**
 * Register the transcript block
 */
registerBlockType(
	'podcasting/podcast-transcript',
	{
		title: __( 'Podcast Transcript', 'simple-podcasting' ),
		category: 'common',
		icon: 'microphone',

		attributes: {
			blockValue: {
				type: 'string',
				source: 'meta',
				meta: 'podcast_transcript'
			}
		},

		supports: {
			multiple: false,
		},
		keywords: [ __( 'Transcript', 'simple-podcasting' ) ],

		edit( { className, setAttributes, attributes } ) {

			function updateBlockValue( blockValue ) {
				setAttributes( { blockValue } );
			}

			return wp.element.createElement( RichText, {
				label: 'Podcast Transcript',
				tagName: 'div',
				multiline: 'p',
				placeholder: __( 'Enter the podcast transcript here', 'simple-podcasting' ),
				className: className,
				onChange: updateBlockValue,
				value: attributes.blockValue,
			} );
		},

		// Data is saved to post meta via attributes
		save() {
			return null;
		}
	}
);