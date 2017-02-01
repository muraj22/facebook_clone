<?php  
if(isset($_POST['starting'])){
include("start.php");
$alb=$_POST['alb']; 
$starting=$_POST['starting'];
$ending=$_POST['ending'];
}
else{
$starting=0;
$ending=15;	
$alb=$_GET['a'];
}
?>
<?php
$secho='';
$secho.='
<script type="text/javascript">
jsbreakvv=true;
';
$bydate=array();
$x=$starting+1;

$r=mysql_query("SELECT * FROM media WHERE albumid='$alb' AND id='$uid' AND visibility!='d' ORDER BY norder ASC LIMIT $starting,15");
$c=mysql_num_rows($r);

while($m=mysql_fetch_array($r)){

$sucv[$x]='';
$xpu=$x;


$aphotoid=$m['sbid'];
$owner=$m['id'];

$faces='{"tagged":[';
$r7=mysql_query("SELECT * FROM tags WHERE photoid='$aphotoid' AND id='$owner' AND (flag='w' OR flag='r') ORDER BY left2 ASC");
while($m7=mysql_fetch_array($r7)){

$widthp2=$m7['width2'];
$heightp2=$m7['height2'];
$topp2=$m7['top2'];

$topp2v=$heightp2/2;
$topp2=$topp2-$topp2v;
$leftpp2=$m7['left2'];

$leftpp2v=$widthp2/2;
$leftpp2=$leftpp2-$leftpp2v;

$faces.='{"width":"'.$m7['width2'].'","height":"'.$m7['height2'].'","positionX":"'.$leftpp2.'","positionY":"'.$topp2.'"},';

$c7=mysql_num_rows($r7);
if($c7>0){
$sucv[$x].='preaddok('.$c7.','.$xpu.');';
}

$spic=$m['picsr'];

$asize=getimagesize("users/".$uid.'/pics/'.$spic);
$awidth=$asize[0];
$aheight=$asize[1];

$topp2v=25*100;
$topp2v=$topp2v/$aheight;

$top_pos=$topp2-$topp2v;

$leftpp2v=25*100;
$leftpp2v=$leftpp2v/$awidth;

$left=$leftpp2-$leftpp2v;

$label=$m7['label2'];
$id=$m7['sbid'];
$ujs=$m7['id3'];
if($ujs==""){$ujs='n';}


$sucv[$x].='addok('.$xpu.',50,50,'.$topp2.','.$leftpp2.',\''.$label.'\','.$id.',\''.$ujs.'\');';

}
if(strpos($faces,",")!==false){
$faces=substr($faces,0,-1);
}
$faces.=']}';



$bydate[$x]=$m['norder'];
$photoid=$m['sbid'];
$actual_pic4=$m['picsr'];
$actual_pic=$m['pics'];
$actual_pic2=$m['picss'];
$actual_pic3=$m['picsa'];
$selected_album=$m['albumid'];
$albumn=$m['albumn'];
$location=$m['location'];

$target_path1 = "users/$uid/pics/";

$target_paths = $target_path1.$actual_pic4; 
$target_pathvv=$root.'/'.$target_paths;

$size = getimagesize($target_pathvv);
$width=$size[0];
$height=$size[1];

$target_path = $target_path1.$actual_pic; 
$target_pathv=$root.'/'.$target_path;

$size = getimagesize($target_pathv);
$widthv=$size[0];
$heightv=$size[1];
$descr=$m['descr'];
$descrv=$m['descr'];

$facesv=$faces;

$faces=$m['faces'];

$filter=$m['filter'];
$frame=$m['frame'];
$tilt_shift=$m['tilt_shift'];

$brightness=$m['total_brightness'];
$contrast=$m['total_contrast'];
$v="";

$result=mysql_query("SELECT * FROM media WHERE sbid='$photoid'");
while($ms=mysql_fetch_array($result)){
$sbid=$ms['sbid'];
$statec=$ms['statec'];
$countryc=$ms['countryc'];
$cityc=$ms['cityc'];
$cityc=addslashes($cityc);
$cityc=addslashes($cityc);
if($cityc!="" && $cityc!="undefined"){	
$f='';
}
}

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
if(isset($f)){
$rv=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($mv=mysql_fetch_array($rv)){
$staten=$mv['staten'];	
}
$rv=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($mv=mysql_fetch_array($rv)){
$countryn=$mv['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$staten.', '.$countryn;
}
unset($f);}

mysql_select_db("registered");

$sucd=array();

$sucd["actual_pic4"]=$actual_pic4;
$sucd["height"]=$height;
$sucd["photoid"]=$photoid;
$sucd["actual_pic4"]=$actual_pic4;
$sucd["actual_pic"]=$actual_pic;
$sucd["selected_album"]=$selected_album;
$sucd["albumn"]=$albumn;
$sucd["actual_pic"]=$actual_pic;
$sucd["actual_pic2"]=$actual_pic2;
$sucd["actual_pic3"]=$actual_pic3;
$sucd["actual_pic4"]=$actual_pic4;
$sucd["photoid"]=$photoid;
$sucd["location"]=$location;
$sucd["height"]=$height;
$sucd["width"]=$width;
$sucd["heightv"]=$heightv;
$sucd["widthv"]=$widthv;
$sucd["xr"]=$x;


if(strpos($descr,"<b data-uidv")!==false){
    $html=$descr;
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    foreach ($xpath->evaluate("//*[@data-uidv]") as $node) {
        $utivv=sb_user($node->getAttribute("data-uidv"));
        $node->nodeValue = $utivv['fullname'];
    }
    $descr="";
    foreach ($xpath->evaluate("/html/body/node()") as $node) {
        $descr.=$dom->saveHTML($node);
    }

}


if(strpos($descrv,"<b data-uidv")!==false){
    $html=$descrv;
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    foreach ($xpath->evaluate("//*[@data-uidv]") as $node) {
        $utivv=sb_user($node->getAttribute("data-uidv"));
        $node->nodeValue = $utivv['fullname'];
        $node->setAttribute("data-uidv","");

    }
    $descrv="";
    foreach ($xpath->evaluate("/html/body/node()") as $node) {
        $descrv.=$dom->saveHTML($node);
    }

}

$descra[$x]=$descr;
$descrva[$x]=$descrv;

$sucd["filter"]=$filter;
$sucd["frame"]=$frame;
$sucd["tilt_shift"]=$tilt_shift;
$sucd["statec"]=$statec;
$sucd["countryc"]=$countryc;
$sucd["cityc"]=$cityc;
$sucd["v"]=$v;
if(is_numeric($brightness) && $brightness>0){
$brightnessv=2;
}else{
$brightnessv=1;
}
if(is_numeric($contrast) && $contrast>0){
$contrastv=2;
}else{
$contrastv=1;
}
$sucd["brightness"]=$brightnessv;
$sucd["total_brightness"]=$brightness*2;
$sucd["contrast"]=$contrastv;
$sucd["total_contrast"]=$contrast*2;

$facesa[$x]=$faces;

$suc[$x]=$sucd;

$sucv[$x].='facedet_media("",'.$xpu.');';
$x++;
}
asort($bydate);

foreach($bydate as $key => $value){
$secho.='updateu(\''.json_encode($suc[$key]).'{}'.$facesa[$key].'{}'.$descra[$key].'{}'.$descrva[$key].'\');';
$secho.=$sucv[$key];

$secho.='';
}


$secho.='
	</script>';

if($c>0 && isset($_POST['starting'])){
echo $secho;
}
?>