<?php 
global $swift_opt;
get_header();
?>
<div id="content" class="grid_10">
<?php 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<!-- Display the Title as a link to the Post's permalink. -->
 		<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
        
        <span class="post-meta alignright"><a href="<?php the_permalink() ?>#commentlist"><?php comments_number('no comments','one comment','% comments'); ?></a><?php edit_post_link('Edit Post', ' [', ']'); ?></span>
    	<span class="border"></span>
        
    	<div class="entry">
		<?php
			//Inserts the adcode 
			if (isset($swift_opt['swift_adsense_enable'])&&$swift_opt['swift_adsense_enable'] == "true"){ 
			if (isset($swift_opt['swift_adcode'])&&$adcode=$swift_opt['swift_adcode'])
			echo '<p>'.stripslashes($adcode).'</p>';}
		?>
   		<?php the_content(); ?>
        <div class="clear"></div>
        <?php wp_link_pages(array('before' => '<div class="page-navigation"><p><strong>Pages: </strong> ', 'after' => '</p></div>', 'next_or_number' => 'number')); ?>
        
<?php
			//Inserts the adcode 
			if (isset($swift_opt['swift_adsense_afterpost_enable'])&&$swift_opt['swift_adsense_afterpost_enable'] == "true"){ 
			if (isset($swift_opt['swift_adsense_afterpost'])&&$adcode=$swift_opt['swift_adsense_afterpost'])  
			echo stripslashes($adcode);} 
?>
 		</div>
    </div>
    <!-- Calling comments template -->
    	<?php comments_template(); ?>
	<!-- <?php trackback_rdf(); ?> -->
    <!-- Stop The Loop (but note the "else:" - see next line). -->
 	<?php endwhile; else: ?>
    
 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p>Sorry, no posts matched your criteria.</p>

 	<!-- REALLY stop The Loop. -->
<?php
	endif; 
?>
</div><!--/content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>