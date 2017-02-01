<?php
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

mysql_query("DROP TABLE IF EXISTS transactions");

$sql="CREATE TABLE transactions (
sbid bigint NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(100),
id2 bigint(100),
amount bigint(100),
datetimep int(12)
) AUTO_INCREMENT=10000000;";
mysql_query($sql);

mysql_query("DROP TABLE IF EXISTS bank");

$sql="CREATE TABLE bank (
sbid bigint NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(100),
amount bigint(100)
) AUTO_INCREMENT=10000000;";
mysql_query($sql);


mysql_query("DROP TABLE IF EXISTS transactionsv");

$sql="CREATE TABLE transactionsv (
sbid bigint NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(100),
amount bigint(100),
datetimep int(12)
) AUTO_INCREMENT=10000000;";
mysql_query($sql);
?>