<?php 
include("functions/grs.php");
include("start.php");

$dk=$_POST['dk'];
$dk2=$_POST['dk2'];
$dk2v=$_POST['dk2'].'v';
$upload_dk="upload_progress_".$dk;
$start_time_dk="start_time".$dk;

$cl_dk="upload_cl_".$dk;


$agrs=$dk2.'read';

session_start();



if(isset($_SESSION[$upload_dk])){
$up=$_SESSION[$upload_dk];
$bp=$up['bytes_processed'];
$cl=$up['content_length'];

$start_time_dk="start_time".$dk;
if(empty($_SESSION[$start_time_dk])){

$_SESSION[$start_time_dk]=time()-1;


}


$_SESSION[$cl_dk]=$cl;


$stime=$_SESSION[$start_time_dk];

$ctime=time();
$etime=$ctime-$stime;

$rn=ceil(($bp / $cl)*100); 


$_SESSION[$dk2]=$rn; 

}
else{
if(!isset($_SESSION[$dk2])){

$_SESSION[$dk2]=0;

}
}

if(isset($etime)){
$etimed=$bp/$etime;
$etime_kb=$etimed/1024;

$seconds=$etime*100/$rn;
$seconds=$seconds-$etime;

$seconds=ceil($seconds);

$minutes=$seconds/60;

if($minutes>=1){
$minutes=ceil($minutes);	
}
else{
unset($minutes);	
}

if(isset($minutes) && $minutes>=60){
$hours=$minutes/60;	
}
if(isset($hours) && $hours>=1){
if(strpos($hours,".")===true){
$minutesv=explode(".",$hours);
$minutesv=".".$minutesv[1];
$minutesv=floatval($minutesv); //.755555
$minutesv=$minutesv*60;
if($minutesv<=1){$minutesv=ceil($minutesv);}
else{$minutesv=floor($minutesv);}
$hours=floor($hours);
}



}

if(isset($hours)){
	if($hours>1){$ps='s';}else{$ps='';}
	if(isset($minutesv)){
		if($minutesv>1){$psv='s';}else{$psv='';}
	$remaining=$hours.' hour'.$ps.', '.$minutesv.' minute'.$psv;	
	}
else{
$remaining=$hours.' hour'.$ps;	
}
}
else if(isset($minutes)){
if($minutes>1){$psv='s';}else{$psv='';}
$remaining=$minutes.' minute'.$psv;	
}
else{
if($seconds>1){$psv='s';}else{$psv='';}
$remaining=$seconds.' second'.$psv;		
}


$mgp=$bp/1048576;
$clm=$cl/1048576;

$mgp=round($mgp,2);
$clm=round($clm,2);

$etime_kb=round($etime_kb,2);


echo $mgp.' MB of '.$clm.' MB ('.$etime_kb.' KB/sec) -- '.$remaining.' remaining{}'; //echo"0.38 MB of 10.21 MB (195.31 KB/sec) -- 52 seconds remaining{}";
}
else if(isset($_SESSION[$dk2v])){
if(isset($_SESSION[$start_time_dk])){
$stime=$_SESSION[$start_time_dk];	
}
else{
$stime=time()-1;	
}
$ctime=time();
$etime=$ctime-$stime;

$bp=$_SESSION[$cl_dk];
$mgp=$bp/1048576;
$clm=$mgp;

$mgp=round($mgp,2);
$clm=round($clm,2);

$etimed=$bp/$etime;
$etime_kb=$etimed/1024;
$etime_kb=round($etime_kb,2);

echo $mgp.' MB of '.$clm.' MB ('.$etime_kb.' KB/sec){}';

$_SESSION[$dk2]=$_SESSION[$dk2v];

}
echo $_SESSION[$dk2].'{}';
if(isset($_SESSION[$dk2v])){

unset($_SESSION[$start_time_dk]);
unset($_SESSION[$dk2]);
unset($_SESSION[$dk2v]);

echo 'complete';
if(!isset($_SESSION)){
session_start();
}

echo '{}'.$css;

}
include("end.php");
?>
