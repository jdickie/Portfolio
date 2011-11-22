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
    <?php 
	if(isset($_GET['author_name'])) :
        $curauth = get_userdatabylogin($author_name);
    else :
        $curauth = get_userdata(intval($author));
    endif;
?>
	<h2 class="archive-title"><span class="normal">About</span> <?php echo $curauth->nickname; ?></h2>
    <p style="font-size:1.3em; line-height:1.8em">
    	<span id="authorTempaAvatar"><?php echo get_avatar($curauth->user_email,90); ?></span>
		<?php echo $curauth->user_description; ?><br />
		<strong>Website:</strong> <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a><br />
    	<?php echo $curauth->nickname; ?> has written <b><?php the_author_posts(); ?></b> articles so far, you can find them below.
    	<br />
	</p>
	<div class="border"></div>
	<br />
<?php
        if(isset($swift_design_opt['swift_archives_magazine'])&&$swift_design_opt['swift_archives_magazine']=="magazine")
			locate_template(array('loops/mag1-loop-archives.php'), true, false );
        elseif(isset($swift_design_opt['swift_archives_magazine'])&&$swift_design_opt['swift_archives_magazine']=="blog")
			locate_template(array('loops/blog-loop-archives.php'), true, false );
		else
			locate_template(array('loops/mag1-loop-archives.php'), true, false );
?>
    </div>
    
<?php 	if(isset($swift_design_opt['swift_archives_magazine'])&&$swift_design_opt['swift_archives_magazine']!="magazine_full") :
		get_sidebar(); 
		else:
?>
		</div><!--/right container-->
<?php 	endif;        ?>
<?php get_footer(); ?>