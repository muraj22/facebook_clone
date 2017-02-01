<?php

$echo.='<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;"><div style=position:relative;top:8px;margin:0;padding:0;">Employer:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">
<input autocomplete="off" type="text" class="editpi dcphmgc" id="employer" placeholder="Where have you worked?">
<input autocomplete="off" type="hidden" id="employerv">
<input autocomplete="off" type="hidden" id="employerv2">
<input autocomplete="off" type="hidden" id="workedv">
<input autocomplete="off" type="hidden" id="workedvv">
<div class="employer_ac"></div>
<script type="text/javascript">
function autoGrowField_nj(f, max) {
   var max = (typeof max == "undefined")?1000:max;
   if (document.getElementById(f).scrollHeight > max) {
      if (document.getElementById(f).style.overflowY != "scroll") { document.getElementById(f).style.overflowY = "scroll" }
      return;
   }
   if (document.getElementById(f).style.overflowY != "hidden") { document.getElementById(f).style.overflowY = "hidden" }
   var scrollH = document.getElementById(f).scrollHeight;
   
   if( scrollH > document.getElementById(f).style.height.replace(/[^0-9]/g,"") ){
      document.getElementById(f).style.height = scrollH+6+"px";
   }
}


function popnewjob(v,vv){
	var employerv=$("#employerv").val();
$("#employerv").val(","+vv+employerv);


	var employerv2=$("#employerv2").val();
$("#employerv2").val(","+v+employerv2);

$("#workedv").val(v);
$("#workedvv").val(vv);

insertandopennew();
}
$("#employerv").val("");
$("#employerv2").val("");
function strpos (haystack, needle, offset) {
   var i = (haystack + "").indexOf(needle, (offset || 0));
    return i === -1 ? false : i;
}
			$(function() {
		$( "#employer" ).autocomplete({
			appendTo:".employer_ac",
			open:function(event,ui){
				var dac=$(".employer_ac").children(".ui-autocomplete");
				$(dac).addClass("fwn");
			},
			       source: function(request, response) {
                $.ajax({
                  url: \'autocomplete/employer.php\',
                  dataType: "json",
                  data: {
                    term : request.term,
                    employerv : $("#employerv").val(),
					employerv2 : $("#employerv2").val()
                  },
                  success: function(data) {
                    response(data);
                  }
                });
            },
			minLength: 1,
			selectFirst: true,
			focus: function(event,ui){
				return false;
			},
			select: function( event, ui ) {
						popnewjob(ui.item.value,ui.item.valuev);
						return false;					
			}
		})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			var employervv=$("#employerv").val();
			
			return $( "<li style=\\"cursor:pointer;padding:0;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif!important;\\"></li>" )
				.data( "ui-autocomplete-item", item )
				.append( \'<a>\'+item.value + \'</a>\' )
				.appendTo( ul );
			
			};
	});
	function insertandopennew(){
$("#employer").attr("disabled",true);
$("#employer").css("background","#ECECEC");

				var count=Math.random();
count=count.toString();
count=count.replace(".","");
count=count.replace(/0/gi,"");
var tjobs=count;

var workedv=$("#workedv").val();
var workedvv=$("#workedvv").val();

$.ajax({
  async: false,
  type: "POST",
  url: "editprofile/new_job.php",
  data: { tjobs:tjobs, workedv:workedv,workedvv:workedvv },
  success: function(response) {
$("#employer").attr("disabled",false);
$("#employer").css("background","#ffffff");
$("#employer").val("Where have you worked?");
$("#employer").blur();
$("#njobsw").prepend(response);
$("#"+tjobs+"njobw").css("display","block");
	}
});

}
</script>
<div style="display:block;margin:0;padding:0;" id="njobsw">
</div>
<div id="jobsiw" style="display:block;margin:0;padding:0;">
</div>

<div id="sbid" style="display:none;">';

function genRandomStringnum($length) {
    $characters = '0123456789';
    $string = '';    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) -1)];
    }
    return $string;
}

function replace_newline($string) {
  return (string)str_replace(array("\r", "\r\n", "\n"), '', $string);
}

function GetMonthString($n)
{
    $timestamp = mktime(0, 0, 0, $n, 1, 2005);
    
    return date("M", $timestamp);
}
$oj=0;
$insertreadyvals='$(document).ready(function(){';
$insertsbid='';
$cityc='';
$statec='';
$countryc='';
$position='';
$r=mysql_query("SELECT * FROM workedu WHERE id='$uid' AND type='j' AND visibility='v' ORDER BY datetimepe DESC");
while($m=mysql_fetch_array($r)){

$j=genRandomStringnum(16);
$cityc=$m['cityc'];
$statec=$m['statec'];
$countryc=$m['countryc'];
$position=$m['position'];
	$position=stripslashes($position);
	$position=addslashes($position);
$description=$m['description'];
$currently=$m['currently'];
$yeare=$m['yeare'];
$monthe=$m['monthe'];
$daye=$m['daye'];
$yearl=$m['yearl'];
$monthl=$m['monthl'];
$place=$m['place'];
	$place=stripslashes($place);
	$place=addslashes($place);
$sbid=$m['sbid'];	
$dayl=$m['dayl'];
if($monthe!="-1"){
$month_s=GetMonthString($monthe);
}
else{
$month_s='nada';	
}
if($monthl!="-1"){
$month_e=GetMonthString($monthl);
}
else{
$month_e='nada';	
}
$cityc=addslashes($cityc);
$cityc=addslashes($cityc);
if($cityc!=""){	
$f='';
}
$echo.='<input autocomplete="off" type="hidden" id="djob'.$j.'" value="'.$sbid.'">';

$con=mysql_connect("localhost","root","xd22xd22");
mysql_select_db("modules");
if(isset($f)){
$r2=mysql_query("SELECT * FROM states WHERE statec='$statec' AND countryc='$countryc' LIMIT 1");
while($m2=mysql_fetch_array($r2)){
$staten=$m2['staten'];	
}
$r2=mysql_query("SELECT * FROM countries WHERE countryc='$countryc' LIMIT 1");
while($m2=mysql_fetch_array($r2)){
$countryn=$m2['countryn'];	
}
if($countryn=="United States"){
$v=$cityc.', '.$staten;
}
else{
$v=$cityc.', '.$staten.', '.$countryn;
}
unset($f);}

if(!isset($v)){
$v="";	
}

$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$tj=$j;

$workedv=$m['place'];
		$valuev=strtolower($workedv);
		$valuev=str_replace(" ","",$valuev);
		$valuev=preg_replace('/\W+/', '', $valuev);
$workedvv=$valuev;

include("editprofile/new_job.php");

$j=$tj;
$insertsbid.='$("#djob'.$j.'").val("'.$sbid.'");';


$echo.='
<script type="text/javascript">
$("#njobsw").append($("#'.$tj.'njobw"));

</script>
<script type="text/javascript">
$("#'.$j.'job_titlev").val("'.$position.'");
$("#'.$j.'cityc_city_job").val("'.$cityc.'");
$("#'.$j.'statec_city_job").val("'.$statec.'");
$("#'.$j.'countryc_city_job").val("'.$countryc.'");
';
if($description==""){
$echo.='
$("#'.$j.'job_description").val("'.$description.'");
$("#'.$j.'mdescription").val("'.$description.'");
';
}
$echo.='

$("#'.$j.'place").val("'.$place.'");
$("#'.$j.'month_e").val("'.$month_e.'");
$("#'.$j.'month_s").val("'.$month_s.'");
$("#'.$j.'yeare").val("'.$yeare.'");
$("#'.$j.'monthe").val("'.$monthe.'");
$("#'.$j.'daye").val("'.$daye.'");
$("#'.$j.'yearl").val("'.$yearl.'");
$("#'.$j.'monthl").val("'.$monthl.'");
$("#'.$j.'dayl").val("'.$dayl.'");

$("#'.$j.'currently").val("'.$currently.'");

$("#'.$j.'longcity").val("'.$v.'");

$("#'.$j.'mposition").val("'.$position.'");
$("#'.$j.'mcityc").val("'.$cityc.'");
$("#'.$j.'mstatec").val("'.$statec.'");
$("#'.$j.'mcountryc").val("'.$countryc.'");

$("#'.$j.'mplace").val("'.$place.'");
$("#'.$j.'mcurrently").val("'.$currently.'");
$("#'.$j.'mlongcity").val("'.$v.'");
$("#'.$j.'mmonth_e").val("'.$month_e.'");
$("#'.$j.'mmonth_s").val("'.$month_s.'");
$("#'.$j.'myeare").val("'.$yeare.'");
$("#'.$j.'mmonthe").val("'.$monthe.'");
$("#'.$j.'mdaye").val("'.$daye.'");
$("#'.$j.'myearl").val("'.$yearl.'");
$("#'.$j.'mmonthl").val("'.$monthl.'");
$("#'.$j.'mdayl").val("'.$dayl.'");

</script>
';

$insertreadyvals.='insertreadyvals(\''.$j.'\');';

$oj++;
}
$echo.='</div>';
$oj--;

$insertreadyvals.='});';
$echo.='

<input autocomplete="off" type="hidden" id="tot_jobs">
<script type="text/javascript">
'.$insertsbid.'
$("#tot_jobs").val("'.$oj.'");
function editjob(wj){
insertreadyvals(wj);
var dife=\'<label class="savecedit" onclick="addjob(\\\'\'+wj+\'\\\',1);" style="padding:1px 4px;"><input autocomplete="off" type="button" class="savecedit2" value="Save Changes"></label><label class="cancelcedit" onclick="canceladdjob(\\\'\'+wj+\'\\\',1);" style="padding:1px 4px;"><input autocomplete="off" type="button" class="cancelcedit2" value="Cancel"></label>\';
$("#"+wj+"employerbtw").html(dife);
$("#"+wj+"joba").after($("#"+wj+"njobw"));
$("#"+wj+"njobw").css("display","block");
$("#"+wj+"joba").css("display","none");	
autoGrowField_nj(wj+"job_description",250);
}

function cancel_removere(){
	$("#pre_pop_container2ore").fadeOut("fast");
}

function removeemployer(wj){
	$("#delwhatre").html("Employer?");
	$("#delwhat2re").html("employer");
	
$(\'#div_dialog_footervo2re\').html(\'<label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:86px;" onclick="rremoveemployer(\\\'\'+wj+\'\\\');"><input autocomplete="off" type="button" value="Confirm" class="uiButtonText"></label><label class="fsl uiButton" onclick="cancel_removere();" style="position:absolute;right:22px;"><input autocomplete="off" type="button" value="Cancel" class="uiButtonText"></label>\');
	
$("#pre_pop_container2ore").css("display","block");

}

function rremoveemployer(wj){
	$("#pre_pop_container2ore").fadeOut("slow");
var sbid=$("#djob"+wj).val();

$.ajax({
  async: false,
  type: "POST",
  url: "editprofile/remove_job.php",
  data: { sbid:sbid },
  success: function(response) {

var workedv=$("#"+wj+"workedv").val();
var workedvv=$("#"+wj+"workedvv").val();

var employerv=$("#employerv").val();
employerv=employerv.replace(","+workedvv,"");

var employerv2=$("#employerv2").val();
employerv2=employerv2.replace(","+workedv,"");

$("#employerv").val(employerv);
$("#employerv2").val(employerv2);


$("#"+wj+"joba").remove();
$("#"+wj+"njobw").remove();
$("#djob"+wj).remove();
var tjobs=$("#tot_jobs").val();
tjobs=parseInt(tjobs);
tjobs=tjobs-1;
$("#tot_jobs").val(tjobs);
$(".joba").css("border-top","1px solid rgb(233,233,233)");
$(".joba:first").css("border-top","0");
	}
});	
}

function insertreadyvals(wj){
var position=$("#tagsposition"+wj+"m").val();

var cityc=$("#"+wj+"mcityc").val();
var statec=$("#"+wj+"mstatec").val();
var countryc=$("#"+wj+"mcountryc").val();
var cityv=$("#"+wj+"mlongcity").val();
if(cityc!=""){
				$("#"+wj+"editpiw_city_job").addClass("editpivo");
				$("#"+wj+"editpiwv_city_job").addClass("editpivvo");
				$("#"+wj+"city_job").removeClass("editpi");
				$("#"+wj+"city_job").addClass("editpi2");
				$("#"+wj+"removeedit_city_job").css("display","block");
				$("#"+wj+"stateedit_city_job").val("1");
				$("#"+wj+"city_job").val(cityv);
				$("#"+wj+"city_jobv").val(cityv);
				$("#"+wj+"statec_city_job").val(statec);
				$("#"+wj+"countryc_city_job").val(countryc);
				$("#"+wj+"cityc_city_job").val(cityc);	
}
var currently=$("#"+wj+"mcurrently").val();
$(\'#\'+wj+\'addyears option:contains("--")\').val(\'-1\');	
$(\'#\'+wj+\'addyears option:contains("--")\').text(\'Year:\');

$("#"+wj+"addyear").css("display","inline-block");
$("#"+wj+"addyears").css("opacity","0");
$(\'#\'+wj+\'addyears\').css(\'left\',\'8px\'); $(\'#\'+wj+\'addyears\').css(\'margin-right\',\'0px\'); 

$("#"+wj+"addyears").css("cursor","pointer");
if(currently=="2"){$("#"+wj+"currentlyworkhere").attr("checked","checked");}
else{$("#"+wj+"currentlyworkhere").removeAttr("checked");}
var yeare=$("#"+wj+"myeare").val();
if(yeare!="-1"){
$("#"+wj+"addyears").val(yeare);
$("#"+wj+"addyears").click();
addmonth(\'\',1,\'\',wj); adddayv(\'\',\'\',wj);	
}
var monthe=$("#"+wj+"mmonthe").val();

if(monthe!="-1"){
$("#"+wj+"addmonths").val(monthe);
$("#"+wj+"addmonths").click();
addday(\'\',1,wj); adddayv(\'\',\'\',wj);		
}
var daye=$("#"+wj+"mdaye").val();
if(daye!="-1"){
$("#"+wj+"adddays").val(daye);
$("#"+wj+"adddays").click();
checkcursor(\'\',wj);		
}
var currently=$("#"+wj+"mcurrently").val();
var dayl=$("#"+wj+"mdayl").val();
var monthl=$("#"+wj+"mmonthl").val();
var yearl=$("#"+wj+"myearl").val();

$("#"+wj+"addyears2").val("--");



$(\'#\'+wj+\'addyears2 option:contains("--")\').val(\'-1\');	
$(\'#\'+wj+\'addyears2 option:contains("--")\').text(\'Year:\');
$("#"+wj+"addyears2").css("cursor","pointer");

addmonth(2,\'nada\',\'doit\',wj);


$("#"+wj+"addyear2").css("display","inline-block");
$("#"+wj+"addyears2").css("opacity","0");

if(currently==1){

	$("#"+wj+"currentlyv2").css("display","inline-block");
$("#"+wj+"topresent").html("to");	
	$("#"+wj+"currentlyworkhere").removeAttr("checked");

if(yearl!="-1"){
$("#"+wj+"addyears2").val(yearl);
$("#"+wj+"addyears2").click();
addmonth(2,\'\',\'\',wj); adddayv(\'\',2,wj);	
}

if(monthl!="-1"){
$("#"+wj+"addmonths2").val(monthl);
$("#"+wj+"addmonths2").click();
addday(2,\'\',wj); adddayv(\'\',2,wj);	
}

if(dayl!="-1"){
$("#"+wj+"adddays2").val(dayl);
$("#"+wj+"adddays2").click();
checkcursor(2,wj);		
}
}
else{
	$("#"+wj+"currentlyworkhere").attr("checked","checked");
$("#"+wj+"currentlyv2").css("display","none");
$("#"+wj+"topresent").html("to present");	
$(\'#\'+wj+\'addmonths2 option:contains("--")\').val(\'-1\');	
$(\'#\'+wj+\'addmonth2 option:contains("--")\').text(\'Month:\');
$(\'#\'+wj+\'adddays2 option:contains("--")\').val(\'-1\');	
$(\'#\'+wj+\'adddays2 option:contains("--")\').text(\'Day:\');
$("#"+wj+"addyears2").val("Year:");	
$("#"+wj+"addmonths2").val("Month:");	
$("#"+wj+"adddays2").val("Day:");	
}



var month_s=$("#"+wj+"mmonth_s").val();
var month_e=$("#"+wj+"mmonth_e").val();

var place=$("#"+wj+"mplace").val();

var description=$("#"+wj+"mdescription").val();
$("#"+wj+"job_description").val(description);



var pins=\'<div id="\'+wj+\'joba" class="joba" onmouseover="$(\\\'#\'+wj+\'editjoba\\\').removeClass(\\\'editjoba\\\'); $(\\\'#\'+wj+\'editjoba\\\').addClass(\\\'editjobav\\\');" onmouseout="$(\\\'#\'+wj+\'editjoba\\\').removeClass(\\\'editjobav\\\'); $(\\\'#\'+wj+\'editjoba\\\').addClass(\\\'editjoba\\\');" style="cursor:pointer;display:block;margin:0;padding:6px;padding-top:4px;padding-right:4px;margin-top:5px;width:601px;position:relative;">\';

var ins=\'<div class="removeemployer" title="Remove employer" style="float:right;margin-left:9px;position:relative;top:1px;" onclick="removeemployer(\\\'\'+wj+\'\\\');"></div><div style="float:right;" class="editjoba" id="\'+wj+\'editjoba" onclick="editjob(\\\'\'+wj+\'\\\');">Edit</div><div style="display:inline-block;margin:0;padding:0;font-weight:bold;">\'+place+\'</div><div style="display:block;margin:0;padding:0;color:gray;"><span id="\'+wj+\'joba_position">\'+position+\'</span>\';

if(position!=""){
var lspace=" &#183; ";
}
else{
var lspace="";	
}

if((monthe!="-1") && (daye!="-1") && (yeare!="-1")){
ins+=\'<span id="\'+wj+\'joba_datese">\'+lspace+month_s+\' \'+daye+\', \'+yeare+\'</span>\';
}
else if((monthe!="-1") && (yeare!="-1")){
ins+=\'<span id="\'+wj+\'joba_datese">\'+lspace+month_s+\', \'+yeare+\'</span>\';	
}
else if(yeare!="-1"){
ins+=\'<span id="\'+wj+\'joba_datese">\'+lspace+yeare+\'</span>\';	
}

if((monthl!="-1") && (dayl!="-1") && (yearl!="-1")){
ins+=\'<span id="\'+wj+\'joba_datesl"> to \'+month_e+\' \'+dayl+\', \'+yearl+\'</span>\';	
}
else if((monthl!="-1") && (yearl!="-1")){
ins+=\'<span id="\'+wj+\'joba_datesl"> to \'+month_e+\', \'+yearl+\'</span>\';	
}
else if(yearl!="-1"){
ins+=\'<span id="\'+wj+\'joba_datesl"> to \'+yearl+\'</span>\';	
}
else if(yeare!="-1"){
ins+=\'<span id="\'+wj+\'joba_datesl"> to present</span>\';		
}

ins+=\'</div><div style="display:block;margin:0;padding:0;">\'+description+\'</div>\';

var alreadye=$("#"+wj+"joba");
if($(alreadye).length>0){$("#"+wj+"joba").html(ins);}
else{
var ins=pins+ins+"</div>";	
	$("#jobsiw").append(ins);
}
$("#"+wj+"njobw").css("display","none");
$("#"+wj+"joba").css("display","block");
$(".joba").css("border-top","1px solid rgb(233,233,233)");
$(".joba:first").css("border-top","0");
}';



$echo.='
function addjob(wj,saveoradd){
var place=$("#"+wj+"worked").html();
var position=$("#tagsposition"+wj+"m").val();

var cityc=$("#"+wj+"cityc_city_job").val();
var statec=$("#"+wj+"statec_city_job").val();
var countryc=$("#"+wj+"countryc_city_job").val();
var description=$("#"+wj+"job_description").val();
var yeare=$("#"+wj+"addyears").val();
var monthe=$("#"+wj+"addmonths").val();

var daye=$("#"+wj+"adddays").val();
if(daye===null){daye=-1;}
var yearl=$("#"+wj+"addyears2").val();
var monthl=$("#"+wj+"addmonths2").val();
var dayl=$("#"+wj+"adddays2").val();
if(dayl===null){dayl=-1;}
var cnb=$("#"+wj+"currentlyworkhere:checked").val(); 
if(cnb===undefined){
var currently=1;
}
else{
var currently=2;
}
var type="j";

var tjobs=$("#tot_jobs").val();

tjobs=parseInt(tjobs);

var exig=$("#djob"+wj);
if($(exig).length>0){
var sbid=$("#djob"+wj).val();
}
else{
var sbid="";	
}

if(currently==2){
var yearl=-1;
var monthl=-1;
var dayl=-1;	
}

var longcity=$("#"+wj+"city_job").val();

$.ajax({
  async: false,
  type: "POST",
  url: "editprofile/addjob.php",
  data: { place:place,position:position,cityc:cityc,statec:statec,countryc:countryc,description:description,yeare:yeare,monthe:monthe,daye:daye,yearl:yearl,monthl:monthl,dayl:dayl,currently:currently,type:type,sbid:sbid },
  success: function(response) {
var res=response.split("{}");
var norold=res[0];

if(norold==2){
var sbid=res[1];
$(\'#sbid\').append(\'<input autocomplete="off" type="hidden" id="djob\'+wj+\'" value="\'+sbid+\'">\');
}
var month_s=res[2];
var month_e=res[3];

$("#"+wj+"mmonth_e").val(month_e);
$("#"+wj+"mmonth_s").val(month_s);

$("#"+wj+"longcity").val(longcity);
$("#"+wj+"mlongcity").val(longcity);
$("#"+wj+"mplace").val(place);
$("#"+wj+"mposition").val(position);
$("#"+wj+"mcityc").val(cityc);
$("#"+wj+"mstatec").val(statec);
$("#"+wj+"mcountryc").val(countryc);
$("#"+wj+"mdescription").val(description);
$("#"+wj+"myeare").val(yeare);
$("#"+wj+"mmonthe").val(monthe);
$("#"+wj+"mdaye").val(daye);
$("#"+wj+"myearl").val(yearl);

$("#"+wj+"mmonthl").val(monthl);
$("#"+wj+"mdayl").val(dayl);
$("#"+wj+"mcurrently").val(currently);



var pins=\'<div id="\'+wj+\'joba" class="joba" onmouseover="$(\\\'#\'+wj+\'editjoba\\\').removeClass(\\\'editjoba\\\'); $(\\\'#\'+wj+\'editjoba\\\').addClass(\\\'editjobav\\\');" onmouseout="$(\\\'#\'+wj+\'editjoba\\\').removeClass(\\\'editjobav\\\'); $(\\\'#\'+wj+\'editjoba\\\').addClass(\\\'editjoba\\\');" style="cursor:pointer;display:block;margin:0;padding:6px;padding-top:4px;padding-right:4px;margin-top:5px;width:601px;position:relative;">\';

var ins=\'<div class="removeemployer" title="Remove employer" style="float:right;margin-left:9px;position:relative;top:1px;" onclick="removeemployer(\\\'\'+wj+\'\\\');"></div><div style="float:right;" class="editjoba" id="\'+wj+\'editjoba" onclick="editjob(\\\'\'+wj+\'\\\');">Edit</div><div style="display:inline-block;margin:0;padding:0;font-weight:bold;">\'+place+\'</div><div style="display:block;margin:0;padding:0;color:gray;"><span id="\'+wj+\'joba_position">\'+position+\'</span>\';

if((monthe!="-1") && (daye!="-1") && (yeare!="-1")){
ins+=\'<span id="\'+wj+\'joba_datese"> &#183; \'+month_s+\' \'+daye+\', \'+yeare+\'</span>\';
}
else if((monthe!="-1") && (yeare!="-1")){
ins+=\'<span id="\'+wj+\'joba_datese"> &#183; \'+month_s+\', \'+yeare+\'</span>\';	
}
else if(yeare!="-1"){
ins+=\'<span id="\'+wj+\'joba_datese"> &#183; \'+yeare+\'</span>\';	
}

if((monthl!="-1") && (dayl!="-1") && (yearl!="-1")){
ins+=\'<span id="\'+wj+\'joba_datesl"> to \'+month_e+\' \'+dayl+\', \'+yearl+\'</span>\';	
}
else if((monthl!="-1") && (yearl!="-1")){
ins+=\'<span id="\'+wj+\'joba_datesl"> to \'+month_e+\', \'+yearl+\'</span>\';	
}
else if(yearl!="-1"){
ins+=\'<span id="\'+wj+\'joba_datesl"> to \'+yearl+\'</span>\';	
}
else if(yeare!="-1"){
ins+=\'<span id="\'+wj+\'joba_datesl"> to present</span>\';		
}

ins+=\'</div><div style="display:block;margin:0;padding:0;">\'+description+\'</div>\';

var alreadye=$("#"+wj+"joba");
if($(alreadye).length>0){$("#"+wj+"joba").html(ins);}
else{
var ins=pins+ins+"</div>";	
	$("#jobsiw").prepend(ins);
}
$("#"+wj+"njobw").css("display","none");
$("#"+wj+"joba").css("display","block");
$(".joba").css("border-top","1px solid rgb(233,233,233)");
$(".joba:first").css("border-top","0");
	}
});

}
function canceladdjob(wj,v){
if(v==2){
	
var workedvv=$("#"+wj+"workedvv").val();	
var employerv=$("#employerv").val();

employerv=employerv.replace(","+workedvv,"");
$("#employerv").val(employerv);

var workedv=$("#"+wj+"workedv").val();
var employerv2=$("#employerv2").val();

employerv2=employerv2.replace(","+workedv,"");
$("#employerv2").val(employerv2);

$("#"+wj+"njobw").remove();

var tjobs=$("#tot_jobs").val();
tjobs=parseInt(tjobs);
tjobs=tjobs-1;
$("#tot_jobs").val(tjobs);
}
else{
insertreadyvals(wj);
}
}
</script>
<script type="text/javascript">
function swapccity(w,v,wj){
				$("#"+wj+"editpiw"+"_"+v).removeClass("editpivo");
				$("#"+wj+"editpiwv"+"_"+v).removeClass("editpivvo");
				$("#"+wj+v).removeClass("editpi2");
				$("#"+wj+v).addClass("editpi");
				$("#"+wj+"removeedit"+"_"+v).css("display","none");
				if(w==1){
				$("#"+wj+v).val("");
				}
				$("#"+wj+"statec"+"_"+v).val("");
				$("#"+wj+"countryc"+"_"+v).val("");
				$("#"+wj+"cityc"+"_"+v).val("");
				$("#"+wj+"stateedit"+"_"+v).val("2");
				$("#"+wj+v).focus();
}
function swapc(w,v,wj){
	if(v==2){var vv=2;}
	else{var vv="";}
				$("#"+wj+"editpiw"+vv).removeClass("editpivo");
				$("#"+wj+"editpiwv"+vv).removeClass("editpivvo");
				$("#"+wj+"job_title"+vv).removeClass("editpi2");
				$("#"+wj+"job_title"+vv).addClass("editpi");
				$("#"+wj+"removeedit"+vv).css("display","none");
				if(w==1){
				$("#"+wj+"job_title"+vv).val("");
				$("#"+wj+"job_titlev"+vv).val("");
				}
				$("#"+wj+"stateedit"+vv).val("2");
				$("#"+wj+"job_title"+vv).focus();
}
function dov(w,v,wj){
	if(v==2){var vv=2;}
	else{var vv="";}
var wv=$.trim(w);
var wvv=$("#"+wj+"job_titlev").val();

var stateedit=$("#"+wj+"stateedit").val();
if((stateedit=="1") && (wv!=wvv)){
if(v){swapc(2,2,wj);}
else{swapc(2,\'\',wj);}
}
}
function dovcity(w,v,wj){
var wv=$.trim(w);
var wvv=$("#"+wj+v+"v").val();
if((wv=="") || (wv.length<1)){$("#"+wj+v).removeClass("working");}
var stateedit=$("#"+wj+"stateedit"+"_"+v).val();
if((stateedit=="1") && (wv!=wvv)){
swapccity(2,v,wj);
}
}
</script>
<script type="text/javascript">
function currentlyw(wj){
var cnb=$("#"+wj+"currentlyworkhere:checked").val(); 
if(cnb===undefined){
$("#"+wj+"currentlyv2").css("display","inline-block");
$("#"+wj+"topresent").html("to");
}
else{	
$("#"+wj+"currentlyv2").css("display","none");
$("#"+wj+"topresent").html("to present.");
}		
}
</script>
<script type="text/javascript">
function addmonth(v,vv,r,wj){
var w=$("#"+wj+"addyears"+v+" option:selected").val();
if(r=="doit"){w=-2;}
if(w==="-1"){$("#"+wj+"addyears"+v).css("cursor","pointer");}
else if(w=="-2"){
$("#"+wj+"addyears"+v).css("cursor","pointer");
$(\'#\'+wj+\'addyears\'+v+\' option:contains("--")\').val(\'-1\');	
$(\'#\'+wj+\'addyears\'+v+\' option:contains("--")\').text(\'Year:\');
$("#"+wj+"addmonth"+v).css("display","none");
$("#"+wj+"addmonths"+v).css("opacity","0");
$("#"+wj+"addmonthv"+v).css("display","none");
$("#"+wj+"addday"+v).css("display","none");
$("#"+wj+"adddays"+v).css("opacity","0");
$("#"+wj+"adddayv"+v).css("display","none");
$(\'#\'+wj+\'addmonths\'+v+\' option:contains("--")\').val(\'-1\');	
$(\'#\'+wj+\'addmonths\'+v+\' option:contains("--")\').text(\'Month:\');
$("#"+wj+"addmonths"+v).val("Month:");
$("#"+wj+"addmonths"+v).css("cursor","pointer");
$(\'#\'+wj+\'adddays\'+v+\' option:contains("--")\').val(\'-1\');	
$(\'#\'+wj+\'adddays\'+v+\' option:contains("--")\').text(\'Day:\');
$("#"+wj+"adddays"+v).val("Day:");
$("#"+wj+"adddays"+v).css("cursor","pointer");

}
else{
$("#"+wj+"addyears"+v).css("cursor","default");
$(\'#\'+wj+\'addyears\'+v+\' option:contains("Year:")\').text(\'--\');
$(\'#\'+wj+\'addyears\'+v+\' option:contains("--")\').val(\'-2\');
var addmonth=$("#"+wj+"addmonths"+v).css("opacity");
if(addmonth!="1"){
	
$("#"+wj+"addmonthv"+v).css("display","inline-block");
$("#"+wj+"addmonth"+v).css("display","inline-block");	
$("#"+wj+"addmonths"+v).css("display","inline-block");

if(vv=="1"){
$("#"+wj+"topresent").css("left","-6px");	
}
}
}
}
function addday(v,vv,wj){
var w=$("#"+wj+"addmonths"+v+" option:selected").val();
if(w==="-1"){$("#"+wj+"addmonths"+v).css("cursor","pointer");}
else if(w=="-2"){
$("#"+wj+"addmonths"+v).css("cursor","pointer");
$(\'#\'+wj+\'addmonths\'+v+\' option:contains("--")\').val(\'-1\');	
$(\'#\'+wj+\'addmonths\'+v+\' option:contains("--")\').text(\'Month:\');
$(\'#\'+wj+\'adddays\'+v+\' option:contains("--")\').val(\'-1\');	
$(\'#\'+wj+\'adddays\'+v+\' option:contains("--")\').text(\'Day:\');
$("#"+wj+"addday"+v).css("display","none");
$("#"+wj+"adddays"+v).css("display","none");
$("#"+wj+"adddays"+v).css("opacity","0");
$("#"+wj+"adddayv"+v).css("display","none");
$("#"+wj+"adddays"+v).val("Day:");
$("#"+wj+"adddays"+v).css("cursor","pointer");
if(vv=="1"){
$("#"+wj+"topresent").css("left","-6px");	
}
}
else{
$("#"+wj+"addmonths"+v).css("cursor","default");
$(\'#\'+wj+\'addmonths\'+v+\' option:contains("Month:")\').text(\'--\');
$(\'#\'+wj+\'addmonths\'+v+\' option:contains("--")\').val(\'-2\');
var addday=$("#"+wj+"adddays"+v).css("opacity");
if(addday!="1"){
$("#"+wj+"adddayv"+v).css("display","inline-block");
$("#"+wj+"addday"+v).css("display","inline-block");
$("#"+wj+"adddays"+v).css("display","inline-block");
if(vv=="1"){
$("#"+wj+"topresent").css("left","6px");	
}
}
}
}
function checkcursor(v,wj){
var w=$("#"+wj+"adddays"+v+" option:selected").val();
if(w==="-1"){$("#"+wj+"adddays"+v).css("cursor","pointer");}
else if(w=="-2"){
$("#"+wj+"adddays"+v).css("cursor","pointer");
$(\'#\'+wj+\'adddays\'+v+\' option:contains("--")\').val(\'-1\');	
$(\'#\'+wj+\'adddays\'+v+\' option:contains("--")\').text(\'Day:\');
}
else{
$("#"+wj+"adddays"+v).css("cursor","default");
$(\'#\'+wj+\'adddays\'+v+\' option:contains("Day:")\').text(\'--\');
$(\'#\'+wj+\'adddays\'+v+\' option:contains("--")\').val(\'-2\');	
}
}
function adddayv(w,v,wj){
var dmin=$(\'#\'+wj+\'adddays\'+v+\' option:contains("--")\').val();
var dmonth=$("#"+wj+"addmonths"+v+" option:selected").val();
var dyear=$("#"+wj+"addyears"+v+" option:selected").val();
var dday=$("#"+wj+"adddays"+v+" option:selected").val();
$.ajax({
  async: false,
  type: "POST",
  url: "daysinmonth.php",
  data: { dmonth:dmonth,dyear:dyear },
  success: function(response) {
	  var extram="";
	  if(response==29){
	  var extram=\'<option value="29">29</option>\';
	  }
	  else if(response==30){
	  var extram=\'<option value="29">29</option><option value="30">30</option>\';		  
	  }
	  else if(response==31){
	  var extram=\'<option value="29">29</option><option value="30">30</option><option value="31">31</option>\';		  
	  }
	  if(dmin===undefined){var sdmin=\'<option value="-1">Day:</option>\';}
	  else{var sdmin=\'<option value="-2">--</option>\';}
$("#"+wj+\'adddays\'+v).html(sdmin+\'<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option>\'+extram);
if(w=="1"){

}
else{
	$("#"+wj+"adddays"+v).val(dday);
}
	}
});

	
}
'.$insertreadyvals.'
</script>
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="workedu";

if(!isset($psbid)){
$psbid="";	
}
$sbid=$psbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param="j";

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td>
</tr>';
?>