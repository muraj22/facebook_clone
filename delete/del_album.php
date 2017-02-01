<?php 
ignore_user_abort(true);
include("start.php");
?>
<?php

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$alb=$_POST['alb'];

$r=mysql_query("SELECT * FROM albums WHERE id='$uid' AND sbid='$alb' AND albumn!='Profile Pictures' AND albumn!='Photos'");
$c=mysql_num_rows($r);
if($c==0){mysql_close($con); exit();}

if(isset($_GET['j'])){
$likeid=$_POST['photoid'];	

$uidvp=$uid.'p';

$resulto=mysql_query("SELECT * FROM media WHERE id='$uid' AND sbid='$likeid'");
$counti=mysql_num_rows($resulto);

if($counti>0){
while($mso=mysql_fetch_array($resulto)){
$pic=$mso['pics'];	
$alb=$mso['albumid'];
$albn=$mso['albumn'];
$photoid=$mso['sbid'];
}

mysql_query("UPDATE media SET visibility='d' WHERE id='$uid' AND sbid='$photoid'");
mysql_query("UPDATE tags SET visibility='d' WHERE photoid='$photoid'");

$result2=mysql_query("SELECT * FROM media WHERE id='$uid' AND albumid='$alb' AND sbid='$photoid'");
while($ms2=mysql_fetch_array($result2)){	
$antorder=$ms2['norder'];
}

$result=mysql_query("SELECT * FROM media WHERE id='$uid' AND albumid='$alb' AND visibility!='d' ORDER BY norder ASC");
while($ms=mysql_fetch_array($result)){
$pid=$ms['sbid'];
if($ms['norder']>$antorder){$mnorder=$ms['norder']-1;
mysql_query("UPDATE media SET norder='$mnorder',oldorder='$mnorder' WHERE id='$uid' AND albumid='$alb' AND sbid='$pid'");
if($mnorder=='1'){$actual_pic3=$ms['picsa'];}	
}
}

mysql_query("UPDATE media SET norder='-1', oldorder='-1' WHERE id='$uid' AND sbid='$photoid'");

}

mysql_close($con);
exit();


}

if(isset($_GET['i'])){
$uidvp=$uid.'p';

$photoid=$_POST['photoid'];

$result=mysql_query("SELECT * FROM media WHERE id='$uid' AND albumid='$alb' AND sbid='$photoid'");
while($ms=mysql_fetch_array($result)){
$pic=$ms['pics'];	
$antorder=$ms['norder'];
}

mysql_query("UPDATE media SET visibility='d' WHERE id='$uid' AND albumid='$alb' AND sbid='$photoid'");
mysql_query("UPDATE tags SET visibility='d' WHERE id='$uid' AND photoid='$photoid'");
//rearrange

$result=mysql_query("SELECT * FROM media WHERE id='$uid' AND albumid='$alb' AND visibility!='d' ORDER BY norder ASC");
while($ms=mysql_fetch_array($result)){
$pid=$ms['sbid'];
if($ms['norder']>$antorder){$mnorder=$ms['norder']-1;
mysql_query("UPDATE media SET norder='$mnorder',oldorder='$mnorder' WHERE id='$uid' AND albumid='$alb' AND sbid='$pid'");
if($mnorder=='1'){$actual_pic3=$ms['picsa'];}		
}
}

mysql_query("UPDATE media SET norder='-1', oldorder='-1' WHERE id='$uid' AND albumid='$alb' AND sbid='$photoid'");

mysql_close($con);
exit();	
}

if(isset($_GET['p'])){

$astart=$_POST['astart'];
$aend=$_POST['aend'];
$nalbcover=$_POST['nalbcover'];

$uidvp=$uid.'p';
mysql_query("UPDATE media SET visibility='d' WHERE id='$uid' AND albumid='$alb' AND norder>$astart");
$r=mysql_query("SELECT * FROM media WHERE id='$uid' AND albumid='$alb' AND norder>$astart");
while($m=mysql_fetch_array($r)){
$dpid=$m['sbid'];
mysql_query("UPDATE media SET visibility='d' WHERE id='$uid' AND sbid='$dpid'");
mysql_query("UPDATE tags SET visibility='d' WHERE id='$uid' AND photoid='$dpid'");
}

mysql_close($con);
exit();

}

if(isset($_POST['t']) || isset($_GET['t'])){
	
mysql_query("UPDATE media SET visibility='d' WHERE id='$uid' and albumid='$alb'");	

$uidva=$uid.'a';
$uidvp=$uid.'p';
mysql_query("UPDATE albums SET visibility='d' WHERE id='$uid' AND sbid='$alb'");	

$r2=mysql_query("SELECT * FROM albums WHERE sbid='$alb' AND id='$uid'");
while($m2=mysql_fetch_array($r2)){	
$antorder=$m2['norder'];
}




$r=mysql_query("SELECT * FROM albums WHERE id='$uid' AND visibility!='d' ORDER BY norder DESC");
while($m=mysql_fetch_array($r)){
$aid=$m['sbid']; //aid albumid
if($m['norder']>$antorder){$mnorder=$m['norder']-1;
mysql_query("UPDATE albums SET norder='$mnorder',oldorder='$mnorder' WHERE sbid='$aid'");
}
}

mysql_query("UPDATE albums SET norder='-1',oldorder='-1' WHERE sbid='$alb' AND id='$uid'");

mysql_query("UPDATE media SET visibility='d' WHERE id='$uid' AND albumid='$alb'");
mysql_query("UPDATE tags SET visibility='d' WHERE id='$uid' AND albumid='$alb' AND id3='$uid'");	 //this is done for faster performance assuming up to 10,000 updates next
    $size = ob_get_length();    
    header("Content-Length: $size"); 
    header('Connection: close');    
    // ob_end_flush(); 
    flush();    
mysql_query("UPDATE tags SET visibility='d' WHERE id='$uid' AND albumid='$alb'");


mysql_close($con);
exit();

}



include("end.php");
?>