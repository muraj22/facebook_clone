<?php
include("start.php");

$body='When real world friends look for you using a search engine, this setting makes it possible for them to see a preview of your Facebook timeline (containing only info that\\\'s public). If you continue, friends may not know if it\\\'s really you.';

echo'
<script type="text/javascript">
$("#d_title_'.$mid.$uid.'").html("Are you sure?");
$("#d_body_'.$mid.$uid.'").html(\''.$body.'\');

$("#d_button_confirm_'.$mid.$uid.'").val("Confirm");

var path=$("#d_label_confirm_'.$mid.$uid.'");


$("#d_label_confirm_'.$mid.$uid.'").bind("click",function(){
var did=$(this).parents(".pop_container3").eq(0).attr("data-opener");
var dialogid=$("#"+did).attr("data-dialogid");
$("#"+did).next("a").click();
remove_dialog(dialogid);	
});



$("#d_label_confirm_'.$mid.$uid.'").css("display","inline-block");
$("#d_label_cancel_'.$mid.$uid.'").css("display","inline-block");

$("#loading_d_'.$mid.$uid.'").css("display","none");
$("#d_container_'.$mid.$uid.'").css("display","block");

</script>
';

include("end.php");
?>