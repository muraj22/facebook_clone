<?php 
include("start.php");
include("populate_page.php");

$echo.='<div style="margin-left:20px;"><h2>Bank</h2><div style="float:right;" class="lb"><a href="/transactions.php"> View Transaction History</a></div>

<div>Your funds</div>';

$r=mysql_query("SELECT * FROM bank WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$amount=$m['amount'];	
}

if(!isset($amount)){
$amount=0.00;	
}
else{
$amount=number_format($amount,2);
}
$echo.='
<div>$'.$amount.'</div>

<div style="margin-top:10px;">Add founds</div>

<label for="amount">Amount:</label>
<input type="text" id="amount" style="border: 0; color: #578843; font-weight: bold;border:1px solid #333333;" />
</div>

<div id="funds_wrapper">
<div id="bank_slider" style="background:#64bf71;height:20px;position:relative;left:20px;top:10px;border:1px solid #333333;border-radius:3px;"></div>

<div style="margin-left:20px;margin-top:20px;">

<div class="mbs">
<div style="display:inline-block;">Funding method</div>

<div style="display:inline-block;">
<select>
<option value="paypal">PayPal</option>
<option value="authorize">Credit Card</option>
</select>
</div>

</div>

<input type="hidden" id="funds" name="funds">

<a id="add_fundsv" class="uiButton uiButtonConfirm npjax" href="#" style="color:#ffffff;">Add Funds</a><div id="funds_added" style="display:inline-block;" class="hidden_sb"><i class="warnsv" style="display:inline-block;position:relative;margin-right:5px;margin-left:5px;"></i>Funds succesfully added.</div>

<a id="add_funds" class="hidden_sb"></a>

</div>
<script type="text/javascript">
//var dg=new PAYPAL.apps.DGFlow({ trigger: "add_fundsv" });
</script>
</div>
</div>
<script type="text/javascript">
function funds_successv(){
$("#funds_added").removeClass("hidden_sb");
$("#funds_added").fadeOut(3000,function(){
$("#funds_added").addClass("hidden_sb");
});	

}';

if(isset($_GET['funds_added'])){
$echo.='
funds_successv();
';	
}

$echo.='
function funds_success(response,org_elem){//alert(response);
$("#funds_added").removeClass("hidden_sb");
$("#funds_added").fadeOut(3000,function(){
$("#funds_added").addClass("hidden_sb");
location.reload(true);
});	
}

    $( "#bank_slider" ).slider({
      range: "max",
      min: 10,
      max: 10000,
      value: 10,
      slide: function( event, ui ) {
	var formated=ui.value;
	formated=parseInt(formated);
	formated=formated.fmonv(2,",",".");
    $( "#amount" ).val( "$"+formated );
	$("#funds").val(ui.value);
	$("#add_fundsv").attr("href","http://www.subsbook.com/ipn/add_funds.php?funds="+ui.value+"&uid='.$uid.'");
      }
    });
	$("#bank_slider").find(".ui-slider-range").css("border","0");
	var formated=$( "#bank_slider" ).slider( "value" );
	formated=parseInt(formated);
	formated=formated.fmonv(2,",",".");
   $( "#amount" ).val( "$"+formated );
   $("#funds").val($( "#bank_slider" ).slider( "value" ));

	$("#add_fundsv").attr("href","http://www.subsbook.com/ipn/add_funds.php?funds=10&uid='.$uid.'");
	
$("#amount").blur(function(){
var dval=$(this).val();
dval=dval.replace(",","");
dval=dval.replace("$","");
var dval=parseFloat(dval);
	var formated=dval;
	formated=parseInt(formated);
	formated=formated.fmonv(2,",",".");
	if(formated=="0.00"){
	formated=10.00;	
	dval=10;
	}
	$("#bank_slider").slider("value",dval);
	$("#funds").val(dval);
	$("#add_fundsv").attr("href","http://www.subsbook.com/ipn/add_funds.php?funds="+dval);
    $( "#amount" ).val( "$"+formated );
});

</script>';

$params['rhelper_js']='../';
$params['rhelper']='';
$params['title']='Upfrev';

$params['left_column_id']="bank_left";
$params['left_column']='<ul class="uiSideNav sbSettingsNavigation" style="margin-right:-1px;"><li class="sideNavItem stat_elem open selectedItem" id="navItem_account"><div class="buttonWrap"></div><a class="item clearfix" href="/bank/"><div class="rfloat"><img class="uiLoadingIndicatorAsync img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></div><div><span class="imgWrap"><i class="img" style="background:url(/images/bank.png) no-repeat 0 0;width:16px;height:16px;display:inline-block;"></i></span><div class="linkWrap noCount">Bank&nbsp;<span class="count hidden_sb uiSideNavCountText">(<span class="countValue fsm">0</span><span class="maxCountIndicator"></span>)</span></div></div></a></li><li class="sideNavItem stat_elem" id="navItem_privacy"><div class="buttonWrap"></div><a class="item clearfix" href="/transactions.php"><div class="rfloat"><img class="uiLoadingIndicatorAsync img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></div><div><span class="imgWrap"><img src="/images/money.png" style="display:inline-block;width:16px;height:16px;"></span><div class="linkWrap noCount">Transactions&nbsp;<span class="count hidden_sb uiSideNavCountText">(<span class="countValue fsm">0</span><span class="maxCountIndicator"></span>)</span></div></div></a></li><li class="sideNavItem stat_elem" id="navItem_privacy"><div class="buttonWrap"></div><a class="item clearfix" href="/bank/withdrawals.php"><div class="rfloat"><img class="uiLoadingIndicatorAsync img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></div><div><span class="imgWrap"><img src="/images/emblem_money.png" style="display:inline-block;width:16px;height:16px;"></span><div class="linkWrap noCount">Withdrawals&nbsp;<span class="count hidden_sb uiSideNavCountText">(<span class="countValue fsm">0</span><span class="maxCountIndicator"></span>)</span></div></div></a></li></ul>';
$params['layout']='left_column_n';
$params["body_class"]="scroll";

include("end.php");
?>