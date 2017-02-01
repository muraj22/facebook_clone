<?php
include("start.php");
if($photos_ids!=""){
$photos_ids=substr($photos_ids,1);	
}
mysql_query("UPDATE media SET visibility='v' WHERE albumid='$sbid' AND FIND_IN_SET(sbid,'$photos_ids')>0 AND id='$uid'");
mysql_query("UPDATE tags SET visibility='v' WHERE albumid='$sbid' AND FIND_IN_SET(photoid,'$photos_ids')>0 AND visibility='h' AND id='$uid'");
mysql_query("UPDATE albums SET visibility='v',datetimep=UNIX_TIMESTAMP() WHERE sbid='$sbid' AND id='$uid'");

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM media WHERE albumid='$sbid' AND FIND_IN_SET(sbid,'$photos_ids')>0 AND visibility='v' AND id='$uid'"));
$c=$c['c'];

$xg=$c;

if($c==0){exit();}

$r=mysql_query("SELECT * FROM media WHERE albumid='$sbid' AND FIND_IN_SET(sbid,'$photos_ids')>0 AND visibility='v' AND id='$uid' LIMIT 1");
while($m=mysql_fetch_array($r)){
$pin=$m['pin'];
}

$uti=sb_user($uid);

if($pin==1){
$dtext='photo';
$dtextv='album';
$dhref='http://www.subsbook.com/'.$uti['username'].'/photos?album='.$sbid;
}else{
$dtext='pin';
$dtextv='board';
$dhref='http://www.subsbook.com/'.$uti['username'].'/pins?board='.$sbid;
}

if($xg==1){
$xg="a";
$ps="";
}else{
$ps="s";
}

$r=mysql_query("SELECT * FROM lists_members WHERE id2='$uid' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$utiv=sb_user($m['id']);
$email=$utiv['email'];

$p=array();
$p['s']=$uti['fullname'].' added '.$xg.' new '.$dtext.$ps;
$p['m']='<table cellpadding="0" cellspacing="0" border="0" width="620"><tbody><tr><td style="background:#3b5998;color:#ffffff;font-weight:bold;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;vertical-align:middle;padding:4px 8px;font-size:16px;letter-spacing:-0.03em;text-align:left"><a style="color:#ffffff;text-decoration:none" href="http://www.subsbook.com" target="_blank"><span style="color:#ffffff">subsbook</span></a></td><td style="background:#3b5998;color:#ffffff;font-weight:bold;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;vertical-align:middle;padding:4px 8px;font-size:11px;text-align:right"></td></tr><tr><td colspan="2" style="border-right:1px solid #cccccc;border-bottom:1px solid #3b5998;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;padding:15px;border-left:1px solid #cccccc" valign="top"><table width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td width="470" style="font-size:12px" valign="top" align="left"><div style="margin-bottom:15px;font-size:12px;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif">'.$uti['fullname'].' added '.$xg.' '.$dtext.$ps.'.</div><table cellspacing="0" cellpadding="0"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding-left:83px"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="border-width:1px;border-style:solid;border-color:#29447e #29447e #1a356e;background-color:#5b74a8"><table cellspacing="0" cellpadding="0" style="border-collapse:collapse"><tbody><tr><td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:2px 6px 4px;border-top:1px solid #8a9cc2"><a href="'.$dhref.'" style="color:#3b5998;text-decoration:none" target="_blank"><span style="font-weight:bold;white-space:nowrap;color:#fff;font-size:13px">View '.ucwords($dtextv).'</span></a></td></tr></tbody></table></td></tr></tbody></table></td></tbody></table>';

$p['t']=$email;
$p['f']='Upfrev';
$p['e']='upfrev+'.grs(75).'@upfrevmail.com';

sbmail($p);
}

include("end.php");
?>