<?php
if(!function_exists("r_friends")){
function r_friends($uidv,$ops=false,$total=false,$complete=false,$comma=false){

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

if(!$comma){
$u_friends=array();
}
else{
$friends_comma='';
}

if($ops=='me'){
if(!$comma){
$u_friends[]=$uidv;
}
else{
$friends_comma.=','.$uidv;
}
}

if(!$complete){
$r3 = mysql_query("SELECT * FROM friends WHERE id='$uidv' AND confirmed='y'");	
}
else{
if($complete=="complete"){ //used for people you may know
$r3 = mysql_query("SELECT * FROM friends WHERE id='$uidv' AND (confirmed='y' OR confirmed='d' OR confirmed='n' OR confirmed='k')");		
}
else if($complete=="frs"){ //friend request sent from me
$r3 = mysql_query("SELECT * FROM friends WHERE id='$uidv' AND (confirmed='n')");		
}
else if($complete=="frsv"){ //friend request sent by the other
$r3 = mysql_query("SELECT * FROM friends WHERE id='$uidv' AND (confirmed='nc')");		
}
}
while($m3=mysql_fetch_array($r3)){
if(!$comma){
$u_friends[]=$m3['id2'];
}
else{
$friends_comma.=','.$m3['id2'];
}

}


if(!$comma){
return $u_friends;
}
else{
$friends_comma=substr($friends_comma,1);
return $friends_comma;
}
	

}

$uid_friends=r_friends($uid);
$uid_friends_me=$uid_friends;
$uid_friends_me[]=$uid;

$uid_friends_comma=r_friends($uid,false,false,false,true);
$uid_friends_rs=r_friends($uid,false,false,"frs"); //requests uidv sent ;)
$uid_friends_rsv=r_friends($uid,false,false,"frsv"); //requests that were sent to uidv


if($uidv!=$uid && $uidv!=""){ //hack that determines $uidv is no funcional /doesn't exist
$uidv_friends=r_friends($uidv);
$uidv_friends_me=$uidv_friends;
$uidv_friends_me[]=$uidv;
$uidv_friends_comma=r_friends($uidv,false,false,false,true);
$uidv_friends_rs=r_friends($uidv,false,false,"frs");
$uidv_friends_rs=r_friends($uidv,false,false,"frsv");
}
else{
$uidv_friends=$uid_friends_me; //or I am making it up for the news feed
$uidv_friends_me=$uidv_friends;
$uidv_friends_me[]=$uidv;
}


if(strlen($uid_friends_comma)>0){
$uid_friends_comma_me=$uid.','.$uid_friends_comma;
}
else{
$uid_friends_comma_me=$uid;
}


if($uid==$uidv || $uidv==""){
$which_friends=$uid_friends;
$which_friends_comma=$uid_friends_comma;
}
else{
$which_friends=$uidv_friends;
$which_friends_comma=$uidv_friends_comma;
}


}


/*
confirmed column values:
y : confirmed
n : id has tried to be friend with this person and id2 rejected him
nc : id2 has tried to be friend with id and the friend request exists - hasn't yet be confirmed by id
d : deleted - was a friend once
nk: friend request was rejected and is not known by id
k: friend request was rejected but id knows id2
*/
?>