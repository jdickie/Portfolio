<?php 
$fontstack=array(
				'Use Default',
				'Georgia, \'Times New Roman\', Times, serif',
				'Verdana, Geneva, sans-serif',
				'\'Courier New\', Courier, monospace',
				'Arial, Helvetica, sans-serif',
				'Tahoma, Geneva, sans-serif',
				'\'Trebuchet MS\', Arial, Helvetica, sans-serif',
				'\'Arial Black\', Gadget, sans-serif',
				'\'Times New Roman\', Times, serif',
				'\'Palatino Linotype\', \'Book Antiqua\', Palatino, serif',
				'\'Lucida Sans Unicode\', \'Lucida Grande\', sans-serif',
				'\'MS Serif\', \'New York\', serif',
				'\'Lucida Console\', Monaco, monospace',
				'\'Comic Sans MS\', cursive');
global $fontstack;

$bgtype=array(	'repeat',
				'no-repeat',
				'repeat-x',
				'repeat-y'
			);
global $bgtype;

$shortname2 = "swift";
$GLOBALS['template_path'] = get_template_directory_uri();
global $themename, $shortname2, $swift_design_options;
////////////////////////
$swift_design_options[] = array();

//Background Images
$swift_design_options[] =array("name" => "bgImages",
							   "type" => "tab-title",
					"datatype"=>"none");
							   
$swift_design_options[] = array( "name" => "Child theme",
					"desc" => "Enter the name of the folder in which your images are stored.<br /><b>Note</b>: This option is for child theme developers, if you are not using child themes, Ignore it.",
					"id" => $shortname."_childtheme",
					"std" => "",
					"type" => "regulartext",
					"datatype"=>"text"); 							   

$swift_design_options[] = array( "name" => "Body background",
					"desc" => "Enter the URL of the image to be used as the body background.",
					"id" => $shortname."_body_bg_image",
					"std" => "",
					"type" => "regulartext",
					"datatype"=>"text"); 

$swift_design_options[] = array( "name" => "Body background image repeat:",
					"desc" => "Select repeat to repeat it in both directions.",
					"id" => $shortname."_body_bg_image_repeat",
					"std" => "no-repeat",
					"type" => "select",
					"options" => $bgtype,
					"datatype"=>"select"); 

$swift_design_options[] = array( "name" => "Header background",
					"desc" => "Enter the URL of the image to be used as the header background.",
					"id" => $shortname."_header_bg_image",
					"std" => "",
					"type" => "regulartext",
					"datatype"=>"text"); 

$swift_design_options[] = array( "name" => "Image Repeat",
					"desc" => "Select repeat to repeat it in both directions.",
					"id" => $shortname."_header_bg_image_repeat",
					"std" => "no-repeat",
					"type" => "select",
					"options" => $bgtype,
					"datatype"=>"select"); 
					
$swift_design_options[] = array( "name" => "Content background",
					"desc" => "Enter the URL of the image to be used as background for the div that contains post content,comemnts and the sidebar.<br /><b>Tip</b>:Repeat a thin strip of width 960px vertically to have different colours for posts div and the sidebar",
					"id" => $shortname."_content_bg_image",
					"std" => "",
					"type" => "regulartext",
					"datatype"=>"text"); 

$swift_design_options[] = array( "name" => "Image Repeat",
					"desc" => "Select repeat to repeat it in both directions.",
					"id" => $shortname."_content_bg_image_repeat",
					"std" => "no-repeat",
					"type" => "select",
					"options" => $bgtype,
					"datatype"=>"select"); 				

$swift_design_options[]=array("type" => "close",
					"datatype"=>"none");	 
//Layout Options
$swift_design_options[] =array("name" => "Layout",
							   "type" => "tab-title",
					"datatype"=>"none");

$swift_design_options[] = array( "name" => "Full width header / 960px header",
					"desc" => "Select a layout",
					"id" => $shortname."_header",
					"std" => "full",
					"type" => "radio",
					"options" => array('full','960'),
					"datatype"=>"radio"); 

$swift_design_options[] = array( "name" => "Select the sidebar postion.",
					"desc" => "",
					"id" => $shortname."_layout",
					"std" => "RightSidebar",
					"type" => "radio",
					"options" => array('LeftSidebar','RightSidebar','Centered'),
					"datatype"=>"radio"); 

$swift_design_options[] = array( "name" => "Home page style",
					"desc" => "Select a layout for home page",
					"id" => $shortname."_magazine",
					"std" => "magazine_full",
					"type" => "radio",
					"options" => array('magazine','magazine_full','blog'),
					"datatype"=>"radio"); 

$swift_design_options[] = array( "name" => "Archive pages style:",
					"desc" => "Select a layout for archives page",
					"id" => $shortname."_archives_magazine",
					"std" => "blog",
					"type" => "radio",
					"options" => array('magazine','magazine_full','blog'),
					"datatype"=>"radio"); 


$swift_design_options[]=array("type" => "close",
					"datatype"=>"none");	

//Font Options

$swift_design_options[] =array("name" => "Fonts",
							   "type" => "tab-title",
					"datatype"=>"none");

$swift_design_options[] = array(  "name" => "Enable custom fonts",
        			"desc" => "Check this box if you want to use custom fonts.",
        			"id" => $shortname."_customfonts_enable",
        			"type" => "checkbox",
        			"std" => false,
					"datatype"=>"boolean");
$swift_design_options[] = array( "name" => "Primary font family and size",
					"desc" => "The font family you select will be the primary font used on your blog.",
					"id" => $shortname."_fontfamily",
					"std" => "Georgia, Times, serif",
					"type" => "select",
					"options" => $fontstack);
					
$swift_design_options[] = array( "name" => "Font size",
					"desc" => "The font family and size you select will be the primary font family and size used on your blog.",
					"id" => $shortname."_fontsize",
					"std" => "12px",
					"type" => "fontsize",
					"options" => array('8px','9px','10px','11px','12px','13px','14px','15px','16px','17px','18px','19px','20px','24px'),
					"datatype"=>"select"); 
$swift_design_options[] = array( "name" => "Sidebar title font family and size",
					"desc" => "",
					"id" => $shortname."_sb_title_fontfamily",
					"std" => "Georgia, Times, serif",
					"type" => "select",
					"options" => $fontstack,
					"datatype"=>"select");
					
$swift_design_options[] = array( "name" => "Font size",
					"desc" => "Sidebar font size is proportional to the primary font size. This parameter determines by how much it must be multiplied. For example, if your primary font size is 10px and you select .8em here, the sidebar font size will be 80% of 10px = 8px.",
					"id" => $shortname."_sb_title_fontsize",
					"std" => "1em",
					"type" => "fontsize",
					"options" => array('.5em','.6em','.7em','.8em','.9em','1em','1.1em','1.2em','1.3em','1.4em','1.5em','1.6em','1.7em','1.8em','1.9em','2em'),
					"datatype"=>"select");

$swift_design_options[] = array( "name" => "Footer title font family and size",
					"desc" => "",
					"id" => $shortname."_footer_title_fontfamily",
					"std" => "Georgia, Times, serif",
					"type" => "select",
					"options" => $fontstack,
					"datatype"=>"select");
$swift_design_options[] = array( "name" => "Font size",
					"desc" => "",
					"id" => $shortname."_footer_title_fontsize",
					"std" => "1em",
					"type" => "fontsize",					
					"options" => array('.5em','.6em','.7em','.8em','.9em','1em','1.1em','1.2em','1.3em','1.4em','1.5em','1.6em','1.7em','1.8em','1.9em','2em'),
					"datatype"=>"select");
					
$swift_design_options[] = array( "name" => "Post title font family and size | Home",
					"desc" => "Select a font family for the titles of posts on home page and single post page.",
					"id" => $shortname."_post_title_fontfamily_home",
					"std" => "Georgia, Times, serif",
					"type" => "select",
					"options" => $fontstack,
					"datatype"=>"select");

$swift_design_options[] = array( "name" => "Font size",
					"desc" => "Select the font family and size for the titles of posts on home page, choose a smaller number if you are using magazine layout.",
					"id" => $shortname."_post_title_fontszie_home",
					"std" => "3em",
					"type" => "fontsize",					
					"options" => array('.5em','.6em','.7em','.8em','.9em','1em','1.1em','1.2em','1.3em','1.4em','1.5em','1.6em','1.7em','1.8em','1.9em','2em','3em'),
					"datatype"=>"select");
					
$swift_design_options[] = array( "name" => "Post title font family and size | Single page",
					"desc" => "Select a font family for the titles of posts on home page and single post page.",
					"id" => $shortname."_post_title_fontfamily_single",
					"std" => "Georgia, Times, serif",
					"type" => "select",
					"options" => $fontstack,
					"datatype"=>"select");

$swift_design_options[] = array( "name" => "Font size",
					"desc" => "Select a font family and size for the titles of posts on single post page.",
					"id" => $shortname."_post_title_fontszie_single",
					"std" => "3em",
					"type" => "fontsize",					
					"options" => array('.5em','.6em','.7em','.8em','.9em','1em','1.1em','1.2em','1.3em','1.4em','1.5em','1.6em','1.7em','1.8em','1.9em','2em','3em'),
					"datatype"=>"select");

$swift_design_options[] = array( "name" => "Headings font family (h1,h2..h6 tags) used in post",
					"desc" => "Select a font family for headings (h1,h2..h6 tags) used in post",
					"id" => $shortname."_post_headings_fontfamily",
					"std" => "Georgia, Times, serif",
					"type" => "select",
					"options" => $fontstack);
$swift_design_options[]=array("type" => "clear",
					"datatype"=>"none");	
					
$swift_design_options[] = array( "name" => "Post content font size",
					"desc" => "Changes the font size of your post content, without affecting other parts of the site.",
					"id" => $shortname."_post_fontsize",
					"std" => "1em",
					"type" => "fontsize",					
					"options" => array('.5em','.6em','.7em','.8em','.9em','1em','1.1em','1.2em','1.3em','1.4em','1.5em','1.6em','1.7em','1.8em','1.9em','2em'),
					"datatype"=>"select");
					
$swift_design_options[]=array("type" => "clear",
					"datatype"=>"none");

$swift_design_options[] = array( "name" => "Select a Sidebar Font Size",
					"desc" => "Sidebar font size is proportional to the primary font size. This parameter determines by how much it must be multiplied. For example, if your primary font size is 10px and you select .8em here, the sidebar font size will be 80% of 10px = 8px.",
					"id" => $shortname."_sb_fontsize",
					"std" => "1em",
					"type" => "select",
					"options" => array('.5em','.6em','.7em','.8em','.9em','1em','1.1em','1.2em','1.3em','1.4em','1.5em','1.6em','1.7em','1.8em','1.9em','2em'),
					"datatype"=>"select");
					
$swift_design_options[] = array( "name" => "Select a Footer Font Size",
					"desc" => "Footer font size is proportional to the primary font size. This parameter determines by how much it must be multiplied. For example, if your primary font size is 10px and you select .8em here, the footer font size will be 80% of 10px = 8px.",
					"id" => $shortname."_footer_fontsize",
					"std" => "1em",
					"type" => "select",					
					"options" => array('.5em','.6em','.7em','.8em','.9em','1em','1.1em','1.2em','1.3em','1.4em','1.5em','1.6em','1.7em','1.8em','1.9em','2em'),
					"datatype"=>"select");
					
$swift_design_options[]=array("type" => "clear",
					"datatype"=>"none");
					
					
$swift_design_options[]=array("type" => "close",
					"datatype"=>"none");	
  

$swift_design_options[] =array("name" => "colors",
							   "type" => "tab-title",
					"datatype"=>"none");

$swift_design_options[] = array(  "name" => "Enable custom colors",
        			"desc" => "Check this box if you want to use custom colours.",
        			"id" => $shortname."_customcolors_enable",
        			"type" => "checkbox",
        			"std" => false,
					"datatype"=>"boolean");

//Backgrounds//Backgrounds
$swift_design_options[] = array( "name" => "Backgrounds",
                    "type" => "heading");

$swift_design_options[] = array( "name" => "Body Background",
					"desc" => "",
					"id" => $shortname."_body_bg",
					"std" => "FFF",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Main content BG",
					"desc" => "",
					"id" => $shortname."_page_bg",
					"std" => "FFF",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Popular posts BG",
					"desc" => "",
					"id" => $shortname."_popular_bg",
					"std" => "EEE",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Main font colour",
					"desc" => "",
					"id" => $shortname."_body",
					"std" => "000",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Link Color",
					"desc" => "",
					"id" => $shortname."_link",
					"std" => "069",
					"type" => "text");

$swift_design_options[] = array( "name" => "Link Hover Color",
					"desc" => "",
					"id" => $shortname."_link_hover",
					"std" => "F60",
					"type" => "text");

$swift_design_options[]=array("type" => "close");	


//Header and navigation colour options
$swift_design_options[] = array( "name" => "Header and Navigation Colours",
                    "type" => "heading");

$swift_design_options[] = array( "name" => "Header BG color",
					"desc" => "",
					"id" => $shortname."_header_bg",
					"std" => "FFF",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Blog Name Color",
					"desc" => "",
					"id" => $shortname."_blogname",
					"std" => "069",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Blog Tagline Color",
					"desc" => "",
					"id" => $shortname."_blogtagline",
					"std" => "666",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Background for ad below navigations",
					"desc" => "",
					"id" => $shortname."_navad_bg",
					"std" => "F6F6F6",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Navigation Background",
					"desc" => "",
					"id" => $shortname."_nav_bg",
					"std" => "F2F2F2",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Navigation border (Used in WideHeader layout)",
					"desc" => "",
					"id" => $shortname."_nav_border",
					"std" => "069",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Navigation link seperator (Used as seperator in wide header layout and as border in 960px wide layout)",
					"desc" => "Used as seperator in wide header layout and as border in 960px wide layout",
					"id" => $shortname."_nav_link_seperator",
					"std" => "EEE",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Link Background",
					"desc" => "",
					"id" => $shortname."_nav_link_bg",
					"std" => "f2f2f2",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Link Hover Background",
					"desc" => "",
					"id" => $shortname."_nav_link_hover_bg",
					"std" => "069",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Link Color",
					"desc" => "",
					"id" => $shortname."_nav_link",
					"std" => "000",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Link Hover Color",
					"desc" => "",
					"id" => $shortname."_nav_link_hover",
					"std" => "FFF",
					"type" => "text"); 
$swift_design_options[]=array("type" => "close");	
//Slider Colour Options
$swift_design_options[] = array( "name" => "Slider Options",
                    "type" => "heading");

$swift_design_options[] = array( "name" => "Slider Background",
					"desc" => "",
					"id" => $shortname."_slider_bg",
					"std" => "d7e5ed",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Slider Post title Color",
					"desc" => "",
					"id" => $shortname."_slider_post_title_color",
					"std" => "006699",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Slider Text Color",
					"desc" => "",
					"id" => $shortname."_slider_text_color",
					"std" => "000",
					"type" => "text"); 
                    
$swift_design_options[] = array( "name" => "Slider Navigation BG",
					"desc" => "",
					"id" => $shortname."_slider_nav_bg",
					"std" => "43a0d5",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Slider Navigation Text Color",
					"desc" => "",
					"id" => $shortname."_slider_nav_text_color",
					"std" => "FFF",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Slider Navigation Text hover background",
					"desc" => "",
					"id" => $shortname."_slider_nav_text_hover_bg",
					"std" => "3ab7ff",
					"type" => "text"); 
$swift_design_options[]=array("type" => "close");	

//Slider2 Colour Options
$swift_design_options[] = array( "name" => "Full size image slider",
                    "type" => "heading");

$swift_design_options[] = array( "name" => "Slider Background",
					"desc" => "",
					"id" => $shortname."_slider2_bg",
					"std" => "f6f6f6",
					"type" => "text"); 
$swift_design_options[] = array( "name" => "Slider Border",
					"desc" => "",
					"id" => $shortname."_slider2_border",
					"std" => "f6f6f6",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Post title Background",
					"desc" => "",
					"id" => $shortname."_slider2_post_title_bg",
					"std" => "000",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Post title color",
					"desc" => "",
					"id" => $shortname."_slider2_post_title",
					"std" => "FFF",
					"type" => "text"); 
$swift_design_options[]=array("type" => "close");	


////////////////////////////////////////
////Tabbed interface Colour Options////
//////////////////////////////////////
$swift_design_options[] = array( "name" => "Tabber Options",
                    "type" => "heading");

$swift_design_options[] = array( "name" => "Tabs Background",
					"desc" => "",
					"id" => $shortname."_tabber_bg",
					"std" => "d7e5ed",
					"type" => "text"); 
					
$swift_design_options[] = array( "name" => "Tabs Navigation Background",
					"desc" => "",
					"id" => $shortname."_tabber_nav_bg",
					"std" => "43a0d5",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Tabs Navigation Text Colour",
					"desc" => "",
					"id" => $shortname."_tabber_nav_color",
					"std" => "FFF",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Tabs Navigation Hover Background",
					"desc" => "",
					"id" => $shortname."_tabber_nav_hover_bg",
					"std" => "43a0d5",
					"type" => "text");
					
$swift_design_options[] = array( "name" => "Tabs Navigation Text Hover Colour",
					"desc" => "",
					"id" => $shortname."_tabber_nav_hover_color",
					"std" => "000",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Tabs Text Colour",
					"desc" => "",
					"id" => $shortname."_tabber_color",
					"std" => "000",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Tabs link Colour",
					"desc" => "",
					"id" => $shortname."_tabber_link_color",
					"std" => "069",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Tabs link Hover Colour",
					"desc" => "",
					"id" => $shortname."_tabber_link_hover_color",
					"std" => "f60",
					"type" => "text"); 
$swift_design_options[]=array("type" => "close");	

///////////////////////////
//Sidebar Colour Options//
/////////////////////////

$swift_design_options[] = array( "name" => "Sidebar Options",
                    "type" => "heading");

$swift_design_options[] = array( "name" => "Widget title Background",
					"desc" => "",
					"id" => $shortname."_sb_widget_title_bg",
					"std" => "DDD",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Widget title Color",
					"desc" => "",
					"id" => $shortname."_sb_widget_title_color",
					"std" => "000",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Widget Background",
					"desc" => "",
					"id" => $shortname."_sb_widget_bg",
					"std" => "f6f6f6",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Widget text color",
					"desc" => "",
					"id" => $shortname."_sb_widget_color",
					"std" => "000",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Widget Link Color",
					"desc" => "",
					"id" => $shortname."_sb_widget_link",
					"std" => "069",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Widget Link Hover Color",
					"desc" => "",
					"id" => $shortname."_sb_widget_link_hover",
					"std" => "F60",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Widget List Hover Background",
					"desc" => "",
					"id" => $shortname."_sb_widget_list_hover_bg",
					"std" => "DDD",
					"type" => "text"); 
$swift_design_options[] = array( "name" => "Widget List border color",

					"desc" => "",
					"id" => $shortname."_sb_widget_list_border_color",
					"std" => "DDD",
					"type" => "text"); 

$swift_design_options[]=array("type" => "close");

///////////////////////////
// Footer Colour Options//
/////////////////////////

$swift_design_options[] = array( "name" => "Footer Options",
                    "type" => "heading");

$swift_design_options[] = array( "name" => "Footer Background",
					"desc" => "",
					"id" => $shortname."_footer_bg",
					"std" => "04486a",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Widget title Background",
					"desc" => "",
					"id" => $shortname."_f_widget_title_bg",
					"std" => "04486a",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Widget title Color",
					"desc" => "",
					"id" => $shortname."_f_widget_title_color",
					"std" => "F8F8F8",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Widget Background",
					"desc" => "",
					"id" => $shortname."_f_widget_bg",
					"std" => "04486a",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Widget text color",
					"desc" => "",
					"id" => $shortname."_f_widget_color",
					"std" => "DDD",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Widget Link Color",
					"desc" => "",
					"id" => $shortname."_f_widget_link",
					"std" => "FFF",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Widget Link Hover Color",
					"desc" => "",
					"id" => $shortname."_f_widget_link_hover",
					"std" => "FFF",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Widget List Hover Background",
					"desc" => "",
					"id" => $shortname."_f_widget_list_hover_bg",
					"std" => "NONE",
					"type" => "text"); 
$swift_design_options[] = array( "name" => "Widget List border color",
					"desc" => "",
					"id" => $shortname."_f_widget_list_border_color",
					"std" => "DDD",
					"type" => "text"); 

$swift_design_options[]=array("type" => "close");

///////////////////////////////
// Single post page Options //
/////////////////////////////

$swift_design_options[] = array( "name" => "Single post page",
                    "type" => "heading");

$swift_design_options[] = array( "name" => "Post title color",
					"desc" => "",
					"id" => $shortname."_post_title",
					"std" => "069",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Post title hover color",
					"desc" => "",
					"id" => $shortname."_post_title_hover",
					"std" => "F60",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Blockquote background colour",
					"desc" => "",
					"id" => $shortname."_blockquote_bg",
					"std" => "F6F6F6",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Blockquote border colour",
					"desc" => "",
					"id" => $shortname."_blockquote_border",
					"std" => "EEE",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Blockquote colour",
					"desc" => "",
					"id" => $shortname."_blockquote",
					"std" => "333",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Post meta colour",
					"desc" => "For this text under post title,<em>Filed under Cat A, Cat B by admin  on September 3, 2008 at 11:02 pm</em>",
					"id" => $shortname."_post_meta",
					"std" => "BBB",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Post meta link colour",
					"desc" => "",
					"id" => $shortname."_post_meta_link",
					"std" => "069",
					"type" => "text"); 

$swift_design_options[]=array("type" => "close");

////////////////////////////////
// Comments template Options //
//////////////////////////////
$swift_design_options[] = array( "name" => "Comments Template",
                    "type" => "heading");

$swift_design_options[] = array( "name" => "Comment background",
					"desc" => "",
					"id" => $shortname."_comment_bg",
					"std" => "f6f6f6",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Comment border",
					"desc" => "",
					"id" => $shortname."_comment_border",
					"std" => "DDD",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Author comment background",
					"desc" => "",
					"id" => $shortname."_author_comment_bg",
					"std" => "cdecfc",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Author comment border",
					"desc" => "",
					"id" => $shortname."_author_comment_border",
					"std" => "8ad7fe",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Comment Text Color",
					"desc" => "",
					"id" => $shortname."_comment",
					"std" => "000",
					"type" => "text");

$swift_design_options[] = array( "name" => "Reply button color",
					"desc" => "",
					"id" => $shortname."_reply_button_bg",
					"std" => "069",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Reply button hover color",
					"desc" => "",
					"id" => $shortname."_reply_button_hover_bg",
					"std" => "05a8f9",
					"type" => "text");

$swift_design_options[] = array( "name" => "Reply button text color",
					"desc" => "",
					"id" => $shortname."_reply_button",
					"std" => "FFF",
					"type" => "text");


$swift_design_options[]=array("type" => "close");

////////////////////////////////
// Author info box   Options //
//////////////////////////////
$swift_design_options[] = array( "name" => "Author Info",
                    "type" => "heading");

$swift_design_options[] = array( "name" => "Related posts & Subscribe box background",
					"desc" => "",
					"id" => $shortname."_rp_bg",
					"std" => "222222",
					"type" => "text"); 
$swift_design_options[] = array( "name" => "Author Info background",
					"desc" => "",
					"id" => $shortname."_rp_author_bg",
					"std" => "000",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Text colour",
					"desc" => "",
					"id" => $shortname."_rp",
					"std" => "F8F8F8",
					"type" => "text");
$swift_design_options[] = array( "name" => "Link color",
					"desc" => "",
					"id" => $shortname."_rp_link",
					"std" => "FFF",
					"type" => "text");
$swift_design_options[] = array( "name" => "Link hover color",
					"desc" => "",
					"id" => $shortname."_rp_link_hover",
					"std" => "F60",
					"type" => "text");
$swift_design_options[]=array("type" => "close");	

///////////////////////////
//MagBox Colour Options //
/////////////////////////

$swift_design_options[] = array( "name" => "Magzine box Options",
                    "type" => "heading");

$swift_design_options[] = array( "name" => "MagBox background",
					"desc" => "",
					"id" => $shortname."_magbox_bg",
					"std" => "EEE",
					"type" => "text"); 
$swift_design_options[] = array( "name" => "MagBox text",
					"desc" => "",
					"id" => $shortname."_magbox_color",
					"std" => "666",
					"type" => "text"); 
					
$swift_design_options[] = array( "name" => "MagBox post title color",
					"desc" => "",
					"id" => $shortname."_magbox_post_title_color",
					"std" => "333",
					"type" => "text");

$swift_design_options[] = array( "name" => "MagBox post title hover color",
					"desc" => "",
					"id" => $shortname."_magbox_post_title_hover_color",
					"std" => "000",
					"type" => "text");

$swift_design_options[] = array( "name" => "MagBox bottom strip color",
					"desc" => "",
					"id" => $shortname."_magmeta_bg",
					"std" => "069",
					"type" => "text");
					
$swift_design_options[] = array( "name" => "MagBox date color",
					"desc" => "",
					"id" => $shortname."_mag_date",
					"std" => "f2f2f2",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Magbox comment count BG",
					"desc" => "",
					"id" => $shortname."_mag_fullstory_bg",
					"std" => "035279",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Magbox comment count background",
					"desc" => "",
					"id" => $shortname."_mag_fullstory_hover_bg",
					"std" => "03aafe",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Magbox comment count text color",
					"desc" => "",
					"id" => $shortname."_mag_fullstory",
					"std" => "FFF",
					"type" => "text"); 

$swift_design_options[]=array("type" => "close");	



///////////////////////////
// Subscribe Widget //////
/////////////////////////

$swift_design_options[] = array( "name" => "Subscribe Widget",
                    "type" => "heading");

$swift_design_options[] = array( "name" => "Background",
					"desc" => "",
					"id" => $shortname."_subscribebox_bg",
					"std" => "F66F6F6",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Border",
					"desc" => "",
					"id" => $shortname."_subscribebox_border",
					"std" => "EEE",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Text Color",
					"desc" => "",
					"id" => $shortname."_subscribebox",
					"std" => "000",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Chicklet Background",
					"desc" => "",
					"id" => $shortname."_chicklet_bg",
					"std" => "006699",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Chicklet Text Color",
					"desc" => "",
					"id" => $shortname."_chicklet",
					"std" => "FFFFFF",
					"type" => "text"); 


$swift_design_options[]=array("type" => "close");

//Copyright notice colour Options
$swift_design_options[] = array( "name" => "Copyright notice",
                    "type" => "heading");

$swift_design_options[] = array( "name" => "Background",
					"desc" => "",
					"id" => $shortname."_copyright_bg",
					"std" => "DDD",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Border colour",
					"desc" => "1px top border",
					"id" => $shortname."_copyright_border",
					"std" => "CCC",
					"type" => "text"); 

$swift_design_options[] = array( "name" => "Text color",
					"desc" => "",
					"id" => $shortname."_copyright",
					"std" => "222",
					"type" => "text"); 

$swift_design_options[]=array("type" => "close");	
$swift_design_options[]=array("type" => "clear");	
$swift_design_options[]=array("type" => "close");	

//Rounded Corners
$swift_design_options[] =array("name" => "Rounded-Corners",
							   "type" => "tab-title",
					"datatype"=>"none");

$swift_design_options[] = array(  "name" => "Disable rounded corners for navigation",
        			"desc" => "Rounded corners don't look good when the header and body background images are different.",
        			"id" => $shortname."_rc_nav_disable",
        			"type" => "checkbox",
        			"std" => "false",
					"datatype"=>"color");

$swift_design_options[] = array(  "name" => "Disable rounded corners for SideBar widgets.",
        			"desc" => "",
        			"id" => $shortname."_rc_sb_disable",
        			"type" => "checkbox",
        			"std" => "false",
					"datatype"=>"boolean");

$swift_design_options[]=array("type" => "close",
					"datatype"=>"none");	

//Custom CSS
$swift_design_options[] =array("name" => "Custom-CSS",
							   "type" => "tab-title",
					"datatype"=>"none");
$swift_design_options[] = array(  "name" => "Enable Custom CSS",
        			"desc" => "",
        			"id" => $shortname."_customCSS_enable",
        			"type" => "checkbox",
        			"std" => "true",
					"datatype"=>"boolean");
$swift_design_options[] = array(    "name" => "Enter your Custom CSS code below",
        "desc" => "",
        "id" => $shortname."_customCSS",
        "type" => "textarea",
		"std"=>"",
		"datatype"=>"tetx");
$swift_design_options[]=array("type" => "close",
					"datatype"=>"none");	
//never remove this option (it will reset theme options)
$swift_design_options[] = array( "name" => "",
					"desc" => "this is a random variable just to know that the options have been changed, it wont be displayed any where",
					"id" => $shortname."_random",
					"std" => "FFF",
					"type" => "hidden",
					"datatype"=>"none");
?>
