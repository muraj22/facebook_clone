<?php
/**
 * Instagram filters with PHP and ImageMagick
 *
 * @package    Instagraph
 * @url        http://instagraph.me (hosted by http://leftor.com)
 * @author     Webarto <dejan.marjanovic@gmail.com>
 * @copyright  NetTuts+
 * @license    http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC
 */
if(!class_exists("Instagraph")){
class Instagraph
{
    
    public $_image = NULL;
    public $_output = NULL;
    public $_prefix = 'IMG';
    private $_width = NULL;
    private $_height = NULL;
    private $_tmp = NULL;
        
    public static function factory($image, $output)
    {
        return new Instagraph($image, $output);
    }
    
    # class constructor
    
    public function __construct($image, $output)
    {
        if(file_exists($image))
        {
            $this->_image = $image;
            list($this->_width, $this->_height) = getimagesize($image);
            $this->_output = $output;
        }
        else
        {
            throw new Exception('File not found. Aborting.');
        }
    }

    public function tempfile($v="",$dummy="")
    {
        # copy original file and assign temporary name
        $what="_tmp".$v;
		$this->$what = $this->_prefix.rand();
		if($dummy==""){
        copy($this->_image, $this->$what);
		}
	else{
	copy("C:/xampp/htdocs/upfrev/images/transparent.png",$this->$what);	
	}
	}
	
    public function output()
    {
        # rename working temporary file to output filename
        rename($this->_tmp, $this->_output);
    }
	
    public function execute($command)
    {
        # remove newlines and convert single quotes to double to prevent errors
        $command = str_replace(array("\n", "'"), array('', '"'), $command);
        # replace multiple spaces with one
        $command = preg_replace('#(\s){2,}#is', ' ', $command);
        # escape shell metacharacters
  //      $command = escapeshellcmd($command);
        # execute convert program
		

		
        exec($command);
    }
    
    /** ACTIONS */
    
    public function colortone($input, $color, $level, $type = 0)
    {
        $args[0] = $level;
        $args[1] = 100 - $level;
        $negate = $type == 0? '-negate': '';

        $this->execute("convert 
        {$input} 
        ( -clone 0 -fill $color -colorize 100% ) 
        ( -clone 0 -colorspace gray $negate ) 
        -compose blend -define compose:args=$args[0],$args[1] -composite 
        -quality 100 {$input}");
    }

    public function border($input, $color = 'black', $width = 20)
    {
        $this->execute("convert $input -bordercolor $color -border {$width}x{$width} -quality 100 $input");
    }

    public function frame($input, $frame)
    {
        $this->execute("convert $input ( $frame -resize {$this->_width}x{$this->_height}! -unsharp 1.5×1.0+1.5+0.02 ) -flatten -quality 100 $input");
    }
    
    public function vignette($input, $color_1 = 'none', $color_2 = 'black', $crop_factor = 1.5)
    {
        $crop_x = floor($this->_width * $crop_factor);
        $crop_y = floor($this->_height * $crop_factor);
        
        $this->execute("convert 
        ( {$input} ) 
        ( -size {$crop_x}x{$crop_y} 
        radial-gradient:$color_1-$color_2 
        -gravity center -crop {$this->_width}x{$this->_height}+0+0 +repage )
        -compose multiply -flatten -quality 100 
        {$input}");   
    }
    
    /** FILTER METHODS */
    
	# X-PROII - este no es asi, mejorarlo - conseguir ayuda en foros [ se hara con dinero via Fred]
	
	public function xproii(){
	$this->colortone($this->_image, '#ddcc5d', 1, 0);
	$this->execute("convert $this->_image -modulate 100,120,100 -quality 100 $this->_image");
	}
	
	
	public function cartoon(){
$this->tempfile("v","d");
$this->tempfile("vv","d");

$command='convert '.$this->_image.' -median 2 -separate +dither -colors 10 -combine -blur 0x2 -quality 100 '.$this->_tmpv;
$this->execute($command);
	
$command='convert ( '.$this->_image.' -median 2 ) ( -clone 0 -bias 50% -define convolve:scale=6! -morphology correlate "-1,0,1,01,0,1,01,0,1" -solarize 50% ) ( -clone 0 -bias 50% -define convolve:scale=6! -morphology correlate "1,1,1,0,0,0,-1,-1,-1" -solarize 50% ) ( -clone 1 -clone 1 -compose multiply -composite -gamma 8 ) ( -clone 2 -clone 2 -compose multiply -composite -gamma 8 ) -delete 0-2 -compose plus -composite treshold 75% -quality 100 '.$this->_tmpvv;		
$this->execute($command);

$command='convert '.$this->_tmpv.' '.$this->_tmpvv.' -compose multiply -composite -quality 100 '.$this->_image;
$this->execute($command);

	}


public function enrich(){

$this->tempfile();

$this->tempfile("vv","d");
$this->tempfile("vvv","d");
$this->tempfile("vvvv","d");
$this->tempfile("vvvvv","d");
$this->tempfile("vvvvvv","d");

$command='convert '.$this->_image.' -colorspace HSL -channel R -separate -quality 100 '.$this->_tmpvv; //(temporary red)
$this->execute($command);
$command='convert '.$this->_image.' -colorspace HSL -channel G -separate -quality 100 '.$this->_tmpvvv; // (temporary green)
$this->execute($command);
$command='convert '.$this->_image.' -colorspace HSL -channel B -separate -quality 100 '.$this->_image; // (temporary blue)
$this->execute($command);


$command='convert '.$this->_image.' ( +clone -blur 0x5 -evaluate max 1 ) +swap -compose divide -composite -evaluate log 1 -evaluate multiply -quality 100 '.$this->_tmpvvvv;
$this->execute($command);
$command='convert '.$this->_image.' ( +clone -blur 0x20 -evaluate max 1 ) +swap -compose divide -composite -evaluate log 1 -evaluate multiply -quality 100 '.$this->_tmpvvvvv;
$this->execute($command);
$command='convert '.$this->_image.' ( +clone -blur 0x240 -evaluate max 1 ) +swap -compose divide -composite -evaluate log 1 -evaluate multiply -quality 100 '.$this->_tmpvvvvvv;
$this->execute($command);
$command='convert '.$this->_tmpvvvv.' '.$this->_tmpvvvvv.' '.$this->_tmpvvvvvv.' -average -normalize '.$this->_tmpvvvv;
$this->execute($command);

$command='convert '.$this->_tmp.' -colorspace HSL '.$this->_tmpvv.' -compose CopyRed -composite '.$this->_tmpvvv.' -compose CopyGreen -composite '.$this->_tmpvvvv.' -compose CopyBlue -composite -colorspace sRGB -quality 100 '.$this->_image; //(originally tmpvv if it were to continue)
$this->execute($command);

$this->output();
}


public function toycamera(){
$arr=getimagesize($this->_image);
$ww=$arr[0];
$hh=$arr[1];

$wwo=150*$ww/100;
$hho=150*$hh/100;
$mwh=150*min($ww,$hh)/100;

$command='convert ( '.$this->_image.' ( ) -blur 0x1 ) ( +clone -blur 0x1 ) ( -size '.$mwh.'x'.$mwh.' radial-gradient: -resize '.$wwo.'x'.$hho.'! -gravity center -crop '.$ww.'x'.$hh.'+0+0 +repage ) ( +clone -level 0x50% -clamp ) ( -clone 1 -clone 0 -clone 2 -clamp -compose over -composite -modulate 100,200,100 ) -delete 0-2 +swap -compose multiply -composite -quality 100 '.$this->_image;
$this->execute($command);
}

	public function custom(){	

	$arr=getimagesize($this->_image);
	$dim=$arr[0].'x'.$arr[1];
	$width=$arr[0];
	$height=$arr[1];

global $custom_color;
global $custom_hsb;

$exp=explode(",",$custom_hsb);
$brightness=$exp[0];

$saturation=$exp[1];

if($brightness>70){
$brightness=$brightness-20;	
}
else if($brightness>30){
$brightness=$brightness-10;	
}

if($saturation<15){
$saturation=15;
}

$command='convert ( '.$this->_image.' +level-colors \'rgb('.$custom_color.')\',#fcfcfc -alpha set -channel A -evaluate set 60% -channel RGBA ) ( F:\xampp10\htdocs\classes\woodcut_crop_center.jpg -resize '.$width.'x'.$height.'! +repage -modulate '.$custom_hsb.' ) +swap -compose over -composite -quality 100 '.$this->_image;

//221,61,60

$this->execute($command);

	
	}
	
	
	public function flashy(){
$arr=getimagesize($this->_image);
$ww=$arr[0];
$hh=$arr[1];

$min=0;
$max=75;
$mean=$min+$max;

$gammaval=0.5;

$command='convert '.$this->_image.' -level '.$min.'%,'.$max.'%,'.$gammaval.' -quality 100 '.$this->_image;
$this->execute($command);

	}
	
	public function boost(){
	
$command='convert '.$this->_image.' ( -clone 0 -blur 0x60 ) ( -clone 0 -clone 1 +swap -compose mathematics -set option:compose:args "0,1,-1,.5" -composite -matte -channel A -evaluate set 40% +channel ) ( -clone 0 -blur 0x3 ) ( -clone 0 -clone 3 +swap -compose mathematics -set option:compose:args "0,1,-1,.5" -composite -matte -channel A -evaluate set 50% +channel ) ( -clone 0 -clone 2 -compose hardlight -composite -clone 4 -compose overlay -composite ) -delete 0-4 -quality 100 '.$this->_image;
	$this->execute($command);

	}
	
	
	public function lensflare(){ //lensflare
	$this->tempfile("v","d");
	$arr=getimagesize($this->_image);
	$width=$arr[0];
	$height=$arr[1];

	$command='convert C:/xampp/htdocs/upfrev/classes/lensflare_1.png -resize '.$width.'x -quality 100 '.$this->_tmpv;
	$this->execute($command);
	$command='convert '.$this->_image.' '.$this->_tmpv.' -compose screen -composite -gravity northwest -quality 100 '.$this->_image;
	$this->execute($command);

	}
	
	public function sketch(){
	 $this->execute("convert 
       $this->_image
	( -clone 0 -modulate 100,0,100 ) 
	( -clone 1 -negate -blur 0x4 ) 
	( -clone 1 -clone 2 -compose color_dodge -composite -level 75x100% ) 
	( -clone 3 -alpha set -channel a -evaluate set 175% +channel ) 
	( -clone 3 -clone 4 -compose multiply -composite ) 
	( -clone 0 -modulate 100,100,100 ) 
	-delete 0-4 -compose screen -composite -quality 100 $this->_image" );
	}
	
    # GOTHAM - se dio de baja en Instagram
    public function gotham()
    {
		global $frame;
        $this->execute("convert $this->_image -modulate 120,10,100 -fill #222b6d -colorize 20 -gamma 0.5 -contrast -contrast -quality 100 $this->_image");
        if($frame==1){
	    $this->border($this->_image);
	   }
    }

    # TOASTER
    public function toaster()
    {
        $this->colortone($this->_image, '#330000', 100, 0);
        
        $this->execute("convert $this->_image -modulate 150,80,100 -gamma 1.2 -contrast -contrast -quality 100 $this->_image");
        
        $this->vignette($this->_image, 'none', 'LavenderBlush3');
        $this->vignette($this->_image, '#ff9966', 'none');

    }
    
    # NASHVILLE
    public function nashville()
    {
		global $frame;
        
        $this->colortone($this->_image, '#222b6d', 100, 0);
        $this->colortone($this->_image, '#f7daae', 100, 1);
        
        $this->execute("convert $this->_image -contrast -modulate 100,150,100 -auto-gamma -quality 100 $this->_image");
       if($frame==1){
	    $this->frame($this->_image, "C:/xampp/htdocs/upfrev/classes/nashville.png");
	   }

	}
        
    # LOMO-FI
    public function lomo()
    {
   
        
        $command = "convert $this->_image -channel R -level 33% -channel G -level 33% -quality 100 $this->_image";
        
        $this->execute($command);
        $this->vignette($this->_image);

    }

    # KELVIN
    public function kelvin()
    {
		global $frame;

        
        $this->execute("convert 
        ( $this->_image -auto-gamma -modulate 120,50,100 ) 
        ( -size {$this->_width}x{$this->_height} -fill rgba(255,153,0,0.5) -draw 'rectangle 0,0 {$this->_width},{$this->_height}' ) 
        -compose multiply 
        -quality 100 $this->_image");
		if($frame==1){
        $this->frame($this->_image, "C:/xampp/htdocs/upfrev/classes/kelvin.png");
		}
		
 
    }

    # TILT SHIFT
    public function tilt_shift()
    {

        $this->execute("convert 
        ( $this->_image -gamma 0.75 -modulate 100,130 -contrast ) 
        ( +clone -sparse-color Barycentric '0,0 black 0,%h white' -function polynomial 4,-4,1 -level 0,50% ) 
        -compose blur -set option:compose:args 5 -composite 
        $this->_image");

    }

}
}