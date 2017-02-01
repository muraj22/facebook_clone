<?php
if($width>2048){
$image = new resizer(); $image->prepare($target_path,$target_path); $image->ToWidth(2048);
$mod='';
}

$size = getimagesize($target_pathv);
$width=$size[0];
$height=$size[1];


if($height>2048){
$image = new resizer(); $image->prepare($target_path,$target_path); $image->ToHeight(2048);
$mod='';
}

$size = getimagesize($target_pathv);
$width=$size[0];

//hack to convert all jpg and gif to png

if(!isset($mod)){
$image=new resizer();
$image->prepare($target_pathv,$target_path);
$image->ToWidth($width);
}
else{unset($mod);}

//exec("convert $target_pathv $target_path2"); por ahora aca solo falta la quality..

$height=$size[1];
$widthv=$size[0];
$heightv=$size[1];


if(isset($new_filter) && !isset($uploader_holdit)){
    include("classes/instagraph.php");
if($new_filter==$filter && $base_frame==$frame && $base_tilt_shift==2 && $tilt_shift==1){
		$instagraph=Instagraph::factory($target_path, $target_path);
		$instagraph->tilt_shift();
}
else{
if($new_filter!="normal"){
$instagraph=Instagraph::factory($target_path, $target_path);
$instagraph->$new_filter();
}
	   if($tilt_shift==1){
		$instagraph=Instagraph::factory($target_path, $target_path);
		$instagraph->tilt_shift();
	   }
}

}

if(isset($brightness) && isset($contrast) && !isset($uploader_holdit)){
    if(is_numeric($brightness) AND $brightness>0 AND $brightness<=50){
        $instagraph=Instagraph::factory($target_path, $target_path);
        $instagraph->brightness();
    }
    else if(is_numeric($contrast) AND $contrast>0 AND $contrast<=50){
        $instagraph=Instagraph::factory($target_path, $target_path);
        $instagraph->contrast();
    }
}


if($width>290){
$target_path2=$target_path1.$actual_pic4;
$image = new resizer(); $image->prepare($target_path,$target_path2); $image->ToWidth(290); 
}
else{
$target_path2=$target_path1.$actual_pic4;
$image = new resizer(); $image->prepare($target_path,$target_path2);	
}

$size = getimagesize($target_pathvv);
$width=$size[0];
$height=$size[1];

if($height>290){
$target_path2=$target_path1.$actual_pic4;
$image = new resizer(); $image->prepare($target_path,$target_path2); $image->ToHeight(290);
}

$size = getimagesize($target_pathvv);
$width=$size[0];
$height=$size[1];

if($width>290){
$target_path2=$target_path1.$actual_pic4;
$image = new resizer(); $image->prepare($target_path,$target_path2); $image->resize(290,290);
}

$size = getimagesize($target_pathvv);
$width=$size[0];
$height=$size[1];

$output_width=$width;
$output_height=$height;

$output_widthv=$widthv;
$output_heightv=$heightv;

?>