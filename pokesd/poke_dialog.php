<?php
include("start.php");
foreach($_POST as $k=>$v){
${$k}=$v;
}

include("functions/sb_user.php");
include("functions/grs.php");

$uti=sb_user($uidv);
$likeid=grs(25);

$r=mysql_query("SELECT * FROM pokes WHERE id='$uid' AND id2='$uidv' ORDER BY datetimep DESC LIMIT 1");
while($m=mysql_fetch_array($r)){
$pokedbackv=$m['pokedback'];	
}

if(isset($pokedbackv) && $pokedbackv==0){

echo'

<script type="text/javascript">
$("#d_title_'.$mid.$uid.'").html("Error");
$("#d_body_'.$mid.$uid.'").html(\'<div class="clearfix"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="max-width:100px;display:block;float:left;" class="mrs"><div style="display: table-cell;vertical-align: top;">'.$uti['f_name'].' has not responded to your last poke.</div></div>\');

$("#d_label_cancel_'.$mid.$uid.'").css("display","none");
$("#d_label_confirm_'.$mid.$uid.'").val("Okay");

$("#loading_d_'.$mid.$uid.'").css("display","none");
$("#d_container_'.$mid.$uid.'").css("display","block");
</script>

';

}

else{
mysql_query("INSERT INTO pokes (pokeid,id,id2,pokedback,visibility,datetimep) VALUES('$likeid','$uid','$uidv','0','v',UNIX_TIMESTAMP())");


echo'
<script type="text/javascript">
$("#d_title_'.$mid.$uid.'").html("Poked '.$uti['fullname'].'");
$("#d_body_'.$mid.$uid.'").html(\'You have poked '.$uti['fullname'].'.\');
$("#d_body_'.$mid.$uid.'").css("border-bottom-color","rgb(204,204,204)");

$("#d_footer_'.$mid.$uid.'").html("");
$("#d_footer_'.$mid.$uid.'").css("border","0");
$("#d_footer_'.$mid.$uid.'").css("height","1px");
$("#d_footer_'.$mid.$uid.'").css("padding","0");
$("#d_footer_'.$mid.$uid.'").css("background","rgb(85,85,85)");

$("#loading_d_'.$mid.$uid.'").css("display","none");
$("#d_container_'.$mid.$uid.'").css("display","block");

$.doTimeout(1900,function(){
$("#d_container_'.$mid.$uid.'").fadeOut("slow",function(){
var did=$(this).attr("dialogid");
remove_dialog(did);	
});
});
</script>
';
}
include("end.php");
?>