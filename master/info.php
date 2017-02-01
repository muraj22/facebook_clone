<?php
include("start.php");

include("start.php");
include("populate_page.php");

$uidv=$_SERVER['REQUEST_URI'];
if(strpos($uidv,"?")!==false){
$uidvv=explode("?",$uidv);
$uidv=$uidvv[0];
$dget=$uidvv[1];	
}

$uidvv=explode("/",$uidv);
$uidv=$uidvv[1];

$result=mysql_query("SELECT * FROM registered where username='$uidv'");

$result=mysql_query("SELECT * FROM registered where id='$uidv'");
while($ms=mysql_fetch_array($result)){
$flagtu='t';	
$unv=$uidv;
}

if(!isset($flagtu)){
$result=mysql_query("SELECT * FROM registered where username='$uidv'");
while($ms=mysql_fetch_array($result)){
$uidv=$ms['id'];
$unv=$ms['username'];	
}
}

if($uid==$uidv){$owneracc='';}
include("uidvvariables.php");

$params['style']='
<style type="text/css">
.edit_ldiv{
float:right;	
}
.edit_ldiv a:link{
background-image:url("/images/_S0u1wZb3JC.png");
background-position:0 0;
background-repeat:no-repeat;
padding-left:14px;
text-decoration:none;
color:#3b5998;
font-weight:normal;
position:relative;
bottom:-2px;
}
.edit_ldiv a:visited{
background-image:url("/images/_S0u1wZb3JC.png");
background-position:0 0;
background-repeat:no-repeat;
padding-left:14px;
text-decoration:none;
color:#3b5998;
font-weight:normal;
position:relative;
bottom:-2px;
}
.edit_ldiv a:active{
background-image:url("/images/_S0u1wZb3JC.png");
background-position:0 0;
background-repeat:no-repeat;
padding-left:14px;
text-decoration:underline;
color:#3b5998;
font-weight:normal;
position:relative;
bottom:-2px;
}
.edit_ldiv a:hover{
background-image:url("/images/_S0u1wZb3JC.png");
background-position:0 0;
background-repeat:no-repeat;
padding-left:14px;
text-decoration:underline;
color:#3b5998;
font-weight:normal;
position:relative;
bottom:-2px;
}
.anhr{

    background: rgb(217, 217, 217);
    border-width: 0px;
    color: rgb(217, 217, 217);
    height: 1px;

    font-size: 11px;
    text-align: left;

    border-collapse: collapse;
    border-spacing: 0px;

    word-wrap: break-word;	
	width:100%;
}
.section_contents_ul{
text-align:left;
list-style-type:none;
}
.section_contents_ul li{
	
    padding-top: 6px;
    padding-bottom: 8px;

    border-color: rgb(233, 233, 233);

    border-width: 1px 0px 0px;

    border-style: solid;

    display: block;

    list-style-type: none;



    line-height: 15px;

    font-size: 11px;
    text-align: left;

    border-collapse: collapse;
    border-spacing: 0px;

    word-wrap: break-word;	
	 color:#3b5998;
	 margin-left:0px;
	 position:relative;
	 top:-2px;
	 padding-bottom:8px;
}
.section_contents_ulv li{
	
    padding-top: 6px;
    padding-bottom: 8px;

    border-color: rgb(233, 233, 233);

    border-width: 1px 0px 0px;

    border-style: solid;

    display: block;

    list-style-type: none;



    line-height: 15px;

    font-size: 11px;
    text-align: left;

    border-collapse: collapse;
    border-spacing: 0px;

    word-wrap: break-word;	
	 color:#3b5998;
	 margin-left:0px;
	 position:relative;
	 top:-2px;
	
}
.magicli a:link{
color:#3b5998;
text-decoration:none;
}
.magicli a:visited{
color:#3b5998;
text-decoration:none;
}
.magicli a:active{
color:#3b5998;
text-decoration:underline;
}
.magicli a:hover{
color:#3b5998;
text-decoration:underline;
}

.table_section{
    margin-top: 10px;

    table-layout: fixed;

    border: 0px none;
    border-collapse: collapse;
    border-spacing: 0px;
    width: 100%;

    word-wrap: break-word;	
}
.section_title{
  
    width: 80px;

    color: rgb(153, 153, 153);
    font-weight: bold;
    line-height: 15px;
    text-align: left;
    vertical-align: top;	
	padding: 3px 0px 1px;
	  padding-right: 5px;
	  padding-left:1px;
	padding-top:10px;
	    border-collapse: collapse;
    border-spacing: 0px;

    word-wrap: break-word;
	font-size:11px;
}

.section_header{
    background-color: rgb(242, 242, 242);
    border-bottom: medium none;
    border-top: 1px solid rgb(226, 226, 226);
    padding: 4px 6px 5px;
	word-wrap: break-word;	
	font-weight:bold;
	padding-top:3px;
	padding-bottom:4px;
}
.mundin{
    margin-right: 5px;
    width: 10px;
    background-position: -12px -108px;
    background-image: url("/images/3uLMgqtBxHJ.png");
    background-repeat: no-repeat;
    display: inline-block;
    height: 13px;

    margin-bottom: 1px;
    margin-top: 1px;
    vertical-align: bottom;
    color: rgb(102, 102, 102);

    line-height: 15px;	
}

.infotitle{
    color: rgb(28, 42, 71);
    font-size: 20px;
    font-weight: bold;	
}
.maletin{
    margin-right: 5px;

    width: 9px;
    height: 13px;
    background-position: -738px -80px;

    background-image: url("/images/QvWFehnkoZF.png");
    background-repeat: no-repeat;
    display: inline-block;

    margin-bottom: 1px;
    margin-top: 1px;
    vertical-align: bottom;

    color: rgb(102, 102, 102);
    line-height: 15px;	
}
.gorro{
   margin-right: 5px;
    width: 11px;
    height: 13px;
    background-position: -706px -80px;
   background-image: url("/images/QvWFehnkoZF.png");
    background-repeat: no-repeat;
    display: inline-block;
   margin-bottom: 1px;
    margin-top: 1px;
    vertical-align: bottom;
  color: rgb(102, 102, 102);


    line-height: 15px;	
}
.corazon{
    margin-right: 5px;
width: 9px;
height: 13px;
background-position: -804px -80px;	
   background-image: url("/images/vQsNR62oPGI.png");
   background-repeat: no-repeat;
    display: inline-block;

    margin-bottom: 1px;
    margin-top: 1px;
    vertical-align: bottom;

    color: rgb(102, 102, 102);

    line-height: 15px;	
}
.edificio{

    margin-right: 5px;

    width: 8px;
    height: 13px;
    background-position: -748px -80px;
   background-image: url("/images/QvWFehnkoZF.png");
    background-repeat: no-repeat;
    display: inline-block;

    margin-bottom: 1px;
    margin-top: 1px;
    vertical-align: bottom;

    color: rgb(102, 102, 102);

    line-height: 15px;	
}
.casita{

    margin-right: 5px;
    width: 9px;
    height: 13px;
    background-position: -718px -80px;
    background-image: url("/images/QvWFehnkoZF.png");
    background-repeat: no-repeat;
    display: inline-block;
    margin-bottom: 1px;
    margin-top: 1px;
    vertical-align: bottom;
  color: rgb(102, 102, 102);

    line-height: 15px;	
}
.calendario{

    margin-right: 5px;

    width: 9px;
    height: 13px;
    background-position: -728px -80px;
    background-image: url("/images/QvWFehnkoZF.png");
    background-repeat: no-repeat;
    display: inline-block;

    margin-bottom: 1px;
    margin-top: 1px;
    vertical-align: bottom;
   color: rgb(102, 102, 102);

    line-height: 15px;	
}
.edit_ldiv{
float:right;	
}
.edit_ldiv a:link{
background-image:url("/images/_S0u1wZb3JC.png");
background-position:0 0;
background-repeat:no-repeat;
padding-left:14px;
text-decoration:none;
color:#3b5998;
font-weight:normal;
position:relative;
bottom:-2px;
}
.edit_ldiv a:visited{
background-image:url("/images/_S0u1wZb3JC.png");
background-position:0 0;
background-repeat:no-repeat;
padding-left:14px;
text-decoration:none;
color:#3b5998;
font-weight:normal;
position:relative;
bottom:-2px;
}
.edit_ldiv a:active{
background-image:url("/images/_S0u1wZb3JC.png");
background-position:0 0;
background-repeat:no-repeat;
padding-left:14px;
text-decoration:underline;
color:#3b5998;
font-weight:normal;
position:relative;
bottom:-2px;
}
.edit_ldiv a:hover{
background-image:url("/images/_S0u1wZb3JC.png");
background-position:0 0;
background-repeat:no-repeat;
padding-left:14px;
text-decoration:underline;
color:#3b5998;
font-weight:normal;
position:relative;
bottom:-2px;
}
.edit_ldivv a:link{
background-image:url("/images/_S0u1wZb3JC.png");
background-position:0 0;
background-repeat:no-repeat;
padding-left:14px;
text-decoration:none;
color:#3b5998;
font-weight:normal;
position:relative;
bottom:-2px;
}
.edit_ldivv a:visited{
background-image:url("/images/_S0u1wZb3JC.png");
background-position:0 0;
background-repeat:no-repeat;
padding-left:14px;
text-decoration:none;
color:#3b5998;
font-weight:normal;
position:relative;
bottom:-2px;
}
.edit_ldivv a:active{
background-image:url("/images/_S0u1wZb3JC.png");
background-position:0 0;
background-repeat:no-repeat;
padding-left:14px;
text-decoration:underline;
color:#3b5998;
font-weight:normal;
position:relative;
bottom:-2px;
}
.edit_ldivv a:hover{
background-image:url("/images/_S0u1wZb3JC.png");
background-position:0 0;
background-repeat:no-repeat;
padding-left:14px;
text-decoration:underline;
color:#3b5998;
font-weight:normal;
position:relative;
bottom:-2px;
}
.vinculos_dedit a:link{
text-decoration:none;
color:#3b5998;
}
.vinculos_dedit a:visited{
text-decoration:none;
color:#3b5998;
}
.vinculos_dedit a:active{
text-decoration:underline;
color:#3b5998;
}
.vinculos_dedit a:hover{
text-decoration:underline;
color:#3b5998;
}
.maletina{
	margin-right: 5px;
    width: 9px;
    height: 13px;
    background-position: -21px -378px;
    background-image: url("/images/JgdHpy35zW_.png");
    background-repeat: no-repeat;
    display: inline-block;
    margin-bottom: 1px;
    margin-top: 1px;
    vertical-align: bottom;
    color: rgb(102, 102, 102);
    line-height: 15px;
}

.gorroa{
    margin-right: 5px;
    width: 11px;
    height: 13px;
    background-position: -77px -31px;
    background-image: url("/images/IkW4U_7Qfya.png");
    background-repeat: no-repeat;
    display: inline-block;
    margin-bottom: 1px;
    margin-top: 1px;
    vertical-align: bottom;
    color: rgb(102, 102, 102);
    line-height: 15px;
}


.casitaa{
    margin-right: 5px;
    width: 9px;
    height: 13px;
    background-position: -24px -135px;
    background-image: url("/images/JgdHpy35zW_.png");
    background-repeat: no-repeat;
    display: inline-block;
    margin-bottom: 1px;
    margin-top: 1px;
    vertical-align: bottom;
    color: rgb(102, 102, 102);
    line-height: 15px;
}

.mundina{
    margin-right: 5px;
    width: 10px;
    height: 13px;
    background-position: -89px -31px;
    background-image: url("/images/IkW4U_7Qfya.png");
    background-repeat: no-repeat;
    display: inline-block;
    margin-bottom: 1px;
    margin-top: 1px;
    vertical-align: bottom;
    color: rgb(102, 102, 102);
    line-height: 15px;
}
.linkea a:link{
text-decoration:none;
font-weight:normal;
color:#3b5998;	
}
.linkea a:visited{
text-decoration:none;
font-weight:normal;
color:#3b5998;	
}
.linkea a:active{
text-decoration:underline;
font-weight:normal;
color:#3b5998;	
}
.linkea a:hover{
text-decoration:underline;
font-weight:normal;
color:#3b5998;	
}
.linkeav{
    border-top: 1px solid rgb(242, 244, 248);
    border-bottom: 1px solid rgb(246, 247, 249);
    text-align: center;
    width: 50px;
    height: 50px;
    display: inline-block;
    cursor: pointer;
    color: #3b5998;	
}
.linkeavv a:link{
    text-decoration: underline;
    background-color: rgb(236, 239, 245);
    border: 1px solid rgb(197, 205, 225);
    width: 50px;
    height: 50px;
    margin-right: 6px;
    float: left;
    display: inline-block;	
}
.linkeavv a:visited{
    text-decoration: underline;
    background-color: rgb(236, 239, 245);
    border: 1px solid rgb(197, 205, 225);
    width: 50px;
    height: 50px;
    margin-right: 6px;
    float: left;
    display: inline-block;		
}
.linkeavv a:active{
border: 1px solid rgb(157, 172, 203);
    text-decoration: underline;
    background-color: rgb(236, 239, 245);
    width: 50px;
    height: 50px;
    margin-right: 6px;
    float: left;
    display: inline-block;	
}
.linkeavv a:hover{
border: 1px solid rgb(157, 172, 203);
    text-decoration: underline;
    background-color: rgb(236, 239, 245);
    width: 50px;
    height: 50px;
    margin-right: 6px;
    float: left;
    display: inline-block;	
}
.linkeai a:link{
text-decoration:none;
font-weight:normal;
color:#3b5998;	
}
.linkeai a:visited{
text-decoration:none;
font-weight:normal;
color:#3b5998;	
}
.linkeai a:active{
text-decoration:underline;
font-weight:normal;
color:#3b5998;	
}
.linkeai a:hover{
text-decoration:underline;
font-weight:normal;
color:#3b5998;	
}
.linkeaiv{
    border-top: 1px solid rgb(242, 244, 248);
    border-bottom: 1px solid rgb(246, 247, 249);
    text-align: center;
    width: 74px;
    height: 74px;
    display: inline-block;
    cursor: pointer;
    color: #3b5998;	
}
.linkeaivv a:link{
    text-decoration: underline;
    background-color: rgb(236, 239, 245);
    border: 1px solid rgb(197, 205, 225);
    width: 74px;
    height: 74px;

    float: left;
    display: inline-block;	
}
.linkeaivv a:visited{
    text-decoration: underline;
    background-color: rgb(236, 239, 245);
    border: 1px solid rgb(197, 205, 225);
    width: 74px;
    height: 74px;

    float: left;
    display: inline-block;		
}
.linkeaivv a:active{
border: 1px solid rgb(157, 172, 203);
    text-decoration: underline;
    background-color: rgb(236, 239, 245);
    width: 74px;
    height: 74px;

    float: left;
    display: inline-block;	
}
.linkeaivv a:hover{
border: 1px solid rgb(157, 172, 203);
    text-decoration: underline;
    background-color: rgb(236, 239, 245);
    width: 74px;
    height: 74px;

    float: left;
    display: inline-block;	
}
</style>';

$r=mysql_query("SELECT * FROM registered WHERE id='$uidv'");
while($m=mysql_fetch_array($r)){
$fullname=$m['fullname'];	
}
$echo.='
<div style="margin:0;width:493px;padding:0;padding-left:20px;">
<div style="margin:0;padding:0;" class="infotitle">
'.$fullname.'
</div>';

$stt='4';
include("info_short.php");

$echo.=$secho;

$b_qf=return_bq("workedu","c");
$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND visibility='v' AND type='c' $b_qf");
$c=mysql_num_rows($r);

$b_qf=return_bq("workedu","h");
$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND visibility='v' AND type='h' $b_qf");
$c=mysql_num_rows($r)+$c;

$b_qf=return_bq("workedu","j");
$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND visibility='v' AND type='j' $b_qf");
$c=mysql_num_rows($r)+$c;


if($c>0){
$echo.='
<div style="margin-bottom:30px;padding:0;" id="workeduep">
<div class="section_header" style="margin:0;">
Work and Education';if(isset($owneracc)){$echo.='<div class="edit_ldiv"><a href="/editprofile.php?sk=eduwork"><span style="position:relative;top:-2px;">Edit</span></a></div>';}$echo.='
</div>
<div style="padding:0;margin:0;padding-left: 5px;padding-right: 5px;">
<table style="border-collapse:collapse;margin-top:0;" class="table_section">';

$b_qf=return_bq("workedu","j");

$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND type='j' AND visibility='v' $b_qf ORDER BY datetimepe ASC LIMIT 4");
$c=mysql_num_rows($r);
if($c>0){
$employersok='';
$echo.='
<tr>
<th class="section_title border_out2" style="border-top:1px solid rgb(217, 217, 217);">
Employers
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out2v">
<ul class="section_contents_ulv">';
while($m=mysql_fetch_array($r)){
$echo.= '<li class="off_border">';
$echo.= $m['place'];
$continued_desc='';
if($m['yeare']!="-1"){

$starting_c='';
$ending_c=' to ';

if($m['monthe']!="-1"){
$cmonth=date('M', strtotime('2012-' . $m['monthe'] . '-01'));
$starting_c.=$cmonth;	
if($m['daye']!="-1"){
$starting_c.=' '.$m['daye'];
}
$starting_c.=', ';
}

$starting_c.=$m['yeare'];

if($m['yearl']!="-1"){

if($m['monthl']!="-1"){
$cmonth=date('M', strtotime('2012-' . $m['monthl'] . '-01'));
$ending_c.=$cmonth;	
if($m['dayl']!="-1"){
$ending_c.=' '.$m['dayl'];
}
$ending_c.=', ';
}

$ending_c.=$m['yeare'];
	
}
else{
$ending_c.='present';	
}

if($m['position']!=""){



$continued_desc.=' &#183; '.$starting_c.' to present';
}
else if($m['cityc']==''){
$echo.='<span style="font-weight:normal;color:gray;display:block;margin-top:2px;">'.$starting_c.$ending_c.'</span>';
}
else{
$continued_desc.=' &#183; '.$starting_c.$ending_c;
}
	
}
if($m['cityc']!=""){

$statec="";
$countryc="";
$cityc="";
$v="";


$statec=$m['statec'];
$countryc=$m['countryc'];
$cityc=$m['cityc'];
$cityc=addslashes($cityc);
$cityc=addslashes($cityc);
if($cityc!=""){	
$f='';
}

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
if(isset($f)){
$ar=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($am=mysql_fetch_array($ar)){
$staten=$am['staten'];	
}
$ar=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($am=mysql_fetch_array($ar)){
$countryn=$am['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$countryn;
}
unset($f);}
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

if($v!=""){

if($m['yeare']!="-1" AND $m['position']!=""){
$continued_desc.=' &#183; '.$v;	
}
else if($m['yeare']!="-1"){
$continued_desc=str_replace(" &#183; ","",$continued_desc);
$echo.='<span style="font-weight:normal;color:gray;display:block;margin-top:2px;">'.$continued_desc.' &#183; '.$v.'</span>';
}
else if($m['position']!=""){
$continued_desc.=' &#183; '.$v;	
}
else if($m['yeare']=="-1" AND $m['position']==""){
$echo.='<span style="font-weight:normal;color:gray;display:block;margin-top:2px;">'.$v.'</span>';
}
	
}
	
}
if($m['position']!=""){
$echo.='<span style="font-weight:normal;color:gray;display:block;margin-top:2px;">'.$m['position'].$continued_desc.'</span>';	
}
if($m['description']!=""){
$m['description']=str_replace("\n","<br>",$m['description']);
$echo.='<span style="font-weight:normal;color:#333333;display:block;margin-top:2px;">'.$m['description'].'</span>';	
}
$echo.='</li>';
}

$echo.='
</ul>
<script type="text/javascript">
$(".off_border:first").css("border","0");
$(".off_border:first").css("padding-top","0px");
$(".off_border:last").css("padding-bottom","0px");
</script>
</td>
</tr>';
	
}

$b_qf=return_bq("workedu","c");

$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND type='c' AND visibility='v' $b_qf ORDER BY datetimepe ASC LIMIT 4");
$c=mysql_num_rows($r);
if($c>0){
$collegeok='';
$echo.='
<tr>
<th class="section_title border_out2" style="border-top:1px solid rgb(217, 217, 217);">
College
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out2v">
<ul class="section_contents_ulv">';
while($m=mysql_fetch_array($r)){
$echo.= '<li class="off_border2">
'.$m['place'];
if($m['yearl']!="-1" AND $m['currently']==2){
$echo.='<span style="font-weight:normal;color:gray;display:block;margin-top:2px;">Class of '.$m['yearl'].'</span>';
}
if($m['description']!=""){
$m['description']=str_replace("\n","<br>",$m['description']);
$echo.='<span style="font-weight:normal;color:#333333;display:block;margin-top:2px;">'.$m['description'].'</span>';	
}
$echo.='</li>';
}

$echo.='
</ul>
<script type="text/javascript">
$(".off_border2:first").css("border","0");
$(".off_border2:first").css("padding-top","0px");
$(".off_border2:last").css("padding-bottom","0px");
</script>
</td>
</tr>';
	
}

$b_qf=return_bq("workedu","h");

$r=mysql_query("SELECT * FROM workedu WHERE id='$uidv' AND type='h' AND visibility='v' $b_qf ORDER BY datetimepe ASC LIMIT 4");
$c=mysql_num_rows($r);
if($c>0){
$highschoolok='';
$echo.='
<tr>
<th class="section_title border_out2" style="border-top:1px solid rgb(217, 217, 217);">
High School
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out2v">
<ul class="section_contents_ulv">';
while($m=mysql_fetch_array($r)){
$echo.= '<li class="off_border3">
'.$m['place'];
$continued_desc='';
if($m['cityc']!=""){

$statec="";
$countryc="";
$cityc="";
$v="";


$statec=$m['statec'];
$countryc=$m['countryc'];
$cityc=$m['cityc'];
$cityc=addslashes($cityc);
$cityc=addslashes($cityc);
if($cityc!=""){	
$f='';
}

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
if(isset($f)){
$ar=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($am=mysql_fetch_array($ar)){
$staten=$am['staten'];	
}
$ar=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($am=mysql_fetch_array($ar)){
$countryn=$am['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$countryn;
}
unset($f);}
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");

if($v!=""){

if($m['yearl']!="-1" AND $m['currently']==2){
$continued_desc=' &#183; '.$v;	
}
else{
$echo.='<span style="font-weight:normal;color:gray;display:block;margin-top:2px;">'.$v.'</span>';
}
	
}
	
}
if($m['yearl']!="-1" AND $m['currently']==2){
$echo.='<span style="font-weight:normal;color:gray;display:block;margin-top:2px;">Class of '.$m['yearl'].$continued_desc.'</span>';
}
if($m['description']!=""){
$m['description']=str_replace("\n","<br>",$m['description']);
$echo.='<span style="font-weight:normal;color:#333333;display:block;margin-top:2px;">'.$m['description'].'</span>';	
}
$echo.='</li>';
}

$echo.='
</ul>
<script type="text/javascript">
$(".off_border3:first").css("border","0");
$(".off_border3:first").css("padding-top","0px");
$(".off_border3:last").css("padding-bottom","0px");
</script>
</td>
</tr>';
	
}

if($uid==$uidv){
if(!isset($collegeok) AND !isset($highschoolok)){

$echo.='
<tr>
<th class="section_title border_out2" style="border-top:1px solid rgb(217, 217, 217);">
Share Your<br>Experiences
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out2v">
<ul class="section_contents_ulv">
<li class="off_border2a linkea" style="padding-bottom:0;">
<div class="linkeavv" style="margin:0;padding:0;display:inline-block;">
<a href="/editprofile.php?sk=eduwork">
<span class="linkeav"><img style="top: 9px;position: relative;border: 0px none;text-align: center;" src="/images/placeholder-education.png"></span>
</a>
</div>
<div style="display:inline-block;vertical-align:top;margin:0;padding:0;">
<a href="/editprofile.php?sk=eduwork">Add a School</a>
</div>
</li>
</ul>
<script type="text/javascript">
$(".off_border2a:first").css("border","0");
$(".off_border2a:first").css("padding-top","0px");
$(".off_border2a:last").css("padding-bottom","0px");
$("#workeduep").css("margin-bottom","15px");
</script>
</td>
</tr>
';
	
}

if(!isset($employersok)){

$echo.='
<tr>
<th class="section_title border_out2" style="border-top:1px solid rgb(217, 217, 217);">
Share Your<br>Experiences
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out2v">
<ul class="section_contents_ulv">
<li class="off_border2a linkea" style="padding-bottom:0;">
<div class="linkeavv" style="margin:0;padding:0;display:inline-block;">
<a href="/editprofile.php?sk=eduwork">
<span class="linkeav"><img style="top: 9px;position: relative;border: 0px none;text-align: center;" src="/images/placeholder-work.png"></span>
</a>
</div>
<div style="display:inline-block;vertical-align:top;margin:0;padding:0;">
<a href="/editprofile.php?sk=eduwork">Add a Job</a>
</div>
</li>
</ul>
<script type="text/javascript">
$(".off_border2a:first").css("border","0");
$(".off_border2a:first").css("padding-top","0px");
$(".off_border2a:last").css("padding-bottom","0px");
$("#workeduep").css("margin-bottom","15px");
</script>
</td>
</tr>
';
	
}
}


$echo.='</table>
<script type="text/javascript">
$(".border_out2:first").css("border-top","0");
$(".border_out2v:first").css("border-top","0");
</script>
</div>';
$echo.='</div>';






}

if($uid==$uidv){
if(!isset($employersok) AND !isset($collegeok) AND !isset($highschoolok)){
$echo.='<div style="margin-bottom:15px;padding:0;">
<div class="section_header" style="margin:0;">
Work and Education';if(isset($owneracc)){$echo.='<div class="edit_ldiv"><a href="/editprofile.php?sk=eduwork"><span style="position:relative;top:-2px;">Edit</span></a></div>';}$echo.='
</div>
<div style="padding:0;margin:0;padding-left: 5px;padding-right: 5px;">
<table style="border-collapse:collapse;margin-top:0;" class="table_section">';
$echo.='<tr>
<th class="section_title border_out2a" style="border-top:1px solid rgb(217, 217, 217);">
Share Your<br>Experiences
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out2av">
<ul class="section_contents_ulv">
<li class="off_border2a linkea" style="padding-bottom:0;">
<div class="linkeavv" style="margin:0;padding:0;display:inline-block;">
<a href="/editprofile.php?sk=eduwork">
<span class="linkeav"><img style="top: 9px;position: relative;border: 0px none;text-align: center;" src="/images/placeholder-work.png"></span>
</a>
</div>
<div style="display:inline-block;vertical-align:top;margin:0;padding:0;">
<a href="/editprofile.php?sk=eduwork">Add a Job</a>
</div>
</li>
<li class="off_border2a linkea" style="border-top:0;">
<div class="linkeavv" style="margin:0;padding:0;display:inline-block;">
<a href="/editprofile.php?sk=eduwork">
<span class="linkeav"><img style="top: 9px;position: relative;border: 0px none;text-align: center;" src="/images/placeholder-education.png"></span>
</a>
</div>
<div style="display:inline-block;vertical-align:top;margin:0;padding:0;">
<a href="/editprofile.php?sk=eduwork">Add a School</a>
</div>
</li>
</ul>
<script type="text/javascript">
$(".off_border2a:first").css("border","0");
$(".off_border2a:first").css("padding-top","0px");
$(".off_border2a:last").css("padding-bottom","0px");
</script>
</td>
</tr>
</table>
<script type="text/javascript">
$(".border_out2a:first").css("border-top","0");
$(".border_out2av:first").css("border-top","0");
</script>
</div>
</div>
';
}
}

$b_qf=return_bq("relipo","religion");

$r=mysql_query("SELECT * FROM relipo WHERE id='$uidv' AND type='religion' AND kind!='' $b_qf AND visibility='v'");
$c=mysql_num_rows($r);

$b_qf=return_bq("relipo","political");

$r=mysql_query("SELECT * FROM relipo WHERE id='$uidv' AND type='political' AND kind!='' $b_qf AND visibility='v'");
$c=mysql_num_rows($r)+$c;

$b_qf=return_bq("quotations");

$r=mysql_query("SELECT * FROM quotations WHERE id='$uidv' AND quotations!='' $b_qf");
$c=mysql_num_rows($r)+$c;

$b_qf=return_bq("inspirational");
$r=mysql_query("SELECT * FROM inspirational WHERE id='$uidv' AND (visibility='v' OR visibility='h') $b_qf LIMIT 1");
$c=mysql_num_rows($r)+$c;
if($c>0){
$echo.='
<div style="margin-bottom:30px;padding:0;">
<div class="section_header" style="margin:0;">
Philosophy';if(isset($owneracc)){$echo.='<div class="edit_ldiv"><a href="/editprofile.php?sk=philosophy"><span style="position:relative;top:-2px;">Edit</span></a></div>';}$echo.='
</div>
<div style="padding:0;margin:0;padding-left: 5px;padding-right: 5px;">
<table style="border-collapse:collapse;margin-top:0;" class="table_section">';

$b_qf=return_bq("relipo","religion");

$r=mysql_query("SELECT * FROM relipo WHERE id='$uidv' AND type='religion' AND kind!='' AND visibility='v' $b_qf");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<tr>
<th class="section_title border_out3" style="border-top:1px solid rgb(217, 217, 217);">
Religious<br>
Views
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out3v">
<ul class="section_contents_ul">';

while($m=mysql_fetch_array($r)){

$echo.= '<li class="2off_border setme_padding">
'.$m['kind'];
if($m['kind_d']!=""){
$m['kind_d']=str_replace("\n","<br>",$m['kind_d']);
$echo.='<span style="font-weight:normal;color:#333333;display:block;margin-top:2px;">'.$m['kind_d'].'</span>';	
}
$echo.='</li>';
	
}

$echo.='
</ul>
<script type="text/javascript">
$(".2off_border:first").css("border","0");
$(".2off_border:first").css("padding-top","0px");
</script>
</td>
</tr>';

}


$b_qf=return_bq("relipo","political");
$r=mysql_query("SELECT * FROM relipo WHERE id='$uidv' AND type='political' AND kind!='' AND visibility='v' $b_qf");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<tr>
<th class="section_title border_out3" style="border-top:1px solid rgb(217, 217, 217);">
Political<br>
Views
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out3v">
<ul class="section_contents_ul">';

while($m=mysql_fetch_array($r)){

$echo.= '<li class="2off_border2 setme_padding">
'.$m['kind'];
if($m['kind_d']!=""){
$m['kind_d']=str_replace("\n","<br>",$m['kind_d']);
$echo.='<span style="font-weight:normal;color:#333333;display:block;margin-top:2px;">'.$m['kind_d'].'</span>';	
}
$echo.='</li>';
	
}

$echo.='
</ul>
<script type="text/javascript">
$(".2off_border2:first").css("border","0");
$(".2off_border2:first").css("padding-top","0px");
</script>
</td>
</tr>';

}

$b_qf=return_bq("quotations");
$r=mysql_query("SELECT * FROM quotations WHERE id='$uidv' AND quotations!='' $b_qf");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<tr>
<th class="section_title border_out3" style="border-top:1px solid rgb(217, 217, 217);">
Favorite<br>
Quotations
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out3v">
<ul class="section_contents_ul">';

while($m=mysql_fetch_array($r)){

$m['quotations']=str_replace("\n","<br>",$m['quotations']);

$echo.= '<li class="2off_border3 setme_padding" style="font-weight:normal;color:#333333;">
'.$m['quotations'];
$echo.='</li>';
	
}

$echo.='
</ul>
<script type="text/javascript">
$(".2off_border3:first").css("border","0");
$(".2off_border3:first").css("padding-top","0px");
</script>
</td>
</tr>';

}

$b_qf=return_bq("inspirational");
$r=mysql_query("SELECT * FROM inspirational WHERE id='$uidv' AND (visibility='v' OR visibility='h') $b_qf ORDER BY datetimep DESC limit 12");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<tr>
<th class="section_title border_out3" style="border-top:1px solid rgb(217, 217, 217);">
People Who<br>
Inspire You
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out3v">
<ul class="section_contents_ul">';
$echo.= '<li class="2off_border4 setme_padding" style="font-weight:normal;">';
$anx=0;
$separator=' &#183; ';
while($m=mysql_fetch_array($r)){
$anx++;
if($anx==$c){$separator='';}
$echo.= '<span style="font-weight:normal;color:#3b5998;">'.$m['person'].$separator.'</span>';
	
}
$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".2off_border4:first").css("border","0");
$(".2off_border4:first").css("padding-top","0px");
</script>
</td>
</tr>';

}

$echo.='</table>
<script type="text/javascript">
$(".setme_padding:last").css("padding-bottom","1px");
$(".border_out3:first").css("border-top","0");
$(".border_out3v:first").css("border-top","0");
</script>
</div>';
$echo.='</div>';
}





$dtypes=array();

$dtypes["sports"]="";
$dtypes["teams"]="";
$dtypes["athletes"]="";

$dq="";

$ax=0;
foreach($dtypes as $dk=>$dv){
$b_qf=return_bq("tastes","$dk");
$ax++;
if($ax!=1){
$dq.=" UNION ";
}

$dq.="(SELECT * FROM tastes WHERE id='$uidv' AND type='$dk' AND (visibility='v' OR visibility='h') $b_qf)";

}

$r=mysql_query("$dq");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<div style="margin-bottom:30px;padding:0;">
<div class="section_header" style="margin:0;">
Sports';if(isset($owneracc)){$echo.='<div class="edit_ldiv"><a href="/editprofile.php?sk=sports"><span style="position:relative;top:-2px;">Edit</span></a></div>';}$echo.='
</div>
<div style="padding:0;margin:0;padding-left: 5px;padding-right: 5px;">
<table style="border-collapse:collapse;margin-top:0;" class="table_section">';

$b_qf=return_bq("tastes","sports");
$r=mysql_query("SELECT * FROM tastes WHERE id='$uidv' AND type='sports' AND (visibility='v' OR visibility='h') $b_qf ORDER BY datetimep DESC limit 12");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<tr>
<th class="section_title border_out4" style="border-top:1px solid rgb(217, 217, 217);">
Favorite<br>
Sports
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out4v">
<ul class="section_contents_ul">';
$echo.= '<li class="3off_border setme_padding2" style="font-weight:normal;">';
$anx=0;
$separator=' &#183; ';
while($m=mysql_fetch_array($r)){
$anx++;
if($anx==$c){$separator='';}
$echo.= '<span style="font-weight:bold;color:#3b5998;">'.$m['taste'].$separator.'</span>';
	
}
$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".3off_border:first").css("border","0");
$(".3off_border:first").css("padding-top","0px");
</script>
</td>
</tr>';

}

$b_qf=return_bq("tastes","teams");
$r=mysql_query("SELECT * FROM tastes WHERE id='$uidv' AND type='teams' AND (visibility='v' OR visibility='h') $b_qf ORDER BY datetimep DESC limit 12");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<tr>
<th class="section_title border_out4" style="border-top:1px solid rgb(217, 217, 217);">
Favorite<br>
Teams
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out4v">
<ul class="section_contents_ul">';
$echo.= '<li class="3off_border2 setme_padding2" style="font-weight:normal;">';
$anx=0;
$separator=' &#183; ';
while($m=mysql_fetch_array($r)){
$anx++;
if($anx==$c){$separator='';}
$echo.= '<span style="font-weight:normal;color:#3b5998;">'.$m['taste'].$separator.'</span>';
	
}
$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".3off_border2:first").css("border","0");
$(".3off_border2:first").css("padding-top","0px");
</script>
</td>
</tr>';

}


$b_qf=return_bq("tastes","athletes");
$r=mysql_query("SELECT * FROM tastes WHERE id='$uidv' AND type='athletes' AND (visibility='v' OR visibility='h') $b_qf ORDER BY datetimep DESC limit 12");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<tr>
<th class="section_title border_out4" style="border-top:1px solid rgb(217, 217, 217);">
Favorite<br>
Athletes
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out4v">
<ul class="section_contents_ul">';
$echo.= '<li class="3off_border3 setme_padding2" style="font-weight:normal;">';
$anx=0;
$separator=' &#183; ';
while($m=mysql_fetch_array($r)){

$anx++;
if($anx==$c){$separator='';}
$echo.= '<span style="font-weight:normal;color:#3b5998;">'.$m['taste'].$separator.'</span>';


}
$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".3off_border3:first").css("border","0");
$(".3off_border3:first").css("padding-top","0px");
</script>
</td>
</tr>';

}


$echo.='</table>
<script type="text/javascript">
$(".setme_padding2:last").css("padding-bottom","1px");
$(".border_out4:first").css("border-top","0");
$(".border_out4v:first").css("border-top","0");
</script>
</div>';
$echo.='</div>';
}





$dtypes=array();

$dtypes["music"]="";
$dtypes["book"]="";
$dtypes["movies"]="";
$dtypes["television"]="";
$dtypes["games"]="";

$dq="";

$ax=0;
foreach($dtypes as $dk=>$dv){
$b_qf=return_bq("tastes","$dk");
$ax++;
if($ax!=1){
$dq.=" UNION ";
}

$dq.="(SELECT * FROM tastes WHERE id='$uidv' AND type='$dk' AND (visibility='v' OR visibility='h') $b_qf)";

}

$r=mysql_query("$dq");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<div style="margin-bottom:30px;padding:0;" id="entertainmentep">
<div class="section_header" style="margin:0;">
Arts and Entertainment';if(isset($owneracc)){$echo.='<div class="edit_ldiv"><a href="/editprofile.php?sk=entertainment"><span style="position:relative;top:-2px;">Edit</span></a></div>';}$echo.='
</div>
<div style="padding:0;margin:0;padding-left: 5px;padding-right: 5px;">
<table style="border-collapse:collapse;margin-top:0;" class="table_section">';

$b_qf=return_bq("tastes","music");
$r=mysql_query("SELECT * FROM tastes WHERE id='$uidv' AND type='music' AND (visibility='v' OR visibility='h') $b_qf ORDER BY datetimep DESC limit 12");
$c=mysql_num_rows($r);
if($c>0){
$musicok='';
$echo.='
<tr>
<th class="section_title border_out5" style="border-top:1px solid rgb(217, 217, 217);">
Music
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out5v">
<ul class="section_contents_ul">';
$echo.= '<li class="4off_border setme_padding3" style="font-weight:normal;">';
$anx=0;
$separator=' &#183; ';
while($m=mysql_fetch_array($r)){
$anx++;
if($anx==$c){$separator='';}
$echo.= '<span style="font-weight:normal;color:#3b5998;">'.$m['taste'].$separator.'</span>';
	
}
$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".4off_border:first").css("border","0");
$(".4off_border:first").css("padding-top","0px");
</script>
</td>
</tr>';

}

$b_qf=return_bq("tastes","books");
$r=mysql_query("SELECT * FROM tastes WHERE id='$uidv' AND type='books' AND (visibility='v' OR visibility='h') $b_qf ORDER BY datetimep DESC limit 12");
$c=mysql_num_rows($r);
if($c>0){
$booksok='';
$echo.='
<tr>
<th class="section_title border_out5" style="border-top:1px solid rgb(217, 217, 217);">
Books
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out5v">
<ul class="section_contents_ul">';
$echo.= '<li class="4off_border2 setme_padding3" style="font-weight:normal;">';
$anx=0;
$separator=' &#183; ';
while($m=mysql_fetch_array($r)){
$anx++;
if($anx==$c){$separator='';}
$echo.= '<span style="font-weight:normal;color:#3b5998;">'.$m['taste'].$separator.'</span>';
	
}
$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".4off_border2:first").css("border","0");
$(".4off_border2:first").css("padding-top","0px");
</script>
</td>
</tr>';

}


$b_qf=return_bq("tastes","movies");
$r=mysql_query("SELECT * FROM tastes WHERE id='$uidv' AND type='movies' AND (visibility='v' OR visibility='h') $b_qf ORDER BY datetimep DESC limit 12");
$c=mysql_num_rows($r);
if($c>0){
$moviesok='';
$echo.='
<tr>
<th class="section_title border_out5" style="border-top:1px solid rgb(217, 217, 217);">
Movies
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out5v">
<ul class="section_contents_ul">';
$echo.= '<li class="4off_border3 setme_padding3" style="font-weight:normal;">';
$anx=0;
$separator=' &#183; ';
while($m=mysql_fetch_array($r)){

$anx++;
if($anx==$c){$separator='';}
$echo.= '<span style="font-weight:normal;color:#3b5998;">'.$m['taste'].$separator.'</span>';


}
$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".4off_border3:first").css("border","0");
$(".4off_border3:first").css("padding-top","0px");
</script>
</td>
</tr>';

}





$b_qf=return_bq("tastes","television");
$r=mysql_query("SELECT * FROM tastes WHERE id='$uidv' AND type='television' AND (visibility='v' OR visibility='h') $b_qf ORDER BY datetimep DESC limit 12");
$c=mysql_num_rows($r);
if($c>0){
$televisionok='';
$echo.='
<tr>
<th class="section_title border_out5" style="border-top:1px solid rgb(217, 217, 217);">
Television
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out5v">
<ul class="section_contents_ul">';
$echo.= '<li class="4off_border4 setme_padding3" style="font-weight:normal;">';
$anx=0;
$separator=' &#183; ';
while($m=mysql_fetch_array($r)){

$anx++;
if($anx==$c){$separator='';}
$echo.= '<span style="font-weight:normal;color:#3b5998;">'.$m['taste'].$separator.'</span>';


}
$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".4off_border4:first").css("border","0");
$(".4off_border4:first").css("padding-top","0px");
</script>
</td>
</tr>';

}



$b_qf=return_bq("tastes","games");
$r=mysql_query("SELECT * FROM tastes WHERE id='$uidv' AND type='games' AND (visibility='v' OR visibility='h') $b_qf ORDER BY datetimep DESC limit 12");
$c=mysql_num_rows($r);
if($c>0){
$gamesok='';
$echo.='
<tr>
<th class="section_title border_out5" style="border-top:1px solid rgb(217, 217, 217);">
Games
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out5v">
<ul class="section_contents_ul">';
$echo.= '<li class="4off_border5 setme_padding3" style="font-weight:normal;">';
$anx=0;
$separator=' &#183; ';
while($m=mysql_fetch_array($r)){

$anx++;
if($anx==$c){$separator='';}
$echo.= '<span style="font-weight:normal;color:#3b5998;">'.$m['taste'].$separator.'</span>';


}
$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".4off_border5:first").css("border","0");
$(".4off_border5:first").css("padding-top","0px");
</script>
</td>
</tr>';

}

if(isset($owneracc)){
if(!isset($musicok) OR !isset($booksok) OR !isset($moviesok) OR !isset($televisionok) OR !isset($gamesok)){
	

$echo.='<tr>
<th class="section_title border_out5" style="border-top:1px solid rgb(217, 217, 217);">
Share Your<br>Interests
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out5v">
<ul class="section_contents_ulv">
<li class="off_border2ai linkeai" style="padding-bottom:0;">';
if(!isset($musicok)){
$echo.='
<div style="display:inline-block;margin:0;padding:0;padding-right:1px;width:75px;vertical-align:top;">
<div class="linkeaivv" style="margin:0;padding:0;display:inline-block;">
<a href="/editprofile.php?sk=eduwork">
<span class="linkeaiv"><img style="top:21px;position: relative;border: 0px none;text-align: center;" src="/images/placeholder-music.png"></span>
</a>
</div>
<div style="display:block;vertical-align:top;margin:0;padding:0;text-align:center;">
<a href="/editprofile.php?sk=entertainment">Add Music</a>
</div>
</div>';
}
if(!isset($booksok)){
$echo.='
<div style="display:inline-block;margin:0;padding:0;padding-right:1px;width:75px;vertical-align:top;">
<div class="linkeaivv" style="margin:0;padding:0;display:inline-block;">
<a href="/editprofile.php?sk=eduwork">
<span class="linkeaiv"><img style="top:21px;position: relative;border: 0px none;text-align: center;" src="/images/placeholder-books.png"></span>
</a>
</div>
<div style="display:block;vertical-align:top;margin:0;padding:0;text-align:center;">
<a href="/editprofile.php?sk=entertainment">Add Books</a>
</div>
</div>';
}
if(!isset($moviesok)){
$echo.='
<div style="display:inline-block;margin:0;padding:0;padding-right:1px;width:75px;vertical-align:top;">
<div class="linkeaivv" style="margin:0;padding:0;display:inline-block;">
<a href="/editprofile.php?sk=eduwork">
<span class="linkeaiv"><img style="top:21px;position: relative;border: 0px none;text-align: center;" src="/images/placeholder-movies.png"></span>
</a>
</div>
<div style="display:block;vertical-align:top;margin:0;padding:0;text-align:center;">
<a href="/editprofile.php?sk=entertainment">Add Movies</a>
</div>
</div>';
}
if(!isset($televisionok)){
$echo.='
<div style="display:inline-block;margin:0;padding:0;padding-right:1px;width:75px;vertical-align:top;">
<div class="linkeaivv" style="margin:0;padding:0;display:inline-block;">
<a href="/editprofile.php?sk=eduwork">
<span class="linkeaiv"><img style="top:21px;position: relative;border: 0px none;text-align: center;" src="/images/placeholder-tv.png"></span>
</a>
</div>
<div style="display:block;vertical-align:top;margin:0;padding:0;text-align:center;">
<a href="/editprofile.php?sk=entertainment">Add TV Shows</a>
</div>
</div>';
}
if(!isset($gamesok)){
$echo.='
<div style="display:inline-block;margin:0;padding:0;padding-right:1px;width:75px;vertical-align:top;position:absolute;margin-left:4px;">
<div class="linkeaivv" style="margin:0;padding:0;display:inline-block;">
<a href="/editprofile.php?sk=eduwork">
<span class="linkeaiv"><img style="top:21px;position: relative;border: 0px none;text-align: center;" src="/images/placeholder-games.png"></span>
</a>
</div>
<div style="display:block;vertical-align:top;margin:0;padding:0;text-align:center;">
<a href="/editprofile.php?sk=entertainment">Add Games</a>
</div>
</div>';
}
$echo.='
</li>
</ul>
<script type="text/javascript">
$("#entertainmentep").css("margin-bottom","15px");
$(".off_border2ai:first").css("border","0");
$(".off_border2ai:first").css("padding-top","0px");
$(".off_border2ai:last").css("padding-bottom","0px");
</script>
</td>
</tr>';
	
	
}


}

$echo.='</table>
<script type="text/javascript">
$(".setme_padding3:last").css("padding-bottom","1px");
$(".border_out5:first").css("border-top","0");
$(".border_out5v:first").css("border-top","0");
</script>
</div>';
$echo.='</div>';


if(!isset($musicok) AND !isset($booksok) AND !isset($moviesok) AND !isset($televisionok) AND !isset($gamesok)){

$echo.='
<div style="margin-bottom:15px;padding:0;">
<div class="section_header" style="margin:0;">
Arts and Entertainment';if(isset($owneracc)){$echo.='<div class="edit_ldiv"><a href="/editprofile.php?sk=entertainment"><span style="position:relative;top:-2px;">Edit</span></a></div>';}$echo.='
</div>
<div style="padding:0;margin:0;padding-left: 5px;padding-right: 5px;">
<table style="border-collapse:collapse;margin-top:0;" class="table_section">';
$echo.='<tr>
<th class="section_title border_out2ai" style="border-top:1px solid rgb(217, 217, 217);">
Share Your<br>Interests
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out2aiv">
<ul class="section_contents_ulv">
<li class="off_border2ai linkeai" style="padding-bottom:0;">
<div style="display:inline-block;margin:0;padding:0;padding-right:1px;width:75px;vertical-align:top;">
<div class="linkeaivv" style="margin:0;padding:0;display:inline-block;">
<a href="/editprofile.php?sk=eduwork">
<span class="linkeaiv"><img style="top:21px;position: relative;border: 0px none;text-align: center;" src="/images/placeholder-music.png"></span>
</a>
</div>
<div style="display:block;vertical-align:top;margin:0;padding:0;text-align:center;">
<a href="/editprofile.php?sk=entertainment">Add Music</a>
</div>
</div>
<div style="display:inline-block;margin:0;padding:0;padding-right:1px;width:75px;vertical-align:top;">
<div class="linkeaivv" style="margin:0;padding:0;display:inline-block;">
<a href="/editprofile.php?sk=eduwork">
<span class="linkeaiv"><img style="top:21px;position: relative;border: 0px none;text-align: center;" src="/images/placeholder-books.png"></span>
</a>
</div>
<div style="display:block;vertical-align:top;margin:0;padding:0;text-align:center;">
<a href="/editprofile.php?sk=entertainment">Add Books</a>
</div>
</div>
<div style="display:inline-block;margin:0;padding:0;padding-right:1px;width:75px;vertical-align:top;">
<div class="linkeaivv" style="margin:0;padding:0;display:inline-block;">
<a href="/editprofile.php?sk=eduwork">
<span class="linkeaiv"><img style="top:21px;position: relative;border: 0px none;text-align: center;" src="/images/placeholder-movies.png"></span>
</a>
</div>
<div style="display:block;vertical-align:top;margin:0;padding:0;text-align:center;">
<a href="/editprofile.php?sk=entertainment">Add Movies</a>
</div>
</div>
<div style="display:inline-block;margin:0;padding:0;padding-right:1px;width:75px;vertical-align:top;">
<div class="linkeaivv" style="margin:0;padding:0;display:inline-block;">
<a href="/editprofile.php?sk=eduwork">
<span class="linkeaiv"><img style="top:21px;position: relative;border: 0px none;text-align: center;" src="/images/placeholder-tv.png"></span>
</a>
</div>
<div style="display:block;vertical-align:top;margin:0;padding:0;text-align:center;">
<a href="/editprofile.php?sk=entertainment">Add TV Shows</a>
</div>
</div>
<div style="display:inline-block;margin:0;padding:0;padding-right:1px;width:75px;vertical-align:top;position:absolute;margin-left:4px;">
<div class="linkeaivv" style="margin:0;padding:0;display:inline-block;">
<a href="/editprofile.php?sk=eduwork">
<span class="linkeaiv"><img style="top:21px;position: relative;border: 0px none;text-align: center;" src="/images/placeholder-games.png"></span>
</a>
</div>
<div style="display:block;vertical-align:top;margin:0;padding:0;text-align:center;">
<a href="/editprofile.php?sk=entertainment">Add Games</a>
</div>
</div>
</li>
</ul>
<script type="text/javascript">
$(".off_border2ai:first").css("border","0");
$(".off_border2ai:first").css("padding-top","0px");
$(".off_border2ai:last").css("padding-bottom","0px");
</script>
</td>
</tr>
</table>
<script type="text/javascript">
$(".border_out2ai:first").css("border-top","0");
$(".border_out2aiv:first").css("border-top","0");
</script>
</div>
</div>';

	
}
}



$dtypes=array();

$dtypes["activities"]="";
$dtypes["interests"]="";

$dq="";

$ax=0;
foreach($dtypes as $dk=>$dv){
$b_qf=return_bq("tastes","$dk");
$ax++;
if($ax!=1){
$dq.=" UNION ";
}

$dq.="(SELECT * FROM tastes WHERE id='$uidv' AND type='$dk' AND (visibility='v' OR visibility='h') $b_qf)";

}

$r=mysql_query("$dq");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<div style="margin-bottom:30px;padding:0;">
<div class="section_header" style="margin:0;">
Activities and Interests';if(isset($owneracc)){$echo.='<div class="edit_ldiv"><a href="/editprofile.php?sk=activities"><span style="position:relative;top:-2px;">Edit</span></a></div>';}$echo.='
</div>
<div style="padding:0;margin:0;padding-left: 5px;padding-right: 5px;">
<table style="border-collapse:collapse;margin-top:0;" class="table_section">';

$b_qf=return_bq("tastes","activities");
$r=mysql_query("SELECT * FROM tastes WHERE id='$uidv' AND type='activities' AND (visibility='v' OR visibility='h') $b_qf ORDER BY datetimep DESC limit 12");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<tr>
<th class="section_title border_out6" style="border-top:1px solid rgb(217, 217, 217);">
Activities
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out6v">
<ul class="section_contents_ul">';
$echo.= '<li class="5off_border setme_padding4" style="font-weight:normal;">';
$anx=0;
$separator=' &#183; ';
while($m=mysql_fetch_array($r)){
$anx++;
if($anx==$c){$separator='';}
$echo.= '<span style="font-weight:bold;color:#3b5998;">'.$m['taste'].$separator.'</span>';
	
}
$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".5off_border:first").css("border","0");
$(".5off_border:first").css("padding-top","0px");
</script>
</td>
</tr>';

}

$b_qf=return_bq("tastes","interests");
$r=mysql_query("SELECT * FROM tastes WHERE id='$uidv' AND type='interests' AND (visibility='v' OR visibility='h') $b_qf ORDER BY datetimep DESC limit 12");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<tr>
<th class="section_title border_out6" style="border-top:1px solid rgb(217, 217, 217);">
Interests
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out6v">
<ul class="section_contents_ul">';
$echo.= '<li class="5off_border2 setme_padding4" style="font-weight:normal;">';
$anx=0;
$separator=' &#183; ';
while($m=mysql_fetch_array($r)){
$anx++;
if($anx==$c){$separator='';}
$echo.= '<span style="font-weight:normal;color:#3b5998;">'.$m['taste'].$separator.'</span>';
	
}
$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".5off_border2:first").css("border","0");
$(".5off_border2:first").css("padding-top","0px");
</script>
</td>
</tr>';

}


$echo.='</table>
<script type="text/javascript">
$(".setme_padding4:last").css("padding-bottom","1px");
$(".border_out6:first").css("border-top","0");
$(".border_out6v:first").css("border-top","0");
</script>
</div>';
$echo.='</div>';
}

$b_qf=return_bq("about");

$r=mysql_query("SELECT * FROM about WHERE id='$uidv' AND about!='' $b_qf");
$c=mysql_num_rows($r);

$b_qf=return_bq("interested");

$r=mysql_query("SELECT * FROM interested WHERE id='$uidv' AND interested!='' $b_qf");
$c=mysql_num_rows($r)+$c;

$b_qf=return_bq("lists_members","love");

$r=mysql_query("SELECT * FROM lists_members WHERE id='$uidv' AND type='love' AND (visibility='v' OR visibility='h') AND relation_confirmed='2' $b_qf");
$c=mysql_num_rows($r)+$c;

$r=mysql_query("SELECT * FROM optionsv WHERE id='$uidv' AND showsex='2'");
$c=mysql_num_rows($r)+$c;
if($c>0){
$echo.='
<div style="margin-bottom:30px;padding:0;">
<div class="section_header" style="margin:0;">
Basic Information';if(isset($owneracc)){$echo.='<div class="edit_ldiv"><a href="/editprofile.php?sk=basic"><span style="position:relative;top:-2px;">Edit</span></a></div>';}$echo.='
</div>
<div style="padding:0;margin:0;padding-left: 5px;padding-right: 5px;">
<table style="border-collapse:collapse;margin-top:0;" class="table_section">';

$b_qf=return_bq("about");
$r=mysql_query("SELECT * FROM about WHERE id='$uidv' AND about!='' $b_qf");
$c=mysql_num_rows($r);
if($c>0){
if($uidv==$uid){
$who='You';	
}
else{
$r2=mysql_query("SELECT * FROM registered WHERE id='$uidv'");
while($m2=mysql_fetch_array($r2)){
$who=$m2['f_name'];	
}
}
$echo.='
<tr>
<th class="section_title border_out7" style="border-top:1px solid rgb(217, 217, 217);">
About '.$who.'
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out7v">
<ul class="section_contents_ul">';
$echo.= '<li class="6off_border setme_padding5" style="font-weight:normal;color:#333333;margin-left:0px;position:relative;top:-2px;">';

while($m=mysql_fetch_array($r)){

$echo.= $m['about'];
	
}
$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".6off_border:first").css("border","0");
$(".6off_border:first").css("padding-top","0px");
</script>
</td>
</tr>';

}

$b_qf=return_bq("interested");
$r=mysql_query("SELECT * FROM interested WHERE id='$uidv' AND interested!='' $b_qf");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<tr>
<th class="section_title border_out7" style="border-top:1px solid rgb(217, 217, 217);">
Interested In
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out7v">
<ul class="section_contents_ul">';
$echo.= '<li class="6off_border2 setme_padding5" style="font-weight:normal;color:#333333;margin-left:0px;position:relative;top:-2px;padding-bottom:0;">';

while($m=mysql_fetch_array($r)){
$interested=$m['interested'];
if($interested=='1'){
$echo.= 'Women';	
}
else if($interested=='2'){
$echo.= 'Men';	
}
else if($interested=="12"){
$echo.= 'Men and Women';	
}
	
}
$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".6off_border2:first").css("border","0");
$(".6off_border2:first").css("padding-top","0px");
</script>
</td>
</tr>';

}


$b_qf=return_bq("lists_members","love");
$r=mysql_query("SELECT * FROM lists_members WHERE id='$uidv' AND type='love' AND (visibility='v' OR visibility='h') AND relation_confirmed='2' $b_qf");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<tr>
<th class="section_title border_out7" style="border-top:1px solid rgb(217, 217, 217);">
Relationship<br>
Status
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out7v">
<ul class="section_contents_ul">';
$echo.= '<li class="6off_border3 setme_padding5" style="font-weight:normal;color:#333333;margin-left:0px;position:relative;top:-2px;">';

while($m=mysql_fetch_array($r)){
$relation=$m['relation'];


if($relation==1){$echo.= 'Single';}
else if($relation==2){$echo.= 'In a relationship';}
else if($relation==3){$echo.= 'Engaged';}
else if($relation==4){$echo.= 'Married';}
else if($relation==5){$echo.= 'It\'s complicated';}
else if($relation==6){$echo.= 'In an open relationship';}
else if($relation==7){$echo.= 'Widowed';}
else if($relation==8){$echo.= 'Separated';}
else if($relation==9){$echo.= 'Divorced';}

if($m['id2']!=""){
$uti=sb_user($m['id2']);
$echo.=' with <span class="lb"><a hc="" href="/'.$uti['username'].'">'.$uti['fullname'].'</a>.</span>';	
}

	
}
$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".6off_border3:first").css("border","0");
$(".6off_border3:first").css("padding-top","0px");
</script>
</td>
</tr>';

}


$r=mysql_query("SELECT * FROM optionsv WHERE id='$uidv' AND showsex='2'");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<tr>
<th class="section_title border_out7" style="border-top:1px solid rgb(217, 217, 217);">
Sex
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out7v">
<ul class="section_contents_ul">';
$echo.= '<li class="6off_border4 setme_padding5" style="font-weight:normal;color:#333333;margin-left:0px;position:relative;top:-2px;">';

$r2=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($m2=mysql_fetch_array($r2)){
if($m2['gender']==1){
$echo.='Female';	
}
else{
$echo.='Male';
}
}

$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".6off_border4:first").css("border","0");
$(".6off_border4:first").css("padding-top","0px");
</script>
</td>
</tr>';

}

$echo.='</table>
<script type="text/javascript">
$(".setme_padding5:last").css("padding-bottom","1px");
$(".border_out7:first").css("border-top","0");
$(".border_out7v:first").css("border-top","0");
</script>
</div>';
$echo.='</div>';
}


















$r=mysql_query("SELECT * FROM contact_phones as dt WHERE id='$uidv' AND visibility='v' $a_qf");
$c=mysql_num_rows($r);

$b_qf=return_bq("address");
$r=mysql_query("SELECT * FROM address WHERE id='$uidv' AND address!='' OR neighborhood!='' OR cityc!='' AND visibility='v' $b_qf");
$c=mysql_num_rows($r)+$c;

$b_qf=return_bq("website");
$r=mysql_query("SELECT * FROM website WHERE id='$uidv' AND visibility='v' $b_qf");
$c=mysql_num_rows($r)+$c;

$r=mysql_query("SELECT * FROM contact_im as dt WHERE id='$uidv' AND visibility='v' $a_qf");
$c=mysql_num_rows($r)+$c;

$r=mysql_query("SELECT * FROM contact_emails as dt WHERE id='$uidv' AND primary2='p' AND visibility='v' $a_qf");
$c=mysql_num_rows($r)+$c;

if($c>0){
$echo.='
<div style="margin-bottom:30px;padding:0;">
<div class="section_header" style="margin:0;">
Contact Information';if(isset($owneracc)){$echo.='<div class="edit_ldiv"><a href="/editprofile.php?sk=contact"><span style="position:relative;top:-2px;">Edit</span></a></div>';}$echo.='
</div>
<div style="padding:0;margin:0;padding-left: 5px;padding-right: 5px;">
<table style="border-collapse:collapse;margin-top:0;" class="table_section">';

function format_phone($v){
if(strlen($v)==10){
$v=substr($v,0,3).' '.substr($v,3,3).' '.substr($v,6);	
}
else if(strlen($v)==9){
$v=substr($v,0,3).' '.substr($v,3,3).' '.substr($v,6);	
}
else if(strlen($v)==8){
$v=substr($v,0,4).' '.substr($v,4);	
} 
return $v;
}


$r=mysql_query("SELECT * FROM contact_phones as dt WHERE id='$uidv' AND type='0' AND visibility='v' $a_qf ORDER BY datetimep DESC");
$c=mysql_num_rows($r);
if($c>0){
$mphonesok='';
$echo.='
<tr>
<th class="section_title border_out8" style="border-top:1px solid rgb(217, 217, 217);">
Mobile<br>
Phones
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out8v">
<ul class="section_contents_ul">';
$echo.= '<li class="7off_border setme_padding6" style="font-weight:normal;color:#333333;margin-left:0px;position:relative;top:-1px;">';

$anx=0;
while($m=mysql_fetch_array($r)){
$countryc=$m['ext'];
$m['phone']=format_phone($m['phone']);	

$anx++;
$tm='2';
if($anx=="1"){$tm='0';}
$echo.= '<span style="display:block;margin:0;padding:0;margin-top:'.$tm.'px;">'.$m['phone'].'</span>';
}

$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".7off_border:first").css("border","0");
$(".7off_border:first").css("padding-top","0px");
</script>
</td>
</tr>';

}


$r=mysql_query("SELECT * FROM contact_phones as dt WHERE id='$uidv' AND (type='2' OR type='1') AND visibility='v' $a_qf ORDER BY datetimep DESC");
$c=mysql_num_rows($r);
if($c>0){
$echo.='
<tr>
<th class="section_title border_out8" style="border-top:1px solid rgb(217, 217, 217);">
Other Phones
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out8v">
<ul class="section_contents_ul">';
$echo.= '<li class="7off_border2 setme_padding6" style="font-weight:normal;color:#333333;margin-left:0px;position:relative;top:-1px;">';

$anx=0;
while($m=mysql_fetch_array($r)){
$countryc=$m['ext'];
$m['phone']=format_phone($m['phone']);
if($m['type']==1){
$m['type']="Work";
}
else if($m['type']==2){
$m['type']="Home";	
}

$anx++;

$tm='2';
if($anx=="1"){$tm='0';}
$echo.= '<span style="display:block;margin:0;padding:0;margin-top:'.$tm.'px;">'.$m['phone'].'<span style="color:rgb(153, 153, 153);padding-left:5px;padding-right:5px;">'.$m['type'].'</span></span>';

}


$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".7off_border2:first").css("border","0");
$(".7off_border2:first").css("padding-top","0px");
</script>
</td>
</tr>';

}


$b_qf=return_bq("address");
$r=mysql_query("SELECT * FROM address WHERE id='$uidv' AND (address!='' OR cityc!='') AND visibility='v' $b_qf");
$c=mysql_num_rows($r);
if($c>0){
$addressok='';
$echo.='
<tr>
<th class="section_title border_out8" style="border-top:1px solid rgb(217, 217, 217);">
Address
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out8v">
<ul class="section_contents_ul">';
$echo.= '<li class="7off_border3 setme_padding6" style="font-weight:normal;color:#333333;margin-left:0px;position:relative;top:-1px;">';

$r2=mysql_query("SELECT * FROM address WHERE id='$uidv' AND address!='' AND visibility='v'");
$c2=mysql_num_rows($r2);
if($c2>0){

while($m2=mysql_fetch_array($r2)){

$address=$m2['address'];
	
}
	
}

if(isset($address) AND $address!=""){
$echo.='<span style="display:block;margin:0;padding:0;margin-top:1px;" class="care_margin2">'.$address.'</span>';	
$r2=mysql_query("SELECT * FROM address WHERE id='$uidv' AND zip!='' AND visibility='v'");
while($m2=mysql_fetch_array($r2)){
$echo.='<span style="display:block;margin:0;padding:0;margin-top:1px;" class="care_margin2">'.$m2['zip'].'</span>';		
}
}

$r=mysql_query("SELECT * FROM address WHERE id='$uidv' AND cityc!='' AND visibility='v'");
$c=mysql_num_rows($r);

if($c>0){
	

$statec="";
$countryc="";
$cityc="";
$v="";

$result=mysql_query("SELECT * FROM address WHERE id='$uidv' AND visibility='v'");
while($ms=mysql_fetch_array($result)){
$statec=$ms['statec'];
$countryc=$ms['countryc'];
$cityc=$ms['cityc'];
$cityc=addslashes($cityc);
$cityc=addslashes($cityc);
if($cityc!=""){	
$f='';
}
}
$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
if(isset($f)){
$r=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($m=mysql_fetch_array($r)){
$staten=$m['staten'];	
}
$r=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($m=mysql_fetch_array($r)){
$countryn=$m['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$countryn;
}
unset($f);}
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");	

$echo.='<span style="display:block;margin:0;padding:0;margin-top:1px;" class="care_margin2">'.$v.'</span>';		
	
}

$r=mysql_query("SELECT * FROM address WHERE id='$uidv' AND neighborhood!='' AND visibility='v'");
$c=mysql_num_rows($r);
if($c>0){
while($m=mysql_fetch_array($r)){
$neighborhoode='';
$echo.='<span style="position:relative;margin:0;padding:0;"><span style="margin:0;padding:0;position:absolute;left:-88px;bottom:-13px;font-weight:bold;color:rgb(153, 153, 153);">Neighborhood</span></span><span style="display:block;margin:0;padding:0;margin-top:1px;" class="care_margin2">'.$m['neighborhood'].'</span>';
}
}

$echo.='</li>';



$echo.='
</ul>
<script type="text/javascript">
$(".care_margin2:first").css("margin-top","0");
$(".7off_border3:first").css("border","0");
$(".7off_border3:first").css("padding-top","0px");
</script>
</td>
</tr>';

}


if(!isset($neighborhoode)){

$b_qf=return_bq("address");
$r=mysql_query("SELECT * FROM address WHERE id='$uidv' AND neighborhood!='' AND visibility='v' $b_qf");
$c=mysql_num_rows($r);
if($c>0){

$echo.='
<tr>
<th class="section_title border_out8" style="border-top:1px solid rgb(217, 217, 217);">
Neighborhood
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out8v">
<ul class="section_contents_ul">';
$echo.= '<li class="7off_border4 setme_padding6" style="font-weight:normal;color:#333333;margin-left:0px;position:relative;top:-1px;">';

while($m=mysql_fetch_array($r)){
$echo.= $m['neighborhood'];	
}

$echo.='</li>';



$echo.='
</ul>
<script type="text/javascript">
$(".7off_border4:first").css("border","0");
$(".7off_border4:first").css("padding-top","0px");
</script>
</td>
</tr>';

}
}

$r=mysql_query("SELECT * FROM contact_im as dt WHERE id='$uidv' AND visibility='v' $a_qf ORDER BY datetimep ASC LIMIT 4");
$c=mysql_num_rows($r);
if($c>0){
$imok='';
if($c>1){$ps='s';}
else{$ps='';}

$echo.='
<tr>
<th class="section_title border_out8" style="border-top:1px solid rgb(217, 217, 217);">
Screen Name'.$ps.'
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out8v">
<ul class="section_contents_ul">';
$echo.= '<li class="7off_border5 setme_padding6" style="font-weight:normal;color:#333333;margin-left:0px;position:relative;top:-1px;">';

while($m=mysql_fetch_array($r)){
$echo.= '<span style="margin:0;padding:0;display:block;margin-top:2px;" class="caref_margin">'.$m['user'].'<span style="color:rgb(153, 153, 153);padding-left:5px;" class="affected_provider">('.$m['provider'].')</span></span>';	
}

$echo.='</li>';



$echo.='
</ul>
<div style="display:none;">
<select class="imprv" id="improviderc">
<option value="1">AIM</option><option value="4">Google Talk</option><option value="5">Windows Live Messenger</option><option value="6">Skype</option><option value="7">Yahoo! Messenger</option><option value="2">Gadu-Gadu</option><option value="3">ICQ</option><option value="9">QQ</option><option value="10">NateOn</option><option value="11">Twitter</option><option value="12">Hyves</option><option value="13">Orkut</option><option value="16">Cyworld</option><option value="18">QIP</option><option value="19">Rediff Bol</option><option value="20">Vkontakte</option><option value="21">eBuddy</option><option value="22">Mail.ru Agent</option><option value="23">Jabber</option>
</select>
</div>
<script type="text/javascript">
$(".caref_margin:first").css("margin-top","0");
$(".7off_border5:first").css("border","0");
$(".7off_border5:first").css("padding-top","0px");
$("span[class=affected_provider]").each(function() {
                var nena=$(this).html();
				nena=nena.replace("(","");
				nena=nena.replace(")","");
		
				$("#improviderc").val(nena);
				var aja=$("#improviderc option:selected").text();
		$(this).html("("+aja+")");
        }); 
</script>
</td>
</tr>';

}


$b_qf=return_bq("website");
$r=mysql_query("SELECT * FROM website WHERE id='$uidv' AND website!='' AND visibility='v' $b_qf");
$c=mysql_num_rows($r);
if($c>0){

function formatUrlsInText($text){
            $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
            preg_match_all($reg_exUrl, $text, $matches);
            $usedPatterns = array();
            foreach($matches[0] as $pattern){
                if(!array_key_exists($pattern, $usedPatterns)){
                    $usedPatterns[$pattern]=true;
					if(strpos($pattern,"https")!==false){
					$one='https://';	
					}
					else{
					$one='http://';
					}

                    $text = str_replace  ($pattern, "<a href=".'"'."{$pattern}".'"'." target=".'"'."_blank".'"'.">{$pattern}</a> ", $text);   
                }
            }
            $reg_exUrl = "/[a-zA-Z0-9\-\:\/\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
            preg_match_all($reg_exUrl, $text, $matches);
            $usedPatterns = array();
            foreach($matches[0] as $pattern){
                if(!array_key_exists($pattern, $usedPatterns) AND strpos($pattern,"http:")===false AND strpos($pattern,"https:")===false){
                    $usedPatterns[$pattern]=true;
					if(strpos($pattern,"https")!==false){
					$one='https://';	
					}
					else{
					$one='http://';
					}

                    $text = str_replace  ($pattern, "<a href=".'"'."{$pattern}".'"'." target=".'"'."_blank".'"'.">{$pattern}</a> ", $text);   
                }
            }		

            return $text;            
}

$echo.='
<tr>
<th class="section_title border_out8" style="border-top:1px solid rgb(217, 217, 217);">
Website
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out8v">
<ul class="section_contents_ul">';
$echo.= '<li class="7off_border6 magicli setme_padding6" style="font-weight:normal;color:#333333;margin-left:0px;position:relative;top:-1px;">';

while($m=mysql_fetch_array($r)){
$m['website']=str_replace("\n","<br>",$m['website']);

$m['website']=formatUrlsInText($m['website']);

$echo.= $m['website'];
}

$echo.='</li>';



$echo.='
</ul>
<script type="text/javascript">
$(".7off_border6:first").css("border","0");
$(".7off_border6:first").css("padding-top","0px");
</script>
</td>
</tr>';

}



$r=mysql_query("SELECT * FROM contact_emails as dt WHERE id='$uid' AND primary2='p' AND visibility='v' $a_qf");
$c=mysql_num_rows($r);
if($c>0){


$echo.='
<tr>
<th class="section_title border_out8" style="border-top:1px solid rgb(217, 217, 217);">
Email
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out8v">
<ul class="section_contents_ul">';
$echo.= '<li class="7off_border7 setme_padding6" style="font-weight:normal;color:#333333;margin-left:0px;position:relative;top:-1px;">';

while($m=mysql_fetch_array($r)){
$echo.= $m['email'];
}

$echo.='</li>';



$echo.='
</ul>
<script type="text/javascript">
$(".7off_border7:first").css("border","0");
$(".7off_border7:first").css("padding-top","0px");
</script>
</td>
</tr>';

}

if($unv!=$uidv){

$echo.='
<tr>
<th class="section_title border_out8" style="border-top:1px solid rgb(217, 217, 217);">
Upfrev
</th>
<td style="font-size:11px;padding-top:12px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:0;" class="border_out8v">
<ul class="section_contents_ul">';
$echo.= '<li class="7off_border8 magicli setme_padding6" style="font-weight:normal;color:#333333;margin-left:0px;position:relative;top:-2px;">';


$echo.= '<a href="/'.$unv.'">/'.$unv.'</a>';
	

$echo.='</li>';

$echo.='
</ul>
<script type="text/javascript">
$(".7off_border8:first").css("border","0");
$(".7off_border8:first").css("padding-top","0px");
</script>
</td>
</tr>';
}

if(isset($owneracc)){
if(!isset($mphonesok) AND !isset($addressok) AND !isset($imok)){
//if(!isset($mphonesok)){
$echo.='<tr><td colspan="2" style="font-size:11px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:11px;padding-right: 5px;padding-left:2px;padding-top:10px;" class="border_out8v magicli">
<a href="/editprofile.php?sk=contact" style="background: url(\'/images/_S0u1wZb3JC.png\') no-repeat scroll left 2px transparent;padding-left: 14px;font-weight:normal;">Add Mobile Phone</a>
</td>
</tr>';
//}
//if(isset($addressok)){}
//else if(!isset($imok)){
$echo.='
<tr><td colspan="2" style="font-size:11px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:11px;padding-right: 5px;padding-left:2px;padding-top:10px;" class="border_out8v magicli">
<a href="/editprofile.php?sk=contact" style="background: url(\'/images/_S0u1wZb3JC.png\') no-repeat scroll left 2px transparent;padding-left: 14px;font-weight:normal;">Add Screen Name</a>
</td>
</tr>';
//}
//if(isset($imok)){}
//else if(!isset($addressok)){
$echo.='
<tr><td colspan="2" style="font-size:11px;font-weight:bold;border-top:1px solid rgb(217, 217, 217);text-align:left;padding-bottom:11px;padding-right: 5px;padding-left:2px;padding-top:10px;" class="border_out8v magicli">
<a href="/editprofile.php?sk=contact" style="background: url(\'/images/_S0u1wZb3JC.png\') no-repeat scroll left 2px transparent;padding-left: 14px;font-weight:normal;">Add Address</a>
</td>
</tr>';
//}

}

}


$echo.='</table>
<script type="text/javascript">
$(".setme_padding6:last").css("padding-bottom","1px");
$(".border_out8:first").css("border-top","0");
$(".border_out8v:first").css("border-top","0");
</script>
</div>';
$echo.='</div>';
}



$echo.='
</div>';

$params['rhelper']='../';
$params['rhelper_js']='';
$params['title']='Upfrev';


$params['layout']='left_column_w';	
$params['left_link_w']='info';


include("end.php");
?>