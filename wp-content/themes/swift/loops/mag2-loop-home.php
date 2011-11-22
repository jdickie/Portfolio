<?php 
	global $swift_opt;
	$dateformat = get_option('date_format');
	$timeformat = get_option('time_format');
	$count=1;$i=0;
	if(!is_numeric ($swift_opt['swift_full_posts_number']) ||$swift_opt['swift_full_posts_number']==0) echo '<div  id="mag-wrapper" style="width:950px;position: relative;left: -5px;">';

	if ( have_posts() ) : while ( have_posts() ) : the_post();
    	global $do_not_duplicate;
		if(!$do_not_duplicate || isset($swift_opt['swift_posts_skip'])&&$swift_opt['swift_posts_skip']!="true")$do_not_duplicate=NULL;$do_not_duplicate['dummy']='dummy';
		if (!in_array(get_the_ID(),$do_not_duplicate)):
			//This if loop echoes the full length posts
			if($i++<$swift_opt['swift_full_posts_number']):?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- Display the Title as a link to the Post's permalink. -->
 				<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    			<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
 				<span class="post-meta alignleft">Filed under <span class="uppercase"><?php echo get_the_category_list( ', ' ); ?></span> by <?php the_author_posts_link(); ?> on <span class="upperclass"><?php the_time("$dateformat \a\\t $timeformat"); ?></span></span>
    
    			<span class="post-meta alignright"><span class="upperclass">{<a href="<?php the_permalink() ?>#commentlist"><?php comments_number('no comments','one comment','% comments'); ?></a>}</span></span>
    
    			<div class="clear"></div>
    
    			<span class="border"></span>
	
    			<div class="entry"><?php the_content();?></div>
			</div>
    			<?php if($i==$swift_opt['swift_full_posts_number']) echo '<div class="fullpost-margin"></div><div  id="mag-wrapper" style="width:950px;position: relative;left: -5px;">';?>
 
    
<?php 		else:    ?>

     			<!-- Display the Title as a link to the Post's permalink. -->
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="mag2-box mag-masonry">
    				<a href="<?php the_permalink() ?>" rel="bookmark">
                    <?php if(has_post_thumbnail()):
							the_post_thumbnail('mag2',array('class'	=> "mag2-thumb",
																  'title'	=> trim(strip_tags( get_the_title()))
															) 
												);
              				else: ?>
                    <img src="<?php echo get_template_directory_uri()?>/images/default.jpg" alt="" width="281" height="" class="mag2-thumb" />
                    <?php endif;?>
					</a>
    					
                        <span class="mag2-author">Written by <span class="uppercase"><?php the_author_posts_link(); ?></span></span>
					<div class="mag2-content">
 						<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); $count++;?></a></h2>
    
                        <div class="mag2-meta clearfix">
                        <span class="alignleft mag-date"><?php the_time("F j, Y"); ?></span>
                            <a href="<?php the_permalink() ?>#comments" class="read-more comment-count"><?php comments_number('0','1','%'); ?></a>
                        </div> 
					</div><!--/mag2-content-->

                    
      
            	</div><!-- /mag2-box-->
				</div>
<?php 		endif; ////End's the if checking number of full posts. ?>
    <!-- Stop The Loop (but note the "else:" - see next line). -->
<?php 
		endif; //Ends the if making sure there is no duplicate content.
		endwhile;
else: ?>
    
 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p>Sorry, no posts matched your criteria.</p>

 	<!-- REALLY stop The Loop. -->
<?php 
	endif; 
?>
<div class="clear"></div>
</div>
<?php	if(function_exists('swift_pagenavi')) swift_pagenavi(); ?>
