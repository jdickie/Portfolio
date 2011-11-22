<?php

function create_style_sheet(){
		$design_opt=get_option('swift_design_opt');
		//print_r($design_opt);
		@define('CB', ADMIN . '/css-base');
		$final=U_DIR. '/swift_custom/custom-style.css';//This is where our style sheet will be saved.
		$fp=fopen($final,'w');
		$data="";
		//Includes the CSS that controls the layout.
		if(!isset($design_opt['swift_layout']))
		$design_opt['swift_layout']="dummy";
		switch ($design_opt['swift_layout']) {
    	case "LeftSidebar":
        		$base=CB . '/left-sb.css'; break;
    	case "RightSidebar":
        		$base=CB . '/right-sb.css'; break;
		case "Centered":
				$base=CB.'/centered.css';break;
		default:
				$base=CB . '/right-sb.css';
		}
		$filehandle=fopen($base,'r');	//Reads the necessary file into fh.
		$data.= fread($filehandle, filesize($base)); //Writes the data in fh to data.
		
		//Includes the style sheet that controls header width.
		switch ($design_opt['swift_header']) {
    	case "full":
        		$base=CB . '/nav-full.css';
        		break;
    	case "960":
        		$base=CB . '/nav-960.css';
        		break;
		default:
				$base=CB . '/nav-full.css';
		}
		$filehandle=fopen($base,'r');	
		$data.= fread($filehandle, filesize($base));
		
		//Now we work on adding the colours to our layout.
		if(isset($design_opt['swift_customcolors_enable'])&&$design_opt['swift_customcolors_enable'] == true){
			
			$data.='body{background:#'.$design_opt['swift_body_bg'].' url("'.$design_opt['swift_body_bg_image'].'") '.$design_opt['swift_body_bg_image_repeat'].';color:#'.$design_opt['swift_body'].';}'."\n";
			
			$data.='#main-container{background:#'.$design_opt['swift_page_bg'].';}'."\n";
			$data.='#popular-posts-home{background:#'.$design_opt['swift_popular_bg'].';}'."\n";
			$data.='a{color:#'.$design_opt['swift_link'].';}'."\n";
			$data.='a:hover{color:#'.$design_opt['swift_link_hover'].';}'."\n";
			
			$data.='#header-container{background:#'.$design_opt['swift_header_bg'].' url("'.$design_opt['swift_header_bg_image'].'") '.$design_opt['swift_header_bg_image_repeat'].';}'."\n";
			
			$data.='h1.blogname a,h2.blogname a{color:#'.$design_opt['swift_blogname'].';}'."\n";
			$data.='h2.blog-title{color:#'.$design_opt['swift_blogtagline'].';}'."\n";
			$data.='#nav-ad-container{background:#'.$design_opt['swift_navad_bg'].';}'."\n";
			$data.='#nav1-container,#nav2-container{background:#'.$design_opt['swift_nav_bg'].';}'."\n";
			$data.='#nav1-container,#nav2-container{border-color:#'.$design_opt['swift_nav_border'].';}'."\n";
			$data.='ul.navigation li a,.navigation ul{background:#'.$design_opt['swift_nav_link_bg'].'}'."\n";
			$data.='.navigation li a,#rss-links,#rss-links a,ul.navigation li:hover a{color:#'.$design_opt['swift_nav_link'].'}'."\n";
			$data.='ul.navigation li a:hover,ul.navigation li:hover a:hover,.navigation li.current-menu-item a{background:#'.$design_opt['swift_nav_link_hover_bg'].';color:#'.$design_opt['swift_nav_link_hover'].';border-color:#'.$design_opt['swift_nav_link_hover_bg'].'}'."\n";
			$data.='.navigation a {border-color:#'.$design_opt['swift_nav_link_seperator'].'}'."\n";
			$data.='.navigation ul {border-color:#'.$design_opt['swift_nav_link_seperator'].'}'."\n";
	
			if($design_opt['swift_header']=="960"){
				if($design_opt['swift_nav_bg']!=$design_opt['swift_nav_link_seperator'] ||
				$design_opt['swift_nav_bg']!=$design_opt['swift_nav_link_bg']){
					$data.='ul.navigation{padding:3px 5px;}';
					$data.='.navigation li {margin:2px 3px}';
					}
			}
	
			//Slider Colours
			$data.='#jFlowSlide{background:#'.$design_opt['swift_slider_bg'].'}'."\n";
			$data.='.slide-details h2.title a{color:#'.$design_opt['swift_slider_post_title_color'].'}'."\n";
			$data.='.slide-details {color:#'.$design_opt['swift_slider_text_color'].'}'."\n";
			$data.='#myController{background:#'.$design_opt['swift_slider_nav_bg'].'}'."\n"; 
			$data.='#myController span{color:#'.$design_opt['swift_slider_nav_text_color'].';}'."\n";
			$data.='#myController span:hover,#myController span.jFlowSelected{background:#'.$design_opt['swift_slider_nav_text_hover_bg'].';}'."\n";
			
			//Slide2 colours
			$data.='#slider-wrapper{background:#'.$design_opt['swift_slider2_bg'].';border-color:#'.$design_opt['swift_slider2_border'].'}'."\n";
			$data.='.nivo-caption{background:#'.$design_opt['swift_slider2_post_title_bg'].';color:#'.$design_opt['swift_slider2_post_title'].'}'."\n";
			//Tabbed interface colours
			$data.='.tabbed_content{background:#'.$design_opt['swift_tabber_bg'].';}'."\n";
			$data.='.tabmenu{background:#'.$design_opt['swift_tabber_nav_bg'].'}'."\n";
			$data.='.tabs{background:#'.$design_opt['swift_tabber_nav_bg'].';color:#'.$design_opt['swift_tabber_nav_color'].'}'."\n";
			$data.='.tabs .tab_item:hover,.tabs .tab_item:active{background:#'.$design_opt['swift_tabber_nav_hover_bg'].';color:#'.$design_opt['swift_tabber_nav_hover_color'].'}'."\n";
			
			$data.='.tabslider{color:#'.$design_opt['swift_tabber_color'].'}'."\n";
			$data.='.tabslider a{color:#'.$design_opt['swift_tabber_link_color'].'}'."\n";
			$data.='.tabslider a:hover{color:#'.$design_opt['swift_tabber_link_hover_color'].'}'."\n";
			
			//Sidebar colours
		 	$data.='h4.widget-title,h4.widget-title a{background:#'.$design_opt['swift_sb_widget_title_bg'].';color:#'.$design_opt['swift_sb_widget_title_color'].'}'."\n";
			$data.='.widget{background:#'.$design_opt['swift_sb_widget_bg'].';color:#'.$design_opt['swift_sb_widget_color'].';border-color:#'.$design_opt['swift_sb_widget_title_bg'].';}'."\n";
			$data.='.widget a{color:#'.$design_opt['swift_sb_widget_link'].';}'."\n";
			$data.='.widget a:hover{color:#'.$design_opt['swift_sb_widget_link_hover'].';}'."\n";
			$data.='.widget ul li:hover{background:#'.$design_opt['swift_sb_widget_list_hover_bg'].';}'."\n";
			$data.='.widget ul li{border-color:#'.$design_opt['swift_sb_widget_list_border_color'].';}'."\n";

			//ADS widget
			$data.='img.banner125{background:#'.$design_opt['swift_sb_widget_title_bg'].';}'."\n";
			
			//Subscribe Widget
			$data.='.widget_subscribebox{border-color:#'.$design_opt['swift_subscribebox_border'].';background:#'.$design_opt['swift_subscribebox_bg'].' url("'.get_bloginfo('template_url').'/images/subscribe-bg.png") no-repeat 100% 0;color:#'.$design_opt['swift_subscribebox'].';}'."\n";
			

			//Footer colours
			$data.='#footer{background:#'.$design_opt['swift_footer_bg'].';}'."\n";
		 	$data.='#footer h4.widget-title,#footer h4.widget-title a{background:#'.$design_opt['swift_f_widget_title_bg'].';color:#'.$design_opt['swift_f_widget_title_color'].'}'."\n";
			$data.='#footer .widget{background:#'.$design_opt['swift_f_widget_bg'].';color:#'.$design_opt['swift_f_widget_color'].';border-color:#'.$design_opt['swift_f_widget_title_bg'].';}'."\n";
			$data.='#footer .widget a{color:#'.$design_opt['swift_f_widget_link'].';}'."\n";
			$data.='#footer .widget a:hover{color:#'.$design_opt['swift_f_widget_link_hover'].';}'."\n";
			$data.='#footer .widget ul li{background:none;}'."\n";
			$data.='#footer .widget ul li:hover{background:#'.$design_opt['swift_f_widget_list_hover_bg'].';}'."\n";
			$data.='#footer .widget ul li{border-color:#'.$design_opt['swift_f_widget_list_border_color'].';}'."\n";
			
			//ADS widget
			$data.='#footer img.banner125{background:none;}'."\n";
			
			//Single Post colours
			$data.='.post-title a{color:#'.$design_opt['swift_post_title'].';}'."\n";
			$data.='.post-title a:hover{color:#'.$design_opt['swift_post_title_hover'].';}'."\n";
			$data.='.entry blockquote{background:#'.$design_opt['swift_blockquote_bg'].' url("'.get_bloginfo('template_url').'/images/blockquote-bg.png")no-repeat 5px 1.2533em;border-color:#'.$design_opt['swift_blockquote_border'].';color:#'.$design_opt['swift_blockquote'].';}'."\n";
			$data.='.post-meta{color:#'.$design_opt['swift_post_meta'].';}'."\n";
			$data.='.post-meta a{color:#'.$design_opt['swift_post_meta_link'].';}'."\n";
			
			//Page Nav styling, Colours Inherited from navigation bar.
			$data.='.wp-pagenavi a,
					.wp-pagenavi .current,
					.wp-pagenavi .pages{background:#'.$design_opt['swift_nav_link_bg'].';color:#'.$design_opt['swift_nav_link'].'}'."\n";
			
			
			//Comments Template Colours
			$data.='li.comment{background:#'.$design_opt['swift_comment_bg'].';border-color:#'.$design_opt['swift_comment_border'].';color:#'.$design_opt['swift_comment'].';}'."\n";
			$data.='li.comment .avatar{background:#'.$design_opt['swift_comment_border'].';}'."\n";
			
				//Author Comment
			$data.='li.comment .bypostauthor{background:#'.$design_opt['swift_author_comment_bg'].';border-color:#'.$design_opt['swift_author_comment_border'].'}'."\n";
				//reply button
			$data.='div.reply a,
			#commentform #submit,
			a#cancel-comment-reply-link,
			span.post-a-comment a{background:#'.$design_opt['swift_reply_button_bg'].';color:#'.$design_opt['swift_reply_button'].';}'."\n";
			$data.='div.reply a:hover,
			#commentform #submit:hover{background:#'.$design_opt['swift_reply_button_hover_bg'].';}'."\n";
			
			//Comment form colors, Inherited from the comment colours.
			$data.='h3#comment-form-title{background:#'.$design_opt['swift_comment_border'].';color:#'.$design_opt['swift_comment'].';}'."\n";
			$data.='#commentform{background:#'.$design_opt['swift_comment_bg'].';color:#'.$design_opt['swift_comment'].';}'."\n";
			
			
			
			
			//Author Info and related posts box.
			$data.='#rp-wrapper{background:#'.$design_opt['swift_rp_bg'].';color:#'.$design_opt['swift_rp'].';}'."\n";
			$data.='#rp-wrapper a{color:#'.$design_opt['swift_rp_link'].';}'."\n";
			$data.='#rp-wrapper a:hover{color:#'.$design_opt['swift_rp_link_hover'].';}'."\n";
			$data.='#author-info,.post-nav{background:#'.$design_opt['swift_rp_author_bg'].';color:#'.$design_opt['swift_rp'].';}'."\n";
			
			
			//MagazineBox Colours
			$data.='.mag-box,.mag2-box{background:#'.$design_opt['swift_magbox_bg'].';color:#'.$design_opt['swift_magbox_color'].';}'."\n";
			$data.='.mag-thumb,.mag2-box,.thumb{background:#'.$design_opt['swift_magbox_bg'].';}'."\n";
			$data.='.mag-box h2.post-title a,.mag2-box h2.post-title a{color:#'.$design_opt['swift_magbox_post_title_color'].';}'."\n";
			$data.='.mag-box h2.post-title a:hover,.mag2-box h2.post-title a:hover{color:#'.$design_opt['swift_magbox_post_title_hover_color'].';}'."\n";


			$data.='.mag-meta{background:#'.$design_opt['swift_magmeta_bg'].';}'."\n";
			$data.='.mag-meta a{color:#'.$design_opt['swift_mag_fullstory'].';}'."\n";
			$data.='a.read-more{background:#'.$design_opt['swift_mag_fullstory_bg'].';}'."\n";
			$data.='a.read-more:hover{background:#'.$design_opt['swift_mag_fullstory_hover_bg'].';}'."\n";
			
			$data.='.mag-meta .mag-date{color:#'.$design_opt['swift_mag_date'].';}'."\n";
				
			//Copyright notice colours
			$data.='#copyright{background:#'.$design_opt['swift_copyright_bg'].';color:#'.$design_opt['swift_copyright'].';border-color:#'.$design_opt['swift_copyright_border'].'}'."\n";
			
			$data.='#copyright a{color:#'.$design_opt['swift_copyright'].'}'."\n";
			
		}
		else{
		/* If custom colours are not enabled then there are 2 caes to consider,
		
				1.Full Width Header.
				2.960px Wide Header.
				
		   We will use a SWITCH for that. Yeah too many switches, but they make the 
		   code easy to follow.
		*/
			switch ($design_opt['swift_header']) {
    		case "full":
        		$base=CB . '/nav-full-colors.css';
        		break;
    		case "960":
        		$base=CB . '/nav-960-colors.css';
        		break;
			}
			$filehandle=fopen($base,'r');	
			$data.= fread($filehandle, filesize($base));
		}
	
		
			//FONTS
			
		if(isset($design_opt['swift_customfonts_enable'])&&$design_opt['swift_customfonts_enable'] == true){
			//Primary (body)
			if($design_opt['swift_fontfamily']!="Use Default"){
			$data.='body{font-family:'.$design_opt['swift_fontfamily'].';font-size:'.$design_opt['swift_fontsize'].'}'."\n";
			}
			//SideBar Title
			$data.='h4.widget-title{font-family:'.$design_opt['swift_sb_title_fontfamily'].';font-size:'.$design_opt['swift_sb_title_fontsize'].'}'."\n";
			//Footer Title
			$data.='#footer h4.widget-title{font-family:'.$design_opt['swift_footer_title_fontfamily'].';font-size:'.$design_opt['swift_footer_title_fontsize'].'}'."\n";
			
			//SideBar
			$data.='.widget{font-size:'.$design_opt['swift_sb_fontsize'].'}'."\n";
			//Footer
			$data.='#footer .widget{font-size:'.$design_opt['swift_footer_fontsize'].'}'."\n";
			
			//Post title (home page)
			$data.='h2.post-title{font-family:'.$design_opt['swift_post_title_fontfamily_home'].';font-size:'.$design_opt['swift_post_title_fontszie_home'].';}'."\n";
	
			//Post title (Single page)
			$data.='h1.post-title{font-family:'.$design_opt['swift_post_title_fontfamily_single'].';font-size:'.$design_opt['swift_post_title_fontszie_single'].';}'."\n";	
			
			//Headings
			$data.='.entry h1,.entry h2,.entry h3,.entry h4,.entry h5,.entry h6{font-family:'.$design_opt['swift_post_headings_fontfamily'].';}'."\n";
					
			//Post
			$data.='#content{font-size:'.$design_opt['swift_post_fontsize'].';}'."\n";
		}
			
			//Rounded Corners
			if(isset($design_opt['swift_rc_nav_disable'])&&$design_opt['swift_rc_nav_disable']=="true")
			$data.=	'#nav1-container,#nav2-container {	-moz-border-radius:0;-webkit-border-radius: 0;}';
			
			if(isset($design_opt['swift_rc_sb_disable'])&&$design_opt['swift_rc_sb_disable']=="true")
			$data.=	'.widget{	-moz-border-radius:0;-webkit-border-radius: 0;}';
			
			//Background Images
			if($childtheme=$design_opt['swift_childtheme']){
				$childtheme_url=get_bloginfo('template_url').'/child-themes/'.$design_opt['swift_childtheme'].'/';
				if($design_opt['swift_body_bg_image'])
				$data.='body{background:#'.$design_opt['swift_body_bg'].' url("'.$childtheme_url.$design_opt['swift_body_bg_image'].'") '.$design_opt['swift_body_bg_image_repeat'].';}'."\n";
				
				if($design_opt['swift_header_bg_image'])
				$data.='#header-container{background:#'.$design_opt['swift_header_bg'].'  url(\''.$childtheme_url.$design_opt['swift_header_bg_image'].'\') '.$design_opt['swift_header_bg_image_repeat'].';}'."\n";
			
				if($design_opt['swift_content_bg_image'])
				$data.='#header-container{background: url(\''.$childtheme_url.$design_opt['swift_content_bg_image'].'\') '.$design_opt['swift_content_bg_image_repeat'].';}'."\n";

				
			}
			else{
				if($design_opt['swift_body_bg_image'])
				$data.='body{background:#'.$design_opt['swift_body_bg'].' url("'.$design_opt['swift_body_bg_image'].'") '.$design_opt['swift_body_bg_image_repeat'].';}'."\n";
			
				if($design_opt['swift_header_bg_image'])
				$data.='#header-container{background:#'.$design_opt['swift_header_bg'].'  url(\''.$design_opt['swift_header_bg_image'].'\') '.$design_opt['swift_header_bg_image_repeat'].';}'."\n";
				
				if($design_opt['swift_content_bg_image'])
				$data.='#main-container{background: url(\''.$design_opt['swift_content_bg_image'].'\') '.$design_opt['swift_content_bg_image_repeat'].';}'."\n";
			}
			//Custom CSS
			if(isset($design_opt['swift_customCSS_enable'])&&$design_opt['swift_customCSS_enable']=="true"&&
			isset($design_opt['swift_customCSS_enable'])&&$design_opt['swift_customCSS'])
			$data.=stripslashes($design_opt['swift_customCSS'])."\n";
			
fwrite($fp,$data);
			
}
?>