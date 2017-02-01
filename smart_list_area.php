<?php
$regiono=$onbase['cityc'].$onbase['statec'].$onbase['countryc'];


if($regiono==""){
$r=mysql_query("SELECT * FROM lists WHERE id='$uid' AND type='location' ORDER BY datetimep DESC LIMIT 1");
while($m=mysql_fetch_array($r)){
$regiono=$m['location'];	
}
}

echo $regiono;

if($regiono!=''){ //should alwasy be filled from query above though...

$u_friends=array();
 mysql_select_db("registered");
$r3 = mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='y'");
while($m3 = mysql_fetch_array($r3))
  {
$u_friends[]=$m3['id2'];
}


mysql_query("UPDATE lists_members SET visibility='dm' WHERE FIND_IN_SET(id,'$uid_friends_comma')>0 AND id2='$uid' AND location='$regiono'");
	
}

$region=$cityc.$statec.$countryc;

$r=mysql_query("SELECT * FROM lists WHERE id='$uid' AND location='$region'");
$c=mysql_num_rows($r);
if($c==0){
$regionn=$cityc.' Area';
$region=$region;
mysql_query("INSERT INTO lists (id,listn,descr,visibility,type,location,institution,favorites,datetimep) VALUES('$uid','$regionn','','v','location','$region','$regionn','2',UNIX_TIMESTAMP())");
}
else{
mysql_query("UPDATE lists SET datetimep=UNIX_TIMESTAMP() WHERE id='$uid' AND location='$region'");
}

$location=$region;
$r2=mysql_query("SELECT * FROM lists WHERE id='$uid' AND location='$location'");
while($m2=mysql_fetch_array($r2)){
$listid=$m2['sbid'];	
}

$r=mysql_query("SELECT * FROM lists as a WHERE FIND_IN_SET(id,'$uid_friends_comma')>0 AND location='$region' AND ( (SELECT COUNT(*) FROM lists_members AS e WHERE e.id='$uid' AND e.id2=a.id AND e.listid='$listid')=0 ) ORDER BY datetimep DESC"); //medio al pedo el order by pero igual

while($m=mysql_fetch_array($r)){
$uidv=$m['id'];
mysql_query("INSERT INTO lists_members (id,id2,listid,type,visibility,location,byw,privacy,privacyh,relation,relation_confirmed,datetimep) VALUES('$uid','$uidv','$listid','location','v','$location','m','','','','',UNIX_TIMESTAMP())");

//meto a mi lista todos los amigos que viven en mi current city

$r2=mysql_query("SELECT * FROM lists_members WHERE id='$uidv' AND id2='$uid' AND location='$region'");
$c2=mysql_num_rows($r2);
if($c2==0){
$listid=$m['sbid'];
mysql_query("INSERT INTO lists_members (id,id2,listid,type,visibility,location,byw,privacy,privacyh,relation,relation_confirmed,datetimep) VALUES('$uidv','$uid','$listid','location','v','$location','m','','','','',UNIX_TIMESTAMP())");

//me meto en las listas de todos mis amigos con esta current city
}
else{
while($m2=mysql_fetch_array($r2)){
if($m2['visibility']=='dm'){ // either the user had moved and therefero was deleted form this list or it was removed by the list owner - anyways as not he/she states he lives
//in this area, he/she is being readded with an update to the visibility over the list for this list member
	mysql_query("UPDATE lists_members SET visibility='v' WHERE id='$uidv' AND id2='$uid' AND location='$region'");
	}	
}

}


}

?>