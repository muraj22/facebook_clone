<?php
if(!function_exists("td")){

if(!function_exists("rtd")){
function rtd($date){$date=tod($date);
	
  return date('l, F j, Y \a\t g:ia', strtotime($date));
}
}

function turndate($date){$date=tod($date);
  return date('F j \a\t g:ia', strtotime($date));
}

function turndatev($date){$date=tod($date);
  return date('l \a\t g:ia', strtotime($date));
}

function turndate3($date){$date=tod($date);
  return date('g:ia', strtotime($date));
}

function td($topv){
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

	if($suf==' days' && $td<7){$td=turndatev($topv); return $td;}
else if($suf==' days' && $td>6){$td=turndate($topv); return $td;}

if($suf==' second' || $suf==' seconds'){
return 'a few seconds ago';	
}

$td=$td.$suf.' ago';	

	if($td=='1 day ago'){$hrsminsec=turndate3($topv); $td='Yesterday at '.$hrsminsec;}
	return $td;
}

function turndate4_dfn($date){$date=tod($date);
  return date('F j', strtotime($date));
}
function turndate4($date){$date=tod($date);
  return date('l', strtotime($date));
}

function turndate5($date){$date=tod($date);
  return date('l', strtotime($date));
}

function td5($topv){
$topv=tod($topv);

$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%Y'); $suf="year";
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%m'); $suf='month';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf='day';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf='hour';}
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf='minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf='second';}
if($td=='+0' || $td=='-0'){$td='1';}

$td=str_replace('-','',$td);
$td=str_replace('+','',$td);

$sufv=$suf;
if($td>1){$sufv.='s';}

if($sufv=="day" && $topv>=strtotime("yesterday")){}
else if($sufv=="day"){$td=2;}


$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}
if($suf=='day' && $td>1 && $td<7){$suf='this_week';}
else if($suf=='day' && $td>=7 && $td<14){$suf='past';}
else if($suf=='month' || $suf=='year' || $suf=='day' && $td>=14){$suf='wpast';}
else if($suf=="day" || $suf=='second' || $suf=='minute' || $suf=='hour'){$suf='today';}
	return $suf;
}
}
?>