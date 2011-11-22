<?php global $swift_opt;?>
<?php 
	if($search_code=$swift_opt['swift_search_code']):
	echo '<div class="nav-search">'.stripslashes($search_code).'</div>';
	else:
?>
<div id="nav-search">
	<form method="get" action="<?php echo home_url(); ?>/"><input type="text" value="Type and hit enter to Search" name="s" id="navsearch"onfocus="if (this.value == 'Type and hit enter to Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Type and hit enter to Search';}" /> <input type="hidden"  value="GO" />
	</form>
</div>

<?php endif;?>
