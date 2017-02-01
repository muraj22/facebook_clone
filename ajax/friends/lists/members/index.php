<?php
include("start.php");

foreach($_POST as $k=>$v){
${$k}=$v;	
}

$listid=$sbid;

$r=mysql_query("SELECT * FROM lists WHERE id='$uid' AND sbid='$sbid'");
$c=mysql_num_rows($r);

if($c==0){
exit();	
}
while($m=mysql_fetch_array($r)){
$listn=$m['listn'];	
}

if(!isset($gs)){
$gs=0;	
}
else{
$already="t";	
}

$gsv=200;

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND listid='$sbid' AND visibility='v' ORDER BY datetimep DESC LIMIT $gs,$gsv");
$c=mysql_num_rows($r);
$tr=$c+$gs;

$secho="";
if(!isset($already)){
$secho.='<div class="standardLayout editFriendListLayout membersOnly">';

$secho.='<div class="pam filterBox uiBoxGray topborder"><div class="clearfix"><div class="uiSelector inlineBlock selector editFriendsSelector lfloat uiSelectorNormal uiSelectorDynamicLabel" id="u78bt115"><div class="wrap"><a class="autofocus uiSelectorButton uiButton" href="#" role="button" aria-haspopup="1" aria-expanded="false" data-length="30" rel="toggle"><span class="uiButtonText">On This List</span></a><div class="uiSelectorMenuWrapper uiToggleFlyout"><div role="menu" class="uiMenu uiSelectorMenu"><ul class="uiMenuInner"><li class="uiMenuItem uiMenuItemRadio uiSelectorOption" data-label="Friends"><a class="itemAnchor" role="menuitemradio" tabindex="0" href="#" aria-checked="false" data-typeahead="1" fjax="/ajax/chooser/list/friends/all/?sbid='.$sbid.'" data-a_starts="list_members_loading" data-a_custom_f="list_members_loaded" data-a_id="listload"><span class="itemLabel fsm">Friends</span></a></li><li class="uiMenuItem uiMenuItemRadio uiSelectorOption" data-label="Pages"><a class="itemAnchor" role="menuitemradio" tabindex="-1" href="#" aria-checked="false" data-typeahead="1" ajaxify="/ajax/chooser/list/pages/"><span class="itemLabel fsm">Pages</span></a></li><li class="uiMenuSeparator"></li><li class="uiMenuItem uiMenuItemRadio uiSelectorOption checked onthislist" data-label="On This List"><a class="itemAnchor" role="menuitemradio" tabindex="-1" href="#" aria-checked="true" data-typeahead="1"><span class="itemLabel fsm">On This List</span></a></li></ul></div></div></div></div><div class="uiTypeahead uiClearableTypeahead sbProfileBrowserTypeahead rfloat" id="u78bt116"><div class="wrap"><label class="clear uiCloseButton" id="u78bt117" for="u78bt118"><input title="Remove" onclick="" id="u78bt118" type="button"></label><input value="{}" autocomplete="off" class="hiddenInput" name="profileChooserItems" type="hidden"><div class="innerWrap"><input data-source="onthislist" class="inputtext textInput search" data-sbid="'.$sbid.'" placeholder="Search..." autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-owns="typeahead_list_u78bt116" role="combobox" spellcheck="false" value="Search..." aria-label="Search..." type="text"></div></div></div></div></div>';


$secho.='<div class="listView clearfix"><div class="lists" style="display:inline-block;width:100%;">';

if($c!=0){
$dclass="";	
}
else{
$dclass="hidden_sb";
}

$secho.='<div class="sbProfileBrowserResult scrollable threeColumns hideSummary list_members '.$dclass.'" id="onthislist_list"><div class="sbProfileBrowserListContainer gridView"><div class="listSection clearfix"><ul role="listbox" class="typeahead_list lists_members typeahead_list">';
}

while($m=mysql_fetch_array($r)){

$uti=sb_user($m['id2']);

$dpic=$uti['profilepic'];
$dpic=str_replace("a.","_s.",$dpic);

$secho.='<li role="option" data-uidv="'.$m['id2'].'" data-un="'.$uti['username'].'" data-pp="/'.$m['id2'].'/pics/'.$uti['profilepict'].'" class="friendListItem friendListItemLarge checkableListItem selectedCheckable"><div class="outline"><a tabindex="-1" href="#" class="anchor"><div class="uiScaledImageContainer"><img style="" class="scaledImageFitWidth" src="/'.$uti['id'].'/pics/'.$dpic.'"></div></a><a class="blockClick"></a><a tabindex="-1" href="/'.$uti['username'].'" class="viewProfile"></a><div class="checkmark"></div><label title="Remove from list" class="removal" data-a_id="'.$uti['id'].'member" fjax="/ajax/friends/lists/members/remove.php?sbid='.$sbid.'&uidv='.$uti['id'].'"></label></div><div class="text">'.$uti['fullname'].'</div></li>';
	
}

if(!isset($already)){
$secho.='</ul></div></div></div>';

$c=mysql_num_rows($r);

if($c==0){$dclass="";}
else{$dclass=" hidden_sb ";}
$secho.='<div class="sbProfileBrowserResult scrollable threeColumns hideSummary noresults '.$dclass.'"><div class="nullstate"><span class="nothingFound">No results</span><div class="searching"><div>Searching...</div><div class="queryThrobber"></div></div></div></div>';	


$secho.='<div class="sbProfileBrowserResult scrollable threeColumns hideSummary search_results hidden_sb"><div class="sbProfileBrowserListContainer gridView"><div class="listSection clearfix"><ul role="listbox" class="typeahead_list search_results"></ul></div></div></div>';

$secho.='</div></div></div>';


$secho.='<input type="text" class="ac_clone hidden_sb">';

echo'
<script type="text/javascript">
var clistid="'.$sbid.'";


$("#d_title_'.$mid.$uid.'").html("Edit '.$listn.'");
$("#d_body_'.$mid.$uid.'").html(\''.$secho.'\');

var path=$(".ac_clone").parents(".pop_container3").eq(0);

smart_pagination_div("onthislist_list",$(path).find(".list_members"),"'.$tr.'","/ajax/friends/lists/members/?sbid='.$sbid.'");

var activeappend="";
var ac_ajax_list_search=false;

		$(".ac_clone").autocomplete({
			minLength: 1,
			appendTo: $(".ac_clone").parent(),
			source: function(request, response) {
			ac_ajax_list_search=$.ajax({
                  url:"/autocomplete/jump_note.php"+activeappend,
                  dataType: "json",
                  data: {term : request.term}
		          }).done(function(data) {
					if(data.length==0){
					var path=$(".ac_clone").parents(".pop_container3").eq(0);
					$(path).find(".nothingFound").html(\'No results for "\'+request.term+\'"\');
					$(path).find(".noresults").removeClass("queryActive");
					$(path).find(".noresults").removeClass("searchingv");
					}
                    response(data);
                  });
			},
			   open: function(event, ui){
				   var where=$(".ac_clone").parent().children(".ui-autocomplete");
				   $(where).addClass("hidden_sb");
            },
			focus : function(event,ui){
				return false;
			},
			select: function( event, ui ) {
				return false;
			},
		})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			var path=$(".ac_clone").parents(".pop_container3").eq(0);
			$(path).find(".noresults").addClass("hidden_sb");
			$(path).find(".noresults").removeClass("queryActive");
			$(path).find(".noresults").removeClass("searchingv");
			$(path).find(".search_results").removeClass("hidden_sb");	

			if(item.imgurl.length>0){
if(item.dclass>0){
item.dclass=" selectedCheckable ";
}
else{
item.dclass="";	
}
						
			return $( \'<li role="option" class="sbProfileBrowserListItem friendListItem checkableListItem \'+item.dclass+\'" data-uidv="\'+item.uidv+\'" data-pp="\'+item.imgurl+\'" data-un="\'+item.url+\'"><div class="clearfix searchViewFriendListItem"><div tabindex="-1" class="_8t _8o lfloat"><div class="outline"><img src="\'+item.imgurl+\'" class="img"><a class="blockClick"></a><a tabindex="-1" href="/\'+item.url+\'" class="viewProfile"></a><div class="checkmark"></div><label title="Remove from list" data-a_id="\'+item.uidv+\'member" fjax="/ajax/friends/lists/members/remove.php?sbid=\'+clistid+\'&uidv=\'+item.uidv+\'" class="removal"></label></div></div><div class="_8m"><div class="_6a"><div style="height: 56px;" class="_6a _6b"></div><div class="_6a _6b"><div class="fsl fwb fcb"><div class="text">\'+item.value+\'</div></div><div class="fsm fwn fcg"></div><div class="fsm fwn fcg">\'+item.location+\'</div></div></div></div></div></li>\' )
				.data( "ui-autocomplete-item", item )
				.appendTo($(".ac_clone").parents(".pop_container3").eq(0).find(".search_results").find(".typeahead_list"));
			}
			
			
		};
		

var dvalv="";

if(bl_lists===undefined){
var bl_lists="";

$(document).on("click","#u78bt117",function(){ //uiButton next to search input
$(".editFriendListLayout .search").val("");
$(".editFriendListLayout .search").focus();
reset_list_search_ac();	
});

function reset_list_search_ac(){
var path=$(".ac_clone").parents(".pop_container3").eq(0);
$(path).find(".nothingFound").html(\'No results\');	
var source=$(path).find(".editFriendListLayout .search").attr("data-source");

$(path).find(".noresults").removeClass("queryActive");
$(path).find(".noresults").removeClass("searchingv");
$(path).find(".search_results").addClass("hidden_sb");	

if(source=="friends"){
var l=$(path).find(".friends").find("li").length;
if(l!=0){
$(path).find(".noresults").addClass("hidden_sb");
$(path).find(".friends").removeClass("hidden_sb");
}
}
else{
var l=$(path).find(".list_members").find("li").length;
if(l!=0){
$(path).find(".noresults").addClass("hidden_sb");
$(path).find(".list_members").removeClass("hidden_sb");
}
}
			

}

$(document).on("keyup",".editFriendListLayout .search",function(){
var path=$(this).parents(".pop_container3").eq(0);
var dval=$(this).val();
var source=$(this).attr("data-source");

var sbid=$(this).attr("data-sbid");

if(source=="friends"){
activeappend="?friends=t&location=t&listid="+sbid;
//alert(activeappend);
}
else{
activeappend="?location=t&listid="+sbid;
}

if(dval==""){
reset_list_search_ac();
return;
}
if(dval!=dvalv){
$(path).find(".search_results").addClass("hidden_sb");	
$(path).find(".list_members").addClass("hidden_sb");	
$(path).find(".friends").addClass("hidden_sb");	

$(path).find(".search_results").eq(0).find(".typeahead_list").html("");
$(path).find(".noresults").addClass("queryActive");
$(path).find(".noresults").addClass("searchingv");
$(path).find(".noresults").removeClass("hidden_sb");
$(".ac_clone").autocomplete("search", dval);
dvalv=dval;
}
});

var friend_to_list=function(){
var uidv=$(this).attr("data-uidv");
var imgurl=$(this).attr("data-pp");
var value=$(this).find(".text").html();
var url=$(this).attr("data-un");

var ui={"value":value,"imgurl":imgurl,"uidv":uidv,"url":url};
var org_elem=$("#taglists_add");
add_to_list(ui,org_elem,$(this))

$(this).addClass("selectedCheckable");
}
$(document).off("click",".editFriendListLayout:not(.membersOnly) .checkableListItem:not(.selectedCheckable)",friend_to_list);
$(document).on("click",".editFriendListLayout:not(.membersOnly) .checkableListItem:not(.selectedCheckable)",friend_to_list);

function remove_from_listv(){
remove_from_list($(this));
}

$(document).off("click",".editFriendListLayout .removal",remove_from_listv);
$(document).on("click",".editFriendListLayout .removal",remove_from_listv);

var friend_off_list=function(){
var uidv=$(this).attr("data-uidv");
var path=$(this).parents(".pop_container3");
$(path).find(".list_members .checkableListItem[data-uidv="+uidv+"]").find(".removal").eq(0).click();
var l=$(path).find(".list_members .checkableListItem:not(.hidden_sb)").length;
if(l==0){
$(path).find(".list_members").addClass("hidden_sb");
}
$(this).removeClass("selectedCheckable");
}
$(document).off("click",".editFriendListLayout:not(.membersOnly) .selectedCheckable",friend_off_list);
$(document).on("click",".editFriendListLayout:not(.membersOnly) .selectedCheckable",friend_off_list);

function ac_list_abort(){
ac_ajax_list_search.abort();
var path=$(".ac_clone").parents(".pop_container3").eq(0);
$(path).find(".noresults").removeClass("queryActive");
$(path).find(".noresults").removeClass("searchingv");	
}

function reset_list_actions(){
stop_pagination("onthislist_list");
stop_pagination("friends_list");

if(ac_ajax_list_search){ac_list_abort();}
}

var list_loaded=function(){
reset_list_actions();

var path=$(this).parents(".pop_container3").eq(0);
$(path).find(".search").attr("data-source","onthislist");
var tsend=$(this).find("a");
var sres=$("#friend_list_sidecol [data-list_total]").attr("data-list_total");
if(sres==0){
sres="2";
}
else{
sres=100;	
}
list_members_loaded(sres,tsend,"f");
}
$(document).off("click",".onthislist",list_loaded);
$(document).on("click",".onthislist",list_loaded);

function list_members_loaded(response,org_elem,f){
reset_list_actions();

var path=$(org_elem).parents(".pop_container3").eq(0);
$(path).find(".search").val("");
$(path).find(".search_results").addClass("hidden_sb");
$(path).find(".noresults").addClass("hidden_sb");
	if(f){
var celem=$(org_elem).parent(".uiSelectorOption").eq(0).attr("data-label");
if(celem=="Friends"){
$(path).find(".search").attr("data-source","friends")
$(path).find(".editFriendListLayout").removeClass("membersOnly");
$(path).find(".list_members").addClass("hidden_sb");
$(path).find(".friends").removeClass("hidden_sb");
$(path).find(".dialog_foot_note").removeClass("hidden_sb");

restart_pagination("friends_list");
}
else{
$(path).find(".search").attr("data-source","onthislist")
$(path).find(".editFriendListLayout").addClass("membersOnly");
$(path).find(".friends").addClass("hidden_sb");
$(path).find(".dialog_foot_note").addClass("hidden_sb");

$(path).find(".list_members").removeClass("hidden_sb");
restart_pagination("onthislist_list");
}
if(response=="2"){
$(path).find(".friends").addClass("hidden_sb");
$(path).find(".list_members").addClass("hidden_sb");

$(path).find(".dialog_foot_note").addClass("hidden_sb");
$(path).find(".noresults").removeClass("hidden_sb");
}
	return false;	
	}
	$(org_elem).removeAttr("fjax");
	$(org_elem).bind("click",function(){
	if(response==""){var sres="2";}
	else{var sres="";}
	list_members_loaded(sres,$(this),"f")	
	});

$(path).find(".sbProfileBrowserResult").removeClass("queryActive");	

var res=$.parseJSON(response);

$(path).find(".lists").prepend(res.res);
$(path).find(".dialog_foot_note").removeClass("hidden_sb");

var org_elem=$(path).find("#friends_list");
smart_pagination_div("friends_list",org_elem,res.tr,"/ajax/chooser/list/friends/all/?sbid="+clistid);

}


function list_members_loading(org_elem){
reset_list_actions();

var path=$(org_elem).parents(".pop_container3").eq(0);
$(path).find(".search").val("");
$(path).find(".search_results").addClass("hidden_sb");

$(path).find(".search").attr("data-source","friends")

$(path).find(".noresults").addClass("queryActive");
$(path).find(".list_members").addClass("hidden_sb");
$(path).find(".noresults").removeClass("hidden_sb");
$(path).find(".editFriendListLayout").removeClass("membersOnly");
}

$(document).off("click",".friendListItem .removal").on("click",".friendListItem .removal",function(){
$(this).parents(".friendListItem").addClass("hidden_sb");	
});

}


$("#d_label_confirm_'.$mid.$uid.'").before(\'<div style="float:left;" class="mts dialog_foot_note hidden_sb">Add and remove people from this list by clicking on their names.</div>\');

$("#d_body_'.$mid.$uid.'").find("input:text,textarea").blur();

//$("#d_label_confirm_'.$mid.$uid.'").attr("href","/lists/'.$sbid.'");
//$("#d_label_confirm_'.$mid.$uid.'").attr("data-ojax","t");
//$("#d_label_confirm_'.$mid.$uid.'").attr("data-rmenu_norefresh","t");

$("#d_body_'.$mid.$uid.'").css("padding","0");

$("#loading_d_'.$mid.$uid.'").css("display","none");
$("#d_container_'.$mid.$uid.'").css("display","block");
$("#d_container_'.$mid.$uid.'").parent().eq(0).wrap(\'<div id="d_overlay_'.$mid.$uid.'" class="white_overlay"></div>\');

</script>
';
} // !isset already finished
else{ //assuming already [query from smart pagination]
$params['res']=$secho;
$params['tr']=$tr;
echo json_encode($params);
}
include("end.php");
?>