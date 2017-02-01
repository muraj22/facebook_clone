<?php
$sechov.='
if(colorpicker_click===undefined){
var colorpicker_click="t";
$(document).on("click",".colorpickers",function(){

if($(this).prevAll(".brightness_slider").css("display")!="none"){
$(this).prevAll(".brightness").click();
$(this).prevAll(".brightness_slider").addClass("hidden_sb");
}

var l=$(".colorpickerw").length;
if(l==0){
	if($("#uioverlay").length>0){
	var delem=$("#uioverlay");
	}
	else{
	var delem=$("body");	
	}
$(delem).append(\'<div class="colorpickerw hidden_sb" style="position:absolute;left:-3000px;top:150%;opacity:0;z-index:503;"></div>\');
$(".colorpickerw").ColorPicker({flat: true});
$(".colorpicker_submit").before(\'<label class="uiButton uiButtonConfirm custom_filter_confirm" style="float: right;position: absolute;bottom: 12px;height: 12px;width: 12px;right: 40px;" data-t_text="Use selected color" data-t_align="center"></label>\');
}

if($(".colorpickerw").hasClass("hidden_sb")===true){
$(".colorpickerw").css("position","absolute");
$(".colorpickerw").css("left","-3000px");
$(".colorpickerw").css("top","150%");
$(".colorpickerw").css("opacity","0");
$(".colorpickerw").removeClass("hidden_sb");
}
else{
$(".colorpickerw").addClass("hidden_sb")
}

$(".colorpickerw").data("dopener",$(this));

var h=$(".colorpickerw").innerHeight();
var o=$(this).offset().top; 
var h=o-h;

var w=$(".colorpickerw").innerWidth();
var wv=$(this).innerWidth();

var o=$(this).offset().left;
if($(this).parents("._2yg").eq(0).length==0){
var w=o-w+wv; //opens to the left
}
else{
var w=o; //opens to the right
}

$(".colorpickerw").css("top","0px");
$(".colorpickerw").css("left","0px");


$(".colorpickerw").css("margin-top",h+"px");
$(".colorpickerw").css("margin-left",w+"px");


$(".colorpickerw").css("opacity","1");

if($(this).attr("data-c_fixed")!==undefined){
$(".colorpickerw").css("position","fixed");
}
else{
$(".colorpickerw").css("position","absolute");
}


});


function adjust_colorpicker(){

var dopener=eval($(".colorpickerw").data("dopener"));

var l=$(dopener).length;
if(l>0){
var o=$(dopener).offset().top;
var h=$(".colorpickerw").innerHeight();

var h=o-h;

$(".colorpickerw").css("margin-top",h+"px");

var o=$(dopener).offset().left;
var w=$(".colorpickerw").innerWidth();
var wv=$(dopener).innerWidth(); //para completar la medida contra la derecha

var w=o-w+wv;

$(".colorpickerw").css("margin-left",w+"px");
}

}

var rt_colorpicker; //resize timer color picker
$(window).resize(function() {
    clearTimeout(rt_colorpicker);
    rt_colorpicker=setTimeout(adjust_colorpicker, 100);
});


$(document).on("mousedown",".colorpicker",function(e){
var target=e.target;
if($(target).is("input")===true){}
else{e.preventDefault();}
});

$(document).on("click",function(e){
var target=e.target;
if($(target).parents(".colorpickerw").eq(0).length==0 && $(target).hasClass("colorpickers")===false && $(target).hasClass("jTagSaveClose")===false && $(target).parents("[data-f_type=custom]").eq(0).length==0){
$(".colorpickerw").addClass("hidden_sb");
}

});

$(document).on("click",".custom_filter_confirm",function(){

var red=$(this).parents(".colorpickerw").find(".colorpicker_rgb_r").find("input[type=text]").val();
var green=$(this).parents(".colorpickerw").find(".colorpicker_rgb_g").find("input[type=text]").val();
var blue=$(this).parents(".colorpickerw").find(".colorpicker_rgb_b").find("input[type=text]").val();

var brightness=$(this).parents(".colorpickerw").find(".colorpicker_hsb_b").find("input[type=text]").val();
var hue=$(this).parents(".colorpickerw").find(".colorpicker_hsb_h").find("input[type=text]").val();
var sat=$(this).parents(".colorpickerw").find(".colorpicker_hsb_s").find("input[type=text]").val();

var colors=red+","+green+","+blue;
var hsb=brightness+","+hue+","+sat;

var dopener=eval($(this).parents(".colorpickerw").data("dopener"));

if($(dopener).parents(".ui-state-defaultv").length>0){ //photo uploader
var delem=$(dopener).parents(".ui-state-defaultv").eq(0);	
}
else if($(dopener).parents("#edittab").eq(0).length>0){ //gallery viewer
var delem=$(dopener).parents("#edittab").eq(0);	
}
else if($(dopener).parents("._2yg").eq(0).length>0){ //nf
var delem=$(dopener).parents("._2yg").eq(0);
}

$(delem).find(".filter_options").find("input[name=custom_color]").val(colors);
$(delem).find(".filter_options").find("input[name=custom_hsb]").val(hsb);

$(delem).find(".colorpickers").addClass("colorpickers_active");

$(delem).find("[data-f_type=custom]").click();
});

}
';
?>