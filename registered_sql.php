<?php
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("registered");

if(!isset($_GET['xd22xd22'])){
	exit();
}
//mysql_query("DELETE FROM modules WHERE module='nta'");


mysql_query("DROP TABLE IF EXISTS transactions");

$sql="CREATE TABLE transactions (
sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(100),
id2 longtext,
amount bigint(100),
fee bigint(100),
datetimep int(12)
) AUTO_INCREMENT=10000000;";
mysql_query($sql);

mysql_query("DROP TABLE IF EXISTS bank");

$sql="CREATE TABLE bank (
sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(100),
amount bigint(100)
) AUTO_INCREMENT=10000000;";
mysql_query($sql);

mysql_query("DROP TABLE IF EXISTS withdrawals");

$sql="CREATE TABLE withdrawals (
sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint (100),
visibility varchar(255),
email longtext,
datetimep_se int(12),
datetimep int(12)
) AUTO_INCREMENT=10000000;";
mysql_query($sql);

mysql_query("DROP TABLE IF EXISTS registered");

$sql="CREATE TABLE registered (
sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
f_name varchar(200),
l_name varchar(200),
email varchar(200),
password varchar(200),
gender varchar(200),
month int(5),
day int(5),
year int(5),
id bigint(200),
profilepic varchar(200),
fullname varchar(200),
status int(2),
username varchar(200),
userc varchar(200),
profilepict varchar(200),
datetimepn int(12),
datetimepl int(12),
datetimepk int(12),
dsalt varchar(200)
) AUTO_INCREMENT=10000000;";
mysql_query($sql);

mysql_query("CREATE UNIQUE INDEX unique_email ON registered (email)");

//repins

mysql_query("DROP TABLE IF exists repins");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
likeid bigint(200),
count bigint(200),
what varchar(255),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE repins ($vals) AUTO_INCREMENT=10000000;");

//repinw

mysql_query("DROP TABLE IF exists repinw");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
id2 bigint(200),
repins int(3),
likeid bigint(200),
albumid bigint(200),
what varchar(255),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE repinw ($vals) AUTO_INCREMENT=10000000;");

//albums

mysql_query("DROP TABLE IF exists albums");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
albumn varchar(200),
location varchar(200),
descr longtext,
visibility varchar(200),
album_cover varchar(200),
cityc varchar(800),
statec varchar(800),
countryc varchar(800),
norder int(20),
oldorder int(20),
privacy longtext,
privacyh longtext,
pinboard int(2),
datetimep int(12),
datetimep_pp int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE albums ($vals) AUTO_INCREMENT=10000000;");

//media

mysql_query("DROP TABLE IF exists media");
$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
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



mysql_query("DROP TABLE IF exists tags");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
label2 varchar(200),
width2 float(20),
height2 float(20),
top2 varchar(200),
left2 varchar(200),
photoid bigint(200),
pin int(3),
id3 varchar(200),
datetimep int(12),
id2 bigint(200),
id bigint(200),
thephotom varchar(200),
thephotol varchar(200),
albumid bigint(200),
flag varchar(200),
visibility varchar(200)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE tags ($vals) AUTO_INCREMENT=10000000;");


//video_shots
mysql_query("DROP TABLE IF exists video_shots");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
videoid bigint(200),
albumid bigint(200),
shot varchar(200),
pics varchar(200),
picss varchar(200),
picsm varchar(200),
picsr varchar(200),
picsa varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE video_shots ($vals) AUTO_INCREMENT=10000000;");




mysql_query("DROP TABLE IF exists likes");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
likeid bigint(200),
count bigint(200),
what varchar(255),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE likes ($vals) AUTO_INCREMENT=10000000;");

mysql_query("DROP TABLE IF exists likew");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
id2 bigint(200),
likes int(3),
likeid bigint(200),
albumid bigint(200),
what varchar(255),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE likew ($vals) AUTO_INCREMENT=10000000;");


mysql_query("DROP TABLE IF exists ipliving");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
countryc varchar(2),
countryn longtext,
city longtext,
continent varchar(4),
region longtext,
regionc int(12),
postal int(12),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE ipliving ($vals) AUTO_INCREMENT=10000000;");


mysql_query("DROP TABLE IF exists sidebar");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
opened int(3),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE sidebar ($vals) AUTO_INCREMENT=10000000;");


mysql_query("DROP TABLE IF exists namechange");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
f_name varchar(200),
m_name varchar(200),
l_name varchar(200),
fullname varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE namechange ($vals) AUTO_INCREMENT=10000000;");


mysql_query("DROP TABLE IF exists optionsv");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
showsex int(3),
showbirthday int(3),
birthdayc int(3),
middlename varchar(200),
dt_password_change int(12),
logout_devices int(3),
sort_option int(3),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE optionsv ($vals) AUTO_INCREMENT=10000000;");

mysql_query("DROP TABLE IF exists birthday_wrote");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
id2 bigint(200),
statusid bigint(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE birthday_wrote ($vals) AUTO_INCREMENT=10000000;");
	 
mysql_query("DROP TABLE IF exists hidden_stories");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
hidden int(3),
likeid bigint(200),
whatisit varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE hidden_stories ($vals) AUTO_INCREMENT=10000000;");


mysql_query("DROP TABLE IF exists report");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
count2 int(12),
likeid bigint(200),
whatisit varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE report ($vals) AUTO_INCREMENT=10000000;");


mysql_query("DROP TABLE IF exists options");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
lcords varchar(200),
tcords varchar(200),
hd varchar(200),
filter_operations varchar(200),
privacy longtext,
privacyh longtext,
datetimep_hd varchar(200),
user_timezone varchar(200),
original_user_timezone varchar(200),
user_timezone_daylight int(2),
datetimep_user_timezone varchar(200),
datetimep int(12)';

$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE options ($vals) AUTO_INCREMENT=10000000;");



mysql_query("DROP TABLE IF exists status");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
id2 bigint(200),
text longtext,
location varchar(200),
visibility varchar(200),
cityc varchar(800),
countryc varchar(800),
statec varchar(800),
privacy longtext,
privacyh longtext,
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';

mysql_query("CREATE TABLE status ($vals) AUTO_INCREMENT=10000000;");


mysql_query("DROP TABLE IF exists friends");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
id2 bigint(200),
confirmed varchar(200),
confirmedrecently varchar(200),
removealert varchar(200),
datetimep int(12),
datetimepv int(200),
cv int(20)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE friends ($vals) AUTO_INCREMENT=10000000;");




mysql_query("DROP TABLE IF exists lists");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
listn varchar(200),
descr longtext,
visibility varchar(200),
type varchar(200),
location varchar(200),
institution varchar(200),
favorites varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';

mysql_query("CREATE TABLE lists ($vals) AUTO_INCREMENT=10000000;");




mysql_query("DROP TABLE IF exists lists_members");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
id2 bigint(200),
listid bigint(200),
type varchar(200),
visibility varchar(200),
location varchar(200),
byw varchar(200),
privacy longtext,
privacyh longtext,
relation varchar(10),
relation_confirmed varchar(10),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';

mysql_query("CREATE TABLE lists_members ($vals) AUTO_INCREMENT=10000000;");


mysql_query("DROP TABLE IF exists notifications_seen");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
notificationid bigint(200),
type varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE notifications_seen ($vals) AUTO_INCREMENT=10000000;");


mysql_query("DROP TABLE IF exists favorites");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
sbidv varchar(200),
visibility varchar(200),
type varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';

mysql_query("CREATE TABLE favorites ($vals) AUTO_INCREMENT=10000000;");





mysql_query("DROP TABLE IF exists commentsv");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
id2 bigint(200),
comment longtext,
elemid bigint(200),
visibility varchar(200),
type varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';

mysql_query("CREATE TABLE commentsv ($vals) AUTO_INCREMENT=10000000;");

mysql_query("DROP TABLE IF exists comments");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
id2 bigint(200),
comment longtext,
elemid bigint(200),
visibility varchar(200),
type varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';

mysql_query("CREATE TABLE comments ($vals) AUTO_INCREMENT=10000000;");


//attention, exact duplicate for comments (instead of commentsv ;) )




mysql_query("DROP TABLE IF exists shares");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
id2 bigint(200),
elemid bigint(200),
photoid bigint(200),
whatisit varchar(200),
valu longtext,
visibility varchar(200),
privacy longtext,
privacyh longtext,
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';

mysql_query("CREATE TABLE shares ($vals) AUTO_INCREMENT=10000000;");

//mysql_query("INSERT INTO shares (id,id2,elemid,photoid,whatisit,valu,visibility,privacy,privacyh,datetimep) VALUES('1','1','1','1','1','1','v','1','1',UNIX_TIMESTAMP())");






mysql_query("DROP TABLE IF exists privacy_last");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
type varchar(200),
category varchar(200),
privacy longtext,
privacyh longtext,
datetimep varchar(200)
';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE privacy_last ($vals) AUTO_INCREMENT=10000000;");




mysql_query("DROP TABLE IF exists tooltip");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
tooltipid int(50),
datetimep varchar(200)
';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE tooltip ($vals) AUTO_INCREMENT=10000000;");


mysql_query("DROP TABLE IF exists living");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
statec varchar(800),
countryc varchar(800),
cityc varchar(800),
type varchar(200),
visibility varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';

mysql_query("CREATE TABLE living ($vals) AUTO_INCREMENT=10000000;");



mysql_query("DROP TABLE IF exists workedu");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
place varchar(800),
position varchar(800),
cityc varchar(800),
statec varchar(800),
countryc varchar(800),
description longtext,
yeare int(4),
monthe int(2),
daye int(2),
yearl int(4),
monthl int(2),
dayl int(2),
currently varchar(200),
type varchar(200),
visibility varchar(200),
datetimep int(12),
datetimepe int(200)';
$vals=str_replace("
"," ",$vals);
$predefined='';

mysql_query("CREATE TABLE workedu ($vals) AUTO_INCREMENT=10000000;");



mysql_query("DROP TABLE if exists languages");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
language varchar(200),
visibility varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);


mysql_query("CREATE TABLE languages ($vals) AUTO_INCREMENT=10000000;");


mysql_query("DROP TABLE if exists interested");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
interested int(2),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);

mysql_query("CREATE TABLE interested ($vals) AUTO_INCREMENT=10000000;");



mysql_query("DROP TABLE if exists about");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
about longtext,
datetimep int(12)';
$vals=str_replace("
"," ",$vals);

mysql_query("CREATE TABLE about ($vals) AUTO_INCREMENT=10000000;");


mysql_query("DROP TABLE IF exists relipo");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
kind varchar(800),
kind_d longtext,
type varchar(200),
visibility varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);

mysql_query("CREATE TABLE relipo ($vals) AUTO_INCREMENT=10000000;");


//relipo = to religion political




mysql_query("DROP TABLE if exists quotations");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
quotations longtext,
datetimep int(12)';
$vals=str_replace("
"," ",$vals);

mysql_query("CREATE TABLE quotations ($vals) AUTO_INCREMENT=10000000;");




mysql_query("DROP TABLE if exists inspirational");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
person varchar(200),
visibility varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);


mysql_query("CREATE TABLE inspirational ($vals) AUTO_INCREMENT=10000000;");




mysql_query("DROP TABLE if exists contact_emails");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
email varchar(200),
primary2 varchar(200),
confirmed varchar(200),
visibility varchar(200),
privacy longtext,
privacyh longtext,
datetimep int(12)';
$vals=str_replace("
"," ",$vals);


mysql_query("CREATE TABLE contact_emails ($vals) AUTO_INCREMENT=10000000;");





mysql_query("DROP TABLE if exists contact_phones");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
phone varchar(200),
ext varchar(200),
type int(1),
primary2 varchar(200),
confirmed varchar(200),
visibility varchar(200),
privacy longtext,
privacyh longtext,
datetimep int(12)';
$vals=str_replace("
"," ",$vals);


mysql_query("CREATE TABLE contact_phones ($vals) AUTO_INCREMENT=10000000;");



mysql_query("DROP TABLE if exists address");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
address varchar(800),
statec varchar(200),
countryc varchar(200),
cityc varchar(200),
zip varchar(200),
neighborhood varchar(200),
visibility varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);


mysql_query("CREATE TABLE address ($vals) AUTO_INCREMENT=10000000;");



mysql_query("DROP TABLE if exists website");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
website longtext,
visibility varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);


mysql_query("CREATE TABLE website ($vals) AUTO_INCREMENT=10000000;");





mysql_query("DROP TABLE if exists contact_im");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
provider varchar(200),
user varchar(200),
visibility varchar(200),
privacy longtext,
privacyh longtext,
datetimep int(12)';
$vals=str_replace("
"," ",$vals);


mysql_query("CREATE TABLE contact_im ($vals) AUTO_INCREMENT=10000000;");






mysql_query("DROP TABLE if exists nt");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
title varchar(200),
body longtext,
visibility varchar(200),
privacy longtext,
privacyh longtext,
datetimep int(12)';
$vals=str_replace("
"," ",$vals);

mysql_query("CREATE TABLE nt ($vals) AUTO_INCREMENT=10000000;");



//notes tags

mysql_query("DROP TABLE IF exists nta");

$vals='primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
tagged varchar(200),
type longtext,
likeid bigint(200),
noteid bigint(200),
visibility varchar(200),
id bigint(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE nta ($vals)");



//notes_pics

mysql_query("DROP TABLE IF exists notes_pics");

$vals='primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
noteid bigint(200),
id bigint(200),
aid bigint(200),
visibility varchar(200),
pf varchar(200),
pf2 varchar(200),
s0 varchar(200),
s1 varchar(200),
os varchar(200),
caption longtext,
css_class varchar(200),
sw varchar(200),
sh varchar(200),
lw varchar(200),
lh varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE notes_pics ($vals)");



mysql_query("DROP TABLE if exists tastes");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(200),
taste varchar(200),
type varchar(200),
visibility varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);

mysql_query("CREATE TABLE tastes ($vals) AUTO_INCREMENT=10000000;");



mysql_query("DROP TABLE IF exists chatopen");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
chatopen longtext,
id bigint(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE chatopen ($vals) AUTO_INCREMENT=10000000;");



mysql_query("DROP TABLE IF exists hidden_suggestions");

$vals='primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
what varchar(200),
id bigint(200),
id2 bigint(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE hidden_suggestions ($vals)");


mysql_query("DROP TABLE IF exists pokes");

$vals='primary2 int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(primary2),
pokeid bigint(200),
id bigint(200),
id2 bigint(200),
pokedback varchar(200),
visibility varchar(200),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE pokes ($vals)");



mysql_query("DROP TABLE IF exists parsing_video");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
parsing int(3),
photoid bigint(100),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE parsing_video ($vals) AUTO_INCREMENT=10000000;");

mysql_query("INSERT INTO parsing_video(parsing,photoid,datetimep) VALUES('0','1',UNIX_TIMESTAMP())");

mysql_query("DROP TABLE IF exists registration_keys");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(100),
email varchar(255),
dk int(6),
confirmed int(3),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE registration_keys ($vals) AUTO_INCREMENT=10000000;");



mysql_query("DROP TABLE IF exists sb_cron_emails");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(100),
type varchar(255),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE sb_cron_emails ($vals) AUTO_INCREMENT=10000000;");

mysql_query("DROP TABLE IF exists reset_password");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(100),
dk int(6),
email varchar(255),
visibility varchar(100),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE reset_password ($vals) AUTO_INCREMENT=10000000;");

mysql_query("DROP TABLE IF exists commentsvv");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint (100),
id2 bigint(100),
comment longtext,
dread_id int(3),
dread_id2 int(3),
source int(3),
status_id int(3),
status_id2 int(3),
visibility_id varchar(100),
visibility_id2 varchar(100),
datetimep int(12),
datetimepr int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE commentsvv ($vals) AUTO_INCREMENT=10000000;");

mysql_query("DROP TABLE IF exists typying");

$vals='sbid bigint(100) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(sbid),
id bigint(100),
id2 bigint(100),
typying int(3),
datetimep int(12)';
$vals=str_replace("
"," ",$vals);
$predefined='';
mysql_query("CREATE TABLE typying ($vals) AUTO_INCREMENT=10000000;");


include("end.php");
?>