<?php global $swift_opt?>
<!--Related posts, Social Bookmarking and author info -->
    <div id="rp-wrapper">
    
    	<div class="post-nav clearfix">
            <span><?php next_post_link('%link', ' &larr; Next post', FALSE , ''); ?></span>
            <span class="alignright"><?php previous_post_link('%link', 'Previous post &rarr;', FALSE ,''); ?></span>
		</div>

     	<?php if(function_exists('related_entries')):?>
    	<div id="related-posts">
        <?php related_entries();?>
		</div>
       	<?php endif;?> 
        
        <div id="subscribe">
        <?php if( $feedId=$swift_opt['swift_feedburner_id']&&$swift_opt['swift_email_subscription_enable']==true ||isset( $swift_opt['swift_socialmedia_enable'])&& $swift_opt['swift_socialmedia_enable']==true ){?>
        
		<h3>Subscribe / Share</h3>
        <?php }?>
        
        <?php if($feedId=$swift_opt['swift_feedburnerid']&&$swift_opt['swift_email_subscription_enable']==true){
			$feed=$swift_opt['swift_feedburnerid'];?>
        <form  action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feed;?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
        <input type="text" style="width:170px; padding:.2em 0" name="email"  value="Enter your e-mail address" onfocus="if (this.value == 'Enter your e-mail address') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter your e-mail address';}"/>
        <input type="hidden" value="<?php echo $feed;?>" name="uri"/>
        <input type="hidden" name="loc" value="en_US"/>
        <input type="submit" value="Subscribe" />
        </form>
        <?php }?>
        
        <?php if(isset($swift_opt['swift_socialmedia_enable'])&&$swift_opt['swift_socialmedia_enable']=="true"){?>       
        	<div id="socialmedia">
            <li class="sprite-twitter"><a href="http://twitter.com/home/?status=<?php the_title(); ?> : <?php echo get_tiny_url(get_permalink($post->ID)); ?>" title="Tweet this!"></a></li>
 
 			<li class="sprite-digg"><a href="http://digg.com/submit?phase=2&amp;amp;url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="Digg this!"></a></li>
 
			<li class="sprite-delicious"><a href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="Bookmark on Delicious."></a></li>
            
            <li class="sprite-stumbleupon"><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="StumbleUpon."></a></li>
            
            <li class="sprite-technorati"><a href="http://technorati.com/faves?sub=addfavbtn&add=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="add to technorati favorites"></a></li>
            
            <li class="sprite-reddit"><a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;amp;title=<?php the_title(); ?>" title="Vote on Reddit."></a></li>
            
            <li class="sprite-facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;amp;t=<?php the_title(); ?>" title="Share on Facebook.">
			</a></li>
            
             <li class="sprite-rss"><a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to our RSS feed." ></a></li>

        	</div><!--/SocialMedia-->
            <?php }?>
            
        </div><!--/subscribe-->
        <div class="clear"></div>
        
        <?php if(isset($swift_opt['swift_author_info_enable'])&&$swift_opt['swift_author_info_enable']==true){?>  
        <div id="author-info" class="clearfix">
        <h3>Article by <?php the_author_link(); ?></h3>
        <?php echo get_avatar(get_the_author_meta('user_email'),64); ?>
        <?php if(get_the_author_meta('user_description')):
					the_author_meta('user_description');
			  else:
			  echo "Authors bio is coming up shortly.";
			  endif;
									 ?>
  		</div><!--/author-info-->
        <?php }?>
        
        
        <?php if(get_the_tags()){?>
        <span class="tags clearfix">
		<?php the_author(); ?> tagged this post with:
        <?php the_tags('', ', ', ' '); ?>  
        <span class="alignright"> Read <?php the_author_posts(); ?>  articles by <?php the_author_posts_link(); ?></span>
        </span>
        <?php }?>
    </div><!--/rp-wrapper-->