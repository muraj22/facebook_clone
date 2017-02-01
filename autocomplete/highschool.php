<?php  

include("start.php");
?>
<?php
$return_arr=array();

$highschoolv=$_GET['highschoolv'];
$highschoolv2=$_GET['highschoolv2'];

$highschoolva=array();
if(strpos($highschoolv,",")!==false){
$highschoolvv=explode(",",$highschoolv);
foreach($highschoolvv as $k=>$v){
if($v!=''){
$highschoolva[]=$v;	
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
		if(strpos($highschoolv2,$termgotten.',')!==false){}
		else if(!in_array($valuev,$highschoolva)){
        array_push($return_arr,$ms_array);
		}
echo json_encode($return_arr);
?>