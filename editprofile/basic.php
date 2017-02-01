<?php
$echo.='
<script type="text/javascript">
function swapc(w,v){
	if(v){var vv=2;}
	else{var vv="";}
				$("#editpiw"+vv).removeClass("editpiv");
				$("#editpiwv"+vv).removeClass("editpivv");
				$("#city"+vv).removeClass("editpi2");
				$("#city"+vv).addClass("editpi"); 
				$("#removeedit"+vv).css("display","none");
				if(w==1){
				$("#city"+vv).val("");
				}
				$("#statec"+vv).val("");
				$("#countryc"+vv).val("");
				$("#cityc"+vv).val("");
				$("#stateedit"+vv).val("2");
				$("#city"+vv).focus();
}
</script>
<script type="text/javascript">
function dov(w,v){
	if(v){var vv=2;} 
	else{var vv="";}
var wv=$.trim(w);
var wvv=$("#cityv"+vv).val();
if(wv=="" || wv.length<3){$("#city"+vv).removeClass("working");}
var stateedit=$("#stateedit"+vv).val();
if(stateedit=="1" && wv!=wvv){
if(v){swapc(2,2);}
else{swapc(2);}
}

}
</script>
<script type="text/javascript">
$("#linksedit1").removeClass("linkseditv");
$("#linksedit1").addClass("linksedit");
</script>
<div class="contentm" style="min-height:477px;height:auto;">
<table cellspacing="0" cellpadding="0" class="contentmt">
<tr>
<th class="contentmtv" style="text-align:right;padding-right:11px;">Current City:</th>
<td style="padding-top:5px;"><div id="editpiw" style="margin:0;padding:0;display:inline-block;">
<div id="editpiwv" style="margin:0;padding:0;display:inline-block;">
<input autocomplete="off" class="editpi" id="city" onkeyup="dov(this.value);">
<label id="removeedit" class="removeedit" style="display:none;" title="Remove" onclick="swapc(1);"><input autocomplete="off" type="button" class="removeedit2" style="padding:0;cursor:pointer;"></label>
</div>
</div>
<input autocomplete="off" type="hidden" id="statec">
<input autocomplete="off" type="hidden" id="countryc">
<input autocomplete="off" type="hidden" id="cityc">
<input autocomplete="off" type="hidden" id="stateedit">
<input autocomplete="off" type="hidden" id="cityv">';

$statec="";
$countryc="";
$cityc="";
$v="";

$result=mysql_query("SELECT * FROM living WHERE id='$uid' AND type='current_city' AND (visibility='v' OR visibility='h')");
while($ms=mysql_fetch_array($result)){
$sbid=$ms['sbid'];
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
$v=$cityc.', '.$staten.', '.$countryn;
}
unset($f);}
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$echo.='
<script type="text/javascript">';
if($v!=""){
$echo.='
				$("#editpiw").addClass("editpiv");
				$("#editpiwv").addClass("editpivv");
				$("#city").removeClass("editpi");
				$("#city").addClass("editpi2");
				$("#removeedit").css("display","block");
				$("#stateedit").val("1");
';	
}
$echo.='

$("#city").val("'.$v.'");
$("#cityv").val("'.$v.'");
$("#statec").val("'.$statec.'");
$("#countryc").val("'.$countryc.'");
$("#cityc").val("'.$cityc.'");


			$(function() {
		$("#city").autocomplete({
			minLength: 1,
			autoFocus: true,
			appendTo:"#editpiwv",
			search:function(){$(this).addClass("working");},
			open:function(){$(this).removeClass("working"); var where=$("#editpiwv").find(".ui-autocomplete"); var width=$(this).innerWidth()-1; $(where).css("width",width);},
			source: "autocomplete/cities.php",
			focus: function(event,ui){
				return false;
			},
			select: function( event, ui ) {
				var as=ui.item.value;
	
				$("#editpiw").addClass("editpiv");
	
				$("#editpiwv").addClass("editpivv");
				$("#city").removeClass("editpi");
				$("#city").addClass("editpi2");
				$("#removeedit").css("display","block");
				$("#stateedit").val("1");
				$( "#city" ).val(as);
				$( "#cityv" ).val(as);
				$("#statec").val(ui.item.statec);
				$("#countryc").val(ui.item.countryc);
				$("#cityc").val(ui.item.city);
				$(this).removeClass("working");
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
</script>
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="living";

if(!isset($psbid)){
$psbid="";	
}
$sbid=$psbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param="current_city";

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td>
</tr>
<tr>
<th class="contentmtv" style="text-align:right;padding-right:11px;">Hometown:</th>
<td style="padding-top:5px;"><div id="editpiw2" style="margin:0;padding:0;display:inline-block;">
<div id="editpiwv2" style="margin:0;padding:0;display:inline-block;">
<input autocomplete="off" class="editpi" id="city2" onkeyup="dov(this.value,2);">
<label id="removeedit2" class="removeedit" style="display:none;" title="Remove" onclick="swapc(1,2);"><input autocomplete="off" type="button" class="removeedit2" style="padding:0;cursor:pointer;"></label>
</div>
</div>
<input autocomplete="off" type="hidden" id="statec2">
<input autocomplete="off" type="hidden" id="countryc2">
<input autocomplete="off" type="hidden" id="cityc2">
<input autocomplete="off" type="hidden" id="stateedit2">
<input autocomplete="off" type="hidden" id="cityv2">';
$statec="";
$countryc="";
$cityc="";
$v="";

$result=mysql_query("SELECT * FROM living WHERE id='$uid' AND type='hometown' AND (visibility='v' OR visibility='h')");
while($ms=mysql_fetch_array($result)){
$sbid=$ms['sbid'];
$statec=$ms['statec'];
$countryc=$ms['countryc'];
$cityc=$ms['cityc'];
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
$v=$cityc.', '.$staten.', '.$countryn;
}
unset($f);}
$con=mysql_connect("localhost","root","xd22xd22");
 mysql_select_db("registered");
$echo.='
<script type="text/javascript">';
if($v!=""){
$echo.='
				$("#editpiw2").addClass("editpiv");
				$("#editpiwv2").addClass("editpivv");
				$("#city2").removeClass("editpi");
				$("#city2").addClass("editpi2");
				$("#removeedit2").css("display","block");
				$("#stateedit2").val("1");
';	
}
$echo.='
$("#city2").val("'.$v.'");
$("#cityv2").val("'.$v.'");
$("#statec2").val("'.$statec.'");
$("#countryc2").val("'.$countryc.'");
$("#cityc2").val("'.$cityc.'");
			$(function() {
		$( "#city2" ).autocomplete({
			minLength: 1,
			autoFocus: true,
			appendTo:"#editpiwv2",
			search:function(){$(this).addClass("working");},
			open:function(){$(this).removeClass("working"); var where=$("#editpiwv").find(".ui-autocomplete"); var width=$(this).innerWidth()-1; $(where).css("width",width);},
			source: "autocomplete/cities.php",
			focus: function(event,ui){
				return false;
			},
			select: function( event, ui ) {
				var as=ui.item.value; 
				$("#editpiw2").addClass("editpiv");
				$("#editpiwv2").addClass("editpivv");
				$("#city2").removeClass("editpi");
				$("#city2").removeClass("working");
				$("#city2").addClass("editpi2");
				$("#removeedit2").css("display","block");
				$("#stateedit2").val("1");
				$( "#city2" ).val(as);
				$( "#cityv2" ).val(as);
				$("#statec2").val(ui.item.statec);
				$("#countryc2").val(ui.item.countryc);
				$("#cityc2").val(ui.item.city);
				$(this).removeClass("working");
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
</script>
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="living";

if(!isset($psbid)){
$psbid="";	
}
$sbid=$psbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

$extra_param="hometown";

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr class="hrs">
</td>
</tr>
<tr>
<th class="contentmtv" style="text-align:right;padding-right:11px;padding-top:8px;">I Am:</th>
<td style="padding-top:5px;">
<select class="selectedit" id="gender">';
$result=mysql_query("SELECT gender FROM registered WHERE id='$uid'");
while($ms=mysql_fetch_array($result)){
	foreach($ms as $k => $v){
${$k}=$v;
	}
}
$echo.='
<option value="2">Male</option>
<option value="1">Female</option>
</select>
<script type="text/javascript">
$("#gender").val("'.$gender.'");
</script>
</td>
<td class="edittd"></td>
</tr>
<tr>
<th></th>
<td style="padding-top:8px;">
<input autocomplete="off" type="checkbox" id="showsex" name="showsex" style="margin:0;padding:0;">
<label for="showsex" style="margin-left:0px;cursor:pointer;position:relative;top:-2px;">Show my sex in my profile</label>';
$r=mysql_query("SELECT * FROM optionsv WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$showsex=$m['showsex'];	
}
$echo.='
<script type="text/javascript">';
if($showsex=="1"){
$echo.='
$("#showsex").removeAttr("checked");
';
}
else{
$echo.='
$("#showsex").attr("checked", "checked");
';
}
$echo.='
</script>
</td>
<td class="edittd"></td>
</td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr class="hrs">
</td>
</tr>
<tr>
<th class="contentmtv" style="text-align:right;padding-right:11px;">Birthday:</th>
<td style="padding-top:5px;">
<script type="text/javascript">
function update_dates(){
var dday=$("#dayedit option:selected").val();
var dmonth=$("#monthedit option:selected").val();
var dyear=$("#yearedit option:selected").val();
var myval=$("#monthedit option:selected").text();
var myval2=$("#dayedit option:selected").val();
if(myval=="Feb"){
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
document.getElementById(\'dayedit\').innerHTML=\'<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option>\'+extram;
	}
});
}
else if((myval=="Jan") || (myval=="Mar") || (myval=="May") || (myval=="Jul") || (myval=="Aug") || (myval=="Oct") || (myval=="Dec")){
document.getElementById(\'dayedit\').innerHTML=\'<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>\';
}
else{
document.getElementById(\'dayedit\').innerHTML=\'<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option>\';
}
$("#dayedit option[value=\'"+myval2+"\']").attr("selected", "selected");

$.ajax({
  async: "false",
  type: "POST",
  url: "confirmbirthdayc.php",
  data: { dday:dday,dmonth:dmonth,dyear:dyear },
  success: function(response) {
$("#confirmation_age").html(response);
$("#birthday_confirmv").css("display","block");
	}
});

}
</script>
<div style="display:block;margin:0;padding:0;">
<select class="selectedit" id="monthedit" onchange="update_dates();">';
$result=mysql_query("SELECT * FROM registered WHERE id='$uid'");
while($ms=mysql_fetch_array($result)){
$day=$ms['day'];
$month=$ms['month'];
$year=$ms['year'];
$totdays = date("t",strtotime($year.'-'.$month.'-01'));
}
$echo.='
<option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
</select>
<script type="text/javascript">
$("#monthedit").val('.$month.');
</script>
<select class="selectedit" id="dayedit" onchange="update_dates();">
<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option>';
if($totdays=='29'){
$echo.='<option value="29">29</option>';
}
else if($totdays=='30'){
$echo.='<option value="29">29</option><option value="30">30</option>';
}
else if($totdays=='31'){
$echo.='<option value="29">29</option><option value="30">30</option><option value="31">31</option>';
}
$echo.='
</select>
<script type="text/javascript">
$("#dayedit").val('.$day.');
</script>
<select onchange="update_dates();" class="selectedit" id="yearedit">
<option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option>
</select>
<script type="text/javascript">
$("#yearedit").val('.$year.');
</script>
<input autocomplete="off" type="hidden" id="montheditv">
<input autocomplete="off" type="hidden" id="yeareditv">
<input autocomplete="off" type="hidden" id="dayeditv">
<script type="text/javascript">
$("#montheditv").val("'.$month.'");
$("#dayeditv").val("'.$day.'");
$("#yeareditv").val("'.$year.'");
</script>
</div>
<div style="margin:0;padding:0;padding-top:10px;display:block;" id="birthday_confirm">
<div style="margin:0;padding:0;display:none;" id="birthday_confirmv">
<div style="display:block;margin:0;padding:0;">
Note: you can only change your birthday a limited number of times.
</div>
<div style="display:block;margin:0;padding:0;">
<input autocomplete="off" type="checkbox" id="confirm_birthdayc" style="margin:0;padding:0;">
<label for="confirm_birthdayc" style="cursor:pointer;position:relative;top:-2px;margin-left:0px;">I confirm my age is <span id="confirmation_age"></span>.</label>
<script type="text/javascript">
$("#confirm_birthdayc").removeAttr("checked");
</script>
</div>
</div>
</div>
<div style="margin:0;padding:0;padding-top:10px;display:block;">
<select class="selectedit" id="showbirthday">
<option value="1">Show my full birthday in my profile.</option>
<option value="2">Show only month & day in my profile.</option>
<option value="3">Don\'t show my birthday in my profile.</option>
</select>';
$r=mysql_query("SELECT * FROM optionsv WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$showbirthday=$m['showbirthday'];	
}
$echo.='
<script type="text/javascript">
$("#showbirthday").val("'.$showbirthday.'");
</script>
</div>
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="birthday";

if(!isset($psbid)){
$psbid="";	
}
$sbid=$psbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td></tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr class="hrs">
</td>
</tr>
<tr>
<th class="contentmtv" style="text-align:right;padding-right:11px;">Interested In:</th>
<td style="padding-top:5px;"><input autocomplete="off" type="checkbox" name="ginterest" id="ginterestf" style="padding:0;margin:0;"><label for="ginterestf" style="position:relative;margin-left:3px;top:-2px;">Women</label><input autocomplete="off" type="checkbox" name="ginterest" style="margin:0;padding:0;margin-left:10px;" id="ginterestm"><label for="ginterestm" style="position:relative;margin-left:3px;top:-2px;">Men</label>';
$r=mysql_query("SELECT * FROM interested WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$interested=$m['interested'];	
}
if($interested!=""){
if($interested=='1'){
$echo.='
<script type="text/javascript">
$("#ginterestf").attr("checked","checked");
</script>
';
}
else if($interested=='2'){
$echo.='
<script type="text/javascript">
$("#ginterestm").attr("checked","checked");
</script>
';	
}
else if($interested=="12"){
$echo.='
<script type="text/javascript">
$("#ginterestf").attr("checked","checked");
$("#ginterestm").attr("checked","checked");
</script>
';	
}
}
$echo.='
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="interested";

if(!isset($psbid)){
$psbid="";	
}
$sbid=$psbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr class="hrs">
</td>
</tr>
<tr>
<th class="contentmtv" style="text-align:right;padding-right:11px;">Languages:</th>
<td style="padding-top:5px;">
<div style="width:365px;margin:0;margin-left:0px;min-height:21px;height:auto;background:#ffffff;padding:0;" class="inputtext dcphmgc displaynoneimportant" data-ac_enable="languages" data-ac_liwidth="198" data-ac_inputw="340" data-ac_url="/autocomplete/languages.php"></div>
';

$tagsids='';
$tagsnames='';

$echo.='
<script type="text/javascript">
var psuf="languages";
$("body").on("click","#tag_l"+psuf,function(e){
var suf="languages";
e.preventDefault();
e.stopPropagation();';
$r=mysql_query("SELECT * FROM languages WHERE id='$uid' AND (visibility='v' OR visibility='h') ORDER BY datetimep DESC");
while($m=mysql_fetch_array($r)){
$sbid=$m['sbid'];

	$valuev=strtolower($m['language']);
	$valuev=str_replace(" ","",$valuev);
	$valuev=preg_replace('/\W+/', '', $valuev);
	$tagsids.=','.$valuev;
	$mm=stripslashes($m['language']);
	$mm=addslashes($mm);

	$tagsnames.=','.$mm;
	
}

$echo.='
$("#tags"+suf).val("'.$tagsids.'");
$("#tags"+suf+"v").val("'.$tagsnames.'");

renewvv_mt("",suf);
return false;
});
</script>';

$echo.='
</td>
<td class="edittd">';

$uidv=$uid;

$ltypev="languages";

if(!isset($psbid)){
$psbid="";	
}
$sbid=$psbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td></tr>
<tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr class="hrs">
</td>
</tr>
<tr>
<th class="contentmtv" style="text-align:right;padding-right:11px;">About me:</th>';
$r=mysql_query("SELECT * FROM about WHERE id='$uid'");
while($m=mysql_fetch_array($r)){
$aboutme=for_textarea($m['about']);	
}
$echo.='
<td style="padding-top:5px;"><textarea autocomplete="off" id="aboutme" name="aboutme" class="aboutme" rows="5">'.$aboutme.'</textarea></td>
<td class="edittd">';

$uidv=$uid;

$ltypev="about";

if(!isset($psbid)){
$psbid="";	
}
$sbid=$psbid;

$nfjax="";
$data_t=''; //no alignment on tooltip at all

$echo.='<ul class="uiList inlineBlock mlm" style="position:relative;top:0px;">';

$privacy_configuration="big";
$privacy_source="ep"; //edit profile

include("buttons/privacy_button.php");
$echo.=$button;
$echo.='</ul>';

unset($sbid);

$echo.='</td>
</tr>
<tr>
<th></th>
<td style="padding-top:4px;">
<script type="text/javascript">';
if($aboutme==""){
$echo.='
$("#aboutme").val("");	
';
}
$echo.='
function saveci(){
$("#warns").css("display","none");
var statec=$("#statec").val();
var countryc=$("#countryc").val();
var cityc=$("#cityc").val();
var statec2=$("#statec2").val();
var countryc2=$("#countryc2").val();
var cityc2=$("#cityc2").val();
var month=$("#monthedit").val();
var year=$("#yearedit").val();
var day=$("#dayedit").val();
var monthv=$("#montheditv").val();
var yearv=$("#yeareditv").val();
var dayv=$("#dayeditv").val();

var confirmation_age=$("#confirmation_age").html();

if((confirmation_age>=13) || (confirmation_age=="")){}
else{
	$(\'#warns\').html(\'<i class="warns"></i>You cannot select a birthday that indicates you are under 13 years old.\'); $("#warns").css("display","inline-block");
	return false;
	}

var cnb=$("#confirm_birthdayc:checked").val(); 
if(cnb===undefined){
var cnbvv=1;
}
else{
var cnbvv=2;	
}
if((day==dayv) && (month==monthv) && (year==yearv)){var agechanged="";}
else{var agechanged="t"; 
if(cnb===undefined){$(\'#warns\').html(\'<i class="warns"></i>Please confirm your birthday by checking the box above.\'); $("#warns").css("display","inline-block"); return false;}
else{

}
}

var showbirthday=$("#showbirthday").val();

var cnbv=$("#showsex:checked").val();
if(cnbv===undefined){var showsex=1;}
else{var showsex=2;}

var tagslanguages=$("#tagslanguagesv").val();
var gender=$("#gender").val();
var aboutme=$("#aboutme").val();

var finterested="";
var minterested="";

var ginterest=$("#ginterestf:checked").val();
if(ginterest=="on"){
var finterested="1";	
}

var ginterest=$("#ginterestm:checked").val();
if(ginterest=="on"){
var minterested="2";	
}

$.ajax({
  async: false,
  type: "POST",
  url: "/editprofile/basic_post.php",
  data: { statec:statec,countryc:countryc,cityc:cityc,statec2:statec2,countryc2:countryc2,cityc2:cityc2,month:month,day:day,year:year,showbirthday:showbirthday,showsex:showsex,gender:gender,agechanged:agechanged,cnbvv:cnbvv,tagslanguages:tagslanguages,aboutme:aboutme,minterested:minterested,finterested:finterested },
  success: function(response) {//alert(response);
	$(\'#warns\').html(\'<i class="warnsv"></i>Your changes have been saved.\');
	$("#warns").css("display","inline-block");
	}
});

}
</script>
<label class="savecedit" onclick="saveci();"><input autocomplete="off" type="button" class="savecedit2" value="Save Changes"></label>
<div style="overflow:visible;margin:0;padding:0;display:none;position:absolute;padding-left:17px;margin-left:10px;margin-top:2px;" id="warns">
</div></td>
<td></td>
</tr>
</table>
</div>';
?>