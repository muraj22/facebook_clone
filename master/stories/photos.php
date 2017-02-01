<?php
include("functions/td_fn.php");

include("functions/video_title_in_date.php");
include("functions/simplify_video_duration.php");

include("functions/html_crop.php");

if(!isset($justlinks)){


function natkrsort($array)
{
    $keys = array_keys($array);
    natsort($keys);

    foreach ($keys as $k)
    {
        $new_array[$k] = $array[$k];
    }
  
    $new_array = array_reverse($new_array, true);

    return $new_array;
}

function grnsb($length) {
    $characters = '123456789abcdefghijklmnopqrstuvwxyz';
    $string = '';    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    return $string;
}

function tdpp($top,$topv,$f=false){
if($f=="t"){
return 'past';	
}
$topv=tod($topv);
$top=tod($top);  

$compared_time=new DateTime($topv);
$actual_time=new DateTime($top);
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%Y'); $suf=" year";
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%m'); $suf=' month';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf='day';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf='hour';}
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf='minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf='second';}
if($td=='+0' || $td=='-0'){$td='1';}
$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}

if($suf=='second' || $suf=='minute' || $suf=='hour' && $td<11){
return 'belongs';
}
else{return 'past';}

}

$y=0;
foreach($whomposted as $key => $value){

	if(isset($clist) AND $value==$uid){
	$l_qf=" AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(privacy,'l',''))>0)>0";
	}
	else{
	$l_qf="";	
	}

$xrtl=0;
$uidv=$value;
$y=0;
$uidvp=$value.'p';
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$uidva=$value.'a';


$arri=0;
$arriv=0;

$wresult=mysql_query("SELECT * FROM registered WHERE id='$value'");
while($wrow=mysql_fetch_array($wresult)){
$uo=$wrow['id'];	
$uo_fn=$wrow['fullname'];
$uo_pic=$wrow['profilepict'];
}
$datetimeppc=array();
$belongs=array();

if(!isset($uploading_wall)){
if(isset($wall) AND $value!=$uidv){
    if($pin==1){
        $dalbumn='Photos';
    }else{
        $dalbumn='Pins';
    }
$preresult=mysql_query("SELECT * FROM albums as dt WHERE id='$value' AND albumn='$dalbumn' AND $dtc>$tagou AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT 1");
}
else if(isset($wall)){
$preresult=mysql_query("(SELECT * FROM albums as dt WHERE id='$value' AND $dtc>$tagou AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT $mn) UNION (SELECT * FROM albums as dt WHERE $dtc>$tagou AND visibility='v' AND (SELECT COUNT(*) FROM media WHERE id2='$value' AND nye='3' AND visibility='v' AND dt.sbid=media.albumid $media_qf)>0 $a_qf ORDER BY datetimep DESC LIMIT $mnv)");
}
else{
if(isset($clist) AND $value==$uid){
$preresult="(SELECT * FROM albums as dt WHERE id='$value' AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(privacy,'l',''))>0)>0 AND $dtc>$tagou AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT 3)";	//it could strictly be an album with full privacy or partial privacy to that list for example
$preresult.=" UNION(SELECT * FROM albums as dt WHERE id='$value' AND (SELECT COUNT(*) FROM media WHERE id='$uid' AND media.albumid=dt.sbid AND (SELECT COUNT(*) FROM lists as lt WHERE sbid='$clist' AND FIND_IN_SET(lt.sbid,REPLACE(media.privacy,'l',''))>0)>0)>0 AND $dtc>$tagou AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT 3)"; //or it could be photos in it
$preresult=mysql_query($preresult);
}
else{
$preresult=mysql_query("SELECT * FROM albums as dt WHERE id='$value' AND $dtc>$tagou AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT 3");
}
}
}

else{
if(isset($wall) AND $value!=$uidv){
    if($pin==1){
        $dalbumn='Photos';
    }else{
        $dalbumn='Pins';
    }
$preresult=mysql_query("SELECT * FROM albums as dt WHERE id='$value' AND albumn='$dalbumn' AND sbid='$albumid' AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT 1");
}
else{
$preresult=mysql_query("SELECT * FROM albums as dt WHERE id='$value' AND sbid='$albumid' AND visibility='v' $a_qf ORDER BY datetimep DESC LIMIT 1");
}
}

$c=mysql_num_rows($preresult);
while($prerow=mysql_fetch_array($preresult)){
$value=$prerow['id'];

	
	$albumid=$prerow['sbid'];

	$albumidn=$prerow['albumn'];
	if(!isset($uploading_wall)){
	if(isset($wall) AND $value!=$uidv){
	$r2=mysql_query("SELECT * FROM media WHERE id='$value' AND id2='$uidv' AND albumid='$albumid' AND visibility='v' and nye='3' $media_qf");	
	}
	else{
	$r2=mysql_query("SELECT * FROM media WHERE id='$value' AND albumid='$albumid' AND visibility='v' and nye='3' $l_qf $media_qf");
	}	
	}
	else{	
	if(isset($wall) AND $value!=$uidv){
	$r2=mysql_query("SELECT * FROM media WHERE id='$value' AND id2='$uidv' AND sbid='$sbid' AND albumid='$albumid' AND visibility='v' and nye='3' $media_qf");	
	}
	else{
	$r2=mysql_query("SELECT * FROM media WHERE id='$value' AND sbid='$sbid' AND albumid='$albumid' AND visibility='v' and nye='3' $media_qf");
	}
	}
	
	$totalpics=mysql_num_rows($r2);
	$datetimepp=array();
	
		if($totalpics!=0){

	
	$totalpicsv=0;	
	
	if($albumidn=="Wall Photos" || $albumidn=="Videos" || $albumidn=="Photos" || $albumidn=="Pins" || $albumidn=="Wall Pins"){
	if(isset($wall)){
        if(!isset($mn)){
            $mn=12;   
        }
	$limit=$mn; //set different limits according to being on wall mode or news feed mode
	}
	else{
	$limit=12;	
	}
	}
	else{
	$limit=9;	
	}
	if(!isset($uploading_wall)){
	if($albumidn=="Profile Pictures"){
	if(!isset($wall)){
	$mn=3;	
	}
	$r2=mysql_query("SELECT * FROM media WHERE id='$value' AND albumid='$albumid' AND visibility='v' and nye='3' $l_qf $media_qf ORDER BY datetimep_pp DESC LIMIT $mn");
	$wdt='datetimep_pp';
	}
	else{
	$r2=mysql_query("SELECT * FROM media WHERE id='$value' AND albumid='$albumid' AND visibility='v' and nye='3' $media_qf $l_qf ORDER BY datetimep DESC LIMIT $limit");
	$wdt='datetimep';
	}	
	}
	else{
	$r2=mysql_query("SELECT * FROM media WHERE id='$value' AND albumid='$albumid' AND sbid='$sbid' AND visibility='v' and nye='3' $media_qf ORDER BY datetimep DESC LIMIT 1");
	$wdt='datetimep';
	}
	
	while($m2=mysql_fetch_array($r2)){




if($totalpicsv==0){
	$albumidv[$arri]=$albumid;
	$albumidvv[$arri]=$albumidn;
	$belongs[$arri]=0;
	$vari=0;
	
	$wpics[$arri]='';
}
	
	if($totalpics==1){
	$wpics[$arri].='-'.$vari.'{}'.$m2['picss'].'{}'.$value;
	$datetimeppc[$arri]=$m2[$wdt];
	$albumidv[$arri]=$albumid; $albumidvv[$arri]=$albumidn;
	}
	$owners[$vari]=$value;
	$datetimepp[$vari]=$m2[$wdt];
	$picss[$vari]=$m2['picss'];
$vari++;
$totalpicsv++;	

	
	} //finish while


$xp=0;

	$wvaluev=array();
	
	if($albumidn=="Profile Pictures" || $albumidn=="Videos" || $albumidn=="Wall Photos" || $albumidn=="Wall Pins" || $albumidn=="Photos" && $totalpics!=1 || $albumidn=="Pins" && $totalpics!=1){
$arri--;
	}
	


	foreach($datetimepp as $keyr => $wvaluev[$xp]){
	


	
	$xpm=$xp-1;
	if(($albumidn=="Profile Pictures" || $albumidn=="Videos" || $albumidn=="Wall Photos" || $albumidn=="Wall Pins" || $albumidn=="Photos" || $albumidn=="Pins") && $totalpics!=1){
		$wvaluev[$xpm]=$wvaluev[$xp];
		
	}
	



	
	if(isset($wvaluev[$xpm])){ 
	$tdpp=tdpp($wvaluev[$xpm],$wvaluev[$xp]);
	if($tdpp=='belongs' && $albumidn!="Profile Pictures" && $albumidn!="Videos" && $albumidn!="Wall Photos" && $albumidn!="Photos" && $albumidn!="Pins" && $albumidn!="Wall Pins"){
	$belongs[$arri]=$belongs[$arri]+1;
	$keyrv=$keyr;
	$wpics[$arri].=$keyrv.'{}'.$picss[$keyr-1].'{}'.$value.'-'.$keyr.'{}'.$picss[$keyr].'{}'.$value.'-';
	if(!isset($datetimeppc[$arri])){
	$datetimeppc[$arri]=$wvaluev[$xp]; 
	}
	}
	else{
	
	
	$arri++;
		
	$belongs[$arri]=0;
	$wpics[$arri]=$keyr.'{}'.$picss[$keyr].'{}'.$value.'-';
	$datetimeppc[$arri]=$wvaluev[$xp]; 	
	$albumidv[$arri]=$albumid;
	$albumidvv[$arri]=$albumidn;
	}
	$owners[$arri]=$value;
	$arriv++;
	
	} //finish foreach
	$xp++;
	
	} //finish if totalpics!=0
	
	$arri++;
	

	} //finish while prerow (selection from albums)
} //finish foreach($sbv as ...)




$dpieces='';
$belongsvv='';


foreach($belongs as $key3v => $value3v){
	
	if($value3v>0){$value3v++;}
$list=explode('-',$wpics[$key3v]);

$list=array_unique($list);
$list=array_filter($list);
$pause='';
$allpics='';
$txpic=0;
$nlist=array();
foreach($list as $piecesk => $piecesv){
$ok=explode("{}",$piecesv);
$nlist[$ok[1]]=$ok[0].'{}'.$ok[2];
}


/*
if($albumidvv[$key3v]=='Profile Pictures'){ //profile pictures fix - as album_cover might be the actual abum_cover and unix timestamp can't be added to a picture inside profile pictures album
$uti=sb_user($value);
$pp=$uti['profilepic'];

if($pp=='incognitof.gif' OR $pp=='incognitm.gif'){
$or=mysql_query("SELECT * FROM $uidva WHERE albumid='$albumidv[$key3v]' ORDER BY datetimep DESC LIMIT 1");
while($om=mysql_fetch_array($or)){
$pp[$key3v]=$om['picsa'];	
}	
}

$nlist=array();

$or=mysql_query("SELECT * FROM $albumidv[$key3v] WHERE picsa='$pp'");
while($om=mysql_fetch_array($or)){
$nlist[$om['picss']]=0;	
}


$or=mysql_query("SELECT * FROM $uidva WHERE albumid='$albumidv[$key3v]' ORDER BY datetimep DESC LIMIT 1");
while($om=mysql_fetch_array($or)){
$datetimeppc[$key3v]=$om['datetimep'];	
}

}*/
arsort($nlist);	

$list=$nlist;

foreach($list as $k=>$v){

$vv=explode("{}",$v);
$value=$vv[1];
$nresult=mysql_query("SELECT * FROM media WHERE id='$value' AND albumid='$albumidv[$key3v]' AND picss='$k' AND visibility='v' and nye='3'");
$c=mysql_num_rows($nresult);

	while($nrow=mysql_fetch_array($nresult)){
	
		$whatisit_h='photo';
		$cag=$nrow['sbid'];
		
include("master/set_pause.php");


$allpics.=','.$nrow['sbid'];
	}

$txpic++;	

	
}



$uti=sb_user($value);

$uo=$value;
$uo_un=$uti['username'];
$prefix=$uti['prefix'];
$uo_fn=$uti['fullname'];
$uo_pic=$uti['profilepict'];

$picst='';
$picst.='<table cellspacing="0" cellpadding="0" style="margin:0;padding:0;"><tr rowspan="2"><td>';

$checkforto='';
$xpic=0;
foreach($list as $piecesv => $piecesk){
if($albumidvv[$key3v]=='Profile Pictures'){ if($xpic>0){break;} $txpic=1;}

$es1='';
$son2='';
$son3='';
$son4='';
$son6='';
$son9='';
$xvar2='';
$closediv='';
$closetd='</td>';

$whatisitv='a';

if($txpic>=9){$son9='t'; $xvar3='height:129px;'; $cpw='129';}
else if($txpic>=6){$son6='t'; $xvar3='height:129px;'; $cpw='129';}
else if($txpic>3){$son4='t'; $xvar3='height:196px;'; $cpw='196';}
else if($txpic==3){$son3='t'; $xvar3='height:129px;'; $cpw='129';}
else if($txpic==2){$son2='t'; $xvar3='height:196px;'; $cpw='196';}
else if($txpic==1){$es1='t';  $xvar3='width:398px;'; $cpw='398'; $whatisitv='p';}

if($txpic>=9){if($xpic>8){break;}}
else if($txpic>=6){if($xpic>5){break;}}
else if($txpic>3){if($xpic>3){break;}}
else if($txpic==3){if($xpic>2){break;}}
else if($txpic==2){if($xpic>1){break;}}
else if($txpic==1){if($xpic>0){break;}}
	
	if($txpic>1){
	//only select location from album as it is more than one picture with possibly different locations
	$nresult=mysql_query("SELECT * FROM albums WHERE id='$uo' AND sbid='$albumidv[$key3v]' AND visibility='v'");
	while($nrow=mysql_fetch_array($nresult)){
	$location=$nrow['location'];
	if($location!=""){$loca=' &#151; at '.$location;}	
	}
	if(!isset($loca)){
	$loca='';	
	}	
	}
	
	else{ //select for the picture as it is only one single picture, fallback to the album's location
	$uoa=$uo.'a';
	$nresult=mysql_query("SELECT * FROM media WHERE id='$uo' AND albumid='$albumidv[$key3v]' AND visibility='v' AND picss='$piecesv' and nye='3'");
	while($nrow=mysql_fetch_array($nresult)){
	$location=$nrow['location'];
	if($location!=""){$loca=' &#151; at '.$location;}	
	}
	if(!isset($loca)){
	$loca='';	
	}
	
	if($loca==""){
	$nresult=mysql_query("SELECT * FROM albums WHERE id='$uo' AND sbid='$albumidv[$key3v]' AND visibility='v'");
	while($nrow=mysql_fetch_array($nresult)){
	$location=$nrow['location'];
	if($location!=""){$loca=' &#151; at '.$location;}	
	}
	if(!isset($loca)){
	$loca='';	
	}
	}
	}

	$nresult=mysql_query("SELECT * FROM media WHERE id='$uo' AND albumid='$albumidv[$key3v]' AND picss='$piecesv' AND visibility='v' and nye='3'");
	$c=mysql_num_rows($nresult);

	while($nrow=mysql_fetch_array($nresult)){
	

	$nroww=$nrow['picsa'];
	$laspic=$nrow['picsa'];
	if($es1!='t'){
	$nroww=$nrow['picsa'];	
	}
		

	if($xpic=='0'){$picst.='<td><div style="position:relative;margin:0;margin-bottom:-2px;margin-right:-5px;padding:0;" id="wacha">'; $closetd='';}
	if($xpic=='1'){$closediv=''; $closetd=''; if($son2=='t'){$closediv='</div>'; $closetd='</td>';} }
	if($xpic=='2'){$closetd=''; if($son3=='t'){$closediv='</div>'; $closetd='</td>';} }
	if($xpic=='3'){$closediv=''; $closetd=''; if($son4=='t'){$closediv='</div>'; $closetd='</td>';} }
	if($xpic=='4'){$closediv=''; $closetd=''; }
	if($xpic=='5'){$closediv=''; $closetd=''; if($son6=='t'){$closediv='</div>'; $closetd='</td>';} }
	if($xpic=='6'){$closediv=''; $closetd=''; }
	if($xpic=='7'){$closediv=''; $closetd=''; }
	if($xpic=='8'){$closediv='</div>'; $closetd='</td>'; }
	$laspic=$nrow['pics'];
	if($xpic=="0"){if(file_exists("../users/".$uo."/pics/".$nrow['picsa'])){	if(!isset($thefabpic)){
	$thefabpic=$nrow['pics'];
	if($es1=='t'){$likeid=$nrow['sbid']; $thefabpicv=$thefabpic; $whati='photo';}
	else{$likeid=$nrow['albumid']; $thefabpicv=$likeid; $whati='album';}
	}
                                                                                
	$thewidthm=getimagesize("../users/".$uo."/pics/".$nrow['picsa']);}else{$thewidthm='';} if(is_array($thewidthm)){$minipw=$thewidthm[0]; $miniph=$thewidthm[1]; $minip=$nrow['picsa']; $pid=$nrow['sbid']; $desc=$nrow['descr']; }}
	if(file_exists("../users/".$uo."/pics/".$nrow['pics'])){$thewidthl=getimagesize("../users/".$uo."/pics/".$nrow['pics']); $swidth=$thewidthl[0]; $sheight=$thewidthl[1]; if(file_exists("../users/".$uo."/pics/".$nrow['picsa'])){ $thewidths=getimagesize("../users/".$uo."/pics/".$nrow['picsa']); $mwidth=$thewidths[0]; $mheight=$thewidths[1]; $kill='';

$gnorder=$nrow['norder'];
$pin=$nrow['pin'];

if($nrow['albumn']=="Profile Pictures" || $nrow['albumn']=="Wall Photos" || $nrow['albumn']=="Videos" || $nrow['albumn']=="Photos" || $nrow['albumn']=="Pins" || $nrow['albumn']=="Wall Pins"){
$did=$nrow['sbid'];
$or=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM media WHERE id='$uo' AND albumid='$albumidv[$key3v]' AND sbid!='$did' AND visibility='v' AND norder<$gnorder $media_qf"));	
$gnorder=$or['c']+1;
}

}else{$kill='y';}}
	else{$kill='y';}
	$nr=grnsb(9);

$vids_c=$nrow['vids'];
if($vids_c!=""){
$vidd_c=td_fn($nrow['datetimep']);
$vids_c=$nrow['vids'];

$vidt_c=$nrow['title'];
if($vids_c!="" && $vidt_c==""){
$vidt_c=video_title_in_date($nrow['datetimep']);
}
$vidl_c=simplify_video_duration($nrow['duration']);
}


$pics_a=$nrow['picsa'];
$pics_c=$nrow['pics'];
$vids_c=$vids_c;
$vidshd_c=$nrow['vidshd'];

if($kill!='y'){

//in case album is Photos for cross posting to friend's walls

$photos_id=$nrow['id2'];

$owner_c=$uo;
$albumid_c=$albumidv[$key3v];

$toeval="nrow";

$wk='r';
include("master/photo_crop.php");
		
$picst.=$secho;
$picst.=$closediv;
$picst.=$closetd;
}
			unset($xvar);
	$xpic++;
	}

	}
	
$picst.='</tr></table>';
	

	
	$thetime=$datetimeppc[$key3v];

	if($kill!='y'){
		

        if($pin=="2"){
            $dtext='pins';   
            $dhref='/'.$uo_un.'/pins?board='.$albumidv[$key3v];
            $dtextv='pin';
            $dtextvv='board';
        }else{
            $dtext='photos';   
            $dhref='/'.$uo_un.'/photos?album='.$albumidv[$key3v];
            $dtextv='photo';
            $dtextvv='album';
        }
        
		$alborp="p";
		if($albumidvv[$key3v]=="Videos"){$xchunk='added a new video.'.$loca;  unset($loca); $alborp="v";}
		else if($xpic>1){$xchunk='added '.$value3v.' new '.$dtext.' to the '.$dtextvv.' <a href="'.$dhref.'">'.$albumidvv[$key3v].'</a>.'.$loca; unset($loca);  $alborp="a";}
		else if($xpic=='1'){
		$xchunk='added a new '.$dtextv.'.'.$loca;
		if($albumidvv[$key3v]=='Profile Pictures'){$xchunk='updated '.$prefix.' profile picture.'.$loca;}
                    else if($albumidvv[$key3v]=='Photos' || $albumidvv[$key3v]=='Pins'){			
		$uti=sb_user($photos_id);
		$xchunk='<img src="/images/drP8vlvSl_8.gif" class="wallArrowIcon" alt="posted to"><div style="display:inline-block;">'.$uti['link'].'</div>'.$loca;	
		}
		unset($loca); $alborp="p";
		}
  
 
		if(file_exists("../users/"."$uo/pics/$uo_pic")){

			$aresult=mysql_query("SELECT * FROM media WHERE id='$uo' AND albumid='$albumidv[$key3v]' AND visibility='v' and nye='3' $media_qf");
			$xg=mysql_num_rows($aresult);
		
		if($alborp!="v"){	
$vidl="";
$vidt="";
$vidd="";
		}
		else{
$vidl=$vidl_c;
$vidt=$vidt_c;
$vidd=$vidd_c;			
		}


if($alborp=="a"){$pid="";}

if($alborp=="v"){
$dshare='shared_video';	
}
else if($alborp=="a"){
$dshare='shared_album';	
}
else if($alborp=="p"){
$dshare='shared_photo';	
}
$sharef='show_msg_dialogs(\''.$albumidv[$key3v].'\',\''.$dshare.'\',\''.$uo.'\',\''.$pid.'\','.$xg.','.$x.',\''.$vidl.'\',\''.$vidt.'\',\''.$vidd.'\')';

$pause='';
$allpicse=explode(",",$allpics);
foreach($allpicse as $omk=>$omv){
if($omv!=""){
			$whatisit_h=$albumidv[$key3v];
			
			$cag=$omv;
		
include("master/set_pause.php");


}
}

/*
foreach($hidden as $key4=>$value4){
if(strpos($allpics,$value4)!==false){$pause='t';}	
}
*/

if($alborp=="p" || $alborp=="v"){	
$ltype="photo";
}
else{
$ltype="album";	
}


if($uo==$uid){
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="removep(\''.$allpics.'\',\''.$albumidv[$key3v].'\','.$x.');">Delete Post</li>';

if($pin==1){
    $dtext='Edit Album';
}else{
    $dtext='Edit Board';
}

if($albumidvv[$key3v]!="Profile Pictures" && $albumidvv[$key3v]!="Photos" && $albumidvv[$key3v]!="Pins"){
$faddo.='<li class="itemaliv" style="list-style-type:none;" onclick="editalbum(\''.$albumidv[$key3v].'\',\''.$pin.'\');">'.$dtext.'</li>';
}
$faddo.='
</ul>
';
$saddo='';
}
else{
$faddo='<div data-type="'.$ltype.'" data-sbid="'.$likeid.'" data-uidv="'.$value.'" data-yk="'.$x.'" data-lparams=\'{"lpid":"'.$likeid.'","whatisit":"'.$ltype.'","uidv":"'.$value.'"}\' class="mtabled faddov" data-uidv="'.$value.'" id="mtablew'.$x.'"> 

<div class="cmjr" style="margin:0;padding:0;position:absolute;right:-1px;top:-2px;z-index:16;;display:inline-block;opacity:0;" id="cmncd'.$x.'" data-yk="'.$x.'">
<div class="cmncd2" onclick="mcm('.$x.');" id="cmncdo'.$x.'" style="z-index:16;;">
</div>
<div class="cmncd2v" onclick="mcmv('.$x.');" id="cmncdov'.$x.'" style="z-index:16;;display:none;">
</div>
</div>


<ul id="cmncdc'.$x.'" class="cmncdc" style="display:none;border-width:1px 1px 2px;border-style:solid;border-color:rgb(119,119,119) rgb(119,119,119) rgb(41,62,106);-moz-border-colors:none;-moz-border-image:none;background-color:#ffffff;padding:3px 0px 4px;overflow-y:auto;list-style-type:none;word-wrap:break-word;position:absolute;right:0px;top:19px;z-index:10;">

<li class="itemaliv" style="list-style-type:none;" onclick="hidefsp(\''.$allpics.'\',\''.$uo.'\',\''.$whatisit_h.'\','.$x.');">Hide...</li>
<li class="itemaliv" style="list-style-type:none;" onclick="reportp(\''.$allpics.'\',\''.$uo.'\',\''.$whatisit_h.'\','.$x.');">Report story or spam</li>

</ul>';
$saddo='';	
}


$dr[$x]=$faddo;


$r10 = mysql_query("SELECT * FROM likew WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND likes='1'");
$nb=mysql_num_rows($r10);
if($nb>0){
$like='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:none;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}
else{
$like='<div style="margin:0;padding:0;display:none;" class="lbl"><a class="unlike" href="#" title="Stop liking this item">Unlike</a>&nbsp;&#183;&nbsp;</div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a class="like" href="#" title="Like this item">Like</a>&nbsp;&#183;&nbsp;</div>';	
}

if($pin==1){
    $dclass='imgsp';   
    $repin='';
}else{
    $r10 = mysql_query("SELECT * FROM repinw WHERE likeid='$likeid' AND what='$ltype' AND id2='$uid' AND repins='1'");
    $nb=mysql_num_rows($r10);
    if($nb>0){
        $repin='<div style="margin:0;padding:0;display:inline-block;" class="lbl"><a href="#" class="unpin" title="Unpin this item">Unpin</a></div><div style="margin:0;padding:0;display:none;" class="lbl"><a href="#" class="repin" title="Repin this item">Repin</a></div>&nbsp;&#183;&nbsp;';	
    }
    else{
        $repin='<div style="margin:0;padding:0;display:none;" class="lbl"><a href="#" class="unpin" title="Unpin this item">Unpin</a></div><div style="margin:0;padding:0;display:inline-block;" class="lbl"><a href="#" class="repin" title="Repin this item">Repin</a></div>&nbsp;&#183;&nbsp;';	
    }
    $dclass='pinsp';
}

$dr[$x].='<table style="color:#808080;font-size:11px;" class="mtable"><tr><td style="width:50px;padding-left:16px;padding-right:2px;"><a href="/'.$uo_un.'" class="andbl"><img src="/'.$uo.'/pics/'.$uo_pic.'" style="max-height:50px;max-width:50px;" class="profilepict"></a></td><td><table style="margin:0;padding:0;"><tr><td class="friendslink"><a hc="" href="/'.$uo_un.'">'.$uo_fn.'</a> <span class="llb fwn" style="color:#808080;">'.$xchunk.'</span></td></tr><tr><td>'.$picst.'</td></tr></table><tr><td style="text-align:right;"><div class="'.$dclass.'" style="cursor:default;position:relative;top:-2px;right:-2px;"></div></td><td class="story_foot_tdv" style="padding-left:4px;"><div class="lbl" style="margin:0;padding:0;display:inline-block;">'.$like.'<span class="friendslink3v" data-dx="'.$x.'" data-leavecomment="t" title="Leave a comment">Comment</span>&nbsp;&#183;&nbsp;<span class="friendslink3v" title="Post this on your profile." onclick="'.$sharef.'">Share</span>&nbsp;&#183;&nbsp;'.$repin.'<abbr class="livetimestamp" id="dtime'.$x.'" style="margin:0;padding:0;" data-utime="'.$thetime.'" title="'.rtd($thetime).'">'.td
($thetime).'</abbr></div>';


$albumn=$albumidvv[$key3v];
$albumid=$albumidv[$key3v];

$total_album_photos=$xg;
$total_post_photos=$value3v;
if($total_post_photos==0){$total_post_photos=1;}

if($total_album_photos==$total_post_photos){ //this is special to this
$peditablev="t"; 
}
else{
$peditablev="f";	
}


if($ltype=="album"){
$ltypev="albums";
$sbid=$albumid;
}
else{
$ltypev="media";
$sbid=$likeid;
}

$nfjax="";
$data_t='data-t_align="middle"';

$dr[$x].='<ul class="audienceSelectorv uiList inlineBlock mls" style="position:relative;top:-2px;">';

$uidv=$uo;

$privacy_configuration="small";
$privacy_source="nf";

include("buttons/privacy_button.php");
$dr[$x].=$button;
$dr[$x].='</ul>';


	unset($xchunk);

		}

$dr[$x].='<div class="foot_box lb">';
include("stories/story_pincho.php");
$dr[$x].=$sechov;
	
$r10 = mysql_query("SELECT * FROM likes WHERE likeid='$likeid' AND what='$whati'");
while($m10 = mysql_fetch_array($r10))
  {


$count=$m10['count'];
if($count!='0'){$count=$count;}else{unset($count);}


}

$r10 = mysql_query("SELECT * FROM repins WHERE likeid='$likeid' AND what='$whati'");
while($m10 = mysql_fetch_array($r10))
{


    $countv=$m10['count'];
    if($countv!='0'){$countv=$countv;}else{unset($countv);}


}



	$vrt=0;
$uidvp=$uo.'pc';
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$vrt=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS vrt FROM comments WHERE elemid='$likeid' AND visibility='v' AND type='$ltype'"));
$vrt=$vrt['vrt'];
  


	if($vrt<=2){$bordercito='';}
	else{$bordercito='1';}

if(isset($count)){
$totlikes=$count;
}
else{$totlikes=0;}
 
if(isset($count)){

$ltype=$ltype;
$wp_table='like';
$likeid=$likeid;
$owner_c=$uo;

include("stories/with_plugin.php");

$hc='';
unset($count); $haslikes='';}
else{

$tr=0;
$with='';	
$hc='hidden_sb';
}

if(isset($count)){
    $totlikes=$count;
}
else{$totlikes=0;}

include("stories/likes_this.php");

if(isset($countv)){

    $ltype=$ltype;
    $wp_table='repin';
    $likeid=$likeid;
    $owner_c=$uo;

    include("stories/with_plugin.php");

    $hc='';
    unset($countv); $haslikes='';
}
else{

    $tr=0;
    $with='';	
    $hc='hidden_sb';
}

include("stories/repinned_this.php");

if($vrt<50){
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'moremsgv'.$x.'\').style.display=\'none\';';	
}
else{
$cont=' document.getElementById(\'moremsg'.$x.'\').style.display=\'none\'; document.getElementById(\'prevc'.$x.'\').style.display=\'block\'; document.getElementById(\'displaym'.$x.'\').style.display=\'block\';';	
}


if(!isset($haslikes)){$tm='inline-block';}else{$tm='none';}

if($vrt>2){
	$tmv='none';
}
else{
	$tmv='block';
}


if($alborp=='p' || $alborp=='v'){
    $share_id=$likeid;
    if($alborp=="p"){
$dshare="shared_photo";	
}
else{
$dshare="shared_video";	
}
$counter=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM shares WHERE id2='$uo' AND elemid='$likeid' AND whatisit='$dshare' AND visibility='v'"));
$counter=$counter['counter'];
}
else{
    $dshare='shared_album';
    $share_id=$albumid;
    
    $counter=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM shares WHERE id2='$uo' AND elemid='$albumid' AND whatisit='shared_album' AND visibility='v'"));
$counter=$counter['counter'];
}

if($counter>0){
if($counter>1){$isp='s';}
else{$isp='';}

$ltype='';
$wp_table='shares';
$owner_c=$uo;

include("stories/with_plugin.php");

$dr[$x].='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;position:relative;margin-left:78px;padding-top:6px;display:'.$tmv.';" class="foot_box_inner" id="share_c'.$x.'">



<div class="share_bt" style="position:absolute;left:5px;bottom:3px;"></div>

<div class="friendslinkvl" style="display:inline-block;position:relative;left:23px;bottom:1px;">'.$with.'</div>

</div>';
$hasshares='';
}

$totcomments=$vrt;
if(isset($counter)){$totshares=$counter;}
else{$totshares=0;}

$top=$totlikes*1+$totcomments*.4+$totshares*4;
if($top!=0){$top=$top+1; $top=$top*10;}

$topa[$x]=$top;

if($vrt>2){
if(isset($haslikes)){$tm='none';}else{$tm='inline-block';}
$dr[$x].='<div style="background:#edeff4;width:394px;padding:3px;border-top:0px solid #ffffff;padding-top:5px;padding-bottom:5px;position:relative;margin-left:78px;" class="foot_box_inner" id="moremsgv'.$x.'">


<div style="width:60%;margin:0;padding:0;display:inline-block;" id="moremsgvv'.$x.'">

<div class="msgiconito" style="position:absolute;left:6px;"></div><div class="friendslinkvl" style="display:inline-block;position:relative;left:24px;"><span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',1);'.$cont.' $(\'#share_cv'.$x.'\').remove();  $(\'#moremsgvv'.$x.'\').css(\'width\',\'100%\');  $(\'#share_c'.$x.'\').css(\'display\',\'block\');" id="moremsg'.$x.'">View all '.$vrt.' comments</span>';

$dr[$x].='<span class="friendslink3vv" onclick="viewpre(\''.$x.'\',\''.$value.'\',\''.$likeid.'\',2);" style="display:none;" id="prevc'.$x.'">View previous comments</span></div><div id="displaym'.$x.'" style="margin:0;padding:0;color:#808080;position:absolute;right:5px;top:5px;display:none;"><span id="howmanym'.$x.'">2</span> of <span id="howmanymv'.$x.'">'.$vrt.'</span></div>

</div>';

$dr[$x].='</div>';	
}

if(!isset($haslikes) AND !isset($hasshares) AND $vrt>0 AND $vrt<=2){$tm='inline-block';}
else{$tm='none';}

$nml=78;
$nmlf='';

$two_c=2;

$for_photo='t';

$value=$uo;

$thefabtext=$likeid;

include("master/load_2_comments.php");

include("master/comment_box.php");

$dr[$x].='</div>'; //foot box closure


$dr[$x].='</div></td></tr></table>';



$dr[$x].='<script type="text/javascript">$(".foot_box:last").after(\'<div class="hidden_sb pincho_calibre"></div>\'); $(".foot_box:last").next(".pincho_calibre").click();</script>';

$dr[$x].='</div>'; //main wrapper for story closure
	$y++;
	
	
	
	unset($thefabpic);
	
$belongsvv.=$albumidv[$key3v].':<br>'.$wpics[$key3v].' '.$value3v.'<br>';	
$bydate[$x]=$datetimeppc[$key3v];
if($kill!='y'){
	if($pause=='t'){unset($dr[$x]); unset($topa[$x]); unset($bydate[$x]); $x--; unset($pause);}
$x++;
}

	}
	
}

}



}

?>