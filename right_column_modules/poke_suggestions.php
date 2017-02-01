<?php

include("functions/dd.php");

$already_poked=array();

$r=mysql_query("SELECT * FROM pokes WHERE id='$uid' AND pokedback='0'");
while($m=mysql_fetch_array($r)){
$already_poked[]=$m['id2'];	
}

$r=mysql_query("SELECT * FROM pokes WHERE id2='$uid' AND pokedback='0'");
while($m=mysql_fetch_array($r)){
$already_poked[]=$m['id'];	
}

$hidden_poke_suggestions=array();
$r=mysql_query("SELECT * FROM hidden_suggestions WHERE id='$uid' AND what='poke'");
while($m=mysql_fetch_array($r)){
$datetimep=$m['datetimep'];

$diff=dp('',$datetimep);

if($diff['hours']<72){
$hidden_poke_suggestions[]=$m['id2'];
}
}

$secho='
<div class="phs">
<ul class="uiList mts userSuggestionList">';

$shuffledf=$uid_friends;
shuffle($shuffledf);

$axs=rand(2,5);
$ax=0;

foreach($shuffledf as $k=>$v){
$uti=sb_user($v);

if($ax==0){$pvm='pvm';}
else{$pvm='';}

if(!in_array($v,$hidden_poke_suggestions) AND !in_array($v,$already_poked)){
$secho.='
<li class="userSuggestionLi stat_elem '.$pvm.' uiListItem  uiListVerticalItemBorder" id="suggestion_'.$uti['id'].'" data-coeff-key="0460"><div class="clearfix pvs userSuggestionRow"><img class="lfloat img" style="height:32px;width:32px;margin-right: 8px;display: block;" src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" alt=""><div class="clearfix _8m "><div class="mlm rfloat" style="display: inline-block;"><div class="_6a _6b" style="height:32px;vertical-align: middle;display:inline-block;"></div><div style="vertical-align: middle;display:inline-block;" class="llb"><a class="uiIconText" href="#" fjax="/pokesd/poke_inline.php?suggestion=1&amp;uidv='.$uti['id'].'" rel="async-post"><img class="img" src="/images/W8TFwFc9d1E.gif" alt="" style="top: 0px;" height="14" width="16">Poke</a><a class="mls declineButton uiCloseButton uiCloseButtonSmall" href="#" role="button" rel="async-post" fjax="/pokesd/suggestions/?declined_id='.$uti['id'].'" title="Hide suggestion"></a></div></div><div class="uiProfileBlockContent"><div style="display: inline-block;"><div style="vertical-align: middle;display:inline-block;height:32px;"></div><div style="vertical-align: middle;display:inline-block;"><div class="userSuggestionName"><span class="fwb lb"><a href="/'.$uti['username'].'">'.$uti['fullname'].'</a></span></div></div></div></div></div></div></li>';


$ax++;
if($ax==$axs){break;}
}
if($ax==$axs){break;}
}

$secho.='
</ul>
</div>
</div>';

if($ax>0){
echo'
<div id="poke_suggestions_rw">

<div style="margin-bottom:10px;">
<div class="right_containerh" style="color:#333333;font-weight:bold;margin-bottom:0;" id="poke_suggestions_rt">
Poke Suggestions
</div>';

echo'<div class="ego_unit_container" id="poke_suggestions_rwv">';

echo $secho;

echo'</div>';

echo'</div>';
}

?>