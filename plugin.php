<?php
/* 
* Plugin Name: mytheme-blocks
* Plugin URI: https://wpjs.co.uk
* Description: Blocks for mytheme.
* Author: Craig West 
* Author URI: https://wpjs.co.uk
*/

if ( ! defined( 'ABSPATH' )) {
    exit;
}

function mytheme_blocks_register_block_type($block, $options = array ()) {
    register_block_type(
        'mytheme-blocks/' .$block,
        array_merge(
            array(
                'editor_script' => 'mytheme-blocks-editor-script',
                'editor_style' => 'mytheme-blocks-editor-style',
                'script' => 'mytheme-blocks-script',
                'style' => 'mytheme-blocks-style'
            ),
            $options
        )
        

    );
}

function mytheme_blocks_register() { 
    
    wp_register_script(
        'mytheme-blocks-editor-script',
        plugins_url('dist/editor.js', __FILE__),
        array('wp-blocks','wp-i18n')
    );

    wp_register_script(
        'mytheme-blocks-script',
        plugins_url('dist/script.js', __FILE__),
        array('jquery')
    );

    wp_register_style(
        'mytheme-blocks-editor-style',
        plugins_url('dist/editor.css', __FILE__),
        array('wp-edit-blocks')   
    );

    wp_register_style(
        'mytheme-blocks-style',
        plugins_url('dist/style.css', __FILE__)
    );
    
    mytheme_blocks_register_block_type('firstblock');
    mytheme_blocks_register_block_type('secondblock');
}

add_action('init', 'mytheme_blocks_register');

// Create custom category and put at top.
function custom_block_category( $categories ) {
    $custom_block = array(
       'slug'  => 'iws-blocks',
	   'title' => __( 'IWS-BLOCKS', 'iws' ),
    );

    $categories_sorted = array();
    $categories_sorted[0] = $custom_block;

    foreach ($categories as $category) {
        $categories_sorted[] = $category;
    }

    return $categories_sorted;
}
add_filter( 'block_categories', 'custom_block_category', 10, 2);

// Disable checking for updates
add_filter('site_transient_update_plugins', 'remove_update_notification');
function remove_update_notification($value) {
     unset($value->response[ plugin_basename(__FILE__) ]);
     return $value;
} 