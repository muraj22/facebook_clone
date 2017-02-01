<?php
include("start.php");

include("populate_page.php");
function td_calendar($topv){
$topv=tod($topv);
$compared_time=new DateTime($topv);
$actual_time=new DateTime();


$dayoftheweek=$actual_time->format('N');;
$dayoftheweekbt=$compared_time->format('N');
$monthoftheyear=$actual_time->format('n');
$monthoftheyearbt=$compared_time->format('n');

$dayoftheyear=$actual_time->format('d');
$dayoftheyearbt=$compared_time->format('d');

$weekoftheyear=$actual_time->format('W');
$weekoftheyearbt=$compared_time->format('W');
$weekoftheyearv=$weekoftheyear+1;
if($weekoftheyearv=='53'){
$weekoftheyearv=01;	
}

$year=$compared_time->format('Y');
$td_calendar2=$actual_time->diff($compared_time);
$td_calendar=$td_calendar2->format('%R%m'); $suf=" month";
if($td_calendar=='+0' || $td_calendar=='-0'){$td_calendar=$td_calendar2->format('%R%d'); $suf=' day';}
if($td_calendar=='+0' || $td_calendar=='-0'){$td_calendar=$td_calendar2->format('%R%H'); $suf=' hour';}
if($td_calendar=='+00' || $td_calendar=='-00'){$td_calendar=$td_calendar2->format('%R%i'); $suf=' minute';}
if($td_calendar=='+0' || $td_calendar=='-0'){$td_calendar=$td_calendar2->format('%R%s'); $suf=' second';}
if($td_calendar=='+0' || $td_calendar=='-0'){$td_calendar='1';}

$pretd_calendar=substr($td_calendar,0,1);
if($pretd_calendar=='0'){if(substr($td_calendar,0,1)=="0"){$td_calendar=substr($td_calendar,1);}}

if($td_calendar>1){$suf.='s';}

if($suf==' second' || $suf==' seconds'){
return 'a few seconds ago';	
}
if($suf==" day" && $topv>=strtotime("yesterday")){}
else if($suf==" day"){$suf=' days'; $td_calendar=2;}



if(strpos($td_calendar,'+')!==false){$ago='remains';
	$td_calendar=str_replace('+','',$td_calendar);
	if($suf==' days' && $td_calendar<7){
		
		if($dayoftheweekbt>=$dayoftheweek){
			$td_calendar=$dayoftheyearbt.'{}'.'This week'.'{}'.turndate($topv);
			return $td_calendar;
			}
		else{
		$td_calendar=$dayoftheyearbt.'{}'.'Next week'.'{}'.turndate($topv);
		return $td_calendar;
		}
		}
		else if($suf==' days' && $td_calendar<14 && $weekoftheyearbt==$weekoftheyearv){
		$td_calendar=$dayoftheyearbt.'{}'.'Next week'.'{}'.turndate($topv);	
		return $td_calendar;		
		}
		else if($suf==' days'){
	$monthoftheyearbtv=$compared_time->format('F');
	$td_calendar=$dayoftheyearbt.'{}'.$monthoftheyearbtv.'{}'.turndate($topv);
	return $td_calendar;			
		}
	else if($suf==' months' || $suf==' month'){
	$monthoftheyearbtv=$compared_time->format('F');
	if($monthoftheyear>$monthoftheyearbt){
$td_calendar=$dayoftheyearbt.'{}'.$monthoftheyearbtv.$year.'{}'.turndate($topv);	
return $td_calendar;	
	}
	else if($monthoftheyear==$monthoftheyearbt && $dayoftheyearbt<$dayoftheyear){
$td_calendar=$dayoftheyearbt.'{}'.$monthoftheyearbtv.$year.'{}'.turndate($topv);	
return $td_calendar;		
	}
	else{
	$td_calendar=$dayoftheyearbt.'{}'.$monthoftheyearbtv.'{}'.turndate($topv);
	return $td_calendar;
	}
	}
else if($suf==' day'){
$td_calendar=$dayoftheyearbt.'{}'.'Tomorrow'.'{}'.turndate($topv);	
return $td_calendar;
}
else if($suf==' minute' || $suf==' minutes'){

$td_calendar=$dayoftheyearbt.'{}'.'Today'.'{}'.turndate($topv);

return $td_calendar;	
}
$td_calendar=$td_calendar.$suf.' remain'.turndate($topv);	
}
else{$ago='ago';}


if($td_calendar=='1 day ago'){$hrsminsec=turndate3($topv); $td_calendar='Yesterday at '.$hrsminsec;}
	return $td_calendar;
}

function td_calendar2($topv){
$topv=tod($topv);
$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$td_calendar2=$actual_time->diff($compared_time);
$td_calendar=$td_calendar2->format('%R%m'); $suf=" month";
if($td_calendar=='+0' || $td_calendar=='-0'){$td_calendar=$td_calendar2->format('%R%d'); $suf=' day';}
if($td_calendar=='+0' || $td_calendar=='-0'){$td_calendar=$td_calendar2->format('%R%H'); $suf=' hour';}
if($td_calendar=='+00' || $td_calendar=='-00'){$td_calendar=$td_calendar2->format('%R%i'); $suf=' minute';}
if($td_calendar=='+0' || $td_calendar=='-0'){$td_calendar=$td_calendar2->format('%R%s'); $suf=' second';}
if($td_calendar=='+0' || $td_calendar=='-0'){$td_calendar='1';}

if(strpos($td_calendar,'-')!==false){

return 'past';
}
else{return'';}
}


function td_calendar3($topv){
$topv=tod($topv);
$actual_time=new DateTime();

return $td_calendar;
}

function retval($val){
	$year=date("Y");
	$yearv=$year+1;
if($val=='today'){$val=-2;}
else if($val=='tomorrow'){$val=-1;}
else if($val=='thisweek'){$val=0;}
else if($val=='nextweek'){$val=1;}
else if($val=='january'){$val=2;}
else if($val=='february'){$val=3;}
else if($val=='march'){$val=4;}
else if($val=='april'){$val=5;}
else if($val=='may'){$val=6;}
else if($val=='june'){$val=7;}
else if($val=='july'){$val=8;}
else if($val=='august'){$val=9;}
else if($val=='september'){$val=10;}
else if($val=='october'){$val=11;}
else if($val=='november'){$val=12;}
else if($val=='december'){$val=13;}
else if($val=='january'.$yearv){$val=14;}
else if($val=='february'.$yearv){$val=15;}
else if($val=='march'.$yearv){$val=16;}
else if($val=='april'.$yearv){$val=17;}
else if($val=='may'.$yearv){$val=18;}
else if($val=='june'.$yearv){$val=19;}
else if($val=='july'.$yearv){$val=20;}
else if($val=='august'.$yearv){$val=21;}
else if($val=='september'.$yearv){$val=22;}
else if($val=='october'.$yearv){$val=23;}
else if($val=='november'.$yearv){$val=24;}
else if($val=='december'.$yearv){$val=25;}
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

$possiblevalues=array();
$result=mysql_query("SELECT * FROM registered WHERE FIND_IN_SET(id,'$uid_friends_comma')>0 LIMIT 200");
//la idea aca es buena pagination tipica que permite verlo todo
//store de birthday date como unix_timestamp al momento de registro, tal como se registraran las fechas de los events en unix_timestamp
while($ms=mysql_fetch_array($result)){

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
$date=$ms['day'].'-'.$ms['month'].'-'.$year.' '.$hpdate.':'.$mpdate;
$date = new DateTime($date);
$date2=$date->format('Y-m-d g:ia');
$yearv=$year+1;

$date3=td_calendar2($date2);
if($date3=='past'){
$date=$ms['day'].'-'.$ms['month'].'-'.$yearv.' '.$hpdate.':'.$mpdate;

$actual_time2=$ms['day'].'-'.$ms['month'].'-'.$ms['year'];

$actual_time=new DateTime($actual_time2);
$compared_time=new DateTime($date);

$td_calendar2=$actual_time->diff($compared_time);
$td_calendar=$td_calendar2->format('%R%Y');

$date = new DateTime($date);
$date2=$date->format('Y-m-d g:ia');
}
else{

$datev=$ms['day'].'-'.$ms['month'].'-'.$year.' '.$hpdate.':'.$mpdate;

$actual_time2=$ms['day'].'-'.$ms['month'].'-'.$ms['year'];

$actual_time=new DateTime($actual_time2);
$compared_time=new DateTime($datev);

$td_calendar2=$actual_time->diff($compared_time);
$td_calendar=$td_calendar2->format('%R%Y');
	
}

$date2=td_calendar($date2);

$explode=explode('{}',$date2);
$explode1=$explode[1];
$explode1=strtolower($explode1);

$explode1=str_replace(' ','',$explode1);



if(!isset(${'arri'.$explode1})){
${'arri'.$explode1}=array();
$val=retval($explode1);
//$echo.= $val.'<br>';
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
${'arri'.$explode1}[$explode0]=$explode[2].'<>'.$ms['id'].'<>'.$td_calendar;	



}
?>
<?php
$params['style']='
<style type="text/css">
body{font-family:\'lucida grande\', verdana, arial, tahoma, sans-serif;font-size:11px;color:#333333;}
.friendslink a:link{
font-size:11px;font-weight:bold;color:#3b5998;text-decoration:none;
}
.friendslink a:visited{
font-size:11px;font-weight:bold;color:#3b5998;text-decoration:none;
}
.friendslink a:active{
font-size:11px;font-weight:bold;color:#3b5998;text-decoration:underline;
}
.friendslink a:hover{
font-size:11px;font-weight:bold;color:#3b5998;text-decoration:underline;
}
.showm{
display:block;
padding:10px 15px;
background-color:rgb(237,239,244);
border:1px solid rgb(216,223,234);
cursor:pointer;
color:#3b5998;
text-decoration:none;
text-align:center;
word-wrap:break-word;	
}
.showm:hover{
background-color:#d9edf7;
text-decoration:underline;
}
.cajita{
background-image:url("/images/UHJpKXwJO7s.png");
background-repeat:no-repeat;
background-position:-36px -118px;
height:17px;
width:16px;
display:inline-block;
line-height:20px;
position:absolute;
left:0;
top:2px;	
}
.cajitav{
background-image:url("/images/UoiWcNiokdd.png");
background-repeat:no-repeat;
background-position:-34px -136px;
height:15px;
display:inline-block;
width:16px;
position:absolute;
left:0;
top:2px;
line-height:20px;
}
.lupawrapper{
background-image:url("/images/0VDksn8o5BR.png");
backround-repeat:no-repeat;
background-position:right -49px;
max-width:169px;
padding-right:23px;
vertical-align:top;
background-color:rgb(238,238,238);
border:1px solid;
border-color:rgb(153,153,153) rgb(153,153,153) rgb(136,136,136);
-moz-border-colors:none;
-moz-border-image:none;
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);	
width:16px;
height:20px;
cursor:pointer;
display:inline-block;
}
.lupawrapperv{
background-image:url("/images/0VDksn8o5BR.png");
backround-repeat:no-repeat;
background-position:right -294px;
max-width:169px;
padding-right:23px;
vertical-align:top;
background-color:#6d84b4;
border:1px solid;
border-color:rgb(153,153,153) rgb(153,153,153) rgb(136,136,136);
-moz-border-colors:none;
-moz-border-image:none;
box-shadow:0pt 1px 0pt rgba(0,0,0,0.1);	
width:16px;
height:20px;
cursor:pointer;
display:inline-block;
}
.lupa{
margin-left:-1px;
margin-right:-1px;
margin-top;2px;
vertical-align:top;
width:11px;
height:14px;
background-position:-11px -26px;
background-image:url("/images/0kaczSPjaB8.png");
background-repeat:no-repeat;
display:inline-block;
position:relative;
left:7px;
top:4px;
}
.lupav{
margin-left:-1px;
margin-right:-1px;
margin-top;2px;
vertical-align:top;
width:11px;
height:14px;
background-position:0px -26px;
background-image:url("/images/0kaczSPjaB8.png");
background-repeat:no-repeat;
display:inline-block;
position:relative;
left:7px;
top:4px;	
}
.leventswrapper{
border-width:1px 1px 2px;
border-style:solid;
border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);
-moz-border-colors:none;
-moz-border-image:none;
background-color:#ffffff;
padding:3px 0pt 4px;
overflow-y:auto;
word-wrap:break-word;
}
.itemanchor{
background:url("/images/6NHt8H5uyPf.png") no-repeat scroll left 4px transparent;
font-weight:bold;
border-style:solid;
border-color:#ffffff;
-moz-border-colors:none;
-moz-border-image:none;
border-width:1px 0pt;
color:rgb(17,17,17);
display:block;
line-height:16px;
padding:1px 16px 1px 22px;
cursor:pointer;
white-space:nowrap;	
font-size:11px;
}
.itemanchorv{
border-style:solid;
border-color:#ffffff;
border-width:1px 0pt;
color:rgb(17,17,17);
-moz-border-colors:none;
-moz-border-image:none;
display:block;
font-weight:normal;
line-height:16px;
padding:1px 16px 1px 22px;
text-decoration:none;
cursor:pointer;
white-space:nowrap;
word-wrap:break-word;
font-size:11px;	
}
.menuseparator{
border-bottom:1px solid rgb(221,221,221);
margin:5px 7px 6px;
padding-top:1px;
list-style-type:none;
word-wrap:break-word;	
}
.itemanchor:hover{
background:url("/images/6NHt8H5uyPf.png") no-repeat scroll left 4px #6d84b4;
font-weight:bold;
border-style:solid;
border-color:#ffffff;
-moz-border-colors:none;
-moz-border-image:none;
border-width:1px 0pt;
display:block;
line-height:16px;
padding:1px 16px 1px 22px;
cursor:pointer;
white-space:nowrap;	
font-size:11px;
background-position:0px -56px;
color:#ffffff;
}
.itemanchorv:hover{
background:#6d84b4;
color:#ffffff;	
}
</style>';
$echo.='
        <script type="text/javascript">
		function lupav(){
		if($("#lupav").hasClass("lupawrapper")){
		$("#lupav").removeClass("lupawrapper");
		$("#lupav").addClass("lupawrapperv");	
		$("#lupa").removeClass("lupa");
		$("#lupa").addClass("lupav");
		$(".leventswrapper").show();
		}
		else{
		$("#lupav").removeClass("lupawrapperv");
		$("#lupav").addClass("lupawrapper");	
		$("#lupa").removeClass("lupav");
		$("#lupa").addClass("lupa");
		$(".leventswrapper").hide();
		}
		}
		function showupcoming(){	
		$("#birthdaysicon").removeClass("cajitav");
		$("#birthdaysicon").addClass("cajita");
		$("#h2title").html("Events");	
		$("#upcomingl").removeClass("itemanchorv");
		$("#upcomingl").addClass("itemanchor");
		$("#birthdaysl").removeClass("itemanchor");
		$("#birthdaysl").addClass("itemanchorv");
		$("#upcomingeventsw").css("display","block");
		$("#birthdaysw").css("display","none");
				$("#lupav").removeClass("lupawrapperv");
		$("#lupav").addClass("lupawrapper");	
		$("#lupa").removeClass("lupav");
		$("#lupa").addClass("lupa");
		$(".leventswrapper").hide();
		}
		function showbirthdays(){	
		$("#birthdaysicon").removeClass("cajita");
		$("#birthdaysicon").addClass("cajitav");
		$("#h2title").html("Birthdays");	
		$("#upcomingl").removeClass("itemanchor");
		$("#upcomingl").addClass("itemanchorv");
		$("#birthdaysl").removeClass("itemanchorv");
		$("#birthdaysl").addClass("itemanchor");
		$("#upcomingeventsw").css("display","none");
		$("#birthdaysw").css("display","block");
				$("#lupav").removeClass("lupawrapperv");
		$("#lupav").addClass("lupawrapper");	
		$("#lupa").removeClass("lupav");
		$("#lupa").addClass("lupa");
		$(".leventswrapper").hide();
		}
		
		</script>';

if(isset($_GET['bt'])){
$getbts='v';
$getbts2='';
$getbtd='block';
$getbtd2='none';
$getbtt='Birthdays';
$getbtc='cajitav';
}
else{
$getbts='';
$getbts2='v';	
$getbtd='none';
$getbtd2='block';
$getbtt='Events';
$getbtc='cajita';
}
$echo.='
<div style="display:inline-block;margin-left:20px;">
<div style="margin:0;pading:0;padding-left:22px;height:34px;position:relative;line-height:20px;min-height:20px;padding-bottom:2px;vertical-align:bottom;outline:medium none;font-size:16px;color:rgb(28,42,71);word-wrap:break-word;font-family:\'lucida grande\',tahoma,arial,verdana,sans-serif;font-weight:bolder;width:578px;">
<div class="'.$getbtc.'" id="birthdaysicon"></div><div style="display:inline-block;margin:0;padding:0;" id="h2title">'.$getbtt.'</div><div class="lupawrapper" style="position:absolute;right:0;" onClick="lupav();" id="lupav"><div class="lupa" id="lupa"></div></div>
<div style="display:none;position:absolute;right:0;" class="leventswrapper">
<div class="itemanchor'.$getbts.'" id="upcomingl" onClick="showupcoming();">Upcoming Events</div>
<ul style="list-style-type:none;padding:0;margin:0;"><li class="menuseparator"></li></ul>
<div class="itemanchor'.$getbts2.'" id="birthdaysl" onClick="showbirthdays();">Birthdays</div>
<ul style="list-style-type:none;padding:0;margin:0;"><li class="menuseparator"></li></ul>
</div>
</div>';

function recompose($val){
	$year=date("Y");
	$yearv=$year+1;
if($val=='today'){$val='Today';}
else if($val=='tomorrow'){$val='Tomorrow';}
else if($val=='thisweek'){$val='This Week';}
else if($val=='lthisweek'){$val='Later This Week';}
else if($val=='nextweek'){$val='Next Week';}
else if($val=='january'){$val='January';}
else if($val=='february'){$val='February';}
else if($val=='march'){$val='March';}
else if($val=='april'){$val='April';}
else if($val=='may'){$val='May';}
else if($val=='june'){$val='June';}
else if($val=='july'){$val='July';}
else if($val=='august'){$val='August';}
else if($val=='september'){$val='September';}
else if($val=='october'){$val='October';}
else if($val=='november'){$val='November';}
else if($val=='december'){$val='December';}
else if($val=='january'.$yearv){$val='January'.' '.$yearv;}
else if($val=='february'.$yearv){$val='February'.' '.$yearv;}
else if($val=='march'.$yearv){$val='March'.' '.$yearv;}
else if($val=='april'.$yearv){$val='April'.' '.$yearv;}
else if($val=='may'.$yearv){$val='May'.' '.$yearv;}
else if($val=='june'.$yearv){$val='June'.' '.$yearv;}
else if($val=='july'.$yearv){$val='July'.' '.$yearv;}
else if($val=='august'.$yearv){$val='August'.' '.$yearv;}
else if($val=='september'.$yearv){$val='September'.' '.$yearv;}
else if($val=='october'.$yearv){$val='October'.' '.$yearv;}
else if($val=='november'.$yearv){$val='November'.' '.$yearv;}
else if($val=='december'.$yearv){$val='December'.' '.$yearv;}
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

$echo.='
<script type="text/javascript">
function showmv(){
	var showmcurrent=$("#showmcurrentv").html();
	var contval=$("#contvalv").html();
$.ajax({
  type: "POST",
  url: "moreevents.php",
  data: { showmcurrent : showmcurrent, contval: contval  },
  success: function(response) {
if(response.length>0){
var res=response.split("<>");
$("#morebirthdaysv").css("display","block");
$("#morebirthdaysv").append(res[1]);
$("#showmcurrentv").html(res[0]);
$("#contvalv").html(res[2]);
}
  }
});	
}
</script>
<input type="hidden" id="showmtotal" value="'.$acount.'">

<script type="text/javascript">
$("#showmtotal").val("'.$acount.'");
</script>
';

$echo.= '<div style="margin:0;padding:0;display:'.$getbtd2.';" id="upcomingeventsw">';
$contval='';
$pcount=1;
foreach($possiblevalues as $key => $value){
if($value=='today' || $value=='tomorrow' || $value=='thisweek' || $value=='nextweek'){
$count=0;
$border='1';
if(isset($finish)){break;}
foreach(${'arri'.$value} as $keyv=> $value2){
if(${'arri'.$value.'v'}==$count){$border='0';}
	$count++;
if($pcount>20){$finish='t'; break;}
if(!isset(${'$echo.=v'.$value})){
	${'$echo.=v'.$value}='';
	if($value=='thisweek' && isset($setf)){$valuev='Later This Week';}
	else{$valuev=recompose($value);}
	if($value=='tomorrow' || $value=='today'){$setf='t';}
	$contval.=$value.',';
	$echo.= '<div style="width:590px;padding:5px;margin:0;background:#f2f2f2;font-weight:bold;font-size:11px;border-top:1px solid #e2e2e2;">'.$valuev.'</div>';
	}

$list=explode("<>",$value2);

$date=$list[0];
$id=$list[1];
$yearsold=$list[2];
$yearsold=str_replace('+','',$yearsold);

$result=mysql_query("SELECT * FROM registered WHERE id='$id'");
while($ms=mysql_fetch_array($result)){
$uo_pic=$ms['profilepict'];
$uo_fn=$ms['fullname'];
$uo_un=$ms['username'];
if($uo_un==''){$uo_un=$id;}
}
$echo.= '<div style="width:590px;padding:10px 5px;margin:0;background:#ffffff;border-bottom:'.$border.'px solid #e9e9e9;" class="friendslink">
<div style="margin:0;padding:0;display:inline-block;">
<a href="/'.$uo_un.'">
<img src="/'.$id.'/pics/'.$uo_pic.'" style="height:50px;width:50px;">
</a>
</div>
<div style="margin:0;padding:0;display:inline-block;vertical-align:top;padding-top:2px;padding-left:7px;"><a hc=""  href="/'.$uo_un.'">'.$uo_fn.'</a><div style="margin:0;padding:0;">'.$date.'</div><div style="margin:0;padding:0;color:#808080;">'.$yearsold.' years old</div></div>
</div>';	
$pcount++;
}


}
	
	}
	
	if(isset($finish)){
		$echo.='<div id="morebirthdaysv" style="display:none;margin:0;padding:0;"></div><div style="display:none;" id="showmcurrentv">20</div><div class="showm" style="width:570px;" onclick="showmv();">Show More</div><div id="contvalv" style="display:none;">'.$contval.'</div>'; 
	}
	$echo.= '</div>';
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$echo.='
<script type="text/javascript">
function showm(){
	var showmcurrent=$("#showmcurrent").html();
	var contval=$("#contval").html();
$.ajax({
  type: "POST",
  url: "morebirthdays.php",
  data: { showmcurrent : showmcurrent, contval: contval  },
  success: function(response) {
	  //alert(response);
if(response.length>0){
var res=response.split("<>");
$("#morebirthdays").css("display","block");
$("#morebirthdays").append(res[1]);
$("#showmcurrent").html(res[0]);
$("#contval").html(res[2]);
}
  }
});	
}
</script>
<input type="hidden" id="showmtotal" value="'.$acount.'">

<script type="text/javascript">
$("#showmtotal").val("'.$acount.'");
</script>
';

$echo.='<div id="birthdaysw" style="margin:0;padding:0;display:'.$getbtd.';">';
$contval='';
$pcount=1;
foreach($possiblevalues as $key => $value){
$count=0;
$border='1';
if(isset($finishv)){break;}
foreach(${'arri'.$value} as $keyv=> $value2){
if(${'arri'.$value.'v'}==$count){$border='0';}
	$count++;
if($pcount>20){$finishv='t'; break;}
if(!isset(${'$echo.='.$value})){
	${'$echo.='.$value}='';
	if($value=='thisweek' && isset($setfv)){$valuev='Later This Week';}
	else{$valuev=recompose($value);}
	if($value=='tomorrow' || $value=='today'){$setfv='t';}
	$contval.=$value.',';
	$echo.= '<div style="width:590px;padding:5px;margin:0;background:#f2f2f2;font-weight:bold;font-size:11px;border-top:1px solid #e2e2e2;">'.$valuev.'</div>';
	}

$list=explode("<>",$value2);

$date=$list[0];
$id=$list[1];
$yearsold=$list[2];
$yearsold=str_replace('+','',$yearsold);

$result=mysql_query("SELECT * FROM registered WHERE id='$id'");
while($ms=mysql_fetch_array($result)){
$uo_pic=$ms['profilepict'];
$uo_fn=$ms['fullname'];
$uo_un=$ms['username'];
if($uo_un==''){$uo_un=$id;}
}
$echo.= '<div style="width:590px;padding:10px 5px;margin:0;background:#ffffff;border-bottom:'.$border.'px solid #e9e9e9;" class="friendslink">
<div style="margin:0;padding:0;display:inline-block;">
<a href="/'.$uo_un.'">
<img src="/'.$id.'/pics/'.$uo_pic.'" style="height:50px;width:50px;">
</a>
</div>
<div style="margin:0;padding:0;display:inline-block;vertical-align:top;padding-top:2px;padding-left:7px;"><a hc=""  href="/'.$uo_un.'">'.$uo_fn.'</a><div style="margin:0;padding:0;">'.$date.'</div><div style="margin:0;padding:0;color:#808080;">'.$yearsold.' years old</div></div>
</div>';	
$pcount++;
}


	
	}
	
	if(isset($finishv)){
	$echo.='<div id="morebirthdays" style="display:none;margin:0;padding:0;"></div><div style="display:none;" id="showmcurrent">20</div><div class="showm" style="width:570px;" onclick="showm();">Show More</div><div id="contvalv" style="display:none;">'.$contval.'</div>'; 
	}
	$echo.='</div>';

$echo.='</div>';
$params['rhelper_js']='';
$params['rhelper']='';
$params['title']='Upfrev';

$params['layout']='right_column_n';
$params['left_link_n']='events';


include("end.php");
?>