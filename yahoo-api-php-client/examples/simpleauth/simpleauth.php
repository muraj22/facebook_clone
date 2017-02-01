<?php

/**
 * Yahoo! PHP5 SDK
 *
 *  * Yahoo! Query Language
 *  * Yahoo! Social API
 *
 * Find documentation and support on Yahoo! Developer Network: http://developer.yahoo.com
 *
 * Hosted on GitHub: http://github.com/yahoo/yos-social-php5/tree/master
 *
 * @package    yos-social-php5
 * @subpackage yahoo
 *
 * @author     Dustin Whittle <dustin@yahoo-inc.com>
 * @copyright  Copyrights for code authored by Yahoo! Inc. is licensed under the following terms:
 * @license    BSD Open Source License
 *
 *   Permission is hereby granted, free of charge, to any person obtaining a copy
 *   of this software and associated documentation files (the "Software"), to deal
 *   in the Software without restriction, including without limitation the rights
 *   to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *   copies of the Software, and to permit persons to whom the Software is
 *   furnished to do so, subject to the following conditions:
 *
 *   The above copyright notice and this permission notice shall be included in
 *   all copies or substantial portions of the Software.
 *
 *   THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *   IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *   AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *   LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *   OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *   THE SOFTWARE.
 **/

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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="X-XRDS-Location" content="xrds.xml">
<title>Yahoo! Developer Network: OpenID + OAuth Popup</title>
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/combo?3.0.0b1/build/cssreset/reset-min.css&3.0.0b1/build/cssfonts/fonts-min.css&3.0.0b1/build/cssgrids/grids-min.css&3.0.0b1/build/cssbase/base-min.css">
<link rel="stylesheet" type="text/css" href="css/simpleauth.css">
</head>
<body id="ydoc" class="yui-skin-sam">
<?php if(!isset($_REQUEST['openid_mode']) && !isset($_SESSION['yahoo_oauth_access_token'])): ?>
<div id="ysimpleauth-login" class="authbar">
  <span class="svy-sg">
    <a href="simpleauth.php?openid_mode=discover" title="Sign in with a Yahoo! ID">
      <span><span><span><span><span>Sign In with a</span><span style="display:none"> Yahoo!</span><span class="rtext"> ID</span></span></span></span></span>
    </a>
  </span>
</div>
<?php else: ?>

<?php if(isset($_SESSION['yahoo_oauth_request_token'])): ?>
<div id="ysimpleauth-logout" class="authbar"><a href="simpleauth.php?openid_mode=cancel">Logout</a></div>
<?php
$yql  = new YahooYQLQuery();

$data = $yql->execute('SELECT * FROM social.contacts where guid=me;');
	
	print_r($data); 



?>
<?php endif; ?>



<?php endif; ?>


<?php if(isset($_REQUEST['close'])): ?>
<script type="text/javascript">
// close popup window and refresh page for access token
if(window.opener)
{
  window.opener.location.replace(window.opener.location.href);
  window.opener.focus();

  window.close();
}
</script>
<?php endif; ?>
<script type="text/javascript" src="http://yui.yahooapis.com/combo?3.0.0b1/build/yui/yui-min.js"></script>
<script type="text/javascript" src="js/simpleauth.js"></script>
</body>
</html>