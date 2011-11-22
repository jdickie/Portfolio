<?php 
	global $swift_opt;
	$dateformat = get_option('date_format');
	$timeformat = get_option('time_format');
?>
<div  id="mag-wrapper" style="width:950px;position: relative;left: -5px;">
<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="mag2-box mag-masonry">
    	<a href="<?php the_permalink() ?>" rel="bookmark">
<?php 		   if(has_post_thumbnail()):
					the_post_thumbnail('mag2',array('class'	=> "mag2-thumb",
		   										  'title'	=> trim(strip_tags( get_the_title()))
													) 
										);
            	else: ?>
                <img src="<?php echo get_template_directory_uri()?>/images/default.jpg" alt="" width="281" height="" class="mag2-thumb" />
<?php     		endif;?>
		</a>
    					
        <span class="mag2-author">Written by <span class="uppercase"><?php the_author_posts_link(); ?></span></span>
    	<span class="catname"><?php echo get_the_category_list( ', ' ); ?></span>
			<div class="mag2-content">
 				<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a></h2>
                <div class="mag2-meta clearfix">
                <span class="alignleft mag-date"><?php the_time("F j, Y"); ?></span>
                <a href="<?php the_permalink() ?>#comments" class="read-more comment-count"><?php comments_number('0','1','%'); ?></a>
                </div> 
			</div><!--/mag2-content-->
        </div><!-- /mag2-box-->
	</div><!-- /post class-->
    <!-- Stop The Loop (but note the "else:" - see next line). -->
<?php 	endwhile;
		else: 
?>
 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p>Sorry, no posts matched your criteria.</p>
 	<!-- REALLY stop The Loop. -->
<?php 
	endif; 
?>
</div>
<div class="clear"></div>
<?php	if(function_exists('swift_pagenavi')) swift_pagenavi(); ?>

