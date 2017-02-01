<?php  

include("start.php");
?>
<?php
$response='<ul class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all" style="display:inline-block;width:100%;position:relative;" id="recent_tagsv">';
$r=mysql_query("SELECT DISTINCT id3 FROM tags WHERE id2='$uid' OR id='$uid' ORDER BY datetimep DESC limit 5");
while($m=mysql_fetch_array($r)){
	$uti=sb_user($m['id3']);
	$response.='<li class="ui-menu-item"><a class="clearfix ui-corner-all put"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="width:50px;height:50px;float:left;"><div class="clearfix"><div style="float:left;position:relative;margin-left:5px;font-weight:bold;">'.$uti['fullname'].'</div></div></a></li>';
}
$response.='</ul>';
echo $response;
?>
<?php include("end.php"); ?>