<?php
$secho="";
$secho.='
<div style="width: 493px;margin:0;padding:0;margin-top: '.$stt.'px;line-height: 15px;color:rgb(102,102,102);margin-bottom:10px;">
';

$b_qf=return_bq("workedu","j");
$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND type='j' AND currently='2' AND visibility='v' $b_qf ORDER BY datetimepe ASC LIMIT 1");
$c=mysql_num_rows($r);
if($c==0){
$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND type='j' AND visibility='v' $b_qf ORDER BY datetimepe ASC LIMIT 1");
$c=mysql_num_rows($r);
$position_past='';	
}
if($c>0){
while($m=mysql_fetch_array($r)){
$place=$m['place'];	
$position=$m['position'];
}
if(isset($position_past)){$position='Worked';}
else if($position==''){$position='Works';}
$secho.='<span style="margin:0;padding:0;margin-right:8px;"><i class="maletin"></i>'.$position.' at <span style="color:#3b5998;">'.$place.'</span></span>';
}
$b_qf=return_bq("workedu","c");
$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND type='c' AND visibility='v' $b_qf ORDER BY datetimepe ASC LIMIT 1");
$c=mysql_num_rows($r);
if($c>0){
while($m=mysql_fetch_array($r)){
$place=$m['place'];	
$acollege='';
}
$secho.='<span style="margin:0;padding:0;margin-right:8px;"><i class="gorro"></i>Studied at <span style="color:#3b5998;">'.$place.'</span></span>';
}
if(!isset($acollege)){
$b_qf=return_bq("workedu","h");
$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND type='h' AND visibility='v' $b_qf ORDER BY datetimepe ASC LIMIT 1");
$c=mysql_num_rows($r);
if($c>0){
while($m=mysql_fetch_array($r)){
$place=$m['place'];	
}
$secho.='<span style="margin:0;padding:0;margin-right:8px;"><i class="gorro"></i>Went to <span style="color:#3b5998;">'.$place.'</span></span>';
}
}

$ca="";
$b_qf=return_bq("lists_members","love");
$r=mysql_query("SELECT * FROM lists_members WHERE id='$uidv' AND type='love' AND (relation>1 AND relation<7) AND (visibility='v' OR visibility='h') $b_qf");
while($m=mysql_fetch_array($r)){
$ca=$m['relation'];	

if($ca==2){$ca='In a relationship';}
else if($ca==3){$ca='Engaged';}
else if($ca==4){$ca='Married';}
else if($ca==5){$ca='It\'s complicated';}
else if($ca==6){$ca='In an open relationship';}
$secho.='<span style="margin:0;padding:0;margin-right:8px;"><i class="corazon"></i>'.$ca;
if($m['id2']!=""){
$uti=sb_user($m['id2']);
$secho.=' with <span class="lb"><a hc="" href="/'.$uti['username'].'">'.$uti['fullname'].'</a></span>';		
}
$secho.='</span>';
}

$statec="";
$countryc="";
$cityc="";
$v="";

$b_qf=return_bq("living","current_city");
$result=mysql_query("SELECT * FROM living WHERE id='$uidv' AND type='current_city' AND (visibility='v' OR visibility='h') $b_qf");
while($ms=mysql_fetch_array($result)){
$statec=$ms['statec'];
$countryc=$ms['countryc'];
$cityc=$ms['cityc'];
$cityc=addslashes($cityc);
$cityc=addslashes($cityc);
if($cityc!=""){	
$f='';
}
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
$v=$cityc.', '.$countryn;
}
unset($f);}
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
if($v!=""){
$secho.='<span style="margin:0;padding:0;margin-right:8px;"><i class="edificio"></i>Lives in <span style="color:#3b5998;">'.$v.'</span></span>';	
}
$statec="";
$countryc="";
$cityc="";
$v="";

$b_qf=return_bq("living","hometown");
$result=mysql_query("SELECT * FROM living WHERE id='$uidv' AND type='hometown' AND (visibility='v' OR visibility='h') $b_qf");
while($ms=mysql_fetch_array($result)){
$statec=$ms['statec'];
$countryc=$ms['countryc'];
$cityc=$ms['cityc'];
$cityc=addslashes($cityc);
$cityc=addslashes($cityc);
if($cityc!=""){	
$f='';
}
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
$v=$cityc.', '.$countryn;
}
unset($f);}
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
if($v!=""){
$secho.='<span style="margin:0;padding:0;margin-right:8px;"><i class="casita"></i>From <span style="color:#3b5998;">'.$v.'</span></span>';	
}
$r=mysql_query("SELECT * FROM optionsv WHERE id='$uidv'");
while($m=mysql_fetch_array($r)){
$showbirthday=$m['showbirthday'];	
if($showbirthday=="1"){
$r2=mysql_query("SELECT * FROM registered WHERE id='$uidv'");
while($m2=mysql_fetch_array($r2)){
$month=$m2['month'];
$day=$m2['day'];
$year=$m2['year'];
$month=date('F', strtotime('2012-' . $month . '-01'));
$secho.= '<span style="margin:0;padding:0;margin-right:8px;"><i class="calendario"></i>Born on '.$month.' '.$day.', '.$year.'</span>';	
}
}
else if($showbirthday=="2"){
$r2=mysql_query("SELECT * FROM registered WHERE id='$uidv'");
while($m2=mysql_fetch_array($r2)){
$month=$m2['month'];
$day=$m2['day'];
$year=$m2['year'];
$month=date('F', strtotime('2012-' . $month . '-01'));
$secho.= '<span style="margin:0;padding:0;margin-right:8px;"><i class="calendario"></i>Born on '.$month.' '.$day.'</span>';	
}	
}
}
$b_qf=return_bq("languages");
$r=mysql_query("SELECT * FROM languages WHERE id='$uidv' AND (visibility='v' OR visibility='h') $b_qf ORDER BY datetimep ASC");
$c=mysql_num_rows($r);
$anx=0;
if($c>0){
	$mgchunk='';
$tlanguages='';
while($m=mysql_fetch_array($r)){
$anx++;

if($c>4){
if($anx<=3){
if($anx==3){$tlanguages.=$m['language'];}
else{
$tlanguages.=$m['language'].', ';
}
}
else{

$ending=$c;


if($anx==21){
$dmore=$c-20;
$mgchunk.='<div style="margin:0;padding:0;">...and '.$dmore.' more</div>';
}
else if($anx<21){
$mgchunk.='<div style="margin:0;padding:0;">'.$m['language'].'</div>';
}

if($anx==$c){
$tdbv=$c-3;
$ap='s';
if($tdbv==1){$ap='';}
$rx=0;
$tlanguages.=' and  <div class="anounder" style="margin:0;padding:0;display:inline-block;">

<a href="#" onclick="return false;" data-t_text="">'.$tdbv.' others</a><div class="tooltip_text">'.$mgchunk.'</div></div>';
	
}

}


}

else{
if($anx==$c){
$tlanguages.=$m['language'];	
}
else{
$tlanguages.=$m['language'].', ';		
}
}

}
$secho.='<span style="margin:0;padding:0;margin-right:8px;"><i class="mundin"></i>Knows '.$tlanguages.'</span>';
}
$hm=0;

if($uidv==$uid){
$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND type='j' AND visibility='v' LIMIT 1");
$c=mysql_num_rows($r);
if($c==0){
$hm++;
$secho.='<span style="margin:0;padding:0;margin-right:8px;" class="vinculos_dedit"><i class="maletina"></i><a href="/editprofile.php?sk=eduwork">Add where you work</a></span>';
}

$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND (type='c' OR type='h') AND visibility='v'");
$c=mysql_num_rows($r);
if($c==0){
$hm++;
$secho.='<span style="margin:0;padding:0;margin-right:8px;" class="vinculos_dedit"><i class="gorroa"></i><a href="/editprofile.php?sk=eduwork">Add your school</a></span>';
$nocollege='';
}

if(!isset($nocollege)){
$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND type='c' AND visibility='v' LIMIT 1");
$c=mysql_num_rows($r);
if($c==0){
$hm++;
$secho.='<span style="margin:0;padding:0;margin-right:8px;" class="vinculos_dedit"><i class="gorroa"></i><a href="/editprofile.php?sk=eduwork">Add your college</a></span>';
}
}

$r=mysql_query("SELECT * FROM living WHERE id='$uidv' AND type='hometown' AND (visibility='v' OR visibility='h')");
$c=mysql_num_rows($r);
if($c==0){
$hm++;
$secho.='<span style="margin:0;padding:0;margin-right:8px;" class="vinculos_dedit"><i class="casitaa"></i><a href="/editprofile.php">Add your hometown</a></span>';
}

if($hm!=3){
$r=mysql_query("SELECT * FROM languages WHERE id='$uidv' AND (visibility='v' OR visibility='h') LIMIT 1");
$c=mysql_num_rows($r);
if($c==0){
$hm++;
$secho.='<span style="margin:0;padding:0;margin-right:8px;" class="vinculos_dedit"><i class="mundina"></i><a href="/editprofile.php">Add languages you know</a></span>';
}	
}

$secho.='<span class="edit_ldivv" style="margin:0;padding:0;margin-right:8px;"><a href="/editprofile.php"><span style="position:relative;top:-2px;">Edit Profile</span></a></span>';
}
$secho.='</div>';
?>