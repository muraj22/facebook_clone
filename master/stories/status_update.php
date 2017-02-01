<?php
if(!isset($clist)){
$nf_q="OR id2='$uidv'"; //news feed, wall query but not list
}
else{
$nf_q="";	
}

if(isset($_POST['nfp'])){
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

$text=$_POST['descriptionv'];

$uidv=$uid;

$location=$_POST['location'];

if(isset($_POST['uidv'])){
$uidv=$_POST['uidv'];
}

if($uid!=$uidv){
$privacy=1; //friends of the person where the post is being made
$privacyh="";	
}

mysql_query("INSERT INTO status (id,id2,text,location,visibility,cityc,countryc,statec,privacy,privacyh,datetimep)
VALUES ('$uid','$uidv','$text','$location','v','$statec','$countryc','$statec','$privacy','$privacyh',UNIX_TIMESTAMP())");

$likeidgen=mysql_insert_id();

$likeid=$likeidgen;
$ltype='status_update';
include("stories/like_insert.php");

$x=grsn(8);
$ix=$x;
$y=0;
$dr=array();

$dq="SELECT * FROM status WHERE sbid='$likeidgen'";
}

else{
$dq="(SELECT * FROM status as dt WHERE (FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 $nf_q) AND $dtc<='$rnowu' AND $dtc>'$tagou' AND visibility='v' $status_qf ORDER BY datetimep DESC LIMIT $mn)";

if(isset($clist)){
$dq.=" UNION(SELECT * FROM status as dt WHERE id='$uid' AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(privacy,'l',''))>0)>0 AND $dtc<='$rnowu' AND $dtc>'$tagou' AND visibility='v' $status_qf ORDER BY datetimep DESC LIMIT $mn)";	
}
/*
$ax=1;
while($ax<=$diecinueve){
$dq.="UNION (SELECT * FROM status WHERE id='$value' AND $dtc<='$rnowu' AND $dtc>'$tagou' AND $dtc>=$tdaysv[$ax] AND $dtc<$tdaysvv[$ax] AND visibility='v' ORDER BY datetimep DESC LIMIT $cinco)";
$ax++;
}
*/

$dq.="UNION (SELECT * FROM status as dt WHERE (FIND_IN_SET(id,'$uid_friends_comma_qs_me')>0 $nf_q) AND $dtc<'$tagou' AND visibility='v' $status_qf ORDER BY datetimep DESC LIMIT $mnv)";

if(isset($clist)){
$dq.=" UNION (SELECT * FROM status as dt WHERE id='$uid' AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(privacy,'l',''))>0)>0 AND $dtc<'$tagou' AND visibility='v' $status_qf ORDER BY datetimep DESC LIMIT $mnv)";	
}

}

$r=mysql_query("$dq");

while($m = mysql_fetch_array($r))
  {
if(isset($_POST['nfp'])){
$value=$uid;
}
else{
$value=$m['id'];
}
$uidv=$value;
	
	  $kill='';
${'laglobal'.$x}=$m['sbid'].$m['id2'].$m['id'];

$jo=$ix;
$jov=$x-1;
while($jo<=$jov){
if(isset(${'laglobal'.$jo})){
if(${'laglobal'.$x}==${'laglobal'.$jo}){$kill='y';}
}
$jo++;
}

if($kill!='y'){
$m['text']=str_replace("
","<br>",$m['text']);

$v1=$m['id'];
$v2=$m['id2'];

$bydate[$x]=$m['datetimep'];
$textid=$m['sbid'];

$uti=sb_user($v1);
$utiv=sb_user($v2);

$ltype='status_update';
$likeid=$m['sbid'];
$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count'];
if($count!='0'){$count=$count;}
else{unset($count);}
}


if(isset($m['text'])){

$pause='';
$whatisit_h="status_update";
		$cag=$likeid;
include("master/set_pause.php");

$udvtag=$m['id2'];

if($uti['id']==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removep2(\''.$likeid.'\',\''.$value.'\','.$x.');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"  ></div></div>';
$saddo='';
}
else if($udvtag==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddo" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div style="margin:0;padding:0;position:absolute;right:-1px;top:12px;">
<div onclick="removep2(\''.$likeid.'\',\''.$value.'\','.$x.');" class="cmnc" id="cmncd'.$x.'" data-t_text="Delete Post"  ></div></div>';
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


	$location=$m['location'];
	if($location!=""){$loca=' &#151; <span class="fcg">in <span class="fbc">'.$location.'</span>.';}	
	else{
	$loca='';	
	}
	
$wp_table='tags';
$likeid=$likeid;
$owner_c=$m['id'];
$udvv=$m['id2'];
$ui=$m['id'];
$uo=$m['id'];
$desc='';
include("stories/with_plugin.php");
if($with!=""){
$with='<span class="fcg"> &#151; with </span>'.$with;
}


if(strpos($m['text'],"<b data-uidv")!==false){
  
    $html=$m['text'];
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
    $m['text']="";
    foreach ($xpath->evaluate("/html/body/node()") as $node) {
         $m['text'].=$dom->saveHTML($node);
    }
    
    $m['text']=str_replace('<b><div style="display:inline-block;">','<div style="display:inline-block;">',$m['text']);
    $m['text']=str_replace('</div></b>','</div>',$m['text']);
}

if($m['id']==$m['id2']){
$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$uti['username'].'" class="andbl"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table style="margin:0;padding:0;"><tr><td style="vertical-align:top;" class="friendslink">'.$uti['link'].'</td></tr><tr><td class="dstatus'.$x.'"><span style="color:#333333">';

if(strlen($m['text'])>700){

    $dr[$x].=substr($m['text'],0,640);
    
    $dr[$x].='<div class="cut iblock">... </div><div class="lb iblock"><a class="readmore stopprop" href="#">Continue reading</a></div>';
    $dr[$x].='<div class="readmorev hidden_sb iblock">'.substr($m['text'],640).'</div>';
}
else{
 $dr[$x].=$m['text'];   
}

$dr[$x].=$loca.$with.'</span></td></tr>';
unset($loca);
$noshare='f';
}
else{
/*
if($m['who']==$uidv){$dr[$x].='<table style="font-size:11px;color:#666666;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$uo.'"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table style="margin:0;padding:0;"><tr><td style="vertical-align:top;" class="friendslink"><a href="/'.$uo.'">'.$uo_fn.'</a>'.'</td></tr><tr><td><span style="color:#333333">'.$m['text'].'</span></td></tr>';
}
*/
$uti=sb_user($m['id']);
$utiv=sb_user($m['id2']);
$dr[$x].='<table style="font-size:11px;color:#808080;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$uti['username'].'" class="andbl"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table style="margin:0;padding:0;"><tr><td style="vertical-align:top;" class="friendslink"><div style="margin:0;padding:0;display:inline-block;"><div style="display:inline-block;">'.$uti['link'].'</div><div style="display:inline-block;">&nbsp;wrote on&nbsp;</div><span class="llb fwn inlineBlock"><div style="display:inline-block;" class="llb fwn inlineBlock">'.$utiv['link'].'</div><div style="display:inline-block;">\'s wall.</div></span></div></td></tr><tr><td class="dstatus'.$x.'"><span style="color:#333333">';


if(strlen($m['text'])>700){

    $dr[$x].=substr($m['text'],0,640);
    
    $dr[$x].='<div class="cut iblock">... </div><div class="lb iblock"><a class="readmore stopprop" href="#">Continue reading</a></div>';
    $dr[$x].='<div class="readmorev hidden_sb iblock">'.substr($m['text'],640).'</div>';
}
else{
 $dr[$x].=$m['text'];   
}

$dr[$x].=$loca.'</span></td></tr>';
$noshare='t';
unset($loca);
}


$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}

if($noshare=='f'){
$sharef='show_msg_dialogs_status(\''.$uti['profilepict'].'\',\''.$uti['id'].'\',\''.$m['sbid'].'\',\''.$uti['fullname'].'\',\'\',\''.$x.'\');';
$sharef='&nbsp;&#183;&nbsp;<span class="friendslink3v" title="Post this on your profile." onclick="'.$sharef.'">Share</span>';
}
else{$sharef='';}

	
$dr[$x].='<tr><td class="story_foot_td" style="padding-left:2px;"><div class="lbl" style="display:inline-block;">'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment">Comment</span>'.$sharef.'&nbsp;&#183;&nbsp;<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$m['datetimep'].'" title="'.rtd($m['datetimep']).'">'.td
($m['datetimep']).'</abbr></div>';


$ltypev="status";
$sbid=$likeid;

$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$m['id'];

if($m['id']!=$m['id2']){ //user to user wall post
$photos="t";
$photos_id=$m['id2'];
}


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
$uo=$m['id'];
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


$counter=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM shares WHERE id2='$value' AND elemid='$thefabtext' AND whatisit='shared_status_update' AND visibility='v'"));
$counter=$counter['counter'];

if($counter>0){
if($counter>1){$isp='s';}
else{$isp='';}

$dshare='shared_status_update';
$share_id=$thefabtext;
$ltype='';
$wp_table='shares';
$owner_c=$uo;

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
include("master/load_2_comments.php");

include("master/comment_box.php");

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
?>