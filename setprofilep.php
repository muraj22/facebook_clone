<?php  
include("start.php");
?>
<?php
$albumid=$_POST['albumid'];
$photoid=$_POST['photoid'];

function genRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $string = '';    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    return $string;
}



  
$uida='albums';
$uidp="media";

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

$result=mysql_query("SELECT * FROM $uidp WHERE id='$uid' AND sbid='$photoid'");
if(!$result){
	  die();
  }
  
$result=mysql_query("SELECT * FROM media WHERE id='$uid' AND albumid='$albumid' AND sbid='$photoid'");
while($ms=mysql_fetch_array($result)){
$actual_pic=$ms['pics'];	
$actual_pic2=$ms['picss'];	
$actual_pic3=$ms['picsm'];	
$actual_pic7=$ms['picsa'];	
$actual_pic4=$ms['picsr'];
$descr=$ms['descr'];
$location=$ms['location'];
$whos=$ms['id'];	
$photoid=$ms['sbid'];
$filter=$ms['filter'];
$tilt_shift=$ms['tilt_shift'];
$frame=$ms['frame'];
$fname=$ms['fname'];
$degrees=$ms['degrees'];
}

$result=mysql_query("SELECT * FROM albums WHERE id='$uid' AND albumn='Profile Pictures'");
while($ms=mysql_fetch_array($result)){
$selected_album=$ms['sbid'];	
}
$albumn='Profile Pictures';


foreach($_POST as $k=>$v){
${$k}=$v;	
}

include("classes/photo.php");

$leftv=$c_x1;
$topv=$c_y1;


$img3="users/$uid/pics/$actual_pic";

$size=getimagesize($img3);
$p_wv=$size[0];
$p_hv=$size[1];

function ratio($fv,$sv){
return $fv*100/$sv;
}
function ratior($fv,$sv){
return $fv/100*$sv;
}

$left=ratio($c_x1,$p_w); // what is the perecentage to x inside that photo
$left=ratior($p_wv,$left); // so what is the precentage of p_width inside the photo's width to the left

$top=ratio($c_y1,$p_h);
$top=ratior($p_hv,$top);

$awidth=ratio($c_w,$p_w); //what is the percentage in width of the container towards that photo
$awidth=ratior($p_wv,$awidth); // so what is the perecentage of the crop in width inside the photo

$aheight=ratio($c_h,$p_h);
$aheight=ratior($p_hv,$aheight);

$path_parts = pathinfo("$img3");
$ext = $path_parts['extension']; 
$basename= $path_parts['basename'];


if($filter!="normal" OR $tilt_shift==1){
$filter_suf="_filtered";	
}
else{
$filter_suf="";	
}

include("add_photos/degrees.php");
$new_suf=$degrees_a["$degrees"];

$ran=genRandomString(25);
$ran2=$ran.$filter_suf.$new_suf.".";
$target_path1=$root."/users/$uid/pics/";
$target_path=$target_path1.$ran2.$ext; 
$target_paths=$target_path1.$ran.$filter_suf.$new_suf.'v.'.$ext; 

$actual_pic=$ran.$filter_suf.$new_suf.'.'.$ext;
$actual_thumbnail=$ran.$filter_suf.$new_suf.'th.'.$ext;

$img4=$root."/users/$uid/pics/$actual_pic";
$img6=$root."/users/$uid/pics/$actual_thumbnail";

copy($img3,$img4);

$copiedvv=$img4;
$photo2 = new Photo(array("name"=>"$copiedvv","tmp_name"=>"$copiedvv"));  

$photo2->doFullCrop($left,$top,$awidth,$aheight);


if($filter!="normal" OR $tilt_shift==1){

$exp=explode(".",$fname);
$fname=$exp[0].$degrees_a["$degrees"].'.'.$exp[1];
$img3=$root."/users/$uid/pics/$fname";

$actual_pic_holder=$ran.'.'.$ext;
$actual_thumbnail_holder=$ran.'th.'.$ext;
$img4=$root."/users/$uid/pics/$actual_pic_holder";

copy($img3,$img4);

$fname=$ran.'.'.$ext;

$copiedvv=$img4;

$photo2 = new Photo(array("name"=>"$copiedvv","tmp_name"=>"$copiedvv"));  
$photo2->doFullCrop($left,$top,$awidth,$aheight);	
}


$r=mysql_query("SELECT * FROM media WHERE id='$uid' AND albumid='$selected_album' AND sbid='$photoid'");
$c=mysql_num_rows($r);
if($c==0){

$size=getimagesize($img4);

include("classes/resizer.php");

$new_actual_pic=$actual_pic;

if($filter!="normal" OR $tilt_shift==1){
$ran2=$ran.'.';
$target_path=$target_path1.$ran2.$ext; 
$target_paths=$target_path1.$ran.'v.'.$ext; 

$thumbnail_l=$actual_pic_holder;
$thumbnail_s=$actual_thumbnail_holder;

$implicitheight=58;

include("make50pixelsthumbnail.php");

$uidp=$uid.'p';

$target_pathv=$target_path;
$target_pathvv=$target_paths;
$target_pathvvv='';

$actual_pic=$ran2.$ext;
$actual_pic2=$ran.'s.'.$ext;
$actual_pic3=$ran.'mm.'.$ext;
$actual_pic4=$ran.'v.'.$ext;
$actual_pic7=$ran.'a.'.$ext;

$rhelper_jsv="";
include("add_photos/include.php");


$img7="users/$uid/pics/$actual_pic3";
copy($img6,$img7);	
}
$ran2=$ran.$filter_suf.$new_suf.".";
$target_path=$target_path1.$ran2.$ext; 
$target_paths=$target_path1.$ran.$filter_suf.$new_suf.'v.'.$ext; 

$thumbnail_l=$new_actual_pic;
$thumbnail_s=$actual_thumbnail;

$implicitheight=58;

include("make50pixelsthumbnail.php");

$uidp=$uid.'p';

$target_pathv=$target_path;
$target_pathvv=$target_paths;
$target_pathvvv='';

$actual_pic=$ran2.$ext;
$actual_pic2=$ran.$filter_suf.$new_suf.'s.'.$ext;
$actual_pic3=$ran.$filter_suf.$new_suf.'mm.'.$ext;
$actual_pic4=$ran.$filter_suf.$new_suf.'v.'.$ext;
$actual_pic7=$ran.$filter_suf.$new_suf.'a.'.$ext;

$rhelper_jsv="";
include("add_photos/include.php");


$img7=$root."/users/$uid/pics/$actual_pic3";
copy($img6,$img7);
$descr='';



$r=mysql_query("SELECT * FROM media WHERE id='$uid' AND albumid='$selected_album' ORDER BY norder DESC");
while($m=mysql_fetch_array($r)){
$pid=$m['sbid'];
$mnorder=$m['norder']+1;
mysql_query("UPDATE media SET norder='$mnorder',oldorder='$mnorder' WHERE id='$uid' AND albumid='$selected_album' AND sbid='$pid'");
}

$norder=1;

$photoid=genRandomString(25);

unset($fname);
include("stories/media_insert.php");

$photoid=lp();
$likeid=$photoid;
$ltype='photo';
include("stories/like_insert.php");


mysql_query("UPDATE albums SET datetimep=UNIX_TIMESTAMP(),album_cover='' WHERE sbid='$selected_album' AND id='$uid'");

mysql_query("UPDATE registered SET profilepic='$actual_pic7',profilepict='$actual_thumbnail' WHERE id='$uid'");
}
else{
mysql_query("UPDATE media SET datetimep_pp=UNIX_TIMESTAMP() WHERE id='$uid' AND albumid='$selected_album' AND sbid='$photoid'");
mysql_query("UPDATE albums SET datetimep=UNIX_TIMESTAMP(),album_cover='$photoid' WHERE sbid='$selected_album' AND id='$uid'");
mysql_query("UPDATE registered SET profilepic='$actual_pic7',profilepict='$actual_pic3' WHERE id='$uid'");
} 

mysql_query("UPDATE options SET lcords='', tcords='' WHERE id='$uid'");



echo'
<script type="text/javascript">
//alert("'.$photoid.'");
window.location="/'.$un.'?cropsuccess";
</script>
';

include("end.php");
?>