<?php
if(!function_exists("td_fn")){
function turndatefp($date){$date=tod($date);
  return date('F j', strtotime($date));
}
function rtd_note($date){$date=tod($date);
  return date('l, F j, Y \a\t g:ia', strtotime($date));
}
function turndatev_fn($date){$date=tod($date);
  return date('l, F j, Y', strtotime($date));
}
function turndatevv_fn($date){$date=tod($date);
  return date('l', strtotime($date));
}

function td_fn($topv){
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

if($td>1){$suf.='s';}


if($suf==" day" && $topv>=strtotime("yesterday")){}
else if($suf==" day"){$suf=' days'; $td=2;}

if($suf==' hour'){
return 'about an hour ago';
}


		
if($suf==' day' && $topv>=strtotime("yesterday")){
return 'Yesterday';	
}

if($suf==' days' && $td<7){
$td=turndatevv_fn($topv); return $td;	
}

	if($suf!=' hours' AND $suf!=' hour' AND $suf!=' seconds' AND $suf!=' second' AND $suf!=' minutes' AND $suf!=' minute' AND $suf!=' years' AND $suf!=' year'){$td=turndatefp($topv); return $td;}
else if($suf==" years" OR $suf==" year"){
$td=turndatev_fn($topv); return $td;
}

if($suf==' second' || $suf==' seconds'){
return 'a few seconds ago';	
}

$td=$td.$suf.' ago';	


	return $td;
}	
}
?>