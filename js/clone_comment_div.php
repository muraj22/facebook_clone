<?php

$sechov="";

$sechov.='<div style="position:relative;display:inline-block;text-align:left;margin:0;padding:0;background:#edeff4;width:0px;border-top:0px solid #ffffff;padding-bottom:1px;margin-left:0px;" class="foot_box_child mtablev faddo'.$dclassv.'" '.$data_lparams.'><div style="display:inline-block;text-align:center;float:left;margin-left:3px;margin-right:7px;" class="mrs tdpp"><a href="/'.$uti['username'].'"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="max-width:32px;max-height:32px;position:relative;"></a></div>'.$saddo.'<div><div style="margin:0;padding:0;position:relative;display:inline-block;margin-top:4px;" class="wrapfc"><div class="fwb lb" style="display:inline-block;vertical-align:top;"><a hc="" href="/'.$uti['username'].'" style="margin-right:4px;display:inline-block;vertical-align:top;">'.$uti['fullname'].'</a></div><div style="display:inline-block;margin-bottom:16px;" class="comment_area"><div class="actual_comment">'.$comment.'</div>'.$comment_chunk.'</div></div><div style="display:block;position:absolute;bottom:3px;left:42px;"><div style="display:block;"><div style="display:inline-block;" class="abbrw"><abbr class="'.$dclass.'" style="color:#666666;margin:0;padding:0;" data-utime="'.$utime.'" title="'.$dttime.'">'.$dtime.'</abbr></div><div style="display:inline-block;" class="'.$dclassvv.'"><span style="position:relative;top:0px;left:0px;margin-right:2px;margin-left:2px;color:#666666;">&#183;</span><div style="'.$like2.'" class="lbl"><a href="#" class="unlike">Unlike</a></div><div style="'.$like.'" class="lbl"><a href="#" class="like">Like</a></div></div>';


$with=''; $hc='hidden_sb';
include("stories/likes_this_comments.php");

$sechov.=$secho;

$sechov.='<span style="margin:0;padding:0;"></span></div></div></div></div></div>';


//main stories comment div type

//gallery viewer comment div type ahead


?>