<?php
if(!isset($pin)){
    $pin=1;   
}
if(!isset($brightness)){
$brightness=0;
}
if(!isset($contrast)){
$contrast=0;
}
if(!isset($uidv)){
$uidv=$uid;	
}
else{ //check if user exists or was fake input
if($uidv==""){
$uidv=$uid;	
}
$r=mysql_query("SELECT * FROM registered WHERE id='$uidv'");
$c=mysql_num_rows($r);
if($c==0){
exit();	
}
}
if(isset($_POST['uploader_vis'])){
$vis=$_POST['uploader_vis'];	
}
else{
$vis='v';
}
if(!isset($filter)){
$filter="normal";	
}
if(!isset($frame)){
$frame=2;	
}
if(!isset($tilt_shift)){
$tilt_shift=2;	
}

if(!isset($privacy)){
$privacy=0; //public, actually select default privacy stored for media (if any) for this user, else use account's default privacy - por ahora dejarlo en public	
}
if(!isset($privacyh)){
$privacyh="";	
}

if(!isset($vidso)){
if(!isset($fname)){
$fname=$actual_pic;
}
$faces='';
mysql_query("INSERT INTO media (vids,vidshd,vidso,duration,videow,videoh,notify,pics,picss,picsm,picsr,picsa,fname,faces,descr,location,locationsetby,sbidv,id,id2,albumid,albumn,filter,frame,tilt_shift,norder,oldorder,title,shot,shott,nye,degrees,filter_degrees,cityc,statec,countryc,visibility,pin,total_brightness,total_contrast,privacy,privacyh,datetimep,datetimep_pp)
VALUES ('','','','','','','','$actual_pic','$actual_pic2','$actual_pic3','$actual_pic4','$actual_pic7','$fname','$faces','$descr','$location','$uid','','$uid','$uidv','$selected_album','$albumn','$filter','$frame','$tilt_shift','$norder','$norder','','','','3','0','0','$cityc','$statec','$countryc','$vis','$pin','$brightness','$contrast','$privacy','$privacyh',UNIX_TIMESTAMP(),UNIX_TIMESTAMP())");
}
else{
mysql_query("INSERT INTO media (vids,vidshd,vidso,duration,videow,videoh,notify,pics,picss,picsm,picsr,picsa,fname,faces,descr,location,locationsetby,sbidv,id,id2,albumid,albumn,filter,frame,tilt_shift,norder,oldorder,title,shot,shott,nye,degrees,filter_degrees,cityc,statec,countryc,visibility,pin,total_brightness,total_contrast,privacy,privacyh,datetimep,datetimep_pp)
VALUES ('','','$vidso','','','','$notify','','','','','','','','$descr','$location','$uid','$sbidv','$uid','$uidv','$albumid','Videos','$filter','$frame','$tilt_shift','$norder','$norder','$title','','','$nye','0','0','$cityc','$statec','$countryc','$vis','$pin','$brightness','$contrast','$privacy','$privacyh',UNIX_TIMESTAMP(),'')");
}
?>