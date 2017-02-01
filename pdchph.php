<?php
$sechov='
$(document).bind("keyup","esc",function(e){
var js_id=$("#ds_wrapper").find(".esc_container:last").attr("dialogid");
var positive=$("#ds_wrapper").find(".esc_container:last").parents(".white_overlay").eq(0);
if(positive.length>0){
var delem=positive;	
}
else{
var delem=$("#ds_wrapper").find(".esc_container:last");
}

$("#ds_wrapper .esc_container[dialogid="+js_id+"]").removeClass("esc_container");
$(delem).fadeOut(1000,function(){
remove_dialog(js_id);
});

});

$(document).on("submit","form[rel=async]",function(e){
e.preventDefault();
e.stopPropagation();	
});

$(document).on("click","b[data-t_f]",function(e){
$(this).addClass("cleartimeout");
if($(this).attr("data-t_a")=="2"){
$(this).mouseenter();
return false;
}

$(this).attr("data-t_a","1");

var dfunc=$(this).attr("data-t_f");
var dtime=$(this).attr("data-t_t");
dtime=parseInt(dtime);

$(this).delayed("mouseenter",dtime,function(e){
	var dfunc_split=dfunc.split("(");
	if(window[dfunc_split[0]]){
eval(dfunc);
	}
});

$(this).mouseenter();
	
}); 

$(document).on("mouseleave","b.cleartimeout",function(e){
$(this).removeClass("cleartimeout");
$(this).stopDelayed("mouseenter");
$(this).attr("data-t_a","2");
});


var dget=false;

$(document).on("click","[rel=fjax]",function(e){
e.preventDefault();	
e.stopPropagation();
return false;
});

$(document).pjax("a:not(.npjax),[data-ojax],a:not(.npjax)[rel!=fjax]","#main_divgv");

$(window).bind("keydown","esc",function(e){
e.preventDefault();
});

var favorites_remove=function(){
var sbid=$(this).data("sbid");
var fav_key="fk_"+sbid;

$(this).removeClass("favorite_remove");
$(this).addClass("favorite");
$(this).find(".itemLabel").html("Add to Favorites");

var c=retcount();
$("body").append(\'<div id="ajaxl\'+c+\'" class="hidden_sb" data-a_id="fk_\'+sbid+\'" fjax="/ajax/favorites/remove.php?sbid=\'+sbid+\'&type=lists"></div>\');
$("#ajaxl"+c).click();

$("#ln_friends").find("[data-ln_title]").after($("#llm"+sbid).parent().eq(0));

}

$(document).on("click",".favorite_remove",favorites_remove);

var favorites_add=function(){
$(this).removeClass("favorite");
$(this).addClass("favorite_remove");

var exists=$("#llm"+$(this).data("sbid"));
if(exists.length>0){
var dclone=$(exists).parent().eq(0);
}
else{
var dclone=$("#favorites").find(".favorite_clone").clone();
}

$(dclone).removeClass("favorite_clone");
$(dclone).removeClass("hidden_sb");

var sbid=$(this).data("sbid");

$(dclone).find(".wrapper_fotos").attr("id","llm"+sbid);
$(dclone).find(".linkwrap").attr("id","llm"+sbid+"v");


var dhref=$(this).data("dhref");
var dclass=$(this).data("dclass");
var fav_name=$(this).data("fav_name");

var fav_key="fk_"+sbid;

$(dclone).attr("data-fav_key",fav_key);
$(dclone).attr("href",dhref);
$(dclone).find(".friendssp").addClass(dclass);
$(dclone).find(".friendssp").removeClass("friendssp");
$(dclone).find(".linkwrap").html(fav_name);

var c=retcount();
$("body").append(\'<div id="ajaxl\'+c+\'" class="hidden_sb" data-a_id="fk_\'+sbid+\'" fjax="/ajax/favorites/add.php?sbid=\'+sbid+\'&type=lists"></div>\');
$("#ajaxl"+c).click();

$("#favorites").append($(dclone));

$(this).find(".itemLabel").html("Remove from Favorites");

}

$(document).on("click",".favorite",favorites_add);



$(document).on("mouseover",".itemAnchor",function(){
$(this).parents("li").eq(0).addClass("selected");
$(this).addClass("highlighted");
});

$(document).on("mouseout",".itemAnchor",function(){
$(this).parents("li").eq(0).removeClass("selected");
$(this).removeClass("highlighted");
});


$(document).on("click",function(e){
var target=e.target;
if($(target).parents(".openToggler").eq(0).length>0){
if($(target).parents(".openToggler").eq(1).length>0){
$(target).parents(".openToggler").eq(0).find(".hideToggler").click();	
}
else if($(target).is("a") && $(target).hasClass("nfjax")===false){
$(".hideToggler").click();
}

}
else{
$(".hideToggler").click();
}
});

$(document).on("click",".hideToggler",function(e){
var target=e.target;
if($(this).next(".selected").eq(0).length>0){
$(this).parents(".wrap").eq(0).removeClass("openToggler");
$(this).next(".selected").eq(0).removeClass("selected");
}
else{
if($(this).parent().eq(0).hasClass("sbJewel")===true){
if($(".clone_container_wrapper").find(".custom_privacy").length>0 && $("#u_0_4").hasClass("openToggler")===true){
e.stopPropagation();
return false;
} //if privacy shortcuts are open
else{
$(this).parent().eq(0).removeClass("openToggler");
}
}
else{
if($(this).parents(".uiPopover").eq(0).attr("data-custom_fr")!==undefined){
eval($(this).parents(".uiPopover").eq(0).attr("data-custom_fr"));	
}
$(this).parents(".uiPopover").eq(0).removeClass("openToggler");
$(this).parents(".uiPopover").eq(0).removeClass("selected");
}
}
$(this).remove();
e.stopPropagation();
});

$(document).on("click",".uiSelectorButton",function(e){
$(this).blur();
if($(this).hasClass("selected")===true){
$(this).prev(".hideToggler").eq(0).click();	
e.stopPropagation();
return false;
}
else{
$(this).addClass("selected");
if($(this).prev(".hideToggler").eq(0).length==0){
$(this).before(\'<button type="button" class="hideToggler"></button>\');	
}
$(this).parents(".wrap").eq(0).addClass("openToggler");	
}

e.stopPropagation();
});

$(document).on("click",".prevdefault",function(e){
e.preventDefault();
});

$(document).on("click",".sortLink",function(e){
$(this).parents(".uiPopover").eq(0).click();	
e.stopPropagation();
});

$(document).on("click",".uiPopover",function(e){
if($(this).hasClass("selected")===true){
$(this).find(".hideToggler").click();	
return false;
}
else{
$(this).addClass("selected");
if($(this).find(".hideToggler").length==0){
$(this).prepend(\'<button type="button" class="hideToggler"></button>\');	
}
if($(this).attr("data-custom_f")!==undefined){
eval($(this).attr("data-custom_f"));
}
$(this).addClass("openToggler");	
}

e.stopPropagation();

});';

$psechov=$sechov;
include("js/dcph.php");
$sechov=$psechov.$sechov;

$sechov.='
function toascii(w){
var ret="";
for (var i=0; i < w.length; i++){
ret+=w.charCodeAt(i);
}
return ret;
}

$(document).on("click","[data-leavecomment]",function(){
var dx=$(this).data("dx");
$("#wcommentw"+dx).removeClass("hidden_sb");
$("#commentid"+dx).focus();
$(this).parents(".mtabled").find(".pincho_calibre").click();
});

$(document).on("click",".pincho_calibre",function(e){
e.stopPropagation();
show_pincho($(this));	
});
function show_pincho(w){
var commentsh=$(w).prev(".foot_box").find(".comment_wrapper").height();
if(commentsh==0){
$(w).prev(".foot_box").find(".comment_wrapper").addClass("mbusi");
}
else{
$(w).prev(".foot_box").find(".comment_wrapper").removeClass("mbusi");
}


var c=$(w).prev(".foot_box").height();

var i=$(w).prev(".foot_box").find(".dpincho").hasClass("hidden_sb");
if(i===false){
c=c-4;	
}

if(c>0){
$(w).prev(".foot_box").find(".dpincho").removeClass("hidden_sb");	
}
else{
$(w).prev(".foot_box").find(".dpincho").addClass("hidden_sb");		
}

}
var org_doc_title=document.title;

var msg_blink=2;

var blinkers_array=new Array();
function msg_blink_f(w,uidv,f){
if(!blinkers_array[uidv]){
blinkers_array[uidv]=1;
}
else{
if(f){ //if comes from second incoming message
return false;	
}
}

if(wfocus_auto){
msg_blink=2;
document.title=org_doc_title;
blinkers_array[uidv]=false;
return false;
}
else{
var multiple=2;
var remainder=msg_blink % multiple;

if (remainder==0){
document.title=w+" messaged you";
}
else{
document.title=org_doc_title;
}
msg_blink--;
if(msg_blink=="0"){
msg_blink=2;
}

$.doTimeout(1800,function(){
msg_blink_f(w,uidv);
});

}

}


$(document).on("mouseenter","[hc][hc!=f]",function(e){
var ohc=$(this).attr("hc");
$(this).attr("hc","f");
//fast way without using data
var h=$(this).attr("href");
if(h==undefined){
var h=$(this).attr("data-hhref");
}
h=h.split("/");
h=h[1];

//cambia de 4 a 3 en online version
$(this).attr("data-t_s_top","t");
//provides check for up to 50 pixels for header to display tt below instead of above
$(this).attr("data-t_nopadding","t");
$(this).attr("data-t_text","");
$(this).attr("data-t_fjax","/ajax/hover_card.php?unv="+h);
$(this).attr("data-t_white","t");
$(this).attr("data-t_keepalive","t");
$(this).attr("data-t_noloading","t");
if(ohc==""){
$(this).attr("data-t_topleft","t");
}
else{
//l_c = to left chat
if(ohc=="l_c"){
$(this).attr("data-t_noloading","f");
$(this).attr("data-t_position","left");
$(this).attr("data-t_arrowtop","t");
$(this).attr("data-t_img","t");
$(this).attr("data-t_extendedarrow","t");
$(this).attr("data-t_fadein","t");
$(this).attr("data-t_save","t");
$(this).attr("data-t_fjax","/ajax/hover_card.php?unv="+h+"&nomessage=t");
}
}
$(this).attr("data-t_class","tooltip_dark_grey_border tooltip_no_text_shadow");
$(this).mouseenter();
});



$(document).ready(function(){

var c=$("[hc][hc=l_c]").filter(function(){
return ($(this).css("display")=="block");
}); 
//only the up to 40 visible.

//human toggle for the future searches will result in a mouseover to view it
$(c).attr("data-h_toggle","t");
$(c).mouseenter();
});



function start_chat(uidv){
var stop=true;

var tocheck="[rel="+uidv+"]";

$(tocheck).each(function(){

if($(this).hasClass("online")===true){
var w=$(this).attr("id");
w=w.replace("bubble","");
w=parseInt(w);
displaywindow(w,uidv);
stop=false;
}
});
return stop;
}

$(document).on("click","[data-t_close=t]",function(){
$(this).parents(".tiptip_holder").css("display","none");
});

$(document).on("click",".FriendRequestAdd",function(e){

var e=$(this).parent().eq(0).find(".friend_request_add").length;
if(e==0){
var uidv=$(this).attr("data-uidv");
$(this).parent().eq(0).append(\'<div class="friend_request_add" fjax="/addfriend.php?uidv=\'+uidv+\'"></div>\');
$(this).parent().eq(0).find(".friend_request_add").click();
$(this).addClass("hidden_sb");
$(this).parent().eq(0).find(".FriendRequestOutgoing").removeClass("hidden_sb");
return false; //necessary apparently as somehow it gets double clicked
e.preventDefault();
}

});


function pagination_finished(daid){
pagination_finished_a[daid]=1;	
	}

var pagination_finished_a=new Array();

$(window).bind("custom_scroll", function(e,w,p){ 
var wv=w;
if(p){var percentage=p;}
else{
var percentage=$(w).data("s_percentage"); 
} 
if(percentage=="-1"){
percentage=99;
}

var elem=$(w).data("s_elem");
var dfunction=$(w).data("s_function");

var daid=$(w).data("s_id");

if(daid===undefined){
var s_id="s_id"+retcount();
$(w).attr("data-s_id",s_id);
pagination_finished_a[s_id]=1;
daid=s_id;
}


if(pagination_finished_a[daid]==1){';

if($browser=="mozilla"){
$sechov.='
var scrollt=document.getElementById("upfrev").scrollTop;
var scrollb=document.getElementById("upfrev").scrollHeight;
';
}
else{
$sechov.='
var scrollt=document.getElementById("body").scrollTop;
var scrollb=document.getElementById("body").scrollHeight;
';	
}

$sechov.='
var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],y=w.innerHeight||e.clientHeight||g.clientHeight;
var bn=scrollb-scrollt; 
var i3=bn-y;

if(i3==0){ //hack as it means the body has scroll set but there is nothing to scroll to yet and it might executing the function to retrieve.
var i3p=100;	
}
else{
var i3p=(scrollt / (scrollb-y)) * 100;
}


if(percentage==100){percentage=99;}

if(i3p>percentage){
pagination_finished_a[daid]=0;
window[dfunction](daid,wv);
}

}


});


$(document).on("click","[data-s_pagination=t]",function(){
var w="#"+$(this).attr("id");
$(window).bind("scroll",function(){
$(window).trigger("custom_scroll", w);
});
if($(this).data("s_emulate")=="t"){
$(window).trigger("custom_scroll", [w,-1]);
}
});

$(document).ready(function(){
$("[data-s_pagination=t]").click();
});

//pagination

$(document).on("click","[data-onclick]",function(){
eval($(this).attr("data-onclick"));
});

$(document).on("click","a[href=#]",function(e){
e.preventDefault();
});
function strpos (haystack, needle, offset) {
   var i = (haystack + "").indexOf(needle, (offset || 0));
    return i === -1 ? false : i;
}
function retf(){
return false;	
}
function morepager_loading(w){
$(w).css("display","none");
$(w).next(".uiBoxLightblue").css("display","block");
}';

$psechov=$sechov;
include("js/ignored_keys.php");
$sechov.=$psechov.$sechov.'
$(document).ready(function(){
$("[data-al_url]").each(function(){
//alert($(this).data("al_url"));

$(this).after().load($(this).data("al_url"));
	
});
	
});

var insertListener = function(event){
  if (event.animationName == "nodeInserted") {
	  var eventv=event.target;
	 var classv=$(eventv).attr("class");
	 var idv=$(eventv).attr("id");

$(document).trigger("insertListener",eventv,classv,idv);
  }
}


document.addEventListener("animationstart", insertListener, false); // standard + firefox
document.addEventListener("MSAnimationStart", insertListener, false); // IE
document.addEventListener("webkitAnimationStart", insertListener, false); // Chrome + Safari

$(document).bind("insertListener", function(event, thisv, param1, param2) {
	
});

   $(document.body).on("hover","*",function(){
        $(this).toggleClass("hover");
    });

function fjax_url(sarr){
sarrv="?";
var xv=0;
$(sarr).each(function(){
if(xv>0){sarrv+="&amp;";}
sarrv+=$(this).attr("id")+"="+$(this).val();
xv++;
});
return sarrv;
}
var uiautogrowh=function(){
if($(this).hasClass("uiautogrow")===true){
if($(this).attr("id")===undefined){
var count=retcount();
$(this).attr("id",count+"_ui_auto_grow");	
}
uiautogrow($(this).attr("id"));	
}
}


var winkey_pressed=false;
$(document).bind("keydown","[ \\\",function(){
winkey_pressed=true;
});

$(document).bind("keyup","[ \\\",function(){
winkey_pressed=false;
});


$(document).on("mouseover","[data-t_text]",function(){

if($(this).attr("data-t_activation")===undefined){
var activation="hover";
}
else{
var activation=$(this).attr("data-t_activation");
}
$(this).tipTip({
maxWidth: "auto",
edgeOffset: 1,
attribute:"data-t_text",
activation: activation,
keepAlive: false,
delay: 0,
fadeIn: 0,
fadeOut: 0
});

$(this).mouseover();


	
});


function upload_no_form_data(w){
//alert(w);	
}


var dval="";

$(document).on("click","[data-u_trigger]",function(){
$(this).removeAttr("data-u_trigger");
var thisv=$(this);

if($(this).data("u_pfunc")!==undefined){
window[$(this).data("u_pfunc")]();
}
	var where=$(this).data("u_form");
	where=""+where+"";
	
	if($(this).data("u_form_location")!==undefined){
if($(this).data("u_form_location")=="window.opener"){
var wherev=window.opener.document;
}
}
else{
var wherev=document;	
}

var stop_operation=true;

if($(this).data("u_check")!==undefined){
var stop_operation=window[$(this).data("u_check")]();	
}

if(!stop_operation){$(this).attr("data-u_trigger","t"); return false;}

var disable_file_input=$(this).data("u_disable");
$(where,wherev).find(".caller_loading").parent().css("display","inline-block");

if(disable_file_input===undefined){
$(where,wherev).find("input[type=file]").attr("disabled",true);
}


if(window.FormData===undefined){upload_no_form_data($(this)); return false;}	

	var xhrq = new XMLHttpRequest();
	var form = new FormData(); 

$(where,wherev).find("input[type!=file],textarea",wherev).each(function(){

if($(this).attr("name")!==undefined){
var content=$(this).attr("name");	
}
else if($(this).attr("id")!==undefined){
var content=$(this).attr("id");	
}

if($(this).val()==$(this).attr("placeholder")){
dval="";	
}
else{
dval=$(this).val();
}

var file=dval;

form.append(content,file);
});


var file="";
form.append("submit2",file);

	var tracker="";
	
	if($(this).data("u_progress")!==undefined){
	var file = retcount();
	tracker+=file+",";

	form.append("'.ini_get("session.upload_progress.name").'",file);
	var file = retcount();
	tracker+=file+",";
	
	form.append("dk2",file);	
	}

if($(this).data("u_function")!==undefined){
var complete_f=$(this).data("u_function");	
}

$(where,wherev).find(":file",wherev).each(function(){
if($(this).attr("name")!==undefined){
var content=$(this).attr("name");	
}
else if($(this).attr("id")!==undefined){
var content=$(this).attr("id");	
}
var file=this.files[0];
if(file===undefined){

	
if($(thisv).data("u_fails")!==undefined){
	//alert($(thisv).data("u_fails"));
window[$(thisv).data("u_fails")]();	
}
}
form.append(content,file);

});

var content=("form_location");
var file=$(this).data("u_form_location");
form.append(content,file);

	     xhrq.onreadystatechange = function(){            
            if (xhrq.readyState == 4){
		alert(xhrq.responseText);
$(where,wherev).find("input[type=file]").attr("disabled",false);
$(this).data("u-trigger","t");
$(where,wherev).find(".caller_loading").parent().css("display","none");
		   if(complete_f!==undefined){
		    window[complete_f](xhrq.responseText);
		   }
		   
			}
        };


var u_receiver="/"+$(this).data("u_receiver");
////alert(u_receiver);

	xhrq.open("POST", u_receiver);
	xhrq.send(form);	

if($(this).data("u_starts")!==undefined){
window[$(this).data("u_starts")](tracker);	
}



});


$(document).on("click",".cmncdc,.cmjr",function(e) {
  e.stopPropagation();
});

    var ctrlDown = false;

	var controlpressed=function(e)
    {
        if (e.keyCode == 17) ctrlDown = true;
    }
	
	var controlpressedv=function(e)
    {
        if (e.keyCode == 17) ctrlDown = false;
    }

    $(document).bind("keydown",controlpressed);
	$(document).bind("keyup",controlpressedv);
	

	
$(document).on("click",".unlike",function(e){
e.preventDefault();

var org_elem=$(this).parent();
if($(this).data("l_source")!==undefined){
var f=$(this).data("l_source");
}
else{
var f="";	
}
if($(this).data("l_rid")!==undefined){
var af=$(this).data("l_rid");
}
else{
var af="";	
}


var whatisit=$(this).parents(".mtablev").eq(0).length;

if(whatisit==0){
if(af=="likepicx26"){
var tofind=$("#photo_theater_like").find(".likebtn2");	
}
else{
var tofind=$(this).parents(".mtabled:first").find(".likeiconito");
}
}

unlike(org_elem,f,af);

$(tofind).parents(".mtabled").find(".pincho_calibre").click();

$(tofind).css("cursor","pointer");
$(tofind).addClass("like");
$(tofind).attr("title","Like this item");

});


$(document).on("click",".like",function(e){
e.preventDefault();

if($(this).data("l_source")!==undefined){
var f=$(this).data("l_source");
}
else{
var f="";	
}
if($(this).data("l_rid")!==undefined){
var af=$(this).data("l_rid");
}
else{
var af="";	
}


if($(this).hasClass("likeiconito")===true){
var thisv=$(this).parents(".mtabled:first").find(".lu_actions:first").next(".lbl").next(".lbl").children(":first");
$(this).css("cursor","default");
$(this).removeClass("like");
$(this).removeAttr("title");
}
else if($(this).hasClass("likebtn2")===true){
var thisv=$("#appendlikex26").find(".lu_actions:first").next(".lbl").next(".lbl").children(":first");	
var f="f";
var af="likepicx26";

$(this).css("cursor","default");
$(this).removeClass("like");
$(this).removeAttr("title");
}
else{
var thisv=$(this);	
}


var org_elem=$(thisv).parent().eq(0);

var whatisitv=$(org_elem).parents(".mtablev").eq(0).length;

if(whatisitv==0){
if(af=="likepicx26"){
var tofind=$("#photo_theater_like").find(".likebtn2");	
}
else if($(org_elem).parents(".mtablev").eq(0).length==0){
var tofind=$(org_elem).parents(".mtabled:first").find(".likeiconito");
}

$(tofind).css("cursor","default");
$(tofind).removeClass("like");
$(tofind).removeAttr("title");
}

like(org_elem,f,af);

if(whatisitv==0 && af!="likepicx26"){
$(tofind).parents(".mtabled").eq(0).find(".pincho_calibre").click();
}


});



$(document).on("click",".unpin",function(e){
e.preventDefault();

var org_elem=$(this).parent();
if($(this).data("l_source")!==undefined){
var f=$(this).data("l_source");
}
else{
var f="";	
}
if($(this).data("l_rid")!==undefined){
var af=$(this).data("l_rid");
}
else{
var af="";	
}


var whatisit=$(this).parents(".mtablev").eq(0).length;

if(whatisit==0){
if(af=="repinx26"){
var tofind=$("#photo_theater_repin").find(".repinbtn2");	
}
else{
var tofind=$(this).parents(".mtabled:first").find(".repiniconito");
}
}

unpin(org_elem,f,af);

$(tofind).parents(".mtabled").find(".pincho_calibre").click();

$(tofind).css("cursor","pointer");
$(tofind).addClass("repin");
$(tofind).attr("title","Repin this item");

});


$(document).on("click",".repin",function(e){
e.preventDefault();

if($(this).data("l_source")!==undefined){
var f=$(this).data("l_source");
}
else{
var f="";	
}
if($(this).data("l_rid")!==undefined){
var af=$(this).data("l_rid");
}
else{
var af="";	
}


if($(this).hasClass("repiniconito")===true){
var thisv=$(this).parents(".mtabled:first").find(".lu_actions:first").next(".lbl").next(".lbl").children(":first");
$(this).css("cursor","default");
$(this).removeClass("repin");
$(this).removeAttr("title");
}
else if($(this).hasClass("repinbtn2")===true){
var thisv=$("#appendrepinx26").find(".lu_actions:first").next(".lbl").next(".lbl").children(":first");	
var f="f";
var af="repinx26";

$(this).css("cursor","default");
$(this).removeClass("repin");
$(this).removeAttr("title");
}
else{
var thisv=$(this);	
}


var org_elem=$(thisv).parent().eq(0);

var whatisitv=$(org_elem).parents(".mtablev").eq(0).length;

if(whatisitv==0){
if(af=="repinx26"){
var tofind=$("#photo_theater_repin").find(".repinbtn2");	
}
else if($(org_elem).parents(".mtablev").eq(0).length==0){
var tofind=$(org_elem).parents(".mtabled:first").find(".repiniconito");
}

$(tofind).css("cursor","default");
$(tofind).removeClass("repin");
$(tofind).removeAttr("title");
}

repin(org_elem,f,af);

if(whatisitv==0 && af!="repinx26"){
$(tofind).parents(".mtabled").eq(0).find(".pincho_calibre").click();
}


});



function tooltip_ajaxified(data,curr_elem){
if($(curr_elem).attr("data-a_t_save")!==undefined){
var secondary=$(curr_elem).data("a_secondary_e");
//alert(data);
$(secondary).next(".tooltip_text").html(data);
$(secondary).attr("data-t_autoload","t");

var tt=$(curr_elem).next().eq(0);
$(tt).attr("data-t_loaded","t");

if($(secondary).attr("data-h_toggle")===undefined){
$(tt).mouseover();
}

}
else{
var tt=$(curr_elem).next().eq(0);

var suf=$(tt).attr("data-t_suf");
$("#tiptip_content"+suf).html(data);

$(tt).attr("data-t_loaded","t");

$(tt).mouseover();
}

}
';
include("js/autogrow.php");
?>