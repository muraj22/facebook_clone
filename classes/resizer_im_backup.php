<?php
$addphotosvar='t';
if(!class_exists("resizer")){
class resizer {
 
   var $image;
   var $image_type;
 
function prepare($filename,$filenamev="") {
if($filenamev==""){$filenamev=$filename;}
if($filenamev!=$filename){
copy($filename,$filenamev);
}
$this->image=$filenamev;
}
 
   function getWidth() {
      $arr=getimagesize($this->image);
	  $arr=$arr[0];
	  return $arr;   
   }
   function getHeight() {
      $arr=getimagesize($this->image);
	  $arr=$arr[1];
	  return $arr;   
   }


   function ToHeight($height) {
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
 
   function ToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }

 
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }

 
function resize($width,$height) {
global $png_quality;
if(!isset($png_quality)){
$png_quality=100;
}
$command='convert '.$this->image.' -quality '.$png_quality.' -resize '.$width.'x'.$height.'! '.$this->image;
exec($command);
unset($png_quality);
}   
  


}
}
?>