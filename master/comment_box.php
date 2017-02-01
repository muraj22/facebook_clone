<?php
$r11=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m11=mysql_fetch_array($r11)){
$uidpic=$m11['profilepict'];	
}
	if($mcount>0){$solidpix='1';}
else{$solidpix='0';}
if(isset($haslikes)){$solidpix='1'; $dclass=''; $dclassv=""; $tm='hidden_sb'; unset($haslikes);}
	else{ $solidpix='1'; if($mcount>0){$dclass=''; $dclassv=""; $tm='hidden_sb';} else{$dclass='hidden_sb'; $dclassv="hidden_sb"; $tm='';}}

if(isset($iffriend) && $iffriend=="none"){
/*$dr[$x].='<div id="wcommentwv'.$x.'" style="background:#edeff4;width:'.$pdtw.'px;padding:3px;border-bottom:1px solid #d2d9e7;position:relative;height:1px;padding-top:0;margin-top:0;padding-bottom:0;margin-left:'.$nml.'px;display:block;" class="foot_box_inner"></div>';	
*/
	}
else{
$dr[$x].='<div id="wcommentw'.$x.'" style="background:#edeff4;width:'.$pdtw.'px;padding:3px;border-top:0px solid #ffffff;position:relative;height:auto;display:inline-block;margin-left:'.$nml.'px;border-bottom:1px solid #bdc7d8;" class="foot_box_inner '.$dclass.'">

<div style="padding:0;padding-left:2px;margin:0;text-align:left;position:absolute;" class="picwriteid hidden_sb">
<img src="/'.$uid.'/pics/'.$uidpic.'" style="max-width:32px;max-height:32px;display:inline-block;">
</div>
<textarea data-au_grow="" value="Write a comment..." style="display:inline-block;font-size:11px;font-weight:normal;width:'.$pdtwvv.'px;position:relative;padding:3px;margin:2px;margin-top:0;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;resize:none;overflow:hidden;min-height:14px;height:14px;max-height:240px;" id="commentid'.$x.'" name="commentid" title="Write a comment..." placeholder="Write a comment..." class="writeacomment dcphc"></textarea></div>';
}



?>