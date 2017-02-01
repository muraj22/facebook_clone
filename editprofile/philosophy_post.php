<?php
include("start.php");
?>
<?php
$posted=array();
$ontable=array();
foreach($_POST as $key => $value){
$value=trim($value);
$value=addcslashes($value, "'\\/");
$posted[$key]=$value;
${$key}=$value;
}



$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM relipo WHERE id='$uid' AND kind='$religion' AND type='religion' AND visibility='v'"));
$c=$c['c'];

if($religion!=""){
if($c==0){
mysql_query("UPDATE relipo SET visibility='o' WHERE id='$uid' AND type='religion' AND visibility='v'");
mysql_query("INSERT INTO relipo (id,kind,kind_d,type,visibility,datetimep) VALUES('$uid','$religion','$religion_d','religion','v',UNIX_TIMESTAMP())");
}
else{
mysql_query("UPDATE relipo SET kind_d='$religion_d' WHERE id='$uid' AND type='religion' AND visibility='v'");
}
}
else{
mysql_query("UPDATE relipo SET visibility='d' WHERE id='$uid' AND type='religion' AND visibility='v'");
}

if($political!=""){
$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM relipo WHERE id='$uid' AND kind='$religion' AND type='political' AND visibility='v'"));
$c=$c['c'];

if($c==0){
mysql_query("UPDATE relipo SET visibility='o' WHERE id='$uid' AND type='political' AND visibility='v'");
mysql_query("INSERT INTO relipo (id,kind,kind_d,type,visibility,datetimep) VALUES('$uid','$political','$political_d','political','v',UNIX_TIMESTAMP())");
}
else{
mysql_query("UPDATE relipo SET kind_d='$religion_d' WHERE id='$uid' AND type='religion' AND visibility='v'");
}
}
else{
mysql_query("UPDATE relipo SET visibility='d' WHERE id='$uid' AND type='political' AND visibility='v'");	
}


mysql_query("UPDATE quotations SET quotations='$quotations' WHERE id='$uid'");

if(strpos($tagsinspirations,",")!==false){
$inspirations=array();
$tagsinspirationsv=explode(",",$tagsinspirations);
foreach($tagsinspirationsv as $key=> $value){
if($value!=""){
$inspirations[]=$value;
$r=mysql_query("SELECT * FROM inspirational WHERE id='$uid' AND person='$value' AND (visibility='v' OR visibility='h')");
$c=mysql_num_rows($r);
if($c=="0"){
mysql_query("INSERT INTO inspirational (id,person,visibility,datetimep) VALUES('$uid','$value','v',UNIX_TIMESTAMP())");	
$likeid=mysql_insert_id();
$ltype="inspirations";
include("stories/like_insert.php");

}
}
}
$inspirationsdb=array();
$r=mysql_query("SELECT * FROM inspirational WHERE id='$uid' AND (visibility='v' OR visibility='h')");
while($m=mysql_fetch_array($r)){
$inspirationsdb[]=$m['person'];
}
foreach($inspirationsdb as $llave => $valor){
$valor=addcslashes($valor, "'\\/");
if(!in_array($valor,$inspirations)){
mysql_query("UPDATE inspirational SET visibility='d' WHERE id='$uid' AND person='$valor' AND (visibility='v' OR visibility='h')");	
}
}
}
else{
mysql_query("UPDATE inspirational SET visibility='d' WHERE id='$uid' AND (visibility='v' OR visibility='h')");	
}

?>
<?php include("end.php"); ?>