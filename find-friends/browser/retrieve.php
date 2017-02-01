<?php include("start.php"); ?>
<?php
$bana=$_POST['bana'];
$php_start=$_POST['php_start'];
$banavv=array();
if(strpos($bana,",")!==false){
$banav=explode(",",$bana);
foreach($banav as $k=>$v){
$banavv[]=$v;	
}
}

function genRandomStringnmf($length) {
    $characters = '123456789';
    $string = '';    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    return $string;
}

$u_friends=array();


$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$result3 = mysql_query("SELECT * FROM friends WHERE id='$uid' AND confirmed='y'");
while($ms3 = mysql_fetch_array($result3))
  {
$u_friends[]=$ms3['id2'];
}

$u_friendsm=$u_friends;

$result3 = mysql_query("SELECT id2 FROM friends WHERE id='$uid' AND confirmed!='y'");
while($ms3 = mysql_fetch_array($result3))
  {
$u_friendsm[]=$ms3['id2'];
}

$mutual=array();
$mutualc=array();
$mutualn=array();
$mutualu=array();
$mutualp=array();


foreach($u_friends as $k=>$v){

$r=mysql_query("SELECT * FROM friends WHERE id='$v' AND confirmed='y'");

while($m=mysql_fetch_array($r)){
$amigo=$m['id2'];
if($amigo!=$uid AND !in_array($amigo,$banavv) AND !in_array($amigo,$u_friendsm)){
$r2=mysql_query("SELECT * FROM registered WHERE id='$amigo'");
while($m2=mysql_fetch_array($r2)){

$v2n=$m2['fullname'];
if(!isset($mutualn[$amigo])){
$mutualn[$amigo]=$v2n;	
}
if(isset($mutualc[$amigo])){
$mutualc[$amigo]++;	
}
else{
$mutualc[$amigo]=1;
}
if(!isset($mutualp[$amigo])){
$mutualp[$amigo]=$m2['profilepic'];
$mutualu[$amigo]=$m2['username'];	
}
if(isset($mutual[$amigo])){
$mutual[$amigo].=','.$v;	
}
else{
$mutual[$amigo]=','.$v;
}
}
}
	


}


}



function array_pick($hash, $num) { 
  $count = count($hash); 
  if ($num <= 0) return array(); 
  if ($num >= $count) return $hash; 
  $required = $count - $num; 
  if ($required == 1) {   //array rand returns the KEY if there is only one item requested so... 
      $keys = array(array_rand($hash, $required)); 
  } else 
      $keys = array_rand($hash, $required); 
  foreach ($keys as $k) unset($hash[$k]);                    
  return $hash; 
} 



arsort($mutualc);

$s=1000;
$mutualc=array_pick($mutualc,$s);
$mutualc=shuffle_assoc($mutualc);

$mutualc2=array();

$cdc=$php_start+1;
$cdcv=$cdc+12;
$dc=1;
foreach($mutualc as $k=>$v){
$mutualc2[$k]=$v;
$dc++;
if($dc==$cdcv){break;}
}

$s=$cdc;


$jc=0;
$dc=0;
$dcv='block';
foreach($mutualc2 as $k=>$v){
	$kd=$mutual[$k];
$vv=explode(",",$kd);
if($mutualu[$k]==''){$mutualu[$k]=$k;}
$rx=genRandomStringnmf(8);
echo'
<div class="pymk_d" style="vertical-align:top;margin-top:-3px;display:'.$dcv.';width:493px;" id="pymk'.$rx.'" rel="'.$k.'">
<div style="display:inline-block;margin:0;padding:0;">
<a href="/'.$mutualu[$k].'" style="text-decoration:none!important;display:block;">
<img src="/'.$k.'/pics/'.$mutualp[$k].'" style="height:75px;width:75px;">
</a>
</div>
';
echo '<div style="display:inline-block;margin:0;padding:0;text-align:left;vertical-align:top;padding-left:5px;margin-top:-1px;">
<div style="display:block;vertical-align:top;margin:0;padding:0;">
<a href="/'.$mutualu[$k].'">'.$mutualn[$k].'</a>
</div>';
if($mutualc[$k]>1){$as='s';}
else{$as='';}


$nxv=0;
$txq=0;
foreach($vv as $k2=>$v2){
	if($v2!=''){
$txq++;
	}
}


$txqvv=$txq-2;
if($txqvv>6){$mposr='margin-right:12px;'; $mposrv='88';}
	else{$mposr=''; $mposrv='76';}
	
${'otherpeoplev'.$rx}='';
foreach($vv as $k2=>$v2){
	if(!empty($v2)){
$nxvv=$nxv+1;
if($nxvv==$txq){$border='0';}else{$border='1';}

$result=mysql_query("SELECT * FROM registered WHERE id='$v2'");
while($ms=mysql_fetch_array($result)){
$ffullname=$ms['fullname'];	
$fusername=$ms['username'];
$fprofilepic=$ms['profilepict'];
if($fusername==''){
$fusername=$v2;
}
}

${'otherpeoplev'.$rx}.='<div style="margin:0;padding:0;width:397px;position:relative;left:-10px;border-bottom:'.$border.'px solid #e9e9e9;padding-top:3px;background:#ffffff;" class="friendslink"><a href="/'.$fusername.'"><img src="/'.$v2.'/pics/'.$fprofilepic.'" style="height:50px;width:50px;position:relative;left:4px;"></a><a href="/'.$fusername.'" style="position:relative;top:-22px;left:12px;font-size:12px;">'.$ffullname.'</a><input id="addfriendbt_pymk'.$nxv.'" type="button" value="Friends" class="addfriend" style="text-align:right;position:absolute;right:8px;top:8px;padding-left:3px;padding-top:3px;padding-bottom:3px;padding-right:3px;font-size:11px;'.$mposr.'"></div>';

$nxv++;
	}
	}

echo'
<div style="display:block;margin:0;padding:0;width:405px;" class="pymk_dv">
<a href="#" onclick="showotherp('.$rx.','.$rx.',\'o\'); return false;" style="font-weight:normal!important;font-size:11px!important;">
'.$mutualc[$k].' mutual friend'.$as.'
</a>
<div id="otherpeoplevvv'.$rx.'" style="display:none;">'.${'otherpeoplev'.$rx}.'</div>
</div>
<div style="display:block;width:100%;" class="pymk_dvv" id="pymk_dvv'.$rx.'">
<label class="addfriend_pymk" onclick="addfriendajaxl(\''.$k.'\','.$rx.',\'o\');" style="float:right;position:relative;right:-9px;">
<i class="masuno_pymkv"></i>
<input type="button" class="addfriend_pymk2" value="Add Friend">
</label>
</div>
</div>';

	echo'</div>';
	$dc++;
	if($dc==$s){
	$jc++;
	$dcv='none';	
	}
	if($dc>=$s){
	$dcv='none';	
	}
	else{
	$jc++;	
	}
}	


?>
<?php include("end.php"); ?>