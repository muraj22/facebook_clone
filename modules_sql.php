<?php
if(isset($_GET['xd22xd22'])){

echo'2';

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");

mysql_query("DROP TABLE if exists sb_emails");

$sql="CREATE TABLE sb_emails (
sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
email varchar(255),
email_p varchar(200),
email_c varchar(200),
datetimep int(12)
)";
mysql_query($sql);


mysql_query("DROP TABLE IF exists nemailk");

$sql="CREATE TABLE nemailk (
primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
id bigint(200),
email varchar(255),
nemailk varchar(200),
nemailkh varchar(200),
datetimep int(12)
)";
mysql_query($sql);

//userff
//who, count2, datetimep

mysql_query("DROP TABLE IF EXISTS userff");

$sql="CREATE TABLE userff (
primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
who varchar(200),
count2 varchar(200),
datetimep int(12)
)";
mysql_query($sql);

mysql_query("DROP TABLE IF EXISTS modules");

//modules
$sql="CREATE TABLE modules (
primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
module varchar(200),
predefined longtext,
dvals longtext
)";
//module,dvals
mysql_query($sql);


//invited

mysql_query("DROP TABLE if exists invited");

$sql="CREATE TABLE invited (
sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
cemail varchar(200),
id bigint(200),
dtimes int(3),
inviteid varchar(200),
datetimep int(12)
)";
//cemail,bywho,inviteid,datetimep
mysql_query($sql);


//unsubscribed

mysql_query("DROP TABLE if exists unsubscribed");

$sql="CREATE TABLE unsubscribed (
sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
unsubscribed int(3),
cemail varchar(255),
datetimep int(12)
) AUTO_INCREMENT=10000000;";
//cemail,datetimep
mysql_query($sql);

mysql_query("DROP TABLE if exists countries");

//countries
$sql="CREATE TABLE countries (
primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
countryc varchar(200),
countryn varchar(800)
)";
//countryc,countryn
mysql_query($sql);

mysql_query("DROP TABLE if exists states");

//states
$sql="CREATE TABLE states (
primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
countryc varchar(200),
statec varchar(200),
staten varchar(800)
)";
//countryc,statec,staten
mysql_query($sql);

mysql_query("DROP TABLE if exists languages");

//languages
$sql="CREATE TABLE languages (
primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
language varchar(800)
)";
//language
mysql_query($sql);

mysql_query("DROP TABLE if exists job_titles");

//job_titles
$sql="CREATE TABLE job_titles (
primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
job varchar(800)
)";
//job
mysql_query($sql);

mysql_query("DROP TABLE if exists political_parties");

//political_parties
$sql="CREATE TABLE political_parties (
primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
p varchar(800)
)";
//p
mysql_query($sql);



//cities
//load worldcitiespop.txt


mysql_query("DROP TABLE IF EXISTS cities");
mysql_query("DROP TABLE IF EXISTS cities9");
mysql_query("DROP TABLE IF EXISTS cities10");

$sql="CREATE TABLE cities (
sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
    country       CHAR(2),
    city_ascii    VARCHAR(100),
    city          VARCHAR(255),
    region        CHAR(2),
    population    INT,
    latitude      DECIMAL(10, 6),
    longitude     DECIMAL(10, 6),
	KEY `city` (`city`(5)),
	INDEX (population)
)";

mysql_query($sql);

$sql="CREATE TABLE cities9 (
sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
    country       CHAR(2),
    city_ascii    VARCHAR(100),
    city          VARCHAR(255),
    region        CHAR(2),
    population    INT,
    latitude      DECIMAL(10, 6),
    longitude     DECIMAL(10, 6),
	KEY `city` (`city`(5)),
	INDEX (population)
)";

mysql_query($sql);

$sql="CREATE TABLE cities10 (
sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
    country       CHAR(2),
    city_ascii    VARCHAR(100),
    city          VARCHAR(255),
    region        CHAR(2),
    population    INT,
    latitude      DECIMAL(10, 6),
    longitude     DECIMAL(10, 6),
	KEY `city` (`city`(5)),
	INDEX (population)
)";


mysql_query($sql);
/*
$sql="LOAD DATA LOCAL INFILE 'C:/xampp/htdocs/worldcitiespop.txt' INTO TABLE cities
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '\"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(country, city_ascii, city, region, population, latitude, longitude)";

mysql_query($sql);
/*

after cities is created :

insert into cities9 SELECT * FROM cities WHERE population!='0' ORDER BY population DESC;
insert into cities10 SELECT * FROM cities WHERE population='0';

*/




mysql_close($con);
}
?>