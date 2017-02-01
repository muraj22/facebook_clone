<?php
if (!function_exists('checkforsmileys')) {
function checkforsmileys($chatmsg){

$chatmsg=str_replace(':3','{3}',$chatmsg);
$chatmsg=str_replace('&gt;:(','{4}',$chatmsg);
$chatmsg=str_replace('&gt;:-(','{4}',$chatmsg);

$chatmsg=str_replace('&gt;:O','{5}',$chatmsg);
$chatmsg=str_replace('&gt;:-o','{5}',$chatmsg);
$chatmsg=str_replace('&gt;:o)','{5}',$chatmsg);
$chatmsg=str_replace('&gt;:o','{5}',$chatmsg);
$chatmsg=str_replace('&gt;:-o','{5}',$chatmsg);
$chatmsg=str_replace('&gt;:O)','{5}',$chatmsg);

$chatmsg=str_replace('3:)','{6}',$chatmsg);
$chatmsg=str_replace('3:-)','{6}',$chatmsg);

$chatmsg=str_replace('O:)','{7}',$chatmsg);
$chatmsg=str_replace('O:-)','{7}',$chatmsg);

$allsmilies=array();
$allsmilies[0]=array(':-)',':)',':]','=)'); //smile
$allsmilies[1]=array(':-(',':(',':[','=('); //frown
$allsmilies[2]=array(':-P',':P',':-p',':p','=P'); //tongue
$allsmilies[3]=array(':-D',':D','=D'); //grin
$allsmilies[4]=array(':-O',':O',':-o',':o'); //gasp
$allsmilies[5]=array(';-)',';)'); //wink
$allsmilies[6]=array('8-)','8)','B-)','B)'); //glasses
$allsmilies[7]=array('8-|','8|','B-|','B|'); //sunglasses
$allsmilies[8]=array('{4}'); // grumpy
$allsmilies[9]=array(':/',':-/',':\\',':-\\'); //unsure
$allsmilies[10]=array(':\'('); //cry
$allsmilies[11]=array('{6}'); //devil
$allsmilies[12]=array('{7}'); //angel
$allsmilies[13]=array(':-*',':*'); //kiss
$allsmilies[14]=array('&lt;3'); //heart
$allsmilies[15]=array('^_^'); //kiki
$allsmilies[16]=array('-_-'); //squint
$allsmilies[17]=array('o.O','O.o'); //confused
$allsmilies[18]=array('{5}'); //upset
$allsmilies[19]=array(':v'); //pacman
$allsmilies[20]=array('{3}'); //curly lips
$allsmilies[21]=array('(y)'); //thumbs up

foreach($allsmilies as $smiley => $array){
	foreach($array as $key => $value){
		$left='';
	if(strpos($chatmsg,$value)!==false){
	if($smiley!='0'){$left.='-';}
	$left.=$smiley*16;
	$newval='<div class="chatimg" style="background-position:'.$left.'px 0pt;"></div>';
	$chatmsg=str_replace($value,$newval,$chatmsg);	
	}
	}
	}
	return $chatmsg;
}
}
?>