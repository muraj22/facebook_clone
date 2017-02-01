<?php
class pene{

   
    public function __construct($number)
    {
	$this->_number=$number;
    }
	
	public function mas_tres(){
	$this->_number=$this->_number+3;	
	return $this->_number;
	}
		
}

$number=3;
$numberv=new pene($number);

$dea=$numberv->mas_tres();

echo $dea;


class droga{

public static function dreturn($w,$me){
return new droga($w,$me);	
}

public function __construct($w){
$this->_w=$w;	
}

public function subtract(){
$this->_w=$this->_w-10;
return $this->_w;	
}

}

$aja=new droga(55);
$ajav=$aja->subtract();

echo $ajav;



class jr{

public static function dreturn($re,$de){
return new jr($re,$de);	
}

public function __construct($re,$de){
$this->viva=$re;
$this->mira=$de;	
}

public function sum(){
$j=$this->viva+$this->mira;
return $j;
}
	

}

$as=jr::dreturn("11","23");
$asv=$as->sum();

echo $asv;
?>