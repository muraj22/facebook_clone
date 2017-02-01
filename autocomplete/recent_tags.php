<?php
include("start.php");

$x=0;
$return_arr=array();

if(isset($_POST['a_fv'])){
    $_POST['loaded']=$_POST['a_fv'];
}
if(isset($_GET['a_fv'])){
    $_POST['loaded']=$_GET['a_fv'];
}

if(isset($_POST['loaded'])){
$loaded=$_POST['loaded'];
if(strpos($loaded,",")!==false){
$loaded=substr($loaded,1);	
}
}
else{
$loaded="";	
}

$r=mysql_query("SELECT DISTINCT id3 FROM tags WHERE id3!='' AND (id2='$uid' OR id='$uid') AND FIND_IN_SET(id3,'$loaded')=0 ORDER BY datetimep DESC limit 5");
	while ($m=mysql_fetch_array($r)) {
		$uti=sb_user($m['id3']);
		$m_array['nameid']='peep'.$x;
		$m_array['imgurl'] = '/'.$uti['id'].'/pics/'.$uti['profilepict'];
		$m_array['value'] = $uti['fullname'];
		$m_array['url'] = $uti['username'];
		$m_array['uidv'] = $uti['id'];
		$did=$m['id3'];
		$c2=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c2 FROM tags WHERE id3='$did' AND visibility='v'"));
		$c2=$c2['c2'];
		$tp=$c2;
		$m_array['tp']=$tp;
        array_push($return_arr,$m_array);
	$x++;
	}

echo json_encode($return_arr);

include("end.php");
?>