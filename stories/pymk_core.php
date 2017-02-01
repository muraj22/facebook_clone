<?php
$mutual=array();
$personas=array();


$friends_comma='';
foreach($u_friends_c as $k=>$v){
$friends_comma.=','.$v;
}
$friends_comma=substr($friends_comma,1);

foreach($uid_friends as $k=>$v){ //veo en cada uno de mis amigos..

$r=mysql_query("SELECT id FROM friends WHERE FIND_IN_SET(id,'$friends_comma')=0  AND id!='$uid' AND id2='$v' AND id!='' AND (confirmed='y' OR confirmed='d' OR confirmed='nc' OR confirmed='k') ORDER by datetimep DESC");
while($m=mysql_fetch_array($r)){
$personas[]=$m['id']; //paquito es un amigo de martin que es mi amigo
}

}

$personas=array_unique($personas); //hago unica la lista de potenciales amistades

foreach($personas as $k=>$v){ //por cada una de ellas creo un array enorme con la informacion de cada uno de esos amigos mutuos [solo cuento aqui]

$r2=mysql_query("SELECT COUNT(*) as c2 FROM friends WHERE FIND_IN_SET(id2,'$friends_comma')>0 AND id='$v' AND confirmed='y'");
$m2=mysql_fetch_array($r2);
$mutual[$v]=$m2['c2'];

}
?>