<?php
if(!function_exists("html_crop")){
function html_crop($es1,$mwidth,$mheight,$cpw){
$omwidth=$mwidth;
$omheight=$mheight;

$xvar='style="width:'.$cpw.'px;max-height:'.$cpw.'px;"';

if($omheight<$cpw){
$hfema=$omheight;
}
else{$hfema=$cpw;}
$wfema=$cpw;

$xvar3='';

if($es1!="t"){
if($omwidth>$cpw){
$pmwidth=$mwidth*100/$mheight;
$pmwidth=$cpw/100*$pmwidth;
if($pmwidth>$omwidth){$mwidth=$omwidth;}
else{$mwidth=$pmwidth;} //aca esta el error

$pmheight=$mheight*100/$omwidth;
$pmheight=$cpw/100*$pmheight;
$mheight=ceil($pmheight);	
if($pmheight<$cpw){$mheight=$omheight;}

$pl=$mwidth-$cpw;
$pl=$pl*100/$mwidth;
$pl=round($pl/2,2);



$pl=$mwidth*100/$cpw;
if($pl>=100){
$pl=$pl-100;
$pl=round($pl/2,2);
}
else{
$pl=0;
}

$pt=$mheight/$cpw;
if($pt>2){
$pt=round($pt*10,2);	
}
else{
$pt=0;
}

$pl='left:-'.$pl.'%;';

$mwidth=ceil($mwidth);
$xvar3.=$pl;

if($omheight<$cpw){
if($mheight<$omheight){$oheight=$mheight;}else{$oheight=$omheight;}
$opt=$cpw-$oheight;
if($opt>0){ //only looking at negatives
$opt=0;	
}
$xvar=' style="height:'.$oheight.'px;width:'.$cpw.'px;top:-'.$opt.'px;"';
$hfema=$oheight;
$xvar3.='width:'.$omwidth.'px;height:'.$mheight.'px;';
}

else{
$xvar3.='width:'.$mwidth.'px;height:'.$cpw.'px;';
}

}
if($omwidth<$cpw){
if($omheight>$omwidth){
$pt=$mheight/$cpw;
if($pt>2){
$pt=round($pt*10,2);	
}
else{
$pt=0;
}	
}	
}
if($mwidth<$cpw){
$xvar.=' class="ema emac"';
}
else{
$xvar.=' class="ema"';
}


if($omheight>$omwidth){
if($omwidth>$cpw){
$owidth=$cpw;	
}
else{$owidth=$mwidth;}
$xvar3='width:'.$owidth.'px;height:'.$mheight.'px;';
$xvar3.='top:-'.$pt.'%;';
}

}
else{

if($omheight>$omwidth){
if($omheight>$cpw){
$mheight=$cpw;
$mwidth=floor($mheight*$omwidth/$omheight);		
}
else{	
$mheight=$omheight;
}

if($mwidth>$cpw){$oowidth=$cpw;}
else{$oowidth=$mwidth;}
$xvar3='width:'.$mwidth.'px;height:'.$mheight.'px;';
$xvar='style="max-height:'.$cpw.'px;width:'.$oowidth.'px;" class="ema"';
$wfema=$oowidth;
if($mheight>$cpw){$hfema=$cpw;}
else{$hfema=$mheight;}	
}

else{

if($omwidth>470){
$mwidth=470;
}



$mheight=floor($mwidth*$omheight/$omwidth);	

$pl=$mwidth*100/$cpw;
if($pl>=100){
$pl=$pl-100;
$pl=round($pl/2,2);
}
else{
$pl=0;
}

$xvar3='width:'.$mwidth.'px;height:'.$mheight.'px;left:-'.$pl.'%;';
if($mheight>$cpw){$ooheight=$cpw;}
else{$ooheight=$mheight;}
$xvar='style="max-width:'.$cpw.'px;height:'.$ooheight.'px;" class="ema"';
if($mwidth>$cpw){$wfema=$cpw;}
else{$wfema=$mwidth;}
$hfema=$ooheight;

}

}

if(!isset($opt)){$opt=0;}
$arr[0]=$xvar;
$arr[1]=$xvar3;
$arr[2]=$wfema;
$arr[3]=$hfema;
$arr[4]=$opt;
return $arr;
}

}
?>