<?php 
if (!in_array('ob_gzhandler', ob_list_handlers())) {
    //it's being done
}    
/*
$range_eyel_width=1;
$range_eyel_height=0.33;
$range_eyel_x=0.42;
$range_eyel_y=0.125;

$range_eyer_width=.4;
$range_eyer_height=0.25;
$range_eyer_x=0.1;
$range_eyer_y=0.225;

$range_eyes_distance=0.16;

$range_mouth_width=.3225;
$range_mouth_height=0.625;
$range_mouth_x=0.27;
$range_mouth_y=0.2775;


$rangelower_eyel_width=3;
$rangelower_eyel_height=0.99;
$rangelower_eyel_x=0.126;
$rangelower_eyel_y=0.375;

$rangelower_eyer_width=1.2;
$rangelower_eyer_height=0.75;
$rangelower_eyer_x=0.3;
$rangelower_eyer_y=0.675;

$rangelower_eyes_distance=0.48;

$rangelower_mouth_width=.9675;
$rangelower_mouth_height=1.875;
$rangelower_mouth_x=0.81;
$rangelower_mouth_y=0.8325;
*/


$range_eyel_width=2.5;
$range_eyel_height=1.4;
$range_eyel_x=1.6;
$range_eyel_y=.3;

$range_eyer_width=1.9;
$range_eyer_height=1.2;
$range_eyer_x=.2;
$range_eyer_y=.9;

$range_eyes_distance=.9;

$range_mouth_width=1.4;
$range_mouth_height=.9;
$range_mouth_x=1.4;
$range_mouth_y=.8;



$rangelower_eyel_width=2.5;
$rangelower_eyel_height=1.4;
$rangelower_eyel_x=1.6;
$rangelower_eyel_y=.3;

$rangelower_eyer_width=1.9;
$rangelower_eyer_height=1.2;
$rangelower_eyer_x=.2;
$rangelower_eyer_y=.9;

$rangelower_eyes_distance=.9;

$rangelower_mouth_width=1.4;
$rangelower_mouth_height=.9;
$rangelower_mouth_x=1.4;
$rangelower_mouth_y=.8;







$range_eyel_width=$range_eyel_width+6;//+$range_eyel_width;
$range_eyel_height=$range_eyel_height+6;//+$range_eyel_height;
$range_eyel_x=$range_eyel_x+6;//+$range_eyel_x;
$range_eyel_y=$range_eyel_y+6;//+$range_eyel_y;

$range_eyer_width=$range_eyer_width+6;//+$range_eyer_width;
$range_eyer_height=$range_eyer_height+6;//+$range_eyer_height;
$range_eyer_x=$range_eyer_x+6;//+$range_eyer_x;
$range_eyer_y=$range_eyer_y+6;//+$range_eyer_y;

$range_eyes_distance=$range_eyes_distance+6;//+$range_eyes_distance;

$range_mouth_width=$range_mouth_width+6;//+$range_mouth_width;
$range_mouth_height=$range_mouth_height+6;//+$range_mouth_height;
$range_mouth_x=$range_mouth_x+6;//+$range_mouth_x;
$range_mouth_y=$range_mouth_y+6;//+$range_mouth_y;



$rangelower_eyel_width=$rangelower_eyel_width+6;//+$rangelower_eyel_width;
$rangelower_eyel_height=$rangelower_eyel_height+6;//+$rangelower_eyel_height;
$rangelower_eyel_x=$rangelower_eyel_x+6;//+$rangelower_eyel_x;
$rangelower_eyel_y=$rangelower_eyel_y+6;//+$rangelower_eyel_y;

$rangelower_eyer_width=$rangelower_eyer_width+6;//+$rangelower_eyer_width;
$rangelower_eyer_height=$rangelower_eyer_height+6;//+$rangelower_eyer_height;
$rangelower_eyer_x=$rangelower_eyer_x+6;//+$rangelower_eyer_x;
$rangelower_eyer_y=$rangelower_eyer_y+6;//+$rangelower_eyer_y;

$rangelower_eyes_distance=$rangelower_eyes_distance+6;//+$rangelower_eyes_distance;

$rangelower_mouth_width=$rangelower_mouth_width+6;//+$rangelower_mouth_width;
$rangelower_mouth_height=$rangelower_mouth_height+6;//+$rangelower_mouth_height;
$rangelower_mouth_x=$rangelower_mouth_x+6;//+$rangelower_mouth_x;
$rangelower_mouth_y=$rangelower_mouth_y+6;//+$rangelower_mouth_y;





$range=.8;
$rangelower=.8;

$match='';


//jolie
/*
$dataset_eyel_width=26.254127872643;
$dataset_eyel_height=17.520819177484;
$dataset_eyel_x=14.956779802579;
$dataset_eyel_y=28.118971229956;

$dataset_eyer_width=26.00724434287;
$dataset_eyer_height=17.338313826113;
$dataset_eyer_x=57.699256728421;
$dataset_eyer_y=11.442705383101;

$dataset_eyes_distance=16.4883490532;

$dataset_mouth_width=32.651897166124;
$dataset_mouth_height=19.655809859595;
$dataset_mouth_x=31.858267690394;
$dataset_mouth_y=74.19990807826;
*/


$dataset_eyel_width=29.47788223118;
$dataset_eyel_height=19.75371069734;
$dataset_eyel_x=20.910267999216;
$dataset_eyel_y=29.991175422572;

$dataset_eyer_width=30.094875711377;
$dataset_eyer_height=20.106674346983;
$dataset_eyer_x=59.379396437012;
$dataset_eyer_y=33.720595356333;

$dataset_eyes_distance=8.9912462066163;

$dataset_mouth_width=41.130678860915;
$dataset_mouth_height=24.64750841373;
$dataset_mouth_x=38.070662473625;
$dataset_mouth_y=74.685145268786;


$ldataset_eyel_width=$dataset_eyel_width-$rangelower_eyel_width;
$rdataset_eyel_width=$dataset_eyel_width+$range_eyel_width;
$ldataset_eyel_height=$dataset_eyel_height-$rangelower_eyel_height;
$rdataset_eyel_height=$dataset_eyel_height+$range_eyel_height;
$ldataset_eyel_x=$dataset_eyel_x-$rangelower_eyel_x;
$rdataset_eyel_x=$dataset_eyel_x+$range_eyel_x;
$ldataset_eyel_y=$dataset_eyel_y-$rangelower_eyel_y;
$rdataset_eyel_y=$dataset_eyel_y+$range_eyel_y;

$ldataset_eyer_width=$dataset_eyer_width-$rangelower_eyer_width;
$rdataset_eyer_width=$dataset_eyer_width+$range_eyer_width;
$ldataset_eyer_height=$dataset_eyer_height-$rangelower_eyer_height;
$rdataset_eyer_height=$dataset_eyer_height+$range_eyer_height;
$ldataset_eyer_x=$dataset_eyer_x-$rangelower_eyer_x;
$rdataset_eyer_x=$dataset_eyer_x+$range_eyer_x;
$ldataset_eyer_y=$dataset_eyer_y-$rangelower_eyer_y;
$rdataset_eyer_y=$dataset_eyer_y+$range_eyer_y;


$ldataset_eyes_distance=$dataset_eyes_distance-$rangelower_eyes_distance;
$rdataset_eyes_distance=$dataset_eyes_distance+$range_eyes_distance;


$ldataset_mouth_width=$dataset_mouth_width-$rangelower_mouth_width;
$rdataset_mouth_width=$dataset_mouth_width+$range_mouth_width;
$ldataset_mouth_height=$dataset_mouth_height-$rangelower_mouth_height;
$rdataset_mouth_height=$dataset_mouth_height+$range_mouth_height;
$ldataset_mouth_x=$dataset_mouth_x-$rangelower_mouth_x;
$rdataset_mouth_x=$dataset_mouth_x+$range_mouth_x;
$ldataset_mouth_y=$dataset_mouth_y-$rangelower_mouth_y;
$rdataset_mouth_y=$dataset_mouth_y+$range_mouth_y;

$dcountereyel_width=0;
$dcountereyel_height=0;
$dcountereyel_x=0;
$dcountereyel_y=0;

$dcountereyer_width=0;
$dcountereyer_height=0;
$dcountereyer_x=0;
$dcountereyer_y=0;

$dcountereyes_distance=0;

$dcountermouth_width=0;
$dcountermouth_height=0;
$dcountermouth_x=0;
$dcountermouth_y=0;

$dcounterwidth_de_height=0;

$teyel_width=0;
$teyel_height=0;
$teyel_x=0;
$teyel_y=0;

$teyer_width=0;
$teyer_height=0;
$teyer_x=0;
$teyer_y=0;

$teyes_distance=0;

$tmouth_width=0;
$tmouth_height=0;
$tmouth_x=0;
$tmouth_y=0;

$twidth_de_height=0;


$bx=1;
while($bx<=1){

$match.='<br>'.$bx.'.jpg match result:<br>';	

$ceyel_width=0;
$ceyel_height=0;
$ceyel_x=0;
$ceyel_y=0;

$ceyer_width=0;
$ceyer_height=0;
$ceyer_x=0;
$ceyer_y=0;

$ceyes_distance=0;

$cmouth_width=0;
$cmouth_height=0;
$cmouth_x=0;
$cmouth_y=0;

	echo $bx.'.jpg:<br><br>';
	
//$file=C:\\xampp13\\htdocs\\opencv\\pitt\\a\\'.$bx.'.jpg';

$file=C:\\xampp13\\htdocs\\opencv\\test2.jpg';

$d=shell_exec("F:\jr\gasda.exe $file");

echo $d;

$facep_width=array();

$face_width=array();
$face_height=array();
$face_x=array();
$face_y=array();

$expd=explode("='';",$d);

foreach($expd as $k=>$v){
	if($v!=''){
	

if(strpos($v,"face->")!==false){
$vv=explode("face->:",$v);
$facek='face';
}
else{
$vv=explode("facep->:",$v);	
$facek='facep';
}


$vvv=explode(",",$vv[1]);

${$facek.'_width'}[$k]=$vvv[0];
${$facek.'_height'}[$k]=$vvv[1];
${$facek.'_x'}[$k]=$vvv[2];
${$facek.'_y'}[$k]=$vvv[3];

	}
}

$totalsum=0;
$totalsump=0;
foreach($expd as $k=>$v){
	if($v!=''){
		if(isset($face_width[$k])){
$totalsum=$totalsum+$face_width[$k];
		}
else{
$totalsump=$totalsump+$facep_width[$k];	
	}

		}
	}

$x=count($face_width);
if($x>0){
$approximate_face_width_acceptable=$totalsum/$x;
$approximate_face_width_acceptable=$approximate_face_width_acceptable/2;
}

$x=count($facep_width);
if($x>0){
$approximate_face_width_acceptablep=$totalsump/$x;
$approximate_face_width_acceptablep=$approximate_face_width_acceptablep/2;
}

foreach($face_width as $k=>$v){
if($v<$approximate_face_width_acceptable){
unset($face_width[$k]);
}
}

foreach($facep_width as $k=>$v){
if($v<$approximate_face_width_acceptablep){
unset($facep_width[$k]);
}
}




$parameters=array();

$parameters[1]="eyel_width";
$parameters[2]="eyel_height";

$parameters[5]="eyer_width";
$parameters[6]="eyer_height";


$parameters[9]="eyes_distnace";

$parameters[10]="mouth_width";
$parameters[11]="mouth_height";

$parametersv=$parameters;

$parametersv[12]="eyel_x";
$parametersv[13]="eyel_y";

$parametersv[14]="eyer_x";
$parametersv[15]="eyer_y";

$parametersv[16]="mouth_x";
$parametersv[17]="mouth_y";

$parametersv[18]="width_de_height";

foreach($parametersv as $k=>$v){
if(isset(${$v})){unset(${$v});}	
}

$dd=1;

foreach($face_width as $k=>$v){

$workingw=$expd[$k];

$expw=explode(":",$workingw);



foreach($expw as $k2=>$v2){
if($v2!=''){

if(strpos($v2,"->")!==false){

$nexttime=str_replace("->","",$v2);	
$nexttimex=$k2;
}

if(isset($nexttime) && $k2!=$nexttimex){



$expc=explode(",",$v2);



${$nexttime.'_width'}[$k][$dd]=$expc[0];
${$nexttime.'_height'}[$k][$dd]=$expc[1];
${$nexttime.'_x'}[$k][$dd]=$expc[2];
${$nexttime.'_y'}[$k][$dd]=$expc[3];

$dd++;
unset($nexttime);	
}

	
}

}

}






foreach($face_width as $k=>$v){

foreach($parameters as $sk=>$sv){

if(isset(${$sv}[$k])){	
foreach(${$sv}[$k] as $k2=>$v2){

if(!isset(${'sum_'.$sv}[$k])){
${'sum_'.$sv}[$k]=0;
}
if(!isset(${'sum_'.$sv.'_count'}[$k])){
${'sum_'.$sv.'_count'}[$k]=0;
}



${'sum_'.$sv}[$k]=$v2+${'sum_'.$sv}[$k];
${'sum_'.$sv.'_count'}[$k]++;
}
}

}

}





foreach($face_width as $k=>$v){
foreach($parameters as $sk=>$sv){
	if(isset(${$sv}[$k])){
	asort(${$sv}[$k]);
	}
}
}






foreach($face_width as $k=>$v){
echo $face_y[$k].':<br>';

if(isset($eyel_width[$k])){
	
	foreach($eyel_width[$k] as $ok=>$ov){
	$lo=$ok; 
	}
	
	$dcountereyel_y++;
	$dcountereyel_x++;
	$dcountereyel_width++;
	$dcountereyel_height++;
	
	$rvv=$face_height[$k]/5.5;
	echo $eyel_y[$k][$lo];
	$eyel_y[$k][$lo]=$rvv+$eyel_y[$k][$lo];


$r=$eyel_width[$k][$lo]*100/$face_width[$k];
$ceyel_width=$r;
echo 'eyel_width:'.$r.'%<br>';	
$per=$r;

if($ceyel_width>=$ldataset_eyel_width && $ceyel_width<=$rdataset_eyel_width){
$match.='eye left width match:'.$bx.'.jpg<br>';	
}


$r=$eyel_height[$k][$lo]*100/$face_height[$k];
$ceyel_height=$r;
echo 'eyel_height:'.$r.'%<br>';	

if($ceyel_height>=$ldataset_eyel_height && $ceyel_height<=$rdataset_eyel_height){
$match.='eye left height match:'.$bx.'.jpg<br>';	
}

	
$r=$eyel_x[$k][$lo]*100/$face_width[$k];
$pper=$r;
$ceyel_x=$r;
echo 'eyel_x:'.$r.'%<br>';

if($ceyel_x>=$ldataset_eyel_x && $ceyel_x<=$rdataset_eyel_x){
$match.='eye left x match:'.$bx.'.jpg<br>';	
}


$r=$eyel_y[$k][$lo]*100/$face_height[$k];
$ceyel_y=$r;



if($ceyel_y>=$ldataset_eyel_y && $ceyel_y<=$rdataset_eyel_y){
$match.='eye left y match:'.$bx.'.jpg<br>';	
}

echo 'eyel_y:'.$r.'%<br>';	

echo'<br>';
}

if(isset($eyer_width[$k])){
	
	foreach($eyer_width[$k] as $ok=>$ov){
	$lo=$ok;
	}
	
	$dcountereyer_y++;
	$dcountereyer_x++;
	$dcountereyer_width++;
	$dcountereyer_height++;
	
	$rvv=$face_width[$k]/2;
	$eyer_x[$k][$lo]=$rvv+$eyer_x[$k][$lo];


$r=$eyer_width[$k][$lo]*100/$face_width[$k];
$ceyer_width=$r;
echo 'eyer_width:'.$r.'%<br>';	

if($ceyer_width>=$ldataset_eyer_width && $ceyer_width<=$rdataset_eyer_width){
$match.='eye right width match:'.$bx.'.jpg<br>';	
}

$r=$eyer_height[$k][$lo]*100/$face_height[$k];
$ceyer_height=$r;
echo 'eyer_height:'.$r.'%<br>';	


if($ceyer_height>=$ldataset_eyer_height && $ceyer_height<=$rdataset_eyer_height){
$match.='eye right height match:'.$bx.'.jpg<br>';	
}
	
$r=$eyer_x[$k][$lo]*100/$face_width[$k];
$ceyer_x=$r;
$perv=$r;
echo 'eyer_x:'.$r.'%<br>';


if($ceyer_x>=$ldataset_eyer_x && $ceyer_x<=$rdataset_eyer_x){
$match.='eye right x match:'.$bx.'.jpg<br>';	
}
	

	$rvv=$face_height[$k]/5.5;
	$eyer_y[$k][$lo]=$rvv+$eyer_y[$k][$lo];
	
$r=$eyer_y[$k][$lo]*100/$face_height[$k];
$ceyer_y=$r;
echo 'eyer_y:'.$r.'%<br>';	



if($ceyer_y>=$ldataset_eyer_y && $ceyer_y<=$rdataset_eyer_y){
$match.='eye right y match:'.$bx.'.jpg<br>';	
}

echo'<br>';

if(isset($eyel_y[$k])){

$distance=$pper+$per;

$distance=$perv-$distance;

	$dcountereyes_distance++;
	
echo 'eyes_distance:'.$distance.'%';
$r=$distance;
$ceyes_distance=$r;


if($ceyes_distance>=$ldataset_eyes_distance && $ceyes_distance<=$rdataset_eyes_distance){
$match.='eyes distance match:'.$bx.'.jpg<br>';	
}

echo'<br>';	
echo'<br>';	
}


}

echo 'facewidth:'.$face_width[$k];
echo '<br>'.$face_height[$k];
$faceper=$face_width[$k]*100/$face_height[$k];
$width_de_height[$k]=$faceper;
$cwidth_de_height=$faceper;
$r=$cwidth_de_height;

echo 'width_de_height:'.$r.'%<br>';	


$dcounterwidth_de_height++;

if(isset($mouth_y[$k])){



	foreach($mouth_width[$k] as $ok=>$ov){
	$lo=$ok;	
	}
	
	$dcountermouth_y++;
	$dcountermouth_x++;
	$dcountermouth_width++;
	$dcountermouth_height++;
	
	
	$rvv=$face_height[$k]*2/3;

	$mouth_y[$k][$lo]=$rvv+$mouth_y[$k][$lo];


$r=$mouth_width[$k][$lo]*100/$face_width[$k];
$cmouth_width=$r;
echo 'mouth_width:'.$r.'%<br>';	



if($cmouth_width>=$ldataset_mouth_width && $cmouth_width<=$rdataset_mouth_width){
$match.='mouth width match:'.$bx.'.jpg<br>';	
}

$r=$mouth_height[$k][$lo]*100/$face_height[$k];
$cmouth_height=$r;
echo 'mouth_height:'.$r.'%<br>';	



if($cmouth_height>=$ldataset_mouth_height && $cmouth_height<=$rdataset_mouth_height){
$match.='mouth height match:'.$bx.'.jpg<br>';	
}
	
$r=$mouth_x[$k][$lo]*100/$face_width[$k];
$cmouth_x=$r;
echo 'mouth_x:'.$r.'%<br>';



if($cmouth_x>=$ldataset_mouth_x && $cmouth_x<=$rdataset_mouth_x){
$match.='mouth x match:'.$bx.'.jpg<br>';	
}

$r=$mouth_y[$k][$lo]*100/$face_height[$k];
$cmouth_y=$r;
echo 'mouth_y:'.$r.'%<br>';	

if($cmouth_y>=$ldataset_mouth_y && $cmouth_y<=$rdataset_mouth_y){
$match.='mouth y match:'.$bx.'.jpg<br>';	
}


echo'<br>';
}


if(isset($nose_width[$k])){
//echo $nose_width[$k];	
}
}

$teyel_width=$ceyel_width+$teyel_width;
$teyel_height=$ceyel_height+$teyel_height;
$teyel_x=$ceyel_x+$teyel_x;
$teyel_y=$ceyel_y+$teyel_y;

$teyer_width=$ceyer_width+$teyer_width;
$teyer_height=$ceyer_height+$teyer_height;
$teyer_x=$ceyer_x+$teyer_x;
$teyer_y=$ceyer_y+$teyer_y;

$teyes_distance=$ceyes_distance+$teyes_distance;

$tmouth_width=$cmouth_width+$tmouth_width;
$tmouth_height=$cmouth_height+$tmouth_height;
$tmouth_x=$cmouth_x+$tmouth_x;
$tmouth_y=$cmouth_y+$tmouth_y;

$twidth_de_height=$cwidth_de_height+$twidth_de_height;

echo'<br>';
$bx++;
}

$teyel_width=$teyel_width/$dcountereyel_width;
$teyel_height=$teyel_height/$dcountereyel_height;
$teyel_x=$teyel_x/$dcountereyel_x;
$teyel_y=$teyel_y/$dcountereyel_y;

$teyer_width=$teyer_width/$dcountereyer_width;
$teyer_height=$teyer_height/$dcountereyer_height;
$teyer_x=$teyer_x/$dcountereyer_x;
$teyer_y=$teyer_y/$dcountereyer_y;

$teyes_distance=$teyes_distance/$dcountereyes_distance;

$tmouth_width=$tmouth_width/$dcountermouth_width;
$tmouth_height=$tmouth_height/$dcountermouth_height;
$tmouth_x=$tmouth_x/$dcountermouth_x;
$tmouth_y=$tmouth_y/$dcountermouth_y;

$twidth_de_height=$twidth_de_height/$dcounterwidth_de_height;

echo'average:<br><br>';

echo 'eyel_width:'.$teyel_width.'%<br>';
echo 'eyel_height:'.$teyel_height.'%<br>';
echo 'eyel_x:'.$teyel_x.'%<br>';
echo 'eyel_y:'.$teyel_y.'%<br><br>';

echo 'eyer_width:'.$teyer_width.'%<br>';
echo 'eyer_height:'.$teyer_height.'%<br>';
echo 'eyer_x:'.$teyer_x.'%<br>';
echo 'eyer_y:'.$teyer_y.'%<br><br>';

echo 'eyes_distance:'.$teyes_distance.'%<br><br>';

echo 'mouth_width:'.$tmouth_width.'%<br>';
echo 'mouth_height:'.$tmouth_height.'%<br>';
echo 'mouth_x:'.$tmouth_x.'%<br>';
echo 'mouth_y:'.$tmouth_y.'%<br>';

echo 'width_de_height:'.$twidth_de_height.'%<br>';


echo $match;

?>