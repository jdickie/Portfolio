<?php global $swift_opt;?>
<!--End of main-container started in header.php-->
</div><!--/main-container-->

<div id="footer-container">
	<div  class="grid_960 clearfix">	
		<div id="footer" class="grid_16 alpha">

            <div class="grid_4 footer-widgets alpha">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer-1') ) ?>
            </div><!--End of footer-1 -->
    
            <div class="grid_4 footer-widgets">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer-2') ) ?>
            </div><!--End of footer-2 -->

            <div class="grid_4 footer-widgets">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer-3') ) ?>
            </div><!--End of footer-3 -->
        
            <div class="grid_4 footer-widgets omega">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer-4') ) ?>
            </div><!--End of footer-4 -->
    
		</div><!--/footer-->
	</div><!--/grid_960-->
	<div class="clear"></div>
</div><!--/footer-container-->

<div id="copyright-container">
<div id="copyright">
       <span class="alignleft">
       
       
    <?php wp_nav_menu( array('container'=>'',
							'menu_class' => '',
							'menu_id' => 'footer-links',
							'fallback_cb'=>'',
							'theme_location'=>'footer-links')); ?></span>
    
        <span class="alignright">Theme SWIFT by <a href="http://swiftthemes.com/about/"><strong>Satish Gandham</strong></a>, a product of <a href="http://swiftthemes.com"><strong>SwiftThemes.Com</strong></a></span>
        
    <div class="clear"></div>
<span class="alignleft">Copyright &copy; 2011&nbsp;<a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a> | <a href="<?php echo home_url(); ?>/feed/">Entries (RSS)</a> and <a href="<?php echo home_url(); ?>/comments/feed/">Comments (RSS)</a></span> 
<span class="alignright">powered by <a href="http://wordpress.org/" rel="nofollow">WordPress</a> <a href="#top" id="backtotop">[Back to top &uarr; ]</a></span>
    <div class="clear"></div>
</div><!--copyright-container-->
</div><!--/copyright -->

<?php wp_footer(); ?>
<script type="text/javascript">
jQuery("a#backtotop").click(function() {
  jQuery("html,body").animate({scrollTop: "0px"}, "slow");

});
</script>
<?php 
if ($footer_code=$swift_opt['swift_footer_scripts']) echo stripslashes($footer_code);?>
<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
</body>
</html>