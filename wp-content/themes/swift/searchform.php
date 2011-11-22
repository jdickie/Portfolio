<div class="widget-search">
	<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
		<fieldset>
			<p><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /> <input type="submit" id="searchsubmit" value="Search" /></p>
		</fieldset>
	</form>
</div>
