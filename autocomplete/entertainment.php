<?php  

include("start.php");
?>
<?php

$employerv=$_GET['employerv'];
$employerv2=$_GET['employerv2'];

$return_arr=array();

$employerva=array();
if(strpos($employerv,",")!==false){
$employervv=explode(",",$employerv);
foreach($employervv as $k=>$v){
if($v!=''){
$employerva[]=$v;	
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
	

		if(strpos($employerv2,$termgotten.',')!==false){}
		else if(!in_array($valuev,$employerva)){
        array_push($return_arr,$ms_array);
		}
	
echo json_encode($return_arr);
?>