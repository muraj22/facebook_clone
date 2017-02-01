<?php
include("start.php");

include("populate_page.php");
?>
<?php

$params['style']='<style type="text/css">
.pokessp_pokes{
    top: 2px;

    left: 0px;
    position: absolute;

    width: 16px;
    background-position: 0 0px;

    background-image: url("/images/W8TFwFc9d1E.gif");
    background-repeat: no-repeat;
    display: inline-block;
    height: 14px;	
}
.contentarea{
padding-right: 0px;
width: 493px;
padding: 0px 20px;
float: left;
margin-right: 0px;
word-wrap: break-word;	
}
</style>';

$echo.='
<div class="contentarea">
<div class="uiHeaderPage uiHeaderWithImage">
<div class="clearfix uiHeaderTop">
<div>
<h2 class="uiHeaderTitle"><i class="uiHeaderImage pokessp_pokes"></i>Pokes</h2>
</div>
</div>
</div>
';

include("functions/sb_user.php");



$ax=0;
$r=mysql_query("SELECT * FROM pokes WHERE id2='$uid' AND pokedback='0' ORDER BY datetimep DESC");
$c=mysql_num_rows($r);
if($c==0){
$echo.='<div>No pokes. To poke someone, go to their wall and choose Poke from the gear menu.</div>';	
}
else{
$echo.='<ul class="uiList pokesDashboard">';	
}
while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id']);
$echo.='
<li class="objectListItem uiListItem uiListLight uiListVerticalItemBorder" id="poke_'.$m['pokeid'].'"><div class="clearfix lb"><a class="lfloat" style="margin-right: 10px;display: block;" href="/'.$uti['username'].'" tabindex="-1" aria-hidden="true"><img class="img" style="display: block;width:50px;height:50px;" src="/'.$uti['id'].'/pics/'.$uti['profilepict'].'" alt=""></a><div class="clearfix"><div class="mlm rfloat" style="display:inline-block;"><div style="display:inline-block;height:50px;vertical-align: middle;"></div><div style="display:inline-block;vertical-align: middle;"><div style="text-align: right;"><a class="uiCloseButton uiCloseButtonSmall" href="#" role="button" fjax="/pokesd/poke_hide.php?p='.$m['pokeid'].'" rel="async-post" title="Remove"></a></div></div></div><div class="uiProfileBlockContent"><div style="display:inline-block;"><div style="display:inline-block;height:50px;vertical-align: middle;"></div><div style="display:inline-block;vertical-align: middle;"><div class="pokeHeader fsl fwb fcb"><a hc="" href="/'.$uti['username'].'" style="font-size:13px;font-weight:bold;">'.$uti['fullname'].'</a> has poked you.</div><div class="fsm fwn fcg"><a class="uiIconText poke_inline" id="poke_inline'.$ax.'" href="#" fjax="/pokesd/poke_inline.php?uidv='.$uti['id'].'&amp;pokeback=1&amp;poke_inline_id='.$ax.'" rel="async-post"><img class="img" src="/images/W8TFwFc9d1E.gif" alt="" style="top: 0px;" height="14" width="16">Poke Back</a></div></div></div></div></div></div></li>
';	
$ax++;
}

if($c!=0){
$echo.='</ul>';
}

$echo.='</div>';

$params['right_col_modules'][]='poke_suggestions';
$params['right_col_modules'][]='pymk';

$params['rhelper_js']='';
$params['rhelper']='../';
$params['title']='Upfrev';
$params['layout']='normal_n';
$params['left_link_n']='pokes';


include("end.php");
?>