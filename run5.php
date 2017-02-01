<?php

$str='political_parties.txt';
$line3='INSERT INTO political_parties (p) VALUES ';
$lines = file($str);
foreach ($lines as $line_num => $line) {

$line=trim($line);

if(!empty($line)){
	

if(strpos($line,'[edit]')!==false){}
else{

if(strpos($line,':')!==false){
$oline=explode(":",$line);
$line=$oline[0];
}

if(strpos($line,'(')!==false){
$oline=explode("(",$line);
$line=$oline[0];
}


$x=0;

while($x<=9){

if(strpos($line,"[$x")!==false){
$oline=explode("[",$line);
$line=$oline[0];
}	

$x++;
}

$line=str_replace("[","(",$line);
$line=str_replace("]",")",$line);
$line=trim($line);

$line = preg_replace('/\s+/', ' ', $line);  




if(strlen($line)>1){

if(strlen($line)>100){
echo $line.'<br>';	
}



$line=addslashes($line);

$line3.='(\''.$line.'\'),';
}

}
	




}

}

$filename='insert_political_parties.php';

$fp = fopen($filename, 'w');
fwrite($fp, $line3);
fclose($fp);

?>