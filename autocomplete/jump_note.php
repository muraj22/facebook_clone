<?php
include("start.php");
include("functions/checkforsmilies.php");

if(isset($_GET['fheader'])){
$fheader=$_GET['fheader'];	
}

$x=0;

if(isset($_GET['term'])){
$w=$_GET['term'];
}
else if(isset($_POST['term'])){
$w=$_POST['term'];	
}

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

if(isset($_POST['messages_search'])){
$return_arrv=array();
$return_arrvv=array();
}
$return_arr=array();
$termgotten=strtolower($w);
$termgotten=str_replace(' ','',$termgotten);

if(!isset($_GET['term']) && !isset($_POST['term'])){mysql_close($con); exit();}

if(!isset($_GET['friends']) && !isset($_POST['friends'])){
$max_single_total=5;
}
else{
$max_single_total=10;
}

if(isset($dmax) && $dmax<=10){
$max_single_total=$dmax;	
}

if(!isset($_POST['conversations'])){
$dq='';	
$dqv='';	
if(strlen($termgotten)<3){
$r=mysql_query("SELECT * FROM registered WHERE FIND_IN_SET(id,'$uid_friends_comma')>0 AND FIND_IN_SET(id,'$loaded')=0 AND LOWER(CONCAT(replace(f_name, ' ', ''),replace(l_name, ' ', ''))) LIKE '%" . $termgotten . "%' ORDER BY length(f_name) ASC LIMIT 5");
}

else{
$dq="(SELECT * FROM registered WHERE FIND_IN_SET(id,'$uid_friends_comma')>0 AND FIND_IN_SET(id,'$loaded')=0 AND LOWER(CONCAT(replace(f_name, ' ', ''),replace(l_name, ' ', ''))) LIKE '%" . $termgotten . "%' LIMIT $max_single_total)";

if(!isset($_GET['friends']) && !isset($_POST['friends'])){
    $dq.=" UNION (SELECT * FROM registered WHERE (FIND_IN_SET(id,'$loaded')=0 AND LOWER(CONCAT(replace(f_name, ' ', ''),replace(l_name, ' ', ''))) LIKE '%" . $termgotten . "%') LIMIT 10)";
}

if(isset($_GET['aemail']) && strpos($termgotten,"@")!==false){
$b_qf=return_bq("email_search");
$dq.=" UNION(SELECT * FROM registered as email_search WHERE email='$termgotten' $b_qf AND FIND_IN_SET(id,'$loaded')=0 LIMIT 1)"; //aca avanzar con la query (acorde a si la persona opto por que no todo el publica pueda ver su email
}
$r=mysql_query($dq); 
}
//inner join doesn't check on the second query for the same results gathered on the first query, also it is ordered outside the join :)

while ($m=mysql_fetch_array($r)) {

$uidv=$m['id'];
	
if(isset($_GET['gender'])){
$m_array["gender"]=$m['gender'];	
}
	
if(isset($_GET['location']) OR (isset($_GET['info_lines']) && !isset($line_already))){ //line already I might retrieve for work or education first

$b_qf=return_bq("living","current_city");
$r2=mysql_query("SELECT * FROM living WHERE id='$uidv' AND type='current_city' AND (visibility='v' OR visibility='h') $b_qf");
while($m2=mysql_fetch_array($r2)){
$statec=$m2['statec'];
$countryc=$m2['countryc'];
$cityc=$m2['cityc'];
$cityc=addslashes($cityc);
$cityc=addslashes($cityc);
if($cityc!=""){	
$f='';
}
}

$v="";

mysql_select_db("modules");
if(isset($f)){
$r2=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($m2=mysql_fetch_array($r2)){
$staten=$m2['staten'];	
}
$r2=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($m2=mysql_fetch_array($r2)){
$countryn=$m2['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$countryn;
}
unset($f);}

$m_array['location']=$v;
 mysql_select_db("registered");

	}
	
	if(isset($_GET['listid'])){
	$sbid=$_GET['listid'];
	$r2=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND id2='$uidv' AND listid='$sbid' AND visibility='v'");
	$c2=mysql_num_rows($r2);
	$m_array['dclass']=$c2;
	} //necessary to know if user is on list or not and apply corresponding class
	
		$m_array['nameid']='peep'.$x;
		$m_array['imgurl'] = '/'.$m['id'].'/pics/'.$m['profilepict'];
		$m_array['value'] = $m['fullname'];
		$m_array['url'] = $m['username'];

		if(isset($_POST['messages_search'])){
			if(in_array($m['id'],$uid_friends)){
			$m_array['type']="friends";
			}
			else{
			$m_array['type']="other_people";
			}
			
			$info_line='';
			
			$uidv=$m['id'];
			$c3=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM friends WHERE FIND_IN_SET(id2,'$uid_friends_comma')>0 AND id='$uidv' AND confirmed='y'"));
			$c3=$c3['c'];
			
			if($c3>0){
			if($c3>1){$sp='s';}
			else{$sp='';}
			$info_line.=$c3.' mutual friend'.$sp;	
			}
			if($m_array['location']!=""){
				if($info_line!=""){
				$info_line.='&183;';	
				}
			$info_line.=$m_array['location'];	
			}
			
			$m_array["response"]='<div style="color:#fff;font-weight:bold;min-width:480px;background:#7582b4;padding-top:5px;padding-left:20px;cursor:pointer;"><div class="clearfix"><div style="float:left;"><img src="/users/'.$m['id'].'/pics/'.$m['profilepict'].'" style="max-width:50px;"></div>
			<div style="float:left;margin-left:10px;">'.$m['fullname'].'<br>'.$info_line.'</div></div></div>';
}


		if(isset($_POST['chat'])){

if($m['status']=="1"){
$onlineclass="online";
$onlineclassv="wrappernombre";
$onlineball="";
}
else{
$onlineclass="offline";
$onlineclassv="wrappernombrev";
$onlineball="hidden_sb";
}
		$m_array['yk']=$m['id'];
		$m_array['onlineclassv']=$onlineclassv;
		$m_array['profilepict']=$m['profilepict'];
		$m_array['f_name']=$m['f_name'];
		$m_array['onlineclass']=$onlineclass;
		$m_array['onlineball']=$onlineball;
		}
		
		if(isset($_GET['list'])){
		$pref="p";	
		}
		else{$pref="";}
		$m_array['uidv'] = $pref.$m['id'];
		if(isset($_GET['photos_count'])){
		$did=$m['id'];
		$c2=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c2 FROM tags WHERE id3='$did' AND visibility='v'"));
		$c2=$c2['c2'];
		$tp=$c2;
		$m_array['tp']=$tp;
		}
		
		if(isset($_POST['messages_search'])){
		if($m_array['type']=="friends"){
		array_push($return_arrv,$m_array);	
		}
		else if($m_array['type']=="other_people"){
		array_push($return_arrvv,$m_array);	
		}
		}
		
		array_push($return_arr,$m_array);

$x++;


if($x>7 && isset($fheader)){
push_top();
$breakit="t";
break;
}
if(isset($breakit)){
break;	
}



}


if(isset($_GET['list'])){
$r=mysql_query("SELECT * FROM lists WHERE id='$uid' AND LOWER(listn) LIKE '%" . $termgotten . "%' LIMIT 5");
while($m=mysql_fetch_array($r)){
$m_array["location"]="list";

$m_array["nameid"]='list'.$x;	
$img=get_list_class($m['type']).'b';
$m_array["imgurl"]="/images/".$img.".png";
$m_array["value"]=$m['listn'];
$m_array["url"]=$m['sbid'];
$pref="l";
$m_array["uidv"]=$pref.$m['sbid'];
		if(isset($_GET['photos_count'])){
		$m_array["tp"]=0;
		}
				array_push($return_arr,$m_array);
$x++;


if($x>7 && isset($fheader)){
push_top();
$breakit="t";
break;
}
if(isset($breakit)){
break;	
}


}

}

if($x==0 && isset($_POST['chat'])){
$ms_array["yk"]=-1;
array_push($return_arr,$ms_array);
echo json_encode($return_arr);	
exit();
}

function push_top(){
global $return_arr;

$ms_array['nameid']='showtop';
		$ms_array['imgurl']='';
		$ms_array['value']='<div style="text-align:center;width:100%;color:#3b5998;" id="morerrv">See more results for '.$_GET['term'].'<br><span style="font-size:9px;color:gray;" id="morerrvv">Displaying top 8 results</span></div>';
		$ms_array['url']='search_friends.php?dquery='.$_GET['term'];
	    array_push($return_arr,$ms_array);
	
}

}

else if(isset($_POST['conversations'])){
include("functions/turndate_formessages.php");

$r=mysql_query("SELECT * FROM registered as dt WHERE LOWER(CONCAT(replace(f_name, ' ', ''),replace(l_name, ' ', ''))) LIKE '%" . $termgotten . "%' AND(SELECT COUNT(*) FROM commentsvv as dtv WHERE (id='$uid' OR id2='$uid') AND (dtv.id=dt.id OR dtv.id2=dt.id) )>0 LIMIT 10");

$dset="";
$dsetv="";
while($m=mysql_fetch_array($r)){
$dset.=",".$m['id'];
$dsetv.=",".$m['id'];
}

include("messages/conversations.php");

$g=0;
foreach($theresultsm as $k=>$v){
$ms_array["response"]=$v;
$ms_array["uidv"]=$k;
array_push($return_arr,$ms_array);	
	
	}

if(count($theresultsm)==0){
$ms_array["yk"]=-1;
$ms_array["term"]=$_POST['term'];
array_push($return_arr,$ms_array);	
}

}

if(isset($_POST['messages_search'])){
$return_arr=array_merge($return_arrv,$return_arrvv);	
}

echo json_encode($return_arr);


include("end.php");
?>