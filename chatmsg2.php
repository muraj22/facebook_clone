<?php  
include("start.php");
?>
<?php
include("checkforsmilies.php");

$what=$_POST['what'];

if($what=="loadconversation"){ //carga las conversaciones via ajax
	
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


$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");
	
$id=$_POST['duser'];
$yk=$_POST['yk'];
$ykv=$_POST['ykv'];
$ykv2=0;

$one='0'; $two='top:10px;';

$result2=mysql_query("SELECT * FROM registered WHERE id='$id'");
while($ms2=mysql_fetch_array($result2)){

$unvv=$ms2['id'];

$conversation="";
$msgexecutedv="";
$appends='<tr style="display:none;"><td>
<script type="text/javascript">';
$msgsexecuted='';
$uidvc=$uid.'c';
$dtime=time()-(7*24*60*60); //load up in initial conversation comments through up to a week in the past
$dtc="UNIX_TIMESTAMP(CONVERT_TZ(FROM_UNIXTIME(datetimep), '+00:00', '$ctimezone'))";
$result3=mysql_query("SELECT * FROM commentsvv WHERE source='1' AND ((id='$uid' AND id2='$id') OR (id='$id' AND id2='$uid')) AND $dtc>=$dtime");
while($ms3=mysql_fetch_array($result3)){
$dmsg=$ms3['sbid'];

$td=td4($ms3['datetimep']);
$tdd=$ms3['datetimep'];

$message=$ms3['comment'];
$whosent=$ms3['id'];

$uti=sb_user($ms3['id']);

$whosentusername=$uti['username'];
$whosenttag=$uti['id'];
$whosent=$uti['fullname'];
$whosentpic=$uti['profilepict'];

if($whosenttag==$uid){
$whosent='You';
}

$message=checkforsmileys($message);

if(isset($lala) AND $lala==$whosent){
$message=addslashes($message);	
$appends.='$("#msge'.$ykvv.'").append("<br>'.$message.'");';
$appends.='$("#msgev'.$ykvv.'").html("'.turndate3($tdd).'");';
$appends.='$("#msge'.$ykvv.'").addClass("'.$ms3['sbid'].'");';
}
else{
$lala=$whosent;

$conversation.='<tr><td><table onmouseover="lastChild.lastChild.lastChild.lastChild.lastChild.style.opacity=\'1\';" onmouseout="lastChild.lastChild.lastChild.lastChild.lastChild.style.opacity=\'0\';"><tr><td style="width:32px;border-top:1px solid rgb(238,238,238);padding-top:6px;padding-bottom:6px;"><a class="lsender" data-uidv="'.$whosenttag.'" href="/'.$whosentusername.'" style="display:block;text-decoration:none!important;" data-t_text="'.$whosent.'" data-t_position="left"><img src="/'.$whosenttag.'/pics/'.$whosentpic.'" style="max-width:32px;max-height:32px;"></a></td><td style="text-align:left;border-top:1px solid rgb(238,238,238);width:195px;"><div style="position:relative;bottom:-5px;left:5px;" class="wrapffc msge'.$whosenttag.'" id="msge'.$ykv.'">'.$message.'</div><div style="position:relative;"><span style="position:absolute;right:0;top:-23px;font-size:9px;opacity:0;color:#808080;" class="msgev'.$whosenttag.'" id="msgev'.$ykv.'">'.turndate3($tdd).'</span></div></td></tr></table></td></tr>';
$ykvv=$ykv;
}

$ykv++;
$ykv2++;
$msgsexecuted.='#:#:'.$ms3['sbid'];
}

$appends.='$("#msgsid'.$yk.'").val("'.$msgsexecuted.'");</script></td></tr>';

$conversation.=$appends;

}

mysql_close($con);

$dparams["conversation"]=$conversation;
$dparams["ykv2"]=$ykv2;

echo json_encode($dparams);

}
	
else if($what=="chatmsg"){
$x=$_POST['appendmsg'];

$towhoiamchatting=$_POST["duser"];

$chatmsg=$_POST["chatmsg"];
$chatmsg=addslashes($chatmsg);

if($chatmsg!=''){

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

$resultok=mysql_query("SELECT * FROM registered WHERE id='$towhoiamchatting'");
while($msok=mysql_fetch_array($resultok)){
if($msok['status']=='2'){
$dtime="NULL";
$read_idv=0;
}
else{
$dtime="UNIX_TIMESTAMP()";
$read_idv=1;
}	
}

$read_id=1;
mysql_query("INSERT INTO commentsvv (id,id2,comment,dread_id,dread_id2,source,status_id,status_id2,visibility_id,visibility_id2,datetimep,datetimepr) VALUES('$uid','$towhoiamchatting','$chatmsg','$read_id','$read_idv','1','0','0','v','v',UNIX_TIMESTAMP(),$dtime)");

$dmsgid=mysql_insert_id();

$r=mysql_query("SELECT * FROM commentsvv WHERE sbid='$dmsgid'");
while($m=mysql_fetch_array($r)){
$dtime=$m['datetimep'];	
}

}
mysql_close($con);
}
else if($what=="keepalive"){ //carga de quienes me estan escribiendo comentarios
$x=$_POST['appendmsg'];

$msgsid=$_POST["msgsid"];

$towhoiamchatting=$_POST["duser"];

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

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
if($suf=='month' || $suf=='day'){$suf='past';}
	return $suf;
}



$rt=0;
$onemsgsent='';
$piecesv="";
if(strlen($msgsid)>0){
$piecesv=str_replace("#:#:",",",$msgsid);
if(substr($piecesv,0,1)==","){ //si hay coma al principio
$piecesv=substr($piecesv,1);	
}
$l=strlen($piecesv)-1; //si hay coma al final
if(substr($piecesv,$l,1)==","){
$piecesv=substr($piecesv,0,$l);	
}
}

$dtime=time()-(60*5); //checks for lasts 5 minutes, with find in set it prevents whatever has been sent and just displays one new message per query.
//actually check for all of the time in the past for any new message
$r=mysql_query("SELECT * FROM commentsvv WHERE source='1' AND ((id='$towhoiamchatting' AND id2='$uid') AND (FIND_IN_SET(sbid,'$piecesv')=0)) ORDER BY datetimep ASC LIMIT 1");
while($ms=mysql_fetch_array($r)){

$dsbid=$ms['sbid'];
$r2=mysql_query("SELECT * FROM commentsvv WHERE source='1' AND ((id='$towhoiamchatting' AND id2='$uid') OR (id='$uid' AND id2='$towhoiamchatting')) AND sbid<$dsbid ORDER BY sbid DESC LIMIT 1");
while($m2=mysql_fetch_array($r2)){
$psender=$m2['id'];
}

$tdd=$ms['datetimep'];

$whosent=$ms['id'];

$uti=sb_user($whosent);

$message=$ms['comment'];
$whosentusername=$uti['username'];

$whosent=$uti['fullname'];	
$whosentpic=$uti['profilepict'];
$whosenttag=$uti['id'];

$message=checkforsmileys($message);

$dparams["uidv"]=$uti['id'];
$dparams["username"]=$uti['username'];
$dparams["fullname"]=$uti['fullname'];
$dparams["profilepict"]=$uti['profilepict'];
$dparams["message"]=$message;
$dparams["date"]=turndate3($tdd);
$dparams["sbid"]=$ms['sbid'];

echo json_encode($dparams);

}
mysql_close($con);
}
?>