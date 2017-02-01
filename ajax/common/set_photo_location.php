<?php
$secho.='
function dov(w,f){
	var vv=f; 
var wv=$.trim(w);
var wvv=$("#cityv"+vv).val();
if(wv=="" || wv.length<3){$("#city"+vv).removeClass("working");}
var stateedit=$("#stateedit"+vv).val();
if(stateedit=="1" && wv!=wvv){
swapc(2,f);
}

}

function swapc(w,v){
var vv=v;
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
	var sbid=$("#pnphotoc"+vv).attr("data-sbid");
	if(vv=="300000"){
	var durl="/ajax/album_location/remove_album_location.php";	
	var sbid=$("#selected_album").val();	
	}
	else if(vv=="300001"){
	var corder=$("#ao_gn").val();
	var sbid=pi_gn[corder];
	
	var durl="/ajax/photo_location/remove_photo_location.php";
	}
	else if(vv=="300003" || vv=="300004"){
	return false; //que no salve en click de X
	}
	else{
	var durl="/ajax/photo_location/remove_photo_location.php";		
	}
	$.ajax({
	type: "POST",
	url: durl,
	data: { sbid : sbid },
	success: function(response) {//alert(response);
	}
});	

}

function save_city_vals(xpu){
	var sbid=$("#pnphotoc"+xpu).attr("data-sbid");
	var cityc=$("#cityc"+xpu).val();
	var statec=$("#statec"+xpu).val();
	var countryc=$("#countryc"+xpu).val();
	var v=$("#city"+xpu).val();
	if(xpu=="300000"){
	var durl="/ajax/album_location/set_album_location.php";	
	var sbid=$("#selected_album").val();
	}
	else if(xpu=="300001"){
	var corder=$("#ao_gn").val();
	var sbid=pi_gn[corder];
	
	var durl="/ajax/photo_location/set_photo_location.php";
	}
	else{
	var durl="/ajax/photo_location/set_photo_location.php";
	}
$.ajax({
	type: "POST",
	url: durl,
	data: { sbid : sbid, cityc : cityc, statec : statec,countryc:countryc,v:v },
	success: function(response) {
	}
});	
}'
?>