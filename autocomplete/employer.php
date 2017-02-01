<?php  

include("start.php");
?>
<?php
$return_arr=array();

$employerv=$_GET['employerv'];
$employerv2=$_GET['employerv2'];

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