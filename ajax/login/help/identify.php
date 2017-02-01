<?php
include("php_safety.php");
include("functions/sb_user.php");
foreach($_POST as $k=>$v){
$v=trim($v);
${$k}=$v;	
}
if(trim($email)==""){
$dparams["error"]='<div class="pam uiBoxRed"><div class="fsl fwb fcb">Please fill in at least one field</div><div>Fill in at least one field to search for your account</div></div>';
echo json_encode($dparams);
exit();
}
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");
$r=mysql_query("SELECT * FROM contact_emails WHERE email='$email' AND visibility='v'");
while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id']);
$uid_arr[$uti['fullname']]=$m['id'];	
}
$c=mysql_num_rows($r);
if($c==0){
$r=mysql_query("SELECT * FROM registered WHERE username='$email'");
$c=mysql_num_rows($r);
if($c==0){
$dparams["error"]='<div class="pam uiBoxRed"><div class="fsl fwb fcb">No Search Results</div><div>Your search did not return any results.  Please try again with other information.</div></div>';	
echo json_encode($dparams);
exit();
}
else{$grab_emails="t";}
}
if(isset($grab_emails)){
$r=mysql_query("SELECT * FROM registered WHERE username='$email");
while($m=mysql_fetch_array($r)){
$uti=sb_user($m['id']);	
$uid_arr[$uti['fullname']]=$m['id'];
}

}
$dparams["success"]='
<div id="content" class="sb_content clearfix hidden_sb"><div class="UIFullPage_Container"><div class="help_identify" id="account_search"><input type="hidden" name="lsd" value="AVrozXqt" autocomplete="off"><div class="mvl ptm uiInterstitial uiInterstitialLarge uiBoxWhite"><div class="uiHeader uiHeaderBottomBorder mhl mts uiHeaderPage interstitialHeader"><div class="clearfix uiHeaderTop"><div class="rfloat"><div class="uiHeaderActions"></div></div><div><h2 class="uiHeaderTitle" aria-hidden="true">Identify Your Account</h2></div></div></div><div class="phl ptm uiInterstitialContent"><div class="mvm uiP fsm">These accounts matched your search.</div><ul class="uiList _4kg _4ks">';

ksort($uid_arr); //asc by fullname
foreach($uid_arr as $k=>$v){
$uti=sb_user($v);
$dparams["success"].='
<li><div><table class="fbLoggedOutAccountBlock"><tbody><tr><td class="fbLoggedOutAccountInfo"><div class="clearfix"><img class="_8o _8t lfloat img" src="/users/'.$uti['id'].'/pics/'.$uti['profilepict'].'" style="max-width:50px;" alt=""><div class="_8m _42ef"><div class="_6a"><div class="_6a _6b" style="height:50px"></div><div class="_6a _6b"><div class="fsl fwb fcb">'.$k.'</div><div class="fsm fwn fcg">Upfrev User</div></div></div></div></div></td><td class="fbLoggedOutAccountAuxContent"><a class="uiButton" href="#" fjax="/ajax/error/recover_password.php?email='.$uti['email'].'" data-a_custom_f="password_recovery_sent" data-a_id="password_recovery" data-a_starts="recovery_loading" role="button"><span class="uiButtonText">This Is My Account</span></a></td></tr></tbody></table></div></li>';
}

$dparams["success"].='</ul></div><div class="uiInterstitialBar uiBoxGray topborder"><div class="clearfix"><div class="rfloat"><label class="uiButton" for="u_2_0"><input value="Back" name="go_back" type="submit" id="u_2_0" data-cf="login_back"></label></div><div class="pts"></div></div></div></div></div></div></div>';

echo json_encode($dparams);
?>