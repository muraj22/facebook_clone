<?php  
include("start.php");
?>
<?php
$x=0;

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");

$a_fv=$_GET['a_fv'];
$a_sv=$_GET['a_sv'];

$return_arr=array();

$a_fva=array();
if(strpos($a_fv,",")!==false){
$a_fvv=explode(",",$a_fv);
foreach($a_fvv as $k=>$v){
if($v!=''){
$a_fva[]=$v;	
}
}
}

$termgotten=strtolower($_GET['term']);
$termgotten=str_replace(' ','',$termgotten);
$termgotten=ucwords($termgotten);

    $result=mysql_query("SELECT * FROM languages WHERE language LIKE '%" . $termgotten . "%'"); 

	while ($ms=mysql_fetch_array($result)) {
		$ms_array['value'] = $ms['language'];
		$valuev=strtolower($ms['language']);
		$valuev=str_replace(" ","",$valuev);
		$valuev=preg_replace('/\W+/', '', $valuev);
		$ms_array['uidv'] = $valuev;
				if(strpos($a_sv,$termgotten.',')!==false){}
		else if(!in_array($valuev,$a_fva)){
        array_push($return_arr,$ms_array);
$x++;
		}
		

if($x>6){
break;
}
}

mysql_close($con);
echo json_encode($return_arr);
?>