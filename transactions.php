<?php 
include("start.php");
include("populate_page.php");

$echo.='<div style="margin-left:20px;"><h2>Transactions</h2><div style="float:right;" class="lb"><a href="/bank/"> View Bank Account</a></div>';

$gs=0;
$gsv=50;

$r=mysql_query("SELECT * FROM transactions WHERE (id='$uid' OR id2='$uid') ORDER BY datetimep DESC LIMIT $gs,$gsv");
$c=mysql_num_rows($r);
if($c==0){
$echo.='<div satyle="margin-top:10px;">No transaction history yet.</div>';	
}
else{
$echo.='<table style="margin-top:10px;border:1px solid #333;width:500px;border-collapse:collapse;"><tr><td style="padding-right:5px;padding-left:5px;border:1px solid #333;background:#3b5998;color:#fff;">From</td><td style="padding-right:5px;padding-left:5px;border:1px solid #333;background:#3b5998;color:#fff;">To</td><td style="padding-right:5px;padding-left:5px;border:1px solid #333;background:#3b5998;color:#fff;">Amount</td><td style="padding-right:5px;padding-left:5px;border:1px solid #333;background:#3b5998;color:#fff;">Date</td><td style="padding-right:5px;padding-left:5px;border:1px solid #333;background:#3b5998;color:#fff;">SB Fee</td></tr>';

while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id']);
$utiv=sb_user($m['id2']);
if($m['id']==$uid){
$uti['link']=str_replace($uti['fullname'],'You',$uti['link']);	
}
if($m['id2']==$uid){
$utiv['link']=str_replace($utiv['fullname'],'You',$utiv['link']);	
}
if(!is_numeric($m['id2'])){
    $utiv['link']=$m['id2'];
}
$echo.='<tr><td style="padding-right:5px;padding-left:5px;border:1px solid #333;">'.$uti['link'].'</td><td style="padding-right:5px;padding-left:5px;border:1px solid #333;">'.$utiv['link'].'</td><td style="padding-right:5px;padding-left:5px;border:1px solid #333;">$'.number_format($m['amount'],2).'</td><td style="padding-right:5px;padding-left:5px;border:1px solid #333;">'.rtd($m['datetimep']).'</td><td style="padding-right:5px;padding-left:5px;border:1px solid #333;">$'.number_format($m['fee'],2).'</td></tr>';
}

$echo.='</table>';
}

$echo.='</div>';

$params['rhelper_js']='../';
$params['rhelper']='';
$params['title']='Upfrev';

$params['left_column_id']="bank_left";
$params['left_column']='<ul class="uiSideNav sbSettingsNavigation" style="margin-right:-1px;"><li class="sideNavItem stat_elem" id="navItem_account"><div class="buttonWrap"></div><a class="item clearfix" href="/bank/"><div class="rfloat"><img class="uiLoadingIndicatorAsync img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></div><div><span class="imgWrap"><i class="img" style="background:url(/images/bank.png) no-repeat 0 0;width:16px;height:16px;display:inline-block;"></i></span><div class="linkWrap noCount">Bank&nbsp;<span class="count hidden_sb uiSideNavCountText">(<span class="countValue fsm">0</span><span class="maxCountIndicator"></span>)</span></div></div></a></li><li class="sideNavItem stat_elem open selectedItem" id="navItem_privacy"><div class="buttonWrap"></div><a class="item clearfix" href="/transactions.php"><div class="rfloat"><img class="uiLoadingIndicatorAsync img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></div><div><span class="imgWrap"><img src="/images/money.png" style="display:inline-block;width:16px;height:16px;"></span><div class="linkWrap noCount">Transactions&nbsp;<span class="count hidden_sb uiSideNavCountText">(<span class="countValue fsm">0</span><span class="maxCountIndicator"></span>)</span></div></div></a></li><li class="sideNavItem stat_elem" id="navItem_privacy"><div class="buttonWrap"></div><a class="item clearfix" href="/bank/withdrawals.php"><div class="rfloat"><img class="uiLoadingIndicatorAsync img" src="/images/GsNJNwuI-UM.gif" alt="" height="11" width="16"></div><div><span class="imgWrap"><img src="/images/emblem_money.png" style="display:inline-block;width:16px;height:16px;"></span><div class="linkWrap noCount">Withdrawals&nbsp;<span class="count hidden_sb uiSideNavCountText">(<span class="countValue fsm">0</span><span class="maxCountIndicator"></span>)</span></div></div></a></li></ul>';
$params['layout']='left_column_n';
$params["body_class"]="scroll";

include("end.php");
?>