<?php
include("start.php");

foreach($_POST as $k=>$v){
${$k}=$v;	
}

$dfullname=array();
$dprofilepic=array();
$duid=array();

$wp_me='';

$ltype=$ltypev;	 //is $_POST :)
$wp_table=$table;

if($wp_table=="like"){
    $dtable="likew";   
}else{
    $dtable="repinw";   
}

$shown=0;
$pk=0;
$anx=0;

$checka=array();

$liket=$owner_c.'ml';
$or=mysql_query("(SELECT * FROM $dtable WHERE likeid='$likeid' AND what='$ltype' AND id='$uid' ORDER BY datetimep DESC LIMIT 1) UNION (SELECT * FROM $dtable WHERE likeid='$likeid' AND what='$ltype' AND id!='$uid' ORDER BY datetimep DESC LIMIT 25)");	
while($oms=mysql_fetch_array($or)){
$checka[]=$oms['id'];
}
$anx=mysql_num_rows($or);


foreach($checka as $ck =>$cv){
	
$or2=mysql_query("SELECT * FROM registered WHERE id='$cv'");
while($oms2=mysql_fetch_array($or2)){
$dfullname[$pk]=$oms2['fullname'];	
if($cv==$uid){$wp_me='me';}
$pk++;
}

}

$otherpeople='';

if(count($dfullname)>0){
	
foreach($dfullname as $pk=>$pv){

if($wp_me=="me"){
$package[0]='<span class="me">You';		
}
else{
$package[0]='<span class="llb fwn">'.$dfullname[0];	
}

if($anx>2){
$package[2]='<span class="llb fwn">'.$dfullname[2];	
}
if($anx>1){
$package[1]='<span class="llb fwn">'.$dfullname[1];	
}

if($anx=='1'){
$with=$package[0].'</span>';
}
else if($anx=='2'){
$with=$package[0].' and </span>'.$package[1].'</span>';
}
else if($anx=='3'){
$with=$package[0].', </span>'.$package[1].' and </span>'.$package[2];
}

}



$with_class='cib'; //children inline block
$with_content='<div class="tooltip_text"><div class="'.$with_class.'">'.$otherpeople.'</div></div>';


if($anx>3 && $wp_me=="me"){$anxv=$anx-2;} //quiere decir que esta you
else if($anx>3){$anxv=$anx-1;}


if($anx<=3){
$otherpeople=$with;
}
else if($wp_me=="me" && $anx>3){
$otherpeople=$package[0].', </span>'.$package[1].' and </span><div style="position:relative;margin:0;padding:0;display:inline-block;">'.$anxv.' others</div>';	
}
else{
$otherpeople=$package[0].' and </span><div style="position:relative;margin:0;padding:0;display:inline-block;">'.$anxv.' others</div>';
}

if($wp_table=="like"){
    if($anx==1 && $wp_me!="me"){
        $otherpeople.='<span class="lthis"> likes this.</span>';
    }
    else{
        $otherpeople.='<span class="lthis"> like this.</span>';
    }
}else{
    if($anx==1 && $wp_me!="me"){
        $otherpeople.='<span class="lthis"> reppined this.</span>';
    }
    else{
        $otherpeople.='<span class="lthis"> repinned this.</span>';
    }
}


}

echo $otherpeople;

include("end.php");
?>