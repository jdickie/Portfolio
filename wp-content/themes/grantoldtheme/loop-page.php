<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */

	/**
	* Making edits using Textmate
	* @author Grant Dickie
	*
	*/
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<div class="entry-content">
							<!-- vslider -->
							<?php if(function_exists('vslider')){ vslider('OnlineProjects'); }?>
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
							
						</div>
						<hr />
						<div class="skills">
						<h2>Skills in Brief</h2>
							<div class="body">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="current-post">
						<h2>Current Post</h2>
							<div class="body">
							<?php 
								$args = array('numberposts' => 3, 'order' => 'DESC');
								$postslist = get_posts($args);
							?>
							<?php foreach ($postslist as $post) :  setup_postdata($post); ?>
								<div class="frontpage_post">
									<?php the_date(); ?>
									<br />
									<h3 class="frontpage_post_h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<hr style="width: 20%;" />
									<?php the_excerpt(); ?>
								</div>
							<?php endforeach; ?>
							</div>
						</div>
						<div class="contact-front">
							<h2>Contact</h2>
							<div class="body">
								<span>jgrantd <strong>at</strong> gmail <strong>dot</strong> com</span>
								<span><a href="http://twitter.com/{screen_name}" class="twitter-follow-button" data-show-count="false">Follow @jgrantd</a>
								<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script></span>
							</div>
						</div>
						<hr style="width: 100%;" />
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
							
						</div>
					<?php } ?>

					<!-- .entry-content -->
				</div><!-- #post-## -->

			

<?php endwhile; // end of the loop. ?>