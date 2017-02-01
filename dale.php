<?php

$filters_create[0]="normal";
$filters_create_text[0]="Normal";
$filters_create[1]="lomo";
$filters_create_text[1]="Lo-fi";
$filters_create[2]="toaster";
$filters_create_text[2]="Toaster";
$filters_create[3]="nashville";
$filters_create_text[3]="Nashville";
$filters_create[4]="kelvin";
$filters_create_text[4]="Kelvin";
$filters_create[5]="gotham";
$filters_create_text[5]="Gotham";
$filters_create[6]="sketch";
$filters_create_text[6]="Sketch";
$filters_create[7]="cartoon";
$filters_create_text[7]="Cartoon";
$filters_create[8]="lensflare";
$filters_create_text[8]="Lens-flare";
$filters_create[9]="boost";
$filters_create_text[9]="Boost";
$filters_create[10]="enrich";
$filters_create_text[10]="Enrich";
$filters_create[11]="church";
$filters_create_text[11]="Church";
$filters_create[12]="toycamera";
$filters_create_text[12]="Toy Camera";
$filters_create[13]="vintage";
$filters_create_text[13]="Vintage";
$filters_create[14]="flashy";
$filters_create_text[14]="Flashy";
$filters_create[15]="custom";
$filters_create_text[15]="Custom";
$filters_create[16]="black_white_sketch";
$filters_create_text[16]="Black & White Sketch";
$filters_create[17]="twenty_one";
$filters_create_text[17]="Twenty-one";
$filters_create[18]="four";
$filters_create_text[18]="Four";
$filters_create[19]="beatles_four";
$filters_create_text[19]="Beatles Four";
$filters_create[20]="hulk";
$filters_create_text[20]="Hulk";
$filters_create[21]="beast";
$filters_create_text[21]="Beast";
$filters_create[22]="spiderman";
$filters_create_text[22]="Spidey";
$filters_create[23]="polaroid";
$filters_create_text[23]="Polaroid";
$filters_create[24]="cartoon_two";
$filters_create_text[24]="Cartoon 2";
$filters_create[25]="eight_bits";
$filters_create_text[25]="8 Bits";
$filters_create[26]="mirrors";
$filters_create_text[26]="Mirrors";
$filters_create[27]="nineties";
$filters_create_text[27]="1950";
$filters_create[28]="white_frame";
$filters_create_text[28]="White frame";
$filters_create[29]="drawing";
$filters_create_text[29]="Drawing";


foreach($filters_create as $k=>$v){

$img="C:/xampp/htdocs/upfrev/images/filter_".$v.".png";
$command='convert '.$img.' -resize 60x45! '.$img;
exec($command);

}
?>