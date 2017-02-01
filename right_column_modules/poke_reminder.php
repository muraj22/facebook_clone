<?php
$ax=0;
$r=mysql_query("SELECT * FROM pokes WHERE id2='$uid' AND pokedback='0' ORDER BY datetimep DESC");
while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id']);

$ax++;

if($ax==1){
$ar=$uti['fullname'];
}

if($ax==2){
$par=$ar;
$ar='<span class="sbRemindersTitle"><strong>'.$ar.'</strong></span> and <span class="sbRemindersTitle"><strong>'.$uti['fullname'].'</strong></span>';
}

if($ax>2){break;}

}

$c=mysql_num_rows($r);
if($c>2){
$cv=$c-1;
}
if($ax==1){
$ar='<span class="sbRemindersTitle"><strong>'.$ar.'</strong></span> poked you';
}
else if($ax==2){

}
else if($ax>2){
$ar='<span class="sbRemindersTitle"><strong>'.$par.'</strong></span> and <span class="sbRemindersTitle">'.$cv.' others</span>';
}
if($c>0){

	echo'
<script type="text/javascript">
function open_module_poke(){
var ofleft=$("#pokes_module").offset().left;
var iwidth=$("#pokes_modulev").innerWidth();
ofleft=parseInt(ofleft);
iwidth=parseInt(iwidth);
var ofleft2=ofleft-iwidth;
ofleft2=ofleft2-12;
$("#pokes_modulev").css("left",ofleft2+"px");
var oftop=$("#pokes_module").offset().top;
oftop=parseInt(oftop);
oftop=oftop-14;
$("#pokes_modulev").css("top",oftop+"px");
$("#pokes_modulev").show();
}
</script>
';

echo'
<div class="sbRemindersStoryw"><a href="#" id="poke_reminders_link" style="display:block;"><div class="clearfix sbRemindersStory" id="pokes_module"><div class="clearfix"><img style="margin-right: 5px;margin-top: -1px;display: block;" class="lfloat img" src="/images/W8TFwFc9d1E.gif" alt="Pokes" height="14" width="16"><div style="margin-top: 1px;"><div class="fsm fwn fcg">'.$ar.'</div></div></div></div></a></div>';	

echo '<div style="margin:0;padding:0;width:347px;border:1px solid #8c8c8c;border-bottom:1px solid #666666;padding-left:10px;padding-top:11px;padding-bottom:10px;z-index:305;background:#ffffff;box-shadow:3px 0px 5px rgba(0,0,0,0.2);position:fixed;display:none;" id="pokes_modulev">';

	echo'<div style="width:336px;position:relative;color:#333333;border-bottom:1px solid #cccccc;margin-bottom:8px;padding-bottom:3px;padding-left:1px;font-weight:bold;">Pokes';
	if($c>10){echo'<span class="llb fwn"><a href="/pokes" style="position:absolute;right:0px;">See All</a></span>';}
	echo'</div>';

$ax=0;
$r=mysql_query("SELECT * FROM pokes WHERE id2='$uid' AND pokedback='0' ORDER BY datetimep DESC LIMIT 10");
while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id']);
echo '<div style="width:334px;padding:10px 5px;padding-top:0;padding-bottom:5px;margin:0;background:#ffffff;" class="clearfix" id="poke_'.$m['pokeid'].'">
<div style="margin:0;padding:0;float:left;margin-right:10px;">
<a href="/'.$uti['username'].'"><img src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="height:50px;width:50px;"></a>
</div>
<div style="margin:0;padding:0;display:inline-block;vertical-align:top;padding-top:0px;margin-top:7px;" class="friendslink"><a href="/'.$uti['username'].'">'.$uti['fullname'].'</a></div>
<div style="display:block;float:right;position:relative;top:15px;right:2px;" class="fwn"><span class="uiIconText"><img class="img" src="/images/W8TFwFc9d1E.gif" alt="" style="top: 0px;" height="14" width="16"><a class="uiLinkLightBlue npjax" href="#" fjax="/pokesd/poke_inline.php?uidv='.$uti['id'].'&amp;pokeback=1&amp;name='.$uti['f_name'].'&amp;poke_inline_id='.$ax.'" rel="async-post" id="poke_inline'.$ax.'">Poke Back</a></span><a class="uiCloseButton uiCloseButtonSmall" style="position:relative;bottom:-3px;margin-left:10px;" href="#" role="button" fjax="/pokesd/poke_hide.php?p='.$m['pokeid'].'" rel="async-post" title="Remove"></a></div>
<div style="margin:0;margin-top:4px;padding:0;" class="fcg">'.td($m['datetimep']).'</div>
</div>';	
$ax++;
}

	echo '<div class="pinchito6" style="width:9px; height:16px;position:absolute;right:-9px;top:15px;z-index:300;"></div></div>';
	
}
echo'
<script type="text/javascript">
function closeallpo(){
  $("#pokes_modulev").fadeOut("slow");
}
$("#pokes_module").click(function(){
	open_module_poke();
});
</script>
';

echo'</div></div>
</div>'; //close sbreminders
?>
