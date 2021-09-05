var registerBlockType = wp.blocks.registerBlockType;
var __ = wp.i18n.__;
var el = wp.element.createElement;

registerBlockType('mytheme-blocks/firstblock', {
	title: __('First Block', 'mytheme-blocks'),
	description: __('Our first block', 'mytheme-blocks'),
	category: 'layout',
	icon: {
		src: 'admin-network',
		background: '#FFA500',
		foreground: '#FFF',
	},
	keywords: [__('photo', 'mytheme-blocks'), __('image', 'mytheme-blocks')],
	edit: function () {
		return el('p', null, 'Editor');
	},
	save: function () {
		return el('p', null, 'Saved content');
	},
});
