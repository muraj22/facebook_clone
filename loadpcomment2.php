<?php
include("start.php");

if(!function_exists("td_pc")){
function td_pc($topv){ //td_pc
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
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}

if($td>1){$suf.='s';}

if($suf==" day" && $topv>=strtotime("yesterday")){}
else if($suf==" day"){$suf=' days'; $td=2;}

	if($suf==' days' && $td<7){$td=turndatev($topv); return $td;}
else if($suf==' days' && $td>6){$td=turndate($topv); return $td;}

if($suf==' second' || $suf==' seconds'){
return 'a few seconds ago';	
}

$td=$td.$suf.' ago';	

	if($td=='1 day ago'){$hrsminsec=turndate3($topv); $td='Yesterday at '.$hrsminsec;}
	return $td;
}

}

$ltypev=$_POST['ltypev'];
if($ltypev=="comment"){
$table="comments";	
}
else{
$table="commentsv";
}

$uidv=$_POST['uidv'];
$elemid=$_POST['sbid'];
$aquery=$_POST['aquery']; //2
$aqueryv=$_POST['aqueryv']; //48
$xrt=$_POST['piclikeval'];

$type=$_POST['variation'];

$whos=$uidv;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$hidden=array();
$result=mysql_query("SELECT * FROM hidden_stories WHERE whatisit='$ltypev' AND id='$uid' AND hidden='1'");
while($ms=mysql_fetch_array($result)){
$hidden[$ms['whatisit']][]=$ms['likeid'];
}


$messcheck=$aqueryv-$aquery;
if($messcheck>100){
exit(); //someone trying to hog on the database
}

$na=$_POST['na'];

$aquerym=$aquery+$na;
$aqueryv=$aqueryv;

$sarr_d=array();
$sarr_r=array();

$r2=mysql_query("SELECT * FROM $table WHERE elemid='$elemid' AND type='$type' AND visibility='v' ORDER BY datetimep DESC LIMIT $aquerym,$aqueryv");
while($m2=mysql_fetch_array($r2)){

//ltypev was a $_POST

$pause2='';
$whatisit_h=$ltypev; //either comment or commentv

$cag=$m2['sbid'];
$requested_pause=2;
include("master/set_pause.php");
if($pause2=='t'){unset($pause2);}
else{
$xrt++;

$m2['comment']=checkforsmileys($m2['comment']);	

$udvtag=$m2['id2'];

$commentid=$m2['sbid'];

$likeid=$m2['sbid'];
$ltype=$ltypev;

$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count'];
if($count!='0'){$count=$count;}
else{unset($count);}

}

$sarr_d[$xrt]=$m2['datetimep'];
$sarr_r[$xrt]='';

$xrtv=$xrt-1;

$uti=sb_user($m2['id']);

if($uid==$m2['id']){ //comentor
    $saddo='<div data-sbid="'.$commentid.'" data-uidv="'.$m2['id2'].'" class="cmnc hidden_sb" data-type="1"></div>
    <div class="cmnc_edit cmnc_editvv" data-t_align="center" data-t_text="Edit or Delete"></div><div class="hidden_sb edit_del_container">
<ul class="cmncdc" style="border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">
<li class="itemaliv delete_comment" style="list-style-type:none;">Delete...</li>
<li class="itemaliv edit_comment doc_click" style="list-style-type:none;">Edit...</li>
</ul>
</div>';
}
else if($uid==$m2['id2']){ //story owner
$saddo='<div data-sbid="'.$commentid.'" data-uidv="'.$m2['id2'].'" class="cmnc" data-type="2" data-t_text="Remove or Report"></div>';	
}
else{
$saddo='<div data-sbid="'.$commentid.'" data-uidv="'.$m2['id2'].'" data-f_name="'.$uti['f_name'].'" data-un="'.$uti['username'].'" class="cmnc" data-type="3" data-t_text="Hide as Spam"></div>';	
}


$commentid=$m2['sbid'];

$ltype=$ltypev;
$wp_table='like';
$commentid=$m2['sbid'];
$udvtag=$m2['id'];

$dclass="livetimestamp";
$dclassv="";
$dclassvv="";


$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$commentid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='display:none;';
$like2='display:inline-block;';	
}
else{
$like='display:inline-block;';		
$like2='display:none;';
}


if(strlen($m2['comment'])>300){

    $comment=substr($m2['comment'],0,300);
    
    $comment_chunk='<div class="cut iblock">... </div><div class="lb iblock"><a class="readmore stopprop" href="#">See More</a></div>';
    $comment_chunk.='<div class="readmorev hidden_sb iblock">'.substr($m2['comment'],300).'</div>';
}
else{
    $comment=$m2['comment']; 
    $comment_chunk="";
}
$utime=$m2['datetimep'];
$dttime=rtd($m2['datetimep']); //hjr to use dttime as ttime is already reserved for tags on news feed
$dtime=td_pc($m2['datetimep']);

$data_lparams='data-lparams=\'{"lpid":"'.$commentid.'","uidv":"'.$m['id'].'","whatisit":"'.$ltypev.'"}\'';

include("js/clone_comment_div.php");


$sarr_r[$xrt].=$sechov;



$xrt++;
}


}


$totresp=mysql_num_rows($r2);
if(!isset($from)){
echo $totresp.'{{}}';
}
asort($sarr_d);
$actual_comments="";
foreach($sarr_d as $ak => $av){
if(!isset($from)){
echo $sarr_r[$ak];
}
else{
$actual_comments.=$sarr_r[$ak];	
}
}

if(isset($_GET['givet'])){
$uidv=$_POST['uidv'];
$elemid=$_POST['sbid'];


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$hidden=array();
$result=mysql_query("SELECT * FROM hidden_stories WHERE id='$uid' AND whatisit='$ltypev' AND hidden='1'");
while($ms=mysql_fetch_array($result)){
$hidden[]=$ms['likeid'];
}

//update this query once the hidden table is set up
$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM $table as dt WHERE elemid='$elemid' AND type='$type' AND visibility='v' AND (SELECT COUNT(*) FROM hidden_stories as e WHERE id='$uid' AND whatisit='$ltypev' AND hidden='1' AND e.likeid=dt.sbid)=0"));
$totalp=$c['c'];

if(!isset($from)){
echo '{{}}'.$totalp;
}

}

?>
<?php
if(!isset($from)){
include("end.php");
}
?>