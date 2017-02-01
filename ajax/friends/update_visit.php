<?php
$r=mysql_query("SELECT * FROM friends WHERE id2='$uid' AND id='$uidv' AND confirmed='y'");
$c=mysql_num_rows($r);
if($c>0){
//los que a mi me visitan - despues elijo de quienes yo soy amigo que me han visitado asi:
//$time=$time()-24*60*60*20;
//$r=mysql_query("(SELECT * FROM friends WHERE find_in_set(id2,$uid_friends_comma)>0 AND datetimepv>=$time ORDER BY cv DESC LIMIT 20) UNION (SELECT * FROM friends WHERE find_in_set($uid_friends_comma)>0 AND datetimepv<$time ORDER BY cv DESC LIMIT 20) ORDER BY datetimepv DESC LIMIT 20");
while($m=mysql_fetch_array($r)){
$last_visit=$m['datetimepv'];	
$cv=$m['cv'];
}

function td_dates($top,$topv){
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


$ctime=time();


$ok=td_dates($last_visit,$ctime);
if($ok=="belongs"){
$cv=$cv+1;
}
else{
$cv=0;	
}
mysql_query("UPDATE friends SET datetimepv=UNIX_TIMESTAMP(),cv='$cv' WHERE id2='$uid' AND id='$uidv'");
}
?>