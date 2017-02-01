<?php
/*all commented, no modules style anymore.

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

$r=mysql_query("SELECT * FROM chatopen WHERE id='$uid'");
$c=mysql_num_rows($r);
if($c==0){
mysql_query("INSERT INTO chatopen (chatopen,id,datetimep) VALUES('','$uid',UNIX_TIMESTAMP())");	
}
?>
<?php
$uidm=$uid.'m';
$modules=array();
$modules2=array();
$result=mysql_query("SELECT * FROM $uidm");
while($ms=mysql_fetch_array($result)){
$modules[]=$ms['module'];
}


$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
$result=mysql_query("SELECT * FROM modules");
while($ms=mysql_fetch_array($result)){
$modules2[]=$ms['module'];	
}



foreach($modules2 as $key=> $value){
if(!in_array($value,$modules)){
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
$result=mysql_query("SELECT * FROM modules WHERE module='$value'");
while($ms=mysql_fetch_array($result)){
$vals=$ms['dvals'];

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$predefined=$ms['predefined'];
$uidvasterisk=$uid.$value;

$sql="DROP TABLE IF EXISTS $uidvasterisk";
mysql_query($sql);

$sql = "CREATE TABLE $uidvasterisk
(
$vals
)";

// Execute query
mysql_query($sql);

mysql_query("INSERT INTO $uidm (module)
VALUES ('$value')");

if($predefined!=""){
$predefinedv=explode("{}",$predefined);
foreach($predefinedv as $llave=> $valor){
if($valor!=""){
$q='INSERT INTO '.$uidvasterisk.' '.$valor;
mysql_query($q);	
}
}
}

}
}

}
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");
?>
<?php mysql_close($con); 

*/
?>