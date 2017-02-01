<?php
$ecode[1]='The name contains too many periods.';
$ecode[2]='The name contains invalid characters.';
$ecode[7]='The name contains too many repetitive characters.';
$ecode[8]='The name contains too many capital letters.';
$ecode[9]='The name contains too many characters.';
$ecode[10]='You must provide your full name.';

if(strpos($f_name,'.')!==false OR strpos($l_name,'.')!==false){error($ecode[1]);}
$f_name = preg_replace ("/ +/", " ", $f_name);
$f_name = preg_replace ("/^ +/", "", $f_name);
$f_name = preg_replace ("/ +$/", "", $f_name);
$f_namec = preg_replace ("/ +/", "", $f_name);
$f_namecv=preg_replace('#[0-9]*#', '', $f_namec,-1,$count);
if($f_namec!=$f_namecv){
error($ecode[2]);
}
$f_namec=preg_replace('/[_\W+]/', '', $f_namec,-1,$count);

if($count>0){
error($ecode[2]);
}
$l_name = preg_replace ("/ +/", " ", $l_name);
$l_name = preg_replace ("/^ +/", "", $l_name);
$l_name = preg_replace ("/ +$/", "", $l_name);
$l_namec = preg_replace ("/ +/", "", $l_name);
$l_namecv=preg_replace('#[0-9]*#', '', $l_namec,-1,$count);
if($l_namec!=$l_namecv){
error($ecode[2]);
}
$l_namec=preg_replace('/[_\W+]/', '', $l_namec,-1,$count);
if($count>0){
error($ecode[2]);
}

if(strlen($f_name)>24){error($ecode[9]);}
else if(strlen($l_name)>24){error($ecode[9]);}

$summedl=strlen($f_name)+strlen($l_name);
if($summedl>48){error($ecode[9]);}

function shorten($str) {
    return preg_replace_callback(
        '~(.)\1+~',
        function( $matches ) {
            return sprintf( '.%s.%s', $matches[1], strlen( $matches[0] ) );
        },
        $str
    );
}

function lowercase_letters($s) {
  $result = array( 'digit'=>0, 'lower'=>0, 'upper'=>0, 'punct'=>0,'spaces'=>0, 'others'=>0);
  for($i=0; $i<strlen($s); $i++) {
    $c = $s[$i];
    if ( ctype_digit($c) ) {
      $result['digit'] += 1;
    }
    else if ( ctype_lower($c) ) {
      $result['lower'] += 1;
    }
    else if ( ctype_upper($c) ) {
		$result['upper'] += 1;	
    }
    else if ( ctype_punct($c) ) {
      $result['punct'] += 1;
    }
	else if(ctype_space($c)){
	$result['spaces']+=1;	
	}
    else {
      $result['others'] += 1;
    }
  }
  return $result;
}
function lowercase_lettersv($s) {
  $result = array( 'digit'=>0, 'lower'=>0, 'upper'=>0, 'punct'=>0,'spaces'=>0, 'others'=>0);
  for($i=0; $i<strlen($s); $i++) {
    $c = $s[$i];
    if ( ctype_digit($c) ) {
      $result['digit'] += 1;
    }
    else if ( ctype_lower($c) ) {
      $result['lower'] += 1;
    }
    else if ( ctype_upper($c) ) {
		if($i==strlen($s)-1){
			
      $result['upper'] = 'error';
		}
		else{
		$result['upper'] += 1;	
		}
    }
    else if ( ctype_punct($c) ) {
      $result['punct'] += 1;
    }
	else if(ctype_space($c)){
	$result['spaces']+=1;	
	}
    else {
      $result['others'] += 1;
    }
  }
  return $result;
}

$f_namec=shorten($f_name);
if(strpos($f_namec,'.')!==false){
$f_namev=explode(".",$f_namec);
foreach($f_namev as $k=>$v){
if($v!='' AND is_numeric($v)){
if($v>2){
error($ecode[7]);
}
}
}
}



$l_namec=shorten($l_name);
if(strpos($l_namec,'.')!==false){
$l_namev=explode(".",$l_namec);
foreach($l_namev as $k=>$v){
if($v!='' AND is_numeric($v)){
if($v>2){
error($ecode[7]);
}
}
}
}



function domg($str,$ecode){
$strl=strlen($str);
$strc=lowercase_letters($str);
$strlc=$strc['lower']+$strc['spaces'];
$struc=$strc['upper']+$strc['spaces'];


if($strlc==$strl){$str=strtolower($str); $str=ucwords($str);}
else if($struc==$strl){$str=strtolower($str); $str=ucwords($str);}

if(strpos($str,' ')!==false){

$strd=explode(" ",$str);
foreach($strd as $k=>$v){
if($v!=''){

$strc=lowercase_lettersv($v);

if($strc['upper']>3){
error($ecode[8]);
}
else if($strc['upper']=='error' AND $strc['upper']!='0'){
error($ecode[8]);	
}
	
}
}
}

$strc=lowercase_lettersv($str);

if($strc['upper']>4){
error($ecode[8]);
}
else if($strc['upper']=='error' AND $strc['upper']!='0'){
error($ecode[8]);
}
return $str;
}

if(strlen($f_name)<2){error($ecode[10]);}
if(strlen($l_name)<2){error($ecode[10]);}

$f_name=domg($f_name,$ecode);
$l_name=domg($l_name,$ecode);


?>