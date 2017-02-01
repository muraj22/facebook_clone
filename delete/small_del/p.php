<?php
$photoid2=$likeid;

$uidvp="media";


$resulto=mysql_query("SELECT * FROM $uidvp WHERE id='$uidv' AND sbid='$photoid2'");
$counti=mysql_num_rows($resulto);
echo $counti;
if($counti>0){
while($mso=mysql_fetch_array($resulto)){
$pic=$mso['pics'];	
$alb=$mso['albumid'];
$albn=$mso['albumn'];
$photoid=$mso['sbid'];
}

mysql_query("UPDATE $uidvp SET visibility='s' WHERE sbid='$photoid' AND id='$uidv'");
mysql_query("UPDATE tags SET visibility='s' WHERE photoid='$photoid'");

$result2=mysql_query("SELECT * FROM media WHERE albumid='$alb' AND sbid='$photoid' AND id='$uidv'");
while($ms2=mysql_fetch_array($result2)){	
$antorder=$ms2['norder'];
}

$result=mysql_query("SELECT * FROM media WHERE albumid='$alb' AND id='$uidv' AND visibility='v' ORDER BY norder ASC");
while($ms=mysql_fetch_array($result)){
$pid=$ms['sbid'];
if($ms['norder']>$antorder){$mnorder=$ms['norder']-1;
mysql_query("UPDATE media SET norder='$mnorder',oldorder='$mnorder' WHERE albumid='$alb' AND sbid='$pid'");
if($mnorder=='1'){$actual_pic3=$ms['picsa'];}	
}
}

mysql_query("UPDATE media SET norder='-1', oldorder='-1' WHERE albumid='$alb' AND sbid='$photoid' AND id='$uidv'");



if($albn=='Profile Pictures' AND $antorder==1){
	$result=mysql_query("SELECT * FROM registered WHERE id='$uidv'");
	while($ms=mysql_fetch_array($result)){
	$gender=$ms['gender'];
	if($gender=='1'){$actual_pic3='incognitof.gif';}
	else{$actual_pic3='incognitom.gif';}	
	}
	mysql_query("UPDATE registered SET profilepic='$actual_pic3',profilepict='$actual_pic3' WHERE id='$uidv'");
	mysql_query("UPDATE options SET lcords='',tcords='' WHERE id='$uidv'");
	}

}


?>