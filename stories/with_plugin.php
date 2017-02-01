<?php
$with='';

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$dfullname=array();
$dprofilepic=array();
$duid=array();

$wp_me='';


if((!isset($ltype)) || ($wp_table!="like" && $wp_table!="repin")){
$ltypev='';
}
else{
$ltypev=$ltype;	
}

$shown=0;
$pk=0;
$anx=0;



$checka=array();

if($wp_table=="tags"){
$or2=mysql_query("SELECT COUNT(*) as tr FROM tags WHERE id='$owner_c' AND id3!='$owner_c' AND id3!='$uo' AND id3!='' AND photoid='$likeid'");
$om2=mysql_fetch_array($or2);
$tr=$om2['tr'];

$or=mysql_query("SELECT * FROM tags WHERE id='$owner_c' AND id3!='$owner_c' AND id3!='$uo' AND id3!='' AND photoid='$likeid' ORDER BY datetimep DESC limit 25");
$c=mysql_num_rows($or);

while($oms=mysql_fetch_array($or)){
$checka[]=$oms['id3'];
}
$anx=mysql_num_rows($or);
}
else if($wp_table=="n_friends"){
$udvv='';
foreach($list as $key => $value){
if($value!=''){
$checka[]=$value;
$anx++;
}
}

}else if($wp_table=="like" || $wp_table=="repin"){

$liket=$owner_c.'ml';


if($wp_table=="like"){
    $dtable="likew";
}else{
    $dtable="repinw";
}

$or2=mysql_query("SELECT COUNT(*) as tr FROM $dtable WHERE likeid='$likeid' AND what='$ltype' AND id2!='$uid'");
$om2=mysql_fetch_array($or2);
$tr=$om2['tr'];

$or2=mysql_query("SELECT COUNT(*) as tr FROM $dtable WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' ORDER BY datetimep DESC LIMIT 1");
$om2=mysql_fetch_array($or2);
$tr=$tr+$om2['tr'];


$or=mysql_query("(SELECT * FROM $dtable WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' ORDER BY datetimep DESC LIMIT 1) UNION (SELECT * FROM $dtable WHERE likeid='$likeid' AND what='$ltype' AND id2!='$uid' ORDER BY datetimep DESC LIMIT 25)");	
while($oms=mysql_fetch_array($or)){
$checka[]=$oms['id2'];
}
$anx=mysql_num_rows($or);
}else if($wp_table=="shares"){
 
    $or2=mysql_query("SELECT COUNT(*) AS tr FROM shares WHERE id!='$uid' AND elemid='$share_id' AND whatisit='$dshare' AND visibility='v'");
    $om2=mysql_fetch_array($or2);
    $tr=$om2['tr'];
    
    $or2=mysql_query("SELECT COUNT(*) as tr FROM shares WHERE id='$uid' AND elemid='$share_id' AND whatisit='$dshare' AND visibility='v' ORDER BY datetimep DESC LIMIT 1");
    $om2=mysql_fetch_array($or2);
    $tr=$tr+$om2['tr'];
    
    $or=mysql_query("(SELECT * FROM shares WHERE elemid='$share_id' AND whatisit='$dshare' AND visibility='v' AND id='$uid' ORDER BY datetimep DESC LIMIT 1) UNION (SELECT * FROM shares WHERE id!='$uid' AND elemid='$share_id' AND whatisit='$dshare' AND visibility='v' ORDER BY datetimep DESC LIMIT 25)");
    while($oms=mysql_fetch_array($or)){
        $checka[]=$oms['id']; //chequear aca cual tipo de id   
        $anx++;
    }
}


if($wp_table=="n_friends"){
$tr=$anx;

$anxo=0;

foreach($checka as $ck =>$cv){
if($anxo==0){

$or=mysql_query("SELECT * FROM friends WHERE id='$uo' AND id2='$cv'");	
while($oms=mysql_fetch_array($or)){
$end_date=$oms['datetimep'];	
}

}

$anxo++;

if($anxo==$anx){

$or=mysql_query("SELECT * FROM friends WHERE id='$uo' AND id2='$cv'");	
while($oms=mysql_fetch_array($or)){
$start_date=$oms['datetimep'];	
}
	
}

}
}else if($wp_table=="mutual_friends"){
$uid_fr=r_friends($uid);

$mutual=array();

$friends_comma='';
foreach($uid_fr as $k=>$v){
$friends_comma.=','.$v;
}
$friends_comma=substr($friends_comma,1);

$persona=$owner_c;

$or=mysql_query("SELECT * FROM friends WHERE FIND_IN_SET(id2,'$friends_comma')>0 AND id='$persona' AND confirmed='y' ORDER BY datetimep DESC LIMIT $gs,5"); // en esta linea tengo todos los pymk de una persona conmigo


$or2=mysql_query("SELECT COUNT(*) as tr FROM friends WHERE FIND_IN_SET(id2,'$friends_comma')>0 AND id='$persona' AND confirmed='y'");
$om2=mysql_fetch_array($or2);
$tr=$om2['tr'];

while($oms=mysql_fetch_array($or)){
$checka[]=$oms['id2'];
}

$anx=mysql_num_rows($or);

if(in_array($uidv,$uid_fr)){
$mutual_style="regular";
}
else{
$mutual_style="different";
}
}

if($wp_table!="mutual_friends"){
$mutual_style="";
}

if($wp_table=="tags"){
$dot=".";
}
else{
$dot="";
}

foreach($checka as $ck =>$cv){
	
$or2=mysql_query("SELECT * FROM registered WHERE id='$cv'");
while($oms2=mysql_fetch_array($or2)){
$duid[$pk]=$cv;
$dfullname[$pk]=$oms2['fullname'];	
if($cv==$uid){$wp_me='me';}
$dprofilepic[$pk]=$oms2['profilepict'];
$dusername[$pk]=$oms2['username'];
$pk++;
}

}

$otherpeople='';
$ynx=0;
$ynxv=0;
$dcount=0;


$mutual_different="";


if($wp_table=="mutual_friends"){
$zero_or_not=-1;
$zero_or_notv=-1;
$zero_or_notvv=0;
$zero_or_notvvv=5;
$needs_comma='';
}else if($ltypev=="comment" || $ltypev=="commentv"){}
else if($wp_table=="shares"){
    $zero_or_not=1;
    $zero_or_notv=-1;
    $zero_or_notvv=1; //todabia no se por que se debe de restar uno en cierta parte
    $zero_or_notvvv=20;
    $needs_comma='';    
}else{
$zero_or_not=0;
$zero_or_notv=0;
$zero_or_notvv=1; //todabia no se por que se debe de restar uno en cierta parte
$zero_or_notvvv=20;
$needs_comma='';
}

if(count($dfullname)>0){

foreach($dfullname as $pk=>$pv){

$ynx=$ynxv-1;
$dcount++;


if($ltypev!="comment" && $ltypev!="commentv"){
if($ynx>=$zero_or_notv AND $dcount>$zero_or_not AND $dcount<=$zero_or_notvvv){
$shown++;
if($ltypev=="comment" || $ltypev=="commentv"){
if($shown==$anx || $shown==$zero_or_notvvv){$needs_comma='';}
}
if($wp_me=="me" and $wp_table=="like" && $ltypev!="comment" && $ltypev!="commentv" && $shown==1 || $wp_me=="me" and $wp_table=="repin" && $ltypev!="comment" && $ltypev!="commentv" && $shown==1){}
else{
if($mutual_style=="different"){
if($pk=="0"){$mutual_different.='<div style="display:block;" class="mts">';}
$mutual_different.='<div style="display:inline-block;margin-right:1px;"><a href="/'.$dusername[$pk].'" style="display:block;"><img src="/'.$duid[$pk].'/pics/'.$dprofilepic[$pk].'" style="max-width:32px;max-height:32px;" data-t_topleft="t" data-t_text="'.$dfullname[$pk].'"></a></div>';
if($pk==5 || $pk==$anx){
$mutual_different.='</div>';
}
}
$otherpeople.='<div style="padding:0;">'.$dfullname[$pk].$needs_comma.'</div>';
}
}

$ynxv++;
}
}


if($wp_me=="me" && $wp_table=="like" || $wp_me=="me" && $wp_table=="repin"){
$package[0]='<span class="me">You';		
}
else{
$package[0]='<span class="llb fwn"><a hc="" href="/'.$dusername[0].'">'.$dfullname[0].'</a>';	
}


if($anx>2){
$package[2]='<span class="llb fwn"><a hc="" href="/'.$dusername[2].'">'.$dfullname[2].'</a>';	
}
if($anx>1){
$package[1]='<span class="llb fwn"><a hc="" href="/'.$dusername[1].'">'.$dfullname[1].'</a>';	
}

if($anx=='1'){
$with=$package[0].'</span>'.$dot;
}
else if($anx=='2'){
$with=$package[0].' and </span>'.$package[1].'</span>'.$dot;
}
else if($anx=='3'){
$with=$package[0].', </span>'.$package[1].' and </span>'.$package[2].$dot;
}

}



if($anx>2 || $ltypev=="comment"  || $ltypev=="commentv" || $wp_table=="mutual_friends" || $wp_table=="shares"){
if($ltypev=="comment" || $ltypev=="commentv"){$zero_or_notvv=0;}
$anxv=$tr-$zero_or_notvv; //tr es el completo total sin gs.... o limits, es todo el total

if($wp_me=="me" && $wp_table=="like" && $ltypev!="comment" && $ltypev!="commentv" || $wp_me=="me" && $wp_table=="repin" && $ltypev!="comment" && $ltypev!="commentv"){
$shown=$shown-1;
$anxv=$anxv-1;
}

if($shown>0){
$dmore=$anxv-$shown;

if($dmore!="0"){

if($ltypev=="comment" || $ltypev=="commentv"){

if($dmore>1){$ps='s';}
else{$ps='';}
$otherpeople.='<div style="padding:0;">and '.$dmore.' other'.$ps.' like this.</div>';	

}
else{
$otherpeople.='<div style="padding:0;">...and '.$dmore.' more</div>';
}

}

}


if($wp_table=="tags"){
$fjax_l='table=tags&uo='.$owner_c.'&ud='.$udvv.'&sbid='.$likeid;
$d_title="People Tagged";
$data_t='data-t_text="" data-t_position="bottom"';
$dot='.';
}
else if($wp_table=="n_friends"){
$fjax_l='table=n_friends&uo='.$owner_c.'&ud='.$udvv.'&start_date='.$start_date.'&end_date='.$end_date;	
$d_title="Friends";
$data_t='data-t_text="" data-t_position="bottom"';
$dot='';
}
    else if($wp_table=="like"){
        $fjax_l='table=like&uo='.$owner_c.'&sbid='.$likeid.'&ltype='.$ltypev;	
        $d_title="People who like this";	
        $data_t='data-t_text="" data-t_align="center"';
        $dot='';
}
else if($wp_table=="repin"){
        $fjax_l='table=repin&uo='.$owner_c.'&sbid='.$likeid.'&ltype='.$ltypev;	
        $d_title="People who repinned this";	
        $data_t='data-t_text="" data-t_align="center"';
        $dot='';
    }else if($wp_table=="mutual_friends"){
if($mutual_style=="different"){
$data_t="";
}
else{
$data_t='data-t_text="" data-t_topleft="t"';	
}
$text_decoration_none=' text_decoration_none';

$fjax_l='table=mutual_friends&uo='.$uid.'&ud='.$owner_c;	
$d_title="Mutual Friends";

$dot='';
    }else if($wp_table=="shares"){
        $fjax_l='table=shares&uo='.$owner_c.'&sbid='.$share_id.'&dshare='.$dshare;    
    $d_title="People who shared this";
        $data_t="";
        $dot='';
        
    }

if($ltypev=="comment" || $ltypev=="commentv"){
$data_t='data-t_text="" data-t_align="center" data-t_fjax="/stories/with_plugin_tooltip.php?likeid='.$likeid.'&owner_c='.$owner_c.'&ltypev='.$ltypev.'&table=like"';	
$with_class='cib'; //children inline block
$text_decoration_none=' text_decoration_none';

}
else{
$with_class='cibv';
$text_decoration_none='';
}

if($wp_table=="mutual_friends" && $mutual_style!="different"){
$extra_class="fcg";
}else if($wp_table=="shares"){
    $extra_class="inlineBlock";    
}else{
$extra_class="";
}

$with_link='<div class="llb '.$extra_class.'"><a href="#" data-t_close="t" class="displaydialog'.$text_decoration_none.'" data-d_okay="Close" data-d_width="447" data-d_title="'.$d_title.'" data-d_okay_function="close_dialog" data-d_leave_loading="show_loading" data-t_a_id="with_likes_comments" data-d_isajax="t" data-d_fjax="/stories/show_users_listv.php?'.$fjax_l.'" data-a_custom_f="show_users_list" '.$data_t.'>';

if($ltypev=="comment" || $ltypev=="commentv"){
$otherpeople='Loading...';
}
$with_content='<div class="tooltip_text"><div class="'.$with_class.'">'.$otherpeople.'</div></div>';


if($wp_table=="mutual_friends"){
if($mutual_style=="regular"){
$with_content='<div class="tooltip_text"><div class="'.$with_class.'" id="dea">'.$otherpeople.'</div></div>';
}
else if($mutual_style=="different"){
$with_content=$mutual_different;	
}
if($anx>1){$ps='s';} else{$ps='';}
$with=$with_link.$tr.' mutual friend'.$ps.'</a>'.$with_content;
}else if($wp_table=="shares"){ //shares
    if($anx>1){$ps='s';} else{$ps='';}
    $with=$with_link.$tr.' share'.$ps.'</a></div>';   
}else if($ltypev=="comment" || $ltypev=="commentv"){
$with_content='<div class="tooltip_text"><div class="'.$with_class.' lw">'.$otherpeople.'</div></div>';
$with=$with_link.'<div class="manito" style="display:inline-block;position:relative;left:0px;margin-right:4px;"></div><span class="lthisv">'.$anx.'</span></a>'.$with_content;	
}
else{
if(($wp_me=="me" AND $wp_table=="like") OR ($wp_me=="me" AND $wp_table=="repin")){
if($anxv>1){
$with=$package[0].', </span>'.$package[1].' and </span><div style="position:relative;margin:0;padding:0;display:inline-block;">'.$with_link.$anxv.' others</a>'.$dot.$with_content.'</div></div>';	
}
else{
$with=$package[0].', </span>'.$package[1].' and </span>'.$package[2].$dot;
}


}
else{$with=$package[0].' and </span><div style="position:relative;margin:0;padding:0;display:inline-block;">'.$with_link.$anxv.' others</a>'.$dot.$with_content.'</div></div>';}
}





$with=$with;
	
}

if($ltypev!="comment" && $ltypev!="commentv" && count($dfullname)==0){$with='';}


$with=$with;

?>