<?php
include("functions/grs_h.php");
include("functions/grs.php");
$mg=grs_h(12);
$mgv=grs(12).'rnc'; //registration nc not used for server session at all except for this purpose
include("apply.php");
if(!isset($_SESSION)){
session_start();
}
$_SESSION[$mgv]=$mg;
$topost_register[$mgv]=$mg;
$topost_register['sr']=$mgv;
$mg=grs_h(12);
$mgv=grs(12).'rnc';
include("apply.php");
$_SESSION[$mgv]=$mg;
session_write_close();
$topost_login[$mgv]=$mg;
$topost_login['srv']=$mgv;
//increase configuration numbers above as the fortune grows
//encripatada esta la llave de la session.
?>