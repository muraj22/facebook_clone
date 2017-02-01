<?php
include("start.php");

mysql_query("DROP TABLE IF exists media");
$vals='sbid bigint NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
vids varchar(100),
vidshd varchar(100),
vidso varchar(100),
duration varchar(100),
videow int(20),
videoh int(20),
notify varchar(10),
pics varchar(200),
picss varchar(200),
picsm varchar(200),
picsr varchar(200),
picsa varchar(200),
fname varchar(200),
faces longtext,
descr longtext,
location varchar(100),
locationsetby varchar(100),
sbidv varchar(100),
id bigint(100),
id2 bigint(100),
albumid bigint(100),
albumn varchar(200),
filter varchar(200),
frame int(2),
tilt_shift int(2),
norder int(20),
oldorder int(20),
title varchar(200),
shot int(20),
shott int(20),
nye int(20),
degrees float(20),
filter_degrees float(20),
cityc varchar(800),
statec varchar(800),
countryc varchar(800),
visibility varchar(100),
pin int(2),
total_brightness int(3),
total_contrast int(3),
privacy longtext,
privacyh longtext,
datetimep int(100),
datetimep_pp int(100)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE media ($vals) AUTO_INCREMENT=10000000;");


?>