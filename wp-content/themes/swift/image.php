<?php 
global $swift_opt;
get_header();
?>
<div id="content" class="grid_16 alpha">
<?php 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    	<h3 ><a href="<?php echo get_permalink($post->post_parent) ?>"  title="<?php printf( __( 'Return to %s', 'your-theme' ), esc_html( get_the_title($post->post_parent), 1 ) ) ?>" rev="attachment"><span class="meta-nav">&laquo; </span><?php echo get_the_title($post->post_parent) ?></a></h3>
        <!-- Display the Title as a link to the Post's permalink. -->
        <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
        
        <span class="border"></span>
        
        <div class="entry">
			<div class="entry-attachment">
            <a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'full' ); ?></a>
      		<div class="entry-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt() ?></div>
            </div>			
			<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'your-theme' )  ); ?>
			<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
        </div>
        <div class="clear"></div>
        <!-- Calling comments template -->
            <?php comments_template(); ?>
        <!-- <?php trackback_rdf(); ?> -->
        <!-- Stop The Loop (but note the "else:" - see next line). -->
        <?php endwhile; else: ?>
        
        <!-- The very first "if" tested to see if there were any Posts to -->
        <!-- display.  This "else" part tells what do if there weren't any. -->
        <p>Sorry, no posts matched your criteria.</p>
    
        <!-- REALLY stop The Loop. -->
<?php 
	endif;
?>
</div><!--/content-->
</div><!--/right container-->

<?php get_footer(); ?>