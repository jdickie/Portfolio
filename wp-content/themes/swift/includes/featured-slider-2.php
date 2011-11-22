<?php 
global $swift_opt;
if($swift_opt['swift_featured_category']&&$swift_opt['swift_featured_category']!='Show recent posts')
$query='category_name="'.$swift_opt['swift_featured_category'].'"&showposts='.$swift_opt['swift_featured_posts_number'];
else
$query='&showposts='.$swift_opt['swift_featured_posts_number'];
?>
<div class="grid_10 alpha">
<div id="slider-wrapper">
<div id="slider">
<?php
	$count=0;
    $recentPosts = new WP_Query();
    $recentPosts->query($query);
    while ($recentPosts->have_posts()) : $recentPosts->the_post();
	 $do_not_duplicate[$count] = $post->ID;
	 $count++;
?> 
<a href="<?php the_permalink() ?>" rel="bookmark">

                    <?php if(has_post_thumbnail()):
							the_post_thumbnail('slider2',array('class'	=> "slide-thubnail",
															   'title'	=> trim(strip_tags( get_the_title()))
															   )
											   );
						else: ?>
                    <img src="<?php echo get_template_directory_uri()?>/images/default.jpg" alt="" title="<?php echo trim(strip_tags( get_the_title())); ?>" width="576" height="280" />
                    <?php endif;?>
					</a>
<?php endwhile; ?>
</div>             
</div>
</div>