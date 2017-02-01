<?php  

include("start.php");
?>
<?php
$x=0;


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$return_arr=array();
$termgotten=strtolower($_GET['term']);
$termgotten=str_replace(' ','',$termgotten);

    $result=mysql_query("SELECT * FROM registered WHERE LOWER(CONCAT(replace(f_name, ' ', ''),replace(l_name, ' ', ''))) LIKE '%" . $termgotten . "%' ORDER BY length(f_name) ASC LIMIT 8"); 

	while ($ms=mysql_fetch_array($result)) {
		$ms_array['nameid']='peep'.$x;
		$ms_array['imgurl'] = '/'.$ms['id'].'/pics/'.$ms['profilepict'];
		$ms_array['value'] = $ms['fullname'];
		$ms_array['url'] = $ms['username'];
        array_push($return_arr,$ms_array);
$x++;

if($x>7){$ms_array['nameid']='showtop';
		$ms_array['imgurl']='';
		$ms_array['value']='<div style="text-align:center;width:100%;color:#3b5998;" id="morerrv">See more results for '.$_GET['term'].'<br><span style="font-size:9px;color:gray;" id="morerrvv">Displaying top 8 results</span></div>';
		$ms_array['url']='search_friends.php?dquery='.$_GET['term'];
	    array_push($return_arr,$ms_array);
break;
}
}

mysql_close($con);
echo json_encode($return_arr);
?>