<?php global $swift_opt;?>
<div class="jflow-content-slider grid_10 alpha" >
<div id="slides">
<?php if($swift_opt['swift_featured_category']&&$swift_opt['swift_featured_category']!='Show recent posts') {
$query='category_name="'.$swift_opt['swift_featured_category'].'"&showposts='.$swift_opt['swift_featured_posts_number'];}
else
$query='&showposts='.$swift_opt['swift_featured_posts_number'];
?>
<?php
	$count=0;
    $recentPosts = new WP_Query();
    $recentPosts->query($query);
    while ($recentPosts->have_posts()) : $recentPosts->the_post();
	$do_not_duplicate[$count] = $post->ID;
 	$count++;
?> 
                
	<div class="slide-wrapper">
				<div class="slide-details">

					<h2 class="title"> <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php if(isset($swift_opt['swift_thumbs_slider_enable'])&&$swift_opt['swift_thumbs_slider_enable']==true) { ?>
                    <?php if(has_post_thumbnail()):
								the_post_thumbnail( 'slider1',array('class'	=> "attachment slide-thumbnail",
																	'title'	=> trim(strip_tags( get_the_title()))
																	) 
												   );
							else: ?>
                    <img src="<?php echo get_template_directory_uri()?>/images/default.jpg" alt="" title="<?php echo trim(strip_tags( get_the_title())); ?>" width="250" height="130" class="slide-thumbnail" />
                    <?php endif;?>
					</a>
		
		<?php } ?>
					<?php the_excerpt(); ?> 
					
				</div>
				<div class="clear"></div>
	</div>
<?php endwhile; ?>
</div><!--End of Slides -->
		<div id="myController">
			<span class="jFlowPrev">Prev</span>
<?php for($i=0;$i<$count;$i++){ ?>
			<span class="jFlowControl"><?php echo ($i+1); ?></span>
<?php }?>
			<span class="jFlowNext">Next</span>

		</div>
		<div class="clear"></div>
</div><!-- End of jflow content slider -->
