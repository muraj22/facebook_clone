<?php 
header("Content-type:application/json; charset:UTF-8");
session_start(); 
if(isset($_SESSION['upload_progress_upload'])){
echo json_encode($_SESSION['upload_progress_upload']);
}
else{}
?>
