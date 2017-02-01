<?php  
if(!isset($notes_tag)){

include("start.php");
}
?>
<?php
if(isset($_COOKIE["login_cookie"])){
$uid=$_COOKIE["login_cookie"];
$uidv=$uid;
}


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

if(!isset($notes_tag)){
$return_arr = array();
}
$termgotten=strtolower($_GET['term']);
$termgotten=str_replace(' ','',$termgotten);


$x=0;
$result44=mysql_query("SELECT * FROM registered WHERE id='$uidv'");
	while ($ms44 = mysql_fetch_array($result44)) {
$prefullname=$ms44['f_name'].' '.$ms44['l_name'];
$fullname=$ms44['f_name'].' '.$ms44['l_name'];
$fullname=str_replace(' ','',$fullname);
$fullname=strtolower($fullname);
$thetag=$ms44['id'];
$thegender=$ms44['gender'];
$thepic=$ms44['profilepict'];

if(strpos($fullname,$termgotten)!==false){
$value=$prefullname;
$thetag2=$thetag;
$uidv=$thetag2;
$uidva=$uidv.'a';
$pics=$thepic;

if($x>10){break;}


if(isset($notes_tag)){
		if(!in_array($thetag2,$employerva)){	
		$ms_array['imgurl'] = '/'.$thetag2.'/pics/'.$pics;
		$ms_array['value'] = $value;
		$ms_array['uidv'] = $thetag2;
		$ms_array['valuev'] = '';	
        array_push($return_arr,$ms_array);
   $x++;	
		}
}

else{
		$ms_array['imgurl'] = '/'.$thetag2.'/pics/'.$pics;
		$ms_array['value'] = $value;
		$ms_array['uidv'] = $thetag2;		
        array_push($return_arr,$ms_array);
   $x++;
}


   
}
}






    $result = mysql_query("SELECT * FROM friends WHERE id='$uidv' AND confirmed='y' ORDER BY datetimep DESC"); 
	while ($ms = mysql_fetch_array($result)) {
$dfriend=$ms['id2'];
$result2=mysql_query("SELECT * FROM registered WHERE id ='$dfriend'");
	while ($ms2 = mysql_fetch_array($result2)) {
$prefullname=$ms2['f_name'].' '.$ms2['l_name'];
$fullname=$ms2['f_name'].' '.$ms2['l_name'];
$fullname=str_replace(' ','',$fullname);
$fullname=strtolower($fullname);
$thetag=$ms2['id'];
$thegender=$ms2['gender'];
$thepic=$ms2['profilepict'];
}
if(strpos($fullname,$termgotten)!==false){
$value=$prefullname;
$thetag2=$thetag;
$uidv=$thetag2;
$uidva=$uidv.'a';
$pics=$thepic;
if(isset($notes_tag)){
if($x>9){break;}
}
else{
if($x>10){break;}	
}		

if(isset($notes_tag)){
		if(!in_array($thetag2,$employerva)){	
		$ms_array['imgurl'] = '/'.$thetag2.'/pics/'.$pics;
		$ms_array['value'] = $value;
		$ms_array['uidv'] = $thetag2;
		$ms_array['valuev'] = '';	
        array_push($return_arr,$ms_array);
   $x++;	
		}
}

else{
		$ms_array['imgurl'] = '/'.$thetag2.'/pics/'.$pics;
		$ms_array['value'] = $value;
		$ms_array['uidv'] = $thetag2;		
        array_push($return_arr,$ms_array);
   $x++;
}

}
}


if(isset($notes_tag)){
		$ms_array['imgurl'] = '';
		$ms_array['value'] = '';
		$ms_array['uidv'] = '';
		$ms_array['valuev'] = '->last';
		        array_push($return_arr,$ms_array);		
}

mysql_close($con);
echo json_encode($return_arr);
?>