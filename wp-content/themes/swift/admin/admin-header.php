<?php function admin_header(){?>
<?php

	if(isset($_POST['swift_options'])||isset($_POST['swift_design_options']))
	echo '<div id="message" class="updated fade"><p><strong>Options Saved</strong></p></div>';
	if(isset($_POST['general-reset'])||isset($_POST['design-reset']))
	echo '<div id="message" class="updated fade"><p><strong>Options Reset</strong></p></div>';
	
	if(!is_writable(U_DIR))
	echo '<div id="message" class="error"><p>Your wp-content/uploads directroy is not writable, make it writable and then deactivate and activate the theme  for SWIFT to work correctly</p></div>';
	$swift_custom=U_DIR.'/swift_custom';
	if(!is_writable($swift_custom)){
	echo '<div id="message" class="error"><p>Unable to create swift_custom folder in wp-content/uploads, please create the folder and make it writable</p></div>';
	
	$swift_custom=U_DIR.'/swift_custom/cache';}
	elseif(!is_writable($swift_custom)){
	echo '<div id="message" class="error"><p>Unable to create cache folder in wp-content/uploads/swift_custom, please create the folder and make it writable</p></div>';
	
	$swift_custom=U_DIR.'/swift_custom/custom-style.css';}
	
	elseif(!is_writable($swift_custom)){
	echo '<div id="message" class="error"><p>Unable to create custom-style.css file in wp-content/uploads/swift_custom, please create the file and make it writable</p></div>';
	
	$swift_custom=U_DIR.'/swift_custom/swift-js-functions.js';}
	
	elseif(!is_writable($swift_custom)){
	echo '<div id="message" class="error"><p>Unable to create swift-js-functions.js file in wp-content/uploads/swift_custom, please create the file and make it writable</p></div>';}

?>
<div class="swift-wrapper wrap clearfix">
<script type="text/javascript">
<!--
function confirmation() {
	var answer = confirm("Are you sure you want to reset options? You will loose all the settings.");
}
//-->
</script>

<div id="swift-header" class="clearfix">
	<div id="swift-logo" class="alignleft">
	<a href="http://swiftthemes.com" rel="external" ><img src="<?php echo get_template_directory_uri();?>/admin/images/swift-logo.png" /></a>
	</div>

	<div id="donate-form" class="alignright">
    	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input name="cmd" value="_xclick" type="hidden">
    	<input name="business" value="satish_g2009@yahoo.co.in" type="hidden">
    	<input name="item_name" value="Donation for SwiftTheme" type="hidden">

    	<input name="currency_code" value="USD" type="hidden">
    	<input name="return" value="http://swiftthemes.com/thank-you" type="hidden">
		Enter amount in $<input name="amount" value="15.00" size="6" type="text"><br />
		<input name="submit" value="Buy Satish a Coffee" type="submit" class="donate">
		</form>
	</div>
    
</div>	
    <?php $temp=get_theme_data(TEMPLATEPATH.'/style.css');?>
	<div id="nav">
    	<ul style="float:left;border-bottom:none">
        <li style="padding:.2em 1em; border:none" >You are using <?php echo $temp['Version'];?></li>
        </ul>
    	<ul class="clearfix">
    		<li class="last"><a href="http://swiftthemes.com/wordpress-themes/swift/swift-user-guide/" title="A complete guide to installing and customizing SWIFT">User Guide</a></li>
			<li><a href="http://swiftthemes.com/forums" title="Need more help? Check out support forum.">Support forum</a></li>
			<li><a href="http://swiftthemes.com/testimonials/" title="Write a testimonial for SWIFT">Write a Testimonial</a></li>
			<li><a href="http://swiftthemes.com/hire-me/" title="Hire Satish Gandham for a custom theme modification">Request a custom theme modification</a></li>
    	</ul>
	</div><!--/nav1-->
    <!-- BuySellAds.com Zone Code -->
    <div id="ad-container">

 

    </div>
<div class="clear"></div>
<?php }?>