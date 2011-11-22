<?php
/*
Template Name: Full Width blank template
*/
?>
<?php 
global $swift_opt;
get_header(); 
?>
<div id="content" class="grid_16">
<?php 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>   
    <span class="post-meta alignright"><?php edit_post_link('Edit Post', ' [', ']'); ?></span>
        <div class="entry">
   		<?php the_content(); ?>
        <div class="clear"></div>
        <?php wp_link_pages(array('before' => '<div class="page-navigation"><p><strong>Pages: </strong> ', 'after' => '</p></div>', 'next_or_number' => 'number')); ?>
 		</div>
    
    <!-- Calling comments template -->
    	<?php //comments_template(); ?>
	<!-- <?php trackback_rdf(); ?> -->
    <!-- Stop The Loop (but note the "else:" - see next line). -->
 	<?php endwhile; else: ?>
    
 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<!-- REALLY stop The Loop. -->
<?php
	endif;
?>
</div><!--/content-->
</div><!--/right container-->

<?php get_footer(); ?>