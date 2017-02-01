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
$("#d_title_'.$mid.$uid.'").html("Archive '.$listn.'?");
$("#d_body_'.$mid.$uid.'").html(\'<div>When you archive a list: <ul class="uiList pam _4of _4kg _6-h _6-j _6-i"><li><div class="fcb">You won\\\'t be able to share posts with this list and it won\\\'t appear in the links on your homepage.</div></li><li><div class="fcb">This list will only be accessible through your <a href="/bookmarks/lists">Lists</a> page.</div></li><li><div class="fcb">The same people can still see any posts you shared with this list in the past.</div></li></ul> If you change your mind later, you can restore this list.</div>\');
$("#d_body_'.$mid.$uid.'").css("border-bottom-color","rgb(204,204,204)");

$("#d_label_confirm_'.$mid.$uid.'").addClass("displaydialog");
$("#d_label_confirm_'.$mid.$uid.'").attr("data-d_fjax","/ajax/friends/lists/archive/?sbid='.$sbid.'&type=a&oldmid='.$mid.'");
$("#d_label_confirm_'.$mid.$uid.'").attr("data-d_isajax","t");

$("#d_label_confirm_'.$mid.$uid.'").unbind("click");
$("#d_label_confirm_'.$mid.$uid.'").bind("click",function(){
$(this).parents(".pop_container3").eq(0).fadeOut("fast");	
});

$("#d_label_confirm_'.$mid.$uid.'").css("display","inline-block");

$("#d_button_confirm_'.$mid.$uid.'").val("Archive");
$("#d_button_cancel_'.$mid.$uid.'").val("Cancel");

$("#loading_d_'.$mid.$uid.'").css("display","none");
$("#d_container_'.$mid.$uid.'").css("display","block");
</script>
';	
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

if(strpos($dtypes,",")!==false){
$dtypes=substr($dtypes,1);
}
mysql_query("UPDATE lists SET visibility='h' WHERE sbid='$sbid' AND id='$uid' AND FIND_IN_SET(type,'$dtypes')=0");

echo'
<script type="text/javascript">
$("#loading_d_'.$mid.$uid.'").css("display","none");
$("#d_container_'.$oldmid.$uid.'").css("display","block");

$("#d_container_'.$oldmid.$uid.'").fadeOut("slow",function(){
window.location.reload(true);
remove_dialog("'.$oldmid.'");
remove_dialog("'.$mid.'");
});
</script>
';
	
}
include("end.php");
?>