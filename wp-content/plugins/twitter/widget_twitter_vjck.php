<?php
/*
Plugin Name:  Widget Twitter VJCK
Plugin URI: http://www.vjcatkick.com/?page_id=5475
Description: Display twitter on your sidebar!
Version: 0.1.8
Author: V.J.Catkick
Author URI: http://www.vjcatkick.com/
*/

/*
License: GPL
Compatibility: WordPress 2.6 with Widget-plugin.

Installation:
Place the widget_single_photo folder in your /wp-content/plugins/ directory
and activate through the administration panel, and then go to the widget panel and
drag it to where you would like to have it!
*/

/*  Copyright V.J.Catkick - http://www.vjcatkick.com/

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


/* Changelog
* Jan 02 2009 - v0.0.1
- Initial release
* Jan 04 2009 - v0.0.2
- now data will be cached automatically
* Jan 05 2009 - v0.1.0
- Initial public release
* Jan 05 2009 - v0.1.1
- bug fix: http://twitpic.com
* Jan 05 2009 - v0.1.2
- new support: http://movapic.com (ke-tai hyakkei)
- support overflow on IE 6
* Jan 15 2009 - v0.1.3
- bug fix: source link is now open in new window
* Jan 29 2009 - v0.1.4
- added: date-time format configuration
* Jan 03 2010 - v0.1.5
- fixed: twitpic incompatibility fixed.
- added: display image option (when loaded)
* Jan 03 2010 - v0.1.6
- fixed: url position related bug
- added: hashtag link
* Jan 14 2010 - v0.1.7
- added: brightkite supported
* Jan 15 2010 - v0.1.8
- fixed: timezone issue

*/


function widget_twitter_vjck_init() {
	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('simplexml_load_file') ) {
		echo 'PHP 5.1 or later requires: no simplexml_load_file()';
		return;
	} /* if */

	// 0.1.7 added brightkite
	function widget_twitter_get_brightkite_image_url( $srcStr ) {
		$workstr = $srcStr;
		$spos = strpos( $workstr, 'http://bkite.com' );

		if( $spos !== false ) {
			$tmpstr = substr( $workstr, $spos );
//			$filedata = @simplexml_load_file( $tmpstr );
			$filedata = @file_get_contents( $tmpstr );
			if( $filedata ) {
				if( preg_match( '/div\s*class="photo"\s*align[-_.!~*a-zA-Z0-9;\/?:@&=+$,%#].+.(?:jpe?g)/is', $filedata, $matches ) ) {
					if( preg_match( '/src=\"[-_.!~*()a-z0-9;\/?@&=+$,%#].+.(?:jpe?g)/is', $matches[0], $m2s ) ) {
						$filedata = preg_replace( '/src=\"/is', '', $m2s[0] );
						return( $filedata );
					} /* if */
				} /* if */
			} /* if */
		} /* if */
		return( "" );
	} /* widget_twitter_get_brightkite_image_url() */

	function widget_twitter_get_twinkle_image_url( $srcStr ) {
		$workstr = $srcStr;
		$spos = strpos( $workstr, 'http://snipurl.com' );
		if( $spos !== false ) {		// 0.1.6 fixed
			$tmpstr = substr( $workstr, $spos );
			$filedata = @simplexml_load_file( $tmpstr );
			if( $filedata ) {
				$pgTitle = $filedata->head->title;
				if( strcmp( $pgTitle, "TwinkleShots" ) == 0 ) {
					return( $filedata->body->div[1]->img[src] );
				} /* if */
			} /* if */
		} /* if */
		return( "" );
	} /* widget_twitter_get_twinkle_image_url() */

	function widget_twitter_get_twitterrific_image_url( $srcStr ) {
		$workstr = $srcStr;
		$spos = strpos( $workstr, 'http://twitpic.com' );
		if( $spos !== false ) {		// 0.1.6 fixed
			$tmpstr = substr( $workstr, $spos );
			$filedata = @file_get_contents( $tmpstr );
			if( $filedata ) {
				$testresult = strpos( $filedata, '<title>Twitpic' );
				if( $testresult === FALSE ) $testresult = strpos( $filedata, 'Twitpic</title>' );		// 0.1.5 fixed
				if( $testresult !== FALSE ) {
					$spos = strpos( $filedata, '<img id="photo-display"' );		// 0.1.5 fixed
					$filedata = substr( $filedata, $spos );
					$spos = strpos( $filedata, 'src="' )+5;
					$filedata = substr( $filedata, $spos );
					$spos = strpos( $filedata, '"' );
					$filedata = substr( $filedata, 0, $spos );
//echo '<!-- [[[[' . $filedata . ']]]] -->';

					// 0.1.1 fixed
					if( strpos( $filedata, "/" ) == 0 ) $filedata = 'http://twitpic.com' . $filedata;

					return( $filedata );
				} /* if */
			} /* if */
		} /* if */
		return( "" );
	} /* widget_twitter_get_twitterrific_image_url() */

	// 0.1.2 support
	function widget_twitter_get_ketaihyakkei_image_url( $srcStr ) {
		$workstr = $srcStr;
		$spos = strpos( $workstr, 'http://movapic.com' );
		if( $spos !== FALSE ) {
			$tmpstr = substr( $workstr, $spos );
			$filedata = @file_get_contents( $tmpstr );
			if( $filedata ) {
//$filedata = mb_convert_encoding( $filedata, "UTF-8", "SJIS" );
//				$testresult = strpos( $filedata, '<title>TwitPic' );	// keitai-hyakkei - japan domestic thing
//				if( $testresult !== FALSE ) {
if( 1 )  {
					$spos = strpos( $filedata, '<img class="image"' );
					$filedata = substr( $filedata, $spos );
					$spos = strpos( $filedata, 'src="' )+5;
					$filedata = substr( $filedata, $spos );
					$spos = strpos( $filedata, '"' );
					$filedata = substr( $filedata, 0, $spos );

					return( $filedata );
				} /* if */
			} /* if */
		} /* if */
		return( "" );
	} /* widget_twitter_get_ketaihyakkei_image_url() */

	// added 0.1.6
	function widget_twitter_vjck_hashed_link( $srcStr ) {
		$retStr = $srcStr;

		if( preg_match_all( '/#[-_.!~*a-zA-Z0-9;\/?:@&=+$,%]+/s', $srcStr, $matches ) ) {
			$match = $matches[0];

			foreach( $match as $m ) {
				$tagStr = $m;
				$tagLink = 'http://twitter.com/search?q=' . str_replace( '#', '%23', $tagStr );
				$tagLinkHtml = '<a href="' . $tagLink . '" target="_blank" >' . $tagStr . '</a>';

				$retStr = preg_replace( '/' . $tagStr . '/s', $tagLinkHtml, $retStr );
			} /* foreach */
		} /* if */

		return( $retStr );
	} /* widget_twitter_vjck_hashed_link() */

	function widget_twitter_vjck_modify_contents( $srcStr, $option_dispImage, $image_is_on ) {
		$retStr = $srcStr;
		$regURLs = array(
			'snipurl' => 'http://snipurl.com',
			'twitpic' =>'http://twitpic.com',
			'movapic' => 'http://movapic.com',
			'brightkite' => 'http://bkite.com'					// brightkite added 0.1.7
			);

		$spos = strpos( $retStr, 'http://' );
		if( $spos !== FALSE ) {

//			$fstr = substr( $retStr, 0, $spos );
//			$rstr = substr( $retStr, $spos );

			// 0.1.6
			preg_match( '/s?https?:\/\/[-_.!~*a-zA-Z0-9;\/?:@&=+$,%#]+/s' , $retStr, $matches );
			$rstr = $matches[0];
			$matches = preg_replace( '/s?https?:\/\/[-_.!~*a-zA-Z0-9;\/?:@&=+$,%#]+/s' , '', $retStr );
			$fstr = $matches;

			foreach( $regURLs as $key => $regurl ) {
				if( strpos( $retStr, $regurl) !== FALSE ) {
					$imgURL_str = "";
					if( $option_dispImage ) {
						switch( $key ) {
							case "snipurl":
								$imgURL_str = widget_twitter_get_twinkle_image_url( $rstr );	// 0.1.6 fixed	(was $retStr not $rstr )
								break;
							case "twitpic":
								$imgURL_str = widget_twitter_get_twitterrific_image_url( $rstr );	// 0.1.6 fixed
								break;
							case "movapic":
								$imgURL_str = widget_twitter_get_ketaihyakkei_image_url( $rstr );	// 0.1.6 fixed
								break;
							case "brightkite":
								$imgURL_str = widget_twitter_get_brightkite_image_url( $rstr );		// 0.1.7 added
						} /* switch */
					} /* if */
//					$tmp_id_str = substr( $rstr, strrpos( $rstr, "/" ) + 1 );		// fixed 0.1.6
					$tmp_id_str = 'vjck_twitter_img_' . rand( 1000, 9999 );

					if( $option_dispImage && strlen( $imgURL_str ) > 0 ) {
						if( !$fstr ) $fstr = 'untitled';	// fixed. 0.1.5
						$defaultimgstatus = $image_is_on ? 'block' : 'none';		// added. 0.1.5
						$retStr = '<span onclick="flip_twitter_image('."'".$tmp_id_str."'".')" style="cursor:pointer;" >' . $fstr . '</span><br />';
						$retStr .= '<div id="' . $tmp_id_str . '" style="width:100%;display:' . $defaultimgstatus . ';" ><img src="' . $imgURL_str . '" style="border:1px solid silver;margin-left:10px;" width="120px" ></div>';
					}else{
						$retStr = $fstr . '<br />';
					} /* if else */
//					$retStr .= '<a href="' . $rstr . '" target="_blank" >' . $rstr . '</a>';
					break;
				} /* if */
			} /* foreach */

			if( strlen( $imgURL_str ) == 0 ) { $retStr = $fstr . '<br />'; }
			$retStr .= '<a href="' . $rstr . '" target="_blank" >' . $rstr . '</a>';

		} /* if */

		$retStr = widget_twitter_vjck_hashed_link( $retStr );		// added. 0.1.6

		return( $retStr );
	} /* widget_twitter_vjck_modify_contents() */

	function widget_twitter_vjck( $args ) {
		extract($args);

		$options = get_option('widget_twitter_vjck');
		$title = $options['widget_twitter_vjck_title'];
		$_twitterUserID = $options['widget_twitter_vjck_option_userid'];
		$_twitterCount = $options['widget_twitter_vjck_option_maxcount'];
		$displayProfile = $options['widget_twitter_vjck_option_displayProfile'];
		$displayProfileImg = $options['widget_twitter_vjck_option_displayProfileImg'];
		$displayLocation = $options['widget_twitter_vjck_option_displayProfileLoc'];;
		$displayDescription = $options['widget_twitter_vjck_option_displayProfileDesc'];;
		$displayImage = $options['widget_twitter_vjck_option_displayImage'];
		$image_on = $options['widget_twitter_vjck_option_image_on'];		// added 0.1.5
		$displayReply = $options['widget_twitter_vjck_option_displayReply'];
		$displayTime = $options['widget_twitter_vjck_option_displayTime'];
		$displaySource = $options['widget_twitter_vjck_option_displaySource'];
		$displayTimeFormat = $options['widget_twitter_vjck_option_displayTimeFormat'];		// 0.1.4  'Y/m/d H:s';

		$widget_twitter_vjck_option_cached_time = $options['widget_twitter_vjck_option_cached_time'];
		$widget_twitter_vjck_option_cached_output = $options['widget_twitter_vjck_option_cached_output'];


		// section main logic from here 

		$twitters = false;
		$cached_time = $options['widget_twitter_vjck_option_cached_time'];
		if( $cached_time + 300 < time() ) {		// once at 5 min.
			//$_xmlfilestr = 'http://twitter.com/statuses/user_timeline/' . $_twitterUserID . '.xml?count=' . $_twitterCount;
			$_xmlfilestr = 'http://twitter.com/statuses/user_timeline/' . $_twitterUserID . '.xml?count=150';
			$twitters = @simplexml_load_file( $_xmlfilestr );
		} /* if */

		if( $twitters ) {
			$output = '<div id="widget_twitter_vjck" ><ul>';

			if( $displayProfile ) {
				$userinfo = $twitters->status->user;
				$output .= '<div id="twitter_profile" style="height: 52px;" >';
				if( $displayProfileImg ) {
					$output .= '<div class="twitter_img_box" style="float:left; height:48px; margin-right:1em;margin-left:10px;" ><img border="0" src="';
					$output .= $userinfo->profile_image_url;
					$output .= '" /></div>';
				} /* if */
				$output .= '<div class="twitter_name_box" ><a href="http://twitter.com/';
				$output .= $userinfo->screen_name;
				$output .= '" target="_blank">';
				$output .= $userinfo->name;
				$output .= '</a> </div>';
				if( strlen( $userinfo->location ) && $displayLocation ) {
					$output .= '<div class="twitter_location_box" >';
					$output .= $userinfo->location;
					$output .= '</div>';
				} /* if */
				$output .= '</div>';
				$output .= '<div class="twitter_description" style="padding-bottom:2px; border-bottom:1px dotted #DDD;" >';
				if( strlen( $userinfo->description ) && $displayDescription) {
					$output .= $userinfo->description;
				} /* if */
				$output .= '</div>';
			} /* if */

			$local_counter = 0;		// $_twitterCount

			// fix 0.1.2 - support overflow on IE 6
			$output .= '<div id="twitter_time_line"  style="width:100%; overflow:hidden;" >';
			
			$dispTimeSourceStartTag = '<div id="twitter_time_source" style="font-size:7pt;color:#888;text-align:right;" >';
$output .= '<script type="text/javascript">function flip_twitter_image(arg) {var targetTagID = window.document.getElementById(arg); var styleStr = (window.document.documentElement.getAttribute("style") == window.document.documentElement.style) ? targetTagID.style.cssText : targetTagID.getAttribute( "style" ); var nonString = styleStr.match( /display:.*?none;/g ); var nonPos = nonString ? styleStr.indexOf( nonString ) : -1; if( nonPos >= 0 ) { styleStr = styleStr.substring( 0, nonPos ) + styleStr.substring( nonPos + nonString.length, styleStr.length ); styleStr = styleStr + "display:block;"; }else{ var blkString = styleStr.match( /display:.*?block;/g ); var blkPos = blkString ? styleStr.indexOf( blkString ) : -1; if( blkPos >= 0 ) { styleStr = styleStr.substring( 0, blkPos ) + styleStr.substring( blkPos + blkString.length, styleStr.length ); } styleStr = styleStr + "display:none;"; } if( styleStr ) { if( window.document.documentElement.getAttribute("style") == window.document.documentElement.style ) { targetTagID.style.cssText = styleStr; }else{ targetTagID.setAttribute( "style", styleStr); }}}</script>';

			foreach( $twitters as $tw ) {
				if( strlen( $tw->in_reply_to_screen_name ) ) {
					if( $displayReply ) {
						$local_counter++;
						$output .= '<li>';
						$output .= '@';
						$output .= $tw->in_reply_to_screen_name;
						$output .= '<br />';
						$output .= widget_twitter_vjck_modify_contents( substr( $tw->text, strpos( $tw->text, ' ' ) + 1 ), $displayImage, $image_on );
						if( $displayTime || $displaySource ) {
							$output .= $dispTimeSourceStartTag;
							if( $displayTime ) {
								$output .= date( $displayTimeFormat, strtotime( $tw->created_at ) + $tw->user->utc_offset[0] );		// 0.1.4 modified -> 0.1.8 fixed
								if( $displaySource ) { $output .= ' by '; }
							} /* if */
							if( $displaySource ) { $output .= str_replace( 'href', 'target="_blank" href', $tw->source); }
							$output .= '</div>';
						} /* if */
						$output .= '</li>';
					} /* if */
				}else{
					$local_counter++;
					$output .= '<li>';
					$output .= widget_twitter_vjck_modify_contents( $tw->text , $displayImage, $image_on );
					if( $displayTime || $displaySource ) {
						$output .= $dispTimeSourceStartTag;
						if( $displayTime ) {
							$output .= date( $displayTimeFormat, strtotime( $tw->created_at ) + $tw->user->utc_offset[0] );		// 0.1.4 modified -> 0.1.8 fixed
							if( $displaySource ) { $output .= ' '; }
						} /* if */
						if( $displaySource ) {
							$output .= 'by ';
							$output .= str_replace( 'href', 'target="_blank" href', $tw->source);
						} /* if */
						$output .= '</div>';
					} /* if */
					$output .= '</li>';
				} /* if else */
//				$output .= '<div clear="both" style="margin-bottom:8px;" ></div>';
				if( $local_counter >= $_twitterCount ) break;
			} /* foreach */
			$output .= '</div>';

			$output .= '</ul></div>';

			$options['widget_twitter_vjck_option_cached_time'] = time();
			$options['widget_twitter_vjck_option_cached_output'] = $output;
			update_option('widget_twitter_vjck', $options);
		}else{
			$output = $options['widget_twitter_vjck_option_cached_output'];
			$output .= '<!-- cached -->';

//	$output .= '<div id="twitter_profile" >';
//	$output .= 'A: Server is busy.<br />B: No entries.<br />C: Do not want to display.<br /><span style="font-size:7pt;color:#888;">- plz wait a while and try again -</span>';
//	$output .= '</div>';
		} /* if else */

		// These lines generate the output


//echo '<script type="text/javascript" src="' . get_option('siteurl') . '/wp-content/plugins/twitter/widget_twitter_vjck.js" ></script>';
		echo $before_widget . $before_title . $title . $after_title;
		echo $output;
		echo $after_widget;
	} /* widget_twitter_vjck() */


	function widget_twitter_vjck_control() {
		$options = $newoptions = get_option('widget_twitter_vjck');
		if ( $_POST["widget_twitter_vjck_submit"] ) {
			$newoptions['widget_twitter_vjck_title'] = strip_tags(stripslashes($_POST["widget_twitter_vjck_title"]));
			$newoptions['widget_twitter_vjck_option_userid'] = $_POST["widget_twitter_vjck_option_userid"];
			$newoptions['widget_twitter_vjck_option_maxcount'] = (int) $_POST["widget_twitter_vjck_option_maxcount"];
			$newoptions['widget_twitter_vjck_option_displayProfile'] = (boolean)$_POST["widget_twitter_vjck_option_displayProfile"];
			$newoptions['widget_twitter_vjck_option_displayProfileImg'] = (boolean)$_POST["widget_twitter_vjck_option_displayProfileImg"];
			$newoptions['widget_twitter_vjck_option_displayProfileLoc'] = (boolean)$_POST["widget_twitter_vjck_option_displayProfileLoc"];
			$newoptions['widget_twitter_vjck_option_displayProfileDesc'] = (boolean)$_POST["widget_twitter_vjck_option_displayProfileDesc"];
			$newoptions['widget_twitter_vjck_option_displayImage'] = (boolean)$_POST["widget_twitter_vjck_option_displayImage"];
			$newoptions['widget_twitter_vjck_option_image_on'] = (boolean)$_POST["widget_twitter_vjck_option_image_on"];		// added 0.1.5
			$newoptions['widget_twitter_vjck_option_displayReply'] = (boolean)$_POST["widget_twitter_vjck_option_displayReply"];
			$newoptions['widget_twitter_vjck_option_displayTime'] = (boolean)$_POST["widget_twitter_vjck_option_displayTime"];
			$newoptions['widget_twitter_vjck_option_displaySource'] = (boolean)$_POST["widget_twitter_vjck_option_displaySource"];
			$newoptions['widget_twitter_vjck_option_displayTimeFormat'] = $_POST["widget_twitter_vjck_option_displayTimeFormat"];		// 0.1.4 added

			$newoptions['widget_twitter_vjck_option_cached_time'] = 0;
			$newoptions['widget_twitter_vjck_option_cached_output'] = "";
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_twitter_vjck', $options);
		}

		// those are default value
		if( !$options['widget_twitter_vjck_title'] ) $options['widget_twitter_vjck_title'] = "Twitter";
		if( !$options['widget_twitter_vjck_option_userid'] ) $options['widget_twitter_vjck_option_userid'] = "12345";
		if( !$options['widget_twitter_vjck_option_displayTimeFormat'] ) $options['widget_twitter_vjck_option_displayTimeFormat'] = "Y/m/d H:s";		// 0.1.4 added

		$_twitterUserID = $options['widget_twitter_vjck_option_userid'];
		$_twitterCount = $options['widget_twitter_vjck_option_maxcount'];
		$displayProfile = $options['widget_twitter_vjck_option_displayProfile'];
		$displayProfileImg = $options['widget_twitter_vjck_option_displayProfileImg'];
		$displayLocation = $options['widget_twitter_vjck_option_displayProfileLoc'];;
		$displayDescription = $options['widget_twitter_vjck_option_displayProfileDesc'];
		$displayImage = $options['widget_twitter_vjck_option_displayImage'];

		$image_on = $options['widget_twitter_vjck_option_image_on'];	// added 0.1.5


		$displayReply = $options['widget_twitter_vjck_option_displayReply'];
		$displayTime = $options['widget_twitter_vjck_option_displayTime'];
		$displaySource = $options['widget_twitter_vjck_option_displaySource'];
		$displayTimeFormat = $options['widget_twitter_vjck_option_displayTimeFormat'];		// 0.1.4 added

//		$widget_twitter_vjck_option_cached_time = $options['widget_twitter_vjck_option_cached_time'];
//		$widget_twitter_vjck_option_cached_output = $options['widget_twitter_vjck_option_cached_output'];

		$title = htmlspecialchars($options['widget_twitter_vjck_title'], ENT_QUOTES);
?>

	    <?php _e('Title:'); ?> <input style="width: 170px;" id="widget_twitter_vjck_title" name="widget_twitter_vjck_title" type="text" value="<?php echo $title; ?>" /><br />
	    <?php _e('Twitter ID:'); ?> <input style="width: 150px;" id="widget_twitter_vjck_option_userid" name="widget_twitter_vjck_option_userid" type="text" value="<?php echo $_twitterUserID; ?>" /><br />
        <?php _e('Max tweets:'); ?> <input style="width: 75px;" id="widget_twitter_vjck_option_maxcount" name="widget_twitter_vjck_option_maxcount" type="text" value="<?php echo $_twitterCount; ?>" /><br />

        <?php _e('Profile:'); ?> <input id="widget_twitter_vjck_option_displayProfile" name="widget_twitter_vjck_option_displayProfile" type="checkbox" value="1" <?php if( $displayProfile ) echo 'checked';?>/><br />
        &nbsp;&nbsp;<?php _e('Profile Image:'); ?> <input id="widget_twitter_vjck_option_displayProfileImg" name="widget_twitter_vjck_option_displayProfileImg" type="checkbox" value="1" <?php if( $displayProfileImg ) echo 'checked';?>/><br />
        &nbsp;&nbsp;<?php _e('Location:'); ?> <input id="widget_twitter_vjck_option_displayProfileLoc" name="widget_twitter_vjck_option_displayProfileLoc" type="checkbox" value="1" <?php if( $displayLocation ) echo 'checked';?>/><br />
        &nbsp;&nbsp;<?php _e('Description:'); ?> <input id="widget_twitter_vjck_option_displayProfileDesc" name="widget_twitter_vjck_option_displayProfileDesc" type="checkbox" value="1" <?php if( $displayDescription ) echo 'checked';?>/><br />
        <?php _e('Display image:'); ?> <input id="widget_twitter_vjck_option_displayImage" name="widget_twitter_vjck_option_displayImage" type="checkbox" value="1" <?php if( $displayImage ) echo 'checked';?>/><br />

		&nbsp;&nbsp;<?php _e('Display image when loaded:'); ?> <input id="widget_twitter_vjck_option_image_on" name="widget_twitter_vjck_option_image_on" type="checkbox" value="1" <?php if( $image_on ) echo 'checked';?>/><br />

		<?php _e('Display reply:'); ?> <input id="widget_twitter_vjck_option_displayReply" name="widget_twitter_vjck_option_displayReply" type="checkbox" value="1" <?php if( $displayReply ) echo 'checked';?>/><br />
        <?php _e('Display time:'); ?> <input id="widget_twitter_vjck_option_displayTime" name="widget_twitter_vjck_option_displayTime" type="checkbox" value="1" <?php if( $displayTime ) echo 'checked';?>/><br />
	    <?php _e('Time Format:'); ?> <input style="width: 100px;" id="widget_twitter_vjck_option_displayTimeFormat" name="widget_twitter_vjck_option_displayTimeFormat" type="text" value="<?php echo $displayTimeFormat; ?>" /><br />
		
        <?php _e('Display source:'); ?> <input id="widget_twitter_vjck_option_displaySource" name="widget_twitter_vjck_option_displaySource" type="checkbox" value="1" <?php if( $displaySource ) echo 'checked';?>/><br />


  	    <input type="hidden" id="widget_twitter_vjck_submit" name="widget_twitter_vjck_submit" value="1" />

<?php
	} /* widget_twitter_vjck_control() */

	register_sidebar_widget('Twitter VJCK', 'widget_twitter_vjck');
	register_widget_control('Twitter VJCK', 'widget_twitter_vjck_control' );
} /* widget_twitter_vjck_init() */

add_action('plugins_loaded', 'widget_twitter_vjck_init');

?>