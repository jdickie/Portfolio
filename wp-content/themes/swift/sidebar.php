<?php global $swift_design_opt;?>
<?php if(isset($swift_design_opt['swift_layout'])&&$swift_design_opt['swift_layout']!='Centered'):
?>
</div><!--/right container-->
<div id="sb-container">
	<div class="wide-sidebar">
	<?php dynamic_sidebar('wrt')?>
    </div> 

    <div id="sb1"><?php dynamic_sidebar('nrl')?></div>
    <div id="sb2"><?php dynamic_sidebar('nrr')?></div>
    
    <div class="clear"></div>
    <div class="wide-sidebar"><?php dynamic_sidebar('wrb')?></div>
</div>


<?php else:?>
<div id="sb1"><?php dynamic_sidebar('nrl')?></div>
</div><!-- /right-container-->
<div id="sb2"><?php dynamic_sidebar('nrr')?></div>
<div class="clear"></div>

<?php endif;?>
