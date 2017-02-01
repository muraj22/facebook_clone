<?php
if (!function_exists('td2')) {
function td2($topv){
$topv=tod($topv);

$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%m'); $suf="month";
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf='day';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf='hour';}
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf='minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf='second';}
if($td=='+0' || $td=='-0'){$td='1';}


$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}
if($suf=='month' || $suf=='day' || $suf=='hour' || $suf=='minute' && $td>10){$td='past';}
	return $td;
}

}
echo'
<div id="chat_wrap" style="z-index:300;position:fixed;">
<script type="text/javascript">
$(document).ready(function(){
var isoffline = false;

var dconn=false;
function check_connectivity(){
if(dconn){dconn.abort();}    
dconn=$.ajax({
  			url: "/checkconnectivity.php",
  			async: "false",
  			data: {}
  		})
  		.fail(function() { 
        if(!isoffline){
        isoffline = true;
        $(".chat_receiver").css("opacity",".3");
        $("#chat").find(".regularwrapper").after($(".regularwrapperv"));
        $("#chat").find(".regularwrapper").addClass("hidden_sb");
        $("#chat").find(".regularwrapperv").removeClass("hidden_sbs");
        $("#chat").find(".regularwrapperv").removeClass("hidden_sb");
        $(".chat_receiver").after($(".sbChatSidebarMessage"));
        $(".sbChatSidebarMessage").removeClass("hidden_sbs");
        $(".sbChatSidebarMessage").removeClass("hidden_sb");
        var dheight=$("#mcci").css("height");
        var dheightv=$(".sbChatSidebarMessage").innerHeight();
        dheight=parseInt(dheight);
        dheightv=parseInt(dheightv);
        dheight=dheight+dheightv;
        $("#mcci").css("height",dheight);
        }

        $.doTimeout(500,function(){
        check_connectivity();
        });

          })
  		.done(function() { 
          
        if(isoffline){
        var dheight=$("#mcci").css("height");
        var dheightv=$(".sbChatSidebarMessage").innerHeight();
        dheight=parseInt(dheight);
        dheightv=parseInt(dheightv);
        dheight=dheight-dheightv;
        $(".sbChatSidebarMessage").addClass("hidden_sb");
        $("#mcci").css("height",dheight);
        $("#chat").find(".regularwrapperv").addClass("hidden_sb");
        $("#chat").find(".regularwrapper").removeClass("hidden_sb");
     
        $(".chat_receiver").css("opacity","1");
        isoffline=false;
        }
                   
        $.doTimeout(500,function(){
        check_connectivity();
        });

          
        });
          
        }

        check_connectivity();
        
        });
  
var t2;
var t3;
var t4;
var t6;
var t7;

function keepalive2(){
	chatref4(); //referencia a chatref6
}

function checkonlinef(){
	rcheckonlinef();
}

function bogus(){
	setTimeout("chatref()",0);
	return false;
}
function submitonEnterv(evt,w,v,yk,id){
var charCode = (evt.which) ? evt.which : event.keyCode
var ptocheck=\'chatmsg\'+v;
var tocheck=$("#"+ptocheck).val();
tocheck=$.trim(tocheck);
if((charCode == "13") && (tocheck=="")){return false;}
else if(charCode == "13"){
$("#which").val(w); //lo manda a cache
$("#whyk").val(yk);
$("#elid").val(id);

return bogus();
}

} 


</script>


<input autocomplete="off" type="hidden" id="onlinef">


<script type="text/javascript">
$("#onlinef").val("");
function chatref(){ //este es cuando se envia con enter
var chatmsg=$("#which").val();
var yk=$("#whyk").val();
$("#chatmsg"+yk).val(""); //limpia el valor, se esta esperando a un retorno por enter asi que no hay drama

var id=$("#elid").val();

$("#yk").val(yk);
$("#id").val(id);

var hour_min=hour_min_function();

var lsender=$("#chat"+yk).find(".lsender:last").attr("data-uidv");

if(lsender!==undefined && lsender=="'.$uid.'"){
var dquery=".msge"+lsender+":last";
var dqueryv=".msgev"+lsender+":last";
$(dquery).append("<br>"+chatmsg);
$(dqueryv).html(hour_min);
}
else{';
$x=$uid;

echo'
var dmsg=\'<tr><td><table onmouseover="lastChild.lastChild.lastChild.lastChild.lastChild.style.opacity=\\\'1\\\';" onmouseout="lastChild.lastChild.lastChild.lastChild.lastChild.style.opacity=\\\'0\\\';"><tr><td style="width:32px;border-top:1px solid rgb(238,238,238);padding-top:6px;padding-bottom:6px;"><a class="lsender" data-uidv="'.$uid.'" href="/'.$uid_a["username"].'" style="display:block;text-decoration:none!important;" data-t_text="You" data-t_position="left"><img src="/'.$uid.'/pics/'.$uid_a['profilepict'].'" style="max-width:32px;max-height:32px;"></a></td><td style="text-align:left;border-top:1px solid rgb(238,238,238);width:195px;"><div style="position:relative;bottom:-5px;left:5px;" class="wrapffc msge'.$x.'">\'+chatmsg+\'</div><div style="position:relative;"><span style="position:absolute;right:0;top:-23px;font-size:9px;opacity:0;color:#666666;" class="msgev'.$x.'">\'+hour_min+\'</span></div></td></tr></table></td></tr>\';
$("#chat"+yk).append(dmsg);
}

document.getElementById("chatjvv"+yk).scrollTop = document.getElementById("chatjvv"+yk).scrollHeight;

$.ajax({
  async: "false",
  type: "POST",
  url: "/chatmsg2.php",
  data: {duser:id,appendmsg:yk,what:"chatmsg",chatmsg:chatmsg}}).done(function(response){});

}

var cargando_conversaciones=new Array();

function rcheckonlinef()
{
	
	  clearTimeout(t7);
$.ajax({
  type: "POST",
  url: "/checkonlinefv.php",
  data: {  },
  success: function(response) {
var pres=response.split("<>");
var res=pres[0].split("#:#:");
resl=res.length-1;
var onlinef="";

var x=0;
while(x<=resl){
	if(res[x]!=""){
var vara=\'[rel=\'+res[x]+\']\';
	$(vara).removeClass("offline");
	$(vara).addClass("online");
	
	$("#"+res[x]).removeClass("wrappernombrev");
	$("#"+res[x]).addClass("wrappernombre");
	
	$(".presenceListener_"+res[x]).addClass("presenceActive");
	
	$(".onlineball[data-uidv="+res[x]+"]").removeClass("hidden_sb");

onlinef+=","+res[x];

	}
	x++;
}

$("#onlinef").val(onlinef);

if(pres[1]!==undefined){
var res=pres[1].split("#:#:");
resl=res.length-1;

var x=0;
while(x<=resl){
if(res[x]!=""){
var vara=\'[rel=\'+res[x]+\']\';
	$(vara).removeClass("online");
	$(vara).addClass("offline");
	
	$("#"+res[x]).removeClass("wrappernombre");
	$("#"+res[x]).addClass("wrappernombrev");
	
	$(".presenceListener_"+res[x]).removeClass("presenceActive");
	
	$(".onlineball[data-uidv="+res[x]+"]").addClass("hidden_sb");
}
x++;	
}

}

  }
});

t7=setTimeout("checkonlinef()",2000);
}

function chatclass(yk){
var toremove="#closechat"+yk;
$(toremove).removeClass("closechat");
$(toremove).addClass("closechat2");	
}

function chatclass2(yk){
	var toremove="#closechat"+yk;
	$(toremove).removeClass("closechat2");
$(toremove).addClass("closechat");	
}

$(document).on("click",".fullnamevvv",function(){
var yk=$(this).attr("data-yk");
var uidv=$(this).attr("data-uidv");

displaywindow(yk,uidv);
});

$(document).on("mouseover",".closechat",function(){
var yk=$(this).attr("data-yk");
chatclass(yk);
});

$(document).on("mouseout",".closechat",function(){
var yk=$(this).attr("data-yk");
chatclass2(yk);
});

$(document).on("click",".closechat,.closechat2",function(){
var yk=$(this).attr("data-yk");
hidewindow(yk);
hidebar(yk);
});

$(document).on("click",".chatheaderd",function(){
var yk=$(this).attr("data-yk");
hidewindow(yk);
displaybar(yk);
});

$(document).on("click",".hideit",function(){
var yk=$(this).attr("data-yk");
hidebar(yk);
hidewindow(yk);
});

$(document).on("keydown",".chattextarea",function(e){
var yk=$(this).attr("data-yk");
var uidv=$(this).attr("data-uidv");
return submitonEnterv(e,$(this).val(),yk,yk,uidv);
});

$(document).on("focus",".chattextarea",function(e){
var yk=$(this).attr("data-yk");
$("#activechatwindow").val(yk);
$(".copacity").css("opacity","0.9");
$("#chatjv"+yk).css("opacity","1");
$("#copacity"+yk).css("opacity","1");
});

$(document).on("click",".chat_bar",function(){
var yk=$(this).attr("data-yk");
var uidv=$(this).attr("data-uidv");
displaywindow(yk,uidv);
});

$(document).on("click",".closefriendbar",function(e){
var yk=$(this).attr("data-yk");
hidebar(yk);
hidewindow(yk); 	
e.stopPropagation();
});

$(document).on("click",".fullnamevvv",function(){
var yk=$(this).attr("data-yk");
var uidv=$(this).attr("data-uidv");
displaywindow(yk,uidv);	
});

function populate_window(e,yk,b){

if(yk!==undefined){
var delem=$("#macc"+yk);
}
else{
var delem=$(this);
}

if($(delem).length==0){'; //comes from loaded components

echo'
$.ajax({
  async: "false",
  type: "POST",
  url: "/user_info.php",
  data: { uidv:yk }}).done(function(response){
var res=$.parseJSON(response);

if($("#mcc").find("[data-yk="+yk+"]").length==0){
var dclone=res.user_info;
$(".chat_receiver").append(dclone);
populate_window("a",yk,b); //b goes for bar it goes again
ponerdis();
}

});		

';
	
echo'
return false;
}

$(delem).each(function(){ //to be able to read from this
var res=$.parseJSON($(this).attr("djson"));

var uidv=res.uidv;
var yk=res.yk;
var fullname=res.fullname;
var profilepict=res.profilepict;
var onlinev=$(this).attr("data-onlinev");
var username=res.username;
var f_name=res.f_name;

var l=$("#chat_receiverb").find("[data-uidv="+uidv+"]").length;
if(l==0){
var dclonec=$("#chat_clonec").clone();

$(dclonec).find("[data-yk]").attr("data-yk",yk);

$(dclonec).find("[data-uidv]").attr("data-uidv",uidv);

$(dclonec).find("#chatj").attr("id","chatj"+yk);
$(dclonec).find("[data-who]").attr("data-who",uidv);
$(dclonec).find("#copacity").attr("id","copacity"+yk);
	
$(dclonec).find("#closechat").attr("id","closechat"+yk);
$(dclonec).find("#tochange").attr("id",uidv);
$(dclonec).find("#"+uidv).addClass(onlinev);

$(dclonec).find("#chat_username").attr("href","/"+username);
$(dclonec).find("#chat_username").html(fullname);
$(dclonec).find("#istypying").attr("id","istypying"+yk);
$(dclonec).find("#istypying"+yk).html(f_name+" is typying..");
$(dclonec).find("#hideit").attr("id","hideit"+yk);
$(dclonec).find("#chatjvv").attr("id","chatjvv"+yk);
$(dclonec).find("#chat_table").attr("id","chat"+yk);

$(dclonec).find("#chatjv").attr("id","chatjv"+yk);
$(dclonec).find("#chatit").attr("id","chatit"+yk);
$(dclonec).find("#chatmsg").attr("id","chatmsg"+yk);
$(dclonec).find("#chatmsg"+yk).attr("name","chatmsg"+yk);

$(dclonec).find("#emote").attr("id","emote"+yk);
$(dclonec).find("#emotesw").attr("id","emotesw"+yk);

$(dclonec).find("#msgsid").attr("id","msgsid"+yk);
$(dclonec).find("#msgsid"+yk).attr("name","msgsid"+yk);
window["ti"+yk];

$(".chat_receiverc").prepend($(dclonec));
$(dclonec).attr("id","");
$(dclonec).removeClass("hidden_sb");
';

echo'
var dcloned=$("#chat_cloned").clone();

$(dcloned).find("#loaded_clone").attr("id","loaded"+yk);
$(dcloned).find("#loaded"+yk).attr("name","loaded"+yk);
$(dcloned).find("#loaded"+yk).val("f");

$(dcloned).find("#id_clone").attr("id","id"+yk);
$(dcloned).find("#id"+yk).attr("name","id"+yk);
$(dcloned).find("#id"+yk).val(uidv);

$(dcloned).find("#yk_clone").attr("id","yk"+yk);
$(dcloned).find("#yk"+yk).attr("name","yk"+yk);
$(dcloned).find("#yk"+yk).val(yk);

$(dcloned).find("#chatjvvv").attr("id","chatjvvv"+yk);
$(dcloned).find("[data-who]").attr("data-who",uidv);
$(dcloned).find("[data-uidv]").attr("data-uidv",uidv);
$(dcloned).find("[data-yk]").attr("data-yk",yk);

$(dcloned).find(".chat_fullname").html(fullname);

$(dcloned).find("#closecb").attr("id","closecb"+yk);

$(".chat_receiverd").append($(dcloned));

$(dcloned).attr("id","");

$(dcloned).find(".chatb").unwrap();
';

echo'
var dcloneb=$("#chat_cloneb").clone();

$(dcloneb).find("[data-yk]").attr("data-yk",yk);
$(dcloneb).find("[data-uidv]").attr("data-uidv",uidv);
$(dcloneb).find("#fullnamevvv").attr("id","fullnamevvv"+yk);
$(dcloneb).find("#fullnamevvv"+yk).attr("data-uidv",uidv);
$(dcloneb).find("#fullnamevv").attr("id","fullnamevv"+yk);

$(dcloneb).find("img").attr("src","/users/"+uidv+"/pics/"+profilepict);

$(dcloneb).find("#fullnamevv"+yk).html(fullname);

$("#chat_receiverb_child").append($(dcloneb));

$(dcloneb).attr("id","");
$(dcloneb).find("div").eq(0).unwrap();
';

echo'
$(dcloneb).find("[data-yk]").attr("data-yk",yk);
$(dcloneb).find("#fullnamevvv").attr("id","fullnamevvv"+yk);
$(dcloneb).find("#fullnamevvv"+yk).attr("data-uidv",uidv);
$(dcloneb).find("#fullnamevv").attr("id","fullnamevv"+yk);

$(dcloneb).find("img").attr("src","/users/"+uidv+"/pics/"+profilepict);

$(dcloneb).find("fullnamevv"+yk).html(fullname);

$("#chat_receiverb").append($(dcloneb));

$(dcloneb).attr("id","");
$(dcloneb).removeClass("hidden_sb");';

echo'
}

});

if(b=="bar"){
displaybar(yk,\'a\',\'a\');	
}

return true; //necessary cause load message when not info is available goes through process, when info is available it does not
}

$(document).on("mouseover",".macc",populate_window);
$(document).on("click",".macc",populate_window);
</script>';


function td4($topv){
$topv=tod($topv);

$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%m'); $suf="month";
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf='day';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf='hour';}
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf='minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf='second';}
if($td=='+0' || $td=='-0'){$td='1';}


$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}
if($suf=='month' || $suf=='day' && $td>7){$suf='past';}
	return $suf;
}


function turndate3_chat($date){$date=tod($date);
  return date('g:ia', strtotime($date));
}

$sortalpha=array();
$osortalpha=array();
$ofsortalpha=array();
$ykv=0;
$yk=0;
$onlinecount=0;
$ronlinecount=0;
$hpos=25;
$hpos2=10;
$ids='';

include("components/emotes.php");

$clone='
<div class="macc_clone" id="macc" data-uidv="" data-yk="">
<img src="" class="picis">
<div class="namemc" id="namemc" data-fname="" data-who=""></div>

<div class="" id="bubble" data-chatopenr="" data-yk="" data-uidv="" rel=""><div class="onlinebubbles"></div></div>

</div>';

$cloneb='<div id="fullnamevvv" style="width:100%;padding:0;margin:0;cursor:pointer;display:none;" class="fullnamevvv" data-uidv="" data-yk=""><div style="position:relative;width:178px;padding:0;margin:0;"><div class="clearfix"><img style="height:28px;width:28px;display:inline-block;float:left;"><span style="position:relative;top:9px;left:8px;display:inline-block;" id="fullnamevv"></span><div class="onlineball" data-uidv="" style="top:14px;display:inline-block;"></div></div></div></div>';

$clonec='<div id="chatj" style="margin:0;padding:0;display:none;position:relative;bottom:36px;margin-right:2px;" class="chatw" data-who=""><div style="margin:0;padding:0;display:inline-block;height:310px;position:absolute;width:263px;z-index:10;opacity:1;background:white;left:1px;"></div><div style="display:inline-block;position:relative;left:-1px;background:#ffffff;height:280px;width:262px;padding:0;margin:0;margin-right:0px;border:1px solid #ececec;z-index:11;" class="copacity" id="copacity"><div style="position:relative;"><div class="closechat" style="position:absolute;right:2px;top:0px;z-index:5;" id="closechat" data-t_text="Press ESC to close" data-t_align="center" data-yk=""></div></div><div class="chatheader chatheaderd" style="height:25px;width:260px;position:absolute;left:0;text-align:left;" onmouseover="this.style.backgroundColor=\'#627BAE\';" onmouseout="this.style.backgroundColor=\'#6d84b4\';" data-yk=""><div class="" id="tochange"><span style="font-weight:bold;color:#ffffff;line-height:18px;position:relative;left:-1px;top:0px;" class="chathl"><a id="chat_username" class="stopprop" href=""></a></span></div><div style="position:relative;padding:0;margin:0;"><div id="istypying" style="display:none;position:absolute;bottom:-255px;left:18px;z-index:7;cursor:default;background-color:#ffffff;" class="istypying"> is typying..</div></div></div><div id="hideit" data-yk="" style="visibility:hidden;"></div><div style="width:260px;height:255px;border:1px solid rgb(178,178,178);border-top:0;border-bottom:0;overflow-y:auto;position:absolute;left:0;top:26px;max-height:255px;overflow-x:hidden;" id="chatjvv"><table id="chat_table">

</table></div></div><div style="position:absolute;display:block;height:26px;left:-1px;top:282px;width:262px;padding:0;margin:0;border:0;border-right:1px solid #ececec;border-left:1px solid #ececec;z-index:11;background:rgb(255, 255, 255);" id="chatjv" class="copacity"><div style="position:absolute;bottom:0px;border:1px solid rgb(178,178,178);border-top-color:rgb(201,208,218);padding-top:2px;width:260px;left:0px;background:#ffffff;padding-bottom:0;" id="chatit"><div class="chaticonv"></div><div style="padding-right:46px;width:214px;max-height:85px;"><textarea autocomplete="off" class="chattextarea" data-au_grow="" data-yk="" data-uidv="" data-au_maxheight="85px" data-au_noprefix="s" data-au_scrollparent="t" data-au_custom_f="$(this).nextAll(\'.emote\').addClass(\'emote_m\'); $(this).parents(\'.chatw\').eq(0).find(\'.emotesw\').addClass(\'emotesw_m\')" data-au_custom_fv="$(this).nextAll(\'.emote\').removeClass(\'emote_m\'); $(this).parents(\'.chatw\').eq(0).find(\'.emotesw\').removeClass(\'emotesw_m\');" style="position:relative;border:0;font-size:11px;height:14px;padding-top:3px;padding-bottom:3px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;overflow-y:hidden;padding-right:0px;width:214px;max-height:85px;" name="chatmsg" id="chatmsg"></textarea><div class="emote" id="emote" style=""></div></div><div class="emotesw" style="display:none;" id="emotesw" data-yk=""><table class="emoteswv"><tr><td>'.$emotes.'</td></tr></table></div><input autocomplete="off" type="hidden" name="msgsid" id="msgsid" value=""></div></div></div>';

$cloned='
<input autocomplete="off" type="hidden" name="id_clone" id="id_clone" value="">
<input autocomplete="off" type="hidden" name="yk_clone" id="yk_clone" value="">
<input autocomplete="off" type="hidden" name="loaded_clone" id="loaded_clone" value="">
<div id="chatjvvv" class="chat_bar chatb" data-who="" data-yk="" data-uidv="" style="display:none;padding:0;margin:0;position:relative;bottom:19px;margin-bottom:0px;margin-right:4px;">
<div onmouseover="this.style.backgroundColor=\'#f5f7fa\'" onmouseout="this.style.backgroundColor=\'#ebeef4\'" style="width:150px;text-align:left;padding-left:8px;display:inline-block;" class="chatv"><span style="position:relative;top:-5px;" class="chat_fullname"></span></div><div style="position:relative;display:none;" id="closecb"><div class="closefriendbar" style="position:absolute;top:-14px;right:4px;" data-yk=""></div></div></div>';

echo'
<div id="chat_clone" class="hidden_sb">
'.$clone.'
</div>
';

echo'
<div id="chat_cloneb" class="hidden_sb">
'.$cloneb.'
</div>
';

echo'
<div id="chat_clonec" class="hidden_sb">
'.$clonec.'
</div>
';

echo'
<div id="chat_cloned" class="hidden_sb">
'.$cloned.'
</div>
';

if($browser=="mozilla"){$one='0'; $two='top:10px;';}
else{$one='29'; $two='top:10px;';}

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

$onlinecountv=0;

$uidvcr=$uid.'cr';

$dfriend=$m['id2'];
$r2=mysql_query("SELECT * FROM registered WHERE FIND_IN_SET(id,'$uid_friends_comma')>0 ORDER by STATUS ASC");
while($m2=mysql_fetch_array($r2)){

$eusername=$m2['username'];
if($eusername==""){$eusername=$m2['id'];}
$dfname=$m2['f_name'];

	$unvv=$m2['id'];
$datetimepn=$m2['datetimepn'];
$datetimepn=td2($datetimepn);
if($datetimepn=="past"){
mysql_query("UPDATE registered SET status='2' WHERE id='$unvv'");
$m2['status']=2;
//the user is offline - we haven't received a response from him for a period longer than 5 minutes which is the auto post via ajax to specify the user is currently online
}

if($datetimepn!='blank_text'){ //is ok

if($m2['status']=="1"){
$onlineclass="online";
$onlineclassv="wrappernombre";
}
else{
$onlineclass="offline";
$onlineclassv="wrappernombrev";
}

$macc[$yk]='
<div hc="l_c" data-hhref="/'.$m2['username'].'" class="macc macc'.$m2['id'].'" id="macc'.$m2['id'].'" data-uidv="'.$m2['id'].'" data-onlinev="'.$onlineclassv.'" data-yk="'.$m2['id'].'" djson=\'{"uidv":"'.$m2['id'].'","yk":"'.$m2['id'].'","fullname":"'.$m2['fullname'].'","profilepict":"'.$m2['profilepict'].'","username":"'.$m2['username'].'","f_name":"'.$m2['f_name'].'"}\'>
<img src="/'.$m2['id'].'/pics/'.$m2['profilepict'].'" class="picis">
<div class="namemc namemc'.$m2['id'].'" id="namemc'.$m2['id'].'" data-fname="'.$m2['f_name'].'" data-who="'.$m2['id'].'">'.$m2['fullname'].'</div>';

$macc[$yk].='<div class="'.$onlineclass.' bubble'.$m2['id'].'" id="bubble'.$m2['id'].'" data-chatopenr="" data-yk="'.$m2['id'].'" data-uidv="'.$m2['id'].'" rel="'.$m2['id'].'"><div class="onlinebubbles"></div></div>';

$macc[$yk].='</div>';


$ofsortalpha[$yk]=$m2['fullname'];	
$sortalpha[$yk]=$m2['fullname'];
$yk++;
$hpos=$hpos+0;
$hpos2=$hpos2+0;


$onlinecount++;


}

}





$drchatvvv='';

asort($sortalpha);
foreach($sortalpha as $key=> $value){

}

$regheight='5';
$regheight=32*$onlinecount+$regheight;
if($regheight>600){$regheight=600;}
echo'';

echo'';
	
echo'';


$ronlinecount=$onlinecount-1;

$ponlinecount=$onlinecount-1;
$ids='';

$maccv='';
if($yk>=38){
$alphabet=array();

$alphabet[0]='A';
$alphabet[1]='B';
$alphabet[2]='C';
$alphabet[3]='D';
$alphabet[4]='E';
$alphabet[5]='F';
$alphabet[6]='G';
$alphabet[7]='H';
$alphabet[8]='I';
$alphabet[9]='J';
$alphabet[10]='K';
$alphabet[11]='L';
$alphabet[12]='M';
$alphabet[13]='N';
$alphabet[14]='O';
$alphabet[15]='P';
$alphabet[16]='Q';
$alphabet[17]='R';
$alphabet[18]='S';
$alphabet[19]='T';
$alphabet[20]='U';
$alphabet[21]='V';
$alphabet[22]='W';
$alphabet[23]='X';
$alphabet[24]='Y';
$alphabet[25]='Z';

asort($osortalpha);
asort($ofsortalpha);

$x=0;

$l=0;

$nsortalpha=array();
$nmacc=array();
$nmacck=array();
$b=0;


	
$lv=0;
while($x!=38){
$letter=$alphabet[$l];
foreach($osortalpha as $key=> $value){
if(strpos($value,$letter)===0){ 
$nsortalpha[$b]=$value;
$nmacck[$b]=$key;
$b++;
$osortalpha[$key]='';
$l++;
$x++;
if($l==26){$l=0;}}
}
$l++;
if($l==26){$l=0; $lv++;}

if($lv==20){$x=38;}

}

if($b!=38){
while($b<=38){

$letter=$alphabet[$l];
foreach($ofsortalpha as $key=> $value){
if(strpos($value,$letter)===0){ 
$nsortalpha[$b]=$value;
$nmacck[$b]=$key;
$b++;
$ofsortalpha[$key]='';
$l++;
if($l==26){$l=0;}}
}
$l++;
if($l==26){$l=0;}


	
}
}


asort($nsortalpha);



$omacc=array();
$omacck=array();
foreach($nsortalpha as $key=> $value){
$maccv.=$macc[$nmacck[$key]];
$ids.=$nmacck[$key].',';
}
$sortalpha=array();
$o=0;
foreach($osortalpha as $key=> $value){
if($value!=""){
$sortalpha[$o]=$value;	
$omacck[$o]=$key;
$o++;
}
	
}

foreach($ofsortalpha as $key=> $value){
if($value!=""){
$sortalpha[$o]=$value;	
$omacck[$o]=$key;
$o++;
}
	
}

asort($sortalpha);

foreach($sortalpha as $key=> $value){
$maccv.=$macc[$omacck[$key]];
$ids.=$omacck[$key].',';

}

}

else{
$ids='';
asort($sortalpha);

foreach($sortalpha as $key=> $value){

$maccv.=$macc[$key];
$ids.=$key.',';

}
	
}

echo'
<input autocomplete="off" type="hidden" id="ronlinecount">

<script type="text/javascript">
function modify_pos_bottom_chat(c){
if(c==0){';

if($browser=="msie"){
$bottom="-33px";	
$bottomb="34px;";
$bottomc="33px";	
$bottomd="-294px";
$bottome="-271px";
$bottomf="294px";
}
else{
$bottom="-11px;";	
$bottomb="13px;";	
$bottomc="11px";
$bottomd="-271px";
$bottome="-247px";
$bottomf="271px";
}

echo'
$("#mwindows").css("bottom","'.$bottom.'");
$("#mwindowsl").css("bottom","'.$bottomb.'");
$("#pchatencapsuler").css("bottom","'.$bottomc.'");	
}
else{
$("#mwindows").css("bottom","'.$bottomd.'");
$("#mwindowsl").css("bottom","'.$bottome.'");
$("#pchatencapsuler").css("bottom","'.$bottomf.'");		
}
	
}

$(document).on("mouseover",".macc",function(e){
	if(e.pageX!==undefined){
$(\'.macc\').css(\'background-color\',\'#f2f4f8\'); $(\'.lmacc\').css(\'background-color\',\'#ffffff\'); $(this).css(\'background-color\',\'rgb(224,228,238)\');
}
});


$(document).on("click",".macc",function(){
var yk=$(this).data("yk");
var uidv=$(this).data("uidv");
displaywindow(yk,uidv);
});

var last_chat_session=false;
function chatopenr(){
	var chunkv="";
	var chunk=$("#mwindowsl").find(".itemali");
	$(chunk).each(function(){
	var w=$(this).data("w");
	var s=$(this).attr("id");
	s=s.replace("nombre","");

	var p=$("#namemc"+s).data("who");
	chunkv+="#:#:"+w+":"+p;	
	});
	
	var chunk=$("#chatencapsuler").find(".chatw,.chatb");
	$(chunk).each(function(){

	if($(this).css("display")=="inline-block"){
	if($(this).hasClass("chatw")===true){
	chunkv+="#:#:chatw:"+$(this).data("who");
	}
	else if($(this).hasClass("chatb")===true){
	chunkv+="#:#:chatb:"+$(this).data("who");
	}
	}
	});


if(last_chat_session){last_chat_session.abort();}
	
last_chat_session=$.ajax({
  async: "false",
  type: "POST",
  url: "/users_opened.php",
  data: { chunkv:chunkv }}).done(function(response){
});		

}

$("#ronlinecount").val("'.$ronlinecount.'");
		if (/Opera[\/\s](\d+\.\d+)/.test(navigator.userAgent)){
			var oprversion=new Number(RegExp.$1);
			 if (oprversion>=7)
			{var bvdt = "opera";}
			}
			else if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
			var ieversion=new Number(RegExp.$1);
			 if (ieversion>=8)
			{var bvdt = "ie8";}
			 else if (ieversion>=7)
			{var bvdt = "ie7";}
			 else if (ieversion>=6)
			{var bvdt = "ie6";}
			}
			else if (/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent)){
			var ffversion=new Number(RegExp.$1);
			 if (ffversion>=3)
			  {var bvdt = "firefox";}
			else if (ffversion>=1)
			  {var bvdt = "ofirefox";}
			}
			else if (/Chrome[\/\s](\d+\.\d+)/.test(navigator.userAgent)){
			var chromeversion=new Number(RegExp.$1);
			 if (chromeversion>=1)
			  {var bvdt = "chrome";}
			}
			else if (/Safari[\/\s](\d+\.\d+)/.test(navigator.userAgent)){
			var safariversion=new Number(RegExp.$1);
			 if (safariversion>=1)
			  {var bvdt = "safari";}
			}
		
var audio_success=\'<div class="hidden_sb"><audio autoplay="autoplay" height="100" width="100"><source src="/chat/new_message.mp3" type="audio/mpeg"><source src="/chat/new_message.wav" type="audio/wav"><source src="/chat/new_message.ogg" type="audio/ogg"><embed height="50" width="100" autostart="true" hidden="true" src="/chat/new_message.mp3"></audio></div>\';

	function displaywindow(w,id,f,fv){
		
		var retfalse="f";
		if(f=="fv"){
var vara=\'[rel=\'+w+\']\'
var varav=$(vara).attr("id");
varav=varav.replace("bubble","");

displaywindow(varav,w);

			var retfalse="t";
		return false;
		}
		if(retfalse=="t"){
		////alert("error");
		return false;
		}

	if(f){

if(f=="a" && fv===undefined){
var id="";
var c=$(".namemc").filter(function() {
return($(this).attr("data-who")==w);
});

$(c).each(function(){
w=$(this).parents(".macc").eq(0).attr("data-yk");
id=$(this).attr("data-who");	
}); //con esto ya tengo un yk, lo saco de sidebar, mas popular al bicho si c length da 0

}

	var id=$("#bubble"+w).attr("rel");
	}
	if(id){
	chatref6(w,id);
	}
	else{
	var id=$("#bubble"+w).attr("rel");
	}
	
	var ca=$("#chatj"+w).css("display");
	if(ca=="inline-block"){
	$("#chatmsg"+w).focus();
	return false;
	}

var c=$("div#chatencapsuler .chatw").filter(function() {
return ( $(this).css("display") == "inline-block" );
});			
c=c.length;	
if(c==0){
c=1;
}
modify_pos_bottom_chat(c);

	var jr=$("#chatjvvv"+w).parent().attr("id");
	if(jr=="chatencapsuler"){
	$("#chatjvvv"+w).before($("#chatj"+w));	
	}
	else{
	$("#chatencapsuler").prepend($("#chatj"+w));
	}
	
var tabo=$("#chatjvvv"+w).css("display");
if(tabo=="none"){
$("#chatencapsuler").prepend($("#chatj"+w));	
}
$("#chatjvvv"+w).css("display","none");

			var total=$("#ronlinecount").val();
			var x=0;
			var y=0;			
				
			var e=$("#nombre"+w).length;
			if(e>0){		
			mwindows(\'a\');	
			$("#nombre"+w).remove();
			}
if(f!="a"){
	
var calculo=$("#calculo").val();
var b=$("#chatencapsuler").innerWidth()+420+267;

if(b>calculo){
var c=$("div#chatencapsuler .chatw, .chatb").filter(function() {
return($(this).css("display")=="inline-block");
});
var hm=0;

$(c).each(function(){hm++;});

calculo=parseInt(calculo);

var xv=0;
$(c).each(function(){

if($(this).hasClass("chatw")===true){
var dwidth=267;	
}
else{
var dwidth=169;	
}

var hw=$("#chatencapsuler").innerWidth()+270+dwidth;
if(hw<calculo){}
else{
				var s=$(this).attr("id");
				s=s.replace("chatjvvv","");
				s=s.replace("chatj","");
				
				if($(this).hasClass("chatb")===true){
				var w="chatb";
				$("#chatbars").prepend($("#chatjvvv"+s));	
				}
				else{
				var w="chatw";
				}
				var mwindowsl=$("#mwindowsl").html();
				var nombre=$("#namemc"+s).html();
				var este=\'<li class="itemali" id="nombre\'+s+\'" onclick="displaywindow(\'+s+\');" data-w="\'+w+\'">\'+nombre+\'</li>\';
				mwindowsl=mwindowsl+este;
				$("#mwindowsl").html(mwindowsl);
				
				$(this).css("display","none");
}
	
}); //finish c.each


}


}

var c=$("div#chatencapsuler .chatw").filter(function() {
return($(this).css("display")=="inline-block");
});			
c=c.length;	
if(c==0){c=1;}
modify_pos_bottom_chat(c);
		
$("#chatj"+w).css("display","inline-block");
$("#chatjv"+w).css("display","inline-block");

document.getElementById("chatjvv"+w).scrollTop = document.getElementById("chatjvv"+w).scrollHeight;
$("#chatmsg"+w).focus();

var tl=$("#mwindowsl").find(".itemali").length;	
if(tl>0){
$("#twindows").html(tl);
$("#mwindows").css("display","block");	
}
else{
$("#mwindows").css("display","none");
}

	if(f){}
	else{
chatopenr();
	}

	}
	

function hidewindow(w){

var id=$("#bubble"+w).attr("rel");
var total=$("#ronlinecount").val();
var x=0;
var y=0;
var totalspacing=10;
var totalspacing2=0;
var totalheightpos=58;
var totalheightpos2=23;
var b=0;

var c=$(".chatw").filter(function() {
return($(this).css("display")=="inline-block");
});		

$(c).each(function(){
b++;
var s=$(this).attr("data-who");
totalspacing=totalspacing+280;
totalheightpos=totalheightpos+280;
totalspacing2=totalspacing2+285;
totalheightpos2=totalheightpos2+280;
});

var y=0;

var c=$("div#chatencapsuler .chatw").filter(function() {
return($(this).css("display")=="inline-block");
});			
var c=c.length;	
if(c==1){
var c=0;
}
modify_pos_bottom_chat(c);
	
$("#chatj"+w).css("display","none");
$("#chatjv"+w).css("display","none");		

var calculo=$("#calculo").val();

var b=$("#chatencapsuler").innerWidth()+270;

if(b<calculo){
var c=$("#mwindowsl").find(".itemali");

$(c).reverse().each(function(){
if($(this).data("w")=="chatw"){
var ah=267;	
}
else{
var ah=169;	
}

var hw=$("#chatencapsuler").innerWidth()+270+ah;

if(hw>calculo){}
else{
var s=$(this).attr("id");
s=s.replace("nombre","");
		
if($(this).data("w")=="chatw"){
$(this).remove();
displaywindow(s);
}
else{				
$(this).remove();
displaybar(s);	
}

}

}); //finish c.reverse each
}
		
$("#chatj"+w).nextAll(".chatw:first").find("textarea").focus();

$("#chatj"+w).after($("#chatjvvv"+w));
$("#chatj"+w).prependTo("#chatencapsulern");
	
} //finish hidewindow function

function displaybar(w,f,fv){
	
if(f=="a" && fv===undefined){
var id="";
var c=$(".namemc").filter(function() {
return($(this).attr("data-who")==w);
});

$(c).each(function(){
w=$(this).parents(".macc").eq(0).attr("data-yk");
id=$(this).attr("data-who");	
}); //con esto ya tengo un yk, lo saco de sidebar, mas popular al bicho si c length da 0

}

var id=$("#namemc"+w).attr("data-who");
var isthisloaded=$("#msgsid"+w).length;
if(isthisloaded==0){
chatref6(w,id,"bar");
return false;
}
	
var calculo=$("#calculo").val();
var total=$("#ronlinecount").val();
var x=0;

var ex=$("#chatjvvv"+w);
var block=$("#chatjvvv"+w).css("display");

var calculo=$("#calculo").val();

var b=$("#chatencapsuler").innerWidth()+420+169;

if(b>calculo){
var c=$("div#chatencapsuler .chatw, .chatb").filter(function() {
return($(this).css("display")=="inline-block");
});
var hm=0;

$(c).each(function(){hm++;});

calculo=parseInt(calculo);

var xv=0;
$(c).each(function(){

if($(this).hasClass("chatw")===true){
var dwidth=267;	
}
else{
var dwidth=169;	
}

var hw=$("#chatencapsuler").innerWidth()+270+dwidth;
//150 de yapa no se para que todavia
if(hw>calculo){
var s=$(this).attr("id");
s=s.replace("chatjvvv","");
s=s.replace("chatj","");
			
if($(this).hasClass("chatb")===true){
var w="chatb";
$("#chatbars").prepend($("#chatjvvv"+s));	
}
else{
var w="chatw";
}
var mwindowsl=$("#mwindowsl").html();
var nombre=$("#namemc"+s).html();
var este=\'<li class="itemali" id="nombre\'+s+\'" onclick="displaywindow(\'+s+\');" data-w="\'+w+\'">\'+nombre+\'</li>\';
mwindowsl=mwindowsl+este;
$("#mwindowsl").html(mwindowsl);

$(this).css("display","none");
}
	
}); //finish c each

var c=$("div#chatencapsuler .chatw").filter(function() {
return ($(this).css("display")=="inline-block");
});				
c=c.length;
modify_pos_bottom_chat(c);
				
$("#chatjvvv"+w).css("display","inline-block");
} //finish if b>calculo
else{
if(ex){
if(block=="inline-block"){}
else{
$("#chatjvvv"+w).css("display","inline-block");
}
}

}
	
var tl=$("#mwindowsl").find(".itemali").length;	
if(tl>0){
$("#twindows").html(tl);
$("#mwindows").css("display","block");	
}
else{
$("#mwindows").css("display","none");
}

if(f=="a"){}
else{
chatopenr();
}

} //finish function displaybar

function hidebar(w){
var id=$("#bubble"+w).attr("rel");

var c=$("div#chatencapsuler .chatw").filter(function() {
return ( $(this).css("display") == "inline-block" );
});			
c=c.length;	
modify_pos_bottom_chat(c);

$("#chatjvvv"+w).css("display","none");
chatopenr();
} //finish function hidebar

function displayfriends(rel){
$("#chat").css("display","none");

if(rel=="chato2" || rel=="chato2v"){
$("#fonchatw").css("display","none");
ponerdis();
$("#mcc").css("display","block");

setc(\'o\');
if(rel!=="chato2v"){
$("#lookupinput").focus();
}

}
else{
$("#chatt2").css("display","block");
$("#friendschatheader").css("display","block");
$("#searchc").css("display","block");
$("#lookupinputvv").focus();
}
} //finish function displayfriends

function hidefriends(rel){
$("#chat").css("display","block");
$("#chatt2").css("display","none");
$("#friendschatheader").css("display","none");
$("#searchc").css("display","none");
} //finish hidefriends

$(document).on("focus","#lookupinput",function(e){
var dval=$(this).val();
if(dval=="Search"){
$("#lookupinput").val("");
$("#lookupinput").css("background-color","#ffffff");
}
});

function lblv(v){
v=$.trim(v);
if(v==""){
$("#lookupinput").val("Search");
$("#lookupinput").css("background-color","rgb(244,246,249)");
$("#mcc_child").find(".ui-autocomplete").removeClass("displayblockimportant");
ponerdis();
}
$(".macc").css("background-color","#f2f4f8");
}
</script>';

echo '<div id="chat_list_holder" class="hidden_sb">';
//echo $maccv;
echo '</div>';

echo'
<input autocomplete="off" type="hidden" id="ykvc">
<script type="text/javascript">
$("#ykvc").val("'.$ykv.'");';


if($browser=="chrome" OR $browser=="safari" OR $browser=="msie"){
$dwidth=112;	
}
else{
$dwidth=132;	
}

echo'
function friends_on_chat(){
var ula=\'<input autocomplete="off" type="text" id="lookupinputv" class="lookupinputv dcphmgc" style="width:'.$dwidth.'px;display:inline-block;margin-left:4px;margin-bottom:4px;" onfocus="hidefriends();" placeholder="Friends on Chat"><div class="togglebuttonv" id="togglebuttonv" onclick="displayfriends(\\\'chato2\\\');"><div class="togglebuttonv2"></div></div>\';
$("#fonchat").before(ula);

var avar=\'<div id="fsearchw" style="width:170px;padding:0;margin:0;margin-left:4px;display:none;"></div>\';

$("#fonchat").after(avar);

$("#chat_list_holder").html($("#mcc_childv").html());

$("#chat_list_holder").find("[hc=l_c]").removeAttr("hc");
$("#chat_list_holder").find(".macc").addClass("lmacc");

var fonchat=$("#fonchat").length;
if(fonchat>0){
$("#fsearchw").html($("#chat_list_holder").html());
}

var display=$(".mcc").css("display");
if(display=="none"){
$("#fonchatw").css("display","inline-block");
}

}

friends_on_chat();
var friends_on_chatv="t"; //to be used by left column file

$(document).click(function(e) {
$("#fsearchw").css("display","none");
$("#fonchat").css("display","block");
$("#lookupinputv").val("");

var active=document.activeElement;
$("#lookupinputv").blur();
$(active).focus();
});

$(document).on("click","#lookupinputv",function(e) {
e.stopPropagation();
});

function setc(w){

if(w!="o"){
w=0;
}
else{
w=1;
}

$.ajax({
  async: "false",
  type: "POST",
  url: "/sidebar_opened.php",
  data: { w:w }}
).done(function(response) {
if(response.length>0){

}
});	

}
</script>
<div class="mcc" id="mcc" style="display:none;vertical-align:bottom;">
<div style="margin:0;padding:0;vertical-align:bottom;position:absolute;bottom:26px;width:100%;overflow-y:auto;overflow-x:hidden;" id="mcci">
<div id="mcc_child"></div>
<div id="mcc_childv" class="chat_receiver">
'.$maccv.'
</div>'; //first one receives output from autocomplete

echo'
<div class="maccnf" id="maccnf">
<div class="namemcnf">Friend not found.</div>
</div>
</div>
<div style="margin:0;padding:0;height:28px;width:100%;position:absolute;bottom:-2px;border-top:1px solid rgb(201,208,218);">
<input autocomplete="off" type="text" class="lookupinput" id="lookupinput" value="Search" onblur="lblv(this.value);" style="width:176px;position:absolute;left:0;">
<div class="togglebutton" style="position:relative;left:175px;z-index:7;" onclick="$(\'#mcc\').css(\'display\',\'none\'); $(\'#fonchatw\').css(\'display\',\'inline-block\'); $(\'#chat\').css(\'display\',\'block\'); setc();"></div>
</div>
</div>


<script type="text/javascript">
$("#mcc").mouseenter(function(){
$(\'.macc\').css(\'background-color\',\'#f2f4f8\');
$(\'.lmacc\').css(\'background-color\',\'#ffffff\');
});

$("#mcc").mouseleave(function(){
$(\'.macc\').css(\'background-color\',\'#f2f4f8\');
$(\'.lmacc\').css(\'background-color\',\'#ffffff\');
});

$(document).on("mouseleave",".chat_bar",function(){
var yk=$(this).attr("data-yk");
$("#closecb"+yk).css("display","none");
});

$(document).on("mouseenter",".chat_bar",function(){
var yk=$(this).attr("data-yk");
$("#closecb"+yk).css("display","inline-block");
});

$(document).on("mouseleave","#fsearchw",function(){
$(".macc").css("background-color","#f2f4f8");
$(".lmacc").css("background-color","#ffffff");
});
</script>

<div class="sbChatSidebarMessage hidden_sbs clearfix"><img class="img" src="/images/-PAXP-deijE.gif" alt="" width="1" height="1"><div class="message fcg">Unable to connect to chat.</div></div>

<div class="regularwrapperv hidden_sbs"><div class="warnicon" style="display:inline-block;"></div>Chat (Disconnected)</div>
   
<div id="chat" style="position:fixed;right:15px;bottom:0px;width:188px;padding:0;margin:0;padding-top:6px;padding-right:5px;padding-left:5px;padding-bottom:6px;" class="chat" onmouseover="this.style.backgroundColor=\'#f5f7fa\'" onmouseout="this.style.backgroundColor=\'#ebeef4\'" rel="chato2" onclick="displayfriends($(this).attr(\'rel\'));"><div class="regularwrapper"><div class="chaticon" style="display:inline-block;"></div>Chat'; if($onlinecountv>0){echo' ('.$onlinecountv.')'; }echo'</div></div>
';

$regheightc=$regheight+15;
if($browser=="mozilla"){
$one='175';
$two='15';
}
else{
$one='175';
$two='15';
}
echo'
<div class="chatheader" id="friendschatheader" style="width:'.$one.'px;z-index:2;position:fixed;right:'.$two.'px;bottom:'.$regheightc.'px;height:20px;padding:0;margin:0;font-size:11px;font-family:\'lucida grande\',tahoma,arial,verdana,sans-serif;font-weight:bold;color:#ffffff;padding-left:3px;padding-top:4px;display:none;" onmouseover="this.style.backgroundColor=\'#627BAE\';" onmouseout="this.style.backgroundColor=\'#6d84b4\';" onclick="hidefriends();">Chat</div>

<div id="chatt2" style="position:fixed;right:15px;bottom:0px;width:178px;z-index:2;background:#ffffff;height:'.$regheight.'px;padding:0;padding-bottom:15px;background-clip:padding-box;overflow-x:hidden;overflow-y:auto;-moz-border-colors:none;-moz-border-image:none;border:1px solid rgb(178,178,178);display:none;">

<div style="border-collapse:collapse;border:0;margin:0;padding:0;width:178px;position:relative;left:0px;top:0px;" id="chat_receiverb">
<div id="chat_receiverb_child"></div>
<div id="chat_receiverb_childv"></div>
</div>

</div>

<input autocomplete="off" type="hidden" id="ids" value="">
<input autocomplete="off" type="hidden" id="idsv" value="">

<script type="text/javascript" id="pupdeatable">';
$ids="";
echo'
$("#ids").val("'.$ids.'");
$("#idsv").val("");
';

echo'
function ponerdis(){
$("#mcc_child").find(".ui-autocomplete").addClass("hidden_sb");	
$("#mcc_childv").removeClass("hidden_sb");

var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],y=w.innerHeight||e.clientHeight||g.clientHeight;
var ponert=y-30;
$(".mcc").css("height",y+"px");

ponert=Math.floor(ponert/30)-1;

var tyk='.$ponlinecount.'+1;

if(ponert>tyk){
ponert=tyk;
}

$("#maccnf").css("display","none");
$(".macc").css("display","none");
$(".fullnamevvv").css("display","none");

var ids=$("#ids").val();

var idsv=ids.split(",");
var yv=Math.ceil(ponert*32.09);

$("#mcci").css("height",yv+"px");

var x=0;
while(x<ponert){
$("#mcc_childv").find(".macc").eq(x).css("display","block");
//$(".macc"+idsv[x]).css("display","block");
$("#chat_receiverb_child").find(".fullnamevvv").eq(x).css("display","block");
//$("#fullnamevvv"+idsv[x]).css("display","block");
x++;	
}

}
ponerdis();
$(document).ready(function(){
ponerdis();
});
</script>

<div style="position:fixed;right:15px;bottom:0px;width:178px;z-index:3;display:none;" id="searchc">
<input autocomplete="off" type="text" class="searchc" id="lookupinputvv">
</div>

<script type="text/javascript">
$("#lookupinput").val("Search");

function mwindows(a){
	
if(a=="a"){
$("#mwindowsl").css("display","none");
$("#mwindows").css("border-top-color","");
$("#mwindows").css("background-color","");	
$("#mwindowsl").css("display","none");	

return;
}

var dis=$("#mwindowsl").css("display");

if(dis=="none"){
$("#mwindowsl").css("display","block");
$("#mwindows").css("border-top-color","#ffffff");
$("#mwindows").css("background-color","#ffffff");	
$("#mwindowsl").css("display","block");	
}
else{
$("#mwindowsl").css("display","none");
$("#mwindows").css("border-top-color","");
$("#mwindows").css("background-color","");	
$("#mwindowsl").css("display","none");	
}

}
</script>

<div style="display:none;" id="chatencapsulern"></div>';

if($browser=="chrome" OR $browser=="safari" OR $browser=="msie"){
$bottom="294px";	
$bottomb="-294px";
}
else{
$bottom="271px";
$bottomb="-271px";
}

echo'
<div style="position:fixed;right:220px;bottom:'.$bottom.';z-index:-1;text-align:right;margin:0;padding:0;width:10000px;height:0;" id="pchatencapsuler">
<div style="display:inline-block;position:relative;margin-top:0;width:100%;right:0;height:0px;">
<div style="display:inline-block;position:relative;height:0px;" id="chatencapsuler" class="chat_receiverc">
<div class="mwindows" id="mwindows" style="position:absolute;bottom:'.$bottomb.';left:-50px;display:none;z-index:13;"><i class="mwindowsi" style="display:inline-block;"></i><span id="twindows" style="color:#333333;font-weight: bold;display:inline-block;position:relative;left:0px;bottom:0;float:right;">0</span></div>
<ul id="mwindowsl" style="z-index:12;display:none;float:left;position:absolute;left:-50px;bottom:-247px;background-color: rgb(255, 255, 255);padding: 3px 0px 4px;overflow-y: auto;" class="mwindowsl"></ul></div>
</div>
</div>

<div style="position:fixed;bottom:-16px;right:225px;display:inline-block;width:800px;height:auto;text-align:right;margin:0;padding:0;" class="chat_receiverd" id="chatbars"></div>

<input autocomplete="off" type="hidden" id="calculo">
<script type="text/javascript">
$(document).click(function(pl) {
mwindows("a");
});

$("#mwindows").click(function(e){
e.stopPropagation();
mwindows();
});

var sidebar_o=false;
function howw(){';
$r=mysql_query("SELECT * FROM sidebar WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$o=$m['opened'];	
}
if($o=="0"){
echo'
$("#fonchatw").css("display","inline-block");
sidebar_o=2;
';
}
else{
echo'
sidebar_o=1;
';	
}
echo '

}
howw();

function elimc(w){
			
}

function setfo(){

var total=$("#ronlinecount").val();

var c=$(".chatw").filter(function(){
return($(this).css("display")=="inline-block");
});

var w=false;
$(c).each(function(){
var w=$(this).attr("data-who");	
});
			
if(w){
$("#chatj"+w).css("display","inline-block");
$("#chatjv"+w).css("display","inline-block");

document.getElementById("chatjvv"+w).scrollTop = document.getElementById("chatjvv"+w).scrollHeight;
$("#chatmsg"+w).focus();	
}

}
</script>

<script type="text/javascript">
t7=setTimeout("checkonlinef()",2000);
</script>

<iframe style="visibility:hidden;position:absolute;left:-250px;" name="keepaliveonline" id="keepaliveonline"></iframe>
<iframe style="visibility:hidden;position:absolute;left:-250px;" name="keepaliveconversation" id="keepaliveconversation"></iframe>

<input autocomplete="off" type="hidden" name="keepaliveconv" id="keepaliveconv">
<input autocomplete="off" type="hidden" name="id" id="id">
<input autocomplete="off" type="hidden" name="yk" id="yk">

<script type="text/javascript">

function load_message(id,yk){ //este busca solo por quienes me hayan escrito comentarios

var rescheckc=$("#msgsid"+yk).val();

$.ajax({
type: "POST",
url: "/chatmsg2.php",
data:{duser:id,what:"keepalive",appendmsg:yk,msgsid:rescheckc}}).done(function(response){
if(response.length>0){
var res=$.parseJSON(response);

$("#msgsid"+yk).val($("#msgsid"+yk).val()+\'#:#:\'+res.sbid);

var achat=\'#chat\'+yk; 
displaywindow(yk);

var hour_min=res.date;

var lsender=$("#chat"+yk).find(".lsender:last").attr("data-uidv");
var chatmsg=res.message;

if(lsender!==undefined && lsender==res.uidv){
var dquery=".msge"+lsender+":last";
var dqueryv=".msgev"+lsender+":last";
$(dquery).append("<br>"+chatmsg);
$(dqueryv).html(hour_min);
}
else{
var dmsg=\'<tr><td><table onmouseover="lastChild.lastChild.lastChild.lastChild.lastChild.style.opacity=\\\'1\\\';" onmouseout="lastChild.lastChild.lastChild.lastChild.lastChild.style.opacity=\\\'0\\\';"><tr><td style="width:32px;border-top:1px solid rgb(238,238,238);padding-top:6px;padding-bottom:6px;"><a class="lsender" data-uidv="\'+res.uidv+\'" href="/\'+res.username+\'" style="display:block;text-decoration:none!important;" data-t_text="\'+res.fullname+\'" data-t_position="left"><img src="\'+res.uidv+\'/pics/\'+res.profilepict+\'" style="max-width:32px;max-height:32px;"></a></td><td style="text-align:left;border-top:1px solid rgb(238,238,238);width:195px;"><div style="position:relative;bottom:-5px;left:5px;" class="wrapffc msge\'+res.uidv+\'">\'+chatmsg+\'</div><div style="position:relative;"><span style="position:absolute;right:0;top:-23px;font-size:9px;opacity:0;color:#666666;" class="msgev\'+res.uidv+\'">\'+hour_min+\'</span></div></td></tr></table></td></tr>\';
$("#chat"+yk).append(dmsg);
}

document.getElementById("chatjvv"+yk).scrollTop = document.getElementById("chatjvv"+yk).scrollHeight;

var checkit=document.activeElement.id;
if(strpos(checkit,"chatmsg")!==false){
$("#chatmsg_audio").html("");
$("#chatmsg_audio").html(audio_success);
}

var w=$(".namemc"+yk).attr("data-fname");
var uidv=res.uidv;

if(!wfocus_auto){
msg_blink_f(w,uidv,"a");
}

}
//cargando_conversaciones[id]=null; //lo mata para dejar espacio posible
});

}

function chatref6(yk,id,b){ //b for bar
var isthisloaded=$("#msgsid"+yk).length;

var aver=true;
if(isthisloaded==0){
var aver=populate_window(null,yk,b);
} //finish if this is loaded

if(aver===false){return false;}
var rescheckc=$("#msgsid"+yk).val();

var conversation_loaded=$("#loaded"+yk).val();
if(conversation_loaded=="f"){
var ykv=$("#ykvc").val();
$.ajax({ //first load the conversation
type: "POST",
url: "/chatmsg2.php",	
data:{duser:id,what:"loadconversation",appendmsg:yk,msgsid:rescheckc,yk:yk,ykv:ykv}}).done(function(response){ //este es cuando la conversacion aun no ha cargado
if(response.length>0){
var res=$.parseJSON(response);
$("#chat"+yk).html(res.conversation);
var ykv2=res.ykv2;
ykv2=parseInt(ykv2);
var ykv=$("#ykvc").val();
ykv=parseInt(ykv);
ykv=ykv+ykv2;
$("#ykvc").val(ykv);
document.getElementById("chatjvv"+yk).scrollTop = document.getElementById("chatjvv"+yk).scrollHeight;
}
load_message(id,yk);
$("#loaded"+yk).val("t")
});
}
else{ //constant loops through online friends that were loaded to check for incoming messages
load_message(id,yk);	
}
	
} //finish function chatref6
	
function chatref4(){ //loop through online for new comments
clearTimeout(t3);

var c=$(".chatw");

$(c).each(function(){
var xv=$(this).attr("data-who");
var yk=$("#yk"+xv).val();
var id=$("#id"+xv).val();
var loaded=$("#loaded"+xv).val();
var onlinef=$("#onlinef").val();
if(strpos(onlinef,id)!==false && loaded=="t"){ //si esta dentro de los online y cargo ya, que se lo escuche
chatref6(yk,id);
}
});

t3=setTimeout("chatref4()",2000);
}

t3=setTimeout("chatref4()",2000);

function cit(yk,id){ //check if typying
var rescheckc=$("#chatmsg"+yk).val();
$.ajax({
  type: "POST",
  url: "/checkiftypying.php",
  data: {duser:id,appendmsg:yk,texttyped:rescheckc}}).done(function(response){
if(response.length>0){
$("#istypying"+yk).css("display","block");
}
else{
$("#istypying"+yk).css("display","none");
}
});

}

function chatref5(){ //check if typying from online users loop
clearTimeout(t5);

var c=$("#mcc").find(".macc");
$(c).each(function(){
var xv=$(this).attr("data-uidv");
var yk=$("#yk"+xv).val();
var id=$("#id"+xv).val();
var onlinef=$("#onlinef").val();
if(strpos(onlinef,id)!==false){
cit(yk,id);
}
});

t5=setTimeout("chatref5()",2000);
}

t5=setTimeout("chatref5()",2000);

t4=setTimeout("chatref4()",2000);
</script>

<script type="text/javascript">
$(document).bind("keyup",function(e){
if(e.keyCode==27){ // esc

var w=$("#activechatwindow").val();

if(w!==""){
hidewindow(w);
hidebar(w);
}
  
}

});
</script>

<input autocomplete="off" type="hidden" id="activechatwindow">
<input autocomplete="off" type="hidden" id="lastyk">

<input autocomplete="off" type="hidden" id="lookupinput_loaded">
<input autocomplete="off" type="hidden" id="lookupinput_loadedv">
<input autocomplete="off" type="hidden" id="lookupinput_loadedvv">

<script type="text/javascript">
$(document).on("mouseover",".fullnamevvv",function(){
$(".fullnamevvv").css("background","#ffffff");
$(this).css("background","#cdd6e4");
});

$(document).on("mouseout",".fullnamevvv",function(){
$(this).css("background","#ffffff");
});

$("#lastyk").val("");

var localArray=new Array();
var lookupinput_loaded_ax=0;

var localArrayv=new Array();
var lookupinputv_loaded_ax=0;

var localArrayvv=new Array();
var lookupinputvv_loaded_ax=0;

var drun=0;
var drunv=0;
var drunvv=0;

function initiate_chat_autocomplete(){
	$("#lookupinput").autocomplete({
					appendTo: "#mcc_child",
					autoFocus:true,
					minLength:1,
			source: function(request, response) {
				if($.trim(request.term)=="Search"){
				ponerdis();
				return false;
				}
				var localResults = $.ui.autocomplete.filter(localArray, request.term);
				var loaded=$("#lookupinput_loaded").val();
                $.ajax({
                  url: "/autocomplete/jump_note.php?friends=t",
                  dataType: "json",
				  method:"post",
                  data: {
                    term : request.term,loaded:loaded,chat:"t"
                  },
                  success: function(data) {	
				  if(localResults.length>0){ drun=1;
				  var output = {};
				  output=jsonConcat(output, data);
				  output=jsonConcat(output, localResults);

				  response(output);
				  }
				  else{ drun=0;
					response(data);  
				  }
				  }
                });
            },
	   open: function(event, ui){
				var where=$("#mcc_child").children(".ui-autocomplete");
				$("#mcc_childv").addClass("hidden_sb");
				$("#mcc_child").find(".ui-autocomplete").removeClass("hidden_sb");
				
				$(where).attr("style","display:inline-block;position:relative;border:0;");
				$(where).addClass("displayblockimportant");
				$(where).removeClass("hidden_sb");
				$("#maccnf").css("display","none");
				$(".macc").css("background-color","#f2f4f8");

$(where).find("li:last").find(".macc").css("background-color","rgb(224,228,238)");
var did=$(where).find("li:last").find(".macc").attr("data-uidv");
$("#lastyk").val(did);

var initialvv=$(where).find("li").length;
var yv=Math.ceil(initialvv*32.09);
$("#mcci").css("height",yv+"px");

			},
			close: function(event,ui){
			
			},
			select: function( event, ui ) {
				return false;
			}
				})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			
			
			if(item.yk=="-1" && drun==0){
				$("#mcc_childv").addClass("hidden_sb");
				$("#mcc_child").find(".ui-autocomplete").addClass("hidden_sb");
var yv=24;
$("#mcci").css("height",yv+"px");
$("#maccnf").css("display","block");
	return false;
			}
			else if(item.yk=="-1"){
			return false;	
			}
			
			var loaded=$("#lookupinput_loaded").val();
			if(strpos(loaded,item.uidv)===false){
			localArray[lookupinput_loaded_ax]=item;
			lookupinput_loaded_ax++;
			loaded=loaded+","+item.uidv;
			$("#lookupinput_loaded").val(loaded);
			}
			
			return $(\'<li style="width:212px!important;" class="autocompletedark"></li>\')
				.data( "ui-autocomplete-item", item )
				.append( \'<div hc="l_c" data-hhref="/\'+item.url+\'"  style="display:block;" class="macc macc\'+item.yk+\'" id="macc\'+item.yk+\'" data-uidv="\'+item.uidv+\'" data-onlinev="\'+item.onlineclassv+\'" data-yk="\'+item.yk+\'" djson=\\\'{"uidv":"\'+item.uidv+\'","yk":"\'+item.yk+\'","fullname":"\'+item.value+\'","profilepict":"\'+item.profilepict+\'","username":"\'+item.url+\'","f_name":"\'+item.f_name+\'"}\\\'><img src="\'+item.imgurl+\'" class="picis"><div class="namemc namemc\'+item.yk+\'" id="namemc\'+item.yk+\'" data-fname="\'+item.f_name+\'" data-who="\'+item.uidv+\'">\'+item.value+\'</div><div class="\'+item.onlineclass+\' bubble\'+item.yk+\'" id="bubble\'+item.yk+\'" data-chatopenr="" data-yk="\'+item.yk+\'" data-uidv="\'+item.uidv+\'" rel="\'+item.uidv+\'"><div class="onlinebubbles"></div></div></div>\' )
				.appendTo( ul );
		};

if ($("#lookupinputv").length>0){
$("#lookupinputv").autocomplete({
					appendTo: "#fsearchw",
					autoFocus:true,
					minLength:1,
			source: function(request, response) {
				if($.trim(request.term)=="Friends on Chat"){
				$("#fsearchw").css("display","none");
				$("#fonchat").css("display","block");
				ponerdis();
				return false;
				}
				var localResults = $.ui.autocomplete.filter(localArrayv, request.term);
				var loaded=$("#lookupinput_loadedv").val();
                $.ajax({
                  url: "/autocomplete/jump_note.php?friends=t",
                  dataType: "json",
				  method:"post",
                  data: {
                    term : request.term,loaded:loaded,chat:"t"
                  },
                  success: function(data) {	
				  if(localResults.length>0){ drunv=1;
				  var output = {};
				  output=jsonConcat(output, data);
				  output=jsonConcat(output, localResults);

				  response(output);
				  }
				  else{ drunv=0;
					response(data);  
				  }
				  }
                });
            },
	   open: function(event, ui){
				var where=$("#fsearchw").children(".ui-autocomplete");
				$("#fonchat").css("display","none");
				$("#fsearchw").css("display","block");
				
				$(where).attr("style","display:inline-block;position:relative;border:0;");
				$(where).addClass("displayblockimportant");
				$(where).removeClass("hidden_sb");

				$("#maccnf").css("display","none");
				$(".macc").css("background-color","#f2f4f8");
				$(".lmacc").css("background-color","#ffffff");
				
$(where).find("li:last").find(".macc").css("background-color","rgb(224,228,238)");
var did=$(where).find("li:last").find(".macc").attr("data-uidv");
$("#lastyk").val(did);

			},
			close: function(event,ui){
			
			},
			select: function( event, ui ) {
				return false;
			}
				})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			
						if(item.yk=="-1" && drunv==0){
				$("#fsearchw").css("display","none");
				$("#fonchat").css("display","block");
	return false;
			}
			else if(item.yk=="-1"){
			return false;	
			}
			
			
			var loaded=$("#lookupinput_loadedv").val();
			if(strpos(loaded,item.uidv)===false){
			localArrayv[lookupinputv_loaded_ax]=item;
			lookupinputv_loaded_ax++;
			loaded=loaded+","+item.uidv;
			$("#lookupinput_loadedv").val(loaded);
			}
			
			return $(\'<li style="width:176px!important;" class="autocompletedark"></li>\')
				.data( "ui-autocomplete-item", item )
				.append( \'<div data-hhref="/\'+item.url+\'"  style="display:block;" class="macc lmacc macc\'+item.yk+\'" id="macc\'+item.yk+\'" data-uidv="\'+item.uidv+\'" data-onlinev="\'+item.onlineclassv+\'" data-yk="\'+item.yk+\'" djson=\\\'{"uidv":"\'+item.uidv+\'","yk":"\'+item.yk+\'","fullname":"\'+item.value+\'","profilepict":"\'+item.profilepict+\'","username":"\'+item.url+\'","f_name":"\'+item.f_name+\'"}\\\'><img src="\'+item.imgurl+\'" class="picis"><div class="namemc namemc\'+item.yk+\'" id="namemc\'+item.yk+\'" data-fname="\'+item.f_name+\'" data-who="\'+item.uidv+\'">\'+item.value+\'</div><div class="\'+item.onlineclass+\' bubble\'+item.yk+\'" id="bubble\'+item.yk+\'" data-chatopenr="" data-yk="\'+item.yk+\'" data-uidv="\'+item.uidv+\'" rel="\'+item.uidv+\'"><div class="onlinebubbles"></div></div></div>\' )
				.appendTo( ul );
		};

} //finish if lookupinputv length > 0

$("#lookupinputvv").autocomplete({
					appendTo: "#chat_receiverb_childv",
					autoFocus:true,
					minLength:1,
			source: function(request, response) {
				var localResults = $.ui.autocomplete.filter(localArrayvv, request.term);
				var loaded=$("#lookupinput_loadedvv").val();
                $.ajax({
                  url: "/autocomplete/jump_note.php?friends=t",
                  dataType: "json",
				  method:"post",
                  data: {
                    term : request.term,loaded:loaded,chat:"t"
                  },
                  success: function(data) {	
				  if(localResults.length>0){ drunvv=1;
				  var output = {};
				  output=jsonConcat(output, data);
				  output=jsonConcat(output, localResults);

				  response(output);
				  }
				  else{ drunvv=0;
					response(data);  
				  }
				  }
                });
            },
	   open: function(event, ui){
				var where=$("#chat_receiverb_childv").children(".ui-autocomplete");
				$("#chat_receiverb_child").addClass("hidden_sb");
				$("#chat_receiverb_childv").removeClass("hidden_sb");
				
				$(where).attr("style","display:inline-block;position:relative;border:0;");
				$(where).addClass("displayblockimportant");
				$(where).removeClass("hidden_sb");

				$(".fullnamevvv").css("background-color","#ffffff");
				
$(where).find("li:last").find(".fullnamevvv").css("background-color","#cdd6e4");

var did=$(where).find("li:last").find(".fullnamevvv").attr("data-uidv");
$("#lastyk").val(did);

			},
			close: function(event,ui){
			
			},
			select: function( event, ui ) {
				return false;
			}
				})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			
						if(item.yk=="-1" && drunvv==0){
//maybe set up a friend not found in here
	return false;
			}
			else if(item.yk=="-1"){
			return false;	
			}
			
			
			var loaded=$("#lookupinput_loadedvv").val();
			if(strpos(loaded,item.uidv)===false){
			localArrayvv[lookupinputvv_loaded_ax]=item;
			lookupinputvv_loaded_ax++;
			loaded=loaded+","+item.uidv;
			$("#lookupinput_loadedvv").val(loaded);
			}
			
			return $(\'<li style="width:176px!important;" class="autocompletedark"></li>\')
				.data( "ui-autocomplete-item", item )
				.append( \'<div id="fullnamevvv\'+item.yk+\'" style="width:100%;padding:0;margin:0;cursor:pointer;color:#000000;" class="fullnamevvv" data-uidv="\'+item.uidv+\'" data-yk="\'+item.yk+\'"><div style="position:relative;width:178px;padding:0;margin:0;"><div class="clearfix"><img style="height:28px;width:28px;display:inline-block;float:left;" src="\'+item.imgurl+\'"><span style="position:relative;top:9px;left:8px;display:inline-block;" id="fullnamevv\'+item.yk+\'">\'+item.value+\'</span><div class="onlineball \'+item.onlineball+\'" data-uidv="\'+item.uidv+\'" style="top:14px;display:inline-block;"></div></div></div></div>\'
)
				.appendTo( ul );
		};


}

chat_autocomplete=true;

$(document).ready(function(){
initiate_chat_autocomplete();
});


$(document).on("keyup","#lookupinput",function(e){
var query=$(this).val();
query=$.trim($(this).val());

if(e.keyCode=="13" && query!=""){
var lastyk=$("#lastyk").val();
$("#macc"+lastyk).eq(0).click();
$(".macc").css("background-color","#f2f4f8");
$("#lookupinput").val("Search");
$("#mcc_child").find(".ui-autocomplete").removeClass("displayblockimportant");
ponerdis();
return;
}

if(query==""){
$("#mcc_child").find(".ui-autocomplete").addClass("hidden_sb");	
ponerdis();
}
else{
	
}

});


$(document).on("keyup","#lookupinputv",function(e){
var query=$(this).val();
query=$.trim(query);

if(e.keyCode==13 && query!=""){
var lastyk=$("#lastyk").val();
$("#macc"+lastyk).eq(0).click();
return;
}

if(query==""){
$("#fsearchw").css("display","none");
$("#fonchat").css("display","block");
}

});

$(document).on("keyup","#lookupinputvv",function(e){
var query=$(this).val();
query=$.trim(query);

if(e.keyCode==13 && query!=""){
var lastyk=$("#lastyk").val();
$("#macc"+lastyk).eq(0).click();
$(".fullnamevvv").css("background-color","#ffffff");
return;
}

if(query==""){
$("#chat_receiverb_childv").addClass("hidden_sb");
$("#chat_receiverb_child").removeClass("hidden_sb");
}

});

function settoportc(){
var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
var xv=x-220;

var screenw=screen.width;
if(screen.width>=1266){
if(x>=1266){
$("#chat").attr("rel","chato2");
var howd=$("#chatt2").css("display");
var check=$("#fonchatw").css("display");
hidefriends("chato1");
if(check=="inline-block"){';

if($browser=="chrome" OR $browser=="safari" OR $browser=="msie"){
$dwidth=112;
}
else{
$dwidth=132;	
}

echo'
$("#lookupinputv").css("width","'.$dwidth.'px");
$("#togglebuttonv").css("display","inline-block");
}
else{
if(howd=="block"){
displayfriends("chato2");
}
else{
if(sidebar_o==1){
displayfriends("chato2v");
}
}
$("#lookupinputv").css("width","'.$dwidth.'px");
$("#togglebuttonv").css("display","inline-block");
}
}
else{
$("#mcc").css("display","none");
$("#chat").attr("rel","chato1");
$("#chat").css("display","block");	
$("#togglebuttonv").css("display","none");
$("#lookupinputv").css("width","145px");	
}
}
else{
$("#mcc").css("display","none");
$("#chat").attr("rel","chato1");
$("#chat").css("display","block");
$("#togglebuttonv").css("display","none");
$("#lookupinputv").css("width","145px");		
}
var isr=$("#chatencapsuler").html();
var isrv=strpos(isr,"chatj");

var calculo=x;
$("#calculo").val(calculo);

var total=$("#ronlinecount").val();

var b=$("#chatencapsuler").innerWidth()+270;

if(b<x){
var c=$("#mwindowsl").find(".itemali");

$(c).reverse().each(function(){
if($(this).data("w")=="chatw"){
var ah=267;	
}
else{
var ah=169;	
}

var hw=$("#chatencapsuler").innerWidth()+270+ah;
if(hw>calculo){}
else{
var s=$(this).attr("id");
s=s.replace("nombre","");

if($(this).data("w")=="chatw"){
$(this).remove();
displaywindow(s);
}
else{				
$(this).remove();
displaybar(s);	
}

}

});

}
else{
	
var c=$("div#chatencapsuler .chatw, .chatb").filter(function(){
return($(this).css("display")=="inline-block");
});
var hm=0;

$(c).each(function(){hm++;});

calculo=parseInt(calculo);

if(hm==1){}
else{
var xv=0;
$(c).each(function(){
if($(this).data("w")=="chatw"){
var ah=267;	
}
else{
var ah=169;	
}
				
var hw=$("#chatencapsuler").innerWidth()+287;

if(hw<calculo){}
else{
var s=$(this).attr("id");
s=s.replace("chatjvvv","");
s=s.replace("chatj","");

if($(this).hasClass("chatb")===true){
var w="chatb";
$("#chatbars").prepend($("#chatjvvv"+s));	
}
else{
var w="chatw";
}

var mwindowsl=$("#mwindowsl").html();
var nombre=$("#namemc"+s).html();
var este=\'<li class="itemali" id="nombre\'+s+\'" onclick="displaywindow(\'+s+\');" data-w="\'+w+\'">\'+nombre+\'</li>\';
mwindowsl=mwindowsl+este;
$("#mwindowsl").html(mwindowsl);

$(this).css("display","none");
				
var d=$("div#chatencapsuler .chatw").filter(function(){
return($(this).css("display")=="inline-block");
});			

d=d.length;	
modify_pos_bottom_chat(d);

}
	
});

}

}


var tl=$("#mwindowsl").find(".itemali").length;	
if(tl>0){
$("#twindows").html(tl);
$("#mwindows").css("display","block");	
}
else{
$("#mwindows").css("display","none");
}

}

function settoportct() {
$.doTimeout(100,function(){settoportc();});
}

var resizeTimer2;
$(window).resize(function() {
clearTimeout(resizeTimer2);
resizeTimer2=setTimeout(settoportct, 100);
});

function displayopened(){';

$r=mysql_query("SELECT * FROM chatopen WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$tosp=$m['chatopen'];	
}

$tosp=explode("#:#:",$tosp);

krsort($tosp);
foreach($tosp as $k=>$v){
if($v!=""){
$v2=explode(":",$v);

if($v2[0]=="chatw"){
echo'
displaywindow("'.$v2[1].'","a","a");
';
// undefined check because of a case of an unfriend
}
else if($v2[0]=="chatb"){
echo'
displaybar("'.$v2[1].'","a");
'; 
// undefined check because of a case of an unfriend
}

}

}

echo'	
}
displayopened();
settoportc();
</script>

<div id="chatmsg_audio" class="hidden_sb"></div>
<input autocomplete="off" type="hidden" id="which">
<input autocomplete="off" type="hidden" id="whyk">
<input autocomplete="off" type="hidden" id="elid">
</div>
';

?>