<?php
$x=1;
while($x<=38){
echo $x.' /var/www/html/fotos/'.$x.".jpg\n";
$x++;
}

$x=1;
while($x<=38){
echo 'images.push_back(imread("/var/www/html/fotos/'.$x.'.jpg", CV_LOAD_IMAGE_GRAYSCALE)); labels.push_back(0);'."\n";
$x++;
}



include("classes/resizer.php");

$x=1;
while($x<=38){
if($x!=18){
$target_path='/var/www/html/fotos/'.$x.'.jpg';
$target_path2=$target_path;
$image = new resizer(); $image->prepare($target_path,$target_path2); $image->resize(290,290);
}
$x++;
}
?>