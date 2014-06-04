<?php
class IuWebsitePlugin extends Omeka_Plugin_AbstractPlugin
{   
    protected $_hooks = array('install',
    'uninstall'
    );
        
    public function hookInstall()
    {
	
	}
    
    public  function hookUninstall()
    {

    }
	
    /**
* Appends a warning message to the uninstall confirmation page.
*/
    public static function admin_append_to_plugin_uninstall_message()
    {
        echo '<p><strong>Warning</strong>: This will permanently delete the Avalon Video element set and all its associated metadata. You may deactivate this plugin if you do not want to lose data.</p>';
    }
}