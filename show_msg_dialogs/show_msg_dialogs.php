<?php
include("start.php");

$res=array();

if($w=="shared_album"){
$r=mysql_query("SELECT * FROM media WHERE albumid='$albumid' AND id='$uidv' AND visibility='v' AND nye='3' $media_qf ORDER BY datetimep DESC LIMIT 1");
while($m=mysql_fetch_array($r)){
$photoid=$m['sbid'];
}
$c=mysql_num_rows($r);
if($c==0){
exit();	
}
}

$r=mysql_query("SELECT * FROM media WHERE albumid='$albumid' AND sbid='$photoid' AND id='$uidv'");
while($m=mysql_fetch_array($r)){
$res["picsa"]=$m['picsa'];
$a=$m['picsa'];
$size=getimagesize("../users/$uidv/pics/$a");
$res["width"]=$size[0];
$res["height"]=$size[1];
$res["albumn"]=$m['albumn'];
$uti=sb_user($uidv);
$res["fullname"]=$uti['fullname'];


if(strpos($m['descr'],"<b data-uidv")!==false){
    $html=$m['descr'];
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    foreach ($xpath->evaluate("//*[@data-uidv]") as $node) {
        $utivv=sb_user($node->getAttribute("data-uidv"));
        $node->removeAttribute("data-uidv");
        $node->nodeValue = '';
        $newNode = $dom->createElement('div', '');
        $newNode->setAttribute('style','display:inline-block;');
        $oldNode = $node;

        $oldNode->parentNode->replaceChild($newNode, $oldNode);
        $div = $dom->createElement('div','&nbsp;');
        $div->setAttribute('class', 'lb');
        
        $anchor = $dom->createElement('a',$utivv['fullname']);
        $anchor->setAttribute('href', '/'.$utivv['username']);
        $anchor->setAttribute('hc', '');
        
        $div->appendChild($anchor);
        
        $newNode->appendChild($div);
        
    }
    
    $m['descr']="";
    foreach ($xpath->evaluate("/html/body/node()") as $node) {
        $m['descr'].=$dom->saveHTML($node);
    }
}

if(strlen($m['descr'])>300){
    $m['descr']=substr($m['descr'],0,240);
}
$res["descr"]=$m['descr'];
}

$uidv=$uid;
$ltypev="shares";
$sbid="";

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$res["privacy_button"]='<ul class="uiList inlineBlock" style="position:relative;top:0px;float:right;margin-right:5px;">';

$privacy_configuration="big";
$privacy_source="shares"; //edit profile

include("buttons/privacy_button.php");
$res["privacy_button"].=$button;
$res["privacy_button"].='</ul>';

echo json_encode($res);

include("end.php");
?>