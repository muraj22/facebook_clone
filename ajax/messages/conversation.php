<?php
include("start.php");
$dq=$inbox_other;

function turndate_conversation($topv,$c=false){
$topv=tod($topv); 

$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);

$td=$tdd->format('%R%Y'); $suf=" year";
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%m'); $suf=' month';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf=' day';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf=' hour';}
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf=' minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf=' second';}
if($td=='+0' || $td=='-0'){$td='1';}
$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}

if($suf==" day" && $topv>=strtotime("yesterday")){}
else if($suf==" day"){$suf=' days'; $td=2;}

if(($suf==' days' || $suf=="day") && $td<7){
return date("l",strtotime($topv)); //friday
}
else if(($suf==' days' && $td>6) || $suf==" month" || $suf==" months"){
return date("F j",strtotime($topv)); // february 1
}

if($suf==" year" || $suf==" years"){
return date("F j, Y",strtotime($topv)); //february 1,2010	
}

if($suf==" second" || $suf==" seconds" || $suf==" minute" || $suf==" minutes" || $suf==" hour" || $suf==" hours"){
if($c){
return "Today";	
}
else{
return date("g:ia",strtotime($topv)); // 1:30am
}

}

}


$tr=mysql_fetch_array(mysql_query("SELECT COUNT(*) as tr FROM commentsvv WHERE (id='$uid' AND id2='$uidv' AND status_id='$dq') OR (id2='$uid' AND id='$uidv' AND status_id2='$dq')"));
$tr=$tr['tr']; //total rows

if(!isset($gs)){
$gs=0;	
$dparams["started"]="t";
}
else{
$dparams["started"]="f";	
}
if(!isset($gsv)){
$gsv=15;	
}

$r=mysql_query("SELECT * FROM (SELECT * FROM commentsvv WHERE (id='$uid' AND id2='$uidv' AND status_id='$dq') OR (id2='$uid' AND id='$uidv' AND status_id2='$dq') ORDER BY datetimep DESC LIMIT $gs,$gsv) as dtv ORDER BY datetimep ASC");
$c=mysql_num_rows($r); //see if in this fetch there were any results, if none don't query any longer
$conv=array();
$dparams["response"]="";
while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id']);
$ddate=$m['datetimep'];
$c2=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM commentsvv WHERE datetimep<$ddate AND (id='$uid' AND id2='$uidv' AND status_id='$dq') OR (id2='$uid' AND id='$uidv' AND status_id2='$dq')"));
$c2=$c2['c'];
if($c2==0){
$extra="Conversation started ";
}
else{
$extra="";
}
if($m['source']=="1"){
$dclass="";
}
else{
$dclass="hidden_sb";
}
$dclassv="";
if(!isset($ltime)){
$ltime=date("D.M.Y",$m['datetimep']);	
}
else{
if(date("D.M.Y",$m['datetimep'])==$ltime){
$dclassv="hidden_sb";	
}
$ltime=date("D.M.Y",$m['datetimep']);	
}
$dparams["response"].='<li class="_2n3"><abbr data-current_date="'.date("d.m.Y",$m['datetimep']).'" data-utime="0" class="timestamp '.$dclassv.' current_message_timestamp" data-jsid="timestamp">'.$extra.turndate_conversation($m['datetimep'],"t").'</abbr></li>
<li class="webMessengerMessageGroup clearfix" data-uidv="'.$uti['id'].'"><div class="delete_message hidden_sb"><input class="delete_message_input" type="checkbox" data-sbid="'.$m['sbid'].'"></div><div class="move_to_other hidden_sb"><input class="move_to_other_input" type="checkbox" data-sbid="'.$m['sbid'].'"></div><div class="_yh lfloat"><input type="checkbox"></div><div class="clearfix"><div class="_2w7 _8o _8t lfloat"><a href="/'.$uti['username'].'" class="_50dv"><img class="_s0 _rx img" src="/users/'.$uti['id'].'/pics/'.$uti['profilepict'].'" alt=""></a></div><div class="clearfix _8m _42ef"><div class="rfloat"><span></span><a class="'.$dclass.' mrs _9k" aria-label="Sent from chat" data-hover="tooltip"><img class="img _9h" data-t_text="Sent from chat" data-t_topleft="t" src="/images/-PAXP-deijE.gif" alt="" width="1" height="1"></a><a class="_b9" data-hovercard-instant="1"><i class="_ba hidden_sb img sp_4tnflm sx_eeb853"></i><abbr title="'.turndate_conversation($m['datetimep']).'" data-utime="'.$m['datetimep'].'" class="_35 timestamp">'.date("g:ia",$m['datetimep']).'</abbr></a><div class="_39"><a class="hidden_sb" href="#" rel="dialog" role="button">Expand</a></div><div class="_3a"><a class="hidden_sb" href="#">Show Images</a></div></div><div><strong class="_36 lb"><a href="/'.$uti['username'].'" hc="">'.$uti['fullname'].'</a></strong><div class="_37"><strong></strong><div class="_53" id="msg'.$m['sbid'].'"><div class="_3hi"><div class="_1yr"><span class="_2oy"></span><span></span></div><div class="_38 direction_ltr"><p>'.$m['comment'].'</p></div></div></div><div class="_sq"></div><ul class="uiList _2s4 _4kg _6-h _6-j _4kt hidden_sb"></ul></div></div></div></div></li>';

$sbid=$m['sbid'];
if($m['id']==$uid){
$dw="dread_id='1'";
}
else if($m['id2']==$uid){
$dw="dread_id2='1'";
if($m['datetimepr']===NULL){
mysql_query("UPDATE commentsvv SET datetimepr=UNIX_TIMESTAMP() WHERE sbid='$sbid'");	
}
}
mysql_query("UPDATE commentsvv SET $dw WHERE sbid='$sbid'");	

	}

if($dparams["started"]=="t"){ //does not need the seen thing, it is loading from the past :)
$r=mysql_query("SELECT * FROM commentsvv WHERE (id='$uid' AND id2='$uidv' AND status_id='$dq') ORDER BY datetimep DESC LIMIT 1");
while($m=mysql_fetch_array($r)){
if($m['datetimepr']!==NULL){
$dparams["response"].='<div class="_510g mbs _510o _510e seen"><div class="_510h"></div><span class="_510f">Seen '.date("D g:i A",$m['datetimep']).'</span></div>';
}
}
}

$loaded=$gs+$c;
$dparams["remaining"]=$tr-$loaded;

$gs=$gsv; //el nuevo gs es a donde se quedo, en gsv $gsv
$gsv=$gsv+15; //+15

if($gsv>$tr){
$gsv=$tr; //load up to the max available
}

if($dparams["remaining"]=="0"){
$dparams["finished"]="t";	
}
else{
$dparams["finished"]="f";	
}
$dparams["uidv"]=$_POST['uidv'];
$dparams["gs"]=$gs;
$dparams["gsv"]=$gsv;
$dparams["tr"]=$tr;

echo json_encode($dparams);
?>