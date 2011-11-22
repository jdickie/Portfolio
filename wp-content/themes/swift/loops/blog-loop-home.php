<?php 
global $swift_opt;

	$dateformat = get_option('date_format');
	$timeformat = get_option('time_format');
	$i=0;
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		global $do_not_duplicate;
		if(!$do_not_duplicate || isset($swift_opt['swift_posts_skip'])&&$swift_opt['swift_posts_skip']!="true")$do_not_duplicate=NULL;$do_not_duplicate['dummy']="dummy";
		if (!in_array(get_the_ID(),$do_not_duplicate)):
?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 
		if($i<$swift_opt['swift_full_posts_number']):
?>		
						<a href="<?php the_permalink() ?>" rel="bookmark">
                        <?php if(has_post_thumbnail()):
								the_post_thumbnail('full-post-thumb',array('class'	=> "full-post-thumb",
																  'title'	=> trim(strip_tags( get_the_title()))
																  ) 
						);
                    else: ?>
                    <img src="<?php echo get_template_directory_uri()?>/images/default.jpg" alt="" width="576" height="120" class="full-post-thumb" />
                      	</a> 
<?php 						endif;?>
<?php	endif;    
?>    
 		<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a></h2>
        <span class="post-meta alignleft">Filed under <span class="uppercase"><?php echo get_the_category_list( ', ' ) ?></span> by <span class="uppercase"><?php the_author_posts_link(); ?></span> on <span class="uppercase"><?php the_time("$dateformat \a\\t $timeformat"); ?></span></span>
        <span class="post-meta alignright uppercase">{<a href="<?php the_permalink() ?>#commentlist"><?php comments_number('no comments','one comment','% comments'); ?></a>}</span>
        <div class="clear"></div>
        <span class="border"></span>
        
        <div class="entry">
<?php 
			if($i<$swift_opt['swift_full_posts_number']): {the_content();
		  		$i++; //Keeping track of number of full posts echoed.
		  		if($i==$swift_opt['swift_full_posts_number']) echo '<div class="fullpost-margin"></div>';}
		  	else:	
?>
<?php 	//Display Excerpts or full post based on option selected.
				if(isset($swift_opt['swift_excerpts_enable'])&&$swift_opt['swift_excerpts_enable']==true):?>
<?php 				if(isset($swift_opt['swift_thumbs_enable'])&&$swift_opt['swift_thumbs_enable']==true): ?>
						<a href="<?php the_permalink() ?>" rel="bookmark">
                        <?php if(has_post_thumbnail()):
								the_post_thumbnail('blog-thumb',array('class'	=> "blog-thumb",
																  'title'	=> trim(strip_tags( get_the_title()))
																  ) 
						);
                    else: ?>
                    <img src="<?php echo get_template_directory_uri()?>/images/default.jpg" alt="" width="135" height="90" class="blog-thumb" />
                       
                    <?php endif;?>
					</a>

<?php 				endif; //Ends the if checking the thumbails.?>

<?php 				the_excerpt(); ?>
					<a href="<?php the_permalink() ?>" class="read-more">Full Story &raquo;</a>
<?php 			else:
					the_content();
				endif; //End's the if checking excerpts vs fullpost
			endif; //End's the if checking number of full posts.
			?>
		</div>
    <div class="clear"></div>
    </div>
    <!-- Stop The Loop (but note the "else:" - see next line). -->
 	<?php endif;endwhile; else: ?>
    
 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p style="font-size:1.3em; line-height:1.8em">Sorry, no posts matched your criteria.</p>
    
	
 	<!-- REALLY stop The Loop. -->
 	<?php endif; ?>
    
    <div class="clear"></div>
 
	<?php	if(function_exists('swift_pagenavi')) swift_pagenavi(); ?>
