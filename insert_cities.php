<?php
$con=mysql_connect("localhost","root","xd22xd22");

$sql="LOAD DATA LOCAL INFILE 'var/www/html/worldcitiespop.txt' INTO TABLE cities
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '\"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(country, city_ascii, city, region, population, latitude, longitude)";

mysql_query($sql);

/*
afterwards run the following queries from console
insert into cities9 SELECT * FROM cities WHERE population!='0' ORDER BY population DESC;
insert into cities10 SELECT * FROM cities WHERE population='0';
 */
?>