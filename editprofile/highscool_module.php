<?php
echo'
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>

<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;"><div style=position:relative;top:8px;margin:0;padding:0;">College/University:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">
<script type="text/javascript">
function collegei(v,vv){
if(vv=="Where did you go to college/university?"){
$("#"+v).val("");
$("#"+v).css("color","#333333");
}
}
function collegeiv(v,vv){
if(vv==""){
$("#"+v).val("Where did you go to college/university?");
$("#"+v).css("color","#777777");	
}
}
</script>
<input autocomplete="off" type="text" class="editpi" id="college" onfocus="collegei(this.id,this.value);" onblur="collegeiv(this.id,this.value);">
<input autocomplete="off" type="hidden" id="collegev">
<input autocomplete="off" type="hidden" id="collegev2">
<input autocomplete="off" type="hidden" id="attendedv">
<input autocomplete="off" type="hidden" id="attendedvv">
<script type="text/javascript">
$("#college").val("Where did you go to college/university?");
$("#college").css("color","#777777");
$("#collegev").val("");
$("#collegev2").val("");
function popnewuni(v,vv){
	var collegev=$("#collegev").val();
$("#collegev").val(","+vv+collegev);


	var collegev2=$("#collegev2").val();
$("#collegev2").val(","+v+collegev2);

$("#attendedv").val(v);
$("#attendedvv").val(vv);

insertandopennewu();
}
function strpos (haystack, needle, offset) {
   var i = (haystack + "").indexOf(needle, (offset || 0));
    return i === -1 ? false : i;
}
			$(function() {
		$( "#college" ).autocomplete({
			       source: function(request, response) {
                $.ajax({
                  url: \'autocomplete/college.php\',
                  dataType: "json",
                  data: {
                    term : request.term,
                    collegev : $("#collegev").val(),
					collegev2 : $("#collegev2").val()
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
						popnewuni(ui.item.value,ui.item.valuev);
						$("#college").val("Where did you go to college/university?");
						$("#college").css("color","#777777");
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
		function insertandopennewu(){
				var count=Math.random();
count=count.toString();
count=count.replace(".","");
count=count.replace(/0/gi,"");
var tunis=count;

var attendedv=$("#attendedv").val();
var attendedvv=$("#attendedvv").val();

$.ajax({
  async: false,
  type: "POST",
  url: "editprofile/new_uni.php",
  data: { tunis:tunis, attendedv:attendedv,attendedvv:attendedvv },
  success: function(response) {
$("#nunisw").prepend(response);
$("#"+tunis+"nuniw").css("display","block");
	}
});

}
</script>
<div style="display:block;margin:0;padding:0;" id="nunisw">
</div>
<div id="unisiw" style="display:block;margin:0;padding:0;">
</div>
<div id="sbidu" style="display:none;">';

$oj=0;
$insertreadyvals='';
$insertsbid='';
$position='';
$r=mysql_query("SELECT * FROM $uidwe WHERE type='c' ORDER BY datetimepe DESC");
while($m=mysql_fetch_array($r)){
$j=genRandomStringnum(16);
$position=$m['position']; //college or graduate school
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

echo'<input autocomplete="off" type="hidden" id="duni'.$j.'" value="'.$sbid.'">';

$tj=$j;

$attendedv=$m['place'];
		$valuev=strtolower($attendedv);
		$valuev=str_replace(" ","",$valuev);
		$valuev=preg_replace('/\W+/', '', $valuev);
$attendedvv=$valuev;

include("editprofile/new_uni.php");

$j=$tj;
$insertsbid.='$("#duni'.$j.'").val("'.$sbid.'");';

echo'
<script type="text/javascript">
$("#nunisw").append($("#'.$tj.'nuniw"));

</script>
<script type="text/javascript">
$("#'.$j.'uni_titlev").val("'.$position.'");
$("#'.$j.'uni_description").val("'.$description.'");
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

$("#'.$j.'mposition").val("'.$position.'");
$("#'.$j.'mdescription").val("'.$description.'");
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

$insertreadyvals.='insertreadyvalsu(\''.$j.'\');';

$oj++;
}
echo'</div>';
$oj--;


echo'

<input autocomplete="off" type="hidden" id="tot_unis">
<script type="text/javascript">
'.$insertsbid.'
$("#tot_unis").val("'.$oj.'");
function edituni(wj){
insertreadyvalsu(wj);

var dife=\'<label class="savecedit" onclick="adduni(\\\'\'+wj+\'\\\',1);" style="padding:1px 4px;"><input autocomplete="off" type="button" class="savecedit2" value="Save Changes"></label><label class="cancelcedit" onclick="canceladduni(\\\'\'+wj+\'\\\',1);" style="padding:1px 4px;"><input autocomplete="off" type="button" class="cancelcedit2" value="Cancel"></label>\';
$("#"+wj+"collegebtw").html(dife);
$("#"+wj+"unia").after($("#"+wj+"nuniw"));
$("#"+wj+"nuniw").css("display","block");
$("#"+wj+"unia").css("display","none");	
}

function removecollege(wj){
	
var sbid=$("#duni"+wj).val();

$.ajax({
  async: false,
  type: "POST",
  url: "editprofile/remove_uni.php",
  data: { sbid:sbid },
  success: function(response) {
$("#"+wj+"unia").remove();
$("#"+wj+"nuniw").remove();
$("#duni"+wj).remove();
var tunis=$("#tot_unis").val();
tunis=parseInt(tunis);
tunis=tunis-1;
$("#tot_unis").val(tunis);
$(".unia").css("border-top","1px solid rgb(233,233,233)");
$(".unia:first").css("border-top","0");
	}
});

}

function traspassv(wj){
var cnb=$("#"+wj+"position_college:checked").val();
if(cnb===undefined){
$("#"+wj+"uni_titlev").val("2");
}
else{
$("#"+wj+"uni_titlev").val("1");	
}
}


function insertreadyvalsu(wj){
var position=$("#"+wj+"mposition").val();



if(position==1){
$("#"+wj+"position_college").attr("checked","checked");	
}
else{
$("#"+wj+"position_gradschool").attr("checked","checked");		
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
$("#"+wj+"uni_description").val(description);

var yearsubstr="";
var placev=place;

if((currently=="2") && (yearl!="-1")){
var yearsubstr=yearl.substr(2,2)
var placev=place+" \'"+yearsubstr;
}




var pins=\'<div id="\'+wj+\'unia" class="unia" onmouseover="$(\\\'#\'+wj+\'editunia\\\').removeClass(\\\'editunia\\\'); $(\\\'#\'+wj+\'editunia\\\').addClass(\\\'edituniav\\\');" onmouseout="$(\\\'#\'+wj+\'editunia\\\').removeClass(\\\'edituniav\\\'); $(\\\'#\'+wj+\'editunia\\\').addClass(\\\'editunia\\\');" style="cursor:pointer;display:block;margin:0;padding:6px;padding-top:4px;padding-right:4px;margin-top:5px;width:601px;position:relative;">\';

var ins=\'<div class="removecollege" title="Remove college" style="float:right;margin-left:9px;position:relative;top:1px;" onclick="removecollege(\\\'\'+wj+\'\\\');"></div><div style="float:right;" class="editunia" id="\'+wj+\'editunia" onclick="edituni(\\\'\'+wj+\'\\\');">Edit</div><div style="display:inline-block;margin:0;padding:0;font-weight:bold;">\'+placev+\'</div>\';


ins+=\'<div style="display:block;margin:0;padding:0;">\'+description+\'</div>\';

var alreadye=document.getElementById(wj+"unia");
if(alreadye){$("#"+wj+"unia").html(ins);}
else{
var ins=pins+ins+"</div>";	
	$("#unisiw").append(ins);
}
$("#"+wj+"nuniw").css("display","none");
$("#"+wj+"unia").css("display","block");
$(".unia").css("border-top","1px solid rgb(233,233,233)");
$(".unia:first").css("border-top","0");
}





function adduni(wj,saveoradd){
var place=$("#"+wj+"attended").html();

var position=$("#"+wj+"uni_titlev").val();

var description=$("#"+wj+"uni_description").val();
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
var type="c";

var tunis=$("#tot_unis").val();

tunis=parseInt(tunis);

var exig=document.getElementById("duni"+wj);
if(exig){
var sbid=$("#duni"+wj).val();
}
else{
var sbid="";	
}



$.ajax({
  async: false,
  type: "POST",
  url: "editprofile/adduni.php",
  data: { place:place,position:position,description:description,yeare:yeare,monthe:monthe,daye:daye,yearl:yearl,monthl:monthl,dayl:dayl,currently:currently,type:type,sbid:sbid },
  success: function(response) {
var res=response.split("{}");
var norold=res[0];

if(norold==2){
var sbid=res[1];
$(\'#sbidu\').append(\'<input autocomplete="off" type="hidden" id="duni\'+wj+\'" value="\'+sbid+\'">\');
}
var month_s=res[2];
var month_e=res[3];

$("#"+wj+"mmonth_e").val(month_e);
$("#"+wj+"mmonth_s").val(month_s);


$("#"+wj+"mplace").val(place);
$("#"+wj+"mposition").val(position);
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

var pins=\'<div id="\'+wj+\'unia" class="unia" onmouseover="$(\\\'#\'+wj+\'editunia\\\').removeClass(\\\'editunia\\\'); $(\\\'#\'+wj+\'editunia\\\').addClass(\\\'edituniav\\\');" onmouseout="$(\\\'#\'+wj+\'editunia\\\').removeClass(\\\'edituniav\\\'); $(\\\'#\'+wj+\'editunia\\\').addClass(\\\'editunia\\\');" style="cursor:pointer;display:block;margin:0;padding:6px;padding-top:4px;padding-right:4px;margin-top:5px;width:601px;position:relative;">\';

var ins=\'<div class="removecollege" title="Remove college" style="float:right;margin-left:9px;position:relative;top:1px;" onclick="removecollege(\\\'\'+wj+\'\\\');"></div><div style="float:right;" class="editunia" id="\'+wj+\'editunia" onclick="edituni(\\\'\'+wj+\'\\\');">Edit</div><div style="display:inline-block;margin:0;padding:0;font-weight:bold;">\'+placev+\'</div>\';


ins+=\'<div style="display:block;margin:0;padding:0;">\'+description+\'</div>\';

var alreadye=document.getElementById(wj+"unia");
if(alreadye){$("#"+wj+"unia").html(ins);}
else{
var ins=pins+ins+"</div>";	
	$("#unisiw").prepend(ins);
}
$("#"+wj+"nuniw").css("display","none");
$("#"+wj+"unia").css("display","block");
$(".unia").css("border-top","1px solid rgb(233,233,233)");
$(".unia:first").css("border-top","0");
	}
});

}


function canceladduni(wj,v){
if(v==2){
	
var attendedvv=$("#"+wj+"attendedvv").val();	
var collegev=$("#collegev").val();

collegev=collegev.replace(","+attendedvv,"");
$("#collegev").val(collegev);

var attendedv=$("#"+wj+"attendedv").val();
var collegev2=$("#collegev2").val();

collegev2=collegev2.replace(","+attendedv,"");
$("#collegev2").val(collegev2);

$("#"+wj+"nuniw").remove();

var tunis=$("#tot_unis").val();
tunis=parseInt(tunis);
tunis=tunis-1;
$("#tot_unis").val(tunis);

}
else{
insertreadyvalsu(wj);
}
}
</script>
<script type="text/javascript">
'.$insertreadyvals.'
</script>
</td>
<td class="edittd" style="width:320px;"><div class="editpr" style="display:inline-block;margin-left:6px;position:relative;bottom:-2px;"><div class="editprv"><a class="editpra" href="#" onclick="return false;"><i class="mundito" style="margin-right:6px;position:relative;left:-6px;"></i></a></div></div></td>
</tr>';
?>