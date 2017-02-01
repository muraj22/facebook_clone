<?php
if(!function_exists("sb_user")){
function sb_user($uidv){
	if($uidv==0){return false;} //testing fix
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$uti=array();
$r=mysql_query("SELECT * FROM registered WHERE id='$uidv'");
while($m=mysql_fetch_array($r)){
foreach($m as $k=>$v){
$uti[$k]=$v;	
}
if($uti['gender']=="2"){
$uti['prefix']="his";	
}else{
$uti['prefix']="her";		
}
}

$uti["link"]='<div class="lb"><a hc="" href="/'.$uti['username'].'">'.$uti['fullname'].'</a></div>';
$uti["piclink"]='<a style="max-width:100%;max-height:100%;" href="/'.$uti['username'].'"><img style="max-width:100%;max-height:100%;" src="/users/'.$uti['id'].'/pics/'.$uti['profilepict'].'"></a>';

return $uti;
}
if(isset($uid)){
$uid_a=sb_user($uid);
}
}
?>