<?php
include("functions/math_functions.php");
if(isset($_GET['sk'])){
$dget='sk='.$_GET['sk'];
if($dget=='sk=app_2305272732_2392950137'){
$justphotos='';	
}
else if($dget=="sk=app_2309869772"){
$justlinks='';	
}
}
if(isset($_GET['wall'])){
$wall="";	
$uidv=$_GET['uidv'];
}
if(isset($_POST['lak'])){
include("start.php"); 
}
if(isset($_GET['list'])){
$clist=$_GET['list'];
}
$lco=1;
$bydate=array();
$topa=array();
$dr=array();
$x=0;
if(isset($_POST['lak'])){
$lak=$_POST['lak'];
$x=$lak+1;	
}

$lbdpvvv=array();
if(isset($_POST['lbd2'])){

$lbdpv=$_POST['lbd2v'];
if(strpos($lbdpv,",")!==false){
$lbdpvv=explode(",",$lbdpv);
foreach($lbdpvv as $k=>$v){
if(!empty($v)){
$vv=explode(":",$v);

$lbdpvvv[$vv[0]][]=$vv[1];

}
}

}
}

$dtc="UNIX_TIMESTAMP(CONVERT_TZ(FROM_UNIXTIME(datetimep), '+00:00', '$ctimezone'))";

$ix=$x;

$axvu=array();
$axvu[0][]="23";
$axvu[0][]="22";
$axvu[0][]="21";
$axvu[0][]="20";
$axvu[0][]="19";
$axvu[0][]="18";
$axvu[1][]="17";
$axvu[1][]="16";
$axvu[1][]="15";
$axvu[1][]="14";
$axvu[1][]="13";
$axvu[1][]="12";
$axvu[2][]="11";
$axvu[2][]="10";
$axvu[2][]="09";
$axvu[2][]="08";
$axvu[2][]="07";
$axvu[2][]="06";
$axvu[3][]="05";
$axvu[3][]="04";
$axvu[3][]="03";
$axvu[3][]="02";
$axvu[3][]="01";
$axvu[3][]="00";

$cinco=20;
$cincov=round($cinco/10); // limite de select stories de cada cosa por cada usuario
$diecinueve=19; // array de hasta donde
$veinte=20; // dias para atras


$rnow=date("Y-m-d H:i:s");
$rnowu=time();

$tago=time() - ($veinte * 24 * 60 * 60);
$tagou=$tago;
$tago=date('Y-m-d H:i:s', $tago);

$tdays=array();
$tdaysv=array();
$tdaysvv=array(); 

$ax=0;
$ay=1;
while($ax<=$diecinueve){
$tim=time() - ($ax * 24 * 60 * 60);
$tdaysv[$ax]=$tim;

$timv=$tim+($ay * 24 * 60 * 60);
$tdaysvv[$ax]=$timv;
$tim=date('Y-m-d', $tim);
$tdays[$ax]=$tim;
$ax++;
$ay++;	
}

$mn=0;
$mnv=0;

if(isset($wall)){
    $mn=39999; //first range of stories for a news feed	
    $mnv=39999; //second range of stories for a news feed
}

$pmn=$mn;
$pmnv=$mnv;

$currentdir=getcwd(); 

$unv=$uidv;


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


$hidden=array();
$r=mysql_query("SELECT * FROM hidden_stories WHERE id='$uid' AND hidden='1'");
while($m=mysql_fetch_array($r)){
$hidden[$m['whatisit']][]=$m['likeid'];
}


$currentdir=str_replace('C:\\xampp\\htdocs\\','/',$currentdir);
$currentdir=str_replace('\\','/',$currentdir);
$pagename = basename($_SERVER['PHP_SELF']);
$currentdir.='/'.$pagename;

function genRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $string = '';    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    return $string;
}


include("functions/td.php");	

$uidva=$uidv.'a';


$u_friends=array();


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$r3 = mysql_query("SELECT * FROM friends WHERE id='$uidv' AND confirmed='y'");
while($m3 = mysql_fetch_array($r3))
  {
$u_friends[]=$m3['id2'];
}

$u_friendsm=$u_friends;

$r3 = mysql_query("SELECT id2 FROM friends WHERE id='$uidv' AND confirmed!='y'");
while($m3 = mysql_fetch_array($r3))
  {
$u_friendsm[]=$m3['id2'];
}

if(isset($clist)){
$r=mysql_query("SELECT * FROM lists WHERE sbid='$clist' AND id='$uid' AND (visibility='v' OR visibility='h')");
$c=mysql_num_rows($r);
if($c==0){
unset($clist);	
}


if(isset($clist)){

$uid_friends_comma_list="";
$uid_friends_list=array();
$r=mysql_query("SELECT * FROM lists_members WHERE listid='$clist' AND id='$uid' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$uid_friends_list[]=$m['id2'];	
$uid_friends_comma_list.=",".$m['id2'];
}


if(strpos($uid_friends_comma_list,",")!==false){
$uid_friends_comma_list=substr($uid_friends_comma_list,1);	
}


$uid_friends_comma_list_me=$uid_friends_comma_list.",".$uid;


}

}

$r = mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m = mysql_fetch_array($r))
  {
$fullname=$m['f_name'].' '.$m['l_name'];
$profilephoto=$m['profilepict'];
}

include("functions/sb_user.php");



if(!isset($clist)){

if(!isset($wall)){
$uid_friends_comma_qs_me=$uid_friends_comma_me;
$uid_friends_comma_qs=$uid_friends_comma;
$sb=$uid_friends;
$sbv=$uid_friends;
$sbv[]=$uid;
$whomposted=$sbv;
$oli=$sbv;
}
else{
$uid_friends_comma_qs_me=$uidv;
$uid_friends_comma_qs=$uidv;
$sb[]=$uidv;
$sbv[]=$uidv;
$whomposted=$sb; //for wall uploader usage
$oli=$sbv;
}

}
else{
$uid_friends_comma_qs_me=$uid_friends_comma_list;

//para caso de list se hace query de todo lo que yo haga que contenga privacy equivalente a la lista - para esto anexar una union en las queries que corresponda,
//no va en I like a photo, o I commented on a photo.., para este caso va un transformed que tambien se aplica en wall que no me tiene a mi de seguro.
//

$uid_friends_comma_qs=$uid_friends_comma_list;
$sb=$uid_friends_list;	
$sbv=$sb;
$oli=$sbv; //on list included
$oli[]=$uid;
$whomposted=$oli;
}



//relationship

if(!isset($justphotos) AND !isset($justlinks)){

$xrt=0;
$y=0;	
$xrtl=0;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

if(!isset($wall)){
$mn=20;	
$mnv=5;
}

$b_qf=return_bq("lists_members","love");
$dq="(SELECT * FROM lists_members WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND $dtc<='$rnowu' AND $dtc>'$tagou' AND visibility='v' AND type='love' AND relation_confirmed='2' $b_qf GROUP BY id ORDER BY datetimep DESC LIMIT $mn)";

if(isset($clist)){
$dq.=" UNION (SELECT * FROM lists_members WHERE id='$uid' AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(privacy,'l',''))>0)>0 AND $dtc<='$rnowu' AND $dtc>'$tagou' AND visibility='v' AND type='love' AND relation_confirmed='2' $b_qf GROUP BY id ORDER BY datetimep DESC LIMIT $mn)";
}

$dq.=" UNION (SELECT * FROM lists_members WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND $dtc<'$tagou' AND visibility='v' AND type='love' AND relation_confirmed='2' $b_qf GROUP BY id ORDER BY datetimep DESC LIMIT $mnv)";

if(isset($clist)){
$dq.=" UNION (SELECT * FROM lists_members WHERE id='$uid' AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(privacy,'l',''))>0)>0 AND $dtc<'$tagou' AND visibility='v' AND type='love' AND relation_confirmed='2' $b_qf GROUP BY id ORDER BY datetimep DESC LIMIT $mnv)";
}

$r=mysql_query("$dq");
while($m=mysql_fetch_array($r))
  {
$value=$m['id'];
$uidv=$value;
$ltype="relationship";
	  
$likeid=$m['sbid'];
$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count'];
if($count!='0'){$count=$count;}
else{unset($count);}
}	  
$c=mysql_num_rows($r10);
if($c==0){
unset($count);	
}
$uo=$uidv;

$pause='';

$whatisit_h="relationship";
		$cag=$likeid;
include("set_pause.php");


if($uo==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removep2_o(\''.$likeid.'\','.$x.',\'living\');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"></div></div>';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';	
}

$dr[$x]=$faddo;

$uti=sb_user($uidv);
$uo_pic=$uti['profilepict'];
$uo_fn=$uti['fullname'];

$uti=sb_user($m['id2']);

$relation_text[3]='is engaged to';
$relation_text[2]='is in a relationship with';
$relation_text[6]='is in an open relationship with';
$relation_text[1]='is in a relationship with';
$relation_text[4]='is married to';


$story_text=' '.$relation_text[$m['relation']].' '.$uti['link'];

$uti=sb_user($uo);

$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$uti['username'].'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table style="margin:0;padding:0;"><tr><td style="vertical-align:top;" class="friendslink"><a hc="" href="/'.$uti['username'].'">'.$uo_fn.'</a> '.$story_text.'.'.'</td></tr><tr><td style="height:2px;"><span style="color:#333333"></span></td></tr>';


$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}


$dr[$x].='<tr><td class="story_foot_td" style="padding-left:2px;"><div class="lbl inlineBlock"><abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td
($m['datetimep']).'</abbr></div>';

$ltypev="relationship";
$sbid="";

$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$m['id'];

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';



$dr[$x].='<div class="foot_box lb">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

$thefabtext=$likeid;

$value=$uidv;
$vrt=0;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM commentsv WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];

  	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;
$bydate[$x]=$m['datetimep'];

	
if(isset($count)){

$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$value;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

include("stories/likes_this.php");

if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\'; bordercito(\''.$x.'\');';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}

if(!isset($haslikes)){$tm='inline-block';}else{$tm='none';}

if($vrt>2){
	$tmv='none';
}
else{
	$tmv='block';
}


if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$dr[$x].='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;padding-top:5px;padding-bottom:5px;position:relative;margin-left:78px;" class="foot_box_inner" id="moremsgv'.$x.'">



<div style="width:60%;margin:0;padding:0;display:inline-block;" id="moremsgvv'.$x.'">

<div class="msgiconito" style="position:absolute;left:8px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:22px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',1);'.$cont.' $(\'#share_cv'.$x.'\').remove(); $(\'#moremsgvv'.$x.'\').css(\'width\',\'100%\');  $(\'#share_c'.$x.'\').css(\'display\',\'block\'); document.getElementById(\'rofm'.$x.'\').style.display=\'block\';" id="moremsg'.$x.'">View all '.$vrt.' comments</span><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',2)" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#666666;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div></div>';	
$dr[$x].='</div>';
}

if(!isset($haslikes) AND !isset($hasshares) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}


$r11=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m11=mysql_fetch_array($r11)){
$uidpic=$m11['profilepict'];	
}

$nml=78;
$nmlf='';

$two_c=2;

$for_photo='';
/*
include("load_2_comments.php");

include("comment_box.php");
*/

$dr[$x].='</div>'; //foot box closure

$dr[$x].'</td></tr>';

$dr[$x].='</td></tr></table></td></tr></table>';

$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure

if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);}
$x++;

 $y++;	  
  }

	
}

//living

$xrt=0;


$y=0;	

if(!isset($justphotos) AND !isset($justlinks)){


$xrtl=0;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


if(!isset($wall)){
$mn=20;
$mnv=5;	
}

$b_qf=return_bq("living","current_city");

$dq="(SELECT * FROM living WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND $dtc<='$rnowu' AND $dtc>'$tagou' AND visibility='v' AND type='current_city' $b_qf ORDER BY datetimep DESC LIMIT $mn)";

if(isset($clist)){
$b_qfv=return_bqv("living","current_city");
$dq.=" UNION (SELECT * FROM living WHERE $b_qfv AND $dtc<='$rnowu' AND $dtc>'$tagou' AND visibility='v' AND type='current_city' $b_qf ORDER BY datetimep DESC LIMIT $mn)";
}

$dq.="UNION (SELECT * FROM living WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND $dtc<'$tagou' AND visibility='v' AND type='current_city' $b_qf ORDER BY datetimep DESC LIMIT $mnv)";

if(isset($clist)){
$b_qfv=return_bqv("living","current_city");
$dq.=" UNION (SELECT * FROM living WHERE $b_qfv AND $dtc<'$tagou' AND visibility='v' AND type='current_city' $b_qf ORDER BY datetimep DESC LIMIT $mnv)";
}

$b_qf=return_bq("living","hometown");

$dq.="UNION (SELECT * FROM living WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND $dtc<='$rnowu' AND $dtc>'$tagou' AND visibility='v' AND type='hometown' $b_qf ORDER BY datetimep DESC LIMIT $mn)";

if(isset($clist)){
$b_qfv=return_bqv("living","hometown");
$dq.=" UNION (SELECT * FROM living WHERE $b_qfv AND $dtc<='$rnowu' AND $dtc>'$tagou' AND visibility='v' AND type='hometown' $b_qf ORDER BY datetimep DESC LIMIT $mn)";
}

$dq.="UNION (SELECT * FROM living WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND $dtc<'$tagou' AND visibility='v' AND type='hometown' $b_qf ORDER BY datetimep DESC LIMIT $mnv)";

if(isset($clist)){
$b_qfv=return_bqv("living","hometown");
$dq.=" UNION (SELECT * FROM living WHERE $b_qfv AND $dtc<'$tagou' AND visibility='v' AND type='hometown' $b_qf ORDER BY datetimep DESC LIMIT $mnv)";
}

$r=mysql_query("$dq");
while($m=mysql_fetch_array($r))
  {
$value=$m['id'];
$uidv=$value;
$ltype="living";
	  
$likeid=$m['sbid'];
$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count'];
if($count!='0'){$count=$count;}
else{unset($count);}
}	  
$c=mysql_num_rows($r10);
if($c==0){
unset($count);	
}
$uo=$uidv;

$pause='';

$whatisit_h=$m['type'];
		$cag=$likeid;
include("set_pause.php");


if($uo==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removep2_o(\''.$likeid.'\','.$x.',\'living\');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"></div></div>';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';	
}

$dr[$x]=$faddo;

$uti=sb_user($uidv);
$uo_pic=$uti['profilepict'];
$uo_fn=$uti['fullname'];


$statec="";
$countryc="";
$cityc="";
$av="";

$statec=$m['statec'];
$countryc=$m['countryc'];
$cityc=$m['cityc'];
$cityc=addslashes($cityc);
$cityc=addslashes($cityc);
if($cityc!=""){	
$f='';
}

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
if(isset($f)){
$r3=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($m3=mysql_fetch_array($r3)){
$staten=$m3['staten'];	
}
$r2=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($m2=mysql_fetch_array($r2)){
$countryn=$m2['countryn'];	
}
if($countryn=="United States"){
$av=$cityc.', '.$staten;
}
else{
$av=$cityc.', '.$countryn;
}
unset($f);}
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


if($m['type']=="current_city"){
$story_text='updated '.$uti['prefix'].' current city to '.$av;
}
else{
$story_text='added '.$av.' as '.$uti['prefix'].' hometown';
}

$uti=sb_user($uo);

$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$uti['username'].'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table style="margin:0;padding:0;"><tr><td style="vertical-align:top;" class="friendslink"><a hc="" href="/'.$uti['username'].'">'.$uo_fn.'</a> '.$story_text.'.'.'</td></tr><tr><td style="height:2px;"><span style="color:#333333"></span></td></tr>';


$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}


$dr[$x].='<tr><td class="story_foot_td" style="padding-left:2px;"><div class="lbl inlineBlock">'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment">Comment</span>&nbsp;&#183;&nbsp;<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td
($m['datetimep']).'</abbr></div>';

$ltypev="living";
$sbid="";
$extra_param=$m['type'];

$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$m['id'];

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';



$dr[$x].='<div class="foot_box lb">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

$thefabtext=$likeid;

$value=$uidv;
$vrt=0;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM commentsv WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];

  	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;
$bydate[$x]=$m['datetimep'];

	
if(isset($count)){

$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$value;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

include("stories/likes_this.php");

if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\'; bordercito(\''.$x.'\');';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}

if(!isset($haslikes)){$tm='inline-block';}else{$tm='none';}

if($vrt>2){
	$tmv='none';
}
else{
	$tmv='block';
}


if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$dr[$x].='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;padding-top:5px;padding-bottom:5px;position:relative;margin-left:78px;" class="foot_box_inner" id="moremsgv'.$x.'">



<div style="width:60%;margin:0;padding:0;display:inline-block;" id="moremsgvv'.$x.'">

<div class="msgiconito" style="position:absolute;left:8px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:22px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',1);'.$cont.' $(\'#share_cv'.$x.'\').remove(); $(\'#moremsgvv'.$x.'\').css(\'width\',\'100%\');  $(\'#share_c'.$x.'\').css(\'display\',\'block\'); document.getElementById(\'rofm'.$x.'\').style.display=\'block\';" id="moremsg'.$x.'">View all '.$vrt.' comments</span><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',2)" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#666666;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div></div>';	

$dr[$x].='</div>';
}

if(!isset($haslikes) AND !isset($hasshares) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}


$r11=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m11=mysql_fetch_array($r11)){
$uidpic=$m11['profilepict'];	
}

$nml=78;
$nmlf='';

$two_c=2;

$for_photo='';
include("load_2_comments.php");

include("comment_box.php");

$dr[$x].='</div>'; //foot box closure

$dr[$x].'</td></tr>';

$dr[$x].='</td></tr></table></td></tr></table>';

$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure

if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);}
$x++;

 $y++;	  
  }
 
  
}






























//tastes

if(!isset($justphotos) AND !isset($justlinks)){



function tdpp_av($top,$topv){
$top=tod($top); 
$topv=tod($topv); 

$compared_time=new DateTime($topv);
$actual_time=new DateTime($top);
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%Y'); $suf=" year";
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%m'); $suf=' month';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf='day';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf='hour';}
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf='minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf='second';}
if($td=='+0' || $td=='-0'){$td='1';}
$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}

if($suf=='second' || $suf=='minute' || $suf=='hour' || $suf=='day' && $td<3){
return 'belongs';
}
else{return 'past';}

}














foreach($oli as $key => $value){

$xrtl=0;
$uidv=$value;
$y=0;	



$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


$dtypes=array();

$dtypes["sports"]="";;
$dtypes["teams"]="";
$dtypes["athletes"]="";
$dtypes["activities"]="";
$dtypes["interests"]="";

$dq="";
$ax=0;
foreach($dtypes as $dk=>$dv){
$ax++;
$b_qf=return_bq("tastes",$dk);

if($ax!=1){
$dq.=" UNION ";
}

if(!isset($wall)){
$mn=4;
$mnv=2;	
}


if(isset($clist) AND $uidv==$uid){
$b_qfv=return_bqv("tastes",$dk);

$dq.=" (SELECT * FROM tastes WHERE $b_qfv AND visibility='v' AND type='$dk' AND $dtc<='$rnowu' AND $dtc>'$tagou' $b_qf ORDER BY datetimep DESC LIMIT $mn)";
$dq.=" UNION (SELECT * FROM tastes WHERE $b_qfv AND visibility='v' AND type='$dk' AND $dtc<'$tagou' $b_qf ORDER BY datetimep DESC LIMIT $mnv)";
}
else{
$dq.="(SELECT * FROM tastes WHERE id='$uidv' AND visibility='v' AND type='$dk' AND $dtc<='$rnowu' AND $dtc>'$tagou' $b_qf ORDER BY datetimep DESC LIMIT $mn)";
$dq.="UNION (SELECT * FROM tastes WHERE id='$uidv' AND visibility='v' AND type='$dk' AND $dtc<'$tagou' $b_qf ORDER BY datetimep DESC LIMIT $mnv)";
}

}


$r=mysql_query("$dq");
$c=mysql_num_rows($r);


if($c>0){

$ddates1=array();
$ddates2=array();
$ddates3=array();
$ddates4=array();
$ddates5=array();

$ids_array=array();

while($m=mysql_fetch_array($r)){
$mp=$m;

if(isset($pause) && $pause=="t"){unset($pause);} 
else{

if($m['type']=='activities'){$ux=1;}
else if($m['type']=='sports'){$ux=2;}
else if($m['type']=='teams'){$ux=3;}
else if($m['type']=='athletes'){$ux=4;}
else if($m['type']=='interests'){$ux=5;}
${'ddates'.$ux}[$m['sbid']]=$m['datetimep'].'{}'.$m['taste'];

}

  }
 
$corrworkitsa=array();
$corrworkitsa[1]='activities';
$corrworkitsa[2]='sports';
$corrworkitsa[3]='teams';
$corrworkitsa[4]='athletes';
$corrworkitsa[5]='interests';

$workits=1;
$workite=5;

while($workits<=$workite){

$corrworkits=$corrworkitsa[$workits];

$belongs=array();
$wpics=array();
$datetimeppc=array();
  
$arri=0;
$arriv=0;
$xp=0;	

$wvaluev=array();
	
	foreach(${'ddates'.$workits} as $keyr => $wvaluev[$xp]){
		$rval=explode("{}",$wvaluev[$xp]);
		$wvaluev[$xp]=$rval[0];
		${'dperson'.$xp}=$rval[1];
		${'keyr'.$xp}=$keyr;
		if($xp==0){
	$belongs[$arri]=0;	
	$wpics[$arri]=${'keyr'.$xp}.'{}'.${'dperson'.$xp}.'<()>';
	$datetimeppc[$arri]=$wvaluev[$xp];
	}
	$xpm=$xp-1;
	if(isset($wvaluev[$xpm])){
	$tdpp=tdpp_av($wvaluev[$xpm],$wvaluev[$xp]);
	if($tdpp=='belongs'){
	$belongs[$arri]=$belongs[$arri]+1;
	$keyrv=$keyr;
	$wpics[$arri].=${'keyr'.$xpm}.'{}'.${'dperson'.$xpm}.'<()>'.${'keyr'.$xp}.'{}'.${'dperson'.$xp}.'<()>';
	$datetimeppc[$arri]=$wvaluev[$xpm];
	}
	else{
	$arri++;
	$belongs[$arri]=0;
	$wpics[$arri]=${'keyr'.$xp}.'{}'.${'dperson'.$xp}.'<()>';
	$datetimeppc[$arri]=$wvaluev[$xp];
	}
	$arriv++;
	}
	$xp++;
	
	}

$singular_go=array();
$armadot=array();
foreach($belongs as $k=>$v){

if($v==0){

$singular_go[$k]=$wpics[$k].'<>'.$datetimeppc[$k];	

}

else{



$ultraexplode=explode("<()>",$wpics[$k]);
$ultraexplode = array_map("unserialize", array_unique(array_map("serialize", $ultraexplode)));
$tdb=0;
foreach($ultraexplode as $k2=>$v2){
if($v2!=""){
$tdb++;	
}
}



$trm=0;
$likeid='';
foreach($ultraexplode as $k2=>$v2){
if($v2!=""){
$v2=explode("{}",$v2);
$likeid.=','.$v2[0];
$v2=$v2[1];

${'spv'.$trm}=$v2;

$trmo=$trm+1;

if($tdb==2 AND $trm==1){
$trmv=$trm-1;
$armadot[$datetimeppc[$k]]=$likeid.'<()><div class="anounderv" style="display:inline-block;margin:0;padding:0;">'.$v2.'</div> and <div class="anounderv" style="display:inline-block;margin:0;padding:0;">'.${'spv'.$trmv}.'</div>';
}
else if($trmo==$tdb){
$tdbv=$tdb-1;
$start=1;
$ending=$tdbv;
$mgchunk='';
while($start<=$ending){
if($start==21){
$dmore=$ending-20;
$mgchunk.='<div style="margin:0;padding:0;">...and '.$dmore.' more</div>';
break;	
}
else{
$mgchunk.='<div style="margin:0;padding:0;">'.${'spv'.$start}.'</div>';
}
$start++;
}

if($corrworkits!='interests' AND $corrworkits!='activities'){
$favdr='favorite ';	
}
else{
$favdr='';	
}

$rx='replacex';
$armadot[$datetimeppc[$k]]=$likeid.'<()><div class="anounderv" style="display:inline-block;margin:0;padding:0;">'.${'spv0'}.'</div> and <div class="anounder" style="margin:0;padding:0;display:inline-block;"><a href="#" onclick="return false;" data-t_text="" data-t_position="bottom">'.$tdbv.' other '.$favdr.$corrworkits.'</a> <div class="tooltip_text">'.$mgchunk.'</div></div>';
}



$trm++;

}

}

	
}
	
}

$uo=$value;
foreach($armadot as $k=>$v){
$v=explode("<()>",$v);
$m=array();
$m['likeid']=$v[0];
$m['person']=$v[1];
$m['datetimep']=$k;
$m['type']=$corrworkits;

$pause='';
$likeid=explode(",",$m['likeid']);
foreach($likeid as $id=>$ov){
if($ov!=''){
$likeid=$ov;

$whatisit_h="tastes";
		$cag=$likeid;
include("set_pause.php");


}
	
}
$likeid=$m['likeid'];
$ltype=$m['type'];

if($uo==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removep2_o(\''.$likeid.'\','.$x.',\''.$corrworkits.'\');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"  ></div></div>';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';	
}

$dr[$x]=$faddo;

$uti=sb_user($uidv);
$uo_pic=$uti['profilepict'];
$uo_fn=$uti['fullname'];


if(strpos($m['person'],'replacex')!==false){
$m['person']=str_replace('replacex',$x,$m['person']);	
}

$andcase='to '.$uti['prefix'].' profile';		

$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$uo.'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table style="margin:0;padding:0;"><tr><td style="vertical-align:top;" class="friendslink"><a hc="" href="/'.$uo.'">'.$uo_fn.'</a> added '.$m['person'].' '.$andcase.'.</td></tr><tr><td style="height:2px;"><span style="color:#333333"></span></td></tr>';

$dr[$x].='<tr><td class="story_foot_td" style="padding-left:2px;"><div class="lbl inlineBlock"><abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td
($m['datetimep']).'</abbr></div>';



$ltypev="tastes";
$sbid="";
$extra_param=$corrworkits;

$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$uo;

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';


$dr[$x].='<div class="foot_box lb">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

$vrt=2;
$count=1;

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;
$bydate[$x]=$m['datetimep'];


$dr[$x].='</div>'; //foot box closure

$dr[$x].'</td></tr>';

$dr[$x].='</td></tr></table></td></tr></table>';

$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure


if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);}
$x++;

 $y++;	 


}


foreach($singular_go as $ok => $ov){

$ultraexplode=explode("{}",$wpics[$ok]);
$ultraexplode[1]=str_replace("<()>","",$ultraexplode[1]);
$m=array();
$m['likeid']=$ultraexplode[0];
$m['taste']=$ultraexplode[1];
$m['datetimep']=$datetimeppc[$ok];
$m['type']=$corrworkits;

$ltype=$m['type'];
$likeid=$m['likeid'];
$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count'];
if($count!='0'){$count=$count;}else{unset($count);}
}	  
$c=mysql_num_rows($r10);
if($c==0){unset($count);} 

$uo=$uidv;

$pause='';
$whatisit_h="tastes";
		$cag=$likeid;
include("set_pause.php");


if($uo==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removep2_o(\''.$likeid.'\','.$x.',\''.$corrworkits.'\');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"  ></div></div>';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';	
}

$dr[$x]=$faddo;

$uti=sb_user($uidv);
$uo_pic=$uti['profilepict'];
$uo_fn=$uti['fullname'];

if($m['type']!='activities' AND $m['type']!='interests'){
$notactivites='favorite ';
}
else{
$notactivites='';	
}

$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$uo.'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table style="margin:0;padding:0;"><tr><td style="vertical-align:top;" class="friendslink"><a hc="" href="/'.$uo.'">'.$uo_fn.'</a> added <div class="anounderv" style="display:inline-block;margin:0;padding:0;">'.$m['taste'].'</div> to his '.$notactivites.$m['type'].'.</td></tr><tr><td style="height:2px;"><span style="color:#333333"></span></td></tr>';


$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}


$dr[$x].='<tr><td class="story_foot_td" style="padding-left:2px;"><div class="lbl inlineBlock">'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment">Comment</span>&nbsp;&#183;&nbsp;<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td
($m['datetimep']).'</abbr></div>';

$ltypev="tastes";
$sbid="";
$extra_param=$corrworkits;

$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$uo;

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';


$dr[$x].='<div class="foot_box lb">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

$thefabtext=$likeid;

$value=$uidv;
$vrt=0;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM commentsv WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];

  	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;
$bydate[$x]=$m['datetimep'];
	
if(isset($count)){

$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$value;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

include("stories/likes_this.php");

if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\'; bordercito(\''.$x.'\');';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}

if(!isset($haslikes)){$tm='inline-block';}else{$tm='none';}

if($vrt>2){
	$tmv='none';
}
else{
	$tmv='block';
}

if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$dr[$x].='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;padding-top:5px;padding-bottom:5px;position:relative;margin-left:78px;" class="foot_box_inner" id="moremsgv'.$x.'">

<div style="width:60%;margin:0;padding:0;display:inline-block;" id="moremsgvv'.$x.'">

<div class="msgiconito" style="position:absolute;left:8px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:22px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',1);'.$cont.' $(\'#share_cv'.$x.'\').remove(); $(\'#moremsgvv'.$x.'\').css(\'width\',\'100%\');  $(\'#share_c'.$x.'\').css(\'display\',\'block\'); document.getElementById(\'rofm'.$x.'\').style.display=\'block\';" id="moremsg'.$x.'">View all '.$vrt.' comments</span><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',2)" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#666666;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div></div>';	

$dr[$x].='</div>';
}

if(!isset($haslikes) AND !isset($hasshares) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}


$r11=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m11=mysql_fetch_array($r11)){
$uidpic=$m11['profilepict'];	
}

$nml=78;
$nmlf='';

$two_c=2;

$for_photo='';
include("load_2_comments.php");

include("comment_box.php");

$dr[$x].='</div>'; //foot box closure

$dr[$x].'</td></tr>';

$dr[$x].='</td></tr></table></td></tr></table>';

$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure


if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);}
$x++;

 $y++;	  
  }
$workits++;
 }

  
}

}


}
















//people who inspire you



if(!isset($justphotos) AND !isset($justlinks)){

foreach($oli as $key=>$value){

$uo=$value;
$uidv=$value;

$xrtl=0;
$y=0;	


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

if(!isset($wall)){
$mn=20;
$mnv=5;	
}

$bq_f=return_bq("inspirational","");

if(isset($clist) AND $value==$uid){
$b_qfv=return_bqv("inspirational","");

$dq=" (SELECT * FROM inspirational WHERE $b_qfv AND visibility='v' AND $dtc<='$rnowu' AND $dtc>'$tagou' $bq_f ORDER BY datetimep DESC LIMIT $mn)";
$dq.="UNION (SELECT * FROM inspirational WHERE $b_qfv AND visibility='v' AND $dtc<'$tagou' $bq_f ORDER BY datetimep DESC LIMIT $mnv)";
}
else{
$dq="(SELECT * FROM inspirational WHERE id='$value' AND visibility='v' AND $dtc<='$rnowu' AND $dtc>'$tagou' $bq_f ORDER BY datetimep DESC LIMIT $mn)";
$dq.="UNION (SELECT * FROM inspirational WHERE id='$value' AND visibility='v' AND $dtc<'$tagou' $bq_f ORDER BY datetimep DESC LIMIT $mnv)";
}

$r=mysql_query("$dq");

$m=mysql_fetch_array($r);


$ddates=array();
$ids_array=array();
$belongs=array();
$wpics=array();
$datetimeppc=array();

$r=mysql_query("$dq"); //mejor tener que ejecutarlo dos veces y posiblemente quemarlo una vez a poder ejecutarlo una vez sola pero tener que quemarlo 100 veces.
while($m=mysql_fetch_array($r))
  {
$ddates[$m['sbid']]=$m['datetimep'].'{}'.$m['person'];
  }

$arri=0;
$arriv=0;
$xp=0;	

$wvaluev=array();

	foreach($ddates as $keyr => $wvaluev[$xp]){
		$rval=explode("{}",$wvaluev[$xp]);
		$wvaluev[$xp]=$rval[0];
		${'dperson'.$xp}=$rval[1];
		${'keyr'.$xp}=$keyr;
		if($xp==0){
	$belongs[$arri]=0;	
	$wpics[$arri]=${'keyr'.$xp}.'{}'.${'dperson'.$xp}.'<()>';
	$datetimeppc[$arri]=$wvaluev[$xp];
	}
	$xpm=$xp-1;
	if(isset($wvaluev[$xpm])){
	$tdpp=tdpp_av($wvaluev[$xpm],$wvaluev[$xp]);
	if($tdpp=='belongs'){
	$belongs[$arri]=$belongs[$arri]+1;
	$keyrv=$keyr;
	$wpics[$arri].=${'keyr'.$xpm}.'{}'.${'dperson'.$xpm}.'<()>'.${'keyr'.$xp}.'{}'.${'dperson'.$xp}.'<()>';
	$datetimeppc[$arri]=$wvaluev[$xpm];
	}
	else{
	$arri++;
	$belongs[$arri]=0;
	$wpics[$arri]=${'keyr'.$xp}.'{}'.${'dperson'.$xp}.'<()>';
	$datetimeppc[$arri]=$wvaluev[$xp];
	}
	$arriv++;
	}
	$xp++;
	
	}

$singular_go=array();
$armadot=array();
foreach($belongs as $k=>$v){

if($v==0){
$singular_go[$k]=$wpics[$k].'<>'.$datetimeppc[$k];	
}

else{



$ultraexplode=explode("<()>",$wpics[$k]);
$ultraexplode = array_map("unserialize", array_unique(array_map("serialize", $ultraexplode)));
$tdb=0;
foreach($ultraexplode as $k2=>$v2){
if($v2!=""){
$tdb++;	
}
}



$trm=0;
$likeid='';
foreach($ultraexplode as $k2=>$v2){
if($v2!=""){
$v2=explode("{}",$v2);
$likeid.=','.$v2[0];
$v2=$v2[1];

${'spv'.$trm}=$v2;

$trmo=$trm+1;

if($tdb==2 AND $trm==1){
$trmv=$trm-1;
$armadot[$datetimeppc[$k]]=$likeid.'<()><div class="anounderv" style="display:inline-block;margin:0;padding:0;">'.$v2.'</div> and <div class="anounderv" style="display:inline-block;margin:0;padding:0;">'.${'spv'.$trmv}.'</div>';
}
else if($trmo==$tdb){
$tdbv=$tdb-1;
$start=1;
$ending=$tdbv;
$mgchunk='';
while($start<=$ending){
if($start==21){
$dmore=$ending-20;
$mgchunk.='<div style="margin:0;padding:0;">...and '.$dmore.' more</div>';
break;	
}
else{
$mgchunk.='<div style="margin:0;padding:0;">'.${'spv'.$start}.'</div>';
}
$start++;
}

$rx='replacex';
$armadot[$datetimeppc[$k]]=$likeid.'<()>
<div class="anounderv" style="display:inline-block;margin:0;padding:0;">'.${'spv0'}.'</div> and <div class="anounder" style="margin:0;padding:0;display:inline-block;"><a href="#" onclick="return false;" data-t_text="" data-t_position="bottom">'.$tdbv.' other inspirational people</a> <div class="tooltip_text">'.$mgchunk.'</div></div>';
}



$trm++;

}

}

	
}
	
}

$uo=$value;
foreach($armadot as $k=>$v){
$v=explode("<()>",$v);
$m=array();
$m['likeid']=$v[0];
$m['person']=$v[1];
$m['datetimep']=$k;

$pause='';
$likeid=explode(",",$m['likeid']);
foreach($likeid as $id=>$ov){
if($ov!=''){
$likeid=$ov;

$whatisit_h="inspirations";
		$cag=$likeid;
include("set_pause.php");

}
	
}
$likeid=$m['likeid'];

$ltype="inspirations";

if($uo==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removep2_o(\''.$likeid.'\','.$x.',\'inspirations\');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"  ></div></div>';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';	
}

$dr[$x]=$faddo;

$uti=sb_user($uidv);
$uo_pic=$uti['profilepict'];
$uo_fn=$uti['fullname'];


if(strpos($m['person'],'replacex')!==false){
$m['person']=str_replace('replacex',$x,$m['person']);	
}

$andcase='to the inspirational people on '.$uti['prefix'].' profile';		

$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$uo.'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table style="margin:0;padding:0;"><tr><td style="vertical-align:top;" class="friendslink"><a hc="" href="/'.$uo.'">'.$uo_fn.'</a> added '.$m['person'].' '.$andcase.'.</td></tr><tr><td style="height:2px;"><span style="color:#333333"></span></td></tr>';

$dr[$x].='<tr><td class="story_foot_td" style="padding-left:2px;"><div class="lbl inlineBlock"><abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td
($m['datetimep']).'</abbr></div>';

$ltypev="inspirational";
$sbid="";

$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$uo;

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';

$dr[$x].='<div class="foot_box lb">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

$vrt=2;
$count=1;

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;
$bydate[$x]=$m['datetimep'];


$dr[$x].='</div>'; //foot box closure

$dr[$x].'</td></tr>';

$dr[$x].='</td></tr></table></td></tr></table>';

$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure


if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);}
$x++;

 $y++;	 


}


foreach($singular_go as $ok => $ov){

$ultraexplode=explode("{}",$wpics[$ok]);
$ultraexplode[1]=str_replace("<()>","",$ultraexplode[1]);
$m=array();
$m['likeid']=$ultraexplode[0];
$m['person']=$ultraexplode[1];
$m['datetimep']=$datetimeppc[$ok];

$ltype="inspirations";
	  
$likeid=$m['likeid'];
$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count'];
if($count!='0'){$count=$count;}else{unset($count);}
}	  
$c=mysql_num_rows($r10);
if($c==0){unset($count);} 

$uo=$uidv;

$pause='';
$whatisit_h="inspirations";
		$cag=$likeid;
include("set_pause.php");


if($uo==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removep2_o(\''.$likeid.'\','.$x.',\'inspirations\');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"  ></div></div>';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';	
}

$dr[$x]=$faddo;

$uti=sb_user($uidv);
$uo_pic=$uti['profilepict'];
$uo_fn=$uti['fullname'];



$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$uo.'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table style="margin:0;padding:0;"><tr><td style="vertical-align:top;" class="friendslink"><a hc="" href="/'.$uo.'">'.$uo_fn.'</a> added <div class="anounderv" style="display:inline-block;margin:0;padding:0;">'.$m['person'].'</div> to '.$uti['prefix'].' list of inspirational people.</td></tr><tr><td style="height:2px;"><span style="color:#333333"></span></td></tr>';

$ltype="inspirations";

$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}


$dr[$x].='<tr><td class="story_foot_td" style="padding-left:2px;"><div class="lbl inlineBlock">'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment">Comment</span>&nbsp;&#183;&nbsp;<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td
($m['datetimep']).'</abbr></div>';

$ltypev="inspirational";
$sbid="";

$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$uo;

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';

$dr[$x].='<div class="foot_box lb">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

$thefabtext=$likeid;

$value=$uidv;
$vrt=0;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM commentsv WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];

  	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;
$bydate[$x]=$m['datetimep'];
	
if(isset($count)){

$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$value;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

include("stories/likes_this.php");

if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\'; bordercito(\''.$x.'\');';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}

if(!isset($haslikes)){$tm='inline-block';}else{$tm='none';}

if($vrt>2){
	$tmv='none';
}
else{
	$tmv='block';
}

if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$dr[$x].='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;padding-top:5px;padding-bottom:5px;position:relative;margin-left:78px;" class="foot_box_inner" id="moremsgv'.$x.'">



<div style="width:60%;margin:0;padding:0;display:inline-block;" id="moremsgvv'.$x.'">

<div class="msgiconito" style="position:absolute;left:8px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:22px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',1);'.$cont.' $(\'#share_cv'.$x.'\').remove(); $(\'#moremsgvv'.$x.'\').css(\'width\',\'100%\');  $(\'#share_c'.$x.'\').css(\'display\',\'block\'); document.getElementById(\'rofm'.$x.'\').style.display=\'block\';" id="moremsg'.$x.'">View all '.$vrt.' comments</span><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',2)" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#666666;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div></div>';	

$dr[$x].='</div>';
}

if(!isset($haslikes) AND !isset($hasshares) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}


$r11=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m11=mysql_fetch_array($r11)){
$uidpic=$m11['profilepict'];	
}

$nml=78;
$nmlf='';

$two_c=2;

$for_photo='';
include("load_2_comments.php");

include("comment_box.php");

$dr[$x].='</div>'; //foot box closure

$dr[$x].'</td></tr>';

$dr[$x].='</td></tr></table></td></tr></table>';

$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure


if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);}
$x++;

 $y++;	  
  }
 
  
}


}










//spoken languages

if(!isset($justphotos) AND !isset($justlinks)){

foreach($oli as $key=>$value){

$uo=$value;
$uidv=$value;

$xrtl=0;
$y=0;	


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

if(!isset($wall)){
$mn=20;
$mnv=5;	
}

$b_qf=return_bq("languages","");


if(isset($clist) AND $value==$uid){
$b_qfv=return_bqv("languages","");
$dq=" (SELECT * FROM languages WHERE $b_qfv AND visibility='v' AND $dtc<='$rnowu' AND $dtc>'$tagou' $b_qf ORDER BY datetimep DESC LIMIT $mn)";
$dq.="UNION (SELECT * FROM languages WHERE $b_qfv AND visibility='v' AND $dtc<'$tagou' $b_qf ORDER BY datetimep DESC LIMIT $mnv)";
}
else{
$dq="(SELECT * FROM languages WHERE id='$value' AND visibility='v' AND $dtc<='$rnowu' AND $dtc>'$tagou' $b_qf ORDER BY datetimep DESC LIMIT $mn)";
$dq.="UNION (SELECT * FROM languages WHERE id='$value' AND visibility='v' AND $dtc<'$tagou' $b_qf ORDER BY datetimep DESC LIMIT $mnv)";
}

$r=mysql_query("$dq");
$c=mysql_num_rows($r);

if($c>0){

$ddates=array();
$ids_array=array();
$belongs=array();
$wpics=array();
$datetimeppc=array();

while($m=mysql_fetch_array($r)){
$ddates[$m['sbid']]=$m['datetimep'].'{}'.$m['language'];
}

$arri=0;
$arriv=0;
$xp=0;	

$wvaluev=array();

	foreach($ddates as $keyr => $wvaluev[$xp]){
		$rval=explode("{}",$wvaluev[$xp]);
		$wvaluev[$xp]=$rval[0];
		${'dperson'.$xp}=$rval[1];
		${'keyr'.$xp}=$keyr;
		if($xp==0){
	$belongs[$arri]=0;	
	$wpics[$arri]=${'keyr'.$xp}.'{}'.${'dperson'.$xp}.'<()>';
	$datetimeppc[$arri]=$wvaluev[$xp];
	}
	$xpm=$xp-1;
	if(isset($wvaluev[$xpm])){
	$tdpp=tdpp_av($wvaluev[$xpm],$wvaluev[$xp]);
	if($tdpp=='belongs'){
	$belongs[$arri]=$belongs[$arri]+1;
	$keyrv=$keyr;
	$wpics[$arri].=${'keyr'.$xpm}.'{}'.${'dperson'.$xpm}.'<()>'.${'keyr'.$xp}.'{}'.${'dperson'.$xp}.'<()>';
	$datetimeppc[$arri]=$wvaluev[$xpm];
	}
	else{
	$arri++;
	$belongs[$arri]=0;
	$wpics[$arri]=${'keyr'.$xp}.'{}'.${'dperson'.$xp}.'<()>';
	$datetimeppc[$arri]=$wvaluev[$xp];
	}
	$arriv++;
	}
	$xp++;
	
	}

$singular_go=array();
$armadot=array();
foreach($belongs as $k=>$v){

if($v==0){
$singular_go[$k]=$wpics[$k].'<>'.$datetimeppc[$k];	

}

else{



$ultraexplode=explode("<()>",$wpics[$k]);
$ultraexplode = array_map("unserialize", array_unique(array_map("serialize", $ultraexplode)));
$tdb=0;
foreach($ultraexplode as $k2=>$v2){
if($v2!=""){
$tdb++;	
}
}



$trm=0;
$likeid='';
foreach($ultraexplode as $k2=>$v2){
if($v2!=""){
$v2=explode("{}",$v2);
$likeid.=','.$v2[0];
$v2=$v2[1];

${'spv'.$trm}=$v2;

$trmo=$trm+1;

if($tdb==2 AND $trm==1){
$trmv=$trm-1;
$armadot[$datetimeppc[$k]]=$likeid.'<()>'.$v2.' and '.${'spv'.$trmv};
}
else if($trmo==$tdb){
$tdbv=$tdb-1;
$start=1;
$ending=$tdbv;
$mgchunk='';
while($start<=$ending){
if($start==21){
$dmore=$ending-20;
$mgchunk.='<div style="margin:0;padding:0;">...and '.$dmore.' more</div>';
break;	
}
else{
$mgchunk.='<div style="margin:0;padding:0;">'.${'spv'.$start}.'</div>';
}
$start++;
}

$rx='replacex';
$armadot[$datetimeppc[$k]]=$likeid.'<()>
<div class="anounderv" style="display:inline-block;margin:0;padding:0;">'.${'spv0'}.'</div> and <div class="anounder" style="margin:0;padding:0;display:inline-block;"><a href="#" onclick="return false;" data-t_text="" data-t_position="bottom">'.$tdbv.' other languages</a> <div class="tooltip_text">'.$mgchunk.'</div></div>';
}



$trm++;

}

}

	
}
	
}

foreach($armadot as $k=>$v){
$v=explode("<()>",$v);
$m=array();
$m['likeid']=$v[0];
$m['person']=$v[1];
$m['datetimep']=$k;

$pause='';
$likeid=explode(",",$m['likeid']);
foreach($likeid as $id=>$ov){
if($ov!=''){
$likeid=$ov;

$whatisit_h="languages";
		$cag=$likeid;
include("set_pause.php");

}
	
}
$likeid=$m['likeid'];

$ltype="languages";

if($uo==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removep2_o(\''.$likeid.'\','.$x.',\'spokenl\');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"  ></div></div>';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';	
}

$dr[$x]=$faddo;

$uti=sb_user($uidv);
$uo_pic=$uti['profilepict'];
$uo_fn=$uti['fullname'];


if(strpos($m['person'],'replacex')!==false){
$m['person']=str_replace('replacex',$x,$m['person']);	
}

	
$uti=sb_user($m['id']);

$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$uti['username'].'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table style="margin:0;padding:0;"><tr><td style="vertical-align:top;" class="friendslink">'.$uti['link'].' knows '.$m['person'].'.</td></tr><tr><td style="height:2px;"><span style="color:#333333"></span></td></tr>';

$dr[$x].='<tr><td class="story_foot_td" style="padding-left:2px;"><div class="lbl inlineBlock"><abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td
($m['datetimep']).'</abbr></div>';

$ltypev="languages";
$sbid="";

$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$uo;

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';

$dr[$x].='<div class="foot_box lb">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

$vrt=2;
$count=1;

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;
$bydate[$x]=$m['datetimep'];


$dr[$x].='</div>'; //foot box closure


$dr[$x].'</td></tr>';

$dr[$x].='</td></tr></table></td></tr></table>';



$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure


if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);}
$x++;

 $y++;	 


}


foreach($singular_go as $ok => $ov){

$ultraexplode=explode("{}",$wpics[$ok]);
$ultraexplode[1]=str_replace("<()>","",$ultraexplode[1]);
$m=array();
$m['likeid']=$ultraexplode[0];
$m['person']=$ultraexplode[1];
$m['datetimep']=$datetimeppc[$ok];

$ltype="languages";
	  
$likeid=$m['likeid'];
$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count'];
if($count!='0'){$count=$count;}else{unset($count);}
}	
$c=mysql_num_rows($r10);
if($c==0){unset($count);}  

$uo=$uidv;

$pause='';
$whatisit_h="languages";
		$cag=$likeid;
include("set_pause.php");


if($uo==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removep2_o(\''.$likeid.'\','.$x.',\'spokenl\');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"  ></div></div>';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';	
}

$dr[$x]=$faddo;

$uti=sb_user($uidv);
$uo_pic=$uti['profilepict'];
$uo_fn=$uti['fullname'];


$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$uti['username'].'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table style="margin:0;padding:0;"><tr><td style="vertical-align:top;" class="friendslink">'.$uti['link'].' knows '.$m['person'].'.</td></tr><tr><td style="height:2px;"><span style="color:#333333"></span></td></tr>';

$ltype="languages";

$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}


$dr[$x].='<tr><td class="story_foot_td" style="padding-left:2px;"><div class="lbl inlineBlock">'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment">Comment</span>&nbsp;&#183;&nbsp;<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td
($m['datetimep']).'</abbr></div>';

$ltypev="languages";
$sbid="";

$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$uo;

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';

$dr[$x].='<div class="foot_box lb">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

$thefabtext=$likeid;

$value=$uidv;
$vrt=0;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM commentsv WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];

  	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;
$bydate[$x]=$m['datetimep'];

if(isset($count)){

$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$value;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

include("stories/likes_this.php");

if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\'; bordercito(\''.$x.'\');';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}

if(!isset($haslikes)){$tm='inline-block';}else{$tm='none';}

if($vrt>2){
	$tmv='none';
}
else{
	$tmv='block';
}

if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$dr[$x].='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;padding-top:5px;padding-bottom:5px;position:relative;margin-left:78px;" class="foot_box_inner" id="moremsgv'.$x.'">



<div style="width:60%;margin:0;padding:0;display:inline-block;" id="moremsgvv'.$x.'">

<div class="msgiconito" style="position:absolute;left:8px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:22px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',1);'.$cont.' $(\'#share_cv'.$x.'\').remove(); $(\'#moremsgvv'.$x.'\').css(\'width\',\'100%\');  $(\'#share_c'.$x.'\').css(\'display\',\'block\'); document.getElementById(\'rofm'.$x.'\').style.display=\'block\';" id="moremsg'.$x.'">View all '.$vrt.' comments</span><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',2)" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#666666;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div></div>';	

$dr[$x].='</div>';
}

if(!isset($haslikes) AND !isset($hasshares) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}


$r11=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m11=mysql_fetch_array($r11)){
$uidpic=$m11['profilepict'];	
}

$nml=78;
$nmlf='';

$two_c=2;

$for_photo='';
include("load_2_comments.php");

include("comment_box.php");

$dr[$x].='</div>'; //foot box closure


$dr[$x].='</td></tr>';

$dr[$x].='</td></tr></table></td></tr></table>';


$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure


if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);}
$x++;

 $y++;	  
  }
 
 } 
}



}














/*

//relationship status


if(!isset($justphotos) AND !isset($justlinks)){



$xrtl=0;
$y=0;	



$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$b_qf=return_bq("relationship","");

$dq="(SELECT * FROM relationship WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND relationship_s!='' AND visibility='v' AND relationship_s<7 AND $dtc<='$rnowu' AND $dtc>'$tagou' $b_qf ORDER BY datetimep DESC LIMIT 20)";

$dq.="UNION (SELECT * FROM relationship WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND relationship_s!='' AND visibility='v' AND relationship_s<7 AND $dtc<'$tagou' $b_qf ORDER BY datetimep DESC LIMIT 5)";

$r=mysql_query("$dq");

while($m=mysql_fetch_array($r))
  {
$value=$m['id']; 
$uidv=$value;
$ltype="relationship_status";

$likeid=$m['sbid'];
$uidvl=$uidv.'l';
$r10 = mysql_query("SELECT * FROM $uidvl WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count'];
if($count!='0'){$count=$count;}
else{unset($count);}
}	  
$c=mysql_num_rows($r10);
if($c==0){unset($count);}

$uo=$uidv;

$pause='';
$whatisit_h="t";
		$cag=$likeid;
include("set_pause.php");


if($uo==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removep2_o(\''.$likeid.'\','.$x.',\'relationship_s\');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"></div></div>';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$likeid.'\',\''.$value.'\',\'t\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$likeid.'\',\''.$value.'\',\'t\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';	
}

$dr[$x]=$faddo;

$uti=sb_user($uidv);
$uo_pic=$uti['profilepict'];
$uo_fn=$uti['fullname'];

$ca=$m['relationship_s'];

if($ca==1){$ca='is single.';}
else if($ca==2){$ca='is in a relationship.';}
else if($ca==3){$ca='is engaged.';}
else if($ca==4){$ca='is married.';}
else if($ca==5){$ca='is in a relationship and it\'s complicated.'; $cav='it\'s complicated.';}
else if($ca==6){$ca='is in an open relationship.';}
else if($ca==7){$ca='Widowed';}
else if($ca==8){$ca='Separated';}
else if($ca==9){$ca='Divorced';}


$r5=mysql_query("SELECT * FROM relationship WHERE id='$uidv' AND (relationship_s='' || relationship_s<7) AND visibility='o' ORDER BY datetimep DESC LIMIT 1");
while($m5=mysql_fetch_array($r5)){
$oca=$m5['relationship_s'];
}

if($oca!=""){
if($oca==1){$oca='single';}
else if($oca==2){$oca='in a relationship';}
else if($oca==3){$oca='engaged';}
else if($oca==4){$oca='married';}
else if($oca==5){$oca='it\'s complicated';}
else if($oca==6){$oca='in an open relationship';}

if($ca==5){$ca=$cav;}
$ca=str_replace("is ","",$ca);
$ca='went from being "'.$oca.'" to "'.$ca.'"';	
}



$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$uo.'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table style="margin:0;padding:0;"><tr><td style="vertical-align:top;" class="friendslink"><a hc="" href="/'.$uo.'">'.$uo_fn.'</a> '.$ca.'</td></tr><tr><td style="height:2px;"><span style="color:#333333"></span></td></tr>';

$ltype="relationship_status";

$uidwl=$uid.'wl';
$r10 = mysql_query("SELECT * FROM $uidwl WHERE likeid='$likeid' AND what='$ltype'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}


$dr[$x].='<tr><td class="story_foot_td" style="padding-left:2px;"><div class="lbl inlineBlock">'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment">Comment</span>&nbsp;&#183;&nbsp;<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td
($m['datetimep']).'</abbr></div>';

$ltypev="relationship";
$sbid="";

$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$uo;

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';

$dr[$x].='<div class="foot_box lb">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

$thefabtext=$likeid;

$value=$uidv;
$vrt=0;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM commentsv WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];

  	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;
$bydate[$x]=$m['datetimep'];

if(isset($count)){
	
$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$value;
	
include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

include("stories/likes_this.php");

if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\'; bordercito(\''.$x.'\');';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}

if(!isset($haslikes)){$tm='inline-block';}else{$tm='none';}

if($vrt>2){
	$tmv='none';
}
else{
	$tmv='block';
}

if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$dr[$x].='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;padding-top:5px;padding-bottom:5px;position:relative;margin-left:78px;" class="foot_box_inner" id="moremsgv'.$x.'">



<div style="width:60%;margin:0;padding:0;display:inline-block;" id="moremsgvv'.$x.'">

<div class="msgiconito" style="position:absolute;left:8px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:22px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',1);'.$cont.' $(\'#share_cv'.$x.'\').remove(); $(\'#moremsgvv'.$x.'\').css(\'width\',\'100%\');  $(\'#share_c'.$x.'\').css(\'display\',\'block\'); document.getElementById(\'rofm'.$x.'\').style.display=\'block\';" id="moremsg'.$x.'">View all '.$vrt.' comments</span><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',2)" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#666666;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div></div>';	

if(isset($hasshares)){
$dr[$x].='
<div style="width:40%;float:right;display:inline-block;margin:0;padding:0;text-align:right;" class="foot_box_inner" id="share_cv'.$x.'">
<div class="share_bt" style="display:inline-block;position:relative;left:-6px;bottom:1px;"></div><span class="friendslink3vv" style="padding-right:1px;position:relative;top:-5px;">'.$counter.' share'.$isp.'</span>
</div>';
unset($hasshares);
}
$dr[$x].='</div>';
}

if(!isset($haslikes) AND !isset($hasshares) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}


$r11=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m11=mysql_fetch_array($r11)){
$uidpic=$m11['profilepict'];	
}

$nml=78;
$nmlf='';

$two_c=2;

$for_photo='';
include("load_2_comments.php");

include("comment_box.php");

$dr[$x].='</div>'; //foot box closure

$dr[$x].'</td></tr>';

$dr[$x].='</td></tr></table></td></tr></table>';

$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure


if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);}
$x++;

 $y++;	  
  }
 
  
}


*/























//status update


if(!isset($justphotos) AND !isset($justlinks)){


$xrtl=0;
$y=0;

if(!isset($wall)){
$mn=60;
$mnv=10;	
}

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

include("stories/status_update.php");

}




//notes










$allowed_sbeditor=array();

$allowed_sbeditor[]='<strong>';
$allowed_sbeditor[]='</strong>';
$allowed_sbeditor[]='<em>';
$allowed_sbeditor[]='</em>';
$allowed_sbeditor[]='<u>';
$allowed_sbeditor[]='</u>';

$allowed_sbeditor[]='<ul>';
$allowed_sbeditor[]='</ul>';
$allowed_sbeditor[]='<li>';
$allowed_sbeditor[]='</li>';
$allowed_sbeditor[]='<ol>';
$allowed_sbeditor[]='</ol>';

$allowed_sbeditor[]='<blockquote>';
$allowed_sbeditor[]='</blockquote>';

$allowed_sbeditor[]='<p>';
$allowed_sbeditor[]='</p>';

$allowed_sbeditor[]='<br>';

function space_to_dash($w){
$w=str_replace(" ","-",$w);
return $w;
}



if(!isset($justphotos) AND !isset($justlinks)){




$xrtl=0;
$y=0;

$uidt=$uidv.'t';

if(!isset($wall)){
$mn=10;
$mnv=2;	
}

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$dq="(SELECT * FROM nt as dt WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND $dtc<='$rnowu' AND $dtc>'$tagou' AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT $mn)";

if(isset($clist)){
$dq.=" UNION (SELECT * FROM nt as dt WHERE id='$uid' AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(privacy,'l',''))>0)>0 AND $dtc<='$rnowu' AND $dtc>'$tagou' AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT $mn)";	
}

$dq.="UNION (SELECT * FROM nt as dt WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND $dtc<'$tagou' AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT $mnv)";

if(isset($clist)){
$dq.=" UNION (SELECT * FROM nt as dt WHERE id='$uid' AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(privacy,'l',''))>0)>0 AND $dtc<'$tagou' AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT $mnv)";	
}

$r = mysql_query("$dq");

$laglobal=array();
while($m=mysql_fetch_array($r))
  {
$value=$m['id'];
$uidv=$value;
	  
	  $kill='';
if(in_array($m['sbid'],$laglobal)){$kill='y';}
$laglobal[]=$m['sbid'];


if($kill!='y'){

$uo=$m['id'];
$uti=sb_user($m['id']);
$uo_pic=$uti['profilepict'];
$uo_fn=$uti['fullname'];

$ltype="notes";

$likeid=$m['sbid'];
if($m['id']==$uid){$uidvl=$uid.'l';}
$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {


$count=$m10['count'];
if($count!='0'){$count=$count;}else{unset($count);}


}
$c=mysql_num_rows($r10);
if($c==0){unset($count);}


if(isset($m['body'])){
$pause='';
$whatisit_h="notes";
		$cag=$likeid;
include("set_pause.php");


if($uo==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removep2_n(\''.$likeid.'\',\''.$value.'\','.$x.');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"  ></div></div>';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$likeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';	
}

$dr[$x]=$faddo;
$body=$m['body'];
$id=$m['id'];
$sbid=$likeid;

$r2=mysql_query("SELECT * FROM notes_pics WHERE noteid='$sbid' AND visibility='v' AND id='$id' ORDER BY datetimep ASC LIMIT 1");
$c=mysql_num_rows($r2);
if($c>0){
while($m2=mysql_fetch_array($r2)){
$rep=$m2['aid'];

$aid=$m2['aid'];

$dpic=$m2['s1'];	
$caption=$m2['caption'];

$replace='<img src="/'.$id.'/pics/'.$dpic.'" style="max-height: 90px;max-width: 90px;display:block;">';

$needle='&lt;photo id="'.$aid.'" /&gt;';

$pos = strpos($body,$needle);
if ($pos !== false) {
    $body = substr_replace($body,$replace,$pos,strlen($needle));
}
else{
	$body=$body.$replace;
}

$body_img=$replace;

}

$r2=mysql_query("SELECT * FROM notes_pics WHERE noteid='$sbid' AND visibility='v' AND id='$id' ORDER BY datetimep ASC LIMIT 1,1000");
while($m2=mysql_fetch_array($r2)){
    $aid=$m2['aid'];
    $needle='&lt;photo id="'.$aid.'" /&gt;';

    $replace='';
    
    $pos = strpos($body,$needle);
    if ($pos !== false) {
        $body = substr_replace($body,$replace,$pos,strlen($needle));
    }  
}

if($caption==''){

$w=$body;
foreach($allowed_sbeditor as $k=>$v){
$w=str_replace($v,"",$w);
}

$w=strip_tags($w);
$w=str_replace(' <','',$w);
$w=str_replace('<','',$w);
$w=str_replace('>','',$w);
$wl=strlen($w);
if($wl>91){
$w=substr($w,0,91);
$w.='...';
}

$desc=$w;

}
else{
$desc=$caption;
$wl=strlen($desc);
if($wl>91){
$desc=substr($desc,0,91);
$desc.='...';
}
}
}
else{
$body_img='';
$w=$body;
foreach($allowed_sbeditor as $k=>$v){
$w=str_replace($v,"",$w);
}

$w=strip_tags($w);
$w=str_replace(' <','',$w);
$w=str_replace('<','',$w);
$w=str_replace('>','',$w);
$wl=strlen($w);
if($wl>297){
$w=substr($w,0,297);
$w.='...';
}

$desc=$w;

}

$descm=$m['body'];
$w=$descm;

foreach($allowed_sbeditor as $k=>$v){
$w=str_replace($v,"",$w);
}

$w=strip_tags($w);
$w=str_replace(' <','',$w);
$w=str_replace('<','',$w);
$w=str_replace('>','',$w);
$wl=strlen($w);
if($wl>500){
$w=substr($w,0,500);
$w.='...';
}


$descm=$w;


$note_title=$m['title'];
$flm=strtolower($uti['fullname']);
$flm=space_to_dash($flm);
$note_titlem=space_to_dash($note_title);
$note_titlem=preg_replace('/[^\p{L}-]/', '', $note_titlem);

$pnote_d='<div style="border-left: 2px solid rgb(204, 204, 204);" class="plm"><div class="fsm fwn fcg lb"><div><a href="/notes/'.$flm.'/'.$note_titlem.'/'.$sbid.'" style="font-weight:bold!important;">'.$note_title.'</a></div><div class="mts">'.$desc.'</div></div></div>';

if($body_img==''){
$note_d=$pnote_d;
}
else{

$note_d='<div class="clearfix"><a style="margin-right: 10px;" class="lfloat" href="/notes/'.$flm.'/'.$note_titlem.'/'.$sbid.'">'.$body_img.'</a>'.$pnote_d.'</div>';
	
}

$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$uti['username'].'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table style="margin:0;padding:0;"><tr><td style="vertical-align:top;" class="friendslink">'.$uti['link'].'</td></tr><tr><td>'.$note_d.'</td></tr>';


$ltype="notes";

$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}


$sharef='show_msg_dialogs_note(\''.$uo.'\',\''.$m['sbid'].'\',\''.$uo_fn.'\',\''.$descm.'\',\''.$m['title'].'\',\''.$x.'\');';
$sharef='&nbsp;&#183;&nbsp;<span class="friendslink3v" title="Post this on your profile." onclick="'.$sharef.'">Share</span>';


	
$dr[$x].='<tr><td class="story_foot_td" style="padding-left:2px;"><div class="lbl inlineBlock">'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment">Comment</span>'.$sharef.'&nbsp;&#183;&nbsp;<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td
($m['datetimep']).'</abbr></div>';



$ltypev="nt";
$sbid=$m['sbid'];


$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$m['id'];

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';




$dr[$x].='<div class="foot_box lb">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

$thefabtext=$m['sbid'];

$value=$uidv;
$vrt=0;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM commentsv WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];

  	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}

if(isset($count)){

$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$value;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

include("stories/likes_this.php");

if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\'; bordercito(\''.$x.'\');';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}

if(!isset($haslikes)){$tm='inline-block';}else{$tm='none';}

if($vrt>2){
	$tmv='none';
}
else{
	$tmv='block';
}


$counter=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM shares WHERE id2='$value' AND elemid='$thefabtext' AND whatisit='shared_notes' AND visibility='v'"));
$counter=$counter['counter'];

if($counter>0){
if($counter>1){$isp='s';}
else{$isp='';}

$dshare='shared_notes';
$share_id=$thefabtext;
$ltype='';
$wp_table='shares';
$owner_c=$value;

include("stories/with_plugin.php");

$dr[$x].='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;position:relative;margin-left:78px;padding-top:6px;display:'.$tmv.';" class="foot_box_inner" id="share_c'.$x.'">


<div class="share_bt" style="position:absolute;left:5px;bottom:3px;"></div>

<div class="friendslinkvl" style="display:inline-block;position:relative;left:23px;bottom:1px;">'.$with.'</div>

</div>';
$hasshares='';
}

$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;
$bydate[$x]=$m['datetimep'];

if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$dr[$x].='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;padding-top:5px;padding-bottom:5px;position:relative;margin-left:78px;" class="foot_box_inner" id="moremsgv'.$x.'">


<div style="width:60%;margin:0;padding:0;display:inline-block;" id="moremsgvv'.$x.'">

<div class="msgiconito" style="position:absolute;left:8px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:22px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',1);'.$cont.' $(\'#share_cv'.$x.'\').remove(); $(\'#moremsgvv'.$x.'\').css(\'width\',\'100%\');  $(\'#share_c'.$x.'\').css(\'display\',\'block\'); document.getElementById(\'rofm'.$x.'\').style.display=\'block\';" id="moremsg'.$x.'">View all '.$vrt.' comments</span><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',2)" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#666666;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div></div>';	

$dr[$x].='</div>';
}

if(!isset($haslikes) AND !isset($hasshares) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}


$r11=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m11=mysql_fetch_array($r11)){
$uidpic=$m11['profilepict'];	
}

$nml=78;
$nmlf='';

$two_c=2;

$for_photo='';
include("load_2_comments.php");

include("comment_box.php");


$dr[$x].='</div>'; //foot box closure

$dr[$x].'</td></tr>';

$dr[$x].='</td></tr></table></td></tr></table>';

$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure
}
if($kill!='y'){
if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);}
$x++;
}
$y++;
//if($y=='26'){break;}
}
}

}









//photos and videos

include("master/stories/photos.php");







//tagged in photos


if(!isset($justlinks)){
$alreadyh=array();
function tdtt($top,$topv){
$topv=tod($topv); 
$top=tod($top); 

$compared_time=new DateTime($topv);
$actual_time=new DateTime($top);
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%Y'); $suf=" year";
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%m'); $suf=' month';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf='day';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf='hour';}
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf='minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf='second';}
if($td=='+0' || $td=='-0'){$td='1';}
$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}

if($suf=='second'  || $suf=='minute' || $suf=='hour' && $td<=24 || $suf=='day' || $td<=3){
return 't';
}
else{return 'f';}

}


$y=0;
$ocl=0;


foreach($sbv as $key => $valued){

$xrtl=0;
$uidv=$valued;
$y=0;
$uidvp=$valued.'p';
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$uidva=$valued.'a';
$uidvtt=$valued.'tt';
$uidv=$valued;

$arri=0;
$arriv=0;

$wresult=mysql_query("SELECT * FROM registered WHERE id='$valued'");
while($wrow=mysql_fetch_array($wresult)){
$uo=$wrow['id'];	
$uo_fn=$wrow['fullname'];
$uo_pic=$wrow['profilepict'];
}


$o_friends=array();

if(!isset($wall)){
$mn=200;
}

$aresult=mysql_query("SELECT * FROM tags as dt where albumid in (SELECT albumid FROM tags as dt WHERE id3='$valued' AND flag!='w' AND visibility='v' $tags_qf GROUP BY albumid) and id3='$valued' AND flag!='w' AND visibility='v' $tags_qf order by datetimep desc LIMIT $mn"); 
$c=mysql_num_rows($aresult);




$talb=array();
$teti=array();
$tetid=array();

$na=0;

while($arow=mysql_fetch_array($aresult)){
$talb[$arow['albumid']][$na]=$arow['photoid'];
$teti[$arow['albumid']][$na]=$arow['id2'];
$tetid[$arow['albumid']][$na]=$arow['id'];


$na++;
}





$lala="";


$ttime=array();
$tetid2=array();

$marr=array();
$teti2=array();
$albumn=array();


foreach($talb as $llaved => $valor){
$sc=0;
$eo=0;



$mx=0;


foreach($valor as $mllave => $mvalor){


$llave=$teti[$llaved][$mllave];

$bywhov=$tetid[$llaved][$mllave];

$album=$llaved;
$theid=$mvalor;

$cresult=mysql_query("SELECT * FROM tags WHERE id='$bywhov' AND id3='$valued' AND albumid='$album' AND photoid='$theid' AND visibility='v' ORDER BY datetimep DESC LIMIT 1");
while($crow=mysql_fetch_array($cresult)){


$mxv=$mx-1;
$prevt[$mx]=$crow['datetimep'];

if(isset($prevt[$mxv])){ 
$belongstolast=tdtt($crow['datetimep'],$prevt[$mxv]);
}else{$belongstolast='';}

if($belongstolast=="t"){
$ttime[$llaved][$eo]=$crow['datetimep'];
$marr[$llaved][$eo][$sc]=$theid;	
$teti2[$llaved][$eo][$sc]=$llave;
$tetid2[$llaved][$eo][$sc]=$tetid[$llaved][$mllave];

$sc++;
}
else{
$sc=0;
$eo++;

$ttime[$llaved][$eo]=$crow['datetimep'];
$marr[$llaved][$eo][$sc]=$theid;	
$teti2[$llaved][$eo][$sc]=$llave;	
$tetid2[$llaved][$eo][$sc]=$tetid[$llaved][$mllave];
	
$sc++;
}

$mx++;
}


}

}





foreach($marr as $okey => $album){

foreach($album as $asc => $asv){


	
	$albumn[$okey][$asc]='';
$albumn[$okey][$asc].='<table cellspacing="0" cellpadding="0" style="margin:0;padding:0;"><tr rowspan="2"><td>';



$es1='';
$son2='';
$son3='';
$son4='';
$son6='';
$son9='';
$xvar2='';
$closediv='';
$closetd='</td>';

$totpic=count($marr[$okey][$asc]);

	$cl=1;
	while($cl<=$totpic){
	$cl++;	
	}
	$cl--;
	$totpic=1;

	
	$txpic=$cl;
	
	if($txpic>=9){$son9='t'; $totpic=9; $cpw=129;}
else if($txpic>=6){$son6='t'; $totpic=6; $cpw=129;}
else if($txpic>3){$son4='t'; $totpic=4; $cpw=196;}
else if($txpic==3){$son3='t'; $totpic=3; $cpw=129;}
else if($txpic==2){$son2='t'; $totpic=2; $cpw=196;}
else if($txpic==1){$es1='t'; $totpic=1; $cpw=398;}



	$cl=1;
	while($cl<=$totpic){
	
	/*
	7v1s3ulikv659irrl9oopo8ir:0:1:jzy3vsbjlyjtmpyvd3km4qkq26i7z9yk81oypsjgaz9q1jfh3q

echo $asv2.':'.$asc2.':'.$asc.':'.$okey;
*/



$xpic=$cl-1;

$clv=$cl-1;

		$theid=$marr[$okey][$asc][$clv]; 
		$bywho=$tetid2[$okey][$asc][$clv]; 


$er=mysql_query("SELECT * FROM tags WHERE id='$bywho' AND albumid='$okey' AND photoid='$theid' AND id3='$valued' AND visibility='v'");
while($erv=mysql_fetch_array($er)){
$datetimep_t=$erv['datetimep'];	
}


$er=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS c FROM tags as dt WHERE id='$bywho' AND albumid='$okey' AND id3='$valued' AND visibility='v' AND datetimep<$datetimep_t $tags_qf"));
$gnorder=$er['c']+1;



$lresult=mysql_query("SELECT * FROM media WHERE id='$bywho' AND albumid='$okey' AND sbid='$theid' AND visibility='v' and nye='3'");
while($lrow=mysql_fetch_array($lresult)){



			
				$nroww=$lrow['picsa'];
	$laspic=$lrow['picsa'];
	if($es1!='t'){
	$nroww=$lrow['picsa'];	
	}

	if($xpic=='0'){$albumn[$okey][$asc].='<td><div style="position:relative;margin:0;padding:0;" id="wacha">'; $closetd='';}
	if($xpic=='1'){$closediv=''; $closetd=''; if($son2=='t'){$closediv='</div>'; $closetd='</td>';} }
	if($xpic=='2'){$closetd=''; if($son3=='t'){$closediv='</div>'; $closetd='</td>';} }
	if($xpic=='3'){$closediv=''; $closetd=''; if($son4=='t'){$closediv='</div>'; $closetd='</td>';} }
	if($xpic=='4'){$closediv=''; $closetd=''; }
	if($xpic=='5'){$closediv=''; $closetd=''; if($son6=='t'){$closediv='</div>'; $closetd='</td>';} }
	if($xpic=='6'){$closediv=''; $closetd='';}
	if($xpic=='7'){$closediv=''; $closetd=''; }
	if($xpic=='8'){$closediv='</div>'; $closetd='</td>';}
	$laspic=$lrow['pics'];
	if($xpic=="0"){ if(file_exists("../users/".$bywho."/pics/".$lrow['picsa'])){$thewidthm=getimagesize("../users/".$bywho."/pics/".$lrow['picsa']);}else{$thewidthm='';} if(is_array($thewidthm)){$minipw=$thewidthm[0]; $miniph=$thewidthm[1]; $minip=$lrow['picsa']; $pidv=$lrow['sbid']; $desc=$lrow['descr'];}}
		if(file_exists("../users/".$bywho."/pics/".$laspic)){$thewidthl=getimagesize("../users/".$bywho."/pics/".$lrow['pics']); $swidth=$thewidthl[0]; $sheight=$thewidthl[1];  $thewidths=getimagesize("../users/".$bywho."/pics/".$lrow['picsa']); $mwidth=$thewidths[0]; $mheight=$thewidths[1];  $kill=''; }
	else{$kill='y';} 


$pics_a=$lrow['picsa'];
$pics_c=$lrow['pics'];
$vids_c=$lrow['vids'];
$vidshd_c=$lrow['vidshd'];


$owner_c=$bywho;
$albumid_c=$okey;

$sbid_c=$lrow['sbid'];

$toeval="lrow";
$wk='pti';
include("photo_crop.php");
		
$albumn[$okey][$asc].=$secho;		


$albumn[$okey][$asc].=$closediv;
$albumn[$okey][$asc].=$closetd;
			unset($xvar);
		

}//finish while lrow
if(mysql_num_rows($lresult)==0){$killv='y';}

$cl++;

	}
	




$albumn[$okey][$asc].='</tr></table>';

if(isset($killv)){unset($albumn[$okey][$asc]); unset($killv);}

}

}


foreach($albumn as $llavecita => $pvalorazo){
foreach($pvalorazo as $oasc => $valorazo){
$thetime=$ttime[$llavecita][$oasc];


$totpic=count($marr[$llavecita][$oasc]);
$oalb=$llavecita;
$allpics='';
foreach($marr[$llavecita][$oasc] as $omk => $omv){
$allpics.=','.$omv;
}

$stop='';
if($totpic==1){
$pic=$allpics;

if(in_array($pic,$alreadyh)){
$stop='t';	
}

$alreadyh[$x]=$pic;

}



if($stop=="t"){}
else{
	
	
$lresult=mysql_query("SELECT * FROM registered WHERE id='$valued'");
while($lrow=mysql_fetch_array($lresult)){
$uo_un=$lrow['id'];
if($lrow['username']!=""){
$uo_un=$lrow['username'];	
}
$uo_fn=$lrow['fullname'];
$uo_pic=$lrow['profilepict'];
$uo=$valued;
}


$bydate[$x]=$thetime;


$udvv=$tetid2[$llavecita][$oasc][0];


$lresult=mysql_query("SELECT * FROM registered WHERE id='$udvv'");
while($lrow=mysql_fetch_array($lresult)){
$udvv_un=$lrow['id'];
if($lrow['username']!=""){
$udvv_un=$lrow['username'];	
}
$udvv_fn=$lrow['fullname'];
}

if($totpic>1){

$c5=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c5 FROM albums as dt WHERE sbid='$llavecita' AND id='$udvv' $a_qf"));
$c5=$c5['c5'];

$dn=mysql_query("SELECT * FROM albums WHERE sbid='$llavecita'");
while($mn=mysql_fetch_array($dn)){
    $pinboard=$mn['pinboard'];   
}

if($pinboard==1){

    if($c5==0){
        $xchunkm='<a href="/'.$udvv_un.'/photos">photos</a>';
    }
    else{
        $xchunkm='<a href="/'.$udvv_un.'/photos?album='.$llavecita.'">album</a>';	
    }

}else{

    if($c5==0){
        $xchunkm='<a href="/'.$udvv_un.'/pins">pins</a>';
    }
    else{
        $xchunkm='<a href="/'.$udvv_un.'/pins?board='.$llavecita.'">board</a>';	
    }
    
}


$xchunk='album';
}
else{$xchunk='photo';}
if($xchunk=='photo'){

$likeid=$allpics;

$allpics=str_replace(',','',$allpics);

	$emr=mysql_query("SELECT * FROM media WHERE id='$udvv' AND albumid='$llavecita' AND sbid='$allpics'");
while($emr_m=mysql_fetch_array($emr)){
	$mpiclv=$emr_m['pics'];
    $pin=$emr_m['pin'];
}
	

$er=mysql_query("SELECT * FROM tags WHERE id='$udvv' AND albumid='$llavecita' AND photoid='$allpics' AND id3='$valued' AND visibility='v'");
while($erv=mysql_fetch_array($er)){
$datetimep_t=$erv['datetimep'];	
}

$er=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM tags as dt WHERE id='$udvv' AND albumid='$llavecita' AND id3='$valued' AND visibility='v' AND datetimep<$datetimep_t $tags_qf"));
$gnorder=$er['c']+1;
	
$thewidthl=getimagesize("../users/".$udvv."/pics/".$mpiclv); $swidth=$thewidthl[0]; $sheight=$thewidthl[1];



$owner_c=$udvv;

$mr=mysql_query("SELECT * FROM tags as dt WHERE id='$owner_c' AND id3='$valued' AND albumid='$llavecita' AND visibility='v' $tags_qf");
$tal=mysql_num_rows($mr);

$uti=sb_user($valued);
$value_c=$valued;
$fullname_c=$uti['fullname'];
$unv_c=$uti['username'];

if($pin==1){
    $dtext='photo';
}else{
    $dtext='pin';
}


    

$xchunkm='<div class="emav" onclick="getnext(\''.$mpiclv.'\',\''.$udvv.'\',\''.$llavecita.'\',\''.$swidth.'\',\''.$sheight.'\',\''.$gnorder.'\',\''.$tal.'\',\'pti\',\'f\',\''.$value_c.'\',\''.$fullname_c.'\',\''.$unv_c.'\',\'\',\'\',\'\',\''.$allpics.'\');">'.$dtext.'</div>';

$wp_table='tags';
$likeid=$allpics;
$owner_c=$owner_c;
include("stories/with_plugin.php");
if($with!=""){
$with=' &#151; with '.$with;
}
}
else{
$tr=0;
$with='';	
}
if($stop=="t"){}
else{

    $likeid=$okey;
$ltype='tags';

if($uo==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="removept(\''.$allpics.'\',\''.$uo.'\','.$x.',\''.$oalb.'\');">Hide Post</li>
<li class="itemaliv" style="list-style-type:none;">Report as Abuse...</li>

</ul>
';
$saddo='';
}
else{
$whatisit_h='photo';
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefsp(\''.$allpics.'\',\''.$udvv.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="reportp(\''.$allpics.'\',\''.$udvv.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>';
$saddo='';	
}


$dr[$x]=$faddo;	
	
	if($desc==""){
	$withv=$with;
	$tr=0;
$with='';	
	}
	else{
	$withv='';
	}
	$dr[$x].='<table style="color:#808080;font-size:11px;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$uo_un.'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table style="margin:0;padding:0;"><tr><td class="friendslink"><a hc="" href="/'.$uo_un.'">'.$uo_fn.'</a> <span class="llb fwn" style="color:#808080;">was tagged in <a hc="" href="/'.$udvv_un.'">'.$udvv_fn.'</a>\'s '.$xchunkm.'.'.$withv.'</span></td></tr><tr><td>'.$valorazo;
	
if($xchunk=='photo'){
$dr[$x].='<span style="color:#808080;position:relative;bottom:-3px;">'.$desc.'</span>'.$with;
}
else{
$totlikes=3;
$totcomments=8;
$totshares=1;

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;	
}

$withv='';
$tr=0;
$with='';
if($pin==1){
    $dclass='imgsp';   
}else{
    $dclass='pinsp';
}
$dr[$x].='</td></tr></table><tr><td style="text-align:right;"><div class="'.$dclass.'" style="cursor:default;position:relative;top:-2px;right:-2px;"></div></td><td class="story_foot_tdv" style="padding-left:4px;"><div class="lbl inlineBlock">';

if($xchunk=='photo'){	
$ltype='photo';

$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}

$dr[$x].='
'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment">Comment</span>';
}

$dr[$x].='&nbsp;&#183;&nbsp;<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$thetime.'" title="'.rtd($thetime).'">'.td
($thetime).'</abbr></div>';
}

if($xchunk=='photo'){

$dr[$x].='<div class="foot_box lb">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

	$fv='';
	$pdl='78';
	$pdlv='78';
	$wrapfc='';
	$wop='32';
	$wopv='8';
	$hop='32';
	$hopv='10';
	$tmr='0';
	$posre='position:relative;top:-7px;';
	$posre2='position:relative;top:-5px;';
	
	$iffriend='inline-block'; $iffriendv='like'; $iffriendvv='pointer;';


$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {

$count=$m10['count'];
if($count!='0'){$count=$count;}else{unset($count);}

}


$vrt=0;
$uidvpc=$udvv.'pc';
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM comments WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];
  
  
  
  	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}
	
if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;

$dr[$x].='<div style="width:394px;margin:0;padding:0;position:relative;top:0px;margin-bottom:0px;">';
if(isset($count)){
	
$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$udvv;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

include("stories/likes_this.php");

if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\'; bordercito(\''.$x.'\');';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}
if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$dr[$x].='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;position:relative;margin-left:'.$pdlv.'px;" class="foot_box_inner" id="moremsgv'.$x.'">



<div class="msgiconito" style="position:absolute;left:8px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:22px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$udvv.'\',\''.$likeid.'\',1);'.$cont.' document.getElementById(\'rofm'.$x.'\').style.display=\'block\';" id="moremsg'.$x.'">View all '.$vrt.' comments</span><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$udvv.'\',\''.$likeid.'\',2)" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#666666;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div></div>';	
}

if(!isset($haslikes) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}

$r11=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m11=mysql_fetch_array($r11)){
$uidpic=$m11['profilepict'];	
}

$thefabpicv=$pic;

$value=$udvv;

$thefabtext=$likeid;

$nml=$pdlv;
$nmlf='';

$two_c=2;

$for_photo='t';

include("load_2_comments.php");

include("comment_box.php");


$dr[$x].='</div>'; //foot box closure

$dr[$x].='</td></tr></table>';

$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure
	
	
	
}
else{
$dr[$x].='</td></tr></table>';

$dr[$x].='</div>'; //main wrapper for story closure - in case it were an album
}


if(!isset($pause)){$pause='';}
if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);}
$x++;

}

}

}
}

}






unset($iffriend);


$mn=$pmn;
$mnv=$pmnv;


//new friends



if(!isset($justphotos) AND !isset($justlinks)){
	
function tdpf($top,$topv){
$topv=tod($topv); 
$top=tod($top); 

$compared_time=new DateTime($topv);
$actual_time=new DateTime($top);
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%Y'); $suf=" year";
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%m'); $suf=' month';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf='day';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf='hour';}
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf='minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf='second';}
if($td=='+0' || $td=='-0'){$td='1';}
$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}

if($suf=='second' || $suf=='minute' || $suf=='hour' && $td<24){
return 'belongs';
}
else{return 'past';}

}


$anexo='';
foreach($sbv as $keyf => $valuef){
$y=0;

$fcuidv=$valuef;


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


$value=$valuef;

if(!isset($wall)){
$mn=400;
}

$b_qf=return_bq("friends","");

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

$r=mysql_query("SELECT * FROM friends WHERE id='$fcuidv' AND confirmed='y' $b_qf ORDER BY datetimep DESC LIMIT $mn"); //no limit - real limit 5000
while($m = mysql_fetch_array($r))
  {
	  
$v1=$m['id2'];

$r2 = mysql_query("SELECT * FROM registered WHERE id='$valuef'");
while($m2 = mysql_fetch_array($r2)){
$uo_fn=$m2['fullname'];
$uo_pic=$m2['profilepict'];
$uo=$m2['id'];
$uo_un=$m2['username'];
}
$r2=mysql_query("SELECT * FROM registered WHERE id='$v1'");
while($m2 = mysql_fetch_array($r2)){
$bydate[$x]=$m['datetimep'];
$whoisfriend=$m2['fullname'];
$whoisfriendtag=$m2['id'];
$whoisfriendusername=$m2['username'];
}

$kill='';
if($whoisfriendtag==$uidv){$kill='y';}
else{
$tostrpos=$uo.$whoisfriendtag;
$tostrposv=$whoisfriendtag.$uo; 


if(strpos($anexo,$tostrpos)!==false){$kill='y';}
if(strpos($anexo,$tostrposv)!==false){$kill='y';}

if($whoisfriendtag!=$uidv && $uo!=$uidv){
$anexo.=$tostrpos.$tostrposv;
}
}
if($kill!='y'){
$armado[$y]=$uo_un.'{}'.$uo.'{}'.$uo_pic.'{}'.$whoisfriendusername.'{}'.$whoisfriend.'{}'.$bydate[$x].'{}'.$whoisfriendtag.'{}'.$m['sbid'].'{}'.$m['id'];

$y++;
}
unset($kill);
//if($y=='26'){break;}
}




if(isset($armado)){
$xrr=0;
$xr=0;
${'resultswb'.$xrr}='';
foreach($armado as $key => ${'val'.$xr})
{

${'list'.$xr}=explode('{}',${'val'.$xr});

//$bydate[$x]=${'list'.$xr}[5];

${'bydate'.$xr}=${'list'.$xr}[5];

$xrv=$xr-1;

${'did'.$xr}=${'list'.$xr}[7];

${'uid'.$xr}=${'list'.$xr}[8];

if(isset(${'bydate'.$xrv})){
$varv=tdpf(${'bydate'.$xrv},${'bydate'.$xr});
if($varv=='belongs'){${'bydatev'.$xrr}=${'bydate'.$xr}; ${'resultswb'.$xrr}.=${'list'.$xrv}[6].'{}'.${'list'.$xr}[6].'{}'; $hubo_belongs='';}
else{$xrr++; ${'bydatev'.$xrr}=${'bydate'.$xr}; ${'resultswb'.$xrr}=${'list'.$xr}[6].'{}';
}
}
else{if(isset($hubo_belongs)){unset($hubo_belongs);} else if($xr!=0){$xrr++;} ${'bydatev'.$xrr}=${'bydate'.$xr}; ${'resultswb'.$xrr}=${'list'.$xr}[6].'{}';}
$xr++;

}
unset($hubo_belongs);



$nxv=0;
$totalx=$xrr;
while($nxv<=$totalx)
{	

$list=explode('{}',${'resultswb'.$nxv});
$list=array_unique($list);
${'resultswbv'.$nxv}='';

$txq=0;
foreach($list as $key => $value){
	if($value!=''){
$txq++;
	}
}

	$r=mysql_query("SELECT * FROM registered WHERE id='$value'");
	while($m=mysql_fetch_array($r)){
	$ffullname=$m['fullname'];	
	$fusername=$m['username'];
	}

    		
$wp_table='n_friends';
$likeid='';
$owner_c=$uo;
$desc='';
include("stories/with_plugin.php");

${'dx'.$nxv}=$x;

if($txq==1){

$value=${'uid'.$nxv};

$likeid=${'did'.$nxv};
$ltype="n_friends";
$whatisit='n_friends';
$elemid=$likeid;

${'resultswbv'.$nxv}='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'">';

${'resultswbv'.$nxv}.='<table style="font-size:11px;color:#808080;" class="mtable"><tr><td style="width:50px;padding-left:18px;"><a href="/'.$uo_un.'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td style="vertical-align:top;" class="friendslink"><div style="margin:0;padding:0;"><a hc="" href="/'.$uo_un.'">'.$uo_fn.'</a> and '.$with.' are now friends.'.'</div></td></tr>';	
}
else if($txq>=2){
${'resultswbv'.$nxv}='<table style="font-size:11px;color:#808080;" data-uidv="'.$uo.'" class="mtable"><tr><td style="width:50px;padding-left:18px;"><a href="/'.$uo_un.'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td style="vertical-align:top;" class="friendslink"><div style="margin:0;padding:0;position:relative;"><a hc="" href="/'.$uo_un.'">'.$uo_fn.'</a> is now friends with '.$with.'</div></td></tr></table>';
}

$dvala=$uo;
foreach($list as $key => $value){
if($value!=''){
$dvalb=$value;
}
}

if($txq==1){

$value=${'uid'.$nxv};
$uidv=$value;
$ltype='n_friends';
	  
$likeid=${'did'.$nxv};;
$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count'];
if($count!='0'){$count=$count;}
else{unset($count);}
}	  
$c=mysql_num_rows($r10);
if($c==0){
unset($count);	
}

$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}


${'resultswbv'.$nxv}.='<tr><td></td><td class="story_foot_td" style="padding-left:2px;"><div class="lbl inlineBlock">'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment">Comment</span>&nbsp;&#183;&nbsp;<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.${'bydate'.$nxv}.'" title="'.rtd(${'bydate'.$nxv}).'">'.td
(${'bydate'.$nxv}).'</abbr></div>';


${'resultswbv'.$nxv}.='<div class="foot_box foot_box_margin">';
include("stories/story_pincho.php");
${'resultswbv'.$nxv}.=$sechov;

	$vrt=0;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM commentsv WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];

	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}

$counter=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM shares WHERE id2='$uo' AND elemid='$elemid' AND whatisit='$whatisit' AND visibility='v'"));
$counter=$counter['counter'];

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

//$topa[$x]=$top; - don't set topa so that it works fine
${'topa'.$nxv}=$top;

if(isset($count)){
$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=${'uid'.$nxv};

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

$dr[$x]="";

include("stories/likes_this.php");

${'resultswbv'.$nxv}.=$dr[$x];


if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\'; bordercito('.$x.');';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}

if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
${'resultswbv'.$nxv}.='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;position:relative;margin-left:78px;" class="foot_box_inner" id="moremsgv'.$x.'">


<div class="msgiconito" style="position:absolute;left:8px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:22px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$ud.'\',\''.$likeid.'\',1);'.$cont.' document.getElementById(\'rofm'.$x.'\').style.display=\'block\';" id="moremsg'.$x.'">View all '.$vrt.' comments</span><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$ud.'\',\''.$likeid.'\',2)" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#666666;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div></div>';	
}


if(!isset($haslikes) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}

$r11=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m11=mysql_fetch_array($r11)){
$uidpic=$m11['profilepict'];	
}

$ud=$uid;
$value=$ud;

$thefabtext=$likeid;

$nml=78;
$nmlf='';

$two_c=2;

$for_photo='f';

$dr[$x]="";

include("load_2_comments.php");

include("comment_box.php");

${'resultswbv'.$nxv}.=$dr[$x];

${'resultswbv'.$nxv}.='</div>'; //foot box closure

${'resultswbv'.$nxv}.'</td></tr></table>';

${'resultswbv'.$nxv}.='</td></tr></table>';

${'resultswbv'.$nxv}.='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

${'resultswbv'.$nxv}.='</div>'; //main wrapper for story closure

}

$x++;
$nxv++;

}


$nx=0;
$totalx=$xrr;

while($nx<=$totalx)
{	

$dx=${'dx'.$nx};

$bydate[$dx]=${'bydatev'.$nx};

$dr[$dx]=${'resultswbv'.$nx};

if(isset(${'topa'.$nx})){
$topa[$dx]=${'topa'.$nx};
}else{
$topa[$dx]=0;
}

$y++;
$nx++;

}


unset($armado);
}

}

}




//album, video and photo share

unset($kill);

$xrtl=0;

if(!isset($wall)){
$mn=70;
$mnv=10;	
}

$dq="(SELECT * FROM shares as dt WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND (whatisit='shared_photo' OR whatisit='shared_album' OR whatisit='shared_video') AND $dtc<=$rnowu AND $dtc>$tagou AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT $mn)";

if(isset($clist)){
$dq.=" UNION (SELECT * FROM shares as dt WHERE id='$uid' AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(privacy,'l',''))>0)>0 AND (whatisit='shared_photo' OR whatisit='shared_album' OR whatisit='shared_video') AND $dtc<=$rnowu AND $dtc>$tagou AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT $mn)";
}

$dq.="UNION (SELECT * FROM shares as dt WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND (whatisit='shared_photo' OR whatisit='shared_album' OR whatisit='shared_video') AND $dtc<$tagou AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT $mnv)";

if(isset($clist)){
$dq.=" UNION (SELECT * FROM shares as dt WHERE id='$uid' AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(privacy,'l',''))>0)>0 AND (whatisit='shared_photo' OR whatisit='shared_album' OR whatisit='shared_video') AND $dtc<$tagou AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT $mnv)";	
}

$r=mysql_query("$dq");
$c=mysql_num_rows($r);


while($m=mysql_fetch_array($r)){
$value=$m['id'];
$uidv=$value;

$whatisit=$m['whatisit'];
$uo=$m['id2'];
$ud=$m['id'];

$r3=mysql_query("SELECT * FROM registered WHERE id='$ud'");
while($m3=mysql_fetch_array($r3)){
$udusername=$m3['username'];
$uo_pic=$m3['profilepict'];
$uo_fn=$m3['fullname'];
}

$r3=mysql_query("SELECT * FROM registered WHERE id='$uo'");
while($m3=mysql_fetch_array($r3)){
$uousername=$m3['username'];
$whompic=$m3['profilepict'];
$whomfullname=$m3['fullname'];
}

$elemid=$m['elemid'];

if($whatisit=="shared_album"){
$r2=mysql_query("SELECT * FROM media WHERE id='$uo' AND albumid='$elemid' AND visibility='v' and nye='3' $media_qf");
$tp=mysql_num_rows($r2);
}
else{
$tp=""; //no need to know total pictures	
}

$likeid=$m['sbid'];
$valu=$m['valu'];

if($whatisit=="shared_album"){
$photoid=$m['photoid'];
$r2=mysql_query("SELECT * FROM media WHERE id='$uo' AND albumid='$elemid' AND visibility='v' AND nye='3' $media_qf ORDER BY datetimep DESC LIMIT 1");
//$r2=mysql_query("SELECT * FROM media WHERE id='$uo' AND albumid='$elemid' AND sbid='$photoid' AND visibility='v' and nye='3' $media_qf");

$c=mysql_num_rows($r2);
}
else{
$photoid=$m['elemid'];
$r2=mysql_query("SELECT * FROM media WHERE id='$uo' AND sbid='$elemid' AND visibility='v' and nye='3' $media_qf");	
}
unset($desc);
$ltype=$whatisit;	
while($m2=mysql_fetch_array($r2)){
$bydate[$x]=$m['datetimep'];	

$r10=mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
$c10=mysql_num_rows($r10);
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count'];
if($count!='0'){$count=$count;}
else{unset($count);}
}
if($c10==0){
unset($count);	
}

$thesize=getimagesize("../users/".$uo."/pics/".$m2['picsa']);
$minipw=$thesize[0];
$miniph=$thesize[1];
$desc=$m2['descr']; 

if($whatisit=="shared_album"){

$width=floor($thesize[0]/2.5);
$height=floor($thesize[1]/2.5);
$widthv=$width+10;

if($ud==$uo){$rj=mysql_query("SELECT * FROM registered WHERE id='$ud'");
while($mj=mysql_fetch_array($rj)){
$gender=$mj['gender'];
if($gender=="1"){$prefix="her own";}
else{$prefix="his own";}	
}
}
else{$prefix='<span class="llb fwn"><a hc="" href="/'.$uousername.'">'.$whomfullname.'</a>\'s';}

$uidva=$uo.'a';
$mresult=mysql_query("SELECT * FROM albums WHERE id='$uo' AND sbid='$elemid' AND visibility='v'");
while($mrow=mysql_fetch_array($mresult)){
$albumid=$elemid;
$pin=$mrow['pinboard'];
	$desccv=$mrow['descr']; 
if($desccv!=''){


$sdesc=$mrow['descr'];


if(strpos($sdesc,"<b data-uidv")!==false){
    $html=$sdesc;
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    foreach ($xpath->evaluate("//*[@data-uidv]") as $node) {
        $utivv=sb_user($node->getAttribute("data-uidv"));
        $node->removeAttribute("data-uidv");
        $node->nodeValue = '';
        $newNode = $dom->createElement('div', '');
        $newNode->setAttribute('style','display:inline-block;');
        $oldNode = $node;

        $oldNode->parentNode->replaceChild($newNode, $oldNode);
        $div = $dom->createElement('div','&nbsp;');
        $div->setAttribute('class', 'lb');
        
        $anchor = $dom->createElement('a',$utivv['fullname']);
        $anchor->setAttribute('href', '/'.$utivv['username']);
        $anchor->setAttribute('hc', '');
        
        $div->appendChild($anchor);
        
        $newNode->appendChild($div);
        
    }
    $sdesc="";
    foreach ($xpath->evaluate("/html/body/node()") as $node) {
        $sdesc.=$dom->saveHTML($node);
    }

}


$descc='<div style="margin:0;padding:0;position:relative;margin-bottom:0px;margin-top:5px;" class="friendslink2v">'.$sdesc.'</div>'; $addo='0';
}
else{$descc=''; $addo='5px';}
}

$albumn=$m2['albumn'];
$photoid="";
$sharef='show_msg_dialogs(\''.$albumid.'\',\'shared_album\',\''.$uo.'\',\''.$photoid.'\','.$tp.','.$x.',\'\',\'\',\'\',\''.$pin.'\')';

if($m2['pin']==1){
    $dtext='album';   
    $dhref='/'.$uousername.'/photos?album='.$albumid;
}else{
    $dtext='board';
    $dhref='/'.$uousername.'/pins?board='.$albumid;
}

$sharedchunk='<div style="margin:0;padding:0;"><a hc="" href="/'.$udusername.'">'.$uo_fn.'</a> shared '.$prefix.' '.$dtext.': <a href="'.$dhref.'">'.$albumn.'</a>.</span><div style="margin:0;padding:0;color:#333333;margin-top:3px;margin-bottom:3px;">'.$valu.'</div></div>';

$pause='';

$whatisit_h=$ltype;

		$cag=$likeid;
include("set_pause.php");
		



if($ud==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 
<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removeps(\''.$likeid.'\',\''.$uo.'\','.$x.',\'shared_album\');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"  ></div></div>';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$likeid.'\',\''.$uo.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$likeid.'\',\''.$uo.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';	
}

$dr[$x]=$faddo;



$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}

$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$udusername.'" class="andbl"><img src="/'.$ud.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table><tr><td style="vertical-align:top;color:#808080;" class="friendslink" colspan="2">'.$sharedchunk.'</td></tr><tr><td style="width:'.$widthv.'px;vertical-align:top;text-align:left;">';

$gnorder=$m2['norder'];

if($m2['albumn']=="Profile Pictures" || $m2['albumn']=="Wall Photos" || $m2['albumn']=="Videos" || $m2['albumn']=="Photos" || $m2['albumn']=="Pins" || $m2['albumn']=="Wall Pins"){
$did=$m2['sbid'];
$albumid=$m2['albumid'];
$or=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM media WHERE id='$uo' AND albumid='$albumid' AND sbid!='$did' AND visibility='v' AND norder<$gnorder $media_qf"));	
$gnorder=$or['c']+1;
}

$thewidthl=getimagesize("../users/".$uo."/pics/".$m2['pics']); $swidth=$thewidthl[0]; $sheight=$thewidthl[1];
$thewidthm=getimagesize("../users/".$uo."/pics/".$m2['picsa']); $mwidth=$thewidthm[0]; $mheight=$thewidthm[1];

$oalbum=$m2['albumid'];

$es1="t";
$cpw=188;
$pics_a=$m2['picsa'];
$pics_c=$m2['pics'];
$vids_c=$m2['vids'];
$vidshd_c=$m2['vidshd'];

$pin=$m2['pin'];

$owner_c=$uo;
$albumid_c=$m2['albumid'];

$toeval="m2";

$wk='r';
$sps='t';
include("photo_crop.php");
		
$dr[$x].=$secho;

if($m2['pin']==1){
    $dclass='imgsp'; 
    $dtextv='Photos';
    $dhref='/'.$uousername.'/photos?album='.$albumid;
}else{
    $dclass='pinsp';  
    $dtextv='Pins';
    $dhref='/'.$uousername.'/pins?board='.$albumid;
}

$dr[$x].='</td><td style="text-align:left;vertical-align:top;color:#808080;" class="friendslink"><a href="'.$dhref.'">'.$albumn.'</a>'.$descc.'<div style="margin:0;margin-top:'.$addo.'px;padding:0;" class="friendslink2v">By: <a hc="" href="/'.$uousername.'">'.$whomfullname.'</a><br>'.$dtextv.': <span style="color:#333333;">'.$tp.'</span></div></td></tr></table><tr><td style="text-align:right;"><div class="'.$dclass.'" style="cursor:default;position:relative;top:-2px;right:2px;"></div></td><td><div class="lbl inlineBlock">'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment">Comment</span>&nbsp;&#183;&nbsp;<span class="friendslink3v" title="Post this on your profile." onclick="'.$sharef.'">Share</span>&nbsp;&#183;&nbsp;<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td($m['datetimep']).'</abbr></div>';	

}

else{ //if share is photo or video, and not album

$vids_c=$m2['vids'];	
if($vids_c!=""){
$vid_photo='vid';
$vidd_c=td_fn($m2['datetimep']);

$vidt_c=$m2['title'];
if($vids_c!="" && $vidt_c==""){
$vidt_c=video_title_in_date($m2['datetimep']);
}
$vidl_c=simplify_video_duration($m2['duration']);
}
else{$vid_photo='';}

$vids_c=$m2['vids'];
$vidshd_c=$m2['vidshd'];

$albumid=$m2['albumid'];

if($ud==$uo){$schunk='';}
else{

$thewidthl=getimagesize("../users/".$uo."/pics/".$m2['pics']); $swidth=$thewidthl[0]; $sheight=$thewidthl[1];



$gnorder=$m2['norder'];

if($m2['albumn']=="Profile Pictures" || $m2['albumn']=="Wall Photos" || $m2['albumn']=="Videos" || $m2['albumn']=="Photos" || $m2['albumn']=="Pins" || $m2['albumn']=="Wall Pins"){
$did=$m2['sbid'];
$or=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM media WHERE id='$uo' AND albumid='$albumid' AND sbid!='$did' AND visibility='v' AND norder<$gnorder $media_qf"));	
$gnorder=$or['c']+1;
}


$oalbum=$m2['albumid'];

$mr=mysql_query("SELECT * FROM media WHERE id='$uo' AND albumid='$oalbum' AND visibility='v' and nye='3' $media_qf");
$tal=mysql_num_rows($mr);

if($m2['albumn']!="Videos"){
    if($m2['pin']==1){
        $dwhat="photo";
    }else{
        $dwhat="pin";   
    }
}
else{
$dwhat="video";	
}

$schunk='&nbsp;shared <a hc="" href="/'.$uousername.'">'.$whomfullname.'</a>\'s <div class="emav" onclick="getnext(\''.$m2['pics'].'\',\''.$uo.'\',\''.$m2['albumid'].'\',\''.$swidth.'\',\''.$sheight.'\',\''.$gnorder.'\',\''.$tal.'\',\'r\',\'f\',\'\',\'\',\'\',\''.$vid_photo.'\',\''.$vids_c.'\',\''.$vidshd_c.'\',\''.$m2['sbid'].'\');">'.$dwhat.'</div>.';
}


$albumn=$m2['albumn'];

		
		if($whatisit!="shared_video"){	
$vidl="";
$vidt="";
$vidd="";
		}else{
$vidl=$vidl_c;
$vidt=$vidt_c;
$vidd=$vidd_c;			
		}
if($whatisit=="shared_album"){
$photoid="";	
}

$or=mysql_query("SELECT pin FROM media WHERE sbid='$photoid'");
while($om=mysql_fetch_array($or)){
    $pin=$om['pin'];   
}
$sharef='show_msg_dialogs(\''.$albumid.'\',\''.$whatisit.'\',\''.$uo.'\',\''.$photoid.'\','.$tp.','.$x.',\''.$vidl.'\',\''.$vidt.'\',\''.$vidd.'\',\''.$pin.'\')';
$uidva=$uo.'a';
$mresult=mysql_query("SELECT * FROM albums as dt WHERE id='$uo' AND sbid='$albumid' AND visibility='v' $a_qf");
while($mrow=mysql_fetch_array($mresult)){
if($mrow['descr']!=''){
$descc='<div style="margin:0;padding:0;position:relative;right:-1px;margin-bottom:1px;" class="friendslink2v">'.$mrow['descr'].'</div>';	
}
else{$descc='';}
}
if($desc!=""){if($descc==""){$addo='5'; $addov='top:-1px;';}else{$addo='4'; $addov='';}}else{$addo='4'; $addov='';}
$sharedchunk='<div style="margin:0;padding:0;"><a hc="" href="/'.$udusername.'">'.$uo_fn.'</a><div class="llb fwn" style="display:inline-block;">'.$schunk.'</div><div style="margin:0;padding:0;color:#333333;margin-top:3px;margin-bottom:3px;">'.$valu.'</div></div>';


$pause='';

		$whatisit_h=$whatisit;
$cag=$likeid;
include("set_pause.php");



if($ud==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 
<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removeps(\''.$likeid.'\',\''.$uo.'\','.$x.',\''.$whatisit.'\');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"  ></div></div>';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$photoid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$photoid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';	
}

$dr[$x]=$faddo;

	
$r10=mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}


$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$udusername.'" class="andbl"><img src="/'.$ud.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table><tr><td style="vertical-align:top;color:#808080;" class="friendslink" colspan="2">'.$sharedchunk.'</td></tr><tr><td colspan="2" style="vertical-align:top;text-align:left;">';

$thewidthl=getimagesize("../users/".$uo."/pics/".$m2['pics']); $swidth=$thewidthl[0]; $sheight=$thewidthl[1];
$thewidthm=getimagesize("../users/".$uo."/pics/".$m2['picsa']); $mwidth=$thewidthm[0]; $mheight=$thewidthm[1];
$gnorder=$m2['norder'];

if($m2['albumn']=="Profile Pictures" || $m2['albumn']=="Wall Photos" || $m2['albumn']=="Videos" || $m2['albumn']=="Photos"){
$did=$m2['sbid'];
$albumid=$m2['albumid'];
$or=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM media WHERE id='$uo' AND albumid='$albumid' AND sbid!='$did' AND visibility='v' AND norder<$gnorder $media_qf"));	
$gnorder=$or['c']+1;
}


$es1="t";
$cpw=398;

$owner_c=$uo;

$toeval="m2";

$wk='r';
include("photo_crop.php");

$dr[$x].=$secho;

if($m2['pin']==1){
    $dclass='imgsp'; 
}else{
    $dclass='pinsp';
 }

if($vids_c!=""){
$vid_photo_text='<a href="#" onclick="'.$pst.' return false;">'.$vidt.'</a><span style="display:block;margin-top:5px;"><span>Length:</span><span style="color:#333333;"> '.$vidl.'</span></span>';
}
else{
$vid_photo_text='<a href="/'.$uousername.'/photos?album='.$albumid.'">'.$albumn.'</a>';	
}

$dr[$x].='</td></tr><tr><td style="text-align:left;vertical-align:top;color:#808080;" class="friendslink" colspan="2">'.$vid_photo_text.'<div style="margin:0;padding:0;position:relative;right:-1px;'.$addov.'margin-bottom:'.$addo.'px;" class="friendslink2v">'.$desc.'</div>'.$descc.'<div style="margin:0;padding:0;position:relative;right:-1px;" class="friendslink2v">By: <a hc="" href="/'.$uousername.'">'.$whomfullname.'</a></div></td></tr></table><tr><td style="text-align:right;"><div class="'.$dclass.'" style="cursor:default;position:relative;top:-2px;right:2px;"></div></td><td><div class="lbl inlineBlock">'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment">Comment</span>&nbsp;&#183;&nbsp;<span class="friendslink3v" title="Post this on your profile." onclick="'.$sharef.'">Share</span>&nbsp;&#183;&nbsp;<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td($m['datetimep']).'</abbr></div>';
}



$ltypev="shares";
$sbid=$m['sbid'];

$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$m['id'];

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';


$dr[$x].='<div class="foot_box foot_box_margin">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

	$vrt=0;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM commentsv WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];

	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}

$counter=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM shares WHERE id2='$uo' AND elemid='$elemid' AND whatisit='$whatisit' AND visibility='v'"));
$counter=$counter['counter'];

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;


if(isset($count)){
$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$ud;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

include("stories/likes_this.php");



if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\'; bordercito('.$x.');';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}

if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$dr[$x].='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;position:relative;margin-left:78px;" class="foot_box_inner" id="moremsgv'.$x.'">


<div class="msgiconito" style="position:absolute;left:8px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:22px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$ud.'\',\''.$likeid.'\',1);'.$cont.' document.getElementById(\'rofm'.$x.'\').style.display=\'block\';" id="moremsg'.$x.'">View all '.$vrt.' comments</span><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$ud.'\',\''.$likeid.'\',2)" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#666666;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div></div>';	
}


if(!isset($haslikes) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}

$r11=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m11=mysql_fetch_array($r11)){
$uidpic=$m11['profilepict'];	
}

$value=$ud;

$thefabtext=$likeid;

$nml=78;
$nmlf='';

$two_c=2;

$for_photo='t';
include("load_2_comments.php");

include("comment_box.php");



}
if(!isset($desc)){$kill='';}
if(isset($kill)){unset($kill);}
else{
$dr[$x].='</div>'; //foot box closure

$dr[$x].'</td></tr>';

$dr[$x].='</td></tr></table></td></tr></table>';

$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure

if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);}

$x++;
}
}








function tdpo($topv,$tp3){
$topv=tod($topv); 
$tp3=tod($tp3); 

$compared_time=new DateTime($tp3);
$actual_time=new DateTime($topv);
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%m'); $suf=" month";
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf=' day';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf=' hour';}
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf=' minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf=' second';}
if($td=='+0' || $td=='-0'){}
$negdif=strpos($td,'-');
if($negdif!==false){$negdifv='t';}
$posdif=strpos($td,'+');
if($posdif!==false){$posdifv='t';}
if(isset($posdifv)){return 't';}
else{return 'f';}
}




//status update share
/*
aca esta en la query la idea clara de select distinct photoid por el share
lo que habria que hacer es un select distinct de photoid si pero no por usuario, sino por todos los amigos a la vez
de esa manera se seleccionaria primero a todos distinct [but which are not duplicated]
y por otra parte todos aquellos cuya photoid viene por duplicado(s)

sin duplicados:

SELECT  a.*
FROM    tableName a
        INNER JOIN
        (
            SELECT fieldA, COUNT(*) totalCount
            FROM tableName
            GROUP BY fieldA
        ) b ON a.fieldA = b.fieldA
WHERE b.totalCount = 1
ORDER BY b.totalCount DESC


para usar a modo de merge du share:

SELECT  a.*
FROM    tableName a
        INNER JOIN
        (
            SELECT fieldA, COUNT(*) totalCount
            FROM tableName
            GROUP BY fieldA
        ) b ON a.fieldA = b.fieldA
WHERE b.totalCount > 1
ORDER BY b.totalCount DESC
*/

if(!isset($justphotos)){

unset($kill);

$xrtl=0;

if(!isset($wall)){
$mn=30;
$mnv=5;	
}

$dq="(SELECT dt.* FROM shares dt INNER JOIN(SELECT elemid, COUNT(*) totalCount from shares WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND whatisit='shared_status_update' AND $dtc<='$rnowu' AND $dtc>'$tagou' AND visibility='v' group by elemid) b ON dt.elemid = b.elemid WHERE b.totalCount=1 $a_qf ORDER BY datetimep DESC LIMIT $mn)";

if(isset($clist)){
$dq.=" UNION (SELECT dt.* FROM shares dt INNER JOIN(SELECT elemid, COUNT(*) totalCount from shares WHERE id='$uid' AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(privacy,'l',''))>0)>0 AND whatisit='shared_status_update' AND $dtc<='$rnowu' AND $dtc>'$tagou' AND visibility='v' group by elemid) b ON dt.elemid = b.elemid WHERE b.totalCount=1 $a_qf ORDER BY datetimep DESC LIMIT $mn)";
} //por ahora sin poder agruparlas, en una lista, el mismo status update shared por mi mismo y shared por uno de mis amigos en vista de lista, solucionar con crack en algun momento

$dq.="UNION (SELECT dt.* FROM shares dt INNER JOIN(SELECT elemid, COUNT(*) totalCount from shares WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND whatisit='shared_status_update' AND $dtc<'$tagou' AND visibility='v' group by elemid) b ON dt.elemid = b.elemid WHERE b.totalCount = 1 $a_qf ORDER BY datetimep DESC LIMIT $mnv)";

if(isset($clist)){
$dq.=" UNION (SELECT dt.* FROM shares dt INNER JOIN(SELECT elemid, COUNT(*) totalCount from shares WHERE id='$uid' AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(privacy,'l',''))>0)>0 AND whatisit='shared_status_update' AND $dtc<'$tagou' AND visibility='v' group by elemid) b ON dt.elemid = b.elemid WHERE b.totalCount = 1 $a_qf ORDER BY datetimep DESC LIMIT $mnv)";
}


$r=mysql_query("$dq");



while($m=mysql_fetch_array($r)){
$value=$m['id'];
$mp=$m;
$uidv=$value;


$textid=$m['elemid'];

$whatisit=$m['whatisit'];
$uo=$m['id2'];
$ud=$m['id'];

$r3=mysql_query("SELECT * FROM registered WHERE id='$ud'");
while($m3=mysql_fetch_array($r3)){
$udusername=$m3['username'];
$uo_pic=$m3['profilepict'];
$uo_fn=$m3['fullname'];
}

$r3=mysql_query("SELECT * FROM registered WHERE id='$uo'");
while($m3=mysql_fetch_array($r3)){
$uousername=$m3['username'];
$whompic=$m3['profilepict'];
$whomfullname=$m3['fullname'];
}

$textid=$m['elemid'];
$uidvt=$uo.'t';


$likeid=$m['sbid'];
$valu=$m['valu'];


$ltype="shared_status_update";

$r2=mysql_query("SELECT * FROM status as dt WHERE sbid='$textid' AND visibility='v' $a_qf");	

while($m2=mysql_fetch_array($r2)){
	
$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count'];
if($count!='0'){$count=$count;}
else{unset($count);}
}



if($whatisit=="shared_status_update"){

if($ud==$uo){$rj=mysql_query("SELECT * FROM registered WHERE id='$ud'");
while($mj=mysql_fetch_array($rj)){
$gender=$mj['gender'];
if($gender=="1"){$prefix="her own";}
else{$prefix="his own";}	
}
}
else{$prefix='<span class="llb fwn"><a hc="" href="/'.$uousername.'">'.$whomfullname.'</a>\'s';}


$myar2=$uo.'t';
$yar=mysql_query("SELECT * FROM status WHERE sbid='$textid' AND visibility='v'");
while($myar=mysql_fetch_array($yar)){


$comment="";
$pic=$myar['sbid'];
$piclikeid=$pic;
$albname=$uidvt;

${'date'.$x}=$m['datetimep'];
${'des'.$x}=$pic;
$jov=$x-1;
$jovv=0;
while($jovv<=$jov){
if(isset(${'des'.$jovv}) && ${'des'.$jovv}==${'des'.$x}){if(tdpo(${'date'.$x},${'date'.$jovv})=='f'){$don=$x; $x=$jovv;} else{$kill='t';}}	

$jovv++;
}

if(isset($kill)){unset($kill);}
else{

$bydate[$x]=$m['datetimep'];

$pause='';

		$whatisit_h="shared_status_update";
$cag=$piclikeid;
include("set_pause.php");




$sharef='show_msg_dialogs_status(\''.$whompic.'\',\''.$uo.'\',\''.$myar['sbid'].'\',\''.$whomfullname.'\',\''.$myar['text'].'\',\''.$x.'\');';
$sharef='&nbsp;&#183;&nbsp;<span class="friendslink3v" title="Post this on your profile." onclick="'.$sharef.'">Share</span>';
$bydate[$x]=$m['datetimep'];

if($valu!=""){
		$hopv='25';
$valur='';
$commentchunk='<div style="margin:0;padding:0;color:#808080;padding-bottom:9px;" class="lb fwb"><a hc="" href="/'.$udusername.'">'.$uo_fn.'</a></div><div style="display:block;margin:0;padding:0;color:#333333;position:relative;" class="dstatus'.$x.'">

'.$valu.'

</div>';
}
else{
		$hopv='4';
$valur='';
$commentchunk='<div style="margin:0;padding:0;color:#808080;" class="lb fwb"><a hc="" href="/'.$udusername.'">'.$uo_fn.'</a> shared <div class="llb fwn" style="display:inline-block;">'.$prefix.' <div class="emav" onclick="return false();">status update</div>.</div></div>';	
}

//aca va delete post if uidv==cuidv
if($ud==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removep2v(\''.$myar['sbid'].'\',\''.$ud.'\','.$x.');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"  ></div></div>';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$myar['sbid'].'\',\''.$ud.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$myar['sbid'].'\',\''.$ud.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';
}
$dr[$x]=$faddo;

$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr>';

	$fv='v';
	$pdl='78';
	$pdlv='117';
	$wrapfc='v';
	$wop='32';
	$wopv='10';
	$hop='32';

	$tmr='35';
	$posre='position:relative;top:-6px;';
	$posre2='position:relative;top:-1px;';
	
	$likeido=$likeid;

$dr[$x].='<td style="width:50px;padding-left:16px;padding-right:2px;"><div style="margin:0;padding:0;position:relative;top:-3px;"><a href="/'.$udusername.'" class="andbl"><img src="/'.$ud.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></div></td>';

$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}


$dr[$x].='
<td>
<table style="'.$posre.'"><tr><td style="vertical-align:top;text-align:left;padding-left:4px;">'.$commentchunk.'



<table style="margin:0;padding:0;padding-left:0px;position:relative;top:0px;width:490px;vertical-align:top;margin-bottom:-3px;" cellspacing="0" cellpadding="0">
<tr><td style="border:0;border-top:0px solid rgb(233,233,233);padding-left:2px;padding-top:5px;vertical-align:top;width:'.$wop.'px;" class="lb fwb">
<a href="/'.$uousername.'">
<img src="/'.$uo.'/pics/'.$whompic.'" style="height:'.$hop.'px;width:'.$wop.'px;">
</a>

</td>
<td style="border:0;border-top:0px solid rgb(233,233,233);padding-top:5px;vertical-align:top;">
<div style="display:inline-block;margin:0;padding:0;vertical-align:top;margin-left:'.$wopv.'px;color:#808080;'.$posre2.'" class="friendslink"><a hc="" href="/'.$udusername.'">'.$whomfullname.'</a></div>
</div>
<div style="display:block;margin:0;padding:0;margin-left:6px;color:#808080;">
'.$valur.'
</div>
<div style="display:block;margin:0;padding:0;margin-left:10px;margin-top:3px;color:gray;">
'.$myar['text'].'
</div>
</td></tr>

<tr><td style="text-align:right;"><div class="imgsp" style="display:none;cursor:default;position:relative;margin-top:3px;top:-2px;right:2px;"></div></td>
<td class="story_foot_td" style="">
<div style="margin:0;padding:0;margin-left:6px;margin-top:3px;" class="lbl inlineBlock">
'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment"style="display:inline-block;">Comment</span>'.$sharef.'&nbsp;&#183;&nbsp;<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td($m['datetimep']).'</abbr>
</div>
';

$ltypev="shares";
$sbid=$m['sbid'];

$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$m['id'];

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';


$dr[$x].='<div class="foot_box foot_box_margin">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {

$count=$m10['count'];
if($count!='0'){$count=$count;}else{unset($count);}


}


$vrt=0;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM commentsv WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];
  

$counter=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM shares WHERE id2='$uo' AND elemid='$textid' AND whatisit='shared_status_update' AND visibility='v'"));
$counter=$counter['counter'];

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;  


  
  	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}

$dr[$x].='<div style="width:344px;margin:0;padding:0;position:relative;top:0px;margin-bottom:-3px;">'; //hack because of spaces
if(isset($count)){
	
$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$ud;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

include("stories/likes_this.php");

if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\'; bordercito(\''.$x.'\');';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}
if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$dr[$x].='<div style="background:#edeff4;width:349px;padding:3px;border-top:0px solid #ffffff;position:relative;margin-left:'.$pdlv.'px;" class="foot_box_inner" id="moremsgv'.$x.'">


<div class="msgiconito" style="position:absolute;left:8px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:22px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$ud.'\',\''.$likeid.'\',1,\'f'.$fv.'\');'.$cont.' document.getElementById(\'rofm'.$x.'\').style.display=\'block\';" id="moremsg'.$x.'">View all '.$vrt.' comments</span><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$ud.'\',\''.$likeid.'\',2,\'f'.$fv.'\')" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#666666;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div></div>';	
}

if(!isset($haslikes) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}

$value=$ud;
$thefabtext=$likeid;

$nml=$pdlv;
$nmlf='';

$two_c=2;

$for_photo='';
include("load_2_comments.php");

include("comment_box.php");


$dr[$x].='</div>';

$dr[$x].='</div>'; //foot box closure

$dr[$x].='</td></tr>
</table>
</td></tr></table>


</td></tr></table>';



$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure


if(!isset($don)){

if($pause=='t'){unset($dr[$x]); unset($bydate[$x]); unset($topa[$x]); $x--; unset($pause);}
$x++;
}
else{$x=$don; if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);} unset($don);}

}
$y++;	
}
}
//if($y=='26'){break;}
}

}

}












//share of note



if(!isset($justphotos)){

unset($kill);

$xrtl=0;

if(!isset($wall)){
$mn=30;
$mnv=5;	
}

$dq="(SELECT * FROM shares as dt WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND whatisit='shared_notes' AND $dtc<='$rnowu' AND $dtc>'$tagou' AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT $mn)";

if(isset($clist)){
$dq.=" UNION (SELECT * FROM shares as dt WHERE id='$uid' AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(privacy,'l',''))>0)>0 AND whatisit='shared_notes' AND $dtc<='$rnowu' AND $dtc>'$tagou' AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT $mn)";
}

$dq.="UNION (SELECT * FROM shares as dt WHERE FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 AND whatisit='shared_notes' AND $dtc<'$tagou' AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT $mnv)";

if(isset($clist)){
$dq.=" UNION (SELECT * FROM shares as dt WHERE id='$uid' AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(privacy,'l',''))>0)>0 AND whatisit='shared_notes' AND $dtc<'$tagou' AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT $mnv)";
}

$r=mysql_query("$dq");

while($m=mysql_fetch_array($r)){
$value=$m['id'];
$uidv=$value;

$textid=$m['elemid'];
$likeid=$textid;

$whatisit=$m['whatisit'];
$uo=$m['id2'];
$ud=$m['id'];

$r3=mysql_query("SELECT * FROM registered WHERE id='$ud'");
while($m3=mysql_fetch_array($r3)){
$udusername=$m3['username'];
$uo_pic=$m3['profilepict'];
$uo_fn=$m3['fullname'];
}

$r3=mysql_query("SELECT * FROM registered WHERE id='$uo'");
while($m3=mysql_fetch_array($r3)){
$uousername=$m3['username'];
if($uousername==""){$uousername=$uo;}	
$whompic=$m3['profilepict'];
$whomfullname=$m3['fullname'];
}

$textid=$m['elemid'];


$likeid=$m['sbid'];
$valu=$m['valu'];

$ltype="shared_notes";


$r2=mysql_query("SELECT * FROM nt as dt WHERE sbid='$textid' AND id='$uo' AND visibility='v' $a_qf");	

while($m2=mysql_fetch_array($r2)){
	
$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count'];
if($count!='0'){$count=$count;}
else{unset($count);}
}
$c=mysql_num_rows($r10);
if($c==0){unset($count);}


if($whatisit=="shared_notes"){

if($ud==$uo){$rj=mysql_query("SELECT * FROM registered WHERE id='$ud'");
while($mj=mysql_fetch_array($rj)){
$gender=$mj['gender'];
if($gender=="1"){$prefix="her own";}
else{$prefix="his own";}	
}
}
else{$prefix='<span class="llb fwn"><a hc="" href="/'.$uousername.'">'.$whomfullname.'</a>\'s';}



$yar=mysql_query("SELECT * FROM nt as dt WHERE sbid='$textid' AND id='$uo' AND visibility='v' $a_qf");
while($myar=mysql_fetch_array($yar)){

$comment="";
$pic=$myar['sbid'];
$piclikeid=$pic;


${'date'.$x}=$m['datetimep'];
${'des'.$x}=$pic;
$jov=$x-1;
$jovv=0;
while($jovv<=$jov){
if(isset(${'des'.$jovv}) && ${'des'.$jovv}==${'des'.$x}){if(tdpo(${'date'.$x},${'date'.$jovv})=='f'){$don=$x; $x=$jovv;} else{$kill='t';}}	

$jovv++;
}

if(isset($kill)){unset($kill);}
else{

$bydate[$x]=$m['datetimep'];

$pause='';

		$whatisit_h='shared_notes';
$cag=$piclikeid;
include("set_pause.php");




$bydate[$x]=$m['datetimep'];

if($valu!=""){
		$hopv='25';
$valur='';
$commentchunk='<div style="margin:0;padding:0;color:#808080;padding-bottom:9px;"><a hc="" href="/'.$udusername.'">'.$uo_fn.'</a></div><div style="display:block;margin:0;padding:0;color:#333333;position:relative;">

'.$valu.'

</div>';
}
else{
		$hopv='4';
$valur='';
$commentchunk='<div style="margin:0;padding:0;color:#808080;"><a hc="" href="/'.$udusername.'">'.$uo_fn.'</a> shared <div class="llb fwn" style="display:inline-block;">'.$prefix.' <div class="emav" onclick="return false();">status update</div>.</div></div>';	
}

//aca va delete post if uidv==cuidv - acaso yo puedo borrar lo que otros compartan que sea mio ??
if($ud==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removep2v_n(\''.$myar['sbid'].'\',\''.$ud.'\','.$x.');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"  ></div></div>';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$myar['sbid'].'\',\''.$ud.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$myar['sbid'].'\',\''.$ud.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';
}
$dr[$x]=$faddo;












$uti=sb_user($myar['id']);


$body=$myar['body'];
$id=$myar['id'];
$sbid=$pic;

$r2v=mysql_query("SELECT * FROM notes_pics WHERE noteid='$sbid' AND visibility='v' AND id='$id' ORDER BY datetimep ASC LIMIT 1");
$c=mysql_num_rows($r2v);
if($c>0){
while($m2v=mysql_fetch_array($r2v)){
$rep=$m2v['aid'];

$aid=$m2v['aid'];

$dpic=$m2v['s1'];	
$caption=$m2v['caption'];

$replace='<img src="/'.$id.'/pics/'.$dpic.'" style="max-height: 90px;max-width: 90px;display:block;">';

$needle='&lt;photo id="'.$aid.'" /&gt;';

$pos = strpos($body,$needle);
if ($pos !== false) {
    $body = substr_replace($body,$replace,$pos,strlen($needle));
}
else{
	$body=$body.$replace;
}

$body_img=$replace;

}

$r2v=mysql_query("SELECT * FROM notes_pics WHERE noteid='$sbid' AND visibility='v' AND id='$id' ORDER BY datetimep ASC LIMIT 1,1000");
while($m2v=mysql_fetch_array($r2v)){
    $aid=$m2v['aid'];
    $needle='&lt;photo id="'.$aid.'" /&gt;';

    $replace='';
    
    $pos = strpos($body,$needle);
    if ($pos !== false) {
        $body = substr_replace($body,$replace,$pos,strlen($needle));
    }  
}

if($caption==''){
$w=$body;
foreach($allowed_sbeditor as $k=>$v){
$w=str_replace($v,"",$w);
}

$w=strip_tags($w);
$w=str_replace(' <','',$w);
$w=str_replace('<','',$w);
$w=str_replace('>','',$w);
$wl=strlen($w);
if($wl>91){
$w=substr($w,0,91);
$w.='...';
}

$desc=$w;

}
else{
$desc=$caption;
$wl=strlen($desc);
if($wl>91){
$desc=substr($desc,0,91);
$desc.='...';
}
}
}
else{
$body_img='';
$w=$body;
foreach($allowed_sbeditor as $k=>$v){
$w=str_replace($v,"",$w);
}

$w=strip_tags($w);
$w=str_replace(' <','',$w);
$w=str_replace('<','',$w);
$w=str_replace('>','',$w);
$wl=strlen($w);
if($wl>297){
$w=substr($w,0,297);
$w.='...';
}

$desc=$w;

}

$descm=$myar['body'];
$w=$descm;

foreach($allowed_sbeditor as $k=>$v){
$w=str_replace($v,"",$w);
}

$w=strip_tags($w);
$w=str_replace(' <','',$w);
$w=str_replace('<','',$w);
$w=str_replace('>','',$w);
$wl=strlen($w);
if($wl>500){
$w=substr($w,0,500);
$w.='...';
}


$descm=$w;


$note_title=$myar['title'];
$flm=strtolower($uti['fullname']);
$flm=space_to_dash($flm);
$note_titlem=space_to_dash($note_title);
$note_titlem=preg_replace('/[^\p{L}-]/', '', $note_titlem);

$pnote_d='<div style="border-left: 2px solid rgb(204, 204, 204);" class="plm"><div class="fsm fwn fcg lb"><div><a href="/notes/'.$flm.'/'.$note_titlem.'/'.$sbid.'" style="font-weight:bold!important;">'.$note_title.'</a></div><div class="mts">'.$desc.'</div><div class="lb">By: <a hc="" href="/'.$uti['username'].'">'.$uti['fullname'].'</a></div></div></div>';

if($body_img==''){
$note_d=$pnote_d;
}
else{

$note_d='<div class="clearfix"><a style="margin-right: 10px;" class="lfloat" href="/notes/'.$flm.'/'.$note_titlem.'/'.$sbid.'">'.$body_img.'</a>'.$pnote_d.'</div>';
	
}

$sharef='show_msg_dialogs_note(\''.$uti['id'].'\',\''.$myar['sbid'].'\',\''.$uti['fullname'].'\',\''.$descm.'\',\''.$myar['title'].'\',\''.$x.'\');';
$sharef='&nbsp;&#183;&nbsp;<span class="friendslink3v" title="Post this on your profile." onclick="'.$sharef.'">Share</span>';

$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr>';

	$fv='v';
	$pdl='78';
	$pdlv='78';
	$wrapfc='v';
	$wop='32';
	$wopv='10';
	$hop='32';

	$tmr='35';
	$posre='position:relative;top:-6px;';
	$posre2='position:relative;top:-1px;';
	
	$likeido=$likeid;

$dr[$x].='<td style="width:50px;padding-left:16px;padding-right:2px;"><div style="margin:0;padding:0;position:relative;top:-3px;"><a href="/'.$udusername.'" class="andbl"><img src="/'.$ud.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></div></td>';

$ltype="shared_notes";

$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}


$dr[$x].='
<td>
<table style="'.$posre.'"><tr><td style="vertical-align:top;text-align:left;padding-left:4px;" class="friendslink">'.$commentchunk.'</td></tr></table>
<tr><td colspan="2">
<table style="margin:0;padding:0;padding-left:'.$pdl.'px;position:relative;top:0px;width:490px;vertical-align:top;margin-top:-10px;" cellspacing="0" cellpadding="0">
<tr><td style="border:0;border-top:0px solid rgb(233,233,233);padding-left:0px;padding-top:0px;vertical-align:top;">
<div style="display:block;margin:0;padding:0;margin-left:0px;margin-top:3px;color:gray;">
'.$note_d.'
</div>
</td></tr>

<tr>
<td class="story_foot_td" style="">
<div style="margin:0;padding:0;margin-left:0px;margin-top:3px;margin-bottom:3px;" class="lbl inlineBlock">
'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment"style="display:inline-block;">Comment</span>'.$sharef.'&nbsp;&#183;&nbsp;<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td($m['datetimep']).'</abbr>
</div>';

$ltypev="shares";
$sbid=$m['sbid'];

$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$m['id'];

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';

$dr[$x].='<div class="foot_box foot_box_margin">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

$ltype="shared_notes";

$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count'];
if($count!='0'){$count=$count;}else{unset($count);}
}


$vrt=0;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM commentsv WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];

$elemid=$m['elemid'];

$counter=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM shares WHERE id2='$uo' AND elemid='$elemid' AND whatisit='shared_notes' AND visibility='v'"));
$counter=$counter['counter'];

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;  


  
  	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}

$dr[$x].='<div style="width:394px;margin:0;padding:0;position:relative;top:0px;margin-bottom:0px;">';
if(isset($count)){
	
$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$ud;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

include("stories/likes_this.php");

if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\'; bordercito(\''.$x.'\');';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}
if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$dr[$x].='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;position:relative;margin-left:'.$pdlv.'px;" class="foot_box_inner" id="moremsgv'.$x.'">




<div class="msgiconito" style="position:absolute;left:8px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:22px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$ud.'\',\''.$likeid.'\',1);'.$cont.' document.getElementById(\'rofm'.$x.'\').style.display=\'block\';" id="moremsg'.$x.'">View all '.$vrt.' comments</span><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$ud.'\',\''.$likeid.'\',2)" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#666666;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div></div>';	
}

if(!isset($haslikes) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}


$r11=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m11=mysql_fetch_array($r11)){
$uidpic=$m11['profilepict'];	
}


$thefabtext=$likeid;
$value=$ud;


$nml=$pdlv;
$nmlf='';

$two_c=2;

$for_photo='';
include("load_2_comments.php");

include("comment_box.php");


$dr[$x].='</div>';

$dr[$x].='</div>'; //foot box closure

$dr[$x].'</td></tr>';

$dr[$x].='</td></tr></table></td></tr></table>';

$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure


if(!isset($don)){

if($pause=='t'){unset($dr[$x]); unset($bydate[$x]); unset($topa[$x]); $x--; unset($pause);}
$x++;
}
else{$x=$don; if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);} unset($don);}

}
$y++;	
}
}
//if($y=='26'){break;}
}

}

}


















//commented on a photo

if(!isset($justlinks)){



unset($kill);

$uidpc='comments';

if(!isset($wall)){
$mn=30;
$mnv=5;	
}

$dq="(SELECT * FROM comments WHERE $dtc<='$rnowu' AND $dtc>'$tagou' AND FIND_IN_SET(id,'$uid_friends_comma_qs')>0 AND id2!='$uid' GROUP BY elemid ORDER BY datetimep DESC LIMIT $mn)";

$dq.="UNION (SELECT * FROM comments WHERE $dtc<='$rnowu' AND $dtc<'$tagou' AND FIND_IN_SET(id,'$uid_friends_comma_qs')>0 AND id2!='$uid' GROUP BY elemid ORDER BY datetimep DESC LIMIT $mnv)";

$r=mysql_query("$dq");
$c=mysql_num_rows($r);

while($m=mysql_fetch_array($r)){
$value=$m['id'];
$uidv=$value;

$udv=$m['id'];
$uov=$m['id2'];
$commentid=$m['sbid'];

$r2=mysql_query("SELECT * FROM registered WHERE id='$udv'");
while($m2=mysql_fetch_array($r2)){
$uo=$m2['id'];

$uo_un=$m2['username'];	
if($uo_un==""){
$uo_un=$uo;	
}
$uo_pic=$m2['profilepict'];
$whofullname=$m2['fullname'];
}

$r2=mysql_query("SELECT * FROM registered WHERE id='$uov'");
while($m2=mysql_fetch_array($r2)){
$udvv=$m2['id'];

$udvv_un=$m2['username'];	
if($udvv_un==""){
$udvv_un=$udvv;	
}
$whompic=$m2['profilepict'];
$whomfullname=$m2['fullname'];
}

$comment=$m['comment'];
$sbid=$m['elemid'];

${'des'.$x}=$sbid;
${'date'.$x}=$m['datetimep'];
$jov=$x-1;
$jovv=0;
while($jovv<=$jov){
if(isset(${'des'.$jovv}) && ${'des'.$jovv}==${'des'.$x}){if(tdpo(${'date'.$x},${'date'.$jovv})=='f'){$don=$x; $x=$jovv;} else{$kill='t';}}	

$jovv++;
}

if(isset($kill)){unset($kill);}
else{

unset($photoid);
$udvvp=$udvv.'p';
$r2=mysql_query("SELECT * FROM media WHERE id='$udvv' AND sbid='$sbid' AND visibility='v' AND vids='' $media_qf");
$c2=mysql_num_rows($r2);
while($m2=mysql_fetch_array($r2)){
$pic=$m2['pics'];
$picm=$m2['picsa'];	
$albt=$m2['albumn'];
$albtv=$m2['albumid'];
$desc=$m2['descr'];
$likeid=$m2['sbid'];
$photoid=$m2['sbid'];
$pin=$m2['pin'];
$target_path='../users/'.$udvv.'/pics/'.$picm;
$thesize=getimagesize($target_path);
$minipw=$thesize[0];
$miniph=$thesize[1];
$tp='';
}
if(!isset($photoid)){$kill2='';}
if(isset($kill2)){unset($kill2);}
else{

$wp_table='tags';
$likeid=$photoid;
$owner_c=$udvv;
include("stories/with_plugin.php");

if($desc==""){
if($with!=""){
$withv=' was with '.$with;
}
else{
$withv='';	
}
$tr=0;
$with='';
}
else{
if($with!=""){
$with=' &#151; with '.$with;
}
else{
$with="";
}
$withv='';
}

$prefix='a';
if($udvv==$uo){
$or=mysql_query("SELECT * FROM registered where id='$udvv'");
while($oms=mysql_fetch_array($or)){
$gender=$oms['gender'];
if($gender='1'){$prefix='her own';}
else{$prefix='his own';}	
}
}

$pause='';
		$whatisit_h="comment";
$cag=$commentid;
include("set_pause.php");


$sharef='show_msg_dialogs(\''.$albtv.'\',\'shared_photo\',\''.$udvv.'\',\''.$photoid.'\',\''.$tp.'\','.$x.',\'\',\'\',\'\',\''.$pin.'\')';
$bydate[$x]=$m['datetimep'];

if(!in_array($udvv,$uid_friends) && $uid!=$value){$iffriend='none'; $iffriendv=''; $iffriendvv='default;';}else{$iffriend='inline-block'; $iffriendv='like'; $iffriendvv='pointer;';}
$thewidthl=getimagesize("../users/".$udvv."/pics/".$pic); $swidth=$thewidthl[0]; $sheight=$thewidthl[1];

$r2=mysql_query("SELECT * FROM media WHERE albumid='$albtv' AND id='$udvv' AND pics='$pic'");
while($m2=mysql_fetch_array($r2)){
$gnorder=$m2['norder'];	

if($m2['albumn']=="Profile Pictures" || $m2['albumn']=="Wall Photos" || $m2['albumn']=="Videos" || $m2['albumn']=="Photos"){
$did=$m2['sbid'];
$albummid=$m2['albumid'];
$or=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM media WHERE id='$udvv' AND albumid='$albumid' AND sbid!='$did' AND visibility='v' AND norder<$gnorder $media_qf"));	
$gnorder=$or['c']+1;
}


}

	$mr=mysql_query("SELECT * FROM media WHERE albumid='$albtv' AND id='$udvv' AND visibility='v' $media_qf");
$tal=mysql_num_rows($mr);

if($pin==1){
    $dtext='photo';   
}else{
    $dtext='pin';
}

$commentchunk='<div style="margin:0;padding:0;color:#808080;"><a hc="" href="/'.$uo_un.'">'.$whofullname.'</a> commented on <div class="llb fwn" style="display:inline-block;">'.$prefix.' <div class="emav" onclick="getnext(\''.$pic.'\',\''.$udvv.'\',\''.$albtv.'\',\''.$swidth.'\',\''.$sheight.'\',\''.$gnorder.'\',\''.$tal.'\',\'r\',\'f\',\'\',\'\',\'\');">'.$dtext.'</div>.</div></div>';

$ltype="photo";

$faddo='<div data-type="photo_comment" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" data-uidv="'.$value.'" id="mtablew'.$x.'"> 
<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$commentid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$commentid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';

$dr[$x]=$faddo;

$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr>';

if($prefix!="a"){
$fv='v';
$pdl='15';
$pdlv='77';
$wrapfc='';
$wop='50';
$wopv='6';
$hop='50';
$hopv='15';
$tmr='30';
$special_margin="0px;";
$posre='position:relative;left:-6px;top:-8px;';
$posre2='';
$dr[$x].='<td style="width:0px;padding-left:16px;"></td>';
	}

else{
	$fv='';
	$pdl='78';
	$pdlv='117';
	$wrapfc='v';
	$wop='32';
	$wopv='8';
	$hop='32';
	$hopv='10';
	$tmr='35';
	$special_margin="-35px;";
	$posre='position:relative;top:-7px;';
	$posre2='position:relative;top:-5px;';
$dr[$x].='<td style="width:50px;padding-left:16px;padding-right:2px;"><div style="margin:0;padding:0;position:relative;top:-3px;"><a href="/'.$uo_un.'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></div></td>';
}

if($iffriend=='none'){$like='';}
else{
$ltype="photo";

$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
}
$dr[$x].='
<td>
<table style="'.$posre.'"><tr><td style="vertical-align:top;" class="friendslink">'.$commentchunk.'</td></tr></table>
<tr><td colspan="2">
<table style="margin:0;padding:0;padding-left:'.$pdl.'px;position:relative;top:0px;width:490px;vertical-align:top;margin-top:'.$special_margin.'" cellspacing="0" cellpadding="0">
<tr><td style="border:0;border-top:1px solid rgb(233,233,233);padding-top:'.$hopv.'px;vertical-align:top;width:'.$wop.'px;">
<a href="/'.$udvv_un.'">
<img src="/'.$udvv.'/pics/'.$whompic.'" style="height:'.$hop.'px;width:'.$wop.'px;">
</a>
</td>
<td style="border:0;border-top:1px solid rgb(233,233,233);padding-top:14px;vertical-align:top;">
<div style="display:inline-block;margin:0;padding:0;vertical-align:top;margin-left:'.$wopv.'px;color:#808080;'.$posre2.'" class="friendslink"><a hc="" href="/'.$udvv_un.'">'.$whomfullname.'</a>'.$withv.'</div>
</div>
<div style="display:block;margin:0;padding:0;margin-left:6px;color:#808080;">
<div style="display:inline-block;margin:0;padding:0;">
'.$desc.'</div>'.$with.'
</div>
<div style="display:block;margin:0;padding:0;margin-left:7px;margin-top:9px;">';

$thewidthl=getimagesize("../users/".$udvv."/pics/".$pic); $swidth=$thewidthl[0]; $sheight=$thewidthl[1];
$r2=mysql_query("SELECT * FROM media WHERE albumid='$albtv' AND id='$udvv' AND pics='$pic'");
while($m2=mysql_fetch_array($r2)){
$gnorder=$m2['norder'];

if($m2['albumn']=="Profile Pictures" || $m2['albumn']=="Wall Photos" || $m2['albumn']=="Videos" || $m2['albumn']=="Photos"){
$did=$m2['sbid'];
$albumid=$m2['albumid'];
$or=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM media WHERE id='$udvv' AND albumid='$albumid' AND sbid!='$did' AND visibility='v' AND norder<$gnorder $media_qf"));	
$gnorder=$or['c']+1;
}



	
$pics_a=$m2['picsa'];
$vids_c=$m2['vids'];
$vidshd_c=$m2['vidshd'];

$swidth_c=$m2['videow'];
$sheight_c=$m2['videoh'];

$pin=$m2['pin'];


$thewidthm=getimagesize("../users/".$udvv."/pics/".$pics_a); $mwidth=$thewidthm[0]; $mheight=$thewidthm[1];

$es1="t";
$cpw=347;

$owner_c=$udvv;
$albumid_c=$albtv;

$toeval="m2";

$wk='r';
include("photo_crop.php");
}

$dr[$x].=$secho;

if($pin==1){
    $dclass='imgsp';   
}else{
    $dclass='pinsp';
}

$dr[$x].='
</div>
</td></tr>
<tr><td></td>
<td class="friendslink">
<div style="margin:0;padding:0;margin-left:6px;margin-top:3px;">
<a href="/'.$udvv_un.'/photos?album='.$albtv.'">'.$albt.'</a>
</div>
</td>
</tr>
<tr><td style="text-align:right;"><div class="'.$dclass.'" style="cursor:default;position:relative;margin-top:3px;top:-2px;right:2px;"></div></td>
<td class="story_foot_td" style="">
<div style="margin:0;padding:0;margin-left:6px;margin-top:3px;"><div class="lbl inlineBlock">'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment"style="display:'.$iffriend.'">Comment</span><span style="position:relative;top:0px;left:0px;margin-right:2px;margin-left:2px;display:">&#183;</span><span class="friendslink3v" title="Post this on your profile." onclick="'.$sharef.'">Share</span>&nbsp;&#183;&nbsp;<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td($m['datetimep']).'</abbr></div>';


$peditablev="f";	


$albumn=$albt;
$albumid=$albtv;

$ltypev="media";
$sbid=$likeid;


$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$uo;

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';


$dr[$x].='<div class="foot_box foot_box_margin">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

$ltype="photo";
$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count']; 

if($count!='0'){$count=$count;}else{unset($count);}
}


$vrt=0;
$uidvpc=$udvv.'pc';
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM comments WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];
  
  
$counter=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM shares WHERE id2='$udvv' AND elemid='$likeid' AND whatisit='shared_photo' AND visibility='v'"));
$counter=$counter['counter'];

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;  
  
  	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}

$dr[$x].='<div style="width:344px;margin:0;padding:0;position:relative;top:0px;margin-bottom:0px;">';
if(isset($count)){
	
$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$udvv;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

include("stories/likes_this.php");

if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\'; bordercito(\''.$x.'\');';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}
if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$dr[$x].='<div style="background:#edeff4;width:349px;padding:3px;border-top:0px solid #ffffff;position:relative;margin-left:'.$pdlv.'px;" class="foot_box_inner" id="moremsgv'.$x.'">


<div class="msgiconito" style="position:absolute;left:8px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:22px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$udvv.'\',\''.$likeid.'\',1,\'f'.$fv.'\');'.$cont.' document.getElementById(\'rofm'.$x.'\').style.display=\'block\';" id="moremsg'.$x.'">View all '.$vrt.' comments</span><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$udvv.'\',\''.$likeid.'\',2,\'f'.$fv.'\')" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#666666;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div></div>';	
}

if(!isset($haslikes) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}


$r11=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m11=mysql_fetch_array($r11)){
$uidpic=$m11['profilepict'];	
}

$thefabtext=$likeid;

$value=$udvv;

$small_box_width='';

$nml=$pdlv;

$nmlf='f'.$fv;
$nmlfv='f';

$two_c=2;

$for_photo='t';

include("load_2_comments.php");

$small_box_width='';
include("comment_box.php");



$dr[$x].='</div>';



if(!isset($don)){




$dr[$x].='</div>'; //foot box closure

$dr[$x].='</div>
</td></tr>
</table>
</td></tr></table>';

$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure
if($pause=='t'){unset($dr[$x]); unset($bydate[$x]); unset($topa[$x]); $x--; unset($pause);}
$x++;
}
else{$x=$don; if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);} unset($don);}
}
$y++;	
if(isset($photoid)){unset($photoid);}
}
//if($y=='26'){break;}
}







unset($small_box_width);





//likes a photo, repinned a photo


if(!isset($justlinks)){

unset($kill);

if(!isset($wall)){
$mn=50;
$mnv=50;	
}

$dq="(SELECT sbid,id,id2,likes,likeid,albumid,what,datetimep,'table1' as t FROM likew WHERE what='photo' AND $dtc<='$rnowu' AND $dtc>'$tagou' AND FIND_IN_SET(id2,'$uid_friends_comma_qs_me')>0 AND id!='$uid' ORDER BY datetimep DESC LIMIT $mn) UNION (SELECT sbid,id,id2,repins,likeid,albumid,what,datetimep,'table2' as t FROM repinw WHERE what='photo' AND repins='1' AND $dtc<='$rnowu' AND $dtc>'$tagou' AND FIND_IN_SET(id2,'$uid_friends_comma_qs_me')>0 AND id!='$uid' ORDER BY datetimep DESC LIMIT $mn)";

$dq.="UNION (SELECT sbid,id,id2,likes,likeid,albumid,what,datetimep,'table1' as t FROM likew WHERE what='photo' AND $dtc<'$tagou' AND FIND_IN_SET(id2,'$uid_friends_comma_qs_me')>0 AND id!='$uid' ORDER BY datetimep DESC LIMIT $mnv) UNION (SELECT sbid,id,id2,repins,likeid,albumid,what,datetimep,'table2' as t FROM repinw WHERE what='photo' AND repins='1' AND $dtc<'$tagou' AND FIND_IN_SET(id2,'$uid_friends_comma_qs_me')>0 AND id!='$uid' ORDER BY datetimep DESC LIMIT $mnv)";

$r=mysql_query("$dq");
$c=mysql_num_rows($r);

while($m=mysql_fetch_array($r)){
$value=$m['id2'];
$udv=$m['id2'];
$uov=$m['id'];

$piclikeid=$m['likeid'];



$r2=mysql_query("SELECT * FROM registered WHERE id='$udv'");
while($m2=mysql_fetch_array($r2)){
$uo=$m2['id'];

$uo_un=$m2['username'];	
if($uo_un==""){
$uo_un=$uo;	
}
$uo_pic=$m2['profilepict'];
$whofullname=$m2['fullname'];
}

$r2=mysql_query("SELECT * FROM registered WHERE id='$uov'");
while($m2=mysql_fetch_array($r2)){
$udvv=$m2['id'];

$udvv_un=$m2['username'];	
if($udvv_un==""){
$udvv_un=$udvv;	
}
$whompic=$m2['profilepict'];
$whomfullname=$m2['fullname'];
}

$comment="";
$pic=$m['likeid'];
$albname=$m['albumid'];


//se queda con el like mas nuevo en la misma foto de entre todos los amigos :)
${'date'.$x}=$m['datetimep'];
${'des'.$x}=$pic;
$jov=$x-1;
$jovv=0;
while($jovv<=$jov){
if(isset(${'des'.$jovv}) && ${'des'.$jovv}==${'des'.$x}){if(tdpo(${'date'.$x},${'date'.$jovv})=='f'){$don=$x; $x=$jovv;} else{$kill='t';}}	//se queda con lo mas nuevo, ya sea un like o un comment

$jovv++;
}


if(isset($kill)){unset($kill);}
else{

$udvvp=$udvv.'p';

unset($photoid);
$r2=mysql_query("SELECT * FROM media WHERE id='$udvv' AND sbid='$pic' AND visibility='v' AND vids='' $media_qf");
while($m2=mysql_fetch_array($r2)){
$picm=$m2['picsa'];	
$picv=$m2['pics'];
$albt=$m2['albumn'];
$albtv=$m2['albumid'];
$desc=$m2['descr'];
$likeid=$m2['sbid'];
$photoid=$m2['sbid'];
$pin=$m2['pin'];
$target_path='../users/'.$udvv.'/pics/'.$picm;
$thesize=getimagesize($target_path);
$minipw=$thesize[0];
$miniph=$thesize[1];
$tp='';
}


$value=$udvv;

if(!isset($photoid)){$kill2='';}
if(isset($kill2)){unset($kill2);}
else{

$wp_table='tags';
$likeid=$photoid;
$owner_c=$udvv;
include("stories/with_plugin.php");

if($desc==""){
if($with!=""){
$withv=' was with '.$with;
}
else{
$withv='';	
}
$tr=0;
$with='';
}
else{
if($with!=""){
$with=' &#151; with '.$with;
}
else{
$with="";
}
$withv='';
}

$prefix='a';
if($udvv==$uo){
$or=mysql_query("SELECT * FROM registered where id='$udvv'");
while($oms=mysql_fetch_array($or)){
$gender=$oms['gender'];
if($gender=='1'){$prefix='her own';}
else{$prefix='his own';}	
}
}

$pause='';

		$whatisit_h='shared_photo';
$cag=$piclikeid;

include("set_pause.php");



$sharef='show_msg_dialogs(\''.$albtv.'\',\'shared_photo\',\''.$udvv.'\',\''.$photoid.'\',\''.$tp.'\','.$x.',\'\',\'\',\'\',\''.$pin.'\')';
$bydate[$x]=$m['datetimep'];

if(!in_array($udvv,$uid_friends) && $uid!=$udvv){$iffriend='none'; $iffriendv=''; $iffriendvv='default;';}else{$iffriend='inline-block'; $iffriendv='like'; $iffriendvv='pointer;';}

$thewidthl=getimagesize("../users/".$udvv."/pics/".$picv); $swidth=$thewidthl[0]; $sheight=$thewidthl[1];
$r2=mysql_query("SELECT * FROM media WHERE albumid='$albtv' AND id='$udvv' AND pics='$picv'");
while($m2=mysql_fetch_array($r2)){
$gnorder=$m2['norder'];	


if($m2['albumn']=="Profile Pictures" || $m2['albumn']=="Wall Photos" || $m2['albumn']=="Videos" || $m2['albumn']=="Photos" || $m2['albumn']=="Pins" || $m2['albumn']=="Wall Pins"){
$did=$m2['sbid'];
$albumid=$m2['albumid'];
$or=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM media WHERE id='$udvv' AND albumid='$albumid' AND sbid!='$did' AND visibility='v' AND norder<$gnorder $media_qf"));	
$gnorder=$or['c']+1;
}


}

	$mr=mysql_query("SELECT * FROM media WHERE albumid='$albtv' AND id='$udvv' AND visibility='v' $media_qf");
$tal=mysql_num_rows($mr);

if($pin==1){
    $dtext='photo';   
}else{
    $dtext='pin';
}

if($m['t']==1){
    $dtextv='likes';
}else{
    $dtextv='repinned';   
}

$commentchunk='<div style="margin:0;padding:0;color:#808080;"><a hc="" href="/'.$uo_un.'">'.$whofullname.'</a> '.$dtextv.' <div class="llb fwn" style="display:inline-block;">'.$prefix.' <div class="emav" onclick="getnext(\''.$picv.'\',\''.$udvv.'\',\''.$albtv.'\',\''.$swidth.'\',\''.$sheight.'\',\''.$gnorder.'\',\''.$tal.'\',\'r\',\'f\',\'\',\'\',\'\');">'.$dtext.'</div>.</div></div>';

$ltype="photo";

$faddo='<div data-type="photo_like" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefs(\''.$piclikeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="report(\''.$piclikeid.'\',\''.$value.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>
';
$saddo='';

$dr[$x]=$faddo;

$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr>';

if($prefix!="a"){
$fv='v';
$pdl='15';
$pdlv='77';
$wrapfc='';
$wop='50';
$wopv='6';
$hop='50';
$hopv='15';
$tmr='30';
$special_margin="0px;";
$posre='position:relative;left:-6px;top:-8px;';
$posre2='';
$dr[$x].='<td style="width:0px;padding-left:16px;"></td>';
	}

else{
	$fv='';
	$pdl='78';
	$pdlv='117';
	$wrapfc='v';
	$wop='32';
	$wopv='8';
	$hop='32';
	$hopv='10';
	$tmr='35';
	$special_margin="-35px;";
	$posre='position:relative;top:-7px;';
	$posre2='position:relative;top:-5px;';
$dr[$x].='<td style="width:50px;padding-left:16px;padding-right:2px;"><div style="margin:0;padding:0;position:relative;top:-3px;"><a href="/'.$uo_un.'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></div></td>';
}

if($iffriend=='none'){$like='';}
else{
$ltype='photo';

$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
}

$dr[$x].='
<td>
<table style="'.$posre.'"><tr><td style="vertical-align:top;" class="friendslink">'.$commentchunk.'</td></tr></table>
<tr><td colspan="2">
<table style="margin:0;padding:0;padding-left:'.$pdl.'px;position:relative;top:0px;width:490px;vertical-align:top;margin-top:'.$special_margin.'" cellspacing="0" cellpadding="0">
<tr><td style="border:0;border-top:1px solid rgb(233,233,233);padding-top:'.$hopv.'px;vertical-align:top;width:'.$wop.'px;">
<a href="/'.$udvv_un.'">
<img src="/'.$udvv.'/pics/'.$whompic.'" style="height:'.$hop.'px;width:'.$wop.'px;">
</a>
</td>
<td style="border:0;border-top:1px solid rgb(233,233,233);padding-top:14px;vertical-align:top;">
<div style="display:inline-block;margin:0;padding:0;vertical-align:top;margin-left:'.$wopv.'px;color:#808080;'.$posre2.'" class="friendslink"><a hc="" href="/'.$udvv_un.'">'.$whomfullname.'</a>'.$withv.'</div>
</div>
<div style="display:block;margin:0;padding:0;margin-left:6px;color:#808080;">
<div style="display:inline-block;margin:0;padding:0;">
'.$desc.'</div>'.$with.'
</div>
<div style="display:block;margin:0;padding:0;margin-left:7px;margin-top:9px;">';
$thewidthl=getimagesize("../users/".$udvv."/pics/".$picv); $swidth=$thewidthl[0]; $sheight=$thewidthl[1];
$r2=mysql_query("SELECT * FROM media WHERE albumid='$albtv' AND id='$udvv' AND pics='$picv'");
while($m2=mysql_fetch_array($r2)){
$gnorder=$m2['norder'];	
$pics_a=$m2['picsa'];

if($m2['albumn']=="Profile Pictures" || $m2['albumn']=="Wall Photos" || $m2['albumn']=="Videos" || $m2['albumn']=="Photos" || $m2['albumn']=="Pins" || $m2['albumn']=="Wall Pins"){
$did=$m2['sbid'];
$albumid=$m2['albumid'];
$or=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM media WHERE id='$udvv' AND albumid='$albumid' AND sbid!='$did' AND visibility='v' AND norder<$gnorder $media_qf"));	
$gnorder=$or['c']+1;
}

$thewidthm=getimagesize("../users/".$udvv."/pics/".$pics_a); $mwidth=$thewidthm[0]; $mheight=$thewidthm[1];

$es1="t";
$cpw=347;

$owner_c=$udvv;
$albumid_c=$albtv;

$pin=$m2['pin'];

$toeval="m2";
$wk='r';
include("photo_crop.php");
}
$dr[$x].=$secho;

if($pin==1){
    $dclass='imgsp';   
}else{
    $dclass='pinsp';
}

if($m['t']==2){
    $dclass='repinsp';
}


$dr[$x].='</div>
</td></tr>
<tr><td></td>
<td class="friendslink">
<div style="margin:0;padding:0;margin-left:6px;margin-top:3px;">
<a href="/'.$udvv_un.'/photos?album='.$albtv.'">'.$albt.'</a>
</div>
</td>
</tr>
<tr><td style="text-align:right;"><div class="'.$dclass.'" style="cursor:default;position:relative;margin-top:3px;top:-2px;right:2px;"></div></td>
<td class="story_foot_td" style="">
<div style="margin:0;padding:0;margin-left:6px;margin-top:3px;display:inline-block;"><div class="lbl inlineBlock">'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment"style="display:'.$iffriend.'">Comment</span><span style="position:relative;top:0px;left:0px;margin-right:2px;margin-left:2px;display:">&#183;</span><span class="friendslink3v" title="Post this on your profile." onclick="'.$sharef.'">Share</span>&nbsp;&#183;&nbsp;<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td($m['datetimep']).'</abbr></div></div>';


$peditablev="f";	


$albumn=$albt;
$albumid=$albtv;

$ltypev="media";
$sbid=$likeid;


$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$uo;

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';


$dr[$x].='<div class="foot_box foot_box_margin">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;

$ltype="photo";
$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {

$count=$m10['count'];
if($count!='0'){$count=$count;}else{unset($count);}

}


$vrt=0;
$uidvpc=$udvv.'pc';
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM comments WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];
  
  
$counter=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM shares WHERE id2='$udvv' AND elemid='$likeid' AND whatisit='shared_photo' AND visibility='v'"));
$counter=$counter['counter'];

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top*10;}

$topa[$x]=$top;  
  
  	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}

$dr[$x].='<div style="width:344px;margin:0;padding:0;position:relative;top:0px;margin-bottom:0px;">';
if(isset($count)){
	
$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$udvv;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{
$tr=0;
$with='';	
$hc='hidden_sb';
}

include("stories/likes_this.php");

if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\'; bordercito(\''.$x.'\');';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}
if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$dr[$x].='<div style="background:#edeff4;width:349px;padding:3px;border-top:0px solid #ffffff;position:relative;margin-left:'.$pdlv.'px;" class="foot_box_inner" id="moremsgv'.$x.'">


<div class="msgiconito" style="position:absolute;left:8px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:22px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$udvv.'\',\''.$likeid.'\',1,\'f'.$fv.'\');'.$cont.' document.getElementById(\'rofm'.$x.'\').style.display=\'block\';" id="moremsg'.$x.'">View all '.$vrt.' comments</span><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$udvv.'\',\''.$likeid.'\',2,\'f'.$fv.'\')" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#666666;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div></div>';	
}

if(!isset($haslikes) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}


$r11=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m11=mysql_fetch_array($r11)){
$uidpic=$m11['profilepict'];	
}

$thefabtext=$likeid;
$value=$udvv;

$small_box_width='';

$nml=$pdlv;

$nmlf='f'.$fv;
$nmlfv='f';


$two_c=2;

$for_photo='t';

include("load_2_comments.php");

include("comment_box.php");



$dr[$x].='</div>'; //foot box closure


$dr[$x].='</td></tr></table></td></tr></table>';

$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure


if(!isset($don)){
if($pause=='t'){unset($dr[$x]); unset($bydate[$x]); unset($topa[$x]); $x--; unset($pause);}
$x++;
}
else{$x=$don; if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);} unset($don);}
}
$y++;	
if(isset($photoid)){unset($photoid);}
//if($y=='26'){break;}
}

}

}

}




unset($small_box_width);

$uidv=$ruidv; //recorded $uidv


if(isset($_POST['lbd'])){ //older stories
$lbdp=$_POST['lbd'];

foreach($bydate as $k=>$v){
if(!isset($topa[$k])){
$topa[$k]='0'; // are now friends detectado solamente por ahora
}
}

if(!isset($wall) AND !isset($clist)){
$r=mysql_query("SELECT * FROM optionsv WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$sortoption=$m['sort_option'];
}
}

if(!isset($sortoption)){
$sortoption=1; //always by date for wall and list :)
}

if($sortoption=="0"){
//take into consideration date value
arsort($topa);
}
else if($sortoption=="1"){
//do nothing, without sorting it would come date wise in theory
}

$tax=array();
foreach($topa as $k=>$v){

$aval=tod($bydate[$k]);
	$ax=0;
while($ax<=$diecinueve){
	
	if(strpos($aval,$tdays[$ax])!==false){
	if(!isset($tax[$ax])){$tax[$ax]=1;}
	else{$tax[$ax]++;}
	}
	
	$ax++;
	}
}

	$ax=0;
while($ax<=$diecinueve){
if(!isset($tax[$ax])){$tax[$ax]=0;}
$ax++;	
}

ksort($tax);

if(isset($wall)){
$ajoker=9999; //ridiculous limit for stories of the day on a single wall	
}
else{
$ajoker=100; //number of limited stories for today - onwards it grabs the remainder of possibilities merged for each day
}

$joker=$ajoker+1;

$corresponde=array();
$corresponde[0]=$joker;

foreach($tax as $k=>$v){
	
	$pjoker=$ajoker;
	$kv=$k+1;
	
	if($v>$pjoker){
	$corresponde[$kv]=$joker;
	}
	else{
	$corresponde[$kv]=$joker-$v+$pjoker;
	$joker=$corresponde[$kv];
	}

}



$montana=array();

$dax=array();

foreach($topa as $key=>$value){
$aval=tod($bydate[$key]);

$ax=0;
while($ax<=$diecinueve){

if(strpos($aval,$tdays[$ax])!==false){

foreach($axvu as $k=>$v){

foreach($v as $k2=>$v2){

$nv=$tdays[$ax].' '.$v2;

if(strpos($aval,$nv)!==false){
if(!isset($dax[$ax])){$dax[$ax]=1;}
else{$dax[$ax]++;}
if($dax[$ax]<$corresponde[$ax]){
$montana[$ax][$k][$key]=$value;	
}

}

}



}



}

$ax++;
}


}

$ax=0;
foreach($bydate as $key=>$value){
if($value<$tagou){
$montana[$veinte][3][$key]=$topa[$key];
$ax++;
if($ax==51){break;}	
}
}

ksort($montana); 

foreach($montana as &$innerArray)
{
    ksort($innerArray);
}


$lbda=array();
$papa=array();
$yx=0;
foreach($montana as $key2=> $value2){

foreach($value2 as $keyo=>$valueo){
	
foreach($valueo as $key=>$value){
$aval=$bydate[$key];

if($aval<$lbdp){
if(!isset($fbd)){
$fbd=$value;	
}
echo $dr[$key];
$yx++;
$lbda[]=$aval;
$papa[]=$key;
}

if($yx=='25'){break;}
}
if($yx=='25'){break;}
}
if($yx=='25'){break;}
}

krsort($lbda);

if(isset($fbd)){
rsort($papa);
$slak=$papa[0];

sort($lbda);
$lbd=$lbda[0];	
}

$papac=count($papa);
if($papac==0){exit();}

if($slak>$lak){$lak=$slak;}

echo'{}'.$lbd.'{}'.$lak;


include("end.php");
}
//older finishes


if(isset($_POST['lbd2'])){ //newer stories
$lbdp=$_POST['lbd2'];

foreach($bydate as $k=>$v){
if(!isset($topa[$k])){
$topa[$k]='0'; // are now friends detectado solamente por ahora
}
}

if(!isset($wall) AND !isset($clist)){
$r=mysql_query("SELECT * FROM optionsv WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$sortoption=$m['sort_option'];
}
}

if(!isset($sortoption)){
$sortoption=1; //always by date for list and wall :)
}

if($sortoption=="0"){
//take into consideration date value
arsort($topa);
}
else if($sortoption=="1"){
//do nothing, without sorting it would come date wise in theory
}

$tax=array();
foreach($topa as $k=>$v){

$aval=tod($bydate[$k]);
	$ax=0;
while($ax<=$diecinueve){
	
	if(strpos($aval,$tdays[$ax])!==false){
	if(!isset($tax[$ax])){$tax[$ax]=1;}
	else{$tax[$ax]++;}
	}
	
	$ax++;
	}
}

	$ax=0;
while($ax<=$diecinueve){
if(!isset($tax[$ax])){$tax[$ax]=0;}
$ax++;	
}

ksort($tax);

if(isset($wall)){
$ajoker=100; //ridiculous limit for stories of the day on a single wall , we don't want an expectacle running on a wall all day long
}
else{
$ajoker=100; //number of limited stories for today - onwards it grabs the remainder of possibilities merged for each day
}

$joker=$ajoker+1;

$corresponde=array();
$corresponde[0]=$joker;

foreach($tax as $k=>$v){
	
	$pjoker=$ajoker;
	$kv=$k+1;
	
	if($v>$pjoker){
	$corresponde[$kv]=$joker;
	}
	else{
	$corresponde[$kv]=$joker-$v+$pjoker;
	$joker=$corresponde[$kv];
	}

}



$montana=array();

$dax=array();

foreach($topa as $key=>$value){
$aval=tod($bydate[$key]);

$ax=0;
while($ax<=$diecinueve){

if(strpos($aval,$tdays[$ax])!==false){

foreach($axvu as $k=>$v){

foreach($v as $k2=>$v2){

$nv=$tdays[$ax].' '.$v2;

if(strpos($aval,$nv)!==false){
if(!isset($dax[$ax])){$dax[$ax]=1;}
else{$dax[$ax]++;}
if($dax[$ax]<$corresponde[$ax]){
$montana[$ax][$k][$key]=$value;	
}

}

}



}



}

$ax++;
}


}



ksort($montana); 

foreach($montana as &$innerArray)
{
    ksort($innerArray);
}

$lbda=array();
$papa=array();
$yx=0;
foreach($montana as $key2=> $value2){

foreach($value2 as $keyo=>$valueo){
	
foreach($valueo as $key=>$value){
$aval=$bydate[$key];
if($aval>$lbdp){
if(!isset($fbd)){
$fbd=$value;	
}
echo $dr[$key];
$yx++;
$lbda[]=$aval;
$papa[]=$key;
}

if($yx=='2'){break;}
}
if($yx=='2'){break;}
}
if($yx=='2'){break;}
}

krsort($lbda);

if(isset($fbd)){
rsort($papa);
$slak=$papa[0];

sort($lbda);
$lbd2 = key( array_slice( $lbda, -1, 1, TRUE ) );
$lbd2=$lbda[$lbd2];
$lbd=$lbda[0];		
}

$papac=count($papa);
if($papac==0){
//exit();
$slak="";
$lbd2="";
}

if($slak>$lak){$lak=$slak;}

echo'{}'.$lbd2.'{}'.$lak;


include("end.php");
}
//newer
?>