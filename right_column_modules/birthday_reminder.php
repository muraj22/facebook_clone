<?php
echo'
<div>
<div><div><div class="sbRemindersThickline"></div></div><div class="mvm sbReminders">'; //open sbreminders

function turndatebt($date){$date=tod($date);
  return date('F j', strtotime($date));
}

function turndatebt4($date){$date=tod($date);
  return date('d m y', strtotime($date));
}

function turndatevbt($date){$date=tod($date);
  return date('l \a\t g:ia', strtotime($date));
}

function turndate3bt($date){$date=tod($date);
  return date('g:ia', strtotime($date));
}

function tdbt($topv){
$topv=tod($topv);
$compared_time=new DateTime($topv);
$actual_time=new DateTime();

$dayoftheweek=$actual_time->format('N');;
$dayoftheweekbt=$tp->format('N');
$monthoftheyear=$actual_time->format('n');
$monthoftheyearbt=$tp->format('n');

$dayoftheyear=$actual_time->format('d');
$dayoftheyearbt=$tp->format('d');

$weekoftheyear=$actual_time->format('W');
$weekoftheyearbt=$tp->format('W');
$weekoftheyearv=$weekoftheyear+1;
if($weekoftheyearv=='53'){
$weekoftheyearv=01;	
}

$year=$tp->format('Y');
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%m'); $suf=" month";
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf=' day';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf=' hour';}
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf=' minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf=' second';}
if($td=='+0' || $td=='-0'){$td='1';}

$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}

if($td>1){$suf.='s';}

if($suf==' second' || $suf==' seconds'){
return 'a few seconds ago';	
}

if(strpos($td,'+')!==false){$ago='remains';
	$td=str_replace('+','',$td);

if($suf==' minute' || $suf==' minutes'){

$td=$dayoftheyearbt.'{}'.'Today'.'{}'.turndatebt($topv);

return $td;	
}
else{return 'past';}
}
else{$ago='ago'; return 'past';}

return $td;
}

function td2bt($topv){
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

if(strpos($td,'-')!==false){

return 'past';
}
else{return'';}
}


function td3bt($topv){
$topv=tod($topv);
$actual_time=new DateTime();

return $td;
}

function retval($val){
	$year=date("Y");
	$yearv=$year+1;
if($val=='today'){$val=-2;}
return $val;	
}

function rettvalv($val){
if($val=='0'){$val='a';}
else if($val=='0'){$val='b';}
else if($val=='1'){$val='c';}
else if($val=='2'){$val='d';}
else if($val=='3'){$val='e';}
else if($val=='4'){$val='f';}
else if($val=='5'){$val='g';}
else if($val=='6'){$val='h';}
else if($val=='7'){$val='i';}
else if($val=='8'){$val='j';}
else if($val=='9'){$val='k';}
else if($val=='10'){$val='l';}
else if($val=='11'){$val='m';}
else if($val=='12'){$val='n';}
else if($val=='13'){$val='o';}
else if($val=='14'){$val='p';}
else if($val=='15'){$val='q';}
else if($val=='16'){$val='r';}
else if($val=='17'){$val='s';}
else if($val=='18'){$val='t';}
else if($val=='19'){$val='u';}
else if($val=='20'){$val='v';}
else if($val=='21'){$val='w';}
else if($val=='22'){$val='x';}
else if($val=='23'){$val='y';}
else if($val=='24'){$val='z';}
return $val;	
}

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$bvar='';
$cexplode=0;
$cexplodev=0;
$year=date("Y");
$daybt=date("j");
$monthbt=date("n");


$possiblevalues=array();
$r=mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='y' ORDER BY datetimep ASC");
while($m=mysql_fetch_array($r)){
$friend=$m['id2'];
$r2=mysql_query("SELECT * FROM registered WHERE id='$friend' AND day='$daybt' AND month='$monthbt'");
while($m2=mysql_fetch_array($r2)){
$pdate=new DateTime();
$hpdate=$pdate->format('G');
$mpdate=$pdate->format('i');
$mpdate=$mpdate+10;
$substrd=substr($mpdate,0,1);
$substrdv=substr($mpdate,1,1);
if($substrd=='6' || $substrd=='7'){
	$mpdate='0'.$substrdv;
	if($hpdate=='23'){$hpdate=0;}
	else{$hpdate=$hpdate+1;}
	}
$date=$m2['day'].'-'.$m2['month'].'-'.$year.' '.$hpdate.':'.$mpdate;
$date = new DateTime($date);
$date2=$date->format('Y-m-d g:ia');
$yearv=$year+1;

$date3=td2bt($date2);
if($date3=='past'){}
else{

$datev=$m2['day'].'-'.$m2['month'].'-'.$year.' '.$hpdate.':'.$mpdate;

$actual_time2=$m2['day'].'-'.$m2['month'].'-'.$m2['year'];

$actual_time=new DateTime($actual_time2);
$compared_time=new DateTime($datev);

$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%Y');
	
}

$date2=tdbt($date2);

if($date2=='past'){}
else{
$explode=explode('{}',$date2);
$explode1=$explode[1];
$explode1=strtolower($explode1);

$explode1=str_replace(' ','',$explode1);



if(!isset(${'arri'.$explode1})){
${'arri'.$explode1}=array();
$val=retval($explode1);
//echo $val.'<br>';
$possiblevalues[$val]=$explode1;
}
$explode0=$explode[0];
if(isset(${'arri'.$explode1}[$explode0])){
	if($cexplodev>0){
$bvar.=rettvalv($cexplode).rettvalv($cexplodev);
	}
else{$bvar.=rettvalv($cexplode);}
if(strlen($bvar)>150){
$cexplode++;
	if($cexplodev>0){
$bvar.=rettvalv($cexplode).rettvalv($cexplodev);
	}
	else{$bvar=rettvalv($cexplode);}
if($cexplode>23){
$cexplode=0;
$cexplodev++;
if($cexplodev>22){
$cexplodev=1;	
}
$bvar=rettvalv($cexplode).rettvalv($cexplodev);	
}
	}
$explode0=$explode0.$bvar;
	}
${'arri'.$explode1}[$explode0]=$explode[2].'<>'.$m2['id'].'<>'.$td;	
}

}
}






function recompose($val){
	$year=date("Y");
	$yearv=$year+1;
if($val=='today'){$val='Today';}
return $val;	
}
ksort($possiblevalues);

foreach($possiblevalues as $key => $value){
ksort(${'arri'.$value});	
}

$acount=0;
foreach($possiblevalues as $key => $value){
$count=0;
foreach(${'arri'.$value} as $keyv=> $value2){
${'arri'.$value.'v'}=$count;
$count++;
$acount++;
}

}


$acount--;

echo'
<script type="text/javascript">
function open_module_birthday(){
var ofleft=$("#birthdays_module").offset().left;
var iwidth=$("#birthdays_modulev").innerWidth();
ofleft=parseInt(ofleft);
iwidth=parseInt(iwidth);
var ofleft2=ofleft-iwidth;
ofleft2=ofleft2-12;
$("#birthdays_modulev").css("left",ofleft2+"px");
var oftop=$("#birthdays_module").offset().top;
oftop=parseInt(oftop);
oftop=oftop-18;
$("#birthdays_modulev").css("top",oftop+"px");
$("#birthdays_modulev").show();
}
</script>
';

$btwritten=array();

$contval='';
$pcount=1;
foreach($possiblevalues as $key => $value){
if($value=='today'){
$count=0;
$border='1';
if(isset($finish)){break;}
foreach(${'arri'.$value} as $keyv=> $value2){
if(${'arri'.$value.'v'}==$count){$border='0';}
	$count++;
if($pcount>5){$finish='t'; break;}
if(!isset(${'echov'.$value})){
	${'echov'.$value}='';
	if($value=='thisweek' && isset($setf)){$valuev='Later This Week';}
	else{$valuev=recompose($value);}
	if($value=='tomorrow' || $value=='today'){$setf='t';}
	$contval.=$value.',';
	echo '';
	}

$list=explode("<>",$value2);


$date=$list[0];
$id=$list[1];
$yearsold=$list[2];
$yearsold=str_replace('+','',$yearsold);

$r=mysql_query("SELECT * FROM birthday_wrote WHERE id='$uid' AND id2='$id'");
$counti=mysql_num_rows($r);
if($counti>0){
while($m=mysql_fetch_array($r)){
$datetime=$m['datetimep'];
$datetime2=turndatebt4($datetime);
$datetime2v=date("d m y");
if($datetime2==$datetime2v){$nj='';}
}
}
if(isset($nj)){
$btwritten[]=$id;
unset($nj);
}

if(!in_array($id,$btwritten)){

$r=mysql_query("SELECT * FROM registered WHERE id='$id'");
while($m=mysql_fetch_array($r)){
$uo_pic=$m['profilepict'];
$uo_fn=$m['fullname'];
$uo_un=$m['username'];

$uo_fnv=$uo_fn;

$uo_fnvlength=strlen($uo_fnv);

if($uo_fnvlength>31){
$uo_fnv=$m['f_name'];	
$uo_fnvlength=strlen($uo_fnv);	
}

if($uo_fnvlength>31){
$uo_fnv=substr($uo_fnv,0,31);
$uo_fnvlength=strlen($uo_fnv);		
}

$gender=$m['gender'];
if($gender=='1'){$abrv='her';}
else{$abvr='his';}
if($uo_un==''){$uo_un=$id;}
}
if($pcount>1){break;}

if($acount>0){
$ar='<span class="sbRemindersTitle"><strong>'.$uo_fnv.'</strong></span> and <span class="sbRemindersTitle">'.$acount.' other</span>';
}
else{
$ar='<span class="sbRemindersTitle"><strong>'.$uo_fnv.'</strong></span>\'s birthday is today';	
}

$pcount++;
}
}


}
	
	}
	
	if(isset($finish)){}

if($pcount>1){
echo'
<div class="sbRemindersStoryw"><a href="#" id="birthday_reminders_link" style="display:block;"><div class="clearfix sbRemindersStory" id="birthdays_module"><div class="clearfix"><i class="lfloat img cajitai" style="margin-right: 5px;margin-top: -1px;"></i><div style="margin-top: 1px;"><div class="fsm fwn fcg">'.$ar.'</div></div></div></div></a></div>';	
}

echo'
<script type="text/javascript">
$("#birthdays_module").click(function(){
	open_module_birthday();
});

function closeallbt(){
  $("#birthdays_modulev").fadeOut("slow");
}

function send_msgvv(id,yk,tocheck){

$.ajax({
  async: "false",
  type: "POST",
  url: "writeonwall.php",
  data: { duser : id, message : tocheck },
  success: function(data) {
$("#writebt"+yk).css("display","none");
$("#writebtv"+yk).css("display","block");
  }
});

}

function submitonenterbt(evt,w,v,yk,id){
var charCode = (evt.which) ? evt.which : event.keyCode;var tocheck=$("#writebt"+yk).val();
tocheck=$.trim(tocheck);
if((charCode == "13") && (tocheck=="")){return false;}
else if(charCode == "13"){
send_msgvv(id,yk,tocheck);
}
} 

function clearbtw(yk,abvr){
var tocheck=$("#writebt"+yk).val();
tocheck=$.trim(tocheck);
var wabvr="Write on "+abvr+" wall";
if(tocheck==wabvr){$("#writebt"+yk).val(""); $("#writebt"+yk).css("color","#333333");}	
}

function clearbtwv(yk,abvr){
var tocheck=$("#writebt"+yk).val();
tocheck=$.trim(tocheck);
if(tocheck==""){$("#writebt"+yk).css("color","#777777"); $("#writebt"+yk).val("Write on "+abvr+" wall");}
}

</script>
';
	
echo '<div style="margin:0;padding:0;width:347px;border:1px solid #8c8c8c;border-bottom:1px solid #666666;padding-left:10px;padding-top:11px;padding-bottom:10px;z-index:305;background:#ffffff;box-shadow:3px 0px 5px rgba(0,0,0,0.2);position:fixed;display:none;" id="birthdays_modulev">';
$contval='';
$pcount=1;
foreach($possiblevalues as $key => $value){
if($value=='today'){
$count=0;
$border='1';
if(isset($finish)){break;}
foreach(${'arri'.$value} as $keyv=> $value2){
if(${'arri'.$value.'v'}==$count){$border='0';}
	$count++;
if($pcount>5){$finish='t'; break;}
if(!isset(${'echovv'.$value})){
	${'echovv'.$value}='';
	if($value=='thisweek' && isset($setf)){$valuev='Later This Week';}
	else{$valuev=recompose($value);}
	if($value=='tomorrow' || $value=='today'){$setf='t';}
	$contval.=$value.',';
	echo '
	<div style="width:336px;position:relative;color:#333333;border-bottom:1px solid #cccccc;margin-bottom:8px;padding-bottom:3px;padding-left:1px;font-weight:bold;">Today\'s Birthdays <span class="llb fwn"><a href="/events.php?bt=t" style="position:absolute;right:0px;">See All</a></span></div>';
	}

$list=explode("<>",$value2);

if(!in_array($id,$btwritten)){
$date=$list[0];
$id=$list[1];
$yearsold=$list[2];
$yearsold=str_replace('+','',$yearsold);

$r=mysql_query("SELECT * FROM registered WHERE id='$id'");
while($m=mysql_fetch_array($r)){
$uo_pic=$m['profilepict'];
$uo_fn=$m['fullname'];
$uo_un=$m['username'];
$gender=$m['gender'];
$fname=$m['f_name'];
if($gender=='1'){$abrv='her';}
else{$abrv='his';}
if($uo_un==''){$uo_un=$id;}
}
echo '<div style="width:234px;padding:10px 5px;padding-top:0;padding-bottom:5px;margin:0;background:#ffffff;" class="friendslink">
<div style="margin:0;padding:0;display:inline-block;">
<a href="/'.$uo_un.'"><img src="/'.$id.'/pics/'.$uo_pic.'" style="height:50px;width:50px;"></a>
</div>
<div style="margin:0;padding:0;display:inline-block;vertical-align:top;padding-top:0px;padding-left:5px;margin-top:4px;"><a href="/'.$uo_un.'">'.$uo_fn.'</a>
<div style="margin:0;margin-top:2px;padding:0;"><input id="writebt'.$pcount.'" onfocus="clearbtw('.$pcount.',\''.$abrv.'\');" onblur="clearbtwv('.$pcount.',\''.$abrv.'\');" onkeydown="javascript:return submitonenterbt(event,this.value,\''.$pcount.'\','.$pcount.',\''.$id.'\');" type="text" value="Write on '.$abrv.' wall" class="writeacomment" style="display:inline-block;font-size:11px;font-weight:normal;position:absolute;width:249px;padding:3px;margin:5px;margin-left:0;margin-top:0;margin-right:0;color:#777777;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;"><div style="margin:0;margin-bottom:5px;padding:0;color:#333333;display:none;" id="writebtv'.$pcount.'">You wrote on '.$fname.'\'s wall</div><script type="text/javascript">$("#writebt'.$pcount.'").value="Write on '.$abrv.' wall";</script></div></div>
</div>';	
$pcount++;
}
}


}
	
	}
	
	if(isset($finish)){}
	echo '<div class="pinchito6" style="width:9px; height:16px;position:absolute;right:-9px;top:15px;z-index:300;"></div></div>';
	

?>