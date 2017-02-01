<?php


$secho='';
$ax=0;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$r=mysql_query("SELECT * FROM pokes WHERE id2='$uid' AND pokedback='0' ORDER BY datetimep DESC limit 6");
while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id']);
$secho.='
<div class="clearfix ego_unit" id="poke_'.$m['pokeid'].'"><a class="lfloat" style="margin-right: 8px;display:block;" href="/'.$uti['username'].'" tabindex="-1" aria-hidden="true"><img class="img" style="display:block;height:50px;width:50px;" src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" alt=""></a><div class="_8m "><div class="egoProfileTemplate lb"><a class="ego_x uiCloseButton uiCloseButtonSmall" href="#" role="button" aria-label="Remove" fjax="/pokesd/poke_hide.php?p='.$m['pokeid'].'&amp;right_col=" rel="async-post" title="Remove"></a><a class="ego_title" href="/'.$uti['username'].'" data-gt="">'.$uti['fullname'].'</a><div>has poked you.</div><div class="ego_action"><a id="poke_inline'.$ax.'" class="uiIconText npjax" href="#" fjax="/pokesd/poke_inline.php?uidv='.$uti['id'].'&amp;poke_inline_id='.$ax.'&amp;p='.$m['pokeid'].'&amp;right_col=" rel="async-post"><i class="img pokessp_notifications" style="top: 0px;"></i>Poke Back</a></div></div></div></div>';
$ax++;
}

if($ax>0){
echo'
<div id="pokes_rw">
<div class="right_containerh" style="color:rgb(102, 102, 102);font-weight:bold;" id="pokes_rt">
Pokes<a href="/pokes" style="float:right;position:relative;bottom:-1px;">See All</a>
</div>';

echo'<div class="ego_unit_container" id="pokes_rwv">';

echo $secho;

echo'</div>';
echo'</div>';	
}
?>