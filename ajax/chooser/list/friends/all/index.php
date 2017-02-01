<?php
include("start.php");

if(!isset($gs)){
$gs=0;
}
else{$already="t";}
$gsv=200;

$r=mysql_query("SELECT * FROM registered WHERE FIND_IN_SET(id,'$uid_friends_comma')>0 ORDER BY fullname ASC LIMIT $gs,$gsv");

$c=mysql_num_rows($r);
$tr=$c;

$secho="";

if($c!=0 && !isset($already)){
$secho.='<div class="sbProfileBrowserResult scrollable threeColumns hideSummary friends" id="friends_list"><div class="sbProfileBrowserListContainer gridView"><div class="listSection clearfix"><ul role="listbox" class="typeahead_list friends">';
}

while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id']);
$uidv=$m['id'];

$dpic=$uti['profilepic'];
$dpic=str_replace("a.","_s.",$dpic);

$c2=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c2 FROM lists_members WHERE id='$uid' AND id2='$uidv' AND listid='$sbid' AND visibility='v'"));
$c2=$c2['c2'];


if($c2==0){
$dclass="";	
}
else{
$dclass=" selectedCheckable ";	
}


	$secho.='<li role="option" data-uidv="'.$m['id'].'" data-un="'.$uti['username'].'" data-pp="/'.$m['id'].'/pics/'.$uti['profilepict'].'" class="friendListItem friendListItemLarge checkableListItem '.$dclass.'"><div class="outline"><a tabindex="-1" href="#" class="anchor"><div class="uiScaledImageContainer"><img style="" class="scaledImageFitWidth" src="/'.$uti['id'].'/pics/'.$dpic.'"></div></a><a class="blockClick"></a><a tabindex="-1" href="/'.$uti['username'].'" class="viewProfile"></a><div class="checkmark"></div><label title="Remove from list" class="removal" data-a_custom_f="remove_from_list" data-a_id="'.$uti['id'].'member" fjax="/ajax/friends/lists/members/remove.php?sbid='.$sbid.'&uidv='.$uti['id'].'"></label></div><div class="text">'.$uti['fullname'].'</div></li>';

}


if($c!=0 && !isset($already)){
$secho.='</ul></div></div></div>';
}

$params['res']=$secho;
$params['tr']=$tr+$gs;

echo json_encode($params);

include("end.php");
?>