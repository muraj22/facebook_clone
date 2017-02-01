<?php
$dyear=$_POST['dyear'];
$dmonth=$_POST['dmonth'];
($dyear>0 ? $totdays = date("t",strtotime($dyear.'-'.$dmonth.'-01')) : $totdays=''); 
echo $totdays;
?>