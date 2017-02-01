<?php  

include("start.php");
?>
<?php


$employerv2=$_GET['employerv2'];

$return_arr=array();

$employerva=array();
if(strpos($employerv2,",")!==false){
$employervv=explode(",",$employerv2);
foreach($employervv as $k=>$v){
if($v!=''){
$valuev=strtoupper($v);
$valuev=str_replace(" ","",$valuev);
$valuev=preg_replace('/\W+/', '', $valuev);
$employerva[]=$valuev;	
}
}
}

$termgotten=$_GET['term'];
$termgotten=trim($termgotten);
$termgotten=ucwords($termgotten);

		$ms_array['value'] = $termgotten;
		$valuev=strtoupper($termgotten);
		$valuev=str_replace(" ","",$valuev);
		$valuev=preg_replace('/\W+/', '', $valuev);
		$ms_array['valuev'] = $valuev;
		$ms_array['imgurl'] = '/images/transparent.png';
		$ms_array['uidv'] = '';

		if(strpos($employerv2,$termgotten.',')!==false){}
		else if(!in_array($valuev,$employerva)){
        array_push($return_arr,$ms_array);
		}
		

$notes_tag='';
		
include("friends.php");

?>