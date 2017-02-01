<?php  
include("start.php");
?>
<?php
foreach($_POST as $k=>$v){
${$k}=$v;	
}
$r=mysql_query("SELECT * FROM namechange WHERE id='$uid'");
$c=mysql_num_rows($r);
if($c>4){mysql_close($con); exit();}

$ecode=array();
$ecode[1]='The name contains too many periods.';
$ecode[2]='The name contains invalid characters.';
$ecode[7]='The name contains too many repetitive characters.';
$ecode[8]='The name contains too many capital letters.';
$ecode[9]='The name contains too many characters.';
$ecode[10]='You must provide your full name.';

$r=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$pasbase=$m['password'];
}

//error codes: e1: The name contains too many periods. e2: The name contains invalid characters. e3 Wrong password. e4 You must provide a first name. You must provide a last name. e5 You must provide a first name. e6 You must provide a last name. e7 The name contains too many repetitive characters. e8 The name contains too many capital letters. e9 The name contains too many characters. e10 You must provide your full name.
if(strpos($f_name,'.')!==false OR strpos($l_name,'.')!==false OR strpos($m_name,'.')!==false){echo 'e1{}'.$ecode[1]; mysql_close($con); exit();}
$f_name = preg_replace ("/ +/", " ", $f_name);
$f_name = preg_replace ("/^ +/", "", $f_name);
$f_name = preg_replace ("/ +$/", "", $f_name);
$f_namec = preg_replace ("/ +/", "", $f_name);
$f_namecv=preg_replace('#[0-9]*#', '', $f_namec,-1,$count);
if($f_namec!=$f_namecv){
echo 'e2{}'.$ecode[2]; mysql_close($con); exit();		
}
$f_namec=preg_replace('/[_\W+]/', '', $f_namec,-1,$count);

if($count>0){
echo 'e2{}'.$ecode[2]; mysql_close($con); exit();	
}
$l_name = preg_replace ("/ +/", " ", $l_name);
$l_name = preg_replace ("/^ +/", "", $l_name);
$l_name = preg_replace ("/ +$/", "", $l_name);
$l_namec = preg_replace ("/ +/", "", $l_name);
$l_namecv=preg_replace('#[0-9]*#', '', $l_namec,-1,$count);
if($l_namec!=$l_namecv){
echo 'e2{}'.$ecode[2]; mysql_close($con); exit();		
}
$l_namec=preg_replace('/[_\W+]/', '', $l_namec,-1,$count);
if($count>0){
echo 'e2{}'.$ecode[2]; mysql_close($con); exit();	
}
$m_name = preg_replace ("/ +/", " ", $m_name);
$m_name = preg_replace ("/^ +/", "", $m_name);
$m_name = preg_replace ("/ +$/", "", $m_name);
$m_namec = preg_replace ("/ +/", "", $m_name);
$m_namecv=preg_replace('#[0-9]*#', '', $m_namec,-1,$count);
if($m_namec!=$m_namecv){
echo 'e2{}'.$ecode[2]; mysql_close($con); exit();		
}
$m_namec=preg_replace('/[_\W+]/', '', $m_namec,-1,$count);
if($count>0){
echo 'e2{}'.$ecode[2]; mysql_close($con); exit();	
}

if(strlen($f_name)>24){echo 'e9{}'.$ecode[9]; mysql_close($con); exit();}
else if(strlen($l_name)>24){echo 'e9{}'.$ecode[9]; mysql_close($con); exit();}
else if(strlen($m_name)>24){echo 'e9{}'.$ecode[9]; mysql_close($con); exit();}

$summedl=strlen($f_name)+strlen($l_name)+strlen($m_name);
if($summedl>48){echo 'e9{}'.$ecode[9]; mysql_close($con); exit();}

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
echo 'e7{}'.$ecode[7]; mysql_close($con); exit();
}
}
}
}

//para una funcion que chequee por duplicado de caracteres en los comments ojo que chequea por si es numerico y no habilitaria secuencias de numeros, editar ajustadamente

$l_namec=shorten($l_name);
if(strpos($l_namec,'.')!==false){
$l_namev=explode(".",$l_namec);
foreach($l_namev as $k=>$v){
if($v!='' AND is_numeric($v)){
if($v>2){
echo 'e7{}'.$ecode[7]; mysql_close($con); exit();
}
}
}
}

$m_namec=shorten($m_name);
if(strpos($m_namec,'.')!==false){
$m_namev=explode(".",$m_namec);
foreach($m_namev as $k=>$v){
if($v!='' AND is_numeric($v)){
if($v>2){
echo 'e7{}'.$ecode[7]; mysql_close($con); exit();
}
}
}
}

function domg($str,$con,$ecode){
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
echo 'e8{}'.$ecode[8]; mysql_close($con); exit();	
}
else if($strc['upper']=='error' AND $strc['upper']!='0'){
echo 'e8{}'.$ecode[8]; mysql_close($con); exit();	
}
	
}
}
}

$strc=lowercase_lettersv($str);

if($strc['upper']>4){
echo 'e8{}'.$ecode[8]; mysql_close($con); exit();	
}
else if($strc['upper']=='error' AND $strc['upper']!='0'){
echo 'e8{}'.$ecode[8]; mysql_close($con); exit();	
}
return $str;
}


if(strlen($f_name)<2){echo 'e10{}'.$ecode[10]; mysql_close($con); exit();}
if(strlen($l_name)<2){echo 'e10{}'.$ecode[10]; mysql_close($con); exit();}

$f_name=domg($f_name,$con,$ecode);
$m_name=domg($m_name,$con,$ecode);
$l_name=domg($l_name,$con,$ecode);

if(strlen($f_name)==0 AND strlen($l_name)==0){echo 'e4'; mysql_close($con); exit();}
else if(strlen($f_name)==0){echo 'e5'; mysql_close($con); exit();}
else if(strlen($l_name)==0){echo 'e6'; mysql_close($con); exit();}

if($m_name=='Optional'){$m_name='';}
if($m_name!=""){
$m_name=$m_name.' ';
$l_name=$m_name.$l_name;	
}

include("salt.php");
$password=crypt($password,$salt);
if($password!=$pasbase){echo 'e3'; mysql_close($con); exit();}

if($fullname>0 AND $mdexists==1){
mysql_query("UPDATE optionsv SET middlename='' WHERE id='$uid'");	
$mdexistsv='';

if($m_name!=""){
$pos = strpos($l_name,$m_name);
$l_name = substr_replace($l_name,'',$pos,strlen($m_name));
}

$l_name=trim($l_name);
}


if($m_name!='Optional' AND $m_name!="" AND !isset($mdexistsv)){
$fullname=$f_name.' '.$l_name;
}
else{
if(isset($mdexistsv)){$fullname=$fullname-1;}
if($fullname==0){
$wfullname=$fullname;
$fullname=$f_name.' '.$l_name;
}
else{
$wfullname=$fullname;
$fullname=$l_name.' '.$f_name;	
}	
}


if($m_name==""){
mysql_query("UPDATE optionsv SET middlename='' WHERE id='$uid'");		
}


$r=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$dbasef=$m['f_name'];
$dbasel=$m['l_name'];	
}

mysql_query("UPDATE registered SET f_name='$f_name',l_name='$l_name',fullname='$fullname' WHERE id='$uid'");
if($m_name!='Optional' AND $m_name!="" AND !isset($mdexistsv)){
$m_name=trim($m_name);
mysql_query("UPDATE optionsv SET middlename='$m_name' WHERE id='$uid'");
$l_name=str_replace($m_name,'',$l_name);
$l_name=trim($l_name);
echo 'middlein->'.$fullname.'->'.'
<option value="'.$f_name.' '.$m_name.' '.$l_name.'" id="mdexistsv">'.$f_name.' '.$m_name.' '.$l_name.'</option>
<option value="'.$f_name.' '.$l_name.'">'.$f_name.' '.$l_name.'</option>
<option value="'.$l_name.' '.$f_name.'">'.$l_name.' '.$f_name.'</option>'.
'->'.'0';
}
else{
$l_name=str_replace($m_name,'',$l_name);
$l_name=trim($l_name);
echo 'middleout->'.$fullname.'->'.'
<option value="'.$f_name.' '.$l_name.'">'.$f_name.' '.$l_name.'</option>
<option value="'.$l_name.' '.$f_name.'">'.$l_name.' '.$f_name.'</option>'.
'->'.$wfullname;	
}

$r=mysql_query("SELECT * FROM namechange WHERE id='$uid' ORDER BY datetimep DESC LIMIT 1");
$c=mysql_num_rows($r);
if($c==0){
$fln=$dbasef.' '.$dbasel;
mysql_query("INSERT INTO namechange (id,f_name,m_name,l_name,fullname,datetimep) VALUES ('$uid','$dbasef','','$dbasel','$fln',UNIX_TIMESTAMP())");
}

$r=mysql_query("SELECT * FROM namechange WHERE f_name='$f_name' AND m_name='$m_name' AND l_name='$l_name'");
$c=mysql_num_rows($r);
if($c==0){
mysql_query("INSERT INTO namechange (id,f_name,m_name,l_name,fullname,datetimep) VALUES ('$uid','$f_name','$m_name','$l_name','$fullname',UNIX_TIMESTAMP())");
}

?>
<?php include("end.php"); ?>