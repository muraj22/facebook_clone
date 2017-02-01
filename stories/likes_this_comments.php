<?php
if(isset($count)){$hc=''; unset($count);}
else{$hc='hidden_sb';}

$ltype=$ltype;
$wp_table='like';
$likeid=$commentid;
$owner_c=$udvtag;

include("with_plugin.php");

$secho='<div style="display:inline-block;margin:0;padding:0;" class="like_comment_wrapper '.$hc.'"><span style="position:relative;top:0px;left:0px;margin-right:3px;margin-left:3px;color:#808080;">&#183;</span><div data-l_total="'.$tr.'" class="like_comment" style="display:inline-block;">'.$with.'</div></div>';
?>