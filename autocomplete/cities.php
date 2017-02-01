<?php
include("start.php");
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");

$return_arr=array();
$return_arr2=array();
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
$y=0;

$termgottenv=str_replace(' ','',$termgotten);
if(!isset($termgotten2)){$termgotten2=$termgotten;}
$termgotten2=ucwords($termgotten2);


$dq='';

$resultv=mysql_query("SELECT countryc FROM countries WHERE countryn='$termgotten3'");
$counti=mysql_num_rows ($resultv);
if($counti>0){
	while($msv=mysql_fetch_array($resultv)){
		$countryf=$msv['countryc'];
		$countryf=strtolower($countryf);
		}
		$dq="(SELECT city,population,country,region FROM cities9 WHERE country='$countryf' ORDER BY population DESC LIMIT 10)";
    $result=mysql_query($dq); 	
}
else{
	$avx=0;
	$resultv=mysql_query("SELECT statec,countryc FROM states WHERE staten='$termgotten3' LIMIT 8");
$counti=mysql_num_rows ($resultv);
if($counti>0){
	while($msv=mysql_fetch_array($resultv)){
		$statef=$msv['statec'];
		$statef=strtolower($statef);
		$countryf=$msv['countryc'];
		$countryf=strtolower($countryf);
		if($avx==0){$dq.="(SELECT city,population,country,region FROM cities9 WHERE region='$statef' AND country='$countryf' ORDER BY population DESC LIMIT 8)";}
		else{$dq.="UNION (SELECT city,population,country,region FROM cities9 WHERE region='$statef' AND country='$countryf' ORDER BY population DESC LIMIT 8)";}
		$avx++;
		}
    $result=mysql_query($dq); 	
}
else{
$dq="(SELECT city,population,country,region FROM cities9 WHERE city='$termgotten2' ORDER BY population DESC LIMIT 10) UNION (SELECT city,population,country,region FROM cities9 WHERE city LIKE '" . $termgotten2 . "%' ORDER BY population DESC LIMIT 10) UNION (SELECT city,population,country,region FROM cities10 WHERE city LIKE '" . $termgotten2 . "%' LIMIT 10) ORDER BY population DESC LIMIT 10";

    $result=mysql_query($dq); 
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

if($y>9){break;}

if(strpos($queryv,$termgottenv)!==false OR strpos($queryvv,$termgottenv)!==false){
if($y<10){
if($country=="US"){$ms_array['value']=$city.', '.$staten;}
else{
$ms_array['value']=$city.', '.$staten.', '.$countryn;
}
$ms_array['countryc'] = $country;
$ms_array['statec'] = $statec;
$ms_array['city'] = $city;
array_push($return_arr2,$ms_array);
$x++;
$y++;
}
}
else if($x<10 AND $y<10){
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

$ok=array_merge($return_arr2,$return_arr);
$output = array_slice($ok, 0, 10); 


echo json_encode($output);

include("end.php");
?>