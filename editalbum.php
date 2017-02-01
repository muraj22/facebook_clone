<?php
include("start.php");
if(isset($_GET['c'])){

$albumid=$albumn;
$selected_album=$a;

if($albumid==""){$albumid="Untitled Album";}

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM albums WHERE sbid='$selected_album' AND (albumn='Photos' OR albumn='Profile Pictures' OR albumn='Videos' OR albumn='Wall Photos' OR albumn='Wall Pins')"));
if($c['c']>0){
}else{
    //no changes in privacy or albumn name for above albums
    mysql_query("UPDATE albums SET albumn='$albumid' WHERE sbid='$selected_album'");
    mysql_query("UPDATE media SET albumn='$albumid' WHERE albumid='$selected_album'");
}

if($location=="Where were these photos taken?"){$location='';}
if($descr=="Add details about this album..."){$descr='';}
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

$dea=mysql_query("UPDATE albums SET location='$location',descr='$descr',cityc='$cityc',statec='$statec',countryc='$countryc' WHERE sbid='$a'");
mysql_close($con);
exit();	
}
$params=array();

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM albums WHERE sbid='$a' AND (albumn='Photos' OR albumn='Profile Pictures' OR albumn='Videos' OR albumn='Wall Photos' OR albumn='Pins' OR albumn='Wall Pins')"));
if($c['c']>0){
    $params['can_edit']="f";
}else{
    $params['can_edit']="t";   
}

$r=mysql_query("SELECT * FROM albums WHERE sbid='$a'");
while($m=mysql_fetch_array($r)){
$params['albumn']=$m['albumn'];
$params['location']=$m['location'];
$params['cityc']=$m['cityc'];
$params['statec']=$m['statec'];
$params['countryc']=$m['countryc'];

$cityc=$m['cityc'];
$statec=$m['statec'];
$countryc=$m['countryc'];

$ms=$m;

$descv=$ms['descr'];

if(strpos($descv,"<b data-uidv")!==false){
    $html=$descv;
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    foreach ($xpath->evaluate("//*[@data-uidv]") as $node) {
        $utivv=sb_user($node->getAttribute("data-uidv"));
        $node->setAttribute("data-uidv","");
        $node->nodeValue = $utivv['fullname'];
    }
    $descv="";
    foreach ($xpath->evaluate("/html/body/node()") as $node) {
        $descv.=$dom->saveHTML($node);
    }

}

$descvv=$ms['descr'];

if(strpos($descvv,"<b data-uidv")!==false){
    $html=$descvv;
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    foreach ($xpath->evaluate("//*[@data-uidv]") as $node) {
        $utivv=sb_user($node->getAttribute("data-uidv"));
        $node->nodeValue = $utivv['fullname'];
    }
    $descvv="";
    foreach ($xpath->evaluate("/html/body/node()") as $node) {
        $descvv.=$dom->saveHTML($node);
    }

}


$params['descr']=$descv;
$params['descrv']=$descvv;

}

$v="";

$cityc=addslashes($cityc);
$cityc=addslashes($cityc);

if($cityc!="" && $cityc!="undefined"){	
$f='';
}
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
if(isset($f)){
$r=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($m=mysql_fetch_array($r)){
$staten=$m['staten'];	
}
$r=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($m=mysql_fetch_array($r)){
$countryn=$m['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$staten.', '.$countryn;
}
unset($f);}
mysql_select_db("registered");

$params['v']=$v;

$uidv=$uid;

$albumn=$params['albumn'];	


$ltypev="albums";
$uid_album_edit="t";
$peditablev="t";

$sbid=$a;
$albumid=$sbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$params["privacy"]='<ul class="uiList inlineBlock" style="position:relative;top:-2px;">';


$privacy_configuration="big";
$privacy_source="ea"; //gallery viewer

include("buttons/privacy_button.php");
$params["privacy"].=$button;
$params["privacy"].='</ul>';


echo json_encode($params);
include("end.php");
?>