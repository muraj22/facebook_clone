<?php
ob_start("ob_gzhandler");
?>
<?php



$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");

$return_arr=array();
$termgotten=strtolower($_GET['term']);
$termgotten=trim($termgotten);
$termgotten=str_replace(",","",$termgotten);
$termgotten3=$termgotten;
$termgotten3=ucwords($termgotten3);
$termgotten3=addslashes($termgotten3);
if(strpos($termgotten," ")!==false){
$termgottenv=explode(" ",$termgotten);
$termgotten2=$termgottenv[0];
$explotado='';
}

$x=0;

$termgotten=str_replace(' ','',$termgotten);
if(!isset($termgotten2)){$termgotten2=$termgotten;}
$termgotten2=ucwords($termgotten2);





$resultv=mysql_query("SELECT countryc FROM countries WHERE countryn='$termgotten3'");
$counti=mysql_num_rows ($resultv);
if($counti>0){
	while($msv=mysql_fetch_array($resultv)){
		$countryf=$msv['countryc'];
		$countryf=strtolower($countryf);
		}
    $result=mysql_query("SELECT city,population,country,region FROM cities WHERE country='$countryf' ORDER BY population DESC LIMIT 100"); 	
}
else{
	$resultv=mysql_query("SELECT statec,countryc FROM states WHERE staten='$termgotten3'");
$counti=mysql_num_rows ($resultv);
if($counti>0){
	while($msv=mysql_fetch_array($resultv)){
		$statef=$msv['statec'];
		$statef=strtolower($statef);
		$countryf=$msv['countryc'];
		$countryf=strtolower($countryf);
		}
    $result=mysql_query("SELECT city,population,country,region FROM cities WHERE region='$statef' AND country='$countryf' ORDER BY population DESC LIMIT 100"); 	
}
else{
    $result=mysql_query("SELECT city,population,country,region FROM cities WHERE city LIKE '" . $termgotten2 . "%' ORDER BY population DESC LIMIT 1"); 
}
}
	while ($ms=mysql_fetch_array($result)) {
		
		$country=$ms['country'];
		$statec=$ms['region'];
		$statec=strtoupper($statec);
		$country=strtoupper($country);
		$result2=mysql_query("SELECT countryn FROM countries WHERE countryc='$country'");
		while($ms2=mysql_fetch_array($result2)){
		$countryn=$ms2['countryn'];	
		}
		
		$result3=mysql_query("SELECT staten FROM states WHERE statec='$statec' AND countryc='$country' LIMIT 1");
		while($ms3=mysql_fetch_array($result3)){
		$staten=$ms3['staten'];	
		}
		
$countryv=str_replace(" ","",$countryn);
$statenv=str_replace(" ","",$staten);
$countryv=strtolower($countryv);
$statenv=strtolower($statenv);

$city=$ms['city'];
$cityv=strtolower($city);
$cityv=str_replace(" ","",$cityv);

$city=addslashes($city);

if(isset($explotado)){
	
$queryv=$cityv.$countryv.$statenv;
$queryvv=$cityv.$statenv.$countryv;

if(strpos($queryv,$termgotten)!==false OR strpos($queryvv,$termgotten)!==false){
if($country=="US"){$ms_array['value']=$city.', '.$staten;}
else{
$ms_array['value']=$city.', '.$staten.', '.$countryn;
}
$ms_array['countryc'] = $country;
$ms_array['statec'] = $statec;
$ms_array['city'] = $city;
array_push($return_arr,$ms_array);
$x++;
}

		if($x>9){
break;
}
	
	
	}

else{
if($country=="US"){$ms_array['value']=$city.', '.$staten;}
else{
$ms_array['value']=$city.', '.$staten.', '.$countryn;
}
$ms_array['countryc'] = $country;
$ms_array['statec'] = $statec;
$ms_array['city'] = $city;
        array_push($return_arr,$ms_array);
$x++;
	
		if($x>9){
break;
}

}


}


mysql_close($con);
echo json_encode($return_arr);
while (@ob_end_flush());
?>