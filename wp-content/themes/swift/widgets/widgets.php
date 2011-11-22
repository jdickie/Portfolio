<?php
//================================ Widget without paddings and border ============
class SwiftLite extends WP_Widget {
    /** constructor */
    function SwiftLite() {
        parent::WP_Widget(false, $name = 'SWIFT Text widget without padding and border');	
		

    }
	/** @see WP_Widget::widget */
    function widget($args, $instance) {	
        extract( $args );
		$text= $instance['text'];
       	$title = apply_filters('widget_title', $instance['title']);
		echo '<div class="swift-lite">'; if ( $title )
		if($title!='' )
        echo '<h4 class="widget-title">' . $title . '</h4>'; 
          
		echo $text;
     	
		echo '</div>';
        
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {	
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = esc_attr($new_instance['text']);
		
		return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {	
		$instance = wp_parse_args( (array) $instance, array( 'title' =>'', 'text' =>'' ) );			
		if(isset($instance['text']))
		$text= esc_attr($instance['text']);
       	$title = apply_filters('widget_title', $instance['title']);
        ?>
            <p>
	 <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo "Title:"; ?> </label>
     <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
                 <br />
            <textarea class="widefat" rows="16" cols="20"  name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>" style="margin-top:.5em;" ><?php echo $text; ?></textarea>
            </p>
        <?php     }}
		
		
//================================ Home Page Only Text Widget ============
class HomePageOnlyText extends WP_Widget {
    /** constructor */
    function HomePageOnlyText() {
        parent::WP_Widget(false, $name = 'SWIFT Home page only text');	
		

    }
	/** @see WP_Widget::widget */
    function widget($args, $instance) {	
	if(is_front_page()):
        extract( $args );
		$text= $instance['text'];
       	$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget; if ( $title )
        echo $before_title . $title . $after_title;         
		echo $text;
		echo $after_widget;
		endif;
        
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] = esc_attr($new_instance['text']);
		
		return $instance;
		    }
    /** @see WP_Widget::form */
    function form($instance) {	
		$instance = wp_parse_args( (array) $instance, array( 'title' =>'', 'text' =>'') );	
		if(isset($instance['text']))		
		$text= esc_attr($instance['text']);
       	$title = apply_filters('widget_title', $instance['title']);
        ?>
            <p>
	 <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo "title"; ?> </label>
     <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
                 <br />
            <textarea class="widefat" rows="16" cols="20"  name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>" style="margin-top:.5em;" ><?php echo $text; ?>
            </textarea>
            </p>
        <?php     }}

//================================ SUBSCRIBE WIDGET ======================

class SubscribeBox extends WP_Widget {
    /** constructor */
    function SubscribeBox() {
        parent::WP_Widget(false, $name = 'SWIFT E-mail subscription');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        global $swift_opt;
        global $swift_design_opt;
		$feedId=$swift_opt['swift_feedburnerid'];
        ?>
              <?php echo $before_widget; ?>
            <div class="subscribe-box">
			<a href="http://feeds.feedburner.com/<?php echo $feedId ?>" title="Subscribe to our RSS feed">
             <img src="http://feeds.feedburner.com/~fc/<?php echo $feedId ?>?bg=<?php echo $swift_design_opt['swift_chicklet_bg'];?>&amp;fg=<?php echo $swift_design_opt['swift_chicklet'];?>&amp;anim=0" class="alignright" alt="Feedburner counter"  style="margin:.3em 0 .2em 0"/></a>
			<h3 style="margin:0">Subscribe</h3>
    <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feedId ?>', 'popupwindow', 'scrollbars=yes, width=550,height=520 ');return true">
            <input style="padding: 0.2em 0pt; width: 190px;" name="email" value="Enter your e-mail address" onfocus="if (this.value == 'Enter your e-mail address') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter your e-mail address';}" type="text" />
            <input value="<?php echo $feedId ?>" name="uri" type="hidden" />
            <input name="loc" value="en_US" type="hidden" />
            <input value="Subscribe" type="submit" class="subscribe-button" />
            </form>
        	<div class="clear"></div>
			</div>
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
		        global $opt;
        global $swift_design_opt;
        ?>
            <p>
	<?php if(!(isset($swift_opt['swift_feedburnerid'])&&$swift_opt['swift_feedburnerid'])):?>
		<span style="color:#F00">You should enter your Feedburner ID in the SWIFT Options Page(General Settings) for this widget to function properly.</span><br />
	<?php endif;?>
    	You can customize the colors of this widget and of the Feedburner chicklet in the SWIFT Color options page.       

            </p>
        <?php     }}?>
<?php 
// =============================== Tabs Widget ======================================

class swiftTabs extends WP_Widget {
    /** constructor */
    function swiftTabs() {
        parent::WP_Widget(false, $name = 'SWIFT Tabs');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        
        ?>
               
                 <?php 		locate_template(array(INCLUDES . '/tabs.php'), true, false );?>               
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        
        ?>
         <p>You can customize the colors of this widget in the SWIFT Colors settings page.</p>    
        <?php 
    }

} // class swiftTabs


// ======================================= AD's Widget =======================================
class swiftAdsWidget extends WP_Widget {
    /** constructor */
    function swiftAdsWidget() {
        parent::WP_Widget(false, $name = 'SWIFT 125*125 ads');	
    }
    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
		echo $before_widget;
		$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']); 
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
      
		ads_widget($instance['one'],$instance['two'],$instance['three'],$instance['four']);
     	
		echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['one'] =  (bool)( $new_instance['one'] == 1 ? true : false );
		$instance['two'] =  (bool)( $new_instance['two'] == 1 ? true : false );
		$instance['three'] =  (bool)( $new_instance['three'] == 1 ? true : false );
		$instance['four'] =  (bool)( $new_instance['four'] == 1 ? true : false );
		return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'one' => false, 'two' => false, 'three' => false, 'four' => false ) );
        $title = $instance['title'];
		$one = $instance['one'];
		$two = $instance['two'];
		$three = $instance['three'];
		$four = $instance['four'];
		?>
        
		            <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
            
			Tick the banners which you want to show in this widget. The banners themselves can be defined in the SWIFT Ad Management settings page.<br />
            
            <label for="<?php echo $this->get_field_id('one'); ?>">
            <input type="checkbox" id="<?php echo $this->get_field_id('one'); ?>" name="<?php echo $this->get_field_name('one'); ?>" value="true" <?php checked(true, $one); ?> />
            <?php _e('First'); ?>
            
            </label>
            
            <label for="<?php echo $this->get_field_id('two'); ?>">
            <input type="checkbox" id="<?php echo $this->get_field_id('two'); ?>" name="<?php echo $this->get_field_name('two'); ?>" value="true" <?php checked(true, $two); ?>  />
            <?php _e('Second'); ?>
            
            </label><br />
            
            <label for="<?php echo $this->get_field_id('three'); ?>">
            <input type="checkbox" id="<?php echo $this->get_field_id('three'); ?>" name="<?php echo $this->get_field_name('three'); ?>" value="true" <?php checked(true, $three); ?>  />
            <?php _e('Third'); ?>
            
            </label>
            
            <label for="<?php echo $this->get_field_id('four'); ?>">
            <input type="checkbox" id="<?php echo $this->get_field_id('four'); ?>" name="<?php echo $this->get_field_name('four'); ?>" value="true" <?php checked(true, $four); ?>  />
            <?php _e('Fourth'); ?>
            
            </label>
            

            </p>
			<?php
    }

}
// =============================== Popular posts Widget ======================================
class swiftPopularPosts extends WP_Widget {
    /** constructor */
    function swiftPopularPosts() {
        parent::WP_Widget(false, $name = 'SWIFT Popular posts');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {
				$instance = wp_parse_args( (array) $instance, array( 'title' =>'', 'text' =>'','number' =>6,'thumb_enable'=>true, ) );			
		
        extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		$number = esc_attr($instance['number']);
		$thumb_enable=esc_attr($instance['thumb_enable']);
		echo $before_widget; if ( $title )
        echo $before_title . $title . $after_title; 
            


        $title = apply_filters('widget_title', $instance['title']);
		popular_widget($number,$thumb_enable);
     	
		echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {	
		$instance = wp_parse_args( (array) $instance, array( 'title' =>'', 'text' =>'','number' =>6,'thumb_enable'=>true, ) );			
       	if(isset($instance['title'])) $title = esc_attr($instance['title']);
		if(isset($instance['number']))$number = esc_attr($instance['number']);
		if(isset($instance['thumb_enable']))$thumb_enable=esc_attr($instance['thumb_enable']);
		?>
        
		            <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo "title"; ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
            
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of popular posts to show:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" /></label>
            
            <label for="<?php echo $this->get_field_id('thumb_enable'); ?>">
            <input type="checkbox" name="<?php echo $this->get_field_name('thumb_enable'); ?>" value="true" <?php if($thumb_enable=="true") echo "checked" ?> />
            <?php _e('Show thumbnails'); ?>
            
            </label><br />
            

            </p>
			<?php
    }

}  
?>