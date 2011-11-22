<?php 
/*
A custom fucntion to echo specified number of categories a
post is filed in. 
(Takes number of categories to be displayed as argument)
Written by Satish Gandham
Author URL: http://swiftthemes.com
Contact: http://swiftthemes.com/contact-me/
*/
function swift_list_cats($num){
	$temp=get_the_category(); 
	$count=count($temp);// Getting the total number of categories the post is filed in.
	$cat_string=NULL;
	for($i=0;$i<$num&&$i<$count;$i++){
		//Formatting our output.
		$cat_string.='<a href="'.get_category_link( $temp[$i]->cat_ID  ).'">'.$temp[$i]->cat_name.'</a>';
		if($i!=$num-1&&$i+1<$count)
		//Adding a ',' if it's not the last category.
		//You can add your own seperator here.
		$cat_string.=', ';
	}
	echo $cat_string;
} 

//Access the WordPress Categories via an Array
$swift_categories = array();  
$swift_categories_obj = get_categories('hide_empty=0');
foreach ($swift_categories_obj as $swift_cat) 
{$swift_categories[$swift_cat->cat_ID] = $swift_cat->cat_name;}
$categories_tmp = array_unshift($swift_categories, "Select-a-category:");    
       
//Access the WordPress Pages via an Array
$swift_pages = array();
$swift_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($swift_pages_obj as $swift_page) 
{$swift_pages[$swift_page->ID] = $swift_page->post_name; }
$swift_pages_tmp = array_unshift($swift_pages, "Select a page:");  


function get_tiny_url($url) {  
     $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=".$url);  
     return $tinyurl;  
}

// Filter to ad AD's between post content
function inject_ad_text_after_n_chars($content) {
	global $swift_opt;				
	// only do this if post is longer than 1600 characters
	$enable_length = 1600;
	// insert after the first half of the post.
	$after_character = intval(strlen($content)/2);
	if (is_single() && strlen($content) > $enable_length) {
		$before_content = substr($content, 0, $after_character);
		$after_content = substr($content, $after_character);
		$after_content = explode('</p>', $after_content);
		$text =stripslashes($swift_opt['swift_adsense_betweenpost']);
		array_splice($after_content, 1, 0, $text);
		$after_content = implode('</p>', $after_content);
		return $before_content . $after_content;
	  }
	  else {
		return $content;
	  }
}
if(isset($swift_opt['swift_adsense_betweenpost'])&&$swift_opt['swift_adsense_betweenpost'] && isset($swift_opt['swift_adsense_betweenpost_enable'])&&$swift_opt['swift_adsense_betweenpost_enable']=="true")
add_filter('the_content', 'inject_ad_text_after_n_chars');


/*-----------------------------------------------------------------------------------*/
/* Tidy up the image source url */
/*-----------------------------------------------------------------------------------*/
function cleanSource($src) {

	// remove slash from start of string
	if(strpos($src, "/") == 0) {
		$src = substr($src, -(strlen($src) - 1));
	}

	// Check if same domain so it doesn't strip external sites
	$host = str_replace('www.', '', $_SERVER['HTTP_HOST']);
	if ( !strpos($src,$host) )
		return $src;


	$regex = "/^((ht|f)tp(s|):\/\/)(www\.|)" . $host . "/i";
	$src = preg_replace ($regex, '', $src);
	$src = htmlentities ($src);
    
    // remove slash from start of string
    if (strpos($src, '/') === 0) {
        $src = substr ($src, -(strlen($src) - 1));
    }
	
	return $src;
}

/*-----------------------------------------------------------------------------------*/
/* Add content to FEED */
/*-----------------------------------------------------------------------------------*/
function feedFilter($query) {
	if ($query->is_feed) {
		add_filter('the_content','feedContentFilter');
	}
	return $query;
}
add_filter('pre_get_posts','feedFilter');
 
function feedContentFilter($content) {
	global $swift_opt;
	$content ='<p>'.stripslashes($swift_opt['swift_ad_before_feed']).'</p>'.$content;
	$content .= '<p>'.stripslashes($swift_opt['swift_ad_after_feed']).'</p>';
	return $content;
}
?>