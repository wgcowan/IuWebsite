<?php

class IuWebsitePlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array('public_head','public_body','public_footer');

    function hookpublichead()
    {
	include "gwassets/brand/1.x/header-iub.html";
	
	queue_css_url("/gwassets/brand/1.x/brand.css");
    }

function hookpublicbody()
	{
	}
	
function hookpublicfooter()
	{
		include "gwassets/brand/1.x/footer.html";
?>
		<script>
		var newPrivacyURL = 'http://www.iu.edu/comments/privacy.shtml';
		(oldPrivacyURL = document.getElementById('privacy-policy-link')) ? (oldPrivacyURL.href = newPrivacyURL) : '';
		</script>
<?php }
	
	/*
	* Admin with jwplayer
	*/
    function iuwebsite_admin_head()
    {
    }	
}
?>