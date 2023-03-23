<?php

/**
 * Plugin Overrides
 * General overrides for plugin specific changes.
 */

 
/**
 * Add an ACF Options page for site configuration
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
}


/**
 * Yoast Comment Removal
 */

if (defined('WPSEO_VERSION')){
	add_action('get_header',function (){ ob_start(function ($o){
	return preg_replace('/^<!--.*?[Y]oast.*?-->$/mi','',$o); }); });
	add_action('wp_head',function (){ ob_end_flush(); }, 999);
}


/**
 * Make sure Yoast is always on the bottom of pages
 */
function yoastToBottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoastToBottom');