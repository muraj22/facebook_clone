<?php  

include("start.php");
?>
<?php
$return_arr=array();

$termgotten=$_GET['term'];
$termgotten=trim($termgotten);
$termgotten=ucwords($termgotten);

		$ms_array['value'] = $termgotten;
		$valuev=strtolower($termgotten);
		$valuev=str_replace(" ","",$valuev);
		$valuev=preg_replace('/\W+/', '', $valuev);
		$ms_array['valuev'] = $valuev;
	

        array_push($return_arr,$ms_array);
	
echo json_encode($return_arr);
?>