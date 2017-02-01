<?php include("start.php"); ?>
<?php  

include("start.php");
?>
<?php
foreach($_POST as $k=>$v){
${$k}=$v;	
}
$r=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$pasbase=$m['password'];
}

include("salt.php");
$password=crypt($password,$salt);
if($password!=$pasbase){echo 'e3'; mysql_close($con); exit();}

$r=mysql_query("SELECT * FROM namechange WHERE id='$uid' AND fullname='$fullname'");
$c=mysql_num_rows($r);
if($c==0){mysql_close($con); exit();}
while($m=mysql_fetch_array($r)){
$f_name=$m['f_name'];
$m_name=$m['m_name'];
$l_name=$m['l_name'];	
}

if($m_name==''){
mysql_query("UPDATE optionsv SET middlename='' WHERE id='$uid'");		
}
else{
mysql_query("UPDATE optionsv SET middlename='$m_name' WHERE id='$uid'");
$m_name=$m_name.' ';
$l_name=$m_name.$l_name;		
}
mysql_query("UPDATE registered set f_name='$f_name',l_name='$l_name',fullname='$fullname' WHERE id='$uid'");
echo'ok->'.$fullname;
?>
<?php include("end.php"); ?>