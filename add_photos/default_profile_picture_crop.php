<?php
if($height>$width){
   $image = new resizer(); $image->prepare($copiedvv,$copiedvv); $image->ToHeight(77.875); 
copy($img4,$thumbnailv);
   $photo2 = new Photo(array("name"=>"$thumbnailv","tmp_name"=>"$thumbnailv"));  

$top=3.7;
$aheight=100;
$awidth=100;

$size=getimagesize($img4);
$width=$size[0];
$height=$size[1];

$per=77.875/100*27.875;
$widthv=$width/100*$per;
$widthv=$widthv/2.7;

$left=$widthv;

$awl=$awidth+$left;
if($width<$awl){
$diff=$awl-$width;

$diffv=$diff+$width;

copy($img3,$img4);
$image = new resizer(); $image->prepare($copiedvv,$copiedvv); $image->ToWidth($diffv);	
copy($img4,$thumbnailv);
   $photo2 = new Photo(array("name"=>"$thumbnailv","tmp_name"=>"$thumbnailv"));  
 

$aheight=100;
$awidth=100;

$size=getimagesize($img4);
$width=$size[0];
$height=$size[1];

$per=$aheight*100/$height;
$top=100-$per;
$top=$top/2;

$top=$top/100*$top;

$per=$awidth*100/$width;
$left=100-$per;
$left=$left/2;

$left=$width/100*$left;



}

$photo2->doFullCrop($left,$top,$awidth,$aheight);
$height=$aheight;
$width=$awidth;


$thumbnail=$thumbnail;

include("make50pixelsthumbnail.php");

}
else{
   $image = new resizer(); $image->prepare($copiedvv,$copiedvv); $image->ToWidth(77.875); 	
copy($img4,$thumbnailv);
   $photo2 = new Photo(array("name"=>"$thumbnailv","tmp_name"=>"$thumbnailv"));  

$left=13.937;
$aheight=100;
$awidth=100;

$size=getimagesize($img4);
$width=$size[0];
$height=$size[1];

$per=77.875/100*27.875;
$heightv=$height/100*$per;
$heightv=$heightv/3;

$top=$heightv;

$aht=$aheight+$top;
if($height<$aht){
$diff=$aht-$height;

$diffv=$diff+$height;

copy($img3,$img4);
$image = new resizer(); $image->prepare($copiedvv,$copiedvv); $image->ToHeight($diffv); 	
copy($img4,$thumbnailv);
   $photo2 = new Photo(array("name"=>"$thumbnailv","tmp_name"=>"$thumbnailv"));  
 

$aheight=100;
$awidth=100;

$size=getimagesize($img4);
$width=$size[0];
$height=$size[1];

$per=$awidth*100/$width;
$left=100-$per;
$left=$left/2;

$left=$width/100*$left;

$per=$aheight*100/$height;
$top=100-$per;
$top=$top/2;

$top=$height/100*$top;


}

}

$photo2->doFullCrop($left,$top,$awidth,$aheight);
?>