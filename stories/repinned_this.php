<?php
if(!isset($tr)){
$tr=0;
}


if(!isset($wp_me)){
$wp_me='';	
}

if(!isset($pdlv)){
$pdlv='78';
}

if($tr==1 && $wp_me!="me"){
$ps='s';
}
else{$ps='';}

if($ltype=="comment"){}
else if($with!=""){
$with=$with.' <span class="lthis">repinned this.</span>'; 
}

if($wp_me!="me" && $tr>0){
$lvar='title="Repin this item" style="cursor:pointer;"';
$lvarv='repin';
}
else{
$lvar='style="cursor:default;"';
$lvarv='';	
}

$dr[$x].='<div class="foot_box_inner friendslinkvl repin_story_wrapper '.$hc.'" style="background-color:#edeff4;border-bottom:0px solid #ffffff;width:394px;position:relative;padding:3px;margin-left:'.$pdlv.'px;display:block;margin-bottom:1px;">


<div style="display:block;margin:0;padding:0;position:relative;left:0;"><div style="margin:0;padding:0;display:block;cursor:default;"><div '.$lvar.' class="repiniconito '.$lvarv.'"></div><div data-l_total="'.$tr.'">'.$with.'</div>

</div> </div></div>';
?>