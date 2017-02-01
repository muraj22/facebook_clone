<?php
$size = getimagesize($target_pathv);
$width=$size[0];
$height=$size[1];

if(!isset($addphotosvar)){
include("classes/resizer.php");
}

include("common_no_suffix.php");

if(isset($cnt) && isset($_SESSION['progress_'.$cnt]) && isset($including) && $including=="add_photos2.php"){
$pv=rand(65,85);
session_start();
$_SESSION['progress_'.$cnt]=$pv;
session_write_close();
}

if(isset($cnt) && isset($_SESSION['progress_'.$cnt]) && isset($including) && $including=="add_photos2.php"){
session_start();
$pva[1]=90; //=85
$pva[2]=90;
$pv=rand(1,2);
$pv=$pva[$pv];
$_SESSION['progress_'.$cnt]=$pv;
session_write_close();
}

include("common_a.php");
?>