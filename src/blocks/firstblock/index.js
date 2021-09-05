var registerBlockType = wp.blocks.registerBlockType;
var __ = wp.i18n.__;
var el = wp.element.createElement;

registerBlockType('mytheme-blocks/firstblock', {
	title: __('First Block', 'mytheme-blocks'),
	description: __('Our first block', 'mytheme-blocks'),
	category: 'iws-blocks',
	icon: {
		src: 'admin-network',
		background: '#FFA500',
		foreground: '#FFF',
	},
	keywords: [__('photo', 'mytheme-blocks'), __('image', 'mytheme-blocks')],

	// example: {
	// 	attributes: {
	// 		backgroundType: 'gradient',
	// 		backgroundGradient:
	// 			'linear-gradient(-225deg, rgb(255, 5, 124) 0%, rgb(141, 11, 147) 50%, rgb(50, 21, 117) 100%)',
	// 		align: 'center',
	// 		quoteStyle: 'quotes',
	// 		paddingTop: 30,
	// 		paddingBottom: 30,
	// 		blockquoteAlign: 'center',
	// 		textColor: '#2196F3',
	// 		content: __('An inspiring quote...', 'wp-presenter-pro'),
	// 	},
	// },

	edit: function () {
		return el('p', null, 'Editor');
	},
	save: function () {
		return el('p', null, 'Saved content');
	},
});
