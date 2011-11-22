<?php 
global $swift_opt;global $swift_design_opt;
get_header();
if(isset($swift_design_opt['swift_magazine'])&&$swift_design_opt['swift_magazine']=="magazine_full")
$grid="grid_16";
else
$grid="grid_10";
?>
<div id="content" class="<?php echo $grid?>">
<?php 
	if(isset($swift_opt['swift_featured_enable'])&&$swift_opt['swift_featured_enable']=="true"):
		if(isset($swift_opt['swift_slider_style'])&&$swift_opt['swift_slider_style']=="Lite"):
		locate_template(array('includes/featured-slider-1.php'), true, false );
		else:
		locate_template(array('includes/featured-slider-2.php'), true, false );
		endif;
	endif;
?>
<?php
if(isset($swift_design_opt['swift_magazine'])&&$swift_design_opt['swift_magazine']=="magazine_full" &&isset($swift_opt['swift_about_me'])&&$swift_opt['swift_about_me']!="" ):
?>
<div class="grid_6 omega">
<div class="block widget widget_text">
<div class="textwidget">
<?php echo stripslashes($swift_opt['swift_about_me']);?>
</div>
</div>
<div class="clear"></div>
</div>
<?php endif;?>

<?php 
	/*Checks If featured posts are to be displayed or not, 
	  and sets the width of the column accrodingly using grids.	*/
		if(isset($swift_design_opt['swift_magazine'])&&$swift_design_opt['swift_magazine']=="magazine_full")
	  	$grid="grid_16 alpha";
		elseif(isset($swift_opt['swift_popular_enable'])&&$swift_opt['swift_popular_enable']=="true")
		$grid="grid_6 alpha";
		else
		$grid="grid_10 alpha";
?>

    	<div class="<?php echo $grid;?>">
<?php
        if(isset($swift_design_opt['swift_magazine'])&&$swift_design_opt['swift_magazine']=="magazine")
			locate_template(array('loops/mag1-loop-home.php'), true, false );
        elseif(isset($swift_design_opt['swift_magazine'])&&$swift_design_opt['swift_magazine']=="blog")
			locate_template(array('loops/blog-loop-home.php'), true, false );
		else
			locate_template(array('loops/mag2-loop-home.php'), true, false );
?>    	</div>

    <!--Insert popular posts-->
<?php 	if(isset($swift_opt['swift_popular_enable'])&&$swift_opt['swift_popular_enable']=="true"&& isset($swift_design_opt['swift_magazine']) && $swift_design_opt['swift_magazine']!="magazine_full"):?>
            <div class="grid_4 omega">
<?php 		locate_template(array('includes/popular-posts-home.php'), true, false );?>
            </div>
<?php 	endif;?>

</div><!--/content-->
<?php 	if(isset($swift_design_opt['swift_magazine'])&&$swift_design_opt['swift_magazine']!="magazine_full") :
		get_sidebar(); 
		else:
?>
		</div><!--/right container-->
<?php 	endif;        ?>
<?php get_footer(); ?>