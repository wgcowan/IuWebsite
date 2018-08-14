<?php
class IuWebsitePlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array('public_head','public_body','public_footer');

    function hookpublichead()
    {	
	queue_css_file('brand');	
	$head_html = file_get_contents('https://assets.iu.edu/brand/3.x/header-iub.html');
		if ($head_html === false ) {
			$head_html=file_get_contents('plugins/IuWebsite/views/public/iu_brand/head_cached_file.htm');
	    }
	echo $head_html;
	?>
	<link href="https://assets.iu.edu/brand/3.x/brand.css" rel="stylesheet" type="text/css">

<?php }

function hookpublicbody()
	{
	}
	
function hookpublicfooter()
	{
		$foot_html = file_get_contents('https://assets.iu.edu/brand/3.x/footer.html');
		if ($foot_html === false ) {
			$foot_html=current_url();
			$foot_html=file_get_contents('plugins/IuWebsite/views/public/iu_brand/foot_cached_file.htm').'cached';
	    }
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
