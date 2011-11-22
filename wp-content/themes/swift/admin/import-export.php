<?php require_once('admin-header.php');?>
<?php
admin_header();
?>
<h3 style="padding:.5em; background:#FC9; border: solid 2px #Fb6; border-width:2px 0; line-height:1.5em; font-size:1.45em; color:#315607;">To export options copy paste the text in both the fields into your new blog, to import options from another blog do the opposite.
Do not make any changes to the import / export text string.
</h3>

<form method="post" action="options.php" style="width:700px;float:left" >
<?php wp_nonce_field('update-options'); ?>
<table class="form-table">

<tr valign="top">
<th scope="row"><h3>Swift Options</h3></th>
<td><textarea name="swift_opt" style="width:480px" rows="20"><?php //echo ase64_encode(serialize (get_option('swift_opt'))); ?></textarea></td>
</tr>
<tr valign="top">
<th scope="row"><h3>Swift Design Options</h3></th>
<td><textarea name="swift_design_opt" style="width:480px" rows="20"><?php //echo ase64_encode(serialize (get_option('swift_design_opt'))); ?></textarea></td>
</tr>
 </table>
<input name="swift_random" id="swift_random" type="hidden" value="<?php echo rand()?>" />
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="swift_random" />
<input type="hidden" name="swift_importExport" value="set" />
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Import Options') ?>"  style="float:right;"/>
</p>
</form>

<div style="float:left;width:220px;padding:0 10px">
<img src="<?php echo get_template_directory_uri();?>/admin/images/need-help.png" class="aligncenter" style="margin-left:-5px" />
<p style=" text-align:justify;">If you need a <strong>quick solution</strong> for your problem, send <strong>20$</strong> to <u>satish_g2009@yahoo.co.in</u> via <strong>PayPal</strong> and ask your questions.<br /> You will get a refund of your payment in case if I'm unable to solve your problem.Please make sure that I'm online before you send the payment.</p>
<p style=" text-align:justify;padding-left:10px">
This help feature is not limited to SWIFT theme, you can ask general WordPress related questions also.
</p>
    <!-- Powered by: Crafty Syntax Live Help        http://www.craftysyntax.com/ -->
    <div id="craftysyntax" style="margin:10px 20px;">
    <script type="text/javascript" src="http://swiftthemes.com/LiveSupport/livehelp_js.php?eo=1&department=1&amp;serversession=1&amp;pingtimes=15"></script>
    <br><font style="font-family: verdana, helvetica, sans-serif; font-size: 8px; color: #000000;">Powered By:</font>
    <a href="http://www.craftysyntax.com" alt="Crafty Syntax Live Help" target="_blank" style="font-family: verdana, helvetica, sans-serif; font-size: 10px; color: #11498e; text-decoration: none; font-weight: bold;">Crafty Syntax</a>
    </div>
	<!-- copyright 2003 - 2009 by Eric Gerdes -->
    	
</div>
<div class="clear"></div>
<div style="padding:10px">
<div style="float:left;">
			<script src="http://widgets.twimg.com/j/2/widget.js"></script>
            <script>
            new TWTR.Widget({
              version: 2,
              type: 'profile',
              rpp: 4,
              interval: 6000,
              width: 460,
              height: 270,
              theme: {
                shell: {
                  background: '#DDD',
                  color: '#006699'
                },
                tweets: {
                  background: '#FFF',
                  color: '#000',
                  links: '#069'
                }
              },
              features: {
                scrollbar: false,
                loop: false,
                live: false,
                hashtags: true,
                timestamp: true,
                avatars: false,
                behavior: 'all'
              }
            }).render().setUser('SwiftThemes').start();
    		</script>
		</div>
<iframe src="http://www.facebook.com/plugins/likebox.php?id=288816997330&amp;width=460&amp;connections=16&amp;stream=false&amp;header=true&amp;height=270" scrolling="no" frameborder="0" style="border:0;overflow:hidden; width:460px; height:270px; float:left; margin-left:20px" allowTransparency="true"></iframe>
</div>
</div><!-- /swift-wrapper-->
