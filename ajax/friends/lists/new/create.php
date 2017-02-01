<?php
include("start.php");
ignore_user_abort(true);
foreach($_POST as $k=>$v){
${$k}=$v;	
}


if($listname==""){
exit();	
}
$posted=array();

$posted['tags']=$tags;

$key_name=array();
$key_name['tags']='activities';

mysql_query("INSERT INTO lists (id,listn,descr,visibility,type,location,institution,favorites,datetimep) VALUES('$uid','$listname','','v','custom','','','2',UNIX_TIMESTAMP())");

$listid=mysql_insert_id();

$posted_tags="";

foreach($posted as $dmk => $dmv){
	if(isset($key_name[$dmk])){

$dkn=$key_name[$dmk];
if(strpos($dmv,",")!==false){
${$dmk.'v'}=explode(",",$dmv);
foreach(${$dmk.'v'} as $key=> $value){
if($value!=""){
$posted_tags.=",".$value;
$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND id2='$value' AND sbid='$listid'");
$c=mysql_num_rows($r);	
if($c=="0"){
//$likeid=genRandomString(25);
mysql_query("INSERT INTO lists_members (id,id2,listid,type,visibility,location,byw,privacy,privacyh,relation,relation_confirmed,datetimep) VALUES('$uid','$value','$listid','custom','v','','h','','','','',UNIX_TIMESTAMP())");
}
else{
mysql_query("UPDATE lists_members SET visibility='v',datetimep=UNIX_TIMESTAMP() WHERE listid='$listid' AND id='$uid' AND id2='$value'");	
}
}
}

if($posted_tags!=""){$posted_tags=substr($posted_tags,1);}
echo $posted_tags;
mysql_query("UPDATE lists_members SET visibility='d' WHERE listid='$listid' AND id='$uid' AND FIND_IN_SET(id2,$posted_tags)=0");	
}

else{
mysql_query("UPDATE lists_members SET visibility='d' WHERE listid='$listid' AND id='$uid'");		
}

	
		}

}



include("end.php");
?>