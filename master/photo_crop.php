<?php


$pics_a=${$toeval}['picsa'];

$pics_a=${$toeval}['picsa'];
$pics_c=${$toeval}['pics'];
$vids_c=${$toeval}['vids'];
$vidshd_c=${$toeval}['vidshd'];

$swidth_c=$swidth;
$sheight_c=$sheight;
if($vids_c!=""){
$swidth_c=${$toeval}['videow'];
$sheight_c=${$toeval}['videoh'];	
}

$albumid_c=${$toeval}['albumid'];

$sbid_c=${$toeval}['sbid'];


if($wk=="pti"){
$mr=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM tags as dt WHERE id3='$valued' AND albumid='$albumid_c' AND visibility!='d' $tags_qf"));
$tal_c=$mr['c'];


$uti=sb_user($valued);
$value_c=$valued;
$fullname_c=$uti['fullname'];
$unv_c=$uti['username'];

}
else{
$value_c='';
$fullname_c='';
$unv_c='';
$mr=mysql_query("SELECT * FROM media WHERE id='$value' AND albumid='$albumid_c' AND visibility!='d' $media_qf");
$tal_c=mysql_num_rows($mr);
}

if($vids_c!=""){
$vid_photo="vid";	
$vidclass='uiVideoThumbv ';
$vidi='<i></i>';
}
else{$vid_photo=""; $vidclass=''; $vidi='';}

$pst='getnext(\''.$pics_c.'\',\''.$owner_c.'\',\''.$albumid_c.'\',\''.$swidth_c.'\',\''.$sheight_c.'\',\''.$gnorder.'\',\''.$tal_c.'\',\''.$wk.'\',\'f\',\''.$value_c.'\',\''.$fullname_c.'\',\''.$unv_c.'\',\''.$vid_photo.'\',\''.$vids_c.'\',\''.$vidshd_c.'\',\''.$sbid_c.'\');';


$htmlcrop=html_crop($es1,$mwidth,$mheight,$cpw);
$xvar=$htmlcrop[0];
$xvar=str_replace('class="','class="'.$vidclass,$xvar);
$xvar3=$htmlcrop[1];



		$iw=$htmlcrop[2]; //$wfema
		$ih=$htmlcrop[3]; //$hfema
		
$opt=$htmlcrop[4];

if(isset($sps)){
$xvar='onclick="'.$pst.' return false;" style="cursor:pointer;display:block;margin-right:5px;"';
$xvar3='max-width:'.$cpw.'px;';
$opt=0;	
$ih=0;
$iw=0;
}
$ih=$ih-2;
$ihv=$ih+4;

$iw=$iw-2;
$iwv=$iw+7;


$secho='';
if(isset($sps)){
		$secho.='<div class="pst"><a href="#" '.$xvar.'><img src="/'.$owner_c.'/pics/'.$pics_a.'" class="pic" style="'.$xvar3.'"></a></div>'; 	
unset($sps);
}
else{
		$secho.='<div '.$xvar.'><img onclick="'.$pst.'" src="/'.$owner_c.'/pics/'.$pics_a.'" class="pic" style="'.$xvar3.'">'.$vidi.'</div>'; 	
		$secho.='<a href="#" onclick="'.$pst.'" style="display:inline-block;" data-gn_sbid="'.$sbid_c.'" target="_blank"><div style="position:relative;margin:0;padding:0;display:inline-block;left:-'.$iwv.'px;top:-'.$opt.'px;cursor:pointer;" class="fburl"><div style="position:absolute;position:absolute;border:1px solid;border-color:rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(59, 89, 152, 0.35);height:'.$ih.'px;width:'.$iw.'px;margin-top:-'.$ihv.'px;text-align:center;"></div></div></a>';
		
		
}


?>