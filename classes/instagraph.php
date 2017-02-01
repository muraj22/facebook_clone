<?php
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
		$this->$what = str_replace(".png",rand().".png",$this->_image);
		if($dummy==""){
				copy($this->_image, $this->$what);
		}
	else{
	copy("/var/www/html/images/transparent.png",$this->$what);
	}
	}

		public function output()
		{
				# rename working temporary file to output filename
				rename($this->_tmp, $this->_output);
		}

		public function execute($command)
		{
				# remove newlines and /usr/local/bin/convert single quotes to double to prevent errors
				$command = str_replace(array("\n"), array(''), $command);
				# replace multiple spaces with one
//        $command = preg_replace('#(\s){2,}#is', ' ', $command);
				# escape shell metacharacters
//      $command = escapeshellcmd($command);
				# execute /usr/local/bin/convert program


$command=str_replace("..(","(",$command);
$command=str_replace(")..",")",$command);

$command=str_replace("..#","#",$command);

$command=str_replace("#","\\#",$command);
$command=str_replace("(","\\(",$command);
$command=str_replace(")","\\)",$command);

$command=str_replace("..:\\(","(",$command);
$command=str_replace("\\):..",")",$command);

				exec($command,$de,$returned);

//echo $returned.':';
		}

		/** ACTIONS */

		public function colortone($input, $color, $level, $type = 0)
		{


				$args[0] = $level;
				$args[1] = 100 - $level;
				$negate = $type == 0? '-negate': '';

$command='/usr/local/bin/convert '.$input.' ( -clone 0 -fill '.$color.' -colorize 100% ) ( -clone 0 -colorspace gray '.$negate.' ) -compose blend -define compose:args='.$args[0].','.$args[1].' -composite '.$input;
$this->execute($command);
		}

		public function border($input, $color = 'black', $width = 20)
		{
		$arr=getimagesize($input);
		$widthv=$arr[0];
		$heightv=$arr[1];
		if($widthv<400 OR $heightv<400){
		$width=10;
		}
				$this->execute("/usr/local/bin/convert $input -bordercolor $color -border {$width}x{$width} $input");
		}

		public function frame($input, $frame)
		{
				$this->execute("/usr/local/bin/convert $input ( $frame -resize {$this->_width}x{$this->_height}! -unsharp 1.5×1.0+1.5+0.02 ) -flatten $input");
		}

		public function vignette($input, $color_1 = 'none', $color_2 = 'black', $crop_factor = 1.5)
		{

				$crop_x=floor($this->_width * $crop_factor);
				$crop_y=floor($this->_height * $crop_factor);



		$command='/usr/local/bin/convert ( '.$input.' ) ( -size '.$crop_x.'x'.$crop_y.' radial-gradient:'.$color_1.'-'.$color_2.' -gravity center -crop '.$this->_width.'x'.$this->_height.'+0+0 +repage ) -compose multiply -flatten '.$input;
$this->execute($command);

		}

		/** FILTER METHODS */

	# X-PROII - este no es asi, mejorarlo - conseguir ayuda en foros [ se hara con dinero via Fred]

	public function xproii(){
	$this->colortone($this->_image, '#ddcc5d', 1, 0);
	$this->execute("/usr/local/bin/convert $this->_image -modulate 100,120,100 $this->_image");
	}

	public function wrinkle_reducer(){

		//here is the function to /usr/local/bin/convert color background to transparent
//	$this->execute('/usr/local/bin/convert '.$this->_image.' -matte -fill none -draw "color 0,0 replace" '.$this->_image);


        $this->execute('/var/www/html/gmic -input '.$this->_image.' -gimp_patch_smoothing 10,10,3,5,0,1,1,0,0 -output '.$this->_image);
	}

	public function comic(){

//to create comic_fade.png
/*
$command='/usr/local/bin/convert -size 20×100 xc:none -fill red -draw "rectangle 19,100 20,0" -channel A -blur 0×8 -alpha set C:/xampp/htdocs/fade.png';
$this->execute($command);
*/

/*
$command='/usr/local/bin/convert '.$this->_image.' -blur 1x1 -quality 75 '.$this->_image;
$this->execute($command);
*/

/*
$command='/usr/local/bin/convert -compose over '.$this->_image.' /var/www/html/images/comic_fade.png -composite -quality 75 '.$this->_image;
$this->execute($command);
*/

$command='/var/www/html/gmic -input '.$this->_image.' -gimp_poster_edges 1.1,0,1,0.5,54.6296,0,0,0 -output '.$this->_image;
$this->execute($command);



}

    public function reggae(){
    $this->tempfile("","d");
	$this->tempfile("v","d");
	$this->tempfile("vv","d");   
    $this->tempfile("vvv","d");
    $this->tempfile("vvvv","d");
    
    $arr=getimagesize($this->_image);
	$ww=$arr[0];
	$hh=$arr[1];
    
    $ww=$ww/3;
    
	$command='/usr/local/bin/convert -size '.$ww.'x'.$hh.' xc:#b32b2c '.$this->_tmp;
	$this->execute($command);
	$command='/usr/local/bin/convert -size '.$ww.'x'.$hh.' xc:#fedb01 '.$this->_tmpv;
	$this->execute($command);
	$command='/usr/local/bin/convert -size '.$ww.'x'.$hh.' xc:#37a754 '.$this->_tmpvv;
	$this->execute($command);
    $command='/usr/local/bin/convert '.$this->_tmp.' '.$this->_tmpv.' '.$this->_tmpvv.' +append '.$this->_tmpvvv;
	$this->execute($command);
    $command='/usr/local/bin/convert '.$this->_image.' -threshold 50% '.$this->_tmpvvvv;
	$this->execute($command);
    $command='/usr/local/bin/convert '.$this->_tmpvvv.' '.$this->_tmpvvvv.' -compose multiply -composite '.$this->_image;
	$this->execute($command);

    }
    
	public function vintage(){
	$this->tempfile("","d");
	$this->tempfile("v","d");
	$this->tempfile("vv","d");


	$arr=getimagesize($this->_image);
	$ww=$arr[0];
	$hh=$arr[1];

	$command='/usr/local/bin/convert /var/www/html/classes/grad_center_light_1.png -resize '.$ww.'x'.$hh.'! '.$this->_tmp;
	$this->execute($command);

	$command='/usr/local/bin/convert '.$this->_tmp.' '.$this->_image.' -compose multiply -compose over -composite -gravity center '.$this->_tmpv;
	$this->execute($command);

	$command='/usr/local/bin/convert '.$this->_tmpv.' -modulate 100,120 -brightness-contrast 0x20% '.$this->_tmpv;
	$this->execute($command);

	$command='/usr/local/bin/convert /var/www/html/classes/grad_vignette_1.png -resize '.$ww.'x'.$hh.'! '.$this->_tmpvv;
	$this->execute($command);

	$command='/usr/local/bin/convert '.$this->_tmpvv.' '.$this->_tmpv.' -compose multiply -compose overlay -composite -gravity center -quality 75 '.$this->_image;
	$this->execute($command);

	unlink($this->_tmp);
	unlink($this->_tmpv);
	unlink($this->_tmpvv);

	}

	public function drawing(){
	$command='/var/www/html/gmic -input '.$this->_image.' -drawing 200 -output '.$this->_image;
	$this->execute($command);
	}

	public function pencil(){ //not in use
	$command='/var/www/html/gmic -input '.$this->_image.' -pencilbw 0.3,60 -output '.$this->_image;
	$this->execute($command);
	}

	public function twenty_one(){
	$command='/var/www/html/gmic -input '.$this->_image.' -frame_pattern 5,1,1 -output '.$this->_image;
	$this->execute($command);
	}

	public function four(){
	$command='/var/www/html/gmic -input '.$this->_image.' -array_mirror 1,2,1 -output '.$this->_image; //con expand type 0, tercer parametro, que no duplica el tamaño las caras no se detectan bien, otro que requeriria al igual que beatles four por ejemplo dividor entre dos al ubicar las boxes (3 horas) - quedan los dos "fenomenos" - ocupando mucho menos espacio
	$this->execute($command);
	}

	public function eight_bits(){

	$command='/var/www/html/gmic -input '.$this->_image.' -index 7,.3,1 -output '.$this->_image;
	$this->execute($command);

	}


public function rustic(){
$this->black_white_sketch();
$this->nineties();
}

public function polaroid_toy(){
	$this->polaroid();
	$this->toycamera();
}

public function polaroid_cartoon(){
	$this->polaroid();
	$this->cartoon();
}

	public function cartoon(){
$this->tempfile("v","d");
$this->tempfile("vv","d");

$command='/usr/local/bin/convert '.$this->_image.' -median 2 -separate +dither -colors 30 -combine -blur 0x2 -quality 75 '.$this->_tmpv;
$this->execute($command);

$command='/usr/local/bin/convert ( '.$this->_image.' -median 3 -set colorspace RGB ) ( -clone 0 -bias 55% -define convolve:scale=6! -morphology correlate "-1,0,1,01,0,1,01,0,1" -solarize 55% ) ( -clone 0 -bias 55% -define convolve:scale=6! -morphology correlate "1,1,1,0,0,0,-1,-1,-1" -solarize 55% ) ( -clone 1 -clone 1 -compose multiply -composite -gamma 8 ) ( -clone 2 -clone 2 -compose multiply -composite -gamma 8 ) -delete 0-2 -compose plus -composite -threshold 50% '.$this->_tmpvv;
$this->execute($command);

$command='/usr/local/bin/convert '.$this->_tmpv.' '.$this->_tmpvv.' -compose multiply -composite -quality 75 '.$this->_image;
$this->execute($command);

unlink($this->_tmpv);
unlink($this->_tmpvv);
}

public function cartoon_two(){
//_smoothness,_sharpening,_threshold>=0,_thickness>=0,_color>=0,quantization>0
$command='/var/www/html/gmic -input '.$this->_image.' -cartoon 3,80,15 -output '.$this->_image;
$this->execute($command);
}


public function enrich(){

$this->tempfile();

$this->tempfile("vv","d");
$this->tempfile("vvv","d");
$this->tempfile("vvvv","d");
$this->tempfile("vvvvv","d");
$this->tempfile("vvvvvv","d");
$this->tempfile("vvvvvvv","d");
$this->tempfile("vvvvvvvv","d");

/*
tmpa tmpvv
tmph tmpvvv
tmps tmpvvvv

tmp1 tmpvvvvv
tmp2 tmpvvvvvv
tmp3 tmpvvvvvvv
*/

$command='/usr/local/bin/convert '.$this->_tmpvv.' -colorspace HSL -channel R -separate '.$this->_tmpvvv; //(temporary red)
$this->execute($command);
$command='/usr/local/bin/convert '.$this->_tmpvv.' -colorspace HSL -channel G -separate '.$this->_tmpvvvv; // (temporary green)
$this->execute($command);
$command='/usr/local/bin/convert '.$this->_tmpvv.' -colorspace HSL -channel B -separate '.$this->_tmpvv; // (temporary blue)
$this->execute($command);

$command='/usr/local/bin/convert xc: -format "%[fx:log(2)]" info:';
exec($command,$arr);

foreach($arr as $k=>$v){
$w=$v;
}

//todo se hace sobre el blue
$command='/usr/local/bin/convert '.$this->_tmpvv.' ( +clone -blur 0x5 -evaluate max 1 ) +swap -compose divide -composite -evaluate multiply '.$w.' '.$this->_tmpvvvvv;
$this->execute($command);
$command='/usr/local/bin/convert '.$this->_tmpvv.' ( +clone -blur 0x20 -evaluate max 1 ) +swap -compose divide -composite -evaluate multiply '.$w.' '.$this->_tmpvvvvvv;
$this->execute($command);
$command='/usr/local/bin/convert '.$this->_tmpvv.' ( +clone -blur 0x240 -evaluate max 1 ) +swap -compose divide -composite -evaluate multiply '.$w.' '.$this->_tmpvvvvvvv;
$this->execute($command);
$command='/usr/local/bin/convert '.$this->_tmpvvvvv.' '.$this->_tmpvvvvvv.' '.$this->_tmpvvvvvvv.' -average -normalize '.$this->_tmpvvvvv;
$this->execute($command);

$command='/usr/local/bin/convert '.$this->_tmpvvv.' -colorspace HSL '.$this->_tmpvvvv.' -compose CopyRed -composite '.$this->_tmpvv.' -compose CopyGreen -composite '.$this->_tmp.' -compose CopyBlue -composite -colorspace sRGB '.$this->_tmpvvvvv; //(originally tmpvv if it were to continue) esta de aca :)
$this->execute($command);

$command='/usr/local/bin/convert '.$this->_tmpvv.' ( +clone -colorspace Gray ) -fx "log..(..(u/max..(v,.000001)..)..+1).." '.$this->_tmpvvvvvv;
$this->execute($command);

$command='/usr/local/bin/convert '.$this->_tmpvvvvv.' '.$this->_tmpvvvvvvv.' -define compose:args=80% -compose blend -composite -quality 75 '.$this->_image;
$this->execute($command);

$this->output();

unlink($this->_tmp);
unlink($this->_tmpvv);
unlink($this->_tmpvvv);
unlink($this->_tmpvvvv);
unlink($this->_tmpvvvvv);
unlink($this->_tmpvvvvvv);
unlink($this->_tmpvvvvvvv);
unlink($this->_tmpvvvvvvvv);
}


public function toycamera(){
$arr=getimagesize($this->_image);
$ww=$arr[0];
$hh=$arr[1];

$wwo=150*$ww/100;
$hho=150*$hh/100;
$mwh=150*min($ww,$hh)/100;

$command='/usr/local/bin/convert ( '.$this->_image.' ( ) -blur 0x1 ) ( +clone -blur 0x1 ) ( -size '.$mwh.'x'.$mwh.' radial-gradient: -resize '.$wwo.'x'.$hho.'! -gravity center -crop '.$ww.'x'.$hh.'+0+0 +repage ) ( +clone -level 0x50% -clamp ) ( -clone 1 -clone 0 -clone 2 -clamp -compose over -composite -modulate 100,200,100 ) -delete 0-2 +swap -compose multiply -composite -quality 75 '.$this->_image;
$this->execute($command);
}

	public function custom(){
global $root;

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

$command='/usr/local/bin/convert ( '.$this->_image.' +level-colors \'rgb..:('.$custom_color.'):..\',#fcfcfc -alpha set -channel A -evaluate set 60% -channel RGBA ) ( /var/www/html/classes/woodcut_crop_center.jpg -resize '.$width.'x'.$height.'! +repage -modulate '.$custom_hsb.' ) +swap -compose over -composite -quality 75 '.$this->_image;

//221,61,60

$this->execute($command);


	}

 
    public function brightness()
    {
        global $brightness;
        $command="/usr/local/bin/convert ".$this->_image." -brightness-contrast ".$brightness."x0 ".$this->_image;
        $this->execute($command);
    }
   
    public function contrast()
    {
        global $contrast;
        $command="/usr/local/bin/convert ".$this->_image." -brightness-contrast 0x".$contrast." ".$this->_image;
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

$command='/usr/local/bin/convert '.$this->_image.' -level '.$min.'%,'.$max.'%,'.$gammaval.' -quality 75 '.$this->_image;
$this->execute($command);

	}

	public function boost(){

$command='/usr/local/bin/convert '.$this->_image.' ( -clone 0 -blur 0x60 ) ( -clone 0 -clone 1 +swap -compose mathematics -set option:compose:args "0,1,-1,.5" -composite -matte -channel A -evaluate set 40% +channel ) ( -clone 0 -blur 0x3 ) ( -clone 0 -clone 3 +swap -compose mathematics -set option:compose:args "0,1,-1,.5" -composite -matte -channel A -evaluate set 50% +channel ) ( -clone 0 -clone 2 -compose hardlight -composite -clone 4 -compose overlay -composite ) -delete 0-4 -quality 75 '.$this->_image;
	$this->execute($command);

	}

	public function agereducer(){


//smooth
//Default values: 'sharpness=0.7', 'anisotropy=0.3', 'alpha=0.6', 'sigma=1.1', 'dl=0.8', 'da=30', 'precision=2', 'interpolation=0' and 'fast_approx=1'.
/*
	amplitude>=0,_sharpness>=0,_anisotropy,_alpha,_sigma,_dl>0,_da>0,_precision>0,interpolation,_fast_approx={ 0 | 1 } |
nb_iterations>=0
,_sharpness>=0,_anisotropy,_alpha,_sigma,_dt>0,0 |
[tensor_field],_amplitude>=0,_dl>0,_da>0,_precision>0,_interpolation,_fast_approx={ 0 | 1 } |
[tensor_field],_nb_iters>=0,_dt>0,0
*/


$command='/var/www/html/gmic -input '.$this->_image.' -smooth 4.2,0.7,0.3,0.6,1.1,0.8,30,2,0,1,2,0.7,0.3,0.6,1.1,1,0,4.2,0.8,30,2,0,1,1,2,1,0 -output '.$this->_image;
$this->execute($command);
	}


	public function nineties(){
	$command='/var/www/html/gmic -input '.$this->_image.' -old_photo -output '.$this->_image;
	$this->execute($command);
	}


	public function cartoon_iii(){
	$command='/var/www/html/gmic -input '.$this->_image.' -gimp_richardson_lucy 18.36,40,25,0.1,1,0,0 -output '.$this->_image;
	$this->execute($command);
	}


	public function lensflare(){ //lensflare
	$this->tempfile("v","d");
	$arr=getimagesize($this->_image);
	$width=$arr[0];
	$height=$arr[1];

	$command='/usr/local/bin/convert /var/www/html/classes/lensflare_1.png -resize '.$width.'x '.$this->_tmpv;
	$this->execute($command);
	$command='/usr/local/bin/convert '.$this->_image.' '.$this->_tmpv.' -compose screen -composite -gravity northwest -quality 75 '.$this->_image;
	$this->execute($command);
unlink($this->_tmpv);

	}

	public function polaroid(){

	$vals=array();
	$valsv[1]="-";
	$valsv[2]="";

	$rand=rand(15,30);
	$randv=rand(1,2);
	$randv=$valsv[$randv];

	$dval=$randv.$rand; //example -25

$arr=getimagesize($this->_image);
$hh=$arr[1];

$pointsize=floor($hh/50);

if($pointsize<18){
$pointsize=18;
}


/*
$command='/usr/local/bin/convert -caption "%c %f\\n%wx%h" -gravity south '.$this->_image.' -pointsize '.$pointsize.' -splice 0x104 -background white -bordercolor white -gravity south ( -bordercolor white -background white -border 22x36 -gravity center ) -gravity center -polaroid '.$dval.' -quality 75 '.$this->_image;
$this->execute($command); //este seria el ideal pero con el respectivo drop shadow que me parece es algo propietario de el efecto polaroid y no hay caso.
*/

	/*
	$command='/usr/local/bin/convert '.$this->_image.' -bordercolor white -border 10 -bordercolor grey60 -border 20 -background none -rotate '.$dval.' -background  black  ( +clone -shadow 60x4+4+4 ) +swap -background none -flatten -quality 75 '.$this->_image;
		$this->execute($command);
	*/

	$command='/var/www/html/gmic -input '.$this->_image .' -to_rgba -polaroid 10,20 -rotate '.$dval.' -drop_shadow , -display_rgba -output '.$this->_image;
	$this->execute($command);

	}

	public function church(){
$this->tempfile();
$command='/usr/local/bin/convert '.$this->_image.' ( -clone 0 -fill white -colorize 100% ) '.$this->_tmp.' -compose lighten -composite -quality 75 '.$this->_image;
$this->execute($command);
unlink($this->_tmp);
	}

	public function beatles_four(){

$this->tempfile("","d");
//$this->tempfile("v"); stripped
$this->tempfile("vv","d");
$this->tempfile("vvv","d");
$this->tempfile("vvvv","d");

$this->tempfile("vvvvv","d");


/*
$command='/usr/local/bin/convert '.$this->_image.' -colorspace gray '.$this->_tmp.' tricolorize -l yellow -m blue -h red '.$this->_tmp.' '.$this->_tmpv.' tricolorize -l green -m magenta -h violet '.$this->_tmp.' '.$this->_tmpvv.' tricolorize -l blue -m green -h orange '.$this->_tmp.' '.$this->_tmpvvv.' tricolorize -l magenta -m yellow -h cyan '.$this->_tmp.' '.$this->_tmpvvvv.' montage '.$this->_tmpv.' '.$this->_tmpvv.' '.$this->_tmpvvv.' '.$this->_tmpvvvv.' -tile 2x2 -geometry +5+5 -background white -quality 75 '.$this->_image;
*/

$arr=getimagesize($this->_image);
$ww=$arr[0];
$hh=$arr[1];

$ww=$ww/4;
$hh=$hh/4;

$command='/usr/local/bin/convert '.$this->_image.' -colorspace gray '.$this->_tmp; //si le hago -resize 50% el tema es que no se por que pero esta detectando las caras fenomeno
//habria que hacer un divido 2 en todas las detecciones faciales cuando se encuentra que este fue el filtro que se aplico..
$this->execute($command);


$command='/usr/local/bin/convert -size 1x1 xc:yellow xc:blue xc:red +append -filter triangle -resize 256x1! -contrast-stretch 0 -virtual-pixel edge -fx "u.p{..(i-..(w/2)..)..*..(100+0)../..(100)..+..(w/2)..-0,j}" -quality 75 '.$this->_image;
$this->execute($command);

$command='/usr/local/bin/convert '.$this->_image.' -scale '.$ww.'x'.$hh.'! -quality 75 '.$this->_image;
$this->execute($command);
//aca poner width y height dividiendo en 4

$command='/usr/local/bin/convert '.$this->_tmp.' '.$this->_image.' -clut '.$this->_tmpvv; //empieza a contar primera
$this->execute($command);



$command='/usr/local/bin/convert -size 1x1 xc:green xc:magenta xc:violet +append -filter triangle -resize 256x1! -contrast-stretch 0 -virtual-pixel edge -fx "u.p{..(i-..(w/2)..)..*..(100+0)../..(100)..+..(w/2)..-0,j}" -quality 75 '.$this->_image;
$this->execute($command);

$command='/usr/local/bin/convert '.$this->_image.' -scale '.$ww.'x'.$hh.'! -quality 75 '.$this->_image;
$this->execute($command);
//aca poner width y height dividiendo en 4

$command='/usr/local/bin/convert '.$this->_tmp.' '.$this->_image.' -clut '.$this->_tmpvvv;
$this->execute($command);



$command='/usr/local/bin/convert -size 1x1 xc:blue xc:green xc:orange +append -filter triangle -resize 256x1! -contrast-stretch 0 -virtual-pixel edge -fx "u.p{..(i-..(w/2)..)..*..(100+0)../..(100)..+..(w/2)..-0,j}" -quality 75 '.$this->_image;
$this->execute($command);

$command='/usr/local/bin/convert '.$this->_image.' -scale '.$ww.'x'.$hh.'! -quality 75 '.$this->_image;
$this->execute($command);
//aca poner width y height dividiendo en 4

$command='/usr/local/bin/convert '.$this->_tmp.' '.$this->_image.' -clut '.$this->_tmpvvvv;
$this->execute($command);




$command='/usr/local/bin/convert -size 1x1 xc:magenta xc:yellow xc:cyan +append -filter triangle -resize 256x1! -contrast-stretch 0 -virtual-pixel edge -fx "u.p{..(i-..(w/2)..)..*..(100+0)../..(100)..+..(w/2)..-0,j}" -quality 75 '.$this->_image;
$this->execute($command);

$command='/usr/local/bin/convert '.$this->_image.' -scale '.$ww.'x'.$hh.'! -quality 75 '.$this->_image;
$this->execute($command);
//aca poner width y height dividiendo en 4

$command='/usr/local/bin/convert '.$this->_tmp.' '.$this->_image.' -clut '.$this->_tmpvvvvv;
$this->execute($command);


$command='montage '.$this->_tmpvv.' '.$this->_tmpvvv.' '.$this->_tmpvvvv.' '.$this->_tmpvvvvv.' -tile 2x2 -geometry +5+5 -background transparent -quality 75 '.$this->_image;
$this->execute($command);


/*
/usr/local/bin/convert C://var/www/html/gmic/esta.jpg

tricolorize -l yellow -m blue -h red C://var/www/html/gmic/estag.png

/usr/local/bin/convert -size 1x1 xc:yellow xc:blue xc:red +append -filter triangle -resize 256x1! -contrast-stretch 0 -virtual-pixel edge -fx "u.p{(i-(w/2))*(100+0)/(100)+(w/2)-0,j}" C://var/www/html/gmic/esa.png

/usr/local/bin/convert C://var/www/html/gmic/esa.png -scale 256x20! C://var/www/html/gmic/lut.png

/usr/local/bin/convert C://var/www/html/gmic/esta.jpg C://var/www/html/gmic/lut.png -clut C://var/www/html/gmic/fenomeno.png

C://var/www/html/gmic/primera.png tricolorize -l green -m magenta -h violet C://var/www/html/gmic/estag.png C://var/www/html/gmic/segunda.png tricolorize -l blue -

m green -h orange C://var/www/html/gmic/estag.png C://var/www/html/gmic/tercera.png tricolorize -l magenta -m yellow -h cyan C://var/www/html/gmic/estag.png C://var/www/html/gmic/cuarta.png montage C://var/www/html/gmic/primera.png C://var/www/html/gmic/segunda.png C://var/www/html/gmic/tercera.png C://var/www/html/gmic/cuarta.png -tile 2x2 -geometry +5+5 -background white C://var/www/html/gmic/esta.jpg;
*/


unlink($this->_tmp);
unlink($this->_tmpvv);
unlink($this->_tmpvvv);
unlink($this->_tmpvvvv);
unlink($this->_tmpvvvvv);

	}

	public function white_frame(){
	$command='/usr/local/bin/convert '.$this->_image.' -bordercolor white -border 13 ( +clone -background black -shadow 80x3+2+2 ) +swap -background white -layers merge +repage -quality 75 '.$this->_image; //can be transparent but makes it look better in white
	$this->execute($command);
	}

	public function sketch(){
	$command='/usr/local/bin/convert '.$this->_image.' ( -clone 0 -modulate 100,0,100 ) ( -clone 1 -negate -blur 0x4 ) ( -clone 1 -clone 2 -compose color_dodge -composite -level 75x100% ) ( -clone 3 -alpha set -channel a -evaluate set 175% +channel ) ( -clone 3 -clone 4 -compose multiply -composite ) ( -clone 0 -modulate 100,100,100 ) -delete 0-4 -compose screen -composite -quality 75 '.$this->_image;
	$this->execute($command);
	}

	public function black_white_sketch(){
$command='/usr/local/bin/convert '.$this->_image.' ( -clone 0 -modulate 100,0,100 ) ( -clone 1 -negate -blur 0x4 ) ( -clone 1 -clone 2 -compose color_dodge -composite -level 75x100% ) ( -clone 3 -alpha set -channel a -evaluate set 175% +channel ) ( -clone 3 -clone 4 -compose multiply -composite ) ( -clone 0 -modulate 100,100,100 ) -delete 0-4 -compose screen -composite -colorspace gray -quality 75 '.$this->_image;
$this->execute($command);
	}


	public function mirrors(){
	$command='/var/www/html/gmic '.$this->_image.' -stained_glass 15%,0.1,1 -output '.$this->_image;
	$this->execute($command);
	}
		# GOTHAM - se dio de baja en Instagram
		public function gotham()
		{
		global $frame;
				$this->execute("/usr/local/bin/convert $this->_image -modulate 120,10,100 -fill #222b6d -colorize 20 -gamma 0.5 -contrast -contrast $this->_image");
				if($frame==1){
			$this->border($this->_image);
		}
		}

public function hulk(){
//$command='/usr/local/bin/convert '.$this->_image.' -channel RB -fx 0 -quality 75 '.$this->_image;
$command='/usr/local/bin/convert '.$this->_image.' -negate -background "..#126100" -channel A -combine -quality 75 '.$this->_image;
$this->execute($command);
}


public function superman(){
//$command='/usr/local/bin/convert '.$this->_image.' -channel RG -fx 0 -quality 75 '.$this->_image;
$command='/usr/local/bin/convert '.$this->_image.' -negate -background "..#003aad" -channel A -combine -quality 75 '.$this->_image;
//003aad
$this->execute($command);
}

public function dark_knight(){


				$this->colortone($this->_image, '#1a1b1d', 100, 0);
				$this->colortone($this->_image, '#cbcbcb', 100, 1);
				$command='/usr/local/bin/convert '.$this->_image.' -contrast -modulate 100,150,100 -auto-gamma -quality 75 '.$this->_image;
				$this->execute($command);
}

public function wolverine(){
//$command='/usr/local/bin/convert '.$this->_image.' -channel RG -fx 0 -quality 75 '.$this->_image;
$this->colortone($this->_image, '#333300', 100, 0);
$command='/usr/local/bin/convert '.$this->_image.' -modulate 150,80,100 -gamma 1.2 -contrast -contrast -quality 75 '.$this->_image;
$this->execute($command);
$this->vignette($this->_image, 'none', '#cdcdbf');
$this->vignette($this->_image, '#fffa66', 'none');
}

public function hawk_eye(){
//$command='/usr/local/bin/convert '.$this->_image.' -channel RG -fx 0 -quality 75 '.$this->_image;
$this->colortone($this->_image, '#190033', 100, 0);
$command='/usr/local/bin/convert '.$this->_image.' -modulate 150,80,100 -gamma 1.2 -contrast -contrast -quality 75 '.$this->_image;
$this->execute($command);
$this->vignette($this->_image, 'none', '#e1b3f0');
$this->vignette($this->_image, '#d966ff', 'none');
}



/*
public function hawk_eye(){
//$command='/usr/local/bin/convert '.$this->_image.' -channel RG -fx 0 -quality 75 '.$this->_image;
$command='/usr/local/bin/convert '.$this->_image.' -negate -background "..#18007a" -channel A -combine -quality 75 '.$this->_image;
$this->execute($command);
} //single colored..
*/


public function spiderman(){
/* very good spidey
$command='/usr/local/bin/convert '.$this->_image.' -background gray -alpha background -alpha off -channel B -separate +channel -alpha on -quality 75 '.$this->_image;
$this->execute($command);
$command='/usr/local/bin/convert '.$this->_image.' +level-colors red,blue -quality 75 '.$this->_image;
$this->execute($command);
*/

$command='/usr/local/bin/convert '.$this->_image.' -negate -background "..#7a0000" -channel A -combine -quality 75 '.$this->_image;
$this->execute($command);
}
		# TOASTER
		public function toaster()
		{
				$this->colortone($this->_image, '#330000', 100, 0);

		$command='/usr/local/bin/convert '.$this->_image.' -modulate 150,80,100 -gamma 1.2 -contrast -contrast -quality 75 '.$this->_image;
				$this->execute($command);

				$this->vignette($this->_image, 'none', 'LavenderBlush3');
				$this->vignette($this->_image, '#ff9966', 'none');

		}

		# NASHVILLE
		public function nashville()
		{
		global $frame;

				$this->colortone($this->_image, '#222b6d', 100, 0);
				$this->colortone($this->_image, '#f7daae', 100, 1);
				$command='/usr/local/bin/convert '.$this->_image.' -contrast -modulate 100,150,100 -auto-gamma -quality 75 '.$this->_image;
				$this->execute($command);
			if($frame==1){
			$this->frame($this->_image, "/var/www/html/classes/nashville.png");
		}

	}

		# LOMO-FI
		public function lomo()
		{

				$command='/usr/local/bin/convert '.$this->_image.' -channel R -level 33% -channel G -level 33% -quality 75 '.$this->_image;

				$this->execute($command);
				$this->vignette($this->_image);

		}

		# KELVIN
		public function kelvin()
		{
		global $frame;

				$command='/usr/local/bin/convert ( '.$this->_image.' -auto-gamma -modulate 120,50,100 ) ( -size '.$this->_width.'x'.$this->_height.' -fill rgba(255,153,0,0.5) -draw "rectangle 0,0 '.$this->_width.','.$this->_height.'" ) -compose multiply -quality 75 '.$this->_image;
				$this->execute($command);
		if($frame==1){
				$this->frame($this->_image, "/var/www/html/classes/kelvin.png");
		}


		}

		# TILT SHIFT
		public function tilt_shift()
		{
		$command="/usr/local/bin/convert ( ".$this->_image." -gamma 0.75 -modulate 100,130 -contrast ) ( +clone -sparse-color Barycentric '0,0 black 0,%h white' -function polynomial 4,-4,1 -level 0,50% ) -compose blur -set option:compose:args 5 -composite ".$this->_image;
				$this->execute($command);
		}

}
}