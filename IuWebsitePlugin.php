<?php

class IuWebsitePlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array('public_head','public_body','public_footer');

    function hookpublichead()
    {		
		$head_html = file_get_contents('https://assets.iu.edu/brand/2.x/header-iub.html');
		echo $head_html;
	?>
		<link href="https://assets.iu.edu/brand/2.x/brand.css" rel="stylesheet" type="text/css">
<?php }

function hookpublicbody()
	{
	}
	
function hookpublicfooter()
	{
		$foot_html = file_get_contents('https://assets.iu.edu/brand/2.x/footer.html');
		echo $foot_html;
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