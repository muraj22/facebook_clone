<?php
	$uidvdl=array();
	$mx=0;
	$qresult=mysql_query("SELECT * FROM $uidvml WHERE likeid='$likeid' ORDER BY datetimep DESC LIMIT 25");
	while($qrow=mysql_fetch_array($qresult)){
	$uidvdl[$mx]=$qrow['who'];	
	$mx++;
	}
	
	$mxv=0;
	$uidvdlv=array();
	$uidvdlp=array();
	$uidvdln=array();
	$uidvdlun=array();
	foreach($uidvdl as $mkey => $iluser){
	$gresult=mysql_query("SELECT * FROM registered WHERE id='$iluser'");
	while($grow=mysql_fetch_array($gresult)){
	$uidvdlv[$mxv]=$iluser;
	$uidvdlp[$mxv]=$grow['profilepict'];
	$uidvdln[$mxv]=$grow['fullname'];
	$uidvdlun[$mxv]=$grow['username'];
	if($grow['username']==""){
	$uidvdlun[$mxv]=$iluser;
	}
	$mxv++;
	}
	}
	
	$lcr=1;
	$otherpeoplev='';
	$otherpeople='';
	if($mxv>6){$mposr='margin-right:12px;'; $mposrv='88';}
	else{$mposr=''; $mposrv='76';}
	foreach($uidvdlv as $mkey => $iluser){
	
	
	if($lcr==$mxv){$border='0';}else{$border='1';}
if($lcr=='7'){$otherpeoplev.='<div style="display:none;" id="checkjsv'.$x.'" value="7"></div>';}	
	
	if(!in_array($iluser,$u_friends) OR $iluser==$uid){

$rvv=mysql_query("SELECT * FROM friends WHERE id='$uid' AND id2='$iluser'");
while($mv=mysql_fetch_array($rvv)){
if($mv['confirmed']=='y'){$fflag='';}
else if($mv['confirmed']=='nc' || $mv['confirmed']=='n'){$fflag=''; $otherpeoplev.='<div style="margin:0;padding:0;width:397px;position:relative;left:-10px;border-bottom:'.$border.'px solid #e9e9e9;padding-top:3px;background:#ffffff;" class="friendslink"><a href="/'.$uidvdlun[$mkey].'"><img src="/'.$iluser.'/pics/'.$uidvdlp[$mkey].'" style="height:50px;width:50px;position:relative;left:4px;"></a><a href="/'.$uidvdlun[$mkey].'" style="position:relative;top:-22px;left:12px;font-size:12px;">'.$uidvdln[$mkey].'</a><input id="addfriendbtl'.$lco.'" type="button" value="Friend Request Sent" class="addfriend" style="text-align:right;position:absolute;right:8px;top:8px;padding-left:3px;padding-top:3px;padding-bottom:3px;padding-right:3px;font-size:11px;'.$mposr.'"></div>';}
}

if($iluser==$uid){$otherpeoplev.='<div style="margin:0;padding:0;width:397px;position:relative;left:-10px;border-bottom:'.$border.'px solid #e9e9e9;padding-top:3px;background:#ffffff;" class="friendslink"><a href="/'.$uidvdlun[$mkey].'"><img src="/'.$iluser.'/pics/'.$uidvdlp[$mkey].'" style="height:50px;width:50px;position:relative;left:4px;"></a><a href="/'.$uidvdlun[$mkey].'" style="position:relative;top:-22px;left:12px;font-size:12px;">'.$uidvdln[$mkey].'</a><input id="addfriendbtvv'.$lco.'" type="button" value="Friend Request Sent" class="addfriend" style="text-align:right;position:absolute;right:8px;top:8px;padding-left:3px;padding-top:3px;padding-bottom:3px;padding-right:3px;font-size:11px;'.$mposr.'display:none;'.$mposr.'"></div>'; $fflag='';}

if(!isset($fflag)){	
$otherpeoplev.='<div style="margin:0;padding:0;width:397px;position:relative;left:-10px;border-bottom:'.$border.'px solid #e9e9e9;padding-top:3px;background:#ffffff;" class="friendslink"><a href="/'.$uidvdlun[$mkey].'"><img src="/'.$iluser.'/pics/'.$uidvdlp[$mkey].'" style="height:50px;width:50px;position:relative;left:4px;"></a><a href="/'.$uidvdlun[$mkey].'" style="position:relative;top:-22px;left:12px;font-size:12px;">'.$uidvdln[$mkey].'</a><input id="addfriendbtlv'.$lco.'" type="button" value="Add Friend" class="addfriend addfriendbtlv'.$lco.'" style="text-align:right;position:absolute;right:8px;top:8px;padding-left:20px;padding-top:3px;padding-bottom:3px;padding-right:3px;font-size:11px;'.$mposr.'" onclick="addfriendajaxl(\''.$iluser.'\','.$lco.');"><div class="masuno addfriendbtlvv'.$lco.'" style="position:absolute;top:11px;right:'.$mposrv.'px;" onclick="addfriendajaxl(\''.$iluser.'\','.$lco.');" id="addfriendbtlvv'.$lco.'"></div></div>';
	}	
else{unset($fflag);}
}
else{	
$otherpeoplev.='<div style="margin:0;padding:0;width:397px;position:relative;left:-10px;border-bottom:'.$border.'px solid #e9e9e9;padding-top:3px;background:#ffffff;" class="friendslink"><a href="/'.$uidvdlun[$mkey].'"><img src="/'.$iluser.'/pics/'.$uidvdlp[$mkey].'" style="height:50px;width:50px;position:relative;left:4px;"></a><a href="/'.$uidvdlun[$mkey].'" style="position:relative;top:-22px;left:12px;font-size:12px;">'.$uidvdln[$mkey].'</a><input id="addfriendbtlv'.$lco.'" type="button" value="Friends" class="addfriend" style="text-align:right;position:absolute;right:8px;top:8px;padding-left:3px;padding-top:3px;padding-bottom:3px;padding-right:3px;font-size:11px;'.$mposr.'"></div>';
}
	
$lco++;	
$lcr++;
	
	}
?>