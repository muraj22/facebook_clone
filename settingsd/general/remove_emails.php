<?php

$r=mysql_query("SELECT * FROM contact_emails WHERE id='$uid' AND visibility='v'");

$toberemoved=array();
foreach($remove_emails as $k=>$v){
 mysql_select_db("registered");
mysql_query("UPDATE contact_emails SET visibility='d' WHERE id='$uid' AND email='$v' AND visibility='v'");
mysql_select_db("modules");
mysql_query("DELETE FROM sb_emails WHERE email='$v' AND id='$uid'");
}
mysql_select_db("registered");

?>