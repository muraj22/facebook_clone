<?php
if(!function_exists("sbheaders")){
function sbheaders($f,$e){
$h = "MIME-Version: 1.0" . "\r\n";
$h .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$h .= "Content-Transfer-Encoding: base64" . "\r\n";
$h .= 'From: '.$f.' <'.$e.'>' . "\r\n";	
return $h;
}
function sbmail($p,$u=true){
	if($u===true){ //most cases, a user that is registered, we want to check he has not opted out to receiving emails and that his email address is confirmed
	$con=mysql_connect("localhost","root","xd22xd22");
	mysql_select_db("registered");
	$email=$p['t'];
	$r=mysql_query("SELECT id FROM registered WHERE email='$email'");
	while($m=mysql_fetch_array($r)){
	$id=$m['id'];	
	}
	$r=mysql_query("SELECT * FROM registration_keys WHERE id='$id' AND confirmed='1'");
$c=mysql_num_rows($r);
if($c==0){ //email address is not yet confirmed
return "";
}
else{ //email address is confirmed, has he opted out
$uti=sb_user($id);
	while($m=mysql_fetch_array($r)){
	$uti['unsubscribe']=$m['dk'];	
	}
	
	$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM unsubscribed WHERE id='$uid' AND unsubscribed='1'"));
	if($c['c']>0){return "";} //he has opted out
$footer='<table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;width:620px"><tbody><tr><td style="border-right:none;color:#999999;font-size:11px;border-bottom:none;font-family:\'lucida grande\',tahoma,verdana,arial,sans-serif;border:none;border-top:none;padding:30px 20px;border-left:none">This message was sent to <a href="mailto:'.$uti['email'].'" style="color:#3b5998;text-decoration:none" target="_blank">'.$uti['email'].'</a>. If you don\'t want to receive these emails from Upfrev in the future, please <a href="http://www.subsbook.com/o.php?k='.$uti['unsubscribe'].'&amp;u='.$uti['id'].'" style="color:#3b5998;text-decoration:none" target="_blank">unsubscribe</a>.<br>Upfrev, Inc.</td></tr></tbody></table>';
$p['m']=str_replace("{footer}",$footer,$p['m']);
	
}

	}
else if($u=="unregistered"){ //for the unregistered, check if they unsubscribed in table unsubscribed
$email=$p['t'];
$c=mysql_fetch_array(mysql_query("SELECT COUNT(*) as c FROM unsubscribed WHERE cemail='$email' AND unsubscribed='1'"));
if($c>0){
return "";	
}
}
$p['m']=rtrim(chunk_split(base64_encode($p['m'])));
$p['h']=sbheaders($p['f'],$p['e']);
return mail($p['t'],$p['s'],$p['m'],$p['h']);
}
}
?>