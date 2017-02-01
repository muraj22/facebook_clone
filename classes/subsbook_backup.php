	public function wooden(){
	
	$this->tempfile();
	
	$arr=getimagesize($this->_tmp);
	$dim=$arr[0].'x'.$arr[1];

	$this->tempfile("v");
	$this->tempfile("vv");
	$this->tempfile("vvv");

$command='convert -quiet -regard-warnings '.$this->_tmpvvv.' +repage '.$this->_tmpv;
$this->execute($command);

$command='convert -quiet -regard-warnings F:\xampp10\htdocs\classes\woodcut_crop_center.jpg +repage '.$this->_tmpvv;
$this->execute($command);

	
	$command='convert '.$this->_tmpv.' -sharpen 0x12 ( -clone 0 -blur 0x3 ) ( -clone 0 -clone 1 +swap -compose minus -composite -auto-level ) ( -clone 0 -clone 2 -compose plus -composite ) -delete 0-2 '.$this->_tmpv;
$this->execute($command);

$command='convert '.$this->_tmpv.' ( -clone 0 ( -size 20x640 gradient: -rotate 90 -colors 2 -auto-level -write mpr:dither +delete ) -dither Riemersma -remap mpr:dither ) -define compose:args=50 -compose blend -composite '.$this->_tmpv;
$this->execute($command);

$command='convert ( '.$this->_tmpv.' +level-colors #3b5998,#fcfcfc -alpha set -channel A -evaluate set 60% -channel RGBA ) ( '.$this->_tmpvv.' -gravity center -crop '.$dim.'+0+0 +repage -modulate 221,61,60 ) +swap -compose over -composite '.$this->_tmp;
$this->execute($command);


$this->output();
		
	}