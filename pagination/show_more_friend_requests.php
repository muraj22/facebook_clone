<?php  
if(!isset($gs)){$gs=1;}
if($gs!=0){
foreach($_POST as $k=>$v){
${$k}=$v;
}
include("start.php");
}

$secho="";

$ax=$gs;



if(isset($_POST['a'])){

if($gs==0){
$secho.='<div class="p_wrapper">';
}

$tr=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM friends WHERE id='$uid' AND confirmed='nc'"));
$cv=$tr['c'];

$r=mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='nc' ORDER BY datetimep DESC LIMIT $gs,$gsv");
$c=mysql_num_rows($r);
while($m = mysql_fetch_array($r))
{

$uti=sb_user($m['id2']);
$secho.='<table style="border:0;border-bottom:1px solid rgb(233, 233, 233);width:662px;margin-top:0px;margin-bottom:0;background:none repeat scroll 0% 0% #ffffff;padding-right:4px;padding-top:8px;padding-bottom:8px;" id="confirmvm'.$ax.'"><tr><td style="width:100px;"><a href="/'.$uti['id'].'/"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="width:100px;height:100px;"></a></td><td class="friendslinkb" style="text-align:left;width:125px;vertical-align:top;"><span style="position:relative;top:0px;left:5px;"><a href="/'.$uti['username'].'">'.$uti['fullname'].'</a></span></td><td><div style="position:relative;margin:0;padding:0;"><div style="position:absolute;margin:0;padding:0;right:-7px;top:0px;"><label class="confirmrequest" id="confirmm'.$ax.'" onclick="confirmfriend(\''.$uti['id'].'\','.$ax.',\'m\');"><input type="button" class="confirmrequest2" value="Confirm"></label><input type="button" class="addfriend" value="Friends" style="color:#666666;text-align:right;padding-left:17px;cursor:default;display:none;" id="confirmvvm'.$ax.'"><div class="check" style="position:absolute;top:3px;left:8px;cursor:default;display:none;" id="confirmvvvm'.$ax.'"></div><input id="notnowm'.$ax.'" type="button" class="notnow" value="Not Now" style="margin-left:4px;" onclick="unconfirmfriend(\''.$uti['id'].'\','.$ax.',\'m\');" rel="'.$uti['id'].'"><div id="notnowvm'.$ax.'" style="display:none;">Friend request hidden.</div></div></div></td></tr></table>';
$ax++;
}


$total_retrieved=$c+$gs;

if($cv!=$total_retrieved && $gs==0){
$secho.='</div>';
$secho.='<div class="showmr" style="width:630px;display:block;" data-a_starts="loading_showmfh" data-a_custom_f="showmfh" fjax="/showmfh.php?gs='.$gsv.'&gsv=1&a=t">Show More</div><div class="hidden_sb showmr loading_wrapper" style="width:630px;display:block;text-decoration:none;text-align:center;"><div style="display:inline-block;margin:0;padding:0;">&nbsp;<div class="loading_bars" style="width:11px;height:16px;float:left;position:absolute;margin:0;padding:0;"></div></div></div>';
}

	
if($gs!=0){
$secho.='{}'.$total_retrieved.'{}'.$gs.'{}'.$cv;
echo $secho;
}


}

else{

if($gs==0){
$secho.='<div class="p_wrapper">';
}

$tr=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM friends WHERE id='$uid' AND confirmed='nkv'"));
$cv=$tr['c'];

$r=mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='nkv' ORDER BY datetimep DESC LIMIT $gs,$gsv");
$c=mysql_num_rows($r);
while($m = mysql_fetch_array($r))
{

$uti=sb_user($m['id2']);
$secho.='<table style="border:0;border-bottom:1px solid rgb(233, 233, 233);width:662px;margin-top:0px;margin-bottom:0;background:none repeat scroll 0% 0% #ffffff;padding-right:4px;padding-top:8px;padding-bottom:8px;" id="confirmv'.$ax.'"><tr><td style="width:100px;"><a href="/'.$uti['id'].'/"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="width:100px;height:100px;"></a></td><td class="friendslinkb" style="text-align:left;width:125px;vertical-align:top;" id="increasemw'.$ax.'"><span style="position:relative;top:0px;left:5px;"><a href="/'.$uti['username'].'">'.$uti['fullname'].'</a></span><div class="fr_give_feedback" id="notnowv'.$ax.'" style="display:none;color:#666666;position:relative;left:5px;">Request deleted. Do you know '.$uti['f_name'].' outside of Facebook?<div style="display:block;"><span class="friendslink2s" data-a_quick="thanks_fr_feedback" fjax="/unconfirmfriend.php?amigo='.$uti['id'].'&uknowledge=y" data-c="'.$ax.'">Yes</span><span style="margin-left:2px;margin-right:2px;">&#183;</span><span class="friendslink2s" data-a_quick="thanks_fr_feedback" fjax="/unconfirmfriend.php?amigo='.$uti['id'].'&uknowledge=n" data-c="'.$ax.'">No</span></div></div>
</td><td><div style="position:relative;margin:0;padding:0;"><div style="position:absolute;margin:0;padding:0;right:-7px;top:0px;"><label class="confirmrequest" id="confirm'.$ax.'" onclick="confirmfriend(\''.$uti['id'].'\','.$ax.');"><input type="button" class="confirmrequest2" value="Confirm"></label><input type="button" class="addfriend" value="Friends" style="color:#666666;text-align:right;padding-left:17px;cursor:default;display:none;" id="confirmvv'.$ax.'"><div class="check" style="position:absolute;top:3px;left:8px;cursor:default;display:none;" id="confirmvvv'.$ax.'"></div><label id="notnow'.$ax.'" class="notnowo" onclick="unconfirmfriendd(\''.$uti['id'].'\','.$ax.');"><input id="notnowo'.$ax.'" type="button" class="notnowo2" value="Delete Request" rel="'.$uti['id'].'"></label></div></div></td></tr></table>';
$ax++;
}

$total_retrieved=$c+$gs;

if($cv!=$total_retrieved && $gs==0){
$secho.='</div>';
$secho.='<div class="showmr" style="width:630px;display:block;" data-a_starts="loading_showmfh" data-a_custom_f="showmfh" fjax="/showmfh.php?gs='.$gsv.'&gsv=1">Show More</div><div class="hidden_sb showmr loading_wrapper" style="width:630px;display:block;text-decoration:none;text-align:center;"><div style="display:inline-block;margin:0;padding:0;">&nbsp;<div class="loading_bars" style="width:11px;height:16px;float:left;position:absolute;margin:0;padding:0;"></div></div></div>';
}

if($gs!=0){
$secho.='{}'.$total_retrieved.'{}'.$gs.'{}'.$cv;
echo $secho;
}

}




if($gs!=0){
include("end.php");
}
?>