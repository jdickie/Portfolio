<?php 
global $swift_opt;
get_header();
$dateformat = get_option('date_format');
$timeformat = get_option('time_format');
?>
<div id="content" class="grid_10">
<?php 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		$page_id=get_the_ID();
?>    
		<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
        <span class="border"></span>
        
        <div class="entry">
		<?php
			//Inserts the adcode 
			if (isset($swift_opt['swift_adsense_enable'])&&$swift_opt['swift_adsense_enable'] == "true"){ 
			if (isset($swift_opt['swift_adcode']) && $adcode=$swift_opt['swift_adcode'])  
			echo '<p>'.stripslashes($adcode).'</p>';} 
		?>
    
    <!-- Your post is displayed by this function -->
<?php 		the_content(); ?>
        
<?php 		wp_link_pages(array('before' => '<div class="page-navigation"><p><strong>Pages: </strong> ', 'after' => '</p></div>', 'next_or_number' => 'number')); 
?>
<?php endwhile; else: 
		endif;   

			//Inserts the adcode 
			if (isset($swift_opt['swift_adsense_afterpost_enable'])&&$swift_opt['swift_adsense_afterpost_enable'] == "true"){ 
			if (isset($swift_opt['swift_adsense_afterpost'])&&$adcode=$swift_opt['swift_adsense_afterpost'])  
			echo stripslashes($adcode);} 
?>
 		</div><!--/entry-->
    <div class="clear"></div>
    
    <div class="roundup">
    
    <h2>Most commented posts</h2>
<?php 
	global $wpdb;
	$date = get_post_meta($post->ID,'swift_roundup',true);
	$result = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_date >='".$date['s_d']."' AND post_date < '".$date['e_d']."' ORDER BY comment_count DESC LIMIT 0 , 5");
	foreach ($result as $post):
	setup_postdata($post);
	$postid = $post->ID;
	$title = $post->post_title;
	$commentcount = $post->comment_count;
?>
		<li>
        	<a href="<?php the_permalink() ?>" rel="bookmark">                  
			<?php if(has_post_thumbnail()):
					the_post_thumbnail( array(100,60) );
                  else: ?>
                    <img src="<?php echo get_template_directory_uri()?>/images/default.jpg" alt="" width="100" height="60" />
                    <?php endif;?>/a>        	
        	<h3 class="ep-listing"> <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<span class="post-meta alignleft">Filed under <?php swift_list_cats(2); ?> on <?php the_time("$dateformat"); ?></span>
    		<div class="clear"></div>
		</li>
<?php 
endforeach;
//Reset Query
wp_reset_query();

?>
<h3>Complete list of posts published between <?php echo date("jS M Y",strtotime($date['s_d']));?> and <?php echo date("jS M Y",strtotime($date['e_d']));?></h3>
<?php
//Create a new filtering function that will add our where clause to the query
function filter_where($where = '') {
	global $date;
  //posts for March 1 to March 15, 2009
  $where .= "AND post_date >= '".$date['s_d']."' AND post_date < '".$date['e_d']."'";
  return $where;
}
// Register the filtering function
add_filter('posts_where', 'filter_where');
query_posts("posts_per_page=40");
while ( have_posts() ) : the_post();
?>

		<li>
        				<a href="<?php the_permalink() ?>" rel="bookmark">
                    <?php if(has_post_thumbnail()):
							the_post_thumbnail('blog-thumb',array('class'	=> "roundup-thumb",
																  'title'	=> trim(strip_tags( get_the_title()))
															) 
												);
              				else: ?>
                    <img src="<?php echo get_template_directory_uri()?>/images/default.jpg" alt="" width="75" height="45" class="mag2-thumb" />
                    <?php endif;?>
					</a>
        	<h4 class="ep-listing"> <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
			<span class="post-meta alignleft">Filed under <?php swift_list_cats(2); ?> on <?php the_time("$dateformat"); ?></span>
    		<div class="clear"></div>
		</li>
<?php
endwhile;
//Reset Query
wp_reset_query();
?>


</div><!--roundup-->
<?php 
 		$query='post_type=Roundup&Roundup_id='.$page_id;
		$temp = new WP_Query();
    	$temp->query($query);
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	 	comments_template();  
?>
<!-- <?php trackback_rdf(); ?> -->
<?php endwhile;endif;?>        
</div><!--/content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>