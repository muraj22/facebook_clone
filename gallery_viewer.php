<?php
include("browser_detect.php");
$browser=browser_detection("browser");
if($browser=='mozilla'){
$fspr='moz';
$fsprv='FullScreenElement';
}
else if($browser=='chrome' OR $browser=='safari'){
$fspr='webkit';
$fsprv='IsFullScreen';
}
else{
$fspr='webkit';
$fsprv='IsFullScreen';
}
$secho='';
$secho.='
<script type="text/javascript">
var tag_remove_case=function(){
$("#dcase").val($(this).attr("data-remove_case"));
var w=$(this).attr("data-uidv");
$(".tiptip_holder").addClass("hidden_sb");
remove_tag(w);
}
$(document).on("click",".tag_remove_case",tag_remove_case);
var uid="'.$uid.'";
function pons(){
var pons=$("#pons").val();

if(pons==1){
$("#previousr").click();
}
else{
$("#nextr").click();
}
}
var dopons=function(e){

	var se = e.target;
	var d=$(se).attr("class");
	if($(se).hasClass("jTagDeleteTag")===true || $(se).hasClass("jTagSaveBtn")===true || strpos($(se).attr("id"),"recv") !==false || $(se).hasClass("put")===true || strpos(d,"ui-")!==false || d===undefined || $(se).parents(".put").eq(0).length>0){}
	else{pons(); return false;}

	};
    
    var says_gn=new Array();
    var saysv_gn=new Array();
</script>
<input type="hidden" name="uidv" id="uidv" value="'.$uid.'">
<input type="hidden" name="cuidv" id="cuidv" value="'.$uid.'">
<input type="hidden" id="ftimeo">
<input type="hidden" autocomplete="off" id="drepin_v">
<input type="hidden" autocomplete="off" id="uidvvv">
<input type="hidden" autocomplete="off" id="usernamevv">
<input type="hidden" autocomplete="off" id="namevvv">

<input type="hidden" id="albumid_gn" >
<input type="hidden" id="albumid_gnv" >
<input type="hidden" id="uidv_gn" >
<input type="hidden" id="ao_gn" >
<input type="hidden" id="totalpics_gn" >
<input type="hidden" id="wk_gn" >
<div id="info_album_gn" style="display:none;">
</div>



<script type="text/javascript">
$("#info_album_gn").html("");
	  var p_gn=new Array();
	  var sw_gn=new Array();
	  var sh_gn=new Array();
	  var a_gn=new Array();
	  var o_gn=new Array();
	  var pi_gn=new Array();
	  var l_gn=new Array();
      var rep_gn=new Array();
	  var av_gn=new Array();
 	  var at_gn=new Array();
	  var pp_gn=new Array();
	  var u_gn=new Array();
	  var fn_gn=new Array();
	  var dtd_gn=new Array();
	  var dtt_gn=new Array();
	  var dtu_gn=new Array();
	  var tl_gn=new Array();
      var trep_gn=new Array();
	  var tc_gn=new Array();
	  var v_gn=new Array();
	  var vh_gn=new Array();
	  var vt_gn=new Array();
	  var vl_gn=new Array();
	  var f_gn=new Array();
	  var t_gn=new Array();
	  var lo_gn=new Array();
	  var ls_gn=new Array();
	  var fi_gn=new Array();
	  var ts_gn=new Array();
	  var fr_gn=new Array();
	  var pr_gn=new Array();
	  var gp_gn=new Array();
	  var lw_gn=new Array();
      var repw_gn=new Array();
	  var cp_gn=new Array();
	  var ac_gn=new Array();	//actual comments
	  var vp_gn=new Array(); //v formed by state, city and country
	  var cip_gn=new Array(); //city photo
	  var sp_gn=new Array(); //state photo
	  var cop_gn=new Array(); //country photo
      var pin_gn=new Array();
      var tbr_gn=new Array();
      var br_gn=new Array();
      var tco_gn=new Array();
      var co_gn=new Array();
      
function renovate_alb_info(){
	  p_gn=new Array();
	  sw_gn=new Array();
	  sh_gn=new Array();
  	  a_gn=new Array();
	  o_gn=new Array();
	  pi_gn=new Array();
	  l_gn=new Array();
      rep_gn=new Array(); //repin
	  av_gn=new Array();
 	  at_gn=new Array();
	  pp_gn=new Array();
	  u_gn=new Array();
	  fn_gn=new Array();
	  dtd_gn=new Array();
	  dtt_gn=new Array();
	  dtu_gn=new Array();
	  tl_gn=new Array();
      trep_gn=new Array(); //total repins
	  tc_gn=new Array();
	  v_gn=new Array();
	  vh_gn=new Array();
	  vt_gn=new Array();
	  vl_gn=new Array();
	  f_gn=new Array();
	  t_gn=new Array();
	  lo_gn=new Array();
	  ls_gn=new Array();
	  fi_gn=new Array();
	  ts_gn=new Array();
	  fr_gn=new Array();
	  pr_gn=new Array();	//privacy
	  gp_gn=new Array();	//good album privacy
	  lw_gn=new Array();	//like with
      repw_gn=new Array(); //repinned with
	  cp_gn=new Array();	//comments parsed
	  ac_gn=new Array();	//actual comments
	  vp_gn=new Array(); //v formed by state, city and country
	  cip_gn=new Array(); //city photo
	  sp_gn=new Array(); //state photo
	  cop_gn=new Array(); //country photo
      pin_gn=new Array(); //if is 
      tbr_gn=new Array(); //total brightness
      br_gn=new Array(); //brightness
      tco_gn=new Array(); //total contrast
      co_gn=new Array(); //contrast
            
	  //fi = filter
	  //ts = tilt shift
	  //fr = frame
}

var likehandler=function(e) {
	  if (e.keyCode == 76){
	  if(($(document.activeElement).is("input")==true) || ($(document.activeElement).is("textarea")==true)){}
	  else{
		 var isopened=$(".picturetheater").css("display");
		 if(isopened=="block"){
		var aorder=$("#ao_gn").val();
		var unlorl=l_gn[aorder];

		if(unlorl>0){$("#cop5v").click();}
		else{$("#cop4v").click();}
		  }
		  }
	  }
};

var repinhandler=function(e) {
	  if (e.keyCode == 82){
	  if(($(document.activeElement).is("input")==true) || ($(document.activeElement).is("textarea")==true)){}
	  else{
		 var isopened=$(".picturetheater").css("display");
		 if(isopened=="block"){
		var aorder=$("#ao_gn").val();
		var unlorl=rep_gn[aorder];

		if(unlorl>0){$("#cop13v").click();}
		else{$("#cop12v").click();}
		  }
		  }
	  }
};

function sparse_alb_info(s){
	var info_album=$("#info_album_gn").html();
	  var info_albumv=info_album.split("&lt;&gt;");
	  var ax="";
	  $(info_albumv).each(function(){
	  if(this.length>0){
	  var datao=this.split("::");
	  ax=datao[46];
	  ax=parseInt(ax);
	  p_gn[ax]=datao[1];
	  sw_gn[ax]=datao[2];
	  sh_gn[ax]=datao[3];
	  a_gn[ax]=datao[4];
	  o_gn[ax]=datao[5];
	  pi_gn[ax]=datao[6];
	  l_gn[ax]=datao[7];
      rep_gn[ax]=datao[8];
	  av_gn[ax]=datao[9];
	  at_gn[ax]=datao[10];
	  pp_gn[ax]=datao[11];
	  u_gn[ax]=datao[12];
	  fn_gn[ax]=datao[13];
	  dtd_gn[ax]=datao[14];
	  dtt_gn[ax]=datao[15];
	  dtu_gn[ax]=datao[16];
	  tl_gn[ax]=datao[17];
      trep_gn[ax]=datao[18];
	  tc_gn[ax]=datao[19];
	  v_gn[ax]=datao[20];
	  vh_gn[ax]=datao[21];
	  vt_gn[ax]=datao[22];
	  vl_gn[ax]=datao[23];
  	  f_gn[ax]=datao[24];
   	  t_gn[ax]=datao[25];
	  datao[25]=datao[25].split("-}");
	  datao[25]=datao[25][1];
	  lo_gn[ax]=datao[26]; //location
	  ls_gn[ax]=datao[27]; //location set by
	  fi_gn[ax]=datao[28];
	  ts_gn[ax]=datao[29];
	  fr_gn[ax]=datao[30];
 	  pr_gn[ax]=datao[31];
	  gp_gn[ax]=datao[32];
	  lw_gn[ax]=datao[33];
      repw_gn[ax]=datao[34];
	  cp_gn[ax]=datao[35]; 
	  ac_gn[ax]=datao[36];
	  vp_gn[ax]=datao[37]; //v formed by state, city and country
	  cip_gn[ax]=datao[38]; //city photo
	  sp_gn[ax]=datao[39]; //state photo
	  cop_gn[ax]=datao[40]; //country photo
      pin_gn[ax]=datao[41]; 
	  tbr_gn[ax]=datao[42];
      br_gn[ax]=datao[43]; 
      tco_gn[ax]=datao[44];
      co_gn[ax]=datao[45];
	  var dsrc=\'/\'+o_gn[ax]+\'/pics/\'+p_gn[ax];
	  var image = new Image();
	  image.src = dsrc;
}
	  });

$(document).unbind("keyup",likehandler);
$(document).bind("keyup",likehandler);

$(document).unbind("keyup",repinhandler);
$(document).bind("keyup",repinhandler);

	  if(!s){
$("#photobottom,#fullss").removeClass("displaynoneimportant");
	  }
}

$("#ftimeo").val("n");';



$uti=sb_user($uidv);


$secho.='
var usernamev="'.$uti['username'].'";
var fullnamev="'.$uti['fullname'].'";
var uidvv="'.$uti['id'].'";
var info_albumr=false;
var viewprepv=false;
var getnextp=false;

var finfo=false;
var gfacedet=false;
var albumid="";
var uidv="";

function isnotfullscreen(){
$(".infullscreen").css("display","none");
$("#fullss").css("display","inline-block");
$("#fullssv").unbind("click");
$("#fullssv").bind("click",function(e){
e.preventDefault();
fullss();
});
$("#fullssv").html("Enter Fullscreen");

$("#commentsofp").css("max-width","300px");
$("#closeimgv").css("display","inline-block");
$("#commentsofp").css("display","table-cell");

$(".dv_g").remove();

$("#next").css("right","15px");
$("#previous").css("left","15px");
$("#bralbumt").html("<br>");

$("#getextra").css("top",postop_gv+"px");

var html = $("body");
var scrollPosition = html.data("scroll-position");
if(scrollPosition){
window.scrollTo(scrollPosition[0], scrollPosition[1]);
}
}


function isfullscreen(uidv){
$(".infullscreen").css("display","inline-block");

$("#next").css("right","38px");
$("#previous").css("left","38px");

$(".dv_g").remove();

var ps_dv=\'<a href="/\'+username+\'"><span style="float:left;"><img src="/\'+uidv+\'/pics/\'+profilepict+\'" style="width:24px;height:24px;margin-right:5px;"></span><span>\'+fullname+\'</span></a>\';

var dv=\'<div class="dv_g" style="position:relative;top:-4px;display:inline-block;">\'+ps_dv+\'&nbsp;&#183;&nbsp;</div>\';
$("#getextra").prepend(dv);

$("#bralbumt").html("&nbsp;");
$("#getextra").css("top","12px");
}

var sag=false;

var postop_gv=false;
var fullname=false;
var profilepict=false;
var datetimept=false;
var datetimeptv=false;
var datetimeptvv=false;
var albumt=false;
var username=false;


var gv_add_loc_f=function(){
edits(\'f\');
}

var gv_add_loc_f_non_o=function(){

var add_loc=\'<div style="margin:0;padding:0;display:none;" id="gv_add_loc" class="elim"><div id="editpiw300001" style="margin:0;padding:0;display:inline-block;position:relative;left:0px;top:-13px;margin-top:20px;margin-right:12px;float:right;width:288px;"><div id="editpiwv300001" style="margin:0;padding:0;display:inline-block;position:relative;left:0px;height:22px;top:20px;"><label id="removeedit300001" class="removeedit" style="display:none;z-index:10;" title="Remove" onclick="swapc(1,300001);"><input autocomplete="off" type="button" class="removeedit2" style="padding:0;cursor:pointer;"></label><input type="text" id="city300001" class="loc2 dcphlgc" style="position:relative;margin-top:13px;left:0px;border:1px solid rgb(189, 199, 216);z-index:2;visibility:visible;background-color:transparent;display:block;width:300px;top:-10px;" autocomplete="off" placeholder=""></div></div><input autocomplete="off" type="hidden" id="statec300001"><input autocomplete="off" type="hidden" id="countryc300001"><input autocomplete="off" type="hidden" id="cityc300001"><input autocomplete="off" type="hidden" id="stateedit300001"><input autocomplete="off" type="hidden" id="cityv300001"><div class="clearfix"><label class="cancelad" style="float:right;margin-top:5px;" onclick="cancelad(\\\'jl\\\');"><input type="button" class="cancelad2" value="Cancel"></label><label class="donee" style="float:right;margin-top:5px;margin-right:0px;" onclick="readyc(\\\'2\\\');"><input type="button" class="donee2" value="Save"></label></div></div>\';



$("#gv_edit_photo").prepend(add_loc);

var corder=$("#ao_gn").val();';

include("js/common/city_autocomplete.php");

$secho.='
var avid=v_gn[corder];
if(avid==""){
$("#city300001").attr("placeholder","Where was this photo taken?");
}
else{
$("#city300001").attr("placeholder","Where was this video taken?");
}

var tocheck=$("#plocation").html();

$("#city300001").val(tocheck);
$("#gv_add_loc").css("display","inline-block");




}
';


include("js/filters_create.php");

$secho.=$sechov;

$secho.='
var filters="";
var ax=1;
$(filters_create).each(function(k,v){
var dclass="";
if(ax==1 || ax==5 || ax==9 || ax==13 || ax==17 || ax==21 || ax==25 || ax==29 || ax==33 || ax==37 || ax==41){
dclass+=" start_row ";
}
if(ax>4){
dclass+=" secondaryColumn ";
}
if(ax==4 || ax==8 || ax==12 || ax==16 || ax==20 || ax==24 || ax==28 || ax==32 || ax==36 || ax==40 || ax==44){
dclass+=" last_cell ";
}
var filter_type=v;
if(filter_type=="wrinkle_reducer" || filter_type=="eight_bits" || filter_type=="custom" || filter_type=="lensflare" || filter_type=="boost" || filter_type=="flashy" || filter_type=="drawing" || filter_type=="sketch" || filter_type=="superman" || filter_type=="church" || filter_type=="cartoon_iii" || filter_type=="black_white_sketch"){
dclass+=" sketch_filter ";
}
else if(filter_type=="black_white_sketch"){
dclass+=" black_white_sketch_filter ";
}
var filter_type_text=filters_create_text[k];
filters+=\'<input type="button" class="hidden_sb filter_trigger"><div style="display:inline-block;float:left;" class="\'+dclass+\' filter_selection_wrapper filter_unselected" data-f_apply="f" data-f_type="\'+filter_type+\'"><div class="filter_mask hidden_sb"></div><img style="float:left;width:62px;" class="filter_selection" src="/images/filter_\'+filter_type+\'.png"><div class="filter_selected_wrapper hidden_sb" data-t_text="Filter applied" data-t_position="bottom"><i class="filter_selected"></i></div><div class="filter_selection_text_wrapper"><div class="fwb fsm filter_selection_text">\'+filter_type_text+\'</div></div></div>\';
ax++;
});';

$secho.='

var makealbcover=function(){////alert(33);
var corder=$("#ao_gn").val();
var photoid=pi_gn[corder];
var selected_album=av_gn[corder];

$(".picturetheater").append(\'<div class="hidden_sb" fjax="/makealbcover.php?selected_album=\'+selected_album+\'&photoid=\'+photoid+\'" data-a_id="albcover_\'+selected_album+\'"></div>\');
$("[data-a_id=albcover_"+selected_album+"]:last").click();
//$().addClass("");
//set up class add and remove class accordingly for rest of pictures on tgs_gv
}

$(document).off("click",".makealbcover",makealbcover).on("click",".makealbcover",makealbcover);

function tgs_gv(uidv){
	  $("#gv_add_location_link").unbind("click",gv_add_loc_f);
	  $("#gv_add_location_link").unbind("click",gv_add_loc_f_non_o);

var corder=$("#ao_gn").val();

var owner_name=fn_gn[corder];
var owner_username=u_gn[corder];
var owner_uidv=o_gn[corder];
var owner_profilepict=pp_gn[corder];

var cuidv="'.$uid.'";
		if(cuidv==uidv){

var filter=fi_gn[corder];
var tilt_shift=ts_gn[corder];


var pin=pin_gn[corder];
if(pin==1){
$("[data-l_rid=repinx26]").addClass("hidden_sb");
$("#repin_separator").addClass("hidden_sb");
 $(document).unbind("keyup", repinhandler);
dtext="Photo";
}else{
$("[data-l_rid=repinx26]").removeClass("hidden_sb");
$("#repin_separator").removeClass("hidden_sb");
 $(document).unbind("keyup", repinhandler);
 $(document).bind("keyup", repinhandler);
dtext="Pin";
}
if(filter!="normal" || tilt_shift=="1"){
$("#change_photo_filter").html("Change "+dtext+" Filter");
}
else{
$("#change_photo_filter").html("Add "+dtext+" Filter");
}

	  $(".elimfg").css("display","block");
	$("#gv_add_location_link").bind("click",gv_add_loc_f);
	}
	else{
		$(".elimfg").css("display","none");
	$("#gv_add_location_link").bind("click",gv_add_loc_f_non_o);
	}


var locationsetby=ls_gn[corder];
var dlocation=lo_gn[corder];

if(dlocation!=""){
$("#gv_add_location_link").find("span").html("Edit Location");
}
else{
$("#gv_add_location_link").find("span").html("Add Location");
}





if((locationsetby==uidv && dlocation!="" && uidv!=cuidv) || (locationsetby=="f" && uidv!=cuidv)){
$("#gv_add_location_link").css("display","none");
}

		  $("#uidvpinfo").html(\'<a href="/\'+owner_username+\'"><img class="profilepict" src="/\'+owner_uidv+\'/pics/\'+owner_profilepict+\'" style="max-width:50px;max-height:50px;"></a>\');

			var datetimepth=\'<div><span id="datetimean" class="lb fwb"><a hc="" href="/\'+owner_username+\'">\'+owner_name+\'</a></span></div><div style="display:block;margin-top:1px;"><div style="display:inline-block;"><span class="fcg"><abbr data-live="s" class="livetimestamp" style="margin:0;padding:0;" data-utime="\'+datetimeptvv+\'" title="\'+datetimeptv+\'">\'+datetimept+\'</abbr></span></div></div>\';
			 $("#dateofp").html(datetimepth);

			 var dprivacy=pr_gn[corder];

			 $("#dateofp").find(".audienceSelectorv").remove();
			 $("#dateofp").find("abbr").parent().eq(0).after(dprivacy);

	if(isfull){isfullscreen(uidv);}
	else{$("#bralbumt").html("<br>");}

	$("#filter_used").html(filters);

    this_slider($("#picturetheater").find(".brightness_slider"));
    this_slider($("#picturetheater").find(".contrast_slider"));
    
var filter=fi_gn[corder];
var frame=fr_gn[corder];
var tilt_shift=ts_gn[corder];
var brightness=br_gn[corder];
var total_brightness=tbr_gn[corder];
var contrast=co_gn[corder];
var total_contrast=tco_gn[corder];
var delem=".picturetheater";
var from_nf=false;';

include("js/filters_load.php");


$secho.=$sechov.'
}


if(view_prevc_gallery===undefined){
var view_prevc_gallery="t";
$(document).on("click","#view_prevc_gallery",function(){
viewprep();
});
}

var usernamevv=false;

function tgs_gvv(uidv,sk,fullnamev,usernamev,album,albumt,totalpics,aorder,drepin_v,usernamevv,namevvv){

		  var corder=$("#ao_gn").val();
		  var albprivacygood=gp_gn[corder];';
	
	include("js/common/city_autocomplete.php");

	$secho.='
         var pin=pin_gn[corder];
         
      if(pin==1){
      var dtext="Photos";
      var dhref="/"+usernamev+"/photos";
      var dhrefv="/"+username+"/photos?album="+album;
      var dhrefvv="/"+username+"/photos_stream";
      }else{
      var dtext="Pins";
      var dhref="/"+usernamev+"/pins";
      var dhrefv="/"+username+"/pins?board="+album;
      var dhrefvv="/"+username+"/pins_stream";
      }
      
      if(drepin_v==2){
      var dtext="Repins";
      var dhrefvv="/"+usernamevv+"/repins_stream";
      fullname=namevvv;
      }
      
      
	  if(sk=="photos_stream"){
		var extrachunk=\'<a href="\'+dhrefvv+\'" title="\'+fullname+\'\\\'s \'+dtext+\'">\'+fullname+\'\\\'s \'+dtext+\'</a>\';
		var postop="12"; postop_gv=12;

		if(albprivacygood>0){
		extrachunk+=\'<span id="bralbumt"></span>in <a href="\'+dhrefv+\'">\'+albumt+\'</a></span>\';

	 	  if(isfull){var postop="12"; postop_gv=3;}
		else{var postop="3"; postop_gv=3;}

}


	  $("#norderv").css("display","none");
	  }
	  else if(sk=="photos_tagged"){
      
      var corder=$("#ao_gn").val();
      var pin=pin_gn[corder];
       
	  if(username==usernamev && albprivacygood>0){
	  var extrachunk=\'<span><span><a href="\'+dhref+\'">\'+dtext+\' of \'+fullnamev+\'</a></span><span id="bralbumt"></span>in <a href="\'+dhrefv+\'">\'+albumt+\'</a></span>\';
	  if(isfull){var postop="12"; postop_gv=3;}
		else{var postop="3"; postop_gv=3;}
	  }
	  else{
	  var extrachunk=\'<span><a href="\'+dhref+\'">\'+dtext+\' of \'+fullnamev+\'</a></span>\';
	  var postop="12"; postop_gv=12;
	  }


	  $("#norderv").css("display","none");
	  }
	  else{
		  if(albumt=="Photos" || albumt=="Pins"){
          if(albumt=="Pins"){
          var dhref=username+\'/pins?board=\'+album;
          }else{
          var dhref=username+\'/photos?album=\'+album;
          }
			  var extrachunk=\'<span><a href="\'+dhref+\'">\'+fullname+\' \'+albumt+\'\\\'s</a></span>\';
		  }
		  else{
          var corder=$("#ao_gn").val();
          var pin=pin_gn[corder];
          if(pin==1){
          var dhref=username+\'/photos?album=\'+album;
          }else{
          var dhref=username+\'/pins?board=\'+album;
          }
	  var extrachunk=\'<span><a href="\'+dhref+\'">\'+albumt+\'</a></span>\';
		  }
		  var postop="12"; postop_gv=12;

	  $("#totalpics").html(totalpics);
 	  $("#norderv").css("display","inline-block");
	  }
	  $(".elim").remove();
	  $("#getextra").css("top",postop+"px");

$("#media_title_g").remove();
if(vids_active){
	var extrachunk=vt_gn[aorder];
	$("#norderv").css("display","none");
	$("#mainta").parent().before(\'<tr id="media_title_g"><td style="width:240px;padding-top:15px;" colspan="2"><div class="fwb fsl">\'+extrachunk+\'</div></td></tr>\');
}


	  $("#calbum").html(extrachunk);

		
	$(".likeCountv").html(tl_gn[aorder]);
	$(".commentCountv").html(tc_gn[aorder]);
	
	
		if(uidv==cuidv){
			if($(".ob").length==0){
if(!vids_active){
var corder=$("#ao_gn").val();
var pin=pin_gn[corder];
if(pin==1){
var media_type_g="Photo";
}else{
var media_type_g="Pin";
}
}
else{var media_type_g="Video";}

			var ownerb=\'<div class="ob">\';
			if(tagactive){var stt=\'<a href="#" class="ob2 uiButtonOverlay" onclick="donetagging();" style="line-height:16px;border-left:0;border-top-left-radius: 3px;border-bottom-left-radius: 3px;">Done Tagging</a>\';}
			else{var stt=\'<a href="#" class="ob2 uiButtonOverlay" onclick="tagphoto(); hideopm();" style="line-height:16px;border-left:0;border-top-left-radius: 3px;border-bottom-left-radius: 3px;"><i class="ob1v"></i>Tag \'+media_type_g+\'</a>\';}
			
	ownerb+=\'<div style="margin:0;padding:0;display:inline-block;" id="ob1w">\'+stt+\'</div>\';
	ownerb+=\'<a href="#" class="ob2 uiButtonOverlay" onclick="edits(\\\'f\\\');" style="line-height:16px;border-left-color:#d9d9d9;" id="ob2"><i class="balooncito mrs" style="vertical-align:top;margin-bottom:-3px;margin-top:2px;"></i><span>Add Location</span></a>\';
	ownerb+=\'<a href="#" class="ob2 uiButtonOverlay" onclick="edits();" style="line-height:16px;border-left-color:#d9d9d9;border-top-right-radius: 3px;border-bottom-right-radius: 3px;"><i class="lapicito_edit mrs" style="margin-top:2px;margin-bottom:-3px;vertical-align:top;margin-right:4px;"></i><span>Edit</span></a>\';
		ownerb+=\'</div>\';
			$("#toppadd").prepend(ownerb);
			if(location==""){$("#ob2").css("display","inline-block");}
else{$("#ob2").css("display","none");}
			} //finish if ob length == 0
		}
		else{
		$(".ob").remove();	
		}

$("#howmanym").html("0");
$("#howmanymv").html("0");
$("#ltot").val("0");

var aquery=$("#howmanym").html();
var totalm=$("#howmanymv").html();

aquery=parseInt(aquery);
totalm=parseInt(totalm);

var piclikeval=$("#ltot").val();

if(tc_gn[aorder]>6){$("#more_commentsp").css("display","table-row");}
else{
$("#more_commentsp").css("display","none");	
}
$("#howmanymv").html(tc_gn[aorder]);

var achat="#picscommentscontainerx26";

piclikeval=parseInt(piclikeval);
var parsed=parseInt(cp_gn[aorder]);

piclikeval=piclikeval+parsed;
$("#ltot").val(piclikeval);

aquery=parseInt(aquery);
var atotal=aquery+parsed;

$("#howmanym").html(atotal);
$(achat).html(ac_gn[aorder]);

$(achat).find(".animateme").css("opacity","1").removeClass("hidden_sb");

$("#writeac").css("display","block");

setSlider($("#cheight"));

setmt();

$("#commentsofp").css("opacity","1");

$("#writeac").removeClass("opacity0");


}

var isembed=false;';
$r=mysql_query("SELECT * FROM options WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$hd=$m['hd'];
}
if(!isset($hd)){
$hd='false';
}
$secho.='
var cuidv="'.$uid.'";
var uhd='.$hd.';
var vids_active=false;

function getnext(p,uidv,albumid,swidth,sheight,aorder,tpics,wk,p_n,uidvv,fullnamev,usernamev,isit,vids,vidshd,pi_ff,drepin_v,uidvvv,usernamevv,namevvv){////alert(4);

cancel_filter();
vids_active=false;

if(drepin_v===undefined){
var drepin_v=$("#drepin_v").val();
}else{
$("#drepin_v").val(drepin_v);
}
if(uidvvv===undefined){
var uidvvv=$("#uidvvv").val();
}else{
$("#uidvvv").val(uidvvv);
}
if(usernamevv===undefined){
var usernamevv=$("#usernamevv").val();
}else{
$("#usernamevv").val(usernamevv);
}
if(namevvv===undefined){
var namevvv=$("#namevvv").val();
}else{
$("#namevvv").val(namevvv);
}

if(p!==""){//means gallery was just launched
var flaunch="t";
}
else{
var flaunch="f";	
}
if(vids===undefined){var vids="";}
if(vidshd===undefined){var vidshd="";}
if(isit===undefined){var isit="";}

finfov=false;
gfacedet=false;
dtoner=true;
frunt=true;
autosearcho=false;

sag=false;

if(albumid){
$("#albumid_gn").val(albumid);
$("#uidv_gn").val(uidv);
$("#photobottom,#fullss").addClass("displaynoneimportant"); $(document).unbind("keyup", likehandler); $(document).unbind("keyup", repinhandler);}
var wki=$("#wk_gn").val();
$("#wk_gn").val(wk);

var wkv="";
if(wk=="pti"){
wk="pt";
wkv="pti";
}
else{wkv=wk;}

function sequiero(){
$("#previousr").unbind("click");
$("#nextr").unbind("click");


if(wk=="pt" || wk=="ps" || isit=="vidv" || isit=="vid"){
	if(isit=="vid"){
var isitv=isit+"v";
	}
	else{var isitv=isit;}
$("#previousr").click(function(){getnext(\'\',\'\',\'\',\'\',\'\',\'\',\'\',wkv,\'n\',uidvv,fullnamev,usernamev,isitv); return false;});
$("#nextr").click(function(){getnext(\'\',\'\',\'\',\'\',\'\',\'\',\'\',wkv,\'p\',uidvv,fullnamev,usernamev,isitv); return false;});
}
else{
$("#previousr").click(function(){getnext(\'\',\'\',\'\',\'\',\'\',\'\',\'\',wkv,\'p\',uidvv,fullnamev,usernamev,isit); return false;});
$("#nextr").click(function(){getnext(\'\',\'\',\'\',\'\',\'\',\'\',\'\',wkv,\'n\',uidvv,fullnamev,usernamev,isit); return false;});
}
$("#previousw,#nextw").css("display","block");
}



//before updating from server - might equal just one
var itpics=tpics;
if(tpics==1){

$("#previousr").unbind("click");
$("#nextr").unbind("click");

$("#nextw,#previousw").css("display","none");

}
else{
sequiero();
}



if(wk=="pt"){
var sk="photos_tagged";
}
else if(wk=="ps"){
var sk="photos_stream";
}
else{
var sk="";
}

if(wk=="pt"){

var pt_gt=wkv;
if(tpics){
$("#totalpics_gn").val(tpics);
}
if(wkv=="pt"){
$("#albumid_gnv").val("photos_tagged");
}

}
else{
var pt_gt="";
if(tpics){$("#totalpics_gn").val(tpics);}
}





$("body").css("overflow-y","hidden");
$("body").css("padding-right",scrollbarWidth+"px");
displayopm(\'s\');
	$(".jTagTagv").remove();




if(albumid==""){
var albumid=$("#albumid_gn").val();
var uidv=$("#uidv_gn").val();
var aorder=$("#ao_gn").val();
}


var pv=p;
$("#uidv").val(uidv);

var palbum=$("#albumid_gn").val();

if(p_n!="f"){
if(palbum!=albumid || wki!=wkv){
renovate_alb_info();
}



var p=aorder;

var totalpics=$("#totalpics_gn").val();
totalpics=parseInt(totalpics);
aorder=parseInt(aorder);
if(p_n=="p"){
aorder=aorder-1;
}
else{
aorder=aorder+1;
}
if(aorder>totalpics){
aorder=1;
}
else if(aorder<1){
aorder=totalpics;
}


$("#ao_gn").val(aorder);
$("#norder").html(aorder);

var cj=1;

var pv=p_gn[aorder];
if(pv===undefined){
$("#photobottom,#fullss").addClass("displaynoneimportant");  $(document).unbind("keyup", likehandler); $(document).unbind("keyup", repinhandler);
if(info_albumr){

info_albumr.abort();

if(getnextp){
	
if(newcommenta){ //comment might have not be initialized but we\'re getting new info
newcommenta.abort();
}

getnextp.abort();

if(viewprepv){
viewprepv.abort();
}

}

}
var tv="t";
var p=aorder;

if(wkv=="pti"){}
else if(wk=="pt"){
albumid="photos_tagged";
}


info_albumr=$.ajax({
  async: "false",
  type: "POST",
  url: "/getnext.php",
  data: {albumid : albumid, uidv : uidv,uidvv:uidvv, p : p,info_album:tv,pt:wkv,repin:drepin_v,uidvvv:uidvvv}
}).done(function(response){
var res=$.parseJSON(response);
var info_album=res.info_album;

$("#info_album_gn").html(info_album);
	  sparse_alb_info();

var pv=p_gn[aorder];
var swidth=sw_gn[aorder];
var sheight=sh_gn[aorder];
albumid=a_gn[aorder];
albumt=at_gn[aorder];
uidv=o_gn[aorder];
username=u_gn[aorder];
profilepict=pp_gn[aorder];
fullname=fn_gn[aorder];
datetimept=dtd_gn[aorder];
datetimeptv=dtu_gn[aorder];
datetimeptvv=dtt_gn[aorder];
vids=v_gn[aorder];
vidshd=vh_gn[aorder];

pi=pi_gn[aorder];
like_gn=l_gn[aorder];
repin_gn=rep_gn[aorder];
album_gn=av_gn[aorder];
$("#uidv").val(uidv);

	  $("#picwidth").val(swidth);
	  $("#picheight").val(sheight);
des(pv,aorder,swidth,sheight,pi,like_gn,repin_gn);

});

}
else{
var swidth=sw_gn[aorder];
var sheight=sh_gn[aorder];
albumid=a_gn[aorder];
albumt=at_gn[aorder];
uidv=o_gn[aorder];
username=u_gn[aorder];
profilepict=pp_gn[aorder];
fullname=fn_gn[aorder];
datetimept=dtd_gn[aorder];
datetimeptv=dtu_gn[aorder];
datetimeptvv=dtt_gn[aorder];
vids=v_gn[aorder];
vidshd=vh_gn[aorder];

pi=pi_gn[aorder];
like_gn=l_gn[aorder];
repin_gn=rep_gn[aorder];
album_gn=av_gn[aorder];
$("#uidv").val(uidv);
	  $("#picwidth").val(swidth);
	  $("#picheight").val(sheight);
des(pv,aorder,swidth,sheight,pi,like_gn,repin_gn);
}

}

function des(pv,aorder,swidth,sheight,pi,like_gn,repin_gn){
var p=pv;
if(p.length<10){return;}

var s_albumid=$("#albumid_gnv").val();

if(wk=="pt" && wkv!="pti"){

var pt_tg=true;
if(!finfo){
var t="t";
finfo=true;
}else{var t="";}
}
else if(wkv=="pti"){
if(s_albumid!=albumid || wki!=wkv){
renovate_alb_info();
var t="t";
}
else{var t="";}
}
else{
if(s_albumid!=albumid || wki!=wkv){
renovate_alb_info();
var t="t";
}
else{var t="";}

}

var exists=av_gn[aorder];
if(exists===undefined){
var t="t";
}

$("#albumid_gn").val(albumid);

if(wkv=="pt"){}
else{
$("#albumid_gnv").val(albumid);
}


$("#uidv_gn").val(uidv);
$("#ao_gn").val(aorder);

if(flaunch=="t"){
$("#commentsofp").css("opacity","0");
$("#writeac").addClass("opacity0");
}

if(swidth){
$("#img1").css("opacity","0");

	  if(vids!=""){
		 set_vids_environment();

		  var oswidth=swidth;
		  var osheight=sheight;

		  if(swidth<520){
			swidth=520;
		  }
		  if(sheight<160){
			sheight=160;
		  }
$("#cop1v").html("Tag Video");
		  vids_active=true;

	  }
	  		  else{
 			set_pics_environment();
		  }

$("#picwidth").val(swidth);
$("#picheight").val(sheight);
settoport();

//arriesgado probarlo
if(pi){
               var pin=pin_gn[aorder];
               
                if(pin==1){
                var dtext="Tag Photo";
                }else{
                var dtext="Tag Pin";
                }
             $("#cop1v").html(dtext);
             
var tofind=$("#photo_theater_like").find(".likebtn2");

if(like_gn>0){
$(".likepicclickvf").parent().css("display","none"); $(".likepicclickfpb").parent().css("display","none"); $(".likepicclickfsb").parent().css("display","inline-block");

if(like_gn==2){
$(".likepicclickf").parent().css("display","inline-block");
}

$(tofind).css("cursor","default");
$(tofind).removeClass("like");
$(tofind).removeAttr("title");

}
else{
$(".likepicclickf").parent().css("display","none"); $(".likepicclickvf").parent().css("display","inline-block");

$(tofind).css("cursor","pointer");
$(tofind).addClass("like");
$(tofind).attr("title","Like this item");
}


$("#photo_theater_like").find(".likebtn2").next("div").attr("data-l_total",tl_gn[aorder]);
$("#photo_theater_like").find(".likebtn2").next("div").html(lw_gn[aorder]);

if(tl_gn[aorder]!=0){
$("#photo_theater_like").removeClass("hidden_sb");
}
else{
$("#photo_theater_like").addClass("hidden_sb");
}


var tofind=$("#photo_theater_repin").find(".repinbtn2");

if(repin_gn>0){
$(".repinclickvf").parent().css("display","none"); $(".repinclickfpb").parent().css("display","none"); $(".repinclickfsb").parent().css("display","inline-block");

if(repin_gn==2){
$(".repinclickf").parent().css("display","inline-block");
}

$(tofind).css("cursor","default");
$(tofind).removeClass("repin");
$(tofind).removeAttr("title");

}
else{
$(".repinclickf").parent().css("display","none"); $(".repinclickvf").parent().css("display","inline-block");

$(tofind).css("cursor","pointer");
$(tofind).addClass("repin");
$(tofind).attr("title","Repin this item");
}


$("#photo_theater_repin").find(".repinbtn2").next("div").attr("data-l_total",trep_gn[aorder]);
$("#photo_theater_repin").find(".repinbtn2").next("div").html(repw_gn[aorder]);

if(trep_gn[aorder]!=0){
$("#photo_theater_repin").removeClass("hidden_sb");
}
else{
$("#photo_theater_repin").addClass("hidden_sb");
}


tgs_gvv(uidv,sk,fullnamev,usernamev,album_gn,albumt,totalpics,aorder,drepin_v,usernamevv,namevvv);
tgs_gv(uidv);

}
else{ //refers to if(!pi) above
if(newcommenta){ //comment might have not be initialized but we\'re getting new info
newcommenta.abort();
}	
}
		  $(".wvideo-js-hd-gallery").remove();
		  $(".wvideo-js-gallery").remove();

	  if(vids!=""){

if(isit=="vid"){
var sdata="autoplay";
}
else{
var sdata="";
}

var hoswidth=oswidth/2;
var hosheight=osheight/2;

		  var vidc=\'<video class="video-js video-js-none video-js-gallery vjs-default-skin" controls preload="none" width="\'+swidth+\'" height="\'+sheight+\'" poster="/\'+uidv+\'/pics/\'+p+\'" data-setup="{}" data-source="gallery" data-autoplay="\'+sdata+\'" data-width="\'+oswidth+\'" data-height="\'+osheight+\'" data-marginl="\'+hoswidth+\'" data-margint="\'+hosheight+\'"><source src="/\'+uidv+\'/vids/\'+vids+\'" type="video/mp4" /></video>\';

if(vidshd!=""){
	vidc+=\'<video class="video-js video-js-none video-js-hd video-js-hd-gallery vjs-default-skin" controls preload="none" width="\'+swidth+\'" height="\'+sheight+\'" poster="/\'+uidv+\'/pics/\'+p+\'" data-setup="{}" data-source="gallery" data-autoplay="\'+sdata+\'" data-width="\'+oswidth+\'" data-height="\'+osheight+\'" data-marginl="\'+hoswidth+\'" data-margint="\'+hosheight+\'"><source src="/\'+uidv+\'/vids/\'+vidshd+\'" type="video/mp4" /></video>\';
}




		  $("#img1").css("display","none");
		  $("#img1").before(vidc);


bananad();


var vid_normal=$(".video-js-gallery").attr("id");
var vid_hd=$(".video-js-hd-gallery").attr("id");



	if(isit=="vid"){
posternotseen=false;
						if(uhd && vid_hd){
			posternotseenv=vid_hd;
		}
		else{
			posternotseenv=vid_normal;
		}
	}
	else{
				if(uhd && vid_hd){
			posternotseen=vid_hd;
		}
		else{
			posternotseen=vid_normal;
		}

		}
settoport();

if(isit=="vid"){

if(uhd){
$("#"+vid_normal).parent().css("display","none");
$("#"+vid_hd).parent().css("display","inline-block");
togglehd("t",vid_normal,vid_hd);
}
else{
$("#"+vid_hd).parent().css("display","none");
$("#"+vid_normal).parent().css("display","inline-block");
togglehd("f",vid_normal,vid_hd);
}

}



	  }
	  else{
		 $("#img1").css("display","inline-block");
	  $("#img1").unbind("load");
	  $("#img1").load(function() {
$(this).css("opacity","1");

gfacedet=true;
var corder=$("#ao_gn").val();
var vidsc=v_gn[corder];


if(vidsc==""){
renewvvp("frun");
}
//puede andar como no, si es que esta la data ya cargada

});

	  }



$("#typeanynamews").append($("#typeanynamew"));
$(".faceBoxw").remove();
		  $("#img1").attr("src","/"+uidv+"/pics/"+p);
}
$("#uidv").val(uidv);


var ftimeo=$("#ftimeo").val();

if(ftimeo=="n"){
				$("#toppadd").css("display","none");
				$("#writeac").css("opacity","0");
				$("#sharesp").css("display","none");
	     		$("#more_commentsp").css("display","none");
}
else{
$("#sharesp").css("display","none");
//$("#more_commentsp").css("display","none");
//$("#photo_theather_like").addClass("hidden_sb");
}


$("#picturetheater").css("display","block");
$("#ftimeo").val("y");';





$secho.='

if(getnextp){

getnextp.abort();

if(viewprepv){viewprepv.abort();}

//liquidar estos dos cuando pueda sacando la propia data dentro de sparse_alb_info

}


if(!pi_ff){
var pd=pi;
}
else{
var pd=pi_ff;
}



getnextp=$.ajax({
  async: "false",
  type: "POST",
  url: "/getnext.php",
  data: {albumid : albumid, uidv : uidv, uidvv:uidvv,p : pd,info_album:t,pt:pt_gt,repin:drepin_v,uidvvv:uidvvv}
}).done(function(response) {console.log(response);
if(response.length>0){
	  var res=$.parseJSON(response);
	  var photoid=res.photoid;
	  var desc=res.desc; 
      var descv=res.descv;
      descv=str_replace("<p>","",descv);
      descv=str_replace("</p>","",descv);
      descv=str_replace(\'<b data-uidv="">\',\'\',descv);
      descv=str_replace("</b>","",descv);
      var corder=$("#ao_gn").val();
      says_gn[corder]=descv;
      var descvv=res.descvv;
      descvv=str_replace("<p>","",descvv);
      descvv=str_replace("</p>","",descvv);
      saysv_gn[corder]=descvv;
      
	  var location=res.location;
	  datetimept=res.datetimept;
	  datetimeptv=res.datetimeptv;
	  datetimeptvv=res.datetimeptvv;
	  albumt=res.albumidt;
	  var pwidth=res.swidth;
	  var pheight=res.sheight;
	  albumid=res.albumidi;

	  var thephoto=res.photoid;
	  var thephotom=res.thephotom;
	  var totalpics=res.xg; 

	  var thewidth=res.thewidth;
	  var theheight=res.theheight;
	  fullname=res.fullname;
	  profilepict=res.profilephoto;
	  username=res.unv;

	  var tshares=res.tshares;

	  vids=res.vids;
	  vidshd=res.vidshd;

	  if(t=="t"){
	  var info_album=res.info_album;
	  $("#info_album_gn").html(info_album);
	  sparse_alb_info(\'s\');
	  }
	  if(pt_gt=="pt" || pt_gt=="pti"){}
	  else{
	  $("#totalpics_gn").val(totalpics);
	  }

	 if(itpics==1 && totalpics>1){
	  sequiero();
	  }

	 var like_gn=l_gn[aorder];
     var repin_gn=rep_gn[aorder];

	 if(like_gn>0){$(".likepicclickvf").parent().css("display","none"); $(".likepicclickfpb").parent().css("display","none"); $(".likepicclickfsb").parent().css("display","inline-block"); if(like_gn==2){$(".likepicclickf").parent().css("display","inline-block");}}
	 else{$(".likepicclickf").parent().css("display","none"); $(".likepicclickvf").parent().css("display","inline-block");}

$("#photo_theater_like").find(".likebtn2").next("div").attr("data-l_total",tl_gn[aorder]);
$("#photo_theater_like").find(".likebtn2").next("div").html(lw_gn[aorder]);

if(tl_gn[aorder]!=0){
$("#photo_theater_like").removeClass("hidden_sb");
}
else{
$("#photo_theater_like").addClass("hidden_sb");
}

 if(repin_gn>0){$(".repinclickvf").parent().css("display","none"); $(".repinclickfpb").parent().css("display","none"); $(".repinclickfsb").parent().css("display","inline-block"); if(repin_gn==2){$(".repinclickf").parent().css("display","inline-block");}}
	 else{$(".repinclickf").parent().css("display","none"); $(".repinclickvf").parent().css("display","inline-block");}

$("#photo_theater_repin").find(".repinbtn2").next("div").attr("data-l_total",trep_gn[aorder]);
$("#photo_theater_repin").find(".repinbtn2").next("div").html(repw_gn[aorder]);

if(trep_gn[aorder]!=0){
$("#photo_theater_repin").removeClass("hidden_sb");
}
else{
$("#photo_theater_repin").addClass("hidden_sb");
}


	  $("#toppadd").css("display","table-cell");
	  $("#sharesp").css("display","none");
	  if((tshares!="") && (tshares>0)){
		  if(tshares>1){var as="s";}
		  else{var as="";}
		  	$(\'#prevswr\').html(\'<span class="friendslinkv_p" onclick="">\'+tshares+\' share\'+as+\'</span>\');
	  $("#sharesp").css("display","table-row");
		  }

	//$("#more_commentsp").css("display","none");

	  $("#alb_name").val(albumid);
	  $("#alb_namev").val(albumt);
	  if(location.length>0){$("#plocationvv").html("At&nbsp;")}
	  else{$("#plocationvv").html("");}
	  var location=vp_gn[aorder];
	   $("#plocation").html(location);
$("#duidvv").val(uidv);

 $("#pdesc").html(desc);
	  var thephotol=p;

	 var pxheight="520px";
if(pheight>520){
pxheight=pheight+"px";
}
		var thetop=520-45;
		thetop=Math.ceil(thetop/2);





	    photoid=$.trim(photoid);
		$("#lpidv").val(photoid);
	  $("#thephotol").val(thephotol);
	  $("#thephotom").val(thephotom);

	  $("#thephoto").val(thephoto);
	  $("#thetable").val(uidv);

if(!sag){
tgs_gvv(uidv,sk,fullnamev,usernamev,albumid,albumt,totalpics,aorder,drepin_v,usernamevv,namevvv);

var corder=$("#ao_gn").val();
var vidsc=v_gn[corder];

if(vidsc==""){
renewvvp("frun");
}

}

$("#photobottom,#fullss").removeClass("displaynoneimportant");

if(!vids_active){
var media_type_g="Photo";
}
else{var media_type_g="Video";}

if(t=="t"){

if(vids!=""){
		  var opwidth=pwidth;
		  var opheight=pheight;

		  if(pwidth<520){
			pwidth=520;
		  }
		  if(pheight<160){
			pheight=160;
		  }

	}

	  $("#picwidth").val(pwidth);
	  $("#picheight").val(pheight);
}

if(!sag){
tgs_gv(uidv);
}

$(".rme").remove();

	$(".rmev").remove();
	$("#lpid").val(photoid);


if(cuidv==uidv){
$("#editslv").css("display","inline-block");
var apostop="-151"; var aposleft="24";}
else{$("#editslv").css("display","none"); var apostop="-58"; var aposleft="40";}

//antiguo top left positioning
var lwidth="0";
var lheight="0";

if(pwidth<682){lwidth=682-pwidth; lwidth=Math.floor(lwidth/2);}
if(pheight<520){lheight=520-pheight; lheight=Math.floor(lheight/2);}

$("#picdiv").css("height","100%");
$("#picdiv").css("width","100%");

		 var pxheight="520px";
if(pheight>520){
pxheight=pheight+"px";
}
var pxheight=$("#tdpic").css("height");

var what="photo";

	var x=26;

$("#aozxkc131").remove();
$("#writingc").val("0");
$("#comment").css("height","14px");


$("#na_comment").val("0");


var avid=v_gn[aorder];
if(avid==""){
$("#city300002").attr("placeholder","Where was this photo taken?");
}
else{
$("#city300002").attr("placeholder","Where was this video taken?");
}


$("#city300002").val("");


$("#plocation").html(location);

 $("#pdesc").html(desc);

cancelad(\'s\',descv,descvv);

	  $("input[name=tagu]").val(uidv);
	  $("input[name=fname]").val(p);


var pi=pi_gn[aorder];

 //  viewprep(uidv,pi);


}

});

}
if(cj){}
else{$("#norder").html(aorder);
des(pv,aorder,swidth,sheight);
}

}

function viewprep()
{
var aquery=$("#howmanym").html();
var totalm=$("#howmanymv").html();

aquery=parseInt(aquery);
totalm=parseInt(totalm);

var piclikeval=$("#ltot").val();

//var na=$("#picscommentscontainerx26").find(".new_comment").length;
var na=0;

var corder=$("#ao_gn").val();
var uidv=$("#uidv_gn").val();
var sbid=pi_gn[corder];

var aqueryv=50;

if(viewprepv){
viewprepv.abort();
}

var ltypev=$("#picscommentscontainerx26").attr("data-ltypev");
var variation=$("#picscommentscontainerx26").attr("data-type");

viewprepv=$.ajax({
  async: true,
  type: "POST",
  url: "/loadpcomment2.php?givet=t",
  data: { uidv : uidv, aquery : aquery, sbid:sbid, piclikeval : piclikeval, aqueryv : aqueryv,na:na,ltypev:ltypev,variation:variation}
}).done(function(response) {
if(response.length>0){
var res=response.split("{{}}");

var givet=res[2];
if(givet>6){$("#more_commentsp").css("display","table-row");}
$("#howmanymv").html(givet);

cp_gn[corder]=givet;

var achat="#picscommentscontainerx26";

piclikeval=parseInt(piclikeval);
var parsed=parseInt(res[0]);

piclikeval=piclikeval+parsed;
$("#ltot").val(piclikeval);

aquery=parseInt(aquery);
var atotal=aquery+parsed;

$("#howmanym").html(atotal);
$(achat).prepend(res[1]);

ac_gn[corder]=$(achat).html();

$("#writeac").css("display","block");

setSlider($("#cheight"));

setmt();

$("#commentsofp").css("opacity","1");

$("#writeac").removeClass("opacity0");


  }
});




}
function getlikes(uidv,photoid,x){

}
</script>
';
$secho.="<script type='text/javascript' src='/tag/source/etiquetarv.php'></script>";
$secho.='
<input type="hidden" id="dcase" value="">
<input type="hidden" id="alb_name" value="">
<input type="hidden" id="love" value="love">
<script type="text/javascript">
var saving_tag=new Array();
function remove_tag(w,no_remove){
if(no_remove===undefined){
no_remove="f"; 
}
else{ //comes from who where you with autocomplete	
$("#dcase").val(1);
}
if(typeof(w)!="object"){
	var w=$(".jTagDeleteTag").filter(function() {
    return ( $(this).attr("data-uidv") == w );
});
}
	$(w).each(function(){
		$(this).click();
		//useful for basic functionality inside etiquetarv.php

							var elo=$(this).parent().parent().attr("name");
                            var oelo=$(this).parent().parent().attr("id");

                            oelo=oelo.replace("tag", "");

                            var label=$("#tagvvv"+oelo).html();
                            label=label.split("<");
                            label=label[0];
                            label=$.trim(label);

					var cuidvjs=$("#otag"+oelo).attr("name");

					var islabel=$("#otag"+oelo).data("islabel");
					if(islabel=="t"){cuidvjs="";}

        		    var photoid=$("#thephoto").val();
      				photoid=$.trim(photoid);

              		var elov=$(this).parent().parent().attr("id");
                    elov=elov.replace("tag", "");

                    var ctoteti=$("#ctoteti").val();
                    ctoteti=ctoteti.replace(","+elov,"");

                    $("#ctoteti").val(ctoteti);

					var thephotol=$("#thephotol").val();
					var thephotom=$("#thephotom").val();
				    var dcase=$("#dcase").val();
					var thetable=$("#thetable").val();

		var id=elo;

if(cuidvjs!==""){
var sid=cuidvjs+"a"+photoid;
}
else{
var label_ascii=toascii(label);
var sid=label_ascii+"a"+photoid;
}
if(saving_tag[sid]){saving_tag[sid].abort(); saving_tag[sid]=null; saving_tag.splice(sid,1);}
saving_tag[sid]=$.ajax({
async:"false",
type: "POST",
url: "/ajax/tags/gallery_viewer.php",
data: { action : "delete", id : id, cuidvjs : cuidvjs, thephotol : thephotol, thephotom : thephotom,photoid:photoid,thetable:thetable,label:label,dcase:dcase }})
.done(function(response){
});

					$(".jTagLabels").find(\'label[rel="\'+$(this).parent().parent().attr("id")+\'"]\').remove();

					$(this).parent().parent().remove();

                    var toteti=$("#toteti").val();
                    toteti=parseInt(toteti);
                    toteti=toteti-1;
                    $("#toteti").val(toteti);
                    if(toteti=="0"){$("#ctotv").html("");}
                 	else{$("#ctotv").html(toteti);}

var tagid=$(this).data("tagid");

var corder=$("#ao_gn").val();
var tagged=t_gn[corder];

var tagged=$.parseJSON(tagged);
tagged=tagged.tagged;

for (var iv = 0; iv < tagged.length; iv++) {
if(tagged[iv].tagid==tagid){
tagged.splice(iv,1);
}

}


if(tagged.length==0){
var dtagged=\'{"tagged":[]}\';
}
else{
var dtagged=\'{"tagged":\'+JSON.stringify(tagged)+\'}\';
}


t_gn[corder]=dtagged;

renewvvp("",no_remove);

	});
}
function new_tag(cuidvjs,tp,width,height,unmodified_left,unmodified_top,dun,dfn,tp,label,thephotol,thephotom,thetable,top_pos,left,albumid,flag,photoid){
var no_renew="f";
if(typeof(cuidvjs)=="object"){
var ui=cuidvjs;
var width=0;
var height=0;
var unmodified_left=-16000;
var unmodified_top=-16000;
var cuidvjs=ui.uidv;
var dun=ui.url;
var dfn=ui.value;
var tp=ui.tp;
var label="";
var corder=$("#ao_gn").val();
var photoid=pi_gn[corder];
var albumid=a_gn[corder];
var top_pos=-16000;
var left=-16000;
var flag="w";
var thephotol=$("#thephotol").val();
var thephotom=$("#thephotom").val();
var thetable=$("#thetable").val();
var no_renew="t";
}
var corder=$("#ao_gn").val();
var tagged=t_gn[corder];

var tagged=$.parseJSON(tagged);
tagged=tagged.tagged;

var grs=retcount();
if(cuidvjs!=""){
tp=parseInt(tp);
var dtp=tp+1;
}
else{
var dtp="";
}
label=$.trim(label);
label=label.replace(/ {2,}/g, " ");

var ver={width:width,height:height,positionX:unmodified_left,positionY:unmodified_top,tagid:grs,id:cuidvjs,un:dun,ufn:dfn,tp:dtp,tb:"'.$uid.'",tb_fn:"'.$uid_a['fullname'].'",tb_un:"'.$un.'",label:label};

tagged.push(ver);

var tagged=tagged.slice().sort(function(a,b){return a.positionX-b.positionX});

var dtagged=\'{"tagged":\'+JSON.stringify(tagged)+\'}\';

t_gn[corder]=dtagged;

if(cuidvjs!=""){
var sid=cuidvjs+"a"+photoid;
}
else{
var label_ascii=toascii(label);
var sid=label_ascii+"a"+photoid;
}
if(saving_tag[sid]){////alert(33);
saving_tag[sid].abort(); saving_tag[sid]=null; saving_tag.splice(sid,1);
}
var corder=$("#ao_gn").val();
var pin=pin_gn[corder];
saving_tag[sid]=$.ajax({
  type: "POST",
  url: "/ajax/tags/gallery_viewer.php",
  data: { action : "save", width : width, height : height, top : top_pos, left : left,label:label,cuidvjs:cuidvjs,albumid:albumid,flag:flag,thephotol:thephotol,thephotom:thephotom,photoid:photoid,thetable:thetable,pin:pin}})
.done(function(response){alert(response);
if(response=="e10{}"){
	var exists=$("#tag_full").length;
	if(exists==0){
		$("body").append(\'<div id="tag_full" class="displaydialog hidden_sb" data-d_overlay="white_create" data-d_title="Tag Error" data-d_okay="Close" data-d_okay_function="close_dialog"></div><div class="dialog_msgs">This photo contains the maximum amount of tags.</div>\');
	}
		$("#tag_full").click();
}
});


renewvvp("",no_renew);
}
$("#dcase").val("");
function checkit(){
$("#love").val("nothing");
}
			$(document).ready(function(){

				$("#img1").tag({
					canTag:true,
					canDelete:true,
					defaultWidth:100,
					defaultHeight:100,
					resizable:false,
					showTag: "hover",
	save: function(width,height,top_pos,left,label,cuidvjs,albumid,flag,photoid,dfn,dun,tp,unmodified_top,unmodified_left){

var thephotol=$("#thephotol").val();
var thephotom=$("#thephotom").val();
var thetable=$("#thetable").val();
new_tag(cuidvjs,tp,width,height,unmodified_left,unmodified_top,dun,dfn,tp,label,thephotol,thephotom,thetable,top_pos,left,albumid,flag,photoid);
				}
			});

			});
$("#love").val("");
</script>


<script type="text/javascript">
var picwidth=300;
var picheight=300;
</script>';

$secho.='
<script type="text/javascript">
function comment(){
$("#comment").focus();
}

function changeclass(){
	$("#previous").removeClass("previous");
	$("#previous").addClass("previous2");
	$("#next").removeClass("next2");
	$("#next").addClass("next");
}
function changeclass2(){
	$("#previous").removeClass("previous2");
	$("#previous").addClass("previous");
	$("#next").removeClass("next");
	$("#next").addClass("next2");
}

function changeclass3(){
	$("#next").removeClass("next");
	$("#next").addClass("next2");
	$("#previous").removeClass("previous2");
	$("#previous").addClass("previous");
}
function changeclass4(){
	$("#next").removeClass("next2");
	$("#next").addClass("next");
	$("#previous").removeClass("previous");
	$("#previous").addClass("previous2");
}

function changeclasses(){

}






function retag(dleft){
if(dleft){
var e=$("#"+dleft).nextAll(".faceBoxw").filter(function() {
return ( $(this).css("display") != "none" );
});
var as=e.length;
if(as==0){
var e=$("#"+dleft).prevAll(".faceBoxw").filter(function() {
return ( $(this).css("display") != "none" );
});
var as=e.length;
}

if(as>0){
$(e[0]).children(":first").click();
}

}else{
	var e=$(".faceBoxw").filter(function() {
    return ( $(this).css("display") != "none" );
});
	$(e[0]).children(":first").click();
}
}

var drecent_tagsooo=function(){
$(".adl").css("border-color","#ffffff");
$(".adl").css("border-width","1px 0px;");
$(".adl").css("color","#333333"); $(".adl").css("background","#ffffff");  $(this).css("color","#ffffff"); $(this).css("background","#6d84b4"); $(this).css("border-width","1px 0px"); $(this).css("border-style","solid"); $(this).css("border-color","#3b5998 #ffffff");
}



function checkdkey(k){
if(k==8 || k==46 || ctrlDown && (k==86 || k==88 || k==89 || k==90)){return "t";}
else{return "f";}
}

var drecent_tagsoo=function(e){
var charCode = (e.which) ? e.which : e.keyCode;
var quiero=checkdkey(charCode);
if(quiero=="t"){
if($("#jTagLabel").val()==""){
recent_tags();
}
}
}

var drecent_tagso=function(){
$("#jTagLabel").val("");
$("#recent_tagsv").css("display","none");
$("#recent_tags").css("display","none");
}

var drecent_tags=function(){
if($("#jTagLabel").val()=="" && focusoutl){
	recent_tags();
}
focusoutl=false;
}

var focusoutl=false;

function jtaglabelb(){
jtaglabelu();

$("#jTagLabel").bind("keyup",drecent_tagsoo);
$("#jTagLabel").bind("keydown",drecent_tagsoo);

$("#jTagLabel").bind("blur",drecent_tagso);
$("#jTagLabel").bind("focus",drecent_tags);

$("#recent_tags,#recent_tagsv").on("mouseenter",".adl",drecent_tagsooo);
}

function jtaglabelu(){
$("#jTagLabel").unbind("keyup",drecent_tagsoo);
$("#jTagLabel").unbind("keydown",drecent_tagsoo);

$("#jTagLabel").unbind("blur",drecent_tagso);
$("#jTagLabel").unbind("focus",drecent_tags);

$("#recent_tags").css("display","none");
$("#recent_tagsv").css("display","none");

$("#recent_tags,#recent_tagsv").off("mouseenter",".adl",drecent_tagsooo);
}


var tagactive=false;
function tagphoto(){
	if(vids_active){
		edits(\'t\');
	}
	else{
tagactive=true;
 jtaglabelb();


$(".faceBox").addClass("faceBoxTag");
$(".faceBox").addClass("faceBoxHidden");

		$("#jTagContainer").css("cursor","crosshair");

	$("#jTagContainer").unbind("click");



					var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],x=w.innerWidth||e.clientWidth||g.clientWidth;
var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],y=w.innerHeight||e.clientHeight||g.clientHeight;


var prey=screen.height-400;

					$(\'#ob1w\').html(\'<a href="#" class="ob2 uiButtonOverlay" onclick="donetagging();" style="line-height:16px;border-left:0;border-top-left-radius: 3px;border-bottom-left-radius: 3px;">Done Tagging</a>\');


 $("#imgoverlayl").removeClass("imgoverlayl");
 $("#imgoverlayl").removeClass("endtag");
 $("#imgoverlayl").addClass("starttag");



 $("#imgoverlayr").removeClass("endtag");
 $("#imgoverlayr").removeClass("imgoverlayr");
 $("#imgoverlayr").addClass("starttag");
 unbind_photobottom();
$("#photobottom").css("display","none");

$("#photobottom2").css("display","block");
	$(".jTagLabels").css("display", "block");
	$("#currentp").css("visibility","visible");

retag();
	}
}

var setpons=function(e){
var px=e.pageX;
var dl=$(this).offset().left;
var dw=$(this).css("width");
var po=px-dl;
dw=parseInt(dw);
var per=po*100/dw;
if(per<=15){changeclass4(); changeclass(); $("#pons").val("1"); }
else{changeclass2(); changeclass3(); $("#pons").val("2");}
	}
var setponsv=function(e){
var px=e.pageX;
var dl=$(this).offset().left;
var dw=$(this).css("width");
var po=px-dl;
dw=parseInt(dw);
var per=po*100/dw;
if(per<=0){changeclass4(); changeclass(); $("#pons").val("1"); }
else{changeclass2(); changeclass3(); $("#pons").val("2");}
	}


function donetagging(s){
tagactive=false;
 jtaglabelu();

$("#typeanynamews").append($("#typeanynamew"));
$(".faceBox").removeClass("faceBoxTag");
$(".faceBox").removeClass("faceBoxTagHover");
$(".faceBox").removeClass("faceBoxActive");
	$("#jTagContainer").css("cursor","pointer");
	if(s){

	}
	$("#photobottom").unbind("mousemove",setpons);
	$("#photobottom").bind("mousemove",setpons);
	if(s){
	$("#jTagContainer").unbind("click");
	}
	$("#jTagContainer").unbind("click",dopons);

	$("#jTagContainer").bind("click",dopons);
            var corder=$("#ao_gn").val();
            var pin=pin_gn[corder];
                if(pin==1){
                var dtext="Tag Photo";
                }else{
                var dtext="Tag Pin";
                }
	$(\'#ob1w\').html(\'<a href="#" class="ob2 uiButtonOverlay" onclick="tagphoto(); hideopm();" style="line-height:16px;border-left:0;border-top-left-radius: 3px;border-bottom-left-radius: 3px;"><i class="ob1v"></i>\'+dtext+\'</a>\');
		$("#previous").removeClass("starttag");
	$("#next").removeClass("starttag");
		$("#previous").addClass("previous");
	$("#next").addClass("next");
	 $("#imgoverlayl").removeClass("starttag");
 $("#imgoverlayl").addClass("imgoverlayl");

 $("#imgoverlayr").removeClass("starttag");
 $("#imgoverlayr").addClass("imgoverlayr");
 $("#photobottom2").css("display","none");
$("#photobottom").css("display","block");
	$(".jTagLabels").css("display", "none");
	$(".jTagDrag").remove();
	$("#currentp").css("visibility","visible");

	if(s){
	unbind_photobottom();
	}
if(!stop_binding_pb){
rebind_photobottom();
}
}




function submitonenter(e){
var charCode = (e.which) ? e.which : e.keyCode;
var tocheck=$(this).val();
tocheck=$.trim(tocheck);
if((charCode == "13") && (tocheck=="")){return;}

else if(charCode == "13"){

var w=$(this).val();

var id=$("#uidv").val();

var f="fromp";
var piclikeval=$("#ltot").val();
var thepic=$("#thephotol").val();

$("#comment").val("");
sbktw("comment",\'aozxkc131\',116);

var yk="x26";

loadcomment(yk,id,thepic,f);

return false;
}
else{sbktw("comment",\'aozxkc131\',116); return;}
}
</script>
';

$secho.= '
<div class="picturetheater" id="picturetheater"><div class="snowliftouter" id="snowliftouter"><div class="snowliftinner" id="snowliftinner"><div class="snowliftpopup" id="snowliftpopup">


<div class="divstage" id="divstage" style="">

<script type="text/javascript">
function submitonEnterpt(evt){

var charCode = (evt.which) ? evt.which : event.keyCode;
var tocheck=$("#jTagLabel").val();
tocheck=$.trim(tocheck);
if(tocheck!=""){}
else{}
if((charCode == "13") && (tocheck=="")){return false;}
else if(charCode == "13"){
$(".jTagSaveBtn").attr("data-ts_dfn","");
$(".jTagSaveBtn").attr("data-ts_dun","");
$(".jTagSaveBtn").attr("data-ts_dtp","");

$(".jTagSaveBtn").click(); return false;
}
else{}

}

function clearlabel(){
var tocheck=$("#jTagLabel").val();
tocheck=$.trim(tocheck);
if((tocheck=="Type any name") || (tocheck=="")){$("#jTagLabel").val("");}
}

function clearlabelv(){
var tocheck=$("#jTagLabel").val();
tocheck=$.trim(tocheck);
if(tocheck==""){}
}
</script>

<input type="hidden" id="photobottomstatus" value="none">
<script type="text/javascript">
$("#photobottomstatus").val("none");
</script>

<div style="display:none;" id="previousr"></div>
<div style="display:none;" id="nextr"></div>
<table style="margin:0;padding:0;border-collapse:collapse;width:100%;height:100%;position:relative;background:#ffffff;" cellspacing="0" cellpadding="0" id="tdpict"><tr><td onmouseout="changeclasses();" style="width:682;text-align:left;margin:0;padding:0;background:black;" id="tdpic"><div style="position:relative;"><div class="fullssw"><a href="#" class="fullss fullsso" id="fullss" data-t_text="Enter Fullscreen" data-t_position="bottom"></a></div></div><div id="fswr" class="fswr" style="cursor:default;height:100%;width:100%;position:relative;"><div style="position:absolute;padding:0;margin:0;cursor:pointer;" class="tdpicv" id="tdpicv"><div id="previousw"><i id="previous" style="position:absolute;left:15px;top:50%;z-index:3;width:27px;height:45px;margin-top:-22px;" onmouseover="changeclass();" onmouseout="changeclass2();" title="Previous"></i></div><div style="margin:0;padding:0;" id="nextw"><i id="next" style="position:absolute;right:15px;top:50%;z-index:3;width:27px;height:45px;margin-top:-22px;" onmouseover="changeclass3();" onmouseout="changeclass4();" title="Next"></i></div></div><div style="position:relative;" id="jtagcontainerw"><div id="jTagContainer" style="cursor:pointer;"><div style="position:relative;"><div id="jTagArea">

<div style="position:absolute;padding:0;margin:0;" id="picdiv"><img src="/images/transparent.png" id="img1" class="img1" style="postion:relative;width:300px;height:300px;padding:0;margin:0;position:absolute;left:0;top:0;image-rendering: optimizequality;"><div style="position:absolute;width:100%;text-align:center;top:0;height:100%;background:rgba(255,255,255,0.5);" class="loading_filter hidden_sb"><div style="position:relative;display:inline-block;width:16px;height:11px;background-image:url(/images/loading.gif);"></div></div><input type="hidden" id="pons"><script type="text/javascript">

function fbind(){
$("#jTagContainer,#tdpicv").unbind("click",dopons);

$("#jTagContainer,#tdpicv").bind("click",dopons);
}
fbind();
</script></div><div class="jTagLabels"><div style="clear:both"></div></div>';



$secho.='</div></div></div></div>

<div style="position:absolute;bottom:40px;" id="photobottomw">';


$secho.="".'
<div class="photobottom" id="photobottom" style="display:block;height:40px;z-index:5;position:absolute;left:0;top:0;width:682px;z-index:6;"><div style="position:relative;">
<div style="position:absolute;left:10px;top:12px;text-align:left;" class="albumlink" onclick="hideopm();" id="getextra"><div style="margin:0;padding:0;display:inline-block;text-overflow:ellipsis;white-space:nowrap;overflow:hidden;" id="calbum"></div><div style="padding:0;display:inline-block;position:relative;" class="mlm" id="norderv"><span id="norder" style="margin:0;padding:0;"></span> of <span id="totalpics"></span></div></div>
<div style="position:absolute;right:0px;bottom:-33px;">
<div style="position:relative;margin:0;padding:0;">
<script type="text/javascript">
function del_photo_g(sbid,a){
$("#pre_pop_container2dpg").css("display","block");
$(\'#div_dialog_footervo2dpg\').html(\'<label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:89px;" onclick="rdel_photo_g(\\\'\'+sbid+\'\\\',\\\'\'+a+\'\\\');"><input type="button" value="Confirm" class="uiButtonText"></label><label class="fsl uiButton" onclick="cancel_remove(1);" style="position:absolute;right:23px;"><input type="button" value="Cancel" class="uiButtonText"></label>\');
}
function rdel_photo_g(sbid,a){
var uidv=$("#uidv").val();
$.ajax({
  async: false,
  type: "POST",
  url: "/delete/delete_photo_g.php",
  data: { sbid : sbid, uidv:uidv },
  success: function(response) {
window.location="/'.$un.'/photos?album="+a;
  }
});

}
function rotate(albumid,photoid,w){
var aorder=$("#ao_gn").val();
var wki=$("#wk_gn").val();

var uidv=$("#uidv").val();

$("#img1").css("opacity","0");
$("#img1").attr("src","/images/transparent.png");
$.ajax({
  async: "false",
  type: "POST",
  url: "/rotate.php",
  data: { albumid : albumid, w : w, photoid : photoid },
  success: function(response) {
if(response.length>0){

var res=response.split("{}");

var corder=$("#ao_gn").val();
var calbumid=av_gn[corder];
var wk=$("#wk_gn").val();

if(calbumid==albumid && wk==wki){
p_gn[aorder]=res[0];
}
$("#picwidth").val(res[1]);
$("#picheight").val(res[2]);

var res1=res[1]+"px";
var res2=res[2]+"px";

var dpic=p_gn[aorder];


$("#img1").attr("src","/"+uidv+"/pics/"+res[0]);
$("#img1").css("width",res1);
$("#img1").css("height",res2);
$("#img1").css("opacity","1");
settoport();
//renewvvp();

}
  }
});
}
</script>
<script type="text/javascript">
stop_binding_pb=false;
function hideopm(){
$("#photobottomw").css("z-index","");
var tocheck=$("#dopm").css("display");
if(tocheck=="block"){
$("#cop2v").css("background-color","");
$("#cop2v").css("opacity","");

$("#dopm").css("display","none");

}
}
function displayopm(s){
var tocheck=$("#dopm").css("display");
if((tocheck=="none") && (!s)){
$("#photobottomw").css("z-index","310");
$("#cop2v").css("background-color","rgba(255, 255, 255, 0.2)");
$("#cop2v").css("opacity","1");

$("#dopm").css("display","block");
stop_binding_pb=true;
unbind_photobottom();
}
else{
$("#cop2v").css("background-color","");
$("#cop2v").css("opacity","");
$("#dopm").css("display","none");
}
}
function addlicon(){
$(".addliconid").removeClass("addlicon");
$(".addliconid").addClass("addliconv");
}
function addliconv(){
$(".addliconid").removeClass("addliconv");
$(".addliconid").addClass("addlicon");
}
function sharev(albumid,w,uidv,photoid,valu){
if(w=="p"){
$.ajax({
  async: "false",
  type: "POST",
  url: "/sharet.php",
  data: { albumid : albumid, w : w, uidv : uidv, photoid : photoid, valu : valu },
  success: function(response) {
if(response.length>0){
}
  }
});


}
}


function setprofilep(albumid,photoid){
$.ajax({
  async: "false",
  type: "POST",
  url: "/setprofilep.php",
  data: { albumid : albumid, photoid : photoid },
  success: function(response) {
if(response.length>0){

}
  }
});

}

</script>';



$secho.='
<div id="dopm" style="position:absolute;display:none;z-index:10;bottom:20px;left:85px;" class="uimenu" onclick="hideopm();">
<ul class="uimenuinner photoenv">
<li>
<span class="iteman" onmouseover="addlicon();" onmouseout="addliconv();" id="gv_add_location_link">
<i class="addlicon addliconid"></i><span>Add Location</span></span>
</li>
<li class="uimenuseparator" id="rotateoptions"></li>
<li class="elimfg"><span class="iteman" id="rotatel">Rotate Left</span></li><li class="elimfg"><span class="iteman" id="rotater">Rotate right</span></li><li class="uimenuseparator elimfg"></li>';
$secho.='<li id="extraoptions">
<span class="iteman" onclick="document.forms[\'dlpic\'].submit();">
Download
<form style="display:none" action="/dl.php" method="GET" target="likeframe" name="dlpic" id="dlpic">
<input type="hidden" name="tagu" value="">
<input type="hidden" name="fname" value="">
</form>
</span>
</li>
<li class="elimfg makealbcover"><a class="iteman" href="#">Make Album Cover</a></li><li class="elimfg"><a class="iteman" id="mprofilep" href="#">Make Profile Picture</a></li><li class="elimfg"><a class="iteman" id="change_photo_filter" href="#" onclick="edits(\'1\');"></a></li><li class="elimfg"><span class="iteman" id="delphoto">Delete This Photo</span></li>
';

$secho.='
<li class="uimenuseparator" id="fullscreenopv"></li>
<li class="fullscreenop"><a class="iteman fullsso" id="fullssv" href="#">Enter Fullscreen</a></li>
</ul>
<ul class="uimenuinner videoenv">
<li>
<span class="iteman" onmouseover="addlicon();" onmouseout="addliconv();" onclick="edits(\'f\');">
<div class="addlicon addliconid"></div> Add Location</span>
</li>
<li class="uimenuseparator" id="rotateoptions"></li>
<li class="elimfg">
<span class="iteman" id="edit_video_li">Edit This Video</span>
</li>
<li><span class="iteman displaydialog cerda" data-d_okay="Close" data-d_width="447" data-d_title="Embed Video" data-d_overlay="white" data-d_okay_function="close_dialog" data-d_exec_on_end="embed_video_fn" data-d_leave_loading="show_loading" id="embed_video_li">Embed Video</span><div class="dialog_msgs">You can use the code below to display the video on any site on the web. The privacy settings of the video will be applied.<div class="mtm"><textarea style="direction: ltr;" rows="6" cols="57" spellcheck="false" class="video_embed_textarea"></textarea></div></div></li>
<li class="elimfg"><span class="iteman displaydialog" id="delete_video_li" data-d_okay="Confirm" data-d_cancel="Cancel" data-d_width="447" data-d_title="Delete Video" data-d_overlay="white_create" data-d_exec_on_end="embed_video_fnv" data-d_okay_function="custom" data-d_cancel_function="close_dialog" data-d_leave_loading="show_loading_timeout" data-d_okay_function_custom="fjax" data-d_okay_a_fade="t" data-d_fjax="/video/delete_video.php" data-a_form="delete_video_id">Delete Video</span><div class="dialog_msgs">Are you sure you want to delete this video?</div><div style="display:none;" id="delete_video_id">
<input type="hidden" id="videoid" name="videoid" autocomplete="off">
<input type="hidden" id="delete_video_dialog" name="delete_video_dialog" autocomplete="off">
</div></li>
';
$secho.='
';

$secho.='
</ul>
</div>
<div class="likebutton2" onclick="tagphoto(); hideopm();" style="position:relative;" id="cop1v">Tag Photo</div><div class="likebutton2" onclick="displayopm();" style="position:relative;margin-left:2px;" id="cop2v">Options</div><div style="border-left:1px solid rgba(255,255,255,0.2);display:inline-block;margin:0;margin-right:5px;margin-left:1px;padding:0;height:15px;vertical-align:middle;cursor:default;text-align:left;color:rgb(179,179,179);font-size:13px;line-height:1.28;width:1px;" id="shareinsert"></div><div style="margin:0;padding:0;padding-right:5px;display:inline-block;"><div class="likebutton2" style="position:relative;" id="cop3v">Share</div><div style="position:relative;margin:0;padding:0;display:inline-block;" id="likesharew"><div class="likebutton2 likepicclickvf like" style="position:relative;" id="cop4v" title="Keyboard shortcut: L" data-l_source="f" data-l_rid="likepicx26">Like</div></div><div style="position:relative;margin:0;padding:0;display:none;"><div class="likebutton2 unlike likepicclickf likepicclickfpb" data-l_source="f" data-l_rid="likepicx26" style="position:relative;" id="cop5v" title="Keyboard shortcut: L">Unlike</div></div><div style="position:relative;margin:0;padding:0;display:inline-block;" id="repinsharew"><div class="likebutton2 repinclickvf repin" style="position:relative;" id="cop12v" title="Keyboard shortcut: R" data-l_source="f" data-l_rid="repinx26">Repin</div></div><div style="position:relative;margin:0;padding:0;display:none;"><div class="likebutton2 unpin repinclickf repinclickfpb" data-l_source="f" data-l_rid="repinx26" style="position:relative;" id="cop13v" title="Keyboard shortcut: R">Unpin</div></div></div><div class="infullscreen likebutton2" style="display:none;"><a title="Toggle comments view" id="commentsview" style="display:block;color:#ffffff!important;"><span><span class="likeCount">
<i class="likesg" style="top:3px;"></i><span class="likeCountv"></span></span><span class="commentCount"><i class="commentsg" style="top:3px;"></i><span class="commentCountv"></span></span></span></a></div></div></div></div></div>
<div class="photobottom" id="photobottom2" onclick="hideopm();" style="display:none;width:682px;height:40px;z-index:5;position:absolute;left:0;top:0;z-index:6;"><div style="position:relative;text-align:center;top:10px;">Click on the photo to start tagging.<span class="albumlinkv" style="margin-left:6px;" onclick="donetagging();">Done Tagging</span></div></div>
</div>
</div>
</div>
<script type="text/javascript">
$("#jTagContainer,#tdpicv,#photobottom,#photobottom2").unbind("mousemove",setpons);
$("#jTagContainer,#tdpicv,#photobottom,#photobottom2").bind("mousemove",setpons);

function prevclick(evt){evt.stopPropagation();
evt.preventDefault();$("#previousr").click();}
function nextclick(evt){evt.stopPropagation();
evt.preventDefault();$("#nextr").click();}


function set_pics_environment(){
$("#previous").unbind("click",prevclick);
$("#next").unbind("click",nextclick);

$(".videoenv").css("display","none");
$(".photoenv").css("display","inline-block");
$("#jTagContainer,#tdpicv").unbind("click",dopons);
$("#jTagContainer,#tdpicv").bind("click",dopons);

$("#jTagContainer,#tdpicv,#photobottom,#photobottom2").unbind("mousemove",setpons);
$("#jTagContainer,#tdpicv,#photobottom,#photobottom2").unbind("mousemove",setponsv);

$("#jTagContainer,#tdpicv,#photobottom,#photobottom2").bind("mousemove",setpons);


//$(".picturetheater").find(".filters_edit").removeClass("hidden_sb");
}

function set_vids_environment(){
$(".photoenv").css("display","none");
$(".videoenv").css("display","inline-block");
$("#jTagContainer,#tdpicv,#photobottom,#photobottom2").unbind("mousemove",setpons);
$("#jTagContainer,#tdpicv,#photobottom,#photobottom2").unbind("mousemove",setponsv);
$("#jTagContainer,#tdpicv,#photobottom,#photobottom2").bind("mousemove",setponsv);

$("#jTagContainer,#tdpicv").unbind("click",dopons);

$("#previous").unbind("click",prevclick);
$("#next").unbind("click",nextclick);

$("#previous").bind("click",prevclick);
$("#next").bind("click",nextclick);

//$(".picturetheater").find(".filters_edit").addClass("hidden_sb");
}

$("#edit_video_li").bind("click",function(){
var corder=$("#ao_gn").val();
var vid=pi_gn[corder];
window.location="/video/editvideo.php?v="+vid;
});

$("#delete_video_li").bind("click",function(){

});


function embed_video_fn(){
var corder=$("#ao_gn").val();
var vid=pi_gn[corder];
var duidv=o_gn[corder];
var dialogid=$("#embed_video_li").attr("data-dialogid");


$(\'#loading_d_\'+dialogid+duidv).prepend(\'<a style="display:none;" id="embed_video_fjax" fjax="/video/embed_video.php?vid=\'+vid+\'&uidv=\'+duidv+\'&dialogid=\'+dialogid+\'"></a>\');

$(".video_embed_textarea").bind("click",function() {
$(this).focus();
$(this).select();

});

$("#embed_video_fjax").click();
}

function embed_video_fnv(){
var dialogid=$("#delete_video_li").data("dialogid");
var corder=$("#ao_gn").val();
var vid=pi_gn[corder];
$("#delete_video_dialog").val(dialogid);
$("#videoid").val(vid);
}

	</script>
</td><td style="width:300px;text-align:right;background-color:#ffffff;max-width:300px;padding:0;margin:0;padding-top:20px;padding-left:20px;padding-right:20px;position:relative;overflow:hidden;" id="commentsofp" class="fader_holder" onclick="hideopm();"><div style="margin:0;padding:0;">';

$secho.='



<script type="text/javascript">
function showme(x){
$(".showme").css("display","none");
$(".showme"+x).css("display","block");
}
function hideme(x){
if(x=="a"){$(".showme").css("display","none");}
$(".showme"+x).css("display","none");
}
function gmo(){
$("#dmorev").css("display","none");
$("#dmorevv").css("display","none");
$("#dmore").css("display","inline");
$("#dmorevvv").css("display","inline");
}';

/*
function showlabels(){
	var checkit=$("#tagoverlay");
	if(checkit){
$(\'.tagoverlay\').prepend(\'\');
renewvvp();


	}
	else{
		setTimeout("showlabels()",50);
	}
}

setTimeout("showlabels()",0);

';
*/

	$secho.='

if(cuadradito===undefined){
var cuadradito=function(e) {
var dtarget=e.target;
if($(dtarget).attr("id")=="new_comment"){
return false;
}
  if (e.keyCode == 27) {
  var ce=$("#cuadradito");
  if(ce.length>0){
  var cc=$("#cuadradito").css("display");
  if(cc=="block"){
  $(".jTagSaveClose").click();
  }else{
  if(!isfull){
  $("#closeimgv").click();
  }
  }
  }else{
  if(!isfull){
  $("#closeimgv").click();
  }
  }
  }
  else if (e.keyCode == 37){
	if(($(document.activeElement).is("input")==true) || ($(document.activeElement).is("textarea")==true)){}
	else{
		if(!winkey_pressed){
	$("#previousr").click();
		}
	}
  }
    else if (e.keyCode == 39){
	if(($(document.activeElement).is("input")==true) || ($(document.activeElement).is("textarea")==true)){}
	else{
	if(!winkey_pressed){
	$("#nextr").click();
	}
	}
  }
}

}

$(document).off("keydown",cuadradito).on("keydown",cuadradito);

function windowback(){
	  $(".wvideo-js-hd-gallery").remove();
		  $(".wvideo-js-gallery").remove();

		  $("#typeanynamews").append($("#typeanynamew"));
$(".faceBoxw").remove();

$("body").css("padding-right","");
$("body").css("overflow-y","scroll");
	$("#ltot").val("");
$("#picturetheater").css("display","none");
//	cancel_filter();
	  $("#img1").css("opacity","0");
	     $("#img1").attr("src","");
	  $("#img1").attr("src","/images/transparent.png");
$("#tdpic").css("width","682px");
$("#tdpicv").css("width","682px");
$("#img1").css("width","300px");
$("#img1").css("height","300px");
$("#divstage").css("height","100%");
$("#divstage").css("width","100%");
$("#snowliftpopup").css("height","520px");
$("#snowliftpopup").css("width","1000px");
$("#tdpic").css("height","");
$("#tdpicv").css("height","");
$("#commentsofp").css("height","");
$("#img1").attr("src","/images/transparent.png");
$("#ftimeo").val("n");

$("#picscommentscontainerx26").html("");
$("#dateofp").html("");
$("#uidvpinfo").html("");
$("#maintav").remove();
$(".elim").remove();
$(".ob").remove();
$(".rme").remove();
$(".rmev").remove();
$(".jTagTagv").remove();
$("#picwidth").val("300");
$("#picheight").val("300");
settoport();
donetagging(\'s\');
displayopm(\'s\');



}

</script>


<div style="position:relative;"><div class="closeimg" style="position:absolute;right:-10px;top:-10px;" onclick="windowback();" id="closeimgv" data-t_text="Press ESC to close" data-t_position="bottom"></div></div><table style="background:#ffffff;width:100%;height:100%;position:relative;margin:0;padding:0;" cellspacing="0" cellpadding="0"><tr><td>
<div style="margin:0;padding;0;overflow-y:hidden;overflow-x:hidden;height:100%;padding-right:20px;" id="cheight">
<div id="appendcm" class="appendcm">
<table style="border-collapse:separate;padding:0;margin:0;background:#ffffff;position:relative;width:308px;" cellspacing="0" cellpadding="0"><tr><td style="text-align:left;width:100%;"><table style="padding:0;margin:0;border-collapse:collapse;width:100%;" cellspacing="0" cellpadding="0" id="appendlikex26"><tr><td style="text-align:left;"><table style="margin:0;padding:0;border-collapse:collapse;margin-bottom:4px;" cellspacing="0" cellpadding="0"><tr><td id="uidvpinfo"></td></tr></table><td style="padding-left:4px;text-align:left;width:308px;padding-left:6px;max-width:414px;" id="dateofp"></td></tr>';

$secho.='
<tr><td colspan="2" style="font-size:13px!important;padding-top: 15px;"><span style="margin:0;padding:0;" id="pdesc"></span><div style="margin:0;padding:0;display:inline-block;"><div style="z-index:6;position:relative;margin:0;padding:0;margin-top:10px;display:none;max-width:308px;width:308px;" id="edittab">

<div style="position:relative;">
<div class="highlighter_wrapper" style="position:relative;height:51px;"><div class="highlighter" style="padding:0;position:absolute;width:306px;overflow-y:hidden;max-height:95px;padding-top:1px;"><div style="width:auto;min-height:21px;"><span class="highlighterContent" style="max-width:100%;vertical-align:top;display:inline-block;position:relative;top:3px;color:transparent;font-size:11px!important;padding:0 4px;"></span><div class="highlighterAuxContent" style="vertical-align:top;display:inline-block;position:relative;"><div class="metadataFragment"></div></div></div></div><div style="background: none repeat scroll 0% 0% transparent;height:auto;border:0px none;" class="uiTypeahead composerTypeahead mentionsTypeahead"><div style="padding:0px;border:0px none;" class="step_autocomplete"><div style="overflow:hidden;cursor:default;"><textarea style="cursor:text;visibility:visible;z-index:5;border:1px solid rgb(189, 199, 216);border-bottom:0;display:block;position:relative;width:308px;max-height:100px;background-color:transparent;" class="uiTextareaAutogrow input mentionsTextarea textInput says2 dcphmgc to_highlighter" data-au_grow="" data-au_nopadding="t" title="Add a description" placeholder="Add a description" autocomplete="off" id="says"></textarea></div></div><div><div style="width:100%;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;border:0;" class="autocomplete_findme inputtext dcphlgc displaynoneimportant hidden_sb" data-ac_enable="wall_uploaderdv30000" data-ac_liwidth="306" data-ac_inputw="280" data-ac_url="/autocomplete/jump_note.php" data-ac_style="with_pic" data-ac_custom_f="add_to_highlighter" data-ac_placeholder="Who where you with?" data-ac_position="fixed" data-ac_custom_ul=\\\'$(this).css("margin-left","-1px"); $(this).css("margin-top","-14px");\\\'></div><input type="hidden" name="descriptionv" autocomplete="off"></div></div></div>
</div>

<script type="text/javascript">
$("#says").bind("keyup",to_highlighter_keyup);
$("#says").bind("scroll",keep_scroll_to_highlighter);
$("#says").bind("keyup",keep_scroll_to_highlighter);
</script>
<div id="nod" style="display:none;"></div>';


if($browser=="mozilla"){
$dwidth=298;	
}
else{
$dwidth=306;	
}


$secho.='<div style="width:'.$dwidth.'px;position:relative;top:-2px;z-index:800;"><div style="width:100%;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;border:1px solid #bdc7d8;border-top:1px dashed #bdc7d8;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="with_gallery" data-ac_liwidth="198" data-ac_inputw="306" data-ac_url="/autocomplete/jump_note.php?photos_count=t" data-ac_style="with_pic" data-ac_placeholder="Who where you with?" data-ac_position="fixed" data-ac_custom_f="new_tag" data-ac_custom_f_r="remove_tag"></div></div><div style="margin:0;padding:0;display:inline-block;width:300px;"><div id="editpiw300001" style="margin:0;padding:0;display:inline-block;position:relative;left:0px;top:-13px;margin-top:20px;margin-right:12px;float:right;width:288px;"><div id="editpiwv300001" style="margin:0;padding:0;display:inline-block;position:relative;left:0px;height:22px;top:20px;"><label id="removeedit300001" class="removeedit" style="display:none;z-index:10;" title="Remove" onclick="swapc(1,300001);"><input autocomplete="off" type="button" class="removeedit2" style="padding:0;cursor:pointer;"></label><input autocomplete="off" type="hidden" id="statec300001"><input autocomplete="off" type="hidden" id="countryc300001"><input autocomplete="off" type="hidden" id="cityc300001"><input autocomplete="off" type="hidden" id="stateedit300001"><input autocomplete="off" type="hidden" id="cityv300001"><input type="text" id="city300001" class="loc2 dcphlgc" style="position:relative;top:0px;margin-top:10px;left:0px;border:1px solid rgb(189, 199, 216);z-index:2;visibility:visible;background-color:transparent;display:block;width:300px!important;top:-10px;"  placeholder="Where was this photo taken?"></div></div></div>';


$secho.='<div class="filters_edit filters_edit_wrap" data-from_uploader="gallery_viewer"><div id="filter_used" class="filters_selection_wrapper" style="margin-top:5px;height:55px;width:298px;padding:0px;margin-left:0px;margin-right:0px;border:1px solid #dddddd;position:relative;top:0px;z-index:5;background-color:#ffffff;display:block;overflow-y:auto;"></div><div class="hidden_sbr filter_options"><input type="hidden" value="1" name="frame"><input type="hidden" value="1" name="frame_original"><input type="hidden" name="tilt_shift" value="2"><input type="hidden" name="tilt_shift_original" value="2"><input type="hidden" name="custom_color" value=""><input type="hidden" name="custom_hsb" value=""><input type="hidden" name="brightness" value="0"><input type="hidden" name="contrast" value="0"></div><div class="bottom_menu_photo marco marco_active" style="border-left:1px solid rgb(221, 221, 221);border-bottom:1px solid rgb(221, 221, 221);float:left;cursor:pointer;" data-t_text="Toggle frame on/off" data-t_position="bottom" data-t_align="center"><div class="marco_mask div_mask hidden_sb"></div></div><div class="bottom_menu_photo brightness" style="float:left;cursor:pointer;border-bottom:1px solid rgb(221, 221, 221);" data-t_text="Adjust brightness" data-t_position="bottom" data-t_align="center"><div class="brightness_mask div_mask hidden_sb"></div></div><div class="hidden_sb brightness_slider" data-dopener="$(this).parents(\'#picturetheater\').eq(0)"></div><div class="bottom_menu_photo contrast" style="float:left;cursor:pointer;border-bottom:1px solid rgb(221, 221, 221);" data-t_text="Adjust contrast" data-t_align="center"><div class="contrast_mask div_mask hidden_sb"></div></div><div class="hidden_sb contrast_slider"></div><div class="bottom_menu_photo drop" style="border-bottom:1px solid rgb(221, 221, 221);cursor:pointer;float:left;" data-t_text="Toggle tilt shift on/off"><div class="drop_mask div_mask hidden_sb"></div></div><div class="bottom_menu_photo colorpickers" style="border-bottom:1px solid rgb(221, 221, 221);cursor:pointer;float:left;" data-t_text="Open Color Picker"><div class="colorpickers_mask div_mask hidden_sb"></div></div></div>';


$secho.='<label class="mtm mbs uiButton" style="position:relative;float:right;" onclick="cancelad();"><input type="button" class="cancelad2" value="Cancel"></label><label class="mtm mbs uiButton uiButtonConfirm" style="position:relative;float:right;margin-right:4px;" onclick="readyc(\'1\');"><input type="button" class="donee2" value="Done Editing"></label></div></div></div>

</td></tr>';

$secho.='

<tr><td class="friendslink2" colspan="2" style="width:240px;padding-top:5px;" id="mainta">
</td></tr>
<tr><td colspan="2" id="gv_edit_photo">
<div style="margin:0;padding:0;font-weight:bold;margin:14px 10px 0pt 26px;line-height:0;display:none;" id="ctotv"></div>

<input type="hidden" id="bsavedv">
<input type="hidden" id="toteti" value="0"><input type="hidden" id="ctoteti" value="">


<script type="text/javascript">
function setridv(id,cuidvjs){
var bsaved=$("#bsavedv").val();
$("#tag"+bsaved).attr("name",id);
var e=cuidvjs;
if(e!=""){
var er=\'<span style="display:none;" id="otag\'+bsaved+\'" name="\'+e+\'"></span>\';
$("#tag"+bsaved).prepend(er);
}
}
function hidectoteti(){
$("#currentp").css("visibility","hidden");
$("#currentp").css("z-index","5");
}
function renewvvv(){
$("#currentp").css("visibility","visible");
$("#currentp").css("z-index","5");
}

function renewvvpv(){

$(".oappmev").each(function(){
var variv=$(this).attr("rel");

var ct=$(this).attr("id");
ct=ct.replace("oappme","");

var variv=$(this).data("who");

$("#appme"+ct).html(\'&nbsp;&#183;&nbsp;<span class="friendslinkv2 tag_remove_case" style="margin-left:2px;" data-remove_case="1" data-uidv="\'+variv+\'">Remove tag</span>\');

});


}


$(document).on("mouseover",".oappme",function(){
var tagid=$(this).attr("data-tagid");
$("#tagvvv"+tagid).css("display","none");
$("#tagvv"+tagid).css("display","none");
$("#tagv"+tagid).css("display","none");
$("#tagvv"+tagid).css("display","none");
$("#tagvvv"+tagid).css("display","none");
$("#tag"+tagid).css("opacity","1");
$("#tag"+tagid).css("border","2px solid white");
$("#tag"+tagid).css("display","block");
});
$(document).on("mouseout",".oappme",function(){
var tagid=$(this).attr("data-tagid");
$("#tagv"+tagid).css("display","block");
$("#tagvv"+tagid).css("display","block");
$("#tagvvv"+tagid).css("display","block");
$("#tag"+tagid).css("opacity","0");
$("#tag"+tagid).css("border","0");
$("#tag"+tagid).css("display","block");
});


$(document).on("mouseleave","#hide_me_a",function(){
hideme("a");
});

$(document).on("mouseleave",".showme",function(){
var tagid=$(this).attr("data-tagid");
hideme(tagid);
});

var editingphoto=false;

function renewvvp(frun,no_renew){
if(no_renew===undefined){
no_renew="f";
}

var photoid=$("#thephoto").val();
photoid=$.trim(photoid);
var uidv=$("#uidv").val();
var albumidi=$("#alb_name").val();

autosearcho=false;


var corder=$("#ao_gn").val();
var tagged=t_gn[corder];


	if(strpos(tagged,",")!==false){
var tagged=$.parseJSON(tagged);
tagged=tagged.tagged;
}
else{var tagged=false;}



if(!tagged){
var toteti=0;
}
else{
var toteti=tagged.length;
}

var tagged_length=toteti-1;

var resultscov="";
var resultsxov="";
var ctoteti="";

var tagsids="";
var tagsnames="";

var dusernv="";
var dusernvv="";

if(tagged){
resultsxov+=\'<div style="position:relative;margin-bottom:10px;" id="maintav"><div style="position:relative;left:0pxc;"><div style="display:inline;margin:0;padding:0;" id="hide_me_a">With \';
}


var suf="with_gallery";

if(tagged){

		$(tagged).each(function(k,v){
			//tagged registrados en el servidor
			var px=v.positionX;
			var py=v.positionY;
			var tw=v.width;
			var th=v.height;
			var tagid=v.tagid;
			var id=v.id;
			var un=v.un;
			var ufn=v.ufn;
			var tp=v.tp;
			var tb=v.tb;
			var tb_fn=v.tb_fn;
			var tb_un=v.tb_un;
			var label=v.label;

if(tp==0){
var photos_link="";
}
else{
if(tp>1){
var ps="s";
}
else{
var ps="";
}
var photos_link=\'<a href="/\'+un+\'/photos" class="fwn uiLinkLightBlue">(\'+tp+\' photo\'+ps+\')</a>\';
}

if(id!=""){
var tag_content=\'<a class="tagProfileLink" href="/\'+un+\'">\'+ufn+\'</a>&nbsp;\'+photos_link;
var tag_contentv=\'<a href="/\'+un+\'" data-tagid="\'+tagid+\'" class="oappme" id="oappmev\'+tagid+\'">\'+ufn+\'</a>\';
var tag_contentvv=\' data-uidv="\'+id+\'" \';
var islabel="f";
}
else{
var id=toascii(label);
var tag_content=label;
var tag_contentv=\'<a href="#" class="oappme ld_link" data-tagid="\'+tagid+\'" class="oappme" id="oappmev\'+tagid+\'">\'+label+\'</a>\';
var islabel="t";
}
resultscov+=\'<div id="tag\'+tagid+\'" name="\'+id+\'" class="jTagTagv" style="width:\'+tw+\'%;height:\'+th+\'%;top:\'+py+\'%;left:\'+px+\'%;border:0pt none;opactiy:0;display:block;"><span data-islabel="\'+islabel+\'" style="display:none;" id="otag\'+tagid+\'" name="\'+id+\'"></span><div style="width:100%;height:100%;" class="jTagTagvc"><div id="tagv\'+tagid+\'" class="jTagDeleteTag" style="visibility:hidden;" data-uidv="\'+id+\'" data-tagid="\'+tagid+\'"></div><span class="tagvvv tagName" id="tagvvv\'+tagid+\'" style="display:none;">\'+tag_content+\'<div id="tagvv\'+tagid+\'" class="jpointerv" style="display:block;"></div></span></div></div>\';

ctoteti+=","+tagid;

resultsxov+=\'<div data-t_text="" data-t_position="bottom" data-t_keepalive="t" data-t_white="t" style="position:relative;display:inline-block;margin:0;padding:0;" onmouseover="showme(\\\'\'+tagid+\'\\\');" id="showmev\'+tagid+\'">\'+tag_contentv+\'<div class="showme" id="showme\'+tagid+\'" data-tagid="\'+tagid+\'" style="background:transparent;padding-top:10px;position:fixed;z-index:402;display:none;"></div></div><div class="tooltip_text"><div style="margin:0;display:block;color:#797979;background:#ffffff;z-index:402;" class="linkbywho">Tagged&nbsp;by&nbsp;<a href="/\'+tb_un+\'" id="oappme\'+tagid+\'" data-bywho="\'+tb+\'" data-who="\'+id+\'"  class="oappmev">\'+tb_fn+\'</a><span id="appme\'+tagid+\'"></span></div></div>\';

if(k!=tagged_length){
resultsxov+=\', \';
}

			if(islabel=="f" && no_renew=="f"){
			var ilusert=id;
			var dusern=ufn;

			tagsids+=","+ilusert;
			tagsnames+=","+dusern;

			dusernv+=\'<div id="empty\'+suf+\'\'+ilusert+\'">\'+dusern+\'</div>\';
			dusernvv+=\'<div id="empty2\'+suf+\'\'+ilusert+\'">\'+dusern+\'</div>\';

			}

		});
}

if(tagged){
resultsxov+=\'.</div></div></div>\';
}

if(no_renew=="f"){

$(document).ready(function(){
$("#empty"+suf).append(dusernv);
$("#empty"+suf+"2").append(dusernvv);

$("#tags"+suf).val(tagsids);
$("#tags"+suf+"v").val(tagsnames);

renewvv_mt("",suf);
});
}


$(".jTagTagv").remove();


$(\'.jTagLabels\').before(resultscov);

$(".tagvvv").click(function(e){e.stopPropagation();});

$("#ctoteti").val(ctoteti);
$("#toteti").val(toteti);

$("#maintav").remove();


$("#mainta").append(resultsxov);

//$(".showme").length>0 &&
if(!editingphoto){
$("#mainta").parent().css("display","table-row");
}
else{
$("#mainta").parent().css("display","none");
}

setSlider($("#cheight"));

setmt();

if(frun=="frun"){
facedet("t");
}
else{
facedet();
}


var cuidv=$("#cuidv").val();
if(uidv==cuidv){
renewvvpv();
}
else{

$(".oappmev").each(function(){
var ct=$(this).attr("id");
ct=ct.replace("oappme","");

var variv=$(this).data("bywho");
var varivv=$(this).data("who");

if(variv=="'.$uid.'" || varivv=="'.$uid.'"){
if(variv=="'.$uid.'"){var rcase="2";}else{var rcase="3";}
$("#appme"+ct).html(\'&nbsp;&#183;&nbsp;<span class="friendslinkv2 tag_remove_case" style="margin-left:2px;" data-remove_case="\'+rcase+\'" data-uidv="\'+varivv+\'">Remove tag</span>\');
}



});



}


setmt();




}


function autoGrowFieldta(f, max) {
   var max = (typeof max == \'undefined\')?1000:max;
   if (f.scrollHeight > max) {
      if (f.style.overflowY != \'scroll\') { f.style.overflowY = \'scroll\'; }
      f.style.padding="0";
	  f.style.paddingLeft="3px";
	  f.style.height="55px";

	  return;
   }
   else{
	  if (f.style.overflowY != \'hidden\') { f.style.overflowY = \'hidden\'; }
	  f.style.padding="3px";
	  f.style.height="55px";


	  return;
   }
}



function readyc(jl){
$("#media_title_g").css("display","table-row");


editingphoto=false;
var photoid=$("#thephoto").val();
photoid=$.trim(photoid);


	$(".ob").css("display","inline-block");
var tocheck=$("#says").val();
tocheck=$.trim(tocheck);
if(tocheck!=""){
var tocheck=$("#says").parents(".highlighter_wrapper").eq(0).find(".highlighterContent").html();
}
if(tocheck=="Add a description"){tocheck="";}
var selected_album=$("#alb_name").val();
$.ajax({
  type: "POST",
  url: "/changepd.php",
  data: { photoid : photoid, desc : tocheck, selected_album : selected_album },
  success: function(response) {
  }
});
if(tocheck==""){
var tocheck=\'<div class="lb add_desc_link fsl"><a href="#" onclick="edits(3)">Add a description</a></div>\';
}else{
var tocheck=$("#says").parents(".highlighter_wrapper").eq(0).find(".highlighterContent").html();
}

$("#pdesc").html(tocheck);
var corder=$("#ao_gn").val();
says_gn[corder]=$("#says").val();
saysv_gn[corder]=tocheck;

if($("#says").val()!=""){
$("#gv_add_loc").remove();
}

var tocheck=$("#city30000"+jl).val();

tocheck=$.trim(tocheck);
if(tocheck==""){$("#ob2").css("display","inline-block");}
else{$("#ob2").css("display","none");}

var selected_album=$("#alb_name").val();
var corder=$("#ao_gn").val();
var uidv=o_gn[corder];



$.ajax({
  type: "POST",
  url: "/changeplv.php",
  data: { selected_album : selected_album, location : tocheck, photoid : photoid,uidv:uidv},
  success: function(response) {
if(response.length>0){
}
else{}
}
});
if(tocheck==""){$("#plocationvv").html(""); $("#plocation").html(tocheck);}
else{
$("#plocationvv").html("At&nbsp;");
$("#plocation").html(tocheck);
}
if(tocheck!=""){
$("#plocationv").parent().css("display","table-row");
}
else{
$("#plocationv").parent().css("display","none");
}


$("#toppadd").css("padding-top","5px");

$("#pdesc").css("display","inline-block");
$("#edittab").css("display","none");

if($(".showme").length>0){
$("#mainta").parent().css("display","table-row");
}

//renewvvp();
}
function cancelad(s,dw,dwv){
editingphoto=false;

$("#media_title_g").css("display","table-row");

if(s=="jl"){
$("#gv_add_loc").remove();
return false;
}
	$(".ob").css("display","inline-block");
var says=$("#pdesc").html();
if(says=="" || $("#pdesc").find(".add_desc_link").length>0){
says="Add a description";
var corder=$("#ao_gn").val();
var uidv=o_gn[corder];
if(uid==uidv){
$("#pdesc").html(\'<div class="lb add_desc_link fsl"><a href="#" onclick="edits(3)">\'+says+\'</a></div>\');
$("#pdesc").parent().parent().css("display","table-row");
}
else{
$("#pdesc").parent().parent().css("display","none");
}
}
else{
$("#pdesc").parent().parent().css("display","table-row");
}

var tocheck=$("#plocation").html();
$("#city300001").val(tocheck);

if(tocheck.length>0){ $("#plocationv").parent().css("display","table-row"); $("#toppadd").css("padding-top","0px"); $("#ob2").css("display","none");}
else{$("#plocationv").parent().css("display","none"); $("#ob2").css("display","inline-block");}

$("#toppadd").css("padding-top","5px");

$("#pdesc").css("display","inline-block");
$("#edittab").css("display","none");
	if($(".showme").length>0){
$("#mainta").parent().css("display","table-row");
}
if(!s){
//renewvvp();
}

var corder=$("#ao_gn").val();
if(dw){
$("#says").val(dw);
}else{
$("#says").val(says_gn[corder]);
}
if(dwv){
$("#says").parents(".highlighter_wrapper").find(".highlighterContent").html(dwv);
}else{
$("#says").parents(".highlighter_wrapper").find(".highlighterContent").html(saysv_gn[corder]);
}
var active=document.activeElement;
$("#says").blur();
$(active).focus();

}
function edits(f){
editingphoto=true;
$("#media_title_g").css("display","none");
$(".ob").css("display","none");
$("#toppadd").css("padding-top","0");
var tocheck=$("#plocation").html();
$("#pdesc").css("display","none");
$("#plocationv").parent().css("display","none");
$("#edittab").css("display","inline-block");
$("#mainta").parent().css("display","none");
renewvvp();
//hack for display none in tags container to determine client width with a visible element now
if(f=="f"){$("#city300001").focus();}
else if(f=="t"){$("#with_gallery").focus();}
else if(f==3){$("#says").focus();}
setmt();

}';

include("ajax/common/set_photo_location.php");

$secho.='
function add_location_non_owner(){

}



</script>
<input type="hidden" id="thephoto" value="">
<input type="hidden" id="thephotol" value="">
<input type="hidden" id="thephotom" value="">
<input type="hidden" id="thetable" value="">

<script type="text/javascript">
</script>';
$secho.='
<script type="text/javascript">
function removewv(id,cuidvjs,photoid,label){
					var thephotol=$("#thephotol").val();
					var thephotom=$("#thephotom").val();
					var thetable=$("#thetable").val();
					var dcase=$("#dcase").val();
					'."
					$.post(\"/ajax/tags/gallery_viewer.php\",{'action':'delete','id':id,'cuidvjs':cuidvjs,'thephotol':thephotol,'thephotom':thephotom,'photoid':photoid,'thetable':thetable,'label':label,'dcase':dcase});	".'

}

function removew(t,cuidvjs){

	t="tagv"+t;
							var elo=$("#"+t).parent().parent().attr("name");
                            var oelo=$("#"+t).parent().parent().attr("id");
                            oelo=oelo.replace("tag", "");
                            var label=$("#tagvvv"+oelo).html();
							label=label.split("<");
							label=label[0];
                            label=$.trim(label);
					var cuidvjs=$("#otag"+oelo).attr("name");
  if(cuidvjs===undefined){cuidvjs="";}
        var photoid=$("#thephoto").val();
        photoid=$.trim(photoid);
  removewv(elo,cuidvjs,photoid,label);
                    var elov=$("#"+t).parent().parent().attr("id");
                    elov=elov.replace("tag", "");

                    var ctoteti=$("#ctoteti").val();
                    ctoteti=ctoteti.replace(\',\'+elov,\'\');

                    $("#ctoteti").val(ctoteti);


                    var toteti=$("#toteti").val();
                    toteti=parseInt(toteti);
                    toteti=toteti-1;
                    $("#toteti").val(toteti);
                    if(toteti=="0"){$("#ctotv").html("");}
                 	else{$("#ctotv").html(toteti);}
					$("#"+t).parent().parent().remove();
					 renewvvp();





}
		</script>

</td></tr>
';


$secho.='
<tr><td id="plocationv" colspan="2" style="font-size:13px;display:table-cell;">
<script type="text/javascript">
function gclicked(){
$("#cop3v").click();
}
</script>
<div style="margin:0;padding:0;display:inline-block;width:100%;"><span style="color:#808080;display:inline-block;" id="plocationvv">At</span><span style="margin:0;padding:0;display:inline-block;" id="plocation"></span></div></td></tr>
<tr><td style="padding-top:5px;padding-bottom:4px;" id="toppadd" colspan="2"><div style="position:relative;">&nbsp;<div style="position:absolute;left:0px;top:-3px;padding-top:4px;" class="friendslink3o"><form name="likepicx26" id="likepicx26" class="lu_actions" method="POST" target="likeframe" style="display:inline;margin:0;padding:0;"><input type="hidden" name="lpid" id="lpidv" value=""><input type="hidden" name="appendlike" value="x26"><input type="hidden" name="whatisit" value="photo"><input type="hidden" name="duidv" id="duidvv" value=""><input type="hidden" name="cwd" value="esfoto"><input type="hidden" name="albumid" id="alb_namev" value=""></form><div class="lbl" style="display:none;"><a href="#" class="unlike friendslinkvgs likepicclickf likepicclickfsb" data-l_source="f" data-l_rid="likepicx26">Unlike</a></div><div class="lbl"><a href="#" class="friendslinkvgs likepicclickvf like" data-l_source="f" data-l_rid="likepicx26">Like</a></div><span style="position:relative;top:0px;left:0px;margin-right:2px;margin-left:2px;color:#666666;">&#183;</span><form name="repinx26" id="repinx26" class="lu_actions" method="POST" target="likeframe" style="display:inline;margin:0;padding:0;"><input type="hidden" name="lpid" id="lpidv" value=""><input type="hidden" name="appendlike" value="x26"><input type="hidden" name="whatisit" value="photo"><input type="hidden" name="duidv" id="duidvv" value=""><input type="hidden" name="cwd" value="esfoto"><input type="hidden" name="albumid" id="alb_namev" value=""></form><div class="lbl" style="display:none;"><a href="#" class="unpin friendslinkvgs repinclickf repinclickfsb" data-l_source="f" data-l_rid="repinx26">Unpin</a></div><div class="lbl"><a href="#" class="friendslinkvgs repinclickvf repin" data-l_source="f" data-l_rid="repinx26">Repin</a></div><span style="position:relative;top:0px;left:0px;margin-right:2px;margin-left:2px;color:#666666;" id="repin_separator">&#183;</span><a href="#" onclick="comment();">Comment</a><span style="position:relative;top:0px;left:0px;margin-right:2px;margin-left:2px;color:#666666;" id="insertshareafter">&#183;</span><span class="friendslinkvgs" onclick="gclicked();">Share</span>';

$secho.='<div style="margin:0;padding:0;display:none;" id="editslv"><span style="position:relative;top:0px;left:0px;margin-right:2px;margin-left:2px;color:#666666;" id="editsl">&#183;</span><a href="#" onclick="edits();">Edit</a></div>';

$secho.='</div></div></td></tr>

<tr id="photo_theater_like" class="hidden_sb"><td colspan="2" class="friendslink3" style="color:#666666;background-color:rgb(237,239,244);padding-top:0px;width:280px;max-width:280px;border-bottom:0px solid #ffffff;"><div class="friendslinkvl" style="background-color:#edeff4;border-bottom:0px solid #ffffff;position:relative;padding:3px;margin-left:0px;display:block;"><div style="display:block;margin:0;padding:0;position:relative;left:0;"><div style="margin:0;padding:0;display:block;cursor:default;"><div title="Like this item" class="likebtn2 like"></div><div></div></div> </div></div></td></tr>

<tr id="photo_theater_repin" class="hidden_sb"><td colspan="2" class="friendslink3" style="color:#666666;background-color:rgb(237,239,244);padding-top:0px;width:280px;max-width:280px;border-bottom:0px solid #ffffff;"><div class="friendslinkvl" style="background-color:#edeff4;border-bottom:0px solid #ffffff;position:relative;padding:3px;margin-left:0px;display:block;"><div style="display:block;margin:0;padding:0;position:relative;left:0;"><div style="margin:0;padding:0;display:block;cursor:default;"><div title="Repin this item" class="repinbtn2 repin"></div><div></div></div> </div></div></td></tr>

<tr id="sharesp"><td colspan="2" class="friendslink3" style="color:#666666;background-color:rgb(237,239,244);padding-top:9px;width:280px;max-width:280px;border-bottom:0px solid #ffffff;border-top:1px solid #ffffff;"><div class="share_bt" style="float:left;display:inline-block;position:relative;left:5px;top:-4px;"></div><div style="position:relative;left:11px;top:-3px;display:inline-block;" id="prevswr"><span class="friendslinkv_p" onclick="">10 shares</span></div></td></tr>

<tr id="more_commentsp"><td colspan="2" class="friendslink3" style="color:#666666;background-color:rgb(237,239,244);padding-top:9px;width:280px;max-width:280px;border-bottom:0px solid #ffffff;border-top:1px solid #ffffff;"><div class="comments_btn" style="float:left;display:inline-block;position:relative;left:5px;top:-4px;"></div><div style="position:relative;left:11px;top:-3px;display:inline-block;" id="prevcwr"><span id="view_prevc_gallery" class="friendslinkv_p" onclick="">View previous comments</span></div><div style="float:right;display:inline-block;position:relative;right:5px;top:-4px;color:#808080;"><span id="howmanym" style="margin:0;padding:0;">0</span> of <span id="howmanymv" style="margin:0;padding:0;">0</span></div></td></tr><tr><td><div style="height:0;margin:0;padding:0;" id="oftop"></div><div style="height:0;margin:0;padding:0;" id="oftop2"></div></td></tr></td></tr></table><tr><td></td></tr></table>';

if($browser=="mozilla"){
$minWidth=301;
}
else{
$minWidth=308;
}

$secho.='<div id="picscommentscontainerx26" data-type="photo" data-ltypev="comment" style="margin-bottom:0!important;background:#ffffff;margin:0;padding:0;border-bottom:0;width:308px;max-width:308px;min-width:'.$minWidth.'px;" class="foot_box_inner comment_wrapper">
</div>

</div>';

if($browser=="mozilla"){
$dwidth=301;	
}
else{
$dwidth=308;	
}

$secho.='
<div style="position:absolute;z-index:2;bottom:-41px;width:'.$dwidth.'px;" id="writeac">
<input type="hidden" id="ltot" class="ltot" value="">
<table style="min-width:100%;background-color:rgb(237,239,244);border-top:1px solid #ffffff;"><tr><td style="paddin:0;padding-top:4px;padding-left:4px;"><div style="position:relative;margin:0;padding:0;" id="cpos1"><img id="commentphoto" src="/'.$uid.'/pics/'.$profilephoto.'" style="max-width:32px;max-height:32px;"></td><td style="vertical-align:top;"><div style="position:relative;margin;0;padding;0;bottom:-3px;display:inline-block;margin-left:5px;padding-bottom:5px;float:left;" id="cpos2"><textarea id="commentx26" name="commentx26" title="Write a comment..." class="writeacomment dcphmgc" style="padding:3px;border:1px solid rgb(189,199,216);font-size:11px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;width:240px;max-height:116px;" onkeyup="sbktw(this.id,\'aozxkc131\',116);" placeholder="Write a comment..." ></textarea></div></td></tr></table></div>
</div>


<tr><td style="width:100px;">

</td></tr></table></td></tr></table></div>



';

$secho.='
<script type="text/javascript">

		</script>
		';

$secho.='
</div>';

$r=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$profilephoto=$m['profilepict'];
}
$secho.='
</div></div>
<script type="text/javascript"></script>';

$secho.='
<input type="hidden" id="picwidth">
<input type="hidden" id="picheight">
<input type="hidden" id="writingc">
				<script type="text/javascript">
				$("#writingc").val("0");
function setmt(){';

		/*
				$secho.='
				if(w){
				if(w=="w"){
				$("#writeac").css("width","321px");
				$("#cpos1").css("left","15px");
				$("#cpos2").css("right","-18px");
				var ala=$("#commentsofp").offset().left; $("#comment").css("width","228px");
								ala=ala+"px";
				$("#writeac").css("margin-left",ala);
				$("#writingc").val("1");
				return false;
				}

				}
				var pltot=$("#ltot").val();

				if(pltot>0){
				var ltot=$("#appendcm").offset().top + $("#appendcm").height();

				var oftop=$("#commentsofp").offset().top;
				var ltotv=ltot-oftop;

				var laheight=$("#divstage").css("height");
				laheight=laheight.replace("px","");
				ltotv=laheight-ltotv;
				ltotv=ltotv+1;
				var wc=$("#writingc").val();

				if(ltotv<=41){
				ltotv=44.66664123535156;
				$("#writeac").css("width","321px");
				$("#cpos1").css("left","15px");
				$("#cpos2").css("right","-18px");
				var seter="1";
				}
				else{
				$("#writeac").css("width","281px");
				$("#cpos1").css("left","-3px");
				$("#cpos2").css("right","");
				}

				ltotv=ltotv+"px";
				ltotv="-"+ltotv;

				$("#writeac").css("margin-top",ltotv);

				var retwv=$("#divstage").css("width");
				retwv=parseInt(retwv);

				var cww=$("#writeac").css("width");

				if(cww=="308px"){var ala=$("#commentsofp").offset().left; $("#comment").css("width","228px");}
				else{
			var rt=$(window).width();
			var rtv=$("#editsl").offset().left;
			var rtvv=$("#editsl").outerWidth();
			var rtvvv=rtv+rtvv;
			var rtvvvv=rt-rtvvv;

			var pt=$(window).width();
			var ptv=$("#divstage").offset().left;
			var ptvv=$("#divstage").outerWidth();
			var ptvvv=ptv+ptvv;
			var ptvvvv=pt-ptvvv;

			var aoff=Math.floor(rtvvvv-ptvvvv);
if(seter=="1"){
							if(aoff=="151"){var ala=$("#commentsofp").offset().left;}
				else{var ala=$("#commentsofp").offset().left;}
}
else{
							if(aoff=="151"){var ala=$("#commentsofp").offset().left+20;}
				else{var ala=$("#commentsofp").offset().left+20;}
								$("#cpos1").css("left","-3px");
}
				$("#comment").css("width","228px");

				$("#cpos2").css("left","-3px");
				}
				ala=ala+"px";

				$("#writeac").css("margin-left",ala);

				}
				';

			$secho.='
			else{
			var rt=$(window).width();
			var rtv=$("#editsl").offset().left;
			var rtvv=$("#editsl").outerWidth();
			var rtvvv=rtv+rtvv;
			var rtvvvv=rt-rtvvv;

			var pt=$(window).width();
			var ptv=$("#divstage").offset().left;
			var ptvv=$("#divstage").outerWidth();
			var ptvvv=ptv+ptvv;
			var ptvvvv=pt-ptvvv;

			var aoff=Math.floor(rtvvvv-ptvvvv);

				var tocheck=$("#oftop2");
				if(tocheck){
				var ltot=$("#oftop2").offset().top;
				}
				else{
				var ltot=$("#oftop").offset().top;
				}
				var oftop=$("#commentsofp").offset().top;
				var ltotv=ltot-oftop-1;

				var laheight=$("#divstage").css("height");
				laheight=laheight.replace("px","");
				ltotv=laheight-ltotv;
				ltotv=ltotv;
				ltotv=ltotv+"px";
				ltotv="-"+ltotv;
				$("#writeac").css("margin-top",ltotv);
				var rmev=$(".rmev").length;
				if(rmev>0){
					$(".pinchin").css("display","none");
					}
				else{
				$(".pinchin").css("display","block");
				}

				var retwv=$("#divstage").css("width");
				retwv=parseInt(retwv);
				$("#writeac").css("width","281px");
				var cww=$("#writeac").css("width");

							if(aoff=="151"){var ala=$("#commentsofp").offset().left+20;}
				else{var ala=$("#commentsofp").offset().left+20;}
				$("#comment").css("width","233px");
				$("#cpos1").css("left","-3px");
				$("#cpos2").css("left","-3px");

				ala=ala+"px";
				$("#writeac").css("margin-left",ala);

			}
				';

*/
$secho.='
var pltot=$("#ltot").val();
if(pltot>0){
//$(".pinchin").css("display","none");
}
else{
			var rmev=$(".rmev").length;
				if(rmev>0){
					$(".pinchin").css("display","none");
					}
				else{
				$(".pinchin").css("display","block");
				}
}
$("#divstage").find(".scroll-content").append($("#writeac"));
$("#divstage").find(".slider-wrap").after($("#writeac"));

if($("#divstage").find(".slider-wrap").length>0){
$("#writeac").addClass("writeace");
}
else{
$("#writeac").removeClass("writeace");
}
$("#writeac").css("opacity","1");
}
</script>
<script type="text/javascript">
var settoportr=false;
var isfullv=false;
				$("#picwidth").val(picwidth);
				$("#picheight").val(picheight);


			var isfull=false;
				function settoport(){
				var imgh=$("#img1").css("height");
				if(imgh!==undefined){
		if(!settoportr){settoportr=true;';

				if($browser!="msie"){
						$secho.='
		if(!document.'.$fspr.$fsprv.'){	
		if(isfull){
		isfull=false;
		isfullv=false;
		isnotfullscreen();
		}
		else{
		isnotfullscreen();	
		}
		}
				else if(!isfull){

$("#commentsofp").css("display","none");
isfull=true;
var scrollPosition=false;
 scrollPosition = [
        self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
        self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
      ];
      var html =$("body");
      html.data("scroll-position", scrollPosition);

var corder=$("#ao_gn").val();
var uidv=o_gn[corder];
isfullscreen(uidv);
$("#fullss").css("display","none");
$("#fullssv").unbind("click");
$("#fullssv").bind("click",function(e){
e.preventDefault();
document.'.$fspr.'CancelFullScreen();
});

$("#fullssv").html("Exit Fullscreen");
$("#closeimgv").css("display","none");

}
';
		}
		else{
		$secho.='
		isfull=false;
		isfullv=false;
		isnotfullscreen();
		';	
		}
$secho.='
		
	$("#typeanynamews").append($("#typeanynamew"));
      	if($(".jTagDrag").length==1){

				$("#cuadradito").remove();
			}




				picwidthv=$("#picwidth").val();
				picwidthv=parseInt(picwidthv);
				picheightv=$("#picheight").val();

				picheightv=parseInt(picheightv);



					var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],x=w.innerWidth||e.clientWidth||g.clientWidth;
var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],y=w.innerHeight||e.clientHeight||g.clientHeight;

					if(x!==undefined){retw=x;}
					if(y!=undefined){reth=y;}

				var shw=screen.width/2;
				var shh=screen.height/2;

				if((x<=shw) || (y<=shh)){
				$(".snowliftinner").css("padding-left","21px");
				$(".snowliftinner").css("padding-right","20px");
				$(".snowliftinner").css("padding-top","11px");
				$(".snowliftinner").css("padding-bottom","11px");
				var ox=41;
				var oy=22;
				}
				else{
				$(".snowliftinner").css("padding-left","41px");
				$(".snowliftinner").css("padding-right","40px");
				$(".snowliftinner").css("padding-top","21px");
				$(".snowliftinner").css("padding-bottom","21px");
				var ox=81;
				var oy=42;
				}



				var mc=340;



					var totalwport=picwidthv+mc+ox+scrollbarWidth;
					var minus=retw-totalwport;
					var availw=x-ox-(mc+scrollbarWidth);

			if(isfull){
				$("#photobottomw").css("bottom","53px");
				$("#fswr").css("padding-top","8px");
				$("#fswr").css("padding-bottom","13px");

				var oy=21;
				if(!isfullv){
				var mc=0;
				$("#fswr").css("padding-left","16px");
				$("#fswr").css("padding-right","16px");
				var ox=32;
				}
				else{
				var mc=340;
				$("#fswr").css("padding-left","16px");
				$("#fswr").css("padding-right","0px");
				var ox=16;
				}

				var totalwport=picwidthv;
				var minus=retw-totalwport;
				var availw=x-ox-mc;

				}else{
				$("#photobottomw").css("bottom","40px");
				$("#fswr").css("padding","0");}


		var d=0;
		var d2=0;



var jr=availw*100;
jr=jr/picwidthv;



var availh=y-oy;

var jr2=availh*100;
jr2=jr2/picheightv;


					if(picheightv>520){
					var min_availh=520;
					}
					else{var min_availh=picheightv;}
					var min_availw=min_availh*100;
					min_availw=min_availw/picheightv;
					var min_availwv=picwidthv/100;
					min_availw=min_availwv*min_availw;
					if(min_availw>520){
					min_availw=520;
					}
					var min_availwph=min_availw;

					if(picwidthv>520){
					var min_availw=520;
					}
					else{var min_availw=picwidthv;}
					var min_availh=min_availw*100;
					min_availh=min_availh/picwidthv;
					var min_availhv=picheightv/100;
					min_availh=min_availhv*min_availh;
					if(min_availh>520){
					min_availh=520;
					}
					var min_availhph=min_availh;

					if(jr<=jr2){
					if(availw<picwidthv){


		if(availw<min_availwph){availw=min_availwph;}


		var cssw=availw;
		var wper=availw*100;
		wper=wper/picwidthv;
		var cssh=picheightv/100;
		cssh=cssh*wper;
					}
					else{
					var cssw=picwidthv;
					var cssh=picheightv;
					}
					}
					else{
		if(availh<picheightv){

		if(availh<min_availhph){availh=min_availhph;}
		var cssh=availh;
		var hper=availh*100;
		hper=hper/picheightv;
		var cssw=picwidthv/100;
		cssw=cssw*hper;
		}
		else{
		var cssw=picwidthv;
		var cssh=picheightv;
		}
		}
		';
		/*
		var cssw=picwidthv;
		var cssh=picheightv;
		var d=0;


		var wc=false;
		if(totalwport>x){
		wc=true;

		if(x<922){
		if(picheightv>picwidthv){var availw=420; d=100;}
		else{var availw=520;}
		}
		var cssw=availw;
		var wper=availw*100;
		wper=wper/picwidthv;
		var cssh=picheightv/100;
		cssh=cssh*wper;
		}

		var retwv=cssw+321+d;
		var rethv=cssh;
		if(rethv<520){rethv=520;}
		if(retwv<520){retwv=520+321;}


		var availh=y-40;
		var totalhport=cssh+40;
		var d2=0;

		if(totalhport>y){
			if(cssh>availh){

		if(y<560){
		if(picwidthv>picheightv){availw=520;
		var cssw=availw;
		var wper=availw*100;
		wper=wper/picwidthv;
		var cssh=picheightv/100;
		cssh=cssh*wper;
		}
		else{availh=520;
		var cssh=availh;
		var hper=availh*100;
		hper=hper/picheightv;
		var cssw=picwidthv/100;
		cssw=cssw*hper;
		}
		}
		else{
		availh=520;
		var cssh=availh;
		var hper=availh*100;
		hper=hper/picheightv;
		var cssw=picwidthv/100;
		cssw=cssw*hper;
		}


			}

			}

		*/

		$secho.='



					if(vids_active){

					if(cssw>716){
					var csswv=716;




			cssh=csswv*cssh/cssw;
			cssw=csswv;

					}

						if(cssh>480){
			var csshv=cssh-480;
			if(csshv>40){csshv=40;}
						}
						else{var csshv=0;}
			csshv=csshv*2;
			csshv=cssh-csshv;


			var cssw=csshv*cssw/cssh;
			cssh=csshv;
		}



		var retwv=cssw+mc+d;
		var rethv=cssh+d2;

		if(rethv<520){rethv=520;}
		var mw=520+mc;
		if(retwv<mw){retwv=520+mc;}

	if(isfull){
	var lyv=y-oy;
	if(rethv<lyv){
	rethv=lyv;
	}
	var lxv=x-ox;
	if(retwv<lxv){
	retwv=lxv;
	}

	}






		$("#img1,.video-js-gallery,.video-js-hd-gallery").css("width",cssw+"px");
		$("#img1,.video-js-gallery,.video-js-hd-gallery").css("height",cssh+"px");

if(vids_active){

$(".vjs-postergallery").css("max-width","100%");
$(".vjs-postergallery").css("max-height","100%");

var cv_width=$(".vjs-postergallery").width();
var cv_height=$(".vjs-postergallery").height();
if(cv_width){
		var mlv=cv_width/2;
		var mtv=cv_height/2;

		$(".vjs-postergallery").css("margin-left","-"+mlv+"px");
		$(".vjs-postergallery").css("margin-top","-"+mtv+"px");
	if(posternotseen && posternotseen!==true){
	$(".vjs-postergallery").css("display","inline-block");
	$("#"+posternotseen).find(".vjs-big-play-button").css("display","inline-block");
	}



}



		if(isfull && vids_active){
cssw="100%";
cssh="100%";

$("#"+posternotseenv).find(".vjs-controls").css("width","495px");
$("#"+posternotseenv).find(".vjs-controls").css("margin","0 auto");
}
else{
$("#"+posternotseenv).find(".vjs-controls").css("width","");
$("#"+posternotseenv).find(".vjs-controls").css("margin","0");
$("#play_again_endv"+posternotseenv).parent().css("line-height",cv_height+"px");
}
		$(".video-js-gallery").children(":first").css("width",cssw+"px");
		$(".video-js-gallery").children(":first").attr("width",cssw);

		$(".video-js-gallery").children(":first").css("height",cssh+"px");
		$(".video-js-gallery").children(":first").attr("height",cssh);

		$(".video-js-hd-gallery").children(":first").css("width",cssw+"px");
		$(".video-js-hd-gallery").children(":first").attr("width",cssw);

		$(".video-js-hd-gallery").children(":first").css("height",cssh+"px");
		$(".video-js-hd-gallery").children(":first").attr("height",cssh);



		if(posternotseenv){
			var cl=$("#"+posternotseenv).find(".vjs-progress-control").length;
			if(cl>0){
		var dcssw=$("#"+posternotseenv).find(".vjs-controls").width();
		dcssw=dcssw-282;

	$("#"+posternotseenv).find(".vjs-progress-control").css("width",dcssw+"px");
			}
		}

}



				$("#divstage").css("width",retwv+"px");
				$("#divstage").css("max-height",rethv+"px");
				$("#divstage").css("height",rethv+"px");



				var retwvv=retwv-mc;



			var rethvv=rethv;



				if(isfull){var oretwvv=retwvv+ox; $("#tdpic").css("width",oretwvv+"px");}
				else{
				$("#tdpic").css("width",retwvv+"px");
				}
				$("#tdpicv").css("width",retwvv+"px");

				if(isfull){var orethvv=rethvv+oy; $("#tdpic").css("height",orethvv+"px");}
				else{
				$("#tdpic").css("height",rethvv+"px");
				}
				$("#tdpic").css("height",rethvv+"px");
				$("#tdpicv").css("height",rethvv+"px");

				var rethvvc=rethvv-65;
				$("#cheight").css("height",rethvvc+"px");



';
/*
				if(rethvv<picheightv){
				$("#img1").style.height=rethvv+"px";
				}
				else{
				$("#img1").style.height=picheightv+"px";
				}
*/
$secho.='

				var jtagcontainer=$("#jTagContainer");
				if(jtagcontainer){
				$("#jTagContainer").css("width",retwvv+"px");
				$("#jTagContainer").css("position","absolute");
				$("#jTagArea").css("width",retwvv+"px");
				$("#jTagContainer").css("height",rethvv+"px");
				$("#jTagArea").css("height",rethvv+"px");
				}
				var posleft=retwvv/100;
				posleft=Math.floor(posleft*20);
				$("#imgoverlayl").css("width",posleft+"px");
				$("#imgoverlayr").css("left",posleft+"px");


				$("#snowliftpopup").css("width",retwv+"px");
				$("#snowliftpopup").css("height",rethv+"px");

				$("#photobottom").css("width",retwvv+"px");
				$("#photobottom2").css("width",retwvv+"px");

				if(retwvv>picwidthv){
				var picdivl=retwvv-picwidthv;
				picdivl=Math.floor(picdivl/2);
				$("#jTagContainer").css("left",picdivl+"px");
	}
	else{
		$("#jTagContainer").css("left","0");
	}

		var jtagcontainerv=$("#jTagContainer");
	if(jtagcontainerv){
				$("#jTagContainer").css("width",$("#img1").css("width"));
				$("#jTagArea").css("width",$("#img1").css("width"));
				$("#jTagContainer").css("height",$("#img1").css("height"));
				$("#jTagArea").css("height",$("#img1").css("height"));
				}


				if(rethvv>cssh){
				var picdivh=rethvv-cssh;
				picdivh=Math.floor(picdivh/2);
				$("#jTagContainer").css("top",picdivh+"px");
				}
				else{
				$("#jTagContainer").css("top","0");
				}

				if(retwvv>cssw){
				var picdivw=retwvv-cssw;
				picdivw=Math.floor(picdivw/2);
				$("#jTagContainer").css("left",picdivw+"px");
				}
				else{
				$("#jTagContainer").css("left","0");
				}

				var imgh=$("#img1").css("height");
				imgh=imgh.replace("px","");
				imgh=parseInt(imgh);

				var thetop=imgh-45;
				thetop=Math.floor(thetop/2);



	var nproceed="y";

				if(x<screen.width){
	var checkwidth=$("#img1").css("width");
	checkwidth=checkwidth.replace(/[^0-9]/g,\'\');
checkwidth=parseInt(checkwidth);
	if(checkwidth<picwidthv){
	$("#imgoverlayr").removeClass("imgoverlayr");
	$("#imgoverlayr").addClass("endtag");
	$("#imgoverlayl").removeClass("imgoverlayl");
	$("#imgoverlayl").addClass("endtag");
	}
	var checkif=$("#jTagLabel");

	var nproceed="n";
	}

var prey=screen.height-400;
if(y<prey){
	var checkheight=$("#img1").css("height");
	checkheight=checkheight.replace(/[^0-9]/g,\'\');
checkheight=parseInt(checkheight);
	if(checkheight<picheightv){
	$("#imgoverlayr").removeClass("imgoverlayr");
	$("#imgoverlayr").addClass("endtag");
	$("#imgoverlayl").removeClass("imgoverlayl");
	$("#imgoverlayl").addClass("endtag");
	}
	var checkif=$("#jTagLabel");

	var nproceed="n";
	}

	if(nproceed=="y"){
	$("#imgoverlayr").removeClass("endtag");
	$("#imgoverlayr").addClass("imgoverlayr");
	$("#imgoverlayl").removeClass("endtag");
	$("#imgoverlayl").addClass("imgoverlayl");
		}

		var okas=$("#divstage").find(".slider-vertical").slider("value");
if(typeof(okas)=="object"){okas=1;}
		okas=parseInt(okas);
	   	setSlider($("#cheight"));
  	$("#divstage").find(".slider-vertical").slider("value", okas);
setmt();

//sbktw("comment",\'aozxkc131\',116);
		settoportr=false;
		}



//if(adjust_colorpicker!==undefined){
//adjust_colorpicker();
//}

				} //finish if imgh !==undefined
				
				}
				settoport();










				</script>

';

$secho.='<script type="text/javascript">

	var resizeTimer;
var wire_settoport=function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(settoport, 100);
}

$(window).bind("resize",wire_settoport);


$(\'#shareinsert\').after(\'\');

$("#cop3v").bind("click",function(){

var corder=$("#ao_gn").val();

var albumidi=av_gn[corder];
var p=p_gn[corder];
var uidv=o_gn[corder];
var photoid=pi_gn[corder];


if(!vids_active){
var w="shared_photo";
var vidl=""; var vidt=""; var vidd="";
}
else{

var vidt=vt_gn[corder];
var vidd=dtd_gn[corder];
var vidl=vl_gn[corder];
var w="shared_video"; }
var pin=pin_gn[corder];

show_msg_dialogs(albumidi,w,uidv,photoid,\'\',photoid,vidl,vidt,vidd,pin); hideopm();

});

$("#rotater").bind("click",function(){
var corder=$("#ao_gn").val();

var photoid=pi_gn[corder];
var albumidi=av_gn[corder];

rotate(albumidi,photoid,\'r\');
});

$("#rotatel").bind("click",function(){
var corder=$("#ao_gn").val();

var photoid=pi_gn[corder];
var albumidi=av_gn[corder];

rotate(albumidi,photoid,\'l\');
});

$("#delphoto").bind("click",function(){
var corder=$("#ao_gn").val();

var sbid=pi_gn[corder];

var albumidi=av_gn[corder];

del_photo_g(sbid,albumidi);
});

$("#mprofilep").bind("click",function(){
var corder=$("#ao_gn").val();

var photoid=pi_gn[corder];
window.location="/photo.php?sbid="+photoid
return false;

});

$("#photobottom").css("display","block");

var se=$("#"+lastID).parents("td:first").attr("id");
if(se){
if(se=="tdpic"){$("#photobottom").stop().fadeTo( 300, 1 );}
}

function unbind_photobottom(){
$("#tdpic,#photobottom").unbind("mouseenter");
$("#tdpic,#photobottom").unbind("mouseleave");

$("#img1").unbind("mousemove");
$("#img1").unbind("mousestop");

$("#fswr").unbind("mouseover");

}




function rebind_photobottom(){
 unbind_photobottom();
if(!stop_binding_pb){

    $("#tdpic,#photobottom").bind( "mouseenter", function()
    {

        $("#photobottom").stop().fadeTo( 300, 1 );
		$("#next,#previous").css("display","block");

    });

    $("#tdpic,#photobottom").bind( "mouseleave", {}, function()
    {
        $( "#photobottom" ).stop().fadeTo( 300, 0 );
$("#next,#previous").css("display","none");
    });


$("#img1").bind("mousemove",function(){
        $("#photobottom").stop().fadeTo( 100, 1 );
$("#next,#previous").css("display","block");
});

$("#img1").bind("mousestop",3500,function(){
$("#photobottom").stop().fadeTo(300,0);
$("#next,#previous").css("display","none");
});

$("#fswr").bind("mouseover",function(e){
var se=e.target;
if($(se).hasClass("fswr")===true){
        $( "#photobottom" ).stop().fadeTo( 300, 0 );
$("#next,#previous").css("display","none");
}
});

}
}

rebind_photobottom();



var noface=false;
var thisv=false;

var afterr="";
var rfacedet=false;

function facedet(s){

var frun=s;

if(gfacedet){

var corder=$("#ao_gn").val();

	if(strpos(f_gn[corder],",")!==false){
var coords=$.parseJSON(f_gn[corder]);
coords=coords.faces;
}
else{var coords=false;}


	if(dtoner){
			var imgh=document.getElementById("img1").clientHeight;
			var imgw=document.getElementById("img1").clientWidth;

	var yaesta=new Array();
	var yaestav=new Array();
	var ax=0;
	$(".faceBoxw").each(function(){

	hh=$(this).css("left");
	if(strpos(hh,"px")!==false){
	var hh=parseFloat($(this).css("left"));
	hh=hh*100/imgw;
	}
	hh=parseFloat(hh);

	hhv=$(this).css("top");
	if(strpos(hhv,"px")!==false){
	var hhv=parseFloat($(this).css("top"));
	hhv=hhv*100/imgh;
	}
	hhv=parseFloat(hhv);


	yaesta[ax]=hh;
	yaestav[ax]=hhv;
	ax++;
	});

				var imgh=document.getElementById("img1").clientHeight;
				var imgw=document.getElementById("img1").clientWidth;

	if(strpos(t_gn[corder],",")!==false){
var tagged=$.parseJSON(t_gn[corder]);
tagged=tagged.tagged;
}
else{var tagged=false;}


	var caa=new Array();
	var ca2a=new Array();
	var caya=new Array();
	var cay2a=new Array();

	var ax=0;
	var pn=$("#ctoteti").val();

		noface=false;

		pn=pn.split(",");
		$(pn).each(function(){
		if(this.length>0){


		var ca=$("#tag"+this).css("left");

		if(strpos(ca,"px")!==false){
		ca=parseFloat(ca);
		var ca=ca*100/imgw;
		}
		ca=parseFloat(ca);

		caa[ax]=ca;

		var cay=$("#tag"+this).css("top");
		if(strpos(cay,"px")!==false){
		cay=parseFloat(cay);
		var cay=cay*100/imgh;
		}
		cay=parseFloat(cay);

		caya[ax]=cay;

		var ca2=$("#tag"+this).css("width");
		if(strpos(ca2,"px")!==false){
		ca2=parseFloat(ca2);
		var ca2=ca2*100/imgw;
		}
		ca2=parseFloat(ca2);

		var ca2=100-(ca+ca2);

		ca2a[ax]=ca2;

		var cay2=$("#tag"+this).css("height");
		if(strpos(cay2,"px")!==false){
		cay2=parseFloat(cay2);
		var cay2=cay2*100/imgh;
		}
		cay2=parseFloat(cay2);

		var cay2=100-(cay+cay2);

		cay2a[ax]=cay2;

		ax++;
		}
		});


			var imgh=$("#picheight").val();
			var imgw=$("#picwidth").val();



			for (var i = 0; i < coords.length; i++) {


				var pposx=parseFloat(coords[i].positionX);
				var pposy=parseFloat(coords[i].positionY);
				var pcordsw=parseFloat(coords[i].width);
				var pcordsh=parseFloat(coords[i].height);



				var pposxp=pposx*100/imgw;
				var pposyp=pposy*100/imgh;
				var pcordswp=pcordsw*100/imgw;
				var pcordshp=pcordsh*100/imgh;



				var fw=pcordswp;
				var fwv=fw*26;
				fwv=fwv/100;
				fw=fw+fwv;

				var fh=pcordshp;
				var fhv=fh*40;
				fhv=fhv/100;
				fh=fh+fhv;

				var fwvv=fwv/1.5;
				var fx=pposxp-fwvv;

				var fhvv=fhv/1.5;
				var fy=pposyp-fhvv;


				if(fx<1){fx=0;}
				if(fy<1){fy=0;}



		noface=false;




if(fw<10){fwd=1;}
else{fwd=2.5;}
if(fh<10){fhd=1;}
else{fhd=2.5;}

		var fwpv=fw/fwd;
		var fhpv=fh/fhd;

		var cav=fx;

		var cavy=fy;


var fx2=100-(fx+fw);
var fy2=100-(fy+fh);


var potborrar=new Array();

var ax=0;
$(caa).each(function(){	 //tagged registrados en el servidor [la respuesta] + modificaciones de el momento [usar esta respuesta ahora cuando reescriba genctoteti] - al estilo de object
//como esta debajo

var px=caa[ax];
var px2=ca2a[ax];
var py=caya[ax];
var py2=cay2a[ax];';

include("js/close_box.php");
$secho.=$secho_b;

$secho.='
ax++;
});


if(!noface){

		for (var iv = 0; iv < tagged.length; iv++) { //tagged registrados en el servidor
			var px=tagged[iv].positionX;
			var py=tagged[iv].positionY;
			var tw=tagged[iv].width;
			var th=tagged[iv].height;


			px=parseFloat(px);
			tw=parseFloat(tw);

			var px2=100-(px+tw);

			py=parseFloat(py);
			th=parseFloat(th);

			var py2=100-(py+th);

';

include("js/close_box.php");
$secho.=$secho_b;

$secho.='

		}

}



var chunk=i;
var el="[data-fb_coords="+chunk+"]";

if(frun=="t"){
var count=retcount();
$("#jTagContainer").append(\'<div id="rec\'+count+\'" class="faceBoxw" data-fb_coords="\'+chunk+\'" style="visibility:hidden;position:absolute;left:\'+fx+\'%;top:\'+fy+\'%;width:\'+fw+\'%;height:\'+fh+\'%;z-index:304;padding-right:6px;padding-bottom:6px;"><div id="recv\'+count+\'" class="faceBox faceBoxHidden" style="position:relative;left:0;top:0;background:transparent;width:100%;height:100%;"></div></div>\');
}

if(tagactive){
$(el).children(":first").addClass("faceBoxTag");
}

if(noface){
$(el).addClass("hidden_sb");
}
else{
$(el).removeClass("hidden_sb");
}


}


//if(coords.length>15){
//dtoner=false;
//}



$(".faceBoxw").css("visibility","visible");
var cuadr=$("#cuadradito").length;
if((tagactive) && (frunt) && (cuadr==0)){retag();}
frunt=false;
}

}


if(afterr.length>0){

var afterv=afterr.split(",");
$(afterv).each(function(){
if($(this).length>0){

$("#"+this).addClass("hidden_sb");

}

});

afterr=afterr.replace(this+",","");
}

rfacedet=false;
}


var recent_tagsq=false;

var autosearcho=false;
function recent_tags(){
var dl=$("#rtags_auto").length;

if(!autosearcho || dl==0){
$("#recent_tagsi").autocomplete("search", "");
}
else{
$(".adl").css("border-color","#ffffff");
$(".adl").css("border-width","1px 0px;");
$(".adl").css("color","#333333"); $(".adl").css("background","#ffffff");
$("#recent_tagsv").css("display","none");
$("#recent_tags").css("display","inline-block");

}
}

$("#tdpic").on("click",".faceBox",function(){
if(tagactive){
$(".faceBoxw").css("z-index","304");
$(this).parent().css("z-index","307");
$("#typeanynamews").append($("#typeanynamew"));
$(".jTagDrag").remove();
$(".faceBox").removeClass("faceBoxActive");
$(this).addClass("faceBoxActive");
$("#typeanynamew").css("bottom","-4px");
$(this).after($("#typeanynamew"));
$("#jTagLabel").val("");
$.doTimeout(0,function(){
$("#jTagLabel").blur();
$("#jTagLabel").focus();
});

}

});';

$secho.='


var cremove=false;
$("#jTagContainer").on("mouseover",".faceBox",function(){
if(!cremove){

thisv=$(this).attr("id");

$.doTimeout(50,function(){

if(lastID==$("#"+thisv).attr("id")){

if($(".faceBoxActive").length==0){
$(".faceBoxw").css("z-index","304");
$("#"+thisv).parent().css("z-index","307");
}

	if(!tagactive){
$("#"+thisv).parent().css("padding-bottom","47px");

$(".faceBox").addClass("faceBoxHidden");
$("#"+thisv).removeClass("faceBoxHidden");

var q=$("#"+thisv).parent().attr("id");
var qv=$("#typeanynamew").parent().attr("id");

if(q!=qv){
$("#typeanynamew").css("bottom","-4px");
$("#"+thisv).after($("#typeanynamew"));
$("#jTagLabel").val("");
$("#jTagLabel").blur();
$.doTimeout(10,function(){$("#jTagLabel").focus();});
}

}else{
$(".faceBox").removeClass("faceBoxTagHover");
$("#"+thisv).addClass("faceBoxTagHover");
}
}
});

}

});

$("#jTagContainer").on("mouseleave",".faceBoxw",function(){
if(!cremove){
if(!tagactive){



$(this).css("padding-bottom","6px");

$(this).children(":first").addClass("faceBoxHidden");
$("#typeanynamews").append($("#typeanynamew"));

}else{
$(this).children(":first").removeClass("faceBoxTagHover");
}
}
});

</script>



<div id="typeanynamews" style="display:none;" class="secondtag">
<div id="typeanynamew" style="z-index:305;position:relative;bottom:-10px;height:auto;" class="secondtag"><div class="jTagInput" style="min-height:33px;width:220px;cursor:default;background:#ffffff;border:1px solid #333333;z-index:4;position:relative;margin-left:-110px;left:50%;height:auto;"><div class="nub" style="position:absolute;top:-6px;z-index:5;"></div><input class="dcphlgc typeany" type="text" id="jTagLabel" value="Type any name" onKeyUp="javascript:return submitonEnterpt(event);" style="position:relative;top:4px;left:4px;border:1px solid #cccccc;width:202px;" title="Type any name" placeholder="Type any name"><div id="recent_tags" style="margin-left:4px;margin-top:12px;width:210px;position:relative;display:none;"><div style="color:#777777;position:relative;top:-1px;margin-bottom:2px;margin-left:6px;">Recent Tags:</div></div><div id="recent_tagsv" style="margin-left:4px;margin-top:12px;width:210px;position:relative;display:none;"></div></div><div class="jTagSaveClose" style="visibility:hidden;display:none;"></div><div class="jTagSave" style="display:none;"></div>

<input type="hidden" disabled="disabled" style="position:absolute;" id="recent_tagsi" >

</div>
</div>

<script type="text/javascript">
$("#jTagLabel").click(function(e){
e.stopPropagation();
});

				$("#jTagLabel").autocomplete({
					appendTo: "#recent_tagsv",
					autoFocus:true,
			source: function(request, response) {
            var dval="";
            $("#picturetheater").find(".tooltip_text").find("[data-who]").each(function(){
            dval+=","+$(this).attr("data-who");
            });
         
                $.ajax({
                  url: "/autocomplete/jump_note.php?photos_count=t",
                  dataType: "json",
                  data: {
                    term : request.term,
                    a_fv:dval
                  },
                  success: function(data) {
                    response(data);
                  }
                });
            },
	   open: function(event, ui){
			$("#recent_tags").css("display","none");

					var where=$("#recent_tagsv").children(".ui-autocomplete");
				   $(where).attr("style","display:inline-block;position:relative;border:0;");

			$("#recent_tagsv").css("display","inline-block");

			},
			close: function(event,ui){
				$("#recent_tagsv").css("display","none");
			},
			select: function( event, ui ) {
				$( "#love" ).val( ui.item.uidv );
				$( "#jTagLabel" ).val( ui.item.value );

				$(".jTagSaveBtn").attr("data-ts_dtp",ui.item.tp);
				$(".jTagSaveBtn").attr("data-ts_dfn",ui.item.value);
				$(".jTagSaveBtn").attr("data-ts_dun",ui.item.url);
				$(".jTagSaveBtn").click();
			
				return false;
			}
				})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li style=\\"width:212px!important;\\" class=\\"autocompletedark\\"></li>" )
				.data( "ui-autocomplete-item", item )
				.append( \'<a class="clearfix put adl"><img src="\'+item.imgurl+\'" style="width:50px;height:50px;float:left;"><div class="clearfix"><div style="float:left;position:relative;margin-left:5px;font-weight:bold;">\'+item.value+\'</div></div></a>\' )
				.appendTo( ul );
		};


			$("#recent_tagsi").autocomplete({
							minLength:0,
					appendTo: "#recent_tags",
			source: function(request, response) {
            var dval="";
            $("#picturetheater").find(".tooltip_text").find("[data-who]").each(function(){
            dval+=","+$(this).attr("data-who");
            });
                $.ajax({
                  url: "/autocomplete/recent_tags.php",
                  dataType: "json",
                  data: {
                    term : request.term,
                    a_fv:dval
                  },
                  success: function(data) {
                    response(data);
                  }
                });
            },
						   open: function(event, ui){
			autosearcho=true;
				   			$("#recent_tagsv").css("display","none");


					 var where=$("#recent_tags").children(".ui-autocomplete");
					 $(where).attr("id","rtags_auto");
				   $(where).attr("style","display:inline-block;position:relative;border:0;");

			$("#recent_tags").css("display","inline-block");

						   },
						   			close: function(event,ui){autosearcho=false;


			},
			select: function( event, ui ) {

				$( "#love" ).val( ui.item.uidv );
				$( "#jTagLabel" ).val( ui.item.value );

				$(".jTagSaveBtn").attr("data-ts_dtp",ui.item.tp);
				$(".jTagSaveBtn").attr("data-ts_dfn",ui.item.value);
				$(".jTagSaveBtn").attr("data-ts_dun",ui.item.url);
				$(".jTagSaveBtn").click();
				return false;
			}
				})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {autosearcho=true;
			return $( "<li style=\\"width:212px!important;\\" class=\\"autocompletedark\\"></li>" )
				.data( "ui-autocomplete-item", item )
				.append( \'<a class="clearfix put adl"><img src="\'+item.imgurl+\'" style="width:50px;height:50px;float:left;"><div class="clearfix"><div style="float:left;position:relative;margin-left:5px;font-weight:bold;">\'+item.value+\'</div></div></a>\' )
				.appendTo( ul );
		};



$("#jTagLabel").bind("focusout",function(){
focusoutl=true;
});


function fullss(e){
var elem=document.getElementById("tdpict");';
	if($browser=="chrome" OR $browser=="safari"){
        $secho.='elem.'.$fspr.'RequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);';
    }
    else if($browser!="msie"){
$secho.='elem.'.$fspr.'RequestFullScreen();';
	}
	$secho.='
settoport();
}

$(".fullsso").bind("click",function(e){
e.preventDefault();
fullss(e);
});

$("#divstage").bind("click",function(e){
var se=e.target;
if($(se).attr("id")!="cop2v"){
hideopm();
}
});

$("#picturetheater").bind("click",function(e){
var se=e.target;
if($(se).hasClass("snowliftinner")===true){
windowback();
}
});

$("#fswr").bind("click",function(e){
var se=e.target;
if($(se).hasClass("fswr")===true){';
		if($browser!="msie"){
$secho.='document.'.$fspr.'CancelFullScreen();
';
		}
$secho.='windowback();
}
});

$("#commentsview").bind("click",function(){
if(isfullv){isfullv=false; $("#commentsofp").css("max-width","300px"); $("#commentsofp").css("display","none");}
else{isfullv=true; $("#commentsofp").css("max-width","300px"); $("#commentsofp").css("display","table-cell");}
settoport();
return false;
});

';
if($browser=="msie"){
$secho.='
if (typeof document.'.$fspr.'CancelFullScreen != "undefined"){}
else{$("#fullss").css("display","none"); $("#fullscreenopv").css("display","none"); $("#fullscreenop").css("display","none");}
';
}
else{
$secho.='$("#fullss").css("display","none"); $("#fullscreenopv").css("display","none"); $("#fullscreenop").css("display","none");';	
}

$secho.='
</script>


<div class="jTagSaveBtn secondtag" style="visibility:hidden;"></div>

';
?>