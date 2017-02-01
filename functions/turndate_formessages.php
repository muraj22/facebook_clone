<?php
if(!function_exists("turndate4_messages")){
function turndate4_messages($topv){
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
	
	if($suf==" year"){
	return date("n/j/y",strtotime($topv));	//2/3/11
	}
	else if($suf==" hour"){
	return date("g:m"."a",strtotime($topv));	// 5:30am
	}
	
  return date('M j', strtotime($topv)); //default jan 1
}
}
?>