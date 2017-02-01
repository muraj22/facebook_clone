<?php
include("headerjs.php");
?>
<?php
$rhelper_js='../';
?>
function unpin(org_elem,f,af){
var aorder=$("#ao_gn").val(); //gets to be declared nevertheless in case of a comment to update

	if(af=="repinx26"){
var lpid=pi_gn[aorder];
var uidv=o_gn[aorder];
var whatisit="photo";

var lparams={lpid:lpid,uidv:uidv,whatisit:whatisit};

$(".repinclickf").parent(".lbl").eq(0).css("display","none");
$(".repinclickvf").parent(".lbl").eq(0).css("display","inline-block");

$("#cop12v").parent().eq(0).css("display","inline-block");
$("#cop13v").parent().eq(0).css("display","none");

rep_gn[aorder]=0;
trep_gn[aorder]=trep_gn[aorder]-1;
}


var fr=f;


var whatisitv=$(org_elem).parents(".mtablev").eq(0).length;

if(af!="repinx26"){
if($(org_elem).parents(".mtablev").eq(0).length>0){
var lparams=$(org_elem).parents(".mtablev").eq(0).attr("data-lparams");
lparams=$.parseJSON(lparams);
}
else{
var lparams=$(org_elem).parents(".mtabled").eq(0).attr("data-lparams");
lparams=$.parseJSON(lparams);
}
}

var c=retcount();
$("body").append('<div class="hidden_sb" data-a_id="unpins" fjax="/unpin.php?uidv='+lparams.uidv+'&whatisit='+lparams.whatisit+'&lpid='+lparams.lpid+'" id="unpins'+c+'"></div>');
$("#unpins"+c).click().remove();
alert(2);

if(af=="repinx26"){
var wo=$("#ao_gn").val();
if(wo!=aorder){
var nogo="t";
}
}

var is_comment="f";
if(nogo===undefined){
	
if(af=="repinx26"){
var tofind=$("#photo_theater_repin").find(".repinbtn2").next("div");	
var tofindv=$("#photo_theater_repin");
}
else{
var tofind=$(org_elem).parents(".mtabled:first").find(".repiniconito").next("div");
var tofindv=$(org_elem).parents(".mtabled:first").find(".repin_story_wrapper");
}


var ltotal=$(tofind).attr("data-l_total");

ltotal=parseInt(ltotal);
ltotal=ltotal-1;

$(tofind).attr("data-l_total",ltotal);

if(whatisitv==0){
$(tofind).find(".me").remove();

var response=$(tofind).html();

var lthis=$(tofind).find(".lthis").html();

if(ltotal==1){
lthis=lthis.replace("repinned","repinned");
$(tofind).find(".lthis").html(lthis);
}
else if(ltotal==0){
$(tofind).html(response);
$(tofindv).addClass("hidden_sb");
}
}
else if(whatisitv>0){ //includes hand
$(tofind).find(".lthisv").html(ltotal);
if(ltotal==0){
$(tofindv).addClass("hidden_sb");
}
}


}

if(af=="repinx26"){ //update for function get next
var nresponse=$("#photo_theater_repin").find(".repinbtn2").next("div").html();
repw_gn[aorder]=nresponse;
}

$(org_elem).css("display","none");
$(org_elem).next(".lbl").css("display","inline-block");

}







function repin(org_elem,f,af){
var aorder=$("#ao_gn").val();

if(af=="repinx26"){
$(".repinclickvf").parent(".lbl").eq(0).css("display","none");
$(".repinclickf").parent(".lbl").eq(0).css("display","inline-block");

$("#cop12v").parent().eq(0).css("display","inline-block");
$("#cop13v").parent().eq(0).css("display","none");

var aorder=$("#ao_gn").val();
var lpid=pi_gn[aorder];
var uidv=o_gn[aorder];
var whatisit="photo";
var lparams={lpid:lpid,uidv:uidv,whatisit:whatisit};

rep_gn[aorder]=1;
trep_gn[aorder]=tl_gn[aorder]+1;
}


var fr=f;


if(af!="repinx26"){
if($(org_elem).parents(".mtablev").eq(0).length>0){
var lparams=$(org_elem).parents(".mtablev").eq(0).attr("data-lparams");
lparams=$.parseJSON(lparams);
}
else{
var lparams=$(org_elem).parents(".mtabled").eq(0).attr("data-lparams");
lparams=$.parseJSON(lparams);

}
}


var c=retcount();
//alert(lparams.uidv);
//alert(lparams.whatisit);
//alert(lparams.lpid);
$("body").append('<div class="hidden_sb" data-a_id="repins" fjax="/repin.php?uidv='+lparams.uidv+'&whatisit='+lparams.whatisit+'&lpid='+lparams.lpid+'" id="repins'+c+'"></div>');
$("#repins"+c).click().remove();


if(af=="repinx26"){
var wo=$("#ao_gn").val();
if(wo!=aorder){
var nogo="t";
}
}

var is_comment="f";
if(nogo===undefined){

var whatisitv=$(org_elem).parents(".mtablev").eq(0).length;

if(af=="repinx26"){
var tofind=$("#photo_theater_repin").find(".repinbtn2").next("div");	
var tofindv=$("#photo_theater_repin");
}
else{
var tofind=$(org_elem).parents(".mtabled:first").find(".repiniconito").next("div");
var tofindv=$(org_elem).parents(".mtabled:first").find(".repin_story_wrapper").eq(0);
}

var ltotal=$(tofind).attr("data-l_total");
//alert(ltotal);
var response=$(tofind).html();

ltotal=parseInt(ltotal);
ltotal=ltotal+1;

$(tofind).attr("data-l_total",ltotal);


if(whatisitv==0){

if(ltotal==1){
response='<span class="me">You repinned this.</span>';	
}
else if (strpos(response,"and")!==false){
response='<span class="me">You, </span>';	
}
else{response='<span class="me">You and </span>';}

var lthis=$(tofind).find(".lthis").html();

if(ltotal==2){
lthis=lthis.replace("repinned","repinned");
$(tofind).find(".lthis").html(lthis);
}


if(ltotal==1){
$(tofind).html(response);
}
else{
$(tofind).prepend(response);
}

}
else if(whatisitv>0){ //includes hand
$(tofind).find(".lthisv").html(ltotal);
}


$(tofindv).removeClass("hidden_sb");

}

if(af=="repinx26"){ //update for function get next
var nresponse=$("#photo_theater_repin").find(".repinbtn2").next("div").html();
repw_gn[aorder]=nresponse;
}

$(org_elem).css("display","none");
$(org_elem).prev(".lbl").css("display","inline-block");

//poner en fjax un data que sirva para hacer null sobre la variable en done :)

}
<?php include("endf.php"); ?>