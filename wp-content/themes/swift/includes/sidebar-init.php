<?php

function the_widgets_init() {
    if ( !function_exists('register_sidebars') )
        return;
 
	 
	
//Sidebars for right wide layout
    	register_sidebar(array('name' => 'Wide SB Top','id' => 'wrt','description'=>'This widget area will be used when you are using right sidebar or left sidebar layout, and it will be above the two narrow sidebars','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
		
		
	    register_sidebar(array('name' => 'Narrow SB, Left','id' => 'nrl','description'=>'This widget area will be used when you are using right sidebar,left sidebar or centered layout, It will be below the wide SB Top when you are using left sidebar or right sidebar layouts. If you are using centered layout, sidebars will be reversed. Right will be left, left will be right.','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));

	    register_sidebar(array('name' => 'Narrow SB, Right','id' => 'nrr','description'=>'This widget area will be used when you are using right sidebar,left sidebar or centered layout, It will be below the wide SB Top when you are using left sidebar or right sidebar layouts. If you are using centered layout, sidebars will be reversed. Right will be left, left will be right.','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
		
		
		register_sidebar(array('name' => 'Wide SB Bottom','id' => 'wrb','description'=>'This widget area will be used when you are using right sidebar or left sidebar layouts, and it will be below the two narrow sidebars','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
		
		
		
		register_sidebar(array('name' => 'Single SB Left','id' => 'sl','description'=>'This widget area will be used when you are using single sidebar left PAGE TEMPLATE','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
		
		register_sidebar(array('name' => 'Single SB Right','id' => 'sr','description'=>'This widget area will be used when you are using single sidebar right PAGE TEMPLATE','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));

		register_sidebar(array('name' => 'Custom Home Page SB','id' => 'chpsb','description'=>'This widget area will be used when you are using CUSTOM HOME PAGE TEMPLATE','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));		
		
		
	  
		
	    register_sidebar(array('name' => 'Footer-1','id' => 'Footer-1','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
	
	    register_sidebar(array('name' => 'Footer-2','id' => 'Footer-2','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
	
	    register_sidebar(array('name' => 'Footer-3','id' => 'Footer-3','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
	
	    register_sidebar(array('name' => 'Footer-4','id' => 'Footer-4','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
	}

add_action( 'init', 'the_widgets_init' );

?>