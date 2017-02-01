<?php
ignore_user_abort(true);
 include("start.php"); ?>
<?php
$amigo=$_POST['amigo'];

$uidv=$amigo;
include("uidvvariables.php");

$con = mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM friends WHERE id='$uid' AND confirmed='y'"));
$c=$c['c'];
if($c>=5000){exit();}

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM friends WHERE id='$amigo' AND confirmed='y'"));
$c=$c['c'];
if($c>=5000){exit();}

mysql_query("UPDATE friends SET confirmed='y' WHERE id='$uid' AND id2='$amigo'");
mysql_query("UPDATE friends SET confirmed='y',confirmedrecently='y',datetimep=UNIX_TIMESTAMP() WHERE id='$amigo' AND id2='$uid'");

$uti=sb_user($uid);
$utiv=sb_user($amigo);
$p=array();
$p['s']=$uti['fullname'].' confirmed you as a friend on Upfrev';
$p['m']='<table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:98%" border="0"><tbody><tr><td style="font-size:12px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px"><tbody><tr><td style="font-size:16px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;background:#3b5998;color:#ffffff;font-weight:bold;vertical-align:baseline;letter-spacing:-0.03em;text-align:left;padding:5px 20px"><a style="text-decoration:none" href="http://www.subsbook.com/'.$uti['username'].'" target="_blank"><span style="background:#3b5998;color:#ffffff;font-weight:bold;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;vertical-align:middle;font-size:16px;letter-spacing:-0.03em;text-align:left;vertical-align:baseline">upfrev</span></a></td></tr></tbody></table><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:620px" border="0" width="620px"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px;background-color:#f2f2f2;border-left:none;border-right:none;border-top:none;border-bottom:none"><table cellspacing="0" cellpadding="0" width="620px" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px;width:620px"><table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:20px;background-color:#fff;border-left:none;border-right:none;border-top:none;border-bottom:none"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td valign="top" style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-right:15px;text-align:left"><a href="http://www.subsbook.com/'.$uti['username'].'" style="color:#3b5998;text-decoration:none" target="_blank"><img style="border:0;max-width:50px;" src="http://www.subsbook.com/'.$uti['id'].'/pics/'.$uti['profilepict'].'"></a></td><td valign="top" style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;width:100%;text-align:left"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif"><span style="color:#111111;font-size:13px;font-weight:bold">'.$utiv['f_name'].', <a href="http://www.subsbook.com/'.$uti['username'].'" style="color:#3b5998;text-decoration:none" target="_blank">'.$uti['fullname'].'</a> has confirmed that you\'re friends on Upfrev.</span></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px;width:620px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%" border="0"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:7px 20px;background-color:#f2f2f2;border-left:none;border-right:none;border-top:1px solid #ccc;border-bottom:1px solid #ccc"><table cellspacing="0" cellpadding="0"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-left:65px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="border-width:1px;border-style:solid;border-color:#29447e #29447e #1a356e;background-color:#5b74a8"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:2px 6px 4px;border-top:1px solid #8a9cc2"><a href="http://www.subsbook.com/'.$uti['username'].'" style="color:#3b5998;text-decoration:none" target="_blank"><span style="font-weight:bold;white-space:nowrap;color:#fff;font-size:13px">View Profile</span></a></td></tr></tbody></table></td></tr></tbody></table></td><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:0px 5px"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>{footer}<span style="width:620px"><img style="border:0;width:1px;min-height:1px"></span></td></tr></tbody></table>';
$p['t']=$utiv['email'];
$p['f']='Upfrev';
$p['e']='notification+'.grs(15).'@upfrevmail.com';
sbmail($p);


$r=mysql_query("SELECT * FROM lists WHERE id='$uid' AND location!='' AND visibility='v' AND location in (SELECT location FROM lists WHERE id='$uidv' AND location!='' AND visibility='v')  ORDER BY datetimep DESC LIMIT 50");
while($m=mysql_fetch_array($r)){
$listid=$m['sbid'];
$location=$m['location'];
$r3=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND id2='$uidv' AND location='$location'");
$c3=mysql_num_rows($r3);
if($c3==0){
mysql_query("INSERT INTO lists_members (id,id2,listid,type,visibility,location,byw,privacy,privacyh,relation,relation_confirmed,datetimep) VALUES('$uid','$uidv','$listid','location','v','$location','m','','','','',UNIX_TIMESTAMP())");
}
else{
mysql_query("UPDATE lists_members SET visibility='v' WHERE id='$uid' AND id2='$uidv' AND location='$location'");	
}
$r2=mysql_query("SELECT * FROM lists WHERE id='$uidv' AND location='$location'");
while($m2=mysql_fetch_array($r2)){
$listid=$m2['sbid'];	
}
$r3=mysql_query("SELECT * FROM lists_members WHERE id='$uidv' AND id2='$uid' AND location='$location'");
$c3=mysql_num_rows($r3);
if($c3==0){
mysql_query("INSERT INTO lists_members (id,id2,listid,type,visibility,location,byw,privacy,privacyh,relation,relation_confirmed,datetimep) VALUES('$uidv','$uid','$listid','location','v','$location','m','','','','',UNIX_TIMESTAMP())");
}
else{
mysql_query("UPDATE lists_members SET visibility='v' WHERE id='$uid' AND id2='$uidv' AND location='$location'");	
}
}

echo'1';
?>
<?php include("end.php"); ?>