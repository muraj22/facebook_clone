<?php 
include("start.php");
include("populate_page.php");
?>
<?php
$_SERVER=array_map('php_safety',$_SERVER);

$uri=$_SERVER['REQUEST_URI'];
$uri=explode("/",$uri);
$unv=$uri[2];

$r=mysql_query("SELECT * FROM registered WHERE username='$unv'");
while($m=mysql_fetch_array($r)){
$_GET['sid']=$m['id'];
$uidv=$m['id'];
}



$userstrip2 = substr("$uidv", 0, 22);
$userstrip = substr("$uid", 0, 22);
$finaluserstrip=$userstrip.'break'.$userstrip2.'m';

$finaluserstrip2=$userstrip2.'break'.$userstrip.'m';

$r=mysql_query("(SELECT * FROM $finaluserstrip) UNION (SELECT * FROM $finaluserstrip2)");
if($r!==FALSE){
$c=mysql_num_rows($r);
if($c>0){
$_GET['msgid']='';
$from_messages_php='';
include("master/message.php");
exit();
}
}
$_GET['m']=$uidv;

?>
<?php
$params['style']='
<style type="text/css">
.fallback{color:rgb(204,204,204);font-size:13px;font-weight:bold;padding:120px 0pt;text-align:center;word-wrap:break-word;margin-left:20px;width:759px;}
</style>';

$uidv=$_GET['m'];

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


$uti=sb_user($uidv);

$echo.='
<div class="fallback lb">
<a href="#" class="fwb fsl displaydialog"'; include("anchors_data/send_message_anchor.php"); $echo.=$sechov.' >Send a message</a> to start your conversation with <span class="friendslinkmv"><a href="/'.$uti['username'].'">'.$uti['fullname'].'</a></span>.
</div>';

$params['rhelper_js']='../';
$params['rhelper']='';
$params['title']='Upfrev';

$params['left_column_id']="messages";
$params['left_column']='';
$params['layout']='left_column_n';
$params['left_link_n']='message';


include("end.php");
?>