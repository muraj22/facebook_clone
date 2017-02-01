<?php include("start.php"); ?>
<?php  

include("start.php");
?>
<?php
$uidv=$uid;
function genRandomString($length) {
    $characters='0123456789abcdefghijklmnopqrstuvwxyz';
    $string='';    

    for ($p=0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    return $string;
}

$uida=$uid.'a';
$uidp=$uid.'p';
$uidl=$uid.'l';


include("chatupd.php");

$fieldname='uploadedfile';

$var1="n";

if(isset($_POST['submit2'])){
$noteid=$_POST['noteid'];
$aid=$_POST['aid'];

$r=mysql_query("SELECT * FROM notes_pics WHERE noteid='$noteid' AND id='$uid'");
$c=mysql_num_rows($r);
if($c>=30){echo'e4{}'; mysql_close($con); exit();}

$active_keys=array();
foreach($_FILES[$fieldname]['name'] as $key => $filename)
{
	if(!empty($filename))
	{
		$active_keys[]=$key;
	}
}


function error($p1,$p2){
echo'{}e';
return true;	
}

$old_error_handler = set_error_handler("error");

count($active_keys)
	or die('{}e');
	//create its own warning at the uploaders - upload failed - no file was uploaded
		
	foreach($active_keys as $key)
{
	($_FILES[$fieldname]['error'][$key] == 0)
		or die('{}e');
	//create its own warning at the uploaders - upload failed
}

foreach($active_keys as $key)
{
	@is_uploaded_file($_FILES[$fieldname]['tmp_name'][$key])
		or die('{}e'.$_FILES[$fieldname]['name'][$key].' not an HTTP upload');
			//create its own warning at the uploaders - upload failed
}


foreach($active_keys as $key)
{
	@getimagesize($_FILES[$fieldname]['tmp_name'][$key])
		or die('{}e'.$_FILES[$fieldname]['name'][$key]);
		//create its own warning at the uploaders - not an image
}



foreach($active_keys as $key)
{
$tp="../users/$uid/pics";


$ufile=$_FILES['uploadedfile']['name'][$key];
$path_parts=pathinfo("$ufile");

$ext=$path_parts['extension']; 

$ran=genRandomString(25);
$ran2=$ran.".";
$top="../users/$uid/pics/";
$tp=$top.$ran2.$ext; 
$tps=$top.$ran.'v.'.$ext; 

$s0=$top.$ran.'s0.'.$ext;
$s1=$top.$ran.'s1.'.$ext;


 if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'][$key], $tp)) {

$actual_pic=$ran2.$ext;

$tpc=$top.$ran.'os.'.$ext;

copy($tp,$tpc);

$size=getimagesize($tp);
$width=$size[0];
$height=$size[1];
if(!isset($addphotosvar)){
include("classes/resizer.php");
}
if($width>720){
$topv=$top.$ran2.$ext;
$image=new resizer(); $image->prepare($tp,$topv); $image->ToWidth(720); 
}

$size=getimagesize($tp);
$width=$size[0];
$height=$size[1];


if($height>720){
$topv=$top.$ran2.$ext;
$image=new resizer(); $image->prepare($tp,$topv); $image->ToHeight(720);
}


$size=getimagesize($tp);
$width=$size[0];
$height=$size[1];

$heightd=$height*100/$width;

$topv=$top.$ran.'v.'.$ext;


if($width>75){
$image=new resizer(); $image->prepare($tp,$topv); $image->ToWidth(75); 
}
else if($height>225){
$third=round($height/3);
$image=new resizer(); $image->prepare($tp,$topv); $image->ToHeight($third); 
}
else{
copy($tp,$topv);
}

copy($tp,$s0);

if($width>180){
$image=new resizer(); $image->prepare($tp,$s1); $image->ToWidth(180); 	
}
else if($height>180){
$image=new resizer(); $image->prepare($tp,$s1); $image->ToHeight(180); 
}
else{
copy($tp,$s1);	
}

$size=getimagesize($topv);
$swidth=$size[0];
$sheight=$size[1];

$size=getimagesize($tp);
$lwidth=$size[0];
$lheight=$size[1];

$photoid=genRandomString(25);

$pf=$ran.'.'.$ext;
$pf2=$ran.'v.'.$ext;
$os=$ran.'os.'.$ext;

$s0=$ran.'s0.'.$ext;
$s1=$ran.'s1.'.$ext;

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

   
echo'
<script type="text/javascript">';

$suc=$pf2;

echo'

parent.updateu("'.$suc.'",'.$aid.','.$sheight.');
</script>
';


mysql_query("INSERT INTO notes_pics (noteid,id,aid,visibility,pf,pf2,s0,s1,os,caption,css_class,sw,sh,lw,lh,datetimep) VALUES('$noteid','$uid','$aid','v','$pf','$pf2','$s0','$s1','$os','','0','$swidth','$sheight','$lwidth','$lheight',UNIX_TIMESTAMP())");


$aid++;
}



}




exit();
$var1="y";
}

else{$var1="n";}


if($var1=="n"){

}
?>
<?php include("end.php"); ?>