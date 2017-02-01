<?php  

include("start.php");
?>
<?php
$x=0;


$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");

$termgotten=strtolower($_GET['term']);
$termgotten=ucwords($termgotten);
$return_arr=array();



$notuc=array();
$notuc[]='Ceo';
$notuc[]='Tv';
$notuc[]='Mysql';
$notuc[]='PHP';
$notuc[]='Javascript';
$notuc[]='C.e';
$notuc[]='Vb.';
$notuc[]='Vb ';
$notuc[]='Vba';
$notuc[]='B2b';
$notuc[]='As4';
$notuc[]='Asp';
$notuc[]='.net';

foreach($notuc as $k=>$v){
if(strpos($termgotten,$v)!==false){$sr=''; $termgotten=strtolower($_GET['term']);}	
}

if(isset($sr)){
    $result=mysql_query("SELECT * FROM job_titles  WHERE LOWER(job) LIKE '%".$termgotten."%' ORDER BY (NOT (LOWER(job) LIKE '".$termgotten."%')) LIMIT 3"); 
}
else{
    $result=mysql_query("SELECT * FROM job_titles WHERE job LIKE '%".$termgotten."%' ORDER BY (NOT (job LIKE '".$termgotten ."%')) LIMIT 3"); 	
}

	while ($ms=mysql_fetch_array($result)) {
		$ms_array['value'] = $ms['job'];
		$valuev=strtolower($ms['job']);
		$valuev=str_replace(" ","",$valuev);
		$valuev=preg_replace('/\W+/', '', $valuev);
		$ms_array['valuev'] = $valuev;
        array_push($return_arr,$ms_array);
$x++;

if($x>2){
break;
}
}

mysql_close($con);
echo json_encode($return_arr);
?>