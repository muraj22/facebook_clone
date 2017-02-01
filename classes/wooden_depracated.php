<?php
public function custom(){	
	$this->tempfile();
	
	$arr=getimagesize($this->_tmp);
	$dim=$arr[0].'x'.$arr[1];
	$width=$arr[0];
	$height=$arr[1];

	$command='convert '.$this->_tmp.' -colorspace gray -sharpen 0x48 ( -clone 0 -blur 0x2 ) ( -clone 0 -clone 1 +swap -compose minus -composite -auto-level ) ( -clone 0 -clone 2 -compose plus -composite ) -delete 0-2 -quality 100 '.$this->_tmp;
$this->execute($command);

$command='convert '.$this->_tmp.' ( -clone 0 ( -size 20x640 gradient: -rotate 90 -colors 2 -colorspace gray -auto-level -write mpr:dither +delete ) -dither Riemersma -remap mpr:dither ) -define compose:args=0 -compose blend -composite -quality 100 '.$this->_tmp;
$this->execute($command);

$command='convert '.$this->_tmp.' -shade 135x45 '.$this->_tmp;
$this->execute($command);

$command='convert '.$this->_tmp.' -format "%[fx:mean]" info:';
$executeit=exec($command,$mean);
$dv="";
foreach($mean as $k=>$v){
$dv.=$v;	
}
$mean=$dv;


$command='convert xc: -format "%[fx:'.$mean.'*(1-1)]" info:';
$executeit=exec($command,$bb);

$dv="";
foreach($bb as $k=>$v){
$dv.=$v;	
}
$bb=$dv;

$command='convert '.$this->_tmp.' -function polynomial 1,'.$bb.' '.$this->_tmp;

$command='convert ( '.$this->_tmp.' +level-colors black,peachpuff -alpha set -channel A -evaluate set 10% -channel RGBA ) ( dwood_image.jpg -resize '.$width.'x'.$height.'! +repage -modulate 100,125,100 ) +swap -compose over -composite -quality 100 '.$this->_tmp;


$this->execute($command);


$this->output();
		
	}
    
    ?>