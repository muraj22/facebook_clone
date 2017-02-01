<?php  

include("start.php");
?>
<?php
$return_arr=array();

$collegev=$_GET['collegev'];
$collegev2=$_GET['collegev2'];

$collegeva=array();
if(strpos($collegev,",")!==false){
$collegevv=explode(",",$collegev);
foreach($collegevv as $k=>$v){
if($v!=''){
$collegeva[]=$v;	
}
}
}
$termgotten=$_GET['term'];
$termgotten=trim($termgotten);
$termgotten=ucwords($termgotten);

		$ms_array['value'] = $termgotten;
		$valuev=strtolower($termgotten);
		$valuev=str_replace(" ","",$valuev);
		$valuev=preg_replace('/\W+/', '', $valuev);
		$ms_array['valuev'] = $valuev;
		if(strpos($collegev2,$termgotten.',')!==false){}
		else if(!in_array($valuev,$collegeva)){
        array_push($return_arr,$ms_array);
		}
echo json_encode($return_arr);
?>