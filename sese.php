<?php
$xml = simplexml_load_file('http://query.yahooapis.com/v1/yql?q=SELECT * FROM social.contacts WHERE guid="me"');

$results = $xml->results; /* Accessing parent node <results> */


print_r($results);

?>