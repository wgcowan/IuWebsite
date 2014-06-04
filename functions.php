<?php
    function iuwebsite_public_head()
    {
               /* slider */
                echo queue_css_file("vidStyle");
				echo queue_css_file('base');
				echo queue_css_file('fixed');
				echo queue_css_file('wide');
				echo queue_css_file('ie6');
				echo queue_css_file('ie7');
				
				echo queue_js_file('scripts');
    }
	function iuwebsite_public_body()
	{?>
		<div id="branding-bar">
		            <div class="bar">
		                <div class="wrapper">
		                    <p class="campus">
		                        <a href="http://www.iub.edu/">
		                            <img width="64" height="73" alt=" " src="<?php echo img('iu_trident-tab.gif');?>">
		                            <span class="line-break">Indiana University</span> Bloomington
		                        </a>
		                    </p>
		                </div>
		            </div>
		        </div>
	<?php }
	function iuwebsite_public_footer()
	{?>
		<div role="contentinfo" id="footer">
		        	<div class="wrapper">
		                <p class="tagline">What matters. Where it matters.</p>
		                <p class="internal"><a href="http://go.iu.edu/4My">Privacy Notice</a></p>
		                <p class="copyright">
		                    <a class="block-iu" href="http://www.iu.edu/"><img width="22" height="26" alt="Block IU" src="<?php echo img('iu_trident-tab.gif');?>"></a> 
		                    <span class="line-break">
		                        <a href="http://www.iu.edu/copyright/index.shtml">Copyright</a> &copy; 
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
	<?php }
	/*
	* Admin with jwplayer
	*/
    function iuwebsite_admin_head()
    {
    }	
?>