<?php 
session_start(); 
$cnt=$_POST['ccnt'];
print_r($_SESSION);
if(isset($_SESSION['upload_progress_upload_'.$cnt])){

$up=$_SESSION['upload_progress_upload_'.$cnt];
$bp=$up['bytes_processed'];
$cl=$up['content_length'];

$rn=ceil(($bp / $cl)*100); 
$rn=floor($rn/2.2); 

if(!isset($_SESSION['progress_'.$cnt])){
$_SESSION['progress_'.$cnt]=$rn; 

}

}
else{
if(!isset($_SESSION['progress_'.$cnt])){

$_SESSION['progress_'.$cnt]=rand(45,65);

}
}
echo $_SESSION['progress_'.$cnt];

/*if($_SESSION['progress_'.$cnt]==100){
unset($_SESSION['progress_'.$cnt]);	
}
*/
?>
