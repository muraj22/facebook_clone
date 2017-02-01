<?php 
include("start.php");
include("populate_page.php");

$echo.='<div style="margin-left:20px;" class="withdrawals"><h2>Withdrawals</h2>';

$r=mysql_query("SELECT * FROM withdrawals WHERE id='$uid' AND visibility='v' ORDER BY datetimep_se DESC");
$c=mysql_num_rows($r);
if($c>0){

$echo.='
<div class="mtm">Withdrawal accounts</div>
<div>
<select>';
	
while($m=mysql_fetch_array($r)){
$echo.='<option value="'.$m['sbid'].'">'.$m['email'].'</option>';
}

$echo.='
</select>
';


}

$echo.='
<div class="mtm mbs">Add new withdrawal account</div>
<input class="dcphcg" type="text" name="new_withdrawal_account" placeholder="PayPal account" style="margin-left: 0px;
padding-bottom: 4px;border: 1px solid rgb(189, 199, 216);font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;font-size: 11px;margin: 0px;padding: 3px;width: 100%;text-align: left;max-width:394px;">
<div class="mtm">
<label class="uiButton uiButtonConfirm" fjax="/ajax/bank/withdrawals/save.php" data-a_form=".withdrawals" data-a_custom_f="withdrawals_save_success"><input class="uiButtonText" type="button" value="Save"></label><div id="withdrawals_saved" style="display:inline-block;" class="hidden_sb"><i class="warnsv" style="display:inline-block;position:relative;margin-right:5px;margin-left:5px;"></i>Changes saved</div>
</div>';

if($c>0){

$echo.='
<div class="mtm">
Withdraw funds
</div>';

$r=mysql_query("SELECT * FROM bank WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$amount=$m['amount'];
}


if($amount==0){
$ddisabled=' disabled="t"';	
$dclass="uiButtonDisabled";
}else{
$ddisabled='';
$dclass="";	
}

$echo.='
<div class="mts">
Funds available: $'.number_format($amount,2).'
</div>';

$r=mysql_query("SELECT * FROM withdrawals WHERE id='$uid' AND visibility='v' ORDER BY datetimep_se DESC");

$echo.='<div style="margin-top:5px;margin-bottom:5px;">
<select id="withdrawal_account_selected" '.$ddisabled.'>
<option value="0">Withdrawal account</option>';
	
while($m=mysql_fetch_array($r)){
$echo.='<option value="'.$m['sbid'].'">'.$m['email'].'</option>';
}

$echo.='
</select>
</div>
';

$echo.='
<div>
<div style="display:inline-block;"><input type="text" placeholder="Withdrawal Amount" '.$ddisabled.' id="amount" class="dcphcg" style="margin-left: 0px;
padding-bottom: 4px;border: 1px solid rgb(189, 199, 216);font-family: \'lucida grande\',tahoma,verdana,arial,sans-serif;font-size: 11px;margin: 0px;padding: 3px;width: 100%;text-align: left;max-width:394px;"></div>

<div class="mtm">
<a href="#" id="withdraw_btn" class="'.$dclass.' uiButton uiButtonConfirm npjax" style="color:#ffffff;">Withdraw</a>
</div>';

}
$echo.='
</div>
<script type="text/javascript">
$("#withdraw_btn").bind("click",function(){

});

function withdrawals_save_success(response,org_elem){
$("#withdrawals_saved").removeClass("hidden_sb");
$.doTimeout(400,function(){
location.reload(true);	
});
}

var update_anchor=function(){
var dval=$("#amount").val();
dval=dval.replace(",","");
dval=dval.replace("$","");
var dval=parseFloat(dval);
	var formated=dval;
	formated=parseInt(formated);
	formated=formated.fmonv(2,",",".");
	$( "#amount" ).val( "$"+formated );
    
    var withdrawal_account=$("#withdrawal_account_selected :selected").text();
    
    $("#withdraw_btn").attr("href","http://www.subsbook.com/ipn/withdraw.php?funds="+dval+"&withdrawal_account="+withdrawal_account);
}

$("#withdrawal_account_selected").bind("change",update_anchor);
$("#amount").bind("blur",update_anchor);
</script>


';

$echo.='</div>';

$params['rhelper_js']='../';
$params['rhelper']='';
$params['title']='Upfrev';

$params['left_column_id']="bank_left";
$params['left_column']='<ul class="uiSideNav sbSettingsNavigation" style="margin-right:-1px;"><li class="sideNavItem stat_elem" id="navItem_account"><div class="buttonWrap"></div><a class="item clearfix" href="/bank/"><div class="rfloat"><img class="uiLoadingIndicatorAsync img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></div><div><span class="imgWrap"><i class="img" style="background:url(/images/bank.png) no-repeat 0 0;width:16px;height:16px;display:inline-block;"></i></span><div class="linkWrap noCount">Bank&nbsp;<span class="count hidden_sb uiSideNavCountText">(<span class="countValue fsm">0</span><span class="maxCountIndicator"></span>)</span></div></div></a></li><li class="sideNavItem stat_elem" id="navItem_privacy"><div class="buttonWrap"></div><a class="item clearfix" href="/transactions.php"><div class="rfloat"><img class="uiLoadingIndicatorAsync img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></div><div><span class="imgWrap"><img src="/images/money.png" style="display:inline-block;width:16px;height:16px;"></span><div class="linkWrap noCount">Transactions&nbsp;<span class="count hidden_sb uiSideNavCountText">(<span class="countValue fsm">0</span><span class="maxCountIndicator"></span>)</span></div></div></a></li><li class="sideNavItem stat_elem open selectedItem" id="navItem_privacy"><div class="buttonWrap"></div><a class="item clearfix" href="/bank/withdrawals.php"><div class="rfloat"><img class="uiLoadingIndicatorAsync img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></div><div><span class="imgWrap"><img src="/images/emblem_money.png" style="display:inline-block;width:16px;height:16px;"></span><div class="linkWrap noCount">Withdrawals&nbsp;<span class="count hidden_sb uiSideNavCountText">(<span class="countValue fsm">0</span><span class="maxCountIndicator"></span>)</span></div></div></a></li></ul>';
$params['layout']='left_column_n';
$params["body_class"]="scroll";

include("end.php");

?>