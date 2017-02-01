<?php
/*
 * login_with_yahoo.php
 *
 * @(#) $Id: login_with_yahoo.php,v 1.1 2012/10/05 09:23:25 mlemos Exp $
 *
 */

	require('http.php');
	require('oauth_client.php');

	$client = new oauth_client_class;
	$client->debug = 1;
	$client->debug_http = 1;
	$client->server = 'Yahoo';
	$client->redirect_uri = 'http://'.$_SERVER['HTTP_HOST'].
		dirname(strtok($_SERVER['REQUEST_URI'],'?')).'/login_with_yahoo.php';

	$client->client_id = 'dazHp56k'; $application_line = __LINE__;
	$client->client_secret = '5e6c38cbac5f2e2916335cba1a5489cb3954b55e';

	if(strlen($client->client_id) == 0
	|| strlen($client->client_secret) == 0)
		die('Please go to Yahoo Apps page https://developer.apps.yahoo.com/wsregapp/ , '.
			'create an application, and in the line '.$application_line.
			' set the client_id to Consumer key and client_secret with Consumer secret. '.
			'The Callback URL must be '.$client->redirect_uri).' Make sure you enable the '.
			'necessary permissions to execute the API calls your application needs.';

	if(($success = $client->Initialize()))
	{
		if(($success = $client->Process()))
		{
			if(strlen($client->access_token))
			{
				$success = $client->CallAPI(
					'http://query.yahooapis.com/v1/yql', 
					'GET', array(
						'q'=>'SELECT * FROM social.contacts where guid=me',
						'format'=>'json'
					), array('FailOnAccessError'=>true), $dede);
			}
		}
		$success = $client->Finalize($success);
	}
	if($client->exit)
		exit;
	if($success)
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Yahoo OAuth client results</title>
</head>
<body>
<?php
print_r($success);
echo $dede;
print_r($dede);


?>
</body>
</html>
<?php
	}
	else
	{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>OAuth client error</title>
</head>
<body>
<h1>OAuth client error</h1>
<p>Error: <?php echo HtmlSpecialChars($client->error); ?></p>
</body>
</html>
<?php
	}

?>