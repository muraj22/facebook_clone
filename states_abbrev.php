<?php

/* Connection vars here for example only. Consider a more secure method. */
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'xd1xd1';
$dbname = 'registered';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);

$return_arr = array();

/* If connection to database, run sql statement. */
if ($conn)
{
	$fetch = mysql_query("SELECT * FROM states where state like '%" . mysql_real_escape_string($_GET['term']) . "%'"); 

	/* Retrieve and store in array the results of the query.*/
	while ($ms = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
		$ms_array['label'] = $ms['state'];
		$ms_array['value'] = $ms['abbrev'];

        array_push($return_arr,$ms_array);
    }
}
/* Free connection resources. */
mysql_close($conn);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);
?>