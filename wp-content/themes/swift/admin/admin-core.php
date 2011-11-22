<?php
add_action('admin_menu', 'swift_headers1');
add_action('admin_head', 'swift_headers2');

function swift_headers1(){
	if ( isset($_GET['page']) && $_GET['page'] == "swift-options"|| isset($_GET['page']) && $_GET['page'] == "swift-design-options"||  isset($_GET['page']) && $_GET['page'] == "swift-import-export" ):
		wp_enqueue_script('jquery' ); 
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_style('swift-admin-styles', get_template_directory_uri() .'/admin/admin-styles.css');
	endif;
global $pagenow;
global $typenow;
if (empty($typenow) && !empty($_GET['post'])) {
  $post = get_post($_GET['post']);
  $typenow = $post->post_type;
}
if (is_admin() && $pagenow=='post-new.php' OR $pagenow=='post.php' && $typenow=='roundup'){	wp_enqueue_script('jquery-ui-datepicker',  get_template_directory_uri() . '/admin/ui.datepicker.min.js', array('jquery','jquery-ui-core') );
	wp_enqueue_style('date-picker', get_template_directory_uri() .'/admin/date-picker.css');
    }
	if ( isset($_GET['page']) && $_GET['page'] == "swift-design-options" ):
	    wp_register_script('color-picker', get_template_directory_uri() .'/admin/jscolor/jscolor.js');
		wp_enqueue_script('color-picker', get_template_directory_uri() .'/admin/jscolor/jscolor.js');
	endif; 
}

function swift_headers2(){ 
	if ( isset($_GET['page']) && $_GET['page'] == "swift-options"|| isset($_GET['page']) && $_GET['page'] == "swift-design-options" || isset($_GET['page']) && $_GET['page'] == "swift-import-export"):
?>
		<script type="text/javascript">
        	jQuery(function() {
				jQuery(".tabmenu").removeClass("hidden");
				jQuery(".tabs h2").addClass("hidden");
				jQuery(".tabs").tabs();
            });
        </script> 
<?php 
	endif;
}//end of fucntion 
?>
<?php
//Adding adminstrative menus
add_action('admin_menu', 'swift_themes_menu');
function swift_themes_menu() {
/*	$favicon=get_bloginfo('template_url').'/images/favicon.ico';
	add_menu_page('Swift Theme Options', 'Swift Options', 'edit_theme_options', 'swift-options', 'swiftOptions',$favicon,62);
	add_submenu_page( 'swift-options', 'Design Options', 'Design Options', 'edit_theme_options', 'swift-design-options', 'swiftDesignOptions');
	//add_submenu_page( 'swift-options', 'Import and Export SWIFT options','Import / Export', 'edit_theme_options', 'swift-import-export', 'swiftImportExportMenu');
*/
add_theme_page( 'SWIFT Theme General Options', 'SWIFT General Options', 'edit_theme_options', 'swift-options', 'swiftOptions'); 
add_theme_page( 'SWIFT Theme Design Options', 'SWIFT Design Options', 'edit_theme_options', 'swift-design-options', 'swiftDesignOptions'); 
}?>
<?php
function swiftImportExportMenu(){
	include (ADMIN.'/import-export.php');
}

// Things to do when the theme is first activated
add_action('admin_head', 'first_run_options');
function first_run_options() {
	if ( get_option('swift_activation_check')!="set" ) {
		$filename = U_DIR.'/swift_default.jpg';
		if (!file_exists($filename)):
		$file = TEMPLATEPATH.'/images/default.jpg';
			@copy($file, $filename);
		endif;
		
		//Creates the timthumb cache folder
		$swift_custom=U_DIR.'/swift_custom';
		$cache= $swift_custom.'/cache';
		if (!is_dir($swift_custom))
			$make = @mkdir($swift_custom,0777);
	
		$destination=U_DIR.'/swift_custom/custom-style.css';
		if(!file_exists($destination)):
		$source=TEMPLATEPATH.'/includes/custom-style.css';
			@copy($source,$destination);
		endif;
		
		$destination=U_DIR.'/swift_custom/swift-js-functions.js';
		if(!file_exists($destination)):
		$source=TEMPLATEPATH.'/includes/swift-js-functions.js';
			@copy($source,$destination);
		endif;
		
		// Add marker so it doesn't run in future
		update_option('swift_activation_check', "set");
  
		if(!get_option('swift_opt')){
			global $swift_design_options;
			global $swift_options;	
			foreach ($swift_options as $value) 
					if(isset($value['std']))$options[$value['id']]=$value['std'];
			update_option('swift_opt',$options);
			foreach($swift_design_options as $value)
					if(isset($value['std']))$options[$value['id']]=$value['std'];
			update_option('swift_design_opt',$options);
			create_style_sheet('true');
			create_js_file();
		}
		
		if(!get_option('swift_design_opt')){
			global $swift_design_options;
			global $swift_options;	
			foreach ($swift_options as $value)
				$options[$value['id']]=get_option($value['id']);
			update_option('swift_opt',$options); 
	
			foreach ($swift_design_options as $value)
				$options[$value['id']]=get_option($value['id']);
			update_option('swift_design_opt',$options);	 
			create_style_sheet('true');
			create_js_file();
		}
	}
}//end of function

add_action('switch_theme', 'delete_stuff');

function delete_stuff() {
  	delete_option('swift_activation_check');
} 

/* update_option action hooks*/
add_action('update_option_swift_opt', 'resetSwiftOptions');
add_action('update_option_swift_design_opt', 'resetSwiftOptions');
add_action('update_option_swift_random', 'swiftImportExport');



//Reset function
function resetSwiftOptions(){
	if(isset($_POST['general-reset'])&&'Reset' == $_POST['general-reset'] || isset($_POST['design-reset'])&&'Reset' == $_POST['design-reset'] ) 	{ 
		global $swift_design_options;
		global $swift_options;
		$options=NULL;
		if(isset($_POST['general-reset'])&&'Reset' == $_POST['general-reset']):
			foreach($swift_options as $value)
			if(isset($value['std']))$options[$value['id']]=$value['std'];
			update_option('swift_opt',$options);
		endif;
			
		if(isset($_POST['design-reset'])&&$_POST['design-reset']=='Reset'):
			foreach($swift_design_options as $value)
			if(isset($value['std']))$options[$value['id']]=$value['std'];
			update_option('swift_design_opt',$options);		
		endif;
	}
}

//SWIFT import and export options
function swiftImportExport(){
	if(isset($_POST['swift_importExport'])):
	
		global $swift_options;
		//$data=ase64_decode($_POST['swift_opt']);
		$data=unserialize($data);  
		//foreach ($swift_options as $value)
			//$option[$value['id']]=$data[$value['id']];
		update_option('swift_opt',$data);
		
		global $swift_design_options;
		//$data=ase64_decode($_POST['swift_design_opt']);
		$data=unserialize($data);	
		//foreach ($swift_design_options as $value)
			//$design_options[$value['id']]=$data[$value['id']];
		update_option('swift_design_opt',$data);
		
	endif;
}

add_action('update_option_swift_design_opt', 'create_style_sheet');
add_action('update_option_swift_opt', 'create_js_file');
?>
<?php
function swift_admin_header(){
}
?>
<?php
/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function swift_options_validate( $input ) {
		global $swift_options;		
		foreach($swift_options as $option){
			if(isset($option['datatype'])):
			switch ( $option['datatype'] ) {
				case "uri";
				$pattern="@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@";
				if(!preg_match($pattern,$input[$option['id']]))
						$input[$option['id']]=NULL;
				break;
				
				case "int";
				if(! absint($input[$option['id']]) )
				$input[$option['id']]=$option['std'];
				break;
					
				case "boolean";
				if(!isset($input[$option['id']]) || $input[$option['id']]!=true)
				$input[$option['id']]=false;
				break;
					
				case "radio";
				if(! in_array($input[$option['id']],$option['options']) )
				$input[$option['id']]=$option['std'];
				break;
				
				case "select";
				if(!in_array($input[$option['id']],$option['options']) )
				$input[$option['id']]=$option['std'];
				break;
				
				case "default";
				break;
			}
			endif;
		}
	return $input;
}
function swift_design_options_validate( $input2 ) {
	//print_r($input2);
		global $swift_design_options;
		foreach($swift_design_options as $option){
			if(isset($option['datatype'])):
			switch ( $option['datatype'] ) {
				case "uri";
				$pattern="@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@";
				if(!preg_match($pattern,$input2[$option['id']]))
						$input2[$option['id']]=NULL;
				break;
				
				case "int";
				if(! absint($input2[$option['id']]) )
				$input2[$option['id']]=$option['std'];
				break;
	
				case "boolean";
				if(!isset($input2[$option['id']]) || $input2[$option['id']]!=true)
				$input2[$option['id']]=false;
				break;
					
				case "radio";
				if(! in_array($input2[$option['id']],$option['options']) )
				$input2[$option['id']]=$option['std'];
				break;
				
				case "select";
				if(! in_array($input2[$option['id']],$option['options']))
				$input2[$option['id']]=$option['std'];
				break;
				
				case "default";
				break;
			}
			endif;
		}
	return $input2;
}
?>