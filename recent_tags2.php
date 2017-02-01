<?php
include("start.php");

$x=0;

$return_arr=array();
$termgotten=strtolower($_GET['term']);
$termgotten=str_replace(' ','',$termgotten);

if(strlen($termgotten)<3){

$dq='';	
$ax=0;
$r3 = mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='y' ORDER BY datetimep DESC");
while($m3=mysql_fetch_array($r3)){
$dfriend=$m3['id2'];
if($ax==0){$dq.="AND (id='$dfriend'";}
else{$dq.="OR id='$dfriend'";}
$ax++;
}
if($dq!=''){$dq.="OR id='$uid')";}
else{
$dq="AND (id='$uid')";	
}

$r=mysql_query("SELECT * FROM registered WHERE LOWER(CONCAT(replace(f_name, ' ', ''),replace(l_name, ' ', ''))) LIKE '%" . $termgotten . "%' $dq ORDER BY length(f_name) ASC");
	while ($m=mysql_fetch_array($r)) {
		$m_array['nameid']='peep'.$x;
		$m_array['imgurl'] = '/'.$m['id'].'/pics/'.$m['profilepict'];
		$m_array['value'] = $m['fullname'];
		$m_array['url'] = $m['username'];
		$m_array['uidv'] = $m['id'];
        array_push($return_arr,$m_array);
$x++;

if($x>5){break;}
}

}

else{

$dq='';	
$dqv='';	
$ax=0;
$r3 = mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='y' ORDER BY datetimep DESC");
while($m3=mysql_fetch_array($r3)){
$dfriend=$m3['id2']; 
if($ax==0){$dq.="id='$dfriend'";}
else{$dq.=" OR id='$dfriend'";}
if($ax==0){$dqv.="id!='$dfriend'";}
else{$dqv.=" AND id!='$dfriend'";}
$ax++;
}
if($dq!=''){
$dq.=' AND ';	
}
if($dqv!=''){
$dqv.=' AND ';	
}


if($dq!=''){
$r=mysql_query("SELECT * FROM registered WHERE $dq LOWER(CONCAT(replace(f_name, ' ', ''),replace(l_name, ' ', ''))) LIKE '%" . $termgotten . "%' ORDER BY length(f_name) ASC");
	while ($m=mysql_fetch_array($r)) {
		$m_array['nameid']='peep'.$x;
		$m_array['imgurl'] = '/'.$m['id'].'/pics/'.$m['profilepict'];
		$m_array['value'] = $m['fullname'];
		$m_array['url'] = $m['username'];
		$m_array['uidv'] = $m['id'];
        array_push($return_arr,$m_array);
$x++;

if($x>5){break;}
}

}
}

    $r=mysql_query("SELECT * FROM registered WHERE $dqv LOWER(CONCAT(replace(f_name, ' ', ''),replace(l_name, ' ', ''))) LIKE '%" . $termgotten . "%' ORDER BY length(f_name) ASC"); 
$c=mysql_num_rows($r);

	while ($m=mysql_fetch_array($r)) {
		$m_array['nameid']='peep'.$x;
		$m_array['imgurl'] = '/'.$m['id'].'/pics/'.$m['profilepict'];
		$m_array['value'] = $m['fullname'];
		$m_array['url'] = $m['username'];
		$m_array['uidv'] = $m['id'];
        array_push($return_arr,$m_array);
$x++;

if($x>5){break;}
}




echo json_encode($return_arr);


include("end.php");
?>