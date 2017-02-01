<?php
$vpost='';
$saveoradd=1;
if(isset($_POST['thss'])){
include("start.php");
$vpost='checked="checked"';
$tj=$_POST['thss'];
$attendedhsv=$_POST['attendedhsv'];
$attendedhsvv=$_POST['attendedhsvv'];
$saveoradd=2;
$description='';	
}
$outp='
<div style="padding:0;margin:0;display:none;margin-top:5px;width:611px;position:relative;background:#ECECEC;" id="'.$tj.'nhsw">
<input autocomplete="off" type="hidden" id="'.$tj.'attendedhsv">
<input autocomplete="off" type="hidden" id="'.$tj.'attendedhsvv">
<script type="text/javascript">
$("#'.$tj.'attendedhsv").val("'.$attendedhsv.'");
$("#'.$tj.'attendedhsvv").val("'.$attendedhsvv.'");
</script>
<table class="eduworkft" style="width:603px;position:relative;left:1px;" cellspacing="0" cellpadding="0">
<tr>
<th style="color:#313131;border-bottom: 1px solid rgb(224, 224, 224);padding-top:5px;padding-bottom:5px;padding-left:4px;" id="'.$tj.'attendedhs">'.$attendedhsv.'</th>
<td style="border-bottom: 1px solid rgb(224, 224, 224);"></td>
</tr>
<tr>
<th class="eduworkth" style="padding-right:8px;color:rgb(102, 102, 102);padding-top:9px;text-align:right;"><label for="city_hs" style="cursor:pointer;">City:</label></th>
<td style="padding-top:12px;">
<div id="'.$tj.'editpiw_city_hs" style="margin:0;padding:0;display:inline-block;">
<div id="'.$tj.'editpiwv_city_hs" style="margin:0;padding:0;display:inline-block;width:368px;">
<input autocomplete="off" class="editpi" id="'.$tj.'city_hs" name="city_hs" onkeyup="dovcity(this.value,\'city_hs\',\''.$tj.'\');">
<label id="'.$tj.'removeedit_city_hs" class="removeedit" style="display:none;" title="Remove" onclick="swapccity(1,\'city_hs\',\''.$tj.'\');"><input autocomplete="off" type="button" class="removeedit2" style="padding:0;cursor:pointer;"></label>
<input autocomplete="off" type="hidden" id="'.$tj.'stateedit_city_hs">
<input autocomplete="off" type="hidden" id="'.$tj.'city_hsv">
<input autocomplete="off" type="hidden" id="'.$tj.'statec_city_hs">
<input autocomplete="off" type="hidden" id="'.$tj.'countryc_city_hs">
<input autocomplete="off" type="hidden" id="'.$tj.'cityc_city_hs">
</div>
</div>
<script type="text/javascript">
$("#'.$tj.'stateedit_city_hs").val("2");
			
		$("#'.$tj.'city_hs").autocomplete({
				search:function(){$(this).addClass("working");},
			open:function(){$(this).removeClass("working");},
			       source: "autocomplete/cities.php",
			minLength: 1,
			selectFirst: true,
			focus: function(event,ui){
				return false;
			},
			select: function( event, ui ) {
						var as=ui.item.value;
				$("#'.$tj.'editpiw_city_hs").addClass("editpivo");
				$("#'.$tj.'editpiwv_city_hs").addClass("editpivvo");
				$("#'.$tj.'city_hs").removeClass("editpi");
				$("#'.$tj.'city_hs").addClass("editpi2");
				$("#'.$tj.'removeedit_city_hs").css("display","block");
				$("#'.$tj.'stateedit_city_hs").val("1");
				$("#'.$tj.'city_hs").val(as);
				$("#'.$tj.'city_hsv").val(as);
				$("#'.$tj.'statec_city_hs").val(ui.item.statec);
				$("#'.$tj.'countryc_city_hs").val(ui.item.countryc);
				$("#'.$tj.'cityc_city_hs").val(ui.item.city);
				return false;				
			}
		})
		.data("uiAutocomplete")._renderItem = function( ul, item ) {	
			return $( "<li style=\\"cursor:pointer;padding:0;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif!important;\\"></li>")
				.data( "ui-autocomplete-item", item )
				.append( \'<a>\'+item.value + \'</a>\' )
				.appendTo( ul );
			
			};
	
	</script>
</td>
</tr>
<tr>
<th class="eduworkth" style="padding-right:8px;color:rgb(102, 102, 102);text-align:right;vertical-align:top;"><label style="cursor:pointer;position:relative;top:16px;">Time Period:</label></th>
<td style="padding-top:12px;padding-bottom:5px;min-width:368px;">

<div style="margin:0;padding:0;display:block;margin-top:3px;height:39px;">

<div style="position:relative;display:inline-block;margin:0;padding:0;margin-left:4px;height:20px;">

<div style="margin:0;padding:0;display:inline-block;margin-right:0px;" id="'.$tj.'addyearv">
 
<select class="addyear" id="'.$tj.'addyears" style="z-index:200;opacity:0;position:relative;top:0px;left:8px;margin-right:0px;" onclick="$(\'#'.$tj.'addyears\').css(\'left\',\'0\'); $(\'#'.$tj.'addyears\').css(\'margin-right\',\'0\'); $(\'#'.$tj.'addyear\').css(\'display\',\'none\'); $(\'#'.$tj.'addyears\').css(\'opacity\',\'1\'); return false;" onchange="addmonth(\'\',1,\'\',\''.$tj.'\'); adddayv(\'\',\'\',\''.$tj.'\');" onmouseover="$(\'#'.$tj.'addyear\').css(\'text-decoration\',\'underline\');" onmouseout="$(\'#'.$tj.'addyear\').css(\'text-decoration\',\'none\');">
<option value="-1">Year:</option>';
$dy=date("Y");
$dy++;
$j=1905;
while($dy>=$j){
$outp.='
<option value="'.$dy.'">'.$dy.'</option>
';
$dy--;
}
$outp.='
</select>

<div class="addsignpv" style="position:absolute;top:0px;left:-1px;" id="'.$tj.'addyear">
<a href="#" style="padding-left:11px;" onclick="return false;">
<i class="addsignp"></i>
Add Year
</a>
</div>

</div>

<div style="position:relative;display:none;margin:0;padding:0;" id="'.$tj.'addmonthv">

<select class="addyear" id="'.$tj.'addmonths" style="opacity:0;z-index:200;position:relative;top:0px;left:0px;" onclick="$(\'#'.$tj.'addmonth\').css(\'display\',\'none\'); $(\'#'.$tj.'addmonths\').css(\'opacity\',\'1\'); return false;" onchange="addday(\'\',1,\''.$tj.'\'); adddayv(\'\',\'\',\''.$tj.'\');" onmouseover="$(\'#'.$tj.'addmonth\').css(\'text-decoration\',\'underline\');" onmouseout="$(\'#'.$tj.'addmonth\').css(\'text-decoration\',\'none\');">
<option value="-1">Month:</option>
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>

<div class="addsignpv" style="display:none;position:absolute;top:0px;left:-1px;" id="'.$tj.'addmonth">
<a href="#" style="padding-left:11px;" onclick="return false;">
<i class="addsignp"></i>Add month
</a>
</div>

</div>

<div style="position:relative;display:none;margin:0;padding:0;left:-5px;" id="'.$tj.'adddayv">

<select class="addyear" id="'.$tj.'adddays" style="z-index:200;opacity:0;position:relative;top:0px;left:3px;width:60px;" onclick="$(\'#'.$tj.'adddays\').css(\'width\',\'\'); $(\'#'.$tj.'addday\').css(\'display\',\'none\'); $(\'#'.$tj.'adddays\').css(\'opacity\',\'1\');" onmouseover="$(\'#'.$tj.'addday\').css(\'text-decoration\',\'underline\');" onmouseout="$(\'#'.$tj.'addday\').css(\'text-decoration\',\'none\');" onchange="checkcursor(\'\',\''.$tj.'\');">
</select>

<div class="addsignpv" style="display:none;position:absolute;top:0px;left:-1px;" id="'.$tj.'addday">
<a href="#" style="padding-left:11px;" onclick="return false;">
<i class="addsignp"></i>
Add day
</a>
</div>

</div>

</div>


<div style="display:inline-block;margin:0;padding:0;position:relative;margin-top:3px;margin-left:10px;left:0;bottom:-1px;" id="'.$tj.'topresent">to</div>

<div style="display:block;padding:0;margin:0;padding-top:4px;"></div>

<div style="position:relative;display:inline-block;margin:0;padding:0;margin-left:4px;height:30px;" id="'.$tj.'currentlyv2">

<div style="margin:0;padding:0;display:inline-block;margin-right:0px;" id="'.$tj.'addyearv2">
 
<select class="addyear" id="'.$tj.'addyears2" style="z-index:200;opacity:0;position:relative;top:0px;left:0px;" onclick="$(\'#'.$tj.'addyear2\').css(\'display\',\'none\'); $(\'#'.$tj.'addyears2\').css(\'opacity\',\'1\'); return false;" onchange="addmonth(2,\'\',\'\',\''.$tj.'\'); adddayv(\'\',2,\''.$tj.'\');" onmouseover="$(\'#'.$tj.'addyear2\').css(\'text-decoration\',\'underline\');" onmouseout="$(\'#'.$tj.'addyear2\').css(\'text-decoration\',\'none\');">
<option value="-1">Year:</option>';
$dy=date("Y");
$dy++;
$j=1905;
while($dy>=$j){
$outp.='
<option value="'.$dy.'">'.$dy.'</option>
';
$dy--;
}
$outp.='
</select>

<div class="addsignpv" style="position:absolute;top:0px;left:-1px;" id="'.$tj.'addyear2">
<a href="#" style="padding-left:11px;" onclick="return false;">
<i class="addsignp"></i>
Add Year
</a>
</div>

</div>

<div style="position:relative;display:none;margin:0;padding:0;" id="'.$tj.'addmonthv2">

<select class="addyear ch_addmonth" id="'.$tj.'addmonths2" style="opacity:0;z-index:200;position:relative;top:0px;left:0px;" onclick="$(\'#'.$tj.'addmonth2\').css(\'display\',\'none\'); $(\'#'.$tj.'addmonths2\').css(\'opacity\',\'1\'); return false;" onchange="addday(2,\'\',\''.$tj.'\'); adddayv(\'\',2,\''.$tj.'\');" onmouseover="$(\'#'.$tj.'addmonth2\').css(\'text-decoration\',\'underline\');" onmouseout="$(\'#'.$tj.'addmonth2\').css(\'text-decoration\',\'none\');">
<option value="-1">Month:</option>
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>

<div class="addsignpv" style="display:none;position:absolute;top:0px;left:-1px;" id="'.$tj.'addmonth2">
<a href="#" style="padding-left:11px;" onclick="return false;">
<i class="addsignp"></i>Add month
</a>
</div>

</div>

<div style="position:relative;display:none;margin:0;padding:0;left:-5px;" id="'.$tj.'adddayv2">

<select class="addyear ch_addday" id="'.$tj.'adddays2" style="z-index:200;opacity:0;position:relative;top:0px;left:3px;width:60px;" onclick="$(\'#'.$tj.'adddays2\').css(\'width\',\'\'); $(\'#'.$tj.'addday2\').css(\'display\',\'none\'); $(\'#'.$tj.'adddays2\').css(\'opacity\',\'1\');" onmouseover="$(\'#'.$tj.'addday2\').css(\'text-decoration\',\'underline\');" onmouseout="$(\'#'.$tj.'addday2\').css(\'text-decoration\',\'none\');" onchange="checkcursor(2,\''.$tj.'\');">
</select>

<div class="addsignpv" style="display:none;position:absolute;top:0px;left:-1px;" id="'.$tj.'addday2">
<a href="#" style="padding-left:11px;" onclick="return false;">
<i class="addsignp"></i>
Add day
</a>
</div>

</div>

</div>

</div>

</td>
</tr>
<tr>
<th class="eduworkth" style="padding-right:8px;color:rgb(102, 102, 102);text-align:right;padding-top:12px;">Graduated:</th>
<td style="padding-top:12px;">
<input autocomplete="off" type="checkbox" '.$vpost.' style="display:inline-block;" id="'.$tj.'graduated" name="graduated">
</td>
</tr>
<tr>
<th class="eduworkth" style="padding-right:8px;color:rgb(102, 102, 102);text-align:right;vertical-align:top;"><label for="hs_description" style="cursor:pointer;position:relative;top:15px;">Description:</label></th>
<td style="padding-top:12px;">
<textarea autocomplete="off" class="hs_description" style="width:368px;max-width:368px;margin-bottom:8px;height:35px;" name="hs_description" id="'.$tj.'hs_description" data-au_grow="">'.$description.'</textarea>
</td>
</tr>
<tr>
<th style="border-top: 1px solid rgb(224, 224, 224);"></th>
<td style="border-top: 1px solid rgb(224, 224, 224);padding-top:9px;padding-bottom:12px;padding-left:3px;">

<input autocomplete="off" type="hidden" id="'.$tj.'place">
<input autocomplete="off" type="hidden" id="'.$tj.'currently">
<input autocomplete="off" type="hidden" id="'.$tj.'longcity">
<input autocomplete="off" type="hidden" id="'.$tj.'month_s">
<input autocomplete="off" type="hidden" id="'.$tj.'month_e">
<input autocomplete="off" type="hidden" id="'.$tj.'yeare">
<input autocomplete="off" type="hidden" id="'.$tj.'monthe">
<input autocomplete="off" type="hidden" id="'.$tj.'daye">
<input autocomplete="off" type="hidden" id="'.$tj.'yearl">
<input autocomplete="off" type="hidden" id="'.$tj.'monthl">
<input autocomplete="off" type="hidden" id="'.$tj.'dayl">


<input autocomplete="off" type="hidden" id="'.$tj.'mplace">
<input autocomplete="off" type="hidden" id="'.$tj.'mposition">
<input autocomplete="off" type="hidden" id="'.$tj.'mcityc">
<input autocomplete="off" type="hidden" id="'.$tj.'mstatec">
<input autocomplete="off" type="hidden" id="'.$tj.'mcountryc">
<textarea autocomplete="off" style="display:none;" id="'.$tj.'mdescription">'.$description.'</textarea>
<input autocomplete="off" type="hidden" id="'.$tj.'myeare">
<input autocomplete="off" type="hidden" id="'.$tj.'mmonthe">
<input autocomplete="off" type="hidden" id="'.$tj.'mdaye">
<input autocomplete="off" type="hidden" id="'.$tj.'myearl">
<input autocomplete="off" type="hidden" id="'.$tj.'mmonthl">
<input autocomplete="off" type="hidden" id="'.$tj.'mdayl">
<input autocomplete="off" type="hidden" id="'.$tj.'mcurrently">
<input autocomplete="off" type="hidden" id="'.$tj.'mlongcity">
<input autocomplete="off" type="hidden" id="'.$tj.'mmonth_s">
<input autocomplete="off" type="hidden" id="'.$tj.'mmonth_e">

<div id="'.$tj.'highschoolbtw" style="display:inline-block;margin:0;padding:0;">
<label class="savecedit" onclick="addhs(\''.$tj.'\','.$saveoradd.');" style="padding:1px 4px;"><input autocomplete="off" type="button" class="savecedit2" value="Add School"></label>
<label class="cancelcedit" onclick="canceladdhs(\''.$tj.'\','.$saveoradd.');" style="padding:1px 4px;position:relative;left:-2px;"><input autocomplete="off" type="button" class="cancelcedit2" value="Cancel"></label>
</div>
</td>
</tr>
</table>
</div>';
if(isset($_POST['thss'])){
echo $outp;
}
else{
$echo.=$outp;	
}
?>
<?php
if(isset($_POST['thss'])){
include("end.php");
}
?>