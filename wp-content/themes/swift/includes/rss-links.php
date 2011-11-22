    	 <ul id="rss-links">
         <li class="text">RSS :</li>
						<li class="first"><a href="<?php if ( $swift_opt['swift_feedburnerid'] <> "" ) { echo "http://feeds.feedburner.com/".$swift_opt['swift_feedburnerid']; } else { echo get_bloginfo_rss('rss2_url'); } ?>">Posts</a></li>
						<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments</a></li>
						<?php if ($swift_opt['swift_feedburnerid']) { ?><li class="last"><a href="http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $swift_opt['swift_feedburnerid']; ?>" target="_blank">Email</a></li><?php } ?>
		</ul>