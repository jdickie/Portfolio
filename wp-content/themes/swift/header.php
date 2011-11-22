<?php global $swift_opt;?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title>
<?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
<?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Search Results<?php } ?>
<?php if ( is_author() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Author Archives<?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_category() ) { ?>Archive&nbsp;|&nbsp;<?php single_cat_title(); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_month() ) { ?>Archive&nbsp;|&nbsp;<?php the_time(get_option('date_format')); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
</title>
<?php if(!(isset($swift_opt['swift_favicon'])&&$temp=$swift_opt['swift_favicon'])) { 
	$temp=get_template_directory_uri().'/images/favicon.ico'; ?>
<link rel="shortcut icon" href="<?php echo $temp;?>"  />
<?php } ?>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />  
<link rel="stylesheet" type="text/css" href="<?php echo U_URL.'/swift_custom';?>/custom-style.css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( $swift_opt['swift_feedburnerid'] ) { echo "http://feeds.feedburner.com/".$swift_opt['swift_feedburnerid']; } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php 
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-tabs');
?>
<?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); 
if(function_exists('bp_head')) do_action( 'bp_head' );
?>
<script language="javascript" type="text/javascript" src="<?php echo U_URL.'/swift_custom';?>/swift-js-functions.js"></script>

<?php if (isset($swift_opt['swift_header_scripts'])&&$header_scripts=$swift_opt['swift_header_scripts']) { echo stripslashes($header_scripts);}?>
</head>
<body <?php body_class(); ?>>
<div id="top"></div>
<div id="nav1-container" class="clearfix">
	<div id="nav1" class="grid_960">
    <?php wp_nav_menu( array('container'=>'',
							'menu_class' => 'navigation top',
							'menu_id' => '',
							'fallback_cb'=>'wp_page_menu',
							'theme_location'=>'top-nav')); ?>
     <?php if(isset($swift_opt['swift_rsslinks_enable'])&&$swift_opt['swift_rsslinks_enable']==true) include (INCLUDES . '/rss-links.php');?>
     </div>
</div><!--/nav1-container-->

<div id="header-container">
	<div id="header" class="grid_960 clearfix">
    	<div class="grid_16">
        
			<?php if(isset($swift_opt['swift_logo'])&&$swift_opt['swift_logo']): ?>
            <div id="logo" class="alignleft">
                <a href="<?php echo home_url(); ?>" title="<?php bloginfo('description'); ?>">
                <img src="<?php echo $swift_opt['swift_logo']?>" alt="<?php bloginfo('name'); ?>"  /></a>
            </div><!--/logo-->
            
            <?php else:?>   
                    <div id="blogname" class="alignleft">
                    <?php if(is_home()):?>
                    <h1 class="blogname"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
                    <?php else:?>
                    <h2 class="blogname"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h2>   
                    <?php endif?>                 
                    <h2 class="blog-title"><?php bloginfo('description'); ?></h2>
                    </div>
            <?php endif;?>
                      
            <?php //Inserts the header ad code ?>
            <?php if ( isset($swift_opt['swift_header_ad_enable'])&&$swift_opt['swift_header_ad_enable'] ==true && $headerad=$swift_opt['swift_header_adcode'] ){ ?>
            <div id="header-ad" class="alignright">
            <?php echo stripslashes($headerad);?>
            </div><!--/header-ad"-->
            <?php }//End of if ?>
            
            <div class="clear"></div>
        
        </div>
    </div><!--/header-->
</div><!--/header-container-->


<div id="nav2-container" class="clearfix">
	<div id="nav2" class="grid_960">
    <?php wp_nav_menu( array('container'=>'',
							'menu_class' => 'navigation bottom',
							'menu_id' => '',
							'fallback_cb'=>'wp_cat_menu',
							'theme_location'=>'bottom-nav')); ?>
     <?php if(isset($swift_opt['swift_searchbox_enable'])&&$swift_opt['swift_searchbox_enable']==true) 	locate_template(array('searchform-nav.php'), true, false );?>
     </div>
</div><!--/nav1-container-->



<?php //Inserts adcode below navigation
	if (isset($swift_opt['swift_nav_adsense_enable'])&&$swift_opt['swift_nav_adsense_enable'] ==true && $adcode=$swift_opt['swift_nav_adcode']){ ?>
		<div id="nav-ad-container" class="clearfix">
			<div id="nav-ad" class="grid_960">
                <div class="grid_16">
                <?php echo stripslashes($adcode); ?>
                </div>
			</div>
		</div>
<?php }//end of if ?>

<!--Contains content area and sidebar, closing div in footer.php-->
<div id="main-container" class="grid_960 clearfix">
<div id="right-container">
