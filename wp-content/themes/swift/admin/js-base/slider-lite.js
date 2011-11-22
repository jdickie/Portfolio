
//Lite slider
(function($){$.fn.jFlow=function(options){var opts=$.extend({},$.fn.jFlow.defaults,options);var randNum=Math.floor(Math.random()*11);var jFC=opts.controller;var jFS=opts.slideWrapper;var jSel=opts.selectedWrapper;var cur=0;var timer;var maxi=$(jFC).length;var slide=function(dur,i){$(opts.slides).children().css({overflow:"hidden"});$(opts.slides+" iframe").hide().addClass("temp_hide");$(opts.slides).animate({marginLeft:"-"+(i*$(opts.slides).find(":first-child").width()+"px")},opts.duration*(dur),opts.easing,function(){$(opts.slides).children().css({overflow:"hidden"});$(".temp_hide").show();});}
$(this).find(jFC).each(function(i){$(this).click(function(){dotimer();if($(opts.slides).is(":not(:animated)")){$(jFC).removeClass(jSel);$(this).addClass(jSel);var dur=Math.abs(cur-i);slide(dur,i);cur=i;}});});$(opts.slides).before('<div id="'+jFS.substring(1,jFS.length)+'"></div>').appendTo(jFS);$(opts.slides).find("div").each(function(){$(this).before('<div class="jFlowSlideContainer"></div>').appendTo($(this).prev());});$(jFC).eq(cur).addClass(jSel);var resize=function(x){$(jFS).css({position:"relative",width:opts.width,height:opts.height,overflow:"hidden"});$(opts.slides).css({position:"relative",width:$(jFS).width()*$(jFC).length+"px",height:$(jFS).height()+"px",overflow:"hidden"});$(opts.slides).children().css({position:"relative",width:$(jFS).width()+"px",height:$(jFS).height()+"px","float":"left",overflow:"hidden"});$(opts.slides).css({marginLeft:"-"+(cur*$(opts.slides).find(":eq(0)").width()+"px")});}
resize();$(window).resize(function(){resize();});$(opts.prev).click(function(){dotimer();doprev();});$(opts.next).click(function(){dotimer();donext();});var doprev=function(x){if($(opts.slides).is(":not(:animated)")){var dur=1;if(cur>0)
cur--;else{cur=maxi-1;dur=cur;}
$(jFC).removeClass(jSel);slide(dur,cur);$(jFC).eq(cur).addClass(jSel);}}
var donext=function(x){if($(opts.slides).is(":not(:animated)")){var dur=1;if(cur<maxi-1)
cur++;else{cur=0;dur=maxi-1;}
$(jFC).removeClass(jSel);slide(dur,cur);$(jFC).eq(cur).addClass(jSel);}}
var dotimer=function(x){if((opts.auto)==true){if(timer!=null)
clearInterval(timer);timer=setInterval(function(){$(opts.next).click();},3000);}}
dotimer();};$.fn.jFlow.defaults={controller:".jFlowControl",slideWrapper:"#jFlowSlide",selectedWrapper:"jFlowSelected",auto:true,easing:"swing",duration:2000,width:"100%",prev:".jFlowPrev",next:".jFlowNext"};})(jQuery);

 jQuery(document).ready(function(){
    jQuery("#myController").jFlow({
        slides: "#slides",  // the div where all your sliding divs are nested in
        controller: ".jFlowControl", // must be class, use . sign
        slideWrapper : "#jFlowSlide", // must be id, use # sign
        selectedWrapper: "jFlowSelected",  // just pure text, no sign
        width: "",  // this is the width for the content-slider
        height: "220px",  // this is the height for the content-slider
        duration: 000,  // time in miliseconds to transition one slide
        prev: ".jFlowPrev", // must be class, use . sign
        next: ".jFlowNext" // must be class, use . sign
    });
}); 
