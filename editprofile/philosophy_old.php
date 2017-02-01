<?php
$echo.='
<script type="text/javascript">
$("#linksedit5").removeClass("linkseditv");
$("#linksedit5").addClass("linksedit");
</script>
<script type="text/javascript">
(function( $ ) {

$( ".ui-autocomplete-input" ).live( "autocompleteopen", function() {
	var autocomplete = $( this ).data( "uiAutocomplete" ),
		menu = autocomplete.menu;

	if ( !autocomplete.options.selectFirst ) {
		return;
	}

	menu.activate( $.Event({ type: "mouseenter" }), menu.element.children().first() );
});

}( jQuery ));

function swapc(w,v){
	if(v){var vv=2;}
	else{var vv="";}
				$("#editpiw"+vv).removeClass("editpiv");
				$("#editpiwv"+vv).removeClass("editpivv");
				$("#political"+vv).removeClass("editpi2");
				$("#political"+vv).addClass("editpi");
				$("#removeedit"+vv).css("display","none");
				if(w==1){
				$("#political"+vv).val("What are your political beliefs?");
				}
				$("#political_description").val("");
				$("#political_description").attr("disabled", "disabled");
				$("#political_description").css("background","#F2F2F2");
				
				$("#stateedit"+vv).val("2");
				$("#political"+vv).focus();
}
function swapc2(w,v){
	if(v){var vv=2;}
	else{var vv="";}
				$("#editpiw2"+vv).removeClass("editpiv");
				$("#editpiwv2"+vv).removeClass("editpivv");
				$("#religion"+vv).removeClass("editpi2");
				$("#religion"+vv).addClass("editpi");
				$("#removeedit2"+vv).css("display","none");
				if(w==1){
				$("#religion"+vv).val("What are your religious beliefs?");
				}
				$("#religion_description").val("");
				$("#religion_description").attr("disabled", "disabled");
				$("#religion_description").css("background","#F2F2F2");
				
				$("#stateedit2"+vv).val("2");
				$("#religion"+vv).focus();
}
function dov(w,v){
	if(v){var vv=2;}
	else{var vv="";}
var wv=$.trim(w);
var wvv=$("#politicalv").val();

var stateedit=$("#stateedit").val();
if((stateedit=="1") && (wv!=wvv)){
if(v){swapc(2,2);}
else{swapc(2);}
}
}
function dov2(w,v){
	if(v){var vv=2;}
	else{var vv="";}
var wv=$.trim(w);
var wvv=$("#religionv").val();

var stateedit=$("#stateedit2").val();
if((stateedit=="1") && (wv!=wvv)){
swapc2(2);
}
}
</script>
<div class="mainweduwork" style="height:auto;">
<table class="eduworkft" cellspacing="0" cellpadding="0" style="margin-left:20px;">
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;"><div style=position:relative;top:8px;margin:0;padding:0;">Religion:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">
<div id="editpiw2" style="margin:0;padding:0;display:inline-block;">
<div id="editpiwv2" style="margin:0;padding:0;display:inline-block;">
<input autocomplete="off" class="editpi dcphmgc" id="religion" placeholder="What are your religious beliefs?" onkeyup="dov2(this.value);">
<label id="removeedit2" class="removeedit" style="display:none;" title="Remove" onclick="swapc2(1);"><input autocomplete="off" type="button" class="removeedit2" style="padding:0;cursor:pointer;"></label>
</div>
</div>
<input autocomplete="off" type="hidden" id="religionv">
<input autocomplete="off" type="hidden" id="stateedit2">
<script type="text/javascript">';
$v='';
$v2='';
$r=mysql_query("SELECT * FROM $uidab WHERE primary2='1'");
while($m=mysql_fetch_array($r)){
$v=$m['religion'];
$v=stripslashes($v);
$v=addslashes($v);
$v2=$m['religion_d'];
}
if($v!=""){

$echo.='

				$("#editpiw2").addClass("editpiv");
				$("#editpiwv2").addClass("editpivv");
				$("#religion").removeClass("editpi");
				$("#religion").addClass("editpi2");
				$("#removeedit2").css("display","block");
				$("#stateedit2").val("1");

';	
	
}
else{
$v='What are your religious beliefs?';

}
$echo.='
$("#religion").val("'.$v.'");
$("#religionv").val("'.$v.'");
			$(function() {
		$( "#religion" ).autocomplete({
			    		selectFirst: true,
			source: "autocomplete/religion.php",
			minLength: 1,
			selectFirst: true,
			focus: function(event,ui){
				return false;
			},
			select: function( event, ui ) {

				var as=ui.item.value;
				$("#editpiw2").addClass("editpiv");
				$("#editpiwv2").addClass("editpivv");
				$("#religion").removeClass("editpi");
				$("#religion").addClass("editpi2");
				$("#removeedit2").css("display","block");
				$("#stateedit2").val("1");
				$( "#religion" ).val(as);
				$( "#religionv" ).val(as);
				$("#religion_description").removeAttr("disabled");
				$("#religion_description").css("background","#ffffff");
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
<td class="edittd" style="width:320px;"><div class="editpr" style="display:inline-block;margin-left:6px;position:relative;bottom:-2px;"><div class="editprv"><a class="editpra" href="#" onclick="return false;"><i class="mundito" style="margin-right:6px;position:relative;left:-6px;"></i></a></div></div></td>
</tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;"><div style=position:relative;top:8px;margin:0;padding:0;">Description:</div></th>
<td style="padding-top:4px;">
<textarea autocomplete="off" disabled="" class="disabled_textarea" id="religion_description">'.$v2.'</textarea>
<script type="text/javascript">';

if($v!="What are your religious beliefs?"){
$echo.='
				$("#religion_description").removeAttr("disabled");
				$("#religion_description").css("background","#ffffff");
';
}
else{
$echo.='
$("#religion_description").val("'.$v2.'");
';
}
$echo.='
</script>
</td>
<td></td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;"><div style=position:relative;top:8px;margin:0;padding:0;">Political&nbsp;Views:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">
<div id="editpiw" style="margin:0;padding:0;display:inline-block;">
<div id="editpiwv" style="margin:0;padding:0;display:inline-block;">
<input autocomplete="off" class="editpi dcphmgc" id="political" placeholder="What are your political beliefs?" onkeyup="dov(this.value);">
<label id="removeedit" class="removeedit" style="display:none;" title="Remove" onclick="swapc(1);"><input autocomplete="off" type="button" class="removeedit2" style="padding:0;cursor:pointer;"></label>
</div>
</div>
<input autocomplete="off" type="hidden" id="politicalv">
<input autocomplete="off" type="hidden" id="stateedit">

<script type="text/javascript">';

$v='';
$v2='';
$r=mysql_query("SELECT * FROM $uidab WHERE primary2='1'");
while($m=mysql_fetch_array($r)){
$v=$m['political'];
$v2=$m['political_d'];

}
if($v!=""){

$echo.='

				$("#editpiw").addClass("editpiv");
				$("#editpiwv").addClass("editpivv");
				$("#political").removeClass("editpi");
				$("#political").addClass("editpi2");
				$("#removeedit").css("display","block");
				$("#stateedit").val("1");

';	
	
}
else{
$v='What are your political beliefs?';

}
$echo.='
$("#political").val("'.$v.'");
$("#politicalv").val("'.$v.'");

			$(function() {
		$( "#political" ).autocomplete({
			    		selectFirst: true,
			source: "autocomplete/political.php",
			minLength: 1,
			selectFirst: true,
			focus: function(event,ui){
				return false;
			},
			select: function( event, ui ) {

				var as=ui.item.value;
				$("#editpiw").addClass("editpiv");
				$("#editpiwv").addClass("editpivv");
				$("#political").removeClass("editpi");
				$("#political").addClass("editpi2");
				$("#removeedit").css("display","block");
				$("#stateedit").val("1");
				$( "#political" ).val(as);
				$( "#politicalv" ).val(as);
				$("#political_description").removeAttr("disabled");
				$("#political_description").css("background","#ffffff");
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
<td class="edittd" style="width:320px;"><div class="editpr" style="display:inline-block;margin-left:6px;position:relative;bottom:-2px;"><div class="editprv"><a class="editpra" href="#" onclick="return false;"><i class="mundito" style="margin-right:6px;position:relative;left:-6px;"></i></a></div></div></td>
</tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;"><div style=position:relative;top:8px;margin:0;padding:0;">Description:</div></th>
<td style="padding-top:4px;">
<textarea autocomplete="off" disabled="" class="disabled_textarea" id="political_description">'.$v2.'</textarea>
<script type="text/javascript">';

if($v!="What are your political beliefs?"){
$echo.='

				$("#political_description").removeAttr("disabled");
				$("#political_description").css("background","#ffffff");
';
}
else{
$echo.='
$("#political_description").val("");
';	
}
$echo.='
</script>
</td>
<td></td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>
<tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;padding-bottom:5px;"><div style=position:relative;top:8px;margin:0;padding:0;">People&nbsp;Who&nbsp;Inspire You:</div></th>
<td class="eduworktd" style="min-width:368px;max-width:368px;">
<div style="margin:0;padding:0;width:100%;height:auto;display:inline-block;position:relative;overflow-x:hidden;">
<div id="currentpl" class="editpi" style="margin:0;padding:0;min-height:21px;height:auto;width:367px;"></div>
<input autocomplete="off" onkeyup="checkle(event,this.value);" type="text" class="editpii dcphmgc" id="inspirations" name="inspirations" style="padding:2px;padding-left:1px;position:absolute;left:4px;bottom:3px;width:245px;" onfocus="employeri3(this.id,this.value);" onblur="employeriv3(this.id,this.value);"></div>
<input autocomplete="off" type="hidden" id="tagsids">
<input autocomplete="off" type="hidden" id="tagsnames">
<input autocomplete="off" type="hidden" id="ftryl">
<div id="emptyl" style="display:none;"></div>
<div id="emptyl2" style="display:none;"></div>

<script type="text/javascript">
$("#ftryl").val("");
function strpos (haystack, needle, offset) {
   var i = (haystack + "").indexOf(needle, (offset || 0));
    return i === -1 ? false : i;
}
function checkle(evt,v){
var charCode = (evt.which) ? evt.which : event.keyCode
var tocheck=$("#inspirations").val();
tocheck=$.trim(tocheck);
if((charCode == "8") && (tocheck=="")){
	var ftry=$("#ftryl").val();
	$("#ftryl").val("y");
	if(ftry=="y"){
	var dame=$("#tagsids").val();
	var pallt=$("#tagsids").val();
if(pallt!==undefined){
var allt=pallt.split(",");
var alltv=allt.length-1;

var damev=allt[alltv];
}

if(damev!=""){
	$("#ccarital"+damev).click();
}

	$("#ftryl").val("n");
	}
	}
else{}
}

';

$tagsids='';
$tagsnames='';
$r=mysql_query("SELECT * FROM $uidpw ORDER BY datetimep ASC");
while($m=mysql_fetch_array($r)){
	$valuev=strtolower($m['person']);
	$valuev=str_replace(" ","",$valuev);
	$valuev=preg_replace('/\W+/', '', $valuev);
	$tagsids.=','.$valuev;
	$mm=stripslashes($m['person']);
	$mm=addslashes($mm);
	$tagsnames.=','.$mm;
	
	$echo.='
			var ilusert=\''.$valuev.'\';
			var dusern=\''.$mm.'\';
			var dusernv=\'<div id="emptyl\'+ilusert+\'">\'+dusern+\'</div>\';
			var dusernvv=\'<div id="emptyl2\'+ilusert+\'">\'+dusern+\'</div>\';
			$("#emptyl").append(dusernv);
			$("#emptyl2").append(dusernvv);
	
	';
}
if(isset($valuev)){
$echo.='
$("#inspirations").val("");
$("#inspirations").attr("placeholder","");	
';	
}
else{
$echo.='
$("#inspirations").val("Who inspires you?");
$("#inspirations").attr("placeholder","Who inspires you?");	

';	
}
$echo.='
$("#tagsids").val("'.$tagsids.'");
$("#tagsnames").val("'.$tagsnames.'");

			$(function() {
		$( "#inspirations" ).autocomplete({
			minLength: 1,
			selectFirst: true,
			source: function(request, response) {
                $.ajax({
                  url: \'autocomplete/inspirations.php\',
                  dataType: "json",
                  data: {
                    term : request.term,
                    employerv : $("#tagsids").val(),
					employerv2 : $("#tagsnames").val()
                  },
                  success: function(data) {
                    response(data);
                  }
                });
            },
			focus: function(event,ui){
				return false;
			},
			select: function( event, ui ) {
							var ilusert=ui.item.valuev;
			var dusern=ui.item.value;
			var dusernv=\'<div id="emptyl\'+ilusert+\'">\'+dusern+\'</div>\';
			var dusernvv=\'<div id="emptyl2\'+ilusert+\'">\'+dusern+\'</div>\';
			$("#emptyl").append(dusernv);
			$("#emptyl2").append(dusernvv);
			var ctoteti=$("#tagsids").val();
                        $("#tagsids").val(ctoteti+","+ilusert);
						$("#inspirations").val("");
						$("#inspirations").attr("placeholder","");
                        renewvvl();	
						return false;					
			}
		})
		.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
						var dtag=item.value;
			var ctoteti=$("#tagsnames").val();
			return $( "<li style=\\"cursor:pointer;padding:0;font-family:\\\'lucida grande\\\',tahoma,verdana,arial,sans-serif!important;\\"></li>" )
				.data( "ui-autocomplete-item", item )
				.append( \'<a>\'+item.value + \'</a>\' )
				.appendTo( ul );
		};
	});
	function delovl(w,c){
var ctoteti=$("#tagsids").val();
ctoteti=ctoteti.replace(","+w,"");
$("#tagsids").val(ctoteti);
renewvvl();	
var active=document.activeElement;
$("#inspirations").blur();
$("#inspirations").focus();
}
function renewvvl(a){
	var pallt=$("#tagsids").val();

if(pallt==""){$("#inspirations").css("left","3px"); $("#inspirations").css("width","290px"); $("#tagsnames").val("");}
	var rompecocos="";
	var rompecocos2="";
if(pallt!==undefined){
var allt=pallt.split(",");
var alltv=allt.length-1;

x=1;
while(x<=alltv){

rompecocos+=\'<div class="carita" id="carital\'+x+\'"><div title="\'+$("#emptyl"+allt[x]).html()+\'" style="max-width:100px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:inline-block;">\'+$("#emptyl"+allt[x]).html()+\'</div><div id="ccarital\'+allt[x]+\'" onclick="delovl(\\\'\'+allt[x]+\'\\\',1)" class="ccarita" title="Remove \'+$("#emptyl"+allt[x]).html()+\'" style=""></div></div>\';

rompecocos2+=","+$("#emptyl2"+allt[x]).html();

x++;
}

}
$("#currentpl").html(rompecocos);
$("#tagsnames").val(rompecocos2);
$("#inspirations").css("bottom","3px");

var xv=x-1;
var iwidth=$("#carital"+xv).innerWidth();
if(iwidth){
var oftop=$("#carital"+xv).offset().top;
var ofleft=$("#carital"+xv).offset().left;

iwidth=parseInt(iwidth);
ofleft=parseInt(ofleft);

var ofleft2=$("#currentpl").offset().left;
ofleft2=parseInt(ofleft2);

var ofleft3=ofleft-ofleft2;

var twidth=iwidth+ofleft3+10;

var tent=iwidth+ofleft3;
var tentw=367-280;

if(tent>280){
$(\'#currentpl\').append(\'<div style="display:inline-block;width:\'+tentw+\'px;max-width:\'+tentw+\'px;background:none;border:none;" class="carita"></div>\');
$("#inspirations").css("left","4px");
$("#inspirations").css("bottom","3px");
var okv=245;	
}
else{
$("#inspirations").css("left",twidth+"px");
var okv=360-twidth;
}
}
if(pallt==""){
$("#inspirations").css("width","360px");	
}
else{
$("#inspirations").css("width","100px");
}

var cwidthv=0;
var x=1;
while(x<=alltv){
var cwidth=$("#carital"+x).innerWidth();
cwidth=parseInt(cwidth);
cwidthv=parseInt(cwidthv);
cwidthv=cwidth+cwidthv;
if(cwidthv>300){
var cwidthvvv=cwidthv;
cwidthv=0;	
}
if(cwidthv=="0"){
var cwidthvv=300-cwidthvvv;
}
else{
var cwidthvv=300-cwidthv;	
}
x++;
}
if(pallt!=""){

$("#inspirations").css("width",okv+"px");

}
}
renewvvl();


function employeri3(v,vv){
if(vv=="Who inspires you?"){
$("#"+v).css("width","100px");
}
}
function employeriv3(v,vv){
if(vv==""){
var pallt=$("#tagsids").val();
if(pallt==""){
$("#inspirations").attr("placeholder","Who inspires you?");
$("#"+v).css("width","360px");	
}
}
}




</script>
</td>
<td class="edittd" style="width:320px;"><div class="editpr" style="display:inline-block;margin-left:6px;position:relative;bottom:-2px;"><div class="editprv"><a class="editpra" href="#" onclick="return false;"><i class="mundito" style="margin-right:6px;position:relative;left:-6px;"></i></a></div></div></td>
</tr>
<tr>
<td colspan="3" style="padding:5px 0px;">
<hr style="background: none repeat scroll 0% 0% rgb(217, 217, 217);border-width: 0px;color: rgb(217, 217, 217);height: 1px;font-size: 11px;text-align: left;">
</td></tr>
<th class="eduworkth" style="padding-right:11px;color:rgb(102, 102, 102);vertical-align:top;text-align:right;"><div style=position:relative;top:8px;margin:0;padding:0;">Favorite&nbsp;Quotations:</div></th>
<td style="padding-top:6px;">';
$v='';
$r=mysql_query("SELECT * FROM $uidab WHERE primary2='1'");
while($m=mysql_fetch_array($r)){
$v=$m['quotations'];
}
$echo.='
<textarea autocomplete="off" class="uni_description" style="width:368px;max-width:368px;" rows="5" name="quotations" id="quotations">'.$v.'</textarea>
<script type="text/javascript">';
if($v==""){
$echo.='
$("#quotations").val("'.$v.'");
';
}
$echo.='
</script>
</td>
<td class="edittd" style="width:320px;"><div class="editpr" style="display:inline-block;margin-left:6px;position:relative;bottom:-2px;"><div class="editprv"><a class="editpra" href="#" onclick="return false;"><i class="mundito" style="margin-right:6px;position:relative;left:-6px;"></i></a></div></div></td>
</tr>
<tr>
<th></th>
<td style="padding-top:4px;">
<script type="text/javascript">
function saveci(){
$("#warns").css("display","none");

var tagsids=$("#tagsnames").val();
var religion=$("#religion").val();
if(religion=="What are your religious beliefs?"){religion="";}
var religion_d=$("#religion_description").val();
var political=$("#political").val();
if(political=="What are your political beliefs?"){political="";}
var political_d=$("#political_description").val();
var quotations=$("#quotations").val();

$.ajax({
  async: false,
  type: "POST",
  url: "editprofile/philosophy_post.php",
  data: { religion:religion, religion_d:religion_d, political:political, political_d:political_d, quotations:quotations,tagsids:tagsids },
  success: function(response) {
	  //alert(response);
	$(\'#warns\').html(\'<i class="warnsv"></i>Your changes have been saved.\');
	$("#warns").css("display","inline-block");
	}
});

}
</script>
<label class="savecedit" onclick="saveci();"><input autocomplete="off" type="button" class="savecedit2" value="Save Changes"></label>
<div style="overflow:visible;margin:0;padding:0;display:none;position:absolute;padding-left:17px;margin-left:10px;margin-top:2px;" id="warns">
</div></td>
</tr>
</table>
</div>
';
?>