<?php  

include("start.php");
?>
<?php
$x=0;


$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");

mysql_set_charset ('utf8' );

$termgotten=strtolower($_GET['term']);
$return_arr=array();



    $result=mysql_query("(SELECT * FROM political_parties WHERE LOWER(p)='".$termgotten."' ORDER BY (NOT (p LIKE '%".$termgotten."')) LIMIT 10) UNION (SELECT * FROM political_parties WHERE LOWER(p) LIKE '%".$termgotten."%' ORDER BY length(p) - length(replace(p, ' ', '')) ASC LIMIT 10)"); 	



	while ($ms=mysql_fetch_array($result)) {

		$ms_array['value'] =$ms['p'];
		
		$valuev=strtolower($ms['p']);
		$valuev=str_replace(" ","",$valuev);
		$valuev=preg_replace('/\W+/', '', $valuev);
		$ms_array['valuev'] = $valuev;
        array_push($return_arr,$ms_array);
$x++;

if($x>9){
break;
}
}

mysql_close($con);
echo json_encode($return_arr);
?>