<?php
//photos_tagged and photos_albums
if(!isset($gs)){$gs=1;}
if($gs!=0){
$albumn='';

include("start.php");

include("functions/simplify_video_duration.php");
}
$secho='';

if($_POST['sk']!="photos_albums"){

$params['layout']='normal_w';

$hoverc='ihoverc3';
$hoverc2='ihoverc4';	
$picsdisplay='picsdisplay3';
}
else{
$hoverc='ihoverc';
$hoverc2='ihoverc2';	
$picsdisplay='picsdisplay';
}

$uti=sb_user($uidv);



$x=0;
$bydate=array();
$theresults=array();

if($_POST['sk']!="photos_albums"){}
else{
    if($_POST['pin_pagination']==1){
        $r=mysql_query("SELECT COUNT(*) as c FROM albums as dt WHERE id='$uidv' AND visibility='v' AND albumn!='Videos' AND albumn!='Photos' AND pinboard='1' $a_qf");
    }else{
        if($_POST['repin']==2){
            $r=mysql_query("SELECT COUNT(*) as c FROM repinw as dtv WHERE id2='$uidv' AND repins='1' AND what='album' AND (SELECT COUNT(*) as cv FROM albums as dt WHERE sbid=dtv.likeid AND visibility='v' AND albumn!='Videos' AND albumn!='Pins' AND pinboard='2' $a_qf)>0");
        }else{
            $r=mysql_query("SELECT COUNT(*) as c FROM albums as dt WHERE id='$uidv' AND visibility='v' AND albumn!='Videos' AND albumn!='Pins' AND pinboard='2' $a_qf");
        }
    }
$m=mysql_fetch_array($r);
$cv=$m['c'];

if($_POST['pin_pagination']==1){
        $r=mysql_query("SELECT * FROM albums as dt WHERE id='$uidv' AND visibility='v' AND albumn!='Photos' AND pinboard='1' $a_qf ORDER BY norder DESC LIMIT $gs,$gsv");
}else{
    if($_POST['repin']==2){
        $rv=mysql_query("SELECT * FROM repinw WHERE id2='$uidv' AND repins='1' AND what='album' ORDER BY datetimep DESC");
        $did='';
        while($mv=mysql_fetch_array($rv)){
            $did.=','.$mv['likeid'];
        }
        if(strpos($did,",")!==false){
            $did=substr($did,1);   
        }
        $r=mysql_query("SELECT * FROM albums as dt WHERE FIND_IN_SET(sbid,'$did')>0 AND visibility='v' AND albumn!='Pins' AND pinboard='2' $a_qf LIMIT $gs,$gsv");
    }else{
        $r=mysql_query("SELECT * FROM albums as dt WHERE id='$uidv' AND visibility='v' AND albumn!='Pins' AND pinboard='2' $a_qf ORDER BY norder DESC LIMIT $gs,$gsv");
    }
}
$total_albums=$cv-$gs;

$total_retrieved=mysql_num_rows($r);

while($m = mysql_fetch_array($r))
  {


$spclass=($m['albumn']!="Videos" ? "": "vid_li ");


if($m['albumn']=="Videos"){
$videos_album="";
}

$xi=0;
$selected_album=$m['sbid'];
$r3=mysql_query("SELECT * FROM media WHERE albumid='$selected_album' AND id='$uidv' AND visibility='v' and nye='3' $media_qf");
$xi=mysql_num_rows($r3);
if($xi>1){
$ps='s';	
}else{$ps='';}
$bydate[$x]=$m['norder'];

$albumn=$m['albumn'];
$album_cover=$m['album_cover'];

$presult2=mysql_query("SELECT * FROM media WHERE albumid='$selected_album' AND id='$uidv' AND visibility='v' and nye='3' $media_qf ORDER BY sbid DESC LIMIT 1");
while($prow2=mysql_fetch_array($presult2)){
$acheck=$prow2['norder'];	
}
if(isset($acheck) && $acheck!=""){$c2=0; if($album_cover!=''){$r2=mysql_query("SELECT * FROM media WHERE albumid='$selected_album' AND id='$uidv' AND visibility='v' AND sbid='$album_cover' and nye='3' $media_qf");
$c2=mysql_num_rows($r2);} if($c2==0){$r2=mysql_query("SELECT * FROM media WHERE albumid='$selected_album' AND id='$uidv' AND visibility='v' and nye='3' $media_qf ORDER BY norder ASC LIMIT 1");} unset($acheck);}
else{$c2=0; if($album_cover!=''){$r2=mysql_query("SELECT * FROM media WHERE albumid='$selected_album' AND id='$uidv' AND visibility='v' AND sbid='$album_cover' and nye='3' $media_qf"); $c2=mysql_num_rows($r2);} if($c2==0){$r2=mysql_query("SELECT * FROM media WHERE albumid='$selected_album' AND id='$uidv' AND visibility='v' and nye='3' $media_qf ORDER BY sbid DESC LIMIT 1");}}


while($m2=mysql_fetch_array($r2)){
    if($_POST['repin']==2){ //to avoid a resource hog for other cases
        $uti=sb_user($m2['id']);
    }
    
    if($_POST['pin_pagination']==1){
     $dhref='/'.$uti['username'].'/photos?album='.$m['sbid'];   
    }else{
        $dhref='/'.$uti['username'].'/pins?board='.$m['sbid'];
    }
    
$pname=$m2['albumn'];

if($pname!="Videos"){
	
$wi='photo'.$ps;	
}
else{$wi='video'.$ps;}


$theresults[$x]='<div class="ihover '.$spclass.$hoverc.'" id="ihover'.$x.'" onmouseover="this.style.outline=\'1px solid #3b5998\'; document.getElementById(\'ihoverv'.$x.'\').style.outline=\'1px solid #3b5998\';" onmouseout="this.style.outline=\'1px solid rgb(204,204,204)\'; document.getElementById(\'ihoverv'.$x.'\').style.outline=\'1px solid rgb(204,204,204)\';"></div><a href="'.$dhref.'" style="position:relative;display:inline-block;left:0;top:0;margin-top:5px;margin-left:5px;"><i style="background-image: url(\'/'.$uidv.'/pics/'.$m2['picss'].'\');" class="'.$picsdisplay.' hth" onmouseover="document.getElementById(\'ihover'.$x.'\').style.outline=\'1px solid #3b5998\'; this.style.outline=\'1px solid #3b5998\';" onmouseout="document.getElementById(\'ihover'.$x.'\').style.outline=\'1px solid rgb(204,204,204)\'; this.style.outline=\'1px solid rgb(204,204,204)\';" id="ihoverv'.$x.'"></i></a><br><div style="padding:0;margin:0;padding-top:5px;" class="lbs"><a href="'.$dhref.'">'.$albumn.'</a><br>'.$xi.' '.$wi.'<br></div>';
	$x++;
$setpf='';
}



if(!isset($setpf) && $uid==$uidv){
$theresults[$x]='<div class="ihover '.$spclass.$hoverc.'" id="ihover'.$x.'" onmouseover="this.style.outline=\'1px solid #3b5998\'; document.getElementById(\'ihoverv'.$x.'\').style.outline=\'1px solid #3b5998\';" onmouseout="this.style.outline=\'1px solid rgb(204,204,204)\'; document.getElementById(\'ihoverv'.$x.'\').style.outline=\'1px solid rgb(204,204,204)\';"></div><a href="'.$dhref.'" style="position:relative;display:inline-block;left:0;top:0;margin-top:5px;margin-left:5px;"><i class="'.$picsdisplay.'" style="position:relative;display:inline-block;left:0;top:0;background-image:url(\'/images/empty-album.png\');background-repeat:no-repeat;background-size: cover;
background-position: center 25%;" onmouseover="document.getElementById(\'ihover'.$x.'\').style.outline=\'1px solid #3b5998\'; this.style.outline=\'1px solid #3b5998\';" onmouseout="document.getElementById(\'ihover'.$x.'\').style.outline=\'1px solid rgb(204,204,204)\'; this.style.outline=\'1px solid rgb(204,204,204)\';" id="ihoverv'.$x.'"></i></a><br><div style="padding:0;margin:0;padding-top:5px;" class="lbs"><a href="'.$dhref.'">'.$albumn.'</a><br>Empty<br></div>';
$x++;
}
else if(!isset($setpf)){
$theresults[$x]='';	
}
else{unset($setpf);}

}

}


if($_POST['sk']=='photos_tagged' AND !isset($_POST['album'])){

$uti=sb_user($uidv);
$value_c=$uidv;
$fullname_c=$uti['fullname'];
$unv_c=$uti['username'];

$dpin=$_POST['pin_pagination'];

$r=mysql_query("SELECT COUNT(*) as c FROM tags as dt WHERE id3='$uidv' AND visibility='v' AND pin='$dpin' AND flag!='tw' $tags_qf");
$m=mysql_fetch_array($r);
$cv=$m['c'];

$r=mysql_query("SELECT * FROM tags as dt WHERE id3='$uidv' AND visibility='v' AND flag!='tw' AND pin='$dpin' $tags_qf ORDER BY datetimep DESC LIMIT $gs,$gsv");
$c=$cv-$gs;
$d=$cv;

$total_retrieved=mysql_num_rows($r);

if($gs==0){
$sc=mysql_num_rows($r);
if($sc==0){

if($uid==$uidv){
    if($_POST['pin_pagination']==1){
        $dtext='No photos yet. ';
        $dtextv='Add photos?';
    }else{
        $dtext='No pins yet. ';
        $dtextv='Add pins?';
    }
$secho.='<div class="fbStarGridBlankContent">'.$dtext;

$secho.='<div class="flashUploaderOverlayButton stat_elem" id="u_jsonp_3_a"><a class="fluploader_select" href="#" id="u_jsonp_3_9" rel="async-post" onclick="$(\'.addphotos_caller\').click();">'.$dtextv.'</a></div>';

$secho.='</div>';
}else{
    if($_POST['pin_pagination']==1){
        $dtext='No photos to show';
    }else{
        $dtext='No pins to show';
    }
$secho.='<div class="fbStarGridBlankContent">'.$dtext.'</div>';	
}

}
}

while($m=mysql_fetch_array($r)){
$bydate[$x]=$m['datetimep'];

$dalbum=$m['albumid'];
$dphotoid=$m['photoid'];
$owner=$m['id'];



$r2=mysql_query("SELECT * FROM media WHERE albumid='$dalbum' AND sbid='$dphotoid' AND id='$owner' and nye='3'");
$c2=mysql_num_rows($r2);

while($m2=mysql_fetch_array($r2)){

$osize=getimagesize("../users/$owner/pics/".$m2['pics']);
$swidth=$osize[0];
$sheight=$osize[1];
$aorder=$c;
$c--;
if($m2['vidso']!=''){
$swidth=$m2['videow'];
$sheight=$m2['videoh'];

$duration=simplify_video_duration($m2['duration']);

$theresults[$x]='<span data-onclick="getnext(\''.$m2['pics'].'\',\''.$owner.'\',\''.$dalbum.'\',\''.$swidth.'\',\''.$sheight.'\',\''.$aorder.'\',\''.$d.'\',\'pt\',\'f\',\''.$value_c.'\',\''.$fullname_c.'\',\''.$unv_c.'\',\'vid\',\''.$m2['vids'].'\',\''.$m2['vidshd'].'\',\''.$m2['sbid'].'\')" style="cursor:pointer;position:relative;display:inline-block;bottom:0px;right:0px;" id="poraca" class="uiVideoLink uiVideoLinkMedium getnext"><i style="background-image: url(\'/'.$owner.'/pics/'.$m2['picss'].'\');" class="picsdisplay4 hth"></i><span class="playtime">'.$duration.'</span><span class="playicon"></span></span><br>';
}
else{
$theresults[$x]='<span data-onclick="getnext(\''.$m2['pics'].'\',\''.$owner.'\',\''.$dalbum.'\',\''.$swidth.'\',\''.$sheight.'\',\''.$aorder.'\',\''.$d.'\',\'pt\',\'f\',\''.$value_c.'\',\''.$fullname_c.'\',\''.$unv_c.'\',\'\',\'\',\'\',\''.$m2['sbid'].'\');" style="cursor:pointer;position:relative;display:inline-block;bottom:0;right:0px;" class="getnext"><i style="background-image: url(\'/'.$owner.'/pics/'.$m2['picss'].'\');" class="picsdisplay4 hth"></i>';

$uti=sb_user($m['id']);
if(in_array($m['id'],$uid_friends_me)){
$albumn=$m2['albumn'];
$albumid=$m2['albumid'];

$c5=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c5 FROM albums as dt WHERE id='$owner' AND sbid='$albumid' $a_qf"));
$c5=$c5['c5'];

if($c5==0){
$uti=sb_user($m['id3']);	
//means can see because of a tag, either him or friend of tagged person in photo, but album is disallowed
if($_POST['pin_pagination']==1){
    $specific='<a class="_53f" style="max-width:144px;" href="/'.$uti['username'].'/photos">'.$uti['fullname'].'\'s Photos</a>';
}else{
    $specific='<a class="_53f" style="max-width:144px;" href="/'.$uti['username'].'/pins">'.$uti['fullname'].'\'s Pins</a>';
}
}
else{
    if($_POST['pin_pagination']==1){
        $specific='<a class="_53f" style="max-width:144px;" href="/'.$uti['username'].'/photos?album='.$m['sbid'].'">'.$albumn.'</a>';
    }else{
        $specific='<a class="_53f" style="max-width:144px;" href="/'.$uti['username'].'/pins?board='.$m['sbid'].'">'.$albumn.'</a>';
    }
}
//run query in album privacy
}
else{
    if($_POST['pin_pagination']==1){
        $specific='<a class="_53f" style="max-width:144px;" href="/'.$uti['username'].'/photos">'.$uti['fullname'].'\'s Photos</a>';
    }else{
        $specific='<a class="_53f" style="max-width:144px;" href="/'.$uti['username'].'/pins">'.$uti['fullname'].'\'s Pins</a>';  
    }
}


$theresults[$x].='<div class="_53d _53q"><div class="_53g" style="position:absolute;left:0;bottom:0;z-index:1;"><div class="_53i">'.$specific.'</div></div>
<img src="/images/gradient.png" style="height: 53px;position: absolute;left: -1px;bottom: 2px;width: 165px;">
</div></span><br>';
}
$x++;
}

}
}


if($_POST['repin']==2){
    $dclass="";    
}else{
    $dclass=($uid==$uidv ? " move_cl dragWrapper" : " ");
}

$xa=0;
arsort($bydate);

if($_POST['sk']=="photos_albums"){
$ax=$total_albums;
}
else{$dclass=""; $ax="";}

if($_POST['sk']=="photos_tagged"){
$mglf='margin-left:1px;';
$mgtp='margin-top:7px;';
}
else{
$mglf='';
$mgtp='';
}

$axv=$gs+1;
$number3=4;

foreach($bydate as $key=> $value){
	$expand='';
if($gs==0){
	if($xa=="0"){$secho.='<ul style="margin:0;padding:0;display:inline-block;'.$mglf.$mgtp.'" id="sortable1">';}
if ($xa % $number3 == 0 AND $xa!=0) {
//if(!isset($thecheck)){$secho.='</div><div style="margin:0;padding:0;display:block;">'; $theckeck=''; $expand='padding-left:0;';}
//else{$secho.='</div><div>'; }
} 
}

if($_POST['sk']=="photos_tagged"){
if ($axv % $number3 == 0 && $axv!=1) {
$rm="0";
}
else{
$rm="25px";
}
$bm="23px";
}
else{$rm="10px"; $bm="21px";}

if($gs==0 && $_POST['sk']!="photos_tagged"){
$dclassv="";
}
else if($gs!=0 && $_POST['sk']!="photos_tagged"){
//$dclassv=" hidden_sb ";
$dclassv="";
}
else{
$dclassv="";
}

$secho.='<li class="photo_wrap '.$dclassv.' x'.$dclass.'" data-s_position="'.$ax.'" id="li_id'.$ax.'" style="'.$expand.'display:inline-block;float:left;padding:0;margin:0;margin-bottom:'.$bm.';margin-right:'.$rm.';width:171px;text-align:left;position:relative;">';

$secho.= $theresults[$key];
$secho.= '<i class="dragHover"></i></li>';
unset($expand);
$xa++;

if($_POST['sk']=="photos_albums"){
if(isset($videos_album)){
unset($videos_album);
}
else{
$ax--;
}
}
$axv++;
}
if($gs==0){
$secho.='</ul>';
}

if($gs!=0){
if($total_retrieved==0){
echo 'finished';
}
else{
$total_retrieved=$gs+$total_retrieved;
echo $secho.'{}'.$total_retrieved.'{}'.$gs;
}
}

if($gs!=0){
include("end.php");
}
?>