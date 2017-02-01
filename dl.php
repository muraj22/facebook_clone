<?php

include("downloader.inc.php");
$filename=$_GET['fname'];
function genRandomString($length,$n) {
	if($n=="n"){
    $characters = '0123456789934000';
	}
	else{
	$characters = 'n';
	}
	$string = '';    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    return $string;
}
function file_extension($filename)
{
    $path_info = pathinfo($filename);
    return $path_info['extension'];
}
$filenamee=genRandomString(6,'n').'_'.genRandomString(15,'n').'_'.genRandomString(15,'n').'_'.genRandomString(6,'n').'_'.genRandomString(9,'n').'_'.genRandomString(1,'t').'.'.file_extension($filename);


$id=$_GET['tagu'];
$source='users/'.$id.'/pics/'.$filename;

if (file_exists($source))
{

    $download = new downloader();
    
    $download->set_byfile($source);
    $download->mime = '';
    $download->use_resume = true; //Enable Resume Mode
    $download->filename = $filenamee;
    
    $download->download();

    exit();
}

?>