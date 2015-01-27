<?php

class IuWebsitePlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array('public_head','public_body','public_footer');

    function hookpublichead()
    {
	?>
        <!-- BEGIN INDIANA UNIVERSITY BRANDING BAR AND FOOTER <HEAD> ELEMENTS -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="plugins/IuWebsite/views/public/_iu-brand/css/base.css" rel="stylesheet" type="text/css" />
        <link href="plugins/IuWebsite/views/public/_iu-brand/css/wide.css" media="(min-width: 48.000em)" rel="stylesheet" type="text/css" />

        <!--[if (lte IE 8) & (!IEMobile)]>
            <link href="plugins/IuWebsite/views/public/_iu-brand/css/fixed.css" media="screen" rel="stylesheet" type="text/css" />
        <![endif]-->
        <!--[if IE 7]>
            <link href="plugins/IuWebsite/views/public/_iu-brand/css/ie7.css" rel="stylesheet" type="text/css" />
        <![endif]--> 
        <!--[if IE 6]>
            <link href="plugins/IuWebsite/views/public/_iu-brand/css/ie6.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <!-- END INDIANA UNIVERSITY BRANDING BAR AND FOOTER <HEAD> ELEMENTS -->
    <?php }
	function hookpublicbody()
	{?>
    	<!-- BEGIN INDIANA UNIVERSITY BRANDING BAR -->
        <div id="branding-bar">
            <div class="bar">
                <div class="wrapper">
                    <p class="campus">
                        <a href="http://www.iu.edu/">
                            <img src="plugins/IuWebsite/views/public/_iu-brand/img/trident-tab.gif" height="73" width="64" alt=" " />
                            Indiana University
                        </a>
                    </p>

                </div>
            </div>
        </div>
        <!-- END INDIANA UNIVERSITY BRANDING BAR -->
	<?php }
	function hookpublicfooter()
	{?>
        <!-- BEGIN INDIANA UNIVERSITY FOOTER -->
        <div id="footer" role="contentinfo">
        	<div class="wrapper">
				<p class="tagline">
				Fulfilling
				<span>the</span>
				Promise
				</p>
                <p class="internal"><a href="http://policies.iu.edu/policies/categories/academic-faculty-students/libraries-archives/libraries-privacy-policy.shtml">Privacy Notice</a></p>
                <p class="copyright">
                    <a href="http://www.iu.edu/" class="block-iu"><img src="plugins/IuWebsite/views/public/_iu-brand/img/block-iu.png" height="26" width="22" alt="Block IU" /></a> 
                    <span class="line-break">
                        <a href="http://www.iu.edu/copyright/index.shtml">Copyright</a> &#169; 
                        <script type="text/javascript">
                            var theDate=new Date()
                            document.write(theDate.getFullYear())
                        </script>
                    </span> 
                    <span class="line-break">The Trustees of <a href="http://www.iu.edu/">Indiana University</a>,</span> 
                    <span class="line-break"><a href="http://www.iu.edu/copyright/complaints.shtml">Copyright Complaints</a></span>
                </p>
            </div>
        </div>
        <!-- END INDIANA UNIVERSITY FOOTER -->
	<?php }
	/*
	* Admin with jwplayer
	*/
    function iuwebsite_admin_head()
    {
    }	
}
?>