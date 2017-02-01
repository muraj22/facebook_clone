<?php
if(isset($small_box_width)){
$pdtw='349';	
$pdtwv='355';
$pdtwvv='337';
}
else{
$pdtw='394';	
$pdtwv='400';
$pdtwvv='382';
}

if(!isset($nmlfv)){
$nmlfv='';	
}


$sarr_d=array();
$sarr_r=array();

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$mcount=0;
$yrt=0;
if($for_photo=='t'){
$text_suf="";
$photo_or_text='p';
$photo_or_textv='comment';
$photo_or_textvv='';
$variation="";
$ltypev="comment";
$r2=mysql_query("SELECT * FROM comments WHERE elemid='$thefabtext' AND visibility='v' AND type='$ltype' ORDER BY datetimep DESC LIMIT 2");	
}
else{
$text_suf="v";
$photo_or_text='t';
$photo_or_textv='commentv';
$photo_or_textvv='2';
$variation="t";
$ltypev="commentv";
$r2 = mysql_query("SELECT * FROM commentsv WHERE elemid='$thefabtext' AND visibility='v' AND type='$ltype' ORDER BY datetimep DESC LIMIT $two_c");
}

$dr[$x].='
<div id="picscommentscontainer'.$x.'" class="foot_box_inner comment_wrapper" style="padding:0;margin:0;" data-type="'.$ltype.'" data-ltypev="'.$ltypev.'" data-sbid="'.$thefabtext.'">
';


while($m2 = mysql_fetch_array($r2))
  {

$sarr_d[$xrtl]=$m2['datetimep'];
$sarr_r[$xrtl]='';

$rwho=$m2['id'];

//who es quien comenta
//y whos es de quien es la foto

$v1=$m2['id2'];
$v2=$m2['id'];

$r3 = mysql_query("SELECT * FROM registered WHERE id='$v1'");
while($m3 = mysql_fetch_array($r3)){

$uo_fn=$m3['fullname'];
$uo=$m3['id'];
$uo_pic=$m3['profilepict'];


$utiv=sb_user($v2);
$udvtag=$utiv['id'];

$commentid=$m2['sbid'];


$likeid=$m2['sbid'];
$ltype='comment'.$text_suf;

$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$ltype'");
while($m10 = mysql_fetch_array($r10))
  {
$count=$m10['count'];
if($count!='0'){$count=$count;}
else{unset($count);}

}




$c10=mysql_num_rows($r10);

$pause2='';
$whatisit_h=$photo_or_textv;
$cag=$m2['sbid'];
$requested_pause=2;
include("set_pause.php");
$requested_pause='';

$uti=sb_user($m2['id']);

if($mcount>1 && !isset($mflag)){$mflag='t'; $dr[$x].='<div id="rofm'.$x.'" style="padding:0;margin:0;display:none;">';}
$whos=$m2['id2'];
if($mcount=="0" AND !isset($haslikes) AND $vrt<=2){$bordercin='1';}
else{$bordercin='1';}
if($uid==$m2['id']){ //comentor
    $saddo='<div data-sbid="'.$commentid.'" data-uidv="'.$m2['id2'].'" class="cmnc hidden_sb" data-type="1"></div>
    <div class="cmnc_edit cmnc_editvv" data-t_align="center" data-t_text="Edit or Delete"></div><div class="hidden_sb edit_del_container">
<ul class="cmncdc" style="border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">
<li class="itemaliv delete_comment" style="list-style-type:none;">Delete...</li>
<li class="itemaliv edit_comment doc_click" style="list-style-type:none;">Edit...</li>
</ul>
</div>';
}
else if($uid==$m2['id2']){
$saddo='<div data-sbid="'.$commentid.'" data-uidv="'.$m2['id2'].'" class="cmnc" data-type="2" data-t_text="Remove or Report"></div>';	
}
else{
$saddo='<div data-sbid="'.$commentid.'" data-uidv="'.$m2['id2'].'" data-f_name="'.$uti['f_name'].'" data-un="'.$uti['username'].'" class="cmnc" data-type="3" data-t_text="Hide as Spam"></div>';	
//probar esto por ultimo
}
if($pause2=='t'){unset($pause2);}
else{
$m2['comment']=checkforsmileys($m2['comment']);
$commentid=$m2['sbid'];

$ltype='comment'.$text_suf;
$wp_table='like';
$commentid=$m2['sbid'];
$udvtag=$m2['id'];

$dclass="livetimestamp";
$dclassv="";
$dclassvv="";


$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$commentid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='display:none;';
$like2='display:inline-block;';	
}
else{
$like='display:inline-block;';		
$like2='display:none;';
}



if(strlen($m2['comment'])>300){

    $comment=substr($m2['comment'],0,300);
    
    $comment_chunk='<div class="cut iblock">... </div><div class="lb iblock"><a class="readmore stopprop" href="#">See More</a></div>';
    $comment_chunk.='<div class="readmorev hidden_sb iblock">'.substr($m2['comment'],300).'</div>';
}
else{
    $comment=$m2['comment']; 
    $comment_chunk="";
}

$utime=$m2['datetimep'];
$dttime=rtd($m2['datetimep']);
$dtime=td($m2['datetimep']);

$data_lparams='data-lparams=\'{"lpid":"'.$commentid.'","uidv":"'.$m2['id'].'","whatisit":"'.$ltypev.'"}\'';

include("js/clone_comment_div.php");
$sarr_r[$xrtl].=$sechov;


$mcount++;
}
$xrt++;
$xrtl++;
$yrt++;
//if($y=='26'){break;}
}


}

asort($sarr_d);
foreach($sarr_d as $ak => $av){

$dr[$x].=$sarr_r[$ak];
	
}

if(isset($mflag)){$dr[$x].='</div>'; unset($mflag);}

if($nmlf=='nml'){
$dr[$x].='<script type="text/javascript">$(\'#howmanym'.$x.'\').html(\''.$xrtl.'\'); $(\'#howmanymo'.$x.'\').html(\''.$xrtl.'\');</script>';
}

$dr[$x].='</div>';
?>