<?php
include("start.php");

foreach($_POST as $k=>$v){
${$k}=$v;
}
$r=mysql_query("SELECT * FROM media WHERE sbid='$vid' AND id='$uidv'");
$c=mysql_num_rows($r);
if($c==0){
mysql_close($con); exit();	
}
$decho='<div id="embed_'.$vid.'"><script type="text/javascript" src="/v/'.$vid.'"></script></div>';
$decho=htmlspecialchars($decho,ENT_QUOTES,'UTF-8');

$uidv=$uidv;
echo '<script type="text/javascript">
$(".video_embed_textarea").html(\''.$decho.'\');
$("#loading_d_'.$dialogid.$uidv.'").css("display","none");
$("#d_container_'.$dialogid.$uidv.'").parent().wrap(\'<div id="d_overlay_'.$dialogid.$uidv.'" class="white_overlay"></div>\');
$("#d_container_'.$dialogid.$uidv.'").css("display","block");
</script>';

?>
<?php
include("end.php");
?>