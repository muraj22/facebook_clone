<?php
include("headerjs.php");
?>
function blurit(w){
$(w).each(function(){$(this).find("input:text,textarea").blur();});
}

function transform_layout(response){
$("[data-t_f]").each(function(){
var did=$(this).attr("data-t_h");
if(did===undefined){
var did=$(this).attr("data-t_id");
}
if(window[did]){
window[did].abort();
}
$(this).remove();
});

//removes all timeout triggers of previous page.

var res=response.split("{.__}{__}reserved{__}{__.}");


var params=$.parseJSON(res[8]);
document.title=params.title;

var dhtml=res[0];
var left_column=res[1];
var right_column=res[2];
var nf_w=res[3];
var wlink=res[4];
dget=res[5];
var rmenu_norefresh=res[6];

var uidv=res[7];

var columns=params.layout;
var param_style=params.style;

var left_menu_added=params.left_menu_added;
var left_column_added=params.left_column_added;

var left_column_id=params.left_column_id;
var rmenu_norefresh=params.rmenu_norefresh;
var body_class=params.body_class;

$("body[data-p_overflow_y],html[data-p_overflow_y]").each(function(){
$(this).css("overflow-y",$(this).attr("data-p_overflow_y"));
$(this).removeAttr("data-p_overflow_y");
});

if(left_column_added=="" && $("[data-lca]").length>0){
$("[data-lca]").remove();
}

if(left_column_id!=""){
var data_lcid=' data-lcid="'+left_column_id+'" ';
}
else{
var data_lcid="";
}


var cuidv=$("#left_col").attr("data-uidv");

if(left_column_id!="" && $("[data-lcid="+left_column_id+"]").length==0){
$("#left_col").remove(); 
}
else if(left_column_id=="" && $("[data-lcid]").length>0){
$("#left_col").remove();
}
else if(uidv!=cuidv){
$("#left_col").remove();
}
 
columns,param_style,left_column,right_column,nf_w

if(body_class!=""){
$("body").attr("class",body_class);
}
else{
$("body").attr("class","");
}


if(columns=="normal_w" || columns=="left_column_w" || columns=="right_column_w"){
if($("#wall_css").length==0){
$("head").prepend('<link data-h="" id="wall_css" media="screen" rel="stylesheet" href="/master/wall_css.php" type="text/css" />');
}
}
else{
$("head").find("#wall_css").remove();
}
$("head").find("style").remove();
$("head").find("script:not([data-h])").remove();
$("head").find("link:not([data-h])").remove();
$("body").removeAttr("onpageshow");

$("head").append(param_style);

var exp=columns.split("_");

var c=$("[data-lcid="+left_column_id+"]").length;

if($("[data-lcolumn="+nf_w+"]").length==0){
$("#left_col").remove();
$(".contentarea_global").before('<div class="'+exp[0]+'_'+nf_w+'_left" id="left_col" '+data_lcid+' data-lcolumn="'+nf_w+'">'+left_column+'</div>');
}

if(left_column_added!="" && c==0){
$("#left_col").append(left_column_added);
}

blurit($("#left_col"));


if(wlink!=""){
$(".wrapper_fotos2").addClass("wrapper_fotos");
$(".wrapper_fotos").removeClass("wrapper_fotos2");
$(".linkwrap2").addClass("linkwrap");
$(".linkwrap").removeClass("linkwrap2");


$("#llm"+wlink).removeClass("wrapper_fotos");
$("#llm"+wlink).addClass("wrapper_fotos2");
$("#llm"+wlink+"v").removeClass("linkwrap");
$("#llm"+wlink+"v").addClass("linkwrap2");
}


if(columns!="no_columns"){
$("#main_divg").attr("class",exp[0]+"_"+nf_w+"_main");
$("#left_col").attr("class",exp[0]+"_"+nf_w+"_left");
}
else{
$("#left_col").remove();	
$("#main_divg").attr("class","nocolumns_main");
}


if(columns=="right_column_w" || columns=="right_column_n"){
$("#left_col").remove();
}


$("[data-lma]").remove();
if(left_menu_added!=""){
$("#left_col").append(left_menu_added);
}

$("#right_cl").remove();


var c=$(".contentarea_global").children("div").filter(function() {
return ($(this).attr("id")!="right_cl" && $(this).attr("id")!="main_divg");
});			

$(c).remove();

if($(".main_wrapper").find("#headerArea").length>0){
$(".main_wrapper").find("#headerArea").parent().eq(0).remove();
}
if(params.header_area!=""){
$("#main_divg").before(params.header_area);
var c=$(".contentarea_global").children("div").filter(function() {
return ($(this).attr("id")!="right_cl" && $(this).attr("id")!="main_divg");
});			
blurit($(c));

}


$("#main_divg").before('<div class="'+exp[0]+'_'+nf_w+'_right"  id="right_cl" data-rcolumn="'+nf_w+'">'+right_column+'</div>');
blurit($("#right_cl"));

$("#main_divgv").html(dhtml);
blurit($("#main_divg"));

if(columns!="no_columns"){
$("#right_cl").attr("class",exp[0]+"_"+nf_w+"_right");
}


var friends_on_chat_loaded=$("#lookupinputv").length;

function friends_on_chat(){
return; //se agrego aca esta funcion solo para que no hubiesen fallas
}

if(friends_on_chat_loaded=="0" && (columns=="normal_n" || columns=="left_column_n")){
friends_on_chat();
}

$("[data-ac_enable][data-ac_enable!=on]").click();
}
<?php
include("endf.php");
?>