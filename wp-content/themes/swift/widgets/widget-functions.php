<?php 
//================= Popular Posts ================================
function popular_widget($number,$thumb){?>
	
<ul class="popular-widget"><?php
global $wpdb;
(int) $number;
if(!absint($number) )$number=5;

$now = gmdate("Y-m-d H:i:s",time());
$lastmonth = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m")-24,date("d"),date("Y")));
$popularposts = "SELECT ID, post_title,SUBSTRING(post_content,1,200) AS post_content,post_excerpt, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT ".$number;
$posts = $wpdb->get_results($popularposts);
$popular = '';

if($posts){
	
	foreach($posts as $post){
		$post_title = wp_kses($post->post_title,'','');
		$guid = get_permalink($post->ID);
		if(!$post->post_excerpt)$post->post_excerpt=$post->post_content;
		$excerpt= wp_kses($post->post_excerpt,'','');
		//if($excerpt_enable!="true")$excerpt=$post_title ;
		$custom_field = get_post_meta($post->ID, "image", true);
?>
		<li>
			<?php if($thumb==true) { ?>
				<a title="<?php echo $excerpt; ?>" href="<?php echo $guid; ?>"></a>
				<?php if(has_post_thumbnail()):
						echo get_the_post_thumbnail( $post->ID, 'popular-posts-widget',array(
			'class'	=> "attachment widget-thumbnail",
			'title'	=> trim(strip_tags( get_the_title()))
		) );
            		else: ?>
                    <img src="<?php echo get_template_directory_uri()?>/images/default.jpg" alt="" width="32" height="32" class="widget-thumbnail" />
                    <?php endif;?>
					</a>        
            <?php } ?>                
            
            <a href="<?php echo $guid; ?>" title="<?php echo $excerpt; ?>"><?php echo $post_title; ?></a>
    		<div style="clear:both"></div>
		</li>
<?php 

	}
}
?></ul>
<?php } //End of Popular posts Function?>
<?php
//===================== Banner ADS fucntion =======================
function ads_widget($one,$two,$three,$four){
	global $swift_opt;
	if($one=="true"&&$swift_opt['swift_banner1image']&&$swift_opt['swift_banner1destination']): ?>
    
	<a href="<?php echo $swift_opt['swift_banner1destination'];?>" ><img class="banner125" src="
	<?php echo $swift_opt['swift_banner1image']; ?>" alt="" /></a>
    <?php endif;?>
    
    <?php	if($two=="true"&&$swift_opt['swift_banner2image']&&$swift_opt['swift_banner2destination']): ?>
    
	<a href="<?php echo $swift_opt['swift_banner2destination'];?>" ><img class="banner125" src="
	<?php echo $swift_opt['swift_banner2image']; ?>" alt="" /></a>
    <?php endif;?>
    
    <?php	if($three=="true"&&$swift_opt['swift_banner3image']&&$swift_opt['swift_banner3destination']): ?>
    
		<a href="<?php echo $swift_opt['swift_banner3destination'];?>" ><img class="banner125" src="
	<?php echo $swift_opt['swift_banner3image']; ?>" alt="" /></a>
    <?php endif;?>
    
    
    <?php	if($four=="true"&&$swift_opt['swift_banner4image']&&$swift_opt['swift_banner4destination']): ?>
    
		<a href="<?php echo $swift_opt['swift_banner4destination'];?>" ><img class="banner125" src="
	<?php echo $swift_opt['swift_banner4image']; ?>" alt="" /></a>
    <?php endif;?>
    <div class="clear"></div>
<?php }?>
