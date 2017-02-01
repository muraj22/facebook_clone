<?php
$secho_b='';
$secho_b.='
var tag_left=px; 
var tag_right=px2; 
var tag_top=py;
var tag_bottom=py2;

var detected_left=fx; 
var detected_right=fx2; 
var detected_top=fy;
var detected_bottom=fy2;


var tag_left_a=tag_left-(tag_left/100*8); //agrandado
var tag_right_a=tag_right-(tag_right/100*8);
var tag_top_a=tag_top-(tag_top/100*8);
var tag_bottom_a=tag_bottom-(tag_bottom/100*8);

var detected_left_a=detected_left-(detected_left/100*8);
var detected_right_a=detected_right-(detected_right/100*8);
var detected_top_a=detected_top-(detected_top/100*8);
var detected_bottom_a=detected_bottom-(detected_bottom/100*8);

if(detected_left>=tag_left && detected_right>=tag_right && detected_top>=tag_top && detected_bottom>=tag_bottom){
noface=true;	
} //si la deteccion esta por adentro las etiqueta

if(tag_left>=detected_left && tag_right>=detected_right && tag_top>=detected_top && tag_bottom>=detected_bottom){
noface=true;	
}  //si la etiqueta esta por dentro de la deteccion

if(detected_left>=tag_left_a && detected_right>=tag_right_a && detected_top>=tag_top_a && detected_bottom>=tag_bottom_a){
noface=true;	
} //si esta pegadito

if(tag_left>=detected_left_a && tag_right>=detected_right_a && tag_top>=detected_top_a && tag_bottom>=detected_bottom_a){
noface=true;	
} //si esta pegadito
';
?>