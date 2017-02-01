<?php
include("start.php");
include("populate_page.php");

$echo.='
<script type="text/javascript">
function create_list(response,org_elem){

var dialogid=$(org_elem).attr("data-dialogid");
$("#loading_d_"+dialogid+"'.$uid.'").css("display","none");
if($(org_elem).attr("d_l_wrap")!==undefined){
$("#d_container_"+dialogid+"'.$uid.'").parent().wrap(\'<div id="d_overlay_\'+dialogid+\''.$uid.'" class="white_overlay"></div>\');
}
$("#d_container_"+dialogid+"'.$uid.'").css("display","block");


$("#d_body_"+dialogid+"'.$uid.'").html(response);
$("#d_body_"+dialogid+"'.$uid.'").find("textarea").focus();

$("#d_body_"+dialogid+"'.$uid.'").find("[data-ac_enable]").click();
//any existing tags input gets initialized
$("#sbFriendListTokenizer").bind("click",function(){
$("#tagcreate_list").focus();
});
}

function new_list_success(response,org_elem){

//alert(response);
}
</script>
<div style="float:left;margin-right: 0px;padding:0 20px;padding-right:0;width:493px;">
<div class="uiHeader uiHeaderPage">
<div class="clearfix uiHeaderTop"><div class="rfloat"><div class="uiHeaderActions"><a class="uiButton displaydialog" href="#" role="button" data-d_l_fjax="/ajax/friends/lists/new" data-d_leave_loading="show_loading" data-d_l_a_custom_f="create_list" data-d_fjax="/ajax/friends/lists/new/create.php" data-a_custom_f="new_list_success" data-d_okay_a_fade="t" data-a_formo="$(this).parents(\'.pop_container3\').eq(0);" data-d_title="Create New List" data-d_okay="Create" data-d_cancel="Cancel" data-d_cancel_function="close_dialog_f" data-d_okay_function="close_dialog_custom" data-d_okay_function_custom="fjax"><i class="mrs img crucecita"></i><span class="uiButtonText">Create List</span></a><a class="uiButton" href="/'.$un.'/friends" role="button"><span class="uiButtonText">See All Friends</span></a></div></div><div><h2 class="uiHeaderTitle" aria-hidden="true">Friends</h2></div></div>
</div>

<div id="pagelet_bookmark_seeall">
<div id="pagelet_seeall_filter">
<div id="bookmarksSeeAllSection"><ul class="uiList sbBookmarksSeeAllList _4kg  _4ks">';

$wgs=0;
$egs=0;
$lgs=0;

$whgs=0;
$ehgs=0;
$lhgs=0;

$cgs=0;

// se debe hacer SELECT COUNT(*) FROM lists WHERE id='$uid' AND location!='' AND visibility='v' - sabiendo el count se sabe si hay mas de 6 que pido en un principio, si es asi
// hacer la lectura con una union mas que al momento de parse sea la llave specialcount ej:
// SELECT COUNT(*) FROM lists as specialcount [ while(()){ if(isset($m['specialcount'])){} else{} }  ]
// con ese specialcount es como si hubiera echo la query por separado, ahi tengo el total de los que levante en la query y asi es como puedo ver si debo hacer incremento en el gs
//otra manera es seguir aumentando al gs, y si se pasa dara 0 y punto - esa es la mejor manera ;), no darle la opcion de hacer click en show more, o si y chequear si hay algo,
//sino habilitar el autoscroller que hace la pagination de pelicula


$r=mysql_query("(SELECT * FROM lists WHERE id='$uid' AND type='close_friends' AND visibility='v') UNION (SELECT * FROM lists WHERE id='$uid' AND type='family' AND visibility='v') UNION (SELECT * FROM lists WHERE id='$uid' AND type='acquaintances' AND visibility='v') UNION (SELECT * FROM lists WHERE id='$uid' AND type='work' AND visibility='v' ORDER BY listn ASC LIMIT $wgs,10) UNION (SELECT * FROM lists WHERE id='$uid' AND type='education' AND visibility='v' ORDER BY listn ASC LIMIT $egs,10) UNION (SELECT * FROM lists WHERE id='$uid' AND type='location' AND visibility='v' ORDER by listn ASC LIMIT $lgs,6) UNION (SELECT * FROM lists WHERE id='$uid' AND type='restricted' AND visibility='v') UNION (SELECT * FROM lists WHERE id='$uid' AND type='custom' AND visibility='v' ORDER BY listn ASC LIMIT $cgs,25) UNION (SELECT * FROM lists WHERE id='$uid' AND type='work' AND visibility='h' ORDER BY listn ASC LIMIT $whgs,10) UNION (SELECT * FROM lists WHERE id='$uid' AND type='education' AND visibility='h' ORDER BY listn ASC LIMIT $ehgs,10) UNION (SELECT * FROM lists WHERE id='$uid' AND type='location' AND visibility='h' ORDER by listn ASC LIMIT $lhgs,6)");
while($m=mysql_fetch_array($r)){
$list=$m['sbid'];
$listn=$m['listn'];

$dclass=get_list_class($m['type']);

$r2=mysql_query("SELECT * FROM favorites WHERE sbidv='$list'");
$c2=mysql_num_rows($r2);
if($c2==0){
$dclassv="favorite";
$text="Add to Favorites";
}
else{
$dclassv="favorite_remove";
$text="Remove from Favorites";
}

$listtype=$m['type'];

if($m['visibility']=="h"){
$dclass=str_replace("sp","hsp",$dclass);	
}

$echo.='
<li class="seeAllItem clearfix key-fl_2470141509416 uiListItem" id="seeAllItem_fl_2470141509416"><div class="uiSelector inlineBlock mtm mrm bookmarksMenuButton lfloat"><div class="wrap"><a class="uiSelectorButton uiCloseButton" href="#" role="button" title="Edit" aria-label="Edit '.$listn.'" aria-describedby="urpelzj1" aria-haspopup="1" rel="toggle"></a><div class="uiSelectorMenuWrapper uiToggleFlyout"><div role="menu" class="uiMenu uiSelectorMenu"><ul class="uiMenuInner"><li class="uiMenuItem '.$dclassv.'" data-dclass="'.$dclass.'" data-dhref="/lists/'.$list.'" data-fav_name="'.$listn.'" data-sbid="'.$list.'" data-label="Add to Favorites"><a class="itemAnchor" role="menuitem" tabindex="0" href="#"><span class="itemLabel fsm">'.$text.'</span></a></li>';

if($m['visibility']=="h"){
$echo.='<li class="uiMenuSeparator"></li><li class="uiMenuItem selected"><a class="itemAnchor displaydialog" href="#" data-d_isajax="t" data-d_cancel_function="close_dialog" data-d_fjax="/ajax/friends/lists/restore/?sbid='.$list.'" rel="dialog"><span class="itemLabel fsm">Restore List</span></a></li>';	
}
else{
if($listtype=="close_friends" || $listtype=="acquaintances" || $listtype=="restricted"){}
else if($listtype!="custom"){
$echo.='<li class="uiMenuSeparator"></li><li class="uiMenuItem selected"><a class="itemAnchor displaydialog" href="#" data-d_isajax="t" data-d_cancel_function="close_dialog" data-d_fjax="/ajax/friends/lists/archive/?sbid='.$list.'" rel="dialog"><span class="itemLabel fsm">Archive List</span></a></li>';	
}
else if($listtype=="custom"){
$echo.='<li class="uiMenuSeparator"></li><li class="uiMenuItem selected"><a class="itemAnchor displaydialog" href="#" data-d_isajax="t" data-d_cancel_function="close_dialog" data-d_fjax="/ajax/friends/lists/delete/?sbid='.$list.'" rel="dialog"><span class="itemLabel fsm">Delete List</span></a></li>';	
}
}

$echo.='</ul></div></div></div></div><a class="pvm phs itemLink" title="'.$listn.'" href="/lists/'.$list.'"><div class="clearfix"><i class="mrs _29h _29i img '.$dclass.'" style="display:block;"></i><div class="clearfix _29j _29k"><div class="lfloat"><span class="itemLabel fcb" id="urpelzj1">'.$listn.'</span></div></div></div></a></li>';




}


$echo.='</ul></div>
</div>
</div>

</div>
';

$params['rhelper_js']='../../';
$params['rhelper']='../../';
$params['title']='Upfrev';

$params['left_link_n']='';
$params['layout']='normal_n';



include("end.php");
?>