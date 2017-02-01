<?php
$sechov.='
function set_properties(properties,w,v){
var propertiesv=properties.split(",");
var wreduce=0;
$(propertiesv).each(function(k,vv){
if(vv!=""){
var return_property=false;
var property=vv;
w=eval(w);
v=eval(v);

if(property=="line-height"){
h="1.28";	
}

if(property=="border-right-width" || property=="border-left-width"){
h=fpx($(w).css(property));
wreduce=wreduce+h;
}

if(property=="width"){
h=$(w).width();
h=parseInt(h);
wreduce=parseInt(wreduce);
h=h-wreduce;
h=h+"px";	
}
else{
var h=$(w).css(property);
}
if(property=="min-height"){

if(h===undefined || h=="0px"){
return_property=true;
property="height";
}

var padding_top=fpx($(w).css("padding-top"));
var padding_bottom=fpx($(w).css("padding-bottom"));
h=$(w).height();
h=h+"px";	

if(return_property){
property="min-height";	
}
}

$(v).css(property,h);
	
}
});	

}

var autogrow_it=function(e){
$(this).attr("data-au_grow","t");

var w=$(this);
if($(this).attr("data-au_double")!==undefined){
var w=new Array();
w[0]=$(this);
w[1]=$(this);	
}
$(w).each(function(k,v){
$(this).after(\'<div class="hidden_sbv autogrowable"></div>\');
$(this).next(".autogrowable").html($(this).val());

if($(this).data("au_nopadding")===undefined){
var extra_properties="padding-top,padding-bottom,";
}
else{
var extra_properties="";	
}

var properties="text-align,"+extra_properties+"padding-left,padding-right,padding-top,padding-bottom,line-height,font-size,font-weight,font-family,min-height,border-top-width,border-left-width,border-right-width,border-bottom-width,border-top-style,border-left-style,border-right-style,border-bottom-style,width";

if(k==1){
set_properties(properties,$(this),$(this).nextAll(".autogrowable").eq(0));	
//es leido a la reversa, por como suceden los acontecimientos
}
else{
set_properties(properties,$(this),$(this).next(".autogrowable"));	
}
});

}
$(document).on("keyup","[data-au_grow][data-au_grow!=t]",autogrow_it);
$(document).on("keydown","[data-au_grow][data-au_grow!=t]",autogrow_it);

function autogrow_itv(e,w){
if(w===undefined){
var w=$(this);
}
var isdouble=false;
if($(w).data("au_double")!==undefined){	
isdouble=true;
}
$(w).each(function(k,v){
var dval=$(this).val();
dval=dval.replace(/\n/g, \'<br>&nbsp;&nbsp;&nbsp;&nbsp;\');

if($(this).data("au_noprefix")!==undefined){
if($(this).data("au_noprefix")=="s"){
var prefix="AaAa";
var tocheck=$(this).nextAll(".autogrowable:last").innerHeight()/$(this).width();

if(tocheck>1){
prefix="AaAaAa";	
}
}
else if($(this).data("au_noprefix")=="t"){
var prefix="";	
}
}
else{
var prefix="AaAa";	
}
$(this).nextAll(".autogrowable").html(prefix+dval);
var h=$(this).nextAll(".autogrowable:last").innerHeight();

var maxh=fpx($(this).css("max-height"));
if($(this).data("au_maxheight")!==undefined){
maxh=fpx($(this).data("au_maxheight"));	
}
if(h>=maxh){
if($(this).data("au_scrollparent")!==undefined){
$(this).parent().eq(0).css("overflow-y","auto");
$(this).css("max-height","");
var dwidth=$(this).width();
$(this).next(".autogrowable").css("width",dwidth+"px");
var h=$(this).next(".autogrowable").innerHeight();
}
else{
$(this).css("overflow-y","visible");
}
if($(this).data("au_custom_f")!==undefined){
eval($(this).data("au_custom_f"));	
}
}
else{
if($(this).data("au_scrollparent")!==undefined){
$(this).css("max-height",$(this).attr("data-au_maxheight"));
$(this).parent().eq(0).css("overflow-y","hidden");	
var dwidth=$(this).width();
$(this).next(".autogrowable").css("width",dwidth+"px");
var h=$(this).next(".autogrowable").innerHeight();
}
else{
$(this).css("overflow-y","hidden");	
}
if($(this).data("au_custom_fv")!==undefined){
eval($(this).data("au_custom_fv"));	
}
}

if($(this).data("au_more")!==undefined){
var tocheck=eval($(this).data("au_more"));
if($(tocheck).innerHeight()>30){
var tocheckv=eval($(this).data("au_morev"));
if($(tocheckv).innerHeight()>0){
h=h+$(tocheckv).innerHeight();
}
}
}

if(h>maxh && $(this).data("au_scrollparent")===undefined){
$(this).css("height",maxh+"px");	
}
else{
if($(this).data("au_nopadding")===undefined){
var padding_top=fpx($(this).css("padding-top"));
var padding_bottom=fpx($(this).css("padding-bottom"));
var border_top=fpx($(this).css("border-top-width"));
var border_bottom=fpx($(this).css("border-bottom-width"));
h=h-padding_top-padding_bottom;

}
//otherwise padding top and bottom don\'t get substracted
$(this).css("height",h+"px");		
}

});

}

$(document).on("keyup","[data-au_grow=t]",autogrow_itv);
$(document).on("keydown","[data-au_grow=t]",autogrow_itv);
';
?>