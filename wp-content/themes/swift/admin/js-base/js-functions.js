
// Masonry script
(function(e){var n=e.event,o;n.special.smartresize={setup:function(){e(this).bind("resize",n.special.smartresize.handler)},teardown:function(){e(this).unbind("resize",n.special.smartresize.handler)},handler:function(j,l){var g=this,d=arguments;j.type="smartresize";o&&clearTimeout(o);o=setTimeout(function(){jQuery.event.handle.apply(g,d)},l==="execAsap"?0:100)}};e.fn.smartresize=function(j){return j?this.bind("smartresize",j):this.trigger("smartresize",["execAsap"])};e.fn.masonry=function(j,l){var g=
{getBricks:function(d,b,a){var c=a.itemSelector===undefined;b.$bricks=a.appendedContent===undefined?c?d.children():d.find(a.itemSelector):c?a.appendedContent:a.appendedContent.filter(a.itemSelector)},placeBrick:function(d,b,a,c,h){b=Math.min.apply(Math,a);for(var i=b+d.outerHeight(true),f=a.length,k=f,m=c.colCount+1-f;f--;)if(a[f]==b)k=f;d.applyStyle({left:c.colW*k+c.posLeft,top:b},e.extend(true,{},h.animationOptions));for(f=0;f<m;f++)c.colY[k+f]=i},setup:function(d,b,a){g.getBricks(d,a,b);if(a.masoned)a.previousData=
d.data("masonry");a.colW=b.columnWidth===undefined?a.masoned?a.previousData.colW:a.$bricks.outerWidth(true):b.columnWidth;a.colCount=Math.floor(d.width()/a.colW);a.colCount=Math.max(a.colCount,1)},arrange:function(d,b,a){var c;if(!a.masoned||b.appendedContent!==undefined)a.$bricks.css("position","absolute");if(a.masoned){a.posTop=a.previousData.posTop;a.posLeft=a.previousData.posLeft}else{d.css("position","relative");var h=e(document.createElement("div"));d.prepend(h);a.posTop=Math.round(h.position().top);
a.posLeft=Math.round(h.position().left);h.remove()}if(a.masoned&&b.appendedContent!==undefined){a.colY=a.previousData.colY;for(c=a.previousData.colCount;c<a.colCount;c++)a.colY[c]=a.posTop}else{a.colY=[];for(c=a.colCount;c--;)a.colY.push(a.posTop)}e.fn.applyStyle=a.masoned&&b.animate?e.fn.animate:e.fn.css;b.singleMode?a.$bricks.each(function(){var i=e(this);g.placeBrick(i,a.colCount,a.colY,a,b)}):a.$bricks.each(function(){var i=e(this),f=Math.ceil(i.outerWidth(true)/a.colW);f=Math.min(f,a.colCount);
if(f===1)g.placeBrick(i,a.colCount,a.colY,a,b);else{var k=a.colCount+1-f,m=[];for(c=0;c<k;c++){var p=a.colY.slice(c,c+f);m[c]=Math.max.apply(Math,p)}g.placeBrick(i,k,m,a,b)}});a.wallH=Math.max.apply(Math,a.colY);d.applyStyle({height:a.wallH-a.posTop},e.extend(true,[],b.animationOptions));a.masoned||setTimeout(function(){d.addClass("masoned")},1);l.call(a.$bricks);d.data("masonry",a)},resize:function(d,b,a){a.masoned=!!d.data("masonry");var c=d.data("masonry").colCount;g.setup(d,b,a);a.colCount!=c&&
g.arrange(d,b,a)}};return this.each(function(){var d=e(this),b={};b.masoned=!!d.data("masonry");var a=b.masoned?d.data("masonry").options:{},c=e.extend({},e.fn.masonry.defaults,a,j),h=a.resizeable;b.options=c.saveOptions?c:a;l=l||function(){};g.getBricks(d,b,c);if(!b.$bricks.length)return this;g.setup(d,c,b);g.arrange(d,c,b);!h&&c.resizeable&&e(window).bind("smartresize.masonry",function(){g.resize(d,c,b)});h&&!c.resizeable&&e(window).unbind("smartresize.masonry")})};e.fn.masonry.defaults={singleMode:false,
columnWidth:undefined,itemSelector:undefined,appendedContent:undefined,saveOptions:true,resizeable:true,animate:false,animationOptions:{}}})(jQuery);

jQuery(window).load(function() {
	jQuery("#mag-wrapper").masonry({ singleMode: true,  itemSelector: '.mag-masonry'});
	});

/*Drop down navigation*/
function dropdown() {
jQuery(".navigation ul").css({display: "none"}); // Opera Fix
jQuery(".navigation li").hover(function(){
		jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).show(268);
		},function(){
		jQuery(this).find('ul:first').css({visibility: "hidden"});
		});
toggleWidgets();
};
/*Tabs*///tab effects

var TabbedContent = {
	init: function() {	
		jQuery(".tab_item").mouseover(function() {
		
			var background = jQuery(this).parent().find(".moving_bg");
			
			jQuery(background).stop().animate({
				left: jQuery(this).position()['left']
			}, {
				duration: 300
			});
			
			TabbedContent.slideContent(jQuery(this));
			
		});
	},
	
	slideContent: function(obj) {
		
		var margin = jQuery(obj).parent().parent().find(".slide_content").width();
		margin=margin+40;
		margin = margin * (jQuery(obj).prevAll().size() - 1);
		margin = margin * -1;
		
		jQuery(obj).parent().parent().find(".tabslider").stop().animate({
			marginLeft: margin + "px"
		}, {
			duration: 300
		});
	}
}

jQuery(window).load(function() {
	TabbedContent.init();
});
/* Image width in the posts can be max 550px */
 
	jQuery(window).load(function() {
		jQuery('div.entry img').each(function() {
			current_width = jQuery(this).width();
			current_resized_width=jQuery(this).attr('width');
			current_height = jQuery(this).height();
			content_width=jQuery('#content').width()-34;
			aspect_ratio = current_width/current_height;
			if(current_width > content_width&&current_resized_width>content_width) {
				jQuery(this).removeAttr('width');
			jQuery(this).removeAttr('height');
			
				new_height = content_width/aspect_ratio;
				jQuery(this).width(content_width+'px');
				jQuery(this).height(new_height);
			}
		});
	});
/* Image width in the posts can be max 550px */
	jQuery(window).load(function() {
		jQuery('div.wp-caption').each(function() {
			jQuery(this).removeAttr('width');
			current_width = jQuery(this).width();
			current_height = jQuery(this).height();
			
			content_width=jQuery('#content').width()-34;
			aspect_ratio = current_width/current_height;
			if(current_width > content_width+12) {
				new_height = (content_width+12)/aspect_ratio;
				jQuery(this).width(content_width+12+'px');
			}
		});
	});
