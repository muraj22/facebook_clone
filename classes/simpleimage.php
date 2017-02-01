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

imagepng(imagecreatefromstring($filename), $filenamev);

$this->image = imagecreatefrompng($filenamev);
}
    
	function resize($width,$height) {
		$new_image = imagecreatetruecolor($width, $height);
		
		imagecolortransparent($new_image, imagecolorallocate($new_image, 0, 0, 0));
		imagealphablending($new_image, false);
		imagesavealpha($new_image, true);
		var_dump($this->image);
		imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
		$this->image = $new_image;   
		imagepng($this->image,$filename);
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

}
}
?>