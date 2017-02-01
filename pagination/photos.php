<?php
//photos_stream and photos from an album
if(!isset($gs)){$gs=1;}
if($gs!=0){
$albumn='';

include("start.php");

include("functions/simplify_video_duration.php");
}

$utiv=sb_user($uidv);

$secho='';


if(isset($_POST['selected_album']) || isset($_POST['album']) || $_POST['sk']=="photos_stream"){
if(isset($_POST['selected_album'])){
$selected_album=$_POST['selected_album'];
}
else if(isset($_POST['album'])){$params['layout']='right_column_w_no_borders'; $selected_album=$_POST['album']; $tocheck='2';}
else{$flag2='y';}
if(!isset($flag2)){$flag2='';}
$secho.='';


$uidva=$uidv.'a';
$x=0;
$bydate=array();
$theresults=array();
$norder=array();

if($flag2!='y'){

$r=mysql_query("SELECT COUNT(*) as c FROM media WHERE albumid='$selected_album' AND id='$uidv' AND visibility='v' and nye='3' $media_qf");
$m=mysql_fetch_array($r);
$cv=$m['c'];

$r=mysql_query("SELECT * FROM albums as dt WHERE sbid='$selected_album' AND id='$uidv' AND visibility='v' $a_qf");
$sc=mysql_num_rows($r);
if($sc==0){
$death_notice="t"; //it means the user is not allowed to watch this album	
}

$r=mysql_query("SELECT * FROM media WHERE albumid='$selected_album' AND id='$uidv' AND visibility='v' and nye='3' $media_qf ORDER BY norder ASC LIMIT $gs,$gsv");

$c=$gs+1;
$total_retrieved=mysql_num_rows($r);
$d=$cv;

$suf='&ref='.$_POST['album'].'&set=o';
$wk="r";

}
else{ 


$albumn='';
$uti=sb_user($uidv);

//!=Photos for photos posted to walls
if($_POST['pin_pagination']=="1"){
        $r=mysql_query("SELECT COUNT(*) as c FROM media WHERE id='$uidv' AND visibility='v' and nye='3' AND albumn!='Photos' AND pin='1' $media_qf");
}else{
    if($_POST['repin']==2){
        $r=mysql_query("SELECT COUNT(*) as c FROM repinw as dt WHERE id2='$uidv' AND repins='1' AND what='photo' AND (SELECT COUNT(*) as cv FROM media WHERE id=dt.id AND visibility='v' AND nye='3' AND albumn!='Pins' AND pin='2' $media_qf)>0");
                 
        $rv=mysql_query("SELECT * FROM repinw WHERE id2='$uidv' AND repins='1' AND what='photo'");
        $did='';
        while($mv=mysql_fetch_array($rv)){
            $did.=','.$mv['likeid'];
        }
        if(strpos($did,",")!==false){
            $did=substr($did,1);   
        }
    }else{
        $r=mysql_query("SELECT COUNT(*) as c FROM media WHERE id='$uidv' AND visibility='v' and nye='3' AND albumn!='Pins' AND pin='2' $media_qf");
    }
}
$m=mysql_fetch_array($r);
$cv=$m['c'];

$uidvp="media";
if($_POST['pin_pagination']=="1"){
    $r=mysql_query("SELECT * FROM media WHERE id='$uidv' AND visibility='v' and nye='3' AND albumn!='Photos' AND pin='1' $media_qf ORDER BY datetimep DESC LIMIT $gs,$gsv");
}else{
    if($_POST['repin']==2){
        $r=mysql_query("SELECT * FROM media WHERE FIND_IN_SET(sbid,'$did')>0 $media_qf ORDER BY datetimep DESC LIMIT $gs,$gsv");
    }else{
        $r=mysql_query("SELECT * FROM media WHERE id='$uidv' AND visibility='v' and nye='3' AND albumn!='Pins' AND pin='2' $media_qf ORDER BY datetimep DESC LIMIT $gs,$gsv");
    }
}

if($gs==0){
$sc=mysql_num_rows($r);
if($sc==0){

    if($_POST['pin_pagination']=="1"){
        $dtext='No photos yet';
        $dtextv='Add photos?';
        $dtextvv='No photos to show';
    }else{
        $dtext='No pins yet';
        $dtextv='Add pins?';
        $dtextvv='No pins to show';
    }
    
if($uid==$uidv){
$secho.='<div class="fbStarGridBlankContent">'.$dtext.'. ';

$secho.='<div class="flashUploaderOverlayButton stat_elem" id="u_jsonp_3_a"><a class="fluploader_select" href="#" id="u_jsonp_3_9" rel="async-post" onclick="$(\'.addphotos_caller\').click();">'.$dtextv.'</a></div>';

$secho.='</div>';
}else{
$secho.='<div class="fbStarGridBlankContent">'.$dtextvv.'</div>';	
}

}
}


/*
cargaron 1500
hay 8000
tiene que dar 6500
para bajar desde ahi
*/

$c=$cv-$gs;
$total_retrieved=mysql_num_rows($r);
$d=$cv;

$wk="ps";
$suf='&va=t';
}
while($m = mysql_fetch_array($r))
  { 
$bydate[$x]=$m['datetimep'];
if(isset($m['norder']) && $_POST['sk']!="photos_stream"){
if($m['norder']!=""){
$norder[$x]=$m['norder'];
}
else{$norder[$x]=$m['datetimep'];}
}
else{$norder[$x]=$m['datetimep'];}
if($suf=='&va=t'){
$whicha=$uidvp;
$albumn=$m['albumn'];	
}
else{
$whicha=$m['albumid'];
$albumn=$m['albumn'];
}
$aorder=$c;

if(isset($_POST['album'])){
$c++;
}
else{
$c--;
}


if($m['vidso']!=''){
$swidth=$m['videow'];
$sheight=$m['videoh'];

$duration=simplify_video_duration($m['duration']);

$theresults[$x]='<span data-onclick="getnext(\''.$m['pics'].'\',\''.$m['id'].'\',\''.$whicha.'\',\''.$swidth.'\',\''.$sheight.'\',\''.$aorder.'\',\''.$d.'\',\''.$wk.'\',\'f\',\'\',\'\',\'\',\'vid\',\''.$m['vids'].'\',\''.$m['vidshd'].'\',\''.$m['sbid'].'\');" style="cursor:pointer;position:relative;display:inline-block;bottom:0px;right:0px;" class="uiVideoLink uiVideoLinkMedium getnext"><i style="background-image: url(\'/'.$m['id'].'/pics/'.$m['picss'].'\');" class="picsdisplay4 hth"></i><span class="playtime">'.$duration.'</span><span class="playicon"></span></span><br>';	
}
else{
$osize=getimagesize("../users/".$m['id']."/pics/".$m['pics']);
$swidth=$osize[0];
$sheight=$osize[1];

$theresults[$x]='<span data-onclick="getnext(\''.$m['pics'].'\',\''.$m['id'].'\',\''.$whicha.'\',\''.$swidth.'\',\''.$sheight.'\',\''.$aorder.'\',\''.$d.'\',\''.$wk.'\',\'f\',\'\',\'\',\'\',\'\',\'\',\'\',\''.$m['sbid'].'\','.$_POST['repin'].',\''.$uidv.'\',\''.$utiv['username'].'\',\''.$utiv['fullname'].'\');" style="position:relative;cursor:pointer;display:inline-block;bottom:0px;right:0px;" class="getnext"><i style="background-image: url(\'/'.$m['id'].'/pics/'.$m['picss'].'\');" class="picsdisplay4 hth"></i>';	

if(!isset($_POST['album'])){
$tkind=$m['albumn'];

$albumid=$m['albumid'];

$c5=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c5 FROM albums as dt WHERE sbid='$albumid' AND id='$uidv' $a_qf"));
$c5=$c5['c5'];

if($c5==0){
    if($_POST['pin_pagination']==1){
        $specific='<a class="_53f" style="max-width:144px;" href="/'.$uti['username'].'/photos_stream">'.$uti['fullname'].'\'s Photos</a>';
    }else{
        $specific='<a class="_53f" style="max-width:144px;" href="/'.$uti['username'].'/pins_stream">'.$uti['fullname'].'\'s Pins</a>';
    }
}
else{
    if($_POST['pin_pagination']==1){
        $specific='<a class="_53f" style="max-width:144px;" href="/'.$uti['username'].'/photos?album='.$m['albumid'].'">'.$tkind.'</a>';
    }else{
        $specific='<a class="_53f" style="max-width:144px;" href="/'.$uti['username'].'/pins?board='.$m['albumid'].'">'.$tkind.'</a>';   
    }

}


$theresults[$x].='<div class="_53d _53q"><div class="_53g" style="position:absolute;left:0;bottom:0;z-index:1;"><div class="_53i">'.$specific.'</div></div>
<img src="/images/gradient.png" style="height: 53px;position: absolute;left: -1px;bottom: 2px;width: 165px;">
</div>';
}

$theresults[$x].='</span><br>';

}





$x++;
$setpf='';
}
  
if(!isset($setpf)){
//caso de pagination - poner caso de si $gs==0 :)
if($gs!=0){$pagination_finished='finished';}
else{
if($wk=="ps"){$albumn='';}
else{
$uidva='albums';
$r=mysql_query("SELECT * FROM $uidva WHERE sbid='$selected_album' AND id='$uidv' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$albumn=$m['albumn'];
$mdt='';
if($uidv==$uid){
if($albumn=="Profile Pictures" OR $albumn=="Wall Photos"){}
else{
if($albumn=="Videos"){$mdt=' <div style="margin:0;padding:0;display:inline-block;" class="addpl" onclick="window.location=\'/video/?upload\';">Add videos</div>';}
else{$mdt=' <div style="margin:0;padding:0;display:inline-block;" class="addpl addphotos_caller">Add photos</div>';}
}
}
if($albumn=="Videos"){$wi='videos';}
else{$wi='photos';}
$theresults[$x]='<div style="margin:0;padding:0;position:relative;top:40px;" id="nophotos"><img src="/images/IMYxRWl9Pc4.png" style="display:inline-block;border:0;outline:0;padding:0;margin:0;"><div style="margin:0;padding:0;margin-left:8px;position:relative;top:-10px;display:inline-block;color:#333333;font-size:13px;">There are no '.$wi.' in this album.'.$mdt.'</div></div><script type="text/javascript">$("#nophotos").parent().css("width","100%"); $("#nophotos").parent().css("text-align","center");</script>';
	$norder[$x]=$m['datetimep'];
	$thediff=$m['datetimep'];
	$x++;
}

}
}
}


$xa=$gs;
$axv=$gs+1;
$number3=4;


if($_POST['sk']=="photos_stream" || $albumn=="Videos"){arsort($norder);}
else{asort($norder);}

if(isset($_POST['album'])){
$ax=$gs+1;
}
else{$ax="";}
foreach($norder as $key=> $value){

if($gs=="0"){
	if($xa=="0"){$secho.='<ul id="sortable2" style="margin:0;padding:0;display:inline-block;">';}
}
if(!isset($_POST['album'])){
if ($axv % $number3 == 0 && $axv!=1) {
$rm="0";
}
else{
$rm="25px";
}
$bm="23px";
}
else{$rm="9px"; $bm="7px";}

if(isset($_POST['album']) && $gs!=0){
//$dclass=" hidden_sb ";
$dclass="";
}
else{$dclass="";}
// 9 7
$secho.='<li data-s_position="'.$ax.'" id="li_id'.$ax.'" class="photo_wrap '.$dclass.'x" style="display:inline-block;float:left;padding:0;margin:0;margin-right:'.$rm.';width:171px;margin-bottom:'.$bm.';text-align:left;position:relative;">';
$secho.= $theresults[$key];
$secho.= '</li>';
$xa++;
if(isset($_POST['album'])){
$ax++;
}
$axv++;
}

if($gs=="0"){$secho.='</ul>';}

$total_retrieved=$gs+$total_retrieved; //de donde empezo mas el total que se levanto en esta query

if($gs!=0){
if(isset($pagination_finished)){
echo $pagination_finished;
}
else{
echo $secho.'{}'.$total_retrieved.'{}'.$gs; //$gs as the original gs from this query and on attr fjax
}
}

}  //aca termina un chequeo generalizado

if($gs!=0){
include("end.php");
}
?>