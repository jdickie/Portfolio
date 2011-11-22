<?php global $opt;?>

			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword">This post is password protected. Enter the password to view any comments.</p>
			</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
			<h3 id="comments-title"><?php comments_number('No Comments', 'One Comments', '% Comments' );?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link('<span class="meta-nav">&larr;</span> Older Comments'); ?></div>
				<div class="nav-next"><?php next_comments_link('Newer Comments <span class="meta-nav">&rarr;</span>', 'twentyten'); ?></div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>

            <ol class="commentlist">
            <?php wp_list_comments('type=comment&avatar_size=32'); ?>
            </ol>
        
            <div id="comment-nav">
            <?php paginate_comments_links();?>
            </div>
            
            <ul class="commentlist">
            <?php wp_list_comments('type=pings'); ?>
            </ul>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link('<span class="meta-nav">&larr;</span> Older Comments'); ?></div>
				<div class="nav-next"><?php next_comments_link('Newer Comments <span class="meta-nav">&rarr;</span>'); ?></div>
			</div><!-- .navigation -->
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) :
?>
	<p class="nocomments">Comments are closed</p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</div><!-- #comments -->
