<?php
$addphotosvar='t';
if(!class_exists("resizer")){
class resizer {

var $image;
var $imagev;
var $image_type;
 
function prepare($filename,$filenamev="") {
if($filenamev==""){$filenamev=$filename;}


		$image_info = getimagesize($filename);
		$this->image_type = $image_info[2];
		if( $this->image_type == IMAGETYPE_JPEG ) {
			$this->imagev = imagepng(imagecreatefromjpeg($filename),$filenamev,5);
		} elseif( $this->image_type == IMAGETYPE_GIF ) {
			$this->imagev = imagepng(imagecreatefromgif($filename),$filenamev,5);
		} elseif( $this->image_type == IMAGETYPE_PNG ) {
			$this->imagev = imagepng(imagecreatefrompng($filename),$filenamev,5);
		} else {
			throw new Exception("The file you're trying to open is not supported");
		}
		
		$this->imagev=imagecreatefrompng($filenamev);
		$this->image=$filenamev;

}
    
	function resize($width,$height) {
		$new_image = imagecreatetruecolor($width, $height);
		
		imagecolortransparent($new_image, imagecolorallocate($new_image, 0, 0, 0));
		imagealphablending($new_image, false);
		imagesavealpha($new_image, true);
		
		imagecopyresampled($new_image, $this->imagev, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
		$this->imagevv = $new_image; 
		imagepng($this->imagevv,$this->image);
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