<?php
include("start.php");

foreach($_POST as $k=>$v){
${$k}=$v;
}

include("functions/sb_user.php");
include("functions/grs.php");

$uti=sb_user($uidv);
$likeid=grs(25);

if(isset($suggestion)){
$r=mysql_query("SELECT * FROM pokes WHERE id='$uid' AND id2=='$uidv' AND pokedback='0'");
$c=mysql_num_rows($r);
if($c>0){}
else{
mysql_query("INSERT INTO pokes (pokeid,id,id2,pokedback,visibility,datetimep) VALUES('$likeid','$uid','$uidv','0','v',UNIX_TIMESTAMP())");
}

echo'
<script type="text/javascript">
$("#suggestion_'.$uidv.'").remove();
</script>';	
}
else if(isset($right_col)){
$piname='piname'.$poke_inline_id;
$poke_inline_id='poke_inline'.$poke_inline_id;

echo'
<script type="text/javascript">
$("#'.$poke_inline_id.'").after(\'<span class="fsm" id="'.$piname.'">You poked '.$uti['f_name'].'</span>\');
$("#'.$poke_inline_id.'").remove();
$.doTimeout(1000,function(){
$("#poke_'.$p.'").fadeOut(1000,function(){$(this).remove();
var tpokes=$("#pokes_rwv").find("a[fjax]").length;
if(tpokes==0){
$("#pokes_rw").remove();	
}
});

});
</script>
';
}
else{
$piname='piname'.$poke_inline_id;
$poke_inline_id='poke_inline'.$poke_inline_id;

echo'
<script type="text/javascript">
$("#'.$poke_inline_id.'").after(\'<span class="highlight fsm" id="'.$piname.'">You poked '.$uti['f_name'].'</span>\');
$("#'.$poke_inline_id.'").remove();
$.doTimeout(2500,function(){
$("#'.$piname.'").css("background-color","rgb(255, 255, 255)");
$("#'.$piname.'").css("border-color","rgb(255, 255, 255)"); 	
});
</script>
';
}

if(!isset($suggestion)){
mysql_query("UPDATE pokes SET pokedback='1' WHERE id2='$uid' AND id='$uidv'");
$r=mysql_query("SELECT * FROM pokes WHERE id='$uid' AND id2=='$uidv' AND pokedback='0'");
$c=mysql_num_rows($r);
if($c>0){}
else{mysql_query("INSERT INTO pokes (pokeid,id,id2,pokedback,visibility,datetimep) VALUES('$likeid','$uid','$uidv','0','v',UNIX_TIMESTAMP())");}	
}

include("end.php");
?>