<?php
if(!isset($pin)){
    $pin=1;   
}
foreach($posted as $dmk => $dmv){
	if(isset($key_name[$dmk])){

$dkn=$key_name[$dmk];
if(strpos($dmv,",")!==false){
${$dkn}=array();
${$dmk.'v'}=explode(",",$dmv);
foreach(${$dmk.'v'} as $key=> $value){
if($value!=""){
${$dkn}[]=$value;
$r=mysql_query("SELECT * FROM tags WHERE id='$uid' AND id3='$value' AND photoid='$sbid' AND albumid='$albumid' AND flag='$sflag'");
$c=mysql_num_rows($r);	
if($c=="0"){
//$likeid=genRandomString(25);
mysql_query("INSERT INTO tags (label2,width2,height2,top2,left2,photoid,pin,id3,datetimep,id2,id,thephotom,thephotol,albumid,flag,visibility) VALUES('','100','100','-4000','-4000','$sbid','$pin','$value',UNIX_TIMESTAMP(),'$uid','$owner','','','$albumid','$sflag','v')");	
}
}
}
${$dkn.'db'}=array();
$r=mysql_query("SELECT * FROM tags WHERE photoid='$sbid' AND albumid='$albumid' AND id='$uid' AND flag='$sflag'");
while($m=mysql_fetch_array($r)){
${$dkn.'db'}[]=$m['id3'];
}
foreach(${$dkn.'db'} as $llave => $valor){
if(!in_array($valor,${$dkn})){
mysql_query("DELETE FROM tags WHERE photoid='$sbid' AND albumid='$albumid' AND id='$uid' AND id3='$valor' AND flag='$sflag'");		
}
}

}
else{
mysql_query("DELETE FROM tags WHERE photoid='$sbid' AND albumid='$albumid' AND id='$uid' AND flag='$sflag'");	
}
		
		}

}
?>