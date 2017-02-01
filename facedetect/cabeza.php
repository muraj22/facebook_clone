<?php
$esto="C:/xampp/htdocs/facedetect/facedetect C:/xampp/htdocs/users/10000008/pics/5fuwylib98arld03k32y08ia8pf.jpg";
echo $esto;

$d=exec($esto." 2>&1");
var_dump($d);
?>