<?php
$toapply=$mgv;
$first=substr($toapply,0,5);
$second=substr($toapply,5);
$first=$first.'0'.$second;

$third=substr($first,0,10);
$fourth=substr($first,10);
$third=$third.'1'.$fourth;

$mgv=$third;
//0 and 1 are expected as values on position
?>