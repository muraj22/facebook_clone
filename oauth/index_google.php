<?php
//GOOGLE

include_once("google-api-php-client/src/Google_Client.php");
session_start();

$client = new Google_Client();
$client->setApplicationName('Google Contacts PHP Sample');
$client->setScopes("http://www.google.com/m8/feeds/");

$client->setClientId('165534152067.apps.googleusercontent.com');
$client->setClientSecret('POBPx0dYgywGrJ9hf_ubED-B');
$client->setRedirectUri('http://subsbook.com/oauth/index_google.php');
$client->setDeveloperKey('a6553415206');

if (isset($_GET['code'])) {
  $client->authenticate();
  $_SESSION['token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
 $client->setAccessToken($_SESSION['token']);
}

if (isset($_REQUEST['logout'])) {
  unset($_SESSION['token']);
  $client->revokeToken();
}

if ($client->getAccessToken()) {

if(!isset($_POST['wildcard'])){
echo'
<script type="text/javascript">
if(window.opener){
window.opener.retrieve_contacts_b("google");
//alert(2);
}
window.close();
</script>
';
exit();
}

	$req = new Google_HttpRequest("https://www.google.com/m8/feeds/contacts/default/full?max-results=9999");
	$val = $client->getIo()->authenticatedRequest($req);
 $response = $val->getResponseBody();
  

$doc = new DOMDocument;
$doc->recover = true;
$doc->loadXML($response);

$xpath = new DOMXPath($doc);
$xpath->registerNamespace('gd', 'http://schemas.google.com/g/2005');

$emails = $xpath->query('//gd:email');

$contact=array();

foreach ( $emails as $email )
{
$dname=$email->parentNode->getElementsByTagName('title')->item(0)->textContent;
$demail=$email->getAttribute('address');
$contact[$demail]=$dname;
}

//print_r($contact);



  $_SESSION['token'] = $client->getAccessToken();
} else {
  $auth = $client->createAuthUrl();
}

if (isset($auth)) {
header("Location: $auth");
  } else {
	  echo'
	  
	  ';
  //  print "<a class=logout href='?logout'>Logout</a>";
}
?>