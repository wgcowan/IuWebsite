<?php
if (!defined('IUWEBSITE_PLUGIN_DIR')) {
    define('IUWEBSITE_PLUGIN_DIR', dirname(__FILE__));
}
add_plugin_hook('public_head', 'iuwebsite_public_head');
add_plugin_hook('public_body', 'iuwebsite_public_body');
add_plugin_hook('public_footer', 'iuwebsite_public_footer');
 
require_once IUWEBSITE_PLUGIN_DIR . '/IuWebsitePlugin.php';
require_once IUWEBSITE_PLUGIN_DIR . '/functions.php';
$iuwebsitePlugin = new iuwebsitePlugin;
$iuwebsitePlugin->setUp();
?>