<?php
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$uti=sb_user($uid);
$profilephoto=$uti['profilepic'];
$fullname=$uti['fullname'];

$uidv=$uid;
$unv=$un;
echo'<div style="position:relative;margin:0;padding:0;height:50px;vertical-align:middle;margin-bottom:-5px;line-height:45px;">
<div style="width:50px;height:50px;display:inline-block;float:left;margin-right:4px;">
<a href="/'.$unv.'" class="andbl"><img src="/'.$uidv.'/pics/'.$profilephoto.'" style="max-width:40px;max-height:40px;margin-bottom:0px;margin-top:4px;"></a>
</div>
<div style="display:inline-block;margin-top:10px;line-height:1.28;">
<div style="position:relative;display:inline-block;" class="friendslink"><a href="/'.$unv.'" style="display:inline-block;text-overflow:ellipsis;max-width:125px;white-space:nowrap;overflow:hidden;">'.$fullname.'</a></div>
<div style="position:relative;display:block;margin-top:1px;" class="lb"><a href="/editprofile.php" style="display:inline-block;">Edit Profile</a></div>
</div>

</div>

<div id="favorites">

<div style="font-size:9px;font-weight:bold;margin-top:12px;word-wrap:break-word;margin-bottom:4px;" class="navHeaderv">FAVORITES</div>

<a href="/">
<div id="llm1" class="wrapper_fotos" style="padding-left:6px;">
<div class="newssp" style="position:relative;display:inline-block;top:1px;"></div><div id="llm1v" class="linkwrap" style="position:relative;left:-1px;display:inline-block;">News Feed</div></div></a>

<a href="/messages/">
<div id="llm2" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;">
<div class="messagessp" style="position:relative;display:inline-block;top:-1px;"></div><div id="llm2v" class="linkwrap" style="position:relative;left:-1px;display:inline-block;">Messages</div></div></a>

<a href="/events/">
<div id="llm3" class="wrapper_fotos" style="padding-left:6px;">
<div class="eventssp" style="position:relative;display:inline-block;top:0px;"></div><div id="llm3v" class="linkwrap" style="position:relative;left:0;display:inline-block;">Events</div></div></a>


<a href="/'.$unv.'/photos">
<div id="llm24" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;">
<div class="photossp" style="position:relative;display:inline-block;top:-1px;"></div><div id="llm24v" class="linkwrap" style="position:relative;left:0;display:inline-block;">Photos</div></div></a>

<a href="/'.$unv.'/pins">
<div id="llm243" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;">
<div class="pinssp" style="position:relative;display:inline-block;top:-1px;"></div><div id="llm243v" class="linkwrap" style="position:relative;left:0;display:inline-block;">Pins</div></div></a>


<a href="/find_friends.php">
<div id="llm4" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;">
<div class="friendssp" style="position:relative;display:inline-block;top:-1px;"></div><div id="llm4v" class="linkwrap" style="position:relative;left:0;display:inline-block;">Find Friends</div></div></a>


<a href="/bank/">
<div id="llm5" class="wrapper_fotos" style="padding-left:6px;">
<div class="banksp" style="position:relative;display:inline-block;top:1px;"></div><div id="llm5v" class="linkwrap" style="position:relative;left:-1px;display:inline-block;">Bank</div></div></a>


';


$types=array();
$types['lists']="lists";

$r=mysql_query("SELECT * FROM favorites WHERE id='$uid' AND visibility='v' ORDER BY datetimep ASC LIMIT 25");
while($m=mysql_fetch_array($r)){
$table=$types[$m['type']];
$sbidv=$m['sbidv'];

if($table=="lists"){
$r2=mysql_query("SELECT * FROM $table WHERE sbid='$sbidv' AND id='$uid'");
while($m2=mysql_fetch_array($r2)){
$list=$m2['sbid'];
$listn=$m2['listn'];

$dclass=get_list_class($m2['type']);

echo'
<a href="/lists/'.$list.'" data-fav_key="fk_'.$list.'">
<div id="llm'.$list.'" class="wrapper_fotos" style="padding-left:6px;">
<div class="'.$dclass.'" style="position:relative;display:inline-block;top:1px;"></div><div id="llm'.$list.'v" class="linkwrap" style="position:relative;left:-1px;display:inline-block;">'.$listn.'</div></div></a>
';
echo'

';
}

}
}


echo'
<a class="hidden_sb favorite_clone" href="#">
<div class="wrapper_fotos" style="padding-left:6px;padding-top:3px;">
<div class="friendssp" style="position:relative;display:inline-block;top:-1px;"></div><div class="linkwrap" style="position:relative;left:0;display:inline-block;"></div></div>
</a>
';

echo'</div>';

echo'<div id="ln_friends">';

echo'<a class="navHeader navHeaderv" href="/bookmarks/lists" style="font-size:9px;font-weight:bold;margin-top:12px;display:block;word-wrap:break-word;margin-bottom:4px;" data-ln_title=""><div class="clearfix"><div class="lfloat" style="color:#ffffff;">FRIENDS</div><span class="mrm rfloat"><div class="bookmarksNavSeeAll">MORE</div><img class="uiLoadingIndicatorAsync img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></span></div></a>';

$rand=rand(1,800);
if($rand<=20){

$citycv='';

$r=mysql_query("SELECT * FROM ipliving WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$cityc=$m['region'];
$citycv=$m['city'];
}

function grsnv($l) {
		$characters = '123456789';
		$string = '';
		for ($p = 0; $p < $l; $p++) {
				if($p==1){$string.='0';}
		else{$string .= $characters[mt_rand(0, strlen($characters) -1)];}
		}
		return $string;
}

include("geoip_city/geoipcity.inc");
include("geoip_city/geoipregionvars.php");

$gi=geoip_open($_SERVER['DOCUMENT_ROOT']."/geoip_city/GeoIPCity.dat",GEOIP_STANDARD);
$record=geoip_record_by_addr($gi,$_SERVER['REMOTE_ADDR']); //aca iria remote_addr $ip=$_SERVER['REMOTE_ADDR'];
if($record!==NULL){
$cityca=$record->city;
$region=$GEOIP_REGION_NAME[$record->country_code][$record->region];
if($citycv!=$cityca){
mysql_query("UPDATE ipliving SET countryc='$record->country_code',countryn='$record->country_name',city='$record->city',continent='$record->continent_code',region='$region',regionc='$record->region',postal='$record->postal_code',datetimep=UNIX_TIMESTAMP() WHERE id='$uid'");
$cityc=$record->city;

/*
$currentl=array();
$r=mysql_query("SELECT * FROM $uidli WHERE location!=''");
while($m=mysql_fetch_array($r)){
$currentl[]=$m['location'];
}

if(!in_array($region,$currentl)){
$list=grsnv(13);
$regionn=$region.' Area';
mysql_query("INSERT INTO $uidli (list,listn,descr,visibility,location,datetimep) VALUES('$list','$regionn','','v','$region',UNIX_TIMESTAMP())");
}
*/
}
}

}


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$wgs=0;
$egs=0;
$lgs=0;
$cgs=0;

$r=mysql_query("(SELECT * FROM lists WHERE id='$uid' AND type='close_friends' AND visibility='v' AND favorites='2') UNION (SELECT * FROM lists WHERE id='$uid' AND type='family' AND visibility='v' AND favorites='2') UNION (SELECT * FROM lists WHERE id='$uid' AND type='education' AND visibility='v' AND favorites='2' ORDER BY listn ASC LIMIT $egs,2) UNION (SELECT * FROM lists WHERE id='$uid' AND type='work' AND visibility='v' AND favorites='2' ORDER BY listn ASC LIMIT $wgs,2) UNION (SELECT * FROM lists WHERE id='$uid' AND type='location' AND visibility='v' AND favorites='2' ORDER by listn ASC LIMIT $lgs,2) UNION (SELECT * FROM lists WHERE id='$uid' AND type='custom' AND visibility='v' AND favorites='2' ORDER BY listn ASC LIMIT $cgs,2)");
$c=mysql_num_rows($r);

while($m=mysql_fetch_array($r)){

$list=$m['sbid'];
$listn=$m['listn'];

$dclass=get_list_class($m['type']);

echo'
<a href="/lists/'.$list.'">
<div id="llm'.$list.'" class="wrapper_fotos" style="padding-left:6px;">
<div class="'.$dclass.'" style="position:relative;display:inline-block;top:1px;"></div><div id="llm'.$list.'v" class="linkwrap" style="position:relative;left:-1px;display:inline-block;">'.$listn.'</div></div></a>
';
}

echo'</div>';


echo'<div style="font-size:9px;font-weight:bold;margin-top:11px;word-wrap:break-word;margin-bottom:3px;" class="navHeaderv">APPS</div>';

/*
<a href="/?sk=app_2309869772">
<div id="llm8" class="wrapper_fotos" style="padding-left:6px;padding-top:2px;">
<div class="linkssp" style="position:relative;display:inline-block;top:0px;"></div><div id="llm8v" class="linkwrap" style="position:relative;left:-1px;display:inline-block;">Links</div></div></a>
*/

echo'
<a href="/pokes">
<div id="llm9" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;">
<div class="pokessp" style="position:relative;display:inline-block;top:-1px;"></div><div id="llm9v" class="linkwrap" style="position:relative;left:-1px;display:inline-block;">Pokes</div></div></a>

<a href="/notes/">
<div id="llm10" class="wrapper_fotos" style="padding-left:6px;padding-top:2px;">
<div class="notessp" style="position:relative;display:inline-block;top:-1px;"></div><div id="llm10v" class="linkwrap" style="position:relative;left:2px;display:inline-block;">Notes</div></div></a>

';
?>