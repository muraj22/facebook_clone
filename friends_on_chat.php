<?php

echo'<div style="border-top:1px solid #eeeeee;margin-top:8px;padding-top:8px;padding-bottom:4px;text-align:left;">';

$rn=count($uid_friends);

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

if(!function_exists('td2')) {
function td2($topv){
$topv=tod($topv);
$compared_time=new DateTime($topv);
$actual_time=new DateTime();
$tdd=$actual_time->diff($compared_time);
$td=$tdd->format('%R%m'); $suf="month";
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%d'); $suf='day';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%H'); $suf='hour';}
if($td=='+00' || $td=='-00'){$td=$tdd->format('%R%i'); $suf='minute';}
if($td=='+0' || $td=='-0'){$td=$tdd->format('%R%s'); $suf='second';}
if($td=='+0' || $td=='-0'){$td='1';}


$td=str_replace('-','',$td);
$td=str_replace('+','',$td);
$pretd=substr($td,0,1);
if($pretd=='0'){if(substr($td,0,1)=="0"){$td=substr($td,1);}}
if($suf=='month' || $suf=='day' || $suf=='hour' || $suf=='minute' && $td>10){$td='past';}
	return $td;
}
}


echo'<script type="text/javascript">
function displayfn(w){
$("#fullnamevvp"+w).css("visibility","visible");	
}
function hidefn(w){
$("#fullnamevvp"+w).css("visibility","hidden");	
}
</script>';

$bana=$uid_friends;
shuffle($bana);


$drchatp=array();
$yk=0;
$ykv=0;
$number3=5;
$uidvcr=$uid.'cr';
foreach($bana as $k=>$v){
$dfriend=$v;
$r2=mysql_query("SELECT * FROM registered WHERE status='2' AND id='$dfriend'");
while($m2=mysql_fetch_array($r2)){



if($m2['status']=='2'){
	$unvv=$m2['id'];
$datetimepn=$m2['datetimepn'];
$datetimepn=td2($datetimepn);
if($datetimepn!='blank_text'){
	$drchatp[$yk]='';
	
if($ykv=='0'){$drchatp[$yk]='<div style="margin:0;padding:0;text-align:left;position:relative;left:5px;">'; $isopened='t';}
if($ykv=='5' || $ykv=='10' || $ykv=='15' || $ykv=='20'){$drchatp[$yk]='</div><div style="margin:0;padding:0;text-align:left;position:relative;left:5px;">'; $isopened='t';}
$drchatp[$yk].='<div style="display:inline-block;padding-right:1px;padding-bottom:1px;"><div style="position:relative;width:32px;padding:0;margin:0;position:relative;"><img src="/'.$m2['id'].'/pics/'.$m2['profilepict'].'" style="height:32px;width:32px;cursor:pointer;" onclick="displaywindow(\''.$m2['id'].'\',\'\',\'fv\');" data-t_text="'.$m2['fullname'].'" data-t_topleft="t"><div class="onlinesquare" style="visibility:hidden;" onclick="displaywindow(\''.$m2['id'].'\',\'\',\'fv\');"></div></div></div>';
$ykv++;
}
$yk++;
}

}









$r2=mysql_query("SELECT * FROM registered WHERE id='$dfriend'");
while($m2=mysql_fetch_array($r2)){


if($m2['status']=='1'){
	
	$unvv=$m2['id'];
$datetimepn=$m2['datetimepn'];
$datetimepn=td2($datetimepn);
if($datetimepn!='past'){
$drchatp[$yk]='';
	
if($ykv=='0'){$drchatp[$yk]='<div style="margin:0;padding:0;text-align:left;position:relative;left:5px;">'; $isopened='t';}
if($ykv=='5' || $ykv=='10' || $ykv=='15' || $ykv=='20'){$drchatp[$yk]='</div><div style="margin:0;padding:0;text-align:left;position:relative;left:5px;">'; $isopened='t';}
$drchatp[$yk].='<div style="display:inline-block;padding-right:1px;padding-bottom:1px;"><div style="position:relative;width:32px;padding:0;margin:0;position:relative;"><img src="/'.$m2['id'].'/pics/'.$m2['profilepict'].'" style="height:32px;width:32px;cursor:pointer;" onclick="displaywindow(\''.$m2['id'].'\',\'\',\'fv\');" data-t_text="'.$m2['fullname'].'" data-t_topleft="t"><div class="onlinesquare" style="top:26px;visibility:visible;" onclick="displaywindow(\''.$m2['id'].'\',\'\',\'fv\');"></div></div></div>';
$ykv++;

}
$yk++;
}



}

}

echo'

<div id="fonchatw" style="margin:0;padding:0;display:none;">

<div id="fonchat" style="margin:0;padding:0;display:inline-block;text-align:center;">';

$ykvv=$ykv-1;
if(isset($isopened)){$drchatp[$ykvv].='</div>';}
foreach($drchatp as $key => $value){
echo $value;	
}






echo'
</div>

</div>

</div>
<script type="text/javascript">
if(friends_on_chatv){
friends_on_chat();
}
if(chat_autocomplete){
initiate_chat_autocomplete();
}
</script>
';
?>