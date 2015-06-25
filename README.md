IU Website
===========

This plugin adds the official IU Header and Footer Branding to an Omeka site.

Download and install the IU Website plugin.

Currently the Privacy Policy links to IU's default policy.

If you want to change where the Privacy Policy links to:

1. Edit IuWebsitePlugin.php in the plugins directory.
2. find the following block of code:

`	<script>
	var newPrivacyURL = 'http://www.iu.edu/comments/privacy.shtml';
	(oldPrivacyURL = document.getElementById('privacy-policy-link')) ? (oldPrivacyURL.href = newPrivacyURL) : '';
	</script>`

3. Change `http://www.iu.edu/comments/privacy.shtml` to whichever url contains your department's or school's privacy policy. 
4. Save file.
5. Refresh browser page.

Since the page layout can vary with each theme, you may need to modify any theme you use to make sure that the current theme does not contain elements that interfere with the IU Brand Header and/or Footer.

Repository for Omeka plugin for Indiana University Branding.
