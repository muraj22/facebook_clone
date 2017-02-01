<?php //ya viene declarado de dcph.php
$sechov.='
function select_one_ac(event,ui,suf,ac_url,ac_justone,custom_func,final_custom_func,org_elem,uidv,fullname){
	if(ac_url=="self"){
				var ilusert=ui.value;
				ilusert=ilusert.toLowerCase();
				ilusert=ilusert.replace(/\s/g, "");
				ilusert=JSON.stringify(ilusert).replace(/\W/g, "");

				}
				else{
					if(uidv!==undefined){var ilusert=uidv;}
					else{
			var ilusert=ui.uidv;
			}
			}


			if(fullname!==undefined){var dusern=fullname;}
			else{
            ui.value=str_replace(",","&#44;",ui.value);
			var dusern=ui.value;
			}

			var tags=$("#tags"+suf).val();

				$("#tags"+suf).val(tags+","+ilusert);

				var tagsv=$("#tags"+suf+"v").val();

				$("#tags"+suf+"v").val(tagsv+","+dusern);

				if(ac_justone=="t"){
$("#tag"+suf).val(dusern);
$("#tags"+suf+"m").val(dusern);
$("#tags"+suf+"stateedit").val("1");
$("#tag"+suf).addClass("editpi2");
$("#currentp"+suf).addClass("editpivv");
$("#tag"+suf+"textarea").attr("disabled",false);
$("#tag"+suf+"textarea").css("background","#ffffff");

$("#tag"+suf+"removeedit").css("display","inline-block");

if(final_custom_func!==undefined){
window[final_custom_func](ui,org_elem);
return false;
}

}
else{

if(final_custom_func!==undefined){
window[final_custom_func](ui,org_elem);
return false;
}

renewvv_mt("",suf);
$("#tag"+suf).val("");
}


			if(custom_func!==undefined){
			window[custom_func](ui,org_elem);
			}

}

//just one start

function ac_load_one_mt(w,v,itv){
var suf=w;
var dusern=v;
if(v!=""){
$("#tag"+suf).val(dusern);
$("#tags"+suf+"m").val(dusern);
$("#tags"+suf+"stateedit").val("1");
$("#tag"+suf).addClass("editpi2");
$("#currentp"+suf).addClass("editpivv");
$("#tag"+suf+"textarea").attr("disabled",false);
$("#tag"+suf+"textarea").css("background","#ffffff");

$("#tag"+suf+"removeedit").css("display","inline-block");
$("#tag"+suf+"textarea").val(itv);
}

}

function swapc2_mt(w,v){


				var hasit=$("#currentp"+w).hasClass("editpivv");
				$("#currentp"+w).removeClass("editpivv");
				$("#tag"+w).removeClass("editpi2");
				$("#tag"+w+"removeedit").css("display","none");


				if(v==1){
				var el="[data-ac_enable="+w+"]";
				var ph=$(el).attr("data-ac_placeholder");
				$("#tag"+w).attr("placeholder",ph);
				$("#tag"+w).val("");
				$("#tag"+w).blur();
				}
				$("#tags"+w+"m").val("");
				$("#tag"+w+"textarea").val("");
				$("#tag"+w+"textarea").attr("disabled", true);
				$("#tag"+w+"textarea").css("background","#F2F2F2");

				$("#tag"+w+"stateedit").val("2");
				$("#tag"+w).focus();

				$("#currentp"+w)
				if(hasit===true){

				$("#tags"+w+"v").val("");
				$("#tags"+w).val("");

				var custom_func=$("[data-ac_penable="+w+"]").attr("data-ac_custom_f_r");

				if(custom_func!==undefined){
				var org_elem=$("#tag"+w);
				window[custom_func](org_elem);
				}

				}

}

function dov2_mt(v,w){
var wv=$.trim(v);
var wvv=$("#tags"+w+"m").val();

var stateedit=$("#tags"+w+"stateedit").val();

if((stateedit=="1") && (wv!=wvv)){
swapc2_mt(w);
}
}

//just one end
function reset_mt(f,w){
$("#tags"+w).val("");
renewvv_mt(f,w);
}
function checkle_mt(evt,v,w){
var charCode = (evt.which) ? evt.which : event.keyCode
var tocheck=$("#tag"+w).val();
tocheck=$.trim(tocheck);
if((charCode == "8") && (tocheck=="")){
	var ftry=$("#ftry"+w).val();
	$("#ftry"+w).val("y");
	if(ftry=="y"){
	var dame=$("#tags"+w).val();
	var pallt=$("#tags"+w).val();
if(pallt!==undefined){
var allt=pallt.split(",");
var alltv=allt.length-1;

var damev=allt[alltv];
}

if(damev!=""){
	$("#ccarita"+w+damev).click();
}

	$("#ftry"+w).val("n");
	}
	}
else{}

var alsoemail=$("#tag"+w).attr("data-ac_alsoemail");
if(charCode=="188" && alsoemail!==undefined){
v=v.replace(/\\,/g,"")
v=$.trim(v);

var vv=validateEmail(v);
var tags=$("#tags"+w).val();
var tagsv=$("#tags"+w+"v").val();
if(vv===false){}
else{
			var ilusert=v.replace(/\\./g,"_punto_punto_");
			ilusert=ilusert.replace("@","_arroba_arroba_");;

if(strpos(tags,ilusert)!==false){$("#tag"+w).val(""); return;}

			var dusern=v;

												$("#tags"+w).val(tags+","+ilusert);

						$("#tags"+w+"v").val(tagsv+","+dusern);

						$("#tag"+w).val("");
												renewvv_mt("",w);
							}
}
}
function delov_mt(w,c,v,ov,fid,wv){
wv=str_replace(",","&#44;",wv);
var tags=$("#tags"+ov).val();
tags=tags.replace(","+w,"");
$("#tags"+ov).val(tags);
var tagsv=$("#tags"+ov+"v").val();
tagsv=tagsv.replace(","+wv,"");
$("#tags"+ov+"v").val(tagsv);
renewvv_mt("",ov);
var custom_func=$("#tag_l"+ov).next("[data-ac_enable]").data("ac_custom_f_r");
if(custom_func!==undefined){
window[custom_func](fid,"t");
//second parameter is a no renew flag in case it is necessary to be read
}
}
function renewvv_mt(f,w){
	if(!f){f="";}
	var pallt=$("#tags"+w+f).val();

	var el="[data-ac_enable="+w+"]";
	var tc=$(el).attr("data-ac_placeholderf");

if(pallt==""){var ac_inputw=$("#tag"+w+f).data("ac_inputw"); $("#tagw"+w+f).css("left","1px"); $("#tagw"+w+f).css("width",ac_inputw+"px"); $("#tags"+w+"v"+f).val("");
			if(tc===undefined){
				var ph=$(el).attr("data-ac_placeholder");
				$("#tag"+w).attr("placeholder",ph);
				var activelement=document.activeElement;
				$("#tag"+w).blur();
				$(activelement).focus();
			}
}
else{
if(tc===undefined){
$("#tag"+w).attr("placeholder","");
}
}

	var rompecocos="";
	var rompecocos2="";

	x=1;
if(pallt!==undefined){
var allt=pallt.split(",");
var alltv=allt.length-1;

var retrieval=$("#tags"+w+f+"v").val();
var retrievals=retrieval.split(",");

var dnew_retrieval=new Array();
var ax=1;
$(retrievals).each(function(k,v){

if(v.length>0){
dnew_retrieval[ax]=v;
ax++;
}

});


$(allt).each(function(k, v) {

if(v.length>0){
var fid=v;

rompecocos+=\'<div class="carita" id="carita\'+w+f+\'\'+x+\'"><div title="\'+dnew_retrieval[x]+\'" style="max-width:100px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:inline-block;">\'+dnew_retrieval[x]+\'</div><div id="ccarita\'+w+f+allt[x]+\'" onclick="delov_mt(\\\'\'+allt[x]+\'\\\',1,\\\'\'+f+\'\\\',\\\'\'+w+\'\\\',\\\'\'+fid+\'\\\',\\\'\'+dnew_retrieval[x]+\'\\\')" class="ccarita" title="Remove \'+dnew_retrieval[x]+\'" style=""></div></div>\';

rompecocos2+=","+dnew_retrieval[x];

x++;
}

});



}
if(rompecocos==""){rompecocos="&nbsp;";}
$("#currentp"+w+f).html(rompecocos);
$("#tags"+w+"v"+f).val(rompecocos2);


var xv=x-1;

if(xv!=0){
var iwidth=$("#carita"+w+f+xv).innerWidth();
var ofleft=$("#carita"+w+f+xv).offset().left;

iwidth=parseInt(iwidth);
ofleft=parseInt(ofleft);

var ofleft2=$("#currentp"+w+f).offset().left;
ofleft2=parseInt(ofleft2);

var ofleft3=ofleft-ofleft2;

var twidth=iwidth+ofleft3+5;

var tent=iwidth+ofleft3;

var iwidthv=$("#currentp"+w+f).innerWidth();
var tentw=iwidthv-120;

if(tent>tentw){

var tentwv=iwidthv-tentw+10;

$(\'#currentp\'+w+f).append(\'<div style="display:inline-block;width:\'+tentwv+\'px;border:1px solid transparent;margin-bottom:2px;background:none;border:none;max-width:\'+tentwv+\'px;" class="carita"></div>\');	//because the cross takes two pixels to the bottom and it is originally set to 4, the margin bottom
$("#tagw"+w+f).css("left","1px");
$("#tagw"+w+f).css("bottom","1px");
var okv=145;
}
else{
$("#tagw"+w+f).css("left",twidth+"px");
var okv=iwidthv-twidth-5;
}


}

if(pallt!=""){
$("#tagw"+w+f).css("width",okv+"px");
}

}


$(document).on("click","[data-ac_enable][data-ac_enable!=on]",function(){
var suf=$(this).data("ac_enable");
$(this).data("ac_enable","on");
$(this).attr("data-ac_enable","on");

$(this).attr("data-ac_penable",suf);
$(this).after(\'<input type="hidden" name="tags_input" value="tags\'+suf+\'">\');

var astyle=$(this).attr("style");
var aclass=$(this).attr("class");
aclass=aclass.replace("displaynoneimportant","");

var ac_inputw=$(this).data("ac_inputw");

if($(this).data("ac_placeholder")!==undefined){
var ac_placeholder=$(this).data("ac_placeholder");
}
else{
var ac_placeholder="";
}

if($(this).data("ac_padding")!==undefined){
var padding_kind=$(this).data("ac_padding");
}
else{
var padding_kind="padding:3px;";
';

if($browser=="chrome" || $browser=="safari" || $browser=="msie"){
$sechov.='
padding_kind+="padding-bottom:4px;";
';
}

$sechov.='
}

if($(this).data("ac_inputa")!==undefined){
var inputa=$(this).data("ac_inputa");
}
else{
var inputa="";
}

if($(this).attr("data-ac_alsoemail")!==undefined){
var alsoemail=\'data-ac_alsoemail="t"\';
}
else{
var alsoemail="";
}

var abefore=\'<div style="margin:0;padding:0;height:100%;width:100%;display:inline-block;position:relative;">\';
abefore+=\'<div style="\'+astyle+\'"\ class="\'+aclass+\'" id="currentp\'+suf+\'">&nbsp;</div><div id="tagw\'+suf+\'" style="width:\'+ac_inputw+\'px;position:absolute;left:1px;bottom:1px;"><div style="position:relative;max-width:100%;overflow-x:hidden;overflow-y:hidden;"><input class="\'+aclass+\'" autocomplete="off" maxlength="65" id="tag\'+suf+\'" name="tag\'+suf+\'" data-ac_inputw="\'+ac_inputw+\'" value="" type="text" style="position:relative;border:0;max-width:100%;min-width:100%;\'+padding_kind+inputa+\'" placeholder="\'+ac_placeholder+\'" \'+alsoemail+\'></div></div>\';
abefore+=\'</div>\';

abefore+=\'<input autocomplete="off" type="hidden" id="ftry\'+suf+\'"><input autocomplete="off" type="hidden" id="tags\'+suf+\'" name="tags"><input autocomplete="off" type="hidden" id="tags\'+suf+\'v" name="tagsv"><input type="hidden" name="suf" value="\'+suf+\'">\';

abefore+=\'<div id="tag_l\'+suf+\'"></div>\';

var ac_justone=$(this).data("ac_justone");

$(this).addClass("hidden_sb");

if(ac_justone=="t"){
var keyup_function=function(){
dov2_mt($(this).val(),suf);
}
abefore+=\'<input type="hidden" id="tags\'+suf+\'m">\';
abefore+=\'<input type="hidden" id="tags\'+suf+\'stateedit">\';
}
else{
var keyup_function=function(e){
checkle_mt(e,$(this).val(),suf);
}
}


$(this).before(abefore);

if($(this).find(".ac_prepend").length>0){
$("#tagw"+suf).prepend($(this).find(".ac_prepend"));
$("#tagw"+suf).find(".ac_prepend").removeClass("hidden_sb");
}

if(ac_justone=="t"){
$("#currentp"+suf).parent().append(\'<label id="tag\'+suf+\'removeedit" class="removeedit" style="display:none;" title="Remove"><input autocomplete="off" type="button" class="removeedit2" style="padding:0;cursor:pointer;"></label>\');

$("#tag"+suf+"removeedit").bind("click",function(){
swapc2_mt(suf,1);
});
}

$("#tag"+suf).bind("keyup",keyup_function);

var custom_func=$(this).data("ac_custom_f");
var final_custom_func=$(this).data("ac_custom_ff");

var liwidth=$(this).data("ac_liwidth");

var ac_url=$(this).data("ac_url");

if($(this).data("ac_style")!==undefined){
var dstyle=$(this).data("ac_style");
}
else{
var dstyle="";
}


if(ac_url=="self"){
var empty_arr=[""];
var asource=empty_arr;

$("#tag"+suf).bind("keyup",function(){
var cvar=$("#tag"+suf).val();
if($(this).data("noucwords")===undefined){
cvar=$.trim(cvar);
cvar=cvar.toLowerCase();
cvar=ucwords(cvar);
}

$("#tag"+suf).autocomplete("option","source",
		empty_arr.concat(cvar));
});

$("#tag"+suf).bind("keydown",function(){
$("#tag"+suf).autocomplete("option","source",
		empty_arr.concat($("#tag"+suf).val()));
});

}
else{
var asource=function(request, response) {
var dval=$("#tags"+suf).val();
								$.ajax({
									url: ac_url,
									dataType: "json",
									data: {
										term : request.term,
							a_fv : dval,
					a_sv : $("#tags"+suf+"v").val()

									}}).done(function(data) {
										response(data);
									});
						}
}



var ac_additionals=$(this).attr("data-ac_additionals");

if(ac_additionals===undefined){
ac_additionals="";
}

var toappend=$("#tagw"+suf);

if($(this).data("ac_position")!==undefined){
var position_kind=$(this).data("ac_position");
}
else{
var position_kind="absolute";
}

var org_elem=$("#tag"+suf);

if($(this).attr("data-ac_search_people_messages")!==undefined){
var search_people_messages="t";
}
else{
var search_people_messages="f";
}

if($(this).data("ac_custom_ul")!==undefined){
var dcustom_ul=$(this).data("ac_custom_ul");
}else{
var dcustom_ul="";
}

if(search_people_messages=="t"){
var asource=function(request, response) {
				if($.trim(request.term)=="Name or Email"){
				return false;
				}
				var localResults = $.ui.autocomplete.filter(local_conversations_search_loaded, request.term);
				var loaded=$("#people_search_loaded").val();
                $.ajax({
                  url: "/autocomplete/jump_note.php?info_lines=t&aemail=t",
                  dataType: "json",
				  method:"post",
                  data: {
                    term : request.term,loaded:loaded,messages_search:"t"
                  },
                  success: function(data) {	
				  if(localResults.length>0){ people_search_drun=1;
				  var output = {};
				  output=jsonConcat(output, data);
				  output=jsonConcat(output, localResults);

				  response(output);
				  }
				  else{ people_search_drun=0;
					response(data);  
				  }
				  }
                });
            }	
	
var toappend="#people_search_results";
	
}

$("#tag"+suf).autocomplete({
					appendTo: toappend,
					autoFocus:true,
			source: asource,
		open: function(event, ui){

if(search_people_messages=="t"){
	
	var where=$("#people_search_results").children(".ui-autocomplete");
				$(where).addClass("zindex0important");
				$(where).addClass("positionlocked");
						
				$(where).css("left","0");
				$(where).css("top","0");
					
				$("#blank_state").addClass("hidden_sb");	
				$(".messages_resize").addClass("hidden_sb");
				
				$("#people_search_results").find(".ui-autocomplete").removeClass("hidden_sb");
				
				$(where).attr("style","display:inline-block;position:relative;border:0;");
				$(where).addClass("displayblockimportant");
				$(where).removeClass("hidden_sb");
				
				$("._2nb").addClass("hidden_sb");
				
				$("#people_search_results").removeClass("hidden_sb");
				
				$("#people_search_noresults").addClass("hidden_sb");
				
				setSlider($("#people_search_results"));
					
}else{
                    
					var where=$("#tagw"+suf).children(".ui-autocomplete");
					$(where).attr("style","display:block;position:"+position_kind+";"+ac_additionals);
            
            if(dcustom_ul!=""){
            $(where).each(function(){
            eval(dcustom_ul);
            });
            }
			$(where).find(".put").css("padding","0 6px");

if(dstyle=="with_pic"){
$(where).find(".put").css("padding-top","2px");
$(where).find(".put").css("padding-bottom","2px");
$(where).find(".put:first").css("margin-top","2px");
$(where).find(".put:last").css("margin-bottom","1px");
}

			$("#tagw"+suf).css("display","inline-block");
}

			},
			close: function(event,ui){

			},
			focus:function(event,ui){
			if(search_people_messages=="t"){}
			else{	
			var thisv=ui.item.sharedid;

var where=$("#tagw"+suf).children(".ui-autocomplete");

var asi=$(where).find(".adl");

$(asi).css("border-color","#ffffff");
$(asi).css("border-width","1px 0px;");
$(asi).css("color","#333333");
$(asi).css("background","#ffffff");

$(asi).find(".fcg").removeClass("fcw");

$("#ac_"+thisv).css("color","#ffffff");
$("#ac_"+thisv).css("background","#6d84b4");
$("#ac_"+thisv).css("border-width","1px 0px");
$("#ac_"+thisv).css("border-style","solid");
$("#ac_"+thisv).css("border-color","#3b5998 #ffffff");

$("#ac_"+thisv).find(".fcg").addClass("fcw");


			return false;
			}
			},
			select: function( event, ui ) {
				var uisp=ui.item; //ui speciale
				select_one_ac(event,uisp,suf,ac_url,ac_justone,custom_func,final_custom_func,org_elem);

				return false;
			}
				})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {

if(search_people_messages=="t"){
	if(item.yk=="-1" && people_search_drun==0){
				$("#people_search_results").addClass("hidden_sb");
				$("#people_search_noresults").removeClass("hidden_sb");
				$("#people_search_results").find(".ui-autocomplete").addClass("hidden_sb");
				$(".messages_resize").addClass("hidden_sb");
				$("#people_search_noresults_term").html(item.term);
	return false;
			}
			else if(item.yk=="-1"){
			return false;	
			}
			
			if(item.type=="other_people"){
			var l=$("#people_search_results").find(".other_people").length;	
			if(l==0){
			$("#people_search_results").find("ul").eq(0).append(\'<li style="background:#f7f7f7;color:#333333;font-weight:bold;padding-left:20px;padding-top:4px;padding-bottom:2px;width:100%;">Other people</li>\');	
			}
			}
				
			var loaded=$("#people_search_loaded").val();
			if(strpos(loaded,item.uidv)===false){
			localArray[people_search_loaded_ax]=item;
			people_search_loaded_ax++;
			loaded=loaded+","+item.uidv;
			$("#people_search_loaded").val(loaded);
			}
		
					if(dstyle=="with_pic"){
			var dstyle_img=\'<img src="\'+item.imgurl+\'" style="max-width:32px;max-height:32px;float:left;">\';
			var dstyle_mt="-1";
			}
			else{
			var dstyle_img="";
			var dstyle_mt="";
			}
			
					if(item.location!=undefined){
			var add_line=\'<br><div class="fsm fwn fcg" style="float:left;position:relative;margin-left:5px;">\'+item.location+\'</div>\';
			}
			else{
			var add_line="";
			}
			
			item.sharedid="aca"+retcount();
			
				return $( "<li></li>" ).data("ui-autocomplete-item",item).append(\'<a style="padding:0!important;margin:0!important;outline:0!important;border:0!important;" id="ac_\'+item.sharedid+\'">\'+item.response+\'</a>\' )
				.appendTo( ul );
				
			//return $(\'<li></li>\').data("ui-autocomplete-item",item).append(item.response).appendTo(ul);
}
else{
			if(dstyle=="with_pic"){
			var dstyle_img=\'<img src="\'+item.imgurl+\'" style="max-width:32px;max-height:32px;float:left;">\';
			var dstyle_mt="-1";
			}
			else{
			var dstyle_img="";
			var dstyle_mt="";
			}

			item.sharedid="aca"+retcount();

			if(item.location!=undefined){
			var add_line=\'<br><div class="fsm fwn fcg" style="float:left;position:relative;margin-left:5px;">\'+item.location+\'</div>\';
			}
			else{
			var add_line="";
			}
			return $( "<li style=\\"width:"+liwidth+"px!important;margin-top:"+dstyle_mt+"px;margin-bottom:1px;\\" class=\\"autocompletedark\\"></li>" )
				.data( "ui-autocomplete-item", item )
				.append( \'<a class="clearfix put adl" id="ac_\'+item.sharedid+\'">\'+dstyle_img+\'<div class="clearfix"><div style="float:left;position:relative;margin-left:5px;font-weight:normal!important;">\'+item.value+\'</div>\'+add_line+\'</div></a>\' )
				.appendTo( ul );
}

		};

$("#tag_l"+suf).click();

if($(this).data("ac_starts")!==undefined){
if($(this).data("uidv")!==undefined){
var uidv=$(this).data("uidv");
}
else{
var uidv=undefined;
}
if($(this).data("fullname")!==undefined){
var fullname=$(this).data("fullname");
}
else{
var fullname=undefined;
}
window[$(this).data("ac_starts")](suf,ac_url,ac_justone,custom_func,final_custom_func,uidv,fullname);
}

$(".ui-autocomplete-input").off("blur").on("blur", function() {
		$.doTimeout(0,function(){
				if(hasFocus()) {
						$("ul.ui-autocomplete").hide();
				}
		});
		});

});


$(document).ready(function(){
$("[data-ac_enable][data-ac_enable!=on]").click();
});

$(document).on("focus",".ui-autocomplete-input",function(){
if($.trim($(this).val())!=""){
$(this).autocomplete("search",$(this).val());
}
});
';
?>