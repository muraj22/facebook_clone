<?php
$echo.='
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>

<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;"><div style=position:relative;top:8px;margin:0;padding:0;">High School:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">
<input autocomplete="off" type="text" class="editpi dcphmgc" id="highschool" placeholder="Where did you go to high school?">
<input autocomplete="off" type="hidden" id="highschoolv">
<input autocomplete="off" type="hidden" id="highschoolv2">
<input autocomplete="off" type="hidden" id="attendedhsv">
<input autocomplete="off" type="hidden" id="attendedhsvv">
<div class="highschool_ac"></div>
<script type="text/javascript">
$("#highschoolv").val("");
$("#highschoolv2").val("");
function popnewhs(v,vv){
	var highschoolv=$("#highschoolv").val();
$("#highschoolv").val(","+vv+highschoolv);


	var highschoolv2=$("#highschoolv2").val();
$("#highschoolv2").val(","+v+highschoolv2);

$("#attendedhsv").val(v);
$("#attendedhsvv").val(vv);

insertandopennewh();
}
function strpos (haystack, needle, offset) {
   var i = (haystack + "").indexOf(needle, (offset || 0));
    return i === -1 ? false : i;
}
			$(function() {
		$( "#highschool" ).autocomplete({
			appendTo:".highschool_ac",
			open:function(event,ui){
				var dac=$(".highschool_ac").children(".ui-autocomplete");
				$(dac).addClass("fwn");
			},
			       source: function(request, response) {
                $.ajax({
                  url: \'autocomplete/highschool.php\',
                  dataType: "json",
                  data: {
                    term : request.term,
                    highschoolv : $("#highschoolv").val(),
					highschoolv2 : $("#highschoolv2").val()
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
						popnewhs(ui.item.value,ui.item.valuev);
						return false;					
			}
		})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li style=\\"cursor:pointer;padding:0;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif!important;\\"></li>" )
				.data( "ui-autocomplete-item", item )
				.append( \'<a>\'+item.value + \'</a>\' )
				.appendTo( ul );
			
			};
	});
		function insertandopennewh(){
$("#highschool").attr("disabled",true);
$("#highschool").css("background","#ECECEC");

				var count=Math.random();
count=count.toString();
count=count.replace(".","");
count=count.replace(/0/gi,"");
var thss=count;

var attendedhsv=$("#attendedhsv").val();
var attendedhsvv=$("#attendedhsvv").val();

$.ajax({
  async: false,
  type: "POST",
  url: "editprofile/new_hs.php",
  data: { thss:thss, attendedhsv:attendedhsv,attendedhsvv:attendedhsvv },
  success: function(response) {
$("#highschool").attr("disabled",false);
$("#highschool").css("background","#ffffff");
$("#highschool").val("Where did you go to high school?");
$("#highschool").blur();
$("#nhssw").prepend(response);
$("#"+thss+"nhsw").css("display","block");
	}
});

}
</script>
<div style="display:block;margin:0;padding:0;" id="nhssw">
</div>
<div id="hssiw" style="display:block;margin:0;padding:0;">
</div>
<div id="sbidu" style="display:none;">';

$oj=0;
$insertreadyvals='';
$insertsbid='';
$position='';
$cityc='';
$statec='';
$countryc='';
$r=mysql_query("SELECT * FROM workedu WHERE id='$uid' AND type='h' AND visibility='v' ORDER BY datetimepe DESC");

while($m=mysql_fetch_array($r)){

$j=genRandomStringnum(16);
$cityc=$m['cityc'];
$statec=$m['statec'];
$countryc=$m['countryc'];
$description=$m['description'];
$currently=$m['currently'];
$yeare=$m['yeare'];
$monthe=$m['monthe'];
$daye=$m['daye'];
$yearl=$m['yearl'];
$monthl=$m['monthl'];
$place=$m['place'];
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
$echo.='<input autocomplete="off" type="hidden" id="dhs'.$j.'" value="'.$sbid.'">';
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
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$tj=$j;

$attendedhsv=$m['place'];
		$valuev=strtolower($attendedhsv);
		$valuev=str_replace(" ","",$valuev);
		$valuev=preg_replace('/\W+/', '', $valuev);
$attendedhsvv=$valuev;

include("editprofile/new_hs.php");

$j=$tj;
$insertsbid.='$("#dhs'.$j.'").val("'.$sbid.'");';

$echo.='
<script type="text/javascript">
$("#nhssw").append($("#'.$tj.'nhsw"));

</script>
<script type="text/javascript">
$("#'.$j.'cityc_city_hs").val("'.$cityc.'");
$("#'.$j.'statec_city_hs").val("'.$statec.'");
$("#'.$j.'countryc_city_hs").val("'.$countryc.'");';
if($description==""){
$echo.='
$("#'.$j.'hs_description").val("'.$description.'");
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
$("#'.$j.'mlongcity").val("'.$v.'");

$("#'.$j.'mcityc").val("'.$cityc.'");
$("#'.$j.'mstatec").val("'.$statec.'");
$("#'.$j.'mcountryc").val("'.$countryc.'");


$("#'.$j.'mplace").val("'.$place.'");
$("#'.$j.'mcurrently").val("'.$currently.'");
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

$insertreadyvals.='insertreadyvalsh(\''.$j.'\');';

$oj++;
}
$echo.='</div>';
$oj--;


$echo.='

<input autocomplete="off" type="hidden" id="tot_hss">
<script type="text/javascript">
'.$insertsbid.'
$("#tot_hss").val("'.$oj.'");
function ediths(wj){
insertreadyvalsh(wj);

var dife=\'<label class="savecedit" onclick="addhs(\\\'\'+wj+\'\\\',1);" style="padding:1px 4px;"><input autocomplete="off" type="button" class="savecedit2" value="Save Changes"></label><label class="cancelcedit" onclick="canceladdhs(\\\'\'+wj+\'\\\',1);" style="padding:1px 4px;"><input autocomplete="off" type="button" class="cancelcedit2" value="Cancel"></label>\';
$("#"+wj+"highschoolbtw").html(dife);
$("#"+wj+"hsa").after($("#"+wj+"nhsw"));
$("#"+wj+"nhsw").css("display","block");
$("#"+wj+"hsa").css("display","none");	
autoGrowField_nj(wj+"hs_description",250);
}

function removehighschool(wj){
	$("#delwhatre").html("School?");
	$("#delwhat2re").html("school");
	
$(\'#div_dialog_footervo2re\').html(\'<label class="fsl uiButton uiButtonConfirm mrs" style="position:absolute;right:86px;" onclick="rremovehighschool(\\\'\'+wj+\'\\\');"><input autocomplete="off" type="button" value="Confirm" class="uiButtonText"></label><label class="fsl uiButton" onclick="cancel_removere();" style="position:absolute;right:22px;"><input autocomplete="off" type="button" value="Cancel" class="uiButtonText"></label>\');
	
$("#pre_pop_container2ore").css("display","block");

}

	
function rremovehighschool(wj){
	$("#pre_pop_container2ore").fadeOut("slow");	
var sbid=$("#dhs"+wj).val();

$.ajax({
  async: false,
  type: "POST",
  url: "editprofile/remove_hs.php",
  data: { sbid:sbid },
  success: function(response) {
	  
var attendedhsv=$("#"+wj+"attendedhsv").val();
var attendedhsvv=$("#"+wj+"attendedhsvv").val();

var highschoolv=$("#highschoolv").val();
highschoolv=highschoolv.replace(","+attendedhsvv,"");

var highschoolv2=$("#highschoolv2").val();
highschoolv2=highschoolv2.replace(","+attendedhsv,"");

$("#highschoolv").val(highschoolv);
$("#highschoolv2").val(highschoolv2);

$("#"+wj+"hsa").remove();
$("#"+wj+"nhsw").remove();
$("#dhs"+wj).remove();
var thss=$("#tot_hss").val();
thss=parseInt(thss);
thss=thss-1;
$("#tot_hss").val(thss);
$(".hsa").css("border-top","1px solid rgb(233,233,233)");
$(".hsa:first").css("border-top","0");
	}
});

}


function insertreadyvalsh(wj){
	
var cityc=$("#"+wj+"mcityc").val();
var statec=$("#"+wj+"mstatec").val();
var countryc=$("#"+wj+"mcountryc").val();
var cityv=$("#"+wj+"mlongcity").val();
if(cityc!=""){
				$("#"+wj+"editpiw_city_hs").addClass("editpivo");
				$("#"+wj+"editpiwv_city_hs").addClass("editpivvo");
				$("#"+wj+"city_hs").removeClass("editpi");
				$("#"+wj+"city_hs").addClass("editpi2");
				$("#"+wj+"removeedit_city_hs").css("display","block");
				$("#"+wj+"stateedit_city_hs").val("1");
				$("#"+wj+"city_hs").val(cityv);
				$("#"+wj+"city_hsv").val(cityv);
				$("#"+wj+"statec_city_hs").val(statec);
				$("#"+wj+"countryc_city_hs").val(countryc);
				$("#"+wj+"cityc_city_hs").val(cityc);	
}

var currently=$("#"+wj+"mcurrently").val();

$(\'#\'+wj+\'addyears option:contains("--")\').val(\'-1\');	
$(\'#\'+wj+\'addyears option:contains("--")\').text(\'Year:\');

$("#"+wj+"addyear").css("display","inline-block");
$("#"+wj+"addyears").css("opacity","0");
$(\'#\'+wj+\'addyears\').css(\'left\',\'8px\'); $(\'#\'+wj+\'addyears\').css(\'margin-right\',\'0px\'); 

$("#"+wj+"addyears").css("cursor","pointer");

if(currently=="2"){$("#"+wj+"graduated").attr("checked","checked");}
else{$("#"+wj+"graduated").removeAttr("checked");}
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



	$("#"+wj+"currentlyv2").css("display","inline-block");
$("#"+wj+"topresent").html("to");	
	

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



var month_s=$("#"+wj+"mmonth_s").val();
var month_e=$("#"+wj+"mmonth_e").val();
var place=$("#"+wj+"mplace").val();
var description=$("#"+wj+"mdescription").val();
$("#"+wj+"hs_description").val(description);

var yearsubstr="";
var placev=place;

if((currently=="2") && (yearl!="-1")){
var yearsubstr=yearl.substr(2,2)
var placev=place+" \'"+yearsubstr;
}




var pins=\'<div id="\'+wj+\'hsa" class="hsa" onmouseover="$(\\\'#\'+wj+\'edithsa\\\').removeClass(\\\'edithsa\\\'); $(\\\'#\'+wj+\'edithsa\\\').addClass(\\\'edithsav\\\');" onmouseout="$(\\\'#\'+wj+\'edithsa\\\').removeClass(\\\'edithsav\\\'); $(\\\'#\'+wj+\'edithsa\\\').addClass(\\\'edithsa\\\');" style="cursor:pointer;display:block;margin:0;padding:6px;padding-top:4px;padding-right:4px;margin-top:5px;width:601px;position:relative;">\';

var ins=\'<div class="removehighschool" title="Remove highschool" style="float:right;margin-left:9px;position:relative;top:1px;" onclick="removehighschool(\\\'\'+wj+\'\\\');"></div><div style="float:right;" class="edithsa" id="\'+wj+\'edithsa" onclick="ediths(\\\'\'+wj+\'\\\');">Edit</div><div style="display:inline-block;margin:0;padding:0;font-weight:bold;">\'+placev+\'</div>\';


ins+=\'<div style="display:block;margin:0;padding:0;">\'+description+\'</div>\';

var alreadye=document.getElementById(wj+"hsa");
if(alreadye){$("#"+wj+"hsa").html(ins);}
else{
var ins=pins+ins+"</div>";	
	$("#hssiw").append(ins);
}
$("#"+wj+"nhsw").css("display","none");
$("#"+wj+"hsa").css("display","block");
$(".hsa").css("border-top","1px solid rgb(233,233,233)");
$(".hsa:first").css("border-top","0");
}





function addhs(wj,saveoradd){
var place=$("#"+wj+"attendedhs").html();

var cityc=$("#"+wj+"cityc_city_hs").val();
var statec=$("#"+wj+"statec_city_hs").val();
var countryc=$("#"+wj+"countryc_city_hs").val();

var description=$("#"+wj+"hs_description").val();
var yeare=$("#"+wj+"addyears").val();
var monthe=$("#"+wj+"addmonths").val();

var daye=$("#"+wj+"adddays").val();
if(daye===null){daye=-1;}
var yearl=$("#"+wj+"addyears2").val();
var monthl=$("#"+wj+"addmonths2").val();
var dayl=$("#"+wj+"adddays2").val();
if(dayl===null){dayl=-1;}
var cnb=$("#"+wj+"graduated:checked").val(); 
if(cnb===undefined){
var currently=1;
}
else{
var currently=2;
}
var type="h";

var thss=$("#tot_hss").val();

thss=parseInt(thss);

var exig=document.getElementById("dhs"+wj);
if(exig){
var sbid=$("#dhs"+wj).val();
}
else{
var sbid="";	
}

var longcity=$("#"+wj+"city_hs").val();

$.ajax({
  async: false,
  type: "POST",
  url: "editprofile/addhs.php",
  data: { cityc:cityc,statec:statec,countryc:countryc,place:place,description:description,yeare:yeare,monthe:monthe,daye:daye,yearl:yearl,monthl:monthl,dayl:dayl,currently:currently,type:type,sbid:sbid },
  success: function(response) {
var res=response.split("{}");
var norold=res[0];

if(norold==2){
var sbid=res[1];
$(\'#sbidu\').append(\'<input autocomplete="off" type="hidden" id="dhs\'+wj+\'" value="\'+sbid+\'">\');
}
var month_s=res[2];
var month_e=res[3];

$("#"+wj+"mmonth_e").val(month_e);
$("#"+wj+"mmonth_s").val(month_s);

$("#"+wj+"longcity").val(longcity);
$("#"+wj+"mlongcity").val(longcity);

$("#"+wj+"mcityc").val(cityc);
$("#"+wj+"mstatec").val(statec);
$("#"+wj+"mcountryc").val(countryc);

$("#"+wj+"mplace").val(place);
$("#"+wj+"mdescription").val(description);
$("#"+wj+"myeare").val(yeare);
$("#"+wj+"mmonthe").val(monthe);
$("#"+wj+"mdaye").val(daye);
$("#"+wj+"myearl").val(yearl);

$("#"+wj+"mmonthl").val(monthl);
$("#"+wj+"mdayl").val(dayl);
$("#"+wj+"mcurrently").val(currently);

var yearsubstr="";
var placev=place;

if((currently=="2") && (yearl!="-1")){
var yearsubstr=yearl.substr(2,2)
var placev=place+" \'"+yearsubstr;
}

var pins=\'<div id="\'+wj+\'hsa" class="hsa" onmouseover="$(\\\'#\'+wj+\'edithsa\\\').removeClass(\\\'edithsa\\\'); $(\\\'#\'+wj+\'edithsa\\\').addClass(\\\'edithsav\\\');" onmouseout="$(\\\'#\'+wj+\'edithsa\\\').removeClass(\\\'edithsav\\\'); $(\\\'#\'+wj+\'edithsa\\\').addClass(\\\'edithsa\\\');" style="cursor:pointer;display:block;margin:0;padding:6px;padding-top:4px;padding-right:4px;margin-top:5px;width:601px;position:relative;">\';

var ins=\'<div class="removehighschool" title="Remove highschool" style="float:right;margin-left:9px;position:relative;top:1px;" onclick="removehighschool(\\\'\'+wj+\'\\\');"></div><div style="float:right;" class="edithsa" id="\'+wj+\'edithsa" onclick="ediths(\\\'\'+wj+\'\\\');">Edit</div><div style="display:inline-block;margin:0;padding:0;font-weight:bold;">\'+placev+\'</div>\';


ins+=\'<div style="display:block;margin:0;padding:0;">\'+description+\'</div>\';

var alreadye=document.getElementById(wj+"hsa");
if(alreadye){$("#"+wj+"hsa").html(ins);}
else{
var ins=pins+ins+"</div>";	
	$("#hssiw").prepend(ins);
}
$("#"+wj+"nhsw").css("display","none");
$("#"+wj+"hsa").css("display","block");
$(".hsa").css("border-top","1px solid rgb(233,233,233)");
$(".hsa:first").css("border-top","0");
	}
});

}


function canceladdhs(wj,v){
if(v==2){
	
var attendedhsvv=$("#"+wj+"attendedhsvv").val();	
var highschoolv=$("#highschoolv").val();

highschoolv=highschoolv.replace(","+attendedhsvv,"");
$("#highschoolv").val(highschoolv);

var attendedhsv=$("#"+wj+"attendedhsv").val();
var highschoolv2=$("#highschoolv2").val();

highschoolv2=highschoolv2.replace(","+attendedhsv,"");
$("#highschoolv2").val(highschoolv2);

$("#"+wj+"nhsw").remove();

var thss=$("#tot_hss").val();
thss=parseInt(thss);
thss=thss-1;
$("#tot_hss").val(thss);

}
else{
insertreadyvalsh(wj);
}
}
</script>
<script type="text/javascript">
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

$extra_param="h";

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td></tr>';
?>