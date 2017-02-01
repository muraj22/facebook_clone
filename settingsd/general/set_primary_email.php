<?php

foreach($primarye as $k=>$v){
$primarye=$v;	
}
$r=mysql_query("SELECT * FROM contact_emails WHERE id='$uid' AND email='$primarye' AND visibility='v'");
while($m=mysql_fetch_array($r)){
if($m['primary2']!='p'){
mysql_query("UPDATE contact_emails SET primary2='' WHERE id='$uid' AND visibility='v'");
mysql_query("UPDATE contact_emails SET primary2='p' WHERE id='$uid' AND email='$primarye' AND visibility='v'");
mysql_query("UPDATE registered SET email='$primarye' WHERE id='$uid'");

mysql_select_db("modules");
mysql_query("UPDATE sb_emails SET email_p='' WHERE id='$uid'");
mysql_query("UPDATE sb_emails SET email_p='p' WHERE email='$primarye' AND id='$uid'");


echo $primarye.'{}';
}
}




?>