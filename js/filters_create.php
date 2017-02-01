<?php

$sechov='';
$sechov.='
if(marco_option_applied===undefined){
var from_uploader=false;

var detect_from_uploader=function(){
from_uploader=$(this).attr("data-from_uploader");
if(from_uploader=="photo_uploader"){
$(document).off("mouseover",".filters_edit",detect_from_uploader);
}
}

$(document).off("mouseover",".filters_edit",detect_from_uploader).on("mouseover",".filters_edit",detect_from_uploader);


var filters_create=new Array();
var filters_create_text=new Array();
var ax=0;
filters_create[ax]="normal";
filters_create_text[ax]="Normal"; ax++;
filters_create[ax]="lomo";
filters_create_text[ax]="Lo-fi"; ax++;
filters_create[ax]="toycamera";
filters_create_text[ax]="Toycamera"; ax++;
filters_create[ax]="vintage";
filters_create_text[ax]="Vintage"; ax++;
filters_create[ax]="toaster";
filters_create_text[ax]="Toaster"; ax++;
filters_create[ax]="nashville";
filters_create_text[ax]="Nashville"; ax++;
filters_create[ax]="kelvin";
filters_create_text[ax]="Kelvin"; ax++;
filters_create[ax]="gotham";
filters_create_text[ax]="Gotham"; ax++;
filters_create[ax]="nineties";
filters_create_text[ax]="1950"; ax++;
filters_create[ax]="rustic";
filters_create_text[ax]="Rustic"; ax++;
filters_create[ax]="lensflare";
filters_create_text[ax]="Lens-flare"; ax++;
filters_create[ax]="boost";
filters_create_text[ax]="Boost"; ax++;
filters_create[ax]="enrich";
filters_create_text[ax]="Enrich"; ax++;
filters_create[ax]="church";
filters_create_text[ax]="Church"; ax++;
filters_create[ax]="flashy";
filters_create_text[ax]="Flashy"; ax++;
filters_create[ax]="custom";
filters_create_text[ax]="Custom"; ax++;
filters_create[ax]="sketch";
filters_create_text[ax]="Sketch"; ax++;
filters_create[ax]="black_white_sketch";
filters_create_text[ax]="B/W Sketch"; ax++;
filters_create[ax]="cartoon";
filters_create_text[ax]="Cartoon"; ax++;
filters_create[ax]="cartoon_two";
filters_create_text[ax]="Cartoon II"; ax++;
filters_create[ax]="cartoon_iii";
filters_create_text[ax]="Cartoon III"; ax++;
filters_create[ax]="drawing";
filters_create_text[ax]="Drawing"; ax++;
filters_create[ax]="comic";
filters_create_text[ax]="Comic"; ax++;
filters_create[ax]="eight_bits";
filters_create_text[ax]="8-Bits"; ax++;
filters_create[ax]="four";
filters_create_text[ax]="Mosaic"; ax++;
filters_create[ax]="beatles_four";
filters_create_text[ax]="Warhol"; ax++;
filters_create[ax]="twenty_one";
filters_create_text[ax]="Mosaic II"; ax++;
filters_create[ax]="spiderman";
filters_create_text[ax]="Roses"; ax++;
filters_create[ax]="hulk";
filters_create_text[ax]="Mint"; ax++;
filters_create[ax]="superman";
filters_create_text[ax]="Subsbook"; ax++;
filters_create[ax]="wolverine";
filters_create_text[ax]="Yellowish"; ax++;
//filters_create[ax]="hawk_eye";
//filters_create_text[ax]="Hawk Eye"; ax++;
filters_create[ax]="dark_knight";
filters_create_text[ax]="Dark"; ax++;
filters_create[ax]="polaroid";
filters_create_text[ax]="Polaroid"; ax++;
filters_create[ax]="polaroid_toy";
filters_create_text[ax]="Polaroid Toy"; ax++;
filters_create[ax]="polaroid_cartoon";
filters_create_text[ax]="Polaroid Cartoon"; ax++;
filters_create[ax]="mirrors";
filters_create_text[ax]="Mirrors"; ax++;
filters_create[ax]="white_frame";
filters_create_text[ax]="Cloud Frame"; ax++;
filters_create[ax]="wrinkle_reducer";
filters_create_text[ax]="Ageless"; ax++;
filters_create[ax]="reggae";
filters_create_text[ax]="Reggae"; ax++;





var filters_frame=new Array();
filters_frame[0]="nashville";
filters_frame[1]="kelvin";
filters_frame[2]="gotham";

function this_slider(w){
if($(w).hasClass("brightness_slider")===true){
var dname="brightness";
var dnamev="contrast";
   if(from_uploader=="photo_uploader"){
var wo=$(w).prevAll(".contrast_slider").eq(0);
}else{
var wo=$(w).nextAll(".contrast_slider").eq(0);
}
}else if($(w).hasClass("contrast_slider")===true){
var dname="contrast";
var dnamev="brightness";
   if(from_uploader=="photo_uploader"){
var wo=$(w).nextAll(".brightness_slider").eq(0);
}else{
var wo=$(w).prevAll(".brightness_slider").eq(0);
}
}

$(w).slider({
      range: "min",
      min: 0,
      max: 100,
      value: 0,
      step: 10,
      slide: function( event, ui ) {
      
      $(wo).slider( "option", "value", 0 );
      $(this).prevAll(".filter_options").find("input[name="+dnamev+"]").val(0);
      $(wo).prev().eq(0).removeClass("brightness_active");
      $(wo).prev().eq(0).removeClass("contrast_active");
      
      
      $(this).prevAll(".filter_options").find("input[name="+dname+"]").val(ui.value/2);
      
      if(from_uploader=="photo_uploader"){
      var dli=$(this).parents(".ui-state-defaultv").eq(0);
      }
      else if(from_uploader=="gallery_viewer" || from_uploader=="._2yg"){
      var dli=$(this).parents(".filters_edit").eq(0);
      }
      
      var selected_filter=$(dli).find(".filter_selected_v").attr("data-f_type");
      
      $(dli).find(".filter_selected_v").addClass("filter_unselected");

      if(from_uploader!="._2yg"){
      
      if(selected_filter!="custom"){
     
      if($(dli).find(".filter_selected_v").attr("data-f_apply")=="t"){ //means it is ready, else just by adding filter_unselect it would trigger twice
      $(dli).find(".filter_selected_v").unbind("click",filter_select_handler);
      $(dli).find(".filter_selected_v").bind("click",filter_select_handler);
      }
      
      }
          
      }

if(from_uploader=="photo_uploader"){
$(this).parents(".ui-state-defaultv").eq(0).find(".filter").click();
}
else{
$(this).parents(".filters_edit").eq(0).find(".filter").removeClass("filter_active");
}

}

    });
  
    }

$(document).on("click",function(e){
var target=e.target;
if($(target).parents(".brightness_slider").eq(0).length==0 && $(target).hasClass("brightness_slider")===false && $(target).hasClass("brightness")===false && $(target).hasClass("jTagSaveClose")===false && $(target).hasClass("filter_working")===false){

$(".brightness_slider").each(function(){

if($(this).css("opacity")!="0"){

if($(this).slider("value")==0){
$(this).prevAll(".brightness").removeClass("brightness_active");
}else{
$(this).prevAll(".brightness").addClass("brightness_active");
}

$(this).addClass("hidden_sb");
}

});
}

});

$(document).on("click",function(e){
var target=e.target;
if($(target).parents(".contrast_slider").eq(0).length==0 && $(target).hasClass("contrast_slider")===false && $(target).hasClass("contrast")===false && $(target).hasClass("jTagSaveClose")===false && $(target).hasClass("filter_working")===false){

$(".contrast_slider").each(function(){

if($(this).css("opacity")!="0"){

if($(this).slider("value")==0){
$(this).prevAll(".contrast").removeClass("contrast_active");
}else{
$(this).prevAll(".contrast").addClass("contrast_active");
}

$(this).addClass("hidden_sb");
}

});
}

});

function display_brightness_slider(w){
    $(w).next(".brightness_slider").css("position","fixed");
    $(w).next(".brightness_slider").css("z-index","10001");
    var dtop=$(w).offset().top;
    dtop=parseInt(dtop);
    dtop=dtop-21;
    
    var dopener=$(w).parents("#picturetheater").eq(0);
    var l=$(dopener).length;
    if(l>0){
    var o=$(dopener).offset().top;
    dtop=dtop-o+22;
    }
    var dopener=$(w).parents("#uioverlay").eq(0);
    var l=$(dopener).length;
    if(l>0){
    var o=$(dopener).offset().top;
    dtop=dtop-o+22;
    }
    
    if(from_uploader=="._2yg"){
    dtop=dtop+22;
    }
    
    var dleft=$(w).offset().left;
    if($(w).parents("#uioverlay").eq(0).length>0){
    dtop=dtop+1;
    }
    $(w).next(".brightness_slider").css("margin-top",dtop+"px");
    $(w).next(".brightness_slider").css("left",dleft+"px");
    $(w).next(".brightness_slider").removeClass("hidden_sb");
}

function display_contrast_slider(w){
    $(w).next(".contrast_slider").css("position","fixed");
    $(w).next(".contrast_slider").css("z-index","10001");
    var dtop=$(w).offset().top;
    dtop=parseInt(dtop);
    dtop=dtop-21;
    
    var dopener=$(w).parents("#picturetheater").eq(0);
    var l=$(dopener).length;
    if(l>0){
    var o=$(dopener).offset().top;
    dtop=dtop-o+22;
    }
    var dopener=$(w).parents("#uioverlay").eq(0);
    var l=$(dopener).length;
    if(l>0){
    var o=$(dopener).offset().top;
    dtop=dtop-o+22;
    }
    
    if(from_uploader=="._2yg"){
    dtop=dtop+22;
    }
    
    var dleft=$(w).offset().left;
    if($(w).parents("#uioverlay").eq(0).length>0){
    dtop=dtop+1;
    }
    $(w).next(".contrast_slider").css("margin-top",dtop+"px");
    $(w).next(".contrast_slider").css("left",dleft+"px");
    $(w).next(".contrast_slider").removeClass("hidden_sb");
}

function adjust_sliders(){
var c=$(".brightness_slider,.contrast_slider").filter(function() {
return ( $(this).css("opacity") != "0" );
});		

$(c).each(function(){
if($(this).hasClass("brightness_slider")===true){
display_brightness_slider($(this).prevAll(".brightness"));
}else if($(this).hasClass("contrast_slider")===true){
display_contrast_slider($(this).prevAll(".contrast"));
}
});

}

var rt_sliders; //resize timer sliders
$(window).resize(function() {
    clearTimeout(rt_sliders);
    rt_sliders=setTimeout(adjust_sliders, 100);
});

var marco_option_applied=function(){
$(".brightness_slider").addClass("hidden_sb");
$(".contrast_slider").addClass("hidden_sb");

if($(this).hasClass("marco_active")===true){
$(this).prevAll(".filter_options").find("input[name=frame]").val("2");
$(this).removeClass("marco_active");
}
else if($(this).hasClass("marco")===true){
$(this).prevAll(".filter_options").find("input[name=frame]").val("1");
$(this).addClass("marco_active");
}
else if($(this).hasClass("drop_active")===true){
$(this).prevAll(".filter_options").find("input[name=tilt_shift]").val("2");
$(this).removeClass("drop_active");
}
else if($(this).hasClass("drop")===true){
$(this).prevAll(".filter_options").find("input[name=tilt_shift]").val("1");
$(this).addClass("drop_active");
}
else if($(this).hasClass("brightness_active")===true){
if($(this).next(".brightness_slider").slider("value")==0){
$(this).removeClass("brightness_active");
}else{
display_brightness_slider($(this));
}
}
else if($(this).hasClass("brightness")===true){
$(this).addClass("brightness_active");
display_brightness_slider($(this));
}
else if($(this).hasClass("contrast_active")===true){
if($(this).next(".contrast_slider").slider("value")==0){
$(this).removeClass("contrast_active");
}else{
display_contrast_slider($(this));
}
}
else if($(this).hasClass("contrast")===true){
$(this).addClass("contrast_active");
display_contrast_slider($(this));
}

if(from_uploader=="photo_uploader"){
var dli=$(this).parents(".ui-state-defaultv").eq(0);
}
else if(from_uploader=="gallery_viewer" || from_uploader=="._2yg"){
var dli=$(this).parents(".filters_edit").eq(0);
}

var filter_original=$(dli).find(".filter_options").find("input[name=frame_original]").val();
var filter=$(dli).find(".filter_options").find("input[name=frame]").val();

var filter_originalv=$(dli).find(".filter_options").find("input[name=tilt_shift_original]").val();
var filterv=$(dli).find(".filter_options").find("input[name=tilt_shift]").val();

var selected_filter=$(dli).find(".filter_selected_v").attr("data-f_type");


if(from_uploader!="._2yg"){

if(selected_filter!="custom"){

if(filter!=filter_original && in_array(selected_filter,filters_frame) || filterv!=filter_originalv){
$(dli).find(".filter_selected_v").addClass("filter_unselected");

if($(dli).find(".filter_selected_v").attr("data-f_apply")=="t"){ //means it is ready, else just by adding filter_unselect it would trigger twice
$(dli).find(".filter_selected_v").unbind("click",filter_select_handler);
$(dli).find(".filter_selected_v").bind("click",filter_select_handler);
}

}
else{
$(dli).find(".filter_selected_v").removeClass("filter_unselected");
$(dli).find(".filter_selected_v").unbind("click",filter_select_handler);
}

}

}


if(from_uploader=="photo_uploader"){
$(this).parents(".ui-state-defaultv").eq(0).find(".filter").click();
}
else if(from_uploader=="._2yg"){
if(filterv=="1" || selected_filter!="normal"){
$(this).parents(".filters_edit").eq(0).find(".filter").addClass("filter_active");
}
else{
$(this).parents(".filters_edit").eq(0).find(".filter").removeClass("filter_active");
}
}
}


$(document).on("click",".marco,.drop,.brightness,.contrast",marco_option_applied);


var active_conversion="f";

function cancel_filter(){
var corder=$("#ao_gn").val();
var sbid=pi_gn[corder];
var tocheck=sbid+"filter";
if(window[tocheck]){
window[tocheck].abort();
}
$(".picturetheater").find(".loading_filter").addClass("hidden_sb");
$(".picturetheater").find(".filter_mask").addClass("hidden_sb");

$(document).off("click",".marco,.drop,.brightness,.contrast",marco_option_applied);
$(document).on("click",".marco,.drop,.brightness,.contrast",marco_option_applied);
}

function filter_applied(response,org_elem){//alert(response);
var res=$.parseJSON(response);

var filter=$(org_elem).next("[data-f_type]").attr("data-f_type");
var tocheck="[data-f_type="+filter+"]";

if(from_uploader=="photo_uploader"){
var dli=$(org_elem).parents(".ui-state-defaultv").eq(0);
}
else if(from_uploader=="gallery_viewer"){
var dli=$(org_elem).parents(".picturetheater").eq(0);
}

$(dli).find(tocheck).find(".filter_selected_wrapper").removeClass("hidden_sb");

if(from_uploader=="photo_uploader"){
var dimg=".deav";
}
else if(from_uploader=="gallery_viewer"){
var dimg=".img1";
}

$(dli).find(dimg).unbind("load");


if(from_uploader=="gallery_viewer"){
$(dli).find(dimg).attr("src","/images/transparent.png");
}

$(dli).find(dimg).bind("load",function(){
$(dli).find(".filter_selection_wrapper").addClass("filter_unselected");

$(dli).find(".loading_filter").addClass("hidden_sb");
$(dli).find(".filter_mask").addClass("hidden_sb");

$(dli).find(".filter_selection_wrapper[data-f_apply=t]:not([data-f_type="+filter+"])").unbind("click",filter_select_handler);
$(dli).find(".filter_selection_wrapper[data-f_apply=t]:not([data-f_type="+filter+"])").bind("click",filter_select_handler);

if(filter=="custom"){
$(dli).find(".filter_selection_wrapper[data-f_apply=t][data-f_type="+filter+"]").unbind("click",filter_select_handler);
$(dli).find(".filter_selection_wrapper[data-f_apply=t][data-f_type="+filter+"]").bind("click",filter_select_handler);
$(dli).find(".filter_selection_wrapper[data-f_apply=t][data-f_type="+filter+"]").removeClass("filter_unselected"); //data-f_apply always equals to t in these 3 cases as it has been obviously applied nevertheless
}

$(dli).find(".maquina").removeClass("maquina_border_filter");

var tilt_shift=$(dli).find("input[name=tilt_shift]").val();
if(filter!="normal" || tilt_shift==1){
$(dli).find(".filter").addClass("filter_active");
}
else{
$(dli).find(".filter").removeClass("filter_active");
}
$("[data-t_filter_wastipped]").removeAttr("data-t_rfd");
$("[data-t_filter_wastipped]").removeAttr("data-t_filter_wastipped");

active_conversion="f";

$(document).off("click",".marco,.drop,.brightness,.contrast",marco_option_applied);
$(document).on("click",".marco,.drop,.brightness,.contrast",marco_option_applied);

$(dli).find(".marco_mask").addClass("hidden_sb");
$(dli).find(".colorpickers_mask").addClass("hidden_sb");
$(dli).find(".drop_mask").addClass("hidden_sb");
$(dli).find(".brightness_mask").addClass("hidden_sb");
$(dli).find(".contrast_mask").addClass("hidden_sb");

$(dli).find(".filter_selection_wrapper").removeClass("cursor_default");

$(this).unbind("load");
});



if(from_uploader=="gallery_viewer"){
var corder=$("#ao_gn").val();
p_gn[corder]=res.photo+"?a="+retcount();
sw_gn[corder]=res.width;
sh_gn[corder]=res.height;
br_gn[corder]=res.brightnessv;
tbr_gn[corder]=res.brightness;
co_gn[corder]=res.contrastv;
tco_gn[corder]=res.contrast;

$("#picwidth").val(res.width);
$("#picheight").val(res.height);
}



$(dli).find(dimg).attr("src","/'.$uid.'/pics/"+res.photo+"?a="+retcount());

if(from_uploader=="gallery_viewer"){
$("#img1").css("width",res.width+"px");
$("#img1").css("height",res.height+"px");

settoport();
}

}

function mask_filters(w){
active_conversion="t";
if(from_uploader=="photo_uploader"){
var dli=$(w).parents(".ui-state-defaultv").eq(0);
var dimg=".deav";
}
else if(from_uploader=="gallery_viewer"){
var dli=$(w).parents(".picturetheater").eq(0);
var dimg=".img1";
}

$(dli).find(".filter_selection_wrapper").addClass("cursor_default");
$(dli).find(".filter_selection_wrapper").removeClass("filter_unselected");
//$(w).next(".filter_selection_wrapper").removeClass("filter_unselected");

$(dli).find(".filter_mask").removeClass("hidden_sb");

var h=$(dli).find(dimg).height();

$(dli).find(".loading_filter").css("line-height",h+"px");
$(dli).find(".loading_filter").removeClass("hidden_sb");

$(dli).find(".maquina").addClass("maquina_border_filter");

$(dli).find(".filter_selected_wrapper").addClass("hidden_sb");

$(document).off("click",".marco,.drop,.brightness,.contrast",marco_option_applied);

$(dli).find(".filter_selected_v").removeClass("filter_selected_v");
$(w).next().addClass("filter_selected_v");

var frame=$(dli).find(".filter_options").find("input[name=frame]").val();
$(dli).find(".filter_options").find("input[name=frame_original]").val(frame);

var tilt_shift=$(dli).find(".filter_options").find("input[name=tilt_shift]").val();
$(dli).find(".filter_options").find("input[name=tilt_shift_original]").val(tilt_shift);

$(dli).find(".marco_mask").removeClass("hidden_sb");
$(dli).find(".colorpickers_mask").removeClass("hidden_sb");
$(dli).find(".drop_mask").removeClass("hidden_sb");
$(dli).find(".brightness_mask").removeClass("hidden_sb");
$(dli).find(".contrast_mask").removeClass("hidden_sb");
}

function filter_select_handler(e){
if(from_uploader=="photo_uploader"){
var dli=$(this).parents(".ui-state-defaultv").eq(0);
}
else if(from_uploader=="gallery_viewer"){
var dli=$(this).parents(".filters_edit").eq(0);
}

if(e.pageX===undefined){
var dpagex=$(this).attr("data-pagex");
}
else{
var dpagex=e.pageX;
}

if($(this).attr("data-f_type")!="custom" || ($(this).attr("data-f_type")=="custom" && (dpagex===undefined || dpagex=="implicit")) ){

//aca ver si el color cambio como para realmente hacer algo.. opcional, que lo manden al server con el mismo color igual..
$(dli).find(".filter_selection_wrapper").unbind("click",filter_select_handler);
$(this).prev(".filter_trigger").click();

}
else{
$(this).attr("data-pagex","implicit");
$(dli).find(".colorpickers").click();
e.stopImmediatePropagation();
e.stopPropagation();
}

}

$(document).off("click",".filter_unselected[data-f_apply][data-f_apply!=t]").on("click",".filter_unselected[data-f_apply][data-f_apply!=t]",function(e){
if(from_uploader=="photo_uploader"){
var dli=$(this).parents(".ui-state-defaultv").eq(0);
}
else if(from_uploader=="gallery_viewer"){
var dli=$(this).parents(".filters_edit").eq(0);
}
else if(from_uploader=="._2yg"){ //nf
var dli=$("._2yg");
}

var selected_filter=$(this).attr("data-f_type");
var current_filter=$(this).parents(".filters_edit_wrap").eq(0).find(".filter_selected_v").attr("data-f_type");

if(from_uploader=="._2yg"){
$(this).parents(".filters_edit").eq(1).find("input[name=new_filter]").val(selected_filter);
var filterv=$(this).parents(".filters_edit").eq(1).find("input[name=tilt_shift]").val();
if(selected_filter!="normal" || filterv=="1"){
$(this).parents(".filters_edit").eq(1).find(".filter").addClass("filter_active");
}
else{
$(this).parents(".filters_edit").eq(1).find(".filter").removeClass("filter_active");
}
$("._2yg").find(".filter_selected_v").removeClass("filter_selected_v");
$(this).addClass("filter_selected_v");
$("._2yg").find(".filter_selected_wrapper").addClass("hidden_sb");
$(this).find(".filter_selected_wrapper").removeClass("hidden_sb");
if(selected_filter=="custom"){
$(this).attr("data-pagex","implicit");
$(dli).find(".colorpickers").click();
e.stopImmediatePropagation();
e.stopPropagation();
}
return false;
}
$(this).attr("data-f_apply","t");
var thisv=$(this).prev(".filter_trigger");


if(from_uploader=="photo_uploader"){
$(thisv).attr("data-a_id",$(this).parents(".ui-state-defaultv").eq(0).attr("data-sbid")+"filter");
var cfjax="/filters/filters.php?new_filter="+$(this).attr("data-f_type")+"&sbid="+$(this).parents(".ui-state-defaultv").eq(0).attr("data-sbid");
var delem=".ui-state-defaultv";
}
else if(from_uploader=="gallery_viewer"){
var corder=$("#ao_gn").val();
var sbid=pi_gn[corder];
//alert(sbid);
$(thisv).attr("data-a_id",sbid+"filter");
var cfjax="/filters/filters.php?new_filter="+$(this).attr("data-f_type")+"&sbid="+sbid+"&from_gallery=t";
var delem=".filters_edit";
}
if(selected_filter!="custom"){
$(dli).find(".colorpickers_active").removeClass("colorpickers_active");
}

$(this).attr("data-pagex",e.pageX);

$(thisv).attr("data-a_starts","mask_filters");
$(thisv).data("a_formo",$(this).parents(delem).eq(0).find(".filter_options"));
$(thisv).attr("data-a_custom_f","filter_applied");
$(thisv).attr("fjax",cfjax);
$(this).unbind("click",filter_select_handler);
$(this).bind("click",filter_select_handler);
$(this).click();

});
}
';
include("js/colorpicker.php");
?>