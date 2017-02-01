<?php

require_once('yahoo-api-php-client/examples/common.inc.php');

$oauthapp = new YahooOAuthApplication(OAUTH_CONSUMER_KEY, OAUTH_CONSUMER_SECRET, OAUTH_APP_ID, OAUTH_DOMAIN);

// handle openid/oauth
if(isset($_REQUEST['openid_mode']))
{
  switch($_REQUEST['openid_mode'])
  {
    case 'discover':
    case 'checkid_setup':
    case 'checkid_immediate':

      // handle yahoo simpleauth popup + redirect to yahoo! open id with open app oauth request
      header('Location: '.$oauthapp->getOpenIDUrl(isset($_REQUEST['popup']) ? $oauthapp->callback_url.'?close=true': $oauthapp->callback_url)); exit;

    break;

    case 'id_res':

    // validate claimed open id

    // extract approved request token from open id response
    $request_token = new YahooOAuthRequestToken($_REQUEST['openid_oauth_request_token'], '');
    $_SESSION['yahoo_oauth_request_token'] = $request_token->to_string();

    // exchange request token for access token
    $oauthapp->token = $oauthapp->getAccessToken($request_token);

    // store access token for later
    $_SESSION['yahoo_oauth_access_token'] = $oauthapp->token->to_string();

    break;

    case 'cancel':

      unset($_SESSION['yahoo_oauth_access_token']);
      unset($_REQUEST['openid_mode']);

      header('Location: '.$oauthapp->callback_url); exit;

      // openid cancelled
    break;

    case 'associate':
      // openid associate user
    break;

    default:
  }
}
else
{
  if(isset($_SESSION['yahoo_oauth_access_token']))
  {
    // restore access token from session
    $oauthapp->token = YahooOAuthAccessToken::from_string($_SESSION['yahoo_oauth_access_token']);

    // do something with user data
    if(isset($_POST['action']))
    {
      switch($_POST['action'])
      {
        case 'updateStatus':

          if(isset($_POST['status']) && !empty($_POST['status']))
          {
            $status = strip_tags($_POST['status']);
            $oauthapp->setStatus(null, $status);
          }

          header('Location: '.$oauthapp->callback_url); exit;

        break;

        case 'postUpdate':

          if(isset($_POST['update']) && !empty($_POST['update']))
          {
            $update = strip_tags($_POST['update']);
            $oauthapp->insertUpdate(null, $update, $update, $oauthapp->callback_url);
          }

          header('Location: '.$oauthapp->callback_url); exit;

        break;
      }
    }
  }
}
if(!isset($timetosend)){
echo'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="X-XRDS-Location" content="/oauth/xrds.xml">
<title>Yahoo! Developer Network: OpenID + OAuth Popup</title>
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/combo?3.0.0b1/build/cssreset/reset-min.css&3.0.0b1/build/cssfonts/fonts-min.css&3.0.0b1/build/cssgrids/grids-min.css&3.0.0b1/build/cssbase/base-min.css">
<link rel="stylesheet" type="text/css" href="/oauth/css/simpleauth.css">
<script type="text/javascript" src="/jquery.min.js"></script>
</head>
<body id="ydoc" class="yui-skin-sam">
';
if(!isset($_REQUEST['openid_mode']) || !isset($_SESSION['yahoo_oauth_access_token'])){ 
echo'
<div id="ysimpleauth-login" class="authbar" style="display:none;">
  <span class="svy-sg">
    <a href="" title="Sign in with a Yahoo! ID" id="yredirect">
      <span><span><span><span><span>Sign In with a</span><span style="display:none"> Yahoo!</span><span class="rtext"> ID</span></span></span></span></span>
    </a>
  </span>
</div>
<script type="text/javascript">
$(document).ready(function(){
window.location="index_yahoo.php?openid_mode=discover";
});
</script>
';
}

}

else if(isset($_SESSION['yahoo_oauth_request_token'])){
$dea=$oauthapp->getContacts();
if($dea===false){
exit();	
}


$contact=array();

$dname="";

foreach ($dea->contact as $contact_retrieval) {
	
        foreach ($contact_retrieval->fields as $field=>$v) {
								   
				if(is_object($v) && $v->type){
				   
                if ($v->type == "name") {
                        $dname = trim("{$v->value->givenName} {$v->value->middleName} {$v->value->familyName}");
                		$dname=str_replace("  "," ",$dname);
				}
                if ($v->type == "email") {
                        $email = $v->value;
                }
				
			   $contact[$email]=$dname;	
				
			}
     
		}
		
}


}

?>
<?php
if(!isset($_REQUEST['openid_mode']) && !isset($_SESSION['yahoo_oauth_access_token'])){ 

if(isset($_REQUEST['close'])){
echo'
<script type="text/javascript">
// close popup window and refresh page for access token
if(window.opener)
{
  window.opener.location.replace(window.opener.location.href);
  window.opener.focus();

  window.close();
}
</script>
';
}


}


if(!isset($timetosend)){ //es caso de no entrada para este archivo desde el post via find_friends una vez que este mismo
//ya aviso que esta listo para pedir contactos

if(isset($_REQUEST['openid_mode']) && isset($_SESSION['yahoo_oauth_access_token'])){  //esta pronto, se hizo el login, todo listo :)
echo'
<script type="text/javascript">
$(document).ready(function(){
window.opener.retrieve_contacts_b("yahoo");
window.close();
});
</script>
';
}

echo'
<script type="text/javascript" src="http://yui.yahooapis.com/combo?3.0.0b1/build/yui/yui-min.js"></script>
<script type="text/javascript" src="/oauth/js/simpleauth.js"></script>
</body>
';

echo'</html>';
}
?>