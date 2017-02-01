<?php  
include("php_safety.php");
$_GET=array_map('php_safety',$_GET);
$_POST=array_map('php_safety',$_POST);
//this is done for uidv_friends to be defined properly
include("start.php");

include("functions/sb_user.php");
include("functions/simplify_video_duration.php");
?>
<?php
include("functions/video_title_in_date.php");

include("functions/td_fn.php");

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");


$pt=$_POST['pt'];
$albumid=$_POST['albumid'];
$uidv=$_POST['uidv'];
$uidvv=$_POST['uidvv'];

$p=$_POST['p'];
if(strlen($p)<7 AND $albumid!="media" AND $_POST['pt']!="pt" AND $_POST['pt']!="pti"){

$pv=$p-1;
$r=mysql_query("SELECT * FROM media WHERE id='$uidv' AND albumid='$albumid' AND visibility='v' AND nye='3' $media_qf ORDER BY norder ASC LIMIT $pv,1");	
	
while($m=mysql_fetch_array($r)){
$p=$m['sbid'];	
$pd=$m['sbid'];
}

}
else if(strlen($p)<7 AND $albumid=="media"){
$pv=$p-1;

if($_POST['repin']!=2){
    $r=mysql_query("SELECT * FROM media WHERE id='$uidv' AND visibility='v' and nye='3' AND pin='1' $media_qf ORDER BY datetimep ASC LIMIT $pv,1");
}else{
    $rv=mysql_query("SELECT * FROM repinw as dt WHERE id2='$uidvvv' AND repins='1' AND what='photo' AND (SELECT COUNT(*) FROM media WHERE sbid=dt.likeid AND visibility='v' AND nye='3' AND pin='2' $media_qf ORDER BY datetimep ASC LIMIT $pv,1)>0");
    while($mv=mysql_fetch_array($rv)){
        $dsbid=$mv['likeid'];    
    }
    $r=mysql_query("SELECT * FROM media WHERE sbid='$dsbid' AND visibility='v' and nye='3' AND pin='1' $media_qf");
}


while($m=mysql_fetch_array($r)){
$p=$m['sbid'];
$pd=$m['sbid'];
}

}
else if(strlen($p)<7 AND $_POST['pt']=="pt" || $_POST['pt']=="pti"){
if($_POST['pt']=="pti"){$aq="AND albumid='$albumid'";}
else{$aq='';}

$pv=$p-1; 
$r=mysql_query("SELECT * FROM tags as dt WHERE id3='$uidvv' $aq AND visibility='v' $tags_qf ORDER BY datetimep ASC LIMIT $pv,1");
while($m=mysql_fetch_array($r)){
$p=$m['photoid'];
$pd=$m['photoid'];
$a=$m['albumid'];
$o=$m['id'];
$r2=mysql_query("SELECT * FROM media WHERE albumid='$a' AND sbid='$p' AND id='$o'  and nye='3'");
while($m2=mysql_fetch_array($r2)){
$p=$m2['sbid'];

$albumid=$m2['albumid'];	
}
}
}


$result=mysql_query("SELECT * FROM registered WHERE id='$uidv'");
while($ms=mysql_fetch_array($result)){
$fullname=$ms['fullname'];	
$profilephoto=$ms['profilepict'];
$unv=$ms['username'];
if($unv==''){$unv=$uidv;}
}
if($albumid=="media"){
$result=mysql_query("SELECT * FROM media WHERE id='$uidv' AND sbid='$p' and nye='3' $media_qf");
while($ms=mysql_fetch_array($result)){
$photoid=$ms['sbid'];

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

$desc=$ms['descr'];

if(strpos($desc,"<b data-uidv")!==false){
    $html=$desc;
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
    $desc="";
    foreach ($xpath->evaluate("/html/body/node()") as $node) {
        $desc.=$dom->saveHTML($node);
    }

}

$desc=str_replace("&nbsp;","",$desc);

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

$location=$ms['location'];
$datetimep=$ms['datetimep'];
$albumidt=$ms['albumn'];
$norder=$ms['sbid'];
$albumidi=$ms['albumid'];
$thephotom=$ms['picsa'];
$dphoto=$ms['pics'];
$locationsetby=$ms['locationsetby'];
$vids=$ms['vids'];
$vidshd=$ms['vidshd'];
$swidth=$ms['videow'];
$sheight=$ms['videoh'];
}

}
else{
$result=mysql_query("SELECT * FROM media WHERE id='$uidv' AND albumid='$albumid' AND sbid='$p' and nye='3' $media_qf");
while($ms=mysql_fetch_array($result)){
$photoid=$ms['sbid'];
$vids=$ms['vids'];
$vidshd=$ms['vidshd'];
$swidth=$ms['videow'];
$sheight=$ms['videoh'];

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

$desc=$ms['descr'];

if(strpos($desc,"<b data-uidv")!==false){
    $html=$desc;
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
    $desc="";
    foreach ($xpath->evaluate("/html/body/node()") as $node) {
        $desc.=$dom->saveHTML($node);
    }

}

$desc=str_replace("&nbsp;","",$desc);

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

$location=$ms['location'];
$datetimep=$ms['datetimep'];
$albumidt=$ms['albumn'];
$norder=$ms['norder'];	
$albumidi=$ms['albumid'];
$thephotom=$ms['picsa'];
$dphoto=$ms['pics'];
$locationsetby=$ms['locationsetby'];
}
}

if($albumid=="media"){

    if($_POST['repin']!=2){
        $xg=mysql_fetch_array(mysql_query("SELECT COUNT(*) as xg FROM media WHERE id='$uidv' AND visibility='v' and nye='3' AND albumn!='Photos' AND albumn!='Pins' AND pin='1' $media_qf"));
        $xg=$xg['xg'];
    }else{
        $xg=mysql_fetch_array(mysql_query("SELECT COUNT(*) as xg FROM repinw as dt WHERE id2='$uidvvv' AND repins='1' AND what='photo' AND (SELECT COUNT(*) as cv FROM media WHERE sbid=dt.likeid AND visibility='v' AND nye='3' AND albumn!='Photos' AND albumn!='Pins' $media_qf)>0"));
        $xg=$xg['xg'];
    }
}
else{
$result=mysql_query("SELECT * FROM media WHERE id='$uidv' AND albumid='$albumid' AND visibility='v' and nye='3' $media_qf");
$xg=mysql_num_rows($result);
}




if($vids==""){
$size=getimagesize("users/".$uidv."/pics/".$dphoto);
$swidth=$size[0];
$sheight=$size[1];
}

$target_pathv="users/".$uidv."/pics/".$thephotom;
$thesize=getimagesize($target_pathv);
$thewidth=$thesize[0];
$theheight=$thesize[1];

$datetimept=td_fn($datetimep);
$datetimeptv=rtd($datetimep);
$datetimeptvv=$datetimep;

$tshares='';

$counter=mysql_fetch_array(mysql_query("SELECT COUNT(*) AS counter FROM shares WHERE id2='$uidv' AND elemid='$photoid' AND whatisit='shared_photo' AND visibility='v'"));
$tshares=$counter['counter'];



$osize=getimagesize("users/".$uidv."/pics/".$dphoto);
$a_width=$osize[0];
$a_height=$osize[1];

$g='';
if($_POST['info_album']=='t'){



if($pt=="pt" || $pt=="pti"){

if($pt=="pti"){$aq="AND albumid='$albumid'";}
else{$aq='';}

$r=mysql_query("SELECT * FROM tags WHERE id3='$uidvv' $aq AND visibility='v' AND photoid='$photoid'");
while($m=mysql_fetch_array($r)){
$datetimep_t=$m['datetimep'];	
}

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM tags as dt WHERE id3='$uidvv' $aq AND visibility='v' AND datetimep<$datetimep_t $tags_qf"));
$c_pos=$c['c']+1;

$r=mysql_query("SELECT * FROM tags as dt WHERE id3='$uidvv' $aq AND visibility='v' AND datetimep<=$datetimep_t AND photoid!='$photoid' $tags_qf ORDER BY datetimep DESC LIMIT 12");
$c=mysql_num_rows($r);

$ec=$c_pos-$c;

$r=mysql_query("(SELECT * FROM tags as dt WHERE id3='$uidvv' $aq AND visibility='v' AND datetimep<=$datetimep_t AND photoid!='$photoid' $tags_qf ORDER BY datetimep DESC LIMIT 12) UNION (SELECT * FROM tags as dt WHERE id3='$uidvv' $aq AND visibility='v' AND datetimep>$datetimep_t $tags_qf ORDER BY datetimep ASC LIMIT 12) UNION (SELECT * FROM tags WHERE id3='$uidvv' $aq AND visibility='v' AND photoid='$photoid') ORDER BY datetimep ASC");	

while($m=mysql_fetch_array($r)){

$dalbum=$m['albumid'];
$dphotoid=$m['photoid'];
$owner=$m['id'];

$rtq=mysql_query("SELECT * FROM media WHERE albumid='$dalbum' AND id='$owner' AND sbid='$dphotoid' and nye='3'");

$uti=sb_user($owner);
$pp=$uti['profilepict'];
$un=$uti['username'];
$fn=$uti['fullname'];

$dd=$dalbum;
while($mtq=mysql_fetch_array($rtq)){ //rtq = tags query
$dtc=$mtq['datetimep'];
$dtct=td_fn($dtc);
$dtcv=rtd($dtc);
$g.='<>';
$g.='::'.$mtq['pics'];
$b=$mtq['pics'];
if($mtq['vids']!=''){
$c=$mtq['videow'];
$d=$mtq['videoh'];
}
else{
$a=getimagesize("users/$owner/pics/$b");
$c=$a[0];
$d=$a[1];
}
$g.='::'.$c;
$g.='::'.$d;
$g.='::'.$dd;
$g.='::'.$owner;
$g.='::'.$m['photoid'];
$anid=$m['photoid'];
$r10=mysql_query("SELECT * FROM likew WHERE likeid='$anid' AND what='photo' AND id2='$uid' AND likes='1'");
$g.='::'.mysql_num_rows($r10);
$r10=mysql_query("SELECT * FROM repinw WHERE likeid='$anid' AND what='photo' AND id2='$uid' AND repins='1'");
$g.='::'.mysql_num_rows($r10);
$g.='::'.$m['albumid'];
$g.='::'.$mtq['albumn'];
$g.='::'.$pp;
$g.='::'.$un;
$g.='::'.$fn;
$g.='::'.$dtct; //display
$g.='::'.$dtcv; //title
$g.='::'.$dtc; //original time
$r4=mysql_query("SELECT * FROM likew WHERE likeid='$anid' AND what='photo' AND id='$owner' AND likes='1'");
$g.='::'.mysql_num_rows($r4);
$r4=mysql_query("SELECT * FROM repinw WHERE likeid='$anid' AND what='photo' AND id='$owner' AND repins='1'");
$g.='::'.mysql_num_rows($r4);
$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM comments as dt WHERE elemid='$anid' AND type='photo' AND visibility='v' AND (SELECT COUNT(*) FROM hidden_stories as e WHERE id='$uid' AND whatisit='comment' AND hidden='1' AND e.likeid=dt.sbid)=0"));
$c=$c['c'];
//$r4=mysql_query("SELECT * FROM comments WHERE elemid='$anid' AND visibility='v'");
$g.='::'.$c;
$v=$mtq['vids'];
$vh=$mtq['vidshd'];
$vt=$mtq['title'];
if($v!="" && $vt==""){
$vt=video_title_in_date($m['datetimep']);
}
$vl=simplify_video_duration($mtq['duration']);
$g.='::'.$v;
$g.='::'.$vh;
$g.='::'.$vt;
$g.='::'.$vl;
$g.='::'.$mtq['faces'];
$aphotoid=$mtq['sbid'];
$faces='{"tagged":[';
$r7=mysql_query("SELECT * FROM tags WHERE photoid='$aphotoid' AND id='$owner' AND (flag='w' OR flag='r') AND visibility='v' ORDER BY left2 ASC");
while($m7=mysql_fetch_array($r7)){

$widthp2=$m7['width2'];
$heightp2=$m7['height2'];
$topp2=$m7['top2'];

$topp2v=$heightp2/2;
$topp2=$topp2-$topp2v;
$leftpp2=$m7['left2'];

$leftpp2v=$widthp2/2;
$leftpp2=$leftpp2-$leftpp2v;

$tid=$m7['id3'];
if($tid!=""){
$ttp=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM tags WHERE id3='$tid' AND visibility='v' AND (flag='w' OR flag='r')"));
$ttp=$ttp['c'];
	
$utit=sb_user($tid);
$tun=$utit['username'];
$tufn=$utit['fullname'];
}
else{
$ttp="";
$tun="";
$tufn="";
}


$tb_id=$m7['id2'];
$uti_tb=sb_user($tb_id);
$tb_fn=$uti_tb['fullname'];
$tb_un=$uti_tb['username'];

$grs=grs(12);
$faces.='{"width":"'.$m7['width2'].'","height":"'.$m7['height2'].'","positionX":"'.$leftpp2.'","positionY":"'.$topp2.'","tagid":"'.$grs.'","id":"'.$tid.'","un":"'.$tun.'","ufn":"'.$tufn.'","tp":"'.$ttp.'","tb":"'.$tb_id.'","tb_fn":"'.$tb_fn.'","tb_un":"'.$tb_un.'","label":"'.$m7['label2'].'"},';
}
if(strpos($faces,",")!==false){
$faces=substr($faces,0,-1);
}
$faces.=']}';
$g.='::'.$faces;

$dlocation=$mtq['location'];
$dalbumid=$mtq['albumid'];

if($dlocation==""){
$r11=mysql_query("SELECT * FROM albums WHERE sbid='$dalbumid' AND id='$owner'");
while($m11=mysql_fetch_array($r11)){
$dlocation=$m11['location'];	
}
}

$g.='::-}'.$dlocation;
$g.='::'.$mtq['locationsetby'];

$g.='::'.$mtq['filter'];
$g.='::'.$mtq['tilt_shift'];
$g.='::'.$mtq['frame'];




$albumn=$mtq['albumn'];	

if($uid==$uidv){
$uid_album_edit="t";
}
else{
$uid_album_edit="f";
}


$ltypev="media"; //en este caso chupa un huevo, se va a hacer toggle en click de editalbum
$peditablev="f"; //se trata de fotos solamente, no posibilidad de poder editar por ser un post a el news feed

$sbid=$mtq['sbid'];
$albumid=$mtq['albumid'];

if($albumn=="Photos" || $albumn=="Pins"){
$photos_id=$mtq['id2'];	
}
$nfjax="";
$data_t='data-t_align="middle"';

$dprivacy='<ul class="audienceSelectorv uiList inlineBlock" style="margin-left:4px;position:relative;top:0px;">';


$privacy_configuration="small";
$privacy_source="gv"; //gallery viewer

include("buttons/privacy_button.php");
$dprivacy.=$button;
$dprivacy.='</ul>';





$g.='::'.$dprivacy;



$c5=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c5 FROM albums as dt WHERE sbid='$dalbumid' AND id='$owner' $a_qf"));
$c5=$c5['c5'];

$g.='::'.$c5; //$good_privacy this is to check whether a link to the album can be put


$ltype='photo';
$wp_table='like';
$likeid=$m['photoid'];
$owner_c=$owner;

$ds='block';
$pdlv='0';

include("stories/with_plugin.php");

if($anx==1 && $wp_me!="me"){
$ps='s';
}
else{$ps='';}

if($with!=""){
$with=$with.' <span class="lthis">like'.$ps.' this.</span>'; 
}

$g.='::'.$with;

$ltype='photo';
$wp_table='repin';
$likeid=$m['photoid'];
$owner_c=$owner;

$ds='block';
$pdlv='0';

include("stories/with_plugin.php");

if($with!=""){
    $with=$with.' <span class="lthis">repinned this.</span>'; 
}

$g.='::'.$with;


$_POST['variation']="photo";
$_POST['piclikeval']=0;
$_POST['ltypev']="comment";
$_POST['uidv']=$owner;
$_POST['sbid']=$mtq['sbid'];
$_POST['aquery']=0;
$_POST['aqueryv']=6;
$_POST['na']=0; //newly added

$from="getnext";
include("loadpcomment2.php");

$cp=$totresp;
$g.='::'.$cp; //comments parsed
$g.='::'.$actual_comments; //actual comments

$v="";
$cityc="";
$statec="";
$countryc="";

$rvd=mysql_query("SELECT * FROM albums WHERE sbid='$dalbumid'");
while($mvd=mysql_fetch_array($rvd)){
$cityc=$mvd['cityc'];
$statec=$mvd['statec'];
$countryc=$mvd['countryc'];

$cityc=addslashes($cityc);
$cityc=addslashes($cityc);	
}


if($cityc!="" && $cityc!="undefined"){	
$f='';
}
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
if(isset($f)){
$rvd=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($mvd=mysql_fetch_array($rvd)){
$staten=$mvd['staten'];	
}
$rvd=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($mvd=mysql_fetch_array($rvd)){
$countryn=$mvd['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$staten.', '.$countryn;
}
unset($f);}

mysql_select_db("registered");
$rvd=mysql_query("SELECT * FROM media WHERE sbid='$anid'");
while($mvd=mysql_fetch_array($rvd)){
$cityc=$mvd['cityc'];
$statec=$mvd['statec'];
$countryc=$mvd['countryc'];

$cityc=addslashes($cityc);
$cityc=addslashes($cityc);	
}

if($cityc!="" && $cityc!="undefined"){	
$f='';
}
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
if(isset($f)){
$rvd=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($mvd=mysql_fetch_array($rvd)){
$staten=$mvd['staten'];	
}
$rvd=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($mvd=mysql_fetch_array($rvd)){
$countryn=$mvd['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$staten.', '.$countryn;
}
unset($f);}

mysql_select_db("registered");

$g.='::'.$v;
$g.='::'.$cityc;
$g.='::'.$statec;
$g.='::'.$countryc;

$g.='::'.$mtq['pin'];
$g.='::'.$mtq['total_brightness']*2;
if(is_numeric($mtq['total_brightness']) AND $mtq['total_brightness']>0){
$g.='::2';
}else{
$g.='::1';
}
$g.='::'.$mtq['total_contrast']*2;
if(is_numeric($mtq['total_contrast']) AND $mtq['total_contrast']>0){
$g.='::2';
}else{
$g.='::1';
}
$g.='::'.$ec;


$ec++;
}

}


}	

else{
	
$uti=sb_user($uidv);
$pp=$uti['profilepict'];
$un=$uti['username'];
$fn=$uti['fullname'];

if($albumid=="media"){

    if($_POST['repin']==2){
        $c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM repinw as dt WHERE id2='$uidvvv' AND repins='1' AND what='photo' AND (SELECT COUNT(*) as cv FROM media WHERE sbid=dt.likeid AND visibility='v' AND datetimep<$datetimep and nye='3' AND albumn!='Photos' AND albumn!='Pins' $media_qf)>0"));
        $c_pos=$c['c']+1;
        
        $rv=mysql_query("SELECT * FROM repinw WHERE id2='$uidvvv' AND repins='1' AND what='photo' AND likeid!='$photoid'");
        $did='';
        while($mv=mysql_fetch_array($rv)){
        $did.=','.$mv['likeid'];    
        }
        if(strpos($did,",")!==false){
         $did=substr($did,1);   
        }
      
        $r=mysql_query("SELECT * FROM media WHERE FIND_IN_SET(sbid,'$did')>0 AND visibility='v' AND datetimep<=$datetimep AND sbid!='$photoid' and nye='3' AND albumn!='Photos' AND albumn!='Pins' $media_qf ORDER BY datetimep DESC LIMIT 12");
        $c=mysql_num_rows($r);
       
        $ec=$c_pos-$c;
                
        $r=mysql_query("(SELECT * FROM media WHERE FIND_IN_SET(sbid,'$did')>0 AND visibility='v' AND datetimep<=$datetimep AND sbid!='$photoid' and nye='3' AND albumn!='Photos' AND albumn!='Pins' $media_qf ORDER BY datetimep DESC LIMIT 12) UNION (SELECT * FROM media WHERE FIND_IN_SET(sbid,'$did')>0 AND visibility='v' AND datetimep>$datetimep and nye='3' AND albumn!='Photos' AND albumn!='Pins' $media_qf ORDER BY datetimep ASC LIMIT 12) UNION (SELECT * FROM media WHERE visibility='v' AND sbid='$photoid' and nye='3' AND albumn!='Photos' AND albumn!='Pins' $media_qf) ORDER BY datetimep ASC");	   
     }
    else{
        $c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM media WHERE id='$uidv' AND visibility='v' AND datetimep<$datetimep and nye='3' AND albumn!='Photos' AND albumn!='Pins' AND pin!='2' $media_qf"));
        $c_pos=$c['c']+1;
        
        
        $r=mysql_query("SELECT * FROM media WHERE id='$uidv' AND visibility='v' AND datetimep<=$datetimep AND sbid!='$photoid' and nye='3' AND albumn!='Photos' AND albumn!='Pins' AND pin!='2' $media_qf ORDER BY datetimep DESC LIMIT 12");
        $c=mysql_num_rows($r);

        $ec=$c_pos-$c;

        $r=mysql_query("(SELECT * FROM media WHERE id='$uidv' AND visibility='v' AND datetimep<=$datetimep AND sbid!='$photoid' and nye='3' AND albumn!='Photos' AND albumn!='Pins' AND pin!='2' $media_qf ORDER BY datetimep DESC LIMIT 12) UNION (SELECT * FROM media WHERE id='$uidv' AND visibility='v' AND datetimep>$datetimep and nye='3' AND albumn!='Photos' AND albumn!='Pins' AND pin!='2' $media_qf ORDER BY datetimep ASC LIMIT 12) UNION (SELECT * FROM media WHERE id='$uidv' AND visibility='v' AND sbid='$photoid' and nye='3' AND albumn!='Photos' AND albumn!='Pins' AND pin!='2' $media_qf) ORDER BY datetimep ASC");	
    }

}
else{
	//here limit to 25, allow for pagination somehow. -it'd be the best for it not to be slow
$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM media WHERE id='$uidv' AND albumid='$albumidi' AND visibility='v' AND nye='3' AND norder<$norder $media_qf"));
$c_pos=$c['c']+1;

$r=mysql_query("SELECT * FROM media WHERE id='$uidv' AND albumid='$albumidi' AND sbid!='$photoid' AND visibility='v' AND nye='3' AND norder<=$norder $media_qf ORDER BY norder DESC LIMIT 12"); //un count * retorna todos, averiguar por que si se puede arreglar, es como que no respeta el limit
$c=mysql_num_rows($r);

$r=mysql_query("(SELECT * FROM media WHERE id='$uidv' AND albumid='$albumidi' AND visibility='v' AND sbid!='$photoid' AND nye='3' AND norder<=$norder $media_qf ORDER BY norder DESC LIMIT 12) UNION (SELECT * FROM media WHERE id='$uidv' AND albumid='$albumidi' AND visibility='v' AND norder>$norder AND nye='3' $media_qf ORDER BY norder ASC LIMIT 12) UNION (SELECT * FROM media WHERE id='$uidv' AND albumid='$albumidi' AND visibility='v' AND sbid='$photoid' AND nye='3' $media_qf) ORDER by norder ASC");	
$ec=$c_pos-$c;

}
$dd=$albumid;
while($m=mysql_fetch_array($r)){
    
    if($_POST['repin']==2){
        $uti=sb_user($m['id']);
        $pp=$uti['profilepict'];
        $un=$uti['username'];
        $fn=$uti['fullname'];   
    }
    
$dtc=$m['datetimep'];
$dtct=td_fn($dtc);
$dtcv=rtd($dtc);
$g.='<>';
$g.='::'.$m['pics'];
$b=$m['pics'];
if($m['vids']!=''){
$c=$m['videow'];
$d=$m['videoh'];
}
else{
$a=getimagesize("users/".$m['id']."/pics/$b");
$c=$a[0];
$d=$a[1];
}
$g.='::'.$c;
$g.='::'.$d;
$g.='::'.$dd;
$g.='::'.$m['id'];
$g.='::'.$m['sbid'];
$anid=$m['sbid'];
$r10=mysql_query("SELECT * FROM likew WHERE likeid='$anid' AND what='photo' AND id2='$uid' AND likes='1'");
$g.='::'.mysql_num_rows($r10);
$r10=mysql_query("SELECT * FROM repinw WHERE likeid='$anid' AND what='photo' AND id2='$uid' AND repins='1'");
$g.='::'.mysql_num_rows($r10);
$g.='::'.$m['albumid'];
$g.='::'.$m['albumn'];
$g.='::'.$pp;
$g.='::'.$un;
$g.='::'.$fn;
$g.='::'.$dtct; //display
$g.='::'.$dtcv; //title
$g.='::'.$dtc; //original time

$duser=$m['id'];

$r4=mysql_query("SELECT * FROM likew WHERE likeid='$anid' AND what='photo' AND id='$duser' AND likes='1'");
$g.='::'.mysql_num_rows($r4);
$r4=mysql_query("SELECT * FROM repinw WHERE likeid='$anid' AND what='photo' AND id='$duser' AND repins='1'");
$g.='::'.mysql_num_rows($r4);

$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM comments as dt WHERE elemid='$anid' AND type='photo' AND visibility='v' AND (SELECT COUNT(*) FROM hidden_stories as e WHERE id='$uid' AND whatisit='comment' AND hidden='1' AND e.likeid=dt.sbid)=0"));
$c=$c['c'];
//$r4=mysql_query("SELECT * FROM comments WHERE elemid='$anid' AND visibility='v'");
$g.='::'.$c;

$v=$m['vids'];
$vh=$m['vidshd'];
$vt=$m['title'];
if($v!="" && $vt==""){
$vt=video_title_in_date($m['datetimep']);
}
$vl=simplify_video_duration($m['duration']);
$g.='::'.$v;
$g.='::'.$vh;
$g.='::'.$vt;
$g.='::'.$vl;
$g.='::'.$m['faces'];
$aphotoid=$m['sbid'];

$faces='{"tagged":[';
$r7=mysql_query("SELECT * FROM tags WHERE photoid='$aphotoid' AND id='$duser' AND (flag='w' OR flag='r') AND visibility='v' ORDER BY left2 ASC");
while($m7=mysql_fetch_array($r7)){

$widthp2=$m7['width2'];
$heightp2=$m7['height2'];
$topp2=$m7['top2'];

$topp2v=$heightp2/2;
$topp2=$topp2-$topp2v;
$leftpp2=$m7['left2'];

$leftpp2v=$widthp2/2;
$leftpp2=$leftpp2-$leftpp2v;

$tid=$m7['id3'];
if($tid!=""){
$ttp=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM tags WHERE id3='$tid' AND visibility='v' AND (flag='w' OR flag='r')"));
$ttp=$ttp['c'];
	
$utit=sb_user($tid);
$tun=$utit['username'];
$tufn=$utit['fullname'];
}
else{
$ttp="";
$tun="";
$tufn="";
}


$tb_id=$m7['id2'];
$uti_tb=sb_user($tb_id);
$tb_fn=$uti_tb['fullname'];
$tb_un=$uti_tb['username'];

$grs=grs(12);
$faces.='{"width":"'.$m7['width2'].'","height":"'.$m7['height2'].'","positionX":"'.$leftpp2.'","positionY":"'.$topp2.'","tagid":"'.$grs.'","id":"'.$tid.'","un":"'.$tun.'","ufn":"'.$tufn.'","tp":"'.$ttp.'","tb":"'.$tb_id.'","tb_fn":"'.$tb_fn.'","tb_un":"'.$tb_un.'","label":"'.$m7['label2'].'"},';
}
if(strpos($faces,",")!==false){
$faces=substr($faces,0,-1);
}
$faces.=']}';
$g.='::'.$faces;

$dlocation=$m['location'];
$dalbumid=$m['albumid'];

if($dlocation==""){
$r11=mysql_query("SELECT * FROM albums WHERE sbid='$dalbumid' AND id='$duser'");
while($m11=mysql_fetch_array($r11)){
$dlocation=$m11['location'];	
}
}

$g.='::-}'.$dlocation;
$g.='::'.$m['locationsetby'];

$g.='::'.$m['filter'];
$g.='::'.$m['tilt_shift'];
$g.='::'.$m['frame'];





$albumn=$m['albumn'];	

if($uid==$m['id']){
$uid_album_edit="t";
}
else{
$uid_album_edit="f";
}


$ltypev="media"; //en este caso chupa un huevo, se va a hacer toggle en click de editalbum
$peditablev="f"; //se trata de fotos solamente, no posibilidad de poder editar por ser un post a el news feed

$sbid=$m['sbid'];
$albumid=$m['albumid'];

if($albumn=="Photos" || $albumn=="Pins"){
$photos_id=$m['id2'];	
}
$nfjax="";
$data_t='data-t_align="middle"';

$dprivacy='<ul class="audienceSelectorv uiList inlineBlock" style="margin-left:4px;position:relative;top:0px;">';


$privacy_configuration="small";
$privacy_source="gv"; //gallery viewer

include("buttons/privacy_button.php");
$dprivacy.=$button;
$dprivacy.='</ul>';




$g.='::'.$dprivacy;


$c5=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c5 FROM albums as dt WHERE sbid='$dalbumid' AND id='$duser' $a_qf"));
$c5=$c5['c5'];

$g.='::'.$c5; //$good_privacy this is to check whether a link to the album can be put


$ltype='photo';
$wp_table='like';
$likeid=$m['sbid'];
$owner_c=$m['id'];

$ds='block';
$pdlv='0';

include("stories/with_plugin.php");

if($anx==1 && $wp_me!="me"){
$ps='s';
}
else{$ps='';}

if($with!=""){
$with=$with.' <span class="lthis">like'.$ps.' this.</span>'; 
}

$g.='::'.$with;


$ltype='photo';
$wp_table='repin';
$likeid=$m['sbid'];
$owner_c=$m['id'];

$ds='block';
$pdlv='0';

include("stories/with_plugin.php");

if($with!=""){
    $with=$with.' <span class="lthis">repinned this.</span>'; 
}

$g.='::'.$with;

$_POST['variation']="photo";
$_POST['piclikeval']=0;
$_POST['ltypev']="comment";
$_POST['uidv']=$m['id'];
$_POST['sbid']=$m['sbid'];
$_POST['aquery']=0;
$_POST['aqueryv']=6;
$_POST['na']=0; //newly added

$from="getnext";
include("loadpcomment2.php");

$cp=$totresp;
$g.='::'.$cp; //comments parsed
$g.='::'.$actual_comments; //actual comments

$v="";
$cityc="";
$statec="";
$countryc="";

$rvd=mysql_query("SELECT * FROM albums WHERE sbid='$dalbumid'");
while($mvd=mysql_fetch_array($rvd)){
$cityc=$mvd['cityc'];
$statec=$mvd['statec'];
$countryc=$mvd['countryc'];

$cityc=addslashes($cityc);
$cityc=addslashes($cityc);	
}

if($cityc!="" && $cityc!="undefined"){	
$f='';
}
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
if(isset($f)){
$rvd=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($mvd=mysql_fetch_array($rvd)){
$staten=$mvd['staten'];	
}
$rvd=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($mvd=mysql_fetch_array($rvd)){
$countryn=$mvd['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$staten.', '.$countryn;
}
unset($f);}

mysql_select_db("registered");

$rvd=mysql_query("SELECT * FROM media WHERE sbid='$anid'");
while($mvd=mysql_fetch_array($rvd)){
$cityc=$mvd['cityc'];
$statec=$mvd['statec'];
$countryc=$mvd['countryc'];

$cityc=addslashes($cityc);
$cityc=addslashes($cityc);	
}

if($cityc!="" && $cityc!="undefined"){	
$f='';
}
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
if(isset($f)){
$rvd=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($mvd=mysql_fetch_array($rvd)){
$staten=$mvd['staten'];	
}
$rvd=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($mvd=mysql_fetch_array($rvd)){
$countryn=$mvd['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$staten.', '.$countryn;
}
unset($f);}

mysql_select_db("registered");

$g.='::'.$v;
$g.='::'.$cityc;
$g.='::'.$statec;
$g.='::'.$countryc;

$g.='::'.$m['pin'];
$g.='::'.$m['total_brightness']*2;
if(is_numeric($m['total_brightness']) AND $m['total_brightness']>0){
$g.='::2';
}else{
$g.='::1';
}
$g.='::'.$m['total_contrast']*2;
if(is_numeric($m['total_contrast']) AND $m['total_contrast']>0){
$g.='::2';
}else{
$g.='::1';
}
$g.='::'.$ec;


$ec++;
}
}

}
$info_album=$g;

if($location==""){
$uidva='albums';
$r=mysql_query("SELECT * FROM $uidva WHERE sbid='$albumidi' AND id='$uidv'");
while($m=mysql_fetch_array($r)){
$location=$m['location'];	
}


}


$params=array();

$params["photoid"]=$photoid;
$params["desc"]=$desc;
$params["descv"]=$descv;
$params["descvv"]=$descvv;
$params["location"]=$location;
$params["datetimept"]=$datetimept;
$params["albumidt"]=$albumidt;
$params["swidth"]=$swidth;
$params["sheight"]=$sheight;
$params["albumidi"]=$albumidi;
$params["thephotom"]=$thephotom;
$params["xg"]=$xg;
$params["thewidth"]=$thewidth;
$params["theheight"]=$theheight;
$params["fullname"]=$fullname;
$params["profilephoto"]=$profilephoto;
$params["unv"]=$unv;
$params["tshares"]=$tshares;
$params["datetimeptv"]=$datetimeptv;
$params["datetimeptvv"]=$datetimeptvv;
$params["p"]=$p;
$params["a_width"]=$a_width;
$params["a_height"]=$a_height;
$params["info_album"]=$info_album;
$params["vids"]=$vids;
$params["vidshd"]=$vidshd;
$params["locationsetby"]=$locationsetby;


echo json_encode($params);

/*
echo $photoid.'{}'.$desc.'{}'.$location.'{}'.$datetimept.'{}'.$albumidt.'{}'.$norder.'{}'.$swidth.'{}'.$sheight.'{}'.$albumidi.'{}'.$next.'{}'.$previous.'{}'.$thephotom.'{}'.$xg.'{}'.$thewidth.'{}'.$theheight.'{}'.$fullname.'{}'.$profilephoto.'{}'.$unv.'{}'.$este.'{}'.$tshares.'{}'.$nextwidth.'{}'.$nextheight.'{}'.$prevwidth.'{}'.$prevheight.'{}'.$n_aorder.'{}'.$p_aorder.'{}'.$datetimeptv.'{}'.$datetimeptvv.'{}'.$p.'{}'.$a_width.'{}'.$a_height.'{}'.$info_album.'{}'.$vids.'{}'.$vidshd.'{}'.$locationsetby;
*/


include("end.php");
?>