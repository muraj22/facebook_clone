<?php include("start.php"); ?>
<?php
$fcount=$_POST['fcount']; //ancho
$fcount2=$_POST['fcount2']; //alto
$photoid=$_POST['photoid'];
$selected_album=$_POST['selected_album'];
$actual_pic=$_POST['actual_pic'];
$actual_pic4=$_POST['actual_pic4'];

$psize=getimagesize("users/".$uid."/pics/".$actual_pic);

$pwidth=$psize[0];
$pheight=$psize[1];

$hwidth=$pwidth/2;

$hheight=$pheight/2;

$r=0;
$l=0;

$t=0;
$b=0;


if($fcount!=""){

$fcountv=explode(",",$fcount);

foreach($fcountv as $k=>$v){
	if($v!=""){
$x=$v;	

echo $x.':';
if($x>=$hwidth){
$r++;	
}
else{
$l++;	
}


}
}	
}

if($fcount2!=""){

$fcountv=explode(",",$fcount2);

foreach($fcountv as $k=>$v){
	if($v!=""){
$x=$v;	

if($x>=$hheight){
$b++;	
}
else{
$t++;	
}


}
}	
}

include("classes/photo.php");
include("classes/resizer.php");

$re=mysql_query("SELECT * FROM $selected_album WHERE photoid='$photoid'");
while($m=mysql_fetch_array($re)){
$actual_pic7=$m['picsa'];	
}

$size=getimagesize("users/".$uid."/pics/".$actual_pic);

$width=$size[0];
$height=$size[1];

$target_path1 = "users/$uid/pics/";
$target_path = $target_path1.$actual_pic; 

   $copied2=$target_path1.$actual_pic7;
copy($target_path,$copied2);	

if($height>$width){

	
   $cropme = new Photo(array("name"=>"$copied2","tmp_name"=>"$copied2")); 
   
   $awidth=$width;
   $aheight=floor($height/100*75);
   $left=0;
   
   
   if($t>=$b){
   $top=0;	   
	   }
   else{
	$top=floor($height/100*25);   
   }
   
   
   $cropme->doFullCrop($left,$top,$awidth,$aheight);
   
   $image = new resizer(); $image->prepare($copied2,$copied2); $image->resize(196,196);
   
}

else{

   $cropme = new Photo(array("name"=>"$copied2","tmp_name"=>"$copied2"));  

   $awidth=floor($width/100*84);
   $aheight=floor($height/100*84);
  
   if($r>=$l){
   $left=floor($width/100*16);
   }
   else{
   $left=0;   
   }
   
   if($t>=$b){
   $top=0;
   }
   else{
   $top=floor($height/100*16);  
   }

   $cropme->doFullCrop($left,$top,$awidth,$aheight);
   
   $image = new resizer(); $image->prepare($copied2,$copied2); $image->resize(196,196);
   
}

echo 'top:'.$t.'left:'.$l.'bottom:'.$b.'right:'.$r;

?>
<?php include("end.php"); ?>