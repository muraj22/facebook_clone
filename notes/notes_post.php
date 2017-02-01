<?php  
include("start.php");
?>
<?php

if(isset($_GET['d'])){
mysql_query("UPDATE nt SET visibility='d' WHERE sbid='$sbid' AND id='$uid'");
mysql_query("UPDATE nta SET visibility='d' WHERE noteid='$sbid' AND id='$uid'");
mysql_close($con);
exit();	
}


if(isset($_GET['j'])){

mysql_query("UPDATE nt SET visibility='v',datetimep=UNIX_TIMESTAMP() WHERE sbid='$sbid' AND id='$uid'");
mysql_query("UPDATE nta SET visibility='v' WHERE noteid='$sbid' AND id='$uid'");

mysql_close($con);
exit();	
}

$allowed_sbeditor=array();

$allowed_sbeditor[]='<strong>';
$allowed_sbeditor[]='</strong>';
$allowed_sbeditor[]='<em>';
$allowed_sbeditor[]='</em>';
$allowed_sbeditor[]='<u>';
$allowed_sbeditor[]='</u>';

$allowed_sbeditor[]='<ul>';
$allowed_sbeditor[]='</ul>';
$allowed_sbeditor[]='<li>';
$allowed_sbeditor[]='</li>';
$allowed_sbeditor[]='<ol>';
$allowed_sbeditor[]='</ol>';

$allowed_sbeditor[]='<blockquote>';
$allowed_sbeditor[]='</blockquote>';

$allowed_sbeditor[]='<p>';
$allowed_sbeditor[]='</p>';

$allowed_sbeditor[]='<br>';


$ft=$tpost;
foreach($allowed_sbeditor as $k=>$v){
$ft=str_replace(htmlspecialchars("$v"), "$v", $ft);
$ft=str_replace(htmlspecialchars("$v"), "$v", $ft);
}

$ft=str_replace("&amp;lt;photo id=&quot;",'<photo id="',$ft);
$ft=str_replace('&quot; /&amp;gt;','" />',$ft);
	
$ft=str_replace("&nbsp;"," ",$ft);

function check_if_empty($w,$allowed_sbeditor){
foreach($allowed_sbeditor as $k=>$v){
$w=str_replace($v,"",$w);	
}
return $w;
}

$title=trim($title);
$ftc=trim($ft);
$ftc=check_if_empty($ftc,$allowed_sbeditor);

$sbid=$new_note;

$r=mysql_query("SELECT * FROM notes_pics WHERE noteid='$sbid' AND (visibility='v' OR visibility='n') AND id='$uid'");
$c=mysql_num_rows($r);

if(($ftc=='' AND $c==0) OR $title==''){
echo 'e';
mysql_close($con);
exit();
}

function space_to_dash($w){
$w=str_replace(" ","-",$w);
return $w;
}


$uti=sb_user($uid);


$sbid=$new_note;

$r=mysql_query("SELECT * FROM nt WHERE sbid='$sbid' AND id='$uid'");
while($m=mysql_fetch_array($r)){
$avis=$m['visibility'];	
}
if($avis=='v'){
$note_titlem=space_to_dash($title);
$flm=strtolower($uti['fullname']);
$flm=space_to_dash($flm);
echo $sbid;
}
else{echo $sbid; mysql_query("UPDATE nt SET datetimep=UNIX_TIMESTAMP() WHERE sbid='$sbid' AND id='$uid'");}
mysql_query("UPDATE nt SET title='$title',body='$ft',visibility='$vis' WHERE sbid='$sbid' AND id='$uid'");
if(!empty($captions)){
foreach($captions as $k=>$v){
$vv=explode("{}",$v);

$aid=$vv[0];
$caption=$vv[1];

mysql_query("UPDATE notes_pics SET caption='$caption' WHERE noteid='$sbid' AND (visibility='v' OR visibility='n') AND aid='$aid' AND id='$uid'");

	
}
}

if(!empty($alignment)){
foreach($alignment as $k=>$v){
$vv=explode("{}",$v);

$aid=$vv[0];
$alignmentv=$vv[1];

mysql_query("UPDATE notes_pics SET css_class='$alignmentv' WHERE noteid='$sbid' AND (visibility='v' OR visibility='n') AND aid='$aid' AND id='$uid'");

	
}


}


$posted=array();
$ontable=array();

$_POST['tags']=addcslashes($_POST['tags'], "'\\/");
$posted['tags']=$_POST['tags'];
${$tags}=$_POST['tags'];
$key_name=array();
$key_name['tags']='tags';

foreach($posted as $dmk => $dmv){
$dkn=$key_name[$dmk];
if(strpos($dmv,",")!==false){
${$dkn}=array();
${$dmk.'v'}=explode(",",$dmv);
foreach(${$dmk.'v'} as $key=> $value){
if($value!=""){
${$dkn}[]=$value;
$r=mysql_query("SELECT * FROM nta WHERE noteid='$sbid' AND id='$uid' AND tagged='$value' AND type='$dkn'");
$c=mysql_num_rows($r);
if($c=="0"){
	$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM nta WHERE noteid='$sbid' AND id='$uid' AND type='$dkn'"));
	$c=$c['c'];
	if($c<30){
mysql_query("INSERT INTO nta (tagged,type,likeid,noteid,visibility,id,datetimep) VALUES('$value','$dkn','','$sbid','$vis','$uid',UNIX_TIMESTAMP())");	
	}
}
}
}
${$dkn.'db'}=array();
$r=mysql_query("SELECT * FROM nta WHERE noteid='$sbid' AND id='$uid' AND type='$dkn'");
while($m=mysql_fetch_array($r)){
${$dkn.'db'}[]=$m['tagged'];
}
foreach(${$dkn.'db'} as $llave => $valor){
$valor=addcslashes($valor, "'\\/");
if(!in_array($valor,${$dkn})){
mysql_query("DELETE FROM nta WHERE noteid='$sbid' AND id='$uid' AND tagged='$valor' AND type='$dkn'");	
}
}
}
else{
mysql_query("DELETE FROM nta WHERE noteid='$sbid' AND id='$uid' AND type='$dkn'");	
}
}

mysql_query("UPDATE nta SET visibility='$vis' WHERE noteid='$sbid' AND id='$uid'");
?>
<?php include("end.php"); ?>