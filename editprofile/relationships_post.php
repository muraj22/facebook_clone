<?php
include("start.php"); 
?>
<?php
$dparams=array();

foreach($nfamily_b as $relation=>$uidv){
$relation_possibilities=array();
$relation_possibilities[]=0;
$relation_possibilities[]=1;
$relation_possibilities[]=7;
$relation_possibilities[]=8;
$relation_possibilities[]=9;


$relation_converted=$relation;

$r=mysql_query("SELECT * FROM lists WHERE id='$uid' AND type='love'");
while($m=mysql_fetch_array($r)){
$listid=$m['sbid'];	
}

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND listid='$listid' AND relation_confirmed='1'");
$c=mysql_num_rows($r);

if($c==1){
$dparams["error"]='You have a relationship request waiting for you on your home page.';
echo json_encode($dparams);
exit();
}

$privacy=$dprivacy_b[$uidv];
$privacyh=$dprivacyh_b[$uidv];

if(in_array($relation,$relation_possibilities)){
$uidv=""; //javascript communication.. it leaves the person, but if something that is not related is selected this happens, no uidv
}

if($uidv!=""){
$r=mysql_query("SELECT * FROM lists WHERE id='$uidv' AND type='love'");
while($m=mysql_fetch_array($r)){
$listidv=$m['sbid'];
}

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uidv' AND listid='$listidv' AND relation_confirmed='1'");
$c=mysql_num_rows($r);

if($c>0){
while($m=mysql_fetch_array($r)){
if($m['id2']!=$uid){

$dparams["error"]='That user already has a pending relationship request.';
echo json_encode($dparams);
exit();
}
}

}



$r=mysql_query("SELECT * FROM lists_members WHERE id='$uidv' AND listid='$listidv' AND (relation_confirmed='1a' OR relation_confirmed='2')"); 
$c=mysql_num_rows($r);


if($c>0){

while($m=mysql_fetch_array($r)){

if($m['id2']!=$uid AND $m['id2']!=""){

$dparams["error"]='That user is already in a relationship.';
echo json_encode($dparams);
exit();
	
}
}

}


}

$posted=$uidv;

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND listid='$listid' AND id2='$uidv' ORDER BY datetimep DESC LIMIT 1");
$c=mysql_num_rows($r);


if($c==0){ //it is going to be new, any existing must be taken off
$sbid="";
while($m=mysql_fetch_array($r)){
$actual=$m['id2'];	
mysql_query("UPDATE lists_members SET visibility='h' WHERE id='$actual' AND id2='$uid'");	
}

}
else{
while($m=mysql_fetch_array($r)){
$sbid=$m['sbid'];	
}
}
$ptype="lists_members";
$extra_param="love";

include("ajax/privacy/simple_save.php");

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND listid='$listid' AND id2='$uidv' ORDER BY datetimep DESC LIMIT 1");
$c=mysql_num_rows($r);

if($c==0){
if($uidv==""){
$dconfirm=2;	
}
else{
$dconfirm="1a";	
}
mysql_query("INSERT INTO lists_members (id,id2,listid,type,visibility,location,byw,privacy,privacyh,relation,relation_confirmed,datetimep) VALUES('$uid','$uidv','$listid','love','v','','h','$privacy','$privacyh','$relation','$dconfirm',UNIX_TIMESTAMP())");	

$likeid=mysql_insert_id();
$ltype="relationship";


if($uidv!=""){
$privacy=0;
$privacyh="";
mysql_query("INSERT INTO lists_members (id,id2,listid,type,visibility,location,byw,privacy,privacyh,relation,relation_confirmed,datetimep) VALUES('$uidv','$uid','$listidv','love','v','','h','$privacy','$privacyh','$relation_converted','1',UNIX_TIMESTAMP())");	

$likeid=mysql_insert_id();
$ltype="relationship";

}

}
else{
while($m=mysql_fetch_array($r)){
$current_relation=$m['relation'];	
$relation_confirmed=$m['relation_confirmed'];
}

if($uidv!=""){
$r=mysql_query("SELECT * FROM lists_members WHERE id='$uidv' AND id2='$uid' AND listid='$listidv'");
while($m=mysql_fetch_array($r)){
$current_relation_two=$m['relation'];
$relation_confirmed_two=$m['relation_confirmed'];	
$visibility=$m['visibility'];
}


if($relation!=$current_relation OR $relation_converted!=$current_relation_two OR $visibility=="d"){ //change in relation type - and it could also have been deleted before
mysql_query("UPDATE lists_members SET relation='$relation',relation_confirmed='1a',datetimep=UNIX_TIMESTAMP() WHERE id='$uid' AND id2='$uidv' AND listid='$listid'");
mysql_query("UPDATE lists_members SET relation='$relation_converted',relation_confirmed='1',datetimep=UNIX_TIMESTAMP() WHERE id='$uidv' AND id2='$uid' AND type='love'");
}
}

if($uidv==""){
if($relation!=$current_relation){
mysql_query("UPDATE lists_members SET datetimep=UNIX_TIMESTAMP(),relation='$relation',relation_confirmed='2' WHERE id='$uid' AND type='love' AND id2='$uidv'");	
}
}
mysql_query("UPDATE lists_members SET privacy='$privacy',privacyh='$privacyh' WHERE id='$uid' AND id2='$uidv' AND listid='$listid'");

}


mysql_query("UPDATE lists_members SET visibility='v' WHERE id='$uid' AND id2='$uidv' AND listid='$listid'");
if($uidv!=""){
mysql_query("UPDATE lists_members SET visibility='v' WHERE id='$uidv' AND id2='$uid' AND listid='$listidv'");
}

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND listid='$listid' AND visibility!='d' AND FIND_IN_SET(id2,'$posted')=0");

while($m=mysql_fetch_array($r)){
$did=$m['id2'];
mysql_query("UPDATE lists_members SET visibility='d' WHERE id='$uid' AND listid='$listid' AND id2='$did'");

$r2=mysql_query("SELECT * FROM lists WHERE id='$did' AND type='love'");
while($m2=mysql_fetch_array($r2)){
$listidv=$m2['sbid'];
mysql_query("UPDATE lists_members SET visibility='d' WHERE listid='$listidv'");
}

}


}



$posted="";


$r=mysql_query("SELECT * FROM lists WHERE id='$uid' AND type='family'");
while($m=mysql_fetch_array($r)){
$listid=$m['sbid'];	
}


if(is_array($nfamily)){
foreach($nfamily as $relation=>$uidv){
$posted.=",".$uidv;

$uti=sb_user($uid);
$gender=$uti['gender']; //I am male Jacob - Tony stated that me, Jacob was his father.
$relation_converted=convert_relation($relation,$gender);


if(!in_array($uidv,$uid_friends) OR $relation==0 OR $relation_converted=="error"){
$dparams["error"]="You cannot add a family member without specifying a relationship.";
echo json_encode($dparams);
exit();
}


$r=mysql_query("SELECT * FROM lists WHERE id='$uidv' AND type='family'");
while($m=mysql_fetch_array($r)){
$listidv=$m['sbid'];
}


$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND listid='$listid' AND id2='$uidv'");
$c=mysql_num_rows($r);

$privacy=$dprivacy[$uidv];
$privacyh=$dprivacyh[$uidv];
if($c==0){
$sbid="";
}
else{
while($m=mysql_fetch_array($r)){
$sbid=$m['sbid'];	
}
}
$ptype="lists_members";
$extra_param="family";

include("ajax/privacy/simple_save.php");

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND listid='$listid' AND id2='$uidv'");
$c=mysql_num_rows($r);

if($c==0){
mysql_query("INSERT INTO lists_members (id,id2,listid,type,visibility,location,byw,privacy,privacyh,relation,relation_confirmed,datetimep) VALUES('$uid','$uidv','$listid','family','v','','h','$privacy','$privacyh','$relation','1a',UNIX_TIMESTAMP())");	

$likeid=mysql_insert_id();
$ltype="relationship";



$privacy=0;
$privacyh="";
mysql_query("INSERT INTO lists_members (id,id2,listid,type,visibility,location,byw,privacy,privacyh,relation,relation_confirmed,datetimep) VALUES('$uidv','$uid','$listidv','family','v','','h','$privacy','$privacyh','$relation_converted','1',UNIX_TIMESTAMP())");	


$likeid=mysql_insert_id();
$ltype="relationship";

}
else{
while($m=mysql_fetch_array($r)){
$current_relation=$m['relation'];	
$relation_confirmed=$m['relation_confirmed'];
}


$r=mysql_query("SELECT * FROM lists_members WHERE id='$uidv' AND id2='$uid' AND listid='$listidv'");
while($m=mysql_fetch_array($r)){
$current_relation_two=$m['relation'];
$relation_confirmed_two=$m['relation_confirmed'];	
}

if($relation!=$current_relation OR $relation_converted!=$current_relation_two){ //change in relation type
mysql_query("UPDATE lists_members SET relation='$relation',relation_confirmed='1a',datetimep=UNIX_TIMESTAMP() WHERE id='$uid' AND id2='$uidv' AND listid='$listid'");
mysql_query("UPDATE lists_members SET relation='$relation_converted',relation_confirmed='1',datetimep=UNIX_TIMESTAMP() WHERE id='$uidv' AND id2='$uid' AND type='family'");
}
mysql_query("UPDATE lists_members SET privacy='$privacy',privacyh='$privacyh' WHERE id='$uid' AND id2='$uidv' AND listid='$listid'");

}

}

}

if(strpos($posted,",")!==false){
$posted=substr($posted,1);
}

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND listid='$listid' AND visibility!='d' AND FIND_IN_SET(id2,'$posted')=0");

while($m=mysql_fetch_array($r)){
$did=$m['id2'];
mysql_query("UPDATE lists_members SET visibility='d' WHERE id='$uid' AND listid='$listid' AND id2='$did'");
}

echo json_encode($dparams);

?>
<?php include("end.php"); ?>