<?php
$db = new PDO('mysql:dbname=registered;host=localhost;charset=utf8', 'root', 'xd1xd1');
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$uid='LEHDWLORUL90ZIOHM6VYFPQC1YVJIX3XLX75Q5SUIQDYS34800T9U6B';
$uidf=$uid.'f';
$u_friends=array();

$r3 = $db->prepare("SELECT * FROM $uidf WHERE confirmed=:confirmed");

$qv=array();
$qv['confirmed']='y';
$r3->execute($qv);

foreach ($r3 as $m3) {

$u_friends[]=$m3['id2'];
}
print_r($u_friends);
?>