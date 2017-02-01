<?php
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$unv=$uidv;
$uidva='albums';

$result=mysql_query("SELECT * FROM registered where id='$uidv'");
while($ms=mysql_fetch_array($result)){
$flagtu='t';
if($ms['username']!=''){$unv=$ms['username'];}
$uprofilepic=$ms['profilepic'];	
}


$r=mysql_query("SELECT * FROM $uidva WHERE id='$uidv' AND albumn='Profile Pictures'");
while($m=mysql_fetch_array($r)){
$uprofilepica=$m['sbid'];	
}

$uidvp=$uidv.'p';
$r=mysql_query("SELECT * FROM tags WHERE id3='$uidv' AND flag!='tw' AND pin='1' AND visibility='v'");
$yn=mysql_num_rows($r);
if($yn!=0){
$yn=' <span class="fcg">('.$yn.')</span>';	
}
else{$yn='';}
$r=mysql_query("SELECT * FROM tags WHERE id3='$uidv' AND flag!='tw' AND pin='2' AND visibility='v'");
$ynv=mysql_num_rows($r);
if($ynv!=0){
    $ynv=' <span class="fcg">('.$ynv.')</span>';	
}
else{$ynv='';}

echo'
<div style="position:relative;display:inline-block;" id="wall_picture">
<a href="/'.$uidv.'/photos?album='.$uprofilepica.'" style="margin:0;padding:0;display:inline-block;width:180px;text-align:center;">
<img src="/'.$uidv.'/pics/'.$uprofilepic.'" style="max-width:180px;margin-bottom:10px;margin-top:4px;cursor:pointer;">
</a>

<div class="hidden_sb" style="margin:0;padding:0;position:absolute;top:0;right:0;width:100%;float:right;" id="editppli">';
if($uidv==$uid){echo'<div style="margin:0;padding:0;" class="editppli">
<a href="/editprofile.php?sk=picture"><div class="editppliv"></div>Change Picture</a>
</div>';}
echo'
</div>

</div>

<a href="/'.$unv.'/">
<div id="llm1" class="wrapper_fotos" style="padding-left:6px;padding-top:2px;">
<div class="wallsp" style="position:relative;display:inline-block;top:0;"></div><div id="llm1v" class="linkwrap" style="position:relative;left:0;display:inline-block;">Wall</div></div></a>

<a href="/'.$unv.'?sk=info">
<div id="llm2" class="wrapper_fotos" style="padding-left:6px;padding-top:2px;">
<div class="infosp" style="position:relative;display:inline-block;top:0;"></div><div id="llm2v" class="linkwrap" style="position:relative;left:0;display:inline-block;">Info</div></div></a>';

$b_qf=return_bq("friendsv");

$r=mysql_query("SELECT * FROM friends WHERE id2='$uidv' AND FIND_IN_SET(id,'$which_friends_comma')>0 $b_qf LIMIT 1");
$c=mysql_num_rows($r);

if($c==0){
$f="";
}
else{
$f=count($which_friends);
$f=' <span class="fcg">('.$f.')</span>';	
}


echo'
<a href="/'.$unv.'/friends">
<div id="llm3" class="wrapper_fotos" style="padding-left:6px;">
<div class="friendssp" style="position:relative;display:inline-block;top:1px;"></div><div id="llm3v" class="linkwrap" style="position:relative;left:0;display:inline-block;">Friends'.$f.'</div></div></a>

<a href="/'.$unv.'/photos">
<div id="llm4" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;">
<div class="imgsp" style="position:relative;display:inline-block;top:-1px;"></div><div id="llm4v" class="linkwrap" style="position:relative;left:0;display:inline-block;">Photos'.$yn.'</div></div></a>

<a href="/'.$unv.'/pins">
<div id="llm11" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;">
<div class="pinssp" style="position:relative;display:inline-block;top:-1px;"></div><div id="llm11v" class="linkwrap" style="position:relative;left:0;display:inline-block;">Pins'.$ynv.'</div></div></a>';

/*
<a href="/'.$unv.'/view_map.php">
<div id="llm5" class="wrapper_fotos" style="padding-left:6px;">
<div class="mapsp" style="position:relative;display:inline-block;top:1px;"></div><div id="llm5v" class="linkwrap" style="position:relative;left:0;display:inline-block;">Map</div></div></a>

<a href="/'.$unv.'/view_likes.php">
<div id="llm6" class="wrapper_fotos" style="padding-left:6px;padding-top:3px;">
<div class="likessp" style="position:relative;display:inline-block;top:-1px;"></div><div id="llm6v" class="linkwrap" style="position:relative;left:0;display:inline-block;">Likes</div></div></a>

<a href="/'.$unv.'/subscribers.php">
<div id="llm7" class="wrapper_fotos" style="padding-left:6px;padding-top:2px;">
<div class="subscriberssp" style="position:relative;display:inline-block;top:0;"></div><div id="llm7v" class="linkwrap" style="position:relative;left:0;display:inline-block;">Subscribers</div></div></a>

<a href="/'.$unv.'/subscriptions.php">
<div id="llm8" class="wrapper_fotos" style="padding-left:6px;padding-top:2px;">
<div class="subscriptionssp" style="position:relative;display:inline-block;top:0;"></div><div id="llm8v" class="linkwrap" style="position:relative;left:0;display:inline-block;">Subscriptions</div></div></a>


<a href="/'.$unv.'/view_notes.php">
<div id="llm10" class="wrapper_fotos" style="padding-left:6px;padding-top:2px;">
<div class="eventssp" style="position:relative;display:inline-block;left:-1px;top:-1px;"></div><div id="llm10v" class="linkwrap" style="position:relative;left:0;display:inline-block;">Events</div></div></a>
*/

echo'
<a href="/'.$unv.'?sk=notes">
<div id="llm9" class="wrapper_fotos" style="padding-left:6px;padding-top:2px;">
<div class="notessp" style="position:relative;display:inline-block;top:-1px;"></div><div id="llm9v" class="linkwrap" style="position:relative;left:0;display:inline-block;padding-left:9px;">Notes</div></div></a>



';

echo'<div style="border-top:1px solid #eeeeee;border-bottom:1px solid #eeeeee;margin-top:8px;padding-top:8px;padding-bottom:4px;">';


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");


$b_qf=return_bq("friendsv"); //special friends privacy query filter to apply to table in the query to regis



$rn=count($which_friends);

$r=mysql_query("SELECT * FROM friends WHERE id2='$uidv' AND FIND_IN_SET(id,'$which_friends_comma')>0 $b_qf ORDER BY cv LIMIT 9");
$c=mysql_num_rows($r);

if($c==0){
$r=mysql_query("SELECT * FROM friends WHERE id2='$uidv' AND confirmed='y' AND FIND_IN_SET(id,'$uid_friends_comma')>0 ORDER BY cv LIMIT 9");
$dc="";
}
else{
$dc=' ('.$rn.')';
}

echo'<div style="margin:0;padding:0;padding-bottom:5px;"><span class="friendslink"><a href="/'.$unv.'/friends">Friends'.$dc.'</a></span></div>';

while($m=mysql_fetch_array($r))
  {
$uti=sb_user($m['id']);
$fullname=$uti['fullname'];
$idv=$m['id'];
$unvv=$uti['username'];
$picturepf=$uti['profilepict'];
echo'<div style="margin:0;margin-top:4px;padding:0;" class="clearfix">
<div class="lfloat inlineBlock"><a href="/'.$unvv.'"><img src="/'.$idv.'/pics/'.$picturepf.'" style="width:50px;height:50px;"></a></div>
<div class="lfloat inlineBlock" style="margin-top:3px;margin-left:7px;"><span class="lb fwb"><a hc="" href="/'.$unvv.'">'.$fullname.'</a></span></div>
</div>';
}





echo'</div>';

$b_qf=return_bq("lists_members","love");

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND id2!='0' AND type='love' AND (relation_confirmed='1' OR relation_confirmed='1a' OR relation_confirmed='2') $b_qf");
$c=mysql_num_rows($r);

if($c>0){

echo'<div style="border-bottom:1px solid #eeeeee;margin-top:8px;padding-bottom:4px;">';

echo'<div style="margin:0;padding:0;padding-bottom:5px;"><span class="fcg fwb">Relationship</span></div>';
	
while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id2']);

$fullname=$uti['fullname'];
$idv=$m['id2'];
$unvv=$uti['username'];
$picturepf=$uti['profilepict'];

echo'<div style="margin:0;margin-top:4px;padding:0;" class="clearfix">
<div class="lfloat inlineBlock"><a href="/'.$unvv.'"><img src="/'.$idv.'/pics/'.$picturepf.'" style="width:50px;height:50px;"></a></div>
<div class="lfloat inlineBlock" style="margin-top:3px;margin-left:7px;">
<div>';
echo'<span class="lb fwb"><a hc="" href="/'.$unvv.'">'.$fullname.'</a></span>
';
echo'</div>
<div class="fcg">

<script type="text/javascript">
var dval=$("#love_complete").find("option[value='.$m['relation'].']").text();
$(".fcg:last").html(dval);
</script>
</div>';

if($m['relation_confirmed']==1 OR $m['relation_confirmed']=="1a"){
echo'<div class="fcg">(Pending)</div>';
}

echo'
</div>
</div>';

}


echo'</div>';	
}


$b_qf=return_bq("lists_members","family");

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uid' AND type='family' AND (relation_confirmed='1' OR relation_confirmed='1a' OR relation_confirmed='2') $b_qf");
$c=mysql_num_rows($r);

if($c>0){

echo'<div style="border-bottom:1px solid #eeeeee;margin-top:8px;padding-bottom:4px;">';

echo'<div style="margin:0;padding:0;padding-bottom:5px;"><span class="fcg fwb">Family</span></div>';

while($m=mysql_fetch_array($r)){

$uti=sb_user($m['id2']);
$fullname=$uti['fullname'];
$idv=$m['id2'];
$unvv=$uti['username'];
$picturepf=$uti['profilepict'];
echo'<div style="margin:0;margin-top:4px;padding:0;" class="clearfix">
<div class="lfloat inlineBlock"><a href="/'.$unvv.'"><img src="/'.$idv.'/pics/'.$picturepf.'" style="width:50px;height:50px;"></a></div>
<div class="lfloat inlineBlock" style="margin-top:3px;margin-left:7px;">
<div>
<span class="lb fwb"><a hc="" href="/'.$unvv.'">'.$fullname.'</a></span>
</div>
<div class="fcg">

<script type="text/javascript">
var dval=$("#family_complete").find("option[value='.$m['relation'].']").text();
$(".fcg:last").html(dval);
</script>
</div>';

if($m['relation_confirmed']==1 OR $m['relation_confirmed']=="1a"){
echo'<div class="fcg">(Pending)</div>';
}

echo'
</div>
</div>';


	
}



echo'</div>';	
}


echo'

';
?>