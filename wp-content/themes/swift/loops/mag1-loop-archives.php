<?php 
	global $swift_opt;
	$dateformat = get_option('date_format');
	$timeformat = get_option('time_format');
	$count=1;$i=0;
?>
<div  id="mag-wrapper" style="width:590px;position: relative;left: -5px;">
<?php	if ( have_posts() ) : while ( have_posts() ) : the_post();?>
    			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
     			<!-- Display the Title as a link to the Post's permalink. -->
				<div class="mag-box mag-masonry">
                
    				<a href="<?php the_permalink() ?>" rel="bookmark">
                    <?php if(has_post_thumbnail()):
                    the_post_thumbnail('mag1',array('class'	=> "mag-thumb",
																  'title'	=> trim(strip_tags( get_the_title()))
																  ) 
					);
					else: ?>
                    <img src="<?php echo get_template_directory_uri()?>/images/default.jpg" alt=""  width="167" height="" class="mag-thumb"/>
                    <?php endif;?>
					</a>
    
					<div class="mag-content">
                    	<span class="mag-author">Written by <span class="uppercase"><?php the_author_posts_link(); ?></span></span>
 						<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a></h2>
    
	 					<div class="entry">
   							<?php the_excerpt();?>
	 					</div>
					</div><!--/mag-content-->

                    <div class="mag-meta clearfix">
                    <span class="alignleft mag-date"><?php the_time("F j, Y"); ?></span>
                        <a href="<?php the_permalink() ?>#comments" class="read-more comment-count"><?php comments_number('0','1','%'); ?></a>
                    </div>  
      
            	</div><!-- /mag-box-->
		</div>
<?php 	endwhile;echo '</div>';
 else: ?>
    
 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p>Sorry, no posts matched your criteria.</p>

 	<!-- REALLY stop The Loop. -->
<?php 
	endif; 
?>

<div class="clear"></div>
 
<?php	if(function_exists('swift_pagenavi')) swift_pagenavi(); ?>
