<ul id="popular-posts-home">
<?php
global $wpdb;global $swift_opt;
$number=5;
(int) $number;
$number=$swift_opt['swift_popular_posts_number'];

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
		$custom_field = get_post_meta($post->ID, "image", true);
?>
		<li>
			<?php if($custom_field) { ?>
				<a title="<?php echo $post_title; ?>" href="<?php echo $guid; ?>">
                    <?php if(has_post_thumbnail()):
								the_post_thumbnail( 'popular-posts-home',array('class'	=> "popular-posts-home", ));
                          else: ?>
                    <img src="<?php echo get_template_directory_uri()?>/images/default.jpg" alt="" width="220" height="90" class="popular-posts-home"/>
                    <?php endif;?>
					</a>            
            <?php } ?>                
            <h2 class="post-title"><a href="<?php echo $guid; ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a></h2>
            <?php echo $excerpt; ?>
    		<div style="clear:both"></div>

        </li>
<?php 

	}
}
?></ul>