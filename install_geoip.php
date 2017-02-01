<?php

/*==============================================================================

Application: PHP + MySQL GeoIP Manager
Author: Bartomedia - http://bartomedia.blogspot.com/
Date: 14th December 2007
Description: GeoIP Manager for PHP + MySQL easy install script
Version: V1.0

------------------------------------------------------------------------------*/

// DATABASE CONNECTION AND SELECTION
$host = "localhost";
$unv = "root";//
$password = "root";//
$database = "geoipdb";//

// DEFINE THE PATH AND NAME TO THE MAXMIND CSV FILE ON YOUR SERVER
$filename = "GeoIPCountryWhois.csv";
$filepath = $_SERVER["DOCUMENT_ROOT"];


// DO NOT EDIT BELOW THIS LINE
//////////////////////////////////////////////////////////////////////////////////
$error_msg = "";
$message = "";
$dependent = 1;

if ( ! ereg( '/$', $filepath ) )
{ $filepath = $filepath."/"; }

// the @ symbol is warning suppression so a warning will not be thrown back
// to the user, be careful not to over-rely on warning suppression, every
// warning suppression should be modified with an if else to catch the
// warning

if ( ! $Config["maindb"] = @mysql_connect($host, $unv, $password) )
{
$error_msg.= "There is a problem with the <b>mysql_connect</b>, please check the username and password !<br />";
$dependent = 0;
}
else
{
if ( ! mysql_select_db($database, $Config["maindb"]) )
{
$error_msg.= "There is a problem with the <b>mysql_select_db</b>, please check that a valid database is selected to install the GeoIP database to !<br />";
$dependent = 0;
}
else
{
// CHECK FOR SAFE MODE
if( ini_get('safe_mode') )
{
// Do it the safe mode way
$error_msg.= "Warning Safe Mode is ON, please turn Safe Mode OFF to avoid the script from timing out before fully executing and installing the GeoIP database.<br />";
$dependent = 0;
}
else
{
// MAX EXECUTION TIME OF THIS SCRIPT IN SEC
set_time_limit(0);
// CHECK FOR MAXMIND CSV FILE

if ( ! file_exists($filepath.$filename) )
{
$error_msg.= "The Maxmind GeoLite Countries CSV file could not be found !<br />";
$error_msg.= "Please check the file is located at ".$filepath." of your server and the filename is \"".$filename."\".<br />";
$dependent = 0;
}
else 
{
$lines = count(file($filepath.$filename));
$filesize = filesize($filepath.$filename);
$filectime = filectime($filepath.$filename);
$filemtime = filemtime($filepath.$filename);
$fileatime = fileatime($filepath.$filename);
} 
} 
}
}




// SCRIPT FUNCTIONS
function check_GeoIP_status()
{
global $Config;
global $lines;
$result = mysql_query("SHOW TABLE STATUS LIKE 'ip'", $Config["maindb"]);
if($ip = mysql_fetch_array($result))
{
// Check within 3 rows difference for new CSV
// updates usually feature many more lines of code
if ( $ip["Rows"] > ($lines - 3 ) )
{return "OK";}
else
{return "UPDATE";}
}
else
{return "CREATE";}
}

function load_new_GeoIP_data($filename)
{
global $Config;
global $message;

$query = "DROP TABLE IF EXISTS `csv`"; // EMPTY
if ( ! $result = mysql_query( $query, $Config["maindb"] ) )
{
$message.= "Failed to delete the `csv` table, Please check you have permission to drop tables.<br />";
return false;
}

$query = "CREATE TABLE IF NOT EXISTS `csv` (
`start_ip` char(15)NOT NULL,
`end_ip` char(15)NOT NULL,
`start` int(10) unsigned NOT NULL,
`end` int(10) unsigned NOT NULL,
`cc` char(2) NOT NULL,
`cn` varchar(50) NOT NULL
) TYPE=MyISAM;";
if ( ! $result = mysql_query( $query, $Config["maindb"] ) )
{
$message.= "Failed to create the `csv` table, Please check you have permission to create tables.<br />";
return false;
}

$query = "LOAD DATA LOCAL INFILE \"".$filename."\"

INTO TABLE `csv`
FIELDS
TERMINATED BY \",\"
ENCLOSED BY \"\\\"\"
LINES
TERMINATED BY \"\\n\"
(
start_ip, end_ip, start, end, cc, cn
)"; 
if ( ! $result = mysql_query( $query, $Config["maindb"] ) )
{
$message.= "Failed to load the Maxmind CSV file into the `csv` table.<br />";
return false;
}

return true;
} 


function build_GeoIP_data()
{
global $Config;
global $message;

$query = "DROP TABLE IF EXISTS `cc`"; // DELETE
if ( ! $result = mysql_query( $query, $Config["maindb"] ) )
{
$message.= "Failed to delete the `cc` table, Please check you have permission to drop tables.<br />";
return false;
}

$query = "CREATE TABLE IF NOT EXISTS `cc` (
`ci` tinyint(3) unsigned NOT NULL auto_increment,
`cc` char(2) NOT NULL,
`cn` varchar(50) NOT NULL,
PRIMARY KEY (`ci`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;";
if ( ! $result = mysql_query( $query, $Config["maindb"] ) )
{
$message.= "Failed to create the `cc` table, Please check you have permission to create tables.<br />";
return false;
}

$query = "DROP TABLE IF EXISTS `ip`"; // DELETE
if ( ! $result = mysql_query( $query, $Config["maindb"] ) )
{
$message.= "Failed to delete the `csv` table, Please check you have permission to drop tables.<br />";
return false;
}

$query = "CREATE TABLE IF NOT EXISTS `ip` (
`start` int(10) unsigned NOT NULL,
`end` int(10) unsigned NOT NULL,
`ci` tinyint(3) unsigned NOT NULL,
KEY `start` (`start`),
KEY `end` (`end`)
) TYPE=MyISAM;";
if ( ! $result = mysql_query( $query, $Config["maindb"] ) )
{
$message.= "Failed to create the `ip` table, Please check you have permission to create tables.<br />";
return false;
}

// EXTRACT DATA FROM CSV FILE AND INSERT INTO MYSQL
$query = "INSERT INTO `cc` SELECT DISTINCT NULL, `cc`, `cn` FROM `csv`;";
if ( ! $result = mysql_query( $query, $Config["maindb"] ) )
{
$message.= "Failed to insert data into the `cc` table from the `csv` table, Please check you have permission to insert in tables.<br />";
return false;
}

// OPTIMIZE MYSQL
$query = "INSERT INTO `ip` SELECT `start`, `end`, `ci` FROM `csv` NATURAL JOIN `cc`;";
if ( ! $result = mysql_query( $query, $Config["maindb"] ) )
{
$message.= "Failed to insert data into the `ip` table from the `csv` table, Please check you have permission to insert in tables.<br />";
return false;
}

return true;
}

function cleanup_GeoIP_data()
{
global $Config;
global $message;

$query = "DROP TABLE IF EXISTS `csv`"; // DELETE
if ( ! $result = mysql_query( $query, $Config["maindb"] ) )
{
$message.= "Failed to delete the `csv` table, Please check you have permission to drop tables.<br />";
return false;
}
return true;
} 

////////////////////////////////////////////////////////

// FUNCTIONS TO SELECT DATA
function getALLfromIP($addr)
{
global $Config;
// this sprintf() wrapper is needed, because the PHP long is signed by default
$ipnum = sprintf("%u", ip2long($addr));
$query = "SELECT start, cc, cn FROM ip NATURAL JOIN cc WHERE end >= $ipnum ORDER BY end ASC LIMIT 1";
$result = mysql_query($query, $Config["maindb"]);
$data = mysql_fetch_array($result);

if((! $result) || mysql_numrows($result) < 1 || $data['start'] > $ipnum )
{
return false;
}
return $data;
}

function getCCfromIP($addr) {
$data = getALLfromIP($addr);
if($data) return $data['cc'];
return false;
}

function getCOUNTRYfromIP($addr) {
$data = getALLfromIP($addr);
if($data) return $data['cn'];
return false;
}

function getCCfromNAME($name) {
$addr = gethostbyname($name);
return getCCfromIP($addr);
}

function getCOUNTRYfromNAME($name) {
$addr = gethostbyname($name);
return getCOUNTRYfromIP($addr);
}

// EXECUTE SCRIPTING
//////////////////////////////////////////////////////////////


if ( isset ($_REQUEST["command"]) && $_REQUEST["command"] == "cancel" )
{
header( "Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'] );
exit;
}

if ( $dependent == 0 )
{
$error_msg.= "Please correct the script before continuing !<br />";
}
else
{
// continue with the rest of the script

// CREATE NEW GEOIP DATABASE
if ( ! isset ($_REQUEST["command"]) )
{ 
$message.= "Current Maxmind GeoIP CSV data<br />";
$message.= "Records = ".$lines." Rows<br />";
$message.= "filesize = ".$filesize." bytes<br />";
$message.= "created = ".date("D j M Y, \a\\t g.i:s a", $filectime)."<br />";
$message.= "modified = ".date("D j M Y, \a\\t g.i:s a", $filemtime)."<br /><br>";

switch (check_GeoIP_status())
{
case "OK":
$message.= "The GeoIP database is fully up to date !<br />";
break;
case "UPDATE":
$message.= "A newer version of the GeoIP country database has been detected !<br />";
$message.= "Would you like to update the GeoIP database ? ";
$message.= "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?command=update\">yes</a><br />";
break;
case "CREATE":
$message.= "The script could not detect a GeoIP country database<br />";
$message.= "Would you like to create a new GeoIP database ? ";
$message.= "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?command=create\">yes</a><br />";
break;
}
}


// CREATE NEW GEOIP DATABASE
if ( isset ($_REQUEST["command"]) && $_REQUEST["command"] == "create" && ! isset ($_REQUEST["confirm"]) )
{ 
$message.= "Note : Creating a GeoIP database can take as long as 5 minutes depending on you servers processor speed.<br />";
$message.= "After you click 'yes' please wait until the script has finished executing before performing any other action.<br />";
$message.= "Are you sure you would like to create a new GeoIP database ? ";
$message.= "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?command=create&confirm=yes\">yes</a> / ";
$message.= "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?command=cancel\">cancel</a><br />";
}


// UPDATE GEOIP DATABASE
if ( isset ($_REQUEST["command"]) && $_REQUEST["command"] == "update" && ! isset ($_REQUEST["confirm"]) )
{ 
$message.= "Note : Updating the GeoIP database can take as long as 5 minutes depending on you servers processor speed.<br />";
$message.= "After you click 'yes' please wait until the script has finished executing before performing any other action.<br />";
$message.= "Are you sure you would like to update the GeoIP database ? ";
$message.= "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?command=update&confirm=yes\">yes</a> / ";
$message.= "<a href=\"http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."?command=cancel\">cancel</a><br />";
}

// CREATE NEW GEOIP DATABASE
if ( isset ($_REQUEST["command"]) && $_REQUEST["command"] == "create" && isset ( $_REQUEST["confirm"]) && $_REQUEST["confirm"] == "yes" )
{ 
if ( load_new_GeoIP_data($filepath.$filename) )
{
if ( build_GeoIP_data() )
{
if ( cleanup_GeoIP_data() )
{
header( "Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'] );
exit;
}
}
} 
}

// UPDATE GEOIP DATABASE
if ( isset ($_REQUEST["command"]) && $_REQUEST["command"] == "update" && isset ( $_REQUEST["confirm"]) && $_REQUEST["confirm"] == "yes" )
{ 
if ( load_new_GeoIP_data($filename) )
{
if ( build_GeoIP_data() )
{
if ( cleanup_GeoIP_data() )
{
header( "Location: http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'] );
exit;
}
}
} 
}
}




?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>INSTALL MAXMIND GEOIP COUNTRIES DATABASE</title>
</head>

<body>
<h1>Bartomedia - http://bartomedia.blogspot.com/</h1>

<h3>GEO IP Manager for PHP + MySQL</h3>
<?php

if ( $error_msg != "" )
{
print $error_msg;
}
else
{
print $message;
}

$result = @mysql_query("SELECT * FROM ip LIMIT 1", $Config["maindb"]);
$ip_num_rows = @mysql_num_rows( $result );
$result = @mysql_query("SELECT * FROM cc LIMIT 1", $Config["maindb"]);
$cc_num_rows = @mysql_num_rows( $result );

if ( $ip_num_rows > 0 && $cc_num_rows > 0 )
{
if ( isset( $_POST["ip"] ) && $_POST["ip"] != "" )
{
$ip = $_POST["ip"];
$cc = getCCfromIP($ip);
$cn = getCOUNTRYfromIP($ip);
if ( $cc != false && $cn != false )
{
print "<p>[".$cc."] ".$cn."</p>";
}
else
{
print "<p>IP not found !</p>";
}
}
else
{$ip = "";}
?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
<label>IP : <input name="ip" type="text" value="<?= $ip ?>" /></label>

<input name="submit" type="submit" value="submit" />
</form>
<?
}

?>
</body>

</html>