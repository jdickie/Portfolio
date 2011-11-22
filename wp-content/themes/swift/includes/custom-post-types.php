<?php
	add_action('init', 'roundups');
	function roundups() {
    	$args = array(
        	'label' => __('roundup'),
        	'singular_label' => __('roundups'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => true,
        	'supports' => array('title', 'editor', 'thumbnail','round-up-interval','comments')
        );
    	register_post_type( 'roundup' , $args );
	}
?>
<?php
	add_action("admin_init", "admin_init");
	add_action('save_post', 'save_interval');
	function admin_init(){
		add_meta_box("round-up-interval", "Round up interval (YYYY-MM-DD)", "meta_options", "roundup", "side", "high");
	}

	function meta_options(){
		global $post;
		$date = get_post_meta($post->ID,'swift_roundup',true);
?>
	<p class="swift_date">
    
	From:
    <label for="s_d"></label><input name="roundup[s_d]" value="<?php if(isset($date['s_d'])) echo $date['s_d'];?>" type="text" style="width:90px;disply:inline" class="datepicker" />
	
	&nbsp;&nbsp;To:
    <label for="e_d"></label><input name="roundup[e_d]" value="<?php if(isset($date['e_d'])) echo $date['e_d'];?>" type="text" style="width:90px;disply:inline" class="datepicker" />
	</p>

<?php
	}

function save_interval(){
	global $post;
	if(isset($_POST["roundup"]))
	update_post_meta($post->ID, "swift_roundup", $_POST["roundup"]);
}
?>
