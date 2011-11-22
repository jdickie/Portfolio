<?php 
global $swift_opt;global $swift_design_opt;

get_header();
?>
<?php  
		if(isset($swift_design_opt['swift_archives_magazine'])&&$swift_design_opt['swift_archives_magazine']=="magazine_full")
	  	$grid="grid_16 alpha";
	  	else
	  	$grid="grid_10 alpha";
?>
    <div id="content" class="<?php echo $grid;?>">
<?php get_search_form();?>    
<?php
        if(isset($swift_design_opt['swift_archives_magazine'])&&$swift_design_opt['swift_archives_magazine']=="magazine")
			locate_template(array('loops/mag1-loop-archives.php'), true, false );
        elseif(isset($swift_design_opt['swift_archives_magazine'])&&$swift_design_opt['swift_archives_magazine']=="blog")
			locate_template(array('loops/blog-loop-archives.php'), true, false );
		else
			locate_template(array('loops/mag2-loop-archives.php'), true, false );
?>
<?php  get_search_form();?>
    </div>
<?php 	if(isset($swift_design_opt['swift_archives_magazine'])&&$swift_design_opt['swift_archives_magazine']!="magazine_full") :
		get_sidebar(); 
		else:
?>
		</div><!--/right container-->
<?php 	endif;        ?>
<?php get_footer(); ?>
