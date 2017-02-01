<?php
setcookie("login_cookie",$_GET['va'], time()+60*60*24*14,"/");



$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$uid=$_GET['va'];
mysql_query("UPDATE registered SET status='1' WHERE id='$uid'");
mysql_query("UPDATE registered SET datetimepn=UNIX_TIMESTAMP() WHERE id='$uid'");

mysql_close($con);
echo'<script type="text/javascript">window.location="http://friendshipcount.com/'.$_GET['va'].'/?nr=i"</script>';
?>