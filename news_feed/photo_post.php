<?php
$res_photoid=$sbid;

$x=grsn(11);
$ix=$x;

//photos and videos
$uploading_wall="t";
$whomposted[]=$uid;
if($uidv!=$uid){
$wall="t";	
}
include("master/stories/photos.php");


$dparams["sbid"]=$res_photoid;
$dparams["nloaded"]=$x;
$dparams["response"]=$dr[$ix];
$dparams["lbd2v"]=$albumid.":".$res_photoid;

echo json_encode($dparams);

?>
