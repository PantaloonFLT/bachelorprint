( function( blocks, components, i18n, element ) {
	var el = element.createElement;
	var registerBlockType = wp.blocks.registerBlockType;
	var RichText = wp.blocks.RichText;
	var BlockControls = wp.blocks.BlockControls;
	var AlignmentToolbar = wp.blocks.AlignmentToolbar;
	var MediaUpload = wp.blocks.MediaUpload;
	var InspectorControls = wp.blocks.InspectorControls;
	var TextControl = wp.components.TextControl;

	registerBlockType( 'webseide/comments-block', {
		title: i18n.__( 'Comments' ), 
		description: i18n.__( 'Displays comments within content.' ), 
		icon: 'admin-comments',
		category: 'common',

		edit: function( props ) {
			return i18n.__('Comments');
		},

		save: function( props ) {
			return '[webseide_show_comments]';
		}
	} );

} )(
	window.wp.blocks,
	window.wp.components,
	window.wp.i18n,
	window.wp.element,
);