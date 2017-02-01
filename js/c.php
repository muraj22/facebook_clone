<?php include("headerjs.php"); 
echo'
function change_description(w){
if(w===undefined){
var w=$("._2yg");
}
var dhtml=$(w).find(".highlighter").find(".highlighterContent").html();
var dbold=$(w).find(".highlighter").find(".highlighterContent").find("b");

$(dbold).each(function(){
});

var dhtml=$(w).find(".highlighter").find(".highlighterContent").html();

$(w).find("input[name=\'descriptionv\']").val(dhtml);

}

function add_to_highlighter(ui,org_elem){
var w=$(org_elem).parents(".highlighter_wrapper").eq(0);

var dvar=$(w).find("textarea").val();
var dvarv="@"+dvar.substring(dvar.lastIndexOf(" @")).match(/\\s@(.+)/)[1];
var dvarvv=dvar.replace(dvarv,ui.value);
var dhtml=$(w).find(".highlighter").find(".highlighterContent").eq(0).html();
$(w).find("textarea").val(dvarvv);
$(w).find("textarea").trigger("keyup");
$(w).find("textarea").trigger("keydown");

$.doTimeout(0,function(){
dhtml=dhtml.replace(dvarv,\'<b data-uidv="\'+ui.uidv+\'">\'+ui.value+\'</b>\');
$(w).find(".highlighter").find(".highlighterContent").eq(0).html(dhtml);
});
}

function add_to_highlighterv(wv,w,ww,uidv,k){
var dhtml=$(wv).find(".highlighter").find(".highlighterContent").eq(0).html();

dhtml=dhtml.replaceNthMatch(w, k+1, \'<b data-uidv="\'+uidv+\'">\'+ww+\'</b>\');

$(wv).find(".highlighter").find(".highlighterContent").eq(0).html(dhtml);

var dxpu=$(wv).parents(".photo_container").eq(0).attr("data-xpu");
if($(wv).parents("._2yg").eq(0).length>0){
var dxpu="";
}else if($(wv).parents("#picturetheater").eq(0).length>0){
var dxpu=30000;
}else if($(wv).parents("#desc_change").eq(0).length>0){
var dxpu=30001;
}else if($(wv).parents(".editatd").eq(0).length>0){
var dxpu=30002;
}else if($(wv).parents("#huioverlay").eq(0).length>0){
var dxpu=30003;
}

if(strpos($(wv).find("textarea").val(),w)!==false){
var dval=$(wv).find("#tagswall_uploaderdv"+dxpu).val();
dval=dval+","+uidv;
$(wv).find("#tagswall_uploaderdv"+dxpu).val(dval);
}

}

$(document).on("keypress",".to_highlighter",function(e){

if(ctrlDown){return true;}

e = e || window.event;
 var kc=(e.keyCode || e.which);
  var s = String.fromCharCode( e.keyCode || e.which );
  if ( s.toUpperCase() === s && !e.shiftKey ) {
	s=s.toUpperCase();
  }

if(in_array(kc,ignored_keys)){return true;}

});


function to_highlighter_keyup(){

var dvar=$(this).val();
var w=$(this).parents(".highlighter_wrapper").eq(0);

var dxpu=$(this).parents(".photo_container").eq(0).attr("data-xpu");
if($(w).parents("._2yg").eq(0).length>0){
var dxpu="";
}else if($(w).parents("#picturetheater").eq(0).length>0){
var dxpu=30000;
}else if($(w).parents("#desc_change").eq(0).length>0){
var dxpu=30001;
}else if($(w).parents(".editatd").eq(0).length>0){
var dxpu=30002;
}else if($(w).parents("#huioverlay").eq(0).length>0){
var dxpu=30003;
}

if(dvar.substring(dvar.lastIndexOf(" @")).match(/\\s@(\\w+)/)){
$(w).find("#tagwall_uploaderdv"+dxpu).autocomplete("search",dvar.substring(dvar.lastIndexOf(" @")).match(/\\s@(.+)/)[1]);
}else{
$(w).find("#tagwall_uploaderdv"+dxpu).autocomplete("search","");
}

var dbold=$(w).find(".highlighter").find(".highlighterContent").find("b");

var w=$(this).parents(".highlighter_wrapper").eq(0);
var dval=$(this).val();

dval=str_replace(" ","&nbsp;",dval);
dval=str_replace("\n","<br>",dval);
$(w).find(".highlighterContent").html(dval);


$(dbold).each(function(){
var duidv=$(this).attr("data-uidv");
var dval=$(w).find("#tagswall_uploaderdv"+dxpu).val();
dval=dval.replace(","+duidv,"");
$(w).find("#tagswall_uploaderdv"+dxpu).val(dval);

var dvalv=str_replace(" ","&nbsp;",$(this).html());

add_to_highlighterv(w,dvalv,$(this).html(),$(this).attr("data-uidv"),0);
});

if($(this).hasClass("says")===true){
autoGrowFieldta(this,66);
}
}

function keep_scroll_to_highlighter(){
var dtop=$(this).scrollTop();
$(this).parents(".highlighter_wrapper").find(".highlighter").scrollTop(dtop);
var dtop=$(this).height();
$(this).parents(".highlighter_wrapper").css("height",dtop);
}

function close_friends_completed(org_elem){
var duidv=$(org_elem).parents(".unfriend_wrapper").prev(".uiButton").eq(0).attr("data-uidv");
var org_elem=$(".friendButton[data-uidv=\'"+duidv+"\']").next(".unfriend_wrapper").find("#close_friends_li");
var dacquaintances=$(org_elem).parents(".unfriend_wrapper").eq(0).find("#acquaintances_li").hasClass("checked");
if($(org_elem).hasClass("checked")===true){
$(org_elem).attr("fjax","/ajax/friends_actions/close_friends/add.php?uidv="+duidv);
$(org_elem).removeClass("checked");
$(org_elem).parents(".unfriend_wrapper").prev(".uiButton").find("i").removeClass("estrellita");
if(dacquaintances===true){
$(org_elem).parents(".unfriend_wrapper").prev(".uiButton").find("i").addClass("jornalcito");
}
}else{
$(org_elem).addClass("checked");
$(org_elem).attr("fjax","/ajax/friends_actions/close_friends/remove.php?uidv="+duidv);
$(org_elem).parents(".unfriend_wrapper").prev(".uiButton").find("i").addClass("estrellita");
if(dacquaintances===true){
$(org_elem).parents(".unfriend_wrapper").prev(".uiButton").find("i").removeClass("jornalcito");
$(org_elem).parents(".unfriend_wrapper").prev(".uiButton").find("i").removeClass("estrellita");
}
}
}

function acquaintances_completed(org_elem){
var duidv=$(org_elem).parents(".unfriend_wrapper").prev(".uiButton").eq(0).attr("data-uidv");
var org_elem=$(".friendButton[data-uidv=\'"+duidv+"\']").next(".unfriend_wrapper").find("#acquaintances_li");
var dclose_friends=$(org_elem).parents(".unfriend_wrapper").eq(0).find("#close_friends_li").hasClass("checked");
if($(org_elem).hasClass("checked")===true){
$(org_elem).removeClass("checked");
$(org_elem).attr("fjax","/ajax/friends_actions/acquaintances/add.php?uidv="+duidv);
$(org_elem).parents(".uiButton").find("i").removeClass("jornalcito");
if(dclose_friends===true){
$(org_elem).parents(".unfriend_wrapper").prev(".uiButton").find("i").addClass("estrellita");
}
}else{
$(org_elem).addClass("checked");
$(org_elem).attr("fjax","/ajax/friends_actions/acquaintances/remove.php?uidv="+duidv);
$(org_elem).parents(".unfriend_wrapper").prev(".uiButton").find("i").addClass("jornalcito");
if(dclose_friends===true){
$(org_elem).parents(".unfriend_wrapper").prev(".uiButton").find("i").removeClass("jornalcito");
$(org_elem).parents(".unfriend_wrapper").prev(".uiButton").find("i").removeClass("estrellita");
}
}
}

String.prototype.replaceNthMatch = function(pattern, n, replace) {
    var parts, tempParts;

    if (pattern.constructor === RegExp) {

      // If there\'s no match, bail
      if (this.search(pattern) === -1) {
        return this;
      }

      // Every other item should be a matched capture group;
      // between will be non-matching portions of the substring
      parts = this.split(pattern);

      // If there was a capture group, index 1 will be
      // an item that matches the RegExp
      if (parts[1].search(pattern) !== 0) {
        throw {name: "ArgumentError", message: "RegExp must have a capture group"};
      }
    } else if (pattern.constructor === String) {
      parts = this.split(pattern);
      // Need every other item to be the matched string
      tempParts = [];

      for (var i=0; i < parts.length; i++) {
        tempParts.push(parts[i]);

        // Insert between, but don\'t tack one onto the end
        if (i < parts.length - 1) {
          tempParts.push(pattern);
        }
      }
      parts = tempParts;
    }  else {
      throw {name: "ArgumentError", message: "Must provide either a RegExp or String"};
    }

    // Parens are unnecessary, but explicit. :)
    indexOfNthMatch = (n * 2) - 1;

  if (parts[indexOfNthMatch] === undefined) {
    // There IS no Nth match
    return this;
  }

  if (typeof(replace) === "function") {
    // Call it. After this, we don\'t need it anymore.
    replace = replace(parts[indexOfNthMatch]);
  }

  // Update our parts array with the new value
  parts[indexOfNthMatch] = replace;

  // Put it back together and return
  return parts.join(\'\');

};

Number.prototype.fmon=function commafy() {
	var num=this;

    var str = num.toString().split(".");
    if (str[0].length >= 5) {
        str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, "$1,");
    }
    if (str[1] && str[1].length >= 2) {
        str[1] = "";
    }
    return str[0];
}

Number.prototype.fmonv = function(decPlaces, thouSeparator, decSeparator) {
    var n = this,
    decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
    decSeparator = decSeparator == undefined ? "." : decSeparator,
    thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
    sign = n < 0 ? "-" : "",
    i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
    j = (j = i.length) > 3 ? j % 3 : 0;
    return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\\\d{3})(?=\\\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
};
$(document).on("click",".stopimm",function(e){
e.preventDefault();
e.stopPropagation();
e.stopImmediatePropagation();
});

$(document).on("click",".stopprop",function(e){
e.preventDefault();
e.stopPropagation();
});

$(document).on("click",".readmore",function(){
$(this).attr("data-read","t");
$(this).parents(".lb").eq(0).prev(".cut").addClass("hidden_sb");
$(this).addClass("hidden_sb");
var dval=$(this).parents(".lb").eq(0).next(".readmorev").html();
if($(this).parents(".comment_wrapper").length>0){
var dvalv=$(this).parents(".lb").eq(0).prev(".cut").prev(".actual_comment").html()+dval;
$(this).parents(".lb").eq(0).prev(".cut").prev(".actual_comment").html(dvalv); //for comment cut
}else{
$(this).parents(".lb").eq(0).prev(".cut").before(dval); //for status update cut
}
});

function setsm(emote,w){
if(w!=1){
actval=$("#chatmsg"+w).val();
actval=$.trim(actval);
if(actval==""){actval=emote+" ";}
else{actval=actval+" "+emote+" ";}
$("#chatmsg"+w).focus();
$("#chatmsg"+w).val(actval);
}
else{ //if w == 1 it is messages
actval=$("._1rv").val();
actval=$.trim(actval);
if(actval==""){actval=emote+" ";}
else{actval=actval+" "+emote+" ";}
$("._1rv").focus();
$("._1rv").val(actval);
}
}

$(document).on("click","[data-setsm]",function(){
var yk=$(this).parents(".emotesw").eq(0).attr("data-yk");
setsm($(this).attr("data-setsm"),yk);	
});

function fadescr(delem){
if(!delem){delem=lastfade;}
var hasd=$(delem).hasClass("ison");

if(hasd===false){
$(delem).find(".ui-slider-handle").animate({ opacity: 0 });
}
}
function animatescr(delem){
$(delem).find(".ui-slider-handle").css("opacity","1");
fadescrt=setTimeout("fadescr()",3000);
}

if(fader_holder===undefined){
var fader_holder="t";	
$(document).on("mouseenter",".fader_holder",function(){
	animatescr($(this).find(".slider-wrap"));
});

$(document).on("mouseleave",".fader_holder",function(){
	fadescr($(this).find(".slider-wrap"));
});

}

$(document).on("click","[data-cf]",function(){
if(strpos($(this).attr("data-cf"),"(")===false){
window[$(this).attr("data-cf")]();
}
else{
eval($(this).attr("data-cf"));	
}
});
function fpx(w){
w=w.replace("px","");
w=parseInt(w);
return w;	
}

$(document).on("click","#birthdays_module, #birthdays_modulev",function(e){
e.stopPropagation();
e.stopImmediatePropagation();
hidelogout();close_dialog2();close_dialog3();close_dialog4();close_dialog5();closeallpo();
});

$(document).on("click","#pokes_module, #pokes_modulev",function(e){
e.stopPropagation();
e.stopImmediatePropagation();
hidelogout();close_dialog2();close_dialog3();close_dialog4();close_dialog5();	closeallbt();
});

$(document).on("click",".confirmrequest",function(){
	var a=$(this).attr("data-sbid");
	var b=$(this).attr("data-yk");
confirmfriend(a,b);		
});

$(document).on("click",".notnow",function(){
	var a=$(this).attr("data-sbid");
	var b=$(this).attr("data-yk");
unconfirmfriend(a,b);		
});

if(typeof window.closeallpo == "function") {
}
else{
function closeallpo(){return false;}	
}


$(document).on("click",function(e){
$("#tiptip_holder_w").addClass("hidden_sb");	
$("#tiptip_holder").addClass("hidden_sb");	

hidelogout();close_dialog2();close_dialog3();close_dialog4();close_dialog5();closeallbt();closeallpo();	
$(".emotet").addClass("emote");
$(".emote").removeClass("emotet");
$(".emotesw").css("display","none");
$(".emote").removeAttr("data-visible");
});



$(document).on("click","#jewelbutton",function(e){
show_msg_dialog2();
});

$(document).on("click","#jewelbuttonv",function(e){
show_msg_dialog3();
});

$(document).on("click","#jewelbuttonvv",function(e){
show_msg_dialog4();
});

$(document).on("click","#jewelbuttonvvv",function(e){
show_msg_dialog5();
});


$(document).on("click", "[fjax]:not([data-nfjax=t])", function(e){
e.preventDefault();
if($(this).hasClass("t_ajaxified")===true){
e.stopPropagation();	
}
$(this).fjax();
});

$(document).on("click",".emote",function(e){
e.stopPropagation();	

  var divId = "#emotesw" + $(this).attr("id").replace("emote", "");
  $(".emotet").addClass("emote"); 
  $(".emotet").removeClass("emotet"); 
  $(".emotesw").css("display","none");
  $(".emote:not(this)").data("visible","false");
  if($(this).data("visible")=="true"){
	$(this).data("visible","false");
	$(divId).css("display","none");  
  }
  else{
	$(this).data("visible","true");
	$(this).addClass("emotet");
	$(this).removeClass("emote");
	$(divId).css("display","inline-block");  
  }

});

$(document).on("click",".uiButton",function(){
$(this).blur();
});


$(document).on("click",".uiSelectorButton",function(){
$(this).blur();	
});

$(document).on("click",".audienceSelector .uiSelectorButton:not(.find_contact)",function(){
if($(this).hasClass("selected")===true){
return;	
}



$(this).parents(".audienceSelector").find(".uiSelectorMenuWrapper").eq(0).remove();

var dclone=$("#privacy_options").find(".uiSelectorMenuWrapper").clone();


if($(this).parents(".audienceSelector").eq(0).hasClass("openarrow")===true){ //90% of the cases
$(dclone).find("._icw").removeClass("hidden_sb");
}



var nfjax=$(this).attr("data-nfjax");
$(dclone).find(".itemAnchor").attr("data-nfjax",nfjax);	

if(nfjax!="t"){
var c=$(this).attr("data-a_id");
if(c===undefined){
var c="privacy"+retcount();
$(this).attr("data-a_id",c);
}
$(dclone).find(".itemAnchor").attr("data-a_id",c);	
}

var privacy=$(this).parents("ul").eq(0).find("input[name=privacy]").val();
var privacyh=$(this).parents("ul").eq(0).find("input[name=privacyh]").val();
var iscustom=$(this).parents("ul").eq(0).find("input[name=iscustom]").length;
if(strpos(privacy,",")!==false || privacyh!="" || privacy==4 || iscustom>0){
var tocheck=3;
}
else{
var tocheck=privacy;	
}

$(dclone).find("a[data-privacy=\'"+tocheck+"\']").parents("li").eq(0).addClass("checked");
if($(dclone).find(".checked").length==0){// it is custom, a uid only
var tocheck=3;
$(dclone).find("a[data-privacy=\'"+tocheck+"\']").parents("li").eq(0).addClass("checked");
}

var aclass=$(dclone).find("[data-privacy=\'"+tocheck+"\']").parents("li").eq(0).hasClass("secondaryOption");
if(aclass===false){
$(this).parents(".audienceSelector").removeClass("friendList");
$(this).parents(".audienceSelector").removeClass("showSecondaryOptions");
}
else{
$(this).parents(".audienceSelector").addClass("friendList");
$(this).parents(".audienceSelector").addClass("showSecondaryOptions");
}


if(tocheck==3){
var special="Custom";	
}
var tofind=$(dclone).find("[data-privacy=3]").attr("data-tt",special); //set back to custom if back and forth for the tooltip text, it\'d be changed nevertheless via save changes


$(dclone).css("visibility","hidden");


$(this).parents(".audienceSelector").find(".uiButton").eq(0).next(".tooltip_text").after($(dclone));

var iheight=$(dclone).innerHeight();
var offset=$(this).offset().top;

if($(this).parents("#uioverlay").eq(0).length==0){
var dparent=$("body");
}
else{
$(this).parents(".audienceSelector").find(".uiMenuInner").eq(0).prepend(\'<li class="uiMenuItem disabled"><span class="itemAnchor disabledAnchor"><span class="itemLabel">Album Privacy</span></span></li>\');

var dparent=$("#uioverlay");
}

var viewporth=$(dparent).height();

var sum=offset+iheight;

if(sum>viewporth){
$(this).parents(".audienceSelector").eq(0).addClass("uiSelectorBottomUp");
}
else{
$(this).parents(".audienceSelector").eq(0).removeClass("uiSelectorBottomUp");
}


$(dclone).css("visibility","visible");




});

$(document).on("click",".audienceSelector .uiSelectorOption:not(.moreOption,.returnOption,.custom_privacy_option)",function(e){
var label=$(this).attr("data-label");

var path_arr=new Array();
path_arr[0]=$(this).parents(".audienceSelector").eq(0);

if($(this).parents("#u_5_8").eq(0).length>0){
path_arr[1]=$(".2ygv").find(".composerAudienceWrapper").find(".audienceSelector");	
}
else if($(this).parents(".2ygv").eq(0).length>0){
path_arr[1]=$("#u_5_8").find(".composerAudienceWrapper").find(".audienceSelector");	
}

var thisv=$(this);

if(label=="Custom" && $(this).parents("#u_5_8").eq(0).length>0){
var new_privacy=$(this).parents("#u_5_8").eq(0).find(".privacy_wrapper").clone();
$(".2ygv").find(".privacy_wrapper").before($(new_privacy));	
$(".2ygv").find(".privacy_wrapper").eq(1).remove();

var new_tooltip=$(this).parents("#u_5_8").eq(0).find(".tooltip_text").clone();
$(".2ygv").find(".composerAudienceWrapper").eq(0).find(".tooltip_text").before($(new_tooltip));
$(".2ygv").find(".composerAudienceWrapper").eq(0).find(".tooltip_text").eq(1).remove();
}
else if(label=="Custom" && $(this).parents(".2ygv").eq(0).length>0){//alert(4);
var new_privacy=$(this).parents(".2ygv").eq(0).find(".privacy_wrapper").clone();
$("#u_5_8").find(".privacy_wrapper").before($(new_privacy));	
$("#u_5_8").find(".privacy_wrapper").eq(1).remove();

var new_tooltip=$(this).parents(".2ygv").eq(0).find(".tooltip_text").clone();
$("#u_5_8").find(".composerAudienceWrapper").eq(0).find(".tooltip_text").before($(new_tooltip));
$("#u_5_8").find(".composerAudienceWrapper").eq(0).find(".tooltip_text").eq(1).remove();
}


$(path_arr).each(function(k,v){
var path=$(this);

$(path).parents("li").eq(0).find("input[name=iscustom]").remove();
if(label=="Custom"){
$(path).parents("li").eq(0).find("input[name=privacy]").before(\'<input type="hidden" name="iscustom" value="t">\');
}


var dclass=$(thisv).find("i").eq(0).clone();
$(dclass).removeClass("itemIcon");
$(dclass).addClass("defaultIcon");
$(dclass).addClass("customimg");

if(label!="Custom"){
var sbid=$(thisv).find("a").attr("data-privacy");
$(path).parents("li").eq(0).find("input[name=privacy]").val(sbid);
$(path).parents("li").eq(0).find("input[name=privacyh]").val("");


if($(thisv).find("a").attr("data-privacy")==2 && $(thisv).parents("ul").eq(1).find("li[data-pconfig]").eq(0).attr("data-pconfig")=="big"){
var tt=$(thisv).find("a").attr("data-tto");
}
else{
var tt=$(thisv).find("a").attr("data-tt");
}

$(path).find(".uiButton").eq(0).next(".tooltip_text").html(tt);

}
$(path).find(".uiButton").eq(0).attr("data-t_reload","t");

$(path).find(".uiButtonText").eq(0).prev("i").remove();
//if($(path).parents(".uioverlay").length>0 && label=="Friends"){label="Your Friends";}
$(path).find(".uiButtonText").eq(0).html(label);


if($(path).parents("ul").eq(0).hasClass("audienceSelectorv")===true){
if($(path).hasClass("openarrow")===false && $(path).hasClass("extrapadding")===false){
if(label=="Only Me"){
$(path).find(".uiButtonText").eq(0).removeClass("hidden_sb");
}
else{
$(path).find(".uiButtonText").eq(0).addClass("hidden_sb");
}
}
else{
$(path).find(".uiButtonText").eq(0).addClass("hidden_sb");
}
}
$(path).find(".uiButtonText").eq(0).before($(dclass));

if(k==0){
$(thisv).parents(".openToggler").eq(0).find(".hideToggler").click(); //very fast but seems the only way as from privacy shortcuts it closes all instead if no stopprop right after as well
}

$(thisv).parents("#u_5_8").eq(0).addClass("_2va0"); //works if it exists, it is for privacy shortcuts

});
e.stopPropagation();

});

$(document).on("click","#edita_l",function(){
$(this).parents(".pop_container3").find(".editacn").click();	
});

$(document).on("click",".doc_click",function(){
$(document).click();	
});

$(document).on("click",".buttonwrapper,.dialog_openers,.pulldown,#pulldown",function(e){
var target=e.target;
if($(target).hasClass("displaydialog")===true || $(target).attr("href")!==undefined){}
else{e.stopPropagation(); e.stopImmediatePropagation();}
});

$(document).on("click","#tiptip_holder_w,#tiptip_holder",function(e){
e.stopPropagation();	
});


$(document).on("click",".audienceSelector .moreOption",function(e){
$(this).parents(".audienceSelector").addClass("friendList");
$(this).parents(".audienceSelector").addClass("showSecondaryOptions");
e.stopPropagation();
});

$(document).on("click",".audienceSelector .returnOption",function(e){
$(this).parents(".audienceSelector").removeClass("friendList");
$(this).parents(".audienceSelector").removeClass("showSecondaryOptions");
e.stopPropagation();
});


function stop_pagination(w){
if(window["pagination_"+w]){
window["pagination_"+w].abort();	
$("#"+w).find(".pagination").addClass("hidden_sb");
}
}

function restart_pagination(w){
window["pagination_"+w+"lock"]=false;
$("b[data-t_id=pagination_"+w+"]").mouseenter();
}

function pagination_loaded(response,org_elem){
if(response===undefined){
$("body").find(".pagination").addClass("hidden_sb");
return;	
}

var path=$(org_elem).data("org_elem");
var w=$(org_elem).data("w");

var res=$.parseJSON(response);

$(path).find("#"+w).append(res.res);

$(path).find("#"+w+" .pagination").addClass("hidden_sb");

$("#tr_"+w).find("input[name=gs]").val(res.tr);

if(res.res!=""){
window["pagination_"+w+"lock"]=false;	
}

}

function pagination_loading(org_elem){
var path=$(org_elem).data("org_elem");
$(path).find(".pagination").removeClass("hidden_sb");
}

function pagination_working(w){

var org_elem=$("b[data-t_id=pagination_"+w+"]").data("org_elem");
var fjax_url=$("b[data-t_id=pagination_"+w+"]").data("fjax_url");

var scrollt=document.getElementById(w).scrollTop;
var scrollh=document.getElementById(w).scrollHeight;
var clienth=fpx($("#"+w).css("height"));

var per=(scrollt+clienth)*100/scrollh;

if(per==100){ 

$(org_elem).find("[data-a_form=tr_"+w+"]").remove();

$(org_elem).append(\'<div class="hidden_sb" data-a_id="pagination_\'+w+\'" fjax="\'+fjax_url+\'" data-a_form="tr_\'+w+\'" data-a_custom_f="pagination_loaded" data-a_starts="pagination_loading"></div>\');

$(org_elem).find("[data-a_id=pagination_"+w+"]").data("org_elem",org_elem);
$(org_elem).find("[data-a_id=pagination_"+w+"]").data("w",w);

$(org_elem).find("[data-a_form=tr_"+w+"]").click();
$("b[data-t_id=pagination_"+w+"]").mouseleave();	
window["pagination_"+w+"lock"]=true;
}

if(!window["pagination_"+w+"lock"]){
$("b[data-t_id=pagination_"+w+"]").mouseenter();	
}

	
}

function smart_pagination_div(w,org_elem,gs,fjax){

$("b[data-t_id=pagination_"+w+"]").remove();

$(org_elem).append(\'<div class="hidden_sb" id="tr_\'+w+\'"><input type="hidden" name="gs" value="\'+gs+\'" autocomplete="off"></div>\');
window["pagination_"+w+"lock"]=false;
$(org_elem).append(\'<b data-t_f="pagination_working(\\\'\'+w+\'\\\')" data-t_t="2000" data-t_id="pagination_\'+w+\'"></b>\');

$(org_elem).find("b[data-t_id=pagination_"+w+"]").data("org_elem",org_elem);

$(org_elem).find("b[data-t_id=pagination_"+w+"]").data("fjax_url",fjax);

$(org_elem).find("b[data-t_id=pagination_"+w+"]").click();	
}
';
?>


var mcmx=false;
var mcmhandler=function(e){
  mcmvvv(mcmx);
}
var mcmhandlerv=function(e){
mcmvv(mcmx);
}

function checkst(x){
var wclass=$("#cmncdov"+x).hasClass("cmncd2cv");
if(wclass===true){
mcmx=x;
$(document).unbind("click",mcmhandlerv);
$(document).bind("click",mcmhandlerv);
}
else{
$("#cmncd"+x).css("opacity","0");
$("#cmncdov"+x).css("display","none");
$("#cmncdo"+x).css("display","inline-block");
}
}

function checkstv(x){
var wclass=$("#cmncdov"+x).hasClass("cmncd2cv");
if(wclass===true){
mcmx=x;
$(document).unbind("click",mcmhandler);
$(document).bind("click",mcmhandler);
}
else{
$("#cmncd"+x).css("opacity","0");
$("#cmncdov"+x).css("display","none");
$("#cmncdo"+x).css("display","inline-block");
}
}

function mcm(x){
$(".cmjr").css("opacity","0");
$(".cmncd2cv").addClass("cmncd2v");
$(".cmncd2v").removeClass("cmncd2cv");
$(".cmncdc").css("display","none");
$(".cmncd2cv").css("display","none");
$(".cmncd2v").css("display","none");
$(".cmncd2").css("display","inline-block");

$("#cmncd"+x).css("opacity","1");

$("#cmncdo"+x).css("display","none");
$("#cmncdov"+x).css("display","inline-block");


$("#cmncdov"+x).removeClass("cmncd2v");
$("#cmncdov"+x).addClass("cmncd2cv");

$("#cmncdc"+x).css("display","block");

}
function mcmv(x){
$(".cmjr").css("opacity","0");
$(".cmncd2cv").addClass("cmncd2v");
$(".cmncd2v").removeClass("cmncd2cv");
$(".cmncdc").css("display","none");
$(".cmncd2cv").css("display","none");
$(".cmncd2v").css("display","none");
$(".cmncd2").css("display","inline-block");
$("#cmncd"+x).css("opacity","1");
}
function mcmvv(x){
$(".cmjr").css("opacity","0");
$(".cmncd2cv").addClass("cmncd2v");
$(".cmncd2v").removeClass("cmncd2cv");
$(".cmncdc").css("display","none");
$(".cmncd2cv").css("display","none");
$(".cmncd2v").css("display","none");
$(".cmncd2").css("display","inline-block");
$("#cmncd"+x).css("opacity","0");
}
function mcmvvv(x){
$(".cmjr").css("opacity","0");
$(".cmncd2cv").addClass("cmncd2v");
$(".cmncd2v").removeClass("cmncd2cv");
$(".cmncdc").css("display","none");
$(".cmncd2cv").css("display","none");
$(".cmncd2v").css("display","none");
$(".cmncd2").css("display","inline-block");
$("#cmncd"+x).css("opacity","1");
}

$(document).on("click",function(e){
var dtarget=e.target;
if($(dtarget).hasClass("cmnc_editv")){e.stopPropagation; e.stopImmediatePropagation; }else{
$(".cmnc_editv").addClass("cmnc_edit");
$(".cmnc_editv").next(".edit_del_container").addClass("hidden_sb");
$(".cmnc_editv").removeClass("cmnc_editv");
}
});

$(document).on("click",".cmnc_editvv",function(){
if($(this).next(".edit_del_container").hasClass("hidden_sb")){
$(this).next(".edit_del_container").removeClass("hidden_sb");
$(this).removeClass("cmnc_edit");
$(this).addClass("cmnc_editv");
}
else{
$(this).next(".edit_del_container").addClass("hidden_sb");
$(this).removeClass("cmnc_editv");
$(this).addClass("cmnc_edit");
}
});

$(document).on("click",".delete_comment",function(){
$(this).parents(".edit_del_container").prevAll(".cmnc").eq(0).click();
});

$(document).on("click",".edit_comment",function(){
if($(this).parents(".faddo").eq(0).find(".readmore").length>0 && $(this).parents(".faddo").eq(0).find(".readmore").attr("data-read")!="t"){
$(this).parents(".faddo").eq(0).find(".readmore").click();
}
var dcomment=$(this).parents(".faddo").eq(0).find(".actual_comment").html();
$(this).parents(".faddo").eq(0).find(".actual_comment").addClass("hidden_sb");
if($(this).parents(".faddo").eq(0).find("#new_comment").length=="0"){
var sbid=$(this).parents(".faddo").eq(0).find(".cmnc").attr("data-sbid");
var ltypev=$(this).parents(".comment_wrapper").eq(0).attr("data-ltypev");
var dhtml='<div class="new_comment_wrapper hidden_sb"><input type="hidden" name="dtable" value="'+ltypev+'" /><input type="hidden" name="sbid" value="'+sbid+'" /><textarea data-au_grow name="new_comment" id="new_comment" style="display:block;width:355px;"></textarea><div class="hidden_sb dfjax" fjax="/ajax/edit/comment.php" data-a_formo="$(this).parents(\'.new_comment_wrapper\')"></div>Press ESC to cancel.</div>';
$(this).parents(".faddo").eq(0).find(".comment_area").before(dhtml);
}
$(this).parents(".faddo").eq(0).find(".new_comment_wrapper").removeClass("hidden_sb");
$(this).parents(".faddo").eq(0).find("#new_comment").val(dcomment);
$(this).parents(".faddo").eq(0).find("#new_comment").focus();
$(this).parents(".faddo").eq(0).find("#new_comment").trigger("keydown");
$(this).parents(".faddo").eq(0).find("#new_comment").trigger("keyup");
});

var comment_close=function(e){
$(this).blur();
$(this).parents(".new_comment_wrapper").eq(0).addClass("hidden_sb");
$(this).parents(".faddo").eq(0).find(".actual_comment").removeClass("hidden_sb");
}

$(document).on("keyup","#new_comment","esc",comment_close);

$(document).on("keydown","#new_comment","return",function(){
$(this).parents(".new_comment_wrapper").eq(0).addClass("hidden_sb");
$(this).parents(".new_comment_wrapper").find(".dfjax").click();
$(this).parents(".faddo").eq(0).find(".actual_comment").html($(this).val());
$(this).parents(".faddo").eq(0).find(".actual_comment").removeClass("hidden_sb");
});

$(document).on("mouseenter",".faddo",function(e){
$(this).find(".cmnc").eq(0).css("opacity","1");
$(this).find(".cmnc_edit").eq(0).css("opacity","1");
});
$(document).on("mouseleave",".faddo",function(e){
$(this).find(".cmnc").eq(0).css("opacity","0");
$(this).find(".cmnc_edit").eq(0).css("opacity","0");
});

$(document).on("mouseenter",".faddov",function(e){
$(this).find(".cmjr").css("opacity","1");
});
$(document).on("mouseleave",".faddov",function(e){
checkst($(this).attr("data-yk"));
});

var single_update_per_user=new Array();
//defines zero possible duplicates on live update
single_update_per_user[0]="hometown";
single_update_per_user[1]="currentcity";

single_update_per_user[2]="activities";
single_update_per_user[3]="sports";
single_update_per_user[4]="teams";
single_update_per_user[5]="athletes";
single_update_per_user[6]="interests";
single_update_per_user[7]="inspirations";
single_update_per_user[8]="spokenl";
single_update_per_user[9]="relation_s";


$(document).on("click",".cmnc_label",function(){
$(this).data("delem").attr("data-nodialog","t");
$(this).data("delem").click();
});

$(document).on("click",".cmnc",function(){

var id=$(this).attr("data-sbid");
var w=$(this).attr("data-uidv"); //alert(w);
var org_elem=$(this);

if($(this).attr("data-type")=="1" || $(this).attr("data-type")=="2"){

$("#tiptip_holder").css("display","none");
var posi=Math.floor(Math.random()*101);

if(posi<=39 && $(this).attr("data-nodialog")===undefined){
$("#delwhat").html("Comment");
$("#delwhat2").html("comment");
$('#div_dialog_footervo').html('<label class="uiButton uiButtonConfirm cmnc_label" style="position:absolute;right:89px;"><input autocomplete="off" type="button" value="Delete"></label><label class="uiButton" onclick="cancel_remove();" style="position:absolute;right:23px;"><input autocomplete="off" type="button" value="Cancel"></label>');
$("#div_dialog_footervo").find(".cmnc_label").data("delem",$(this));
$("#pre_pop_container2").css("display","block");
}
else{
rremovec(id,w,org_elem);	
}


}
else if($(this).attr("data-type")=="3"){
removecv(id,w,org_elem);
}


});


$(document).on("click",".comment_undo",function(){

var org_elem=$(this).data("org_elem");

	$(this).parents(".mtablev").eq(0).remove();
	$(org_elem).parents(".mtablev").eq(0).removeClass("hidden_sb");
	if($(org_elem).parents(".picturetheater").eq(0).length>0){
	var phvv=$(org_elem).parents(".mtablev").eq(0).offset().top;
	repos_slider(phvv);
	}

});

$(document).on("focus",".writeacomment",function(){

if($(this).prev(".picwriteid").eq(0).hasClass("hidden_sb")===true){
$(this).prev(".picwriteid").eq(0).removeClass("hidden_sb");

$(this).parents(".foot_box_inner").addClass("foot_box_inner_img");
	}
    
});


$(document).on("blur",".writeacomment",function(){

var checkval=$(this).val();
checkval=$.trim(checkval);
if(checkval==""){
$(this).parents(".foot_box_inner").removeClass("foot_box_inner_img");

$(this).prev(".picwriteid").eq(0).addClass("hidden_sb");
}
else{
}

});



function commentp(e){
var org_elem=$(this);
var charCode = (e.which) ? e.which : e.keyCode;
var tocheck=$(this).val();
tocheck=$.trim(tocheck);
if(tocheck!=""){}
else{} 
if((charCode == "13") && (tocheck=="")){
$(this).parents(".foot_box_inner").addClass("foot_box_inner_img");
$(this).val("");
return false;
}
else if(charCode=="13" && !ctrlDown){
var sbid=$(this).parents(".foot_box").find(".comment_wrapper").eq(0).attr("data-sbid"); //picscommentscontainer
var uidv=$(this).parents(".mtabled").eq(0).attr("data-uidv");

if(sbid===undefined){
var corder=$("#ao_gn").val();
var sbid=pi_gn[corder];
var uidv=o_gn[corder];
}


loadcomment(uidv,sbid,org_elem);
$(this).val("");
$(this).parents(".foot_box_inner_img").eq(0).removeClass("foot_box_inner_img");
$(this).prev(".picwriteid").eq(0).addClass("hidden_sb");
return false;
}
else{
$(this).parents(".foot_box_inner").addClass("foot_box_inner_img");
}

} 


var allow_line_break=function(e){
var charCode = (e.which) ? e.which : e.keyCode;
if(charCode == "13" && ctrlDown) {
var nval=$(this).val()+"\n";
$(this).val(nval);
}
}

$(document).on("keydown",".writeacomment",commentp);
$(document).on("keyup",".writeacomment",allow_line_break);


$(document).on("click",".selector .itemAnchor",function(){
var nhtml=$(this).parent(".uiSelectorOption").eq(0).attr("data-label");
$(this).parents(".selector").eq(0).find(".uiButtonText").eq(0).html(nhtml);
$(this).parents(".selector").eq(0).find(".checked").removeClass("checked");

$(this).parent(".uiSelectorOption").eq(0).addClass("checked");
});

<?php
echo'

$(document).on("click",".ealbum_audienceSelector .uiSelectorButton",function(){

if($(this).hasClass("selected")===true){
return;	
}

if($(this).parents(".ealbum_audienceSelector").find(".uiSelectorMenuWrapper").length>0){
return;	
}

var dclone=$("#ealbum_privacy_options").find(".uiSelectorMenuWrapper").clone();
$(this).parents(".ealbum_audienceSelector").find(".uiButton").eq(0).next(".tooltip_text").after($(dclone));

});

$(document).on("click",".ealbum_audienceSelector .uiSelectorOption",function(){
var sbid=$(this).parents(".audienceSelectorv").find("input[name=sbid]").val();
editalbum(sbid);	
});

$(document).on("click",".ealbum",function(){
var sbid=$(this).parents("ul").eq(0).find("input[name=sbid]").val();
editalbum(sbid);	
});

$(document).on("change","select[data-onchange]",function(){
window[$(this).data("onchange")]($(this));	
});

function custom_privacy_change(org_elem){
var thisv=org_elem;
if($(thisv).val()==30){ //specific
$(thisv).parents(".pop_container3").eq(0).find("#u_ak_5").removeClass("hidden_sb");	
$(thisv).parents(".pop_container3").eq(0).find(".expandCheckbox").addClass("hidden_sb");	
$(thisv).parents(".pop_container3").eq(0).find("#u_ak_8").removeClass("hidden_sb");	
}
else if($(thisv).val()==10){ //only me
$(thisv).parents(".pop_container3").eq(0).find(".expandCheckbox").addClass("hidden_sb");;	
$(thisv).parents(".pop_container3").eq(0).find("#u_ak_8").addClass("hidden_sb");	
$(thisv).parents(".pop_container3").eq(0).find("#u_ak_5").addClass("hidden_sb");	
}
else if($(thisv).val()==50 || $(thisv).val()==40){ //friends or firends of friends
$(thisv).parents(".pop_container3").eq(0).find("#u_ak_5").removeClass("hidden_sb");	
$(thisv).parents(".pop_container3").eq(0).find("#u_ak_8").addClass("hidden_sb");	
$(thisv).parents(".pop_container3").eq(0).find(".expandCheckbox").removeClass("hidden_sb");	
}
}

$(document).on("click","a[rel=async]",function(){
$(this).addClass("async_saving");	
});

$(document).on("click","a[rel=toggle]",function(e){
if($(this).parent().eq(0).hasClass("openToggler")===true){
$(this).parent().eq(0).removeClass("openToggler");
}
else{
$(this).parent().eq(0).addClass("openToggler");	
$(this).parent().eq(0).prepend(\'<button type="button" class="hideToggler"></button>\');
e.stopPropagation();
e.preventDefault();
}
});

$(document).on("click","._9ot",function(){
var state=$(this).find("._9or").length; //see if it is opened
if(state==0){
$(this).find("._9os").addClass("_9or");
$(this).find("._9os").removeClass("_9os");
$(this).next("._9ox").slideUp(300,function(){
$(this).addClass("hidden_sb");	
});
}
else{
$(this).parents("#u_0_3").find("._9os").not($(this).find("._9os")).addClass("_9or");
$(this).parents("#u_0_3").find("._9os").not($(this).find("._9os")).removeClass("_9os");
$(this).parents("#u_0_3").find("._9ox").not($(this).next("._9ox")).slideUp(300,function(){
$(this).addClass("hidden_sb");	
});

$(this).find("._9or").addClass("_9os");
$(this).find("._9or").removeClass("_9or");
$(this).next("._9ox").removeClass("hidden_sb");
$(this).next("._9ox").css("display","none");

$(this).next("._9ox").slideDown(520);
}
});

$(document).on("click",".sbJewel .hideToggler",function(e){
if($(".clone_container_wrapper").find(".custom_privacy").length>0 && $("#u_0_4").hasClass("openToggler")===true){return false;}
$(this).parent().eq(0).find("._9os").addClass("_9or");
$(this).parent().eq(0).find("._9os").removeClass("_9os");
$(this).parent().eq(0).find("._9ox").slideUp(0);
$(this).parent().eq(0).find("._2va0").removeClass("_2va0");
});

$(document).on("click","#u_0_4",function(e){
var target=e.target;

if($(this).find(".hideToggler").length>0){
	
var ax=0;
$(this).find(".hideToggler").each(function(){

if(ax>0){
$(this).click();
}

ax++;
});	

if($(target).attr("id")=="u_4_b"){
e.stopPropagation();	
}

}

}); //simple function to allow of hiding opened toggler


$(document).on("click",".transfer",function(){
	
});
';
?>

<?php include("endf.php"); ?>