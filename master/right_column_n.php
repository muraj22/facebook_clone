<?php
echo'
<div style="position:fixed;width:244px;margin:0;padding:0;padding-top:9px;z-index:20;" id="right_containerpt">';
if(isset($clist)){
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$r=mysql_query("SELECT * FROM lists WHERE id='$uid' AND sbid='$clist'");
while($m=mysql_fetch_array($r)){
$clistph=get_list_ph($m['type']);
}

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM lists_members WHERE listid='$clist' AND id='$uid' AND visibility='v'"));
$c=$c['c'];

$r=mysql_query("SELECT * FROM lists_members WHERE listid='$clist' AND id='$uid' AND visibility='v' ORDER BY datetimep DESC LIMIT 14");

if($c==0){
$hidden_sb="hidden_sb";
}
else{
$hidden_sb="";
}


echo'
<div id="friend_list_sidecol">
<div data-sbid="'.$clist.'" class="sbFriendListMemberBox" id="ur4x3i182"><div class="uiHeader uiHeaderTopAndBottomBorder uiHeaderSection sbFriendListMemberBoxTitle"><div class="clearfix uiHeaderTop"><div class="rfloat"><div class="uiHeaderActions fsm fwn lb"><a rel="dialog" href="#" data-d_isajax="t" data-d_fjax="/ajax/friends/lists/members/?sbid='.$clist.'" data-d_width="562" data-d_okay="Finish" data-d_okay_function="close_dialog_nofade" role="button">See All</a></div></div><div><h3 class="uiHeaderTitle" aria-hidden="true">On This List <span class="'.$hidden_sb.'" data-list_total="'.$c.'">('.$c.')</span></h3></div></div></div><div class="phs"><div class="sbFriendListMemberBoxContent">';


echo'<div class="uiFacepile sbFriendListMemberBoxFacepile uiFacepileMedium '.$hidden_sb.'" id="ur4x3i183"><ul class="uiList pvm uiFacepileList _4ki clearfix ">';

while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id2']);
echo'<li data-uidv="'.$uti['id'].'" class="uiFacepileItem uiListItem"><a data-t_text="'.$uti['fullname'].'" data-t_topleft="t" class="link" href="/'.$uti['username'].'"><img class="_s0 _rx img" src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" alt="" data-jsid="img"></a></li>
';
}

echo'</ul></div>';

if($c==0){$dclass="";}
else{
$dclass="hidden_sb";	
}
echo'<div class="fcg pvm '.$dclass.'" style="display:block;">This list is currently empty.</div>';


echo'</div></div>';


echo'
<script type="text/javascript">
function add_to_list(ui,org_elem,f){
if(f===undefined){
var ui=ui;
}

var delem=$(org_elem).parents(".sbFriendListMemberBox");

var l=$(delem).find(".uiList").find("li").length;
if(l>13){
$(delem).find(".uiList").find("li:last").remove();	
}

var list_total=$(delem).find("[data-list_total]").attr("data-list_total");

list_total=parseInt(list_total);
list_total=list_total+1;

$(delem).find("[data-list_total]").attr("data-list_total",list_total);

var uidv=ui.uidv;
var sbid=$(delem).attr("data-sbid");

var li=\'<li data-uidv="\'+uidv+\'" class="uiFacepileItem uiListItem"><a data-t_text="\'+ui.value+\'" data-t_topleft="t" class="link" href="/\'+ui.url+\'"><img class="_s0 _rx img" src="\'+ui.imgurl+\'" alt="" data-jsid="img"></a></li>\';


$(delem).find(".uiList").prepend(li);
$(delem).find(".uiFacepile").next().addClass("hidden_sb");
$(delem).find(".uiHeaderTitle").find("span").removeClass("hidden_sb");

$(delem).find(".uiFacepile").removeClass("hidden_sb");
$(delem).find("[data-list_total]").html("("+list_total+")");



$(delem).append(\'<div class="hidden_sb" data-a_id="\'+uidv+\'member" fjax="/ajax/friends/lists/new/member.php?uidv=\'+uidv+\'&sbid=\'+sbid+\'"></div>\').find("[fjax]:last").click();

$(org_elem).val("");
$(org_elem).focus();

$("#main_divg").find("li.uiListItem[data-uidv="+uidv+"], div.mtabled[data-uidv="+uidv+"]").css("display","none").removeClass("hidden_sb").fadeIn(700);

if(f!==undefined){ //org_elem
var path=$(f).parents(".pop_container3").eq(0);
var l=$(path).find(".lists_members").length;
if(l==0){
var nelem=\'<div class="sbProfileBrowserResult scrollable threeColumns hideSummary list_members hidden_sb"><div class="sbProfileBrowserListContainer gridView"><div class="listSection clearfix"><ul role="listbox" class="typeahead_list lists_members"></ul></div></div></div>\';
$(path).find(".lists").prepend(nelem);
}
var l=$(path).find(".list_members .checkableListItem[data-uidv="+uidv+"]");
var lv=l.length;
if(lv>0){
$(l).removeClass("hidden_sb"); //just in case
}
else{
var nelem=$(path).find(".friends .checkableListItem[data-uidv="+uidv+"]");
if(nelem.length>0){
nelem.clone();
}
else{
var nelem=$(path).find(".search_results .checkableListItem[data-uidv="+uidv+"]");
$(nelem).find(".searchViewFriendListItem").removeClass("searchViewFriendListItem");	
}
$(nelem).addClass("selectedCheckable");
$(path).find(".list_members").prepend(nelem);
}

}

}

function remove_from_list(org_elem){
var path=$(org_elem).parents(".pop_container3").eq(0);
var uidv=$(org_elem).parents(".friendListItem").eq(0).attr("data-uidv");

$(".sbFriendListMemberBox").find("li[data-uidv="+uidv+"]").remove();

var list_total=$(".sbFriendListMemberBox").find("[data-list_total]").attr("data-list_total");
list_total=parseInt(list_total);
list_total=list_total-1;
$(".sbFriendListMemberBox").find("[data-list_total]").attr("data-list_total",list_total);
if(list_total==0){
$(".sbFriendListMemberBox").find("[data-list_total], .uiFacepile").addClass("hidden_sb");
$(".sbFriendListMemberBox").find(".uiFacepile").next().removeClass("hidden_sb");
}
else{
$(".sbFriendListMemberBox").find("[data-list_total]").html("("+list_total+")");
}
$("#main_divg").find("li.uiListItem[data-uidv="+uidv+"], div.mtabled[data-uidv="+uidv+"]").addClass("hidden_sb");
var l=$(path).find(".friends .checkableListItem[data-uidv="+uidv+"]").length;
if(l>0){
$(path).find(".friends .checkableListItem[data-uidv="+uidv+"]").removeClass("selectedCheckable");
}
}
</script>

<div style="width:231px;position:relative;top:-2px;" class="ac_wrap"><div style="width:100%;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;border:1px solid #bdc7d8;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="lists_add" data-ac_additionals="margin-left:-1px;" data-ac_inputa="padding-left:15px;" data-ac_liwidth="231" data-ac_inputw="231" data-ac_url="/autocomplete/jump_note.php?friends=t" data-ac_style="with_pic" data-ac_placeholder="'.$clistph.'" data-ac_position="fixed" data-ac_custom_ff="add_to_list" data-ac_custom_f_r="remove_tag"><div style="position:relative;" class="ac_prepend hidden_sb">
<i class="crucecitag" style="position:absolute;left:5px;top:5px;z-index:2;"></i></div></div></div>
';

echo'
</div>


</div>
';


}


if(!in_array("0",$params['right_col_modules'])){ //case of a list, no right col modules at all
foreach($params['right_col_modules'] as $k=>$v){
include("right_column_modules/".$v.".php");	
}
}

echo'
</div>';

?>