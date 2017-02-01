<?php
include("start.php");
include("populate_page.php");
if(!isset($_GET['sk']) && !isset($_GET['album'])){$_GET['sk']='photos_tagged';}
else if(!isset($_GET['sk'])){
$_GET['sk']='';	
}

include("functions/sb_user.php");
include("functions/simplify_video_duration.php");
$uidv=$_SERVER['REQUEST_URI'];
$path_parts=pathinfo($uidv);
$uidv=$path_parts['basename'];
$r=mysql_query("SELECT * FROM registered where username='$uidv'");
$counti=mysql_num_rows($r);
if($counti=="0"){
$uidv=$path_parts['dirname'];
$uidv=str_replace("/upfrev/","",$uidv);	
}

$r=mysql_query("SELECT * FROM registered where id='$uidv'");
while($m=mysql_fetch_array($r)){
$flagtu='t';	
$unv=$uidv;
}

if(!isset($flagtu)){
$r=mysql_query("SELECT * FROM registered where username='$uidv'");
while($m=mysql_fetch_array($r)){
$uidv=$m['id'];
$unv=$m['username'];	
}
}

$rhelper_js='../';
$rhelper='../';

$addphotosbtn='<div style="display:inline-block;"><div class="addmorep addphotos_caller" style="position:relative;padding-left:19px;padding-top:4px;padding-bottom:4px;"><div style="position:absolute;left:6px;bottom:2px;display:inline;" class="cruz"></div>Add Photos</div></div>';
$addvideobtn='<a href="/video/?upload&oid=100003577943493" style="display:inline-block;color:#333333!important;"><div class="addmorep uiButton" style="position:relative;padding-top:4px;padding-bottom:4px;">Add Video</div></a>';

$echo.='
<script type="text/javascript">
function retw(){
var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],x=w.innerWidth||e.clientWidth||g.clientWidth;
return x;
}
function reth(){
var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName(\'body\')[0],y=w.innerHeight||e.clientHeight||g.clientHeight;
return y;
}
</script>

	
<script type="text/javascript">
function submitf(w){
document.forms[w].submit();
}
function autoGrowField(f, max) {
   var max = (typeof max == \'undefined\')?1000:max;
   if (f.scrollHeight > max) {
      if (f.style.overflowY != \'scroll\') { f.style.overflowY = \'scroll\' }
      return;
   }
   if (f.style.overflowY != \'hidden\') { f.style.overflowY = \'hidden\' }
   var scrollH = f.scrollHeight;
   if( scrollH > f.style.height.replace(/[^0-9]/g,\'\') ){
      f.style.height = scrollH+5+\'px\';
   }
}



function autoGrowField2(f, max) {
   var max = (typeof max == \'undefined\')?1000:max;
   if (f.scrollHeight > max) {
      if (f.style.overflowY != \'scroll\') { f.style.overflowY = \'scroll\' }
      return;
   }
   if (f.style.overflowY != \'hidden\') { f.style.overflowY = \'hidden\' }
   var scrollH = f.scrollHeight;
   if( scrollH > f.style.height.replace(/[^0-9]/g,\'\') ){
      f.style.height = scrollH+5+\'px\';
var maincontainer=$("#pop_container").css("height");
maincontainer=maincontainer.replace(/[^0-9]/g,\'\');
var container1=$("#div_dialog_body").css("height");
container1=container1.replace(/[^0-9]/g,\'\'); 
maincontainer=parseInt(maincontainer)+17+\'px\';
container1=parseInt(container1)+17+\'px\';
$("#pop_container").css("height",maincontainer);
$("#div_dialog_body").css("height",container1);
  }

}
';
$echo.='
</script>';
$params['style']='				



<style type="text/css">
body table td{font-size:11px;vertical-align:top;}


.headerphotos{
background-color:rgb(242,242,242);
border-bottom:medium none;
border-top:1px solid rgb(226,226,226);
padding:4px 6px 5px;
margin:0pt 0pt 8px;
word-wrap:break-word;
height:45px;
width:500px;

}
</style>

<link media="screen" rel="stylesheet" href="/master/view_photos_css.php" type="text/css" />';

$echo.='


<div id="pre_pop_container2o" style="background-color:rgba(252,252,252,0.9);height:100%;z-index:1002;position:fixed;left:0pt;top:0pt;overflow:visible;outline:mdium none;width:100%;display:none;">

<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:480px;height:100%;z-index:502;margin:0 auto;" id="owidth_msgv2">

<div class="pop_container3" id="pop_containervvo2" style="height:109px;display:block;position:fixed;"><div class="div_dialog_header3" id="div_dialog_headervo2">Delete <span id="delwhat"></span></div>
<div class="div_dialog_body3" id="div_dialog_bodyvo2" style="height:14px;">Are you sure you want to delete this <span id="delwhat2"></span>?


</div><div class="div_dialog_footer3" style="height:28px;" id="div_dialog_footervo2"></div></div></div></div>

</div>

<div style="position:relative;">
<div style="width:100%;height:100%;padding:0;margin:0;position:absolute;">
<div style="width:560px;height:100%;z-index:302;margin:0 auto;" id="width_msgvv">

</div></div></div>';





if(!isset($_GET['album']) AND $_GET['sk']!="photos_stream"){


if(!isset($does_not_exist)){

//aca esta la papa

if($_GET['sk']!="photos_albums"){

$params['layout']='normal_w';

$hoverc='ihoverc3';
$hoverc2='ihoverc4';	
$picsdisplay='picsdisplay3';
}
else{
$hoverc='ihoverc';
$hoverc2='ihoverc2';	
$picsdisplay='picsdisplay';
}

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$r=mysql_query("SELECT * FROM registered");
while($m=mysql_fetch_array($r)){
if($m['id']==$uidv){$name=$m['f_name']; $uidvname=$m['fullname']; if($uidv==$uid){$echunk='Your Photos'; $name="You";} else{$echunk=$name.'\' Photos';} }
if($m['id']==$uid){$cprofilepic=$m['profilepict'];}
}

$uti=sb_user($uidv);

$uidva='albums';
$x=0;
$bydate=array();
$theresults=array();


if($_GET['sk']!="photos_albums"){}
else{$r = mysql_query("SELECT * FROM $uidva WHERE id='$uidv' AND visibility!='d' ORDER BY datetimep DESC");
while($m = mysql_fetch_array($r))
  {
$xi=0;
$selected_album=$m['sbid'];
$r3=mysql_query("SELECT * FROM media WHERE albumid='$selected_album' AND id='$uidv' AND visibility!='d' AND nye='3'");
$xi=mysql_num_rows($r3);
if($xi>0){
$ps='s';	
}else{$ps='';}

$bydate[$x]=$m['datetimep'];

$albumid=$m['albumn'];
$album_cover=$m['album_cover'];

$presult2=mysql_query("SELECT * FROM media WHERE albumid='$selected_album' AND id='$uidv' AND visibility!='d' AND nye='3' ORDER BY sbid DESC LIMIT 1");
while($prow2=mysql_fetch_array($presult2)){
$acheck=$prow2['norder'];	
}
if(isset($acheck) && $acheck!=""){$c2=0; if($album_cover!=''){$r2=mysql_query("SELECT * FROM media WHERE albumid='$selected_album' AND id='$uidv' AND visibility!='d' AND sbid='$album_cover' AND nye='3'");
$c2=mysql_num_rows($r2);} if($c2==0){$r2=mysql_query("SELECT * FROM media WHERE albumid='$selected_album' AND id='$uidv' AND visibility!='d' AND nye='3' ORDER BY norder ASC LIMIT 1");} unset($acheck);}
else{$c2=0; if($album_cover!=''){$r2=mysql_query("SELECT * FROM media WHERE albumid='$selected_album' AND id='$uidv' AND visibility!='d' AND photoid='$album_cover' AND nye='3'"); $c2=mysql_num_rows($r2);} if($c2==0){$r2=mysql_query("SELECT * FROM media WHERE albumid='$selected_album' AND id='$uidv' AND visibility!='d' AND nye='3' ORDER BY sbid DESC LIMIT 1");}}
while($m2=mysql_fetch_array($r2)){

$pname=$m2['albumn'];

if($pname!="Videos"){
	
$wi='photo'.$ps;	
}
else{$wi='video'.$ps;}

$theresults[$x]='<div class="ihover '.$hoverc.'" id="ihover'.$x.'" onmouseover="this.style.outline=\'1px solid #3b5998\'; document.getElementById(\'ihoverv'.$x.'\').style.outline=\'1px solid #3b5998\';" onmouseout="this.style.outline=\'1px solid rgb(204,204,204)\'; document.getElementById(\'ihoverv'.$x.'\').style.outline=\'1px solid rgb(204,204,204)\';"></div><a href="/'.$uti['username'].'/photos?album='.$m['sbid'].'" style="position:relative;display:inline-block;left:0;top:0;margin-top:5px;margin-left:5px;"><i style="background-image: url(\'/'.$uidv.'/pics/'.$m2['picss'].'\');" class="'.$picsdisplay.' hth" onmouseover="document.getElementById(\'ihover'.$x.'\').style.outline=\'1px solid #3b5998\'; this.style.outline=\'1px solid #3b5998\';" onmouseout="document.getElementById(\'ihover'.$x.'\').style.outline=\'1px solid rgb(204,204,204)\'; this.style.outline=\'1px solid rgb(204,204,204)\';" id="ihoverv'.$x.'"></i></a><br><div style="padding:0;margin:0;padding-top:5px;" class="lbs"><a href="/'.$uti['username'].'/photos?album='.$m['sbid'].'">'.$albumid.'</a><br>'.$xi.' '.$wi.'<br></div>';
	$x++;
$setpf='';
}

if(!isset($setpf) && $uid==$uidv){



$theresults[$x]='<div class="ihover '.$hoverc.'" id="ihover'.$x.'" onmouseover="this.style.outline=\'1px solid #3b5998\'; document.getElementById(\'ihoverv'.$x.'\').style.outline=\'1px solid #3b5998\';" onmouseout="this.style.outline=\'1px solid rgb(204,204,204)\'; document.getElementById(\'ihoverv'.$x.'\').style.outline=\'1px solid rgb(204,204,204)\';"></div><a href="/'.$uti['username'].'/photos?album='.$m['sbid'].'" style="position:relative;display:inline-block;left:0;top:0;margin-top:5px;margin-left:5px;"><i class="'.$picsdisplay.'" style="position:relative;display:inline-block;left:0;top:0;background-image:url(\'/images/empty-album.png\');background-repeat:no-repeat;background-size: cover;
background-position: center 25%;" onmouseover="document.getElementById(\'ihover'.$x.'\').style.outline=\'1px solid #3b5998\'; this.style.outline=\'1px solid #3b5998\';" onmouseout="document.getElementById(\'ihover'.$x.'\').style.outline=\'1px solid rgb(204,204,204)\'; this.style.outline=\'1px solid rgb(204,204,204)\';" id="ihoverv'.$x.'"></i></a><br><div style="padding:0;margin:0;padding-top:5px;" class="lbs"><a href="/'.$uti['username'].'/photos?album='.$m['sbid'].'">'.$albumid.'</a><br>Empty<br></div>';
$x++;
}
else if(!isset($setpf)){
$theresults[$x]='';	
}
else{unset($setpf);}

}
}

if($_GET['sk']!="photos_albums" AND !isset($_GET['album'])){}
else{

$uti=sb_user($uidv);

if($uid==$uidv){
	if($_GET['sk']=="photos_albums" OR isset($_GET['album'])){$text='Create Album';}
	else{$text='Add Photos';}
				$fr=$addphotosbtn.$addvideobtn;
}
else{$fr='';}

$echo.='
<div class="clearfix" style="margin-top:1px;width:749px;padding-right:20px;">
<div style="float:right;">
'.$fr.'
</div>
<div class="hphotoswrapper clearfix" style="position:relative;float:left;">
<div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">'.$uti['fullname'].'</div><div class="hphotos"></div><div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">Albums</div></div></div>';
}
if($uid==$uidv){
	
	if($_GET['sk']=="photos_albums" OR isset($_GET['album'])){}
	else{
		$uti=sb_user($uidv);
		
				$fr=$addphotosbtn.$addvideobtn;
				
		$echo.='
		<div class="clearfix" style="margin-top:1px;width:749px;padding-right:20px;">
<div style="float:right;">
'.$fr.'
</div>
<div class="hphotoswrapper clearfix" style="position:relative;float:left;">
<div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">'.$uti['fullname'].'</div><div class="hphotos"></div><div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">Photos</div></div></div><div class="uiHeader uiHeaderSection sbPhotosGridHeader fwb" style="margin-top:12px;margin-bottom:-11px;">Tagged Photos</div>';

	}
	
	$echo.='
<script type="text/javascript">
function winlocc(){
	
window.location=window.location;
}
var wire_settoport=false;
</script>
';

$addphotos_button_url_suf='';
include("addphotos_button.php");
$echo.=$secho;

$echo.='<div id="firsttagen" style="margin:0;padding:0;display:inline-block;">';
$echo.='</div>';
$echo.='<script type="text/javascript">
$("#firsttagen").html("");
</script>';	




}
else{
	if($_GET['sk']=="photos_albums" OR isset($_GET['album'])){}
	else{
		$uti=sb_user($uidv);
		$echo.='
		<div class="clearfix" style="margin-bottom:7px;">
<div style="float:right;">
</div>
<div class="hphotoswrapper clearfix" style="position:relative;float:left;">
<div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">'.$uti['fullname'].'</div><div class="hphotos"></div><div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">Photos</div></div></div>';	
	}
}

if($_GET['sk']!="photos_albums" AND !isset($_GET['album'])){
$params['layout']='normal_w';	
}
if($_GET['sk']=="photos_albums"){

if($uidv==$uid){$mt='-2';}
else{$mt='11';}

$echo.='<script type="text/javascript">

</script>';
$echo.='<div style="margin:0;padding:0;border-collapse:collapse;position:relative;left:0px;margin:0;width:760px;margin-top:'.$mt.'px;">';
$number3=3; $pdl='12';}
else{
$echo.='<div style="margin:0;padding:0;border-collapse:collapse;position:relative;left:-15px;width:760px;margin-left:0px;">';	
$number3=4; $pdl='12';}



if($_GET['sk']=='photos_tagged' AND !isset($_GET['album'])){

$uid_friends=r_friends($uid,'me');

$uti=sb_user($uidv);
$value_c=$uidv;
$fullname_c=$uti['fullname'];
$unv_c=$uti['username'];

$r=mysql_query("SELECT * FROM tags WHERE id3='$uidv' AND visibility!='d' AND flag!='tw' ORDER BY datetimep DESC");
$c=mysql_num_rows($r); $d=$c;



while($m=mysql_fetch_array($r)){
	
	
	
$bydate[$x]=$m['datetimep'];
$dalbum=$m['albumid'];
$dphotoid=$m['photoid'];
$owner=$m['id'];







$r2=mysql_query("SELECT * FROM media WHERE albumid='$dalbum' AND sbid='$dphotoid' AND id='$owner' AND nye='3'");
$c2=mysql_num_rows($r2);

while($m2=mysql_fetch_array($r2)){

$osize=getimagesize("../users/$owner/pics/".$m2['pics']);
$swidth=$osize[0];
$sheight=$osize[1];
$aorder=$c;
$c--;
if($m2['vidso']!=''){
$swidth=$m2['videow'];
$sheight=$m2['videoh'];

$duration=simplify_video_duration($m2['duration']);

$theresults[$x]='<span data-onclick="getnext(\''.$m2['pics'].'\',\''.$owner.'\',\''.$dalbum.'\',\''.$swidth.'\',\''.$sheight.'\',\''.$aorder.'\',\''.$d.'\',\'pt\',\'f\',\''.$value_c.'\',\''.$fullname_c.'\',\''.$unv_c.'\',\'vid\',\''.$m2['vids'].'\',\''.$m2['vidshd'].'\',\''.$m2['sbid'].'\')" style="cursor:pointer;position:relative;display:inline-block;bottom:-4px;right:-5px;" id="poraca" class="uiVideoLink uiVideoLinkMedium getnext"><i style="background-image: url(\'/'.$owner.'/pics/'.$m2['picss'].'\');" class="picsdisplay4 hth"></i><span class="playtime">'.$duration.'</span><span class="playicon"></span></span><br>';
}
else{
$theresults[$x]='<span data-onclick="getnext(\''.$m2['pics'].'\',\''.$owner.'\',\''.$dalbum.'\',\''.$swidth.'\',\''.$sheight.'\',\''.$aorder.'\',\''.$d.'\',\'pt\',\'f\',\''.$value_c.'\',\''.$fullname_c.'\',\''.$unv_c.'\',\'\',\'\',\'\',\''.$m2['sbid'].'\');" style="cursor:pointer;position:relative;display:inline-block;bottom:-4px;right:-5px;" class="getnext"><i style="background-image: url(\'/'.$owner.'/pics/'.$m2['picss'].'\');" class="picsdisplay4 hth"></i>';

$uti=sb_user($m['id']);
if(in_array($m['id'],$uid_friends)){
$tkind=$m2['albumn'];
}
else{
$tkind=$uti['fullname'].'\'s photos';
}

$theresults[$x].='<div class="_53d _53q"><div class="_53g" style="position:absolute;left:0;bottom:0;z-index:1;"><div class="_53i"><a class="_53f" style="max-width:144px;" href="/'.$uti['username'].'/photos?album='.$m2['albumid'].'">'.$tkind.'</a></div></div>
<img src="/images/gradient.png" style="height: 53px;position: absolute;left: -1px;bottom: 2px;width: 165px;">
</div></span><br>';
}
$x++;
}

}
}

$uid==$uidv ? $dclass=" move_cl" : $dclass="";

$xa=0;
arsort($bydate);

$echo.='<div style="display:inline-block;">';

$ax=1;
foreach($bydate as $key=> $value){
	$expand='';
	if($xa=="0"){$echo.='<ul style="margin:0;padding:0;display:block;max-width:600px;" id="sortable1">';}
if ($xa % $number3 == 0 AND $xa!=0) {
//if(!isset($thecheck)){$echo.='</div><div style="margin:0;padding:0;display:block;">'; $theckeck=''; $expand='padding-left:0;';}
//else{$echo.='</div><div>'; }
} 
$echo.='<li class="photo_wrap x'.$dclass.'" data-s_position="'.$ax.'" id="li_id'.$ax.'" style="'.$expand.'display:inline-block;float:left;padding:0;margin:0;margin-right:10px;width:173px;text-align:left;position:relative;">';

$echo.= $theresults[$key];
$echo.= '</li>';
unset($expand);
$xa++;
$ax++;
}
$echo.='</div></ul>';


$echo.='
<ul id="sortable1_clone" style="position:absolute;left:0;top:0;"></ul>
</div>
';
if($uid==$uidv){
$echo.='
<div style="display:none;">
<script type="text/javascript">
$(function() {  

	 $("#sortable1 li").each(function(){
		 var item=$(this);
        var item_clone=$(this).clone();
 		$(this).data("clone", item_clone);

        var position=$(item).position();
        $(item_clone).css("left", position.left);
        $(item_clone).css("top", position.top);

        // append the clone...
        $("#sortable1_clone").append(item_clone);
    });


  $("#sortable1").sortable({
	  placeholder: \'ui-state-highlightv\',
    update: function(event, ui) {
		
      imgorder = $("#sortable1").sortable(\'toArray\').toString();
	  imgorderl=imgorder.split(",");
	  imgorderll=imgorderl.length-1;

	  var fajax="";
	  x=0;
	  var y=0;

	  while(x<=imgorderll){
		  if(imgorderl[x]==""){}
		  else{
		  var este=imgorderl[x];
		  y=y+1;
		  este=este.replace("li_id","");
var actuale=$("#li_id"+este).attr("data-s_position");
		  $("#li_id"+este).attr("data-s_position",y);
		  fajax+=y+":"+actuale+"{}";
		  }
		  x++;
	  }
	  //alert(fajax);
    }, start: function(event,ui){

            ui.helper.addClass("exclude-me");
            $("#sortable1 li:not(.exclude-me)").css("visibility","hidden");

            ui.helper.data("clone").hide();
	},
	stop: function(event,ui){
            $("#sortable1 li.exclude-me").each(function(){
                var item = $(this);
                var clone = $(item).data("clone");
                var position = $(item).position();

                $(clone).css("left", position.left);
                $(clone).css("top", position.top);
                $(clone).show();

                $(item).removeClass("exclude-me");
            });

            $("#sortable1 li").css("visibility", "visible");


		emulate_sort_update();
	},change:function(event,ui){
            $("#sortable1 li:not(.exclude-me, .ui-sortable-placeholder)").each(function(){
                var item=$(this);
                var clone=$(item).data("clone");

                $(clone).stop(true, false);
//clone animate to updated position
//on stop hide the clones, display the originals which are selectable to be dragged

                var position=$(item).position();
                $(clone).animate({
                    left: position.left,
                    top:position.top}, 500);
            });
			},
	sort:function(event,ui){
		
sort_fix();
	},clone:"clone",tolerance:\'pointer\',appendTo: \'#sortable1\',forcePlaceholderSize: true,cancel: \'.lbs,:input,button\',
	revert: true

  });
 
  

});

	function emulate_sort_update(){
		
			  $("#sortable1 li.x").removeClass("y");
            $("#sortable1 li.x").removeClass("clear green");
	
			
			var multiple=3;
			var ax=0;
			$("#sortable1 li.x").each(function(){
			var remainder=ax % multiple;
			if (remainder==0){
			$(this).addClass("clear green");
			}

			ax++;	
			});



			
	}

function sort_fix(){
		
            $("#sortable1 li").removeClass("clear green");
	
            $("#sortable1 li.x:not(.ui-sortable-helper)").addClass("y");
			
            $(".ui-state-highlightv").addClass("y");
        
		
			var multiple=3;
			var ax=0;
			$("#sortable1 li.y").each(function(){
			var remainder=ax % multiple;
			if (remainder==0){
			$(this).addClass("clear green");
			}
			ax++;	
			});	


       
}
emulate_sort_update();
</script>
</div>
';
}

if($_GET['sk']!="photos_albums"){


$echo.='</div></div>';

$r=mysql_query("SELECT * FROM registered WHERE id='$uidv'");
while($m=mysql_fetch_array($r)){
$profilephoto=$m['profilepict'];	
}


include("gallery_viewer.php");
$echo.=$secho;


$echo.='
<div style="margin:0;padding:0;" id="apendice">
</div>';
$echo.='<script type="text/javascript">

</script>';

}

}


$uidva='albums';
$x=0;
$bydate=array();
$theresults=array();
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$r = mysql_query("SELECT * FROM albums WHERE id='$uidv' AND visibility!='d'");
while($m = mysql_fetch_array($r))
  {
$bydate[$x]=$m['datetimep'];
$theresults[$x]=$m['albumn'].'{}'.$m['sbid'];
$x++;
}

mysql_close($con);                                           
}
else{
if(isset($_POST['selected_album']) || isset($_GET['album']) || $_GET['sk']=="photos_stream"){
if(isset($_POST['selected_album'])){
$selected_album=$_POST['selected_album'];
}
else if(isset($_GET['album'])){$params['layout']='right_column_w_no_borders'; $selected_album=$_GET['album']; $tocheck='2';}
else{$flag2='y';}
if(!isset($flag2)){$flag2='';}
$echo.='';


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$uidva=$uidv.'a';
$x=0;
$bydate=array();
$theresults=array();
$norder=array();
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
if($flag2!='y'){

$r = mysql_query("SELECT * FROM media WHERE albumid='$selected_album' AND id='$uidv' AND visibility!='d' AND nye='3' ORDER BY norder DESC");
$c=mysql_num_rows($r);
$d=$c;

$suf='&ref='.$_GET['album'].'&set=o';
$wk="r";

}
else{ 

$uti=sb_user($uidv);

$uidvp="media";
$r=mysql_query("SELECT * FROM media WHERE id='$uidv' AND visibility!='d' AND nye='3' ORDER BY datetimep DESC");
$c=mysql_num_rows($r);
$d=$c;

$wk="ps";
$suf='&va=t';
}
while($m = mysql_fetch_array($r))
  { 
$bydate[$x]=$m['datetimep'];
if(isset($m['norder']) && $_GET['sk']!="photos_stream"){
if($m['norder']!=""){
$norder[$x]=$m['norder'];
}
else{$norder[$x]=$m['datetimep'];}
}
else{$norder[$x]=$m['datetimep'];}
if($suf=='&va=t'){
$whicha=$uidvp;
$albumn=$m['albumn'];	
}
else{
$whicha=$m['albumid'];
$albumn=$m['albumn'];
}
$aorder=$c;
$c--;



if($m['vidso']!=''){
$swidth=$m['videow'];
$sheight=$m['videoh'];

$duration=simplify_video_duration($m['duration']);

$theresults[$x]='<span data-onclick="getnext(\''.$m['pics'].'\',\''.$uidv.'\',\''.$whicha.'\',\''.$swidth.'\',\''.$sheight.'\',\''.$aorder.'\',\''.$d.'\',\''.$wk.'\',\'f\',\'\',\'\',\'\',\'vid\',\''.$m['vids'].'\',\''.$m['vidshd'].'\',\''.$m['sbid'].'\');" style="cursor:pointer;position:relative;display:inline-block;bottom:-4px;right:-5px;" class="uiVideoLink uiVideoLinkMedium getnext"><i style="background-image: url(\'/'.$uidv.'/pics/'.$m['picss'].'\');" class="picsdisplay4 hth"></i><span class="playtime">'.$duration.'</span><span class="playicon"></span></span><br>';	
}
else{
$osize=getimagesize("../users/$uidv/pics/".$m['pics']);
$swidth=$osize[0];
$sheight=$osize[1];

$theresults[$x]='<span data-onclick="getnext(\''.$m['pics'].'\',\''.$uidv.'\',\''.$whicha.'\',\''.$swidth.'\',\''.$sheight.'\',\''.$aorder.'\',\''.$d.'\',\''.$wk.'\',\'f\',\'\',\'\',\'\',\'\',\'\',\'\',\''.$m['sbid'].'\');" style="position:relative;cursor:pointer;display:inline-block;bottom:-4px;right:-5px;" class="getnext"><i style="background-image: url(\'/'.$uidv.'/pics/'.$m['picss'].'\');" class="picsdisplay4 hth"></i>';	

if(!isset($_GET['album'])){
$tkind=$m['albumn'];

$theresults[$x].='<div class="_53d _53q"><div class="_53g" style="position:absolute;left:0;bottom:0;z-index:1;"><div class="_53i"><a class="_53f" style="max-width:144px;" href="/'.$uti['username'].'/photos?album='.$m['albumid'].'">'.$tkind.'</a></div></div>
<img src="/images/gradient.png" style="height: 53px;position: absolute;left: -1px;bottom: 2px;width: 165px;">
</div>';
}

$theresults[$x].='</span><br>';

}





$x++;
$setpf='';
}

if(!isset($setpf)){

if($wk=="ps"){$albumn='';}
else{
$uidva='albums';
$r=mysql_query("SELECT * FROM $uidva WHERE sbid='$selected_album' AND id='$uidv' AND visibility!='d'");
while($m=mysql_fetch_array($r)){
$albumn=$m['albumn'];
$mdt='';
if($uidv==$uid){
if($albumn=="Profile Pictures" OR $albumn=="Wall Photos"){}
else{
if($albumn=="Videos"){$mdt=' <div style="margin:0;padding:0;display:inline-block;" class="addpl" onclick="window.location=\'/video/?upload\';">Add videos</div>';}
else{$mdt=' <div style="margin:0;padding:0;display:inline-block;" class="addpl addphotos_caller">Add photos</div>';}
}
}
if($albumn=="Videos"){$wi='videos';}
else{$wi='photos';}
$theresults[$x]='<div style="margin:0;padding:0;position:relative;top:40px;" id="nophotos"><img src="/images/IMYxRWl9Pc4.png" style="display:inline-block;border:0;outline:0;padding:0;margin:0;"><div style="margin:0;padding:0;margin-left:8px;position:relative;top:-10px;display:inline-block;color:#333333;font-size:13px;">There are no '.$wi.' in this album.'.$mdt.'</div></div><script type="text/javascript">$("#nophotos").parent().css("width","100%"); $("#nophotos").parent().css("text-align","center");</script>';
	$norder[$x]=$m['datetimep'];
	$thediff=$m['datetimep'];
	$x++;
}
}
}


$r = mysql_query("SELECT * FROM registered WHERE id='$uidv'");
while($m = mysql_fetch_array($r))
  {
$fullname=$m['fullname'];
}

arsort($bydate);
	
if($_GET['sk']!="photos_stream"){
$uidva='albums';
$r=mysql_query("SELECT * FROM $uidva WHERE sbid='$selected_album' AND id='$uidv' AND visibility!='d'");
while($m=mysql_fetch_array($r)){
$thediff=$m['datetimep'];
}
}
$extraalbumchunk='';
if($uid==$uidv){
	if(isset($_GET['album'])){$varc=$_GET['album'];}else{$varc='';}
	if($albumn=="Profile Pictures" OR $albumn=="Wall Photos"){
	$extraalbumchunk='';
	}else{$pfp="media"; 		if(isset($_GET['album'])){$extraalbumchunk=$addphotosbtn;}	else{$extraalbumchunk=$addphotosbtn.$addvideobtn;} }

		

if($_GET['sk']=="photos_stream"){

	if($uid==$uidv){$albumn="Photos of You";}

	} 
}
else{$albumn="Photos of $fullname";}



$uti=sb_user($uidv);

if(!isset($_GET['album'])){

		$echo.='
<script type="text/javascript">
function winlocc(){
	
window.location=window.location;
}
</script>
';

$addphotos_button_url_suf='';
include("addphotos_button.php");
$echo.=$secho;


$echo.='
<div id="firsttagen" style="margin:0;padding:0;display:inline-block;">';
$echo.='</div>';
$echo.='<script type="text/javascript">
$("#firsttagen").html("");
</script>';	
	
	
$echo.='

<script type="text/javascript">
function windowloc(el){
	window.location=el;
}
</script>



';


$echo.='
<div class="clearfix" style="margin-top:-14px;width:749px;padding-right:20px;">
<div style="float:right;" class="clearfix">'.$extraalbumchunk.'</div>
<div class="hphotoswrapper clearfix" style="position:relative;float:left;">
<div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">'.$uti['fullname'].'</div><div class="hphotos"></div><div class="headerphotosv" style="font-size:20px;font-weight:bold;color:rgb(28,42,71);display:inline;">Album Photos</div></div></div><div class="uiHeader uiHeaderSection sbPhotosGridHeader fwb" style="margin-top:12px;margin-bottom:-4px;">Photos from Albums</div>';
}
if(isset($_GET['album'])){

$params['layout']='right_column_w_no_borders';

$ralbum=$_GET['album'];
$r=mysql_query("SELECT * FROM $uidva WHERE sbid='$ralbum' AND id='$uidv' AND visibility!='d'");
while($m=mysql_fetch_array($r)){
$ralbumv=$m['albumn'];
$location=$m['location'];	
$descc=$m['descr'];
}



if($_GET['sk']!="photos_stream"){
if($uidv==$uid){
if($location!=""){
$taken='Taken at '.$location.' <span style="position:relative;top:0px;left:0px;margin-right:2px;margin-left:2px;color:#666666;">&#183;</span> ';	
}
else{$taken='';}
}
else{
if($location!=""){
$taken='Taken at '.$location;	
}	
else{$taken='';}
}


function oturndate_photos($date){$date=tod($date);
  return date('l, F j, Y \a\t g:ia', strtotime($date));
}

function turndate_photos($date){$date=tod($date);
  return date('F j \a\t g:ia', strtotime($date));
}

function turndate3_photos($date){$date=tod($date);
  return date('g:ia', strtotime($date));
}

function td_photos($topv){
$topv=tod($topv);
$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%m'); $suf=" month";
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf=' day';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf=' hour';}
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf=' minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf=' second';}
if($td=='+0' || $td=='-0'){$td='1';}
$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
if(substr($td,0,1)=="0"){$td=substr($td,1);}

if($td>1){$suf.='s';}

if($suf==" day" && $topv>=strtotime("yesterday")){}
else if($suf==" day"){$suf=' days'; $td=2;}
	if($suf==' days' && $td>1){$td=turndate_photos($topv); return $td;}

$td=$td.$suf.' ago';	

	if($td=='1 day ago'){$hrsminsec=turndate3_photos($topv); $td='Yesterday at '.$hrsminsec;}
	return $td;
}

function format_date($t,$w){
return date($w,strtotime($t));
}

function polish_d($difff){
$difff=str_replace("-","",$difff);
$difff=str_replace("+","",$difff);
if($difff=="00"){$difff="0";}
if(strlen($difff)>1 AND substr($difff,0,1)=="0"){
$difff=substr($difff,1);	
}
return $difff;	
}

function timestamp_update_albums($time){

$time=tod($time);
$otime=$time;
$time=new DateTime($time);
$ttime=new DateTime();

$diff=$ttime->diff($time);

$difff=$diff->format("%R%Y"); $el="year";
if($difff=="+00" || $difff=="-00"){$difff=$diff->format("%R%m"); $el="month";}
if($difff=="+0" || $difff=="-0"){$difff=$diff->format("%R%d"); $el="day";}
if($difff=="+0" || $difff=="-0"){$difff=$diff->format("%R%H"); $el="hour";}
if($difff=="+00" || $difff=="-00"){$difff=$diff->format("%R%i"); $el="minute";}
if($difff=="+0" || $difff=="-0"){$difff=$diff->format("%R%s"); $el="second";}
if($difff=="+0" || $difff=="-0"){$difff="1";}
$difff=str_replace("-","",$difff);
$difff=str_replace("+","",$difff);

if(substr($difff,0,1)=="0"){
$difff=substr($difff,1);	
}

$el_v=array();

$el_v['y']=$diff->format("%R%Y");
$el_v['m']=$diff->format("%R%m");
$el_v['d']=$diff->format("%R%d");
$el_v['h']=$diff->format("%R%H");
$el_v['i']=$diff->format("%R%i");
$el_v['s']=$diff->format("%R%s");

foreach($el_v as $k=>$v){
$v=polish_d($v);	
$el_v[$k]=$v;
}

if($el_v['y']>0){
return 'Updated over a year ago';
}
else if($el_v['m']>=1){

if($el_v['d']>=15){
$so=$el_v['m']+1;	
return 'Updated about '.$so.' months ago';
}
else{
$so=$el_v['m'];	
if($so>1){$sp='s';}
else{$so='a'; $sp='';}
return 'Updated about '.$so.' month'.$sp.' ago';
}

	
}
else if($el_v['d']>=1){
if($el_v['d']>=21 AND $el_v['d']<=31){
return 'Updated about 3 weeks ago';	
}
else if($el_v['d']>=14 AND $el_v['d']<21){
return 'Updated about 2 weeks ago';	
}
else if($el_v['d']>=7 AND $el_v['d']<14){
return 'Updated about a week ago';	
}
else if($el_v['d']>1 AND $el_v['d']<7){
return 'Updated on '.format_date($otime,"l");
}
else{return 'Updated Yesterday';}
}
else{
if($difff>1){$sp='s';}
else{$sp='';}
if($el=="hour" AND $difff==1){$difff="about an";}
return 'Updated '.$difff.' '.$el.$sp.' ago';
}



}





$mgtp='margin-top:-3px;';}
else{$mgtp='margin-top:7px;';}

$uti=sb_user($uidv);

if($ralbumv=="Videos"){
$ralbumv=$uti['fullname'].'\'s '.$ralbumv;	
$extraalbumchunk='';
$taken='';
}
else{
$extraalbumchunk.='<a href="/media_set_edit.php?a='.$_GET['album'].'" class="uiButton mls" style="position:relative;"><i class="mrs img lapiz_i"></i><span class="uiButtonText">Edit</span></a>';	
}



$echo.='
<div class="clearfix" style="margin-top:-14px;width:949px;padding-right:20px;">
<div style="float:right;">'.$extraalbumchunk.'</div>
<div class="hphotoswrapper" style="position:relative;float:left;">
<div class="headerphotosv" style="font-size:16px;font-weight:bold;color:rgb(28,42,71);display:inline;">'.$ralbumv.'</div></div></div>';

$echo.='
<script type="text/javascript">
function winlocc(){
	
window.location=window.location;
}

</script>
';

$addphotos_button_url_suf='?album='.$_GET['album'];
include("addphotos_button.php");
$echo.=$secho;


$echo.='
<div class="clearfix">
<div class="friendslink4" style="float:left;">By <a href="/'.$uidv.'/">'.$fullname.'</a> (<a href="photos_albums">Albums</a>)';

if($albumn!='Videos'){
$echo.='<span style="position:relative;top:0px;left:0px;margin-right:2px;margin-left:2px;color:#666666;">&#183;</span> <span title="'.oturndate_photos($thediff).'">'.timestamp_update_albums($thediff).'</span></span> <span style="position:relative;top:0px;left:0px;margin-right:2px;margin-left:2px;color:#666666;">&#183;</span> '.$taken;
}

if($uidv==$uid AND $albumn!='Profile Pictures' AND $albumn!='Videos'){$echo.='<a href="/media_set_edit.php?a='.$ralbum.'"><div style="position:relative;margin:0;padding:0;display:inline-block;"><div class="pensp" style="position:relative;top:-1px;left:-1px;margin-right:4px;"></div></div>Edit Album</a>';}

$echo.='</div></div>



<div id="firsttagen" style="margin:0;padding:0;display:inline-block;">';
$echo.='</div>';
$echo.='<script type="text/javascript">
$("#firsttagen").html("");
</script>';
}
// other $nphotos: else{$nphotos="bla bla bla";}

if(!isset($mgtp)){$mgtp='margin-top:7px;';}
$echo.='
<div style="margin:0;padding:0;border-collapse:collapse;width:780px;position:relative;left:-15px;'.$mgtp.'">';
$xa=0;
$number3=4;


if($_GET['sk']=="photos_stream" || $albumn=="Videos"){arsort($norder);}
else{asort($norder);}

foreach($norder as $key=> $value){

	if($xa=="0"){$echo.='<div style="margin:0;padding:0;">';}
if ($xa % $number3 == 0 AND $xa!=0) {
if(!isset($thecheck)){$echo.='</div><div style="margin:0;padding:0;">'; $theckeck='';}
else{$echo.='</div><div style="margin:0;padding:0;">'; }
}
$echo.='<div class="photo_wrap" style="display:inline-block;padding-left:12px;">';
$echo.= $theresults[$key];
$echo.= '</div>';
$xa++;
}
$echo.='</div></div>';

if(isset($_GET['album'])){

$u_friends=array();
$r=mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='y'");
while($m=mysql_fetch_array($r)){
$u_friends[]=$m['id2'];
}

$echo.='
<script type="text/javascript">

function submitonEnterr(evt){
var charCode = (evt.which) ? evt.which : event.keyCode
var tocheck=$("#comment").val();
if((charCode == "13") && (tocheck=="")){return false;}
else if(charCode == "13"){
var w=$("#comment2").val();

var id=$("#uidv2").val();

var f="froma";
var piclikeval=$("#ltotr2").val();
var thepic="'.$_GET['album'].'";

dodajax2(w,id,f,piclikeval,thepic);


}
} 

function dodajax2(w,id,f,piclikeval,thepic){
	$.ajax({
  async: false,
  type: "POST",
  url: "../loadpiccomment.php",
  data: { duser : id, piccomment : w, thepic : thepic, piclikeval : piclikeval, f : f },
  success: function(data) {
	  var datav=data;
	  piclikeval=parseInt(piclikeval);
	  piclikeval=piclikeval+1;
$("#ltotr2").val(piclikeval);
  $("#appendcm2").append(datav);
$(".pinchin2").css("display","none");
var se=$("#picvalbum");
if(se){}
else{
$(".pinchin3").css("display","block");
}
  
  }
});

}

function viewprepo()
{
var id="'.$uidv.'";
var thepic="'.$_GET['album'].'";
$.ajax({
  async: false,
  type: "POST",
  url: "../loadpcomment2.php?givet=t",
  data: { duser : id, thepic : thepic },
  success: function(response) {
if(response.length>0){
$("#howmanymv2").html(response);
  }
  }
});

var f="froma";
var aquery=$("#howmanym2").html();
var totalm=$("#howmanymv2").html();
aquery=parseInt(aquery);
totalm=parseInt(totalm);

var gtg=totalm-aquery;

if(gtg==0){}
else{
var aquery=$("#howmanym2").html();

var piclikeval=$("#ltotr2").val();

var aqueryv="50";

$.ajax({
  async: "false",
  type: "POST",
  url: "../loadpcomment2.php",
  data: { duser : id, aquery : aquery, thepic : thepic, piclikeval : piclikeval, aqueryv : aqueryv, f : f },
  success: function(response) {
if(response.length>0){

var res=response.split("{{}}");
var achat=\'#appendcm2\';

piclikeval=parseInt(piclikeval);
var parsed=parseInt(res[0]);
piclikeval=piclikeval+parsed;
$("#ltotr2").val(piclikeval);

aquery=parseInt(aquery);
var atotal=aquery+parsed;

$("#howmanym2").html(atotal);
$(achat).append(res[1]);

$(".pinchin2").css("display","none");
var se=$("#picvalbum");
if(se){}
else{
$(".pinchin3").css("display","block");
}

  }
  }
});

}


}
</script>


<div style="display:none" id="howmanym2"></div>
<div style="display:none" id="howmanymv2"></div>
<input type="hidden" id="uidv2" value="'.$uidv.'">
<input type="hidden" id="ltotr2" value="0">';

$r=mysql_query("SELECT * FROM registered WHERE id='$uidv'");
while($m=mysql_fetch_array($r)){
$fullname=$m['fullname'];	
}
$alb_namesp=$_GET['album'];
$r=mysql_query("SELECT * FROM media WHERE albumid='$alb_namesp' AND id='$uidv' AND visibility!='d' AND nye='3' ORDER BY norder ASC LIMIT 1");
while($m=mysql_fetch_array($r)){
$pid=$m['sbid'];
$minip=$m['picsa'];	
$minips='../users/'.$uidv.'/pics/'.$minip;
$size=getimagesize($minips);
$minipw=$size[0];
$miniph=$size[1];
$desc=$m['descr'];
$alb_names=$m['albumn'];
}
$r=mysql_query("SELECT * FROM media WHERE albumid='$alb_namesp' AND id='$uidv' AND visibility!='d' AND nye='3'");
$xg=mysql_num_rows($r);

$likeid=$alb_namesp;

$uidvl=$uidv.'l';
$r10 = mysql_query("SELECT * FROM $uidvl WHERE likeid='$likeid' AND what='album'");
while($m10 = mysql_fetch_array($r10))
  {

if($m10['likeid']==$likeid){
$count=$m10['count'];
if($count!='0'){$count=$count;}else{unset($count);}
}

}


	if($albumn!='Videos'){
$echo.='

<script type="text/javascript">
function showotherp(w,wv){
if(wv==undefined){wv="v"+w; var mor="";}
else{var mor="vv";}
var concrete=$("#otherpeoplev"+mor+w).html();
concrete=\'<div class="pop_container" id="fpop_containerv\'+mor+w+\'" style="height:441px;display:none;position:fixed;"><div class="div_dialog_header" id="fdiv_dialog_header\'+mor+w+\'">Friends</div><div class="div_dialog_body" id="fdiv_dialog_bodyv\'+mor+w+\'" style="height:350px;padding-top:3px;overflow-y:auto;overflow-x:hidden;">\'+concrete+\'</div><div class="div_dialog_footer" style="height:25px;" id="div_dialog_footerv\'+mor+w+\'"><input type="button" value="Close" onclick="close_msgvv(\\\'\'+mor+w+\'\\\');" class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:28px;" id="close_msgvv\'+mor+w+\'"></div></div>\';

var spoph=$("#fpop_containerv"+mor+w).css("height");

if(spoph===undefined){
	$("#width_msgvv").append(concrete);
}

if(mor==""){$("#fdiv_dialog_header"+w).html("People Who Like This");}
else{$("#fdiv_dialog_header"+w).html("Friends");}

var checkjs=$("#checkjs"+wv);
if(checkjs){}
else{$("#close_msgvv"+mor+w).css("top","415px"); $("#close_msgvv"+mor+w).css("right","28px");}

$("#fpop_containerv"+mor+w).css("display","block");
}
function close_msgvv(w){
$("#fpop_containerv"+w).fadeOut("slow");
$.doTimeout( 1600, function(){
$("#fpop_containerv"+w).remove();	
});	
}
</script>
<script type="text/javascript">
function checkwacv(){
var tocheck=$("#comment2").val();
if(tocheck=="Write a comment..."){$("#comment2").val(""); $("#comment2").css("color","#333333");}
}
function checkwac2v(){
var tocheck=$("#comment2").val();
if(tocheck==""){$("#comment2").css("color","#666666"); $("#comment2").val("Write a comment...");}
}
function ctexta(){
var tocheck=$("#desc_changev").val();
tocheck=$.trim(tocheck);
if(tocheck=="Add a description"){$("#desc_changev").val(""); $("#desc_changev").css("color","#333333");}
}
function ctextav(){
var tocheck=$("#desc_changev").val();
tocheck=$.trim(tocheck);
if(tocheck==""){$("#desc_changev").val("Add a description"); $("#desc_changev").css("color","#777777");}
}
function savedesc(){
var dval=$("#desc_changev").val();
dval=$.trim(dval);
if(dval=="Add a description"){dval="";}
var selected_album="'.$_GET['album'].'";
$.ajax({
  type: "POST",
  url: "../changealbumdesc.php",
  data: { album_desc : dval, selected_album : selected_album },
  success: function(response) {
$("#apdesc_change").html(dval);
	  $("#desc_change").css("display","none");
if(dval==""){$("#pdesc_changev").css("display","block");
$("#pdesc_change").css("display","none");
}
else{
	  $("#pdesc_change").css("display","block");
$("#pdesc_changev").css("display","none");

}
  }
});	
}
function showtexta(){
$("#pdesc_changev").css("display","none");
$("#pdesc_change").css("display","none");
$("#desc_change").css("display","block");	
}
function canceldesc(){
var desc=$("#apdesc_change").html();
desc=$.trim(desc);
$("#desc_change").css("display","none");
if(desc==""){$("#pdesc_changev").css("display","block");
$("#pdesc_change").css("display","none");
}
else{
	  $("#pdesc_change").css("display","block");
$("#pdesc_changev").css("display","none");
}
$("#desc_changev").val(desc);
}
function autogr(f, max) {
   if (f.scrollHeight > max) {
      if (f.style.overflowY != "scroll") { f.style.overflowY = "scroll" }
      return;
   }
   if (f.style.overflowY != "hidden") { f.style.overflowY = "hidden" }
   var scrollH = f.scrollHeight;
   if( scrollH > f.style.height.replace(/[^0-9]/g,"") ){
      f.style.height = scrollH+5+"px";
   }

}
</script>';
if(isset($setpf)){
if($descc==''){$cmn='block'; $cmn2='none';}else{$cmn='none'; $cmn2='block';}

if($uidv==$uid AND $albumn!='Profile Pictures'){
$echo.='
<div style="margin:0;padding:0;display:block;margin-bottom:4px;display:'.$cmn.';" id="pdesc_changev">
<div class="pensp" style="position:relative;top:0px;left:-1px;margin-right:3px;"></div><span class="friendslink4ov" onclick="showtexta();">Add a description</span>
</div>';
}
$echo.='
<div id="pdesc_change" style="margin:0;padding:0;margin-bottom:4px;display:'.$cmn2.';width:430px;">';

if($uid==$uidv){$echo.='<div class="spen" title="Edit this description" onclick="showtexta();"></div>';}
$echo.='
<div id="apdesc_change" style="margin:0;padding;0;display:inline-block">
'.$descc.'
</div>
</div>
<div id="desc_change" style="width:430px;display:none;">
<textarea id="desc_changev" title="Add a description" onkeyuponfocus="ctexta();" onblur="ctextav();" style="height:26px;width:429px;font-size:11px;line-height:13px;margin:0pt 0pt 2px;padding:0pt;overflow:hidden;resize:none;color:rgb(119,119,119);border:1px solid rgb(189,199,216);font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;word-wrap:break-word;margin-bottom:4px;" onkeyup="autogr(this,480);">'.$descc.'</textarea>
<div style="margin:0;padding:0;display:block;height:24px;">
<div style="margin:0;padding:0;float:right;position:relative;left:-1px;">
<label class="saveec" onclick="savedesc();"><input type="button" value="Save" class="saveec2"></label>
<label class="cancelec" style="margin-left:0px;" onclick="canceldesc();"><input type="button" value="Cancel" class="cancelec2"></label>
</div>
</div>
</div>
<script type="text/javascript">
var desc="'.$descc.'";
if(desc==""){
$("#desc_changev").val("Add a description");
}
</script>
	<form name="likepicalbum" id="likepicalbum" action="/like.php" method="POST" target="likeframe" style="display:inline;margin:0;padding:0;"><input type="hidden" name="lpid" value="'.$alb_namesp.'"><input type="hidden" name="appendlike" value="album"><input type="hidden" name="whatisit" value="album"><input type="hidden" name="duidv" value="'.$uidv.'"><input type="hidden" name="cwd" value="esalbum"><input type="hidden" name="albumid" value="'.$alb_namesp.'"></form><span class="friendslink4ov" onclick="like(\'likepicalbum\',\'f\');">Like</span><span style="position:relative;top:0px;left:0px;margin-right:2px;margin-left:2px;color:#666666;" id="insertshareafter">&#183;</span><span class="friendslink4ov" onclick="show_msg_dialogs(\''.$_GET['album'].'\',\'a\',\''.$uidv.'\',\''.$pid.'\',\''.$minip.'\','.$minipw.','.$miniph.',\''.$alb_names.'\',\''.$fullname.'\','.$xg.',\''.$desc.'\');">Share</span>


<table style="border-collapse:separate;padding:0;margin:0;background:#ffffff;position:relative;width:420px;margin-top:9px" cellspacing="0" cellpadding="0" id="mgt"><tr><td style="text-align:left;"><table style="padding:0;margin:0;border-collapse:collapse;" cellspacing="0" cellpadding="0" id="appendlikealbum"><tr><td style="text-align:left;">';

if(isset($count)){
	
	
			$uidvml=$uidv.'ml';
	
	$uidvdl=array();
	$mx=0;
	$r=mysql_query("SELECT * FROM $uidvml WHERE likeid='$likeid' AND what='album' ORDER BY datetimep DESC LIMIT 25");
	while($m=mysql_fetch_array($r)){
	$uidvdl[$mx]=$m['who'];	
	$mx++;
	}
	
	$mxv=0;
	$uidvdlv=array();
	$uidvdlp=array();
	$uidvdln=array();
	$uidvdlun=array();
	foreach($uidvdl as $mkey => $iluser){
	$gresult=mysql_query("SELECT * FROM registered WHERE id='$iluser'");
	while($grow=mysql_fetch_array($gresult)){
	$uidvdlv[$mxv]=$iluser;
	$uidvdlp[$mxv]=$grow['profilepict'];
	$uidvdln[$mxv]=$grow['fullname'];
	$uidvdlun[$mxv]=$grow['username'];
	if($grow['username']==""){
	$uidvdlun[$mxv]=$iluser;
	}
	$mxv++;
	}
	}
	
	$lco=1;
	$otherpeoplev='';
	$otherpeople='';
	if($mxv>6){$mposr='margin-right:12px;'; $mposrv='88';}
	else{$mposr=''; $mposrv='76';}
	foreach($uidvdlv as $mkey => $iluser){
	
	
	if($lco==$mxv){$border='0';}else{$border='1';}
if($lco=='7'){$otherpeoplev.='<div style="display:none;" id="checkjsv'.$x.'" value="7"></div>';}	
	
	if(!in_array($iluser,$u_friends)){


$rvv=mysql_query("SELECT * FROM friends WHERE id='$uid' AND id2='$iluser'");
while($mv=mysql_fetch_array($rvv)){
if($mv['confirmed']=='y'){$fflag='';}
else if($mv['confirmed']=='nc' || $mv['confirmed']=='n'){$fflag=''; $otherpeoplev.='<div style="margin:0;padding:0;width:397px;position:relative;left:-10px;border-bottom:'.$border.'px solid #e9e9e9;padding-top:3px;background:#ffffff;" class="friendslink"><a href="/'.$uidvdlun[$mkey].'"><img src="/'.$iluser.'/pics/'.$uidvdlp[$mkey].'" style="height:50px;width:50px;position:relative;left:4px;border:0!important;outline:0!important;"></a><a href="/'.$uidvdlun[$mkey].'" style="position:relative;top:-22px;left:12px;font-size:12px;">'.$uidvdln[$mkey].'</a><input id="addfriendbtl'.$lco.'" type="button" value="Friend Request Sent" class="addfriend" style="text-align:right;position:absolute;right:8px;top:8px;padding-left:3px;padding-top:3px;padding-bottom:3px;padding-right:3px;font-size:11px;'.$mposr.'"></div>';}
}

if($iluser==$uid){$otherpeoplev.='<div style="margin:0;padding:0;width:397px;position:relative;left:-10px;border-bottom:'.$border.'px solid #e9e9e9;padding-top:3px;background:#ffffff;" class="friendslink"><a href="/'.$uidvdlun[$mkey].'"><img src="/'.$iluser.'/pics/'.$uidvdlp[$mkey].'" style="height:50px;width:50px;position:relative;left:4px;border:0!important;outline:0!important;"></a><a href="/'.$uidvdlun[$mkey].'" style="position:relative;top:-22px;left:12px;font-size:12px;">'.$uidvdln[$mkey].'</a><input id="addfriendbtvv'.$lco.'" type="button" value="Friend Request Sent" class="addfriend" style="text-align:right;position:absolute;right:8px;top:8px;padding-left:3px;padding-top:3px;padding-bottom:3px;padding-right:3px;font-size:11px;'.$mposr.'display:none;'.$mposr.'"></div>'; $fflag='';}

if(!isset($fflag)){	
$otherpeoplev.='<div style="margin:0;padding:0;width:397px;position:relative;left:-10px;border-bottom:'.$border.'px solid #e9e9e9;padding-top:3px;background:#ffffff;" class="friendslink"><a href="/'.$uidvdlun[$mkey].'"><img src="/'.$iluser.'/pics/'.$uidvdlp[$mkey].'" style="height:50px;width:50px;position:relative;left:4px;border:0!important;outline:0!important;"></a><a href="/'.$uidvdlun[$mkey].'" style="position:relative;top:-22px;left:12px;font-size:12px;">'.$uidvdln[$mkey].'</a><input id="addfriendbtlv'.$lco.'" type="button" value="Add Friend" class="addfriend addfriendbtlv'.$lco.'" style="text-align:right;position:absolute;right:8px;top:8px;padding-left:20px;padding-top:3px;padding-bottom:3px;padding-right:3px;font-size:11px;'.$mposr.'" onclick="addfriendajaxl(\''.$iluser.'\','.$lco.');"><div class="masuno addfriendbtlvv'.$lco.'" style="position:absolute;top:11px;right:'.$mposrv.'px;" onclick="addfriendajaxl(\''.$iluser.'\','.$lco.');" id="addfriendbtlvv'.$lco.'"></div></div>';
	}	
else{unset($fflag);}
}
else{	
$otherpeoplev.='<div style="margin:0;padding:0;width:397px;position:relative;left:-10px;border-bottom:'.$border.'px solid #e9e9e9;padding-top:3px;background:#ffffff;" class="friendslink"><a href="/'.$uidvdlun[$mkey].'"><img src="/'.$iluser.'/pics/'.$uidvdlp[$mkey].'" style="height:50px;width:50px;position:relative;left:4px;border:0!important;outline:0!important;"></a><a href="/'.$uidvdlun[$mkey].'" style="position:relative;top:-22px;left:12px;font-size:12px;">'.$uidvdln[$mkey].'</a><input id="addfriendbtlv'.$lco.'" type="button" value="Friends" class="addfriend" style="text-align:right;position:absolute;right:8px;top:8px;padding-left:3px;padding-top:3px;padding-bottom:3px;padding-right:3px;font-size:11px;'.$mposr.'"></div>';
}
	
$lco++;	
	
	
	}
	

$echo.='<tr><td colspan="2" class="friendslink3" style="color:#333333;background-color:rgb(237,239,244);padding-top:8px;width:420px;max-width:420px;border-bottom:1px solid rgb(210, 217, 231);"><div style="position:relative;"><div class="pinchito2" style="position:absolute;left:18px;bottom:8px;"></div><div class="likebtn2" style="position:absolute;bottom:-9px;cursor:pointer;left:4px;" onclick="submiitf(\'likepicalbum\')" title="Like this item"></div></div><div style="position:relative;left:25px;top:-4px;"><div style="margin:0;padding:0;display:inline-block;cursor:pointer;" class="friendslinkvl2" onclick="showotherp(\'album\');" id="picvalbum">'.$count.' people</div> like this.</div><div id="otherpeoplevalbum" style="display:none;">'.$otherpeoplev.'</div></td></tr>';	
	$haslikes='';
}

$echo.='
</td></tr></table></td></tr></table>
';


$echo.='

<div class="pinchin3" style="position:relative;bottom:-1px;left:0;display:none;margin-top:0px;"></div>

<table id="appendcm2" style="background:rgb(237,239,244);margin:0;margin-top:0px;padding:0;border-collapse:separate;border-bottom:0;max-height:520px;width:420px;max-width:420px;" cellspacing="0" cellpadding="0"><tr><td>

</td></tr></table>';




$uti=sb_user($uidv);
$profilephoto=$uti['profilepict'];

if(isset($haslikes)){$pdis='none';}else{

	
$pdis='block'; $echo.='<script type="text/javascript">$("#mgt").css("margin-top","0");</script>';}
$echo.='<div class="pinchin2" style="position:relative;bottom:-1px;display:'.$pdis.';margin-top:0px;"></div>

<table style="width:420px;background-color:rgb(237,239,244);border-top:1px solid #ffffff;"><tr><td style="paddin:0;padding-top:4px;padding-left:4px;"><div style="position:relative;margin:0;padding:0;" id="cpos12"><img id="commentphoto2" src="/'.$uid.'/pics/'.$profilephoto.'" style="max-width:32px;max-height:32px;"></td><td style="vertical-align:top;"><div style="position:relative;margin;0;padding;0;bottom:-3px;" id="cpos22"><input value="Write a comment..." id="comment2" name="comment2" onfocus="checkwacv();" onblur="checkwac2v();" title="Write a comment..." style="padding:3px;border:1px solid rgb(189,199,216);color:#666666;font-size:11px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;width:363px;" onKeyDown="javascript:return submitonEnterr(event);"></div></td></tr></table>

<script type="text/javascript">
viewprepo();
</script>
';

}
}

}

include("functions/sb_user.php");

$uti=sb_user($uidv);
$profilephoto=$uti['profilepict'];




include("gallery_viewer.php");
$echo.=$secho;


$echo.='
<div style="margin:0;padding:0;" id="apendice"></div>';


}

mysql_close($con);
}

$echo.='</div>
</div>';
?>
<?php

$params['rhelper']='../';
$params['rhelper_js']='../';
$params['title']='Upfrev';

if(!isset($params['layout'])){
$params['layout']='normal_w';	
}


$uti=sb_user($uidv);

$uidvp="media";

$r=mysql_query("SELECT * FROM $uidvp WHERE id='$uidv' AND visibility!='d'");
$ap=mysql_num_rows($r);

if($ap!=0){$ap=' <span class="fcg">('.$ap.')</span>';}
else{$ap='';}

$uidva='albums';

$r=mysql_query("SELECT * FROM $uidva WHERE id='$uidv' AND visibility!='d'");
$a=mysql_num_rows($r);

if($a!=0){$a=' <span class="fcg">('.$a.')</span>';}
else{$a='';}

$params['left_link_w']="photos";
$params['left_menu_added']='
<script type="text/javascript">
$("#llm4").after(\'<a href="/'.$uti['username'].'/photos_stream"><div id="llmap" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmapv" class="linkwrap subitem" style="position:relative;left:25px;display:inline-block;bottom:0;">Album Photos'.$ap.'</div></div></a><a href="/'.$uti['username'].'/photos_albums"><div id="llma" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;"><div id="llmav" class="linkwrap subitem" style="position:relative;left:25px;display:inline-block;bottom:0;">Albums'.$a.'</div></div></a>\');
</script>
';	

if($_GET['sk']=="photos_albums"){
$params['left_menu_added'].='
<script type="text/javascript">
$("#llm4").removeClass("wrapper_fotos2");
$("#llm4").addClass("wrapper_fotos");
$("#llm4v").removeClass("linkwrap2");
$("#llm4v").addClass("linkwrap");

$("#llma").removeClass("wrapper_fotos");
$("#llma").addClass("wrapper_fotos2");
$("#llmav").removeClass("linkwrap");
$("#llmav").addClass("linkwrap2");
</script>
';	
}
else if($_GET['sk']=="photos_stream"){
$params['left_menu_added'].='
<script type="text/javascript">
$("#llm4").removeClass("wrapper_fotos2");
$("#llm4").addClass("wrapper_fotos");
$("#llm4v").removeClass("linkwrap2");
$("#llm4v").addClass("linkwrap");

$("#llmap").removeClass("wrapper_fotos");
$("#llmap").addClass("wrapper_fotos2");
$("#llmapv").removeClass("linkwrap");
$("#llmapv").addClass("linkwrap2");
</script>
';		
}

if(isset($_GET['album'])){
$secho='<div style="margin-left:20px;margin-top:23px;">';	
}
else{
$secho='<div style="margin-left:20px;">';
}
$secho.=$echo;
$secho.='<script type="text/javascript">
$(document).on("click","._53f",function(e){
e.stopPropagation();	
});
$(document).on("click",".getnext",function(){
eval($(this).data("onclick"));
});
$(".uiVideoLink").hover(function(){$(this).find(".playicon").addClass("playiconv"); $(this).find(".playicon").removeClass("playicon");},function(){$(this).find(".playiconv").addClass("playicon"); $(this).find(".playicon").removeClass("playiconv");});
</script>';
$secho.='</div>';
$echo=$secho;

if($_GET['sk']=="photos_stream" || $_GET['sk']=="photos_tagged"){
$params['layout']="left_column_w";	
}
else if($_GET['sk']=="photos_albums"){
$params['layout']="normal_w";	
}





include("end.php");
?>