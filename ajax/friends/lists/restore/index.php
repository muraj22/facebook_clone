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
$("#d_title_'.$mid.$uid.'").html("Restore '.$listn.'?");
$("#d_body_'.$mid.$uid.'").html(\'<div>When you restore '.$listn.' you\\\'ll be able to share posts with this list and it will re-appear in your left-hand homepage links.<br><br>If you change your mind later, you can archive this list again.</div>\');
$("#d_body_'.$mid.$uid.'").css("border-bottom-color","rgb(204,204,204)");

$("#d_label_confirm_'.$mid.$uid.'").addClass("displaydialog");
$("#d_label_confirm_'.$mid.$uid.'").attr("data-d_fjax","/ajax/friends/lists/restore/?sbid='.$sbid.'&type=a&oldmid='.$mid.'");
$("#d_label_confirm_'.$mid.$uid.'").attr("data-d_isajax","t");

$("#d_label_confirm_'.$mid.$uid.'").unbind("click");
$("#d_label_confirm_'.$mid.$uid.'").bind("click",function(){
$(this).parents(".pop_container3").eq(0).fadeOut("fast");	
});

$("#d_label_confirm_'.$mid.$uid.'").css("display","inline-block");

$("#d_button_confirm_'.$mid.$uid.'").val("Restore");
$("#d_button_cancel_'.$mid.$uid.'").val("Cancel");

$("#loading_d_'.$mid.$uid.'").css("display","none");
$("#d_container_'.$mid.$uid.'").css("display","block");
</script>
';	
echo '#d_container_'.$mid.$uid;
}
else{
mysql_query("UPDATE lists SET visibility='v' WHERE sbid='$sbid' AND id='$uid'");

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