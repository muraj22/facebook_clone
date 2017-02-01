<?php  
$ig_abort='t';
include("start.php");
$uidv=$_POST['uidv'];

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


$r=mysql_query("SELECT * FROM friends WHERE id='$uid' AND id2='$uidv'");
$c=mysql_num_rows($r);
if($c==0){
mysql_query("INSERT INTO friends (id,id2,confirmed,confirmedrecently,removealert,datetimep,datetimepv,cv)
VALUES ('$uid','$uidv','n','NULL','NULL',UNIX_TIMESTAMP(),UNIX_TIMESTAMP(),'1')");

$likeid=mysql_insert_id();
$ltype='n_friends';
include("stories/like_insert.php");
}
else{
mysql_query("UPDATE friends SET datetimep=UNIX_TIMESTAMP(), confirmed='n', confirmedrecently='NULL', removealert='NULL' WHERE id2='$uidv' AND id='$uid'");
}
$uti=sb_user($uidv);
$utiv=sb_user($uid);

$dpic=$utiv['profilepic'];
$dpic=str_replace("a.","_s.",$dpic);

$p=array();
$p['s']=$utiv['fullname'].' wants to be friends on Upfrev';
$p['m']='<table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:98%" border="0"><tbody><tr><td style="font-size:12px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px"><tbody><tr><td style="font-size:16px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;background:#3b5998;color:#ffffff;font-weight:bold;vertical-align:baseline;letter-spacing:-0.03em;text-align:left;padding:5px 20px"><a style="text-decoration:none" href="http://www.subsbook.com/reqs.php" target="_blank"><span style="background:#3b5998;color:#ffffff;font-weight:bold;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;vertical-align:middle;font-size:16px;letter-spacing:-0.03em;text-align:left;vertical-align:baseline">upfrev</span></a></td></tr></tbody></table><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px" border="0" width="620px"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px;background-color:#f2f2f2;border-left:none;border-right:none;border-top:none;border-bottom:none"><table cellspacing="0" cellpadding="0" width="620px" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px;width:620px"><table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:20px;background-color:#fff;border-left:none;border-right:none;border-top:none;border-bottom:none"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td valign="top" style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-right:15px;text-align:left"><a href="http://www.subsbook.com/reqs.php" style="color:#3b5998;text-decoration:none" target="_blank"><img style="border:0;max-width:68px;" src="http://www.subsbook.com/users/'.$utiv['id'].'/pics/'.$dpic.'"></a></td><td valign="top" style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;width:100%;text-align:left"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-bottom:2px"><span style="color:#111111;font-size:14px;font-weight:bold"><a href="http://www.subsbook.com/reqs.php" style="color:#3b5998;text-decoration:none" target="_blank">'.$utiv['fullname'].'</a> wants to be friends with you on Upfrev.</span></td></tr><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-top:1px;padding-bottom:2px"></td></tr><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-top:1px"><span style="color:#333333"><span>';

$utiv['friends']=count($uid_friends);
$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM nt WHERE id='$uid' AND visibility='v' AND (privacy='0' OR privacy='1')"));
$c=$c['c'];
$utiv['notes']=$c;
if($utiv['friends']>0){
$p['m'].=$utiv['friends'].' friends';	
if($utiv['notes']>0){
$p['m'].=' &#183; '.$utiv['notes'].' notes';	
}
}

$p['m'].='</span></span></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px;width:620px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%" border="0"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:7px 20px;background-color:#f2f2f2;border-left:none;border-right:none;border-top:1px solid #ccc;border-bottom:1px solid #ccc"><table cellspacing="0" cellpadding="0"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-left:83px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="border-width:1px;border-style:solid;border-color:#29447e #29447e #1a356e;background-color:#5b74a8"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:2px 6px 4px;border-top:1px solid #8a9cc2"><a href="http://www.subsbook.com/reqs.php" style="color:#3b5998;text-decoration:none" target="_blank"><span style="font-weight:bold;white-space:nowrap;color:#fff;font-size:13px">Confirm Request</span></a></td></tr></tbody></table></td></tr></tbody></table></td><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px 5px"></td><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:7px 0px 6px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="border-width:1px;border-style:solid;border-color:#999 #999 #888;background-color:#eee"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:2px 6px 4px;border-top:1px solid #fff"><a href="http://www.subsbook.com/reqs.php" style="color:#3b5998;text-decoration:none" target="_blank"><span style="font-weight:bold;white-space:nowrap;color:#333;font-size:13px">See All Requests</span></a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>{footer}<span style="width:620px"><img style="border:0;width:1px;min-height:1px"></span></td></tr></tbody></table>';
$p['t']=$uti['email'];
$p['f']='Upfrev';
$p['e']='notification+'.grs(15).'@upfrevmail.com';
sbmail($p);

$r=mysql_query("SELECT * FROM friends WHERE id='$uidv' AND id2='$uid'");
$c=mysql_num_rows($r);

if($c==0){
mysql_query("INSERT INTO friends (id,id2,confirmed,confirmedrecently,removealert,datetimep,datetimepv,cv)
VALUES ('$uidv','$uid','nc','NULL','NULL',UNIX_TIMESTAMP(),UNIX_TIMESTAMP(),'1')");

$likeid=mysql_insert_id();
$ltype='n_friends';
include("stories/like_insert.php");
}
else{
mysql_query("UPDATE friends SET datetimep=UNIX_TIMESTAMP(),confirmed='nc',confirmedrecently='NULL',removealert='NULL' WHERE id2='$uid' AND id='$uidv'");
}

$uidcc=$uid.'cc';
$uidvcc=$uidv.'cc';
mysql_query("INSERT INTO $uidcc (datetimep,who,whos,istypying)
VALUES(UNIX_TIMESTAMP(),'$uid','$uidv','false')");

mysql_query("INSERT INTO $uidcc (datetimep,who,whos,istypying)
VALUES(UNIX_TIMESTAMP(),'$uidv','$uid','false')");

mysql_query("INSERT INTO $uidvcc (datetimep,who,whos,istypying)
VALUES(UNIX_TIMESTAMP(),'$uid','$uidv','false')");

mysql_query("INSERT INTO $uidvcc (datetimep,who,whos,istypying)
VALUES(UNIX_TIMESTAMP(),'$uidv','$uid','false')");
/*
echo'Friend succesfully added
<script type="text/javascript">
window.location="/'.$uidv.'/";
</script>';
*/
include("end.php");
?>