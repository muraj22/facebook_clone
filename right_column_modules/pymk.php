<?php
echo'
<div class="right_containerh" style="color:rgb(102, 102, 102);font-weight:bold;" id="pymkw">
People You May Know<a href="/find-friends/browser/" style="float:right;position:relative;bottom:-1px;">See All</a>
</div>';

echo'<div class="ego_unit_container">';

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$u_friends_c=r_friends($uid,"","","complete");

include("stories/pymk_core.php");

arsort($mutual); //aqui ya estan las personas que mas mutual friends tienen conmigo


$mutualc2=array();

$dc=1;
foreach($mutual as $k=>$v){
$mutualc2[$k]=$v;	
$dc++;
if($dc==31){break;} //aca es 31
}

$s=rand(2, 3);

$mutualc3=shuffle_assoc($mutualc2);
//shuffle los primeros 31

$h=0;

$s2=rand(230,270);

foreach($mutual as $k=>$v){

if(!isset($mutualc3[$k])){
$mutualc3[$k]=$v;	//agregar todos sin shuffle alguno despues de los primeros 31
$h++;
} 

if($h>=$s2){break;}
}




$dc=0;
$dcv='block';
foreach($mutualc3 as $uo=>$v){
$tc=$v;

$r=mysql_query("SELECT * FROM registered WHERE id='$uo'");
while($m=mysql_fetch_array($r)){
$uo_un=$m['username'];
$uo_pic=$m['profilepict'];
$uo_fn=$m['fullname'];
}

$rx=grsn(8);
echo'
<div class="pymk_d" style="vertical-align:top;margin-top:0;display:'.$dcv.';" id="pymk'.$rx.'">
<div style="display:inline-block;margin:0;padding:0;">
<a href="/'.$uo_un.'" style="text-decoration:none!important;display:block;">
<img src="/'.$uo.'/pics/'.$uo_pic.'" style="height:50px;width:50px;">
</a>
</div>
';
echo '<div style="display:inline-block;margin:0;padding:0;text-align:left;vertical-align:top;padding-left:5px;margin-top:-1px;">
<div style="display:block;vertical-align:top;margin:0;padding:0;">
<a href="/'.$uo_un.'">'.$uo_fn.'</a>
</div>';
if($tc>1){$as='s';}
else{$as='';}



$d_title="Mutual Friends";
$fjax_l='table=mutual_friends&uo='.$uid.'&ud='.$uo;

if($tc>0){
echo'
<div style="display:block;margin:0;padding:0;" class="pymk_dv">
<a href="#" class="displaydialog" data-d_okay="Close" data-d_width="447" data-d_title="'.$d_title.'" data-d_okay_function="close_dialog" data-d_leave_loading="show_loading" data-d_isajax="t" data-d_fjax="/stories/show_users_listv.php?'.$fjax_l.'" data-a_custom_f="show_users_list" style="font-weight:normal!important;">
'.$tc.' mutual friend'.$as.'
</a>
</div>';
}

echo'
<div style="display:block;" class="pymk_dvv" id="pymk_dvv'.$rx.'">
<a href="#" onclick="addfriendajaxl(\''.$k.'\','.$rx.',\'o\'); return false;" style="font-weight:normal!important;">
<i class="masuno_pymk"></i>
Add Friend
</a>
</div>
</div>';

	echo'</div>';
	$dc++;
	if($dc>=$s){
	$dcv='none';	
	}
}

echo'
</div>
<script type="text/javascript">';
if($dc==0){echo'
$("#pymkw").remove();
';}
echo'
$(".pymk_d:first").css("padding-top","0");
$(".pymk_d:first").css("border-top","0");
</script>';
?>