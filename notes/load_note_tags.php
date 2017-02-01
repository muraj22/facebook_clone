<?php
include("start.php");

$id=$_POST['id'];
if($id!=$uid){mysql_close($con); exit();}

if(isset($_GET['a'])){

$sbid=$_POST['sbid'];

$r=mysql_query("SELECT * FROM nt WHERE sbid='$sbid' AND id='$uid'");
while($m=mysql_fetch_array($r)){
$vis=$m['visibility'];	
}

$posted=array();
$ontable=array();

$tags=$_POST['tags'];
$_POST['tags']=addcslashes($_POST['tags'], "'\\/");
$posted['tags']=$_POST['tags'];
${$tags}=$_POST['tags'];
$key_name=array();
$key_name['tags']='tags';

foreach($posted as $dmk => $dmv){
$dkn=$key_name[$dmk];
if(strpos($dmv,",")!==false){
${$dkn}=array();
${$dmk.'v'}=explode(",",$dmv);
foreach(${$dmk.'v'} as $key=> $value){
if($value!=""){
${$dkn}[]=$value;
$r=mysql_query("SELECT * FROM nta WHERE noteid='$sbid' AND id='$uid' AND tagged='$value' AND type='$dkn'");
$c=mysql_num_rows($r);
if($c=="0"){
mysql_query("INSERT INTO nta (tagged,type,likeid,noteid,visibility,id,datetimep) VALUES('$value','$dkn','','$sbid','$vis','$uid',UNIX_TIMESTAMP())");	
}
}
}
${$dkn.'db'}=array();
$r=mysql_query("SELECT * FROM nta WHERE noteid='$sbid' AND id='$uid' AND type='$dkn'");
while($m=mysql_fetch_array($r)){
${$dkn.'db'}[]=$m['tagged'];
}
foreach(${$dkn.'db'} as $llave => $valor){
$valor=addcslashes($valor, "'\\/");
if(!in_array($valor,${$dkn})){
mysql_query("DELETE FROM nta WHERE noteid='$sbid' AND id='$uid' AND tagged='$valor' AND type='$dkn'");	
}
}
}
else{
mysql_query("DELETE FROM nta WHERE noteid='$sbid' AND id='$uid' AND type='$dkn'");	
}
}



$yk=0;
$ykv=0;
$drchatp=array();

$echo='';

$r=mysql_query("SELECT * FROM nta WHERE noteid='$sbid' AND id='$uid' ORDER BY datetimep DESC LIMIT 30");
$c=mysql_num_rows($r);

if($c>0){
while($m=mysql_fetch_array($r)){
$mm=$m['tagged'];
$r2=mysql_query("SELECT * FROM registered WHERE id='$mm'");
$c=mysql_num_rows($r2);
if($c>0){
while($m2=mysql_fetch_array($r2)){
	$unvv=$m2['id'];

$drchatp[$yk]='';
	
if($ykv=='0'){$drchatp[$yk]='<div style="margin:0;padding:0;text-align:left;position:relative;left:5px;">'; $isopened='t';}
if($ykv=='5' || $ykv=='10' || $ykv=='15' || $ykv=='20' || $ykv=='25' || $ykv=='30'){$drchatp[$yk]='</div><div style="margin:0;padding:0;text-align:left;position:relative;left:5px;">'; $isopened='t';}
$m2fn=str_replace(" ","&nbsp;",$m2['fullname']);
$drchatp[$yk].='<a href="/'.$m2['username'].'"><div style="display:inline-block;padding-right:1px;padding-bottom:1px;"><div style="position:relative;width:32px;padding:0;margin:0;position:relative;"><img src="/'.$m2['id'].'/pics/'.$m2['profilepict'].'" style="height:32px;width:32px;cursor:pointer;" data-t_text="'.$m2fn.'" data-t_topleft="t"></div></div></a>';

$ykv++;

$yk++;
}
}
else{
	
		$unvv=$m['tagged'];

$drchatp[$yk]='';
	
if($ykv=='0'){$drchatp[$yk]='<div style="margin:0;padding:0;text-align:left;position:relative;left:5px;">'; $isopened='t';}
if($ykv=='5' || $ykv=='10' || $ykv=='15' || $ykv=='20' || $ykv=='25' || $ykv=='30'){$drchatp[$yk]='</div><div style="margin:0;padding:0;text-align:left;position:relative;left:5px;">'; $isopened='t';}
$m2fn=str_replace(" ","&nbsp;",$m['tagged']);
$drchatp[$yk].='<div style="display:inline-block;padding-right:1px;padding-bottom:1px;"><div style="position:relative;width:32px;padding:0;margin:0;position:relative;"><img src="/images/notes_tag_placeholder.png" style="height:32px;width:32px;cursor:pointer;" data-t_text="'.$m2fn.'" data-t_topleft="t"></div></div>';

$ykv++;

$yk++;

}

}


$ykvv=$ykv-1;
if(isset($isopened)){$drchatp[$ykvv].='</div>';}
foreach($drchatp as $key => $value){
$echo.=$value;	
}

}

if($echo==''){
echo'<script type="text/javascript">
$("#notewtags").css("display","none");
$("#notes_tagsc").css("display","none");
$("#notewtagsv").css("display","block");
</script>';	
}
else{
echo'<script type="text/javascript">
$("#notewtagsv").css("display","none");
$("#notes_tagsc").css("display","block");
$("#notewtags").css("display","block");
</script>';		
}
echo $echo;

mysql_close($con); exit();	
}

$rhelper_js=$_POST['rhelper_js'];

$echo='';


$sbid=$_POST['sbid'];




$echo.='
<div style="margin:0;padding:0;width:100%;height:auto;display:inline-block;position:relative;">
<div style="width:523px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="note_tags_o" data-ac_liwidth="198" data-ac_inputw="340" data-ac_url="/autocomplete/jump_note.php" data-ac_style="with_pic" data-ac_placeholder=""></div></div>


<script type="text/javascript">
var psuf="note_tags_o";
$("body").on("click","#tag_l"+psuf,function(e){
var suf="note_tags_o";
e.preventDefault();
e.stopPropagation();';

$tagsids="";
$tagsnames="";

$r=mysql_query("SELECT * FROM nta WHERE noteid='$sbid' AND id='$uid' AND type='tags' ORDER BY datetimep ASC");
$c=mysql_num_rows($r);
while($m=mysql_fetch_array($r)){

	$valuev=strtolower($m['tagged']);
	$valuev=str_replace(" ","",$valuev);
	$valuev=preg_replace('/\W+/', '', $valuev);
	$tagsids.=','.$valuev;

	
	$uti=sb_user($m['tagged']);
	
	$mm=stripslashes($uti['fullname']);
	$mm=addslashes($mm);

	$tagsnames.=','.$mm;
	

	
}

$echo.='
$("#tags"+suf).val("'.$tagsids.'");
$("#tags"+suf+"v").val("'.$tagsnames.'");

renewvv_mt("",suf);
return false;
});

$("[data-ac_enable=note_tags_o]").click();
</script>

</div></div>';

echo $echo;

include("end.php");
?>