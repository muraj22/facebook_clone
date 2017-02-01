<?php
include("start.php");

foreach($_POST as $k=>$v){
${$k}=$v;	
}

if(!isset($type)){
$r=mysql_query("SELECT * FROM lists WHERE sbid='$sbid' AND id='$uid'");
while($m=mysql_fetch_array($r)){
$listn=$m['listn'];
$type=$m['type'];	
}


echo'
<script type="text/javascript">
$("#d_title_'.$mid.$uid.'").html("Delete '.$listn.'?");
$("#d_body_'.$mid.$uid.'").html(\'<div>When you delete a list: <ul class="uiList pam _4of _4kg _6-h _6-j _6-i"><li><div class="fcb">The same people can still see any posts you shared with this list in the past.</div></li><li><div class="fcb">Deleting a list can\\\'t be undone, but you can create a new list and add the same people and pages.</div></li></ul></div>\');
$("#d_body_'.$mid.$uid.'").css("border-bottom-color","rgb(204,204,204)");

$("#d_label_confirm_'.$mid.$uid.'").addClass("displaydialog");
$("#d_label_confirm_'.$mid.$uid.'").attr("data-d_fjax","/ajax/friends/lists/delete/?sbid='.$sbid.'&type=a&oldmid='.$mid.'");
$("#d_label_confirm_'.$mid.$uid.'").attr("data-d_isajax","t");

$("#d_label_confirm_'.$mid.$uid.'").unbind("click");
$("#d_label_confirm_'.$mid.$uid.'").bind("click",function(){
$(this).parents(".pop_container3").eq(0).fadeOut("fast");	
});

$("#d_label_confirm_'.$mid.$uid.'").css("display","inline-block");

$("#d_button_confirm_'.$mid.$uid.'").val("Delete List");
$("#d_button_cancel_'.$mid.$uid.'").val("Cancel");

$("#loading_d_'.$mid.$uid.'").css("display","none");
$("#d_container_'.$mid.$uid.'").css("display","block");
</script>
';	
echo '#d_container_'.$mid.$uid;
}
else{
$noname=array();
$noname[]="acquaintances";
$noname[]="restricted";
$noname[]="close_friends";

$dtypes="";
foreach($noname as $k=>$v){
$dtypes.=",".$v;
}

mysql_query("UPDATE lists SET visibility='d' WHERE sbid='$sbid' AND id='$uid' AND FIND_IN_SET(type,'$dtypes')=0");

echo'
<script type="text/javascript">
$("#loading_d_'.$mid.$uid.'").css("display","none");
$("#d_container_'.$oldmid.$uid.'").css("display","block");

$("#d_container_'.$oldmid.$uid.'").fadeOut("slow",function(){
window.location.("/bookmarks/lists/");
remove_dialog("'.$oldmid.'");
remove_dialog("'.$mid.'");
});
</script>
';
	
}
include("end.php");
?>